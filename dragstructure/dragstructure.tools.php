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
 *      в `$pluginBody`
 *      подробно об этом в конце файла, может кому-то упрощу задачу при разработке или отладке.
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
 * ═════════════════════════════════════════════════════════════════════
 *   СВЯЗАННЫЕ ССЫЛКИ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   ReadMeMore:       https://abuyfile.com/market/cotonti/plugs/dragstructure
 *   Support:          https://abuyfile.com/forums/cotonti/custom/
 *   Source:           https://github.com/webitproff/dragstructure-cotonti
 *   Cotonti:          https://github.com/Cotonti/Cotonti
 *
 * ─────────────────────────────────────────────────────────────────────
 *
 * Date: Oct 31, 2026
 * @package dragstructure
 * @version 2.1.1
 * @author webitproff
 * @copyright Copyright (c) 2026 webitproff | https://github.com/webitproff/dragstructure-cotonti
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('dragstructure', 'plug');


// Проверка прав: пропускаем только администратора раздела admin
// ИЛИ пользователя с правом 'A' на сам плагин dragstructure.
// При отказе cot_block() уводит на стандартную страницу 403.
cot_block(cot_auth('admin', 'a') || cot_auth('plug', 'dragstructure', 'A'));


// Список кодов всех расширений (модулей и плагинов), объявивших свою
// структуру через хук structure.extensions. Только из этого списка
// можно выбирать область ext. Расширения без структуры сюда не попадают.
$extensionsWithStructure = cot_getExtensionsWithStructure();


// Текущая область структуры из GET-параметра ?ext=...,
// фильтр ALP — только буквы, чтобы отсечь мусор ещё до проверки списка.
$ext = cot_import('ext', 'G', 'ALP');


// Если ext пуст или его нет в списке поддерживающих структуру —
// подставляем первый доступный код из списка.
if (empty($ext) || !in_array($ext, $extensionsWithStructure, true)) {
    $ext = !empty($extensionsWithStructure) ? $extensionsWithStructure[0] : '';
}


// Если после всех проверок ext всё ещё пуст — значит, ни одно
// расширение не поддерживает структуру; 404 с языковой строкой.
if ($ext === '') {
    cot_die_message(404, true, Cot::$L['dragstructure_no_ext']);
}


// Инициализация шаблона. Третий аргумент true — искать сначала
// в админ-теме: themes/<admin_theme>/plugins/dragstructure/...,
// иначе брать плагинный: plugins/dragstructure/tpl/dragstructure.tools.tpl.
$t = new XTemplate(cot_tplfile('dragstructure.tools', 'plug', true));


// Заголовок страницы в админке (в <title> и в хлебных крошках).
$adminTitle = Cot::$L['dragstructure_title'];


// Добавляем пункт в хлебные крошки админки: «Инструменты → Drag & Drop структура».
$adminPath[] = [cot_url('admin', ['m' => 'other', 'p' => 'dragstructure']), Cot::$L['dragstructure_title']];

// Служебное действие из GET ?a=... (например, a=normalize).
$a = cot_import('a', 'G', 'ALP');

// Кнопка «Нормализовать пути»: сбрасывает иерархию в плоский вид.
// cot_check_xg() проверяет GET-токен x — защита от CSRF/подделки ссылки.
if ($a === 'normalize') {
    cot_check_xg();
	
    // Перестраивает structure_path у всех категорий области в плоский вид
    // (010, 020, 030, …). Возвращает число изменённых записей.
    $updated = dragstructure_normalize($ext);
	
    // Сообщение об успехе в очередь сообщений Cotonti.
    cot_message(cot_rc('dragstructure_normalized', ['count' => $updated]));
	
    // Редирект на ту же страницу без a=normalize,
    // чтобы F5 не запускал нормализацию повторно.	
    cot_redirect(cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext], '', true));
}


// Плоский список категорий области (id, code, title, desc, path, parentPath).
// Уходит в шаблон как CATS_JSON — клиентский JS строит из него дерево.
$categories = dragstructure_get_categories($ext);


// Определяем, модуль это или плагин — от этого зависит, из какой
// папки подключать inc-файл расширения (modules/... или plugins/...).
$extIsModule = cot_module_active($ext);


// Путь к inc-файлу текущего расширения — нужен, чтобы подгрузить его
// языковой файл: без этого cot_get_extensionparams() вернёт код ('page'),
// а не отображаемое имя ('Pages').
$extInc = cot_incfile($ext, $extIsModule ? 'module' : 'plug');
if (file_exists($extInc)) {
    require_once $extInc;
}

