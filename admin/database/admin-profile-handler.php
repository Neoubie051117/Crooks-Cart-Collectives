<?php
// Admin Profile Handler
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');
require_once(__DIR__ . '/admin-data-storage-handler.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'update_profile') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleProfileUpdate();

function handleProfileUpdate() {
    global $connection;
    
    $admin_id = $_SESSION['admin_id'];
    
    // Get form data
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $contact_number = trim($_POST['contact_number'] ?? '');
    
    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($contact_number)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    // Validate Philippine mobile number
    $cleaned_contact = preg_replace('/[^0-9]/', '', $contact_number);
    if (!preg_match('/^09\d{9}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid Philippine mobile number']);
        exit;
    }
    
    // Handle profile picture upload
    $profile_picture_path = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $upload_result = saveAdminProfilePicture($admin_id, $_FILES['profile_picture']);
        if ($upload_result['success']) {
            $profile_picture_path = $upload_result['path'];
        } else {
            echo json_encode(['status' => 'error', 'message' => $upload_result['message']]);
            exit;
        }
    }
    
    try {
        // Build update query
        $sql = "UPDATE administrators SET first_name = ?, last_name = ?, contact_number = ?";
        $params = [$first_name, $last_name, $cleaned_contact];
        
        if ($profile_picture_path) {
            $sql .= ", profile_picture = ?";
            $params[] = $profile_picture_path;
        }
        
        $sql .= " WHERE admin_id = ?";
        $params[] = $admin_id;
        
        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        
        // Update session variables
        $_SESSION['admin_first_name'] = $first_name;
        $_SESSION['admin_last_name'] = $last_name;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => [
                'first_name' => $first_name,
                'last_name' => $last_name
            ]
        ]);
        
    } catch (PDOException $e) {
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}
?>