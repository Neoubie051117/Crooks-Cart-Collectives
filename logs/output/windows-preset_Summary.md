# Web Project: Crooks-Cart-Collectives

**Preset:** windows-preset

**Generated:** 2026-03-02 19:37:22

---

## File: `Crooks-Cart-Collectives/logs/requirement/Instructions.md`

**Status:** `FOUND`

```markdown
# ⚠️ CRITICAL: AI INSTRUCTION ENFORCEMENT ⚠️

## 🔴 ABSOLUTE MANDATORY RULES - DO NOT IGNORE 🔴

**YOU MUST FOLLOW THESE RULES EXACTLY. NO EXCEPTIONS. NO DEVIATIONS.**

---

### RULE 001: REVIEW BEFORE CHANGING
- You MUST review ALL provided files completely before making ANY changes
- Read through the entire context first
- Understand the full project structure before modifying anything
- **FAILURE TO REVIEW FIRST = IGNORING INSTRUCTIONS**

---

### RULE 002: NO EMOJIS - STRICTLY FORBIDDEN
- **YOU ARE ABSOLUTELY FORBIDDEN FROM USING ANY EMOJIS IN CODE, COMMENTS, OR OUTPUT**
- This includes: 😊 🎉 ✅ ❌ ⚠️ 🔴 🟢 🔵 💰 📦 👤 📅 📋 ✗ ✓ • or ANY other emoji
- Use only plain text characters: letters, numbers, and standard punctuation
- Use simple bullet points like "-" or "*" if needed
- **VIOLATION: Adding ANY emoji = FAILURE TO FOLLOW INSTRUCTIONS**

---

### RULE 003: STRICT COLOR PALETTE - ONLY THREE COLORS ALLOWED
- **COLORS PERMITTED:** White (#FFFFFF), Orange (#FF8246), and Black (#000000)
- **NO OTHER COLORS WHATSOEVER** - This means:
  - NO blues, greens, reds, yellows, purples, grays (except black/white)
  - NO #28a745 (green), NO #dc3545 (red), NO #007bff (blue)
  - NO rgba() with colors outside white/orange/black
  - NO gradients using other colors
- Backgrounds must be white, black, or orange only
- Text must be black on light backgrounds, white on dark backgrounds
- Borders must be black or orange only
- **VIOLATION: Using ANY color outside white/orange/black = FAILURE**

---

### RULE 004: MODIFY ONLY REQUESTED FILES
- Change ONLY the files explicitly mentioned in the request
- If told "revise seller orders js and css" - ONLY change those two files
- Do NOT touch other JavaScript files, CSS files, PHP files, or HTML
- Do NOT add new files
- Do NOT modify file structure
- **VIOLATION: Changing unrequested files = FAILURE**

---

### RULE 005: REWRITE ENTIRE FILES - NO SNIPPETS
- When modifying a file, you MUST output the COMPLETE file content
- Do NOT send partial code snippets or diffs
- The entire file must be shown from start to end
- Include ALL original code plus your changes
- **VIOLATION: Sending snippets instead of full files = FAILURE**

---

### RULE 006: FILE PATH FORMAT - STRICT REQUIREMENT
- When outputting any file, you MUST start with:

- Example: /Crooks-Cart-Collectives/scripts/seller-orders.js
- Then immediately follow with the file content in a code block
- **VIOLATION: Missing or incorrect file path format = FAILURE**

---

### RULE 007: USE EXISTING SVG ICONS ONLY
- NEVER create or hardcode vector icons
- ONLY use SVG files from `/assets/image/icons/`
- Do NOT edit SVG files directly
- Apply orange color to SVGs using CSS filters or root variables
- For hover effects: ONLY simple icon scaling on divs or cards
- NO animations that move cards up/down
- **VIOLATION: Creating new icons or using non-existent icons = FAILURE**

---

### RULE 008: PLAIN TEXT PASSWORDS FOR DEMO
- Passwords MUST be stored as plain text
- NO password hashing implementation
- NO suggesting hashing in comments
- This is intentional for demo purposes
- **VIOLATION: Implementing or suggesting hashing = FAILURE**

---

### RULE 009: ORDER STATUSES - EXACTLY THREE
- Only three statuses allowed: `pending`, `cancelled`, `delivered`
- NO additional statuses like "processing", "shipped", "completed"
- NO tracking simulation
- **VIOLATION: Adding extra statuses = FAILURE**

---

### RULE 010: SIMPLE ERROR MESSAGES ONLY
- User interface errors: ONLY simple messages like "Invalid credentials. Please try again."
- Detailed errors go ONLY to `/database/error_log.txt`
- NO exposing system details to users
- **VIOLATION: Exposing system errors to users = FAILURE**

---

### RULE 011: DO NOT ADD EXTRA FEATURES
- Implement ONLY what is explicitly requested
- If you notice something that needs improvement but wasn't requested:
- Mention it as a suggestion in a comment
- Do NOT implement it without permission
- **VIOLATION: Adding unrequested features = FAILURE**

---

## 📋 CURRENT REQUEST (COPY THIS TO YOUR CONTEXT)


---

## ✅ CHECKLIST - VERIFY BEFORE SUBMITTING

Before you output your response, verify ALL of these:

- [ ] Did I review ALL files before changing?
- [ ] Am I ONLY modifying `/scripts/seller-orders.js` and `/styles/seller-orders.css`?
- [ ] Did I remove ALL emojis from code and comments?
- [ ] Did I use ONLY white, orange (#FF8246), and black colors?
- [ ] Did I output COMPLETE files, not snippets?
- [ ] Did I include the correct file paths in ## format?
- [ ] Did I use ONLY existing SVG icons?
- [ ] Did I avoid adding any new features?

**If ANY checkbox is unchecked, STOP and fix it.**

---

## ⚡ AI REMINDER - READ THIS EVERY TIME ⚡


---

## 📌 SUMMARY OF THIS REQUEST

| Aspect | Requirement |
|--------|-------------|
| Files to modify | `/scripts/seller-orders.js` and `/styles/seller-orders.css` ONLY |
| Colors allowed | White (#FFFFFF), Orange (#FF8246), Black (#000000) ONLY |
| Emojis | ABSOLUTELY FORBIDDEN |
| Event text | Fix inconsistent sizing, prevent incomplete sentences |
| Event separation | Make each event a separate statement (customer order, seller sold) |
| Column depth | Balance colors for more visual depth |

---

**FAILURE TO FOLLOW ANY OF THESE RULES = INCOMPLETE RESPONSE**

**YOU HAVE BEEN WARNED.**
```

---

## File: `Crooks-Cart-Collectives/logs/output/Project_Structure.md`

**Status:** `FOUND`

```markdown
# Web Project Structure

**Project:** Crooks-Cart-Collectives
**Generated:** 2026-03-02 19:37:20
**Mode:** all

```
Crooks-Cart-Collectives/
│
├── assets/
│   └── image/
│       ├── brand/
│       │   └── Logo.png
│       ├── icons/
│       │   ├── about-empty.svg
│       │   ├── about-filled.svg
│       │   ├── add-circle-empty.svg
│       │   ├── add-to-queue.svg
│       │   ├── add.svg
│       │   ├── building.svg
│       │   ├── cancel.svg
│       │   ├── cart-arrow-downsvg.svg
│       │   ├── cart-arrow-up.svg
│       │   ├── cart-plus.svg
│       │   ├── cart-shopping-fast.svg
│       │   ├── cart-shopping.svg
│       │   ├── chart-line-up.svg
│       │   ├── community-general.svg
│       │   ├── complaint-icon.png
│       │   ├── contact-us-empty.svg
│       │   ├── contact-us-filled.svg
│       │   ├── edit.svg
│       │   ├── facebook.svg
│       │   ├── fill-form.svg
│       │   ├── github.svg
│       │   ├── hamburger-menu.svg
│       │   ├── instagram.svg
│       │   ├── logoutsvg.svg
│       │   ├── mail.svg
│       │   ├── order.svg
│       │   ├── package.svg
│       │   ├── password-hide.svg
│       │   ├── password-unhide.svg
│       │   ├── people-team.svg
│       │   ├── profile.svg
│       │   ├── reset.svg
│       │   ├── save-empty.svg
│       │   ├── save-filled.svg
│       │   ├── seller-product-placeholder.png
│       │   ├── Showcase1.png
│       │   ├── Showcase2.png
│       │   ├── star-empty.svg
│       │   ├── star-filled.svg
│       │   ├── submit-picture-icon.png
│       │   ├── submit-valid-id-icon.png
│       │   ├── time-update.svg
│       │   ├── trash.svg
│       │   ├── update.svg
│       │   ├── updatesvg.svg
│       │   ├── user-profile-circle.svg
│       │   ├── verified-empty.svg
│       │   ├── verified-filled.svg
│       │   └── youtube.svg
│       ├── team/
│       │   ├── charles-canoneo.png
│       │   ├── christian-adviento.png
│       │   ├── christian-mendoza.png
│       │   ├── clark-mallo.jpg
│       │   ├── clark-mallo.png
│       │   ├── kishiekel-fernandez.png
│       │   ├── lance-madelar.png
│       │   ├── rylle-bernardino.png
│       │   └── william-aranez.png
│       └── Logo.png
├── database/
│   ├── schema/
│   │   ├── dbCreation.sql
│   │   ├── dummyAdmin.sql
│   │   ├── dummySeller.sql
│   │   └── dummyUser.sql
│   ├── cart-handler.php
│   ├── checkout-handler.php
│   ├── customer-profile-handler.php
│   ├── data-storage-handler.php
│   ├── database-connect.php
│   ├── error_log.txt
│   ├── order-handler.php
│   ├── product-handler.php
│   ├── report-seller-handler.php
│   ├── review-handler.php
│   ├── seller-fill-form-handler.php
│   ├── seller-new-product-handler.php
│   ├── sign-in-handler.php
│   ├── sign-out-handler.php
│   ├── sign-up-handler.php
│   └── validation.php
├── logs/
│   ├── content-fetcher-configuration/
│   │   ├── linux-path.py
│   │   └── windows-preset.py
│   ├── output/
│   │   ├── 0.0.17.md
│   │   ├── linux-path_Summary.md
│   │   ├── Project_Structure.md
│   │   └── windows-preset_Summary.md
│   ├── requirement/
│   │   ├── Apply Tree map.md
│   │   └── Instructions.md
│   ├── content-fetcher.py
│   ├── runner.bat
│   ├── runner.sh
│   └── tree-mapper.py
├── pages/
│   ├── about.php
│   ├── cart.php
│   ├── checkout.php
│   ├── contact.php
│   ├── customer-dashboard.php
│   ├── customer-profile.php
│   ├── footer.php
│   ├── header.php
│   ├── orders.php
│   ├── privacy-policy.php
│   ├── product-detail.php
│   ├── product.php
│   ├── report-seller.php
│   ├── seller-dashboard.php
│   ├── seller-fill-form.php
│   ├── seller-manage-product.php
│   ├── seller-new-product.php
│   ├── seller-process-order.php
│   ├── sign-in.php
│   ├── sign-up.php
│   └── terms-and-conditions.php
├── scripts/
│   ├── cart.js
│   ├── checkout.js
│   ├── contact.js
│   ├── customer-profile.js
│   ├── error-handler.js
│   ├── header.js
│   ├── index.js
│   ├── orders.js
│   ├── product-detail.js
│   ├── product.js
│   ├── report-seller.js
│   ├── seller-dashboard.js
│   ├── seller-fill-form.js
│   ├── seller-manage-product.js
│   ├── seller-new-product.js
│   ├── seller-process-order.js
│   ├── showcase-slider.js
│   ├── sign-in.js
│   ├── sign-out.js
│   └── sign-up.js
├── styles/
│   ├── about.css
│   ├── cart.css
│   ├── checkout.css
│   ├── contact.css
│   ├── customer-dashboard.css
│   ├── footer.css
│   ├── header.css
│   ├── index.css
│   ├── orders.css
│   ├── privacy-policy.css
│   ├── product-detail.css
│   ├── product.css
│   ├── profile.css
│   ├── report-seller.css
│   ├── seller-dashboard.css
│   ├── seller-manage-product.css
│   ├── seller-new-product.css
│   ├── seller-process-order.css
│   ├── seller-registration.css
│   ├── sign-in.css
│   ├── sign-out.css
│   ├── sign-up.css
│   └── terms-and-conditions.css
├── .gitignore
├── index.php
├── LICENSE
└── README.md
```

## Summary

| File Type | Count |
|-----------|-------|
| HTML Files | 0 |
| PHP Files | 37 |
| CSS Files | 23 |
| JavaScript Files | 20 |
| JSON Files | 0 |
| Text/Markdown | 8 |
| Image Files | 60 |
| Other Files | 12 |

**Total Directories:** 14
**Total Files:** 159

---

*Generated by Web Project Tree Mapper*
*Script: tree-mapper.py*
```

---

## File: `Crooks-Cart-Collectives/index.php`

**Status:** `FOUND`

```php
<?php
// Crooks-Cart-Collectives/index.php
// FIXED VERSION - Fixed image fetching for featured products
?>
<?php
session_start();
require_once('database/database-connect.php');
require_once('database/data-storage-handler.php');

// Fetch featured products
$featured_products = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY RAND() 
        LIMIT 5
    ");
    $stmt->execute();
    $featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching featured products: " . $e->getMessage());
}

// Helper function to get product image URL for index page
function getIndexProductImageUrl($mediaPath) {
    if (empty($mediaPath)) {
        return 'assets/image/icons/PlaceholderAssetProduct.png';
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        // Use data-storage-handler to serve thumbnail 1
        return 'database/data-storage-handler.php?action=serve&path=' . urlencode($mediaDir . 'thumbnail_1.png');
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/
    if (strpos($mediaPath, 'assets/') === 0) {
        return $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return 'assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path
    return $mediaPath;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crook's Cart Collectives - Community Marketplace">
    <title>Crook's Cart Collectives - Community Marketplace</title>

    <!-- Preload assets with updated paths -->
    <link rel="preload" href="assets/image/brand/Logo.png" as="image">
    <link rel="preload" href="assets/image/icons/Showcase1.png" as="image">
    <link rel="preload" href="assets/image/icons/Showcase2.png" as="image">

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/footer.css">

    <style>
    /* Feature icon styling */
    .feature-icon {
        width: 64px;
        height: 64px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-icon img {
        width: 48px;
        height: 48px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
        transition: transform 0.3s ease;
    }

    .feature-card:hover .feature-icon img {
        transform: scale(1.1);
    }
    </style>

    <script defer src="scripts/header.js"></script>
    <script defer src="scripts/showcase-slider.js"></script>
    <script defer src="scripts/index.js"></script>
</head>

<body>
    <?php include_once('pages/header.php'); ?>

    <div class="content">
        <!-- Showcase Section -->
        <section class="showcase-section">
            <div class="showcase-slider" id="showcaseSlider">
                <div class="showcase-slide active" style="background-image: url('assets/image/icons/Showcase1.png');">
                    <div class="showcase-content">
                        <h1>Community Marketplace</h1>
                        <p>Buy and sell within your community</p>
                        <a href="pages/product.php" class="showcase-button">Shop Now</a>
                    </div>
                </div>
                <div class="showcase-slide" style="background-image: url('assets/image/icons/Showcase2.png');">
                    <div class="showcase-content">
                        <h1>Become a Seller</h1>
                        <p>Start your own business today</p>
                        <a href="pages/seller-fill-form.php" class="showcase-button">Join as Seller</a>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
                <button class="prev-slide" aria-label="Previous slide">‹</button>
                <button class="next-slide" aria-label="Next slide">›</button>
            </div>
        </section>

        <!-- Features Section - FIXED: Replaced emojis with SVG icons -->
        <section class="features-section">
            <div class="features-container">
                <h2>Why Choose Our Platform?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/people-team.svg" alt="People team icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Local Community</h3>
                        <p>Buy and sell within your trusted community members</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/verified-empty.svg" alt="Verified icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Verified Sellers</h3>
                        <p>All sellers are verified with valid government IDs</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/cart-shopping-fast.svg" alt="Delivery truck icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Easy Delivery</h3>
                        <p>Local deliveries for faster shipping</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/mail.svg" alt="Community support icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Community Support</h3>
                        <p>Get help from your community members</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-products-section">
            <div class="products-container">
                <h2>Featured Products</h2>
                <div class="products-grid" id="productsGrid">
                    <?php if (!empty($featured_products)): ?>
                    <?php foreach ($featured_products as $product): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <?php 
                    // FIXED: Use the helper function to get image URL
                    $imageUrl = getIndexProductImageUrl($product['media_path'] ?? '');
                    ?>
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='assets/image/icons/PlaceholderAssetProduct.png';">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                            <p class="product-seller">
                                Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                            </p>
                            <!-- FIXED: Changed from products.php to product.php -->
                            <a href="pages/product-details.php?id=<?php echo $product['product_id']; ?>"
                                class="view-product-btn">
                                View Details
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="no-products-message">
                        <p>No featured products available at the moment.</p>
                        <p>
                            <a href="pages/seller-fill-form.php" class="become-seller-link">Become a seller</a> to
                            add products!
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- FIXED: Changed from products.php to product.php -->
                <a href="pages/product.php" class="view-all-products-btn">View All Products</a>
            </div>
        </section>
    </div>

    <?php include_once('pages/footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/header.php`

**Status:** `FOUND`

```php
<?php // PHP File Content ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Force check if session is valid
$isLoggedIn = isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);
$isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;

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
                <?php if (!$isLoggedIn): ?>
                <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
                <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
                <?php else: ?>
                <!-- LOGGED IN: No Home, About, Contact -->
                <?php if ($isSeller): ?>
                <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
                <?php else: ?>
                <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <?php endif; ?>
                <?php endif; ?>
            </nav>

            <?php if ($isLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php else: ?>
            <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if (!$isLoggedIn): ?>
        <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
        <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
        <?php else: ?>
        <!-- LOGGED IN: No Home, About, Contact -->
        <?php if ($isSeller): ?>
        <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
        <?php else: ?>
        <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($isLoggedIn): ?>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isLoggedIn): ?>
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
```

---

## File: `Crooks-Cart-Collectives/pages/footer.php`

**Status:** `FOUND`

```php
<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>For more <span>inquiries</span> & <span>questions</span></h2>
            <h2>Visit our <span>FAQs</span> in our <span>socials</span></h2>
        </div>
        <div class="socials">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg" alt="Facebook"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg';">
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/instagram.svg" alt="Instagram"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
            <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/youtube.svg" alt="YouTube"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
        </div>
    </div>
    <div class="footer-lower">
        <div class="mail-button">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/mail.svg" alt="Mail"
                onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            <span>@crooks-cart-inquiry.com</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>pages/privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>pages/terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>
```

---

## File: `Crooks-Cart-Collectives/pages/about.php`

**Status:** `FOUND`

```php
<?php // PHP File Content ?>
<?php
session_start();
$current_page = 'about';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Crooks Cart Collectives</title>

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/about.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Page Header -->
        <section class="page-header">
            <div class="header-content">
                <h1>About <span>Crooks Cart Collectives</span></h1>
                <p>IT 213 Elective 2 & ITC 124 Collaborative Project</p>
            </div>
        </section>

        <!-- Project Overview -->
        <section class="overview-section">
            <div class="overview-container">
                <div class="overview-content">
                    <h2>Project <span>Overview</span></h2>
                    <p>Crooks Cart Collectives is a collaborative academic project between two courses: <strong>IT 213
                            Elective 2 (Object-Oriented Programming)</strong> and <strong>ITC 124 Fundamentals of
                            Database Systems</strong>.</p>

                    <p>The name comes from internet meme culture: <strong>"Crook"</strong> refers to someone below the
                        mafia boss - representing affordable, second-hand, and budget items. <strong>"Cart"</strong>
                        represents the modern marketplace, and <strong>"Collectives"</strong> means collections.
                        Together, the platform is envisioned as a budget-friendly marketplace similar to an eBay-style
                        platform where users can buy and sell second-hand or affordable items.</p>

                    <p>This project applies Object-Oriented Programming principles (encapsulation, inheritance,
                        polymorphism, abstraction) alongside professional database design practices to create a
                        functional e-commerce simulation.</p>
                </div>
            </div>
        </section>

        <!-- Course Information -->
        <section class="courses-section">
            <div class="courses-grid">
                <div class="course-card">
                    <h3>IT 213: Elective 2</h3>
                    <p class="course-subject">Object-Oriented Programming</p>
                    <p class="instructor">Instructor: Ms. Marisol B. De Guzman</p>
                    <p class="course-description">This course teaches OOP concepts including encapsulation, inheritance,
                        polymorphism, and abstraction. For this project, students applied these principles to web
                        development instead of Java to lighten the academic burden while demonstrating server-side
                        programming collaboration.</p>
                </div>

                <div class="course-card">
                    <h3>ITC 124: Fundamentals of Database Systems</h3>
                    <p class="course-subject">Database Design & Management</p>
                    <p class="instructor">Instructor: Mr. Louise Vasquez</p>
                    <p class="course-description">This course covers professional database practices including ER
                        diagramming, normalization (1NF-3NF), entity relationships, and SQL implementation. Students
                        applied these concepts to design and implement the project's database structure.</p>
                </div>
            </div>
        </section>

        <!-- Development Team -->
        <section class="team-section">
            <h2>Development <span>Team</span></h2>
            <p class="team-subtitle">School of Computer Studies - Arellano University Bonifacio Campus</p>

            <!-- Lead Developer - Centered Card (Now matching mobile view styling) -->
            <div class="lead-container">
                <div class="team-card lead-card">
                    <div class="team-image">
                        <img src="../assets/image/team/lance-madelar.png" alt="Lance N. Madelar">
                    </div>
                    <div class="team-info">
                        <h3>Lance N. Madelar</h3>
                        <p class="team-role">Lead Developer / Programmer</p>
                        <p class="team-bio">Project leader responsible for system architecture, database design, core
                            functionality implementation, and team coordination. Implemented OOP principles in PHP and
                            integrated database operations.</p>
                    </div>
                </div>
            </div>

            <!-- Team Members - Grid Layout -->
            <div class="members-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/christian-adviento.png" alt="Christian Ahron B. Adviento">
                    </div>
                    <h3>Christian Ahron B. Adviento</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Helped with documentation and gave feedback during meetings.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/william-aranez.png" alt="William G. Arañez">
                    </div>
                    <h3>William G. Arañez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Assisted in documentation and provided suggestions to the team.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/rylle-bernardino.png" alt="Rylle Javerick S. Bernardino">
                    </div>
                    <h3>Rylle Javerick S. Bernardino</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Worked on documentation and shared feedback with the group.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/charles-canoneo.png" alt="Charles Symon Kieffer C. Cañoneo">
                    </div>
                    <h3>Charles Symon Kieffer C. Cañoneo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Contributed to documentation and cooperated with team members.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/kishiekel-fernandez.png" alt="Kishiekel C. Fernandez">
                    </div>
                    <h3>Kishiekel C. Fernandez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Assisted with documentation and gave input during discussions.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/clark-mallo.png" alt="Clark Luis F. Mallo">
                    </div>
                    <h3>Clark Luis F. Mallo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Helped with documentation and provided feedback to the team.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/christian-mendoza.png" alt="Christian Ruel G. Mendoza">
                    </div>
                    <h3>Christian Ruel G. Mendoza</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Worked on documentation and offered suggestions during meetings.</p>
                </div>
            </div>

            <p class="team-note">All members contributed to documentation, testing, and collaborative development
                throughout the project lifecycle.</p>
        </section>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/contact.php`

**Status:** `FOUND`

