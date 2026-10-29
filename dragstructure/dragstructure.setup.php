<?php
/* ====================
[BEGIN_COT_EXT]
Code=dragstructure
Name=Drag & Drop Structure
Category=administration
Description=Drag-and-drop editor for category structure with numeric path recalculation
Version=2.0.1
Date=2026-10-29
Author=webitproff
Copyright=(c) 2026 webitproff | https://github.com/webitproff/dragstructure-cotonti
Notes=
Auth_guests=R
Lock_guests=12345A
Auth_members=RW
Lock_members=12345A
Requires_modules=
Requires_plugins=
Recommends_modules=
Recommends_plugins=
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
normalize_confirm=01:radio::0:Show the red structure normalization button
[END_COT_EXT_CONFIG]
==================== */


/**
 * Setup & Registration File for the Plugin "Drag & Drop Structure"
 * for Cotonti CMF v1.+, PHP 8.4+, MySQL 8.4
 *
 * ═════════════════════════════════════════════════════════════════════
 *   НАЗНАЧЕНИЕ ФАЙЛА — ПАСПОРТ ПЛАГИНА
 * ═════════════════════════════════════════════════════════════════════
 *
 * Файл `dragstructure.setup.php` — это единственная точка, через
 * которую плагин становится известен ядру Cotonti. Без него плагин
 * для системы не существует: его нет в списке расширений, его
 * невозможно установить, а все вызовы движка, пытающиеся получить
 * метаданные плагина, завершатся неудачей.
 *
 * По своей роли это «паспорт» или «свидетельство о рождении»
 * расширения. Всё, что система знает о плагине до его установки,
 * она берёт из блока `BEGIN_COT_EXT ... END_COT_EXT` в начале
 * этого файла. Всё, что система знает о плагине после установки,
 * записано в таблицах БД и было взято оттуда же при установке.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   МЕСТО В СИСТЕМЕ — ГДЕ И КЕМ ЧИТАЕТСЯ ФАЙЛ
 * ═════════════════════════════════════════════════════════════════════
 *
 * Файл читается ядром Cotonti через функцию `cot_infoget()`
 * (system/extensions.php). Она находит маркеры `[BEGIN_COT_EXT]`
 * и `[END_COT_EXT]` в первых 32 КБ файла, разбирает содержимое
 * как `Key = Value` и возвращает ассоциативный массив.
 *
 * Точки чтения файла в ядре:
 *
 *   1. admin.php?m=extensions
 *      Список расширений и страница «details». Через
 *      `cot_extension_list_info()` ядро сканирует каталоги
 *      `plugins/` и `modules/`, для каждого подкаталога ищет
 *      файл `<code>/<code>.setup.php` и вызывает `cot_infoget()`.
 *      Из полученных данных строятся все карточки расширений
 *      в админке.
 *
 *   2. cot_extension_install() — установка / обновление
 *      При активации расширения ядро обязано прочитать метаданные:
 *      версию, имя, права, зависимости. Без setup-файла установка
 *      завершится ошибкой `ext_setup_not_found`.
 *
 *   3. cot_extension_dependencies_statisfied()
 *      Перед установкой ядро проверяет поля `Requires_modules` и
 *      `Requires_plugins`: все перечисленные зависимости должны
 *      быть установлены, иначе установка блокируется.
 *
 *   4. ExtensionsHelper::getTitle() / getDescription()
 *      Если языковой файл плагина не задаёт `dragstructure_title`
 *      или `dragstructure_description`, ядро берёт значения полей
 *      `Name` и `Description` прямо из setup-файла. Это fallback —
 *      работает всегда, даже если языковой файл отсутствует.
 *
 *   5. admin.php?m=extensions&a=hooks
 *      Просмотр зарегистрированных хуков — не читает setup
 *      напрямую, но использует данные `$db_plugins`, куда они
 *      попали при установке именно из setup-файла (см. ниже).
 *
 *   6. Удаление расширения (`cot_extension_uninstall`)
 *      Ядро перечитывает setup-файл, если нужно выполнить
 *      кастомный обработчик удаления, а также для проверки
 *      зависимостей других расширений.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ЧТО ДЕЛАЕТ ФАЙЛ — ПОЛЯ И ИХ КУДА ЯДРО ЗАПИСЫВАЕТ
 * ═════════════════════════════════════════════════════════════════════
 *
 * Формат блока — построчный `Key = Value`, значения могут содержать
 * пробелы и любые символы, кроме переводов строк.
 *
 *   Code            — Уникальный код плагина. Должен совпадать с
 *                     именем каталога: `plugins/dragstructure/` →
 *                     `Code=dragstructure`. По этому совпадению
 *                     `cot_extension_list_info()` находит файл.
 *                     При установке записывается в:
 *                       $db_core.ct_code,
 *                       $db_auth.auth_option (при auth_code='plug'),
 *                       $db_config.config_cat,
 *                       $db_plugins.pl_code.
 *
 *   Name            — Отображаемое имя. Записывается в:
 *                       $db_core.ct_title,
 *                       $db_plugins.pl_title.
 *                     Используется как fallback в
 *                     ExtensionsHelper::getTitle(), если языковой
 *                     файл не определяет `<code>_title`.
 *
 *   Category        — Категория в списке расширений
 *                     ('administration', 'content', 'commerce',
 *                     'mail', 'misc-ext', 'post-install', ...).
 *                     Не записывается в БД — используется только
 *                     для сортировки и группировки при выводе
 *                     списка. Локализуется через
 *                     $L['ext_cat_<category>'].
 *
 *   Description     — Краткое описание. Записывается в
 *                     $db_plugins.pl_description? — нет: поле
 *                     отсутствует в схеме, описание хранится
 *                     только в самом setup-файле и читается
 *                     на лету. Fallback для
 *                     ExtensionsHelper::getDescription().
 *
 *   Version         — Версия в формате A.B.C. Записывается в
 *                     $db_core.ct_version. По ней ядро сравнивает
 *                     текущую версию с той, что в БД
 *                     (`version_compare`), чтобы определить,
 *                     нуждается ли расширение в обновлении.
 *                     При `$update=true` и совпадении версий
 *                     возвращается COT_EXT_NOTHING_TO_UPDATE.
 *
 *   Date            — Дата выпуска версии (YYYY-MM-DD).
 *                     Используется только для отображения в
 *                     карточке расширения. В БД не пишется.
 *
 *   Author          — Автор. Только для отображения.
 *   Copyright       — Копирайт. Только для отображения.
 *   Notes           — Примечания. Только для отображения.
 *
 *   Auth_guests     — Базовые права для гостей (маска R/W/1..5/A).
 *                     При установке конвертируется через
 *                     `cot_auth_getvalue()` в число и пишется в
 *                     $db_auth.auth_rights для групп
 *                     COT_GROUP_GUESTS и COT_GROUP_INACTIVE.
 *
 *   Lock_guests     — Заблокированные маски для гостей.
 *                     → $db_auth.auth_rights_lock.
 *
 *   Auth_members    — Базовые права для зарегистрированных
 *                     пользователей и произвольных групп.
 *                     → $db_auth.auth_rights.
 *
 *   Lock_members    — Заблокированные маски для пользователей.
 *                     → $db_auth.auth_rights_lock.
 *
 *   ─── Поля для плагина (`Code` — плагин, не модуль) ───
 *
 *   При установке плагина строки в $db_auth пишутся с
 *   `auth_code='plug'` и `auth_option=<Code>`. Это важно помнить
 *   при ручной проверке прав: для плагина dragstructure искать
 *   нужно `auth_code='plug' AND auth_option='dragstructure'`,
 *   а не `auth_code='dragstructure'`.
 *
 *   Специальные группы обрабатываются ядром отдельно:
 *     COT_GROUP_BANNED      → auth_rights=0,  auth_rights_lock=255
 *     COT_GROUP_SUPERADMINS → auth_rights=255, auth_rights_lock=255
 *
 *   Requires_modules   — Список кодов модулей через запятую,
 *                        обязательных для работы плагина.
 *                        Проверяется `cot_extension_dependencies_statisfied()`
 *                        перед установкой. В БД не пишется.
 *
 *   Requires_plugins   — То же для плагинов.
 *   Recommends_modules — Рекомендуемые (не блокируют установку).
 *   Recommends_plugins — Рекомендуемые (не блокируют установку).
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ЧТО ПРОИСХОДИТ ПРИ УСТАНОВКЕ (cot_extension_install)
 * ═════════════════════════════════════════════════════════════════════
 *
 * Порядок действий ядра при активации плагина:
 *
 *   1. Проверка наличия `dragstructure.setup.php`.
 *      Отсутствует → ошибка `ext_setup_not_found`, установка
 *      прерывается.
 *
 *   2. `cot_infoget($setup_file, 'COT_EXT')`.
 *      Блок не найден или повреждён → ошибка `ext_invalid_format`.
 *
 *   3. Проверка `cot_extension_dependencies_statisfied()` по
 *      полям `Requires_*`. Не все зависимости установлены →
 *      ошибки `ext_dependency_error`, установка прерывается.
 *
 *   4. Сканирование каталога плагина: каждый файл
 *      `dragstructure[.<part>].php` (кроме `setup`, `install`,
 *      `uninstall`, `configure` из списка
 *      `$cot_ext_ignore_parts`) читается так же через
 *      `cot_infoget($file, 'COT_EXT')` — из него берётся блок
 *      `Hooks` и `Order`. Все найденные хуки регистрируются
 *      в `$db_plugins` через `cot_plugin_add()`:
 *        pl_code = dragstructure,
 *        pl_part = <part из имени файла>,
 *        pl_file = dragstructure/dragstructure.<part>.php,
 *        pl_hook = tools | ajax,
 *        pl_order = 10 (по умолчанию),
 *        pl_active = 1,
 *        pl_module = 0.
 *
 *   5. `cot_extension_add($code, $name, $version, $is_plug=true)` —
 *      запись в `$db_core`:
 *        ct_code = dragstructure,
 *        ct_title = Drag & Drop Structure,
 *        ct_version = 2.0.0,
 *        ct_plug = 1.
 *
 *   6. Запись прав в `$db_auth` для всех групп (кроме групп
 *      с `skiprights`) по полям `Auth_guests`, `Lock_guests`,
 *      `Auth_members`, `Lock_members`.
 *
 *   7. Если в каталоге есть `setup/dragstructure.install.sql` —
 *      выполняется. У dragstructure его нет (своих таблиц
 *      плагин не создаёт).
 *
 *   8. Если есть `setup/dragstructure.install.php` — выполняется.
 *      У dragstructure его нет.
 *
 *   9. `$cache->clear()`, `cot_auth_reorder()` — сброс кеша и
 *      пересортировка прав.
 *
 *   Хук `extension.install.done` вызывается после всех шагов.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ЧТО ПРОИСХОДИТ ПРИ ОБНОВЛЕНИИ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   При `$update = true`:
 *
 *   - Сравнивается `$info['Version']` (из setup-файла) с
 *     `$db_core.ct_version`. Если версии равны и `$force_update`
 *     выключен → возвращается `COT_EXT_NOTHING_TO_UPDATE`,
 *     ничего не меняется.
 *   - Иначе: старые привязки хуков удаляются из `$db_plugins`
 *     (`cot_plugin_remove`), затем сканируется каталог, читаются
 *     `BEGIN_COT_EXT` из каждого файла и хуки регистрируются
 *     заново с актуальными `Hooks` и `Order`.
 *   - Обновляются только `auth_rights_lock` в `$db_auth` — сами
 *     права (`auth_rights`) не трогаются, чтобы не потерять
 *     настройки администратора.
 *   - Выполняются патчи из `setup/` (если есть).
 *   - Обновляется `$db_core.ct_version`.
 *
 *   Хук `extension.update.done` вызывается в конце.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ЧТО ПРОИСХОДИТ ПРИ УДАЛЕНИИ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   При `cot_extension_uninstall`:
 *
 *   - Удаляются все записи из `$db_plugins` с `pl_code='dragstructure'`.
 *   - Удаляются записи из `$db_auth` (`auth_code='plug'` и
 *     `auth_option='dragstructure'`).
 *   - Удаляются записи из `$db_config` (`config_cat='dragstructure'`).
 *   - Удаляется запись из `$db_core` (`ct_code='dragstructure'`).
 *   - Setup-файл сам по себе не удаляется — он остаётся в каталоге
 *     до тех пор, пока администратор не удалит файлы плагина
 *     вручную.
 *   - Если у плагина не было установочных SQL/ PHP-скриптов,
 *     дополнительных действий не выполняется.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ПОЧЕМУ setup.php НЕ РЕГИСТРИРУЕТСЯ КАК ХУК
 * ═════════════════════════════════════════════════════════════════════
 *
 *   В system/extensions.php есть список:
 *
 *     $cot_ext_ignore_parts = ['configure', 'install', 'setup', 'uninstall'];
 *
 *   Ядро при сканировании каталога пропускает файлы с этими
 *   суффиксами и не пытается зарегистрировать их как обработчики
 *   хуков. Это важно понимать: `dragstructure.setup.php` — не
 *   хук-файл, а метаданные. Хук-файлы плагина — это
 *   `dragstructure.tools.php` (хук `tools`) и
 *   `dragstructure.ajax.php` (хук `ajax`). Каждый из них имеет
 *   свой собственный маленький блок `[BEGIN_COT_EXT]`, где
 *   указано поле `Hooks=...`.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   РОЛЬ ПЛАГИНА В АРХИТЕКТУРЕ COTONTI
 * ═════════════════════════════════════════════════════════════════════
 *
 *   Плагин (plug), а не модуль (module):
 *     - не объявляет собственную область структуры;
 *     - не имеет публичной части (работает только в админ-панели);
 *     - не создаёт собственных таблиц в БД;
 *     - подключается через два хука: 'tools' и 'ajax'.
 *
 *   Универсальность: плагин работает со всеми областями структуры,
 *   объявившими хук 'structure.extensions' — включая page, market,
 *   forums, folio, usercategories и любые сторонние расширения.
 *
 *   Плагин работает исключительно с существующей таблицей
 *   `*_structure`, предоставляя администратору визуальный интерфейс
 *   управления порядком и иерархией категорий через drag-and-drop,
 *   с автоматическим пересчётом числовых путей `structure_path`
 *   по правилам Cotonti.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ХУКИ ПЛАГИНА (регистрируются при установке)
 * ═════════════════════════════════════════════════════════════════════
 *
 *   tools  → dragstructure.tools.php
 *            Точка входа админ-страницы:
 *            admin.php?m=other&p=dragstructure
 *
 *   ajax   → dragstructure.ajax.php
 *            AJAX-эндпоинт: plug.php?r=dragstructure
 *            Принимает POST с новым порядком категорий,
 *            возвращает JSON.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   СОСТАВ ПЛАГИНА
 * ═════════════════════════════════════════════════════════════════════
 *
 *   plugins/dragstructure/
 *   ├── dragstructure.setup.php           ← этот файл (метаданные)
 *   ├── dragstructure.tools.php           ← хук 'tools'
 *   ├── dragstructure.ajax.php            ← хук 'ajax'
 *   ├── inc/
 *   │   └── dragstructure.functions.php   ← бизнес-логика (API)
 *   ├── tpl/
 *   │   └── dragstructure.tools.tpl       ← шаблон админ-страницы
 *   └── lang/
 *       ├── dragstructure.ru.lang.php
 *       └── dragstructure.en.lang.php
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ПРАВА ДОСТУПА
 * ═════════════════════════════════════════════════════════════════════
 *
 *   После установки страница плагина доступна пользователям,
 *   удовлетворяющим хотя бы одному условию:
 *
 *     cot_auth('admin', 'a')                  — администратор сайта;
 *     cot_auth('plug', 'dragstructure', 'A')  — право 'A' на плагин.
 *
 *   Права назначаются группе «Администраторы» через раздел
 *   «Права» (admin.php?m=rights). На боевом сайте не
 *   рекомендуется выдавать право 'A' на dragstructure кому-либо,
 *   кроме администраторов, поскольку плагин меняет структуру сайта.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ЗАВИСИМОСТИ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   Обязательных зависимостей от модулей или плагинов нет — поля
 *   `Requires_modules` и `Requires_plugins` пусты. Единственное
 *   практическое требование — наличие в системе хотя бы одной
 *   области структуры (page, market, forums и т.д.). Если список
 *   пуст, плагин покажет 404 с сообщением 'dragstructure_no_ext'.
 *
 *   Внешняя JS-зависимость: SortableJS (CDN jsdelivr в шаблоне).
 *   При необходимости может быть заменена на локальную копию без
 *   изменения PHP-кода плагина.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   СВЯЗАННЫЕ ССЫЛКИ
 * ═════════════════════════════════════════════════════════════════════
 *
 *   ReadMeMore:       https://abuyfile.com/market/cotonti/plugs/dragstructure
 *   Support:          https://abuyfile.com/forums/cotonti/custom/
 *   Source:           https://github.com/webitproff/dragstructure-cotonti
 *   Cotonti:          https://github.com/Cotonti/Cotonti
 *   SortableJS:       https://github.com/SortableJS/Sortable
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