// Готовим массив отображаемых названий для <select>.
// Значения (value) остаются кодами (page, market, …) — они нужны для ?ext=...,
// а подписи (label) берём из cot_get_extensionparams()['name'].
$extTitles = [];
foreach ($extensionsWithStructure as $code) {
    $extTitles[] = cot_get_extensionparams($code, cot_module_active($code))['name'];
}

// присваиваем теги что бы выводить шаблоне dragstructure.tools.tpl.
$t->assign([

    // Код активной области структуры ('page', 'market', 'forums', …).
    'EXT'         => $ext,
	
    // Человекочитаемое название активной области ('Pages', 'Market', …).
    'EXT_NAME'    => cot_get_extensionparams($ext, $extIsModule)['name'],

    // Готовый HTML <select> для переключения области:
    // value = коды, подписи = $extTitles, автосабмит формы по onchange.
    //'EXT_LIST'    => cot_selectbox($ext, 'ext', $extensionsWithStructure, $extensionsWithStructure, false, 'onchange="this.form.submit()"'),
	'EXT_LIST'    => cot_selectbox($ext, 'ext', $extensionsWithStructure, $extTitles, false, 'onchange="this.form.submit()"'),
	
    // action формы-переключателя области.
    'FORM_ACTION' => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext]),
	
    // CSRF-токен Cotonti — уходит в AJAX как POST-параметр x.	
    'X_TOKEN'     => Cot::$sys['xk'],
	
    // Endpoint AJAX-обработчика. Обязательно без e= —
    // dragstructure.ajax.php — standalone-хук, параметр e не нужен.
    'AJAX_URL'    => cot_url('plug', ['r' => 'dragstructure']),
	
    // JSON всех категорий области для клиентского рендера дерева.
    // JSON_HEX_* — защита от XSS при вставке JSON в <script>.
    'CATS_JSON'   => json_encode($categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT),
	
    // Ссылка кнопки «Нормализовать» с GET-токеном x (проверяется в cot_check_xg()).
    'NORMALIZE_URL' => cot_url('admin', ['m' => 'other', 'p' => 'dragstructure', 'ext' => $ext, 'a' => 'normalize', 'x' => Cot::$sys['xk']]),
]);

// Если категорий в области нет — парсим блок MAIN.NO_CATS,
// в шаблоне покажется предупреждение {PHP.L.dragstructure_no_cats}.
if (empty($categories)) {
    $t->parse('MAIN.NO_CATS');
}

// Выводит накопленные за запрос сообщения и ошибки Cotonti в шаблон
// (через {FILE .../warnings.tpl}).
cot_display_messages($t);


