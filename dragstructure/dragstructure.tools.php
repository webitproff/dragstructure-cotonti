<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */

/**
 * DragStructure — страница инструмента «Drag & Drop структура» в админке.
 *
 * Файл: plugins/dragstructure/dragstructure.tools.php
 *
 * Назначение
 * ----------
 * Единственная точка входа административного интерфейса плагина.
 * Cotonti находит этот файл через хук `tools`: страница доступна по
 * адресу `admin.php?m=other&p=dragstructure` и открывается из раздела
 * «Инструменты» админ-панели. Никаких других хуков у плагина нет —
 * вся интерактивность выполняется на этой странице + AJAX-обработчик
 * dragstructure.ajax.php.
 *
 * Что делает файл
 * ---------------
 *   1. Проверяет права администратора.
 *   2. Определяет активное расширение (`ext`) из GET-параметра `ext`
 *      или, если параметр пуст/невалиден, берёт первое из списка
 *      расширений с поддержкой структуры (`cot_getExtensionsWithStructure()`).
 *   3. Обрабатывает служебное действие `a=normalize` (кнопка
 *      «Нормализовать пути»): пересчитывает все пути области в
 *      плоский вид через dragstructure_normalize(), показывает счётчик
 *      изменённых записей и редиректит на ту же страницу.
 *   4. Загружает плоский список категорий области и передаёт его
 *      в шаблон в двух видах:
 *        - `CATS_JSON` — для клиентского рендера дерева;
 *        - `EXT_LIST`  — готовый `<select>` для переключения области.
 *   5. Присваивает теги, нужные шаблону: X-токен CSRF, URL AJAX-ручки,
 *      URL кнопки нормализации, URL формы.
 *   6. Парсит шаблон `dragstructure.tools.tpl` и присваивает результат
 *      в `$pluginBody` — ядро вставит его в admin-шаблон через
 *      `{PLUGIN_BODY}`.
 *
 * Права доступа
 * -------------
 * Страница открывается, если текущий пользователь удовлетворяет хотя бы
 * одному условию:
 *   - `cot_auth('admin', 'a')` — право администратора на раздел admin;
 *   - `cot_auth('plug', 'dragstructure', 'A')` — право `A` на сам плагин.
 * При отказе `cot_block(true)` вызывает редирект на страницу сообщения
 * 403 — это стандартное поведение Cotonti, свой обработчик не нужен.
 *
 * Выбор расширения (`ext`)
 * ------------------------
 * `ext` — код области структуры (например, `page`, `market`, `forums`).
 * Приводится фильтром `ALP` через `cot_import`. Валидность проверяется
 * по списку `$extensionsWithStructure`, который заполняется хуком
 * `structure.extensions` — модули и плагины, объявившие свою структуру,
 * добавляют туда свой код. Расширения без структуры в списке отсутствуют.
 *
 * Если `ext` пуст или не входит в список — берётся первый элемент списка.
 * Если список пуст (ни одно расширение не поддерживает структуру) —
 * `cot_die_message(404)` с языковой строкой `dragstructure_no_ext`.
 *
 * Действие «Нормализовать» (`a=normalize`)
 * ----------------------------------------
 * Служебная кнопка для восстановления из разрушенного состояния БД,
 * когда в `structure_path` уже есть дубликаты или «слипшиеся» пути
 * (например, после ошибочной работы предыдущей версии плагина).
 * Плагин не может восстановить иерархию из дубликатов — он присваивает
 * всем категориям плоские уникальные пути `010`, `020`, `030`, ...
 * с шагом 10 и шириной 3, и администратор расставляет иерархию вручную.
 *
 * Защита действия — `cot_check_xg()` (проверка GET-токена Cotonti).
 * Счётчик изменённых записей возвращает dragstructure_normalize().
 * После нормализации — `cot_redirect()` на URL текущей области,
 * чтобы сбросить `a` из адресной строки и избежать повторного
 * срабатывания при F5.
 *
 * Передача данных в шаблон
 * ------------------------
 * `$t->assign([...])`:
 *   - `EXT`           — выбранная область структуры;
 *   - `EXT_LIST`      — HTML `<select>` со списком всех расширений,
 *                       поддерживающих структуру; автосабмит формы
 *                       переключит область через `?ext=...`;
 *   - `FORM_ACTION`   — action формы-переключателя;
 *   - `X_TOKEN`       — `Cot::$sys['xk']` для AJAX-запросов (проверка
 *                       CSRF в dragstructure.ajax.php);
 *   - `AJAX_URL`      — `plug.php?r=dragstructure` — endpoint AJAX;
 *                       обязательно через `cot_url('plug', ['r' => ...])`,
 *                       без `e=` (это standalone-хук, которого нет);
 *   - `CATS_JSON`     — JSON со всеми категориями области: `id`,
 *                       `code`, `title`, `desc`, `path`, `parentPath`;
 *                       клиент строит из него дерево и пересобирает
 *                       после каждой успешной операции;
 *   - `NORMALIZE_URL` — ссылка на действие `a=normalize` с GET-токеном
 *                       `x`; на кнопке в шаблоне — `onclick confirm()`,
 *                       чтобы администратор осознанно подтвердил
 *                       потерю текущей иерархии.
 *
 * Пустой список категорий (`count($categories) === 0`)
 * ----------------------------------------------------
 * Парсится блок `MAIN.NO_CATS` — в шаблоне показывается предупреждение
 * `{PHP.L.dragstructure_no_cats}`. Это не ошибка: область может быть
 * действительно пустой до первого создания категорий через штатный
 * раздел «Структура» ядра.
 *
 * Шаблон
 * ------
 * `cot_tplfile('dragstructure.tools', 'plug', true)` ищет файл в порядке:
 *   1. themes/<admin_theme>/plugins/dragstructure/dragstructure.tools.tpl
 *   2. themes/<admin_theme>/plugins/dragstructure.tools.tpl
 *   3. plugins/dragstructure/tpl/dragstructure.tools.tpl
 * Третий аргумент `true` включает поиск в админ-теме. Если файл не
 * найден — XTemplate бросит ошибку, поэтому шаблон должен присутствовать
 * в поставке плагина.
 *
 * Сообщения
 * ---------
 * `cot_display_messages($t)` — стандартный вывод очереди сообщений
 * Cotonti (`cot_message`, `cot_error`) в шаблоне (обычно через блок
 * `{FILE .../warnings.tpl}`). Используется для отображения результата
 * нормализации и любых других сообщений, накопленных ядром за запрос.
 *
 * Логирование
 * -----------
 * Файл сам в лог не пишет. Нормализация не логируется — это осознанно:
 * после нормализации в логе окажется запись только о тех перемещениях,
 * которые администратор сделает после неё (через dragstructure_move()).
 * Если требуется отдельный лог факта нормализации — это добавляется
 * одной строкой `cot_log(...)` в блок `a === 'normalize'`.
 *
 * Зависимости
 * -----------
 *   - cot_incfile('dragstructure', 'plug')  — подключает
 *     inc/dragstructure.functions.php
 *     (dragstructure_get_categories, dragstructure_normalize и др.);
 *   - cot_langfile('dragstructure', 'plug') — языковые строки плагина;
 *   - cot_getExtensionsWithStructure()      — список областей структуры;
 *   - cot_selectbox()                       — построение `<select>`;
 *   - cot_url(), cot_import(), cot_check_xg(),
 *     cot_message(), cot_redirect(),
 *     cot_display_messages(), cot_die_message() — стандартные функции ядра.
 *
 * Ограничения
 * -----------
 *   - сортировка и пересчёт путей выполняются только после фактического
 *     drag-and-drop (AJAX); на этой странице никакие пути не меняются,
 *     кроме явной кнопки «Нормализовать»;
 *   - при параллельном редактировании двумя администраторами возможен
 *     конфликт id (dragstructure_validate_move() вернёт ошибку) —
 *     фронтенд перерисует дерево из свежего `CATS_JSON`;
 *   - `ext` берётся из списка `$extensionsWithStructure`, поэтому плагин
 *     не позволит случайно выбрать область, которая структуру не
 *     поддерживает (например, `users`, если модуль users не объявил
 *     свой хук `structure.extensions`).
 *
 * @package   dragstructure
 * @version   2.0.0
 * @author    webitproff
 * @copyright (c) 2026 webitproff
 * @license   BSD
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('dragstructure', 'plug');
require_once cot_langfile('dragstructure', 'plug');

cot_block(cot_auth('admin', 'a') || cot_auth('plug', 'dragstructure', 'A'));

$extensionsWithStructure = cot_getExtensionsWithStructure();

$ext = cot_import('ext', 'G', 'ALP');
if (empty($ext) || !in_array($ext, $extensionsWithStructure, true)) {
    $ext = !empty($extensionsWithStructure) ? $extensionsWithStructure[0] : '';
}
if ($ext === '') {
    cot_die_message(404, true, Cot::$L['dragstructure_no_ext']);
}

$t = new XTemplate(cot_tplfile('dragstructure.tools', 'plug', true));

$adminTitle = Cot::$L['dragstructure_title'];
$adminPath[] = [cot_url('admin', ['m' => 'other', 'p' => 'dragstructure']), Cot::$L['dragstructure_title']];
$a = cot_import('a', 'G', 'ALP');
if ($a === 'normalize') {
    cot_check_xg();
    $updated = dragstructure_normalize($ext);
    cot_message(cot_rc('dragstructure_normalized', ['count' => $updated]));
    cot_redirect(cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext], '', true));
}
$categories = dragstructure_get_categories($ext);

$t->assign([
    'EXT'         => $ext,
    'EXT_LIST'    => cot_selectbox($ext, 'ext', $extensionsWithStructure, $extensionsWithStructure, false, 'onchange="this.form.submit()"'),
    'FORM_ACTION' => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext]),
    'X_TOKEN'     => Cot::$sys['xk'],
    'AJAX_URL'    => cot_url('plug', ['r' => 'dragstructure']),
    'CATS_JSON'   => json_encode($categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT),
    'NORMALIZE_URL' => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext, 'a' => 'normalize', 'x' => Cot::$sys['xk']]),
]);

if (empty($categories)) {
    $t->parse('MAIN.NO_CATS');
}

cot_display_messages($t);
$t->parse('MAIN');
$pluginBody = $t->text('MAIN');