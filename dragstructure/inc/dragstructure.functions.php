<?php

/**
 * DragStructure API
 *
 * Файл: plugins/dragstructure/inc/dragstructure.functions.php
 *
 * Публичные функции плагина для работы со структурой области:
 * чтение категорий, валидация и применение перемещения (drag & drop),
 * нормализация путей. Логика изменения `structure_path` сосредоточена
 * здесь; точка входа AJAX (`dragstructure.ajax.php`) и админ-страница
 * (`dragstructure.tools.php`) вызывают эти функции.
 *
 * Область структуры (`$ext`) — код расширения (`page`, `market`,
 * `forums`, …), совпадающий с полем `structure_area` в таблице
 * `Cot::$db->structure`.
 *
 * Функции
 * -------
 *   dragstructure_get_categories($ext)      — плоский список категорий области;
 *   dragstructure_index_by_id($categories)  — карта [id => категория];
 *   dragstructure_validate_move(...)        — проверка операции перемещения;
 *   dragstructure_apply_order(...)          — пересчёт путей перемещаемых узлов;
 *   dragstructure_move(...)                 — полный сценарий перемещения (транзакция);
 *   dragstructure_normalize($ext)           — сброс всех путей области в плоский вид.
 *
 * Зависимости
 * -----------
 *   - Cot::$db->structure   — таблица структуры с префиксом;
 *   - Cot::$cache           — кеш Cotonti (очищается при перемещении
 *                             и нормализации, если включён);
 *   - cot_log()             — системный лог Cotonti (только в move());
 *   - cot_langfile()        — языковые строки плагина.
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
 * @package   dragstructure
 * @version   2.0.1
 * @author    webitproff
 * @copyright Copyright (c) 2026 webitproff | https://github.com/webitproff/dragstructure-cotonti
 * @license   BSD
 */

defined('COT_CODE') or die('Wrong URL');

// Подключает языковые строки плагина (Cot::$L['dragstructure_*']):
// заголовок страницы, подписи кнопок, сообщения, ключ dragstructure_no_ext и т.д.
// моя болезнь, вечно туплю с ней
require_once cot_langfile('dragstructure', 'plug');


/* ============================================================
 * dragstructure_get_categories
 * ============================================================ */
/**
 * Возвращает все категории расширения, отсортированные по structure_path.
 *
 * Читает таблицу `Cot::$db->structure` и возвращает плоский массив
 * записей с предвычисленным родительским путём. Результат используется
 * и для отдачи JSON во фронтенд, и для внутренних расчётов при
 * перемещении (drag-and-drop) и нормализации.
 *
 * @param string $ext Код расширения (область структуры, например 'page',
 *                    'market', 'forums'). Регистр имеет значение,
 *                    значения совпадают с полем `structure_area`.
 *
 * @return array<int, array{
 *     id: int,
 *     code: string,
 *     title: string,
 *     desc: string,
 *     path: string,
 *     parentPath: string
 * }> Массив:
 *     - id         — `structure_id`, приведённый к int;
 *     - code       — `structure_code` (уникальный идентификатор внутри области);
 *     - title      — `structure_title`;
 *     - desc       — `structure_desc` (может быть пустой строкой);
 *     - path       — `structure_path` (например, '010' или '900.002.007');
 *     - parentPath — путь родителя: часть `path` до последней точки,
 *                    либо пустая строка для корневых категорий.
 *     Пустой массив, если `$ext` пустой или категорий нет.
 *
 * @throws PDOException При ошибке SQL-запроса (пробрасывается из CotDB).
 *
 * @uses Cot::$db->structure Имя таблицы структуры с префиксом.
 *
 * @see dragstructure_index_by_id()  Индексация результата по id.
 * @see dragstructure_build_tree()   (если используется) для дерева.
 */
 
