<?php
// db.php - Database connection (edit host/port/password as needed)
// Use 127.0.0.1 to force TCP connections (so custom port works).
$host = '127.0.0.1'; // change to 'localhost' if you know why, but 127.0.0.1 forces TCP
$port = 3037;        // EDIT: change to 3306 or 3307 if your MySQL uses that port
$db   = 'xss_demo';
$user = 'root';
$pass = '';          // EDIT: put your root password here if you have one

$dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Friendly error for local dev: shows cause (change in production!)
    die('DB Connection failed: ' . $e->getMessage());
}
?>
