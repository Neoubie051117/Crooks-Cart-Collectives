<?php
session_start();
header('Content-Type: application/json');

// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

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

handleSignin();

function handleSignin() {
    global $connection;
    
    // Log the attempt (without password)
    $identifier = $_POST['identifier'] ?? '';
    error_log("Signin attempt for identifier: " . $identifier);
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirectParam = $_POST['redirect'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        error_log("Missing fields in signin attempt");
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    // Check for admin first
    try {
        $stmt = $connection->prepare("
            SELECT admin_id, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin) {
            // Admin uses password_verify (they have hashed passwords)
            if (!password_verify($password, $admin['password'])) {
                error_log("Admin password mismatch for: " . $identifier);
                // Return generic error message for user
                echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
                exit;
            }
            
            // Admin login successful
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['is_admin'] = true;
            $_SESSION['is_customer'] = false;
            $_SESSION['is_seller'] = false;
            
            error_log("Admin login successful: " . $admin['username']);
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => '../pages/admin-dashboard.php'
            ]);
            exit;
        }
    } catch (PDOException $e) {
        error_log("Admin check error: " . $e->getMessage());
        // Continue to user check
    }
    
    // Check regular user
    try {
        $stmt = $connection->prepare("
            SELECT user_id, username, email, password 
            FROM users 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            error_log("User not found: " . $identifier);
            // Generic error - don't specify if username/email doesn't exist
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Plain text password comparison (as per your original code)
        if ($password !== $user['password']) {
            error_log("Password mismatch for user: " . $identifier . " - Expected: " . $user['password'] . ", Got: " . $password);
            // Generic error - don't specify which field is wrong
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Get customer info
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$customer) {
            // Create customer record if missing
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$user['user_id']]);
            $customer_id = $connection->lastInsertId();
            
            // Create shopping cart
            $stmt = $connection->prepare("INSERT INTO shopping_carts (customer_id) VALUES (?)");
            $stmt->execute([$customer_id]);
        } else {
            $customer_id = $customer['customer_id'];
        }
        
        // Check if seller
        $stmt = $connection->prepare("SELECT seller_id, is_verified FROM sellers WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        $seller = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Set session variables
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['customer_id'] = $customer_id;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_customer'] = true;
        $_SESSION['is_admin'] = false;
        
        if ($seller) {
            $_SESSION['seller_id'] = $seller['seller_id'];
            $_SESSION['is_seller'] = true;
            $_SESSION['seller_verified'] = (bool)$seller['is_verified'];
        } else {
            $_SESSION['is_seller'] = false;
            $_SESSION['seller_verified'] = false;
        }
        
        // Update last login timestamp
        $stmt = $connection->prepare("UPDATE users SET last_updated = NOW() WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        
        // Determine redirect based on user type and redirect parameter
        $redirect = '';
        
        // First priority: Check if there's a redirect parameter from the form
        if (!empty($redirectParam)) {
            // Clean the redirect parameter - remove any leading '../' or '/'
            $cleanRedirect = ltrim($redirectParam, './');
            
            // If it's just a filename (no path), add the pages directory
            if (strpos($cleanRedirect, '/') === false && strpos($cleanRedirect, 'pages/') !== 0) {
                $redirect = '../pages/' . $cleanRedirect;
            } 
            // If it already has pages/ in the path but no leading ../
            elseif (strpos($cleanRedirect, 'pages/') === 0) {
                $redirect = '../' . $cleanRedirect;
            }
            // If it already has the correct format (starts with ../)
            elseif (strpos($cleanRedirect, '../') === 0) {
                $redirect = $cleanRedirect;
            }
            // Otherwise, assume it needs the pages prefix
            else {
                $redirect = '../pages/' . $cleanRedirect;
            }
            
            error_log("Redirecting to requested page: " . $redirect);
        } 
        // Second priority: If user is a verified seller, go to seller dashboard
        elseif ($_SESSION['is_seller'] && $_SESSION['seller_verified']) {
            $redirect = '../pages/seller-dashboard.php';
        } 
        // Default: Go to customer dashboard
        else {
            $redirect = '../pages/customer-dashboard.php';
        }
        
        error_log("User login successful: " . $user['username'] . " (ID: " . $user['user_id'] . ") - Redirecting to: " . $redirect);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => $redirect
        ]);
        
    } catch (PDOException $e) {
        error_log("Signin database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>