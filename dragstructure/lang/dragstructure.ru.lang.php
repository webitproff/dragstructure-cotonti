<?php
/**
 * Russian Localization File for the Plugin "Drag & Drop Structure"
 * for Cotonti CMF v1.+, PHP 8.4+, MySQL 8.4
 *
 * ═════════════════════════════════════════════════════════════════════
 *   НАЗНАЧЕНИЕ ФАЙЛА — ЯЗЫКОВОЙ ПАКЕТ ПЛАГИНА
 * ═════════════════════════════════════════════════════════════════════
 *
 * Файл `lang/dragstructure.ru.lang.php` — русская локализация плагина
 * Drag & Drop Structure. В нём определены все языковые строки, которые
 * плагин выводит в административном интерфейсе и в AJAX-ответах.
 *
 * По своей роли это словарь переводов: Cotonti загружает его через
 * штатную функцию `cot_langfile()` и складывает значения в глобальный
 * массив `Cot::$L`. Все места плагина, где требуется отобразить текст
 * пользователю, читают его из `Cot::$L['<ключ>']`.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   МЕСТО В СИСТЕМЕ — ГДЕ И КЕМ ЧИТАЕТСЯ ФАЙЛ
 * ═════════════════════════════════════════════════════════════════════
 *
 * Языковой файл подключается через штатную функцию Cotonti
 * `cot_langfile($name, $type, $default, $lang)`. Она ищет файл
 * в нескольких местах в порядке приоритета:
 *
 *   1. langs/<lang>/plugins/<code>.<lang>.lang.php
 *   2. plugins/<code>/lang/<code>.<lang>.lang.php
 *   3. plugins/<code>/lang/<code>.<default>.lang.php  (fallback на en)
 *
 * Для dragstructure актуальны пути (2) и (3):
 *
 *   plugins/dragstructure/lang/dragstructure.ru.lang.php   ← этот файл
 *   plugins/dragstructure/lang/dragstructure.en.lang.php   ← fallback
 *
 * Точки подключения файла в плагине:
 *
 *   1. dragstructure.tools.php
 *      `require_once cot_langfile('dragstructure', 'plug');`
 *      Загружает строки для страницы админ-инструмента.
 *
 *   2. dragstructure.ajax.php
 *      `require_once cot_langfile('dragstructure', 'plug');`
 *      Загружает строки для AJAX-ответов (в частности —
 *      `dragstructure_saved`).
 *
 *   3. ExtensionsHelper::getTitle() / getDescription() в ядре
 *      Если ключ `dragstructure_title` определён в файле — он
 *      используется как название плагина в списке расширений
 *      админ-панели (вместо `Name` из setup-файла). Аналогично
 *      `dragstructure_description` — вместо `Description` из
 *      setup-файла. Это предпочтительный способ локализации
 *      имени и описания расширения.
 *
 *   Приоритет источников названия в ExtensionsHelper::getTitle():
 *     dragstructure_title → plu_title → info_name → setup.Name
 *   Приоритет источников описания в getDescription():
 *     dragstructure_description → info_desc → setup.Description
 *
 *   Поэтому ключи `dragstructure_title` и `dragstructure_description`
 *   в этом файле — не просто строки интерфейса, а «официальные»
 *   локализованные имя и описание плагина в админке Cotonti.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   КЛЮЧИ И ИХ НАЗНАЧЕНИЕ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   dragstructure_title
 *     Заголовок страницы плагина в админке. Читается в
 *     dragstructure.tools.php как `Cot::$L['dragstructure_title']`
 *     (для `$adminTitle` и хлебных крошек). Также читается ядром
 *     через ExtensionsHelper::getTitle() как локализованное
 *     название плагина в списке расширений.
 *     В шаблоне: `{PHP.L.dragstructure_title}`.
 *
 *   dragstructure_select_ext
 *     Метка выпадающего списка «Расширение» (выбор области
 *     структуры: page, market, forums и т.д.).
 *     В шаблоне: `{PHP.L.dragstructure_select_ext}`.
 *
 *   dragstructure_no_cats
 *     Предупреждение в интерфейсе плагина, если в выбранной
 *     области нет ни одной категории. Парсится блок
 *     `MAIN.NO_CATS` в dragstructure.tools.tpl.
 *     В шаблоне: `{PHP.L.dragstructure_no_cats}`.
 *
 *   dragstructure_no_ext
 *     Сообщение терминальной ошибки 404 (cot_die_message), если
 *     ни одно расширение в системе не объявило хук
 *     `structure.extensions`. Возникает, например, если в системе
 *     не установлено ни одного модуля со структурой (page, market
 *     и т.п.). Читается в dragstructure.tools.php напрямую.
 *
 *   dragstructure_saved
 *     Сообщение об успешном сохранении нового порядка категорий.
 *     Передаётся в JSON-ответе AJAX-обработчика
 *     (dragstructure.ajax.php) при `$error === null`.
 *     Клиент получает его в поле `message` и может показать
 *     в UI как подтверждение операции.
 *
 *   dragstructure_error
 *     Общее сообщение об ошибке сохранения структуры. Может
 *     использоваться как заглушка при отображении ошибок AJAX
 *     на клиенте (сейчас в JS выводятся `data.message` из ответа
 *     сервера, но при необходимости этот ключ можно задействовать
 *     для локализованных сообщений клиентского уровня).
 *
 *   dragstructure_normalize
 *     Надпись на красной кнопке «Нормализовать пути» в верхней
 *     части страницы плагина. При нажатии выполняется действие
 *     `a=normalize` (перестройка всех путей области в плоский
 *     список 010, 020, 030...).
 *     В шаблоне: `{PHP.L.dragstructure_normalize}`.
 *
 *   dragstructure_normalize_confirm
 *     Текст диалога подтверждения при нажатии на кнопку
 *     «Нормализовать пути». Встраивается в JS-обработчик
 *     `onclick="return confirm(...)"`. Предупреждает администратора
 *     о том, что иерархия будет потеряна и восстановить её можно
 *     только вручную.
 *     В шаблоне: `{PHP.L.dragstructure_normalize_confirm}`.
 *
 *   dragstructure_normalized
 *     Сообщение о результате операции нормализации: «Нормализовано
 *     категорий: N». Читается в dragstructure.tools.php через
 *     `cot_rc('dragstructure_normalized', ['count' => $updated])`.
 *     Плейсхолдер `{$count}` подставляется реальным числом
 *     изменённых записей.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   СОГЛАШЕНИЯ О ФОРМАТЕ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   - Префикс ключей: `dragstructure_` — обязателен для всех
 *     ключей плагина. Это исключает коллизии с ключами ядра и
 *     других расширений.
 *   - Формат файла: `<?php defined('COT_CODE') or die('Wrong URL.');`
 *     в первой строке — защита от прямого открытия в браузере.
 *   - Кодировка: UTF-8 без BOM.
 *   - Плейсхолдеры вида `{$имя}` используются в cot_rc() и
 *     подставляются через аргументы; не путать с шаблонным
 *     синтаксисом CoTemplate `{PHP.L.*}`.
 *   - Строки для шаблона — только значения, без HTML. Разметка
 *     задаётся в dragstructure.tools.tpl.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ДОБАВЛЕНИЕ НОВОГО ЯЗЫКА
 * ═════════════════════════════════════════════════════════════════════
 *
 *   1. Скопировать `dragstructure.ru.lang.php` в
 *      `dragstructure.<lang>.lang.php`, где `<lang>` — код языка
 *      в Cotonti (`en`, `de`, `fr`, `uk`, ...).
 *   2. Перевести значения, ключи оставить без изменений.
 *   3. Сохранить в кодировке UTF-8 без BOM.
 *   4. Проверить, что все ключи, встречающиеся в шаблоне
 *      (`{PHP.L.dragstructure_*}`) и в PHP (`Cot::$L[...]`),
 *      присутствуют в файле. Список используемых ключей —
 *      см. раздел «КЛЮЧИ И ИХ НАЗНАЧЕНИЕ» выше.
 *
 *   При отсутствии ключа в целевом языке Cotonti возьмёт значение
 *   из fallback-файла `dragstructure.en.lang.php`. Если ключа нет
 *   и там — в шаблоне останется «сырое» имя `{PHP.L.dragstructure_*}`.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   СВЯЗАННЫЕ ФАЙЛЫ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   plugins/dragstructure/lang/dragstructure.en.lang.php
 *     Английская локализация — fallback для любых языков.
 *
 *   plugins/dragstructure/dragstructure.tools.php
 *     Читает `dragstructure_title`, `dragstructure_no_ext`,
 *     `dragstructure_normalized` (через cot_rc).
 *
 *   plugins/dragstructure/dragstructure.ajax.php
 *     Читает `dragstructure_saved` для поля `message`
 *     в JSON-ответе.
 *
 *   plugins/dragstructure/tpl/dragstructure.tools.tpl
 *     Читает все ключи через `{PHP.L.*}`:
 *       dragstructure_title, dragstructure_select_ext,
 *       dragstructure_no_cats, dragstructure_normalize,
 *       dragstructure_normalize_confirm.
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
 * Date: Oct 29, 2026
 * @package dragstructure
 * @version 2.0.1
 * @author webitproff
 * @copyright Copyright (c) 2026 webitproff | https://github.com/webitproff/dragstructure-cotonti
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$L['cfg_normalize_confirm']      = 'Показать красную кнопку нормализации структуры';
$L['cfg_normalize_confirm_hint'] = ''
    . 'Используйте кнопку «Нормализовать пути» только после '
	. '<a href="https://github.com/webitproff/dbbackdump-cotonti" target="_blank"><strong>создания резервной копии БД</strong></a>. <br>'
	. 'Эта кнопка сбрасывает и перестроит все категории в «Родительские» (начальные, без иерархии) <br>'
	. 'После этого иерархию можно расставить заново перетаскиванием.  <br>'
	. 'Подробнее <a href="https://github.com/webitproff/dragstructure-cotonti" target="_blank"><strong>в документации к плагину</strong></a>';

$L['dragstructure_title']      = 'Drag & Drop структура';
$L['dragstructure_select_ext'] = 'Расширение';
$L['dragstructure_no_cats']    = 'Категории не найдены';
$L['dragstructure_no_ext']     = 'Нет расширений с поддержкой структуры';
$L['dragstructure_saved']      = 'Структура сохранена';
$L['dragstructure_error']      = 'Ошибка сохранения структуры';

$L['dragstructure_normalize']    = 'Нормализовать пути';
$L['dragstructure_normalize_confirm'] = 'Все пути категорий будут перестроены в плоский список (100, 110, 120...). Все категории станут родительскими. Иерархия потеряется, восстановить можно только вручную. Продолжить?';
$L['dragstructure_normalized']   = 'Нормализовано категорий: {$count}';
