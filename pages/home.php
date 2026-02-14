<?php
include_once('header.php');
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header('Location: sign-in.php');
    exit;
}

try {
    $username = $_SESSION['username'];
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        throw new Exception("User not found");
    }
    
    $_SESSION['user_id'] = $user['user_id'];
    
    // Format dates
    $birthdate = new DateTime($user['birthdate']);
    $today = new DateTime();
    $age = $today->diff($birthdate)->y;
    
    // Get first name for welcome message
    $firstName = $user['first_name'];
    
    // Verification status (if applicable)
    $verificationStatus = 'Verified';
    $statusClass = 'status-verified';
    
} catch (Exception $e) {
    error_log("Error fetching user data: " . $e->getMessage());
    $errorMessage = "Unable to load profile data. Please try again later.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Crooks Cart Collectives</title>

    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/central-link-navigation.js"></script>
    <script defer src="../scripts/header.js"></script>
    <script defer src="../scripts/home.js"></script>
</head>

<body>
    <div class="content">
        <?php if(isset($errorMessage)): ?>
        <div class="error-message">
            <?php echo $errorMessage; ?>
        </div>
        <?php else: ?>

        <!-- Profile Section -->
        <div class="profile-section">
            <img src="../assets/image/icons/Formal-Picture.png" alt="Profile Picture" class="formal-picture">
            <div class="welcome-text">Welcome, <?php echo $firstName; ?>!</div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="action-button" id="reportSellerButton">
                <img src="../assets/image/icons/complaint-icon.png" alt="Report" width="40" height="40">
                <span>Report a Seller</span>
            </button>
            <button class="action-button" id="viewProducts">
                <img src="../assets/image/icons/PlaceholderAssetProduct.png" alt="Products" width="40" height="40">
                <span>Browse Products</span>
            </button>
            <button class="action-button" id="viewProfile">
                <img src="../assets/image/icons/Formal-Picture.png" alt="Profile" width="40" height="40">
                <span>My Profile</span>
            </button>
        </div>

        <!-- User Information -->
        <section class="info-section">
            <h2 class="section-title">Account Information</h2>
            <div class="info-grid">
                <div class="info-column">
                    <div class="info-item">
                        <span class="info-label">Full Name:</span>
                        <span
                            class="info-value"><?php echo $user['first_name'] . ' ' . ($user['middle_name'] ?? '') . ' ' . $user['last_name']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo $user['email']; ?></span>
                    </div>
                </div>
                <div class="info-column">
                    <div class="info-item">
                        <span class="info-label">Username:</span>
                        <span class="info-value"><?php echo $user['username']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Contact:</span>
                        <span class="info-value"><?php echo $user['contact_number']; ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Account Actions -->
        <section class="actions-section">
            <h2 class="section-title">Account Actions</h2>
            <div class="action-buttons">
                <button class="account-button" onclick="window.location.href='customer-profile.php'">
                    <span>Edit Profile</span>
                </button>
                <button class="account-button" onclick="window.location.href='products.php'">
                    <span>Start Shopping</span>
                </button>
                <button class="account-button" onclick="window.location.href='seller-fill-form.php'">
                    <span>Become a Seller</span>
                </button>
            </div>
        </section>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.getElementById('reportSellerButton')?.addEventListener('click', function() {
        window.location.href = 'report-seller.php';
    });

    document.getElementById('viewProducts')?.addEventListener('click', function() {
        window.location.href = 'products.php';
    });

    document.getElementById('viewProfile')?.addEventListener('click', function() {
        window.location.href = 'customer-profile.php';
    });
    </script>
</body>

</html>