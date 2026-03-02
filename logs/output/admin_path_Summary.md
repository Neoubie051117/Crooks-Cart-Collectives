# Web Project: Crooks-Cart-Collectives

**Preset:** admin_path

**Generated:** 2026-03-03 01:50:13

---

## File: `Crooks-Cart-Collectives/admin/admin-index.php`

**Status:** `FOUND`

```php
<?php
// Redirect to admin sign-up page
header('Location: pages/admin-sign-up.php');
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-auth-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Authentication Handler
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

// Allow GET requests for fetching sellers
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    // For POST requests
    $action = $_POST['action'] ?? '';
}

// Check if admin is logged in for all actions except maybe public ones
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

// Get all sellers with their verification status
if ($action === 'get_all_sellers') {
    try {
        // First check if sellers table exists and has data
        $checkTable = $connection->query("SHOW TABLES LIKE 'sellers'");
        if ($checkTable->rowCount() == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'Sellers table does not exist']);
            exit;
        }
        
        // Check if there are any sellers
        $countStmt = $connection->query("SELECT COUNT(*) as count FROM sellers");
        $count = $countStmt->fetch()['count'];
        
        if ($count == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'No sellers found']);
            exit;
        }
        
        // Get all sellers with user information
        $stmt = $connection->prepare("
            SELECT 
                s.seller_id, 
                s.business_name, 
                s.created_at, 
                s.is_verified,
                s.verified_at,
                u.user_id,
                u.first_name, 
                u.last_name, 
                u.email, 
                u.contact_number
            FROM sellers s
            LEFT JOIN users u ON s.user_id = u.user_id
            ORDER BY 
                CASE 
                    WHEN s.is_verified = 0 THEN 1
                    WHEN s.is_verified = 1 THEN 2
                    WHEN s.is_verified = 2 THEN 3
                    ELSE 4
                END,
                s.created_at DESC
        ");
        $stmt->execute();
        $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the data for display
        foreach ($sellers as &$seller) {
            // Ensure is_verified is treated as integer
            $seller['is_verified'] = (int)$seller['is_verified'];
            // Handle null business_name
            $seller['business_name'] = $seller['business_name'] ?? 'No Business Name';
            // Handle null user data
            $seller['first_name'] = $seller['first_name'] ?? 'Unknown';
            $seller['last_name'] = $seller['last_name'] ?? 'User';
            $seller['email'] = $seller['email'] ?? 'No email';
            $seller['contact_number'] = $seller['contact_number'] ?? 'No contact';
        }
        
        echo json_encode([
            'status' => 'success', 
            'data' => $sellers,
            'count' => count($sellers)
        ]);
        
    } catch (PDOException $e) {
        error_log("Error fetching sellers: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Get statistics for dashboard
if ($action === 'get_stats') {
    try {
        $stats = [];
        
        // Count pending verifications
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
        $stmt->execute();
        $stats['pending_verifications'] = $stmt->fetch()['count'];
        
        // Count verified sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 1");
        $stmt->execute();
        $stats['verified_sellers'] = $stmt->fetch()['count'];
        
        // Count rejected sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 2");
        $stmt->execute();
        $stats['rejected_sellers'] = $stmt->fetch()['count'];
        
        // Total sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
        $stmt->execute();
        $stats['total_sellers'] = $stmt->fetch()['count'];
        
        echo json_encode(['status' => 'success', 'data' => $stats]);
        
    } catch (PDOException $e) {
        error_log("Error fetching stats: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// Seller verification (POST only)
if ($action === 'verify' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 1, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller verified successfully']);
    } catch (PDOException $e) {
        error_log("Verify error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

if ($action === 'reject' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 2, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller rejected']);
    } catch (PDOException $e) {
        error_log("Reject error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// If no valid action was found
echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-data-storage-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin data storage handler - for serving and saving admin files
session_start();

// Function to serve admin files (profile pictures)
function serveAdminFile($path) {
    // Security: ensure path is within administrators directory
    $baseDir = dirname(__DIR__) . '/Crooks-Data-Storage/administrators/';
    $fullPath = realpath($baseDir . $path);
    if ($fullPath === false || strpos($fullPath, $baseDir) !== 0) {
        http_response_code(404);
        exit;
    }
    $ext = pathinfo($fullPath, PATHINFO_EXTENSION);
    $mime = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml'
    ][strtolower($ext)] ?? 'application/octet-stream';

    header('Content-Type: ' . $mime);
    header('Content-Length: ' . filesize($fullPath));
    readfile($fullPath);
    exit;
}

// Function to save admin profile picture
function saveAdminProfilePicture($admin_id, $file) {
    $targetDir = dirname(__DIR__) . '/Crooks-Data-Storage/administrators/profile/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $admin_id . '_' . time() . '.' . $ext;
    $targetPath = $targetDir . $filename;
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Return relative path for database storage
        return [
            'success' => true,
            'path' => 'administrators/profile/' . $filename
        ];
    }
    return [
        'success' => false,
        'message' => 'Failed to upload file.'
    ];
}

// Get admin profile picture URL
function getAdminProfilePictureUrl($path) {
    if (empty($path)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    return '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($path);
}

// Handle requests
if (isset($_GET['action']) && $_GET['action'] === 'serve' && isset($_GET['path'])) {
    serveAdminFile($_GET['path']);
    exit;
}

// If not serving, output nothing
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-database-connect.php`

**Status:** `FOUND`

```php
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
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-logs-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Logs Handler - for monitoring database activities
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'debug_columns') {
    // Debug function to check table columns
    $tables = ['users', 'sellers', 'products', 'orders', 'administrators'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $result[$table] = $columns;
        } catch (PDOException $e) {
            $result[$table] = 'Error: ' . $e->getMessage();
        }
    }
    
    echo json_encode(['status' => 'success', 'data' => $result]);
    exit;
}

if ($action === 'get_logs') {
    $type = $_GET['type'] ?? 'all';
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
    
    try {
        $logs = [];
        
        // First, let's get the actual column names by fetching a sample row
        $columnInfo = getTableColumns($connection);
        
        if ($type === 'all' || $type === 'user_login') {
            if (isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['users'], ['date_created', 'created_at', 'registration_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'user_registration' as log_type, user_id, 
                               CONCAT(first_name, ' ', last_name) as user_name,
                               email, 'User' as role,
                               $dateColumn as timestamp
                        FROM users
                        ORDER BY $dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $userLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $userLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'seller_application') {
            if (isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['sellers'], ['created_at', 'date_created', 'application_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'seller_application' as log_type, s.seller_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown User') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Seller Applicant' as role,
                               s.$dateColumn as timestamp
                        FROM sellers s
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY s.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $sellerLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $sellerLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'product_added') {
            if (isset($columnInfo['products']) && isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['products'], ['date_added', 'created_at', 'added_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'product_added' as log_type, p.product_id, p.name as product_name,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Seller') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Product' as role,
                               p.$dateColumn as timestamp
                        FROM products p
                        LEFT JOIN sellers s ON p.seller_id = s.seller_id
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY p.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $productLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $productLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'order_placed') {
            if (isset($columnInfo['orders']) && isset($columnInfo['products']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['orders'], ['order_date', 'created_at', 'date_ordered']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'order_placed' as log_type, o.order_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Customer') as user_name,
                               COALESCE(p.name, 'Unknown Product') as product_name, 
                               o.quantity, 'Order' as role,
                               o.$dateColumn as timestamp
                        FROM orders o
                        LEFT JOIN products p ON o.product_id = p.product_id
                        LEFT JOIN users u ON o.customer_id = u.user_id
                        ORDER BY o.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $orderLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $orderLogs);
                }
            }
        }
        
        // Sort logs by timestamp
        if (count($logs) > 1) {
            usort($logs, function($a, $b) {
                return strtotime($b['timestamp']) - strtotime($a['timestamp']);
            });
        }
        
        $logs = array_slice($logs, 0, $limit);
        
        if (empty($logs)) {
            echo json_encode([
                'status' => 'success', 
                'data' => [], 
                'message' => 'No logs found in the database.'
            ]);
        } else {
            echo json_encode(['status' => 'success', 'data' => $logs]);
        }
        
    } catch (PDOException $e) {
        error_log("Logs fetch error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Helper function to get table columns
function getTableColumns($connection) {
    $tables = ['users', 'sellers', 'products', 'orders'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $result[$table] = $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            $result[$table] = [];
        }
    }
    
    return $result;
}

// Helper function to find the correct date column
function getDateColumn($columns, $possibleNames) {
    foreach ($possibleNames as $name) {
        if (in_array($name, $columns)) {
            return $name;
        }
    }
    return null;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-profile-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Profile Handler
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');
require_once(__DIR__ . '/admin-data-storage-handler.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'update_profile') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleProfileUpdate();

function handleProfileUpdate() {
    global $connection;
    
    $admin_id = $_SESSION['admin_id'];
    
    // Get form data
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $contact_number = trim($_POST['contact_number'] ?? '');
    
    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($contact_number)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    // Validate Philippine mobile number
    $cleaned_contact = preg_replace('/[^0-9]/', '', $contact_number);
    if (!preg_match('/^09\d{9}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid Philippine mobile number']);
        exit;
    }
    
    // Handle profile picture upload
    $profile_picture_path = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $upload_result = saveAdminProfilePicture($admin_id, $_FILES['profile_picture']);
        if ($upload_result['success']) {
            $profile_picture_path = $upload_result['path'];
        } else {
            echo json_encode(['status' => 'error', 'message' => $upload_result['message']]);
            exit;
        }
    }
    
    try {
        // Build update query
        $sql = "UPDATE administrators SET first_name = ?, last_name = ?, contact_number = ?";
        $params = [$first_name, $last_name, $cleaned_contact];
        
        if ($profile_picture_path) {
            $sql .= ", profile_picture = ?";
            $params[] = $profile_picture_path;
        }
        
        $sql .= " WHERE admin_id = ?";
        $params[] = $admin_id;
        
        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        
        // Update session variables
        $_SESSION['admin_first_name'] = $first_name;
        $_SESSION['admin_last_name'] = $last_name;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => [
                'first_name' => $first_name,
                'last_name' => $last_name
            ]
        ]);
        
    } catch (PDOException $e) {
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-reports-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action === 'resolve' && isset($_POST['report_id'])) {
    $report_id = (int)$_POST['report_id'];
    $notes = trim($_POST['notes'] ?? '');
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$notes, $report_id]);
        echo json_encode(['status' => 'success', 'message' => 'Report resolved']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-in-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign In Handler
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signin') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleAdminSignin();

function handleAdminSignin() {
    global $connection;
    
    error_log("Admin signin attempt for identifier: " . ($_POST['identifier'] ?? ''));
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    try {
        // Check for admin
        $stmt = $connection->prepare("
            SELECT admin_id, first_name, last_name, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$admin) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Verify password
        if (!password_verify($password, $admin['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Set session variables
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_first_name'] = $admin['first_name'];
        $_SESSION['admin_last_name'] = $admin['last_name'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['is_admin'] = true;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => '../pages/admin-dashboard.php'
        ]);
        
    } catch (PDOException $e) {
        error_log("Admin signin error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-out-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Out Handler
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    
    // Remove /database/admin-sign-out-handler.php from the path
    $basePath = dirname(dirname($scriptName));
    
    return $protocol . $host . $basePath . '/';
}

$baseUrl = getBaseUrl();

// Start session to check if admin is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if this is an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// If already logged out, just return success
if (!isset($_SESSION['admin_id'])) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Already logged out',
            'redirect' => $baseUrl . 'pages/admin-sign-in.php'
        ]);
        exit;
    }
    header("Location: " . $baseUrl . "pages/admin-sign-in.php");
    exit;
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Return success for AJAX
if ($isAjax) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
        'redirect' => $baseUrl . 'pages/admin-sign-in.php'
    ]);
    exit;
}

// Regular request - redirect
header("Location: " . $baseUrl . "pages/admin-sign-in.php");
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-up-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Up Handler
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleAdminSignup();

function formatPhoneForStorage($phone) {
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    
    if (strlen($cleaned) === 11 && substr($cleaned, 0, 2) === '09') {
        return $cleaned;
    }
    
    return $phone;
}

function handleAdminSignup() {
    global $connection;
    
    error_log("Admin signup attempt");
    
    // Check required fields
    $required = ['first_name', 'last_name', 'email', 'contact_number', 'username', 'password', 'confirm_password'];
    
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => 'missing-field', 'field' => $field]);
            exit;
        }
    }
    
    // Validate email
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
        exit;
    }
    
    // Validate password
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (strlen($password) < 8) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
        exit;
    }
    if (strlen($password) > 16) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-long']);
        exit;
    }
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        echo json_encode(['status' => 'error', 'message' => 'password-needs-mixed-case']);
        exit;
    }
    if (!preg_match('/[0-9]/', $password)) {
        echo json_encode(['status' => 'error', 'message' => 'password-needs-number']);
        exit;
    }
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
        exit;
    }
    
    // Validate username
    $username = trim($_POST['username']);
    if (strlen($username) < 3) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
        exit;
    }
    if (strlen($username) > 20) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
        exit;
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        echo json_encode(['status' => 'error', 'message' => 'username-invalid-chars']);
        exit;
    }
    
    // Check if username exists
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    // Check if email exists
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    // Validate contact number
    $contact_number = trim($_POST['contact_number']);
    $storage_contact = formatPhoneForStorage($contact_number);
    
    $cleaned_contact = preg_replace('/[^0-9]/', '', $contact_number);
    if (!preg_match('/^09\d{9}$/', $storage_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
        exit;
    }
    
    // Check if contact exists
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE contact_number = ?");
    $stmt->execute([$storage_contact]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $admin_data = [
            ':first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
            ':last_name' => htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8'),
            ':email' => $email,
            ':contact_number' => $storage_contact,
            ':username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
            ':password' => $hashed_password
        ];
        
        // Use date_joined instead of created_at
        $sql = "INSERT INTO administrators (
                    first_name, last_name, email, contact_number, username, password, date_joined
                ) VALUES (
                    :first_name, :last_name, :email, :contact_number, :username, :password, NOW()
                )";
        $stmt = $connection->prepare($sql);
        $stmt->execute($admin_data);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Admin account created successfully! Please sign in.',
            'redirect' => '../pages/admin-sign-in.php',
            'delay' => 5000
        ]);
        
    } catch (PDOException $e) {
        error_log("Admin signup database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred. Please try again.']);
    } catch (Exception $e) {
        error_log("General error in admin signup: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'An error occurred. Please try again.']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/validation.php`

**Status:** `FOUND`

