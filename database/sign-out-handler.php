<?php
// Crooks-Cart-Collectives/database/sign-out-handler.php
// FIXED: Works even when database doesn't exist - only clears user sessions, preserves admin

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
    // ===== FIXED: Store admin session before clearing user sessions =====
    $adminSession = [];
    
    // Preserve admin session if it exists (no database access needed)
    if (isset($_SESSION['admin_id'])) {
        $adminSession = [
            'admin_id' => $_SESSION['admin_id'],
            'admin_first_name' => $_SESSION['admin_first_name'] ?? null,
            'admin_last_name' => $_SESSION['admin_last_name'] ?? null,
            'admin_username' => $_SESSION['admin_username'] ?? null,
            'admin_email' => $_SESSION['admin_email'] ?? null,
            'is_admin' => $_SESSION['is_admin'] ?? null,
            'admin_profile_picture' => $_SESSION['admin_profile_picture'] ?? null,
            'last_queue_view' => $_SESSION['last_queue_view'] ?? null
        ];
    }
    
    // Clear user-specific session variables
    $userKeys = [
        'user_id', 'customer_id', 'seller_id', 'username', 'email',
        'is_customer', 'is_seller', 'seller_verified'
    ];
    
    foreach ($userKeys as $key) {
        unset($_SESSION[$key]);
    }
    
    // Restore admin session if it existed
    if (!empty($adminSession)) {
        foreach ($adminSession as $key => $value) {
            $_SESSION[$key] = $value;
        }
        error_log("User logged out - Admin session preserved");
    } else {
        // No admin session, destroy the cookie for security
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        error_log("User logged out - No admin session present");
    }
    
    $redirect = $baseUrl . 'index.php';
    
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Logged out successfully',
            'redirect' => $redirect
        ]);
        exit;
    }
    
    header("Location: " . $redirect);
    exit;
    
} catch (Exception $e) {
    error_log("Logout error: " . $e->getMessage());
    
    // Even on error, try to clear user session data
    $userKeys = [
        'user_id', 'customer_id', 'seller_id', 'username', 'email',
        'is_customer', 'is_seller', 'seller_verified'
    ];
    
    foreach ($userKeys as $key) {
        unset($_SESSION[$key]);
    }
    
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'Logout processed',
            'redirect' => $baseUrl . 'index.php'
        ]);
        exit;
    }
    
    header("Location: " . $baseUrl . 'index.php');
    exit;
}
?>