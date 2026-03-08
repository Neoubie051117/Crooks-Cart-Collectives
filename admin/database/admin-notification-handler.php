<?php
// Admin Notification Handler - For real-time dot badge updates
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

// Always return JSON
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Check authentication
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$adminId = $_SESSION['admin_id'];
$action = $_GET['action'] ?? $_POST['action'] ?? '';

// ===== UPDATE LAST LOG (when admin clicks logs nav link) =====
if ($action === 'update_last_log') {
    try {
        $stmt = $connection->prepare("UPDATE administrators SET last_log = NOW() WHERE admin_id = ?");
        $stmt->execute([$adminId]);
        
        error_log("UPDATED last_log for admin " . $adminId . " to " . date('Y-m-d H:i:s'));
        
        echo json_encode([
            'status' => 'success', 
            'message' => 'Last log updated',
            'timestamp' => time()
        ]);
        exit;
    } catch (PDOException $e) {
        error_log("Failed to update last_log: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update last log']);
        exit;
    }
}

// ===== UPDATE QUEUE VIEW (when admin clicks queue nav link) =====
if ($action === 'update_queue_view') {
    $_SESSION['last_queue_view'] = time();
    error_log("UPDATED last_queue_view for admin " . $adminId . " to " . $_SESSION['last_queue_view']);
    echo json_encode([
        'status' => 'success', 
        'message' => 'Queue view updated',
        'timestamp' => $_SESSION['last_queue_view']
    ]);
    exit;
}

// Get pending counts for both queue and logs
if ($action === 'get_pending_counts') {
    getPendingCounts($connection, $adminId);
    exit;
}

// If no valid action
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);

/**
 * Get pending counts for queue and logs using last_log from administrators table
 */