```php
<?php
// Validation functions for admin authentication

function validateAdminSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'contact_number', 'username', 'password', 'confirm_password'];
    
    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    if (!empty($errors)) {
        return ['valid' => false, 'errors' => $errors];
    }
    
    // Email validation
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    // Password validation
    $password = $data['password'];
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (strlen($password) > 16) {
        $errors['password'] = 'Password must not exceed 16 characters';
    }
    
    // Password match
    if ($password !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // Username validation
    $username = trim($data['username']);
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Username must be 3-20 characters (letters, numbers, underscore)';
    }
    
    // Phone validation (Philippine format)
    $phone = preg_replace('/[^0-9]/', '', $data['contact_number']);
    if (!preg_match('/^09\d{9}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number (must start with 09 and be 11 digits)';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateAdminSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? '');
    $password = $data['password'] ?? '';
    
    if (empty($identifier)) {
        $errors['identifier'] = 'Email or username is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'identifier' => $identifier,
        'password' => $password
    ];
}

function checkAdminDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return $phone;
    } elseif (preg_match('/^63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    }
    
    return $phone;
}

function logAdminError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-dashboard.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

$adminId = $_SESSION['admin_id'];

// Fetch admin name
try {
    $stmt = $connection->prepare("SELECT first_name FROM administrators WHERE admin_id = ?");
    $stmt->execute([$adminId]);
    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstName = $adminData['first_name'] ?? 'Admin';
} catch (PDOException $e) {
    error_log("Error fetching admin: " . $e->getMessage());
    $firstName = "Admin";
}

// Fetch stats for dashboard
$stats = [];
try {
    // Pending seller verifications
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
    $stmt->execute();
    $stats['pending_verifications'] = $stmt->fetch()['count'];
    
    // Total users
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM users");
    $stmt->execute();
    $stats['total_users'] = $stmt->fetch()['count'];
    
    // Total sellers
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
    $stmt->execute();
    $stats['total_sellers'] = $stmt->fetch()['count'];
    
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM products");
    $stmt->execute();
    $stats['total_products'] = $stmt->fetch()['count'];
    
    // Total orders
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM orders");
    $stmt->execute();
    $stats['total_orders'] = $stmt->fetch()['count'];
    
    // Pending reports
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM seller_reports WHERE status = 'pending'");
    $stmt->execute();
    $stats['pending_reports'] = $stmt->fetch()['count'];
    
} catch (PDOException $e) {
    error_log("Error fetching admin stats: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #FF8246;
        margin: 10px 0;
    }

    .stat-label {
        color: #666666;
        font-size: 0.9rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #FF8246;
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .dashboard-card h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #000000;
    }

    .dashboard-card p {
        color: #666666;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage the marketplace, verify sellers, and monitor system activity.</p>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['pending_verifications'] ?? 0; ?></div>
                <div class="stat-label">Pending Verifications</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_users'] ?? 0; ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_sellers'] ?? 0; ?></div>
                <div class="stat-label">Total Sellers</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_products'] ?? 0; ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_orders'] ?? 0; ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <!-- Admin Profile Card -->
            <a href="admin-profile.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/profile.svg" alt="Profile">
                </div>
                <h3>Admin Profile</h3>
                <p>Manage your personal information and account settings</p>
            </a>

            <!-- Verify Sellers Card -->
            <a href="admin-verify-sellers.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/verified-empty.svg" alt="Verify Sellers">
                </div>
                <h3>Verify Sellers</h3>
                <p>Review and verify seller applications (<?php echo $stats['pending_verifications'] ?? 0; ?> pending)
                </p>
            </a>

            <!-- Register Other Admin Card -->
            <a href="admin-sign-up.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/add-circle-empty.svg" alt="Register Admin">
                </div>
                <h3>Register Admin</h3>
                <p>Create new administrator accounts</p>
            </a>

            <!-- Logs Card -->
            <a href="admin-logs.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/time-update.svg" alt="Logs">
                </div>
                <h3>System Logs</h3>
                <p>Monitor user activities and system events</p>
            </a>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-logs.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-logs.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>System Logs</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Activities</span>
            <span class="filter-tab" data-filter="user_login">User Logins</span>
            <span class="filter-tab" data-filter="seller_application">Seller Applications</span>
            <span class="filter-tab" data-filter="product_added">Product Additions</span>
            <span class="filter-tab" data-filter="order_placed">Orders</span>
        </div>

        <!-- Logs Container -->
        <div id="logsList" class="logs-list">
            <div class="loading">Loading logs...</div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-logs.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-manage-report.php`

**Status:** `FOUND`

```php
<!-- THIS IS SHOULD BE IGNORED, IT's JUST EXTRA -->

<?php
require_once('../includes/admin-auth-check.php');
require_once('../../database/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$report_id = $_POST['report_id'] ?? $_GET['id'] ?? 0;
$resolution = $_POST['resolution'] ?? '';

if ($action === 'resolve' && $report_id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$resolution, $report_id]);
        $_SESSION['admin_message'] = 'Report resolved.';
    } catch (PDOException $e) {
        error_log("Resolve report error: " . $e->getMessage());
        $_SESSION['admin_error'] = 'Failed to resolve report.';
    }
    header('Location: manage-reports.php');
    exit;
}

// Fetch all reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, u.username as reporter, s.business_name, s.user_id as seller_user_id
        FROM seller_reports r
        JOIN users u ON r.reporter_id = u.user_id
        JOIN sellers s ON r.seller_id = s.seller_id
        ORDER BY r.created_at DESC
    ");
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Fetch reports error: " . $e->getMessage());
}

$message = $_SESSION['admin_message'] ?? '';
$error = $_SESSION['admin_error'] ?? '';
unset($_SESSION['admin_message'], $_SESSION['admin_error']);
?>
<?php include_once('../includes/admin-header.php'); ?>

<div class="reports-container">
    <h1 class="page-title">Manage Reports</h1>

    <?php if ($message): ?>
    <div class="alert success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (empty($reports)): ?>
    <div class="empty-state">
        <img src="../../assets/image/icons/admin-reports.svg" alt="No reports">
        <p>No reports have been submitted.</p>
    </div>
    <?php else: ?>
    <div class="reports-list">
        <?php foreach ($reports as $report): ?>
        <div class="report-card <?php echo $report['status']; ?>">
            <div class="report-header">
                <span class="report-id">#<?php echo $report['report_id']; ?></span>
                <span
                    class="report-status status-<?php echo $report['status']; ?>"><?php echo ucfirst($report['status']); ?></span>
            </div>
            <div class="report-body">
                <p><strong>Reporter:</strong> <?php echo htmlspecialchars($report['reporter']); ?></p>
                <p><strong>Seller:</strong> <?php echo htmlspecialchars($report['business_name'] ?: 'Unknown'); ?></p>
                <p><strong>Reason:</strong> <?php echo htmlspecialchars($report['reason']); ?></p>
                <p><strong>Details:</strong> <?php echo nl2br(htmlspecialchars($report['details'])); ?></p>
                <p><strong>Submitted:</strong> <?php echo date('M j, Y g:i A', strtotime($report['created_at'])); ?></p>
                <?php if ($report['admin_notes']): ?>
                <p><strong>Admin notes:</strong> <?php echo nl2br(htmlspecialchars($report['admin_notes'])); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($report['status'] === 'pending'): ?>
            <div class="report-actions">
                <form method="POST">
                    <input type="hidden" name="report_id" value="<?php echo $report['report_id']; ?>">
                    <input type="hidden" name="action" value="resolve">
                    <textarea name="resolution" placeholder="Resolution notes (optional)" rows="2"></textarea>
                    <button type="submit" class="btn-resolve">Mark as Resolved</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php include_once('../includes/admin-footer.php'); ?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-profile.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');
require_once('../database/admin-data-storage-handler.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

$adminId = $_SESSION['admin_id'];

$admin = [];
try {
    $stmt = $connection->prepare("SELECT * FROM administrators WHERE admin_id = ?");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$admin) {
        session_destroy();
        header('Location: admin-sign-in.php');
        exit;
    }
} catch (PDOException $e) {
    error_log("Error fetching admin profile: " . $e->getMessage());
    $error = "Unable to load profile data. Please try again later.";
}

// REMOVED: getAdminProfilePictureUrl function - now using the one from admin-data-storage-handler.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-profile.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <script defer src="../scripts/admin-profile.js"></script>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">

        <?php if (isset($error)): ?>
        <div class="message error" style="display: block; margin-bottom: 20px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="admin-dashboard.php" style="color: white; text-decoration: underline; margin-left: 10px;">
                Return to Dashboard
            </a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <!-- Personal Info Section with Profile Preview -->
            <div class="form-section personal-info-section">
                <h3>Profile Information</h3>

                <!-- PROFILE CONTAINER - Stacked and Centered -->
                <div class="profile-stacked-container">
                    <!-- Profile Picture -->
                    <div class="profile-picture-wrapper">
                        <img id="profilePicturePreview"
                            src="<?php echo getAdminProfilePictureUrl($admin['profile_picture'] ?? ''); ?>"
                            alt="Profile Picture"
                            onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">

                        <div class="profile-picture-upload" id="profilePictureUpload" style="display: none;">
                            <label for="profile_picture" class="file-upload-label">Choose Photo to Upload</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                            <div class="file-name" id="fileNameDisplay"></div>
                            <div class="help-text">Max 2MB. JPG, PNG, GIF.</div>
                        </div>
                    </div>

                    <!-- Profile Name (one line - first name + last name) -->
                    <div class="profile-name-single-line">
                        <span
                            class="display-full-name"><?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            <?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>

                    <!-- Choose button container - centered below name -->
                    <div class="choose-button-container" id="chooseButtonContainer" style="display: none;">
                        <button type="button" class="btn-choose-photo" id="triggerFileUpload">Choose Photo to
                            Upload</button>
                    </div>
                </div>

                <!-- Name fields with labels -->
                <div class="fields-row with-labels">
                    <div class="form-group flex-field">
                        <label for="first_name" class="field-label">First name</label>
                        <input type="text" id="first_name" name="first_name" required
                            value="<?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="First name" maxlength="50" disabled>
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group flex-field">
                        <label for="last_name" class="field-label">Last name</label>
                        <input type="text" id="last_name" name="last_name" required
                            value="<?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Last name" maxlength="50" disabled>
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <!-- Contact number with label -->
                <div class="form-group full-width with-label">
                    <label for="contact_number" class="field-label">Contact Number</label>
                    <input type="tel" id="contact_number" name="contact_number" required
                        value="<?php echo htmlspecialchars($admin['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        placeholder="09XX XXX XXXX" maxlength="13" disabled>
                    <div class="error-message" id="contactError"></div>
                </div>
            </div>

            <!-- Account Info Section with buttons at bottom -->
            <div class="form-section account-info-section">
                <h3>Account Information</h3>

                <div class="info-row">
                    <div class="info-group">
                        <label>Email</label>
                        <p class="info-value centered">
                            <?php echo htmlspecialchars($admin['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p class="info-value centered">
                            <?php echo htmlspecialchars($admin['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <div class="info-note centered">These details cannot be changed.</div>

                <!-- Buttons inside Account Info column at bottom -->
                <div class="profile-actions">
                    <button type="button" id="editCancelBtn" class="btn btn-secondary">Edit</button>
                    <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <!-- Feedback Modal -->
    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-in.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: admin-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-in.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Sign In</div>

        <form id="signinForm" class="signin-container" method="POST">
            <input type="hidden" name="action" value="signin">

            <div class="form-group">
                <label for="identifier">Email or Username</label>
                <input type="text" id="identifier" name="identifier" required autocomplete="username">
                <div class="error-message" id="identifierError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                    </button>
                </div>
                <div class="error-message" id="passwordError"></div>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <p class="signup-link">
                Don't have an admin account? <a href="admin-sign-up.php">Register</a>
            </p>
        </form>
    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-in.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-up.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: admin-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-up.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Registration</div>

        <form id="signupForm" class="signup-container" method="POST" autocomplete="on">
            <input type="hidden" name="action" value="signup">

            <!-- Two-column layout -->
            <div class="form-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                        autocomplete="given-name">
                    <div class="error-message" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name"
                        autocomplete="family-name">
                    <div class="error-message" id="lastNameError"></div>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number *</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel">
                    <div class="help-text">Philippine mobile number (e.g., 09123456789)</div>
                    <div class="error-message" id="contactError"></div>
                </div>
            </div>

            <div class="form-section">
                <h3>Account Information</h3>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder="admin@example.com"
                        autocomplete="email">
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" id="username" name="username" required placeholder="Choose a username"
                        autocomplete="username">
                    <div class="help-text">3-20 characters (letters, numbers, underscore)</div>
                    <div class="error-message" id="usernameError"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                    <div class="help-text">8-16 characters, with uppercase, lowercase, and number</div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" tabindex="-1"
                            aria-label="Toggle confirm password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password"
                                id="confirmPasswordIcon">
                        </button>
                    </div>
                    <div class="error-message" id="confirmError"></div>
                </div>
            </div>

            <!-- Buttons Section - Full width -->
            <div class="form-section full-width-section">
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Register Admin</button>
                    <button type="reset" class="btn btn-secondary" id="clearForm">Clear Form</button>
                </div>

                <div class="links-group">
                    <p class="login-link">
                        Already have an admin account? <a href="admin-sign-in.php">Sign In</a>
                    </p>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifier Modal -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-up.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-verify-sellers.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Sellers - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-verify-sellers.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>Verify Sellers</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="pending">Pending Verification</span>
            <span class="filter-tab" data-filter="verified">Verified</span>
            <span class="filter-tab" data-filter="rejected">Rejected</span>
        </div>

        <!-- Sellers List Container -->
        <div id="sellersList" class="sellers-list">
            <div class="loading">Loading sellers...</div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="notificationClose">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-verify-sellers.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-header.php`

**Status:** `FOUND`

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
$isAdminLoggedIn = isset($_SESSION['admin_id']);

// Path detection
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

// Check if we're in a subdirectory
$is_includes = strpos($current_dir, '/includes') !== false;
$is_pages = strpos($current_dir, '/pages') !== false;

if ($is_includes) {
    $pathPrefix = '../';
} elseif ($is_pages) {
    $pathPrefix = '../';
} else {
    $pathPrefix = '';
}

