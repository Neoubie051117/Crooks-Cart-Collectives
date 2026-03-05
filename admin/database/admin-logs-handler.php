<?php
// Admin Logs Handler - for monitoring database activities
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'debug_columns') {
    // Debug function to check table columns
    $tables = ['users', 'sellers', 'products', 'orders', 'administrators'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $result[$table] = $columns;
        } catch (PDOException $e) {
            $result[$table] = 'Error: ' . $e->getMessage();
        }
    }
    
    echo json_encode(['status' => 'success', 'data' => $result]);
    exit;
}

if ($action === 'get_logs') {
    $type = $_GET['type'] ?? 'all';
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
    
    try {
        $logs = [];
        
        // Get table column info first
        $columnInfo = getTableColumns($connection);
        
        // ===== USER REGISTRATIONS (from users table) =====
        if ($type === 'all' || $type === 'user_registration') {
            if (isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['users'], ['date_created', 'created_at', 'registration_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 
                            'user_registration' as log_type, 
                            user_id, 
                            first_name,
                            last_name,
                            CONCAT(first_name, ' ', last_name) as user_name,
                            email, 
                            username,
                            'User' as role,
                            $dateColumn as timestamp
                        FROM users
                        ORDER BY $dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $userLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Format the logs for display with consistent structure
                    foreach ($userLogs as &$log) {
                        $log['description'] = $log['first_name'] . ' ' . $log['last_name'] . 
                                             ' (' . $log['username'] . ') registered with email ' . $log['email'];
                        // Ensure all expected fields exist
                        $log['user_name'] = $log['user_name'] ?? $log['first_name'] . ' ' . $log['last_name'];
                        $log['email'] = $log['email'] ?? '';
                        $log['username'] = $log['username'] ?? '';
                    }
                    
                    $logs = array_merge($logs, $userLogs);
                }
            }
        }
        
        // ===== SELLER APPLICATIONS (from sellers table) =====
        // MODIFIED: is_verified now uses ENUM values 'pending', 'verified', 'rejected'
        if ($type === 'all' || $type === 'seller_application') {
            if (isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['sellers'], ['date_applied', 'created_at', 'application_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 
                            'seller_application' as log_type, 
                            s.seller_id,
                            COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown User') as user_name,
                            COALESCE(s.business_name, 'No Business Name') as business_name,
                            s.is_verified as verification_status,
                            CASE s.is_verified
                                WHEN 'pending' THEN 'Pending'
                                WHEN 'verified' THEN 'Verified'
                                WHEN 'rejected' THEN 'Rejected'
                                ELSE 'Unknown'
                            END as status_display,
                            'Seller Applicant' as role,
                            s.$dateColumn as timestamp
                        FROM sellers s
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY s.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $sellerLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Format the logs for display
                    foreach ($sellerLogs as &$log) {
                        $statusText = $log['status_display'];
                        $log['description'] = $log['user_name'] . ' applied as seller - Business: "' . $log['business_name'] . '" (Status: ' . $statusText . ')';
                    }
                    
                    $logs = array_merge($logs, $sellerLogs);
                }
            }
        }
        
        // ===== PRODUCT ADDITIONS (from products table) =====
        if ($type === 'all' || $type === 'product_added') {
            if (isset($columnInfo['products']) && isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['products'], ['date_added', 'created_at', 'added_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 
                            'product_added' as log_type, 
                            p.product_id, 
                            p.name as product_name,
                            p.price,
                            p.stock_quantity,
                            COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Seller') as user_name,
                            COALESCE(s.business_name, 'No Business Name') as business_name,
                            CASE WHEN p.is_active = 1 THEN 'Active' ELSE 'Inactive' END as product_status,
                            'Product' as role,
                            p.$dateColumn as timestamp
                        FROM products p
                        LEFT JOIN sellers s ON p.seller_id = s.seller_id
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY p.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $productLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Format the logs for display
                    foreach ($productLogs as &$log) {
                        $log['description'] = 'Seller ' . $log['user_name'] . ' (' . $log['business_name'] . ') added product: "' . 
                                             $log['product_name'] . '" - ₱' . number_format($log['price'], 2) . 
                                             ' (Stock: ' . $log['stock_quantity'] . ')';
                    }
                    
                    $logs = array_merge($logs, $productLogs);
                }
            }
        }
        
        // ===== ORDERS (from orders table) =====
        if ($type === 'all' || $type === 'order_placed') {
            if (isset($columnInfo['orders']) && isset($columnInfo['products']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['orders'], ['order_date', 'created_at', 'date_ordered']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 
                            'order_placed' as log_type, 
                            o.order_id,
                            COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Customer') as user_name,
                            COALESCE(p.name, 'Unknown Product') as product_name, 
                            o.quantity, 
                            o.price,
                            o.subtotal,
                            o.status,
                            CASE 
                                WHEN o.cancelled_by = 'customer' THEN 'Cancelled by Customer'
                                WHEN o.cancelled_by = 'seller' THEN 'Cancelled by Seller'
                                ELSE ''
                            END as cancel_info,
                            'Order' as role,
                            o.$dateColumn as timestamp,
                            o.delivered_at,
                            o.cancelled_at
                        FROM orders o
                        LEFT JOIN products p ON o.product_id = p.product_id
                        LEFT JOIN customers c ON o.customer_id = c.customer_id
                        LEFT JOIN users u ON c.user_id = u.user_id
                        ORDER BY o.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $orderLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Format the logs for display
                    foreach ($orderLogs as &$log) {
                        $statusText = ucfirst($log['status']);
                        $log['description'] = $log['user_name'] . ' placed order #' . $log['order_id'] . 
                                             ' for ' . $log['quantity'] . 'x ' . $log['product_name'] . 
                                             ' - Total: ₱' . number_format($log['subtotal'], 2) . 
                                             ' (Status: ' . $statusText . ')';
                        
                        // Add delivery/cancellation info if available
                        if ($log['status'] === 'delivered' && $log['delivered_at']) {
                            $log['description'] .= ' - Delivered on ' . date('M j, Y', strtotime($log['delivered_at']));
                        } else if ($log['status'] === 'cancelled' && $log['cancel_info']) {
                            $log['description'] .= ' - ' . $log['cancel_info'];
                        }
                    }
                    
                    $logs = array_merge($logs, $orderLogs);
                }
            }
        }
        
        // Sort all logs by timestamp (most recent first)
        if (count($logs) > 1) {
            usort($logs, function($a, $b) {
                return strtotime($b['timestamp']) - strtotime($a['timestamp']);
            });
        }
        
        // Limit the total number of logs
        $logs = array_slice($logs, 0, $limit);
        
        if (empty($logs)) {
            echo json_encode([
                'status' => 'success', 
                'data' => [], 
                'message' => 'No logs found in the database. Try adding some data first.'
            ]);
        } else {
            echo json_encode(['status' => 'success', 'data' => $logs]);
        }
        
    } catch (PDOException $e) {
        error_log("Logs fetch error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Helper function to get table columns
function getTableColumns($connection) {
    $tables = ['users', 'sellers', 'products', 'orders'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $result[$table] = $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            $result[$table] = [];
        }
    }
    
    return $result;
}

// Helper function to find the correct date column
function getDateColumn($columns, $possibleNames) {
    foreach ($possibleNames as $name) {
        if (in_array($name, $columns)) {
            return $name;
        }
    }
    return null;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);