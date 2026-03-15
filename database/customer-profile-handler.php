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
        // ===== STEP 1: Update user basic info =====
        $updates = [];
        $params = [];
        
        $allowedFields = ['first_name', 'middle_name', 'last_name', 'birthdate', 'gender'];
        $nullableFields = ['middle_name', 'birthdate', 'gender'];
        
        foreach ($allowedFields as $field) {
            if (isset($_POST[$field])) {
                $value = trim($_POST[$field]);
                if ($value === '' && in_array($field, $nullableFields)) {
                    $updates[] = "$field = ?";
                    $params[] = null;
                } elseif ($value !== '') {
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
        
        // ===== STEP 2: Handle address update =====
        $addressId = $_POST['address_id'] ?? null;
        
        if ($addressId) {
            // Verify this address belongs to the user
            $stmt = $connection->prepare("SELECT address_id FROM address_list WHERE address_id = ? AND user_id = ?");
            $stmt->execute([$addressId, $userId]);
            
            if ($stmt->fetch()) {
                // Update the address
                $addressUpdates = [];
                $addressParams = [];
                
                $addressFields = ['block', 'barangay', 'city', 'province', 'region', 'postal_code', 'country'];
                $nullableAddressFields = ['barangay', 'province', 'region'];
                
                foreach ($addressFields as $field) {
                    if (isset($_POST[$field])) {
                        $value = trim($_POST[$field]);
                        if ($value === '' && in_array($field, $nullableAddressFields)) {
                            $addressUpdates[] = "$field = ?";
                            $addressParams[] = null;
                        } elseif ($value !== '') {
                            $addressUpdates[] = "$field = ?";
                            $addressParams[] = $value;
                        }
                    }
                }
                
                if (!empty($addressUpdates)) {
                    $sql = "UPDATE address_list SET " . implode(', ', $addressUpdates) . " WHERE address_id = ?";
                    $addressParams[] = $addressId;
                    
                    $stmt = $connection->prepare($sql);
                    $stmt->execute($addressParams);
                }
            }
        }
        
        $connection->commit();
        
        // ===== STEP 3: Fetch updated user data with address =====
        $stmt = $connection->prepare("
            SELECT 
                u.first_name, u.middle_name, u.last_name, u.email, u.username, 
                u.contact_number, u.birthdate, u.gender, u.profile_picture,
                a.address_id, a.block, a.barangay, a.city, a.province, a.region, 
                a.postal_code, a.country
            FROM users u
            LEFT JOIN address_list a ON u.address_id = a.address_id
            WHERE u.user_id = ?
        ");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Generate URL for profile picture
        $profilePictureUrl = null;
        if (!empty($userData['profile_picture'])) {
            $profilePictureUrl = getFileUrl($userData['profile_picture']);
        }
        
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
        echo json_encode(['status' => 'error', 'message' => 'Failed to update profile: ' . $e->getMessage()]);
    }
}
?>