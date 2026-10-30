<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]
==================== */

/**
 * DragStructure — AJAX-обработчик перемещения категорий структуры.
 *
 * Файл: plugins/dragstructure/dragstructure.ajax.php
 *
 * Назначение
 * ----------
 * Единственная точка приёма AJAX-запросов от интерфейса drag-and-drop
 * на странице плагина (`admin.php?m=other&p=dragstructure`). Вызывается
 * фронтендом через `fetch()` на URL вида `plug.php?r=dragstructure`
 * при завершении перетаскивания (SortableJS, событие `onEnd`).
 *
 * Обработчик принимает новый порядок id в контейнере, куда был сброшен
 * элемент, валидирует права и CSRF, передаёт данные в бизнес-логику
 * (dragstructure_move()) и возвращает JSON-ответ. Никаких других
 * действий — ни рендеринга, ни подключения шаблонов — файл не делает.
 *
 * Регистрация
 * -----------
 * Хук `ajax` в блоке `BEGIN_COT_EXT`. Cotonti находит этот файл по
 * коду плагина из параметра `r=` в URL и подключает через `include` в
 * system/plug.php. Хук `ajax` не подключает шапку, подвал и прочие
 * элементы страницы — только выполняет код файла.
 *
 * Формат запроса
 * --------------
 * Метод: POST (form-urlencoded).
 * Параметры:
 *   - `x`         — CSRF-токен Cotonti (`Cot::$sys['xk']`). Проверяется
 *                   через `cot_check_xp()`. Без валидного токена —
 *                   400 и отказ.
 *   - `ext`       — код расширения (область структуры, `structure_area`).
 *                   Приводится фильтром `ALP`.
 *   - `order[]`   — массив `structure_id` в новом порядке следования
 *                   внутри целевого родителя. Первый элемент — самый
 *                   верхний в интерфейсе. Может прийти как массив или
 *                   как строка `"1,2,3"` (fallback ниже по коду).
 *   - `parent_id` — `structure_id` нового родителя; `0` — корневой
 *                   уровень. Приводится к int.
 *
 * Формат ответа
 * -------------
 * Всегда JSON, `Content-Type: application/json; charset=utf-8`.
 * Успех:
 *   {
 *     "success": true,
 *     "message": "Структура сохранена",
 *     "categories": [ {id,code,title,desc,path,parentPath}, ... ]
 *   }
 * Поле `categories` содержит полный актуальный список категорий
 * области после пересчёта путей. Фронтенд по нему перерисовывает
 * дерево без полной перезагрузки страницы.
 *
 * Ошибка:
 *   { "success": false, "message": "<текст>" }
 * Дополнительно выставляется HTTP-код:
 *   403 — нет прав;
 *   400 — невалидный CSRF, невалидный/пустой order, ошибка бизнес-логики;
 *   500 — исключение внутри try-блока (см. catch ниже).
 *
 * Авторизация
 * -----------
 * Доступ разрешён при выполнении хотя бы одного из условий:
 *   - текущий пользователь имеет право `A` на раздел `admin`
 *     (`cot_auth('admin', 'a')`);
 *   - текущий пользователь имеет право `A` на плагин `dragstructure`.
 * Иначе — 403 и `{"success": false, "message": "Forbidden"}`.
 *
 * CSRF
 * ----
 * Проверка `cot_check_xp()` — штатный механизм Cotonti. Токен приходит
 * из `data-x` (передаётся в шаблоне из `Cot::$sys['xk']`) и уходит в
 * POST как `x`. При несовпадении — 400 и
 * `{"success": false, "message": "Invalid CSRF token"}`.
 *
 * Защита вывода
 * -------------
 * Перед try-блоком:
 *   - `ini_set('display_errors', '0')` и `error_reporting(0)` — чтобы
 *     предупреждения PHP не сломали JSON;
 *   - `ob_start()` — чтобы любой побочный вывод (BOM, случайный echo)
 *     можно было отбросить через `ob_end_clean()` прямо перед отправкой
 *     ответа.
 * Все ветки выполнения завершаются `echo json_encode($response); exit;`
 * строго после `ob_end_clean()` и `header('Content-Type: ...')`.
 *
 * Поведение бизнес-логики
 * -----------------------
 * Вся работа с БД и пересчёт путей лежат в `dragstructure_move()`
 * (см. plugins/dragstructure/inc/dragstructure.functions.php).
 * Здесь — только приём параметров, санитайз и вызов.
 * `dragstructure_move()`:
 *   - валидирует возможность перемещения (существование id, отсутствие
 *     цикла «перемещение в собственного потомка»);
 *   - в транзакции пересчитывает `structure_path` для перемещаемого
 *     поддерева (корни — трёхзначные с шагом 10, наследники —
 *     трёхзначные с шагом 1, см. документацию функции);
 *   - очищает кеш Cotonti;
 *   - пишет запись в лог через `cot_log`;
 *   - возвращает `null` при успехе или строку с текстом ошибки.
 *
 * Санитайз order
 * --------------
 * До вызова dragstructure_move():
 *   - защита от строки `"1,2,3"` вместо массива — `explode(',', ...)`;
 *   - `array_map('intval', ...)` — приведение к int;
 *   - `array_unique()` — убирает дубли;
 *   - `array_filter($v > 0)` — отбрасывает 0 и отрицательные значения.
 * Пустой `order` после санитайза — 400 и `{"success": false, "message": "Empty order"}`.
 *
 * Зависимости
 * -----------
 *   - cot_incfile('dragstructure', 'plug')  — подключает
 *     inc/dragstructure.functions.php с dragstructure_move() и др.;
 *   - cot_langfile('dragstructure', 'plug') — языковые строки плагина
 *     (для `Cot::$L['dragstructure_saved']`).
 *
 * Логирование
 * -----------
 * Обработчик сам не логирует. Запись в лог делает dragstructure_move()
 * через `cot_log('Structure. Drag&drop reorder ...', 'adm', 'structure', 'update')`.
 * Это гарантирует, что неуспешные попытки (отклонённые валидацией до
 * транзакции) не попадут в лог как успешные изменения.
 *
 * Ограничения
 * -----------
 *   - при исключении PHP внутри try-блока возвращается 500 и текст
 *     исключения — этого достаточно для отладки, но детальная информация
 *     (стектрейс) в ответ не попадает;
 *   - CSRF-проверка идёт до любых операций с БД — параллельные запросы
 *     с устаревшим токеном отсекаются в первую очередь;
 *   - при параллельном редактировании (два администратора одновременно)
 *     возможна ситуация «id из order уже удалён» — валидация в
 *     dragstructure_validate_move() вернёт `Category #N not found`,
 *     и фронтенд перерисует дерево по `data.categories` после рефреша.
 *
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

// Подавляем любой вывод ошибок — иначе сломает JSON
ini_set('display_errors', '0');
error_reporting(0);

// Буферизация: гарантирует чистый JSON в любом случае
ob_start();

$response = ['success' => false, 'message' => 'Unknown error'];

try {
    require_once cot_incfile('dragstructure', 'plug');
    require_once cot_langfile('dragstructure', 'plug');

    if (!cot_auth('admin', 'a') && !cot_auth('plug', 'dragstructure', 'A')) {
        ob_end_clean();
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Forbidden']);
        exit;
    }

    if (!cot_check_xp()) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
        exit;
    }

    $ext      = cot_import('ext', 'P', 'ALP');
    $order    = cot_import('order', 'P', 'ARR');
    $parentId = (int) cot_import('parent_id', 'P', 'INT');

    if ($ext === '' || !is_array($order) || empty($order)) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit;
    }

    // Fallback: если order пришёл строкой "1,2,3" (не массивом)
    if (!is_array($order)) {
        $order = explode(',', (string) $order);
    }
    $order = array_values(array_unique(array_map('intval', $order)));
    $order = array_values(array_filter($order, fn($v) => $v > 0));

    if (empty($order)) {
        ob_end_clean();
        http_response_code(400);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Empty order']);
        exit;
    }

    $error = dragstructure_move($ext, $order, $parentId);

    if ($error !== null) {
        $response = ['success' => false, 'message' => $error];
    } else {
        $response = [
            'success'    => true,
            'message'    => Cot::$L['dragstructure_saved'],
            'categories' => dragstructure_get_categories($ext),
        ];
    }

} catch (Throwable $e) {
    $response = ['success' => false, 'message' => $e->getMessage()];
}

ob_end_clean();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
exit;