```php
<?php
// Crooks-Cart-Collectives/pages/contact.php
// FIXED VERSION - Replaced emoji icons with SVG icons
?>
<?php
session_start();
$current_page = 'contact';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/contact.css">

    <style>
     Contact card icon styling/
    .contact-card__icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .contact-card__icon img {
        width: 32px;
        height: 32px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .contact-card:hover .contact-card__icon img {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="contact-page">
        <!-- Hero Section -->
        <section class="contact-hero">
            <div class="contact-hero__container">
                <h1 class="contact-hero__title">Get in <span class="contact-hero__highlight">Touch</span></h1>
                <p class="contact-hero__subtitle">School Project Contact Information</p>
            </div>
        </section>

        <!-- Contact Info Grid - FIXED: Replaced emojis with SVG icons -->
        <section class="contact-info">
            <div class="contact-info__grid">
                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/building.svg" alt="Location icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">Our Campus</h3>
                    <address class="contact-card__details">
                        Arellano University<br>
                        Andres Bonifacio Campus<br>
                        Pasig City, Philippines
                    </address>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/mail.svg" alt="Email icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">Project Email</h3>
                    <p class="contact-card__details">
                        scs.bonifacio@arellano.edu.ph<br>
                        ccs.project@arellano.edu.ph
                    </p>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/contact-us-empty.svg" alt="Phone icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">School Contact</h3>
                    <p class="contact-card__details">
                        +63 (2) 8123 4567<br>
                        School of Computer Studies
                    </p>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/time-update.svg" alt="Hours icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">School Hours</h3>
                    <p class="contact-card__details">
                        Monday - Friday: 8:00 - 17:00<br>
                        Saturday: 8:00 - 12:00
                    </p>
                </article>
            </div>
        </section>

        <!-- Contact Form & Map Section -->
        <section class="contact-interaction">
            <div class="contact-form-container">
                <header class="contact-form__header">
                    <h2 class="contact-form__title">Send us a <span class="contact-form__highlight">Message</span></h2>
                    <p class="contact-form__subtitle">For project inquiries or feedback</p>
                </header>

                <form id="contactForm" class="contact-form" novalidate>
                    <div class="contact-form__row">
                        <div class="contact-form__group">
                            <label for="fullName" class="contact-form__label">Your Name</label>
                            <input type="text" id="fullName" name="fullName" class="contact-form__input" required
                                placeholder="Enter your full name" aria-required="true">
                            <div class="contact-form__error" id="fullNameError" role="alert"></div>
                        </div>

                        <div class="contact-form__group">
                            <label for="emailAddress" class="contact-form__label">Email Address</label>
                            <input type="email" id="emailAddress" name="emailAddress" class="contact-form__input"
                                required placeholder="your@email.com" aria-required="true">
                            <div class="contact-form__error" id="emailError" role="alert"></div>
                        </div>
                    </div>

                    <div class="contact-form__row">
                        <div class="contact-form__group">
                            <label for="studentId" class="contact-form__label">Student ID</label>
                            <input type="text" id="studentId" name="studentId" class="contact-form__input"
                                placeholder="If you're a student">
                        </div>

                        <div class="contact-form__group">
                            <label for="inquirySubject" class="contact-form__label">Subject</label>
                            <select id="inquirySubject" name="inquirySubject" class="contact-form__select" required
                                aria-required="true">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="project">Project Question</option>
                                <option value="feedback">Feedback</option>
                                <option value="report">Report Issue</option>
                            </select>
                            <div class="contact-form__error" id="subjectError" role="alert"></div>
                        </div>
                    </div>

                    <div class="contact-form__group contact-form__group--full">
                        <label for="inquiryMessage" class="contact-form__label">Your Message</label>
                        <textarea id="inquiryMessage" name="inquiryMessage" class="contact-form__textarea" rows="6"
                            required placeholder="How can we help you?" aria-required="true"></textarea>
                        <div class="contact-form__error" id="messageError" role="alert"></div>
                    </div>

                    <div class="contact-form__actions">
                        <button type="submit" class="contact-form__submit-btn">
                            Send Message
                        </button>
                    </div>
                </form>

                <div id="formSuccessMessage" class="contact-form__success" style="display: none;" role="status">
                    <p>Thank you for your message! (This is a demo - no actual email will be sent)</p>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal modal--hidden" role="dialog" aria-modal="true"
        aria-labelledby="modalMessage">
        <div class="modal__content">
            <p id="modalMessage" class="modal__message"></p>
            <button id="modalCloseBtn" class="modal__close-btn">OK</button>
        </div>
    </div>

    <script src="../scripts/contact.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/privacy-policy.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/privacy-policy.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Privacy <span class="policy-hero__highlight">Policy</span></h1>
                <p class="policy-hero__subtitle">Academic Project - For Educational Purposes Only</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to Crooks Cart Collectives, a student project developed for academic
                    requirements at the School of Computer Studies, Arellano University - Bonifacio Campus. This
                    website and its data handling are for educational purposes only.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Information We Collect</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>As part of this school project, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Registration Data:</strong> Name, email, username, password (for login
                                simulation)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Phone number, address (for order simulation)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Seller Information:</strong> Business name (optional), valid ID (for
                                verification simulation)
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> This is a school project. All data is stored locally in our project
                            database and is used only for demonstrating functionality.
                        </p>
                    </div>
                </article>

                <article id="information-usage" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. How We Use Your Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">To demonstrate user authentication and profile
                                management</li>
                            <li class="policy-section__list-item">To simulate e-commerce functionality (cart, orders,
                                products)</li>
                            <li class="policy-section__list-item">For project evaluation by our instructors</li>
                            <li class="policy-section__list-item">To showcase our web development skills</li>
                        </ul>
                    </div>
                </article>

                <article id="information-sharing" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Information Sharing</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Since this is an academic project:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Data is only accessible within this project
                                environment</li>
                            <li class="policy-section__list-item">No information is sold or shared with third parties
                            </li>
                            <li class="policy-section__list-item">Instructors may access the project for grading
                                purposes</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-disclaimer" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">4. Academic Disclaimer</h2>
                    </header>
                    <div class="policy-section__body">
                        <p class="policy-section__important">
                            <strong>IMPORTANT:</strong> This website is a student project created for educational
                            purposes as part of the curriculum at the School of Computer Studies, Arellano
                            University - Bonifacio Campus. It is not a commercial platform. Any resemblance to
                            real e-commerce sites is for educational demonstration only.
                        </p>
                        <p>If you have concerns about this project, please contact the School of Computer Studies
                            directly.</p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Us</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about this academic project:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Address:</strong> Pasig City, Philippines</p>
                            <p class="policy-contact__item"><strong>Course:</strong> Web Development Project</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/terms-and-conditions.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'terms-and-conditions';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/terms-and-conditions.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="terms-page">
        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="terms-hero__container">
                <h1 class="terms-hero__title">Terms & <span class="terms-hero__highlight">Conditions</span></h1>
                <p class="terms-hero__subtitle">Academic Project - School of Computer Studies</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="terms-intro">
            <div class="terms-intro__card">
                <p class="terms-intro__text">
                    Welcome to Crooks Cart Collectives. By accessing or using our platform, you agree to these Terms
                    and Conditions, which apply to this academic project developed by students of Arellano
                    University - Bonifacio Campus.
                </p>
                <p class="terms-intro__effective-date">Effective Date: February 15, 2026 | For Educational Use Only</p>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="terms-content">
            <div class="terms-sections">

                <article id="project-purpose" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">1. Academic Project Purpose</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Crooks Cart Collectives is a student project created for the School of Computer Studies at
                            Arellano University - Bonifacio Campus. The purpose of this website is to demonstrate web
                            development skills including:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">PHP and MySQL database integration</li>
                            <li class="terms-section__list-item">User authentication and session management</li>
                            <li class="terms-section__list-item">E-commerce functionality simulation</li>
                            <li class="terms-section__list-item">Responsive front-end design</li>
                        </ul>
                    </div>
                </article>

                <article id="eligibility" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">2. Eligibility</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>This project is open to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Students and faculty of Arellano University for testing
                                purposes</li>
                            <li class="terms-section__list-item">Anyone interested in viewing the project demonstration
                            </li>
                            <li class="terms-section__list-item">Users must be at least 13 years of age (as required by
                                our course)</li>
                        </ul>
                    </div>
                </article>

                <article id="account-registration" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">3. Account Registration</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>When creating an account for this school project:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">You may use test data (no real personal information
                                required)</li>
                            <li class="terms-section__list-item">Passwords are stored for authentication demonstration
                            </li>
                            <li class="terms-section__list-item">Accounts may be reset or deleted as part of project
                                maintenance</li>
                        </ul>
                    </div>
                </article>

                <article id="transactions" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">4. Transactions</h2>
                    </header>
                    <div class="terms-section__body">
                        <p class="terms-section__important">
                            <strong>IMPORTANT:</strong> This is a demonstration project only.
                        </p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">No actual money transactions occur on this platform
                            </li>
                            <li class="terms-section__list-item">All prices, orders, and purchases are simulated</li>
                            <li class="terms-section__list-item">Products listed are for demonstration purposes only
                            </li>
                            <li class="terms-section__list-item">No real products will be shipped or delivered</li>
                        </ul>
                    </div>
                </article>

                <article id="user-conduct" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">5. User Conduct</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As this is an educational project, users are expected to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Use the platform respectfully for testing purposes</li>
                            <li class="terms-section__list-item">Not attempt to hack or compromise the site</li>
                            <li class="terms-section__list-item">Not upload inappropriate or offensive content</li>
                            <li class="terms-section__list-item">Understand that this is a student project, not a
                                commercial service</li>
                        </ul>
                    </div>
                </article>

                <article id="liability" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">6. Limitation of Liability</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As an academic project:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This platform is provided "as is" for educational
                                demonstration</li>
                            <li class="terms-section__list-item">The developers are students, not professional service
                                providers</li>
                            <li class="terms-section__list-item">No warranty or guarantee of uninterrupted service is
                                provided</li>
                            <li class="terms-section__list-item">The School of Computer Studies is not liable for any
                                issues arising from project use</li>
                        </ul>
                    </div>
                </article>

                <article id="contact" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">7. Contact Information</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>For questions regarding this academic project:</p>
                        <address class="terms-contact">
                            <p class="terms-contact__item"><strong>Institution:</strong> School of Computer Studies</p>
                            <p class="terms-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="terms-contact__item"><strong>Course:</strong> Web Development</p>
                            <p class="terms-contact__item"><strong>Project Lead:</strong> Lance N. Madelar</p>
                        </address>
                    </div>
                </article>

                <article id="acknowledgment" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">8. Acknowledgment</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>By using Crooks Cart Collectives, you acknowledge that:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This is a student project for academic purposes only
                            </li>
                            <li class="terms-section__list-item">No real commercial transactions take place</li>
                            <li class="terms-section__list-item">The site may be modified or taken down after project
                                completion</li>
                            <li class="terms-section__list-item">You are participating in testing an educational
                                platform</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- Agreement Section -->
        <section class="terms-agreement">
            <div class="terms-agreement__box">
                <p class="terms-agreement__text">
                    By using Crooks Cart Collectives, you acknowledge that this is an academic project created by
                    students of the School of Computer Studies, Arellano University - Bonifacio Campus for
                    educational purposes only.
                </p>
                <div class="terms-agreement__actions">
                    <a href="sign-up.php" class="terms-agreement__btn terms-agreement__btn--primary">Create Test
                        Account</a>
                    <a href="../index.php" class="terms-agreement__btn terms-agreement__btn--secondary">Return to
                        Home</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/sign-in.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        header('Location: admin-dashboard.php');
    } elseif (isset($_SESSION['is_seller']) && $_SESSION['is_seller'] && isset($_SESSION['seller_verified']) && $_SESSION['seller_verified']) {
        header('Location: seller-dashboard.php');
    } else {
        header('Location: customer-dashboard.php');
    }
    exit;
}

$redirect = $_GET['redirect'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sign-in.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Sign In to Your Account</div>

        <form id="signinForm" class="signin-container" method="POST">
            <input type="hidden" name="action" value="signin">

            <?php if (!empty($redirect)): ?>
            <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="identifier">Email or Username</label>
                <input type="text" id="identifier" name="identifier" required autocomplete="username">
                <div class="error-message" id="identifierError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                    </button>
                </div>
                <div class="error-message" id="passwordError"></div>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <p class="signup-link">
                Don't have an account? <a href="sign-up.php">Sign Up</a>
            </p>

            <p class="forgot-password-link">
                <a href="forgot-password.php">Forgot your password?</a>
            </p>
        </form>
    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/sign-in.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/sign-up.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: customer-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sign-up.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Account Registration</div>

        <form id="signupForm" class="signup-container" method="POST" autocomplete="on">
            <input type="hidden" name="action" value="signup">

            <!-- Personal Information Section -->
            <div class="form-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                        autocomplete="given-name">
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name (Optional)</label>
                    <input type="text" id="middle_name" name="middle_name" placeholder="Enter your middle name"
                        autocomplete="additional-name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name"
                        autocomplete="family-name">
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" required autocomplete="bday">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required autocomplete="sex">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="form-section">
                <h3>Account Information</h3>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="example@email.com"
                        autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Do not put your real name"
                        autocomplete="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" tabindex="-1"
                            aria-label="Toggle confirm password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password"
                                id="confirmPasswordIcon">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Contact & Registration Section -->
            <div class="form-section">
                <h3>Contact & Registration</h3>

                <div class="form-group">
                    <label for="contact_number">Phone Number</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="3" required
                        placeholder="House/street no., Barangay, City" autocomplete="street-address"></textarea>
                </div>

                <div class="form-group">
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                        <button type="reset" class="btn btn-secondary" id="clearForm">Clear Form</button>
                    </div>
                </div>

                <div class="form-group links-group">
                    <p class="login-link">
                        Already have an account? <a href="sign-in.php">Sign In</a>
                    </p>
                    <p class="seller-link">
                        Want to sell products? <a href="seller-fill-form.php">Become a Seller</a>
                    </p>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifier Modal -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/sign-up.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/cart.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customerId = $_SESSION['customer_id'];

$cartItems = [];
$total = 0;
$hasInactiveItems = false;
try {
    // Modified query to include product active status
    $stmt = $connection->prepare("
        SELECT 
            c.cart_id,
            c.quantity,
            c.price,
            p.product_id,
            p.name,
            p.price AS current_price,
            p.media_path,
            p.stock_quantity,
            p.is_active,
            s.business_name,
            s.seller_id
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        JOIN sellers s ON c.seller_id = s.seller_id
        WHERE c.customer_id = ?
        ORDER BY c.added_at DESC
    ");
    $stmt->execute([$customerId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check for inactive items and calculate total only from active ones
    foreach ($cartItems as $item) {
        if ($item['is_active']) {
            $total += $item['price'] * $item['quantity'];
        } else {
            $hasInactiveItems = true;
        }
    }
} catch (PDOException $e) {
    error_log("Error fetching cart: " . $e->getMessage());
}

function getProductImageUrl($mediaPath) {
    if (empty($mediaPath)) {
        return '../assets/image/icons/package.svg';
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (is_dir($fullPath)) {
        $thumbFiles = glob($fullPath . 'thumbnail_1.*');
        if (!empty($thumbFiles)) {
            $thumbFile = basename($thumbFiles[0]);
            return getFileUrl($mediaPath . $thumbFile);
        }
    }
    
    return '../assets/image/icons/package.svg';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <style>
    /* Inactive product styling */
    .cart-item.inactive {
        opacity: 0.6;
        filter: grayscale(50%);
        background-color: #f5f5f5;
        border-color: #cccccc;
        position: relative;
    }

    .cart-item.inactive::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.3);
        pointer-events: none;
    }

    .inactive-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 5px;
    }

    .inactive-message {
        margin-top: 10px;
        padding: 10px;
        background: #f0f0f0;
        border-left: 3px solid #FF8246;
        font-size: 0.9rem;
    }

    .cart-item.inactive .cart-item-price,
    .cart-item.inactive .cart-item-seller,
    .cart-item.inactive .cart-item-title,
    .cart-item.inactive .item-subtotal {
        opacity: 0.7;
    }

    .cart-item.inactive .quantity-input,
    .cart-item.inactive .remove-btn {
        pointer-events: none;
        opacity: 0.5;
    }

    .inactive-warning {
        background: #f0f0f0;
        padding: 15px;
        margin: 20px 0;
        border-radius: 6px;
        text-align: center;
        border-left: 4px solid #FF8246;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Shopping Cart</h1>
        </div>

        <?php if ($hasInactiveItems): ?>
        <div class="inactive-warning">
            <p>Some items in your cart are no longer available. These items have been greyed out and cannot be checked
                out.</p>
        </div>
        <?php endif; ?>

        <?php if (!empty($cartItems)): ?>
        <!-- Cart Items -->
        <div class="cart-container">
            <div class="cart-items" id="cartItems">
                <?php foreach ($cartItems as $item): 
                        $imageUrl = getProductImageUrl($item['media_path'] ?? '');
                        $subtotal = $item['price'] * $item['quantity'];
                        $isActive = $item['is_active'] ? true : false;
                        $inactiveClass = $isActive ? '' : 'inactive';
                    ?>
                <div class="cart-item <?= $inactiveClass ?>" data-id="<?= $item['cart_id'] ?>"
                    data-active="<?= $isActive ? '1' : '0' ?>">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>

                        <?php if ($isActive): ?>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>
                        <p class="stock-status">In Stock: <?= (int)$item['stock_quantity'] ?></p>
                        <?php else: ?>
                        <span class="inactive-badge">Product Unavailable</span>
                        <p class="cart-item-seller" style="display: none;">
                            <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price" style="display: none;">₱<?= number_format($item['price'], 2) ?></p>
                        <?php endif; ?>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <?php if ($isActive): ?>
                                <label for="quantity-<?= $item['cart_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_id'] ?>">
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>">
                                    Remove
                                </button>
                                <?php else: ?>
                                <span class="inactive-message">This product is no longer available. Please remove it
                                    from your cart.</span>
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>"
                                    style="margin-top: 10px;">
                                    Remove Item
                                </button>
                                <?php endif; ?>
                            </div>
                            <?php if ($isActive): ?>
                            <p class="item-subtotal">
                                Subtotal: <span class="subtotal-amount">₱<?= number_format($subtotal, 2) ?></span>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total (active items):</span>
                    <span class="total-amount" id="cartTotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="cart-actions">
                    <a href="product.php" class="btn btn-secondary">Continue Shopping</a>
                    <?php if ($total > 0): ?>
                    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
                    <?php else: ?>
                    <button class="btn btn-primary" disabled style="opacity: 0.5; cursor: not-allowed;">No Active
                        Items</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/cart-shopping.svg" alt="Empty cart" class="empty-state-icon">
                <h2>Your Cart is Empty</h2>
                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="product.php" class="btn btn-primary">Start Shopping</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/cart.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/checkout.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

// Check for single product checkout (Buy Now)
$singleProductMode = false;
$singleProduct = null;
$cartItems = [];
$total = 0;

if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $singleProductMode = true;
    $productId = (int)$_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;

    // Fetch product details
    try {
        $stmt = $connection->prepare("
            SELECT p.*, s.business_name, s.seller_id
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$productId]);
        $singleProduct = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$singleProduct) {
            // Invalid product, redirect to products
            header('Location: product.php');
            exit;
        }

        // Check stock
        if ($quantity > $singleProduct['stock_quantity']) {
            $_SESSION['checkout_error'] = 'Insufficient stock for selected quantity.';
            header('Location: product-details.php?id=' . $productId);
            exit;
        }

        // Build a single-item cart array for display
        $cartItems = [
            [
                'cart_id' => null,
                'product_id' => $singleProduct['product_id'],
                'name' => $singleProduct['name'],
                'media_path' => $singleProduct['media_path'],
                'business_name' => $singleProduct['business_name'],
                'seller_id' => $singleProduct['seller_id'],
                'quantity' => $quantity,
                'price' => $singleProduct['price'],
                'stock_quantity' => $singleProduct['stock_quantity']
            ]
        ];
        $total = $singleProduct['price'] * $quantity;
    } catch (PDOException $e) {
        error_log("Checkout single product fetch error: " . $e->getMessage());
        header('Location: product.php');
        exit;
    }
} else {
    // Normal cart checkout
    try {
        $stmt = $connection->prepare("
            SELECT c.*, p.name, p.media_path, s.business_name
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    } catch (PDOException $e) {
        error_log("Checkout cart fetch error: " . $e->getMessage());
    }

    if (empty($cartItems)) {
        header('Location: cart.php');
        exit;
    }
}

// Fetch user shipping address
$user = [];
try {
    $stmt = $connection->prepare("SELECT address, first_name, last_name, email, contact_number FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Checkout user fetch error: " . $e->getMessage());
}

// Helper function to get product image URL
function getCheckoutImageUrl($mediaPath) {
    if (empty($mediaPath)) {
        return '../assets/image/icons/package.svg';
    }
    
    // Check if it's a media directory path
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($mediaDir . 'thumbnail_1.png');
    }
    
    // Direct file path
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    if (strpos($mediaPath, 'http') === 0) {
        return $mediaPath;
    }
    
    return '../' . $mediaPath;
}

// Get safe values for display with null checks
$fullName = '';
if (!empty($user['first_name']) && !empty($user['last_name'])) {
    $fullName = htmlspecialchars($user['first_name'] . ' ' . $user['last_name'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($user['first_name'])) {
    $fullName = htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($user['last_name'])) {
    $fullName = htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8');
}

$shippingAddress = !empty($user['address']) ? htmlspecialchars($user['address'], ENT_QUOTES, 'UTF-8') : '';
$userEmail = !empty($user['email']) ? htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') : '';
$userPhone = !empty($user['contact_number']) ? htmlspecialchars($user['contact_number'], ENT_QUOTES, 'UTF-8') : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/checkout.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <h1 class="checkout-title">Checkout</h1>

        <div class="checkout-grid">
            <div class="checkout-summary">
                <h2>Order Summary</h2>
                <div class="checkout-items">
                    <?php foreach ($cartItems as $item): 
                        // FIXED: Use the helper function to get image URL
                        $imageUrl = getCheckoutImageUrl($item['media_path'] ?? '');
                        $itemName = !empty($item['name']) ? htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') : 'Product';
                        $sellerName = !empty($item['business_name']) ? htmlspecialchars($item['business_name'], ENT_QUOTES, 'UTF-8') : 'Seller';
                    ?>
                    <div class="checkout-item">
                        <img src="<?= htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') ?>" alt="<?= $itemName ?>"
                            class="checkout-item-image"
                            onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                        <div class="checkout-item-details">
                            <h3><?= $itemName ?></h3>
                            <p>Seller: <?= $sellerName ?></p>
                            <p>Qty: <?= (int)$item['quantity'] ?></p>
                            <p class="checkout-item-price">
                                ₱<?= number_format((float)($item['price'] * $item['quantity']), 2) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="checkout-total">
                    <span>Total:</span>
                    <span class="total-amount">₱<?= number_format((float)$total, 2) ?></span>
                </div>
            </div>

            <div class="checkout-info">
                <h2>Shipping Address</h2>
                <div class="shipping-details">
                    <p><strong><?= $fullName ?: 'Customer' ?></strong></p>
                    <p><?= $shippingAddress ?: 'No address on file' ?></p>
                    <p>Email: <?= $userEmail ?: 'Not provided' ?></p>
                    <p>Phone: <?= $userPhone ?: 'Not provided' ?></p>
                </div>

                <h2>Payment Method</h2>
                <div class="payment-method">
                    <p>Cash on Delivery (COD)</p>
                </div>

                <div class="checkout-actions">
                    <!-- FIXED: Changed from products.php to product.php -->
                    <a href="product.php" class="btn btn-secondary">Back to Shop</a>
                    <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <div id="checkoutNotifier" class="notifier hidden">
        <div class="notifier-content">
            <img src="../assets/image/icons/cart-shopping.svg" alt="Order" class="notifier-icon"
                style="width: 40px; height: 40px; margin-bottom: 15px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            <p id="checkoutMessage"></p>
            <button id="checkoutCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <input type="hidden" id="singleProductMode" value="<?= $singleProductMode ? '1' : '0' ?>">
    <?php if ($singleProductMode && $singleProduct): ?>
    <input type="hidden" id="singleProductId" value="<?= (int)$singleProduct['product_id'] ?>">
    <input type="hidden" id="singleQuantity" value="<?= (int)$quantity ?>">
    <input type="hidden" id="singlePrice" value="<?= (float)$singleProduct['price'] ?>">
    <?php endif; ?>

    <script src="../scripts/checkout.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/product-detail.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

$product_id = $_GET['id'] ?? 0;

$product = [];
$reviews = [];
try {
    // Fetch product details
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name, s.is_verified 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.product_id = ? AND p.is_active = 1
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Fetch reviews for this product with user profile and username
        $reviewStmt = $connection->prepare("
            SELECT pr.*, u.first_name, u.last_name, u.username, u.profile_picture
            FROM product_reviews pr
            JOIN users u ON pr.user_id = u.user_id
            WHERE pr.product_id = ?
            ORDER BY pr.date_posted DESC
        ");
        $reviewStmt->execute([$product_id]);
        $reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log("Error fetching product: " . $e->getMessage());
}

if (!$product) {
    header('Location: product.php');
    exit;
}

// Determine media files
$mediaDir = $product['media_path'] ?? '';
$videoUrl = '';
$thumbnailUrls = [];

if (!empty($mediaDir)) {
    $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
    if (is_dir($fullDir)) {
        // Video first (video_1.*)
        $videoFiles = glob($fullDir . 'video_1.*');
        if (!empty($videoFiles)) {
            $videoFile = basename($videoFiles[0]);
            $videoUrl = getFileUrl($mediaDir . $videoFile);
        }
        // Thumbnails (thumbnail_1.* to thumbnail_5.*)
        for ($i = 1; $i <= 5; $i++) {
            $thumbFiles = glob($fullDir . 'thumbnail_' . $i . '.*');
            if (!empty($thumbFiles)) {
                $thumbFile = basename($thumbFiles[0]);
                $thumbnailUrls[] = getFileUrl($mediaDir . $thumbFile);
            }
        }
    }
}

// If no thumbnails found, use placeholder
if (empty($thumbnailUrls)) {
    $thumbnailUrls[] = '../assets/image/icons/PlaceholderAssetProduct.png';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product-detail.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="product-details-wrapper">
            <!-- REVISED LAYOUT: [IMAGE COLUMN] [PRODUCT INFO COLUMN] - Like seller-new-product -->
            <div class="product-details-grid">
                <!-- IMAGE COLUMN - Right side now (hoverable, thumbnail gallery) -->
                <div class="product-image-column right-column">
                    <!-- Main Preview Box (hoverable) -->
                    <div class="preview-box" id="mainPreviewBox">
                        <div class="preview-placeholder" id="previewPlaceholder"
                            style="<?php echo !empty($thumbnailUrls[0]) && $thumbnailUrls[0] !== '../assets/image/icons/PlaceholderAssetProduct.png' ? 'display: none;' : ''; ?>">
                            <img src="../assets/image/icons/package.svg" alt="Product image">
                            <span>No image available</span>
                        </div>
                        <div class="preview-image" id="previewImage"
                            style="<?php echo !empty($thumbnailUrls[0]) && $thumbnailUrls[0] !== '../assets/image/icons/PlaceholderAssetProduct.png' ? 'background-image: url(' . $thumbnailUrls[0] . '); display: block;' : 'display: none;'; ?>">
                        </div>
                    </div>

                    <!-- Thumbnail Navigation - Only shows actual images, no empty slots -->
                    <?php 
                    // Filter out placeholder images
                    $actualImages = array_filter($thumbnailUrls, function($url) {
                        return $url !== '../assets/image/icons/PlaceholderAssetProduct.png';
                    });
                    
                    if (!empty($actualImages)): 
                    ?>
                    <div class="thumbnail-navigation" id="thumbnailNavigation">
                        <?php 
                        $counter = 0;
                        foreach ($thumbnailUrls as $index => $url): 
                            $isPlaceholder = ($url === '../assets/image/icons/PlaceholderAssetProduct.png');
                            // Skip placeholder images entirely - only show real images
                            if (!$isPlaceholder):
                        ?>
                        <button type="button" class="thumbnail-image-btn <?php echo $counter === 0 ? 'active' : ''; ?>"
                            data-index="<?php echo $index; ?>" style="background-image: url('<?php echo $url; ?>');">
                        </button>
                        <?php 
                                $counter++;
                            endif;
                        endforeach; 
                        ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- PRODUCT INFO COLUMN - Left side now -->
                <div class="product-info-column left-column">
                    <div class="info-section">
                        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                        <div class="product-meta">
                            <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                            <span class="product-seller">
                                by <strong><?php echo htmlspecialchars($product['business_name']); ?></strong>
                                <?php if ($product['is_verified']): ?>
                                <span class="verified-badge">Verified</span>
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="product-price-container">
                            <span class="price-label">Price</span>
                            <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                        </div>

                        <div
                            class="stock-status <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <span class="status-indicator"></span>
                            <span class="status-text">
                                <?php if ($product['stock_quantity'] > 0): ?>
                                <?php echo $product['stock_quantity']; ?> in stock
                                <?php else: ?>
                                Out of Stock
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="product-description">
                            <h2>Description</h2>
                            <div class="description-content">
                                <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                            </div>
                        </div>

                        <!-- Action buttons inside info column -->
                        <div class="product-actions">
                            <?php if (isset($_SESSION['user_id'])): ?>
                            <button class="btn btn-primary add-to-cart-btn"
                                data-product-id="<?php echo $product['product_id']; ?>"
                                <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                                <span class="btn-text">Add to Cart</span>
                            </button>
                            <button class="btn btn-secondary buy-now-btn"
                                data-product-id="<?php echo $product['product_id']; ?>"
                                <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                                <span class="btn-text">Buy Now</span>
                            </button>
                            <?php else: ?>
                            <a href="sign-in.php?redirect=<?php echo urlencode('product-details.php?id=' . $product['product_id']); ?>"
                                class="btn btn-primary login-to-purchase-btn">
                                <span class="btn-text">Login to Purchase</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section (full width below) -->
            <div class="reviews-section">
                <h2 class="reviews-title">Customer Reviews (<?php echo count($reviews); ?>)</h2>

                <?php if (empty($reviews)): ?>
                <div class="no-reviews-message">
                    This product has no reviews yet.
                </div>
                <?php else: ?>
                <div class="reviews-list">
                    <?php foreach ($reviews as $review): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <div class="reviewer-profile">
                                <?php if (!empty($review['profile_picture'])): ?>
                                <img src="<?php echo htmlspecialchars($review['profile_picture']); ?>"
                                    alt="<?php echo htmlspecialchars($review['first_name']); ?>"
                                    onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                                <?php else: ?>
                                <img src="../assets/image/icons/user-profile-circle.svg" alt="Profile">
                                <?php endif; ?>
                            </div>
                            <div class="reviewer-info">
                                <div class="reviewer-name">
                                    <?php echo htmlspecialchars($review['first_name'] . ' ' . $review['last_name']); ?>
                                </div>
                                <div class="reviewer-username">
                                    @<?php echo htmlspecialchars($review['username']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <img src="../assets/image/icons/<?php echo $i <= $review['rating'] ? 'star-filled.svg' : 'star-empty.svg'; ?>"
                                alt="Star" class="star">
                            <?php endfor; ?>
                        </div>
                        <?php if (!empty($review['comment'])): ?>
                        <div class="review-comment">
                            <?php echo nl2br(htmlspecialchars($review['comment'])); ?>
                        </div>
                        <?php endif; ?>
                        <div class="review-date">
                            <?php echo date('M j, Y', strtotime($review['date_posted'])); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product-detail.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/product.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

// Fetch all active products
$products = [];
$categories = [];

try {
    // Get all categories for filter
    $catStmt = $connection->prepare("SELECT DISTINCT category FROM products WHERE is_active = 1 ORDER BY category");
    $catStmt->execute();
    $categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Get all active products
    $prodStmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY p.date_added DESC
    ");
    $prodStmt->execute();
    $products = $prodStmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    error_log("Error fetching products: " . $e->getMessage());
}

// Helper function to get product image URL for product page
function getProductPageImageUrl($mediaPath) {
    // Default fallback - using an existing icon from your project
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        // Use data-storage-handler to serve thumbnail 1
        // Build the path without double slashes
        $fullPath = $mediaDir . 'thumbnail_1.png';
        return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($fullPath);
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return '../assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path
    return $mediaPath;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/product.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Shop Products</h1>
        </div>

        <?php if (!empty($products)): ?>
        <!-- Filter Tabs - Only shown when products exist -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Products</span>
            <?php foreach ($categories as $category): ?>
            <span class="filter-tab" data-filter="<?php echo htmlspecialchars(strtolower($category)); ?>">
                <?php echo htmlspecialchars($category); ?>
            </span>
            <?php endforeach; ?>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="productsGrid">
            <?php foreach ($products as $product): ?>
            <div class="product-card" data-category="<?php echo htmlspecialchars(strtolower($product['category'])); ?>">
                <?php 
                // FIXED: Use the helper function to get image URL
                $imageUrl = getProductPageImageUrl($product['media_path'] ?? '');
                ?>
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                        onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                </div>
                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-seller">Seller: <?php echo htmlspecialchars($product['business_name']); ?></p>
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <div class="product-actions">
                        <a href="product-detail.php?id=<?php echo $product['product_id']; ?>"
                            class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State - Full width container -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/package.svg" alt="No products" class="empty-state-icon">
                <h2>No Products Available</h2>
                <p>There are no products available at the moment.</p>
                <a href="../index.php" class="btn btn-primary">Return to Home</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/report-seller.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch all verified sellers for dropdown (excluding self if user is a seller)
$sellers = [];
try {
    $stmt = $connection->prepare("
        SELECT s.seller_id, u.username, s.business_name 
        FROM sellers s
        JOIN users u ON s.user_id = u.user_id
        WHERE s.is_verified = 1 AND u.user_id != ?
    ");
    $stmt->execute([$userId]);
    $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching sellers: " . $e->getMessage());
}

// Fetch user's own reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, s.business_name, u.username as seller_username
        FROM seller_reports r
        JOIN sellers s ON r.seller_id = s.seller_id
        JOIN users u ON s.user_id = u.user_id
        WHERE r.reporter_id = ?
        ORDER BY r.created_at DESC
    ");
    $stmt->execute([$userId]);
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching reports: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Seller - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/report-seller.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <h1 class="page-title">Report a Seller</h1>

        <!-- Report Form -->
        <div class="report-form-container">
            <form id="reportForm" class="report-form">
                <div class="form-group">
                    <label for="seller_id">Select Seller</label>
                    <select id="seller_id" name="seller_id" required>
                        <option value="">-- Choose a seller --</option>
                        <?php foreach ($sellers as $seller): ?>
                        <option value="<?= $seller['seller_id'] ?>">
                            <?= htmlspecialchars($seller['business_name'] ?: $seller['username']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reason">Reason</label>
                    <input type="text" id="reason" name="reason" required
                        placeholder="e.g., Fake product, Scam, Harassment">
                </div>

                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea id="details" name="details" rows="5" required
                        placeholder="Describe the incident in detail..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Report</button>
            </form>
        </div>

        <!-- User's Previous Reports -->
        <?php if (!empty($reports)): ?>
        <h2 class="section-title">Your Previous Reports</h2>
        <div class="reports-list">
            <?php foreach ($reports as $report): ?>
            <div class="report-card">
                <div class="report-header">
                    <strong>Seller:</strong>
                    <?= htmlspecialchars($report['business_name'] ?: $report['seller_username']) ?>
                    <span class="report-status status-<?= $report['status'] ?>"><?= $report['status'] ?></span>
                </div>
                <div class="report-body">
                    <p><strong>Reason:</strong> <?= htmlspecialchars($report['reason']) ?></p>
                    <p><strong>Details:</strong> <?= nl2br(htmlspecialchars($report['details'])) ?></p>
                    <p class="report-date">Submitted: <?= date('F j, Y, g:i a', strtotime($report['created_at'])) ?></p>
                    <?php if (!empty($report['admin_notes'])): ?>
                    <p class="admin-notes"><strong>Admin notes:</strong>
                        <?= nl2br(htmlspecialchars($report['admin_notes'])) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Notifier Modal (reused) -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/report-seller.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/orders.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

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
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/orders.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>My Orders</h1>
        </div>

        <!-- Filter Tabs - Will be shown/hidden by JavaScript based on orders data -->
        <div class="filter-tabs" id="filterTabs" style="display: none;">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <!-- Orders Container - Will be populated by JavaScript -->
        <div id="ordersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Review Modal -->
    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/star-filled.svg" alt="Review">
            </div>
            <h2 class="modal-title">Write a Review</h2>
            <form id="reviewForm">
                <input type="hidden" name="order_id" id="reviewOrderId">
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="form-group">
                    <label class="form-label">Rating</label>
                    <div class="star-rating" id="starRatingContainer">
                        <span class="star" data-value="1"></span>
                        <span class="star" data-value="2"></span>
                        <span class="star" data-value="3"></span>
                        <span class="star" data-value="4"></span>
                        <span class="star" data-value="5"></span>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" required>
                    <div class="rating-error" id="ratingError"></div>
                </div>

                <div class="form-group">
                    <label for="comment" class="form-label">Review (Optional)</label>
                    <textarea id="comment" name="comment" class="form-textarea" rows="4"
                        placeholder="Share your experience with this product..."></textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" class="modal-btn modal-btn-cancel" id="cancelReview">Cancel</button>
                    <button type="submit" class="modal-btn modal-btn-confirm" id="submitReview">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Cancel">
            </div>
            <h2 class="modal-title">Cancel Order</h2>
            <p class="modal-message">Are you sure you want to cancel this order? This action cannot be undone.</p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-cancel" id="cancelCancel">No</button>
                <button class="modal-btn modal-btn-confirm" id="confirmCancel">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="notificationClose">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    <script src="../scripts/orders.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/customer-dashboard.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// VERIFY seller status from database, don't rely solely on session
$isSeller = false;
try {
    $stmt = $connection->prepare("SELECT seller_id, is_verified FROM sellers WHERE user_id = ?");
    $stmt->execute([$userId]);
    $sellerData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($sellerData) {
        $isSeller = true;
        // Update session to match database
        $_SESSION['is_seller'] = true;
        $_SESSION['seller_id'] = $sellerData['seller_id'];
        $_SESSION['seller_verified'] = (bool)$sellerData['is_verified'];
    } else {
        // Clear seller session flags if user is not a seller in database
        unset($_SESSION['is_seller']);
        unset($_SESSION['seller_id']);
        unset($_SESSION['seller_verified']);
        $isSeller = false;
    }
} catch (PDOException $e) {
    error_log("Error checking seller status: " . $e->getMessage());
    // On database error, keep session as is but log the error
    $isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;
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
    /* Dashboard card icon styling - using actual img tags instead of pseudo-elements */
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

    /* Remove any pseudo-element icons */
    .dashboard-card::before,
    .dashboard-card::after {
        display: none;
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

            <?php if ($isSeller): ?>
            <!-- SELLER: Show Selling dashboard link (only if actually a seller in database) -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/fill-form.svg" alt="Seller dashboard">
                </div>
                <h3>Selling Dashboard</h3>
                <p>Manage your products, view orders, and track your sales</p>
                <a href="seller-dashboard.php" class="btn-primary">Manage</a>
            </div>
            <?php else: ?>
            <!-- CUSTOMER ONLY: Show Become a Seller -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/fill-form.svg" alt="Become a seller">
                </div>
                <h3>Become a Seller</h3>
                <p>Start your entrepreneurial journey with our community</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
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
```

