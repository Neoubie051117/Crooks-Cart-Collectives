<?php
// Add these lines at the beginning
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Database configuration
$host = 'localhost';
$dbName = 'crooks_cart_collectives';
$username = 'root';
$password = '';

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbName;charset=utf8mb4", 
        $username, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false
        ]
    );
} catch (PDOException $error) {
    error_log("Database connection failed: " . $error->getMessage());
    // For production, show user-friendly message
    die(json_encode([
        'status' => 'error', 
        'message' => 'Service temporarily unavailable. Please try again later.'
    ]));
}
?>