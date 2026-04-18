<?php
// ─── Database Configuration ───────────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');   // ✅ EMPTY
define('DB_NAME', 'smart_parking');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die(json_encode([
        'success' => false,
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]));
}

$conn->set_charset('utf8mb4');

// ─── Helper: Run query and return rows ────────────────────────────────────
function queryRows($conn, $sql, $types = '', ...$params) {
    if ($types && $params) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = $conn->query($sql);
    }
    if (!$result) return [];
    $rows = [];
    while ($row = $result->fetch_assoc()) $rows[] = $row;
    return $rows;
}

// ─── Helper: Run non-select query ─────────────────────────────────────────
function queryExec($conn, $sql, $types = '', ...$params) {
    if ($types && $params) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        return $stmt->execute();
    }
    return $conn->query($sql);
}
?>
