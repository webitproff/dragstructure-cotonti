<!--
	/********************************************************************************
	* File: plugins/dragstructure/tpl/dragstructure.tools.tpl
	* Extension: Plugin 'dragstructure'
	* Description: Шаблон страницы «Drag & Drop структура» в админ-панели.
	*              Отображает:
	*                - заголовок и переключатель расширения (ext);
	*                - кнопку «Нормализовать пути» (a=normalize);
	*                - контейнер, в который JavaScript строит дерево
	*                  категорий по данным из CATS_JSON;
	*                - блок предупреждения, если категорий нет.
	*
	* Назначение
	* ----------
	* Шаблон вызывается из plugins/dragstructure/dragstructure.tools.php
	* через cot_tplfile('dragstructure.tools', 'plug', true). Ищется
	* в следующем порядке:
	*   1. themes/<admin_theme>/plugins/dragstructure/dragstructure.tools.tpl
	*   2. themes/<admin_theme>/plugins/dragstructure.tools.tpl
	*   3. plugins/dragstructure/tpl/dragstructure.tools.tpl   ← этот файл
	* Третий аргумент `true` включает поиск в админ-теме. Если файл
	* не найден — XTemplate бросит исключение, поэтому шаблон должен
	* идти в поставке плагина.
	*
	* Блоки
	* -----
	*   MAIN          — корневой блок, парсится в tools.php.
	*   NO_CATS       — предупреждение «категорий нет». Парсится в
	*                   tools.php при empty($categories). Строка берётся
	*                   из $L['dragstructure_no_cats'].
	*
	* Теги, которые присваивает dragstructure.tools.php
	* ------------------------------------------------
	*   {PHP.L.*}         — языковые строки ядра и плагина:
	*                       dragstructure_title, dragstructure_select_ext,
	*                       dragstructure_normalize, dragstructure_normalize_confirm,
	*                       dragstructure_no_cats.
	*   {EXT}             — код активного расширения (structure_area,
	*                       например 'page', 'market', 'forums').
	*   {EXT_LIST}        — готовый HTML <select> со списком расширений,
	*                       поддерживающих структуру. Автосабмит
	*                       переключает ext через GET.
	*   {FORM_ACTION}     — action формы-переключателя (URL текущей
	*                       страницы с сохранением ext).
	*   {X_TOKEN}         — CSRF-токен Cotonti (Cot::$sys['xk']).
	*                       Передаётся в data-x корневого блока
	*                       и уходит в AJAX как POST-параметр x.
	*   {AJAX_URL}        — endpoint AJAX-ручки, сгенерированный
	*                       через cot_url('plug', ['r' => 'dragstructure']).
	*                       ВАЖНО: без параметра e= — иначе Cotonti
	*                       будет искать standalone-хук, которого нет.
	*   {CATS_JSON}       — JSON-массив всех категорий области:
	*                       { id, code, title, desc, path, parentPath }.
	*                       Вставляется в JS как `let currentCats = {CATS_JSON};`.
	*                       Сервер экранирует JSON флагами
	*                       JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
	*                       — это защита от XSS при вставке в <script>.
	*   {NORMALIZE_URL}   — ссылка на действие a=normalize с уже
	*                       подставленным GET-токеном x=Cot::$sys['xk'].
	*                       tools.php дополнительно проверяет его
	*                       через cot_check_xg().
	*
	* Зависимости
	* -----------
	*   Bootstrap 5.3+  — сетка, классы list-group, btn, alert.
	*                     Подключается админ-темой (CotCP или другой),
	*                     отдельно в этом шаблоне не подключается.
	*   Font Awesome    — иконки fa-sitemap, fa-broom, fa-grip-vertical.
	*                     Подключается админ-темой.
	*   SortableJS      — библиотека drag-and-drop. В этом шаблоне
	*                     подключена с CDN:
	*                     https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js
	*                     Если админ-тема уже подключает SortableJS —
	*                     CDN-версию из шаблона можно удалить.
	*
	* Структура DOM и JS
	* ------------------
	*   <div id="drag-structure">     — корень, хранит data-ext,
	*                                   data-x, data-ajax-url.
	*   <div id="category-tree">      — контейнер дерева; заполняется
	*                                   JS из CATS_JSON. Атрибут
	*                                   data-parent-id="0" отмечает,
	*                                   что это корневой уровень.
	*   .category-item                — обёртка категории; содержит:
	*                                     - data-id (structure_id);
	*                                     - .category-handle — иконка-
	*                                       ручка для SortableJS;
	*                                     - метаданные: <code>path</code>,
	*                                       code, title, desc;
	*                                     - .category-children —
	*                                       контейнер для дочерних
	*                                       категорий, с data-parent-id
	*                                       = id текущей категории.
	*
	*   JS-логика (без отдельного файла):
	*     - buildByParent(cats) группирует категории по parentPath
	*       и сортирует сегменты по числовому значению сегментов
	*       пути (localeCompare с { numeric: true }).
	*     - render(cats) перерисовывает всё дерево заново; вызывается
	*       после каждого успешного AJAX-ответа, чтобы пути и уровни
	*       в DOM всегда совпадали с БД.
	*     - initSortable(el) рекурсивно инициализирует SortableJS
	*       на корне и на всех .category-children. Группа 'categories'
	*       с pull/put позволяет перетаскивать между любыми уровнями.
	*     - forceFallback: true и fallbackOnBody: true — обход
	*       проблем нативного HTML5 drag во вложенных контейнерах.
	*     - onEnd отправляет POST на AJAX_URL с полями:
	*         x        — CSRF;
	*         ext      — область;
	*         parent_id — id контейнера, куда сбросили (0 для корня);
	*         order[]  — id в новом порядке следования.
	*       Формат тела — application/x-www-form-urlencoded через
	*       URLSearchParams; order[] собирается через append(),
	*       чтобы PHP получил массив, а не строку "1,2,3".
	*
	*   На успех (data.success === true):
	*     - если пришёл data.categories — render() перерисовывает
	*       дерево из этих данных;
	*     - иначе — location.reload() как фолбэк.
	*   На ошибку (data.success === false):
	*     - alert с data.message;
	*     - location.reload() — чтобы привести DOM к реальному
	*       состоянию БД.
	*   На сетевую ошибку / не-JSON:
	*     - console.error с объектом ошибки;
	*     - alert 'Network error';
	*     - location.reload().
	*
	*   Перезагрузка на ошибке осознанна: если сервер вернул
	*   отказ, локальный DOM уже разъехался с БД после перетаскивания,
	*   и восстанавливать его руками на клиенте нет смысла.
	*
	* Безопасность
	* ------------
	*   - CSRF: X-токен в data-x и в каждом POST-запросе. Бэкенд
	*     проверяет cot_check_xp(); при несовпадении — 400.
	*   - XSS: CATS_JSON экранируется флагами JSON_HEX_* при
	*     json_encode на сервере; title/desc/code категории
	*     вставляются в HTML через конкатенацию строк — сервер
	*     должен отдавать их уже прогнанными через htmlspecialchars()
	*     (это делает dragstructure_get_categories()).
	*   - Права: интерфейс доступен только администратору
	*     (проверка в dragstructure.tools.php); если открыть страницу
	*     без прав — cot_block() уведёт на 403.
	*
	* Локализация
	* -----------
	*   Все строки интерфейса — через {PHP.L.*}. Ключи должны быть
	*   определены в plugins/dragstructure/lang/dragstructure.<lang>.lang.php:
	*     dragstructure_title
	*     dragstructure_select_ext
	*     dragstructure_normalize
	*     dragstructure_normalize_confirm
	*     dragstructure_no_cats
	*     dragstructure_saved        (используется в AJAX-ответе)
	*     dragstructure_normalized   (используется в cot_message после normalize)
	*     dragstructure_no_ext       (используется в cot_die_message(404))
	*
	* Соответствие «тег → источник»
	* ----------------------------
	*   {EXT}           ← dragstructure.tools.php: $t->assign(['EXT' => $ext])
	*   {EXT_LIST}      ← cot_selectbox(...)
	*   {FORM_ACTION}   ← cot_url('admin', ['m'=>'other','p'=>'dragstructure','ext'=>$ext])
	*   {X_TOKEN}       ← Cot::$sys['xk']
	*   {AJAX_URL}      ← cot_url('plug', ['r' => 'dragstructure'])
	*   {CATS_JSON}     ← json_encode(dragstructure_get_categories($ext), JSON_HEX_*)
	*   {NORMALIZE_URL} ← cot_url('admin', [... 'a'=>'normalize', 'x'=>Cot::$sys['xk']])
	*   {PHP.L.*}       ← Cot::$L['*'] после require cot_langfile('dragstructure', 'plug')
	*
	* Theme:   любая админ-тема Cotonti v1.0.0+
	* Version: 2.0.1
	* Created: 22 Oct 2026
	* Updated: 29 Oct 2026
	* Copyright (c) 2026 webitproff | https://github.com/webitproff
	* License: BSD (Free distribution with saving Copyright (c) 2026 webitproff)
	********************************************************************************/
