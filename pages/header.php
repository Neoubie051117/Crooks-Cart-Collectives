<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Force check if session is valid
$isLoggedIn = isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);

// Path detection (keep your existing path detection code)
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <img id="logo" src="<?php echo $pathPrefix; ?>assets/image/brand/Logo.png" alt="Logo"
                    style="height: 40px; width: auto;">
                <div class="title"><span>Crook's</span> Cart <span>Collectives</span></div>
            </a>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
                <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>

                <?php if ($isLoggedIn): ?>
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/customer-profile.php" class="nav-link">PROFILE</a>
                <?php endif; ?>

                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
            </nav>

            <?php if ($isLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php else: ?>
            <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
        <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>

        <?php if ($isLoggedIn): ?>
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/customer-profile.php" class="nav-link">PROFILE</a>
        <?php endif; ?>

        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>

        <?php if ($isLoggedIn): ?>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>

        <?php if ($isLoggedIn): ?>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="cart-icon-link"
            style="position: relative; margin-right: 15px;">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/cart-icon.svg" alt="Cart"
                style="height: 24px; width: auto;">
            <span id="cartCount" class="cart-count"
                style="position: absolute; top: -8px; right: -8px; background: #FF8246; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; display: none;">0</span>
        </a>
        <?php endif; ?>
    </nav>

    <?php if ($isLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="#FF8246" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');

        if (menuButton && mobileNav) {
            const toggleMenu = () => {
                mobileNav.classList.toggle('open');
                menuButton.classList.toggle('active');
                document.body.style.overflow = mobileNav.classList.contains('open') ? 'hidden' : '';
            };

            menuButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleMenu();
            });

            document.addEventListener('click', function(event) {
                if (mobileNav.classList.contains('open') &&
                    !mobileNav.contains(event.target) &&
                    !menuButton.contains(event.target)) {
                    toggleMenu();
                }
            });

            mobileNav.querySelectorAll('a').forEach(function(link) {
                link.addEventListener('click', function() {
                    if (mobileNav.classList.contains('open')) {
                        toggleMenu();
                    }
                });
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileNav.classList.contains('open')) {
                    toggleMenu();
                }
            });
        }

        // Highlight active link
        const currentPage = '<?php echo $current_page; ?>';
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href) {
                const filename = href.split('/').pop();
                if (filename === currentPage ||
                    (currentPage === 'index.php' && filename === 'index.php')) {
                    link.classList.add('active');
                }
            }
        });
    });

    // Function to update cart count
    async function updateCartCount() {
        if (!document.getElementById('cartCount')) return;
        try {
            const response = await fetch('../database/cart-handler.php?action=get_count');
            const data = await response.json();
            const countEl = document.getElementById('cartCount');
            if (data.count > 0) {
                countEl.textContent = data.count;
                countEl.style.display = 'inline';
            } else {
                countEl.style.display = 'none';
            }
        } catch (e) {
            console.error('Failed to fetch cart count', e);
        }
    }

    // Call on page load if user is logged in
    <?php if ($isLoggedIn): ?>
    updateCartCount();
    <?php endif; ?>
    </script>
</body>

</html>