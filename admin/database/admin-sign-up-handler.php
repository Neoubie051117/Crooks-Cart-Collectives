<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');
require_once(__DIR__ . '/admin-data-storage-handler.php');

// ===== TEST ENDPOINT =====
if (isset($_GET['ping'])) {
    echo json_encode([
        'status' => 'ok', 
        'message' => 'Signup handler is reachable',
        'time' => date('Y-m-d H:i:s'),
        'session' => isset($_SESSION['admin_id']) ? 'active' : 'inactive'
    ]);
    exit;
}
// ===== END TEST ENDPOINT =====

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);
    exit;
}

// Get and validate data
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact = trim($_POST['contact_number'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Check required fields
if (empty($first_name) || empty($last_name) || empty($email) || empty($contact) || empty($username) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'missing-field']);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
    exit;
}

// Validate password
if (strlen($password) < 8) {
    echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
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
if ($password !== $confirm) {
    echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
    exit;
}

// Simple username validation - only length check
if (strlen($username) < 3) {
    echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
    exit;
}
if (strlen($username) > 20) {
    echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
    exit;
}

// Format phone
$phone = preg_replace('/[^0-9]/', '', $contact);
if (strlen($phone) === 10 && $phone[0] === '9') {
    $phone = '0' . $phone;
} elseif (strlen($phone) === 12 && substr($phone, 0, 2) === '63') {
    $phone = '0' . substr($phone, 2);
} elseif (strlen($phone) === 12 && substr($phone, 0, 3) === '639') {
    $phone = '0' . substr($phone, 2);
}

if (!preg_match('/^09\d{9}$/', $phone)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
    exit;
}

try {
    // Check duplicates
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE contact_number = ?");
    $stmt->execute([$phone]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // Create admin - STORE PASSWORD AS PLAIN TEXT (demo only)
    $stmt = $connection->prepare("INSERT INTO administrators (first_name, last_name, email, contact_number, username, password, date_joined) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$first_name, $last_name, $email, $phone, $username, $password]);
    
    // Get the new admin ID
    $admin_id = $connection->lastInsertId();
    
    // Create storage directory using the data storage handler
    if (function_exists('createAdminStorage')) {
        createAdminStorage($admin_id);
    } else {
        // Fallback to old method if function doesn't exist
        $storage_dir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/' . $admin_id . '/profile/';
        if (!is_dir($storage_dir)) {
            mkdir($storage_dir, 0755, true);
        }
    }
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Admin account created successfully!',
        'redirect' => 'admin-sign-in.php',
        'admin_id' => $admin_id
    ]);
    
} catch (PDOException $e) {
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'database-error']);
} catch (Exception $e) {
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'server-error']);
}
?>