---

## File: `Crooks-Cart-Collectives/pages/customer-profile.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

$user = [];
try {
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        session_destroy();
        header('Location: sign-in.php');
        exit;
    }
} catch (PDOException $e) {
    error_log("Error fetching user profile: " . $e->getMessage());
    $error = "Unable to load profile data. Please try again later.";
}

// Helper to get profile picture URL using data-storage-handler
function getProfilePictureUrl($picture) {
    if (empty($picture)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    
    // Use the data-storage-handler's getFileUrl function
    return getFileUrl($picture);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/customer-profile.js"></script>
</head>
<body>
    <?php include_once('header.php'); ?>

    <div class="content">

        <?php if (isset($error)): ?>
        <div class="message error" style="display: block; margin-bottom: 20px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="customer-dashboard.php" style="color: white; text-decoration: underline; margin-left: 10px;">
                Return to Dashboard
            </a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <!-- Personal Info Section with Profile Preview -->
            <div class="form-section personal-info-section">
                <h3>Profile Information</h3>
                
                <!-- PROFILE CONTAINER - Stacked and Centered -->
                <div class="profile-stacked-container">
                    <!-- Profile Picture -->
                    <div class="profile-picture-wrapper">
                        <img id="profilePicturePreview" 
                             src="<?php echo getProfilePictureUrl($user['profile_picture'] ?? ''); ?>" 
                             alt="Profile Picture"
                             onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                        
                        <div class="profile-picture-upload" id="profilePictureUpload" style="display: none;">
                            <label for="profile_picture" class="file-upload-label">Choose Photo to Upload</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                            <div class="file-name" id="fileNameDisplay"></div>
                            <div class="help-text">Max 2MB. JPG, PNG, GIF.</div>
                        </div>
                    </div>
                    
                    <!-- Profile Name (one line - first name + last name) -->
                    <div class="profile-name-single-line">
                        <span class="display-full-name"><?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    
                    <!-- Choose button container - centered below name -->
                    <div class="choose-button-container" id="chooseButtonContainer" style="display: none;">
                        <button type="button" class="btn-choose-photo" id="triggerFileUpload">Choose Photo to Upload</button>
                    </div>
                </div>

                <!-- Name fields with labels -->
                <div class="fields-row with-labels">
                    <div class="form-group flex-field">
                        <label for="first_name" class="field-label">First name</label>
                        <input type="text" id="first_name" name="first_name" required
                               value="<?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="First name" maxlength="50" disabled>
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group flex-field">
                        <label for="middle_name" class="field-label">Middle name</label>
                        <input type="text" id="middle_name" name="middle_name"
                               value="<?php echo htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Middle name" maxlength="50" disabled>
                        <div class="error-message" id="middleNameError"></div>
                    </div>

                    <div class="form-group flex-field">
                        <label for="last_name" class="field-label">Last name</label>
                        <input type="text" id="last_name" name="last_name" required
                               value="<?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Last name" maxlength="50" disabled>
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <!-- Birthdate and Gender with labels -->
                <div class="fields-row balanced-row with-labels">
                    <div class="form-group half-field">
                        <label for="birthdate" class="field-label">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                               value="<?php echo htmlspecialchars($user['birthdate'] ?? ''); ?>"
                               max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>"
                               min="<?php echo date('Y-m-d', strtotime('-120 years')); ?>" disabled>
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group half-field">
                        <label for="gender" class="field-label">Gender</label>
                        <select id="gender" name="gender" disabled>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo ($user['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($user['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo ($user['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <div class="error-message" id="genderError"></div>
                    </div>
                </div>

                <!-- Address with label -->
                <div class="form-group full-width with-label">
                    <label for="address" class="field-label">Address</label>
                    <textarea id="address" name="address" required rows="3"
                              placeholder="Enter your complete address"
                              maxlength="255" disabled><?php echo htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
            </div>

            <!-- Account Info Section with buttons at bottom -->
            <div class="form-section account-info-section">
                <h3>Account Information</h3>

                <div class="info-row">
                    <div class="info-group">
                        <label>Email</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Contact num</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <div class="info-note centered">These details cannot be changed.</div>

                <!-- Buttons inside Account Info column at bottom -->
                <div class="profile-actions">
                    <button type="button" id="editCancelBtn" class="btn btn-secondary">Edit</button>
                    <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <!-- Feedback Modal -->
    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                     style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-dashboard.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller info
$stmt = $connection->prepare("SELECT business_name FROM sellers WHERE seller_id = ?");
$stmt->execute([$sellerId]);
$seller = $stmt->fetch();
$business_name = $seller['business_name'] ?? 'Your Store';

// Fetch stats - FIXED: Removed references to non-existent columns
$stats = [];
try {
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as total FROM products WHERE seller_id = ?");
    $stmt->execute([$sellerId]);
    $stats['products'] = $stmt->fetch()['total'];

    // Total orders
    $stmt = $connection->prepare("SELECT COUNT(*) as orders FROM orders WHERE seller_id = ?");
    $stmt->execute([$sellerId]);
    $stats['orders'] = $stmt->fetch()['orders'];

    // Items sold (sum of quantity where status = 'delivered')
    $stmt = $connection->prepare("
        SELECT COALESCE(SUM(quantity), 0) as items_sold 
        FROM orders 
        WHERE seller_id = ? AND status = 'delivered'
    ");
    $stmt->execute([$sellerId]);
    $stats['items_sold'] = $stmt->fetch()['items_sold'];

    // Total revenue (sum of subtotal where status = 'delivered')
    $stmt = $connection->prepare("
        SELECT COALESCE(SUM(subtotal), 0) as revenue 
        FROM orders 
        WHERE seller_id = ? AND status = 'delivered'
    ");
    $stmt->execute([$sellerId]);
    $stats['revenue'] = $stmt->fetch()['revenue'];

} catch (PDOException $e) {
    error_log("Seller dashboard stats error: " . $e->getMessage());
}

// Fetch recent 5 orders
$recentOrders = [];
try {
    $stmt = $connection->prepare("
        SELECT 
            o.order_id,
            o.status,
            o.order_date,
            o.quantity,
            p.name as product_name
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        WHERE o.seller_id = ?
        ORDER BY o.order_date DESC
        LIMIT 5
    ");
    $stmt->execute([$sellerId]);
    $recentOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching recent orders: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-dashboard.css">
    <script defer src="../scripts/seller-dashboard.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($business_name); ?></span>!</h1>
            <p>Manage your products, track orders, and grow your business</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/package.svg" alt="Products icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['products'] ?></div>
                <div class="stat-label">Total Products</div>
                <div class="stat-subtext">Active listings</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/order.svg" alt="Orders icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['orders'] ?></div>
                <div class="stat-label">Orders Received</div>
                <div class="stat-subtext">Across all products</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/cart-shopping-fast.svg" alt="Items sold icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['items_sold'] ?></div>
                <div class="stat-label">Items Sold</div>
                <div class="stat-subtext">Total quantity</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/chart-line-up.svg" alt="Revenue icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number">₱<?= number_format($stats['revenue'], 2) ?></div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-subtext">From completed orders</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="actions-grid">
                <a href="seller-new-product.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/cart-plus.svg" alt="Add product icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Add New Product</h3>
                    <p>List a new item for sale on the marketplace</p>
                </a>

                <a href="seller-manage-product.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/updatesvg.svg" alt="Manage products icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Manage Products</h3>
                    <p>Edit, update, or remove your existing listings</p>
                </a>

                <a href="seller-process-order.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/order.svg" alt="View orders icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>View All Orders</h3>
                    <p>Track and manage customer orders</p>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h2>
                Recent Orders
                <a href="seller-process-order.php">View All</a>
            </h2>
            <?php
            if (empty($recentOrders)) {
                echo '<p style="text-align: center; color: #6c757d; padding: 20px;">No orders yet. Check back soon!</p>';
            } else {
                echo '<ul class="activity-list">';
                foreach ($recentOrders as $order) {
                    $date = new DateTime($order['order_date']);
                    $formattedDate = $date->format('M j, Y g:i A');
                    ?>
            <li class="activity-item">
                <span class="activity-status <?= $order['status'] ?>"></span>
                <div class="activity-details">
                    <p>Order #<?= $order['order_id'] ?> - <?= htmlspecialchars($order['product_name']) ?> (Qty:
                        <?= $order['quantity'] ?>)</p>
                    <small><?= $formattedDate ?></small>
                </div>
                <a href="seller-process-order.php#order-<?= $order['order_id'] ?>" class="activity-link">View
                    Details</a>
            </li>
            <?php
                }
                echo '</ul>';
            }
            ?>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-fill-form.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user data
$stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header('Location: sign-in.php');
    exit;
}

// Fetch seller data if exists
$stmt = $connection->prepare("SELECT * FROM sellers WHERE user_id = ?");
$stmt->execute([$userId]);
$seller = $stmt->fetch(PDO::FETCH_ASSOC);
$isSeller = !empty($seller);

// Helper to get file URL using data-storage-handler
function getVerificationFileUrl($path) {
    if (empty($path)) return '';
    return getFileUrl($path);
}

// Determine existing verification file URLs
$identityUrl = '';
$idDocumentUrl = '';
if ($isSeller) {
    if (!empty($seller['identity_path'])) {
        $identityUrl = getVerificationFileUrl($seller['identity_path']);
    }
    if (!empty($seller['id_document_path'])) {
        $idDocumentUrl = getVerificationFileUrl($seller['id_document_path']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isSeller ? 'Edit Seller Information' : 'Become a Seller' ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-registration.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/seller-fill-form.js"></script>
</head>
<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $isSeller ? 'Seller Profile' : 'Seller Registration' ?></div>

        <form id="sellerFillForm" class="seller-fill-container" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update_seller">
            <input type="hidden" name="is_seller" value="<?= $isSeller ? '1' : '0' ?>">

            <!-- Column 1: Credential Information -->
            <div class="form-section credential-section">
                <h3>Credential Information</h3>
                <div class="upload-row">
                    <div class="upload-box" id="identityUploadBox">
                        <div class="upload-icon">
                            <img src="../assets/image/icons/user-profile-circle.svg" alt="Formal picture">
                        </div>
                        <div class="upload-preview" id="identityPreview" style="<?= $identityUrl ? 'background-image: url(' . htmlspecialchars($identityUrl) . ');' : '' ?>"></div>
                        <label for="identity_photo" class="upload-label">
                            <span class="upload-text">Upload Formal Picture</span>
                            <input type="file" id="identity_photo" name="identity_photo" accept="image/jpeg,image/png,image/gif,image/webp">
                        </label>
                        <div class="file-name" id="identityFileName"></div>
                        <div class="help-text">Max 2MB. JPG, PNG, GIF, WEBP.</div>
                    </div>
                    <div class="upload-box" id="idDocumentUploadBox">
                        <div class="upload-icon">
                            <img src="../assets/image/icons/submit-valid-id-icon.png" alt="Valid ID">
                        </div>
                        <div class="upload-preview" id="idDocumentPreview" style="<?= $idDocumentUrl ? 'background-image: url(' . htmlspecialchars($idDocumentUrl) . ');' : '' ?>"></div>
                        <label for="id_document" class="upload-label">
                            <span class="upload-text">Upload Valid ID</span>
                            <input type="file" id="id_document" name="id_document" accept="image/jpeg,image/png,image/gif,image/webp">
                        </label>
                        <div class="file-name" id="idDocumentFileName"></div>
                        <div class="help-text">Max 2MB. JPG, PNG, GIF, WEBP.</div>
                    </div>
                </div>
            </div>

            <!-- Column 2: Personal Information -->
            <div class="form-section personal-section">
                <h3>Personal Information</h3>
                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required
                           value="<?= htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="firstNameError"></div>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                           value="<?= htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="middleNameError"></div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required
                           value="<?= htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="lastNameError"></div>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate *</label>
                    <input type="date" id="birthdate" name="birthdate" required
                           value="<?= htmlspecialchars($user['birthdate'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                           max="<?= date('Y-m-d', strtotime('-13 years')) ?>">
                    <div class="error-message" id="birthdateError"></div>
                </div>
                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?= ($user['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= ($user['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= ($user['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                    <div class="error-message" id="genderError"></div>
                </div>
            </div>

            <!-- Column 3: Account & Seller Information (with buttons at bottom) -->
            <div class="form-section combined-section">
                <h3>Account & Seller Information</h3>
                
                <!-- Non-editable account info -->
                <div class="info-group">
                    <label>Email</label>
                    <p class="info-value"><?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="info-group">
                    <label>Username</label>
                    <p class="info-value"><?= htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="info-group">
                    <label>Contact Number</label>
                    <p class="info-value"><?= htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>

                <!-- Editable seller fields -->
                <div class="form-group full-width">
                    <label for="address">Address *</label>
                    <textarea id="address" name="address" rows="3" required><?= htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
                <div class="form-group">
                    <label for="business_name">Store Name</label>
                    <input type="text" id="business_name" name="business_name"
                           value="<?= htmlspecialchars($seller['business_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                           placeholder="Your store name (optional)">
                    <div class="error-message" id="businessNameError"></div>
                </div>

                <!-- Buttons inside this column, pushed to bottom -->
                <div class="column-actions">
                    <button type="button" id="backCancelBtn" class="btn btn-secondary">Back</button>
                    <button type="submit" id="saveSellerBtn" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Feedback Modal with single button -->
    <div id="feedbackModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-new-product.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];
$editMode = false;
$product = null;

// If editing, fetch product
if (isset($_GET['id'])) {
    $editMode = true;
    $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_GET['id'], $sellerId]);
    $product = $stmt->fetch();
    if (!$product) {
        header('Location: seller-manage-product.php');
        exit;
    }
    
    // Get existing images if any
    $existingImages = [];
    if (!empty($product['media_path'])) {
        $fullDir = dirname(__DIR__, 2) . '/' . $product['media_path'];
        if (is_dir($fullDir)) {
            for ($i = 1; $i <= 5; $i++) {
                $thumbFiles = glob($fullDir . 'thumbnail_' . $i . '.*');
                if (!empty($thumbFiles)) {
                    $thumbFile = basename($thumbFiles[0]);
                    $existingImages[] = getFileUrl($product['media_path'] . $thumbFile);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editMode ? 'Edit' : 'Add' ?> Product - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-new-product.css">
    <script defer src="../scripts/seller-new-product.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $editMode ? 'Edit Product' : 'Add New Product' ?></div>

        <form id="productForm" class="seller-add-product-container" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?= $editMode ? 'update' : 'add' ?>">
            <?php if ($editMode): ?>
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <?php endif; ?>

            <!-- Two-column layout -->
            <div class="form-left">
                <div class="form-section">
                    <h3>Product Details</h3>

                    <div class="form-group">
                        <label for="name">Product Name *</label>
                        <input type="text" id="name" name="name" required
                               value="<?= htmlspecialchars($product['name'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="category">Category *</label>
                        <input type="text" id="category" name="category" required
                               value="<?= htmlspecialchars($product['category'] ?? '') ?>"
                               placeholder="e.g., Electronics, Clothing, Food">
                    </div>

                    <div class="row-fields">
                        <div class="form-group half">
                            <label for="price">Price (₱) *</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" required
                                   value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                        </div>

                        <div class="form-group half">
                            <label for="stock_quantity">Stock *</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" min="0" required
                                   value="<?= htmlspecialchars($product['stock_quantity'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" rows="5"
                                  required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-right">
                <!-- Images Section - Now contains form actions at bottom -->
                <div class="form-section images-section">
                    <h3>Product Images</h3>
                    <p class="help-text">Upload at least 2 images, maximum of 5 images. Each image ≤ 2MB. JPG, PNG, GIF, WEBP.</p>

                    <div class="image-preview-container">
                        <!-- Single Preview Box -->
                        <div class="preview-box" id="mainPreviewBox">
                            <div class="preview-placeholder" id="previewPlaceholder">
                                <img src="../assets/image/icons/package.svg" alt="Upload image">
                                <span>Upload product photos</span>
                            </div>
                            <div class="preview-image" id="previewImage" style="display: none;"></div>
                            <input type="file" id="fileInput" name="images[]" accept="image/jpeg,image/png,image/gif,image/webp" multiple style="display: none;">
                        </div>

                        <!-- Pagination-style Navigation Buttons -->
                        <div class="thumbnail-navigation" id="thumbnailNavigation">
                            <!-- Generated by JavaScript -->
                        </div>
                    </div>

                    <!-- Hidden file inputs for multiple uploads (kept for form submission) -->
                    <div style="display: none;">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="file" name="images[]" class="image-input-hidden" data-index="<?= $i ?>" accept="image/jpeg,image/png,image/gif,image/webp">
                        <?php endfor; ?>
                    </div>

                    <div class="file-info" id="fileInfo">
                        <?php if ($editMode && !empty($existingImages)): ?>
                            <p><?= count($existingImages) ?> image(s) currently saved. Select new files to replace all.</p>
                        <?php else: ?>
                            <p>No images uploaded yet.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Form Actions - Inside the form section -->
                    <div class="form-actions">
                        <button type="button" id="backBtn" class="btn btn-secondary">Back</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary" disabled>Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Feedback Modal -->
    <div id="feedbackModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-manage-product.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller's products - include all products, active and inactive
$products = [];
try {
    $stmt = $connection->prepare("
        SELECT product_id, name, price, stock_quantity, is_active, media_path 
        FROM products 
        WHERE seller_id = ? 
        ORDER BY is_active DESC, date_added DESC
    ");
    $stmt->execute([$sellerId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching seller products: " . $e->getMessage());
}

// Add filter tabs separation
$activeCount = 0;
$inactiveCount = 0;
foreach ($products as $product) {
    if ($product['is_active']) {
        $activeCount++;
    } else {
        $inactiveCount++;
    }
}

// Helper function to get product image URL for seller manage page
function getSellerManageImageUrl($mediaPath) {
    // Default fallback - using an existing icon from your project
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        // Use data-storage-handler to serve thumbnail 1
        $fullPath = $mediaDir . 'thumbnail_1.png';
        return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($fullPath);
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return '../assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path
    return $mediaPath;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-manage-product.css">
    <style>
    /* Filter tabs for available/unavailable separation */
    .filter-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
        width: 100%;
    }

    .filter-tab {
        padding: 8px 20px;
        background: #ffffff;
        border-radius: 25px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 500;
        color: #666666;
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
        text-decoration: none;
        display: inline-block;
    }

    .filter-tab:hover {
        background: #FF8246;
        color: #ffffff;
        border-color: #FF8246;
        box-shadow: 0 4px 8px rgba(255, 130, 70, 0.2);
    }

    .filter-tab.active {
        background: #FF8246;
        color: #ffffff;
        border-color: #FF8246;
    }

    /* Inactive product styling */
    .product-card.inactive {
        opacity: 0.7;
        background-color: #f9f9f9;
        border-color: #cccccc;
    }

    .product-card.inactive .product-title {
        color: #666666;
    }

    .product-card.inactive .product-price {
        color: #999999;
    }

    .inactive-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 5px;
        vertical-align: middle;
    }

    .product-status.status-inactive {
        color: #999999;
    }

    /* Hide delete button for inactive products */
    .product-card.inactive .delete-btn {
        display: none;
    }

    /* Show a different message for inactive products edit button */
    .product-card.inactive .edit-btn {
        opacity: 0.7;
    }

    .product-card.inactive .edit-btn:hover {
        opacity: 1;
    }

    .product-count {
        margin-bottom: 15px;
        color: #666666;
        font-size: 0.9rem;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>My Products</h1>
        </div>

        <?php if (!empty($products)): ?>
        <!-- Filter Tabs for Available and Unavailable products -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All (<?= count($products) ?>)</span>
            <span class="filter-tab" data-filter="active">Available (<?= $activeCount ?>)</span>
            <span class="filter-tab" data-filter="inactive">Removed (<?= $inactiveCount ?>)</span>
        </div>

        <div class="product-count" id="productCount">
            Showing all products
        </div>

        <div class="products-grid" id="productsGrid">
            <?php foreach ($products as $product): 
                    $isActive = $product['is_active'] ? true : false;
                    $inactiveClass = $isActive ? '' : 'inactive';
                ?>
            <div class="product-card <?= $inactiveClass ?>" data-active="<?= $isActive ? '1' : '0' ?>">
                <?php 
                    // FIXED: Use the helper function to get image URL
                    $imageUrl = getSellerManageImageUrl($product['media_path'] ?? '');
                    ?>
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                        onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                </div>
                <div class="product-info">
                    <h3 class="product-title">
                        <?php echo htmlspecialchars($product['name']); ?>
                        <?php if (!$isActive): ?>
                        <span class="inactive-badge">Removed</span>
                        <?php endif; ?>
                    </h3>
                    <?php if ($isActive): ?>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <?php else: ?>
                    <p class="product-price" style="display: none;">₱<?php echo number_format($product['price'], 2); ?>
                    </p>
                    <p class="product-stock" style="display: none;">Stock:
                        <?php echo (int)$product['stock_quantity']; ?></p>
                    <?php endif; ?>
                    <p class="product-status status-<?php echo $isActive ? 'active' : 'inactive'; ?>">
                        <?php echo $isActive ? 'Available' : 'Removed'; ?>
                    </p>
                    <div class="product-actions">
                        <a href="seller-new-product.php?id=<?php echo $product['product_id']; ?>"
                            class="btn btn-primary edit-btn">Edit</a>
                        <?php if ($isActive): ?>
                        <button class="btn btn-secondary delete-btn"
                            data-id="<?php echo $product['product_id']; ?>">Remove</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/package.svg" alt="No products" class="empty-state-icon">
                <h2>No Products Yet</h2>
                <p>You haven't added any products to your store.</p>
                <a href="seller-new-product.php" class="btn btn-primary">Add Your First Product</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/trash.svg" alt="Remove">
            </div>
            <h3 class="modal-title">Confirm Removal</h3>
            <p class="modal-message">Are you sure you want to remove this product? It will no longer be available for
                purchase, but order history will remain.</p>
            <div class="modal-actions">
                <button id="cancelDelete" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmDelete" class="modal-btn modal-btn-confirm">Remove</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    // Filter tabs functionality for seller-manage-product
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        const productCards = document.querySelectorAll('.product-card');
        const productCount = document.getElementById('productCount');

        function updateProductCount(filter) {
            if (!productCount) return;

            let count = 0;
            if (filter === 'all') {
                count = productCards.length;
            } else if (filter === 'active') {
                count = document.querySelectorAll('.product-card[data-active="1"]').length;
            } else if (filter === 'inactive') {
                count = document.querySelectorAll('.product-card[data-active="0"]').length;
            }

            if (filter === 'all') {
                productCount.textContent = `Showing all products (${count})`;
            } else if (filter === 'active') {
                productCount.textContent = `Showing available products (${count})`;
            } else if (filter === 'inactive') {
                productCount.textContent = `Showing removed products (${count})`;
            }
        }

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Update active tab
                filterTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;

                // Filter products
                productCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'flex';
                    } else if (filter === 'active') {
                        card.style.display = card.dataset.active === '1' ? 'flex' :
                            'none';
                    } else if (filter === 'inactive') {
                        card.style.display = card.dataset.active === '0' ? 'flex' :
                            'none';
                    }
                });

                updateProductCount(filter);
            });
        });

        // Initial count
        updateProductCount('all');
    });
    </script>

    <script src="../scripts/seller-manage-product.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-process-order.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$seller_id = $_SESSION['seller_id'];

$stmt = $connection->prepare("SELECT business_name FROM sellers WHERE seller_id = ?");
$stmt->execute([$seller_id]);
$seller = $stmt->fetch();
$business_name = $seller['business_name'] ?? 'Your Store';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Orders - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-process-order.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Process Orders</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <!-- Orders Container -->
        <div id="sellerOrdersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Confirm">
            </div>
            <h3 id="confirmTitle" class="modal-title">Confirm Action</h3>
            <p id="confirmMessage" class="modal-message">Are you sure?</p>
            <div class="modal-actions">
                <button id="cancelAction" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmAction" class="modal-btn modal-btn-confirm">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/seller-process-order.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/scripts/index.js`

**Status:** `FOUND`

```javascript
// Hero Slider Functionality
class HeroSlider {
    constructor() {
        this.slides = document.querySelectorAll('.slide');
        this.prevBtn = document.querySelector('.prev-slide');
        this.nextBtn = document.querySelector('.next-slide');
        this.currentSlide = 0;
        this.slideInterval = null;
        this.slideDuration = 5000;
        
        this.init();
    }
    
    init() {
        if (this.slides.length === 0) return;
        
        this.showSlide(this.currentSlide);
        
        // Auto slide
        this.startAutoSlide();
        
        // Event listeners
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => {
                this.prevSlide();
                this.resetAutoSlide();
            });
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => {
                this.nextSlide();
                this.resetAutoSlide();
            });
        }
        
        // Pause on hover
        const slider = document.querySelector('.hero-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => this.stopAutoSlide());
            slider.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        // Touch/swipe support for mobile
        this.initTouchEvents();
    }
    
    showSlide(index) {
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.slides[index].classList.add('active');
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    startAutoSlide() {
        this.stopAutoSlide();
        this.slideInterval = setInterval(() => this.nextSlide(), this.slideDuration);
    }
    
    stopAutoSlide() {
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
            this.slideInterval = null;
        }
    }
    
    resetAutoSlide() {
        this.stopAutoSlide();
        this.startAutoSlide();
    }
    
    initTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;
        
        const slider = document.querySelector('.hero-slider');
        if (!slider) return;
        
        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        slider.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
        });
    }
    
    handleSwipe(startX, endX) {
        const minSwipeDistance = 50;
        
        if (startX - endX > minSwipeDistance) {
            this.nextSlide();
        } else if (endX - startX > minSwipeDistance) {
            this.prevSlide();
        }
        this.resetAutoSlide();
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
    
    // REMOVE the loadFeaturedProducts() call - PHP handles this
    // loadFeaturedProducts();
});

// REMOVE or comment out the loadFeaturedProducts function entirely
// It's conflicting with PHP-generated content
/*
async function loadFeaturedProducts() {
    // This will be replaced with actual API call
    const productsGrid = document.querySelector('.products-grid');
    if (!productsGrid) return;
    
    // Placeholder - replace with actual API call
    setTimeout(() => {
        productsGrid.innerHTML = `
            <div class="product-card">
                <img src="https://via.placeholder.com/250x200" alt="Product" class="product-image">
                <div class="product-info">
                    <h3>Sample Product 1</h3>
                    <p class="product-price">₱999.99</p>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        `;
    }, 1000);
}
*/
```

---

## File: `Crooks-Cart-Collectives/scripts/header.js`

**Status:** `FOUND`

```javascript
/* JavaScript File Content */
document.addEventListener("DOMContentLoaded", () => {
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 100);
    }
    
    // Initialize header after a short delay to ensure DOM is ready
    // Use a flag to prevent double initialization
    if (!window.headerInitialized) {
        setTimeout(() => {
            initializeHeader();
        }, 50);
        
        setTimeout(() => {
            const header = document.querySelector('.header-bar');
            const mobileNav = document.getElementById('mobileNav');
            
            if (header) header.classList.remove('no-transition');
            if (mobileNav) mobileNav.classList.remove('no-transition');
        }, 300);
        
        window.headerInitialized = true;
    }
});

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        logo.onerror = function() {
            this.src = "assets/image/brand/Logo.png";
        };
    }
    
    // Mobile menu functionality - FIXED VERSION
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu'); // Debug log
        
        // Remove any existing inline styles that might interfere
        mobileNav.style.transform = '';
        mobileNav.style.display = '';
        
        // Remove any existing backdrop to avoid duplicates
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Ensure mobile nav is hidden by default
        mobileNav.classList.remove('open');
        
        // Function to toggle menu
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            console.log('Toggling menu, currently open:', isOpen); // Debug log
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
            
            // Force remove any inline transform that might linger
            mobileNav.style.transform = '';
            
            // Force a reflow to ensure CSS transition picks up the change
            void mobileNav.offsetHeight;
            
            // Debug - log final computed transform
            console.log('After toggle, computed transform:', window.getComputedStyle(mobileNav).transform);
        }
        
        // Function to close menu
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = ''; // clear any inline
            }
        }
        
        // Event listeners
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking a link inside mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle window resize - close mobile menu on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1005 && mobileNav.classList.contains('open')) {
                closeMenu();
            }
        });
        
        // Debug - log initial state
        console.log('Mobile nav initial classes:', mobileNav.className);
        console.log('Mobile nav initial transform:', window.getComputedStyle(mobileNav).transform);
        
        // Mark as initialized
        window.menuInitialized = true;
        
    } else {
        console.error('Menu elements not found on first attempt:', {
            menuButton: !!menuButton,
            mobileNav: !!mobileNav
        });
        
        // Try again after a short delay (in case elements are loaded dynamically)
        if (!window.menuRetryAttempted) {
            window.menuRetryAttempted = true;
            setTimeout(() => {
                console.log('Retrying menu initialization...');
                initializeHeader(); // Recursive call to try again
            }, 500);
        }
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
    
    // Update cart count if user is logged in
    updateCartCount();
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage || 
                (currentPage === 'index.php' && filename === 'index.php')) {
                link.classList.add('active');
            }
        }
    });
}

function adjustContentMargin() {
    const header = document.querySelector('.header-bar');
    const content = document.querySelector('.content');
    if (header && content) {
        const headerHeight = header.offsetHeight;
        content.style.marginTop = headerHeight + 'px';
    }
}

// Function to update cart count
async function updateCartCount() {
    // Check if user is logged in by looking for logout modal or checking session via PHP
    const logoutModal = document.getElementById('logoutModal');
    if (!logoutModal) return; // User not logged in
    
    const cartCountEl = document.getElementById('cartCount');
    if (!cartCountEl) return;
    
    try {
        // Determine correct path for API call
        const currentPath = window.location.pathname;
        let apiPath = '../database/cart-handler.php?action=get_count';
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/cart-handler.php?action=get_count';
        } else {
            apiPath = 'database/cart-handler.php?action=get_count';
        }
        
        const response = await fetch(apiPath);
        const data = await response.json();
        
        if (data.status === 'success' && data.count > 0) {
            cartCountEl.textContent = data.count;
            cartCountEl.style.display = 'inline';
        } else {
            cartCountEl.style.display = 'none';
        }
    } catch (e) {
        console.error('Failed to fetch cart count', e);
    }
}

// Export functions for use in other scripts if needed
window.HeaderFunctions = {
    updateCartCount: updateCartCount,
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};

// Add a small test to verify the menu is working
window.testMenu = function() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    
    if (menuButton && mobileNav) {
        console.log('Menu button found:', menuButton);
        console.log('Mobile nav found:', mobileNav);
        console.log('Mobile nav current classes:', mobileNav.className);
        console.log('Mobile nav computed style display:', window.getComputedStyle(mobileNav).display);
        console.log('Mobile nav computed style transform:', window.getComputedStyle(mobileNav).transform);
        console.log('Mobile nav computed style visibility:', window.getComputedStyle(mobileNav).visibility);
        console.log('Mobile nav computed style opacity:', window.getComputedStyle(mobileNav).opacity);
        
        // Manually toggle to test
        if (mobileNav.classList.contains('open')) {
            mobileNav.classList.remove('open');
        } else {
            mobileNav.classList.add('open');
        }
        mobileNav.style.transform = ''; // clear any inline
        console.log('Mobile nav classes after manual toggle:', mobileNav.className);
        console.log('Mobile nav computed transform after toggle:', window.getComputedStyle(mobileNav).transform);
    } else {
        console.log('Menu elements not found for test');
    }
};

// Run test after a short delay
setTimeout(() => {
    if (window.location.href.includes('debug') || window.location.hash === '#debug') {
        window.testMenu();
    }
}, 1000);
```

---

## File: `Crooks-Cart-Collectives/scripts/contact.js`

**Status:** `FOUND`

```javascript
/* ============================================
   CONTACT PAGE JAVASCRIPT
   Handles form validation, submission, and UI interactions
============================================ */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const contactForm = document.getElementById('contactForm');
    const modal = document.getElementById('notificationModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalCloseBtn = document.getElementById('modalCloseBtn');
    const successMessage = document.getElementById('formSuccessMessage');
    
    // Form Fields
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('emailAddress');
    const studentIdInput = document.getElementById('studentId');
    const subjectSelect = document.getElementById('inquirySubject');
    const messageInput = document.getElementById('inquiryMessage');

    // State
    let isSubmitting = false;

    // ===== HELPER FUNCTIONS =====

    /**
     * Shows a notification modal with the given message
     * @param {string} message - The message to display
     */
    function showNotification(message) {
        if (!modal || !modalMessage) return;
        
        modalMessage.textContent = message;
        modal.classList.remove('modal--hidden');
    }

    /**
     * Closes the notification modal
     */
    function closeNotification() {
        if (modal) {
            modal.classList.add('modal--hidden');
        }
    }

    /**
     * Validates email format
     * @param {string} email - The email to validate
     * @returns {boolean} - True if email is valid
     */
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    /**
     * Validates phone number (optional field)
     * @param {string} phone - The phone number to validate
     * @returns {boolean} - True if phone is valid or empty
     */
    function isValidPhone(phone) {
        if (!phone) return true;
        const cleaned = phone.replace(/\D/g, '');
        return cleaned.length === 11 && cleaned.startsWith('09') ||
               cleaned.length === 12 && cleaned.startsWith('63') ||
               cleaned.length === 13 && cleaned.startsWith('+63');
    }

    /**
     * Shows error message for a specific field
     * @param {string} fieldId - The ID of the field
     * @param {string} message - The error message
     */
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + 'Error');
        
        if (field && errorElement) {
            field.classList.add('error');
            errorElement.textContent = message;
            errorElement.setAttribute('aria-live', 'polite');
        }
    }

    /**
     * Clears error for a specific field
     * @param {string} fieldId - The ID of the field
     */
    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + 'Error');
        
        if (field && errorElement) {
            field.classList.remove('error');
            errorElement.textContent = '';
        }
    }

    /**
     * Clears all field errors
     */
    function clearAllErrors() {
        ['fullName', 'emailAddress', 'inquirySubject', 'inquiryMessage'].forEach(fieldId => {
            clearFieldError(fieldId);
        });
    }

    // ===== EVENT LISTENERS =====

    // Modal close button
    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeNotification);
    }

    // Close modal when clicking outside
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeNotification();
        });
    }

    // Real-time validation on blur
    if (fullNameInput) {
        fullNameInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('fullName', 'Name is required');
            } else {
                clearFieldError('fullName');
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('emailAddress', 'Email is required');
            } else if (!isValidEmail(this.value)) {
                showFieldError('emailAddress', 'Please enter a valid email address');
            } else {
                clearFieldError('emailAddress');
            }
        });
    }

    if (subjectSelect) {
        subjectSelect.addEventListener('blur', function() {
            if (!this.value) {
                showFieldError('inquirySubject', 'Please select a subject');
            } else {
                clearFieldError('inquirySubject');
            }
        });
    }

    if (messageInput) {
        messageInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('inquiryMessage', 'Message is required');
            } else if (this.value.trim().length < 10) {
                showFieldError('inquiryMessage', 'Message must be at least 10 characters');
            } else {
                clearFieldError('inquiryMessage');
            }
        });
    }

    // Auto-expand textarea
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
            
            // Clear error on input
            if (this.value.trim().length >= 10) {
                clearFieldError('inquiryMessage');
            }
        });
    }

    // ===== FORM SUBMISSION =====
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            clearAllErrors();
            
            // Validate all fields
            let isValid = true;
            
            // Name validation
            if (!fullNameInput.value.trim()) {
                showFieldError('fullName', 'Name is required');
                isValid = false;
            }
            
            // Email validation
            if (!emailInput.value.trim()) {
                showFieldError('emailAddress', 'Email is required');
                isValid = false;
            } else if (!isValidEmail(emailInput.value)) {
                showFieldError('emailAddress', 'Please enter a valid email address');
                isValid = false;
            }
            
            // Subject validation
            if (!subjectSelect.value) {
                showFieldError('inquirySubject', 'Please select a subject');
                isValid = false;
            }
            
            // Message validation
            if (!messageInput.value.trim()) {
                showFieldError('inquiryMessage', 'Message is required');
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                showFieldError('inquiryMessage', 'Message must be at least 10 characters');
                isValid = false;
            }
            
            if (!isValid) {
                showNotification('Please fix the errors in the form');
                return;
            }
            
            // Show loading state
            isSubmitting = true;
            const submitBtn = contactForm.querySelector('.contact-form__submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            try {
                // Simulate form submission (replace with actual API endpoint)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Show success message
                if (successMessage) {
                    successMessage.style.display = 'block';
                }
                
                // Reset form
                contactForm.reset();
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    if (successMessage) {
                        successMessage.style.display = 'none';
                    }
                }, 5000);
                
            } catch (error) {
                console.error('Contact form error:', error);
                showNotification('Network error. Please try again later.');
            } finally {
                // Reset button
                isSubmitting = false;
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }
});
```

---

## File: `Crooks-Cart-Collectives/scripts/sign-in.js`

**Status:** `FOUND`

```javascript
/* JavaScript File Content */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signinForm');
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    const identifierInput = document.getElementById('identifier');
    const passwordInput = document.getElementById('password');
    const identifierError = document.getElementById('identifierError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');

    let isModalOpen = false;
    let isSubmitting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordInput && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    function clearErrors() {
        identifierError.textContent = '';
        passwordError.textContent = '';
        identifierInput.classList.remove('error');
        passwordInput.classList.remove('error');
    }

    function showFieldError(field, message) {
        const errorElement = field === 'identifier' ? identifierError : passwordError;
        const inputElement = field === 'identifier' ? identifierInput : passwordInput;

        errorElement.textContent = message;
        inputElement.classList.add('error');
    }

    // ============= MODAL EVENT LISTENERS =============
    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= BLUR VALIDATION =============
    identifierInput.addEventListener('blur', () => {
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
        } else {
            identifierError.textContent = '';
            identifierInput.classList.remove('error');
        }
    });

    passwordInput.addEventListener('blur', () => {
        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
        } else {
            passwordError.textContent = '';
            passwordInput.classList.remove('error');
        }
    });

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (isSubmitting) return;

        clearErrors();

        // Client-side validation
        let isValid = true;
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
            isValid = false;
        }

        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
            isValid = false;
        }

        if (!isValid) {
            showNotifier('Please fix the errors above');
            return;
        }

        // Show loading state
        isSubmitting = true;
        const submitBtn = form.querySelector('.btn-primary');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Signing In...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(form);

            // Add the current redirect parameter from URL to form data
            const urlParams = new URLSearchParams(window.location.search);
            const redirectParam = urlParams.get('redirect');
            if (redirectParam) {
                formData.append('redirect', redirectParam);
            }

            const response = await fetch('../database/sign-in-handler.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const responseText = await response.text();
            let result;

            try {
                result = JSON.parse(responseText);
            } catch (parseError) {
                console.error('JSON Parse Error:', responseText);
                showNotifier('Server returned invalid response. Please try again.');
                return;
            }

            if (result.status === 'success') {
                showNotifier('Login successful! Redirecting...');
                
                // Use the redirect URL from the server response
                let redirectUrl = result.redirect;
                
                // Log the redirect for debugging
                console.log('Redirecting to:', redirectUrl);

                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 1500);
            } else {
                // Handle error messages - always show generic message to user
                if (result.message === 'invalid-credentials') {
                    showNotifier('Invalid credentials. Please try again.');
                    
                    // Don't highlight specific fields for security
                    // Just highlight both with a generic error
                    identifierInput.classList.add('error');
                    passwordInput.classList.add('error');
                } else if (result.message === 'All fields are required') {
                    showNotifier('Please fill in all required fields.');
                } else {
                    showNotifier('Login failed. Please try again.');
                }
            }
        } catch (error) {
            console.error('Login error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            // Reset button state
            isSubmitting = false;
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Focus on identifier field
    setTimeout(() => {
        identifierInput.focus();
    }, 100);
});
```

---

## File: `Crooks-Cart-Collectives/scripts/sign-out.js`

**Status:** `FOUND`

```javascript
// Crooks-Cart-Collectives/scripts/sign-out.js
document.addEventListener('DOMContentLoaded', () => {
    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    
    let isProcessing = false;

    if (!logoutTriggers.length || !logoutModal) return;

    // Show modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.style.display = 'flex';
        });
    });

    // Hide modal on cancel
    if (cancelLogout) {
        cancelLogout.addEventListener('click', () => {
            logoutModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            logoutModal.style.display = 'none';
        }
    });

    // Handle confirm logout
    if (confirmLogout) {
        confirmLogout.addEventListener('click', async () => {
            if (isProcessing) return;
            
            isProcessing = true;
            const originalText = confirmLogout.textContent;
            confirmLogout.textContent = 'Logging out...';
            confirmLogout.disabled = true;

            try {
                const response = await fetch('../database/sign-out-handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (result.status === 'success') {
                    // FORCE a complete page reload from the server, not from cache
                    // Using window.location.replace() with cache-busting parameter
                    window.location.replace(result.redirect + '?t=' + Date.now());
                } else {
                    console.error('Logout error:', result.message);
                    window.location.replace('../index.php?t=' + Date.now());
                }
            } catch (error) {
                console.error('Logout error:', error);
                // Force reload to index.php with cache busting
                window.location.replace('/Crooks-Cart-Collectives/index.php?t=' + Date.now());
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && logoutModal.style.display === 'flex') {
            logoutModal.style.display = 'none';
        }
    });
});
```

---

## File: `Crooks-Cart-Collectives/scripts/sign-up.js`

**Status:** `FOUND`

```javascript
/* JavaScript File Content */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signupForm');
    const clearButton = document.getElementById('clearForm');
    const submitButton = form.querySelector('.btn-primary');
    
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    const emailField = document.getElementById('email');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    const contactField = document.getElementById('contact_number');
    const birthdateField = document.getElementById('birthdate');
    const addressField = document.getElementById('address');
    
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    let isModalOpen = false;
    let isSubmitting = false;
    let isFormatting = false;

    if (togglePassword && passwordField && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }
    
    if (toggleConfirmPassword && confirmPasswordField && confirmPasswordIcon) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            
            if (type === 'text') {
                confirmPasswordIcon.src = '../assets/image/icons/password-unhide.svg';
                confirmPasswordIcon.alt = 'Show password';
            } else {
                confirmPasswordIcon.src = '../assets/image/icons/password-hide.svg';
                confirmPasswordIcon.alt = 'Hide password';
            }
        });
    }

    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    function highlightField(field, highlight = true) {
        if (!field) return;
        if (highlight) {
            field.style.borderColor = 'red';
            field.style.boxShadow = '0 0 5px rgba(255, 0, 0, 0.5)';
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
        }
    }

    function resetHighlights() {
        form.querySelectorAll('input, select, textarea').forEach(field => highlightField(field, false));
    }

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function formatPhilippineNumber(input) {
        if (isFormatting) return;
        isFormatting = true;
        
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('63') && value.length <= 12) {
            if (value.length > 2) {
                let formatted = '+63';
                if (value.length > 5) {
                    formatted += ' ' + value.substring(2, 5);
                } else {
                    formatted += ' ' + value.substring(2);
                }
                if (value.length > 8) {
                    formatted += ' ' + value.substring(5, 8);
                }
                if (value.length > 11) {
                    formatted += ' ' + value.substring(8, 12);
                }
                input.value = formatted;
            }
        } else if (value.startsWith('0') && value.length <= 11) {
            if (value.length > 4) {
                let formatted = value.substring(0, 4) + ' ' + value.substring(4, 7);
                if (value.length > 7) {
                    formatted += ' ' + value.substring(7, 11);
                }
                input.value = formatted;
            } else {
                input.value = value;
            }
        } else if (value.startsWith('9') && value.length <= 10) {
            value = '0' + value;
            if (value.length > 4) {
                let formatted = value.substring(0, 4) + ' ' + value.substring(4, 7);
                if (value.length > 7) {
                    formatted += ' ' + value.substring(7, 11);
                }
                input.value = formatted;
            } else {
                input.value = value;
            }
        } else {
            input.value = value;
        }
        
        setTimeout(() => {
            isFormatting = false;
        }, 10);
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/\D/g, '');
        return (cleaned.length === 11 && cleaned.startsWith('09')) ||
               (cleaned.length === 12 && cleaned.startsWith('63')) ||
               (cleaned.length === 10 && cleaned.startsWith('9')) ||
               (cleaned.length === 13 && cleaned.startsWith('063')) ||
               (cleaned.length === 13 && cleaned.startsWith('639'));
    }

    function calculateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function validatePassword(password) {
        if (password.length < 8) {
            return { valid: false, message: 'Password must be at least 8 characters long.' };
        }
        if (password.length > 16) {
            return { valid: false, message: 'Password cannot exceed 16 characters.' };
        }
        if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
            return { valid: false, message: 'Password must contain both uppercase and lowercase letters.' };
        }
        if (!/[0-9]/.test(password)) {
            return { valid: false, message: 'Password must contain number.' };
        }
        return { valid: true, message: '' };
    }

    function validateUsername(username) {
        if (username.length < 2) {
            return { valid: false, message: 'Username must be at least 2 characters long.' };
        }
        if (username.length > 15) {
            return { valid: false, message: 'Username cannot exceed 15 characters.' };
        }
        return { valid: true, message: '' };
    }

    passwordField.addEventListener('input', () => {
        highlightField(passwordField, false);
    });

    confirmPasswordField.addEventListener('input', () => {
        highlightField(confirmPasswordField, false);
    });

    usernameField.addEventListener('input', () => {
        highlightField(usernameField, false);
    });

    contactField.addEventListener('input', function(e) {
        formatPhilippineNumber(this);
    });

    contactField.addEventListener('blur', function() {
        if (this.value && !isPhoneValid(this.value)) {
            highlightField(this, true);
        } else {
            highlightField(this, false);
        }
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;
        let missing = [];
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                highlightField(field);
                missing.push(field.name || field.id);
                isValid = false;
            }
        });
        
        if (!isValid) {
            if (missing.length === 1) {
                showNotifier(`Please fill in the ${missing[0].replace(/_/g, ' ')} field.`);
            } else {
                showNotifier('Please fill in all required fields.');
            }
            return;
        }
        
        if (!isEmailValid(emailField.value)) {
            highlightField(emailField);
            showNotifier('Please enter a valid email address.');
            return;
        }
        
        if (!isPhoneValid(contactField.value)) {
            highlightField(contactField);
            showNotifier('Please enter a valid Philippine phone number (e.g., 0912 345 6789 or +63 912 345 6789).');
            return;
        }
        
        const usernameValidation = validateUsername(usernameField.value);
        if (!usernameValidation.valid) {
            highlightField(usernameField);
            showNotifier(usernameValidation.message);
            return;
        }
        
        const passwordValidation = validatePassword(passwordField.value);
        if (!passwordValidation.valid) {
            highlightField(passwordField);
            showNotifier(passwordValidation.message);
            return;
        }
        
        if (passwordField.value !== confirmPasswordField.value) {
            highlightField(passwordField);
            highlightField(confirmPasswordField);
            showNotifier('Passwords do not match.');
            return;
        }
        
        if (birthdateField.value) {
            const age = calculateAge(birthdateField.value);
            if (age < 13) {
                highlightField(birthdateField);
                showNotifier('You must be at least 13 years old to register.');
                return;
            } else if (age > 120) {
                highlightField(birthdateField);
                showNotifier('Please enter a valid birthdate.');
                return;
            }
        }
        
        if (addressField.value.length < 5) {
            highlightField(addressField);
            showNotifier('Please enter a valid address.');
            return;
        }
        
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        try {
            const formData = new FormData(form);

            const response = await fetch('../database/sign-up-handler.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                const delayTime = result.delay || 5000;
                showNotifier(result.message || 'Account created successfully! Please sign in.');
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, delayTime);
            } else {
                console.error('Signup error details:', result);
                
                if (result.message === 'duplicate-email') {
                    highlightField(emailField);
                    showNotifier('Email already exists. Please use a different email.');
                } else if (result.message === 'username-unavailable') {
                    highlightField(usernameField);
                    showNotifier('Username unavailable. Please choose a different username.');
                } else if (result.message === 'duplicate-contact') {
                    highlightField(contactField);
                    showNotifier('Phone number already registered. Please use a different number.');
                } else if (result.message === 'username-too-short') {
                    highlightField(usernameField);
                    showNotifier('Username must be at least 2 characters long.');
                } else if (result.message === 'username-too-long') {
                    highlightField(usernameField);
                    showNotifier('Username cannot exceed 15 characters.');
                } else if (result.message === 'password-too-short') {
                    highlightField(passwordField);
                    showNotifier('Password must be at least 8 characters long.');
                } else if (result.message === 'password-too-long') {
                    highlightField(passwordField);
                    showNotifier('Password cannot exceed 16 characters.');
                } else if (result.message === 'password-needs-mixed-case') {
                    highlightField(passwordField);
                    showNotifier('Password must contain both uppercase and lowercase letters.');
                } else if (result.message === 'password-needs-number') {
                    highlightField(passwordField);
                    showNotifier('Password must contain number.');
                } else if (result.message === 'passwords-mismatch') {
                    highlightField(passwordField);
                    highlightField(confirmPasswordField);
                    showNotifier('Passwords do not match.');
                } else if (result.message === 'invalid-email') {
                    highlightField(emailField);
                    showNotifier('Please enter a valid email address.');
                } else if (result.message === 'invalid-contact') {
                    highlightField(contactField);
                    showNotifier('Please enter a valid Philippine phone number (e.g., 0912 345 6789 or +63 912 345 6789).');
                } else if (result.message === 'underage') {
                    highlightField(birthdateField);
                    showNotifier('You must be at least 13 years old to register.');
                } else if (result.message === 'invalid-age') {
                    highlightField(birthdateField);
                    showNotifier('Please enter a valid birthdate.');
                } else if (result.message === 'missing-field') {
                    const field = result.field || '';
                    if (field) {
                        const fieldElement = document.getElementById(field);
                        if (fieldElement) highlightField(fieldElement);
                    }
                    showNotifier('Please fill in all required fields.');
                } else {
                    showNotifier('Oops! There was a problem creating your account. Please try again.');
                }
            }
        } catch (error) {
            console.error('Signup error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    });

    if (clearButton) {
        clearButton.addEventListener('click', () => {
            form.reset();
            resetHighlights();
        });
    }
});
```

---

## File: `Crooks-Cart-Collectives/scripts/error-handler.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/error-handler.js */
/* Global error handling and logging functions */

(function() {
    'use strict';

    // Store original console methods
    const originalConsole = {
        log: console.log,
        error: console.error,
        warn: console.warn,
        info: console.info
    };

    // Error logging configuration
    const ERROR_CONFIG = {
        logToConsole: true,
        logToServer: false, // Set to true to enable server-side logging
        maxLogEntries: 100,
        showNotifications: true
    };

    // In-memory log storage
    const errorLog = [];
    const MAX_LOG_ENTRIES = 100;

    /**
     * Format error for logging
     * @param {Error|string} error - The error object or message
     * @param {string} source - Source of the error
     * @returns {Object} Formatted error object
     */
    function formatError(error, source = 'unknown') {
        const timestamp = new Date().toISOString();
        const userAgent = navigator.userAgent;
        const url = window.location.href;

        if (error instanceof Error) {
            return {
                timestamp,
                source,
                message: error.message,
                stack: error.stack,
                name: error.name,
                url,
                userAgent
            };
        }

        return {
            timestamp,
            source,
            message: String(error),
            stack: new Error().stack,
            url,
            userAgent
        };
    }

    /**
     * Add error to log
     * @param {Object} formattedError - Formatted error object
     */
    function addToLog(formattedError) {
        errorLog.unshift(formattedError);
        
        // Keep log size manageable
        if (errorLog.length > MAX_LOG_ENTRIES) {
            errorLog.pop();
        }

        // Store in sessionStorage for debugging
        try {
            sessionStorage.setItem('errorLog', JSON.stringify(errorLog.slice(0, 10)));
        } catch (e) {
            // Ignore storage errors
        }
    }

    /**
     * Send error to server
     * @param {Object} formattedError - Formatted error object
     */
    function sendToServer(formattedError) {
        if (!ERROR_CONFIG.logToServer) return;

        // Determine correct path for API
        const currentPath = window.location.pathname;
        let apiPath = '../database/error-log-handler.php';
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/error-log-handler.php';
        } else if (currentPath.includes('/database/')) {
            apiPath = 'error-log-handler.php';
        } else {
            apiPath = 'database/error-log-handler.php';
        }

        // Send error to server (fire and forget)
        fetch(apiPath, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formattedError),
            keepalive: true // Ensure request completes even if page unloads
        }).catch(e => {
            // Fail silently - don't create infinite loops
            originalConsole.error.call(console, 'Failed to send error to server:', e);
        });
    }

    /**
     * Show user-friendly error notification
     * @param {string} message - Error message to display
     */
    function showErrorNotification(message) {
        if (!ERROR_CONFIG.showNotifications) return;

        // Check if notification already exists
        if (document.querySelector('.global-error-notification')) {
            return;
        }

        const notification = document.createElement('div');
        notification.className = 'global-error-notification';
        notification.setAttribute('role', 'alert');
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-icon">⚠️</span>
                <span class="notification-message">${message}</span>
                <button class="notification-close" aria-label="Close">&times;</button>
            </div>
        `;

        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px 20px;
            border-radius: 8px;
            border-left: 4px solid #dc3545;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 400px;
            animation: slideInRight 0.3s ease;
        `;

        // Add close button functionality
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.style.cssText = `
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0 5px;
            margin-left: 10px;
            color: #721c24;
        `;

        closeBtn.addEventListener('click', () => {
            notification.remove();
        });

        // Auto-remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);

        document.body.appendChild(notification);

        // Add animations if not already present
        if (!document.querySelector('#error-notification-styles')) {
            const style = document.createElement('style');
            style.id = 'error-notification-styles';
            style.textContent = `
                @keyframes slideInRight {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                @keyframes slideOutRight {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    /**
     * Global error handler
     */
    window.addEventListener('error', function(event) {
        const formattedError = formatError(event.error || event.message, 'window.onerror');
        
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.call(console, 'Global error caught:', formattedError);
        }
        
        addToLog(formattedError);
        sendToServer(formattedError);
        
        // Show notification for critical errors
        if (event.error && event.error.message) {
            showErrorNotification('An error occurred. Please try again.');
        }
    });

    /**
     * Unhandled promise rejection handler
     */
    window.addEventListener('unhandledrejection', function(event) {
        const formattedError = formatError(event.reason, 'unhandledrejection');
        
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.call(console, 'Unhandled promise rejection:', formattedError);
        }
        
        addToLog(formattedError);
        sendToServer(formattedError);
        
        showErrorNotification('An unexpected error occurred.');
    });

    /**
     * Override console methods to capture errors
     */
    console.error = function() {
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.apply(console, arguments);
        }
        
        // Convert arguments to string
        const args = Array.from(arguments);
        const message = args.map(arg => {
            if (arg instanceof Error) {
                return arg.message;
            }
            if (typeof arg === 'object') {
                try {
                    return JSON.stringify(arg);
                } catch (e) {
                    return String(arg);
                }
            }
            return String(arg);
        }).join(' ');

        const formattedError = formatError(message, 'console.error');
        addToLog(formattedError);
    };

    /**
     * Public API for error handling
     */
    window.ErrorHandler = {
        /**
         * Log an error manually
         * @param {Error|string} error - The error to log
         * @param {string} source - Error source
         */
        logError: function(error, source = 'manual') {
            const formattedError = formatError(error, source);
            
            if (ERROR_CONFIG.logToConsole) {
                originalConsole.error.call(console, 'Manual error log:', formattedError);
            }
            
            addToLog(formattedError);
            sendToServer(formattedError);
        },

        /**
         * Show user-friendly error message
         * @param {string} message - Message to display
         */
        showError: function(message) {
            showErrorNotification(message);
        },

        /**
         * Get recent error logs
         * @param {number} limit - Number of logs to return
         * @returns {Array} Recent error logs
         */
        getRecentLogs: function(limit = 10) {
            return errorLog.slice(0, limit);
        },

        /**
         * Clear error logs
         */
        clearLogs: function() {
            errorLog.length = 0;
            sessionStorage.removeItem('errorLog');
        },

        /**
         * Configure error handler
         * @param {Object} config - Configuration options
         */
        configure: function(config) {
            Object.assign(ERROR_CONFIG, config);
        }
    };

    // Log initialization
    originalConsole.log.call(console, 'Error handler initialized');
})();
```

---

## File: `Crooks-Cart-Collectives/scripts/showcase-slider.js`

**Status:** `FOUND`

```javascript
class ShowcaseSlider {
    constructor() {
        this.slides = document.querySelectorAll('.showcase-slide');
        this.prevBtn = document.querySelector('.prev-slide');
        this.nextBtn = document.querySelector('.next-slide');
        this.currentSlide = 0;
        this.slideInterval = null;
        this.slideDuration = 5000;
        
        this.init();
    }
    
    init() {
        if (this.slides.length === 0) return;
        
        this.showSlide(this.currentSlide);
        this.startAutoSlide();
        
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => {
                this.prevSlide();
                this.resetAutoSlide();
            });
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => {
                this.nextSlide();
                this.resetAutoSlide();
            });
        }
        
        const slider = document.querySelector('.showcase-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => this.stopAutoSlide());
            slider.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        this.initTouchEvents();
        this.initKeyboardEvents();
    }
    
    showSlide(index) {
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.slides[index].classList.add('active');
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    startAutoSlide() {
        this.stopAutoSlide();
        this.slideInterval = setInterval(() => this.nextSlide(), this.slideDuration);
    }
    
    stopAutoSlide() {
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
            this.slideInterval = null;
        }
    }
    
    resetAutoSlide() {
        this.stopAutoSlide();
        this.startAutoSlide();
    }
    
    initTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;
        
        const slider = document.querySelector('.showcase-slider');
        if (!slider) return;
        
        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
            this.stopAutoSlide();
        });
        
        slider.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
            this.resetAutoSlide();
        });
    }
    
    initKeyboardEvents() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.prevSlide();
                this.resetAutoSlide();
            } else if (e.key === 'ArrowRight') {
                this.nextSlide();
                this.resetAutoSlide();
            }
        });
    }
    
    handleSwipe(startX, endX) {
        const minSwipeDistance = 50;
        
        if (startX - endX > minSwipeDistance) {
            this.nextSlide();
        } else if (endX - startX > minSwipeDistance) {
            this.prevSlide();
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ShowcaseSlider();
    
    function adjustContentMargin() {
        const header = document.querySelector('.header-bar');
        const content = document.querySelector('.content');
        if (header && content) {
            const headerHeight = header.offsetHeight;
            content.style.marginTop = headerHeight + 'px';
            
            const showcaseSection = document.querySelector('.showcase-section');
            if (showcaseSection) {
                const viewportHeight = window.innerHeight;
                showcaseSection.style.height = `calc(${viewportHeight * 0.6}px - ${headerHeight}px)`;
            }
        }
    }
    
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
    window.addEventListener('orientationchange', adjustContentMargin);
});
```

---

## File: `Crooks-Cart-Collectives/scripts/product-detail.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/product-details.js */
/* Revised with seller-new-product style hover preview and thumbnail navigation */
/* Fixed: Proper handling of placeholder images */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ===== DOM ELEMENTS =====
    const mainPreviewBox = document.getElementById('mainPreviewBox');
    const previewPlaceholder = document.getElementById('previewPlaceholder');
    const previewImage = document.getElementById('previewImage');
    const thumbnailButtons = document.querySelectorAll('.thumbnail-image-btn');
    
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    // ===== STATE =====
    let currentIndex = 0;
    let hoveredIndex = -1;
    const thumbnailUrls = [];
    const isPlaceholder = [];
    
    // Collect thumbnail info from buttons
    thumbnailButtons.forEach(btn => {
        const bgImage = btn.style.backgroundImage;
        if (bgImage && bgImage !== 'none' && bgImage !== '') {
            const url = bgImage.slice(5, -2); // Remove url(" and ")
            thumbnailUrls.push(url);
            isPlaceholder.push(false);
        } else {
            thumbnailUrls.push(null);
            isPlaceholder.push(btn.classList.contains('placeholder') || btn.classList.contains('empty-slot'));
        }
    });
    
    // ===== THUMBNAIL NAVIGATION =====
    function setPreviewFromIndex(index) {
        if (!previewImage || !previewPlaceholder) return;
        
        if (thumbnailUrls[index] && !isPlaceholder[index]) {
            previewImage.style.backgroundImage = `url('${thumbnailUrls[index]}')`;
            previewImage.style.display = 'block';
            previewPlaceholder.style.display = 'none';
        } else {
            previewImage.style.display = 'none';
            previewPlaceholder.style.display = 'flex';
        }
    }
    
    function updateActiveThumbnail(index) {
        thumbnailButtons.forEach((btn, i) => {
            if (i === index) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
            btn.classList.remove('hover');
        });
    }
    
    // Mouse enter for hover preview
    thumbnailButtons.forEach((btn, index) => {
        btn.addEventListener('mouseenter', function() {
            if (thumbnailUrls[index] && !isPlaceholder[index]) {
                hoveredIndex = index;
                setPreviewFromIndex(index);
                
                // Add hover class
                this.classList.add('hover');
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            this.classList.remove('hover');
            
            if (hoveredIndex !== -1) {
                hoveredIndex = -1;
                // Return to current index
                setPreviewFromIndex(currentIndex);
                updateActiveThumbnail(currentIndex);
            }
        });
        
        btn.addEventListener('click', function() {
            if (thumbnailUrls[index] && !isPlaceholder[index]) {
                currentIndex = index;
                setPreviewFromIndex(index);
                updateActiveThumbnail(index);
                hoveredIndex = -1;
            }
        });
    });
    
    // ===== IMAGE HANDLING =====
    if (mainPreviewBox) {
        // Handle image load errors for background images
        const tempImg = new Image();
        thumbnailUrls.forEach((url, index) => {
            if (url && !isPlaceholder[index]) {
                tempImg.src = url;
                tempImg.onerror = function() {
                    thumbnailUrls[index] = null;
                    isPlaceholder[index] = true;
                    if (index === currentIndex) {
                        setPreviewFromIndex(currentIndex);
                    }
                    // Update button to show placeholder
                    const btn = thumbnailButtons[index];
                    if (btn) {
                        btn.classList.add('placeholder');
                        btn.style.backgroundImage = '';
                        if (!btn.querySelector('.thumbnail-image')) {
                            const img = document.createElement('img');
                            img.src = '../assets/image/icons/package.svg';
                            img.alt = 'No image';
                            img.className = 'thumbnail-image';
                            btn.appendChild(img);
                        }
                    }
                };
            }
        });
    }
    
    // ===== NOTIFICATION SYSTEM =====
    function showNotification(message, type = 'success') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.product-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Determine icon based on type
        const iconFile = type === 'success' ? 'cart-shopping.svg' : 'cancel.svg';
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.setAttribute('role', 'alert');
        
        // Create icon element
        const iconSpan = document.createElement('span');
        iconSpan.className = 'notification-icon';
        const iconImg = document.createElement('img');
        iconImg.src = `../assets/image/icons/${iconFile}`;
        iconImg.alt = type === 'success' ? 'Success' : 'Error';
        iconImg.style.width = '20px';
        iconImg.style.height = '20px';
        iconSpan.appendChild(iconImg);
        
        // Create message element
        const messageSpan = document.createElement('span');
        messageSpan.className = 'notification-message';
        messageSpan.textContent = message;
        
        notification.appendChild(iconSpan);
        notification.appendChild(messageSpan);
        
        // Add styles for the notification content
        notification.style.cssText = `
            display: flex;
            align-items: center;
            gap: 12px;
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 12px 20px;
            background: #000000;
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            font-weight: 500;
            max-width: 300px;
            word-break: break-word;
            border-left: 4px solid ${type === 'success' ? '#FF8246' : '#FF8246'};
        `;
        
        document.body.appendChild(notification);
        
        // Add animation styles if not present
        if (!document.getElementById('notification-animations')) {
            const style = document.createElement('style');
            style.id = 'notification-animations';
            style.textContent = `
                @keyframes slideInRight {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOutRight {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        }
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // ===== CART ACTION =====
    async function handleCartAction(productId) {
        try {
            // Determine correct API path
            const currentPath = window.location.pathname;
            let apiPath = '../database/cart-handler.php';
            
            if (currentPath.includes('/pages/')) {
                apiPath = '../database/cart-handler.php';
            } else {
                apiPath = 'database/cart-handler.php';
            }
            
            const response = await fetch(apiPath, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'add_to_cart',
                    product_id: productId,
                    quantity: 1
                })
            });
            
            const result = await response.json();
            
            if (result.status === 'success') {
                showNotification('Added to cart', 'success');
                
                // Update cart count in header if function exists
                if (window.HeaderFunctions && typeof window.HeaderFunctions.updateCartCount === 'function') {
                    window.HeaderFunctions.updateCartCount();
                }
                
                return true;
            } else {
                showNotification(result.message || 'Failed to add to cart', 'error');
                return false;
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
            showNotification('Network error. Please try again.', 'error');
            return false;
        }
    }
    
    // ===== ADD TO CART BUTTON =====
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-text">Adding...</span>';
            
            const success = await handleCartAction(productId);
            
            if (!success) {
                this.disabled = false;
                this.innerHTML = originalText;
            } else {
                // Re-enable after 2 seconds
                setTimeout(() => {
                    this.disabled = false;
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    }
    
    // ===== BUY NOW BUTTON =====
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.dataset.productId;
            
            // Show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-text">Redirecting...</span>';
            
            // Redirect to checkout
            window.location.href = 'checkout.php?product_id=' + productId + '&quantity=1';
        });
    }
    
    // ===== RESPONSIVE HANDLING =====
    function handleResponsiveLayout() {
        const actionButtons = document.querySelector('.product-actions');
        if (!actionButtons) return;
        
        if (window.innerWidth <= 576) {
            actionButtons.style.flexDirection = 'column';
        } else {
            actionButtons.style.flexDirection = 'row';
        }
    }
    
    // Initial call
    handleResponsiveLayout();
    
    // Debounced resize handler
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(handleResponsiveLayout, 100);
    });
});

// Export for external use if needed
window.ProductDetails = {
    showNotification: function(message, type) {
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 12px 20px;
            background: #000000;
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #FF8246;
        `;
        
        const iconImg = document.createElement('img');
        iconImg.src = `../assets/image/icons/${type === 'success' ? 'mail.svg' : 'cancel.svg'}`;
        iconImg.alt = type === 'success' ? 'Success' : 'Error';
        iconImg.style.width = '20px';
        iconImg.style.height = '20px';
        
        const messageSpan = document.createElement('span');
        messageSpan.textContent = message;
        
        notification.appendChild(iconImg);
        notification.appendChild(messageSpan);
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
};
```

---

## File: `Crooks-Cart-Collectives/scripts/report-seller.js`

**Status:** `FOUND`

```javascript
/* JavaScript File Content */
document.addEventListener("DOMContentLoaded", () => {
    const openButton = document.getElementById("openReportButton");
    const overlay = document.getElementById("reportOverlay");
    const form = document.getElementById("reportForm");
    const cancelButton = document.getElementById("cancelReport");
    const closeButton = document.getElementById("closeReport");
    const sellerSelect = document.getElementById("seller_id");

    // REMOVED: loadSellers() function - dropdown is already populated by PHP

    const closeForm = () => {
        overlay.style.display = "none";
        document.body.classList.remove("blurred-background");
    };

    openButton?.addEventListener("click", () => {
        document.body.classList.add("blurred-background");
        overlay.style.display = "flex";
        // REMOVED: loadSellers() call
    });

    overlay?.addEventListener("click", (e) => {
        if (e.target === overlay) closeForm();
    });

    if (closeButton) {
        closeButton.addEventListener("click", closeForm);
    }

    if (cancelButton) {
        cancelButton.addEventListener("click", closeForm);
    }

    form?.addEventListener("submit", function (event) {
        event.preventDefault();

        const seller_id = document.getElementById("seller_id").value;
        const reason = document.getElementById("report-reason").value.trim();
        const details = document.getElementById("report-details").value.trim();

        if (!seller_id || !reason || !details) {
            alert("All fields are required.");
            return;
        }

        // Get fetch path
        let fetchPath = "../database/report-seller-handler.php";
        const currentPath = window.location.pathname;
        
        if (!currentPath.includes('/pages/')) {
            fetchPath = "database/report-seller-handler.php";
        }

        fetch(fetchPath, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ 
                seller_id, 
                reason, 
                details
            })
        })
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            if (data.status === "success") {
                alert("Report submitted successfully! An administrator will review it.");
                form.reset();
                closeForm();
                
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                alert("Failed: " + (data.message || "Please try again."));
            }
        })
        .catch(err => {
            console.error("Report submission error:", err);
            alert("Error occurred while submitting report. Please check your connection and try again.");
        });
    });

    // Input validation feedback
    const reasonInput = document.getElementById("report-reason");
    const detailsInput = document.getElementById("report-details");
    
    if (reasonInput) {
        reasonInput.addEventListener("input", function() {
            this.style.borderColor = this.value.trim().length > 0 ? "#4CAF50" : "";
        });
    }
    
    if (detailsInput) {
        detailsInput.addEventListener("input", function() {
            this.style.borderColor = this.value.trim().length > 0 ? "#4CAF50" : "";
        });
    }
});
```

---

## File: `Crooks-Cart-Collectives/scripts/checkout.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const placeOrderBtn = document.getElementById('placeOrderBtn');
    const notifier = document.getElementById('checkoutNotifier');
    const messageEl = document.getElementById('checkoutMessage');
    const closeBtn = document.getElementById('checkoutCloseBtn');
    
    // Get hidden input values for single product checkout
    const singleProductMode = document.getElementById('singleProductMode')?.value === '1';
    const singleProductId = document.getElementById('singleProductId')?.value;
    const singleQuantity = document.getElementById('singleQuantity')?.value;

    function showNotifier(msg, redirect = null) {
        messageEl.textContent = msg;
        notifier.classList.remove('hidden');
        if (redirect) {
            setTimeout(() => {
                window.location.href = redirect;
            }, 2000);
        }
    }

    closeBtn.addEventListener('click', () => {
        notifier.classList.add('hidden');
    });

    placeOrderBtn.addEventListener('click', async () => {
        placeOrderBtn.disabled = true;
        placeOrderBtn.textContent = 'Processing...';

        try {
            let formData = new URLSearchParams();
            
            if (singleProductMode && singleProductId && singleQuantity) {
                // Direct order without cart
                formData.append('action', 'place_order');
                formData.append('product_id', singleProductId);
                formData.append('quantity', singleQuantity);
            } else {
                // Normal cart checkout
                formData.append('action', 'place_order');
            }

            const response = await fetch('../database/checkout-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotifier('Order placed successfully! Redirecting to your orders...', result.redirect);
            } else {
                showNotifier('Error: ' + result.message);
                placeOrderBtn.disabled = false;
                placeOrderBtn.textContent = 'Place Order';
            }
        } catch (error) {
            console.error('Checkout error:', error);
            showNotifier('Network error. Please try again.');
            placeOrderBtn.disabled = false;
            placeOrderBtn.textContent = 'Place Order';
        }
    });
});
```

---

## File: `Crooks-Cart-Collectives/scripts/orders.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/orders.js */
/* Updated to handle inactive products with "Product Unavailable" message */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('ordersList');
    const filterTabs = document.getElementById('filterTabs');
    
    // Review Modal Elements
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const reviewOrderId = document.getElementById('reviewOrderId');
    const reviewProductId = document.getElementById('reviewProductId');
    const ratingValue = document.getElementById('ratingValue');
    const ratingError = document.getElementById('ratingError');
    const cancelReview = document.getElementById('cancelReview');
    const submitReview = document.getElementById('submitReview');
    const starContainer = document.getElementById('starRatingContainer');
    
    // Cancel Modal Elements
    const cancelModal = document.getElementById('cancelModal');
    const cancelCancel = document.getElementById('cancelCancel');
    const confirmCancel = document.getElementById('confirmCancel');
    
    // Notification Modal Elements
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    // State
    let currentRating = 0;
    let currentCancelOrderId = null;
    let stars = [];
    let allOrders = [];
    let currentFilter = 'all';

    // ============= INITIALIZE STAR RATING =============
    function initStarRating() {
        if (!starContainer) return;
        
        starContainer.innerHTML = '';
        stars = [];
        
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.className = 'star';
            star.dataset.value = i;
            
            const img = document.createElement('img');
            img.src = '../assets/image/icons/star-empty.svg';
            img.alt = 'Star';
            img.style.width = '32px';
            img.style.height = '32px';
            
            star.appendChild(img);
            starContainer.appendChild(star);
            stars.push(star);
            
            star.addEventListener('mouseover', function() {
                const value = parseInt(this.dataset.value);
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < value ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
                }
            });
            
            star.addEventListener('mouseout', function() {
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < currentRating ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
                }
            });
            
            star.addEventListener('click', function() {
                const value = parseInt(this.dataset.value);
                currentRating = value;
                if (ratingValue) ratingValue.value = value;
                
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < value ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
                }
            });
        }
    }
    
    function resetRatingForm() {
        currentRating = 0;
        if (ratingValue) ratingValue.value = '';
        if (ratingError) ratingError.textContent = '';
        if (reviewForm) reviewForm.reset();
        
        stars.forEach(star => {
            const img = star.querySelector('img');
            if (img) img.src = '../assets/image/icons/star-empty.svg';
        });
    }

    // ============= FILTER FUNCTIONS =============
    function setActiveFilter(filter) {
        if (!filterTabs) return;
        
        const tabs = filterTabs.querySelectorAll('.filter-tab');
        tabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterOrders(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderOrders(allOrders);
        } else {
            const filtered = allOrders.filter(order => order.status === filter);
            renderOrders(filtered);
        }
    }

    // ============= MODAL FUNCTIONS =============
    function showModal(modal) {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }
    
    function hideModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }
    
    function hideAllModals() {
        hideModal(reviewModal);
        hideModal(cancelModal);
        hideModal(notificationModal);
        resetRatingForm();
        currentCancelOrderId = null;
    }
    
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        showModal(notificationModal);
        
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_customer_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                allOrders = result.data;
                
                // Show/hide filter tabs based on orders data
                if (filterTabs) {
                    if (allOrders && allOrders.length > 0) {
                        filterTabs.style.display = 'flex';
                    } else {
                        filterTabs.style.display = 'none';
                    }
                }
                
                filterOrders(currentFilter);
            } else {
                ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load orders. Please try again.</p><a href="product.php" class="btn btn-primary">Start Shopping</a></div></div>';
                if (filterTabs) filterTabs.style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p><a href="product.php" class="btn btn-primary">Start Shopping</a></div></div>';
            if (filterTabs) filterTabs.style.display = 'none';
        }
    }

    // ============= FORMAT DATE =============
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return date.toLocaleDateString(undefined, options);
    }

    // ============= GET IMAGE PATH =============
    function getProductImageUrl(mediaPath) {
        if (!mediaPath) {
            return '../assets/image/icons/package.svg';
        }
        
        if (mediaPath.includes('data-storage-handler.php')) {
            return mediaPath;
        }
        
        if (mediaPath.includes('/media/')) {
            const baseDir = mediaPath.endsWith('/') ? mediaPath : mediaPath + '/';
            return '../database/data-storage-handler.php?action=serve&path=' + encodeURIComponent(baseDir + 'thumbnail_1.png');
        }
        
        if (mediaPath.startsWith('assets/')) {
            return '../' + mediaPath;
        }
        
        if (mediaPath.startsWith('http')) {
            return mediaPath;
        }
        
        if (mediaPath.startsWith('../')) {
            return mediaPath;
        }
        
        return '../' + mediaPath;
    }

    // ============= ESCAPE HTML =============
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============= RENDER ORDERS =============
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/order.svg" alt="No orders" class="empty-state-icon">
                        <h2>No Orders Found</h2>
                        <p>You haven't placed any orders yet.</p>
                        <a href="product.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            
            const imagePath = getProductImageUrl(order.image_path);
            
            const isEditable = order.status === 'pending';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);
            
            // Check if product is active
            const isProductActive = order.is_active ? true : false;

            let eventHtml = '';
            eventHtml += `<div class="event-item customer-event"><span class="event-icon"><img src="../assets/image/icons/order.svg" alt="Order placed" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%); vertical-align: middle;"></span><span class="event-text">Order placed: ${orderDate}</span></div>`;
                    
            if (order.status === 'delivered' && order.delivered_at) {
                const deliveredDate = formatDate(order.delivered_at);
                eventHtml += `<div class="event-item delivered-event"><span class="event-icon"><img src="../assets/image/icons/package.svg" alt="Item sold" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">Item sold: ${deliveredDate}</span></div>`;
            }
            
            if (order.status === 'cancelled' && order.cancelled_at) {
                const cancelledDate = formatDate(order.cancelled_at);
                const cancelledBy = order.cancelled_by === 'customer' ? 'Customer' : 'Seller';
                eventHtml += `<div class="event-item cancelled-event"><span class="event-icon"><img src="../assets/image/icons/cancel.svg" alt="Cancelled" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">${cancelledBy} cancelled: ${cancelledDate}</span></div>`;
            }
            
            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="order-status-badge ${statusClass}">${displayStatus}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <div class="order-product-column">
                            <div class="column-title">Product Details</div>
                            <div class="product-details">
                                <img src="${imagePath}" alt="${escapeHtml(order.product_name)}" 
                                     class="product-thumbnail"
                                     onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                <div class="product-info">
                                    ${!isProductActive ? '<span class="inactive-badge" style="display: inline-block; background: #000000; color: #ffffff; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; margin-bottom: 5px;">Product Unavailable</span>' : ''}
                                    <h4>${!isProductActive ? 'This product is unavailable' : escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Seller:</span> ${escapeHtml(order.seller_name || 'Unknown Seller')}</p>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="order-event-column">
                            <div class="column-title">Event Activity</div>
                            <div class="event-activity-content">
                                ${eventHtml}
                            </div>
                        </div>

                        <div class="order-shipping-column">
                            <div class="column-title">Shipping Information</div>
                            <div class="shipping-details" data-order-id="${order.order_id}" data-original="${escapeHtml(order.shipping_address || 'No address provided')}">
                                <p class="shipping-address-text">${escapeHtml(order.shipping_address || 'No address provided')}</p>
                                <div class="shipping-edit-controls" style="${isEditable ? 'display: flex;' : 'display: none;'}">
                                    <textarea class="shipping-edit-textarea" rows="3" style="display: none;">${escapeHtml(order.shipping_address || '')}</textarea>
                                    <div class="shipping-buttons">
                                        <button class="action-btn edit-shipping" data-order-id="${order.order_id}" ${!isEditable ? 'style="display: none;"' : ''}>
                                            <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                                            <span class="btn-text">Edit</span>
                                        </button>
                                        <button class="action-btn save-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/save-empty.svg" alt="Save" class="btn-icon">
                                            <span class="btn-text">Save</span>
                                        </button>
                                        <button class="action-btn reset-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/reset.svg" alt="Reset" class="btn-icon">
                                            <span class="btn-text">Reset</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-price-summary">
                            <div class="column-title">Order Summary</div>
                            <div class="price-summary-details">
                                <div class="price-row">
                                    <span>Subtotal</span>
                                    <span class="price-value">₱${subtotal}</span>
                                </div>
                                <div class="price-row">
                                    <span>Shipping</span>
                                    <span class="price-value free-shipping">Free</span>
                                </div>
                                <div class="price-divider"></div>
                                <div class="price-row price-total">
                                    <span>Total</span>
                                    <span class="price-value">₱${total}</span>
                                </div>
                            </div>
            `;

            const canCancel = order.status === 'pending';
            const canReview = order.status === 'delivered' && !order.has_review && isProductActive;

            if (canReview) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn review" data-order-id="${order.order_id}" data-product-id="${order.product_id}">
                            Write Review
                        </button>
                        <a href="product-detail.php?id=${order.product_id}" class="action-btn view">
                            View Product
                        </a>
                    </div>
                `;
            } else if (canCancel) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn cancel" data-order-id="${order.order_id}">
                            Cancel Order
                        </button>
                        ${isProductActive ? '<a href="product-detail.php?id=' + order.product_id + '" class="action-btn view">View Product</a>' : '<span class="action-btn view" style="opacity: 0.5; background: #cccccc; cursor: not-allowed;">Unavailable</span>'}
                    </div>
                `;
            } else {
                html += `
                    <div class="order-actions">
                        ${isProductActive ? '<a href="product-detail.php?id=' + order.product_id + '" class="action-btn view">View Product</a>' : '<span class="action-btn view" style="opacity: 0.5; background: #cccccc; cursor: not-allowed;">Unavailable</span>'}
                    </div>
                `;
            }
            
            html += `
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        document.querySelectorAll('.action-btn.review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (reviewOrderId) reviewOrderId.value = btn.dataset.orderId;
                if (reviewProductId) reviewProductId.value = btn.dataset.productId;
                resetRatingForm();
                showModal(reviewModal);
            });
        });
        
        document.querySelectorAll('.action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentCancelOrderId = btn.dataset.orderId;
                showModal(cancelModal);
            });
        });

        document.querySelectorAll('.action-btn.edit-shipping').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const editBtn = shippingColumn.querySelector('.edit-shipping');
                const saveBtn = shippingColumn.querySelector('.save-shipping');
                const resetBtn = shippingColumn.querySelector('.reset-shipping');
                
                if (addressText && textarea && editBtn && saveBtn && resetBtn) {
                    addressText.style.display = 'none';
                    textarea.style.display = 'block';
                    editBtn.style.display = 'none';
                    saveBtn.style.display = 'inline-flex';
                    resetBtn.style.display = 'inline-flex';
                    
                    textarea.focus();
                }
            });
        });

        document.querySelectorAll('.action-btn.save-shipping').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const editBtn = shippingColumn.querySelector('.edit-shipping');
                const saveBtn = shippingColumn.querySelector('.save-shipping');
                const resetBtn = shippingColumn.querySelector('.reset-shipping');
                
                if (!textarea || !addressText) return;
                
                const newAddress = textarea.value.trim();
                
                if (!newAddress) {
                    showNotification('Shipping address cannot be empty', true);
                    return;
                }
                
                const originalText = btn.innerHTML;
                btn.innerHTML = '<span class="btn-text">Saving...</span>';
                btn.disabled = true;
                
                try {
                    const formData = new URLSearchParams();
                    formData.append('action', 'update_shipping');
                    formData.append('order_id', orderId);
                    formData.append('shipping_address', newAddress);
                    
                    const response = await fetch('../database/order-handler.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.status === 'success') {
                        addressText.textContent = newAddress;
                        addressText.style.display = 'block';
                        textarea.style.display = 'none';
                        editBtn.style.display = 'inline-flex';
                        saveBtn.style.display = 'none';
                        resetBtn.style.display = 'none';
                        
                        shippingColumn.dataset.original = newAddress;
                        
                        showNotification('Shipping address updated successfully');
                    } else {
                        showNotification(result.message || 'Failed to update address', true);
                        textarea.value = addressText.textContent;
                        addressText.style.display = 'block';
                        textarea.style.display = 'none';
                        editBtn.style.display = 'inline-flex';
                        saveBtn.style.display = 'none';
                        resetBtn.style.display = 'none';
                    }
                } catch (error) {
                    console.error('Update shipping error:', error);
                    showNotification('Network error. Please try again.', true);
                    textarea.value = addressText.textContent;
                    addressText.style.display = 'block';
                    textarea.style.display = 'none';
                    editBtn.style.display = 'inline-flex';
                    saveBtn.style.display = 'none';
                    resetBtn.style.display = 'none';
                } finally {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
            });
        });

        document.querySelectorAll('.action-btn.reset-shipping').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const originalAddress = shippingColumn.dataset.original;
                
                if (!textarea) return;
                
                textarea.value = originalAddress;
                
                const originalBtnText = btn.innerHTML;
                btn.innerHTML = '<span class="btn-text">Reset!</span>';
                btn.disabled = true;
                
                setTimeout(() => {
                    btn.innerHTML = originalBtnText;
                    btn.disabled = false;
                }, 500);
            });
        });
    }

    // ============= FILTER TAB CLICK HANDLERS =============
    if (filterTabs) {
        filterTabs.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const filter = tab.dataset.filter;
                filterOrders(filter);
            });
        });
    }

    // ============= REVIEW SUBMISSION =============
    if (reviewForm) {
        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            if (currentRating === 0) {
                if (ratingError) ratingError.textContent = 'Please select a rating';
                return;
            }
            
            if (submitReview) {
                submitReview.disabled = true;
                submitReview.textContent = 'Submitting...';
            }
            
            try {
                const formData = new FormData();
                formData.append('order_id', reviewOrderId?.value || '');
                formData.append('product_id', reviewProductId?.value || '');
                formData.append('rating', currentRating);
                formData.append('comment', document.getElementById('comment')?.value || '');
                
                const response = await fetch('../database/review-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Review submitted successfully!');
                    hideModal(reviewModal);
                    resetRatingForm();
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to submit review', true);
                }
            } catch (error) {
                console.error('Review error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                if (submitReview) {
                    submitReview.disabled = false;
                    submitReview.textContent = 'Submit';
                }
            }
        });
    }

    // ============= CANCEL ORDER =============
    if (confirmCancel) {
        confirmCancel.addEventListener('click', async () => {
            if (!currentCancelOrderId) return;
            
            confirmCancel.disabled = true;
            confirmCancel.textContent = 'Processing...';
            
            try {
                const formData = new URLSearchParams();
                formData.append('action', 'cancel_item');
                formData.append('order_id', currentCancelOrderId);
                
                const response = await fetch('../database/order-handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Order cancelled successfully');
                    hideModal(cancelModal);
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to cancel order', true);
                }
            } catch (error) {
                console.error('Cancel error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                confirmCancel.disabled = false;
                confirmCancel.textContent = 'Confirm';
                currentCancelOrderId = null;
            }
        });
    }

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelCancel) {
        cancelCancel.addEventListener('click', () => {
            hideModal(cancelModal);
            currentCancelOrderId = null;
        });
    }

    if (cancelReview) {
        cancelReview.addEventListener('click', () => {
            hideModal(reviewModal);
            resetRatingForm();
        });
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', () => {
            hideModal(notificationModal);
        });
    }

    [cancelModal, reviewModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // ============= INITIAL LOAD =============
    initStarRating();
    loadOrders();
});
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-manage-product.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-manage-product.js */
/* Updated to use soft delete (set is_active to 0) instead of permanent deletion */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    // Modal Elements
    const deleteModal = document.getElementById('deleteConfirmModal');
    const notificationModal = document.getElementById('notificationModal');
    
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    // ============= STATE =============
    let currentProductId = null;
    let isProcessing = false;

    // ============= MODAL FUNCTIONS =============
    function showModal(modal) {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function hideModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function hideAllModals() {
        hideModal(deleteModal);
        hideModal(notificationModal);
        currentProductId = null;
    }

    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        showModal(notificationModal);
        
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= DELETE BUTTON HANDLERS =============
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            currentProductId = this.dataset.id;
            showModal(deleteModal);
        });
    });

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelDelete) {
        cancelDelete.addEventListener('click', function() {
            hideModal(deleteModal);
            currentProductId = null;
        });
    }

    if (confirmDelete) {
        confirmDelete.addEventListener('click', async function() {
            if (!currentProductId || isProcessing) return;

            isProcessing = true;
            const originalText = this.textContent;
            this.textContent = 'Removing...';
            this.disabled = true;

            try {
                const response = await fetch('../database/product-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'delete',
                        product_id: currentProductId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    hideModal(deleteModal);
                    showNotification(result.message);
                    
                    // Update the product card to show inactive status instead of removing it
                    const productCard = document.querySelector(`.delete-btn[data-id="${currentProductId}"]`).closest('.product-card');
                    if (productCard) {
                        // Change the product status display
                        const statusElement = productCard.querySelector('.product-status');
                        if (statusElement) {
                            statusElement.textContent = 'Inactive';
                            statusElement.className = 'product-status status-inactive';
                        }
                        
                        // Disable or change the edit button if needed
                        const editButton = productCard.querySelector('.edit-btn');
                        if (editButton) {
                            // Optionally change edit button appearance
                            // editButton.style.opacity = '0.5';
                        }
                        
                        // Visual indication that product is inactive
                        productCard.style.opacity = '0.8';
                        productCard.style.borderColor = '#cccccc';
                        
                        // Add a small badge or indicator
                        const existingBadge = productCard.querySelector('.inactive-badge');
                        if (!existingBadge) {
                            const badge = document.createElement('span');
                            badge.className = 'inactive-badge';
                            badge.textContent = 'Removed';
                            badge.style.cssText = 'display: inline-block; background: #000000; color: #ffffff; padding: 2px 6px; border-radius: 4px; font-size: 0.7rem; margin-left: 5px;';
                            const titleElement = productCard.querySelector('.product-title');
                            if (titleElement) {
                                titleElement.appendChild(badge);
                            }
                        }
                        
                        // Hide the delete button for this product
                        const deleteButton = productCard.querySelector('.delete-btn');
                        if (deleteButton) {
                            deleteButton.style.display = 'none';
                        }
                    }
                } else {
                    showNotification('Error: ' + result.message, true);
                }
            } catch (error) {
                console.error('Delete error:', error);
                showNotification('An error occurred. Please try again.', true);
            } finally {
                isProcessing = false;
                this.textContent = originalText;
                this.disabled = false;
                currentProductId = null;
            }
        });
    }

    // Close modal when clicking outside
    if (deleteModal) {
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                hideModal(deleteModal);
                currentProductId = null;
            }
        });
    }

    if (notificationModal) {
        notificationModal.addEventListener('click', function(e) {
            if (e.target === notificationModal) {
                hideModal(notificationModal);
            }
        });
    }

    // Close notification with button
    if (notificationClose) {
        notificationClose.addEventListener('click', function() {
            hideModal(notificationModal);
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideAllModals();
        }
    });
});
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-new-product.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-new-product.js */
/* Revised version 4.3 – Single file replace on index, multi-file sequential fill */

