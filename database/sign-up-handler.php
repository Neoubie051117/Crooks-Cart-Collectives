<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'register') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);
    exit;
}

// Get and validate data
$first_name = trim($_POST['first_name'] ?? '');
$middle_name = trim($_POST['middle_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$birthdate = $_POST['birthdate'] ?? '';
$gender = $_POST['gender'] ?? '';
$contact = trim($_POST['contact_number'] ?? '');
$email = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Address fields
$block = trim($_POST['block'] ?? '');
$barangay = trim($_POST['barangay'] ?? '');
$city = trim($_POST['city'] ?? '');
$province = trim($_POST['province'] ?? '');
$region = trim($_POST['region'] ?? '');
$postal_code = trim($_POST['postal_code'] ?? '');
$country = trim($_POST['country'] ?? 'Philippines');

// Check required fields (basic ones)
if (empty($first_name) || empty($last_name) || empty($birthdate) || empty($gender) || 
    empty($contact) || empty($email) || empty($username) || empty($password) ||
    empty($block) || empty($city) || empty($postal_code)) {
    echo json_encode(['status' => 'error', 'message' => 'missing-field']);
    exit;
}

// Conditional validation based on country
$isPhilippines = ($country === 'Philippines');
if ($isPhilippines) {
    // For Philippines, barangay, province, and region are required
    if (empty($barangay) || empty($province) || empty($region)) {
        echo json_encode(['status' => 'error', 'message' => 'missing-field']);
        exit;
    }
}
// For other countries, barangay, province, and region are optional - they can be empty

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
    exit;
}

// Validate username
if (strlen($username) < 3) {
    echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
    exit;
}
if (strlen($username) > 20) {
    echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
    exit;
}
if (!preg_match('/^[A-Za-z0-9_]+$/', $username)) {
    echo json_encode(['status' => 'error', 'message' => 'username-invalid']);
    exit;
}

// ===== FIXED: Hash the password before storing =====
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
if ($password !== $confirm) {
    echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Validate age (must be at least 13)
$birthDateObj = new DateTime($birthdate);
$today = new DateTime();
$age = $today->diff($birthDateObj)->y;
if ($age < 13) {
    echo json_encode(['status' => 'error', 'message' => 'age-restriction']);
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
    $stmt = $connection->prepare("SELECT user_id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT user_id FROM users WHERE contact_number = ?");
    $stmt->execute([$phone]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // Begin transaction
    $connection->beginTransaction();
    
    // ===== FIXED: Create concatenated address without empty commas =====
    $addressParts = [];
    $addressParts[] = $block;
    
    // Only add barangay if not empty (for non-Philippines addresses)
    if (!empty($barangay)) {
        $addressParts[] = $barangay;
    }
    
    $addressParts[] = $city;
    
    // Only add province if not empty (for non-Philippines addresses)
    if (!empty($province)) {
        $addressParts[] = $province;
    }
    
    // Only add region if not empty (for non-Philippines addresses)
    if (!empty($region)) {
        $addressParts[] = $region;
    }
    
    $addressParts[] = $postal_code;
    $addressParts[] = $country;
    
    $fullAddress = implode(', ', $addressParts);
    
    // Insert into users table (keeping address field for backward compatibility)
    // ===== FIXED: Store hashed password instead of plain text =====
    $stmt = $connection->prepare("
        INSERT INTO users (
            first_name, middle_name, last_name, email, username, password, 
            birthdate, gender, contact_number, address, date_created
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([
        $first_name, 
        $middle_name ?: null, 
        $last_name, 
        $email, 
        $username, 
        $hashed_password, // Store hashed password
        $birthdate, 
        $gender, 
        $phone, 
        $fullAddress
    ]);
    
    // Get the new user ID
    $user_id = $connection->lastInsertId();
    
    // ===== FIXED: Insert into address_list table with NULL for empty fields =====
    $stmt = $connection->prepare("
        INSERT INTO address_list (
            user_id, block, barangay, city, province, region, postal_code, country, date_added
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([
        $user_id,
        $block,
        !empty($barangay) ? $barangay : null, // Store null if empty
        $city,
        !empty($province) ? $province : null, // Store null if empty
        !empty($region) ? $region : null,   // Store null if empty
        $postal_code,
        $country
    ]);
    
    // Insert into customers table
    $stmt = $connection->prepare("INSERT INTO customers (user_id, date_joined) VALUES (?, NOW())");
    $stmt->execute([$user_id]);
    
    // Commit transaction
    $connection->commit();
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Account created successfully!',
        'redirect' => 'sign-in.php',
        'user_id' => $user_id
    ]);
    
} catch (PDOException $e) {
    // Rollback transaction on error
    if ($connection->inTransaction()) {
        $connection->rollBack();
    }
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'database-error']);
} catch (Exception $e) {
    // Rollback transaction on error
    if ($connection->inTransaction()) {
        $connection->rollBack();
    }
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'server-error']);
}
?>