// Get admin info for profile display
$adminName = '';
$adminProfilePic = $pathPrefix . 'assets/image/icons/user-profile-circle.svg';
if ($isAdminLoggedIn && isset($_SESSION['admin_first_name'])) {
    $adminName = $_SESSION['admin_first_name'] . ' ' . ($_SESSION['admin_last_name'] ?? '');
    
    // In a real implementation, you would fetch the actual profile picture from database
    // $adminProfilePic = getAdminProfilePictureUrl($_SESSION['admin_profile_pic'] ?? '');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-sign-out.css">

    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-sign-out.js"></script>
</head>

<body>
    <header class="header-bar no-transition">
        <div class="header-logo">
            <?php if ($isAdminLoggedIn): ?>
            <!-- Show profile picture and admin name -->
            <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <div class="admin-profile-mini">
                    <img src="<?php echo $adminProfilePic; ?>" alt="Admin" class="admin-avatar">
                </div>
                <div class="title">
                    <span>Admin</span> Panel
                    <?php if (!empty($adminName)): ?>
                    <span class="admin-name">(<?php echo htmlspecialchars($adminName); ?>)</span>
                    <?php endif; ?>
                </div>
            </a>
            <?php else: ?>
            <!-- Show logo for non-logged in visitors -->
            <a href="<?php echo $pathPrefix; ?>admin-index.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <img id="logo" src="<?php echo $pathPrefix; ?>assets/image/brand/Logo.png" alt="Logo"
                    style="height: 40px; width: auto;">
                <div class="title"><span>Admin</span> Panel</div>
            </a>
            <?php endif; ?>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <?php if ($isAdminLoggedIn): ?>
                <!-- Logged in admin navigation - DESKTOP -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
                <?php else: ?>
                <!-- Not logged in - show sign in link -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="nav-link">SIGN IN</a>
                <?php endif; ?>
            </nav>

            <?php if ($isAdminLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if ($isAdminLoggedIn): ?>
        <!-- Mobile navigation for logged in admin -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <!-- Mobile navigation for not logged in -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isAdminLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/logoutsvg.svg" alt="Logout"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </div>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="logout-modal-buttons">
                <button id="cancelLogout" class="logout-modal-btn btn-cancel">Cancel</button>
                <button id="confirmLogout" class="logout-modal-btn btn-confirm">Logout</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-footer.php`

**Status:** `FOUND`

```php
<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'admin-index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>Admin <span>Control Panel</span></h2>
            <h2>Manage & <span>Monitor</span></h2>
        </div>
        <div class="socials">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg" alt="Facebook"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg';">
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/instagram.svg" alt="Instagram"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
            <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/youtube.svg" alt="YouTube"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
        </div>
    </div>
    <div class="footer-lower">
        <div class="mail-button">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/mail.svg" alt="Mail"
                onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            <span>admin@crooks-cart.edu.ph</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>includes/admin-privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>includes/admin-terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-privacy-policy.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-privacy-policy.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Admin <span class="policy-hero__highlight">Privacy Policy</span></h1>
                <p class="policy-hero__subtitle">Administrator Data Handling - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to the administrator panel of Crooks Cart Collectives, a student project
                    developed for academic requirements at the School of Computer Studies, Arellano University -
                    Bonifacio Campus. This section outlines how administrator data is handled.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="admin-information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Administrator Information Collected</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For administrator accounts, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Personal Information:</strong> First name, last name
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Email address, contact number
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Account Credentials:</strong> Username, password (hashed for security)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Profile Picture:</strong> Optional profile image
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> Administrator accounts are created for project management and
                            monitoring purposes only.
                        </p>
                    </div>
                </article>

                <article id="admin-data-access" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. Data Access & Monitoring</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Administrators have access to:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">User registration data (for verification purposes)
                            </li>
                            <li class="policy-section__list-item">Seller applications and verification status</li>
                            <li class="policy-section__list-item">Product listings across the platform</li>
                            <li class="policy-section__list-item">Order information and transaction logs</li>
                            <li class="policy-section__list-item">System activity logs (user logins, product additions,
                                orders)</li>
                        </ul>
                        <p>All administrator actions are logged for accountability.</p>
                    </div>
                </article>

                <article id="admin-security" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Administrator Security</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Passwords are securely hashed using industry standards
                            </li>
                            <li class="policy-section__list-item">Session management with timeout protection</li>
                            <li class="policy-section__list-item">Access restricted to authenticated administrators only
                            </li>
                            <li class="policy-section__list-item">All administrative actions are logged for security
                                auditing</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-disclaimer" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">4. Academic Disclaimer</h2>
                    </header>
                    <div class="policy-section__body">
                        <p class="policy-section__important">
                            <strong>IMPORTANT:</strong> This administrator panel is part of a student project created
                            for educational purposes. All data, including administrator information, is stored locally
                            in the project database and used solely for demonstrating system administration
                            functionality.
                        </p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about administrator data handling:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Email:</strong> scs.bonifacio@arellano.edu.ph</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-terms-and-conditions.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-terms-and-conditions';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terms and Conditions - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-terms-and-conditions.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="terms-page">
        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="terms-hero__container">
                <h1 class="terms-hero__title">Admin <span class="terms-hero__highlight">Terms & Conditions</span></h1>
                <p class="terms-hero__subtitle">Administrator Agreement - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="terms-intro">
            <div class="terms-intro__card">
                <p class="terms-intro__text">
                    This administrator agreement applies to users granted access to the Crooks Cart Collectives admin
                    panel. By accessing the admin panel, you agree to these terms and conditions governing administrator
                    responsibilities and conduct.
                </p>
                <p class="terms-intro__effective-date">Effective Date: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="terms-content">
            <div class="terms-sections">

                <article id="admin-responsibilities" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">1. Administrator Responsibilities</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As an administrator of this academic project, you agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Maintain the confidentiality of your login credentials
                            </li>
                            <li class="terms-section__list-item">Use admin privileges only for legitimate project
                                purposes</li>
                            <li class="terms-section__list-item">Verify seller applications accurately and fairly</li>
                            <li class="terms-section__list-item">Monitor user reports and take appropriate action</li>
                            <li class="terms-section__list-item">Not abuse admin privileges for personal gain</li>
                        </ul>
                    </div>
                </article>

                <article id="admin-privileges" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">2. Administrator Privileges</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators are granted the following privileges:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Access to view user and seller information</li>
                            <li class="terms-section__list-item">Ability to verify or reject seller applications</li>
                            <li class="terms-section__list-item">View system logs and user activities</li>
                            <li class="terms-section__list-item">Create additional administrator accounts</li>
                            <li class="terms-section__list-item">Monitor marketplace transactions and reports</li>
                        </ul>
                    </div>
                </article>

                <article id="accountability" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">3. Accountability and Logging</h2>
                    </header>
                    <div class="terms-section__body">
                        <p class="terms-section__important">
                            <strong>IMPORTANT:</strong> All administrator actions are logged and monitored.
                        </p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Every admin login is timestamped and recorded</li>
                            <li class="terms-section__list-item">Seller verification actions are logged with admin ID
                            </li>
                            <li class="terms-section__list-item">Any changes to user data are tracked</li>
                            <li class="terms-section__list-item">Misuse of admin privileges may result in removal of
                                access</li>
                        </ul>
                    </div>
                </article>

                <article id="data-handling" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">4. Data Handling and Privacy</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Respect user privacy and confidentiality</li>
                            <li class="terms-section__list-item">Not share or export user data outside the project</li>
                            <li class="terms-section__list-item">Use data only for legitimate administrative purposes
                            </li>
                            <li class="terms-section__list-item">Report any security concerns to project leads</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-purposes" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">5. Academic Project Context</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>This administrator panel is part of an academic project. By using it, you acknowledge:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This is a demonstration project for educational
                                purposes</li>
                            <li class="terms-section__list-item">No real financial transactions occur on the platform
                            </li>
                            <li class="terms-section__list-item">The system may be modified or taken down after project
                                completion</li>
                            <li class="terms-section__list-item">Your role as an administrator is part of the academic
                                exercise</li>
                        </ul>
                    </div>
                </article>

                <article id="contact" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">6. Contact Information</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>For questions regarding administrator access:</p>
                        <address class="terms-contact">
                            <p class="terms-contact__item"><strong>Institution:</strong> School of Computer Studies</p>
                            <p class="terms-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="terms-contact__item"><strong>Course:</strong> Web Development</p>
                            <p class="terms-contact__item"><strong>Project Lead:</strong> Lance N. Madelar</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>

        <!-- Agreement Section -->
        <section class="terms-agreement">
            <div class="terms-agreement__box">
                <p class="terms-agreement__text">
                    By accessing the administrator panel, you acknowledge that this is an academic project and agree to
                    use admin privileges responsibly and ethically.
                </p>
                <div class="terms-agreement__actions">
                    <a href="admin-sign-in.php" class="terms-agreement__btn terms-agreement__btn--primary">Return to
                        Sign In</a>
                    <a href="admin-index.php" class="terms-agreement__btn terms-agreement__btn--secondary">Back to
                        Admin</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-header.js`

**Status:** `FOUND`

```javascript
document.addEventListener("DOMContentLoaded", () => {
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 100);
    }
    
    // Initialize header after a short delay to ensure DOM is ready
    if (!window.headerInitialized) {
        setTimeout(() => {
            initializeHeader();
        }, 50);
        
        setTimeout(() => {
            const header = document.querySelector('.header-bar');
            const mobileNav = document.getElementById('mobileNav');
            
            if (header) header.classList.remove('no-transition');
            if (mobileNav) mobileNav.classList.remove('no-transition');
        }, 300);
        
        window.headerInitialized = true;
    }
});

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        logo.onerror = function() {
            this.src = "assets/image/brand/Logo.png";
        };
    }
    
    // Mobile menu functionality
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu');
        
        // Remove any existing inline styles that might interfere
        mobileNav.style.transform = '';
        mobileNav.style.display = '';
        
        // Remove any existing backdrop to avoid duplicates
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Ensure mobile nav is hidden by default
        mobileNav.classList.remove('open');
        
        // Function to toggle menu
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
            
            // Force remove any inline transform that might linger
            mobileNav.style.transform = '';
        }
        
        // Function to close menu
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
            }
        }
        
        // Event listeners
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking a link inside mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle window resize - close mobile menu on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1005 && mobileNav.classList.contains('open')) {
                closeMenu();
            }
        });
        
        console.log('Mobile menu initialized');
    } else {
        console.error('Menu elements not found');
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'admin-index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage) {
                link.classList.add('active');
            }
        }
    });
}

function adjustContentMargin() {
    const header = document.querySelector('.header-bar');
    const content = document.querySelector('.content');
    if (header && content) {
        const headerHeight = header.offsetHeight;
        content.style.marginTop = headerHeight + 'px';
    }
}

