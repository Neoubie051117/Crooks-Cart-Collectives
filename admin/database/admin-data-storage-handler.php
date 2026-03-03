<?php
// admin-data-storage-handler.php - Handles admin file operations including serving files
// Files stored at: /Crooks-Data-Storage/administrators/admin_id/profile/profile.extension
// (outside the project root not admin/, at same level as Crooks-Cart-Collectives/ meaning it's root of root)

// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

/**
 * Get the absolute path to the Crooks-Data-Storage directory (outside project root)
 * 
 * Current file: /Crooks-Cart-Collectives/admin/database/admin-data-storage-handler.php
 * Need to go up 3 levels to get to root (/), then add Crooks-Data-Storage/
 * 
 * / (root)
 *   ├── Crooks-Data-Storage/
 *   └── Crooks-Cart-Collectives/
 *        └── admin/
 *            └── database/
 *                └── admin-data-storage-handler.php
 */
function getDataStorageRoot() {
    // Go up 3 levels from current file to reach the server root
    // /Crooks-Cart-Collectives/admin/database/ -> 3 levels up = /
    $serverRoot = dirname(__DIR__, 3); // This gets to the server root (/)
    return $serverRoot . '/Crooks-Data-Storage/';
}

/**
 * Process admin file upload and return result array
 * 
 * @param string $type 'profile' (only type for now)
 * @param int $adminId Admin ID
 * @param array $file $_FILES['file'] array
 * @return array ['status' => 'success'|'error', 'message' => string, 'path' => string (if success)]
 */
function processAdminFileUpload($type, $adminId, $file) {
    
    if (empty($type) || empty($adminId) || !is_numeric($adminId)) {
        return ['status' => 'error', 'message' => 'Missing required parameters'];
    }

    // Only profile type is supported for now
    if ($type !== 'profile') {
        return ['status' => 'error', 'message' => 'Invalid file type'];
    }

    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        error_log("Admin storage: File upload error");
        return ['status' => 'error', 'message' => 'File upload failed'];
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        return ['status' => 'error', 'message' => 'File size exceeds 2MB'];
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($detectedType, $allowedTypes)) {
        return ['status' => 'error', 'message' => 'Invalid file type. Only JPG, PNG, GIF, WEBP allowed.'];
    }

    // Get extension from detected MIME type for security
    $extension = '';
    switch ($detectedType) {
        case 'image/jpeg':
            $extension = 'jpg';
            break;
        case 'image/png':
            $extension = 'png';
            break;
        case 'image/gif':
            $extension = 'gif';
            break;
        case 'image/webp':
            $extension = 'webp';
            break;
        default:
            $extension = 'jpg';
    }
    
    // ===== FIXED: Using getDataStorageRoot() to get outside project root =====
    // This creates: /Crooks-Data-Storage/administrators/123/profile/
    $baseDir = getDataStorageRoot() . 'administrators/' . $adminId . '/';
    
    if ($type === 'profile') {
        $targetDir = $baseDir . 'profile/';
        $filename = 'profile.' . $extension;
    }

    // Create directories if they don't exist
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Admin storage: Failed to create directory $targetDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create storage directory'];
        }
    }

    // Delete any existing profile file with same base name but different extension
    $pattern = $targetDir . 'profile.*';
    array_map('unlink', glob($pattern));

    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        error_log("Admin storage: Failed to move uploaded file to $targetPath");
        return ['status' => 'error', 'message' => 'Failed to save file'];
    }

    chmod($targetPath, 0644);

    // Return path relative to Crooks-Data-Storage/ (for database storage)
    // Format: Crooks-Data-Storage/administrators/123/profile/profile.jpg
    $relativePath = 'Crooks-Data-Storage/administrators/' . $adminId . '/profile/' . $filename;

    error_log("Admin storage: File saved successfully at: $targetPath");
    error_log("Admin storage: Database path: $relativePath");

    return [
        'status' => 'success',
        'message' => 'File uploaded successfully',
        'path' => $relativePath
    ];
}

/**
 * Get the full server path for a stored admin file
 * 
 * @param string $relativePath Path relative to Crooks-Data-Storage/ (e.g., "administrators/1/profile/profile.jpg")
 * @return string Full server path to the file
 */
function getAdminStorageFullPath($relativePath) {
    if (empty($relativePath)) {
        return null;
    }
    
    // Remove 'Crooks-Data-Storage/' prefix if present
    $pathWithoutPrefix = str_replace('Crooks-Data-Storage/', '', $relativePath);
    
    // Build full path: /Crooks-Data-Storage/administrators/1/profile/profile.jpg
    return getDataStorageRoot() . $pathWithoutPrefix;
}

/**
 * Check if an admin file exists in storage
 * 
 * @param string $relativePath Path relative to Crooks-Data-Storage/
 * @return bool True if file exists
 */
function adminStorageFileExists($relativePath) {
    if (empty($relativePath)) {
        return false;
    }
    
    $fullPath = getAdminStorageFullPath($relativePath);
    return file_exists($fullPath);
}

/**
 * Get the URL to access an admin file (using this script to serve files)
 * 
 * @param string $path Path to the file (e.g., "Crooks-Data-Storage/administrators/1/profile/profile.jpg")
 * @return string URL to access the file
 */
