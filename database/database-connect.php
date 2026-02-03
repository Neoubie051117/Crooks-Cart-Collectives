<?php
$host = 'localhost';
$dbName = 'barangay_system';
$username = 'root';
$password = ''; // default for XAMPP

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $error) {
    error_log("Database connection failed: " . $error->getMessage());
    die("Database connection error.");
}
?>