<?php
session_start();

// === ADD THIS RIGHT HERE, AFTER session_start() ===
// Handle client-side error logging
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'client_error_log') {
    // Get the raw POST data
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    if (isset($data['error'])) {
        error_log("=== CLIENT-SIDE ERROR ===");
        error_log("Error type: " . ($data['error']['type'] ?? 'unknown'));
        error_log("Error message: " . ($data['error']['message'] ?? 'no message'));
        if (isset($data['error']['response'])) {
            error_log("Response that caused error: " . $data['error']['response']);
        }
        if (isset($data['error']['stack'])) {
            error_log("Stack trace: " . $data['error']['stack']);
        }
        error_log("==========================");
    }
    
    // Return success to client
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success']);
    exit;
}
// === END OF ADDED CODE ===

require_once(__DIR__ . '/admin-database-connect.php');
require_once(__DIR__ . '/admin-data-storage-handler.php');

// Always return JSON
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');



// Catch any errors to prevent invalid JSON output
try {
    if (!isset($_SESSION['admin_id'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
        exit;
    }

    $adminId = $_SESSION['admin_id'];
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'update_profile':
            handleAdminProfileUpdate($adminId);
            break;
        default:
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
            break;
    }
} catch (Exception $e) {
    error_log("Uncaught exception in admin-profile-handler: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Server error occurred']);
}

function handleAdminProfileUpdate($adminId) {
    global $connection;
    
    // Start output buffering to catch any accidental output
    ob_start();
    
    try {
        // Check if connection is valid
        if (!$connection) {
            throw new Exception("Database connection failed");
        }
        
        // Begin transaction
        if (!$connection->beginTransaction()) {
            throw new Exception("Failed to start transaction");
        }
        
        error_log("Transaction started for admin: " . $adminId);
        
        // Build update list
        $updates = [];
        $params = [];
        
        // Fields that can be updated
        $allowedFields = ['first_name', 'last_name', 'contact_number'];
        
        foreach ($allowedFields as $field) {
            if (isset($_POST[$field])) {
                $value = trim($_POST[$field]);
                if ($value !== '') {
                    $updates[] = "$field = ?";
                    $params[] = $value;
                }
            }
        }
        
        // Update admin data if there are changes
        if (!empty($updates)) {
            $sql = "UPDATE administrators SET " . implode(', ', $updates) . " WHERE admin_id = ?";
            $params[] = $adminId;
            
            error_log("Executing SQL: " . $sql);
            $stmt = $connection->prepare($sql);
            if (!$stmt->execute($params)) {
                throw new Exception("Failed to update admin data");
            }
            error_log("Admin data updated successfully");
        }
        
        // Handle profile picture upload
        $profilePicturePath = null;
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            error_log("Processing profile picture upload for admin: " . $adminId);
            
            // Use the admin data storage handler to process upload
            $uploadResult = processAdminFileUpload('profile', $adminId, $_FILES['profile_picture']);
            
            if ($uploadResult['status'] === 'success') {
                $profilePicturePath = $uploadResult['path']; // Returns 'Crooks-Data-Storage/administrators/1/profile/profile.jpg'
                
                $stmt = $connection->prepare("UPDATE administrators SET profile_picture = ? WHERE admin_id = ?");
                if (!$stmt->execute([$profilePicturePath, $adminId])) {
                    throw new Exception("Failed to update profile picture in database");
                }
                
                error_log("Admin profile picture saved with path: " . $profilePicturePath);
            } else {
                // Log the error but don't fail the whole transaction
                error_log("Admin profile picture upload failed: " . ($uploadResult['message'] ?? 'Unknown error'));
            }
        }
        
        // Commit transaction
        if (!$connection->commit()) {
            throw new Exception("Failed to commit transaction");
        }
        
        error_log("Transaction committed successfully for admin: " . $adminId);
        
        // ===== FIXED: Changed 'created_at' to 'date_joined' to match your table structure =====
        $stmt = $connection->prepare("SELECT first_name, last_name, email, username, contact_number, profile_picture, date_joined FROM administrators WHERE admin_id = ?");
        $stmt->execute([$adminId]);
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$adminData) {
            throw new Exception("Failed to fetch updated admin data");
        }
        
        // Generate URL for profile picture using admin-data-storage-handler
        $profilePictureUrl = null;
        if (!empty($adminData['profile_picture'])) {
            $profilePictureUrl = getAdminFileUrl($adminData['profile_picture']);
            error_log("Generated profile picture URL: " . $profilePictureUrl);
        }
        
        // Format date_joined for display
        if (!empty($adminData['date_joined'])) {
            $adminData['date_joined_formatted'] = date('F j, Y', strtotime($adminData['date_joined']));
        }
        
        // Clear output buffer
        ob_clean();
        
        // Return success with data
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $adminData,
            'profile_picture' => $adminData['profile_picture'] ?? null,
            'profile_picture_url' => $profilePictureUrl
        ]);
        
    } catch (Exception $e) {
        error_log("Admin profile update error: " . $e->getMessage());
        
        // Rollback transaction if active
        if ($connection && $connection->inTransaction()) {
            $connection->rollBack();
            error_log("Transaction rolled back");
        }
        
        // Clear output buffer
        ob_clean();
        
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Failed to update profile: ' . $e->getMessage()]);
    }
    
    // End output buffering
    ob_end_flush();
}
?>