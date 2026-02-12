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

function updateProfile($userID) {
    global $connection;
    
    $required = ['first_name', 'last_name', 'contact_number'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }
    
    // Build update query
    $fields = [
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'] ?? null,
        'last_name' => $_POST['last_name'],
        'birthdate' => !empty($_POST['birthdate']) ? $_POST['birthdate'] : null,
        'gender' => $_POST['gender'] ?? null,
        'contact_number' => $_POST['contact_number'],
        'address' => $_POST['address'] ?? null
    ];
    
    $setClause = [];
    $params = [];
    
    foreach ($fields as $key => $value) {
        $setClause[] = "$key = ?";
        $params[] = $value;
    }
    
    $params[] = $userID;
    
    $query = "UPDATE users SET " . implode(', ', $setClause) . " WHERE user_id = ?";
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
        
        $fileName = time() . '_' . basename($_FILES['valid_id']['name']);
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['valid_id']['tmp_name'], $targetPath)) {
            $validIDPath = 'uploads/valid_ids/' . $fileName;
        }
    }
    
    if (!$validIDPath) {
        echo json_encode(['status' => 'error', 'message' => 'Valid ID is required']);
        exit;
    }
    
    // Insert seller application
    $stmt = $connection->prepare("
        INSERT INTO sellers (user_id, business_name, valid_id_path, date_applied) 
        VALUES (?, ?, ?, NOW())
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