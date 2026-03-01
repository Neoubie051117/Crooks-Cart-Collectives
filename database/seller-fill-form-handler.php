<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'update_seller') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleSellerUpdate();

function handleSellerUpdate() {
    global $connection;
    
    $userId = $_SESSION['user_id'];
    
    // Check if user is already a seller
    $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
    $stmt->execute([$userId]);
    $existingSeller = $stmt->fetch(PDO::FETCH_ASSOC);
    $isSeller = !empty($existingSeller);
    
    // Validate required fields - INCLUDING BUSINESS NAME NOW
    $requiredFields = ['first_name', 'last_name', 'birthdate', 'gender', 'address', 'business_name'];
    $missingFields = [];
    
    foreach ($requiredFields as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            $missingFields[] = $field;
        }
    }
    
    // If there are missing required fields, return error
    if (!empty($missingFields)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all required fields including Store Name.',
            'missing_fields' => $missingFields
        ]);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        // Update users table
        $updateUserSQL = "
            UPDATE users SET
                first_name = :first_name,
                middle_name = :middle_name,
                last_name = :last_name,
                birthdate = :birthdate,
                gender = :gender,
                address = :address
            WHERE user_id = :user_id
        ";
        
        $stmt = $connection->prepare($updateUserSQL);
        $stmt->execute([
            ':first_name' => trim($_POST['first_name']),
            ':middle_name' => !empty($_POST['middle_name']) ? trim($_POST['middle_name']) : null,
            ':last_name' => trim($_POST['last_name']),
            ':birthdate' => $_POST['birthdate'],
            ':gender' => $_POST['gender'],
            ':address' => trim($_POST['address']),
            ':user_id' => $userId
        ]);
        
        // Handle file uploads
        $identityPath = null;
        $idDocumentPath = null;
        
        // Process identity photo if uploaded
        if (isset($_FILES['identity_photo']) && $_FILES['identity_photo']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processVerificationUpload($userId, $_FILES['identity_photo'], 'identity');
            if ($uploadResult['status'] === 'success') {
                $identityPath = $uploadResult['path'];
            } else {
                throw new Exception('Identity photo upload failed: ' . $uploadResult['message']);
            }
        }
        
        // Process ID document if uploaded
        if (isset($_FILES['id_document']) && $_FILES['id_document']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processVerificationUpload($userId, $_FILES['id_document'], 'id_document');
            if ($uploadResult['status'] === 'success') {
                $idDocumentPath = $uploadResult['path'];
            } else {
                throw new Exception('ID document upload failed: ' . $uploadResult['message']);
            }
        }
        
        // Update or insert seller record
        if ($isSeller) {
            // Update existing seller - business_name is required
            $updateSellerSQL = "
                UPDATE sellers SET
                    business_name = :business_name
            ";
            
            // Only update file paths if new files were uploaded
            if ($identityPath) {
                $updateSellerSQL .= ", identity_path = :identity_path";
            }
            if ($idDocumentPath) {
                $updateSellerSQL .= ", id_document_path = :id_document_path";
            }
            
            $updateSellerSQL .= " WHERE user_id = :user_id";
            
            $stmt = $connection->prepare($updateSellerSQL);
            $params = [
                ':business_name' => trim($_POST['business_name']), // Required now
                ':user_id' => $userId
            ];
            
            if ($identityPath) {
                $params[':identity_path'] = $identityPath;
            }
            if ($idDocumentPath) {
                $params[':id_document_path'] = $idDocumentPath;
            }
            
            $stmt->execute($params);
        } else {
            // Insert new seller - business_name is required
            $insertSellerSQL = "
                INSERT INTO sellers (
                    user_id, 
                    business_name, 
                    identity_path, 
                    id_document_path,
                    is_verified,
                    date_applied
                ) VALUES (
                    :user_id,
                    :business_name,
                    :identity_path,
                    :id_document_path,
                    0,
                    NOW()
                )
            ";
            
            $stmt = $connection->prepare($insertSellerSQL);
            $stmt->execute([
                ':user_id' => $userId,
                ':business_name' => trim($_POST['business_name']), // Required now
                ':identity_path' => $identityPath,
                ':id_document_path' => $idDocumentPath
            ]);
        }
        
        $connection->commit();
        
        // Update session if needed
        if (!$isSeller) {
            $_SESSION['is_seller'] = true;
            // Get the new seller_id
            $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
            $stmt->execute([$userId]);
            $seller = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($seller) {
                $_SESSION['seller_id'] = $seller['seller_id'];
                $_SESSION['seller_verified'] = false;
            }
        }
        
        // Fetch updated user data for response
        $stmt = $connection->prepare("SELECT first_name, last_name FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode([
            'status' => 'success',
            'message' => $isSeller ? 'Seller information updated successfully!' : 'Seller application submitted successfully!',
            'data' => [
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name']
            ]
        ]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Seller update error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to save seller information. Please try again.'
        ]);
    }
}
?>