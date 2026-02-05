<?php
// Database configuration for Crooks-Cart-Collectives
$host = 'localhost';
$dbName = 'crooks_cart_collectives'; // Updated database name
$username = 'root';
$password = ''; // default for XAMPP

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    error_log("Database connection failed: " . $error->getMessage());
    die(json_encode(['status' => 'error', 'message' => 'Database connection error.']));
}
?>