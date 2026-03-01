<?php
session_start();
require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

$userId = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'update_profile':
        handleProfileUpdate($userId);
        break;
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

function handleProfileUpdate($userId) {
    global $connection;
    
    $connection->beginTransaction();
    
    try {
        // Build update list – include empty values for nullable fields (set to NULL)
        $updates = [];
        $params = [];
        
        // Fields that can be updated (all are nullable except first/last/address, but we treat them separately)
        $allowedFields = ['first_name', 'middle_name', 'last_name', 'birthdate', 'gender', 'address'];
        // Fields that should be set to NULL when empty (others will keep old value if empty)
        $nullableFields = ['middle_name', 'birthdate', 'gender'];
        
        foreach ($allowedFields as $field) {
            if (isset($_POST[$field])) {
                $value = trim($_POST[$field]);
                if ($value === '') {
                    // If field is nullable, set to NULL; otherwise skip update (keep old value)
                    if (in_array($field, $nullableFields)) {
                        $updates[] = "$field = ?";
                        $params[] = null;
                    }
                    // else: required field empty – skip update, keep existing value
                } else {
                    $updates[] = "$field = ?";
                    $params[] = $value;
                }
            }
        }
        
        if (!empty($updates)) {
            $sql = "UPDATE users SET " . implode(', ', $updates) . " WHERE user_id = ?";
            $params[] = $userId;
            
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
        }
        
        // Handle profile picture upload
        $profilePicturePath = null;
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processFileUpload('profile', $userId, $_FILES['profile_picture']);
            
            if ($uploadResult['status'] === 'success') {
                $profilePicturePath = $uploadResult['path'];
                
                $stmt = $connection->prepare("UPDATE users SET profile_picture = ? WHERE user_id = ?");
                $stmt->execute([$profilePicturePath, $userId]);
            }
        }
        
        $connection->commit();
        
        // Fetch updated user data
        $stmt = $connection->prepare("SELECT first_name, middle_name, last_name, email, username, contact_number, birthdate, gender, address, profile_picture FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Generate URL for profile picture using data-storage-handler
        $profilePictureUrl = null;
        if (!empty($userData['profile_picture'])) {
            $profilePictureUrl = getFileUrl($userData['profile_picture']);
        }
        
        // Return success with data
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $userData,
            'profile_picture' => $userData['profile_picture'] ?? null,
            'profile_picture_url' => $profilePictureUrl
        ]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update profile']);
    }
}
?>