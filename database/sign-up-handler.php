<?php
session_start();
header('Content-Type: application/json');

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
    
    error_log("Signup attempt: " . json_encode($_POST));
    
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => 'missing-field', 'field' => $field]);
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
    
    $username = trim($_POST['username']);
    if (strlen($username) < 2) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
        exit;
    }
    if (strlen($username) > 15) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
        exit;
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $contact_number = trim($_POST['contact_number']);
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized_contact]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    $cleaned_contact = preg_replace('/[^0-9+]/', '', $contact_number);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $cleaned_contact) && 
        !preg_match('/^0\d{10}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
        exit;
    }
    
    try {
        $birthdate = new DateTime($_POST['birthdate']);
        $today = new DateTime();
        $age = $birthdate->diff($today)->y;
        if ($age < 13) {
            echo json_encode(['status' => 'error', 'message' => 'underage']);
            exit;
        }
        if ($age > 120) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
        exit;
    }
    
    $user_data = [
        ':first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
        ':middle_name' => !empty($_POST['middle_name']) ? htmlspecialchars(trim($_POST['middle_name']), ENT_QUOTES, 'UTF-8') : null,
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
        $connection->beginTransaction();
        
        $sql = "INSERT INTO users (
                    first_name, middle_name, last_name, email, username, 
                    password, birthdate, gender, contact_number, address
                ) VALUES (
                    :first_name, :middle_name, :last_name, :email, :username,
                    :password, :birthdate, :gender, :contact_number, :address
                )";
        $stmt = $connection->prepare($sql);
        $stmt->execute($user_data);
        
        $userID = $connection->lastInsertId();
        
        // Check if customer record already exists (shouldn't, but just in case)
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$userID]);
        if (!$stmt->fetch()) {
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$userID]);
        }
        
        $connection->commit();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Account created successfully! Please sign in.',
            'redirect' => '../pages/sign-in.php',
            'delay' => 5000
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Signup database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("General error in signup: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
    }
}
?>