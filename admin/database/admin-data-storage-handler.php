<?php
// admin-data-storage-handler.php - Handles admin file operations
// Files stored at: /Crooks-Data-Storage/administrators/admin_id/profile/profile.extension
// (outside the project root - same level as Crooks-Cart-Collectives/)

// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===== FIXED: Ensure error logging is configured properly =====
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$logFile = __DIR__ . '/error_log.txt';
ini_set('error_log', $logFile);

// Verify log file is writable
if (!file_exists($logFile)) {
    touch($logFile);
    chmod($logFile, 0666);
}
if (!is_writable($logFile)) {
    // Try to set permissions
    @chmod($logFile, 0666);
}

/**
 * Log messages with caller information - writes to error_log.txt
 */
function logStorageMessage($message, $level = 'INFO', $data = null) {
    global $logFile;
    
    $caller = '';
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
    
    if (isset($backtrace[1]['file'])) {
        $callerFile = basename($backtrace[1]['file']);
        $callerLine = $backtrace[1]['line'] ?? '?';
        $callerFunction = $backtrace[1]['function'] ?? '';
        $caller = " [{$callerFile}:{$callerLine} - {$callerFunction}()]";
    } elseif (isset($backtrace[0]['file'])) {
        $callerFile = basename($backtrace[0]['file']);
        $callerLine = $backtrace[0]['line'] ?? '?';
        $callerFunction = $backtrace[0]['function'] ?? '';
        $caller = " [{$callerFile}:{$callerLine} - {$callerFunction}()]";
    }
    
    $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
    $requestUri = $_SERVER['REQUEST_URI'] ?? 'UNKNOWN';
    $ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
             strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? ' AJAX' : '';
    
    $sessionInfo = '';
    if (isset($_SESSION['admin_id'])) {
        $sessionInfo = " [Admin ID: {$_SESSION['admin_id']}]";
    }
    
    $logMessage = date('Y-m-d H:i:s') . " [{$level}]{$ajax}{$caller}{$sessionInfo} - {$message} (Method: {$requestMethod}, URI: {$requestUri})";
    
    if ($data !== null) {
        $logMessage .= "\n" . date('Y-m-d H:i:s') . " [DATA] - " . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    
    // Write to error_log.txt
    error_log($logMessage);
    
    // For critical errors, also write directly to file as backup
    if ($level === 'CRITICAL' || $level === 'ERROR') {
        $fh = fopen($logFile, 'a');
        if ($fh) {
            fwrite($fh, $logMessage . "\n");
            fclose($fh);
        }
    }
}

// Test logging on startup
logStorageMessage("=== ADMIN DATA STORAGE HANDLER LOADED ===", "INFO", [
    'log_file' => $logFile,
    'log_writable' => is_writable($logFile),
    'log_exists' => file_exists($logFile),
    'storage_root' => getDataStorageRoot()
]);

/**
 * Get the absolute path to the Crooks-Data-Storage directory
 */
function getDataStorageRoot() {
    $currentDir = __DIR__;  // /.../Crooks-Cart-Collectives/admin/database/
    $projectRoot = dirname($currentDir, 2);  // /.../Crooks-Cart-Collectives/
    $parentDir = dirname($projectRoot);  // /.../ (parent of project root)
    
    $storagePath = $parentDir . '/Crooks-Data-Storage/';
    
    logStorageMessage("Path calculation", "DEBUG", [
        'current_dir' => $currentDir,
        'project_root' => $projectRoot,
        'parent_dir' => $parentDir,
        'storage_path' => $storagePath
    ]);
    
    return $storagePath;
}

/**
 * Ensure the data storage directory exists and is writable
 * 
 * @return array ['success' => bool, 'path' => string, 'message' => string, 'details' => array]
 */
function ensureDataStorageExists() {
    $storageRoot = getDataStorageRoot();
    $result = [
        'success' => false,
        'path' => $storageRoot,
        'message' => '',
        'details' => [
            'exists' => false,
            'created' => false,
            'writable' => false,
            'permissions' => null
        ]
    ];
    
    logStorageMessage("Checking storage directory", "INFO", ['path' => $storageRoot]);
    
    // Check if it's trying to write to filesystem root
    $isFilesystemRoot = false;
    if (DIRECTORY_SEPARATOR === '/') { // Unix/Linux/Mac
        $isFilesystemRoot = ($storageRoot === '/Crooks-Data-Storage/');
    } else { // Windows
        $isFilesystemRoot = preg_match('/^[A-Z]:\\\\Crooks-Data-Storage\\\\$/', $storageRoot);
    }
    
    if ($isFilesystemRoot) {
        $result['message'] = 'Cannot create storage at filesystem root';
        $result['details']['error'] = 'filesystem_root_detected';
        logStorageMessage("CRITICAL: Attempting to create storage at filesystem root", "CRITICAL", $result);
        return $result;
    }
    
    // Check if directory exists
    if (is_dir($storageRoot)) {
        $result['details']['exists'] = true;
        $result['details']['writable'] = is_writable($storageRoot);
        $result['details']['permissions'] = substr(sprintf('%o', fileperms($storageRoot)), -4);
        
        logStorageMessage("Storage directory already exists", "INFO", $result['details']);
        
        $result['success'] = true;
        $result['message'] = 'Storage directory already exists';
        return $result;
    }
    
    // Create directory
    logStorageMessage("Creating storage directory", "INFO", ['path' => $storageRoot]);
    
    $oldMask = umask(0);
    $created = mkdir($storageRoot, 0755, true);
    umask($oldMask);
    
    if ($created) {
        $result['details']['exists'] = true;
        $result['details']['created'] = true;
        $result['details']['writable'] = is_writable($storageRoot);
        $result['details']['permissions'] = substr(sprintf('%o', fileperms($storageRoot)), -4);
        
        // Create security files
        file_put_contents($storageRoot . 'index.html', '<!DOCTYPE html><html><head><title>Access Denied</title></head><body><h1>Access Denied</h1></body></html>');
        file_put_contents($storageRoot . '.htaccess', "Order Deny,Allow\nDeny from all");
        
        logStorageMessage("Successfully created storage directory", "INFO", $result['details']);
        
        $result['success'] = true;
        $result['message'] = 'Storage directory created successfully';
    } else {
        $error = error_get_last();
        $result['message'] = 'Failed to create storage directory: ' . ($error['message'] ?? 'Unknown error');
        $result['details']['error'] = $error;
        
        logStorageMessage("FAILED to create storage directory", "ERROR", $result);
    }
    
    return $result;
}

/**
 * Create directory structure for a specific admin
 * 
 * @param int $adminId
 * @return array ['success' => bool, 'path' => string, 'message' => string, 'details' => array]
 */
function createAdminStorage($adminId) {
    logStorageMessage("Creating admin storage structure", "INFO", ['admin_id' => $adminId]);
    
    if (empty($adminId) || !is_numeric($adminId)) {
        return [
            'success' => false,
            'message' => 'Invalid admin ID',
            'details' => ['admin_id' => $adminId]
        ];
    }
    
    // First ensure root storage exists
    $rootCheck = ensureDataStorageExists();
    if (!$rootCheck['success']) {
        return [
            'success' => false,
            'message' => 'Root storage directory check failed: ' . $rootCheck['message'],
            'details' => $rootCheck
        ];
    }
    
    $storageRoot = getDataStorageRoot();
    $adminDir = $storageRoot . 'administrators/' . $adminId . '/';
    $profileDir = $adminDir . 'profile/';
    
    $result = [
        'success' => false,
        'root_path' => $storageRoot,
        'admin_path' => $adminDir,
        'profile_path' => $profileDir,
        'message' => '',
        'details' => [
            'admin_dir_created' => false,
            'profile_dir_created' => false,
            'admin_dir_exists' => is_dir($adminDir),
            'profile_dir_exists' => is_dir($profileDir)
        ]
    ];
    
    logStorageMessage("Creating directories for admin {$adminId}", "INFO", [
        'admin_dir' => $adminDir,
        'profile_dir' => $profileDir
    ]);
    
    $oldMask = umask(0);
    
    // Create admin directory if needed
    if (!is_dir($adminDir)) {
        if (mkdir($adminDir, 0755, true)) {
            $result['details']['admin_dir_created'] = true;
            $result['details']['admin_dir_exists'] = true;
            logStorageMessage("Created admin directory", "INFO", ['path' => $adminDir]);
        } else {
            $error = error_get_last();
            $result['message'] = 'Failed to create admin directory: ' . ($error['message'] ?? 'Unknown');
            logStorageMessage("Failed to create admin directory", "ERROR", ['path' => $adminDir, 'error' => $error]);
            umask($oldMask);
            return $result;
        }
    }
    
    // Create profile directory if needed
    if (!is_dir($profileDir)) {
        if (mkdir($profileDir, 0755, true)) {
            $result['details']['profile_dir_created'] = true;
            $result['details']['profile_dir_exists'] = true;
            logStorageMessage("Created profile directory", "INFO", ['path' => $profileDir]);
        } else {
            $error = error_get_last();
            $result['message'] = 'Failed to create profile directory: ' . ($error['message'] ?? 'Unknown');
            logStorageMessage("Failed to create profile directory", "ERROR", ['path' => $profileDir, 'error' => $error]);
            umask($oldMask);
            return $result;
        }
    }
    
    umask($oldMask);
    
    $result['success'] = true;
    $result['message'] = 'Admin storage structure created successfully';
    
    logStorageMessage("Admin storage structure created", "INFO", $result);
    
    return $result;
}

/**
 * Process admin file upload
 */
function processAdminFileUpload($type, $adminId, $file) {
    logStorageMessage("Processing file upload", "INFO", [
        'type' => $type,
        'admin_id' => $adminId,
        'file_name' => $file['name'] ?? 'N/A',
        'file_size' => $file['size'] ?? 'N/A'
    ]);
    
    if (empty($type) || empty($adminId) || !is_numeric($adminId)) {
        return [
            'status' => 'error',
            'message' => 'Missing required parameters',
            'details' => ['type' => $type, 'admin_id' => $adminId]
        ];
    }

    if ($type !== 'profile') {
        logStorageMessage("Invalid file type", "ERROR", ['type' => $type]);
        return ['status' => 'error', 'message' => 'Invalid file type'];
    }

    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        $errorCode = $file['error'] ?? 'NO_FILE';
        logStorageMessage("File upload error", "ERROR", ['error_code' => $errorCode]);
        return ['status' => 'error', 'message' => 'File upload failed'];
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        logStorageMessage("File size exceeds limit", "ERROR", ['size' => $file['size']]);
        return ['status' => 'error', 'message' => 'File size exceeds 2MB'];
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($detectedType, $allowedTypes)) {
        logStorageMessage("Invalid file type", "ERROR", ['detected' => $detectedType]);
        return ['status' => 'error', 'message' => 'Invalid file type. Only JPG, PNG, GIF, WEBP allowed.'];
    }

    // Get extension from detected MIME type
    $extension = '';
    switch ($detectedType) {
        case 'image/jpeg': $extension = 'jpg'; break;
        case 'image/png': $extension = 'png'; break;
        case 'image/gif': $extension = 'gif'; break;
        case 'image/webp': $extension = 'webp'; break;
        default: $extension = 'jpg';
    }
    
    // Create admin storage structure
    $storageResult = createAdminStorage($adminId);
    if (!$storageResult['success']) {
        return [
            'status' => 'error',
            'message' => 'Failed to create storage directory: ' . $storageResult['message'],
            'details' => $storageResult
        ];
    }
    
    $targetDir = $storageResult['profile_path'];
    $filename = 'profile.' . $extension;
    
    // Delete any existing profile files
    $pattern = $targetDir . 'profile.*';
    $existingFiles = glob($pattern);
    if (!empty($existingFiles)) {
        logStorageMessage("Removing existing profile files", "DEBUG", ['files' => $existingFiles]);
        array_map('unlink', $existingFiles);
    }

    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        $error = error_get_last();
        logStorageMessage("Failed to move uploaded file", "ERROR", ['target' => $targetPath, 'error' => $error]);
        return ['status' => 'error', 'message' => 'Failed to save file'];
    }

    chmod($targetPath, 0644);

    $relativePath = 'Crooks-Data-Storage/administrators/' . $adminId . '/profile/' . $filename;

    logStorageMessage("File saved successfully", "INFO", [
        'full_path' => $targetPath,
        'relative_path' => $relativePath,
        'storage_root' => getDataStorageRoot()
    ]);

    return [
        'status' => 'success',
        'message' => 'File uploaded successfully',
        'path' => $relativePath,
        'full_path' => $targetPath,
        'storage_root' => getDataStorageRoot(),
        'admin_storage' => $storageResult
    ];
}