function getAdminFileUrl($path) {
    if (empty($path)) {
        // Return default admin avatar if no path
        return '../assets/image/icons/user-profile-circle.svg';
    }
    
    // For files in Crooks-Data-Storage, use this same file as a server
    if (strpos($path, 'Crooks-Data-Storage/') === 0) {
        return '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($path);
    }
    
    return '../' . $path;
}

/**
 * Serve an admin file from storage (outputs file directly)
 * 
 * @param string $relativePath Path relative to Crooks-Data-Storage/ (e.g., "administrators/1/profile/profile.jpg")
 */
function serveAdminFile($relativePath) {
    error_log("Admin storage: Serving file: " . $relativePath);
    
    if (empty($relativePath)) {
        http_response_code(400);
        die('File path required');
    }
    
    // ===== CRITICAL: Authentication check =====
    if (!isset($_SESSION['admin_id'])) {
        error_log("Admin storage: Unauthorized access attempt to: " . $relativePath);
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
        exit;
    }
    
    // Security: Prevent directory traversal
    $relativePath = str_replace(['../', '..\\', './', '.\\'], '', $relativePath);
    
    // Ensure path starts with administrators/ (after removing Crooks-Data-Storage/ prefix if present)
    $pathForValidation = str_replace('Crooks-Data-Storage/', '', $relativePath);
    if (strpos($pathForValidation, 'administrators/') !== 0) {
        error_log("Admin storage: Invalid file path - not in administrators directory: " . $relativePath);
        http_response_code(403);
        die('Invalid file path');
    }
    
    // Parse the path to verify admin owns this file
    $pathParts = explode('/', $pathForValidation);
    if (count($pathParts) >= 2 && $pathParts[0] === 'administrators') {
        $fileAdminId = (int)$pathParts[1];
        if ($fileAdminId !== $_SESSION['admin_id']) {
            error_log("Admin storage: Access denied - admin {$_SESSION['admin_id']} tried to access file owned by $fileAdminId");
            http_response_code(403);
            die('Access denied: You do not own this file.');
        }
    }
    
    // ===== WILDCARD SEARCH FOR PROFILE PICTURES =====
    // Check if path contains wildcard (*) for extension search
    if (strpos($relativePath, 'profile.*') !== false) {
        // Extract the base directory
        $baseDir = str_replace('profile.*', '', $relativePath);
        $baseDir = str_replace('Crooks-Data-Storage/', '', $baseDir);
        $fullBaseDir = getDataStorageRoot() . $baseDir;
        
        // Search for any profile file
        $profileFiles = glob($fullBaseDir . 'profile.*');
        if (!empty($profileFiles)) {
            $actualFile = basename($profileFiles[0]);
            // Reconstruct the full path with Crooks-Data-Storage/ prefix
            $relativePath = 'Crooks-Data-Storage/' . $baseDir . $actualFile;
            error_log("Admin storage: Resolved profile.* to: " . $relativePath);
        } else {
            error_log("Admin storage: Profile not found in: " . $fullBaseDir);
            http_response_code(404);
            die('Profile picture not found');
        }
    }
    
    // Get full path using our helper
    $fullPath = getAdminStorageFullPath($relativePath);
    error_log("Admin storage: Full path: " . $fullPath);
    
    if (!$fullPath || !file_exists($fullPath)) {
        error_log("Admin storage: File not found: " . $fullPath);
        http_response_code(404);
        die('File not found');
    }
    
    $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    
    $contentTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml'
    ];
    
    $contentType = $contentTypes[$extension] ?? 'application/octet-stream';
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // Cache for 1 day
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
    
    readfile($fullPath);
    exit;
}

/**
 * Delete all media for an admin (profile pictures)
 * 
 * @param int $adminId
 * @return bool
 */
function deleteAdminMedia($adminId) {
    if (empty($adminId) || !is_numeric($adminId)) {
        return false;
    }
    
    // Verify authentication
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $adminId) {
        return false;
    }
    
    $profileDir = getDataStorageRoot() . 'administrators/' . $adminId . '/profile/';
    if (is_dir($profileDir)) {
        array_map('unlink', glob($profileDir . '*'));
        rmdir($profileDir);
        
        // Try to remove admin directory if empty
        $adminDir = getDataStorageRoot() . 'administrators/' . $adminId . '/';
        if (is_dir($adminDir) && count(glob($adminDir . '*')) === 0) {
            rmdir($adminDir);
        }
        return true;
    }
    return false;
}

/**
 * Convenience function for admin profile uploads
 */
function processAdminProfileUpload($adminId, $file) {
    return processAdminFileUpload('profile', $adminId, $file);
}

// Handle direct requests to this file
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    // Check for serve action
    $action = $_GET['action'] ?? $_POST['action'] ?? '';
    
    if ($action === 'serve') {
        $path = $_GET['path'] ?? '';
        serveAdminFile($path);
        exit;
    }
    
    // Handle file upload via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'upload') {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['admin_id'])) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
            exit;
        }
        
        $adminId = $_SESSION['admin_id'];
        $file = $_FILES['file'] ?? null;
        
        if (!$file) {
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
            exit;
        }
        
        $result = processAdminProfileUpload($adminId, $file);
        
        if ($result['status'] === 'error') {
            http_response_code(400);
        }
        
        echo json_encode($result);
        exit;
    }
    
    // If no valid action, output 404
    http_response_code(404);
    echo 'Not found';
    exit;
}
?>