// ═════════════════════════════════════════════════════════════════════
// РЕНДЕР БЛОКА И ПЕРЕДАЧА РЕЗУЛЬТАТА ЯДРУ
// admin.php?m=other&p=dragstructure
// ═════════════════════════════════════════════════════════════════════
//
// РАЗБИРАЕМ ДВЕ СТРОКИ
//
// $t->parse('MAIN');
// $pluginBody = $t->text('MAIN');
//
// ─────────────────────────────────────────────────────────────────────
// РАЗДЕЛ 1. АДМИНКА — ХУК tools, ЭТОТ ФАЙЛ
// ─────────────────────────────────────────────────────────────────────
//
// Адрес: admin.php?m=other&p=dragstructure
//
// ─── ПОДРАЗДЕЛ 1.1. ЦЕПОЧКА ЗАГРУЗКИ ────────────────────────────────
//
//  1. admin.php
//       bootstrap админки: datas/config.php, system/common.php.
//
//  2. system/common.php
//       autoloader (lib/vendor/autoload.php) — регистрирует
//         \cot\router\Router, \cot\extensions\ExtensionsService,
//         \cot\extensions\ExtensionsControlService и др.;
//       system/cotemplate.php  — класс XTemplate;
//       system/functions.php   — cot_import, cot_url, cot_getextplugins,
//         cot_incfile, cot_tplfile, cot_langfile, cot_auth, cot_block,
//         cot_die_message, cot_message, cot_redirect, cot_display_messages,
//         cot_get_extensionparams;
//       XTemplate::init([...]).
//
//  3. system/router/Router.php — Router::routeAdmin()
//       $m = 'other' → processAdminCoreIncludeFiles('other', ...)
//         → 'other' есть в $standardAdmin
//         → Route::includeFiles = [system/admin/admin.other.php]
//       Далее system/admin/admin.main.php сам подключает этот includeFiles
//       через require_once в цикле foreach по $route->includeFiles.
//       (admin.php подключает только admin.main.php.)
//
//  4. system/admin/admin.other.php — ветка !empty($p) при $p = 'dragstructure'
//
//       4.1. $route = Router::getInstance()->routeAdminOther($p);
//              (instance-вызов через getInstance(), не статический)
//              → processAdminExtensionIncludeFiles('dragstructure',
//                  ExtensionsDictionary::TYPE_PLUGIN, 'tools')
//              → cot_getextplugins('tools', true, 'dragstructure', 'plug')
//              → Route::includeFiles = [plugins/dragstructure/dragstructure.tools.php]
//
//       4.2. list(..., Cot::$usr['isadmin']) = cot_auth('plug', $p);
//            cot_block(Cot::$usr['isadmin']);
//
//       4.3. if (file_exists(cot_langfile($p, ExtensionsDictionary::TYPE_PLUGIN))) {
//                require_once cot_langfile($p, ExtensionsDictionary::TYPE_PLUGIN);
//            }
//
//       4.4. $extInfo    = cot_get_extensionparams($p, false);
//            $adminTitle = $extInfo['name'];
//
//       4.5. $adminMain = '';
//            $legacyMode = isset(Cot::$cfg['legacyMode']) && Cot::$cfg['legacyMode'];
//
//       4.6. if (!empty($route->includeFiles)) {
//                foreach ($route->includeFiles as $includeFile) {
//                    if ($legacyMode) {
//                        $plugin_body = '';   // старое имя, только при legacyMode
//                    }
//                    $pluginBody = ''; зачишЩаем
//                    include_once $includeFile;
//                    // $adminMain .= $pluginBody;
//                    //   В $pluginBody на этой строке — строка HTML,
//                    //   которую вернул $t->text('MAIN') внутри
//                    //   dragstructure.tools.php (отрендеренный блок MAIN
//                    //   из dragstructure.tools.tpl). Ничего больше:
//                    //   ни JSON, ни тега шаблона, ни массива — только string.
//                    $adminMain .= $pluginBody;
//                    if ($legacyMode) {
//                        $adminMain .= $plugin_body;
//                    }
//                }
//            } elseif ($route->controller !== null && $route->action !== null) {
//                $adminMain = $route->controller->runAction($route->action);
//            }
//
//       4.7. Для dragstructure срабатывает первая ветка
//            (includeFiles не пустой, контроллера нет).
//
//  5. plugins/dragstructure/dragstructure.tools.php — этот файл
//       cot_incfile('dragstructure', 'plug')
//         → plugins/dragstructure/inc/dragstructure.functions.php
//       cot_langfile('dragstructure', 'plug') уже подключён в admin.other.php
//         через require_once (при file_exists). Повторный вызов здесь
//         безвреден: тот же файл, require_once не подгружает повторно.
//       cot_tplfile('dragstructure.tools', 'plug', true)
//         → themes/<admin_theme>/plugins/dragstructure/dragstructure.tools.tpl
//         → или plugins/dragstructure/tpl/dragstructure.tools.tpl
//       new XTemplate(...) — класс из system/cotemplate.php
//       $t->assign(...);
//       $t->parse('MAIN');
//       $pluginBody = $t->text('MAIN');
//
//  6. Тот же admin.other.php, следующая строка цикла:
//       $adminMain .= $pluginBody;
//     (что попадает в $pluginBody — см. комментарий в пункте 4.6).
//     Далее $adminMain возвращается в admin.main.php: общая область
//     видимости (include/require не создают новую), и в admin.main.php
//     значение используется в
//       $t->assign(['ADMIN_MAIN' => $adminMain, ...])
//     и выводится через тег {ADMIN_MAIN} в themes/<theme>/admin/admin.tpl
//     при $t->parse('MAIN'); $t->out('MAIN'); в admin.main.php.
//
// ─── ПОДРАЗДЕЛ 1.2. ЧТО ДЕЛАЮТ $t->parse() И $t->text() ─────────────
//
// $t->parse('MAIN')
//   Находит блок MAIN в шаблоне и рекурсивно рендерит его содержимое
//   (Cotpl_block::parse). Готовый HTML добавляется в $block->data[]
//   (append — повторный вызов накапливает). Возвращает $this.
//
// $t->text('MAIN')
//   Склеивает $block->data в строку, ОЧИЩАЕТ data[] и возвращает её.
//   Без предшествующего parse() вернёт ''. Возвращает string.
//
// ─── ПОДРАЗДЕЛ 1.3. ПОЧЕМУ parse + text ЗДЕСЬ ОБЯЗАТЕЛЬНЫ ───────────
//
// admin.other.php после include_once читает ровно переменные:
//     $pluginBody = '';      // обычный режим
//     $plugin_body = '';     // legacyMode, старое имя
//     include_once $includeFile;
//     $adminMain .= $pluginBody;
//     if ($legacyMode) { $adminMain .= $plugin_body; }
//
// К $t после include_once ядро не обращается, $t->out() не вызывает.
// Без parse+text и присвоения $pluginBody раздел откроется пустым.
//
// При $legacyMode дополнительно читается $plugin_body — если плагин её
// не присвоил, к $adminMain ничего не добавится, но и ошибки не будет:
// переменная инициализирована до include_once.
//
// ─── ПОДРАЗДЕЛ 1.4. ОСОБЕННОСТИ ВЕТКИ admin.other.php ───────────────
//
// Цикл по $route->includeFiles:
//   для одного хука tools файлов плагинов может быть несколько.
//   $pluginBody обнуляется на каждой итерации, поэтому каждый файл
//   присваивает результат независимо; $adminMain накапливает строки
//   в порядке includeFiles.
//
// Ветка elseif ($route->controller !== null && $route->action !== null):
//   используется, только если у расширения есть контроллер, а не
//   include-файлы. Для dragstructure эта ветка не срабатывает.
//
// ─── ПОДРАЗДЕЛ 1.5. ИТОГ ДЛЯ РАЗДЕЛА 1 ──────────────────────────────
//
// Обе строки обязательны, результат кладётся в $pluginBody
// (в legacyMode также можно присвоить $plugin_body — старый контракт).
//
//
// ─────────────────────────────────────────────────────────────────────
// РАЗДЕЛ 2. ОСТАЛЬНЫЕ СЛУЧАИ — ХУКИ ajax / popup / standalone
// Источник: system/plugin.php
// ─────────────────────────────────────────────────────────────────────
//
// ─── ПОДРАЗДЕЛ 2.1. ОБЩАЯ ЧАСТЬ В system/plugin.php ─────────────────
//
//   $e  = cot_import('e',  'G', 'ALP');   // standalone
//   $o  = cot_import('o',  'G', 'ALP');   // popup
//   $r  = isset($_POST['r'])
//       ? cot_import('r', 'P', 'ALP')     // ajax, POST
//       : cot_import('r', 'G', 'ALP');    // ajax, GET
//   $c1 = cot_import('c1', 'G', 'ALP');
//   $c2 = cot_import('c2', 'G', 'ALP');
//
//   $autoAssignTags = false;
//   $usingController = Cot::$currentRoute->controller !== null
//                   && Cot::$currentRoute->action    !== null;
//   $templateFile   = '';
//
//   - ветка popup ($o):
//       $extensionCode  = $o;
//       $templateFile   = cot_tplfile(['popup', $extensionCode]);
//       $autoAssignTags = true;
//
//   - ветка ajax ($r):
//       $extensionCode  = $r;
//       $templateFile   не задаётся → ниже $t останется null;
//
//   - ветка standalone ($e):
//       $extensionCode  = $e;
//       if (!$usingController) {
//           $templateFile = cot_tplfile($extensionCode, ExtensionsDictionary::TYPE_PLUGIN);
//           if ($templateFile === null || !file_exists($templateFile)) {
//               $templateFile   = cot_tplfile(['plugin', $extensionCode]);
//               $autoAssignTags = true;
//           }
//       }
//
//   ... проверка file_exists(Cot::$cfg['plugins_dir'] . '/' . $extensionCode)
//   ... cot_auth('plug', Cot::$env['ext']) / cot_block
//   ... require cot_langfile, cot_incfile (resources, functions)
//
//   $t = null;
//   if (!empty($templateFile)) {
//       $t = new XTemplate($templateFile);
//   }
//
//   ... include файлов плагина ...
//
//   if ($autoAssignTags && !empty($t)) {
//       if (empty($o)) {
//           // standalone, найден только themes/<theme>/plugin.tpl
//           $t->assign([
//               'BREADCRUMBS' => cot_breadcrumbs(...),
//               'TITLE'       => $pluginTitle,
//               'SUBTITLE'    => $pluginSubtitle,
//               'BODY'        => $pluginBody,
//           ]);
//       } else {
//           // popup
//           $t->assign([
//               'POPUP_C1' => $c1,
//               'POPUP_C2' => $c2,
//               'BODY'     => $pluginBody,
//           ]);
//       }
//       // при $legacyMode ещё 'PLUGIN_BODY' => $pluginBody
//       //                 (или 'POPUP_BODY' => $pluginBody в ветке $o)
//   }
//
//   $pluginTemplate = $t ?? null;
//   require_once Cot::$cfg['system_dir'] . '/header.php';
//   $t = $pluginTemplate;
//   unset($pluginTemplate);
//
//   if (isset($t) && is_object($t)) {
//       $t->parse('MAIN');
//       $t->out('MAIN');
//   } else {
//       echo $pluginBody;
//   }
//
// ─── ПОДРАЗДЕЛ 2.2. AJAX (plug.php?r=<code>) ────────────────────────
//
//   $t = null (ядро шаблон не создаёт, $autoAssignTags = false).
//
//   Как работает плагин:
//     $pluginBody = '...готовый JSON или HTML...';
//   Ядро в конце выполняет:
//     echo $pluginBody;
//
//   Чего не делать в плагине:
//     $t->parse / $t->text — $t равен null, будет фатальная ошибка;
//     new XTemplate(...) — создаст объект, тогда is_object($t) в конце
//     станет true, и вместо echo $pluginBody ядро выполнит
//     $t->parse('MAIN'); $t->out('MAIN') на плагинском $t.
//
// ─── ПОДРАЗДЕЛ 2.3. POPUP (plug.php?o=<code>) ───────────────────────
//
//   $autoAssignTags = true;
//   Ядро создало $t = new XTemplate(cot_tplfile(['popup', <code>])).
//
//   Как работает плагин:
//     $pluginBody = '...html...';
//   Ядро (ветка else, потому что $o задан):
//     $t->assign([
//         'POPUP_C1' => $c1,
//         'POPUP_C2' => $c2,
//         'BODY'     => $pluginBody,
//     ]);
//     // при $legacyMode дополнительно 'POPUP_BODY' => $pluginBody
//     ...
//     $t->parse('MAIN');
//     $t->out('MAIN');   // на popup.tpl
//
//   Чего не делать в плагине:
//     свой $t->parse('MAIN') и $t->text('MAIN') — MAIN отрендерится
//     дважды: сначала плагин заполнит $block->data[], затем ядровой
//     parse добавит ещё, out склеит оба накопления;
//     new XTemplate(...) — подменит $t, ядро отрендерит чужой шаблон.
//
// ─── ПОДРАЗДЕЛ 2.4. STANDALONE, ФАЙЛ <code>.tpl НАЙДЕН ──────────────
//
//   $autoAssignTags = false;
//   Ядро создало $t на themes/<theme>/plugins/<code>/<code>.tpl.
//
//   Как работает плагин:
//     только $t->assign(...).
//   Ядро в конце:
//     if (is_object($t)) { $t->parse('MAIN'); $t->out('MAIN'); }
//
//   Чего не делать в плагине:
//     свой $t->parse('MAIN') и $t->text('MAIN') — MAIN отрендерится
//     дважды (свой data[], затем ядровой parse снова в data[],
//     out склеит оба накопления);
//     new XTemplate(...) — подменит $t, ядро отрендерит чужой шаблон.
//
// ─── ПОДРАЗДЕЛ 2.5. STANDALONE, ФАЙЛ <code>.tpl НЕ НАЙДЕН ───────────
//
//   Шаблон themes/<theme>/plugin.tpl.
//   $autoAssignTags = true.
//   Ядро создало $t на plugin.tpl.
//
//   Как работает плагин:
//     $pluginBody = '...html...';
//   Ядро (ветка empty($o), потому что это standalone, не popup):
//     $t->assign([
//         'BREADCRUMBS' => cot_breadcrumbs(...),
//         'TITLE'       => $pluginTitle,
//         'SUBTITLE'    => $pluginSubtitle,
//         'BODY'        => $pluginBody,
//     ]);
//     // при $legacyMode дополнительно 'PLUGIN_BODY' => $pluginBody
//     ...
//     $t->parse('MAIN');
//     $t->out('MAIN');   // на plugin.tpl
//
//   Чего не делать в плагине:
//     свой $t и $t->parse / $t->text — двойной рендер или подмена
//     шаблона по той же причине, что в подразделах 2.3 и 2.4.
//
// ─── ПОДРАЗДЕЛ 2.6. ИТОГ ПО РАЗДЕЛУ 2 ───────────────────────────────
//
//   ajax:        $t = null;    плагин кладёт строку в $pluginBody.
//   popup:       autoAssign;   плагин кладёт строку в $pluginBody.
//   standalone:  autoAssign;   плагин кладёт строку в $pluginBody
//                              (если <code>.tpl не найден);
//                иначе       плагин делает только $t->assign(...).
//   Свой parse/text и свой new XTemplate(...) в этих ветках не создавать.
//
// ═════════════════════════════════════════════════════════════════════
$t->parse('MAIN');
$pluginBody = $t->text('MAIN');

