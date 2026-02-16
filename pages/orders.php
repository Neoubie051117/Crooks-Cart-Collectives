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
            <!-- Orders will be loaded via JavaScript -->
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Review Modal -->
    <div id="reviewModal" class="modal hidden">
        <div class="modal-content">
            <h2>Write a Review</h2>
            <form id="reviewForm">
                <input type="hidden" name="order_id" id="reviewOrderId">
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="form-group">
                    <label>Rating</label>
                    <div class="star-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star" data-value="<?= $i ?>">☆</span>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" required>
                </div>

                <div class="form-group">
                    <label for="comment">Comment (optional)</label>
                    <textarea id="comment" name="comment" rows="4" placeholder="Share your experience..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelReview">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/orders.js"></script>
</body>

</html>