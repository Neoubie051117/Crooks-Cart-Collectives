<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/auth_errors.log');

// Connect to database
require_once(__DIR__ . '/database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

if (empty($_POST['usernameOrEmail']) || empty($_POST['loginPassword'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
    exit;
}

$identifier = trim($_POST['usernameOrEmail']);
$password = $_POST['loginPassword'];

try {
    // Check if identifier is email or username
    $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
    
    // Query for user in new users table
    $query = "SELECT userID, username, email, passwordHash, accountType
              FROM users 
              WHERE " . ($isEmail ? "email = :identifier" : "username = :identifier");
    
    $stmt = $connection->prepare($query);
    $stmt->bindValue(':identifier', $identifier, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['passwordHash'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Invalid username/email or password']);
        exit;
    }

    // Set session data
    $_SESSION['user_id'] = $user['userID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['account_type'] = $user['accountType'];
    
    // Check if user is also a customer
    $customerStmt = $connection->prepare("SELECT customerID FROM customers WHERE userID = :userID");
    $customerStmt->execute([':userID' => $user['userID']]);
    $_SESSION['is_customer'] = $customerStmt->fetch() !== false;
    
    // Check if user is also a seller
    $sellerStmt = $connection->prepare("SELECT sellerID, isVerified FROM sellers WHERE userID = :userID");
    $sellerStmt->execute([':userID' => $user['userID']]);
    $seller = $sellerStmt->fetch();
    $_SESSION['is_seller'] = $seller !== false;
    $_SESSION['seller_verified'] = $seller ? $seller['isVerified'] : false;

    // Determine redirect path based on account type
    $redirectPath = '../pages/home.php'; // Default for normal users
    
    if ($user['accountType'] === 'Admin') {
        $redirectPath = '../pages/admin-dashboard.php';
    }

    echo json_encode([
        'status' => 'success',
        'redirectPath' => $redirectPath,
        'accountType' => $user['accountType']
    ]);
    
} catch (Exception $error) {
    error_log("Authentication error: " . $error->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Authentication service unavailable']);
}
?>