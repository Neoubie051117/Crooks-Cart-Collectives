<?php
// Admin Authentication Handler
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

// Allow GET requests for fetching sellers
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    // For POST requests
    $action = $_POST['action'] ?? '';
}

// Check if admin is logged in for all actions
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

// Get all sellers with their verification status
if ($action === 'get_all_sellers') {
    try {
        // First check if sellers table exists
        $checkTable = $connection->query("SHOW TABLES LIKE 'sellers'");
        if ($checkTable->rowCount() == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'Sellers table does not exist']);
            exit;
        }
        
        // Get all sellers with user information
        // MODIFIED: is_verified now uses ENUM values 'pending', 'verified', 'rejected'
        $stmt = $connection->prepare("
            SELECT 
                s.seller_id, 
                s.business_name, 
                s.date_applied as created_at, 
                s.is_verified,
                s.verification_date as verified_at,
                u.user_id,
                u.first_name, 
                u.last_name, 
                u.email, 
                u.contact_number
            FROM sellers s
            LEFT JOIN users u ON s.user_id = u.user_id
            ORDER BY 
                CASE s.is_verified
                    WHEN 'pending' THEN 1
                    WHEN 'verified' THEN 2
                    WHEN 'rejected' THEN 3
                    ELSE 4
                END,
                s.date_applied DESC
        ");
        $stmt->execute();
        $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log("Found " . count($sellers) . " sellers total");
        
        // Count pending for debugging
        $pendingCount = 0;
        $verifiedCount = 0;
        $rejectedCount = 0;
        
        foreach ($sellers as $seller) {
            if ($seller['is_verified'] == 'pending') {
                $pendingCount++;
                error_log("Pending seller: ID=" . $seller['seller_id'] . 
                         ", Business=" . $seller['business_name'] . 
                         ", Name=" . $seller['first_name'] . " " . $seller['last_name']);
            } elseif ($seller['is_verified'] == 'verified') {
                $verifiedCount++;
            } elseif ($seller['is_verified'] == 'rejected') {
                $rejectedCount++;
            }
        }
        
        error_log("Pending sellers count: " . $pendingCount);
        error_log("Verified sellers count: " . $verifiedCount);
        error_log("Rejected sellers count: " . $rejectedCount);
        
        // Format the data for display
        foreach ($sellers as &$seller) {
            // Handle null business_name
            $seller['business_name'] = $seller['business_name'] ?? 'No Business Name';
            // Handle null user data
            $seller['first_name'] = $seller['first_name'] ?? 'Unknown';
            $seller['last_name'] = $seller['last_name'] ?? 'User';
            $seller['email'] = $seller['email'] ?? 'No email';
            $seller['contact_number'] = $seller['contact_number'] ?? 'No contact';
        }
        
        echo json_encode([
            'status' => 'success', 
            'data' => $sellers,
            'count' => count($sellers),
            'pending' => $pendingCount,
            'verified' => $verifiedCount,
            'rejected' => $rejectedCount
        ]);
        
    } catch (PDOException $e) {
        error_log("Error fetching sellers: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Get statistics for dashboard
if ($action === 'get_stats') {
    try {
        $stats = [];
        
        // Count pending verifications (is_verified = 'pending')
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'pending'");
        $stmt->execute();
        $stats['pending_verifications'] = $stmt->fetch()['count'];
        
        // Count verified sellers (is_verified = 'verified')
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'verified'");
        $stmt->execute();
        $stats['verified_sellers'] = $stmt->fetch()['count'];
        
        // Count rejected sellers (is_verified = 'rejected')
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'rejected'");
        $stmt->execute();
        $stats['rejected_sellers'] = $stmt->fetch()['count'];
        
        // Total sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
        $stmt->execute();
        $stats['total_sellers'] = $stmt->fetch()['count'];
        
        // Total users
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM users");
        $stmt->execute();
        $stats['total_users'] = $stmt->fetch()['count'];
        
        // Total products
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM products");
        $stmt->execute();
        $stats['total_products'] = $stmt->fetch()['count'];
        
        // Total orders
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM orders");
        $stmt->execute();
        $stats['total_orders'] = $stmt->fetch()['count'];
        
        echo json_encode(['status' => 'success', 'data' => $stats]);
        
    } catch (PDOException $e) {
        error_log("Error fetching stats: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// Seller verification (POST only)
if ($action === 'verify' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 'verified', verification_date = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        $rowCount = $stmt->rowCount();
        error_log("Verified seller ID $seller_id, rows affected: $rowCount");
        echo json_encode(['status' => 'success', 'message' => 'Seller verified successfully']);
    } catch (PDOException $e) {
        error_log("Verify error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

if ($action === 'reject' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 'rejected', verification_date = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        $rowCount = $stmt->rowCount();
        error_log("Rejected seller ID $seller_id, rows affected: $rowCount");
        echo json_encode(['status' => 'success', 'message' => 'Seller rejected']);
    } catch (PDOException $e) {
        error_log("Reject error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// If no valid action was found
echo json_encode(['status' => 'error', 'message' => 'Invalid action']);