-->

<!-- BEGIN: MAIN -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h2 class="h3 mb-0">
        <i class="fa-solid fa-sitemap me-2"></i>{PHP.L.dragstructure_title}
	</h2>
    <form method="get" action="{FORM_ACTION}" class="d-flex gap-2 align-items-center">
        <input type="hidden" name="m" value="other">
        <input type="hidden" name="p" value="dragstructure">
        <label class="form-label mb-0">{PHP.L.dragstructure_select_ext}:</label>
        {EXT_LIST}
	</form>
	<!-- IF {PHP.cfg.plugin.dragstructure.normalize_confirm} -->
	<div class="mb-3">
		<a href="{NORMALIZE_URL}"
		class="btn btn-outline-danger btn-sm"
		onclick="return confirm('{PHP.L.dragstructure_normalize_confirm}');">
			<i class="fa-solid fa-broom me-1"></i>{PHP.L.dragstructure_normalize}
		</a>
	</div>
	<!-- ENDIF -->
</div>

{FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}

<div id="drag-structure"
data-ext="{EXT}"
data-x="{X_TOKEN}"
data-ajax-url="{AJAX_URL}">
    <div id="category-tree" class="list-group" data-parent-id="0"></div>
    <!-- BEGIN: NO_CATS -->
    <div class="alert alert-info">{PHP.L.dragstructure_no_cats}</div>
    <!-- END: NO_CATS -->