(function() {
    'use strict';

    console.log('Seller New Product JS loaded - Version 4.3');

    document.addEventListener('DOMContentLoaded', function() {
        initializeSellerNewProduct();
    });

    function initializeSellerNewProduct() {
        console.log('Initializing seller new product form...');

        // DOM elements
        const productForm = document.getElementById('productForm');
        const backBtn = document.getElementById('backBtn');
        const saveBtn = document.getElementById('saveBtn');

        const mainPreviewBox = document.getElementById('mainPreviewBox');
        const previewPlaceholder = document.getElementById('previewPlaceholder');
        const previewImage = document.getElementById('previewImage');
        const thumbnailNavigation = document.getElementById('thumbnailNavigation');
        const fileInfo = document.getElementById('fileInfo');

        const nameInput = document.getElementById('name');
        const categoryInput = document.getElementById('category');
        const priceInput = document.getElementById('price');
        const stockInput = document.getElementById('stock_quantity');
        const descriptionInput = document.getElementById('description');

        const modal = document.getElementById('feedbackModal');
        const modalMessage = document.getElementById('modalMessage');
        const modalOkBtn = document.getElementById('modalOkBtn');

        // state
        let selectedFiles = [];                // array of File objects (index 0-4)
        let currentPreviewIndex = 0;            // current active index (clicked/selected)
        let hoveredIndex = -1;                  // index currently being hovered (-1 = none)
        let formChanged = false;
        let isSubmitting = false;
        const editMode = document.querySelector('input[name="action"]')?.value === 'update';

        // URL cache
        let fileObjectUrls = new Map();

        // get or create persistent object URL
        function getObjectURL(file) {
            if (!file) return null;
            
            if (!fileObjectUrls.has(file)) {
                const url = URL.createObjectURL(file);
                fileObjectUrls.set(file, url);
            }
            
            return fileObjectUrls.get(file);
        }

        // clean up URLs
        function cleanupObjectUrls() {
            fileObjectUrls.forEach(url => URL.revokeObjectURL(url));
            fileObjectUrls.clear();
        }

        // modal
        function showModal(message) {
            if (!modal || !modalMessage) {
                alert(message);
                return;
            }
            modalMessage.textContent = message;
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function hideModal() {
            if (!modal) return;
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        if (modalOkBtn) modalOkBtn.addEventListener('click', hideModal);
        if (modal) modal.addEventListener('click', (e) => { if (e.target === modal) hideModal(); });

        // file upload trigger
        function triggerFileUpload(targetSlot) {
            const tempInput = document.createElement('input');
            tempInput.type = 'file';
            tempInput.accept = 'image/jpeg,image/png,image/gif,image/webp';
            tempInput.multiple = true;
            tempInput.style.position = 'fixed';
            tempInput.style.top = '-100px';
            tempInput.style.left = '-100px';
            tempInput.style.opacity = '0';
            tempInput.style.pointerEvents = 'none';
            document.body.appendChild(tempInput);

            tempInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files.length > 0) {
                    handleFileSelect(e.target.files, targetSlot);
                }
                if (tempInput.parentNode) document.body.removeChild(tempInput);
            });

            setTimeout(() => {
                if (tempInput.parentNode) document.body.removeChild(tempInput);
            }, 60000);

            tempInput.click();
        }

        // compact files to left
        function compactFiles(filesArray) {
            const defined = filesArray.filter(f => f !== undefined);
            const compacted = new Array(5).fill(undefined);
            for (let i = 0; i < defined.length && i < 5; i++) {
                compacted[i] = defined[i];
            }
            return compacted;
        }

        // handle file selection - single file replace OR multi-file sequential fill
        function handleFileSelect(files, targetSlot) {
            if (!files || files.length === 0) return;

            const fileArray = Array.from(files);
            
            // Filter valid images
            const validFiles = fileArray.filter(file => 
                file.type.match('image.*') && file.size <= 2 * 1024 * 1024
            );

            if (validFiles.length === 0) return;

            // Clean up old URLs
            cleanupObjectUrls();

            // Create a copy of current files
            const newFiles = [...selectedFiles];

            if (validFiles.length === 1) {
                // SINGLE FILE MODE: Replace only the clicked slot
                newFiles[targetSlot] = validFiles[0];
            } else {
                // MULTI-FILE MODE: Fill sequentially from target slot
                for (let i = 0; i < validFiles.length; i++) {
                    const slotIndex = targetSlot + i;
                    if (slotIndex < 5) {
                        newFiles[slotIndex] = validFiles[i];
                    }
                }
            }

            // Fill any undefined slots
            while (newFiles.length < 5) newFiles.push(undefined);
            
            // Always compact to left for clean presentation
            selectedFiles = compactFiles(newFiles);

            // Set preview to first image or keep target if valid
            const firstFilled = selectedFiles.findIndex(f => f !== undefined);
            if (firstFilled !== -1) {
                currentPreviewIndex = firstFilled;
            }
            hoveredIndex = -1;

            // Re-render
            renderThumbnailNavigation();
            updatePreviewDisplay();
            updateFileInfo();

            formChanged = true;
            updateSaveButtonState();
            
            console.log('Files handled:', validFiles.length, 'files, mode:', validFiles.length === 1 ? 'single replace' : 'multi sequential');
        }

        // update preview from file
        function setPreviewFromFile(file) {
            if (!previewPlaceholder || !previewImage) return;

            if (file) {
                const url = getObjectURL(file);
                
                if (previewImage.dataset.url !== url) {
                    previewImage.style.backgroundImage = `url('${url}')`;
                    previewImage.dataset.url = url;
                }
                
                previewImage.style.display = 'block';
                previewPlaceholder.style.display = 'none';
            } else {
                previewImage.style.display = 'none';
                previewPlaceholder.style.display = 'flex';
                previewImage.dataset.url = '';
            }
        }

        function setPreviewFromIndex(index) {
            setPreviewFromFile(selectedFiles[index]);
        }

        // update main preview
        function updatePreviewDisplay() {
            if (hoveredIndex !== -1 && selectedFiles[hoveredIndex]) {
                setPreviewFromIndex(hoveredIndex);
            } else {
                setPreviewFromIndex(currentPreviewIndex);
            }
        }

        // render thumbnails
        function renderThumbnailNavigation() {
            if (!thumbnailNavigation) return;

            thumbnailNavigation.innerHTML = '';

            for (let i = 0; i < 5; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'thumbnail-image-btn';
                btn.dataset.index = i;

                btn.innerHTML = '';

                if (selectedFiles[i]) {
                    const url = getObjectURL(selectedFiles[i]);
                    btn.style.backgroundImage = `url('${url}')`;
                    btn.classList.remove('empty-slot');
                } else {
                    btn.style.backgroundImage = '';
                    btn.classList.add('empty-slot');
                    
                    const iconImg = document.createElement('img');
                    iconImg.src = '../assets/image/icons/package.svg';
                    iconImg.alt = 'Empty slot';
                    iconImg.className = 'thumbnail-image';
                    btn.appendChild(iconImg);
                }

                // Hover
                btn.addEventListener('mouseenter', (function(index) {
                    return function() {
                        if (selectedFiles[index]) {
                            hoveredIndex = index;
                            updatePreviewDisplay();
                            
                            const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                            thumbnails.forEach((btn, idx) => {
                                if (idx === index) btn.classList.add('hover');
                                else btn.classList.remove('hover');
                            });
                        }
                    };
                })(i));

                // Mouse leave
                btn.addEventListener('mouseleave', (function(index) {
                    return function() {
                        if (hoveredIndex !== -1 && selectedFiles[hoveredIndex]) {
                            currentPreviewIndex = hoveredIndex;
                        }

                        hoveredIndex = -1;

                        const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                        thumbnails.forEach((btn, idx) => {
                            btn.classList.remove('hover');
                            if (idx === currentPreviewIndex) {
                                btn.classList.add('active');
                            } else {
                                btn.classList.remove('active');
                            }
                        });

                        updatePreviewDisplay();
                    };
                })(i));

                // Click handler
                btn.addEventListener('click', (function(index) {
                    return function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        currentPreviewIndex = index;
                        hoveredIndex = -1;
                        
                        const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                        thumbnails.forEach((btn, idx) => {
                            if (idx === index) btn.classList.add('active');
                            else btn.classList.remove('active');
                        });
                        
                        updatePreviewDisplay();
                        triggerFileUpload(index);
                    };
                })(i));

                thumbnailNavigation.appendChild(btn);
            }

            // mark active
            const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
            thumbnails.forEach((btn, index) => {
                if (index === currentPreviewIndex) btn.classList.add('active');
                else btn.classList.remove('active');
                btn.classList.remove('hover');
            });
        }

        // update file info
        function updateFileInfo() {
            if (!fileInfo) return;
            const filled = selectedFiles.filter(f => f !== undefined).length;
            if (filled === 0) {
                fileInfo.innerHTML = '<p>No images selected. Click any slot or the preview box to upload. Minimum 2 images required.</p>';
            } else {
                fileInfo.innerHTML = `<p>${filled} of 5 slots filled. Click a slot to upload/replace images.</p>`;
            }
        }

        // form validation
        function validateForm() {
            if (!nameInput?.value?.trim()) return false;
            if (!categoryInput?.value?.trim()) return false;
            if (!priceInput?.value || parseFloat(priceInput.value) <= 0) return false;
            if (!stockInput?.value || parseInt(stockInput.value) < 0) return false;
            if (!descriptionInput?.value?.trim()) return false;
            if (!editMode && selectedFiles.filter(f => f !== undefined).length < 2) return false;
            return true;
        }

        function updateSaveButtonState() {
            if (!saveBtn) return;
            saveBtn.disabled = !validateForm();
        }

        // event listeners
        if (mainPreviewBox) {
            mainPreviewBox.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                triggerFileUpload(currentPreviewIndex);
            });
        }

        [nameInput, categoryInput, priceInput, stockInput, descriptionInput].forEach(field => {
            if (field) {
                field.addEventListener('input', () => {
                    formChanged = true;
                    updateSaveButtonState();
                });
            }
        });

        // form submission
        if (productForm) {
            productForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if (isSubmitting) return;

                if (!validateForm()) {
                    let message = 'Please fill in all required fields.';
                    if (!editMode && selectedFiles.filter(f => f !== undefined).length < 2) {
                        message = 'Please upload at least 2 images.';
                    }
                    showModal(message);
                    return;
                }

                isSubmitting = true;
                const originalText = saveBtn?.textContent || 'Save';
                if (saveBtn) {
                    saveBtn.textContent = 'Saving...';
                    saveBtn.disabled = true;
                }

                try {
                    const formData = new FormData(productForm);
                    formData.delete('images[]');
                    selectedFiles.forEach(file => {
                        if (file) formData.append('images[]', file);
                    });

                    const currentPath = window.location.pathname;
                    let apiPath = '../database/seller-new-product-handler.php';
                    if (!currentPath.includes('/pages/')) {
                        apiPath = 'database/seller-new-product-handler.php';
                    }

                    const response = await fetch(apiPath, {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.status === 'success') {
                        showModal(result.message);
                        setTimeout(() => {
                            window.location.href = 'seller-manage-product.php';
                        }, 1500);
                    } else {
                        showModal(result.message || 'Failed to save product.');
                        if (saveBtn) {
                            saveBtn.textContent = originalText;
                            saveBtn.disabled = false;
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showModal('Network error. Please try again.');
                    if (saveBtn) {
                        saveBtn.textContent = originalText;
                        saveBtn.disabled = false;
                    }
                } finally {
                    isSubmitting = false;
                }
            });
        }

        // back button
        if (backBtn) {
            backBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (formChanged) {
                    if (confirm('You have unsaved changes. Are you sure you want to leave?')) {
                        window.location.href = 'seller-manage-product.php';
                    }
                } else {
                    window.location.href = 'seller-manage-product.php';
                }
            });
        }

        // cleanup
        window.addEventListener('beforeunload', function() {
            cleanupObjectUrls();
        });

        // initial render
        renderThumbnailNavigation();
        updateFileInfo();
        updateSaveButtonState();

        console.log('Initialization complete');
    }
})();
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-process-order.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-process-order.js */
/* Updated to handle inactive products with "Product Unavailable" message */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('sellerOrdersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const filterTabsContainer = document.getElementById('filterTabs');
    
    // Confirmation Modal Elements
    const confirmModal = document.getElementById('confirmModal');
    const confirmTitle = document.getElementById('confirmTitle');
    const confirmMessage = document.getElementById('confirmMessage');
    const cancelAction = document.getElementById('cancelAction');
    const confirmAction = document.getElementById('confirmAction');
    
    // Notification Modal Elements
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    // State
    let currentAction = null;
    let currentOrderId = null;
    let currentFilter = 'all';
    let allOrders = [];

    // ============= MODAL FUNCTIONS =============
    function showModal(modal) {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }
    
    function hideModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }
    
    function hideAllModals() {
        hideModal(confirmModal);
        hideModal(notificationModal);
        currentAction = null;
        currentOrderId = null;
    }
    
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        showModal(notificationModal);
        
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= FILTER FUNCTIONS =============
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterOrders(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderOrders(allOrders);
        } else {
            const filtered = allOrders.filter(order => order.status === filter);
            renderOrders(filtered);
        }
    }

    // ============= SHOW/HIDE FILTER TABS =============
    function updateFilterTabsVisibility() {
        if (!filterTabsContainer) return;
        
        if (allOrders && allOrders.length > 0) {
            filterTabsContainer.style.display = 'flex';
        } else {
            filterTabsContainer.style.display = 'none';
        }
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                allOrders = result.data;
                updateFilterTabsVisibility();
                filterOrders(currentFilter);
            } else {
                allOrders = [];
                updateFilterTabsVisibility();
                ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load orders. Please try again.</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            allOrders = [];
            updateFilterTabsVisibility();
            ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
        }
    }

    // ============= FORMAT DATE =============
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return date.toLocaleDateString(undefined, options);
    }

    // ============= GET IMAGE PATH =============
    function getProductImageUrl(mediaPath) {
        if (!mediaPath) {
            return '../assets/image/icons/package.svg';
        }
        
        if (mediaPath.includes('/media/')) {
            const baseDir = mediaPath.endsWith('/') ? mediaPath : mediaPath + '/';
            return '../database/data-storage-handler.php?action=serve&path=' + encodeURIComponent(baseDir + 'thumbnail_1.png');
        }
        
        if (mediaPath.startsWith('assets/')) {
            return '../' + mediaPath;
        }
        
        if (mediaPath.startsWith('http')) {
            return mediaPath;
        }
        
        if (mediaPath.startsWith('../')) {
            return mediaPath;
        }
        
        return '../' + mediaPath;
    }

    // ============= ESCAPE HTML =============
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============= RENDER ORDERS =============
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/order.svg" alt="No orders" class="empty-state-icon">
                        <h2>No Orders Found</h2>
                        <p>You haven't received any orders yet.</p>
                    </div>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            
            const imagePath = getProductImageUrl(order.image_path);
            
            const customerName = `${escapeHtml(order.first_name || '')} ${escapeHtml(order.last_name || '')}`.trim() || 'Customer';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);
            
            // Check if product is active
            const isProductActive = order.is_active ? true : false;

            let eventHtml = '';
            eventHtml += `<div class="event-item customer-event"><span class="event-icon"><img src="../assets/image/icons/order.svg" alt="Order placed" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%); vertical-align: middle;"></span><span class="event-text">Order placed: ${orderDate}</span></div>`;

            if (order.status === 'delivered' && order.delivered_at) {
                const deliveredDate = formatDate(order.delivered_at);
                eventHtml += `<div class="event-item delivered-event"><span class="event-icon"><img src="../assets/image/icons/package.svg" alt="Item sold" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">Item sold: ${deliveredDate}</span></div>`;
            }

            if (order.status === 'cancelled' && order.cancelled_at) {
                const cancelledDate = formatDate(order.cancelled_at);
                const cancelledBy = order.cancelled_by === 'customer' ? 'Customer' : 'Seller';
                eventHtml += `<div class="event-item cancelled-event"><span class="event-icon"><img src="../assets/image/icons/cancel.svg" alt="Cancelled" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">${cancelledBy} cancelled: ${cancelledDate}</span></div>`;
            }

            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="customer-info">${customerName}</span>
                            <span class="order-status-badge ${statusClass}">${displayStatus}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <div class="order-product-column">
                            <div class="column-title">Product Details</div>
                            <div class="product-details">
                                <img src="${imagePath}" alt="${escapeHtml(order.product_name)}" 
                                     class="product-thumbnail"
                                     onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                <div class="product-info">
                                    ${!isProductActive ? '<span class="inactive-badge" style="display: inline-block; background: #000000; color: #ffffff; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; margin-bottom: 5px;">Product Unavailable</span>' : ''}
                                    <h4>${!isProductActive ? 'This product is unavailable' : escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="order-event-column">
                            <div class="column-title">Event Activity</div>
                            <div class="event-activity-content">
                                ${eventHtml}
                            </div>
                        </div>

                        <div class="order-shipping-column">
                            <div class="column-title">Customer Details</div>
                            <div class="shipping-details">
                                <p><strong>Name:</strong> ${customerName}</p>
                                <p class="shipping-address-text"><strong>Address:</strong> ${escapeHtml(order.shipping_address || 'No address provided')}</p>
                                <p><strong>Contact:</strong> ${escapeHtml(order.contact_number || 'N/A')}</p>
                                <p><strong>Email:</strong> ${escapeHtml(order.email || 'N/A')}</p>
                            </div>
                        </div>

                        <div class="order-price-summary">
                            <div class="column-title">Order Summary</div>
                            <div class="price-summary-details">
                                <div class="price-row">
                                    <span>Subtotal</span>
                                    <span class="price-value">₱${subtotal}</span>
                                </div>
                                <div class="price-row">
                                    <span>Shipping</span>
                                    <span class="price-value free-shipping">Free</span>
                                </div>
                                <div class="price-divider"></div>
                                <div class="price-row price-total">
                                    <span>Total</span>
                                    <span class="price-value">₱${total}</span>
                                </div>
                            </div>
            `;

            // Action buttons - only shown for pending orders and if product is active
            if (order.status === 'pending' && isProductActive) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn complete" data-order-id="${order.order_id}">
                            Mark as Delivered
                        </button>
                        <button class="action-btn cancel" data-order-id="${order.order_id}">
                            Cancel Order
                        </button>
                    </div>
                `;
            } else if (order.status === 'pending' && !isProductActive) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn cancel" data-order-id="${order.order_id}" style="margin-top: 10px;">
                            Cancel Order (Product Unavailable)
                        </button>
                    </div>
                `;
            }
            
            html += `
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        document.querySelectorAll('.action-btn.complete').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                
                currentAction = 'delivered';
                currentOrderId = orderId;
                
                if (confirmTitle) confirmTitle.textContent = 'Confirm Delivery';
                if (confirmMessage) confirmMessage.textContent = 'Mark this order as delivered? This action cannot be undone.';
                
                showModal(confirmModal);
            });
        });
        
        document.querySelectorAll('.action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                
                currentAction = 'cancelled';
                currentOrderId = orderId;
                
                if (confirmTitle) confirmTitle.textContent = 'Cancel Order';
                if (confirmMessage) confirmMessage.textContent = 'Are you sure you want to cancel this order? This will restore stock quantity.';
                
                showModal(confirmModal);
            });
        });
    }

    // ============= UPDATE ORDER STATUS =============
    async function updateOrderStatus() {
        if (!currentOrderId || !currentAction) return;
        
        if (confirmAction) {
            confirmAction.disabled = true;
            confirmAction.textContent = 'Processing...';
        }
        
        try {
            const formData = new URLSearchParams();
            formData.append('action', 'update_item_status');
            formData.append('order_id', currentOrderId);
            formData.append('status', currentAction);
            
            const response = await fetch('../database/order-handler.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: formData
            });
            
            const result = await response.json();
            
            if (result.status === 'success') {
                showNotification(`Order marked as ${currentAction} successfully`);
                hideModal(confirmModal);
                
                setTimeout(() => {
                    loadOrders();
                }, 1000);
            } else {
                showNotification(result.message || 'Failed to update order', true);
            }
        } catch (error) {
            console.error('Update status error:', error);
            showNotification('Network error. Please try again.', true);
        } finally {
            if (confirmAction) {
                confirmAction.disabled = false;
                confirmAction.textContent = 'Confirm';
            }
            currentAction = null;
            currentOrderId = null;
        }
    }

    // ============= FILTER TAB CLICK HANDLERS =============
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterOrders(filter);
        });
    });

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelAction) {
        cancelAction.addEventListener('click', () => {
            hideModal(confirmModal);
            currentAction = null;
            currentOrderId = null;
        });
    }

    if (confirmAction) {
        confirmAction.addEventListener('click', updateOrderStatus);
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', () => {
            hideModal(notificationModal);
        });
    }

    [confirmModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // ============= INITIAL LOAD =============
    loadOrders();
});
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-dashboard.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-dashboard.js */
document.addEventListener('DOMContentLoaded', function() {
    initDashboardStats();
    initQuickActions();
});

