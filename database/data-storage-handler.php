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
 * Process product media uploads (multiple images and one optional video)
 * 
 * @param int $productId The product ID
 * @param array $imageFiles Array of image files from $_FILES['images'] (multiple)
 * @param array|null $videoFile Single video file from $_FILES['video'] (optional)
 * @return array ['status' => 'success'|'error', 'message' => string, 'paths' => array (if success)]
 */
function processProductMediaUpload($productId, $imageFiles, $videoFile = null) {
    if (empty($productId) || !is_numeric($productId)) {
        return ['status' => 'error', 'message' => 'Invalid product ID'];
    }

    // Validate images
    if (!isset($imageFiles) || !is_array($imageFiles['name'])) {
        return ['status' => 'error', 'message' => 'No images uploaded'];
    }

    $imageCount = count(array_filter($imageFiles['name']));
    if ($imageCount < 2) {
        return ['status' => 'error', 'message' => 'At least 2 images are required'];
    }
    if ($imageCount > 5) {
        return ['status' => 'error', 'message' => 'Maximum 5 images allowed'];
    }

    // Allowed image types
    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $allowedVideoTypes = ['video/mp4'];

    // Target directory
    $baseDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/products/' . $productId . '/media/';
    if (!is_dir($baseDir)) {
        if (!mkdir($baseDir, 0755, true)) {
            error_log("Data storage: Failed to create product media directory $baseDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create media directory'];
        }
    }

    // Clear existing media files (optional, depending on update)
    array_map('unlink', glob($baseDir . '*'));

    $uploadedPaths = [];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    // Process images
    $imageIndex = 1;
    foreach ($imageFiles['tmp_name'] as $key => $tmpName) {
        if ($imageFiles['error'][$key] !== UPLOAD_ERR_OK) {
            continue;
        }

        $detectedType = finfo_file($finfo, $tmpName);
        if (!in_array($detectedType, $allowedImageTypes)) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Invalid image type. Only JPG, PNG, GIF, WEBP allowed.'];
        }

        if ($imageFiles['size'][$key] > 2 * 1024 * 1024) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Each image must be ≤ 2MB'];
        }

        $extension = strtolower(pathinfo($imageFiles['name'][$key], PATHINFO_EXTENSION));
        $filename = 'thumbnail_' . $imageIndex . '.' . $extension;
        $targetPath = $baseDir . $filename;

        if (!move_uploaded_file($tmpName, $targetPath)) {
            error_log("Data storage: Failed to move image to $targetPath");
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Failed to save image ' . $imageIndex];
        }

        chmod($targetPath, 0644);
        $uploadedPaths['images'][] = 'Crooks-Data-Storage/products/' . $productId . '/media/' . $filename;
        $imageIndex++;
    }

    // Process video (optional)
    if ($videoFile && $videoFile['error'] === UPLOAD_ERR_OK) {
        $detectedType = finfo_file($finfo, $videoFile['tmp_name']);
        if (!in_array($detectedType, $allowedVideoTypes)) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Invalid video type. Only MP4 allowed.'];
        }

        if ($videoFile['size'] > 20 * 1024 * 1024) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Video must be ≤ 20MB'];
        }

        $extension = strtolower(pathinfo($videoFile['name'], PATHINFO_EXTENSION));
        $filename = 'video_1.' . $extension;
        $targetPath = $baseDir . $filename;

        if (!move_uploaded_file($videoFile['tmp_name'], $targetPath)) {
            error_log("Data storage: Failed to move video to $targetPath");
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Failed to save video'];
        }

        chmod($targetPath, 0644);
        $uploadedPaths['video'] = 'Crooks-Data-Storage/products/' . $productId . '/media/' . $filename;
    }

    finfo_close($finfo);
    
    // Store only the directory path in the database
    $mediaDir = 'Crooks-Data-Storage/products/' . $productId . '/media/';
    
    return [
        'status' => 'success',
        'message' => 'Product media uploaded successfully',
        'paths' => $uploadedPaths,
        'media_path' => $mediaDir
    ];
}

