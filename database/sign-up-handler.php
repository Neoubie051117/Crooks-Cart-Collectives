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

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleSignup();

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
    
    // Log the request for debugging
    error_log("Signup attempt: " . json_encode($_POST));
    
    // Check required fields
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            error_log("Missing field: $field");
            echo json_encode([
                'status' => 'error', 
                'message' => 'missing-field',
                'field' => $field
            ]);
            exit;
        }
    }
    
    // Validate email
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error_log("Invalid email: $email");
        echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
        exit;
    }
    
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Password validation
    if (strlen($password) < 8) {
        error_log("Password too short");
        echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
        exit;
    }

    if (strlen($password) > 16) {
        error_log("Password too long");
        echo json_encode(['status' => 'error', 'message' => 'password-too-long']);
        exit;
    }
    
    // Check if password has at least one uppercase and one lowercase letter
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        error_log("Password must contain both uppercase and lowercase letters");
        echo json_encode(['status' => 'error', 'message' => 'password-needs-mixed-case']);
        exit;
    }
    
    // Check if password has at least one number
    if (!preg_match('/[0-9]/', $password)) {
        error_log("Password must contain at least one number");
        echo json_encode(['status' => 'error', 'message' => 'password-needs-number']);
        exit;
    }
    
    if ($password !== $confirm_password) {
        error_log("Passwords do not match");
        echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
        exit;
    }
    
    // Username validation
    $username = trim($_POST['username']);
    
    if (strlen($username) < 2) {
        error_log("Username too short: $username");
        echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
        exit;
    }
    
    if (strlen($username) > 15) {
        error_log("Username too long: $username");
        echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
        exit;
    }
    
    // Check if username already exists
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $usernameExists = $stmt->fetchColumn() > 0;
    
    if ($usernameExists) {
        error_log("Username already exists: $username");
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    // Check email duplicates
    $email = trim($_POST['email']);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $emailExists = $stmt->fetchColumn() > 0;
    
    if ($emailExists) {
        error_log("Duplicate email: $email");
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    // Check contact duplicates
    $contact_number = trim($_POST['contact_number']);
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized_contact]);
    $contactExists = $stmt->fetchColumn() > 0;
    
    if ($contactExists) {
        error_log("Duplicate contact: $normalized_contact");
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // Validate phone number format
    $cleaned_contact = preg_replace('/[^0-9+]/', '', $contact_number);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $cleaned_contact) && 
        !preg_match('/^0\d{10}$/', $cleaned_contact)) {
        error_log("Invalid contact format: $contact_number");
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
        exit;
    }
    
    // Age validation
    try {
        $birthdate = new DateTime($_POST['birthdate']);
        $today = new DateTime();
        $age = $birthdate->diff($today)->y;
        
        if ($age < 13) {
            error_log("Underage: $age years old");
            echo json_encode(['status' => 'error', 'message' => 'underage']);
            exit;
        }
        
        if ($age > 120) {
            error_log("Invalid age: $age");
            echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
            exit;
        }
    } catch (Exception $e) {
        error_log("Invalid birthdate format: " . $_POST['birthdate']);
        echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
        exit;
    }
    
    // Prepare user data
    $user_data = [
        ':first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
        ':middle_name' => !empty($_POST['middle_name']) ? 
            htmlspecialchars(trim($_POST['middle_name']), ENT_QUOTES, 'UTF-8') : null,
        ':last_name' => htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8'),
        ':email' => $email,
        ':username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
        ':password' => $password,
        ':birthdate' => $_POST['birthdate'],
        ':gender' => $_POST['gender'],
        ':contact_number' => $normalized_contact,
        ':address' => htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8')
    ];
    
    try {
        // Start transaction
        $connection->beginTransaction();
        
        // Insert into users table
        $sql = "INSERT INTO users (
                    first_name, middle_name, last_name, email, username, 
                    password, birthdate, gender, contact_number, address
                ) VALUES (
                    :first_name, :middle_name, :last_name, :email, :username,
                    :password, :birthdate, :gender, :contact_number, :address
                )";
        
        $stmt = $connection->prepare($sql);
        $result = $stmt->execute($user_data);
        
        if (!$result) {
            throw new Exception("Failed to insert user");
        }
        
        $userID = $connection->lastInsertId();
        
        if (!$userID || $userID == 0) {
            throw new Exception("Failed to get valid user ID after insert");
        }
        
        error_log("User inserted with ID: $userID");
        
        // DISABLE TRIGGER TEMPORARILY - Insert customers manually
        // First, check if customer record already exists (shouldn't, but just in case)
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$userID]);
        $existingCustomer = $stmt->fetch();
        
        if (!$existingCustomer) {
            // Insert into customers - DON'T specify customer_id, let auto_increment handle it
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$userID]);
            $customerId = $connection->lastInsertId();
            
            if (!$customerId) {
                throw new Exception("Failed to create customer record");
            }
            
            error_log("Customer inserted with ID: $customerId for user: $userID");
            
            // Insert into shopping_carts - DON'T specify cart_id, let auto_increment handle it
            $stmt = $connection->prepare("INSERT INTO shopping_carts (customer_id) VALUES (?)");
            $stmt->execute([$customerId]);
            $cartId = $connection->lastInsertId();
            
            if (!$cartId) {
                throw new Exception("Failed to create shopping cart");
            }
            
            error_log("Shopping cart inserted with ID: $cartId for customer: $customerId");
        } else {
            error_log("Customer record already exists for user: $userID");
            $customerId = $existingCustomer['customer_id'];
        }
        
        $connection->commit();
        
        // Log successful registration
        error_log("User registered successfully: $username (ID: $userID)");
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Account created successfully! Please sign in.',
            'redirect' => '../pages/sign-in.php',
            'delay' => 5000
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        
        // Log the full error details
        error_log("Signup database error: " . $e->getMessage());
        error_log("Error code: " . $e->getCode());
        error_log("Error info: " . print_r($e->errorInfo, true));
        
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("General error in signup: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
    }
}
?>