window.HeaderFunctions = {
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-logs.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logsList = document.getElementById('logsList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    let currentFilter = 'all';
    let allLogs = [];

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterLogs(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderLogs(allLogs);
        } else {
            const filtered = allLogs.filter(log => log.log_type === filter);
            renderLogs(filtered);
        }
    }

    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    }

    function getLogIcon(logType) {
        switch(logType) {
            case 'user_login': return 'profile.svg';
            case 'seller_application': return 'verified-empty.svg';
            case 'product_added': return 'package.svg';
            case 'order_placed': return 'order.svg';
            default: return 'time-update.svg';
        }
    }

    function getLogDescription(log) {
        switch(log.log_type) {
            case 'user_login':
                return `${log.user_name} (${log.email}) logged in`;
            case 'seller_application':
                return `${log.user_name} applied as seller - ${log.business_name || 'No business name'}`;
            case 'product_added':
                return `${log.user_name} added product: ${log.product_name}`;
            case 'order_placed':
                return `${log.user_name} ordered ${log.quantity}x ${log.product_name}`;
            default:
                return 'Unknown activity';
        }
    }

    function renderLogs(logs) {
        if (!logs || logs.length === 0) {
            logsList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/time-update.svg" alt="No logs" class="empty-state-icon">
                        <h2>No logs found</h2>
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="logs-container">';

        logs.forEach(log => {
            const iconFile = getLogIcon(log.log_type);
            const description = getLogDescription(log);
            const formattedTime = formatTimestamp(log.timestamp);

            html += `
                <div class="log-entry">
                    <div class="log-icon">
                        <img src="../assets/image/icons/${iconFile}" alt="${log.log_type}">
                    </div>
                    <div class="log-content">
                        <div class="log-description">${escapeHtml(description)}</div>
                        <div class="log-time">${formattedTime}</div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        logsList.innerHTML = html;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function loadLogs(filter = 'all') {
        logsList.innerHTML = '<div class="loading">Loading logs...</div>';

        try {
            const response = await fetch(`../database/admin-logs-handler.php?action=get_logs&type=${filter}`);
            const result = await response.json();

            if (result.status === 'success') {
                allLogs = result.data;
                filterLogs(currentFilter);
            } else {
                logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load logs.</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading logs:', error);
            logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            currentFilter = filter;
            setActiveFilter(filter);
            loadLogs(filter);
        });
    });

    // Initial load
    loadLogs('all');
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-profile.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Get ALL editable fields in Personal Info section
    const editableInputs = document.querySelectorAll(
        '.personal-info-section input:not([type="hidden"]):not([type="file"]), ' +
        '.personal-info-section textarea'
    );
    
    const profilePicUpload = document.getElementById('profilePictureUpload');
    const chooseButtonContainer = document.getElementById('chooseButtonContainer');
    const triggerFileUpload = document.getElementById('triggerFileUpload');
    const profilePicInput = document.getElementById('profile_picture');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const contactInput = document.getElementById('contact_number');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== PHONE NUMBER FORMATTING =====
    function formatPhilippineNumber(input) {
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('63') && value.length <= 12) {
            if (value.length > 2) {
                let formatted = '+63';
                if (value.length > 5) {
                    formatted += ' ' + value.substring(2, 5);
                } else {
                    formatted += ' ' + value.substring(2);
                }
                if (value.length > 8) {
                    formatted += ' ' + value.substring(5, 8);
                }
                if (value.length > 11) {
                    formatted += ' ' + value.substring(8, 12);
                }
                input.value = formatted;
            }
        } else if (value.startsWith('0') && value.length <= 11) {
            if (value.length > 4) {
                let formatted = value.substring(0, 4) + ' ' + value.substring(4, 7);
                if (value.length > 7) {
                    formatted += ' ' + value.substring(7, 11);
                }
                input.value = formatted;
            } else {
                input.value = value;
            }
        }
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/\D/g, '');
        return (cleaned.length === 11 && cleaned.startsWith('09'));
    }

    // Modal functions
    function showModal(message) {
        modalMessage.textContent = message;
        modal.style.display = 'flex';
    }

    function hideModal() {
        modal.style.display = 'none';
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    // Store original values
    function storeOriginalValues() {
        originalValues = {};
        editableInputs.forEach(input => {
            if (input.id) {
                originalValues[input.id] = input.value;
            }
        });
        if (profilePicPreview) {
            originalValues.profile_picture = profilePicPreview.src;
        }
    }

    // Enable edit mode
    function enableEditMode() {
        isEditMode = true;
        editBtn.textContent = 'Cancel';
        saveBtn.disabled = false;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'block';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'flex';
        }
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        pictureChanged = false;
    }

    // Disable edit mode
    function disableEditMode(restore = true) {
        isEditMode = false;
        editBtn.textContent = 'Edit';
        saveBtn.disabled = true;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'none';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'none';
        }
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.textContent = '';
        }
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        if (restore) {
            for (let id in originalValues) {
                const field = document.getElementById(id);
                if (field) {
                    field.value = originalValues[id];
                }
            }
            if (originalValues.profile_picture && profilePicPreview) {
                profilePicPreview.src = originalValues.profile_picture;
            }
        }
        
        pictureChanged = false;
    }

    // Trigger file upload from the Choose button
    if (triggerFileUpload && profilePicInput) {
        triggerFileUpload.addEventListener('click', function() {
            profilePicInput.click();
        });
    }

    // File input change
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = file.name;
                }
                pictureChanged = true;
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (profilePicPreview) {
                        profilePicPreview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = '';
                }
                pictureChanged = false;
            }
        });
    }

    // Phone number formatting
    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode) {
                formatPhilippineNumber(this);
            }
        });
        
        contactInput.addEventListener('blur', function() {
            if (isEditMode && this.value && !isPhoneValid(this.value)) {
                this.style.borderColor = '#FF8246';
            } else {
                this.style.borderColor = '';
            }
        });
    }

    // Edit/Cancel button
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            if (!isEditMode) {
                storeOriginalValues();
                enableEditMode();
            } else {
                disableEditMode(true);
            }
        });
    }

    // Save button
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const contact = contactInput ? contactInput.value.trim() : '';

            if (!firstName || !lastName) {
                showModal('First name and last name are required.');
                return;
            }

            if (!contact || !isPhoneValid(contact)) {
                showModal('Please enter a valid Philippine mobile number (e.g., 09123456789).');
                return;
            }

            // Disable button and store original text
            saveBtn.disabled = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/admin-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    setTimeout(() => {
                        if (!pictureChanged) {
                            // Update the displayed full name
                            const nameSpan = document.querySelector('.display-full-name');
                            if (nameSpan && result.data) {
                                nameSpan.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                            }
                            storeOriginalValues();
                            disableEditMode(false);
                        } else {
                            window.location.reload(true);
                        }
                        saveBtn.textContent = originalText;
                    }, 1000);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.');
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.');
                saveBtn.disabled = false;
                saveBtn.textContent = originalText;
            }
        });
    }

    // Initial store
    storeOriginalValues();
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-in.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signinForm');
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    const identifierInput = document.getElementById('identifier');
    const passwordInput = document.getElementById('password');
    const identifierError = document.getElementById('identifierError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');

    let isModalOpen = false;
    let isSubmitting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordInput && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    function clearErrors() {
        identifierError.textContent = '';
        passwordError.textContent = '';
        identifierInput.classList.remove('error');
        passwordInput.classList.remove('error');
    }

    function showFieldError(field, message) {
        const errorElement = field === 'identifier' ? identifierError : passwordError;
        const inputElement = field === 'identifier' ? identifierInput : passwordInput;

        errorElement.textContent = message;
        inputElement.classList.add('error');
    }

    // ============= MODAL EVENT LISTENERS =============
    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= BLUR VALIDATION =============
    identifierInput.addEventListener('blur', () => {
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
        } else {
            identifierError.textContent = '';
            identifierInput.classList.remove('error');
        }
    });

    passwordInput.addEventListener('blur', () => {
        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
        } else {
            passwordError.textContent = '';
            passwordInput.classList.remove('error');
        }
    });

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (isSubmitting) return;

        clearErrors();

        // Client-side validation
        let isValid = true;
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
            isValid = false;
        }

        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
            isValid = false;
        }

        if (!isValid) {
            showNotifier('Please fix the errors above');
            return;
        }

        // Show loading state
        isSubmitting = true;
        const submitBtn = form.querySelector('.btn-primary');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Signing In...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(form);

            const response = await fetch('../database/admin-sign-in-handler.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotifier('Login successful! Redirecting...');
                
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 1500);
            } else {
                if (result.message === 'invalid-credentials') {
                    showNotifier('Invalid credentials. Please try again.');
                    identifierInput.classList.add('error');
                    passwordInput.classList.add('error');
                } else {
                    showNotifier('Login failed. Please try again.');
                }
            }
        } catch (error) {
            console.error('Login error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            // Reset button state
            isSubmitting = false;
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Focus on identifier field
    setTimeout(() => {
        identifierInput.focus();
    }, 100);
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-out.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    
    let isProcessing = false;

    if (!logoutTriggers.length || !logoutModal) return;

    // Show modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.style.display = 'flex';
        });
    });

    // Hide modal on cancel
    if (cancelLogout) {
        cancelLogout.addEventListener('click', () => {
            logoutModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            logoutModal.style.display = 'none';
        }
    });

    // Handle confirm logout
    if (confirmLogout) {
        confirmLogout.addEventListener('click', async () => {
            if (isProcessing) return;
            
            isProcessing = true;
            const originalText = confirmLogout.textContent;
            confirmLogout.textContent = 'Logging out...';
            confirmLogout.disabled = true;

            try {
                const response = await fetch('../database/admin-sign-out-handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (result.status === 'success') {
                    window.location.replace(result.redirect + '?t=' + Date.now());
                } else {
                    console.error('Logout error:', result.message);
                    window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
                }
            } catch (error) {
                console.error('Logout error:', error);
                window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && logoutModal.style.display === 'flex') {
            logoutModal.style.display = 'none';
        }
    });
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-up.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const sellersList = document.getElementById('sellersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    let currentFilter = 'pending';
    let allSellers = [];

    // Show/hide modal functions
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                notificationModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 3000);
        }
    }

    function hideNotification() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotification);
    }

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotification();
    });

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterSellers(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (!allSellers || allSellers.length === 0) {
            renderEmptyState(filter);
            return;
        }

        let filteredSellers = [];
        if (filter === 'pending') {
            filteredSellers = allSellers.filter(s => s.is_verified === 0 || s.is_verified === '0');
        } else if (filter === 'verified') {
            filteredSellers = allSellers.filter(s => s.is_verified === 1 || s.is_verified === '1');
        } else if (filter === 'rejected') {
            filteredSellers = allSellers.filter(s => s.is_verified === 2 || s.is_verified === '2');
        }

        if (filteredSellers.length === 0) {
            renderEmptyState(filter);
        } else {
            renderSellers(filteredSellers);
        }
    }

    function renderEmptyState(filter = 'pending') {
        let message = '';
        if (filter === 'pending') {
            message = 'No pending seller applications.';
        } else if (filter === 'verified') {
            message = 'No verified sellers yet.';
        } else if (filter === 'rejected') {
            message = 'No rejected applications.';
        }

        sellersList.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/verified-empty.svg" alt="No sellers" class="empty-state-icon">
                    <h2>${message}</h2>
                </div>
            </div>
        `;
    }

    function renderSellers(sellers) {
        let html = '<div class="sellers-grid">';

        sellers.forEach(seller => {
            const createdDate = seller.created_at ? new Date(seller.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : 'N/A';

            const statusBadge = seller.is_verified == 0 ? 'pending' : 
                               seller.is_verified == 1 ? 'verified' : 'rejected';
            const statusText = seller.is_verified == 0 ? 'Pending' : 
                              seller.is_verified == 1 ? 'Verified' : 'Rejected';

            html += `
                <div class="seller-card" data-id="${seller.seller_id}">
                    <div class="seller-header">
                        <h3>${escapeHtml(seller.business_name || 'No Business Name')}</h3>
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </div>
                    <div class="seller-body">
                        <p><strong>Name:</strong> ${escapeHtml(seller.first_name || '')} ${escapeHtml(seller.last_name || '')}</p>
                        <p><strong>Email:</strong> ${escapeHtml(seller.email || 'N/A')}</p>
                        <p><strong>Contact:</strong> ${escapeHtml(seller.contact_number || 'N/A')}</p>
                        <p><strong>Applied:</strong> ${createdDate}</p>
                    </div>
            `;

            if (seller.is_verified == 0) {
                html += `
                    <div class="seller-actions">
                        <button class="btn-verify" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/verified-filled.svg" alt="Verify" class="btn-icon">
                            Verify
                        </button>
                        <button class="btn-reject" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                            Reject
                        </button>
                    </div>
                `;
            }

            html += '</div>';
        });

        html += '</div>';
        sellersList.innerHTML = html;
        attachEventListeners();
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-verify').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'verify');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'reject');
            });
        });
    }

    async function handleVerification(sellerId, action) {
        // Disable button to prevent double submission
        const buttons = document.querySelectorAll(`.btn-${action}[data-id="${sellerId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            btn.style.opacity = '0.5';
        });

        try {
            const formData = new URLSearchParams();
            formData.append('action', action);
            formData.append('seller_id', sellerId);

            const response = await fetch('../database/admin-auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification(result.message);
                await loadSellers(); // Reload the list
            } else {
                showNotification(result.message || 'Action failed', true);
                // Re-enable buttons
                buttons.forEach(btn => {
                    btn.disabled = false;
                    btn.style.opacity = '1';
                });
            }
        } catch (error) {
            console.error('Verification error:', error);
            showNotification('Network error. Please try again.', true);
            // Re-enable buttons
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
            });
        }
    }

    async function loadSellers() {
        sellersList.innerHTML = '<div class="loading">Loading sellers...</div>';

        try {
            const response = await fetch('../database/admin-auth-handler.php?action=get_all_sellers');
            const result = await response.json();

            if (result.status === 'success') {
                allSellers = result.data;
                filterSellers(currentFilter);
            } else {
                sellersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load sellers: ' + (result.message || 'Unknown error') + '</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading sellers:', error);
            sellersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterSellers(filter);
        });
    });

    // Initial load
    loadSellers();
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-verify-sellers.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const sellersList = document.getElementById('sellersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    let currentFilter = 'pending';
    let allSellers = [];

    // Show/hide modal functions
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                notificationModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 3000);
        }
    }

    function hideNotification() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotification);
    }

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotification();
    });

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterSellers(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (!allSellers || allSellers.length === 0) {
            renderEmptyState('No sellers found in the database.');
            return;
        }

        let filteredSellers = [];
        if (filter === 'pending') {
            filteredSellers = allSellers.filter(s => s.is_verified === 0);
        } else if (filter === 'verified') {
            filteredSellers = allSellers.filter(s => s.is_verified === 1);
        } else if (filter === 'rejected') {
            filteredSellers = allSellers.filter(s => s.is_verified === 2);
        }

        if (filteredSellers.length === 0) {
            let message = '';
            if (filter === 'pending') {
                message = 'No pending seller applications.';
            } else if (filter === 'verified') {
                message = 'No verified sellers yet.';
            } else if (filter === 'rejected') {
                message = 'No rejected applications.';
            }
            renderEmptyState(message);
        } else {
            renderSellers(filteredSellers);
        }
    }

    function renderEmptyState(message) {
        sellersList.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/verified-empty.svg" alt="No sellers" class="empty-state-icon">
                    <h2>${message}</h2>
                    <p class="empty-state-hint">When users apply to become sellers, they will appear here for verification.</p>
                </div>
            </div>
        `;
    }

    function renderSellers(sellers) {
        let html = '<div class="sellers-grid">';

        sellers.forEach(seller => {
            const createdDate = seller.created_at ? new Date(seller.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : 'N/A';

            const statusBadge = seller.is_verified === 0 ? 'pending' : 
                               seller.is_verified === 1 ? 'verified' : 'rejected';
            const statusText = seller.is_verified === 0 ? 'Pending' : 
                              seller.is_verified === 1 ? 'Verified' : 'Rejected';

            const fullName = (seller.first_name && seller.first_name !== 'Unknown' ? seller.first_name : '') + 
                            (seller.last_name && seller.last_name !== 'User' ? ' ' + seller.last_name : '');
            
            const displayName = fullName.trim() || 'Unknown User';

            html += `
                <div class="seller-card" data-id="${seller.seller_id}">
                    <div class="seller-header">
                        <h3>${escapeHtml(seller.business_name)}</h3>
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </div>
                    <div class="seller-body">
                        <p><strong>Name:</strong> ${escapeHtml(displayName)}</p>
                        <p><strong>Email:</strong> ${escapeHtml(seller.email)}</p>
                        <p><strong>Contact:</strong> ${escapeHtml(seller.contact_number)}</p>
                        <p><strong>Applied:</strong> ${createdDate}</p>
                    </div>
            `;

            if (seller.is_verified === 0) {
                html += `
                    <div class="seller-actions">
                        <button class="btn-verify" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/verified-filled.svg" alt="Verify" class="btn-icon">
                            Verify
                        </button>
                        <button class="btn-reject" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                            Reject
                        </button>
                    </div>
                `;
            } else {
                html += `
                    <div class="seller-actions">
                        <span class="status-message">Already ${statusText.toLowerCase()}</span>
                    </div>
                `;
            }

            html += '</div>';
        });

        html += '</div>';
        sellersList.innerHTML = html;
        attachEventListeners();
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-verify').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'verify');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'reject');
            });
        });
    }

    async function handleVerification(sellerId, action) {
        // Disable button to prevent double submission
        const buttons = document.querySelectorAll(`.btn-${action}[data-id="${sellerId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Processing...';
            btn.dataset.originalText = originalText;
        });

        try {
            const formData = new URLSearchParams();
            formData.append('action', action);
            formData.append('seller_id', sellerId);

            const response = await fetch('../database/admin-auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification(result.message);
                await loadSellers(); // Reload the list
            } else {
                showNotification(result.message || 'Action failed', true);
                // Re-enable buttons
                buttons.forEach(btn => {
                    btn.disabled = false;
                    btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
                });
            }
        } catch (error) {
            console.error('Verification error:', error);
            showNotification('Network error. Please try again.', true);
            // Re-enable buttons
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
            });
        }
    }

    async function loadSellers() {
        sellersList.innerHTML = '<div class="loading">Loading sellers...</div>';

        try {
            const response = await fetch('../database/admin-auth-handler.php?action=get_all_sellers');
            const result = await response.json();

            if (result.status === 'success') {
                allSellers = result.data || [];
                if (allSellers.length === 0) {
                    renderEmptyState('No sellers found in the database.');
                } else {
                    filterSellers(currentFilter);
                }
            } else {
                sellersList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-content">
                            <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                            <h2>Error Loading Sellers</h2>
                            <p>${result.message || 'Failed to load sellers.'}</p>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading sellers:', error);
            sellersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                        <h2>Network Error</h2>
                        <p>Please check your connection and try again.</p>
                    </div>
                </div>
            `;
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterSellers(filter);
        });
    });

    // Initial load
    loadSellers();
});
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-dashboard.css`

**Status:** `FOUND`

```css
/* ===== DASHBOARD LAYOUT ===== */
.content {
    max-width: 1200px;
    margin: 80px auto 20px;
    padding: 20px;
    min-height: calc(100vh - 200px);
    width: 100%;
    box-sizing: border-box;
}