function initDashboardStats() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

function initQuickActions() {
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (!this.hasAttribute('href')) {
                e.preventDefault();
            }
        });
    });
}
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-fill-form.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-fill-form.js */
/* Fixed: Birthdate validation only triggers on save, not on input/change; custom unsaved changes modal */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const form = document.getElementById('sellerFillForm');
    const saveBtn = document.getElementById('saveSellerBtn');
    const backCancelBtn = document.getElementById('backCancelBtn');
    
    // Get all required fields (excluding middle_name which is optional)
    const requiredFields = [
        document.getElementById('first_name'),
        document.getElementById('last_name'),
        document.getElementById('birthdate'),
        document.getElementById('gender'),
        document.getElementById('address'),
        document.getElementById('business_name')
    ];
    
    // Optional field (middle name)
    const middleNameField = document.getElementById('middle_name');
    
    // File inputs
    const identityPhoto = document.getElementById('identity_photo');
    const idDocument = document.getElementById('id_document');
    
    // Preview elements
    const identityPreview = document.getElementById('identityPreview');
    const idDocumentPreview = document.getElementById('idDocumentPreview');
    const identityFileName = document.getElementById('identityFileName');
    const idDocumentFileName = document.getElementById('idDocumentFileName');
    
    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalOkBtn = document.getElementById('modalOkBtn');
    
    // Unsaved Changes Modal - create it dynamically
    const unsavedModal = document.createElement('div');
    unsavedModal.id = 'unsavedChangesModal';
    unsavedModal.className = 'modal';
    unsavedModal.style.display = 'none';
    unsavedModal.innerHTML = `
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/edit.svg" alt="Unsaved changes">
            </div>
            <h3 class="modal-title">Unsaved Changes</h3>
            <p class="modal-message">You have unsaved changes. Do you want to continue editing or leave?</p>
            <div class="modal-actions">
                <button id="continueEditingBtn" class="modal-btn modal-btn-secondary">Continue Editing</button>
                <button id="confirmLeaveBtn" class="modal-btn modal-btn-primary">Leave</button>
            </div>
        </div>
    `;
    document.body.appendChild(unsavedModal);
    
    const continueEditingBtn = document.getElementById('continueEditingBtn');
    const confirmLeaveBtn = document.getElementById('confirmLeaveBtn');
    
    // Hidden field to check if user is already a seller
    const isSeller = document.querySelector('input[name="is_seller"]')?.value === '1';
    
    // ============= STATE =============
    let isSubmitting = false;
    let formChanged = false;
    let initialFormState = {}; // Store initial form values
    let pendingNavigationUrl = null; // URL to navigate to after unsaved changes decision
    let birthdateValid = true; // Track birthdate validity separately

    // ============= MODAL FUNCTIONS =============
    function showModal(message) {
        if (!modal || !modalMessage) return;
        modalMessage.textContent = message;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function hideModal() {
        if (!modal) return;
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    function showUnsavedModal(url) {
        pendingNavigationUrl = url;
        unsavedModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function hideUnsavedModal() {
        unsavedModal.style.display = 'none';
        document.body.style.overflow = '';
        pendingNavigationUrl = null;
    }
    
    if (modalOkBtn) {
        modalOkBtn.addEventListener('click', hideModal);
    }
    
    if (continueEditingBtn) {
        continueEditingBtn.addEventListener('click', function() {
            hideUnsavedModal();
        });
    }
    
    if (confirmLeaveBtn) {
        confirmLeaveBtn.addEventListener('click', function() {
            if (pendingNavigationUrl) {
                window.location.href = pendingNavigationUrl;
            }
        });
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
        if (e.target === unsavedModal) hideUnsavedModal();
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            hideModal();
        }
        if (e.key === 'Escape' && unsavedModal && unsavedModal.style.display === 'flex') {
            hideUnsavedModal();
        }
    });
    
    // ============= CAPTURE INITIAL FORM STATE =============
    function captureInitialState() {
        requiredFields.forEach(field => {
            if (field) {
                if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                    initialFormState[field.id] = field.value || '';
                } else if (field.tagName === 'SELECT') {
                    initialFormState[field.id] = field.value || '';
                }
            }
        });
        
        if (middleNameField) {
            initialFormState[middleNameField.id] = middleNameField.value || '';
        }
    }
    
    // ============= CHECK IF FORM ACTUALLY CHANGED =============
    function hasFormChanged() {
        // Check required fields
        for (let field of requiredFields) {
            if (!field) continue;
            
            const currentValue = field.tagName === 'SELECT' ? field.value : field.value || '';
            const initialValue = initialFormState[field.id] || '';
            
            if (currentValue !== initialValue) {
                return true;
            }
        }
        
        // Check middle name
        if (middleNameField) {
            if ((middleNameField.value || '') !== (initialFormState[middleNameField.id] || '')) {
                return true;
            }
        }
        
        // Check file inputs (if they have files selected)
        if (identityPhoto && identityPhoto.files.length > 0) {
            return true;
        }
        if (idDocument && idDocument.files.length > 0) {
            return true;
        }
        
        return false;
    }
    
    // ============= FORM VALIDATION =============
    function validateForm() {
        // Check all required fields (excluding file inputs)
        for (let field of requiredFields) {
            if (!field) continue;
            
            // For text inputs, check value
            if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                if (!field.value || !field.value.trim()) {
                    return false;
                }
            }
            
            // For select elements
            if (field.tagName === 'SELECT') {
                if (!field.value) {
                    return false;
                }
            }
        }
        
        // Validate birthdate separately if needed
        if (!birthdateValid) {
            return false;
        }
        
        return true;
    }
    
    function highlightMissingFields() {
        // Remove any existing highlights
        requiredFields.forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });
        
        // Highlight missing required fields
        requiredFields.forEach(field => {
            if (!field) return;
            
            // Check if field is empty
            let isEmpty = false;
            if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                isEmpty = !field.value || !field.value.trim();
            } else if (field.tagName === 'SELECT') {
                isEmpty = !field.value;
            }
            
            if (isEmpty) {
                field.style.borderColor = '#FF8246';
                field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
            }
        });
        
        // Highlight birthdate if invalid
        const birthdateField = document.getElementById('birthdate');
        if (birthdateField && !birthdateValid) {
            birthdateField.style.borderColor = '#FF8246';
            birthdateField.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
        }
    }
    
    function clearHighlights() {
        requiredFields.forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });
    }
    
    // ============= UPDATE SAVE BUTTON STATE =============
    function updateSaveButtonState() {
        if (!saveBtn) return;
        
        if (validateForm()) {
            saveBtn.disabled = false;
            saveBtn.classList.remove('disabled');
        } else {
            saveBtn.disabled = true;
            saveBtn.classList.add('disabled');
        }
    }
    
    // ============= TRACK FORM CHANGES FOR REQUIRED FIELDS ONLY =============
    function handleRequiredFieldChange() {
        formChanged = hasFormChanged();
        updateSaveButtonState();
    }
    
    // Add change listeners to required fields
    requiredFields.forEach(field => {
        if (field) {
            field.addEventListener('input', handleRequiredFieldChange);
            field.addEventListener('change', handleRequiredFieldChange);
        }
    });
    
    // Add listener for middle name (optional, but still tracks form changes)
    if (middleNameField) {
        middleNameField.addEventListener('input', function() {
            formChanged = hasFormChanged();
            // Middle name changes do NOT affect save button state
        });
    }
    
    // ============= FILE UPLOAD HANDLING - TRACK CHANGES =============
    function handleFileUpload(input, previewElement, fileNameElement) {
        if (!input || !previewElement || !fileNameElement) return;
        
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                fileNameElement.textContent = file.name;
                
                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.style.backgroundImage = `url('${e.target.result}')`;
                    previewElement.style.backgroundSize = 'cover';
                    previewElement.style.backgroundPosition = 'center';
                };
                reader.readAsDataURL(file);
                
                // Add visual feedback
                previewElement.style.border = '2px solid #FF8246';
            } else {
                fileNameElement.textContent = '';
                previewElement.style.backgroundImage = '';
                previewElement.style.border = '';
            }
            
            // Check if form actually changed
            formChanged = hasFormChanged();
        });
    }
    
    handleFileUpload(identityPhoto, identityPreview, identityFileName);
    handleFileUpload(idDocument, idDocumentPreview, idDocumentFileName);
    
    // ============= CAPTURE INITIAL STATE AFTER PAGE LOAD =============
    captureInitialState();
    
    // ============= INITIAL CHECK =============
    updateSaveButtonState();
    
    // ============= FORM SUBMISSION =============
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            clearHighlights();
            
            // Validate birthdate on save
            const birthdateField = document.getElementById('birthdate');
            if (birthdateField && birthdateField.value) {
                const selectedDate = new Date(birthdateField.value);
                const today = new Date();
                let age = today.getFullYear() - selectedDate.getFullYear();
                const monthDiff = today.getMonth() - selectedDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
                    age--;
                }
                
                if (age < 13) {
                    birthdateValid = false;
                    highlightMissingFields();
                    showModal('You must be at least 13 years old to become a seller.');
                    return;
                } else if (age > 120) {
                    birthdateValid = false;
                    highlightMissingFields();
                    showModal('Please enter a valid birthdate.');
                    return;
                } else {
                    birthdateValid = true;
                }
            }
            
            // Check if form is valid (required fields only)
            if (!validateForm()) {
                highlightMissingFields();
                showModal('Please fill in all required fields including Store Name.');
                return;
            }
            
            isSubmitting = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';
            saveBtn.disabled = true;
            
            try {
                const formData = new FormData(form);
                
                const response = await fetch('../database/seller-fill-form-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showModal(result.message);
                    
                    // If there were missing fields highlighted, clear them
                    clearHighlights();
                    
                    // After successful save, reset the form changed flag
                    formChanged = false;
                    
                    // After 1.5 seconds, redirect based on seller status
                    setTimeout(() => {
                        if (isSeller) {
                            // Existing seller - go back to dashboard
                            window.location.href = 'seller-dashboard.php';
                        } else {
                            // New seller - go to dashboard after application
                            window.location.href = 'seller-dashboard.php';
                        }
                    }, 1500);
                    
                } else {
                    showModal(result.message || 'Failed to save. Please try again.');
                    
                    // Highlight missing fields if returned from server
                    if (result.missing_fields && Array.isArray(result.missing_fields)) {
                        result.missing_fields.forEach(fieldName => {
                            const field = document.getElementById(fieldName);
                            if (field) {
                                field.style.borderColor = '#FF8246';
                                field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
                            }
                        });
                    }
                    
                    saveBtn.textContent = originalText;
                    saveBtn.disabled = false;
                }
            } catch (error) {
                console.error('Error saving seller info:', error);
                showModal('Network error. Please check your connection and try again.');
                saveBtn.textContent = originalText;
                saveBtn.disabled = false;
            } finally {
                isSubmitting = false;
            }
        });
    }
    
    // ============= BACK/CANCEL BUTTON =============
    if (backCancelBtn) {
        backCancelBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetUrl = isSeller ? 'seller-dashboard.php' : 'customer-dashboard.php';
            
            if (hasFormChanged()) {
                showUnsavedModal(targetUrl);
            } else {
                window.location.href = targetUrl;
            }
        });
    }
    
    // ============= AUTO-RESIZE TEXTAREA =============
    const addressField = document.getElementById('address');
    if (addressField) {
        function autoResize() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        }
        
        addressField.addEventListener('input', function() {
            autoResize.call(this);
            handleRequiredFieldChange(); // This is a required field
        });
        setTimeout(() => autoResize.call(addressField), 100);
    }
    
    // ============= BIRTHDATE HANDLING - FIXED =============
    const birthdateField = document.getElementById('birthdate');
    if (birthdateField) {
        // Remove any previous validation listeners that might trigger modal
        // Just track changes without validation modal
        birthdateField.addEventListener('input', function() {
            // Only track that form has changed, don't validate
            formChanged = hasFormChanged();
            // Reset validity flag - will be checked on save
            birthdateValid = true;
            // Clear any highlight when user types
            this.style.borderColor = '';
            this.style.boxShadow = '';
        });
        
        birthdateField.addEventListener('change', function() {
            // Only track that form has changed, don't validate
            formChanged = hasFormChanged();
            // Reset validity flag - will be checked on save
            birthdateValid = true;
        });
    }
    
    // ============= ADD UNSAVED CHANGES STYLES =============
    const style = document.createElement('style');
    style.textContent = `
        .modal-btn-secondary {
            background: #000000;
            color: #ffffff;
            border: 1px solid #000000;
        }
        .modal-btn-secondary:hover {
            background: #333333;
        }
        .modal-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #000000;
        }
    `;
    document.head.appendChild(style);
});
```

---

## File: `Crooks-Cart-Collectives/scripts/cart.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/cart.js */
/* Shopping Cart JavaScript - Updated to handle inactive products */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    console.log('Cart.js loaded');

    // ===== UTILITY FUNCTIONS =====
    function showMessage(message, type = 'error') {
        const existingMsg = document.querySelector('.cart-message');
        if (existingMsg) existingMsg.remove();

        const msgDiv = document.createElement('div');
        msgDiv.className = `cart-message ${type}`;
        msgDiv.textContent = message;
        document.body.appendChild(msgDiv);

        setTimeout(() => {
            if (msgDiv.parentNode) msgDiv.remove();
        }, 3000);
    }

    function showConfirmation(title, message) {
        return new Promise((resolve) => {
            const existingModal = document.querySelector('.cart-notifier-modal');
            if (existingModal) existingModal.remove();

            const modal = document.createElement('div');
            modal.className = 'cart-notifier-modal active';
            modal.id = 'confirmModal';
            modal.innerHTML = `
                <div class="cart-notifier-content">
                    <div class="cart-notifier-icon">
                        <img src="../assets/image/icons/trash.svg" 
                             alt="Delete" 
                             style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                             onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>${title}</h3>
                    <p>${message}</p>
                    <div class="cart-notifier-actions">
                        <button id="cancelAction" class="cart-notifier-btn continue-btn">Cancel</button>
                        <button id="confirmAction" class="cart-notifier-btn view-cart-btn">Confirm</button>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);

            function cleanup() {
                if (modal.parentNode) modal.remove();
            }

            document.getElementById('cancelAction').addEventListener('click', (e) => {
                e.preventDefault();
                cleanup();
                resolve(false);
            });

            document.getElementById('confirmAction').addEventListener('click', (e) => {
                e.preventDefault();
                cleanup();
                resolve(true);
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    cleanup();
                    resolve(false);
                }
            });
        });
    }

    async function updateHeaderCartCount() {
        try {
            const response = await fetch('../database/cart-handler.php?action=get_count');
            const data = await response.json();

            if (data.status === 'success' && window.HeaderFunctions) {
                window.HeaderFunctions.updateCartCount();
            }
        } catch (e) {
            console.error('Failed to update cart count', e);
        }
    }

    // ===== QUANTITY INPUT HANDLERS - Only for active items =====
    document.querySelectorAll('.cart-item[data-active="1"] .quantity-input').forEach(input => {
        let timeoutId;

        input.addEventListener('input', function() {
            clearTimeout(timeoutId);

            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
                value = 1;
            }
            if (value > parseInt(this.max)) {
                this.value = this.max;
                value = parseInt(this.max);
            }
        });

        input.addEventListener('change', async function() {
            const itemId = this.dataset.id;
            const quantity = parseInt(this.value);
            const originalValue = this.defaultValue;
            const maxStock = parseInt(this.max);

            if (quantity < 1 || quantity > maxStock) {
                this.value = originalValue;
                showMessage(`Quantity must be between 1 and ${maxStock}`, 'error');
                return;
            }

            if (quantity === parseInt(originalValue)) {
                return;
            }

            this.disabled = true;
            const cartItem = this.closest('.cart-item');
            if (cartItem) cartItem.classList.add('loading');

            try {
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'update',
                        cart_item_id: itemId,
                        quantity: quantity
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    const priceText = cartItem.querySelector('.cart-item-price').textContent;
                    const price = parseFloat(priceText.replace(/[^0-9.-]+/g, ''));
                    const newSubtotal = price * quantity;

                    const subtotalSpan = cartItem.querySelector('.subtotal-amount');
                    if (subtotalSpan) {
                        subtotalSpan.textContent = '₱' + newSubtotal.toFixed(2);
                    }

                    let newTotal = 0;
                    document.querySelectorAll('.cart-item[data-active="1"] .subtotal-amount').forEach(span => {
                        newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                    });
                    
                    const totalElement = document.getElementById('cartTotal');
                    if (totalElement) {
                        totalElement.textContent = '₱' + newTotal.toFixed(2);
                    }

                    this.defaultValue = quantity;
                    showMessage('Cart updated successfully', 'success');
                } else {
                    this.value = originalValue;
                    showMessage(result.message || 'Error updating quantity', 'error');
                }
            } catch (error) {
                console.error('Update error:', error);
                this.value = originalValue;
                showMessage('Network error. Please try again.', 'error');
            } finally {
                this.disabled = false;
                if (cartItem) cartItem.classList.remove('loading');
            }
        });

        input.addEventListener('keypress', (e) => {
            if (!/^\d+$/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && 
                e.key !== 'ArrowLeft' && e.key !== 'ArrowRight' && e.key !== 'Tab') {
                e.preventDefault();
            }
        });
    });

    // ===== REMOVE BUTTON HANDLERS - Works for all items =====
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const confirmed = await showConfirmation(
                'Confirm Removal',
                'Are you sure you want to remove this item from your cart?'
            );

            if (!confirmed) return;

            const itemId = this.dataset.id;
            const cartItem = this.closest('.cart-item');

            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Removing...';
            if (cartItem) cartItem.classList.add('loading');

            try {
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'remove',
                        cart_item_id: itemId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    if (cartItem) {
                        cartItem.style.transition = 'opacity 0.3s ease';
                        cartItem.style.opacity = '0';

                        setTimeout(() => {
                            if (cartItem.parentNode) cartItem.remove();

                            let newTotal = 0;
                            document.querySelectorAll('.cart-item[data-active="1"] .subtotal-amount').forEach(span => {
                                newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                            });

                            const totalElement = document.getElementById('cartTotal');
                            if (totalElement) {
                                totalElement.textContent = '₱' + newTotal.toFixed(2);
                            }

                            showMessage('Item removed from cart', 'success');
                            updateHeaderCartCount();

                            if (document.querySelectorAll('.cart-item').length === 0) {
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                // Check if all remaining items are inactive
                                const activeItems = document.querySelectorAll('.cart-item[data-active="1"]');
                                const checkoutBtn = document.querySelector('.cart-actions .btn-primary');
                                if (checkoutBtn && activeItems.length === 0) {
                                    checkoutBtn.textContent = 'No Active Items';
                                    checkoutBtn.disabled = true;
                                    checkoutBtn.style.opacity = '0.5';
                                    checkoutBtn.style.cursor = 'not-allowed';
                                }
                            }
                        }, 300);
                    }
                } else {
                    showMessage(result.message || 'Error removing item', 'error');
                    this.disabled = false;
                    this.textContent = originalText;
                    if (cartItem) cartItem.classList.remove('loading');
                }
            } catch (error) {
                console.error('Remove error:', error);
                showMessage('Network error. Please try again.', 'error');
                this.disabled = false;
                this.textContent = originalText;
                if (cartItem) cartItem.classList.remove('loading');
            }
        });
    });

    // Update cart count on page load
    updateHeaderCartCount();
    console.log('Cart.js initialization complete');
});
```

---

## File: `Crooks-Cart-Collectives/scripts/customer-profile.js`

**Status:** `FOUND`

```javascript
// customer-profile.js - Fixed with birthdate validation

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Get ALL editable fields in Personal Info section
    const editableInputs = document.querySelectorAll(
        '.personal-info-section input:not([type="hidden"]):not([type="file"]), ' +
        '.personal-info-section select, ' +
        '.personal-info-section textarea'
    );
    
    const profilePicUpload = document.getElementById('profilePictureUpload');
    const chooseButtonContainer = document.getElementById('chooseButtonContainer');
    const triggerFileUpload = document.getElementById('triggerFileUpload');
    const profilePicInput = document.getElementById('profile_picture');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const addressInput = document.getElementById('address');
    const birthdateInput = document.getElementById('birthdate');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== BIRTHDATE VALIDATION FUNCTIONS =====
    function calculateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function isValidAge(birthdate) {
        if (!birthdate) return false;
        
        const age = calculateAge(birthdate);
        return age >= 13 && age <= 120;
    }

    function validateBirthdate(birthdate) {
        if (!birthdate) {
            return { valid: false, message: 'Birthdate is required.' };
        }
        
        const age = calculateAge(birthdate);
        
        if (age < 13) {
            return { valid: false, message: 'You must be at least 13 years old.' };
        }
        
        if (age > 120) {
            return { valid: false, message: 'Please enter a valid birthdate.' };
        }
        
        return { valid: true, message: '' };
    }

    function highlightField(field, isValid) {
        if (!field) return;
        
        if (!isValid) {
            field.style.borderColor = '#FF8246';
            field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
        }
    }

    // Modal functions
    function showModal(message) {
        modalMessage.textContent = message;
        modal.style.display = 'flex';
    }

    function hideModal() {
        modal.style.display = 'none';
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    // Store original values
    function storeOriginalValues() {
        originalValues = {};
        editableInputs.forEach(input => {
            if (input.id) {
                originalValues[input.id] = input.value;
            }
        });
        if (profilePicPreview) {
            originalValues.profile_picture = profilePicPreview.src;
        }
    }

    // Enable edit mode
    function enableEditMode() {
        isEditMode = true;
        editBtn.textContent = 'Cancel';
        saveBtn.disabled = false;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'block';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'flex';
        }
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        pictureChanged = false;
        
        // Clear any existing validation highlights
        if (birthdateInput) {
            highlightField(birthdateInput, true);
        }
    }

    // Disable edit mode
    function disableEditMode(restore = true) {
        isEditMode = false;
        editBtn.textContent = 'Edit';
        saveBtn.disabled = true;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'none';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'none';
        }
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.textContent = '';
        }
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        if (restore) {
            for (let id in originalValues) {
                const field = document.getElementById(id);
                if (field) {
                    field.value = originalValues[id];
                }
            }
            if (originalValues.profile_picture && profilePicPreview) {
                profilePicPreview.src = originalValues.profile_picture;
            }
        }
        
        // Clear validation highlights
        if (birthdateInput) {
            highlightField(birthdateInput, true);
        }
        
        pictureChanged = false;
    }

    // Trigger file upload from the Choose button
    if (triggerFileUpload && profilePicInput) {
        triggerFileUpload.addEventListener('click', function() {
            profilePicInput.click();
        });
    }

    // File input change
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = file.name;
                }
                pictureChanged = true;
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (profilePicPreview) {
                        profilePicPreview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = '';
                }
                pictureChanged = false;
            }
        });
    }

    // Real-time birthdate validation when in edit mode
    if (birthdateInput) {
        birthdateInput.addEventListener('input', function() {
            if (!isEditMode) return;
            
            const validation = validateBirthdate(this.value);
            highlightField(this, validation.valid);
        });
        
        birthdateInput.addEventListener('blur', function() {
            if (!isEditMode) return;
            
            if (this.value) {
                const validation = validateBirthdate(this.value);
                highlightField(this, validation.valid);
            }
        });
    }

    // Edit/Cancel button
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            if (!isEditMode) {
                storeOriginalValues();
                enableEditMode();
            } else {
                disableEditMode(true);
            }
        });
    }

    // Save button
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const address = addressInput ? addressInput.value.trim() : '';
            const birthdate = birthdateInput ? birthdateInput.value : '';

            if (!firstName || !lastName || !address) {
                showModal('First name, last name, and address are required.');
                return;
            }

            // Validate birthdate
            if (birthdate) {
                const validation = validateBirthdate(birthdate);
                if (!validation.valid) {
                    highlightField(birthdateInput, false);
                    showModal(validation.message);
                    return;
                }
            } else {
                highlightField(birthdateInput, false);
                showModal('Birthdate is required.');
                return;
            }

            // Disable button and store original text
            saveBtn.disabled = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/customer-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    // 1 second delay before handling UI updates
                    setTimeout(() => {
                        if (!pictureChanged) {
                            // Update the displayed full name (profile stack container)
                            const nameSpan = document.querySelector('.display-full-name');
                            if (nameSpan && result.data) {
                                nameSpan.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                            }
                            // Store new values as original for future cancels
                            storeOriginalValues();
                            // Exit edit mode without restoring old values
                            disableEditMode(false);
                        } else {
                            // Picture changed – force a full page reload after 1 second
                            window.location.reload(true);
                        }
                        // Reset save button text (already disabled by disableEditMode)
                        saveBtn.textContent = originalText;
                    }, 1000);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.');
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.');
                saveBtn.disabled = false;
                saveBtn.textContent = originalText;
            }
        });
    }

    // Prevent invalid date entry (optional - adds additional keyboard validation)
    if (birthdateInput) {
        birthdateInput.addEventListener('keydown', function(e) {
            // Allow navigation keys, backspace, delete, tab
            const allowedKeys = ['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Backspace', 'Delete', 'Tab', 'Home', 'End'];
            
            if (allowedKeys.includes(e.key)) {
                return;
            }
            
            // Prevent entering letters in date field (browser usually handles this, but just in case)
            if (e.key.length === 1 && !/[0-9-]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    // Initial store
    storeOriginalValues();
});
```

---

