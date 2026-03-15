<?php
session_start();
require_once('../database/database-connect.php');

// Include wallet handler functions
require_once('../database/wallet-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Get or create wallet
$wallet = getOrCreateWallet($userId);
$balance = $wallet ? $wallet['balance'] : 0;
$transactionHistory = getTransactionHistory($userId);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wallet - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/wallet.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/wallet.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>My Wallet</h1>
        </div>

        <!-- Balance Card -->
        <div class="balance-card">
            <div class="balance-header">
                <div class="balance-icon">
                    <img src="../assets/image/icons/chart-line-up.svg" alt="Wallet">
                </div>
                <h2>Current Balance</h2>
            </div>
            <div class="balance-amount">₱<?php echo number_format($balance, 2); ?></div>
            <div class="balance-actions">
                <button class="btn btn-primary" id="addFundsBtn">
                    <img src="../assets/image/icons/add.svg" alt="Add" class="btn-icon">
                    Add Funds
                </button>
            </div>
        </div>

        <!-- Add Funds Modal -->
        <div id="addFundsModal" class="modal" style="display: none;">
            <div class="modal-content">
                <h2>Add Funds to Wallet</h2>
                <div class="qr-code-container">
                    <img src="../assets/image/payment/gcash-qr.png" alt="GCash QR Code" class="qr-code-image"
                        onerror="this.onerror=null; this.src='../assets/image/payment/QR.jpg';">
                </div>
                <!-- <p class="amount-display">Amount: <span class="amount-highlight">₱5,000.00</span></p> -->
                <p class="qr-instruction">Scan the QR code to add funds into your wallet.</p>
                <div class="modal-actions">
                    <button class="btn btn-secondary" id="cancelAddFunds">Cancel</button>
                    <button class="btn btn-primary" id="confirmAddFunds">
                        <span class="btn-text">Confirm</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="transaction-section">
            <h2>Transaction History</h2>

            <?php if (empty($transactionHistory)): ?>
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/time-update.svg" alt="No transactions" class="empty-state-icon">
                    <h3>No Transactions Yet</h3>
                    <p>Your transaction history will appear here once you add funds or make payments.</p>
                </div>
            </div>
            <?php else: ?>
            <div class="transaction-list">
                <?php foreach ($transactionHistory as $transaction): 
                    $type = $transaction['transaction_type'];
                    $amount = $transaction['transaction_amount'];
                    $balanceAfter = $transaction['balance'];
                    $date = date('M j, Y g:i A', strtotime($transaction['transaction_date']));
                    
                    // Determine icon and styling based on transaction type
                    $iconFile = 'time-update.svg';
                    $typeClass = '';
                    $amountClass = '';
                    $amountPrefix = '+';
                    
                    switch($type) {
                        case 'deposit':
                            $iconFile = 'add.svg';
                            $typeClass = 'deposit';
                            $amountClass = 'positive';
                            $amountPrefix = '+';
                            break;
                        case 'refund':
                            $iconFile = 'update.svg';
                            $typeClass = 'refund';
                            $amountClass = 'positive';
                            $amountPrefix = '+';
                            break;
                        case 'payment':
                            $iconFile = 'cart-shopping.svg';
                            $typeClass = 'payment';
                            $amountClass = 'negative';
                            $amountPrefix = '-';
                            break;
                        case 'initial':
                            $iconFile = 'verified-empty.svg';
                            $typeClass = 'initial';
                            $amountClass = 'neutral';
                            $amountPrefix = '';
                            break;
                    }
                ?>
                <div class="transaction-item <?php echo $typeClass; ?>">
                    <div class="transaction-icon">
                        <img src="../assets/image/icons/<?php echo $iconFile; ?>" alt="<?php echo $type; ?>">
                    </div>
                    <div class="transaction-details">
                        <div class="transaction-header">
                            <span class="transaction-type"><?php echo ucfirst($type); ?></span>
                            <span class="transaction-amount <?php echo $amountClass; ?>">
                                <?php echo $amountPrefix . ' ₱' . number_format($amount, 2); ?>
                            </span>
                        </div>
                        <div class="transaction-description">
                            <?php echo htmlspecialchars($transaction['description']); ?></div>
                        <div class="transaction-footer">
                            <span class="transaction-date"><?php echo $date; ?></span>
                            <span class="transaction-balance">Balance:
                                ₱<?php echo number_format($balanceAfter, 2); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Confirmation Modal for Add Funds -->
    <div id="confirmationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/add.svg" alt="Confirm">
            </div>
            <h3 class="modal-title">Confirm Add Funds</h3>
            <p class="modal-message">Are you sure you want to add ₱5,000 to your wallet?</p>
            <div class="modal-actions">
                <button class="btn btn-secondary" id="cancelConfirm">Cancel</button>
                <button class="btn btn-primary" id="confirmAdd">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="btn btn-primary" id="notificationClose">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>