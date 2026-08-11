<?php
/**
 * db.php
 * Database connection for ABPO Africa Limited website.
 * Include this file at the top of any PHP page that needs DB access:
 *   require_once 'db.php';
 */

// === EDIT THESE TO MATCH YOUR HOSTING ENVIRONMENT ===
define('DB_HOST', 'localhost');
define('DB_NAME', 'abpo_africa');
define('DB_USER', 'root');
define('DB_PASS', '');
// ======================================================

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    // In production, log this instead of displaying it.
    die('Database connection failed: ' . htmlspecialchars($e->getMessage()));
}