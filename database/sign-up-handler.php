<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/signup_errors.log');

// Connect to database
require_once(__DIR__ . '/database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Get and validate input
$input = [];
foreach (['firstName', 'lastName', 'birthdate', 'gender', 'contact', 'email', 'username', 'password'] as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => "Field '$field' is required"]);
        exit;
    }
    $input[$field] = trim($_POST[$field]);
}

// Additional fields (optional)
$input['middleName'] = isset($_POST['middleName']) ? trim($_POST['middleName']) : null;
$input['address'] = isset($_POST['address']) ? trim($_POST['address']) : null;

// Validate email
if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
    exit;
}

// Validate password strength (optional)
if (strlen($input['password']) < 8) {
    echo json_encode(['status' => 'error', 'message' => 'Password must be at least 8 characters long']);
    exit;
}

try {
    // Check for duplicate email
    $emailCheck = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $emailCheck->execute([':email' => $input['email']]);
    if ($emailCheck->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }

    // Check for duplicate username
    $usernameCheck = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $usernameCheck->execute([':username' => $input['username']]);
    if ($usernameCheck->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-username']);
        exit;
    }

    // Hash password
    $passwordHash = password_hash($input['password'], PASSWORD_DEFAULT);

    // Insert into users table
    $query = "INSERT INTO users (
                firstName, middleName, lastName, birthdate, gender,
                contact, email, username, passwordHash, address,
                accountType, isActive
              ) VALUES (
                :firstName, :middleName, :lastName, :birthdate, :gender,
                :contact, :email, :username, :passwordHash, :address,
                'Normal', TRUE
              )";

    $params = [
        ':firstName' => $input['firstName'],
        ':middleName' => $input['middleName'],
        ':lastName' => $input['lastName'],
        ':birthdate' => $input['birthdate'],
        ':gender' => $input['gender'],
        ':contact' => $input['contact'],
        ':email' => $input['email'],
        ':username' => $input['username'],
        ':passwordHash' => $passwordHash,
        ':address' => $input['address']
    ];

    $stmt = $connection->prepare($query);
    $stmt->execute($params);
    $userID = $connection->lastInsertId();

    // Create user directory for future use (if needed for seller documents)
    $userDataDir = __DIR__ . '/user-data/' . $userID;
    if (!is_dir($userDataDir)) {
        mkdir($userDataDir, 0755, true);
    }

    // Auto-login after registration
    $_SESSION['user_id'] = $userID;
    $_SESSION['username'] = $input['username'];
    $_SESSION['email'] = $input['email'];
    $_SESSION['account_type'] = 'Normal';
    $_SESSION['is_customer'] = false;
    $_SESSION['is_seller'] = false;

    echo json_encode([
        'status' => 'success',
        'message' => 'Registration successful!',
        'userID' => $userID
    ]);

} catch (Exception $e) {
    error_log("Registration error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Registration failed: ' . $e->getMessage()]);
}
?>