/* ===== WELCOME SECTION ===== */
.welcome-section {
    background: linear-gradient(135deg, #f2f4f6 0%, #ffffff 100%);
    padding: 50px 40px;
    border-radius: 12px;
    margin-bottom: 40px;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    border: 1px solid #363940;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff8246, #e8693d);
}

.welcome-section h1 {
    font-size: 2.2rem;
    color: #1e2e2f;
    margin-bottom: 15px;
    font-weight: 400;
    position: relative;
}

.welcome-section h1 span {
    color: #ff8246;
}

.welcome-section p {
    font-size: 1.1rem;
    color: #000000;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ===== DASHBOARD GRID ===== */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 20px;
    width: 100%;
    box-sizing: border-box;
}

/* ===== DASHBOARD CARDS ===== */
.dashboard-card {
    background: #f2f4f6;
    border-radius: 12px;
    padding: 30px 25px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    text-align: center;
    transition: box-shadow 0.3s ease-in-out;
    border: 1px solid #363940;
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.dashboard-card:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    border-color: #ff8246;
}

.dashboard-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, #ff8246, transparent);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.dashboard-card h3 {
    font-size: 1.4rem;
    color: #1e2e2f;
    margin-bottom: 15px;
    font-weight: 400;
    position: relative;
    padding-bottom: 10px;
}

.dashboard-card h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 2px;
    background: #ff8246;
    transition: width 0.3s ease;
}

.dashboard-card:hover h3::after {
    width: 80px;
}

.dashboard-card p {
    font-size: 1rem;
    color: #000000;
    margin-bottom: 25px;
    line-height: 1.6;
    flex-grow: 1;
    opacity: 0.8;
}

.card-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 130, 70, 0.1);
    border-radius: 50%;
    padding: 12px;
}

.card-icon img {
    width: 40px;
    height: 40px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: filter 0.3s ease;
}

/* ===== BUTTON STYLES ===== */
.btn-primary {
    display: inline-block;
    background: #ff8246;
    color: #ffffff;
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 400;
    font-size: 1rem;
    transition: background-color 0.3s ease-in-out;
    border: 2px solid transparent;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: auto;
    align-self: center;
    min-width: 140px;
    box-sizing: border-box;
}

.btn-primary:hover {
    background: #e8693d;
}

.btn-primary:active {
    transform: translateY(0);
}

/* ===== RESPONSIVE DESIGN ===== */
@media (min-width: 1200px) {
    .content {
        margin-top: 100px;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(4, 1fr);
    }
    
    .welcome-section h1 {
        font-size: 2.5rem;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .dashboard-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .content {
        margin-top: 70px;
        padding: 15px;
    }
    
    .welcome-section {
        padding: 40px 30px;
    }
    
    .welcome-section h1 {
        font-size: 2rem;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .dashboard-card {
        padding: 25px 20px;
    }
    
    .dashboard-card h3 {
        font-size: 1.3rem;
    }
}

@media (max-width: 767px) {
    body {
        overflow-x: hidden;
    }
    
    .content {
        margin-top: 60px;
        padding: 15px;
        max-width: 100%;
    }
    
    .welcome-section {
        padding: 30px 20px;
        margin-bottom: 30px;
    }
    
    .welcome-section h1 {
        font-size: 1.8rem;
    }
    
    .welcome-section p {
        font-size: 1rem;
    }
    
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        width: 100%;
    }
    
    .dashboard-card {
        padding: 25px 20px;
        max-width: 100%;
        margin: 0 auto;
        width: 100%;
    }
    
    .dashboard-card h3 {
        font-size: 1.3rem;
    }
    
    .btn-primary {
        padding: 10px 25px;
        min-width: 120px;
        font-size: 0.95rem;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 55px;
        padding: 12px;
    }
    
    .welcome-section {
        padding: 25px 15px;
    }
    
    .welcome-section h1 {
        font-size: 1.5rem;
    }
    
    .welcome-section p {
        font-size: 0.95rem;
    }
    
    .dashboard-card {
        padding: 20px 15px;
    }
    
    .dashboard-card h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .dashboard-card p {
        font-size: 0.95rem;
        margin-bottom: 20px;
    }
    
    .btn-primary {
        padding: 10px 20px;
        min-width: 110px;
        font-size: 0.9rem;
    }
}

@media (max-width: 375px) {
    .content {
        margin-top: 50px;
        padding: 10px;
    }
    
    .welcome-section {
        padding: 20px 12px;
    }
    
    .welcome-section h1 {
        font-size: 1.3rem;
    }
    
    .dashboard-card {
        padding: 18px 12px;
    }
    
    .btn-primary {
        padding: 8px 16px;
        min-width: 100px;
        font-size: 0.85rem;
    }
}

@media (max-height: 500px) and (orientation: landscape) {
    .content {
        margin-top: 50px;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .welcome-section {
        padding: 20px;
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dashboard-card {
    animation: fadeInUp 0.5s ease forwards;
    opacity: 0;
}

.dashboard-card:nth-child(1) { animation-delay: 0.1s; }
.dashboard-card:nth-child(2) { animation-delay: 0.2s; }
.dashboard-card:nth-child(3) { animation-delay: 0.3s; }
.dashboard-card:nth-child(4) { animation-delay: 0.4s; }
.dashboard-card:nth-child(5) { animation-delay: 0.5s; }
.dashboard-card:nth-child(6) { animation-delay: 0.6s; }
.dashboard-card:nth-child(7) { animation-delay: 0.7s; }

@media print {
    .btn-primary {
        display: none;
    }
    
    .dashboard-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ddd;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-footer.css`

**Status:** `FOUND`

```css
.footer {
  background-color: var(--color-background-B);
  padding: var(--size-header-padding);
  box-shadow: var(--effect-box-shadow-default);
  border-top: 2px solid var(--color-border-A);
  width: 100vw !important;
  max-width: 100%;
  box-sizing: border-box;
  position: relative;
  left: 0;
  margin: 0 !important;
}

.footer-upper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--size-navigation-gap);
  margin: 0;
  color: var(--color-text-B);
}

.queries {
  max-width: 50%;
  color: var(--color-text-A);
}

.queries h2 {
  font-size: var(--font-size-title);
  font-weight: var(--font-weight-bold);
}

.queries span {
  color: var(--color-accent-A);
}

.socials {
  display: flex;
  gap: var(--size-navigation-gap);
}

.socials a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
}

.socials a img {
  width:  40px;
  height: 40px;
}

.footer-lower {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  padding: 20px 0;
  font-size: var(--font-size-base);
  margin-top: 20px;
  border-top: 2px solid var(--color-border-A);
  margin-left: auto;
  margin-right: auto;
}

.mail-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 5px 0;
  color: var(--color-text-A);
}

.mail-button img {
  width: 20px;
  height: 20px;
  filter: brightness(0);
}

.policy-links {
  display: flex;
  gap: var(--size-navigation-gap);
  padding: 5px 0;
}

.policy-links a {
  color: var(--color-text-A);
  text-decoration: none;
  transition: color 0.2s ease-in-out;
}

.policy-links a:hover {
  color: var(--color-accent-A);
}

/* Responsive Design */
@media (max-width: 768px) {
  .policy-links {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }

  .footer-lower {
    flex-direction: column;
    align-items: flex-start;
  }

  .mail-button {
    margin-bottom: 10px;
  }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-header.css`

**Status:** `FOUND`

```css
/* CSS File Content */
:root {
  /* Sizes & Spacing */
  --size-logo-height: 40px;
  --size-button-padding: 10px 20px;
  --size-button-radius: 5px;
  --size-navigation-gap: 30px;
  --size-header-padding: 15px 40px;
  --size-mobile-menu-max-width: 270px;

  /* Color Palette - Light Theme */
  --color-background-A: #e4eaf2;        /* body background */
  --color-background-B: #f2f4f6;        /* header background */
  --color-background-C: #000000;  
  --color-linear-gradient-A: #a49bf8, #b8b9fa, #dbd5fd, #43c9fb;      /* mobile menu bg or secondary light bg */
  --color-text-A: #000000;              /* main text */
  --color-text-B: #ffffff;              /* button text on orange */
  --color-text-C: #1e2e2f;
  --color-accent-A: #ff8246;            /* primary orange */
  --color-hover-A: #e8693d;             /* hover orange variant */
  --color-border-A: #363940;            /* border */

  /* Effects */
  --effect-glow-A: 0 0 10px rgba(0, 0, 0, 0.2);                /* soft shadow */
  --effect-glow-B: 0 0 10px rgba(211, 94, 53, 0.7);            /* orange glow */
  --effect-box-shadow-default: 0 2px 6px rgba(0, 0, 0, 0.15);  /* lighter shadow */
  --effect-transition-default: all 0.3s ease-in-out;

  /* Typography */
  --font-family-base: Arial, sans-serif;
  --font-size-base: 16px;
  --font-size-title: 22px;
  --font-weight-bold: 400;
}

/* Global Styles */
body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: var(--color-background-A);
  color: var(--color-text-A);
  font-family: var(--font-family-base);
  transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}

/* Scrollbar Removal */
html {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

::-webkit-scrollbar {
  display: none;
}

/* Header Styles */
.header-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: var(--color-background-B);
  padding: var(--size-header-padding);
  box-shadow: var(--effect-box-shadow-default);
  border-bottom: 2px solid var(--color-border-A);
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  box-sizing: border-box;
}

.header-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
  max-width: 100%;
}

.header-logo img {
  height: var(--size-logo-height);
  width: auto;
}

.title {
  color: var(--color-text-A);
  font-size: var(--font-size-title);
  font-weight: var(--font-weight-bold);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.title span {
  color: var(--color-accent-A);
}

/* Navigation Styles */
.nav-container {
  display: flex;
  align-items: center;
  gap: var(--size-navigation-gap);
  max-width: 100%;
  overflow: hidden;
}

.nav-bar {
  display: flex;
  gap: var(--size-navigation-gap);
  overflow: hidden;
}

/* Desktop Navigation Link Styles */
.nav-link {
  color: var(--color-text-A);
  text-decoration: none;
  font-size: var(--font-size-base);
  transition: var(--effect-transition-default);
  white-space: nowrap;
  position: relative;
  padding: 5px 0;
}

.nav-link:hover, 
.nav-link.active {
  color: var(--color-hover-A);
}

/* Desktop hover underline effect */
.nav-link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--color-accent-A);
  transition: var(--effect-transition-default);
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

/* Button Styles */
.social-button {
  background: var(--color-accent-A);
  color: var(--color-text-B);
  padding: var(--size-button-padding);
  border-radius: var(--size-button-radius);
  text-decoration: none;
  transition: var(--effect-transition-default);
  border: 2px solid transparent;
}

.social-button:hover {
  background: var(--color-hover-A);
  box-shadow: var(--effect-glow-B);
  color: var(--color-text-B);
}

/* Mobile Menu Styles */
.hamburger-menu {
  display: none;
  cursor: pointer;
  padding: 8px;
  background: transparent;
  border: none;
  z-index: 1001;
}

.hamburger-icon {
  width: 30px;
  height: 30px;
  transition: var(--effect-transition-default);
}

.mobile-nav {
    position: fixed;
    top: 80px;
    right: 0;
    width: 50%;
    max-width: var(--size-mobile-menu-max-width);
    text-align: center;
    height: calc(100vh - 80px);
    background-color: var(--color-background-B);
    z-index: 1000;
    transform: translateX(100%); /* This is the key - hidden off-screen */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
    overflow-y: auto;
    border-left: 2px solid var(--color-border-A);
    border-radius: 15px 0 0 15px;
    box-shadow: none;
    visibility: visible;
    opacity: 1;
}

.mobile-nav.open {
    transform: translateX(0) !important; /* ensure it overrides any leftover inline */
  box-shadow: -4px 0 15px rgba(0, 0, 0, 0.2);
}
/* Mobile Navigation Link Styles - RESTORED ORIGINAL HOVER EFFECT */
.mobile-nav .nav-link {
  color: var(--color-text-A);
  text-decoration: none;
  font-size: 16px;
  padding: 15px 10px; /* Increased padding for better touch targets */
  position: relative;
  transition: var(--effect-transition-default);
  border-bottom: 1px solid var(--color-border-A);
  display: block; /* Make it block level for full width */
  width: 100%;
  box-sizing: border-box;
}

/* RESTORED: Underline hover effect for mobile nav - properly aligned */
.mobile-nav .nav-link::after {
  content: '';
  position: absolute;
  bottom: -1px; /* Adjusted to sit right on the border */
  left: 10px; /* Start after padding */
  right: 10px; /* End before padding */
  width: calc(100% - 20px); /* Full width minus left/right padding */
  height: 2px;
  background: var(--color-accent-A);
  transform: scaleX(0);
  transition: transform 0.3s ease-in-out;
  transform-origin: left;
}

.mobile-nav .nav-link:hover::after,
.mobile-nav .nav-link.active::after {
  transform: scaleX(1);
}

.mobile-nav .nav-link:hover,
.mobile-nav .nav-link.active {
  color: var(--color-hover-A);
}

/* Special styling for the social button in mobile nav */
.mobile-nav .social-button {
  margin-top: 20px;
  background-color: var(--color-accent-A);
  color: var(--color-text-A);
  padding: 15px 10px; /* Match nav link padding */
  border-radius: var(--size-button-radius);
  text-decoration: none;
  font-weight: var(--font-weight-bold);
  transition: var(--effect-transition-default);
  border: 2px solid transparent;
  text-align: center;
  display: block;
  width: 100%;
  box-sizing: border-box;
  position: relative;
}

/* Remove the after element for social button */
.mobile-nav .social-button::after {
  display: none;
}

.mobile-nav .social-button:hover {
  background: var(--color-hover-A);
  box-shadow: var(--effect-glow-B);
  color: var(--color-text-B);
}

/* Backdrop for mobile menu */
.menu-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.menu-backdrop.active {
  opacity: 1;
  visibility: visible;
}

/* Cart count badge */
.cart-count {
  position: absolute;
  top: -8px;
  right: -8px;
  background-color: var(--color-accent-A);
  color: white;
  font-size: 12px;
  font-weight: bold;
  padding: 2px 6px;
  border-radius: 50%;
  min-width: 18px;
  text-align: center;
}

/* Responsive Design */
@media (max-width: 1005px) {
  .hamburger-menu {
    display: block;
  }
  
  .nav-container {
    display: none;
  }
  
  .header-logo {
    gap: 5px;
  }
  
  .title {
    font-size: 20px;
  }
}

@media (max-width: 768px) {
  .header-bar {
    padding: 12px 25px;
  }
  
  .title {
    font-size: 18px;
  }
  
  .mobile-nav {
    width: 65%;
    top: 70px;
    height: calc(100vh - 70px);
  }
  
  /* Adjust underline for smaller screens */
  .mobile-nav .nav-link::after {
    left: 10px;
    right: 10px;
    width: calc(100% - 20px);
  }
}