function dragstructure_get_categories(string $ext): array
{
    if ($ext === '') {
        return [];
    }

    $rows = Cot::$db->query(
        'SELECT structure_id, structure_code, structure_path, structure_title, structure_desc
         FROM ' . Cot::$db->structure . '
         WHERE structure_area = ?
         ORDER BY structure_path ASC, structure_code ASC',
        [$ext]
    )->fetchAll();

    $result = [];
    foreach ($rows as $row) {
        $path = (string) $row['structure_path'];
        $parentPath = '';
        $dot = strrpos($path, '.');
        if ($dot !== false) {
            $parentPath = substr($path, 0, $dot);
        }
        $result[] = [
            'id'         => (int) $row['structure_id'],
            'code'       => (string) $row['structure_code'],
            'title'      => (string) $row['structure_title'],
            'desc'       => (string) $row['structure_desc'],
            'path'       => $path,
            'parentPath' => $parentPath,
        ];
    }

    return $result;
}


/* ============================================================
 * dragstructure_index_by_id
 * ============================================================ */
/**
 * Строит карту [id => категория] из результата dragstructure_get_categories().
 *
 * Используется во всех функциях перемещения и валидации для быстрого
 * поиска категории по её `structure_id` без повторного обхода массива.
 * Ключи массива — целочисленные `structure_id`, значения — те же
 * записи, что вернула dragstructure_get_categories().
 *
 * @param array<int, array{
 *     id: int,
 *     code: string,
 *     title: string,
 *     desc: string,
 *     path: string,
 *     parentPath: string
 * }> $categories Результат dragstructure_get_categories().
 *
 * @return array<int, array> Ассоциативный массив:
 *     ключ   — `structure_id`;
 *     значение — исходная запись категории.
 *     Пустой массив, если `$categories` пуст.
 *
 * @see dragstructure_get_categories()
 */

function dragstructure_index_by_id(array $categories): array
{
    $map = [];
    foreach ($categories as $cat) {
        $map[$cat['id']] = $cat;
    }
    return $map;
}


/* ============================================================
 * dragstructure_validate_move
 * ============================================================ */
/**
 * Проверяет корректность операции перемещения перед изменением БД.
 *
 * Отсекает три типа ошибок:
 *   1. Пустой список перемещаемых id.
 *   2. Id из `$order` или `$parentId` отсутствуют в `$byId`
 *      (устаревший DOM после параллельного редактирования).
 *   3. Попытка переместить узел в самого себя или в собственного
 *      потомка — это создало бы цикл в дереве.
 *
 * Проверка «order содержит предка и потомка одновременно» здесь
 * НЕ выполняется: она ложно срабатывает при переносе между уровнями,
 * потому что узлы ещё хранят старые пути. Консистентность порядка
 * гарантируется в dragstructure_apply_order() через построение
 * карты детей и обход от корня.
 *
 * @param array<int, array{
 *     id: int, code: string, title: string, desc: string,
 *     path: string, parentPath: string
 * }> $byId     Карта [id => категория] (см. dragstructure_index_by_id()).
 * @param int[]  $order    Список id в том порядке, в котором они должны
 *                         идти у нового родителя (первый — сверху).
 * @param int    $parentId Id нового родителя; 0 — корневой уровень.
 *
 * @return string|null null при успехе, иначе строка с текстом ошибки
 *                     для отдачи во фронтенд как JSON:
 *                     - 'Empty order';
 *                     - 'Category #N not found';
 *                     - 'Parent #N not found';
 *                     - 'Cannot move category into itself';
 *                     - 'Cannot move category into its own descendant'.
 *
 * @see dragstructure_move() Полный сценарий с вызовом этой валидации.
 */

