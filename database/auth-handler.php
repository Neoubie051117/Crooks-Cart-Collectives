<?php
session_start();
header('Content-Type: application/json');
require_once(__DIR__ . '/database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'signup':
        handleSignup();
        break;
    case 'signin':
        handleSignin();
        break;
    case 'signout':
        handleSignout();
        break;
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        exit;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^639(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    }
    
    return $phone;
}

function handleSignup() {
    global $connection;
    
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'missing-field',
                'field' => $field
            ]);
            exit;
        }
    }
    
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
        exit;
    }
    
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // SIMPLE PASSWORD VALIDATION - just check length
    if (strlen($password) < 8) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
        exit;
    }

    if (strlen($password) > 16) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-long']);
        exit;
    }
    
    // REMOVED the complex password requirements (uppercase, lowercase, numbers)
    // Just check if passwords match
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
        exit;
    }
    
    // Check duplicates
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $emailExists = $stmt->fetchColumn() > 0;
    
    $username = trim($_POST['username']);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $usernameExists = $stmt->fetchColumn() > 0;
    
    $contact_number = trim($_POST['contact_number']);
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized_contact]);
    $contactExists = $stmt->fetchColumn() > 0;
    
    if ($emailExists && $usernameExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email duplicate-username']);
        exit;
    } elseif ($emailExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    } elseif ($usernameExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-username']);
        exit;
    } elseif ($contactExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // SIMPLE PHONE VALIDATION - just check if it's a PH number format
    $cleaned_contact = preg_replace('/[^0-9+]/', '', $contact_number);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $cleaned_contact) && 
        !preg_match('/^0\d{10}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
        exit;
    }

    // Store plain text password for now (as per your original code)
    $plain_password = $password;
    
    $user_data = [
        'first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
        'last_name' => htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8'),
        'email' => $email,
        'username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
        'password' => $plain_password,
        'middle_name' => !empty($_POST['middle_name']) ? 
            htmlspecialchars(trim($_POST['middle_name']), ENT_QUOTES, 'UTF-8') : null,
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender'],
        'contact_number' => normalizePhoneNumber($contact_number),
        'address' => htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8')
    ];
    
    // Age validation
    $birthdate = new DateTime($_POST['birthdate']);
    $today = new DateTime();
    $age = $birthdate->diff($today)->y;
    
    if ($age < 13) {
        echo json_encode(['status' => 'error', 'message' => 'underage']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            INSERT INTO users (
                first_name, middle_name, last_name, email, username, 
                password, birthdate, gender, contact_number, address
            ) VALUES (
                :first_name, :middle_name, :last_name, :email, :username,
                :password, :birthdate, :gender, :contact_number, :address
            )
        ");
        
        $stmt->execute($user_data);
        $userID = $connection->lastInsertId();
        
        // Create customer record
        $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
        $stmt->execute([$userID]);
        $customer_id = $connection->lastInsertId();
        
        // Create shopping cart
        $stmt = $connection->prepare("INSERT INTO shopping_carts (customer_id) VALUES (?)");
        $stmt->execute([$customer_id]);
        
        $connection->commit();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Account created successfully! Please sign in.',
            'redirect' => '../pages/sign-in.php',
            'delay' => 5000
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Signup error: " . $e->getMessage());
        
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            if (strpos($e->getMessage(), 'email') !== false) {
                echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
            } elseif (strpos($e->getMessage(), 'username') !== false) {
                echo json_encode(['status' => 'error', 'message' => 'duplicate-username']);
            } elseif (strpos($e->getMessage(), 'contact_number') !== false) {
                echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'database-duplicate']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Registration failed. Please try again.']);
        }
    }
}

function handleSignin() {
    global $connection;
    
    $identifier = $_POST['identifier'] ?? $_POST['usernameOrEmail'] ?? '';
    $password = $_POST['password'] ?? $_POST['loginPassword'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    // Check for admin
    $stmt = $connection->prepare("
        SELECT admin_id, username, email, password 
        FROM administrators 
        WHERE email = ? OR username = ?
    ");
    $stmt->execute([$identifier, $identifier]);
    $admin = $stmt->fetch();
    
    if ($admin) {
        if (!password_verify($password, $admin['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
            exit;
        }
        
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['email'] = $admin['email'];
        $_SESSION['is_admin'] = true;
        $_SESSION['is_customer'] = false;
        $_SESSION['is_seller'] = false;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Admin login successful',
            'redirect' => '../pages/admin-dashboard.php'
        ]);
        exit;
    }
    
    // Check regular user
    $stmt = $connection->prepare("
        SELECT user_id, username, email, password 
        FROM users 
        WHERE email = ? OR username = ?
    ");
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch();
    
    if (!$user) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or email']);
        exit;
    }
    
    // Plain text password comparison (as per your original code)
    if ($password !== $user['password']) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        exit;
    }
    
    // Get customer info
    $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
    $stmt->execute([$user['user_id']]);
    $customer = $stmt->fetch();
    
    if (!$customer) {
        $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
        $stmt->execute([$user['user_id']]);
        $customer_id = $connection->lastInsertId();
        
        $stmt = $connection->prepare("INSERT INTO shopping_carts (customer_id) VALUES (?)");
        $stmt->execute([$customer_id]);
    } else {
        $customer_id = $customer['customer_id'];
    }
    
    // Check if seller
    $stmt = $connection->prepare("SELECT seller_id, is_verified FROM sellers WHERE user_id = ?");
    $stmt->execute([$user['user_id']]);
    $seller = $stmt->fetch();
    
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
    
    $stmt = $connection->prepare("UPDATE users SET last_updated = NOW() WHERE user_id = ?");
    $stmt->execute([$user['user_id']]);
    
    if ($_SESSION['is_seller'] && $_SESSION['seller_verified']) {
        $redirect = '../pages/seller-dashboard.php';
    } else {
        $redirect = '../pages/customer-dashboard.php';
    }
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Login successful',
        'redirect' => $redirect
    ]);
}

function handleSignout() {
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Already logged out',
            'redirect' => '../index.php'
        ]);
        exit;
    }
    
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
        'redirect' => '../index.php'
    ]);
}
?>