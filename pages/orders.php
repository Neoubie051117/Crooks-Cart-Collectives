<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <h1 class="page-title">My Orders</h1>
        <div id="ordersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Review Modal -->
    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FF8246" stroke-width="2">
                    <path
                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
            </div>
            <h2 class="modal-title">Write a Review</h2>
            <form id="reviewForm">
                <input type="hidden" name="order_item_id" id="reviewOrderItemId">
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="form-group">
                    <label class="form-label">Rating *</label>
                    <div class="star-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star" data-value="<?= $i ?>">☆</span>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" required>
                </div>

                <div class="form-group">
                    <label for="comment" class="form-label">Review</label>
                    <textarea id="comment" name="comment" class="form-textarea" rows="3"
                        placeholder="Share your experience..."></textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" id="cancelReview" class="modal-btn modal-btn-cancel">Cancel</button>
                    <button type="submit" class="modal-btn modal-btn-confirm">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FF8246" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="15" y1="9" x2="9" y2="15" />
                    <line x1="9" y1="9" x2="15" y2="15" />
                </svg>
            </div>
            <h2 class="modal-title">Cancel Item</h2>
            <p class="modal-message">Are you sure you want to cancel this item?</p>
            <div class="modal-actions">
                <button id="cancelCancel" class="modal-btn modal-btn-cancel">Keep</button>
                <button id="confirmCancel" class="modal-btn modal-btn-confirm">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FF8246" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    <script src="../scripts/orders.js"></script>
</body>

</html>