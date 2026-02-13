<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

// Check if already a seller
$stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
if ($stmt->fetch()) {
    header('Location: seller-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Seller</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-registration.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <?php include_once('header.php'); ?>
</head>

<body>
    <div class="content">
        <div class="pageTitleHeader">Seller Registration</div>

        <form id="sellerForm" class="seller-container" enctype="multipart/form-data">
            <div class="form-section">
                <h3>Business Information</h3>

                <div class="form-group">
                    <label for="business_name">Business Name (Optional)</label>
                    <input type="text" id="business_name" name="business_name"
                        placeholder="If different from your name">
                </div>

                <div class="form-group">
                    <label for="valid_id">Valid Government ID*</label>
                    <input type="file" id="valid_id" name="valid_id" accept="image/*,.pdf" required>
                    <p class="help-text">Upload a clear photo of your government-issued ID</p>
                </div>
            </div>

            <div class="form-section">
                <h3>Agreement</h3>

                <div class="agreement-box">
                    <p>By registering as a seller, you agree to:</p>
                    <ul>
                        <li>Provide accurate product information</li>
                        <li>Maintain fair pricing</li>
                        <li>Process orders within 2 business days</li>
                        <li>Provide customer support</li>
                        <li>Follow platform policies</li>
                    </ul>

                    <label class="checkbox">
                        <input type="checkbox" id="agree_terms" required>
                        <span>I agree to the Terms and Conditions</span>
                    </label>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Apply as Seller</button>
                <a href="customer-dashboard.php" class="btn btn-secondary">Cancel</a>
            </div>

            <input type="hidden" name="action" value="become_seller">
        </form>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.getElementById('sellerForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const response = await fetch('../database/profile-handler.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === 'success') {
            alert(result.message);
            window.location.href = 'seller-dashboard.php';
        } else {
            alert('Error: ' + result.message);
        }
    });
    </script>
</body>

</html>