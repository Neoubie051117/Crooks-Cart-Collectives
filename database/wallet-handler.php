<?php
// Wallet Handler - Manages wallet operations: creation, balance, deposits, payments, refunds
// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/database-connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

/**
 * Get or create wallet for a user
 * Returns wallet data including current balance
 */
function getOrCreateWallet($userId) {
    global $connection;
    
    try {
        // Check if wallet exists
        $stmt = $connection->prepare("
            SELECT wallet_id, balance 
            FROM wallets 
            WHERE user_id = ? 
            ORDER BY transaction_date DESC 
            LIMIT 1
        ");
        $stmt->execute([$userId]);
        $wallet = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($wallet) {
            return $wallet;
        }
        
        // Create initial wallet transaction
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            INSERT INTO wallets (
                user_id, balance, previous_balance, transaction_amount, 
                transaction_type, description, transaction_date
            ) VALUES (?, 0.00, 0.00, 0.00, 'initial', 'Wallet created', NOW())
        ");
        $stmt->execute([$userId]);
        
        $walletId = $connection->lastInsertId();
        
        $connection->commit();
        
        return [
            'wallet_id' => $walletId,
            'balance' => 0.00
        ];
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Error creating wallet: " . $e->getMessage());
        return null;
    }
}

/**
 * Get transaction history for a user
 */
function getTransactionHistory($userId, $limit = 50) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT wallet_id, balance, previous_balance, transaction_amount,
                   transaction_type, refund_id, order_id, description,
                   transaction_date
            FROM wallets
            WHERE user_id = ?
            ORDER BY transaction_date DESC
            LIMIT ?
        ");
        $stmt->execute([$userId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching transaction history: " . $e->getMessage());
        return [];
    }
}

/**
 * Get current balance for a user
 */
function getBalance($userId) {
    try {
        $wallet = getOrCreateWallet($userId);
        return $wallet ? $wallet['balance'] : 0.00;
    } catch (Exception $e) {
        error_log("Error getting balance: " . $e->getMessage());
        return 0.00;
    }
}

/**
 * Process a deposit (add funds)
 */
function processDeposit($userId, $amount, $description = 'Added funds to wallet') {
    global $connection;
    
    if ($amount <= 0) {
        return ['status' => 'error', 'message' => 'Invalid amount'];
    }
    
    try {
        $connection->beginTransaction();
        
        // Get current balance
        $currentBalance = getBalance($userId);
        $newBalance = $currentBalance + $amount;
        
        // Insert transaction
        $stmt = $connection->prepare("
            INSERT INTO wallets (
                user_id, balance, previous_balance, transaction_amount,
                transaction_type, description, transaction_date
            ) VALUES (?, ?, ?, ?, 'deposit', ?, NOW())
        ");
        $stmt->execute([$userId, $newBalance, $currentBalance, $amount, $description]);
        
        $walletId = $connection->lastInsertId();
        
        $connection->commit();
        
        return [
            'status' => 'success',
            'message' => 'Funds added successfully',
            'new_balance' => $newBalance,
            'transaction_id' => $walletId
        ];
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Deposit error: " . $e->getMessage());
        return ['status' => 'error', 'message' => 'Failed to add funds'];
    }
}

/**
 * Process a payment (deduct funds)
 */
function processPayment($userId, $amount, $orderId, $description) {
    global $connection;
    
    if ($amount <= 0) {
        return ['status' => 'error', 'message' => 'Invalid amount'];
    }
    
    try {
        $connection->beginTransaction();
        
        // Get current balance and check if sufficient
        $currentBalance = getBalance($userId);
        
        if ($currentBalance < $amount) {
            $connection->rollBack();
            return ['status' => 'error', 'message' => 'Insufficient balance'];
        }
        
        $newBalance = $currentBalance - $amount;
        
        // Insert transaction
        $stmt = $connection->prepare("
            INSERT INTO wallets (
                user_id, balance, previous_balance, transaction_amount,
                transaction_type, order_id, description, transaction_date
            ) VALUES (?, ?, ?, ?, 'payment', ?, ?, NOW())
        ");
        $stmt->execute([$userId, $newBalance, $currentBalance, $amount, $orderId, $description]);
        
        $walletId = $connection->lastInsertId();
        
        $connection->commit();
        
        return [
            'status' => 'success',
            'message' => 'Payment processed successfully',
            'new_balance' => $newBalance,
            'transaction_id' => $walletId
        ];
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Payment error: " . $e->getMessage());
        return ['status' => 'error', 'message' => 'Failed to process payment'];
    }
}

/**
 * Process a refund (add funds from refund)
 */
function processRefund($userId, $amount, $refundId, $description) {
    global $connection;
    
    if ($amount <= 0) {
        return ['status' => 'error', 'message' => 'Invalid amount'];
    }
    
    try {
        $connection->beginTransaction();
        
        // Get current balance
        $currentBalance = getBalance($userId);
        $newBalance = $currentBalance + $amount;
        
        // Insert transaction
        $stmt = $connection->prepare("
            INSERT INTO wallets (
                user_id, balance, previous_balance, transaction_amount,
                transaction_type, refund_id, description, transaction_date
            ) VALUES (?, ?, ?, ?, 'refund', ?, ?, NOW())
        ");
        $stmt->execute([$userId, $newBalance, $currentBalance, $amount, $refundId, $description]);
        
        $walletId = $connection->lastInsertId();
        
        $connection->commit();
        
        return [
            'status' => 'success',
            'message' => 'Refund processed successfully',
            'new_balance' => $newBalance,
            'transaction_id' => $walletId
        ];
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Refund error: " . $e->getMessage());
        return ['status' => 'error', 'message' => 'Failed to process refund'];
    }
}

/**
 * Validate if user has sufficient balance for a purchase
 */
function hasSufficientBalance($userId, $amount) {
    $balance = getBalance($userId);
    return $balance >= $amount;
}

// ===== API ENDPOINTS =====
// ONLY execute this code if this file is being called directly as an API
// Check if this file is the main script being executed (not included)
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    header('Content-Type: application/json');
    
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
        exit;
    }
    
    $userId = $_SESSION['user_id'];
    $action = $_POST['action'] ?? $_GET['action'] ?? '';
    
    error_log("Wallet API called with action: " . $action . " for user: " . $userId);
    
    // Check if action is provided
    if (empty($action)) {
        error_log("Wallet API: No action provided");
        echo json_encode(['status' => 'error', 'message' => 'No action specified']);
        exit;
    }
    
    switch ($action) {
        case 'get_balance':
            $balance = getBalance($userId);
            echo json_encode([
                'status' => 'success',
                'balance' => $balance,
                'formatted' => '₱' . number_format($balance, 2)
            ]);
            break;
            
        case 'get_history':
            $history = getTransactionHistory($userId);
            echo json_encode([
                'status' => 'success',
                'data' => $history
            ]);
            break;
            
        case 'deposit':
            // Simulate adding ₱5000 (fixed amount for demo)
            $result = processDeposit($userId, 5000.00, 'Added funds via GCash');
            echo json_encode($result);
            break;
            
        case 'check_balance':
            $amount = floatval($_POST['amount'] ?? 0);
            if ($amount <= 0) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid amount']);
                break;
            }
            
            $hasFunds = hasSufficientBalance($userId, $amount);
            $balance = getBalance($userId);
            
            echo json_encode([
                'status' => 'success',
                'has_sufficient' => $hasFunds,
                'balance' => $balance,
                'formatted_balance' => '₱' . number_format($balance, 2),
                'required' => $amount,
                'formatted_required' => '₱' . number_format($amount, 2)
            ]);
            break;
            
        default:
            error_log("Wallet API: Invalid action - " . $action);
            echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);
            break;
    }
    exit;
}
?>