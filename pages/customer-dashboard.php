<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch seller status from database
$sellerData = null;
$isSeller = false;
$sellerStatus = null; // 'pending', 'rejected', 'verified', or null if not applied

try {
    $stmt = $connection->prepare("SELECT seller_id, is_verified FROM sellers WHERE user_id = ?");
    $stmt->execute([$userId]);
    $sellerData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($sellerData) {
        $isSeller = true;
        $sellerStatus = $sellerData['is_verified']; // 'pending', 'rejected', 'verified'
        
        // Update session to match database
        $_SESSION['is_seller'] = true;
        $_SESSION['seller_id'] = $sellerData['seller_id'];
        $_SESSION['seller_verified'] = ($sellerData['is_verified'] === 'verified');
    } else {
        // Clear seller session flags if user is not a seller in database
        unset($_SESSION['is_seller']);
        unset($_SESSION['seller_id']);
        unset($_SESSION['seller_verified']);
        $isSeller = false;
        $sellerStatus = null;
    }
} catch (PDOException $e) {
    error_log("Error checking seller status: " . $e->getMessage());
    $sellerStatus = null;
}

try {
    $stmt = $connection->prepare("SELECT first_name FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userData && isset($userData['first_name'])) {
        $firstName = $userData['first_name'];
    } else {
        $firstName = "Customer";
    }
} catch (PDOException $e) {
    error_log("Error fetching user: " . $e->getMessage());
    $firstName = "Customer";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/customer-dashboard.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .dashboard-card {
        position: relative;
        padding-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .card-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 12px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover .card-icon img {
        transform: scale(1.1);
    }

    /* Seller status card styles */
    .seller-status-card {
        background: #f9f9f9;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin: 10px 0;
        text-transform: uppercase;
    }

    .status-badge.pending {
        background: #000000;
        color: #ffffff;
    }

    .status-badge.rejected {
        background: #000000;
        color: #ffffff;
    }

    .status-badge.verified {
        background: #FF8246;
        color: #000000;
    }

    .status-message {
        color: #666666;
        font-size: 0.9rem;
        margin-bottom: 15px;
        line-height: 1.5;
        padding: 0 10px;
    }

    .btn-primary[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
        background: #cccccc;
        color: #666666;
    }

    .btn-primary[disabled]:hover {
        transform: none;
        box-shadow: none;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage your account, track orders, and discover amazing products from our community.</p>
        </div>

        <div class="dashboard-grid">
            <!-- Your Profile Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/profile.svg" alt="Profile">
                </div>
                <h3>Your Profile</h3>
                <p>Keep your personal information and contact details up to date</p>
                <a href="customer-profile.php" class="btn-primary">View Profile</a>
            </div>

            <?php if (!$isSeller): ?>
            <!-- SELLER CARD: Not applied yet -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/fill-form.svg" alt="Become a seller">
                </div>
                <h3>Become a Seller</h3>
                <p>Start your entrepreneurial journey with our community</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
            </div>
            <?php elseif ($sellerStatus === 'pending'): ?>
            <!-- SELLER CARD: Applied but pending -->
            <div class="dashboard-card seller-status-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/time-update.svg" alt="Pending verification">
                </div>
                <h3>Seller Application</h3>
                <div class="status-badge pending">Pending</div>
                <p class="status-message">Wait for your application form to be verified by our management</p>
                <a href="#" class="btn-primary" disabled style="pointer-events: none; opacity: 0.5;">Pending</a>
            </div>
            <?php elseif ($sellerStatus === 'rejected'): ?>
            <!-- SELLER CARD: Rejected -->
            <div class="dashboard-card seller-status-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cancel.svg" alt="Application rejected">
                </div>
                <h3>Seller Application</h3>
                <div class="status-badge rejected">Rejected</div>
                <p class="status-message">Your application is rejected</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Again</a>
            </div>
            <?php elseif ($sellerStatus === 'verified'): ?>
            <!-- SELLER CARD: Verified -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/fill-form.svg" alt="Seller dashboard">
                </div>
                <h3>Selling Dashboard</h3>
                <p>Manage your products, view orders, and track your sales</p>
                <a href="seller-dashboard.php" class="btn-primary">Manage</a>
            </div>
            <?php endif; ?>

            <!-- About Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/about-empty.svg" alt="About us">
                </div>
                <h3>About Us</h3>
                <p>Learn about our project, mission, and the development team</p>
                <a href="about.php" class="btn-primary">About Page</a>
            </div>

            <!-- Contact Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/contact-us-empty.svg" alt="Contact us">
                </div>
                <h3>Contact Us</h3>
                <p>Get in touch with our team for questions or feedback</p>
                <a href="contact.php" class="btn-primary">Contact Page</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>