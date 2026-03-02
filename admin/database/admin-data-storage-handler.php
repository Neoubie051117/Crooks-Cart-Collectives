<?php
// Admin data storage handler - for serving and saving admin files
session_start();

// Function to serve admin files (profile pictures)
function serveAdminFile($path) {
    // Security: ensure path is within administrators directory
    $baseDir = dirname(__DIR__) . '/Crooks-Data-Storage/administrators/';
    $fullPath = realpath($baseDir . $path);
    if ($fullPath === false || strpos($fullPath, $baseDir) !== 0) {
        http_response_code(404);
        exit;
    }
    $ext = pathinfo($fullPath, PATHINFO_EXTENSION);
    $mime = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml'
    ][strtolower($ext)] ?? 'application/octet-stream';

    header('Content-Type: ' . $mime);
    header('Content-Length: ' . filesize($fullPath));
    readfile($fullPath);
    exit;
}

// Function to save admin profile picture
function saveAdminProfilePicture($admin_id, $file) {
    $targetDir = dirname(__DIR__) . '/Crooks-Data-Storage/administrators/profile/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $admin_id . '_' . time() . '.' . $ext;
    $targetPath = $targetDir . $filename;
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Return relative path for database storage
        return [
            'success' => true,
            'path' => 'administrators/profile/' . $filename
        ];
    }
    return [
        'success' => false,
        'message' => 'Failed to upload file.'
    ];
}

// Get admin profile picture URL
function getAdminProfilePictureUrl($path) {
    if (empty($path)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    return '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($path);
}

// Handle requests
if (isset($_GET['action']) && $_GET['action'] === 'serve' && isset($_GET['path'])) {
    serveAdminFile($_GET['path']);
    exit;
}

// If not serving, output nothing
?>