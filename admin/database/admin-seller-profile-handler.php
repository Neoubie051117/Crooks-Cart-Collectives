<?php
// Admin Seller Profile Handler
session_start();
require_once(__DIR__ . '/admin-database-connect.php');
require_once(__DIR__ . '/admin-data-storage-handler.php');

// Always return JSON
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Check authentication
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action === 'get_seller_details' && isset($_GET['seller_id'])) {
    getSellerDetails($_GET['seller_id']);
    exit;
}

if ($action === 'verify_seller' && isset($_POST['seller_id'])) {
    verifySeller($_POST['seller_id']);
    exit;
}

if ($action === 'reject_seller' && isset($_POST['seller_id'])) {
    rejectSeller($_POST['seller_id']);
    exit;
}

// If no valid action
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid action']);

/**
 * Get complete seller details including user information and document paths
 */
function getSellerDetails($sellerId) {
    global $connection;
    
    try {
        // Get seller with user information - FIXED: Changed u.date_joined to u.date_created
        $stmt = $connection->prepare("
            SELECT 
                s.seller_id,
                s.business_name,
                s.date_applied,
                s.is_verified,
                s.verification_date,
                s.identity_path,
                s.id_document_path,
                u.user_id,
                u.first_name,
                u.middle_name,
                u.last_name,
                u.email,
                u.contact_number,
                u.username,
                u.birthdate,
                u.gender,
                u.address,
                u.profile_picture,
                u.date_created
            FROM sellers s
            LEFT JOIN users u ON s.user_id = u.user_id
            WHERE s.seller_id = ?
        ");
        $stmt->execute([$sellerId]);
        $seller = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$seller) {
            echo json_encode(['status' => 'error', 'message' => 'Seller not found']);
            return;
        }
        
        // Format dates
        if (!empty($seller['birthdate'])) {
            $seller['birthdate_formatted'] = date('F j, Y', strtotime($seller['birthdate']));
        }
        if (!empty($seller['date_applied'])) {
            $seller['date_applied_formatted'] = date('F j, Y', strtotime($seller['date_applied']));
        }
        if (!empty($seller['verification_date']) && $seller['verification_date'] !== 'NULL' && $seller['verification_date'] !== null) {
            $seller['verification_date_formatted'] = date('F j, Y', strtotime($seller['verification_date']));
        }
        if (!empty($seller['date_created'])) {
            $seller['date_joined_formatted'] = date('F j, Y', strtotime($seller['date_created']));
        }
        
        // Calculate age from birthdate
        if (!empty($seller['birthdate'])) {
            $birthdate = new DateTime($seller['birthdate']);
            $today = new DateTime();
            $age = $today->diff($birthdate)->y;
            $seller['age'] = $age;
        }
        
        // Get document URLs using the admin data storage handler
        // These paths are from sellers table: identity_path and id_document_path
        // They point to files in Crooks-Data-Storage/users/...
        $seller['identity_url'] = '';
        $seller['id_document_url'] = '';
        
        if (!empty($seller['identity_path'])) {
            // Check if it's already a full path with Crooks-Data-Storage prefix
            if (strpos($seller['identity_path'], 'Crooks-Data-Storage/') === 0) {
                // Use the admin file serving mechanism
                $seller['identity_url'] = '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($seller['identity_path']);
            } else {
                // For backward compatibility, assume it's a relative path
                $seller['identity_url'] = '../../' . $seller['identity_path'];
            }
        }
        
        if (!empty($seller['id_document_path'])) {
            if (strpos($seller['id_document_path'], 'Crooks-Data-Storage/') === 0) {
                $seller['id_document_url'] = '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($seller['id_document_path']);
            } else {
                $seller['id_document_url'] = '../../' . $seller['id_document_path'];
            }
        }
        
        // Profile picture from users table
        $seller['profile_picture_url'] = '';
        if (!empty($seller['profile_picture'])) {
            if (strpos($seller['profile_picture'], 'Crooks-Data-Storage/') === 0) {
                $seller['profile_picture_url'] = '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($seller['profile_picture']);
            } else {
                $seller['profile_picture_url'] = '../../' . $seller['profile_picture'];
            }
        }
        
        // Get full name
        $fullName = ($seller['first_name'] ?? '');
        if (!empty($seller['middle_name'])) {
            $fullName .= ' ' . $seller['middle_name'];
        }
        if (!empty($seller['last_name'])) {
            $fullName .= ' ' . $seller['last_name'];
        }
        $seller['full_name'] = trim($fullName) ?: 'Unknown User';
        
        // Format contact number for display
        if (!empty($seller['contact_number'])) {
            $phone = preg_replace('/[^0-9]/', '', $seller['contact_number']);
            if (strlen($phone) === 11 && $phone[0] === '0') {
                $seller['contact_number_formatted'] = substr($phone, 0, 4) . ' ' . substr($phone, 4, 3) . ' ' . substr($phone, 7, 4);
            } else {
                $seller['contact_number_formatted'] = $seller['contact_number'];
            }
        } else {
            $seller['contact_number_formatted'] = '-';
        }
        
        echo json_encode([
            'status' => 'success',
            'data' => $seller
        ]);
        
    } catch (PDOException $e) {
        error_log("Error fetching seller details: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}

/**
 * Verify a seller (set is_verified = 1)
 */
function verifySeller($sellerId) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            UPDATE sellers 
            SET is_verified = 1, verification_date = NOW() 
            WHERE seller_id = ?
        ");
        $stmt->execute([$sellerId]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Seller verified successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Seller not found or already verified'
            ]);
        }
        
    } catch (PDOException $e) {
        error_log("Error verifying seller: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

/**
 * Reject a seller (set is_verified = 2)
 */
function rejectSeller($sellerId) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            UPDATE sellers 
            SET is_verified = 2, verification_date = NOW() 
            WHERE seller_id = ?
        ");
        $stmt->execute([$sellerId]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Seller rejected'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Seller not found'
            ]);
        }
        
    } catch (PDOException $e) {
        error_log("Error rejecting seller: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>