// Export functions for other files
$storageFunctions = [
    'logStorageMessage',
    'getDataStorageRoot',
    'ensureDataStorageExists',
    'createAdminStorage',
    'processAdminFileUpload',
    'processAdminProfileUpload',
    'getAdminStorageFullPath',
    'adminStorageFileExists',
    'getAdminFileUrl',
    'serveAdminFile',
    'deleteAdminMedia'
];

// Handle direct requests
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    logStorageMessage("Direct access to admin-data-storage-handler.php", "INFO");
    
    $action = $_GET['action'] ?? $_POST['action'] ?? '';
    
    // Special debug action to test logging
    if ($action === 'test_log') {
        header('Content-Type: application/json');
        $result = [
            'status' => 'success',
            'message' => 'Log test',
            'log_file' => $logFile,
            'log_writable' => is_writable($logFile),
            'storage_root' => getDataStorageRoot(),
            'storage_exists' => is_dir(getDataStorageRoot())
        ];
        logStorageMessage("Test log message", "INFO", $result);
        echo json_encode($result);
        exit;
    }
    
    if ($action === 'serve') {
        $path = $_GET['path'] ?? '';
        serveAdminFile($path);
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'upload') {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['admin_id'])) {
            logStorageMessage("Upload attempted without authentication", "WARNING");
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
            exit;
        }
        
        $result = processAdminProfileUpload($_SESSION['admin_id'], $_FILES['file'] ?? null);
        
        if ($result['status'] === 'error') {
            http_response_code(400);
        }
        
        echo json_encode($result);
        exit;
    }
    
    http_response_code(404);
    echo 'Not found';
    exit;
}
?>