</div>

<style>
    .category-item { cursor: grab; }
    .category-item:active { cursor: grabbing; }
    .category-item.sortable-ghost { opacity: .4; background-color: #e9ecef; }
    .category-item.sortable-chosen { background-color: #f8f9fa; }
    .category-children {
	min-height: 20px;
	margin-left: 1.75rem;
	border-left: 2px dashed #dee2e6;
	padding: 4px 0 4px .5rem;
    }
    .category-handle { cursor: grab; }
</style>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
	(function () {
		const root = document.getElementById('drag-structure');
		if (!root) return;
		
		const ext     = root.dataset.ext;
		const xToken  = root.dataset.x;
		const ajaxUrl = root.dataset.ajaxUrl;
		const rootEl  = document.getElementById('category-tree');
		
		let currentCats = {CATS_JSON};
		
		function buildByParent(cats) {
			const byParent = {};
			cats.forEach(c => {
				const key = c.parentPath || '';
				(byParent[key] = byParent[key] || []).push(c);
			});
			Object.keys(byParent).forEach(k => {
				byParent[k].sort((a, b) => a.path.localeCompare(b.path, undefined, { numeric: true }));
			});
			return byParent;
		}
		
		function buildNode(cat) {
			const node = document.createElement('div');
			node.className = 'list-group-item category-item';
			node.dataset.id = cat.id;
			node.innerHTML =
            '<div class="d-flex align-items-center">' +
			'<i class="fa-solid fa-grip-vertical me-2 text-muted category-handle"></i>' +
			'<div class="flex-grow-1">' +
			'<code class="me-2">' + cat.path + '</code>' +
			'<strong>' + cat.code + '</strong> — ' + cat.title +
			(cat.desc ? '<div class="small text-muted">' + cat.desc + '</div>' : '') +
			'</div>' +
            '</div>' +
            '<div class="category-children" data-parent-id="' + cat.id + '"></div>';
			return node;
		}
		
		function render(cats) {
			rootEl.innerHTML = '';
			const byParent = buildByParent(cats);
			function walk(parentPath, container) {
				(byParent[parentPath] || []).forEach(cat => {
					const node = buildNode(cat);
					container.appendChild(node);
					walk(cat.path, node.querySelector('.category-children'));
				});
			}
			walk('', rootEl);
			initSortable(rootEl);
		}
		
		function initSortable(el) {
			new Sortable(el, {
				group: { name: 'categories', pull: true, put: true },
				handle: '.category-handle',
				animation: 200,
				forceFallback: true,
				fallbackOnBody: true,
				swapThreshold: 0.5,
				emptyInsertThreshold: 5,
				ghostClass: 'sortable-ghost',
				chosenClass: 'sortable-chosen',
				onEnd(evt) {
					const toEl = evt.to;
					const parentId = parseInt(toEl.dataset.parentId || '0', 10);
					
					const order = Array.from(toEl.children)
                    .filter(n => n.classList.contains('category-item'))
                    .map(n => parseInt(n.dataset.id, 10));
					
					const body = new URLSearchParams();
					body.set('x', xToken);
					body.set('ext', ext);
					body.set('parent_id', parentId);
					order.forEach(id => body.append('order[]', id));
					
					fetch(ajaxUrl, {
						method: 'POST',
						headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
						body
					})
					.then(r => r.json())
					.then(data => {
						if (!data.success) {
							alert(data.message || 'Error');
							location.reload();
							return;
						}
						if (Array.isArray(data.categories)) {
							currentCats = data.categories;
							render(currentCats);
							} else {
							location.reload();
						}
					})
					.catch(err => {
						console.error(err);
						alert('Network error');
						location.reload();
					});
				}
			});
			el.querySelectorAll(':scope > .category-item > .category-children').forEach(initSortable);
		}
		
		render(currentCats);
	})();
</script>

<!-- IF {PHP.cfg.debug_mode} AND {PHP.usr.isadmin} -->
<!-- IF {PHP|function_exists('cot_debug_tpl_url')} -->
<div class="alert alert-secondary mt-5" role="alert">
	<div class="fw-semibold mb-2">{PHP.L.cotcp_path_current_tpl}</div>
	<div class="text-danger fw-semibold">{PHP|cot_debug_tpl_url()}</div>
</div>
<!-- ENDIF -->
<!-- ENDIF -->


<!-- END: MAIN -->
