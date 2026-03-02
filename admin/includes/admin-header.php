<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
$isAdminLoggedIn = isset($_SESSION['admin_id']);

// Path detection
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

// Check if we're in a subdirectory
$is_includes = strpos($current_dir, '/includes') !== false;
$is_pages = strpos($current_dir, '/pages') !== false;

if ($is_includes) {
    $pathPrefix = '../';
} elseif ($is_pages) {
    $pathPrefix = '../';
} else {
    $pathPrefix = '';
}

// Get admin info for profile display
$adminName = '';
$adminProfilePic = $pathPrefix . 'assets/image/icons/user-profile-circle.svg';

if ($isAdminLoggedIn && isset($_SESSION['admin_first_name'])) {
    $adminName = $_SESSION['admin_first_name'] . ' ' . ($_SESSION['admin_last_name'] ?? '');
    
    // Get profile picture from session or database
    if (isset($_SESSION['admin_profile_picture']) && !empty($_SESSION['admin_profile_picture'])) {
        // Include the data storage handler to use the function
        require_once(dirname(__FILE__) . '/../database/admin-data-storage-handler.php');
        
        // Check if the function exists before calling it
        if (function_exists('getAdminProfilePictureUrl')) {
            $adminProfilePic = getAdminProfilePictureUrl($_SESSION['admin_profile_picture']);
        } else {
            // Fallback if function doesn't exist
            $adminProfilePic = '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($_SESSION['admin_profile_picture']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-sign-out.css">

    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-sign-out.js"></script>
</head>

<body>
    <header class="header-bar no-transition">
        <div class="header-logo">
            <?php if ($isAdminLoggedIn): ?>
            <!-- Show profile picture and admin name -->
            <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <div class="admin-profile-mini">
                    <img src="<?php echo $adminProfilePic; ?>" alt="Admin" class="admin-avatar"
                        onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/user-profile-circle.svg';">
                </div>
                <div class="title">
                    <span>Admin</span> Panel
                    <?php if (!empty($adminName)): ?>
                    <span class="admin-name">(<?php echo htmlspecialchars($adminName); ?>)</span>
                    <?php endif; ?>
                </div>
            </a>
            <?php else: ?>
            <!-- Show logo for non-logged in visitors -->
            <a href="<?php echo $pathPrefix; ?>admin-index.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <img id="logo" src="<?php echo $pathPrefix; ?>assets/image/brand/Logo.png" alt="Logo"
                    style="height: 40px; width: auto;">
                <div class="title"><span>Admin</span> Panel</div>
            </a>
            <?php endif; ?>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <?php if ($isAdminLoggedIn): ?>
                <!-- Logged in admin navigation - DESKTOP -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
                <?php else: ?>
                <!-- Not logged in - show sign in link -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="nav-link">SIGN IN</a>
                <?php endif; ?>
            </nav>

            <?php if ($isAdminLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if ($isAdminLoggedIn): ?>
        <!-- Mobile navigation for logged in admin -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <!-- Mobile navigation for not logged in -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isAdminLoggedIn): ?>
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