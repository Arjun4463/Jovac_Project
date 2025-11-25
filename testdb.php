<?php
// testdb.php - quick DB connection test
require __DIR__ . '/db.php';

try {
    $stmt = $pdo->query("SELECT DATABASE() AS dbname");
    $row = $stmt->fetch();
    echo "<p style='font-family:Arial,Helvetica,sans-serif;'>Connected to database: <strong>" . htmlspecialchars($row['dbname']) . "</strong></p>";
} catch (Exception $e) {
    echo "<p style='color:red;'>Connection test failed: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
