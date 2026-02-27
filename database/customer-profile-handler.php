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
    } elseif (preg_match('/^0(\d{10})$/', $phone, $matches)) {
        return '+63' . substr($matches[1], 1);
    }
    return $phone;
}

function validatePhoneNumber($phone) {
    $cleaned = preg_replace('/[^0-9+]/', '', $phone);
    return preg_match('/^(09|\+639|639)\d{9}$/', $cleaned) || 
           preg_match('/^0\d{10}$/', $cleaned);
}

function updateProfile($userID) {
    global $connection;
    
    $required = ['first_name', 'last_name', 'contact_number', 'address'];
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }
    
    $contact_number = trim($_POST['contact_number']);
    if (!validatePhoneNumber($contact_number)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format']);
        exit;
    }
    
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    // Check if phone number is already used by another user
    $checkStmt = $connection->prepare("
        SELECT user_id FROM users 
        WHERE contact_number = ? AND user_id != ?
    ");
    $checkStmt->execute([$normalized_contact, $userID]);
    if ($checkStmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Phone number already registered']);
        exit;
    }
    
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $middle_name = !empty($_POST['middle_name']) ? trim($_POST['middle_name']) : null;
    
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', $first_name)) {
        echo json_encode(['status' => 'error', 'message' => 'First name contains invalid characters']);
        exit;
    }
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', $last_name)) {
        echo json_encode(['status' => 'error', 'message' => 'Last name contains invalid characters']);
        exit;
    }
    if ($middle_name && !preg_match('/^[a-zA-Z\s\-\']+$/', $middle_name)) {
        echo json_encode(['status' => 'error', 'message' => 'Middle name contains invalid characters']);
        exit;
    }
    
    $address = trim($_POST['address']);
    if (strlen($address) < 10) {
        echo json_encode(['status' => 'error', 'message' => 'Address must be at least 10 characters']);
        exit;
    }
    
    $birthdate = !empty($_POST['birthdate']) ? $_POST['birthdate'] : null;
    if ($birthdate) {
        $birthDateObj = new DateTime($birthdate);
        $today = new DateTime();
        $age = $birthDateObj->diff($today)->y;
        if ($age < 13) {
            echo json_encode(['status' => 'error', 'message' => 'You must be at least 13 years old']);
            exit;
        }
        if ($age > 120) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid birthdate']);
            exit;
        }
    }
    
    $fields = [
        'first_name' => htmlspecialchars($first_name, ENT_QUOTES, 'UTF-8'),
        'middle_name' => $middle_name ? htmlspecialchars($middle_name, ENT_QUOTES, 'UTF-8') : null,
        'last_name' => htmlspecialchars($last_name, ENT_QUOTES, 'UTF-8'),
        'birthdate' => $birthdate,
        'gender' => $_POST['gender'] ?? null,
        'contact_number' => $normalized_contact,
        'address' => htmlspecialchars($address, ENT_QUOTES, 'UTF-8')
    ];
    
    $setClause = [];
    $params = [];
    foreach ($fields as $key => $value) {
        $setClause[] = "$key = ?";
        $params[] = $value;
    }
    $params[] = $userID;
    
    try {
        $connection->beginTransaction();
        
        $query = "UPDATE users SET " . implode(', ', $setClause) . " WHERE user_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Update failed: ' . $e->getMessage()]);
    }
}

function becomeSeller($userID) {
    global $connection;
    
    $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
    $stmt->execute([$userID]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Already a seller']);
        exit;
    }
    
    $validIDPath = null;
    if (isset($_FILES['valid_id']) && $_FILES['valid_id']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/valid_ids/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $extension = strtolower(pathinfo($_FILES['valid_id']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        if (!in_array($extension, $allowed)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Allowed: JPG, PNG, GIF, PDF']);
            exit;
        }
        
        $fileName = time() . '_' . $userID . '.' . $extension;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['valid_id']['tmp_name'], $targetPath)) {
            $validIDPath = 'database/uploads/valid_ids/' . $fileName;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload file']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Valid ID is required']);
        exit;
    }
    
    try {
        $stmt = $connection->prepare("
            INSERT INTO sellers (user_id, business_name, valid_id_path, date_applied, is_verified) 
            VALUES (?, ?, ?, NOW(), 0)
        ");
        $business_name = !empty($_POST['business_name']) ? trim($_POST['business_name']) : null;
        
        if ($stmt->execute([$userID, $business_name, $validIDPath])) {
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
    } catch (PDOException $e) {
        error_log("Become seller error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}
?>