function getPendingCounts($connection, $adminId) {
    try {
        $currentTime = time(); // Get current server time
        
        // ===== GET ADMIN'S LAST LOG TIMESTAMP FROM DATABASE =====
        $lastLogTimestamp = 0;
        $stmt = $connection->prepare("SELECT last_log FROM administrators WHERE admin_id = ?");
        $stmt->execute([$adminId]);
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($adminData && !empty($adminData['last_log'])) {
            $lastLogTimestamp = strtotime($adminData['last_log']);
            error_log("Admin last_log from DB: " . $adminData['last_log'] . " -> timestamp: " . $lastLogTimestamp);
        } else {
            error_log("Admin last_log is NULL or empty");
        }
        
        // ===== QUEUE: Check for ANY pending seller applications (regardless of timestamp) =====
        $pendingQueue = 0;
        
        // Check sellers table for pending applications
        $stmt = $connection->prepare("
            SELECT COUNT(*) as count 
            FROM sellers 
            WHERE is_verified = 'pending'
        ");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $pendingQueue = (int)($result['count'] ?? 0);
        
        error_log("Pending queue count: " . $pendingQueue);
        
        // ===== LOGS: Get the latest activity timestamp from ALL TABLES =====
        $latestLogTimestamp = 0;
        $debugResults = [];
        
        // 1. Check users table (new user registrations) - date_created
        $stmt = $connection->prepare("SELECT MAX(date_created) as latest FROM users");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['users'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("users.date_created: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("users.date_created: NULL");
        }
        
        // 2. Check sellers table - new applications (date_applied)
        $stmt = $connection->prepare("SELECT MAX(date_applied) as latest FROM sellers");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['sellers_date_applied'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("sellers.date_applied: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("sellers.date_applied: NULL");
        }
        
        // 3. Check sellers table - verification status changes (verification_date)
        $stmt = $connection->prepare("SELECT MAX(verification_date) as latest FROM sellers WHERE verification_date IS NOT NULL");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['sellers_verification_date'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("sellers.verification_date: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("sellers.verification_date: NULL");
        }
        
        // 4. Check products table (new products) - date_added
        $stmt = $connection->prepare("SELECT MAX(date_added) as latest FROM products");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['products'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("products.date_added: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("products.date_added: NULL");
        }
        
        // 5. Check orders table - new orders (order_date)
        $stmt = $connection->prepare("SELECT MAX(order_date) as latest FROM orders");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['orders_order_date'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("orders.order_date: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("orders.order_date: NULL");
        }
        
        // 6. Check orders table - delivered status changes (delivered_at)
        $stmt = $connection->prepare("SELECT MAX(delivered_at) as latest FROM orders WHERE delivered_at IS NOT NULL");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['orders_delivered_at'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("orders.delivered_at: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("orders.delivered_at: NULL");
        }
        
        // 7. Check orders table - cancelled status changes (cancelled_at)
        $stmt = $connection->prepare("SELECT MAX(cancelled_at) as latest FROM orders WHERE cancelled_at IS NOT NULL");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['orders_cancelled_at'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("orders.cancelled_at: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("orders.cancelled_at: NULL");
        }
        
        // 8. Check customers table - date_joined
        $stmt = $connection->prepare("SELECT MAX(date_joined) as latest FROM customers");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['customers'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("customers.date_joined: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("customers.date_joined: NULL");
        }
        
        // 9. Check product_reviews table - date_posted
        $stmt = $connection->prepare("SELECT MAX(date_posted) as latest FROM product_reviews");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $debugResults['product_reviews'] = $result['latest'];
        if ($result['latest']) {
            $timestamp = strtotime($result['latest']);
            error_log("product_reviews.date_posted: " . $result['latest'] . " -> timestamp: " . $timestamp);
            $latestLogTimestamp = max($latestLogTimestamp, $timestamp);
        } else {
            error_log("product_reviews.date_posted: NULL");
        }
        
        // Log all debug results
        error_log("DEBUG RESULTS: " . json_encode($debugResults));
        
        // ===== LOGS DOT LOGIC =====
        // Force integer conversion and proper comparison
        $latestLogTimestamp = (int)$latestLogTimestamp;
        $lastLogTimestamp = (int)$lastLogTimestamp;
        
        $hasNewLogs = false;
        if ($latestLogTimestamp > 0) {
            if ($lastLogTimestamp > 0) {
                // Admin has viewed logs before - show dot if there's ANY activity newer than last_log
                $hasNewLogs = ($latestLogTimestamp > $lastLogTimestamp);
                error_log("LOGS COMPARISON: Latest(" . date('Y-m-d H:i:s', $latestLogTimestamp) . ") > LastLog(" . date('Y-m-d H:i:s', $lastLogTimestamp) . ") = " . ($hasNewLogs ? 'YES' : 'NO'));
                error_log("Raw values: $latestLogTimestamp > $lastLogTimestamp = " . ($hasNewLogs ? 'YES' : 'NO'));
            } else {
                // Admin has never viewed logs (last_log is NULL) - show dot if any activity exists
                $hasNewLogs = true;
                error_log("LOGS: No last_log, has activity = YES");
            }
        } else {
            error_log("LOGS: No activity found in any table");
        }
        
        // ===== QUEUE DOT LOGIC - SIMPLIFIED =====
        // Just check if there are ANY pending applications, regardless of timestamp
        $hasNewQueue = ($pendingQueue > 0);
        
        // Log queue info
        error_log("QUEUE: Pending count = $pendingQueue, Has new queue = " . ($hasNewQueue ? 'YES' : 'NO'));
        
        // Log everything for debugging
        error_log("===== NOTIFICATION CHECK =====");
        error_log("Admin ID: $adminId");
        error_log("Last log from DB: " . $lastLogTimestamp . " (" . ($lastLogTimestamp ? date('Y-m-d H:i:s', $lastLogTimestamp) : 'none') . ")");
        error_log("Latest log timestamp: $latestLogTimestamp (" . ($latestLogTimestamp ? date('Y-m-d H:i:s', $latestLogTimestamp) : 'none') . ")");
        error_log("Has new logs: " . ($hasNewLogs ? 'YES' : 'NO'));
        error_log("Pending queue count: $pendingQueue");
        error_log("Has new queue: " . ($hasNewQueue ? 'YES' : 'NO'));
        error_log("==============================");
        
        echo json_encode([
            'status' => 'success',
            'pending_queue' => (int)$pendingQueue,
            'has_new_queue' => $hasNewQueue,
            'has_new_logs' => $hasNewLogs,
            'latest_log_timestamp' => $latestLogTimestamp,
            'last_log_timestamp' => $lastLogTimestamp,
            'latest_log_timestamp_formatted' => $latestLogTimestamp ? date('Y-m-d H:i:s', $latestLogTimestamp) : null,
            'last_log_timestamp_formatted' => $lastLogTimestamp ? date('Y-m-d H:i:s', $lastLogTimestamp) : null,
            'server_time' => $currentTime,
            'server_time_formatted' => date('Y-m-d H:i:s', $currentTime),
            'debug' => $debugResults
        ]);
        
    } catch (PDOException $e) {
        error_log("Error getting pending counts: " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
}
?>