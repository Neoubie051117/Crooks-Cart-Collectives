<?php
// Crooks-Cart-Collectives/admin/database/admin-sign-out-handler.php
// FIXED: Properly destroys admin session and redirects

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $basePath = dirname(dirname($scriptName));
    return $protocol . $host . $basePath . '/';
}

$baseUrl = getBaseUrl();
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

try {
    // ===== FIXED: Completely destroy the session =====
    // First, clear all session variables
    $_SESSION = array();
    
    // Delete the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Finally, destroy the session
    session_destroy();
    
    error_log("Admin logged out - Session destroyed completely");
    
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Admin logged out successfully',
            'redirect' => $baseUrl . 'pages/admin-sign-in.php'
        ]);
        exit;
    }
    
    header("Location: " . $baseUrl . "pages/admin-sign-in.php");
    exit;
    
} catch (Exception $e) {
    error_log("Admin logout error: " . $e->getMessage());
    
    // Even on error, try to clear session
    $_SESSION = array();
    session_destroy();
    
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'Admin logout processed with errors',
            'redirect' => $baseUrl . 'pages/admin-sign-in.php'
        ]);
        exit;
    }
    
    header("Location: " . $baseUrl . "pages/admin-sign-in.php");
    exit;
}
?>