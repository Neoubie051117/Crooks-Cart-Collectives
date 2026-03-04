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
    
    // Log successful connection
    error_log("Database connected successfully");
    
} catch (PDOException $error) {
    // Log the detailed error
    error_log("Database connection failed: " . $error->getMessage());
    error_log("Connection details - Host: $host, Database: $dbName, Username: $username");
    
    // Check for specific connection errors
    if ($error->getCode() == 2002) {
        error_log("MySQL server is not running or cannot be reached. Please start MySQL service.");
    }
    
    // For API requests, return JSON error
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
        header('Content-Type: application/json');
        die(json_encode([
            'status' => 'error', 
            'message' => 'Service temporarily unavailable. Please try again later.'
        ]));
    }
    
    // For regular page loads, show user-friendly message
    die("
        <!DOCTYPE html>
        <html>
        <head>
            <title>Service Temporarily Unavailable</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
                .error-container { max-width: 600px; margin: 0 auto; }
                h1 { color: #FF8246; }
                p { color: #666; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>Oops! Something went wrong.</h1>
                <p>We're experiencing technical difficulties. Please try again later.</p>
                <p><a href='../admin-index.php'>Return to Admin Panel</a></p>
            </div>
        </body>
        </html>
    ");
}
?>