function dragstructure_validate_move(array $byId, array $order, int $parentId): ?string
{
    if (empty($order)) {
        return 'Empty order';
    }

    foreach ($order as $id) {
        if (!isset($byId[$id])) {
            return "Category #$id not found";
        }
    }

    if ($parentId > 0 && !isset($byId[$parentId])) {
        return "Parent #$parentId not found";
    }

    if ($parentId > 0) {
        if (in_array($parentId, $order, true)) {
            return 'Cannot move category into itself';
        }

        $parentPath = $byId[$parentId]['path'];
        foreach ($order as $id) {
            $childPath = $byId[$id]['path'];
            if ($childPath === $parentPath || strpos($parentPath . '.', $childPath . '.') === 0) {
                return 'Cannot move category into its own descendant';
            }
        }
    }

    return null;
}


/* ============================================================
 * dragstructure_apply_order
 * ============================================================ */
/**
 * Пересчитывает structure_path для перемещаемых узлов и их потомков.
 *
 * Алгоритм:
 *   1. Собирает множество `movingIds` — перемещаемые узлы + все их
 *      потомки, найденные по LIKE '<path>.%'. Нужно, чтобы их старые
 *      пути не считались «занятыми» при выборе новых.
 *   2. Формирует `usedPaths` — все остальные пути области. Любой
 *      новый путь, попавший в это множество, пропускается.
 *   3. Строит `childrenMap` (parentId => [childId]) для перемещаемых
 *      узлов на основе их текущих `parentPath`.
 *   4. Назначает новые пути узлам из `$order` в порядке следования:
 *      - корневые:      sprintf('%03d', pos * 10) → '010', '020', '030', ...
 *                       шаг 10 при трёхзначной ширине.
 *      - не-корневые:   sprintf('%03d', pos)      → '001', '002', '003', ...
 *                       шаг 1 при трёхзначной ширине,
 *                       полный путь = parentPath . '.' . segment.
 *   5. Рекурсивно (замыкание walkChildren) пересчитывает пути потомков
 *      каждого перемещаемого узла: сегмент = sprintf('%03d', pos),
 *      путь = newParentPath . '.' . segment.
 *   6. Оставляет только фактически изменённые записи (`dirty`).
 *   7. Применяет изменения в два прохода:
 *      фаза 1 — временный уникальный путь '_t_<random>_<id>' (снимает
 *               UNIQUE-конфликты при свопах двух соседей местами);
 *      фаза 2 — финальный путь.
 *
 * Нормализация выполняется ТОЛЬКО для перемещаемого поддерева.
 * Остальные категории не затрагиваются — их пути остаются как были.
 *
 * @param string $ext      Код расширения (область структуры).
 * @param array<int, array{
 *     id: int, code: string, title: string, desc: string,
 *     path: string, parentPath: string
 * }> $byId     Карта [id => категория] на момент начала операции.
 * @param int[]  $order    Новый порядок id у родителя `$parentId`.
 * @param int    $parentId Id нового родителя; 0 — корневой уровень.
 *
 * @return void
 *
 * @throws PDOException При ошибке SQL. Внешний вызов оборачивается
 *                      в транзакцию (см. dragstructure_move()).
 *
 * @see dragstructure_move() Вызывающий код с транзакцией и логом.
 */

