<?php
/**
 * English Localization File for the Plugin "Drag & Drop Structure"
 * for Cotonti CMF v1.+, PHP 8.4+, MySQL 8.4
 *
 * ═════════════════════════════════════════════════════════════════════
 *   FILE PURPOSE — PLUGIN LANGUAGE PACK
 * ═════════════════════════════════════════════════════════════════════
 *
 * The file `lang/dragstructure.en.lang.php` is the English localization
 * of the Drag & Drop Structure plugin. It defines all language strings
 * the plugin outputs in the administrative interface and in AJAX
 * responses.
 *
 * In terms of role, this is a translation dictionary: Cotonti loads it
 * through the built-in function `cot_langfile()` and puts the values
 * into the global `Cot::$L` array. Every place in the plugin that needs
 * to display text to the user reads it from `Cot::$L['<key>']`.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   PLACE IN THE SYSTEM — WHERE AND BY WHOM THE FILE IS READ
 * ═════════════════════════════════════════════════════════════════════
 *
 * The language file is loaded through the built-in Cotonti function
 * `cot_langfile($name, $type, $default, $lang)`. It searches for the
 * file in several locations in order of priority:
 *
 *   1. langs/<lang>/plugins/<code>.<lang>.lang.php
 *   2. plugins/<code>/lang/<code>.<lang>.lang.php
 *   3. plugins/<code>/lang/<code>.<default>.lang.php  (fallback to en)
 *
 * For dragstructure, paths (2) and (3) are relevant:
 *
 *   plugins/dragstructure/lang/dragstructure.en.lang.php   ← this file
 *   plugins/dragstructure/lang/dragstructure.ru.lang.php   ← Russian
 *
 * Points where the file is loaded in the plugin:
 *
 *   1. dragstructure.tools.php
 *      `require_once cot_langfile('dragstructure', 'plug');`
 *      Loads strings for the admin tool page.
 *
 *   2. dragstructure.ajax.php
 *      `require_once cot_langfile('dragstructure', 'plug');`
 *      Loads strings for AJAX responses (in particular —
 *      `dragstructure_saved`).
 *
 *   3. ExtensionsHelper::getTitle() / getDescription() in the core
 *      If the key `dragstructure_title` is defined in the file, it is
 *      used as the plugin name in the admin extensions list (instead
 *      of `Name` from the setup file). Similarly,
 *      `dragstructure_description` is used instead of `Description`
 *      from the setup file. This is the preferred way to localize the
 *      extension name and description.
 *
 *   Priority of name sources in ExtensionsHelper::getTitle():
 *     dragstructure_title → plu_title → info_name → setup.Name
 *   Priority of description sources in getDescription():
 *     dragstructure_description → info_desc → setup.Description
 *
 *   Therefore, the `dragstructure_title` and `dragstructure_description`
 *   keys in this file are not just interface strings, but the
 *   "official" localized name and description of the plugin in the
 *   Cotonti admin panel.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   KEYS AND THEIR PURPOSE
 * ═════════════════════════════════════════════════════════════════════
 *
 *   dragstructure_title
 *     Title of the plugin page in the admin panel. Read in
 *     dragstructure.tools.php as `Cot::$L['dragstructure_title']`
 *     (for `$adminTitle` and breadcrumbs). Also read by the core
 *     through ExtensionsHelper::getTitle() as the localized plugin
 *     name in the extensions list.
 *     In the template: `{PHP.L.dragstructure_title}`.
 *
 *   dragstructure_select_ext
 *     Label for the "Extension" dropdown (selection of the structure
 *     area: page, market, forums, etc.).
 *     In the template: `{PHP.L.dragstructure_select_ext}`.
 *
 *   dragstructure_no_cats
 *     Warning in the plugin interface when the selected area has no
 *     categories. Parsed by the `MAIN.NO_CATS` block in
 *     dragstructure.tools.tpl.
 *     In the template: `{PHP.L.dragstructure_no_cats}`.
 *
 *   dragstructure_no_ext
 *     Terminal 404 error message (cot_die_message) when no extension
 *     in the system has declared the `structure.extensions` hook.
 *     Occurs, for example, if no structure-enabled module (page,
 *     market, etc.) is installed. Read in dragstructure.tools.php
 *     directly.
 *
 *   dragstructure_saved
 *     Success message about saving the new category order. Passed in
 *     the JSON response of the AJAX handler (dragstructure.ajax.php)
 *     when `$error === null`. The client receives it in the `message`
 *     field and can show it in the UI as confirmation of the operation.
 *
 *   dragstructure_error
 *     Generic structure save error message. Can be used as a fallback
 *     when displaying AJAX errors on the client (currently the JS
 *     outputs `data.message` from the server response, but if needed,
 *     this key can be used for localized client-level messages).
 *
 *   dragstructure_normalize
 *     Caption on the red "Normalize paths" button at the top of the
 *     plugin page. When clicked, the action `a=normalize` is performed
 *     (rebuilding all paths of the area into a flat list 010, 020,
 *     030...).
 *     In the template: `{PHP.L.dragstructure_normalize}`.
 *
 *   dragstructure_normalize_confirm
 *     Confirmation dialog text when clicking the "Normalize paths"
 *     button. Embedded in the JS handler
 *     `onclick="return confirm(...)"`. Warns the administrator that
 *     the hierarchy will be lost and can only be restored manually.
 *     In the template: `{PHP.L.dragstructure_normalize_confirm}`.
 *
 *   dragstructure_normalized
 *     Result message of the normalization operation:
 *     "Categories normalized: N". Read in dragstructure.tools.php
 *     via `cot_rc('dragstructure_normalized', ['count' => $updated])`.
 *     The `{$count}` placeholder is substituted with the actual number
 *     of changed records.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   FORMAT CONVENTIONS
 * ═════════════════════════════════════════════════════════════════════
 *
 *   - Key prefix: `dragstructure_` — mandatory for all plugin keys.
 *     This eliminates collisions with core and other extension keys.
 *   - File format: `<?php defined('COT_CODE') or die('Wrong URL.');`
 *     on the first line — protection against direct browser access.
 *   - Encoding: UTF-8 without BOM.
 *   - Placeholders like `{$name}` are used in cot_rc() and substituted
 *     through arguments; do not confuse with the CoTemplate syntax
 *     `{PHP.L.*}`.
 *   - Strings for the template — values only, no HTML. Markup is
 *     defined in dragstructure.tools.tpl.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   ADDING A NEW LANGUAGE
 * ═════════════════════════════════════════════════════════════════════
 *
 *   1. Copy `dragstructure.en.lang.php` to
 *      `dragstructure.<lang>.lang.php`, where `<lang>` is the Cotonti
 *      language code (`ru`, `de`, `fr`, `uk`, ...).
 *   2. Translate the values, keep the keys unchanged.
 *   3. Save in UTF-8 encoding without BOM.
 *   4. Verify that all keys used in the template
 *      (`{PHP.L.dragstructure_*}`) and in PHP (`Cot::$L[...]`) are
 *      present in the file. The list of used keys is given in the
 *      "KEYS AND THEIR PURPOSE" section above.
 *
 *   If a key is missing in the target language, Cotonti will take the
 *   value from the fallback file `dragstructure.en.lang.php`. If the
 *   key is missing there too, the template will show the raw
 *   `{PHP.L.dragstructure_*}` name.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   RELATED FILES
 * ═════════════════════════════════════════════════════════════════════
 *
 *   plugins/dragstructure/lang/dragstructure.ru.lang.php
 *     Russian localization — the primary language for this plugin.
 *
 *   plugins/dragstructure/dragstructure.tools.php
 *     Reads `dragstructure_title`, `dragstructure_no_ext`,
 *     `dragstructure_normalized` (via cot_rc).
 *
 *   plugins/dragstructure/dragstructure.ajax.php
 *     Reads `dragstructure_saved` for the `message` field
 *     in the JSON response.
 *
 *   plugins/dragstructure/tpl/dragstructure.tools.tpl
 *     Reads all keys via `{PHP.L.*}`:
 *       dragstructure_title, dragstructure_select_ext,
 *       dragstructure_no_cats, dragstructure_normalize,
 *       dragstructure_normalize_confirm.
 *
 * ═════════════════════════════════════════════════════════════════════
 *   RELATED LINKS
 * ═════════════════════════════════════════════════════════════════════
 *
 *   ReadMeMore:       https://abuyfile.com/market/cotonti/plugs/dragstructure
 *   Support:          https://abuyfile.com/forums/cotonti/custom/
 *   Source:           https://github.com/webitproff/dragstructure-cotonti
 *   Cotonti:          https://github.com/Cotonti/Cotonti
 *
 * ─────────────────────────────────────────────────────────────────────
 *
 * Date: Oct 22, 2026
 * @package dragstructure
 * @version 2.0.0
 * @author webitproff
 * @copyright Copyright (c) 2026 webitproff | https://github.com/webitproff/dragstructure-cotonti
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');


$L['dragstructure_title']      = 'Drag & Drop Structure';
$L['dragstructure_select_ext'] = 'Extension';
$L['dragstructure_no_cats']    = 'Categories not found';
$L['dragstructure_no_ext']     = 'No extensions with structure support';
$L['dragstructure_saved']      = 'Structure saved';
$L['dragstructure_error']      = 'Error saving structure';

$L['dragstructure_normalize']    = 'Normalize paths';
$L['dragstructure_normalize_confirm'] = 'All category paths will be rebuilt into a flat list (100, 110, 120...). All categories will become parent ones. The hierarchy will be lost and can only be restored manually. Continue?';
$L['dragstructure_normalized']   = 'Categories normalized: {$count}';