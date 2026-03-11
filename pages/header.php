<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===== DEFINE PATH PREFIX FIRST =====
// Path detection
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

$is_root = ($current_dir == '/' || $current_dir == '\\' || $current_dir == '.');
$is_pages = strpos($current_dir, '/pages') !== false || strpos($current_dir, '\pages') !== false;

if ($is_root) {
    $pathPrefix = '';
} elseif ($is_pages) {
    $pathPrefix = '../';
} else {
    $depth = substr_count($current_dir, '/') - 1;
    $pathPrefix = str_repeat('../', $depth);
}

// ===== CHECK USER LOGIN STATUS =====
// Check if user is logged in (regular user/customer/seller)
$isUserLoggedIn = isset($_SESSION['user_id']);

// Check if user is a seller AND verified (from session or database)
$isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;
$sellerVerified = isset($_SESSION['seller_verified']) && $_SESSION['seller_verified'] === true;

// Default profile picture (always starts as logo)
$profilePictureUrl = $pathPrefix . 'assets/image/brand/Logo.png';

// If user is logged in, try to get their profile picture from database
if ($isUserLoggedIn && isset($_SESSION['user_id'])) {
    try {
        // Include database and data storage handler
        $database_path = dirname(__FILE__, 2) . '/database/database-connect.php';
        $storage_path = dirname(__FILE__, 2) . '/database/data-storage-handler.php';
        
        if (file_exists($database_path) && file_exists($storage_path)) {
            require_once($database_path);
            require_once($storage_path);
            
            // Fetch user's profile picture
            $stmt = $connection->prepare("SELECT profile_picture FROM users WHERE user_id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Only update if profile picture exists and is not empty
            if ($userData && !empty($userData['profile_picture'])) {
                // Generate URL for profile picture
                if (function_exists('getFileUrl')) {
                    $profilePictureUrl = getFileUrl($userData['profile_picture']);
                } else {
                    // Fallback
                    if (strpos($userData['profile_picture'], 'Crooks-Data-Storage/') === 0) {
                        $profilePictureUrl = $pathPrefix . 'database/data-storage-handler.php?action=serve&path=' . urlencode($userData['profile_picture']);
                    } else {
                        $profilePictureUrl = $pathPrefix . $userData['profile_picture'];
                    }
                }
            }
            // If profile_picture is NULL or empty, $profilePictureUrl remains the default logo
        }
    } catch (Exception $e) {
        error_log("Error fetching profile picture: " . $e->getMessage());
        // On error, keep using the default logo
        $profilePictureUrl = $pathPrefix . 'assets/image/brand/Logo.png';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main site favicon - relative path -->
    <link rel="icon" type="image/x-icon" href="../assets/image/brand/Logo.ico">
    <link rel="shortcut icon" href="../assets/image/brand/Logo.ico">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/sign-out.css">

    <script defer src="<?php echo $pathPrefix; ?>scripts/header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/sign-out.js"></script>
</head>

<body>
    <header class="header-bar no-transition">
        <div class="header-logo">
            <a href="<?php echo $pathPrefix; ?>index.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">

                <!-- ALWAYS SHOW THE PROFILE CIRCLE CONTAINER -->
                <!-- IMAGE INSIDE CHANGES BASED ON LOGIN STATUS -->
                <div class="profile-circle">
                    <img src="<?php echo htmlspecialchars($profilePictureUrl); ?>" alt="Profile"
                        class="profile-circle-image"
                        onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
                </div>

                <div class="title"><span>Crook's</span> Cart <span>Collectives</span></div>
            </a>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <?php if (!$isUserLoggedIn): ?>
                <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
                <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
                <?php else: ?>
                <!-- LOGGED IN USER (CUSTOMER/SELLER) - NO ADMIN LINKS HERE -->
                <?php if ($isSeller && $sellerVerified): ?>
                <!-- LOGGED IN & SELLER (VERIFIED): My Account, Shop, Cart, Orders, Sell -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
                <?php elseif ($isSeller): ?>
                <!-- LOGGED IN & SELLER (PENDING/REJECTED): My Account, Shop, Cart, Orders (NO SELL LINK) -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <?php else: ?>
                <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <?php endif; ?>
                <?php endif; ?>
            </nav>

            <?php if ($isUserLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php else: ?>
            <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if (!$isUserLoggedIn): ?>
        <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
        <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
        <?php else: ?>
        <!-- LOGGED IN USER (CUSTOMER/SELLER) - NO ADMIN LINKS HERE -->
        <?php if ($isSeller && $sellerVerified): ?>
        <!-- LOGGED IN & SELLER (VERIFIED): My Account, Shop, Cart, Orders, Sell -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
        <?php elseif ($isSeller): ?>
        <!-- LOGGED IN & SELLER (PENDING/REJECTED): My Account, Shop, Cart, Orders (NO SELL LINK) -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <?php else: ?>
        <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($isUserLoggedIn): ?>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isUserLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/logoutsvg.svg" alt="Logout"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </div>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="logout-modal-buttons">
                <button id="cancelLogout" class="logout-modal-btn btn-cancel">Cancel</button>
                <button id="confirmLogout" class="logout-modal-btn btn-confirm">Logout</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>