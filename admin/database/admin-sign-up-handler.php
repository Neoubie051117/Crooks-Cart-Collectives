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