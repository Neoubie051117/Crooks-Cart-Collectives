<?php
// Admin Sign In Handler - MODIFIED for password hashing with backward compatibility
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
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Log the attempt (but don't log passwords)
    error_log("Admin signin attempt - Identifier: " . $identifier);
    
    if (empty($identifier) || empty($password)) {
        error_log("Signin failed: Empty fields");
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    try {
        // Check ONLY administrators table - both email and username
        $stmt = $connection->prepare("
            SELECT admin_id, first_name, last_name, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$admin) {
            error_log("Signin failed: No admin found with identifier: " . $identifier);
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        error_log("Admin found: ID=" . $admin['admin_id'] . ", Username=" . $admin['username'] . ", Email=" . $admin['email']);
        
        // ===== FIXED: Password verification with backward compatibility =====
        $password_valid = false;
        
        // First try password_verify (for hashed passwords)
        if (password_verify($password, $admin['password'])) {
            $password_valid = true;
        }
        // Fallback to plain text comparison for existing accounts
        else if ($password === $admin['password']) {
            $password_valid = true;
            
            // Automatically rehash the password for future security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_stmt = $connection->prepare("UPDATE administrators SET password = ? WHERE admin_id = ?");
            $update_stmt->execute([$hashed_password, $admin['admin_id']]);
            error_log("Admin password rehashed for ID: " . $admin['admin_id']);
        }
        
        if (!$password_valid) {
            error_log("Signin failed: Password mismatch for admin ID: " . $admin['admin_id']);
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
        
        error_log("Signin successful for admin ID: " . $admin['admin_id']);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => '../pages/admin-dashboard.php'
        ]);
        
    } catch (PDOException $e) {
        error_log("Admin signin database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>