<?php
// Admin data storage handler - for serving and saving admin files outside web root
// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Configuration - Store in external directory like customer/seller data
define('ADMIN_STORAGE_PATH', dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/');

// Create base directory if it doesn't exist
if (!is_dir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/')) {
    mkdir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/', 0755, true);
}
if (!is_dir(ADMIN_STORAGE_PATH)) {
    mkdir(ADMIN_STORAGE_PATH, 0755, true);
}

/**
 * Serve admin files (profile pictures) with proper security and authentication
 * @param string $path Relative path within administrators storage
 */
function serveAdminFile($path) {
    error_log("Admin storage: Serving file: " . $path);
    
    // ===== CRITICAL: Authentication check =====
    if (!isset($_SESSION['admin_id'])) {
        error_log("Admin storage: Unauthorized access attempt to: " . $path);
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
        exit;
    }
    
    // Security: ensure path is within administrators directory and prevent directory traversal
    $path = str_replace(['../', '..\\', './', '.\\'], '', $path);
    
    $fullPath = ADMIN_STORAGE_PATH . $path;
    error_log("Admin storage: Full path: " . $fullPath);
    
    // Check if file exists
    if (!file_exists($fullPath)) {
        error_log("Admin storage: File not found: " . $fullPath);
        http_response_code(404);
        exit;
    }
    
    // Get file extension and set appropriate mime type
    $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp'
    ];
    
    $mime = $mimeTypes[$ext] ?? 'application/octet-stream';
    
    // Set caching headers
    header('Content-Type: ' . $mime);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // 24 hours cache
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
    
    // Output file
    readfile($fullPath);
    exit;
}

/**
 * Save admin profile picture to storage outside web root
 * @param int $admin_id Admin ID
 * @param array $file Uploaded file data from $_FILES
 * @return array Result with success status and path/message
 */
function saveAdminProfilePicture($admin_id, $file) {
    error_log("Admin storage: Saving profile picture for admin: " . $admin_id);
    
    // Authentication check
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        error_log("Admin storage: Authentication mismatch for admin: " . $admin_id);
        return [
            'success' => false,
            'message' => 'Authentication required'
        ];
    }
    
    $targetDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    error_log("Admin storage: Target directory: " . $targetDir);
    
    // Create directory if it doesn't exist
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Admin storage: Failed to create directory: " . $targetDir);
            return [
                'success' => false,
                'message' => 'Failed to create upload directory.'
            ];
        }
    }
    
    // Validate file
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    // Verify file type using finfo for security
    if (!file_exists($file['tmp_name'])) {
        error_log("Admin storage: Temporary file does not exist");
        return [
            'success' => false,
            'message' => 'Upload failed: Temporary file not found.'
        ];
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($detectedType, $allowedTypes)) {
        error_log("Admin storage: Invalid file type: " . $detectedType);
        return [
            'success' => false,
            'message' => 'Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.'
        ];
    }
    
    if ($file['size'] > $maxSize) {
        error_log("Admin storage: File too large: " . $file['size']);
        return [
            'success' => false,
            'message' => 'File size must be less than 2MB.'
        ];
    }
    
    // Validate upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize directive.',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive.',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.'
        ];
        $errorMsg = $uploadErrors[$file['error']] ?? 'Unknown upload error.';
        error_log("Admin storage: Upload error: " . $errorMsg);
        return [
            'success' => false,
            'message' => 'Upload failed: ' . $errorMsg
        ];
    }
    
    // Delete any existing profile picture files for this admin
    $existingFiles = glob($targetDir . 'profile.*');
    foreach ($existingFiles as $existingFile) {
        if (is_file($existingFile)) {
            unlink($existingFile);
            error_log("Admin storage: Deleted existing file: " . $existingFile);
        }
    }
    
    // Get original extension from detected type
    $ext = '';
    switch ($detectedType) {
        case 'image/jpeg':
            $ext = 'jpg';
            break;
        case 'image/png':
            $ext = 'png';
            break;
        case 'image/gif':
            $ext = 'gif';
            break;
        case 'image/webp':
            $ext = 'webp';
            break;
        default:
            $ext = 'jpg';
    }
    
    // Fixed filename: profile.extension (like customer side)
    $filename = 'profile.' . $ext;
    $targetPath = $targetDir . $filename;
    
    error_log("Admin storage: Target path: " . $targetPath);
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Set proper permissions
        chmod($targetPath, 0644);
        error_log("Admin storage: File saved successfully: " . $targetPath);
        
        // Return relative path for database storage (relative to storage root)
        return [
            'success' => true,
            'path' => 'administrators/' . $admin_id . '/profile/' . $filename
        ];
    }
    
    error_log("Admin storage: Failed to move uploaded file to " . $targetPath);
    return [
        'success' => false,
        'message' => 'Failed to save uploaded file.'
    ];
}

/**
 * Delete old profile pictures for an admin
 * @param int $admin_id Admin ID
 */
function cleanupOldAdminProfilePictures($admin_id) {
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        return;
    }
    
    $profileDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    
    if (!is_dir($profileDir)) {
        return;
    }
    
    // Find all profile files for this admin
    $oldFiles = glob($profileDir . 'profile.*');
    
    foreach ($oldFiles as $file) {
        if (is_file($file)) {
            unlink($file);
            error_log("Admin storage: Cleaned up file: " . $file);
        }
    }
}

// Check if the function already exists before declaring it
if (!function_exists('getAdminProfilePictureUrl')) {
    /**
     * Get admin profile picture URL via data storage handler
     * @param string $path Storage path
     * @return string URL to serve the file
     */
    function getAdminProfilePictureUrl($path) {
        if (empty($path)) {
            return '../assets/image/icons/user-profile-circle.svg';
        }
        
        // URL encode the path to handle special characters
        $encodedPath = urlencode($path);
        
        // Return URL to this handler with serve action
        return '../database/admin-data-storage-handler.php?action=serve&path=' . $encodedPath;
    }
}

// Handle requests
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === 'serve' && isset($_GET['path'])) {
        serveAdminFile($_GET['path']);
        exit;
    }
}

// Handle file upload via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'upload') {
    header('Content-Type: application/json');
    
    if (!isset($_SESSION['admin_id'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit;
    }
    
    $admin_id = $_SESSION['admin_id'];
    $file = $_FILES['profile_picture'] ?? null;
    
    if (!$file) {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
        exit;
    }
    
    $result = saveAdminProfilePicture($admin_id, $file);
    
    if ($result['success']) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile picture uploaded successfully',
            'path' => $result['path']
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => $result['message']
        ]);
    }
    exit;
}

// If no valid action, output 404 instead of 400 to avoid confusion
http_response_code(404);
echo 'Not found';
exit;