function dragstructure_apply_order(string $ext, array $byId, array $order, int $parentId): void
{
    $parentPath = $parentId > 0 ? $byId[$parentId]['path'] : '';

    // Перемещаемые узлы + их потомки (чтобы не считать их пути «занятыми»)
    $movingIds = array_flip($order);
    foreach ($order as $id) {
        $descendants = Cot::$db->query(
            'SELECT structure_id FROM ' . Cot::$db->structure . '
             WHERE structure_area = ? AND structure_path LIKE ?',
            [$ext, $byId[$id]['path'] . '.%']
        )->fetchAll();
        foreach ($descendants as $d) {
            $movingIds[(int) $d['structure_id']] = true;
        }
    }

    // Занятые пути — всё, кроме перемещаемых
    $usedPaths = [];
    foreach ($byId as $id => $cat) {
        if (!isset($movingIds[$id])) {
            $usedPaths[$cat['path']] = true;
        }
    }

    // Строим карту детей для перемещаемых узлов (по текущим путям)
    $pathToId = [];
    foreach ($byId as $id => $cat) {
        $pathToId[$cat['path']] = $id;
    }
    $childrenMap = [];
    foreach ($byId as $id => $cat) {
        if (!isset($movingIds[$id])) {
            continue;
        }
        $pid = 0;
        if ($cat['parentPath'] !== '' && isset($pathToId[$cat['parentPath']])) {
            $pid = $pathToId[$cat['parentPath']];
        }
        $childrenMap[$pid][] = $id;
    }

    // Новые пути для order с шагом 10 (3-значные)
    $changes = [];
    $isRootParent = ($parentPath === '');
    $pos = 0;
    foreach ($order as $id) {
        $oldPath = $byId[$id]['path'];
        do {
            $pos++;
            $segment = $isRootParent
                ? sprintf('%03d', $pos * 10)
                : sprintf('%03d', $pos);
            $candidate = $isRootParent ? $segment : $parentPath . '.' . $segment;
        } while (isset($usedPaths[$candidate]));

        $usedPaths[$candidate] = true;
        $changes[$id] = ['old' => $oldPath, 'new' => $candidate];
    }

    // Рекурсивно пересчитываем пути потомков перемещаемых узлов
    $walkChildren = function (int $pid, string $parentPath) use (&$walkChildren, &$childrenMap, &$changes, &$byId, &$usedPaths) {
        $children = $childrenMap[$pid] ?? [];
        $pos = 0;
        foreach ($children as $childId) {
            if (isset($changes[$childId])) {
                continue;
            }
            $oldPath = $byId[$childId]['path'];
            do {
                $pos++;
                $segment = sprintf('%03d', $pos);
                $candidate = $parentPath . '.' . $segment;
            } while (isset($usedPaths[$candidate]));

            $usedPaths[$candidate] = true;
            $changes[$childId] = ['old' => $oldPath, 'new' => $candidate];
            $walkChildren($childId, $candidate);
        }
    };

    foreach ($changes as $id => $info) {
        $walkChildren($id, $info['new']);
    }

    // Только фактически изменяемые
    $dirty = [];
    foreach ($changes as $id => $info) {
        if ($info['old'] !== $info['new']) {
            $dirty[$id] = $info;
        }
    }

    if (empty($dirty)) {
        return;
    }

    // Временные пути — снимают коллизии при свопах
    $tmpPrefix = '_t_' . bin2hex(random_bytes(6)) . '_';
    foreach ($dirty as $id => $info) {
        Cot::$db->update(
            Cot::$db->structure,
            ['structure_path' => $tmpPrefix . $id],
            'structure_id = ? AND structure_area = ?',
            [$id, $ext]
        );
    }
    foreach ($dirty as $id => $info) {
        Cot::$db->update(
            Cot::$db->structure,
            ['structure_path' => $info['new']],
            'structure_id = ? AND structure_area = ?',
            [$id, $ext]
        );
    }
}


/* ============================================================
 * dragstructure_move
 * ============================================================ */
/**
 * Полный сценарий перемещения: чтение, валидация, применение.
 *
 * Порядок работы:
 *   1. Загружает все категории области (dragstructure_get_categories()).
 *   2. Строит карту по id (dragstructure_index_by_id()).
 *   3. Валидирует операцию (dragstructure_validate_move()). При ошибке
 *      возвращает текст ошибки — БД не затрагивается.
 *   4. Открывает транзакцию.
 *   5. Пересчитывает пути (dragstructure_apply_order()).
 *   6. Очищает кеш Cotonti (`Cot::$cache->clear()`), если он включён.
 *   7. Пишет запись в системный лог (`cot_log`).
 *   8. Фиксирует транзакцию (commit).
 *   9. При исключении — откат (rollBack) и возврат текста исключения.
 *
 * Возвращаемое значение:
 *   - null     — операция успешно выполнена;
 *   - строка   — текст ошибки для отдачи во фронтенд как
 *                JSON `{"success": false, "message": "..."}`.
 *
 * @param string $ext      Код расширения (область структуры).
 * @param int[]  $order    Новый порядок id у родителя `$parentId`.
 * @param int    $parentId Id нового родителя; 0 — корневой уровень.
 *
 * @return string|null null при успехе, иначе текст ошибки.
 *
 * @throws Throwable Внутри оборачивается: любые исключения откатывают
 *                   транзакцию и превращаются в строку ошибки.
 *
 * @see dragstructure_apply_order()
 * @see dragstructure_validate_move()
 */