@media (max-width: 480px) {
  .header-bar {
    padding: 10px 20px;
  }
  
  .title {
    font-size: 16px;
  }
  
  .mobile-nav {
    width: 80%;
    top: 65px;
    height: calc(100vh - 65px);
    padding: 15px;
  }
  
  .mobile-nav .nav-link {
    padding: 12px 10px;
  }
  
  /* Adjust underline for mobile */
  .mobile-nav .nav-link::after {
    bottom: -1px;
    left: 10px;
    right: 10px;
    width: calc(100% - 20px);
  }
}

/* Animation Enhancements */
.fade-in {
  opacity: 0;
  animation: fadeIn 0.5s ease-in-out forwards;
}

.fade-out {
  opacity: 1;
  animation: fadeOut 0.5s ease-in-out forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fadeOut {
  from { opacity: 1; }
  to { opacity: 0; }
}

.header-bar.header-delay,
.mobile-nav.header-delay {
  transition: none !important;
}

/* Fix for active link in desktop navigation */
.nav-link.active {
  color: var(--color-hover-A);
}

.nav-link.active::after {
  width: 100%;
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-index.css`

**Status:** `FOUND`

```css
/* ===== RESET & BASE STYLES ===== */
.content {
    margin-top: 100px;
}

/* ===== SHOWCASE SECTION ===== */
.showcase-section {
    position: relative;
    height: 70vh;
    overflow: hidden;
    margin-top: 70px;
    margin-bottom: 40px;
}

.showcase-slider {
    position: relative;
    width: 100%;
    height: 100%;
}

.showcase-slide {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: top center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.showcase-slide.active {
    opacity: 1;
}

.showcase-content {
    position: absolute;
    bottom: 20%;
    left: 10%;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    max-width: 600px;
}

.showcase-content h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
}

.showcase-content p {
    font-size: 1.5rem;
    margin-bottom: 30px;
}

.showcase-button {
    display: inline-block;
    padding: 15px 40px;
    background-color: #ff8246;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    transition: background-color 0.3s ease-in-out;
}

.showcase-button:hover {
    background-color: #e8693d;
}

.slider-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.slider-controls button {
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    transition: background-color 0.3s ease-in-out;
}

.slider-controls button:hover {
    background: #ff8246;
}

/* ===== FEATURES SECTION ===== */
.features-section {
    padding: 40px 0;
    background-color: #f2f4f6;
    margin-bottom: 20px;
}

.features-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.features-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.2rem;
    color: #1e2e2f;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.feature-card {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease-in-out;
}

.feature-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon img {
    width: 48px;
    height: 48px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: filter 0.3s ease;
}



.feature-card h3 {
    margin-bottom: 10px;
    color: #1e2e2f;
    font-size: 1.2rem;
}

.feature-card p {
    font-size: 0.95rem;
    line-height: 1.5;
}

/* ===== FEATURED PRODUCTS SECTION ===== */
.featured-products-section {
    padding: 30px 0;
}

.products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.featured-products-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.2rem;
    color: #1e2e2f;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
    padding: 0 10px;
}

.product-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-image-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
    background-color: #f5f5f5;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    margin: 0 0 8px 0;
    font-size: 1.1rem;
    color: #1e2e2f;
    line-height: 1.4;
    min-height: 2.8em;
    overflow: hidden;
    display: -webkit-box;
    --webkit-line-clamp: 2;
    --webkit-box-orient: vertical;
}

.product-price {
    color: #ff8246;
    font-weight: 400;
    font-size: 1.3rem;
    margin: 8px 0;
}

.product-seller {
    font-size: 0.85rem;
    color: #666;
    margin: 5px 0 12px 0;
}

.view-product-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff8246;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    text-align: center;
    transition: background-color 0.3s ease-in-out;
    margin-top: auto;
    font-size: 0.9rem;
}

.view-product-btn:hover {
    background-color: #e8693d;
}

.no-products-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.no-products-message p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 10px;
}

.become-seller-link {
    color: #ff8246;
    text-decoration: none;
    font-weight: 400;
}

.become-seller-link:hover {
    text-decoration: underline;
}

.view-all-products-btn {
    display: block;
    width: fit-content;
    margin: 20px auto 0;
    padding: 12px 35px;
    background-color: #ff8246;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    transition: background-color 0.3s ease-in-out;
}

.view-all-products-btn:hover {
    background-color: #e8693d;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .content {
        margin-top: 70px;
    }
    
    .showcase-section {
        height: 60vh;
        margin-top: -70px;
        margin-bottom: 30px;
    }
    
    .showcase-content {
        left: 5%;
        max-width: 90%;
    }
    
    .showcase-content h1 {
        font-size: 2.5rem;
    }
    
    .showcase-content p {
        font-size: 1.2rem;
    }
    
    .features-section {
        padding: 30px 0;
        margin-bottom: 15px;
    }
    
    .features-section h2 {
        margin-bottom: 20px;
        font-size: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .featured-products-section {
        padding: 20px 0;
    }
    
    .featured-products-section h2 {
        margin-bottom: 20px;
        font-size: 2rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
        padding: 0;
    }
    
    .product-image-container {
        height: 180px;
    }
    
    .view-all-products-btn {
        margin: 15px auto 0;
        padding: 10px 30px;
    }
}

@media (max-width: 480px) {
    .content {
        margin-top: 60px;
    }
    
    .showcase-section {
        height: 50vh;
        margin-top: -60px;
        margin-bottom: 20px;
    }
    
    .showcase-content h1 {
        font-size: 2rem;
    }
    
    .showcase-content p {
        font-size: 1rem;
    }
    
    .showcase-button {
        padding: 10px 25px;
        font-size: 0.9rem;
    }
    
    .features-section h2,
    .featured-products-section h2 {
        font-size: 1.8rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .view-all-products-btn {
        padding: 10px 25px;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .showcase-slide {
        background-position: center center;
    }
}

.features-section {
    position: relative;
}

.features-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 10%;
    right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, #ff8246, transparent);
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-logs.css`

**Status:** `FOUND`

```css
/* Admin Logs Styles */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified with admin dashboard ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== FILTER TABS - Consistent with verify sellers ===== */
.filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
    width: 100%;
}

.filter-tab {
    padding: 8px 20px;
    background: #ffffff;
    border-radius: 25px;
    cursor: pointer;
    font-size: 0.95rem;
    font-weight: 500;
    color: #666666;
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
    text-decoration: none;
    display: inline-block;
}

.filter-tab:hover {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
    box-shadow: 0 4px 8px rgba(255, 130, 70, 0.2);
}

.filter-tab.active {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

/* ===== LOGS LIST ===== */
.logs-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
    min-height: 400px;
}

/* ===== LOGS CONTAINER ===== */
.logs-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px 0;
}

/* ===== LOG ENTRY CARD ===== */
.log-entry {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    width: 100%;
}

.log-entry:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    border-color: #FF8246;
    transform: translateY(-2px);
}

/* ===== LOG ICON ===== */
.log-icon {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 130, 70, 0.1);
    border-radius: 50%;
    padding: 12px;
}

.log-icon img {
    width: 36px;
    height: 36px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: transform 0.3s ease;
}

.log-entry:hover .log-icon img {
    transform: scale(1.1);
}

/* ===== LOG CONTENT ===== */
.log-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.log-description {
    font-size: 1rem;
    color: #000000;
    line-height: 1.5;
    font-weight: 500;
}

.log-time {
    font-size: 0.85rem;
    color: #999999;
    display: flex;
    align-items: center;
    gap: 5px;
}

.log-time::before {
    content: '🕒';
    font-size: 0.8rem;
    opacity: 0.7;
}

/* ===== LOG TYPE BADGES (Optional - can be added in future) ===== */
.log-badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 10px;
    background: #f0f0f0;
    color: #666666;
}

.log-badge.user {
    background: #FF8246;
    color: #ffffff;
}

.log-badge.seller {
    background: #000000;
    color: #ffffff;
}

.log-badge.product {
    background: #FF8246;
    color: #ffffff;
}

.log-badge.order {
    background: #000000;
    color: #ffffff;
}

/* ===== EMPTY STATE ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 10px;
    line-height: 1.6;
}

.empty-state-hint {
    font-style: italic;
    color: #999999;
    font-size: 0.9rem;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px dashed #e0e0e0;
}

/* ===== LOADING STATE ===== */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1.1rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.loading::after {
    content: '';
    width: 40px;
    height: 40px;
    border: 3px solid #f0f0f0;
    border-top-color: #FF8246;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ===== ERROR STATE ===== */
.error-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.error-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.error-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.error-state h2 {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.error-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 25px;
    line-height: 1.6;
}

.error-state .btn {
    display: inline-block;
    padding: 10px 25px;
    background: #FF8246;
    color: #ffffff;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.error-state .btn:hover {
    background: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
    transform: translateY(-2px);
}

/* ===== STATS SUMMARY (Optional - can be added at top) ===== */
.logs-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-bottom: 25px;
}