/**
 * Delete all media for a product
 * 
 * @param int $productId
 * @return bool
 */
function deleteProductMedia($productId) {
    if (empty($productId) || !is_numeric($productId)) {
        return false;
    }
    $mediaDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/products/' . $productId . '/media/';
    if (is_dir($mediaDir)) {
        array_map('unlink', glob($mediaDir . '*'));
        rmdir($mediaDir);
        return true;
    }
    return false;
}

/**
 * Get the first thumbnail image for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return string|null The filename of the first thumbnail, or null if none found
 */
function getFirstProductThumbnail($mediaPath) {
    if (empty($mediaPath)) {
        return null;
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return null;
    }
    
    $files = glob($fullPath . 'thumbnail_1.*');
    if (!empty($files)) {
        return basename($files[0]);
    }
    
    return null;
}

/**
 * Get all thumbnail images for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return array Array of thumbnail filenames
 */
function getAllProductThumbnails($mediaPath) {
    if (empty($mediaPath)) {
        return [];
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return [];
    }
    
    $thumbnails = [];
    for ($i = 1; $i <= 5; $i++) {
        $files = glob($fullPath . 'thumbnail_' . $i . '.*');
        if (!empty($files)) {
            $thumbnails[] = basename($files[0]);
        }
    }
    
    return $thumbnails;
}

/**
 * Get the video file for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return string|null The filename of the video, or null if none found
 */
function getProductVideo($mediaPath) {
    if (empty($mediaPath)) {
        return null;
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return null;
    }
    
    $files = glob($fullPath . 'video_1.*');
    if (!empty($files)) {
        return basename($files[0]);
    }
    
    return null;
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
 * @param string $path Path to the file (can be full path or directory + filename)
 * @param string|null $filename Optional filename if path is just a directory
 * @return string URL to access the file
 */
function getFileUrl($path, $filename = null) {
    if (empty($path)) {
        return '';
    }
    
    // If filename is provided, combine with path
    if ($filename !== null) {
        $fullPath = rtrim($path, '/') . '/' . $filename;
    } else {
        $fullPath = $path;
    }
    
    // For files in assets folder (already web accessible)
    if (strpos($fullPath, 'assets/') === 0) {
        return '../' . $fullPath;
    }
    
    // For files in Crooks-Data-Storage, use this same file as a server
    if (strpos($fullPath, 'Crooks-Data-Storage/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($fullPath);
    }
    
    // For any other path
    return '../' . $fullPath;
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
    
    // Parse the path to determine file type
    $pathParts = explode('/', $relativePath);
    
    // Check if this is a user file (requires authentication)
    if (count($pathParts) >= 3 && $pathParts[1] === 'users') {
        // This is a user file - require login
        session_start();
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            die('Authentication required to access user files');
        }
        
        $fileUserId = (int)$pathParts[2];
        if ($fileUserId !== $_SESSION['user_id']) {
            http_response_code(403);
            die('Access denied: You do not own this file.');
        }
    }
    
    // For product media (products/{product_id}/...), allow public access
    // No authentication required for product images
    
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
        'pdf' => 'application/pdf',
        'mp4' => 'video/mp4'
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
        $path = $_GET['path'] ?? '';
        serveFile($path);
        exit;
    }
    
    // Default file upload handling (requires login)
    session_start();
    if (!isset($_SESSION['user_id'])) {
        http_response_code(403);
        die(json_encode(['status' => 'error', 'message' => 'Authentication required']));
    }
    
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
    $userId = $_POST['user_id'] ?? $_SESSION['user_id'] ?? '';
    $file = $_FILES['file'] ?? null;

    // Verify user ID matches session
    if ($userId != $_SESSION['user_id']) {
        http_response_code(403);
        echo json_encode(['status' => 'error', 'message' => 'User ID mismatch']);
        exit;
    }

    $result = processFileUpload($type, $userId, $file);
    
    if ($result['status'] === 'error') {
        http_response_code(400);
    }
    
    echo json_encode($result);
    exit;
}
?>