function dragstructure_move(string $ext, array $order, int $parentId): ?string
{
    $categories = dragstructure_get_categories($ext);
    if (empty($categories)) {
        return 'No categories in extension';
    }

    $byId = dragstructure_index_by_id($categories);

    $error = dragstructure_validate_move($byId, $order, $parentId);
    if ($error !== null) {
        return $error;
    }

    Cot::$db->beginTransaction();
    try {
        dragstructure_apply_order($ext, $byId, $order, $parentId);

        if (Cot::$cache) {
            Cot::$cache->clear();
        }

        cot_log(
            "Structure. Drag&drop reorder in '$ext' (parent: $parentId)",
            'adm',
            'structure',
            'update'
        );

        Cot::$db->commit();
        return null;
    } catch (Throwable $e) {
        Cot::$db->rollBack();
        return $e->getMessage();
    }
}


/* ============================================================
 * dragstructure_normalize
 * ============================================================ */
/**
 * Перестраивает все пути области в плоскую структуру.
 *
 * Использовать, когда в БД уже накоплены дубликаты путей или
 * «слипшиеся» пути (например, после ошибочной работы предыдущей
 * версии плагина). Восстановить исходную иерархию по таким данным
 * невозможно — плагин не знает, кем была категория до поломки.
 * Поэтому нормализация сбрасывает всё в плоский список корневых
 * категорий с гарантированно уникальными путями.
 *
 * Схема путей:
 *   - категории сортируются по возрастанию `structure_id`;
 *   - каждой присваивается путь sprintf('%03d', pos * 10),
 *     то есть '010', '020', '030', ... с шагом 10 и шириной 3.
 *
 * Дальнейшая иерархия расставляется администратором вручную через
 * drag-and-drop — при каждом перемещении dragstructure_apply_order()
 * пересчитает только затронутое поддерево.
 *
 * Боковые эффекты:
 *   - очищает кеш Cotonti, если он включён;
 *   - не логирует операцию — лог ведёт вызывающий код (см. tools).
 *
 * @param string $ext Код расширения (область структуры).
 *
 * @return int Количество фактически изменённых записей
 *             (не совпадающих с желаемым путём). Может быть 0,
 *             если все пути уже нормализованы.
 *
 * @throws PDOException При ошибке SQL.
 *
 * @see dragstructure_apply_order() Штатное перемещение после нормализации.
 */

function dragstructure_normalize(string $ext): int
{
    $rows = Cot::$db->query(
        'SELECT structure_id FROM ' . Cot::$db->structure . '
         WHERE structure_area = ?
         ORDER BY structure_id ASC',
        [$ext]
    )->fetchAll();

    $pos = 0;
    $updated = 0;
    foreach ($rows as $row) {
        $pos++;
        $newPath = sprintf('%03d', $pos * 10);
        $affected = Cot::$db->update(
            Cot::$db->structure,
            ['structure_path' => $newPath],
            'structure_id = ? AND structure_area = ? AND structure_path <> ?',
            [(int) $row['structure_id'], $ext, $newPath]
        );
        $updated += $affected;
    }

    if (Cot::$cache) {
        Cot::$cache->clear();
    }

    return $updated;
}
