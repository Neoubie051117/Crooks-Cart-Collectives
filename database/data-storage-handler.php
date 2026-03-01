<?php
// data-storage-handler.php - Handles all file operations including serving files

/**
 * Process file upload and return result array
 * 
 * @param string $type 'profile', 'valid_id', or 'verification'
 * @param int $userId User ID
 * @param array $file $_FILES['file'] array
 * @param string|null $subtype For verification: 'identity' or 'id_document'
 * @return array ['status' => 'success'|'error', 'message' => string, 'path' => string (if success)]
 */
function processFileUpload($type, $userId, $file, $subtype = null) {
    
    if (empty($type) || empty($userId) || !is_numeric($userId)) {
        return ['status' => 'error', 'message' => 'Missing required parameters'];
    }

    if (!in_array($type, ['profile', 'valid_id', 'verification'])) {
        return ['status' => 'error', 'message' => 'Invalid file type'];
    }

    if ($type === 'verification' && !in_array($subtype, ['identity', 'id_document'])) {
        return ['status' => 'error', 'message' => 'Invalid verification subtype'];
    }

    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        error_log("Data storage: File upload error");
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

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $baseDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/users/' . $userId . '/';

    if ($type === 'verification') {
        $targetDir = $baseDir . 'verification/';
        // Fixed filenames: identity.* or id_document.*
        if ($subtype === 'identity') {
            $filename = 'identity.' . $extension;
        } else { // id_document
            $filename = 'id_document.' . $extension;
        }
    } elseif ($type === 'profile') {
        $targetDir = $baseDir . 'profile/';
        $filename = 'profile.jpg'; // Always jpg for profile
    } else { // valid_id (legacy, but we now use verification for both)
        $targetDir = $baseDir . 'valid_id/';
        $filename = time() . '_' . uniqid() . '.' . $extension;
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Data storage: Failed to create directory $targetDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create storage directory'];
        }
    }

    // Delete any existing file with same base name but different extension
    if ($type === 'verification') {
        $pattern = $targetDir . $subtype . '.*';
        array_map('unlink', glob($pattern));
    }

    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        error_log("Data storage: Failed to move uploaded file to $targetPath");
        return ['status' => 'error', 'message' => 'Failed to save file'];
    }

    chmod($targetPath, 0644);

    if ($type === 'verification') {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/verification/' . $filename;
    } elseif ($type === 'profile') {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/profile/profile.jpg';
    } else {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/valid_id/' . $filename;
    }

    error_log("Data storage: File saved successfully: $relativePath");

    return [
        'status' => 'success',
        'message' => 'File uploaded successfully',
        'path' => $relativePath
    ];
}

/**
 * Convenience function for verification uploads
 */
function processVerificationUpload($userId, $file, $subtype) {
    return processFileUpload('verification', $userId, $file, $subtype);
}

/**
 * Get the full server path for a stored file
 * 
 * @param string $relativePath Path relative to project root
 * @return string Full server path to the file
 */
function getStoragePath($relativePath) {
    if (empty($relativePath)) {
        return null;
    }
    return dirname(__DIR__, 2) . '/' . $relativePath;
}

/**
 * Check if a file exists in storage
 * 
 * @param string $relativePath Path relative to project root
 * @return bool True if file exists
 */
function storageFileExists($relativePath) {
    if (empty($relativePath)) {
        return false;
    }
    
    $fullPath = getStoragePath($relativePath);
    return file_exists($fullPath);
}

/**
 * Get the URL to access a file (using a script to serve files from outside web root)
 * 
 * @param string $relativePath Path relative to project root (e.g., 'Crooks-Data-Storage/users/1/profile/profile.jpg')
 * @return string URL to access the file
 */
function getFileUrl($relativePath) {
    if (empty($relativePath)) {
        return '';
    }
    
    // For files in assets folder (already web accessible)
    if (strpos($relativePath, 'assets/') === 0) {
        return '../' . $relativePath;
    }
    
    // For files in Crooks-Data-Storage, use this same file as a server
    if (strpos($relativePath, 'Crooks-Data-Storage/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($relativePath);
    }
    
    // For any other path
    return '../' . $relativePath;
}

/**
 * Serve a file from storage (outputs file directly)
 * 
 * @param string $relativePath Path relative to project root
 */
function serveFile($relativePath) {
    if (empty($relativePath)) {
        http_response_code(400);
        die('File path required');
    }
    
    // Security: Prevent directory traversal
    $relativePath = str_replace(['../', '..\\', './', '.\\'], '', $relativePath);
    
    // Ensure path starts with Crooks-Data-Storage/
    if (strpos($relativePath, 'Crooks-Data-Storage/') !== 0) {
        http_response_code(403);
        die('Invalid file path');
    }
    
    $fullPath = getStoragePath($relativePath);
    
    if (!$fullPath || !file_exists($fullPath)) {
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
        'svg' => 'image/svg+xml',
        'pdf' => 'application/pdf'
    ];
    
    $contentType = $contentTypes[$extension] ?? 'application/octet-stream';
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // Cache for 1 day
    
    readfile($fullPath);
    exit;
}

// Handle direct requests to this file
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    // Check for serve action
    $action = $_GET['action'] ?? $_POST['action'] ?? '';
    
    if ($action === 'serve') {
        // Serve file - require login for security
        session_start();
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            die('Access denied');
        }
        
        $path = $_GET['path'] ?? '';
        serveFile($path);
        exit;
    }
    
    // Default file upload handling
    header('Content-Type: application/json');
    
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/error_log.txt');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
        exit;
    }

    $type = $_POST['type'] ?? '';
    $userId = $_POST['user_id'] ?? '';
    $file = $_FILES['file'] ?? null;

    $result = processFileUpload($type, $userId, $file);
    
    if ($result['status'] === 'error') {
        http_response_code(400);
    }
    
    echo json_encode($result);
    exit;
}
?>