<?php
session_start();
require_once(__DIR__ . '/database-connect.php');

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
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_addresses':
        getAddresses($userId);
        break;
        
    case 'add_address':
        addAddress($userId);
        break;
        
    case 'update_address':
        updateAddress($userId);
        break;
        
    case 'delete_address':
        deleteAddress($userId);
        break;
        
    case 'set_default':
        setDefaultAddress($userId);
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

function getAddresses($userId) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT * FROM address_list 
            WHERE user_id = ? 
            ORDER BY is_default DESC, date_added DESC
        ");
        $stmt->execute([$userId]);
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode([
            'status' => 'success',
            'data' => $addresses
        ]);
        
    } catch (PDOException $e) {
        error_log("Get addresses error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function addAddress($userId) {
    global $connection;
    
    // Validate required fields
    $required = ['block', 'city', 'postal_code', 'country'];
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => ucfirst($field) . ' is required']);
            return;
        }
    }
    
    // Check address count (max 5)
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM address_list WHERE user_id = ?");
    $stmt->execute([$userId]);
    $count = $stmt->fetch()['count'];
    
    if ($count >= 5) {
        echo json_encode(['status' => 'error', 'message' => 'Maximum 5 addresses allowed']);
        return;
    }
    
    $isDefault = ($count === 0) ? 1 : (isset($_POST['is_default']) ? 1 : 0);
    
    // If setting as default, remove default from others
    if ($isDefault) {
        $stmt = $connection->prepare("UPDATE address_list SET is_default = 0 WHERE user_id = ?");
        $stmt->execute([$userId]);
    }
    
    try {
        $stmt = $connection->prepare("
            INSERT INTO address_list (
                user_id, block, barangay, city, province, region, 
                postal_code, country, is_default, date_added
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        
        $stmt->execute([
            $userId,
            trim($_POST['block']),
            !empty($_POST['barangay']) ? trim($_POST['barangay']) : null,
            trim($_POST['city']),
            !empty($_POST['province']) ? trim($_POST['province']) : null,
            !empty($_POST['region']) ? trim($_POST['region']) : null,
            trim($_POST['postal_code']),
            trim($_POST['country']),
            $isDefault
        ]);
        
        $addressId = $connection->lastInsertId();
        
        // Update user's default address if this is the first/default
        if ($isDefault) {
            $stmt = $connection->prepare("UPDATE users SET address_id = ? WHERE user_id = ?");
            $stmt->execute([$addressId, $userId]);
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Address added successfully',
            'address_id' => $addressId
        ]);
        
    } catch (PDOException $e) {
        error_log("Add address error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function updateAddress($userId) {
    global $connection;
    
    $addressId = $_POST['address_id'] ?? 0;
    if (!$addressId) {
        echo json_encode(['status' => 'error', 'message' => 'Address ID required']);
        return;
    }
    
    // Verify ownership
    $stmt = $connection->prepare("SELECT address_id, is_default FROM address_list WHERE address_id = ? AND user_id = ?");
    $stmt->execute([$addressId, $userId]);
    $existing = $stmt->fetch();
    
    if (!$existing) {
        echo json_encode(['status' => 'error', 'message' => 'Address not found']);
        return;
    }
    
    // Validate required fields
    $required = ['block', 'city', 'postal_code', 'country'];
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => ucfirst($field) . ' is required']);
            return;
        }
    }
    
    $isDefault = isset($_POST['is_default']) ? 1 : 0;
    
    // If setting as default, remove default from others
    if ($isDefault && !$existing['is_default']) {
        $stmt = $connection->prepare("UPDATE address_list SET is_default = 0 WHERE user_id = ?");
        $stmt->execute([$userId]);
    }
    
    try {
        $stmt = $connection->prepare("
            UPDATE address_list SET
                block = ?,
                barangay = ?,
                city = ?,
                province = ?,
                region = ?,
                postal_code = ?,
                country = ?,
                is_default = ?
            WHERE address_id = ? AND user_id = ?
        ");
        
        $stmt->execute([
            trim($_POST['block']),
            !empty($_POST['barangay']) ? trim($_POST['barangay']) : null,
            trim($_POST['city']),
            !empty($_POST['province']) ? trim($_POST['province']) : null,
            !empty($_POST['region']) ? trim($_POST['region']) : null,
            trim($_POST['postal_code']),
            trim($_POST['country']),
            $isDefault,
            $addressId,
            $userId
        ]);
        
        // Update user's default address if this is the default
        if ($isDefault) {
            $stmt = $connection->prepare("UPDATE users SET address_id = ? WHERE user_id = ?");
            $stmt->execute([$addressId, $userId]);
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Address updated successfully'
        ]);
        
    } catch (PDOException $e) {
        error_log("Update address error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function deleteAddress($userId) {
    global $connection;
    
    $addressId = $_POST['address_id'] ?? 0;
    if (!$addressId) {
        echo json_encode(['status' => 'error', 'message' => 'Address ID required']);
        return;
    }
    
    // Verify ownership and check if it's the user's current address
    $stmt = $connection->prepare("
        SELECT a.*, u.address_id as user_current_address_id 
        FROM address_list a
        LEFT JOIN users u ON a.user_id = u.user_id
        WHERE a.address_id = ? AND a.user_id = ?
    ");
    $stmt->execute([$addressId, $userId]);
    $address = $stmt->fetch();
    
    if (!$address) {
        echo json_encode(['status' => 'error', 'message' => 'Address not found']);
        return;
    }
    
    $connection->beginTransaction();
    
    try {
        // Delete the address
        $stmt = $connection->prepare("DELETE FROM address_list WHERE address_id = ? AND user_id = ?");
        $stmt->execute([$addressId, $userId]);
        
        // If this was the user's current address, set a new default
        if ($address['user_current_address_id'] == $addressId) {
            // Find another address to set as default
            $stmt = $connection->prepare("
                SELECT address_id FROM address_list 
                WHERE user_id = ? AND address_id != ? 
                ORDER BY date_added ASC LIMIT 1
            ");
            $stmt->execute([$userId, $addressId]);
            $newDefault = $stmt->fetch();
            
            if ($newDefault) {
                // Set the oldest remaining address as default
                $stmt = $connection->prepare("UPDATE address_list SET is_default = 1 WHERE address_id = ?");
                $stmt->execute([$newDefault['address_id']]);
                
                // Update user's default address
                $stmt = $connection->prepare("UPDATE users SET address_id = ? WHERE user_id = ?");
                $stmt->execute([$newDefault['address_id'], $userId]);
            } else {
                // No addresses left, set user's address_id to NULL
                $stmt = $connection->prepare("UPDATE users SET address_id = NULL WHERE user_id = ?");
                $stmt->execute([$userId]);
            }
        }
        
        $connection->commit();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Address deleted successfully'
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Delete address error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function setDefaultAddress($userId) {
    global $connection;
    
    $addressId = $_POST['address_id'] ?? 0;
    if (!$addressId) {
        echo json_encode(['status' => 'error', 'message' => 'Address ID required']);
        return;
    }
    
    // Verify ownership
    $stmt = $connection->prepare("SELECT address_id FROM address_list WHERE address_id = ? AND user_id = ?");
    $stmt->execute([$addressId, $userId]);
    
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Address not found']);
        return;
    }
    
    $connection->beginTransaction();
    
    try {
        // Remove default from all addresses
        $stmt = $connection->prepare("UPDATE address_list SET is_default = 0 WHERE user_id = ?");
        $stmt->execute([$userId]);
        
        // Set new default
        $stmt = $connection->prepare("UPDATE address_list SET is_default = 1 WHERE address_id = ?");
        $stmt->execute([$addressId]);
        
        // Update user's default address
        $stmt = $connection->prepare("UPDATE users SET address_id = ? WHERE user_id = ?");
        $stmt->execute([$addressId, $userId]);
        
        $connection->commit();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Default address updated'
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Set default address error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>