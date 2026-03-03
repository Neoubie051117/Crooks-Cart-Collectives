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
$is_database = strpos($current_dir, '/database') !== false;

// Calculate correct path prefix based on current location
if ($is_includes || $is_pages || $is_database) {
    // If we're in includes/, pages/, or database/ directory, go up one level
    $pathPrefix = '../';
} else {
    // We're in the admin root
    $pathPrefix = '';
}

// Get admin info for profile display
$adminName = '';
$adminProfilePic = $pathPrefix . 'assets/image/icons/user-profile-circle.svg';

// ===== FIXED: Load admin profile picture from database and handle external storage =====
if ($isAdminLoggedIn && isset($_SESSION['admin_id'])) {
    $adminId = $_SESSION['admin_id'];
    $adminFirstName = $_SESSION['admin_first_name'] ?? '';
    $adminLastName = $_SESSION['admin_last_name'] ?? '';
    $adminName = trim($adminFirstName . ' ' . $adminLastName);
    
    // If name is empty or we need to fetch profile picture, try to fetch from database
    if (empty($adminName) || $adminName === ' ' || !isset($_SESSION['admin_profile_picture'])) {
        try {
            // Include database connection
            require_once(dirname(__FILE__) . '/../database/admin-database-connect.php');
            
            // Fetch admin data including profile picture
            $stmt = $connection->prepare("SELECT first_name, last_name, profile_picture FROM administrators WHERE admin_id = ?");
            $stmt->execute([$adminId]);
            $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($adminData) {
                $adminName = trim(($adminData['first_name'] ?? '') . ' ' . ($adminData['last_name'] ?? ''));
                
                // Store in session for future use
                $_SESSION['admin_first_name'] = $adminData['first_name'] ?? '';
                $_SESSION['admin_last_name'] = $adminData['last_name'] ?? '';
                
                // Handle profile picture - store the path in session
                if (!empty($adminData['profile_picture'])) {
                    $_SESSION['admin_profile_picture'] = $adminData['profile_picture'];
                    
                    // ===== FIXED: Handle external storage path =====
                    // The profile_picture path is stored as: "Crooks-Data-Storage/administrators/1/profile/profile.jpg"
                    $profilePath = $adminData['profile_picture'];
                    
                    // Check if it's an external storage path (starts with Crooks-Data-Storage/)
                    if (strpos($profilePath, 'Crooks-Data-Storage/') === 0) {
                        // Use the admin-data-storage-handler.php to serve the file
                        // The handler is at: ../database/admin-data-storage-handler.php
                        $adminProfilePic = $pathPrefix . 'database/admin-data-storage-handler.php?action=serve&path=' . urlencode($profilePath);
                    } else {
                        // It's a relative path within the project
                        $adminProfilePic = $pathPrefix . $profilePath;
                    }
                }
            }
        } catch (Exception $e) {
            error_log("Error fetching admin data in header: " . $e->getMessage());
        }
    } else {
        // Use session data if available
        if (isset($_SESSION['admin_profile_picture']) && !empty($_SESSION['admin_profile_picture'])) {
            $profilePath = $_SESSION['admin_profile_picture'];
            
            // ===== FIXED: Handle external storage path =====
            if (strpos($profilePath, 'Crooks-Data-Storage/') === 0) {
                // Use the admin-data-storage-handler.php to serve the file
                $adminProfilePic = $pathPrefix . 'database/admin-data-storage-handler.php?action=serve&path=' . urlencode($profilePath);
            } else {
                // It's a relative path within the project
                $adminProfilePic = $pathPrefix . $profilePath;
            }
        }
    }
}

// ===== FIXED: Consistent logo link for all pages =====
// For logged-in users, always link to dashboard
// For logged-out users, always link to admin-index.php
$logoLink = $pathPrefix;
if ($isAdminLoggedIn) {
    $logoLink .= 'pages/admin-dashboard.php';
} else {
    $logoLink .= 'admin-index.php';
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
            <!-- Show profile picture and admin name - FIXED: Consistent logo link -->
            <a href="<?php echo $logoLink; ?>" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <div class="admin-profile-mini">
                    <img src="<?php echo $adminProfilePic; ?>" alt="Admin" class="admin-avatar" onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/user-profile-circle.svg'; 
                                 console.log('Failed to load profile image: ' + this.src);">
                </div>
                <div class="title">
                    <span>Admin</span> Panel
                    <?php if (!empty($adminName)): ?>
                    <span class="admin-name">(<?php echo htmlspecialchars($adminName); ?>)</span>
                    <?php endif; ?>
                </div>
            </a>
            <?php else: ?>
            <!-- Show logo for non-logged in visitors - FIXED: Consistent logo link -->
            <a href="<?php echo $logoLink; ?>" class="logo-link"
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
                <button id="cancelLogout" class="logout-modal-btn btn-cancel"
                    style="background: #000000; color: #ffffff;">Cancel</button>
                <button id="confirmLogout" class="logout-modal-btn btn-confirm">Logout</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>