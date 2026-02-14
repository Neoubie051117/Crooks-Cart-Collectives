<?php
session_start();
header('Content-Type: application/json');
require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$userID = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'update_profile':
        updateProfile($userID);
        break;
    case 'become_seller':
        becomeSeller($userID);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
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

function updateProfile($userID) {
    global $connection;
    
    $required = ['first_name', 'last_name', 'contact_number', 'address'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }
    
    // Validate phone number
    $normalized_contact = normalizePhoneNumber($_POST['contact_number']);
    $cleaned = preg_replace('/[^0-9+]/', '', $_POST['contact_number']);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $cleaned)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format']);
        exit;
    }
    
    // Check if phone number is already used by another user
    $checkStmt = $connection->prepare("SELECT user_id FROM users WHERE contact_number = ? AND user_id != ?");
    $checkStmt->execute([$normalized_contact, $userID]);
    if ($checkStmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Phone number already registered']);
        exit;
    }
    
    $fields = [
        'first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
        'middle_name' => !empty($_POST['middle_name']) ? htmlspecialchars(trim($_POST['middle_name']), ENT_QUOTES, 'UTF-8') : null,
        'last_name' => htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8'),
        'birthdate' => !empty($_POST['birthdate']) ? $_POST['birthdate'] : null,
        'gender' => $_POST['gender'] ?? null,
        'contact_number' => $normalized_contact,
        'address' => htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8')
    ];
    
    $setClause = [];
    $params = [];
    
    foreach ($fields as $key => $value) {
        $setClause[] = "$key = ?";
        $params[] = $value;
    }
    
    $params[] = $userID;
    
    $query = "UPDATE users SET " . implode(', ', $setClause) . ", last_updated = NOW() WHERE user_id = ?";
    $stmt = $connection->prepare($query);
    
    if ($stmt->execute($params)) {
        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed']);
    }
}

function becomeSeller($userID) {
    global $connection;
    
    // Check if already a seller
    $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
    $stmt->execute([$userID]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Already a seller']);
        exit;
    }
    
    // Handle file upload for valid ID
    $validIDPath = null;
    if (isset($_FILES['valid_id']) && $_FILES['valid_id']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/valid_ids/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        
        $extension = pathinfo($_FILES['valid_id']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . $userID . '.' . $extension;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['valid_id']['tmp_name'], $targetPath)) {
            $validIDPath = 'database/uploads/valid_ids/' . $fileName;
        }
    }
    
    if (!$validIDPath) {
        echo json_encode(['status' => 'error', 'message' => 'Valid ID is required']);
        exit;
    }
    
    // Insert seller application
    $stmt = $connection->prepare("
        INSERT INTO sellers (user_id, business_name, valid_id_path, date_applied, is_verified) 
        VALUES (?, ?, ?, NOW(), 0)
    ");
    
    if ($stmt->execute([$userID, $_POST['business_name'] ?? null, $validIDPath])) {
        $_SESSION['is_seller'] = true;
        $_SESSION['seller_id'] = $connection->lastInsertId();
        $_SESSION['seller_verified'] = false;
        
        echo json_encode([
            'status' => 'success', 
            'message' => 'Seller application submitted successfully! Waiting for verification.'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Application failed']);
    }
}
?>