.summary-card {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.summary-number {
    font-size: 1.8rem;
    font-weight: 700;
    color: #FF8246;
    line-height: 1.2;
    margin-bottom: 5px;
}

.summary-label {
    font-size: 0.85rem;
    color: #666666;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 992px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .filter-tabs {
        margin-bottom: 25px;
        padding: 8px 0;
    }
    
    .filter-tab {
        padding: 6px 16px;
        font-size: 0.9rem;
    }
    
    .log-entry {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 15px;
        padding: 25px 20px;
    }
    
    .log-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 5px;
    }
    
    .log-icon img {
        width: 40px;
        height: 40px;
    }
    
    .log-description {
        font-size: 0.95rem;
    }
    
    .log-time {
        justify-content: center;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.3rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
    
    .logs-summary {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .filter-tabs {
        gap: 8px;
    }
    
    .filter-tab {
        padding: 5px 12px;
        font-size: 0.85rem;
    }
    
    .log-entry {
        padding: 20px 15px;
    }
    
    .log-icon {
        width: 60px;
        height: 60px;
    }
    
    .log-icon img {
        width: 35px;
        height: 35px;
    }
    
    .log-description {
        font-size: 0.9rem;
        word-break: break-word;
    }
    
    .log-time {
        font-size: 0.8rem;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.2rem;
    }
    
    .empty-state p {
        font-size: 0.9rem;
    }
    
    .logs-summary {
        grid-template-columns: 1fr;
        gap: 8px;
    }
    
    .summary-card {
        padding: 12px;
    }
    
    .summary-number {
        font-size: 1.5rem;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .filter-tab {
        padding: 4px 10px;
        font-size: 0.8rem;
    }
    
    .log-entry {
        padding: 15px 12px;
    }
    
    .log-icon {
        width: 50px;
        height: 50px;
    }
    
    .log-icon img {
        width: 30px;
        height: 30px;
    }
}

/* ===== PRINT STYLES ===== */
@media print {
    .filter-tabs,
    .logs-summary,
    .btn {
        display: none;
    }
    
    .log-entry {
        break-inside: avoid;
        border: 1px solid #000000;
        box-shadow: none;
    }
    
    .log-icon img {
        filter: none;
    }
}

/* ===== ANIMATIONS ===== */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.log-entry {
    animation: slideIn 0.3s ease forwards;
    opacity: 0;
}

.log-entry:nth-child(1) { animation-delay: 0.1s; }
.log-entry:nth-child(2) { animation-delay: 0.15s; }
.log-entry:nth-child(3) { animation-delay: 0.2s; }
.log-entry:nth-child(4) { animation-delay: 0.25s; }
.log-entry:nth-child(5) { animation-delay: 0.3s; }
.log-entry:nth-child(6) { animation-delay: 0.35s; }
.log-entry:nth-child(7) { animation-delay: 0.4s; }
.log-entry:nth-child(8) { animation-delay: 0.45s; }
.log-entry:nth-child(9) { animation-delay: 0.5s; }
.log-entry:nth-child(10) { animation-delay: 0.55s; }

/* ===== SCROLLBAR STYLING ===== */
.logs-list::-webkit-scrollbar {
    width: 6px;
}

.logs-list::-webkit-scrollbar-track {
    background: #f0f0f0;
    border-radius: 3px;
}

.logs-list::-webkit-scrollbar-thumb {
    background: #FF8246;
    border-radius: 3px;
}

.logs-list::-webkit-scrollbar-thumb:hover {
    background: #e66a2e;
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-privacy-policy.css`

**Status:** `FOUND`

```css
/* /REVISE THIS FOR ADMIN PRIVACY POLOCY/ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.privacy-policy-page {
    max-width: 1000px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.policy-hero {
    margin-top: 100px;
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    background: white;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-hero__container {
    max-width: 800px;
    margin: 0 auto;
}

.policy-hero__title {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.policy-hero__highlight {
    color: #ff8246;
}

.policy-hero__subtitle {
    font-size: clamp(1rem, 3vw, 1.3rem);
    color: #666;
}

/* ===== INTRO SECTION ===== */
.policy-intro {
    margin-bottom: 40px;
}

.policy-intro__card {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-intro__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 15px;
}

.policy-intro__last-updated {
    font-size: 0.95rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 0;
}

/* ===== POLICY SECTIONS ===== */
.policy-sections {
    width: 100%;
}

.policy-section {
    background: white;
    border-radius: 10px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-section__header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.policy-section__accent {
    width: 4px;
    height: 30px;
    background-color: #ff8246;
    margin-right: 15px;
    border-radius: 2px;
}

.policy-section__title {
    font-size: 1.5rem;
    color: #333;
    margin: 0;
    font-weight: 600;
}

.policy-section__body {
    padding-left: 19px; /* Aligns with accent line */
}

.policy-section__body p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.policy-section__list {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}

.policy-section__list-item {
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

.policy-section__list-item::before {
    content: "•";
    color: #ff8246;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.policy-section__note {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    font-style: italic;
    color: #666;
}

.policy-section__important {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    margin-bottom: 15px;
}

/* Contact Details */
.policy-contact {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 15px 0;
    font-style: normal;
}

.policy-contact__item {
    margin-bottom: 8px;
}

.policy-contact__item:last-child {
    margin-bottom: 0;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .privacy-policy-page {
        margin-top: 80px;
    }
    
    .policy-hero {
        padding: 40px 20px;
    }
    
    .policy-section__title {
        font-size: 1.3rem;
    }
    
    .policy-section {
        padding: 25px 20px;
    }
    
    .policy-section__body {
        padding-left: 14px;
    }
}

@media (max-width: 480px) {
    .policy-hero {
        padding: 30px 15px;
    }
    
    .policy-hero__title {
        font-size: 2rem;
    }
    
    .policy-intro__card {
        padding: 20px;
    }
    
    .policy-intro__text {
        font-size: 1rem;
    }
    
    .policy-section__title {
        font-size: 1.2rem;
    }
    
    .policy-section__accent {
        height: 25px;
    }
    
    .policy-section {
        padding: 20px 15px;
    }
    
    .policy-section__body {
        padding-left: 9px;
    }
    
    .policy-section__body p,
    .policy-section__list-item {
        font-size: 0.95rem;
    }
    
    .policy-contact {
        padding: 15px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-profile.css`

**Status:** `FOUND`

```css
/* /REVISE THIS FOR ADMIN PROFILE/ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #f2f4f6;
    color: #000000;
    line-height: 1.5;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 30px 0 20px;
}

/* Form Container */
.profile-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

/* Form Sections - stacked vertically */
.form-section {
    background: #ffffff;
    border: 1px solid #000000;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
}

.form-section:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.form-section h3 {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #FF8246;
}

/* Account info section needs to position buttons at bottom */
.account-info-section {
    display: flex;
    flex-direction: column;
    min-height: 300px;
}

/* PROFILE STACKED CONTAINER - Stack vertically and center */
.profile-stacked-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-bottom: 30px;
}

/* Profile Picture Wrapper */
.profile-picture-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 15px;
}

.profile-picture-wrapper img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #FF8246;
    background: #f0f0f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Profile Name Single Line - first name + last name on one line */
.profile-name-single-line {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 10px;
    width: 100%;
}

.display-full-name {
    font-size: 2rem;
    font-weight: 600;
    color: #000000;
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 90%;
}

/* Choose button container - centered */
.choose-button-container {
    margin-top: 8px;
    width: 100%;
    display: flex;
    justify-content: center;
}

/* Choose photo button - centered */
.btn-choose-photo {
    background-color: #000000;
    color: #ffffff;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.3px;
    padding: 10px 24px;
    width: auto;
    min-width: 0;
    max-width: 100%;
    text-align: center;
    border: 1px solid #000000;
    white-space: nowrap;
}

.btn-choose-photo:hover {
    background-color: #333333;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

/* Profile picture upload (hidden file input) */
.profile-picture-upload {
    margin-top: 10px;
    width: 100%;
}

.file-upload-label {
    display: none;
}

.profile-picture-upload input[type="file"] {
    display: none;
}

.file-name {
    margin-top: 6px;
    font-size: 0.8rem;
    color: #000000;
    word-break: break-all;
    text-align: left;
    opacity: 0.7;
}

.help-text {
    font-size: 0.75rem;
    color: #666666;
    margin-top: 4px;
    text-align: left;
}

/* Fields row - for multiple fields in one line */
.fields-row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
}

/* Add labels above inputs */
.with-labels {
    margin-top: 10px;
}

.field-label {
    display: block;
    color: #000000;
    margin-bottom: 4px;
    opacity: 0.8;
}

/* Balanced row - for birthdate and gender to share space equally */
.balanced-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

/* Half field - exactly 50% minus half the gap */
.half-field {
    flex: 1 1 calc(50% - 7.5px);
    min-width: 0;
}

/* ===== FIXED: Info row - for account info items ===== */
.info-row {
    display: flex;
    flex-wrap: nowrap;
    gap: 15px;
    margin-bottom: 20px;
    width: 100%;
}

/* ===== FIXED: Info Group - for account info with equal height ===== */
.info-group {
    flex: 1 1 0;
    min-width: 0;
    display: flex;
    flex-direction: column;
    background: #f9f9f9;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    padding: 10px 8px;
    height: 100%;
}

.info-group label {
    display: block;
    color: #000000;
    margin-bottom: 2px;
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    opacity: 0.7;
    white-space: nowrap;
}

/* ===== FIXED: Info value with proper text handling ===== */
.info-value {
    font-size: 0.8rem;
    color: #000000;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.3;
    background: transparent;
    padding: 2px 0;
    border: none;
    width: 100%;
}

/* Special handling for email - slightly smaller to fit */
.info-group:first-child .info-value {
    font-size: 0.7rem;
    letter-spacing: -0.02em;
}

/* Flex field - grows/shrinks based on content */
.flex-field {
    flex: 1 1 auto;
    min-width: 120px;
}

/* Full width field */
.full-width {
    width: 100%;
}

/* Form Groups */
.form-group {
    margin-bottom: 0;
}

/* Input styles - ORIGINAL STYLING for enabled/disabled states */
.form-group input[type="text"],
.form-group input[type="date"],
.form-group select,
.form-group textarea {
    width: 100%;
    height: 42px;
    padding: 0 12px;
    border: 1px solid #000000;
    border-radius: 6px;
    font-size: 0.95rem;
    background-color: #ffffff;
    color: #000000;
    transition: all 0.3s ease;
}

/* Make date input consistent */
.form-group input[type="date"] {
    font-family: inherit;
}

.form-group textarea {
    height: 80px;
    padding: 8px 12px;
    resize: vertical;
    font-family: inherit;
}

/* FOCUS STATE - for when inputs are enabled and being edited */
.form-group input:not(:disabled):focus,
.form-group select:not(:disabled):focus,
.form-group textarea:not(:disabled):focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

/* DISABLED STATE - matches the info-value style from account info */
.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    background-color: #f9f9f9;
    border-color: #e0e0e0;
    color: #000000;
    cursor: not-allowed;
    opacity: 1;
}

/* Make placeholder text in disabled fields lighter */
.form-group input:disabled::placeholder,
.form-group select:disabled::placeholder,
.form-group textarea:disabled::placeholder {
    color: #999999;
    opacity: 1;
}

.error-message {
    color: #FF8246;
    font-size: 0.8rem;
    margin-top: 4px;
    min-height: 18px;
    display: none;
}

.error-message.show {
    display: block;
}

/* Info note - centered */
.info-note {
    margin-top: 10px;
    margin-bottom: 25px;
    color: #666666;
    font-style: italic;
    text-align: center;
    font-size: 0.9rem;
}

/* Profile actions - equal width buttons at bottom of account info */
.profile-actions {
    display: flex;
    gap: 15px;
    width: 100%;
    margin-top: auto;
    padding-top: 20px;
}

.profile-actions .btn {
    flex: 1 1 0;
    min-width: 0;
    padding: 12px 0;
    text-align: center;
}

.btn {
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.5px;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
}

.btn-primary:hover:not(:disabled) {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.btn:disabled {
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}

/* Messages */
.message {
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: none;
    border-left: 4px solid;
}

.message.success {
    background-color: #e8f5e9;
    color: #2e7d32;
    border-left-color: #2e7d32;
}

.message.error {
    background-color: #ffebee;
    color: #c62828;
    border-left-color: #c62828;
}

/* Feedback Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-message {
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #000000;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* ========== DESKTOP VIEW ========== */
@media (min-width: 769px) {
    .profile-picture-wrapper img {
        width: 150px;
        height: 150px;
    }
    
    .display-full-name {
        font-size: 2rem;
    }
    
    .btn-choose-photo {
        padding: 12px 32px;
        font-size: 1.1rem;
        border-radius: 40px;
    }
}

/* ========== TABLET VIEW ========== */
@media (min-width: 577px) and (max-width: 768px) {
    .profile-picture-wrapper img {
        width: 160px;
        height: 160px;
    }
    
    .display-full-name {
        font-size: 2rem;
    }
    
    .btn-choose-photo {
        padding: 10px 28px;
        font-size: 1rem;
        border-radius: 30px;
    }
    
    .info-value {
        font-size: 0.75rem;
    }
    
    .info-group:first-child .info-value {
        font-size: 0.65rem;
    }
}

/* ========== MOBILE VIEW ========== */
@media (max-width: 768px) {
    .info-row {
        flex-wrap: wrap;
    }
    
    .info-group {
        min-width: 200px;
    }
    
    .info-value {
        font-size: 0.85rem;
        white-space: normal;
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
    
    .info-group:first-child .info-value {
        font-size: 0.8rem;
        white-space: normal;
    }
}

@media (max-width: 576px) {
    .profile-picture-wrapper img {
        width: 140px;
        height: 140px;
    }
    
    .display-full-name {
        font-size: 1.8rem;
        white-space: normal;
        word-break: break-word;
    }
    
    .btn-choose-photo {
        padding: 10px 24px;
        font-size: 1rem;
        border-radius: 30px;
    }
    
    /* Form fields stack vertically */
    .fields-row {
        flex-direction: column;
        gap: 12px;
    }
    
    .flex-field {
        width: 100%;
    }
    
    .balanced-row {
        flex-direction: column;
    }
    
    .half-field {
        width: 100%;
    }
    
    .info-row {
        flex-direction: column;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .info-group {
        width: 100%;
        min-width: 100%;
    }
    
    .profile-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .profile-actions .btn {
        width: 100%;
    }
    
    .info-value {
        font-size: 0.95rem;
        white-space: normal;
        -webkit-line-clamp: 3;
    }
}

/* ========== SMALL MOBILE VIEW ========== */
@media (max-width: 375px) {
    .profile-picture-wrapper img {
        width: 120px;
        height: 120px;
    }
    
    .display-full-name {
        font-size: 1.5rem;
    }
    
    .btn-choose-photo {
        padding: 8px 20px;
        font-size: 0.9rem;
    }
    
    .info-value {
        font-size: 0.9rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-sign-in.css`

**Status:** `FOUND`

```css
/* /REVISE THIS AS PART OF ADMIN/ */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    min-height: calc(100vh - 200px);
}

/* ===== PAGE TITLE ===== */
.pageTitleHeader {
    text-align: center;
    font-size: 2.5rem;
    color: #1e2e2f;
    margin: 110px auto 20px;
    padding-bottom: 15px;
}

/* ===== FORM CONTAINER ===== */
.signin-container {
    max-width: 450px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #000000;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* ===== FORM GROUPS ===== */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #000000;
    font-size: 0.95rem;
}

.form-group input {
    width: 100%;
    height: 50px;
    padding: 0 15px;
    border: 1px solid #363940;
    border-radius: 6px;
    font-size: 1rem;
    background-color: #ffffff;
    color: #000000;
    transition: all 0.3s ease;
}

.form-group input:focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.form-group input.error {
    border-color: #FF8246;
}

.error-message {
    color: #FF8246;
    font-size: 0.85rem;
    margin-top: 5px;
    min-height: 20px;
}

/* ===== PASSWORD TOGGLE ===== */
.password-wrapper {
    position: relative;
    width: 100%;
}

.password-wrapper input {
    width: 100%;
    padding-right: 45px;
}

.password-toggle {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.password-toggle img {
    width: 20px;
    height: 20px;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.password-toggle:hover img {
    opacity: 1;
}

/* ===== BUTTONS ===== */
.btn {
    display: inline-block;
    padding: 14px 28px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    width: 100%;
    background: #000000;
    color: #ffffff;
}

.btn-primary {
    background: #FF8246;
    color: #ffffff;
}

.btn-secondary {
    background: #000000;
    color: #ffffff;
    border: 1px solid #363940;
}

/* ===== LINKS ===== */
.signup-link,
.forgot-password-link {
    text-align: center;
    margin-top: 20px;
    font-size: 0.95rem;
    color: #000000;
}

.signup-link a,
.forgot-password-link a {
    color: #FF8246;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.signup-link a:hover,
.forgot-password-link a:hover { 
    text-decoration: underline;
}

/* ===== NOTIFIER MODAL ===== */
.notifier {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.notifier.hidden {
    display: none;
}

.notifier-content {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px 40px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: slideIn 0.3s ease-out;
}

.notifier-content p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #000000;
    line-height: 1.5;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .content {
        margin-top: 80px;
    }
    
    .pageTitleHeader {
        font-size: 2rem;
    }
    
    .signin-container {
        padding: 30px 25px;
    }
}

@media (max-width: 480px) {
    .pageTitleHeader {
        font-size: 1.8rem;
    }
    
    .signin-container {
        padding: 25px 20px;
    }
    
    .btn {
        padding: 12px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-sign-out.css`

**Status:** `FOUND`

```css
/* REVISE THIS AS PART OF ADMIN */

:root {
    /* Use the same variables as sign-up.css for consistency */
    --effect-box-shadow-default: 0 4px 12px rgba(0, 0, 0, 0.1);
    --effect-box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
    --effect-transition-default: all 0.3s ease;
    --effect-glow-B: 0 0 10px rgba(255, 130, 70, 0.4);
}

/* Logout Confirmation Modal - MATCHING SIGN-UP STYLE */
.logout-modal {
    position: fixed;
    inset: 0; /* top: 0; right: 0; bottom: 0; left: 0; */
    background: rgba(0, 0, 0, 0.3); /* Semi-transparent dark overlay */
    backdrop-filter: blur(5px); /* Blur effect like sign-up modal */
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.logout-modal.active {
    display: flex;
}

.logout-modal-content {
    background-color: white;
    padding: 30px 25px;
    border-radius: 12px; /* Matching sign-up border-radius */
    box-shadow: var(--effect-box-shadow-default);
    max-width: 400px;
    width: 90%;
    text-align: center;
    animation: fadeScale 0.3s ease-in-out; /* Match sign-up animation */
}

/* Animation - EXACTLY matching sign-up modal */
@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.85);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.logout-modal-icon {
    margin-bottom: 20px;
}

.logout-modal-icon svg {
    width: 70px;
    height: 70px;
    stroke: #FF8246; /* Your accent color */
    stroke-width: 1.8;
}

.logout-modal h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
    font-weight: 600;
}

.logout-modal p {
    color: #666;
    font-size: 16px;
    margin-bottom: 25px;
    line-height: 1.5;
}

.logout-modal-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.logout-modal-btn {
    padding: 12px 30px;
    border: none;
    border-radius: 8px; /* Matching sign-up input border-radius */
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--effect-transition-default);
    flex: 1;
    max-width: 150px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-cancel {
    background-color: #e0e0e0;
    color: #333;
}

.btn-cancel:hover {
    background-color: #d0d0d0;
    box-shadow: var(--effect-box-shadow-default);
}

.btn-confirm {
    background-color: #FF8246;
    color: white;
}

.btn-confirm:hover {
    background-color: #e66a2e;
    box-shadow: var(--effect-glow-B);
}

/* Responsive */
@media (max-width: 768px) {
    .logout-modal-content {
        padding: 25px 20px;
        width: 85%;
    }
    
    .logout-modal-icon svg {
        width: 60px;
        height: 60px;
    }
    
    .logout-modal h2 {
        font-size: 22px;
    }
    
    .logout-modal p {
        font-size: 15px;
        margin-bottom: 20px;
    }
    
    .logout-modal-btn {
        padding: 10px 20px;
        font-size: 15px;
    }
}

@media (max-width: 480px) {
    .logout-modal-content {
        padding: 20px 15px;
        width: 90%;
    }
    
    .logout-modal-icon svg {
        width: 50px;
        height: 50px;
    }
    
    .logout-modal h2 {
        font-size: 20px;
    }
    
    .logout-modal p {
        font-size: 14px;
        margin-bottom: 18px;
    }
    
    .logout-modal-buttons {
        flex-direction: column;
        gap: 10px;
    }
    
    .logout-modal-btn {
        max-width: 100%;
        padding: 12px;
        font-size: 14px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-sign-up.css`

**Status:** `FOUND`

```css
/* REVISE THIS AS PART OF ADMIN */

:root {
    /* Form Layout */
    --form-section-gap: 30px;
    --form-group-gap: 20px;
    --input-height: 50px;
    --border-radius: 12px;
    
    /* Effects */
    --effect-box-shadow-default: 0 4px 12px rgba(0, 0, 0, 0.1);
    --effect-box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
    --effect-transition-default: all 0.3s ease;
    --effect-glow-B: 0 0 10px rgba(255, 130, 70, 0.4);
    --effect-glow-A: 0 0 8px rgba(255, 130, 70, 0.3);
    --effect-glow-error: 0 0 10px rgba(231, 76, 60, 0.4);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    -ms-overflow-style: none;
    scrollbar-width: none;
    outline: none;
}

body {
    font-family: var(--font-family-base);
    background-color: var(--color-background-A);
    color: var(--color-text-A);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

::-webkit-scrollbar {
    display: none;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.pageTitleHeader {
    font-size: calc(15px + var(--font-size-title));
    padding: var(--size-header-padding);
    margin: 20px auto 50px;
    text-align: center;
    width: 100%;
    color: var(--color-text-C);
    font-weight: var(--font-weight-bold);
}

/* Form Container */
.signup-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--form-section-gap);
    padding: 0 20px;
    width: 100%;
    max-width: 100%;
}

/* Form Sections - Barangay Style */
.form-section {
    flex: 1;
    min-width: 300px;
    max-width: 500px;
    padding: 25px 30px;
    border-radius: var(--border-radius);
    border: 1px solid;
    margin-bottom: var(--form-section-gap);
    transition: var(--effect-transition-default);
    display: flex;
    flex-direction: column;
}

.form-section:hover {
    box-shadow: var(--effect-box-shadow-default);
}

.form-section h3 {
    font-size: 1.5rem;
    color: var(--color-text-C);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--color-accent-A);
}

/* Form Groups - Barangay Style */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px; /* Reduced from 20px */
    width: 100%;
}

.form-group label {
    font-size: var(--font-size-base);
    font-weight: 600;
    color: var(--color-text-C);
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    height: var(--input-height);
    font-size: var(--font-size-base);
    padding: 0 15px;
    border: 1px solid;
    border-radius: 8px;
    background-color: #ffffff;
    color: var(--color-text-A);
    transition: var(--effect-transition-default);
}

/* Address textarea - fixed initial size, auto-expands */
.form-group textarea#address {
    height: 100px;
    min-height: 100px;
    max-height: 300px;
    padding: 15px;
    resize: none;
    overflow-y: hidden;
    line-height: 1.5;
    transition: height 0.2s ease;
}

.form-group textarea#address.expanding {
    height: auto;
    min-height: 100px;
    overflow-y: auto;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-accent-A);
    outline: none;
}

.form-group.error input,
.form-group.error select,
.form-group.error textarea {
    border-color: #e74c3c;
}

.form-group.error label {
    color: #e74c3c;
}

/* Error Messages */
.error-message {
    color: #e74c3c;
    font-size: 0.9rem;
    margin-top: 5px;
    min-height: 20px;
}

/* Button Container - Always Stacked */
.btn-container {
    display: flex;
    flex-direction: column; /* always vertical */
    justify-content: center;
    align-items: stretch;
    gap: 12px;
    margin-top: 20px;
    margin-bottom: 5px;
    width: 100%;
}

.btn {
    padding: var(--size-button-padding);
    border: none;
    cursor: pointer;
    font-size: var(--font-size-base);
    border-radius: var(--size-button-radius);
    font-weight: var(--font-weight-bold);
    transition: var(--effect-transition-default);
    width: 100%; /* Full width when stacked */
    min-width: unset; /* Remove min-width constraint */
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-align: center;
}

.btn-primary {
    background-color: var(--color-accent-A);
    color: var(--color-text-B);
}


.btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-secondary {
    background-color: var(--color-background-C);
    border: 1px solid;
    border-color: var(--color-border-A);
    color: var(--color-text-B);
}

/* Remove extra spacing from button wrapper */
.form-section .form-group:last-of-type {
    margin-bottom: 10px;
}

/* Links Group - Better Spacing */
.links-group {
    text-align: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid var(--color-border-A);
    width: 100%;
}

.login-link,
.seller-link {
    margin: 6px 0;
    font-size: 0.95rem;
    line-height: 1.4;
    color: var(--color-text-C);
}

.login-link a,
.seller-link a {
    text-decoration: none;
    color: var(--color-accent-A);
    font-weight: var(--font-weight-bold);
    transition: var(--effect-transition-default);
    padding: 2px 8px;
    border-radius: 4px;
}

.login-link a:hover,
.seller-link a:hover {
    color: var(--color-hover-A);
    background-color: rgba(255, 130, 70, 0.1);
}

/* Notifier Modal - Barangay Style */
.notifier {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.notifier.hidden {
    display: none;
}

.notifier-content {
    background-color: var(--color-background-B);
    color: var(--color-text-A);
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: var(--effect-box-shadow-default);
    text-align: center;
    max-width: 400px;
    width: 90%;
    animation: fadeScale 0.3s ease-in-out;
}

.notifier-content p {
    font-size: 18px;
    margin-bottom: 20px;
    word-wrap: break-word;
}

@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.85);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Last Form Section (Contact & Registration) Layout Fix */
.form-section:last-child {
    padding-bottom: 25px;
}

/* Form submitted state - Barangay Style */
.signup-container.submitted .form-group:has(input:invalid),
.signup-container.submitted .form-group:has(select:invalid),
.signup-container.submitted .form-group:has(textarea:invalid) {
    animation: pulseWarning 0.5s ease-in-out;
}

@keyframes pulseWarning {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Barangay-style color themes for form sections */
.form-section {
    background-color: var(--color-background-B);
    border-color: var(--color-border-A);
}

.form-group input,
.form-group select,
.form-group textarea {
    border-color: var(--color-border-A);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-accent-A);
}

/* Responsive Design - Barangay Style Adjustments */
@media (max-width: 1024px) {
    .signup-container {
        flex-direction: column;
        align-items: center;
    }
    
    .form-section {
        width: 100%;
        max-width: 600px;
    }
}

@media (max-width: 768px) {
    .content {
        padding: 20px 15px;
    }
    
    .pageTitleHeader {
        font-size: 1.5rem;
        padding: 15px 10px;
        margin: 10px auto 30px;
    }
    
    .form-section {
        padding: 20px;
        min-width: 100%;
        margin: 0 0 10px;
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .form-section:last-child {
        padding-bottom: 20px;
    }
    
    .form-section h3 {
        font-size: 1.3rem;
    }
    
    .btn-container {
        margin-top: 15px;
        gap: 10px;
    }
    
    .btn {
        padding: 14px;
        font-size: 1rem;
    }
    
    .form-group input,
    .form-group select {
        height: 45px;
        font-size: 0.95rem;
    }
    
    .form-group textarea#address {
        height: 90px;
        min-height: 90px;
    }
    
    .links-group {
        margin-top: 12px;
        padding-top: 12px;
    }
    
    .login-link,
    .seller-link {
        font-size: 0.9rem;
        margin: 5px 0;
    }
    
    .signup-container {
        padding: 0 15px;
    }
}

@media (max-width: 480px) {
    .form-section {
        padding: 18px 15px;
    }
    
    .form-section:last-child {
        padding-bottom: 18px;
    }
    
    .btn {
        padding: 12px;
        font-size: 0.95rem;
    }
    
    .btn-container {
        gap: 8px;
        margin-top: 12px;
    }
    
    .links-group {
        margin-top: 10px;
        padding-top: 10px;
    }
    
    .login-link,
    .seller-link {
        font-size: 0.85rem;
        margin: 4px 0;
    }
}

/* Password toggle styles */
.password-wrapper {
    position: relative;
    width: 100%;
}

.password-wrapper input {
    width: 100%;
    padding-right: 45px;
}

.password-toggle {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: none;
    border: none;
    padding: 0;
    z-index: 2;
}

.password-toggle img {
    width: 20px;
    height: 20px;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.password-toggle:hover img {
    opacity: 1;
}

/* Ensure password fields have proper padding */
.form-group input[type="password"] {
    padding-right: 45px;
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-terms-and-conditions.css`

**Status:** `FOUND`

```css
/* NOTE REVISE THIS IF ONLY NEEDED */

/* ============================================
   TERMS AND CONDITIONS PAGE STYLES
   Class naming convention: BEM (Block Element Modifier)
   Block: terms-page, terms-hero, terms-intro, terms-section, terms-agreement
============================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.terms-page {
    max-width: 1000px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.terms-hero {
    margin-top: 100px;
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    background: white;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-hero__container {
    max-width: 800px;
    margin: 0 auto;
}

.terms-hero__title {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.terms-hero__highlight {
    color: #ff8246;
}

.terms-hero__subtitle {
    font-size: clamp(1rem, 3vw, 1.3rem);
    color: #666;
}

/* ===== INTRO SECTION ===== */
.terms-intro {
    margin-bottom: 40px;
}

.terms-intro__card {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-intro__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 15px;
}

.terms-intro__effective-date {
    font-size: 0.95rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 0;
}

/* ===== TERMS SECTIONS ===== */
.terms-sections {
    width: 100%;
}

.terms-section {
    background: white;
    border-radius: 10px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-section__header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.terms-section__accent {
    width: 4px;
    height: 30px;
    background-color: #ff8246;
    margin-right: 15px;
    border-radius: 2px;
}

.terms-section__title {
    font-size: 1.5rem;
    color: #333;
    margin: 0;
    font-weight: 600;
}

.terms-section__body {
    padding-left: 19px;
}

.terms-section__body p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.terms-section__list {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}

.terms-section__list-item {
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

.terms-section__list-item::before {
    content: "•";
    color: #ff8246;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.terms-section__important {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    margin-bottom: 15px;
}

/* Contact Details */
.terms-contact {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 15px 0;
    font-style: normal;
}

.terms-contact__item {
    margin-bottom: 8px;
}

.terms-contact__item:last-child {
    margin-bottom: 0;
}

/* ===== AGREEMENT SECTION ===== */
.terms-agreement {
    margin-top: 40px;
}

.terms-agreement__box {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    text-align: center;
}

.terms-agreement__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.terms-agreement__actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.terms-agreement__btn {
    display: inline-block;
    padding: 12px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.terms-agreement__btn--primary {
    background-color: #ff8246;
    color: white;
}

.terms-agreement__btn--primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.terms-agreement__btn--secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #ddd;
}

.terms-agreement__btn--secondary:hover {
    background-color: #000000;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .terms-page {
        margin-top: 80px;
    }
    
    .terms-hero {
        padding: 40px 20px;
    }
    
    .terms-section__title {
        font-size: 1.3rem;
    }
    
    .terms-section {
        padding: 25px 20px;
    }
    
    .terms-section__body {
        padding-left: 14px;
    }
    
    .terms-agreement__box {
        padding: 30px 20px;
    }
    
    .terms-agreement__actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .terms-agreement__btn {
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
    .terms-hero {
        padding: 30px 15px;
    }
    
    .terms-hero__title {
        font-size: 2rem;
    }
    
    .terms-intro__card {
        padding: 20px;
    }
    
    .terms-intro__text {
        font-size: 1rem;
    }
    
    .terms-section__title {
        font-size: 1.2rem;
    }
    
    .terms-section__accent {
        height: 25px;
    }
    
    .terms-section {
        padding: 20px 15px;
    }
    
    .terms-section__body {
        padding-left: 9px;
    }
    
    .terms-section__body p,
    .terms-section__list-item {
        font-size: 0.95rem;
    }
    
    .terms-agreement__box {
        padding: 25px 15px;
    }
    
    .terms-agreement__text {
        font-size: 1rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/admin/styles/admin-verify-sellers.css`

**Status:** `FOUND`

```css
/* Admin Verify Sellers Styles */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    min-height: calc(100vh - 200px);
}

/* Page Title Header */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* Filter Tabs */
.filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
    width: 100%;
}

.filter-tab {
    padding: 8px 20px;
    background: #ffffff;
    border-radius: 25px;
    cursor: pointer;
    font-size: 0.95rem;
    font-weight: 500;
    color: #666666;
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
    text-decoration: none;
    display: inline-block;
}

.filter-tab:hover {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
    box-shadow: 0 4px 8px rgba(255, 130, 70, 0.2);
}

.filter-tab.active {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

/* Sellers Grid */
.sellers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    padding: 20px 0;
}

/* Seller Card */
.seller-card {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.seller-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    border-color: #FF8246;
}

.seller-header {
    padding: 20px;
    background: #f8f8f8;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.seller-header h3 {
    font-size: 1.2rem;
    color: #000000;
    margin: 0;
    font-weight: 600;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.pending {
    background: #FF8246;
    color: #ffffff;
}

.status-badge.verified {
    background: #000000;
    color: #ffffff;
}

.status-badge.rejected {
    background: #666666;
    color: #ffffff;
}

.seller-body {
    padding: 20px;
}

.seller-body p {
    margin: 8px 0;
    font-size: 0.95rem;
    color: #000000;
}

.seller-body strong {
    color: #666666;
    min-width: 70px;
    display: inline-block;
}

.seller-actions {
    padding: 15px 20px;
    background: #f8f8f8;
    border-top: 1px solid #e0e0e0;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

.btn-verify,
.btn-reject {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.btn-verify {
    background: #FF8246;
    color: #ffffff;
}

.btn-verify:hover {
    background: #e66a2e;
    box-shadow: 0 4px 8px rgba(255, 130, 70, 0.3);
}

.btn-reject {
    background: #000000;
    color: #ffffff;
}

.btn-reject:hover {
    background: #333333;
}

.btn-icon {
    width: 16px;
    height: 16px;
    filter: brightness(0) invert(1);
}

.status-message {
    color: #666666;
    font-style: italic;
    font-size: 0.9rem;
}

/* Empty State */
.empty-state {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 400px;
    width: 100%;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 10px;
}

.empty-state p {
    color: #666666;
    font-size: 1rem;
    line-height: 1.6;
}

.empty-state-hint {
    margin-top: 15px;
    font-style: italic;
    color: #999999;
}

/* Loading State */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1rem;
}

.loading::after {
    content: '...';
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-message {
    font-size: 1rem;
    margin-bottom: 25px;
    color: #000000;
    line-height: 1.5;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

/* Responsive */
@media (max-width: 768px) {
    .content {
        margin-top: 80px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .sellers-grid {
        grid-template-columns: 1fr;
    }
    
    .seller-actions {
        flex-direction: column;
    }
    
    .btn-verify,
    .btn-reject {
        width: 100%;
        justify-content: center;
    }
}
```

---

