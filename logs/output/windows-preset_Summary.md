# Web Project: Crooks-Cart-Collectives

**Preset:** windows-preset

**Generated:** 2026-03-03 02:27:47

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
**Generated:** 2026-03-03 02:27:45
**Mode:** all

```
Crooks-Cart-Collectives/
│
├── admin/
│   ├── assets/
│   │   └── image/
│   │       ├── brand/
│   │       │   └── Logo.png
│   │       ├── icons/
│   │       │   ├── about-empty.svg
│   │       │   ├── about-filled.svg
│   │       │   ├── add-circle-empty.svg
│   │       │   ├── add-to-queue.svg
│   │       │   ├── add.svg
│   │       │   ├── building.svg
│   │       │   ├── cancel.svg
│   │       │   ├── cart-arrow-downsvg.svg
│   │       │   ├── cart-arrow-up.svg
│   │       │   ├── cart-plus.svg
│   │       │   ├── cart-shopping-fast.svg
│   │       │   ├── cart-shopping.svg
│   │       │   ├── chart-line-up.svg
│   │       │   ├── community-general.svg
│   │       │   ├── complaint-icon.png
│   │       │   ├── contact-us-empty.svg
│   │       │   ├── contact-us-filled.svg
│   │       │   ├── edit.svg
│   │       │   ├── facebook.svg
│   │       │   ├── fill-form.svg
│   │       │   ├── github.svg
│   │       │   ├── hamburger-menu.svg
│   │       │   ├── instagram.svg
│   │       │   ├── logoutsvg.svg
│   │       │   ├── mail.svg
│   │       │   ├── order.svg
│   │       │   ├── package.svg
│   │       │   ├── password-hide.svg
│   │       │   ├── password-unhide.svg
│   │       │   ├── people-team.svg
│   │       │   ├── profile.svg
│   │       │   ├── reset.svg
│   │       │   ├── save-empty.svg
│   │       │   ├── save-filled.svg
│   │       │   ├── seller-product-placeholder.png
│   │       │   ├── Showcase1.png
│   │       │   ├── Showcase2.png
│   │       │   ├── star-empty.svg
│   │       │   ├── star-filled.svg
│   │       │   ├── submit-picture-icon.png
│   │       │   ├── submit-valid-id-icon.png
│   │       │   ├── time-update.svg
│   │       │   ├── trash.svg
│   │       │   ├── update.svg
│   │       │   ├── updatesvg.svg
│   │       │   ├── user-profile-circle.svg
│   │       │   ├── verified-empty.svg
│   │       │   ├── verified-filled.svg
│   │       │   └── youtube.svg
│   │       ├── team/
│   │       │   ├── charles-canoneo.png
│   │       │   ├── christian-adviento.png
│   │       │   ├── christian-mendoza.png
│   │       │   ├── clark-mallo.jpg
│   │       │   ├── clark-mallo.png
│   │       │   ├── kishiekel-fernandez.png
│   │       │   ├── lance-madelar.png
│   │       │   ├── rylle-bernardino.png
│   │       │   └── william-aranez.png
│   │       └── Logo.png
│   ├── database/
│   │   ├── admin-auth-handler.php
│   │   ├── admin-data-storage-handler.php
│   │   ├── admin-database-connect.php
│   │   ├── admin-logs-handler.php
│   │   ├── admin-profile-handler.php
│   │   ├── admin-reports-handler.php
│   │   ├── admin-sign-in-handler.php
│   │   ├── admin-sign-out-handler.php
│   │   ├── admin-sign-up-handler.php
│   │   ├── error_log.txt
│   │   └── validation.php
│   ├── includes/
│   │   ├── admin-footer.php
│   │   ├── admin-header.php
│   │   ├── admin-privacy-policy.php
│   │   └── admin-terms-and-conditions.php
│   ├── pages/
│   │   ├── admin-dashboard.php
│   │   ├── admin-logs.php
│   │   ├── admin-manage-report.php
│   │   ├── admin-profile.php
│   │   ├── admin-sign-in.php
│   │   ├── admin-sign-up.php
│   │   └── admin-verify-sellers.php
│   ├── scripts/
│   │   ├── admin-header.js
│   │   ├── admin-logs.js
│   │   ├── admin-profile.js
│   │   ├── admin-sign-in.js
│   │   ├── admin-sign-out.js
│   │   ├── admin-sign-up.js
│   │   └── admin-verify-sellers.js
│   ├── styles/
│   │   ├── admin-dashboard.css
│   │   ├── admin-footer.css
│   │   ├── admin-header.css
│   │   ├── admin-index.css
│   │   ├── admin-logs.css
│   │   ├── admin-privacy-policy.css
│   │   ├── admin-profile.css
│   │   ├── admin-sign-in.css
│   │   ├── admin-sign-out.css
│   │   ├── admin-sign-up.css
│   │   ├── admin-terms-and-conditions.css
│   │   └── admin-verify-sellers.css
│   └── admin-index.php
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
│   │   ├── admin_path.py
│   │   ├── linux-path.py
│   │   └── windows-preset.py
│   ├── output/
│   │   ├── admin_path_Summary.md
│   │   └── Project_Structure.md
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
| PHP Files | 59 |
| CSS Files | 35 |
| JavaScript Files | 27 |
| JSON Files | 0 |
| Text/Markdown | 6 |
| Image Files | 120 |
| Other Files | 13 |

**Total Directories:** 25
**Total Files:** 259

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
// FIXED VERSION - Fixed image fetching with proper path handling for root location
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
        WHERE p.is_active = 1 AND p.stock_quantity > 0
        ORDER BY RAND() 
        LIMIT 5
    ");
    $stmt->execute();
    $featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching featured products: " . $e->getMessage());
}

// Helper function to get product image URL for index page (root folder)
function getIndexProductImageUrl($mediaPath) {
    // Default fallback icon
    $fallbackIcon = 'assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackIcon;
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            // Found a thumbnail file – get its basename and build URL via data-storage-handler
            $thumbFile = basename($thumbFiles[0]);
            // Root folder path to database handler
            return 'database/data-storage-handler.php?action=serve&path=' . urlencode($mediaDir . $thumbFile);
        }
        
        // No thumbnail found – use fallback icon
        return $fallbackIcon;
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/ (root folder can access directly)
    if (strpos($mediaPath, 'assets/') === 0) {
        return $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return 'assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path - try to use it as is, but ensure it starts from root
    if (strpos($mediaPath, '../') === 0) {
        // Remove ../ from paths that try to go up from pages
        $mediaPath = str_replace('../', '', $mediaPath);
    }
    
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

        <!-- Features Section -->
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
                            // Get image URL with proper fallback
                            $imageUrl = getIndexProductImageUrl($product['media_path'] ?? '');
                            ?>
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                                loading="lazy" onerror="this.onerror=null; this.src='assets/image/icons/package.svg';">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                            <p class="product-seller">
                                Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                            </p>
                            <a href="pages/product-detail.php?id=<?php echo $product['product_id']; ?>"
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
        // Fetch reviews for this product with user profile
        $reviewStmt = $connection->prepare("
            SELECT pr.*, u.first_name, u.last_name, u.username, u.user_id, u.profile_picture
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

// Helper function to format username with user ID (like @username #00001)
function formatUsername($username, $userId) {
    // Format: @username #00001 (padded to 5 digits)
    return '@' . htmlspecialchars($username) . ' #' . str_pad($userId, 5, '0', STR_PAD_LEFT);
}

// Helper function to get profile picture URL
function getProfilePictureUrl($picture) {
    if (empty($picture)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    
    // If it's already a full URL
    if (filter_var($picture, FILTER_VALIDATE_URL)) {
        return $picture;
    }
    
    // Check if it's a path from data storage
    if (strpos($picture, 'Crooks-Data-Storage/users/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($picture);
    }
    
    // If it's a relative path
    if (strpos($picture, '../') === 0) {
        return $picture;
    }
    
    if (strpos($picture, 'assets/') === 0) {
        return '../' . $picture;
    }
    
    return $picture;
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
    <style>
    /* Review section fixes */
    .review-card {
        display: flex;
        flex-direction: column;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 20px;
        background: #ffffff;
    }

    .review-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .reviewer-profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #FF8246;
    }

    .reviewer-profile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .reviewer-info {
        display: flex;
        flex-direction: column;
    }

    .reviewer-username {
        font-size: 1rem;
        color: #000000;
    }

    .review-rating {
        display: flex;
        gap: 5px;
        margin-bottom: 10px;
    }

    .star {
        width: 18px;
        height: 18px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .review-comment {
        color: #333333;
        line-height: 1.6;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .review-date {
        font-size: 0.8rem;
        color: #999999;
    }

    .no-reviews-message {
        text-align: center;
        padding: 40px;
        background: #f5f5f5;
        border-radius: 8px;
        color: #666666;
        font-size: 1rem;
    }
    </style>
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
                            <a href="sign-in.php?redirect=<?php echo urlencode('product-detail.php?id=' . $product['product_id']); ?>"
                                class="btn btn-primary login-to-purchase-btn">
                                <span class="btn-text">Login to Purchase</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section (full width below) - FIXED: Only show username with user ID, no full name -->
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
                                <?php 
                                $profilePic = getProfilePictureUrl($review['profile_picture'] ?? '');
                                ?>
                                <img src="<?php echo htmlspecialchars($profilePic); ?>"
                                    alt="<?php echo htmlspecialchars($review['username']); ?>"
                                    onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                            </div>
                            <div class="reviewer-info">
                                <div class="reviewer-username">
                                    <?php echo formatUsername($review['username'], $review['user_id']); ?>
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

// Fetch all active products that are in stock
$products = [];
$categories = [];

try {
    // Get all categories for filter (only from active and in-stock products)
    $catStmt = $connection->prepare("
        SELECT DISTINCT category 
        FROM products 
        WHERE is_active = 1 AND stock_quantity > 0 
        ORDER BY category
    ");
    $catStmt->execute();
    $categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Get all active products that are in stock
    $prodStmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 AND p.stock_quantity > 0
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
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            // Found a thumbnail file – get its basename and build URL via data-storage-handler
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        } else {
            // No thumbnail found – use fallback
            return $fallbackImage;
        }
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
    <style>
    /* Optional: Style for out of stock message if you want to show them separately */
    .out-of-stock-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 5px;
    }
    </style>
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

// Helper function to get product image URL for orders page
function getOrdersImageUrl($mediaPath) {
    // Default fallback
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        }
        
        return $fallbackImage;
    }
    
    // Direct file path
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    return $fallbackImage;
}
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
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            // Found a thumbnail file – get its basename and build URL via data-storage-handler
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        } else {
            // No thumbnail found – use fallback
            return $fallbackImage;
        }
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

// Helper function to get product image URL for seller process orders
function getSellerProcessImageUrl($mediaPath) {
    // Default fallback
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        }
        
        return $fallbackImage;
    }
    
    // Direct file path
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    return $fallbackImage;
}
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
        const slider = document.querySelector('.showcase-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => this.stopAutoSlide());
            slider.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        // Touch/swipe support for mobile
        this.initTouchEvents();
        
        // Adjust slider height based on header
        this.adjustSliderHeight();
        window.addEventListener('resize', () => this.adjustSliderHeight());
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
            this.startAutoSlide();
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
    
    adjustSliderHeight() {
        const header = document.querySelector('.header-bar');
        const showcaseSection = document.querySelector('.showcase-section');
        if (header && showcaseSection) {
            const headerHeight = header.offsetHeight;
            const viewportHeight = window.innerHeight;
            showcaseSection.style.height = `calc(${viewportHeight * 0.6}px - ${headerHeight}px)`;
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
});

// ===== FALLBACK FOR ANY IMAGES THAT STILL FAIL TO LOAD =====
document.addEventListener('DOMContentLoaded', () => {
    // Add global image error handler for all product images
    document.querySelectorAll('.product-image').forEach(img => {
        // If image already failed to load, ensure it uses fallback
        if (img.complete && img.naturalHeight === 0) {
            img.src = 'assets/image/icons/package.svg';
        }
        
        // Add error handler for future errors
        img.addEventListener('error', function() {
            this.src = 'assets/image/icons/package.svg';
        });
    });
});

// ===== FIX FOR HEADER PATH ISSUES =====
// This ensures header links work correctly when on root vs pages
document.addEventListener('DOMContentLoaded', () => {
    // Check if we're in root or pages folder
    const isRoot = window.location.pathname === '/' || 
                   window.location.pathname.endsWith('index.php') ||
                   window.location.pathname.split('/').pop() === '';
    
    // Fix any navigation links that might have incorrect paths
    document.querySelectorAll('.nav-link, .social-button, .footer a').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.startsWith('pages/') && !isRoot) {
            // Already in pages folder, need to adjust
            if (window.location.pathname.includes('/pages/')) {
                link.setAttribute('href', href.replace('pages/', ''));
            }
        }
    });
});
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
        
        // If it's already a data-storage-handler URL, return as is
        if (mediaPath.includes('data-storage-handler.php')) {
            return mediaPath;
        }
        
        // Check if it's a media directory path
        if (mediaPath.includes('Crooks-Data-Storage/products/')) {
            const baseDir = mediaPath.endsWith('/') ? mediaPath : mediaPath + '/';
            // We need to let the server find the actual file extension
            // So we encode the base path and let the handler do the glob search
            return '../database/data-storage-handler.php?action=serve&path=' + encodeURIComponent(baseDir + 'thumbnail_1.*');
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
        
        // If it's already a data-storage-handler URL, return as is
        if (mediaPath.includes('data-storage-handler.php')) {
            return mediaPath;
        }
        
        // Check if it's a media directory path
        if (mediaPath.includes('Crooks-Data-Storage/products/')) {
            const baseDir = mediaPath.endsWith('/') ? mediaPath : mediaPath + '/';
            // We need to let the server find the actual file extension
            // So we encode the base path and let the handler do the glob search
            return '../database/data-storage-handler.php?action=serve&path=' + encodeURIComponent(baseDir + 'thumbnail_1.*');
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

## File: `Crooks-Cart-Collectives/styles/about.css`

**Status:** `FOUND`

```css
/* About Page Styles - Professional & Minimalist */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== PAGE HEADER ===== */
.page-header {
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    background: white;
    border-radius: 12px;
    margin-top: 100px; /*negative value to pull from header, positive to push towards header*/
    margin-bottom: 50px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.header-content h1 {
    font-size: clamp(2.5rem, 8vw, 3.2rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.header-content h1 span {
    color: #ff8246;
}

.header-content p {
    font-size: clamp(1rem, 3vw, 1.2rem);
    color: #666;
}

/* ===== PROJECT OVERVIEW ===== */
.overview-section {
    margin-bottom: 60px;
}

.overview-container {
    background: white;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.overview-content h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 25px;
    font-weight: 600;
}

.overview-content h2 span {
    color: #ff8246;
}

.overview-content p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 20px;
}

.overview-content strong {
    color: #333;
    font-weight: 600;
}

/* ===== COURSES SECTION ===== */
.courses-section {
    margin-bottom: 60px;
}

.courses-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.course-card {
    background: white;
    border-radius: 12px;
    padding: 35px 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.course-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.course-card h3 {
    font-size: 1.6rem;
    color: #333;
    margin-bottom: 8px;
    font-weight: 600;
}

.course-subject {
    font-size: 1.1rem;
    color: #ff8246;
    margin-bottom: 5px;
    font-weight: 500;
}

.instructor {
    font-size: 1rem;
    color: #666;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.course-description {
    font-size: 1rem;
    line-height: 1.7;
    color: #555;
}

/* ===== TEAM SECTION ===== */
.team-section {
    margin-bottom: 60px;
    text-align: center;
}

.team-section h2 {
    font-size: 2.2rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.team-section h2 span {
    color: #ff8246;
}

.team-subtitle {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 40px;
}

/* Lead Developer - Full Width Container */
.lead-container {
    width: 100%;
    margin-bottom: 40px;
    display: flex;
    justify-content: center;
}

/* Lead Card - Matches the full width of the members grid */
.lead-card {
    display: flex;
    flex-direction: column; /* Column layout for centered content */
    align-items: center;
    justify-content: center;
    gap: 25px;
    background: white;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border-left: 4px solid #ff8246;
    text-align: center;
    width: 100%;
    max-width: 100%; /* Take full width of its container */
}

/* For desktop, match the grid container width */
@media (min-width: 1025px) {
    .lead-card {
        max-width: calc(100% - 40px); /* Account for padding */
        margin: 0 auto;
    }
}

.lead-card .team-image {
    width: 200px; /* Larger for lead card */
    height: 200px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #ff8246;
    flex-shrink: 0;
    margin: 0 auto;
}

.lead-card .team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lead-card .team-info {
    flex: 1;
    width: 100%;
    max-width: 800px; /* Limit text width for readability */
    margin: 0 auto;
}

.lead-card h3 {
    font-size: 2.2rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.lead-card .team-role {
    font-size: 1.3rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 20px;
}

.lead-card .team-bio {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
}

/* Team Members Grid */
.members-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 25px;
    width: 100%;
}

/* Center the last child in desktop view */
@media (min-width: 1025px) {
    .members-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Force 3 columns on desktop */
    }
    
    .members-grid .team-card:last-child {
        grid-column: 2 / 3; /* Place last child in the middle column */
        justify-self: center;
        width: 100%;
    }
}

.team-card {
    background: white;
    border-radius: 12px;
    padding: 30px 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.team-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.team-card .team-image {
    width: 130px;
    height: 130px;
    margin: 0 auto 20px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #ff8246;
}

.team-card .team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.team-card h3 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 5px;
    font-weight: 600;
}

.team-card .team-role {
    font-size: 1rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 12px;
}

.team-card .team-bio {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #666;
    flex-grow: 1;
}

.team-note {
    margin-top: 30px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    color: #666;
    font-style: italic;
    font-size: 1rem;
}

/* ===== PROJECT CRITERIA ===== */
.criteria-section {
    background: white;
    border-radius: 12px;
    padding: 50px 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    margin-bottom: 40px;
}

.criteria-section h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 35px;
    text-align: center;
    font-weight: 600;
}

.criteria-section h2 span {
    color: #ff8246;
}

.criteria-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-bottom: 30px;
}

.criteria-item {
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.criteria-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.criteria-weight {
    display: inline-block;
    font-size: 1.3rem;
    font-weight: 700;
    color: #ff8246;
    margin-bottom: 10px;
}

.criteria-item h4 {
    font-size: 1.1rem;
    color: #333;
    margin-bottom: 8px;
    font-weight: 600;
}

.criteria-item p {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.5;
}

.criteria-total {
    text-align: center;
    font-size: 1.1rem;
    font-weight: 500;
    color: #333;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

/* ===== RESPONSIVE DESIGN ===== */

/* Desktop */
@media (min-width: 1025px) {
    .lead-card {
        max-width: 100%; /* Full width of container */
    }
    
    .lead-card .team-info {
        max-width: 800px;
    }
    
    .members-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Tablet */
@media (max-width: 1024px) and (min-width: 769px) {
    .lead-card {
        max-width: 100%;
        padding: 35px 30px;
    }
    
    .lead-card .team-image {
        width: 180px;
        height: 180px;
    }
    
    .lead-card h3 {
        font-size: 2rem;
    }
    
    .lead-card .team-info {
        max-width: 600px;
    }
    
    .courses-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .criteria-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    /* For tablets, last child centered in a 2-column grid */
    .members-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .members-grid .team-card:last-child {
        grid-column: 1 / -1;
        justify-self: center;
        width: 50%;
        min-width: 280px;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .content {
        margin-top: 80px;
    }
    
    .page-header {
        padding: 40px 15px;
    }
    
    .overview-container {
        padding: 30px 20px;
    }
    
    .overview-content h2 {
        font-size: 1.8rem;
    }
    
    .overview-content p {
        font-size: 1rem;
    }
    
    .courses-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .course-card {
        padding: 25px 20px;
    }
    
    .course-card h3 {
        font-size: 1.4rem;
    }
    
    /* Lead card - full width on mobile */
    .lead-card {
        max-width: 100%;
        padding: 30px 20px;
    }
    
    .lead-card .team-image {
        width: 160px;
        height: 160px;
        border-width: 3px;
    }
    
    .lead-card h3 {
        font-size: 1.8rem;
    }
    
    .lead-card .team-role {
        font-size: 1.2rem;
    }
    
    .lead-card .team-bio {
        font-size: 1rem;
    }
    
    .lead-card .team-info {
        max-width: 100%;
    }
    
    .members-grid {
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }
    
    .members-grid .team-card:last-child {
        grid-column: auto; /* Reset for mobile */
        width: 100%;
    }
    
    .team-card .team-image {
        width: 120px;
        height: 120px;
    }
    
    .criteria-section {
        padding: 35px 20px;
    }
    
    .criteria-section h2 {
        font-size: 1.8rem;
    }
    
    .criteria-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .page-header {
        padding: 30px 15px;
    }
    
    .header-content h1 {
        font-size: 2rem;
    }
    
    .overview-container {
        padding: 25px 15px;
    }
    
    .overview-content h2 {
        font-size: 1.6rem;
    }
    
    .lead-card {
        padding: 25px 15px;
    }
    
    .lead-card .team-image {
        width: 140px;
        height: 140px;
    }
    
    .lead-card h3 {
        font-size: 1.6rem;
    }
    
    .lead-card .team-role {
        font-size: 1.1rem;
    }
    
    .team-card {
        padding: 25px 15px;
    }
    
    .team-card .team-image {
        width: 110px;
        height: 110px;
    }
    
    .criteria-section {
        padding: 30px 15px;
    }
    
    .criteria-section h2 {
        font-size: 1.6rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/cart.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/cart.css */
/* Unified styling with page-title-header, consistent cards, and proper empty state */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified across all pages ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== CART CONTAINER ===== */
.cart-container {
    width: 100%;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    overflow: hidden;
}

/* ===== CART ITEMS ===== */
.cart-items {
    padding: 20px;
}

.cart-item {
    display: flex;
    gap: 25px;
    padding: 25px;
    margin-bottom: 20px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.cart-item:last-child {
    margin-bottom: 0;
}

.cart-item:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.cart-item-image {
    flex-shrink: 0;
    width: 120px;
    height: 120px;
    border-radius: 8px;
    overflow: hidden;
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.cart-item-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #000000;
    margin: 0;
}

.cart-item-seller {
    font-size: 0.95rem;
    color: #666666;
    margin: 0;
}

.cart-item-price {
    font-size: 1.2rem;
    font-weight: 700;
    color: #FF8246;
    margin: 0;
}

.cart-item-controls {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-top: 5px;
}

.cart-item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.quantity-input {
    width: 80px;
    height: 40px;
    padding: 0 10px;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 1rem;
    text-align: center;
    transition: all 0.3s ease;
}

.quantity-input:focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.quantity-input:disabled {
    background-color: #f5f5f5;
    cursor: not-allowed;
}

.item-subtotal {
    font-size: 1rem;
    color: #000000;
    margin: 0;
}

.subtotal-amount {
    font-weight: 700;
    color: #000000;
}

/* ===== CART SUMMARY ===== */
.cart-summary {
    margin-top: 30px;
    padding: 25px;
    background: #f9f9f9;
    border-top: 1px solid #e0e0e0;
}

.cart-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
    font-size: 1.5rem;
}

.total-label {
    font-weight: 600;
    color: #000000;
}

.total-amount {
    font-weight: 700;
    color: #FF8246;
}

.cart-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
}

/* ===== BUTTONS - Consistent styling ===== */
.btn {
    display: inline-block;
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    min-width: 180px;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
    border: 1px solid #FF8246;
}

.btn-primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.btn-secondary:hover {
    background-color: #333333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.remove-btn {
    padding: 8px 16px;
    font-size: 0.9rem;
    min-width: 100px;
}

/* ===== EMPTY STATE - Full width container with proper spacing ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.8rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.empty-state .btn {
    display: inline-block;
    width: auto;
    min-width: 200px;
    padding: 12px 30px;
}

/* ===== LOADING STATE ===== */
.cart-item.loading {
    opacity: 0.6;
    pointer-events: none;
    position: relative;
}

.cart-item.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30px;
    height: 30px;
    border: 3px solid rgba(255, 130, 70, 0.3);
    border-top-color: #FF8246;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

/* ===== NOTIFICATION MODAL ===== */
.cart-notifier-modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 10000;
}

.cart-notifier-modal.active {
    display: flex;
}

.cart-notifier-content {
    background: #ffffff;
    padding: 35px 30px;
    border-radius: 16px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
    border: 1px solid #e0e0e0;
}

.cart-notifier-icon {
    margin-bottom: 20px;
}

.cart-notifier-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.cart-notifier-content h3 {
    color: #000000;
    font-size: 24px;
    margin-bottom: 12px;
    font-weight: 600;
}

.cart-notifier-content p {
    color: #666666;
    font-size: 16px;
    margin-bottom: 30px;
    line-height: 1.6;
}

.cart-notifier-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.cart-notifier-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    flex: 1;
    max-width: 130px;
}

.cart-notifier-btn.continue-btn {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.cart-notifier-btn.continue-btn:hover {
    background-color: #333333;
}

.cart-notifier-btn.view-cart-btn {
    background-color: #FF8246;
    color: #ffffff;
    border: 1px solid #FF8246;
}

.cart-notifier-btn.view-cart-btn:hover {
    background-color: #e66a2e;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 992px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
    
    .cart-item {
        padding: 20px;
        gap: 20px;
    }
    
    .cart-item-image {
        width: 100px;
        height: 100px;
    }
    
    .cart-item-title {
        font-size: 1.2rem;
    }
    
    .btn {
        min-width: 150px;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .cart-container {
        padding: 0;
    }
    
    .cart-items {
        padding: 15px;
    }
    
    .cart-item {
        flex-direction: column;
        gap: 15px;
        padding: 20px;
    }
    
    .cart-item-image {
        width: 100%;
        height: 200px;
    }
    
    .cart-item-image img {
        object-fit: contain;
    }
    
    .cart-item-controls {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .cart-item-quantity {
        width: 100%;
        justify-content: space-between;
    }
    
    .cart-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .btn {
        width: 100%;
        min-width: 0;
    }
    
    .cart-total {
        font-size: 1.3rem;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.6rem;
    }
    
    .cart-notifier-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .cart-notifier-btn {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .cart-item {
        padding: 15px;
    }
    
    .cart-item-title {
        font-size: 1.1rem;
    }
    
    .cart-item-price {
        font-size: 1rem;
    }
    
    .quantity-input {
        width: 70px;
        height: 36px;
    }
    
    .remove-btn {
        padding: 8px 12px;
        font-size: 0.85rem;
    }
    
    .cart-summary {
        padding: 20px;
    }
    
    .cart-total {
        font-size: 1.2rem;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.4rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
    
    .empty-state .btn {
        min-width: 160px;
        padding: 10px 20px;
    }
    
    .cart-notifier-content {
        padding: 25px 20px;
    }
    
    .cart-notifier-content h3 {
        font-size: 20px;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .product-info {
        padding: 12px;
    }
}

/* Screen reader only */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}
```

---

## File: `Crooks-Cart-Collectives/styles/checkout.css`

**Status:** `FOUND`

```css
/* Checkout Page Styles */
.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

.checkout-title {
    font-size: 2.2rem;
    color: #333;
    margin-bottom: 30px;
    border-bottom: 3px solid #FF8246;
    padding-bottom: 10px;
}

.checkout-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.checkout-summary,
.checkout-info {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.checkout-summary h2,
.checkout-info h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 10px;
}

.checkout-items {
    margin-bottom: 20px;
    max-height: 400px;
    overflow-y: auto;
}

.checkout-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.checkout-item:last-child {
    border-bottom: none;
}

.checkout-item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.checkout-item-details {
    flex: 1;
}

.checkout-item-details h3 {
    font-size: 1rem;
    margin: 0 0 5px 0;
    color: #333;
}

.checkout-item-details p {
    margin: 2px 0;
    font-size: 0.9rem;
    color: #666;
}

.checkout-item-price {
    font-weight: 600;
    color: #FF8246 !important;
    margin-top: 5px !important;
}

.checkout-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1.3rem;
    font-weight: 600;
    padding-top: 20px;
    border-top: 2px solid #f0f0f0;
}

.total-amount {
    color: #FF8246;
}

.shipping-details p {
    margin: 5px 0;
    color: #555;
}

.payment-method {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.checkout-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn {
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    flex: 1;
}

.btn-primary {
    background: #FF8246;
    color: white;
}

.btn-primary:hover {
    background: #e66a2e;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255,130,70,0.3);
}

.btn-secondary {
    background: #212529;
    color: white;
}

.btn-secondary:hover {
    background: #000;
}

/* Notifier */
.notifier {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    backdrop-filter: blur(5px);
}
.notifier.hidden { display: none; }
.notifier-content {
    background: white;
    padding: 30px 40px;
    border-radius: 12px;
    max-width: 400px;
    text-align: center;
    animation: fadeScale 0.3s;
}
@keyframes fadeScale {
    from { opacity: 0; transform: scale(0.85); }
    to { opacity: 1; transform: scale(1); }
}
.notifier-content p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .checkout-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .checkout-actions {
        flex-direction: column;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/contact.css`

**Status:** `FOUND`

```css
/* ============================================
   CONTACT PAGE STYLES
============================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.contact-page {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.contact-hero {
    margin-top: 100px;
    position: relative;
    width: 100%;
    height: 35vh;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 12px;
    margin-bottom: 60px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.contact-hero__container {
    width: 100%;
    padding: 0 20px;
}

.contact-hero__title {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.contact-hero__highlight {
    color: #ff8246;
}

.contact-hero__subtitle {
    font-size: clamp(1rem, 3vw, 1.3rem);
    color: #666;
}

/* ===== CONTACT INFO GRID ===== */
.contact-info {
    margin-bottom: 60px;
}

.contact-info__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
}

.contact-card {
    background: white;
    border-radius: 10px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.3s ease;
}

.contact-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

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
    transition: filter 0.3s ease;
}

.contact-card:hover .contact-card__icon img {
    filter: brightness(0) saturate(100%) invert(45%) sepia(100%) saturate(700%) hue-rotate(335deg) brightness(100%) contrast(100%);
}

.contact-card__title {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.contact-card__details {
    font-size: 0.95rem;
    line-height: 1.7;
    color: #666;
    font-style: normal;
}

/* ===== CONTACT INTERACTION SECTION ===== */
.contact-interaction {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-bottom: 60px;
}

.contact-form-container {
    flex: 1.2;
    min-width: 350px;
    background: white;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.contact-form__header {
    margin-bottom: 30px;
}

.contact-form__title {
    font-size: 2rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.contact-form__highlight {
    color: #ff8246;
}

.contact-form__subtitle {
    font-size: 1rem;
    color: #666;
}

.contact-form {
    width: 100%;
}

.contact-form__row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
}

.contact-form__group {
    flex: 1;
    min-width: 200px;
    margin-bottom: 20px;
}

.contact-form__group--full {
    width: 100%;
    flex: 0 0 100%;
}

.contact-form__label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
    font-size: 0.95rem;
}

.contact-form__input,
.contact-form__select,
.contact-form__textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s;
    background-color: white;
    font-family: inherit;
}

.contact-form__input:focus,
.contact-form__select:focus,
.contact-form__textarea:focus {
    border-color: #ff8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.contact-form__input.error,
.contact-form__select.error,
.contact-form__textarea.error {
    border-color: #dc3545;
}

.contact-form__error {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 5px;
    min-height: 20px;
}

.contact-form__actions {
    margin-top: 20px;
}

.contact-form__submit-btn {
    display: inline-block;
    padding: 14px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    text-align: center;
    background-color: #ff8246;
    color: white;
    width: 100%;
    border: none;
}

.contact-form__submit-btn:hover {
    background-color: #e66a2e;
}

.contact-form__submit-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.contact-form__success {
    background-color: #e8f5e9;
    color: #2e7d32;
    padding: 15px;
    border-radius: 6px;
    margin-top: 20px;
    border-left: 3px solid #2e7d32;
}

.map-container {
    flex: 0.8;
    min-width: 300px;
    background: white;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.map-container__header {
    margin-bottom: 20px;
}

.map-container__title {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 600;
}

.map-container__highlight {
    color: #ff8246;
}

.map-container__embed {
    border-radius: 8px;
    overflow: hidden;
}

.map-container__embed iframe {
    display: block;
    width: 100%;
    height: 400px;
    border: 0;
}

.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.modal--hidden {
    display: none;
}

.modal__content {
    background: white;
    border-radius: 10px;
    padding: 30px 40px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: modalFadeIn 0.3s ease-out;
}

.modal__message {
    font-size: 1.1rem;
    margin-bottom: 20px;
    color: #333;
}

.modal__close-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    background-color: #ff8246;
    color: white;
}

.modal__close-btn:hover {
    background-color: #e66a2e;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .contact-page {
        margin-top: 80px;
    }
    
    .contact-hero {
        height: 30vh;
        min-height: 250px;
    }
    
    .contact-form-container,
    .map-container {
        padding: 30px 20px;
    }
    
    .contact-form__row {
        flex-direction: column;
        gap: 0;
    }
    
    .contact-form__group {
        min-width: 100%;
    }
    
    .map-container__embed iframe {
        height: 350px;
    }
}

@media (max-width: 480px) {
    .contact-hero {
        height: 25vh;
        min-height: 200px;
    }
    
    .contact-hero__title {
        font-size: 2rem;
    }
    
    .contact-form-container {
        padding: 20px 15px;
    }
    
    .contact-form__title {
        font-size: 1.8rem;
    }
    
    .map-container {
        padding: 20px;
    }
    
    .map-container__title {
        font-size: 1.8rem;
    }
    
    .map-container__embed iframe {
        height: 300px;
    }
    
    .contact-card {
        padding: 25px 15px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/customer-dashboard.css`

**Status:** `FOUND`

```css
/* ===== DASHBOARD LAYOUT ===== */
.content {
    max-width: 1200px;
    margin: 80px auto 20px;
    padding: 20px;
    min-height: calc(100vh - 200px);
    width: 100%;
    box-sizing: border-box;
}

/* ===== WELCOME SECTION ===== */
.welcome-section {
    background: linear-gradient(135deg, #f2f4f6 0%, #ffffff 100%);
    padding: 50px 40px;
    border-radius: 12px;
    margin-bottom: 40px;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    border: 1px solid #363940;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff8246, #e8693d);
}

.welcome-section h1 {
    font-size: 2.2rem;
    color: #1e2e2f;
    margin-bottom: 15px;
    font-weight: 400;
    position: relative;
}

.welcome-section h1 span {
    color: #ff8246;
}

.welcome-section p {
    font-size: 1.1rem;
    color: #000000;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ===== DASHBOARD GRID ===== */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 20px;
    width: 100%;
    box-sizing: border-box;
}

/* ===== DASHBOARD CARDS ===== */
.dashboard-card {
    background: #f2f4f6;
    border-radius: 12px;
    padding: 30px 25px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    text-align: center;
    transition: box-shadow 0.3s ease-in-out;
    border: 1px solid #363940;
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.dashboard-card:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    border-color: #ff8246;
}

.dashboard-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, #ff8246, transparent);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.dashboard-card h3 {
    font-size: 1.4rem;
    color: #1e2e2f;
    margin-bottom: 15px;
    font-weight: 400;
    position: relative;
    padding-bottom: 10px;
}

.dashboard-card h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 2px;
    background: #ff8246;
    transition: width 0.3s ease;
}

.dashboard-card:hover h3::after {
    width: 80px;
}

.dashboard-card p {
    font-size: 1rem;
    color: #000000;
    margin-bottom: 25px;
    line-height: 1.6;
    flex-grow: 1;
    opacity: 0.8;
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
    transition: filter 0.3s ease;
}

/* ===== BUTTON STYLES ===== */
.btn-primary {
    display: inline-block;
    background: #ff8246;
    color: #ffffff;
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 400;
    font-size: 1rem;
    transition: background-color 0.3s ease-in-out;
    border: 2px solid transparent;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: auto;
    align-self: center;
    min-width: 140px;
    box-sizing: border-box;
}

.btn-primary:hover {
    background: #e8693d;
}

.btn-primary:active {
    transform: translateY(0);
}

/* ===== RESPONSIVE DESIGN ===== */
@media (min-width: 1200px) {
    .content {
        margin-top: 100px;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(4, 1fr);
    }
    
    .welcome-section h1 {
        font-size: 2.5rem;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .dashboard-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .content {
        margin-top: 70px;
        padding: 15px;
    }
    
    .welcome-section {
        padding: 40px 30px;
    }
    
    .welcome-section h1 {
        font-size: 2rem;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .dashboard-card {
        padding: 25px 20px;
    }
    
    .dashboard-card h3 {
        font-size: 1.3rem;
    }
}

@media (max-width: 767px) {
    body {
        overflow-x: hidden;
    }
    
    .content {
        margin-top: 60px;
        padding: 15px;
        max-width: 100%;
    }
    
    .welcome-section {
        padding: 30px 20px;
        margin-bottom: 30px;
    }
    
    .welcome-section h1 {
        font-size: 1.8rem;
    }
    
    .welcome-section p {
        font-size: 1rem;
    }
    
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        width: 100%;
    }
    
    .dashboard-card {
        padding: 25px 20px;
        max-width: 100%;
        margin: 0 auto;
        width: 100%;
    }
    
    .dashboard-card h3 {
        font-size: 1.3rem;
    }
    
    .btn-primary {
        padding: 10px 25px;
        min-width: 120px;
        font-size: 0.95rem;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 55px;
        padding: 12px;
    }
    
    .welcome-section {
        padding: 25px 15px;
    }
    
    .welcome-section h1 {
        font-size: 1.5rem;
    }
    
    .welcome-section p {
        font-size: 0.95rem;
    }
    
    .dashboard-card {
        padding: 20px 15px;
    }
    
    .dashboard-card h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .dashboard-card p {
        font-size: 0.95rem;
        margin-bottom: 20px;
    }
    
    .btn-primary {
        padding: 10px 20px;
        min-width: 110px;
        font-size: 0.9rem;
    }
}

@media (max-width: 375px) {
    .content {
        margin-top: 50px;
        padding: 10px;
    }
    
    .welcome-section {
        padding: 20px 12px;
    }
    
    .welcome-section h1 {
        font-size: 1.3rem;
    }
    
    .dashboard-card {
        padding: 18px 12px;
    }
    
    .btn-primary {
        padding: 8px 16px;
        min-width: 100px;
        font-size: 0.85rem;
    }
}

@media (max-height: 500px) and (orientation: landscape) {
    .content {
        margin-top: 50px;
    }
    
    .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .welcome-section {
        padding: 20px;
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dashboard-card {
    animation: fadeInUp 0.5s ease forwards;
    opacity: 0;
}

.dashboard-card:nth-child(1) { animation-delay: 0.1s; }
.dashboard-card:nth-child(2) { animation-delay: 0.2s; }
.dashboard-card:nth-child(3) { animation-delay: 0.3s; }
.dashboard-card:nth-child(4) { animation-delay: 0.4s; }
.dashboard-card:nth-child(5) { animation-delay: 0.5s; }
.dashboard-card:nth-child(6) { animation-delay: 0.6s; }
.dashboard-card:nth-child(7) { animation-delay: 0.7s; }

@media print {
    .btn-primary {
        display: none;
    }
    
    .dashboard-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ddd;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/footer.css`

**Status:** `FOUND`

```css
.footer {
  background-color: var(--color-background-B);
  padding: var(--size-header-padding);
  box-shadow: var(--effect-box-shadow-default);
  border-top: 2px solid var(--color-border-A);
  width: 100vw !important;
  max-width: 100%;
  box-sizing: border-box;
  position: relative;
  left: 0;
  margin: 0 !important;
}

.footer-upper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--size-navigation-gap);
  margin: 0;
  color: var(--color-text-B);
}

.queries {
  max-width: 50%;
  color: var(--color-text-A);
}

.queries h2 {
  font-size: var(--font-size-title);
  font-weight: var(--font-weight-bold);
}

.queries span {
  color: var(--color-accent-A);
}

.socials {
  display: flex;
  gap: var(--size-navigation-gap);
}

.socials a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
}

.socials a img {
  width:  40px;
  height: 40px;
}

.footer-lower {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  padding: 20px 0;
  font-size: var(--font-size-base);
  margin-top: 20px;
  border-top: 2px solid var(--color-border-A);
  margin-left: auto;
  margin-right: auto;
}

.mail-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 5px 0;
  color: var(--color-text-A);
}

.mail-button img {
  width: 20px;
  height: 20px;
  filter: brightness(0);
}

.policy-links {
  display: flex;
  gap: var(--size-navigation-gap);
  padding: 5px 0;
}

.policy-links a {
  color: var(--color-text-A);
  text-decoration: none;
  transition: color 0.2s ease-in-out;
}

.policy-links a:hover {
  color: var(--color-accent-A);
}

/* Responsive Design */
@media (max-width: 768px) {
  .policy-links {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }

  .footer-lower {
    flex-direction: column;
    align-items: flex-start;
  }

  .mail-button {
    margin-bottom: 10px;
  }
}
```

---

## File: `Crooks-Cart-Collectives/styles/header.css`

**Status:** `FOUND`

```css
/* CSS File Content */
:root {
  /* Sizes & Spacing */
  --size-logo-height: 40px;
  --size-button-padding: 10px 20px;
  --size-button-radius: 5px;
  --size-navigation-gap: 30px;
  --size-header-padding: 15px 40px;
  --size-mobile-menu-max-width: 270px;

  /* Color Palette - Light Theme */
  --color-background-A: #e4eaf2;        /* body background */
  --color-background-B: #f2f4f6;        /* header background */
  --color-background-C: #000000;  
  --color-linear-gradient-A: #a49bf8, #b8b9fa, #dbd5fd, #43c9fb;      /* mobile menu bg or secondary light bg */
  --color-text-A: #000000;              /* main text */
  --color-text-B: #ffffff;              /* button text on orange */
  --color-text-C: #1e2e2f;
  --color-accent-A: #ff8246;            /* primary orange */
  --color-hover-A: #e8693d;             /* hover orange variant */
  --color-border-A: #363940;            /* border */

  /* Effects */
  --effect-glow-A: 0 0 10px rgba(0, 0, 0, 0.2);                /* soft shadow */
  --effect-glow-B: 0 0 10px rgba(211, 94, 53, 0.7);            /* orange glow */
  --effect-box-shadow-default: 0 2px 6px rgba(0, 0, 0, 0.15);  /* lighter shadow */
  --effect-transition-default: all 0.3s ease-in-out;

  /* Typography */
  --font-family-base: Arial, sans-serif;
  --font-size-base: 16px;
  --font-size-title: 22px;
  --font-weight-bold: 400;
}

/* Global Styles */
body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: var(--color-background-A);
  color: var(--color-text-A);
  font-family: var(--font-family-base);
  transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}

/* Scrollbar Removal */
html {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

::-webkit-scrollbar {
  display: none;
}

/* Header Styles */
.header-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: var(--color-background-B);
  padding: var(--size-header-padding);
  box-shadow: var(--effect-box-shadow-default);
  border-bottom: 2px solid var(--color-border-A);
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  box-sizing: border-box;
}

.header-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
  max-width: 100%;
}

.header-logo img {
  height: var(--size-logo-height);
  width: auto;
}

.title {
  color: var(--color-text-A);
  font-size: var(--font-size-title);
  font-weight: var(--font-weight-bold);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.title span {
  color: var(--color-accent-A);
}

/* Navigation Styles */
.nav-container {
  display: flex;
  align-items: center;
  gap: var(--size-navigation-gap);
  max-width: 100%;
  overflow: hidden;
}

.nav-bar {
  display: flex;
  gap: var(--size-navigation-gap);
  overflow: hidden;
}

/* Desktop Navigation Link Styles */
.nav-link {
  color: var(--color-text-A);
  text-decoration: none;
  font-size: var(--font-size-base);
  transition: var(--effect-transition-default);
  white-space: nowrap;
  position: relative;
  padding: 5px 0;
}

.nav-link:hover, 
.nav-link.active {
  color: var(--color-hover-A);
}

/* Desktop hover underline effect */
.nav-link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--color-accent-A);
  transition: var(--effect-transition-default);
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

/* Button Styles */
.social-button {
  background: var(--color-accent-A);
  color: var(--color-text-B);
  padding: var(--size-button-padding);
  border-radius: var(--size-button-radius);
  text-decoration: none;
  transition: var(--effect-transition-default);
  border: 2px solid transparent;
}

.social-button:hover {
  background: var(--color-hover-A);
  box-shadow: var(--effect-glow-B);
  color: var(--color-text-B);
}

/* Mobile Menu Styles */
.hamburger-menu {
  display: none;
  cursor: pointer;
  padding: 8px;
  background: transparent;
  border: none;
  z-index: 1001;
}

.hamburger-icon {
  width: 30px;
  height: 30px;
  transition: var(--effect-transition-default);
}

.mobile-nav {
    position: fixed;
    top: 80px;
    right: 0;
    width: 50%;
    max-width: var(--size-mobile-menu-max-width);
    text-align: center;
    height: calc(100vh - 80px);
    background-color: var(--color-background-B);
    z-index: 1000;
    transform: translateX(100%); /* This is the key - hidden off-screen */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
    overflow-y: auto;
    border-left: 2px solid var(--color-border-A);
    border-radius: 15px 0 0 15px;
    box-shadow: none;
    visibility: visible;
    opacity: 1;
}

.mobile-nav.open {
    transform: translateX(0) !important; /* ensure it overrides any leftover inline */
  box-shadow: -4px 0 15px rgba(0, 0, 0, 0.2);
}
/* Mobile Navigation Link Styles - RESTORED ORIGINAL HOVER EFFECT */
.mobile-nav .nav-link {
  color: var(--color-text-A);
  text-decoration: none;
  font-size: 16px;
  padding: 15px 10px; /* Increased padding for better touch targets */
  position: relative;
  transition: var(--effect-transition-default);
  border-bottom: 1px solid var(--color-border-A);
  display: block; /* Make it block level for full width */
  width: 100%;
  box-sizing: border-box;
}

/* RESTORED: Underline hover effect for mobile nav - properly aligned */
.mobile-nav .nav-link::after {
  content: '';
  position: absolute;
  bottom: -1px; /* Adjusted to sit right on the border */
  left: 10px; /* Start after padding */
  right: 10px; /* End before padding */
  width: calc(100% - 20px); /* Full width minus left/right padding */
  height: 2px;
  background: var(--color-accent-A);
  transform: scaleX(0);
  transition: transform 0.3s ease-in-out;
  transform-origin: left;
}

.mobile-nav .nav-link:hover::after,
.mobile-nav .nav-link.active::after {
  transform: scaleX(1);
}

.mobile-nav .nav-link:hover,
.mobile-nav .nav-link.active {
  color: var(--color-hover-A);
}

/* Special styling for the social button in mobile nav */
.mobile-nav .social-button {
  margin-top: 20px;
  background-color: var(--color-accent-A);
  color: var(--color-text-A);
  padding: 15px 10px; /* Match nav link padding */
  border-radius: var(--size-button-radius);
  text-decoration: none;
  font-weight: var(--font-weight-bold);
  transition: var(--effect-transition-default);
  border: 2px solid transparent;
  text-align: center;
  display: block;
  width: 100%;
  box-sizing: border-box;
  position: relative;
}

/* Remove the after element for social button */
.mobile-nav .social-button::after {
  display: none;
}

.mobile-nav .social-button:hover {
  background: var(--color-hover-A);
  box-shadow: var(--effect-glow-B);
  color: var(--color-text-B);
}

/* Backdrop for mobile menu */
.menu-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.menu-backdrop.active {
  opacity: 1;
  visibility: visible;
}

/* Cart count badge */
.cart-count {
  position: absolute;
  top: -8px;
  right: -8px;
  background-color: var(--color-accent-A);
  color: white;
  font-size: 12px;
  font-weight: bold;
  padding: 2px 6px;
  border-radius: 50%;
  min-width: 18px;
  text-align: center;
}

/* Responsive Design */
@media (max-width: 1005px) {
  .hamburger-menu {
    display: block;
  }
  
  .nav-container {
    display: none;
  }
  
  .header-logo {
    gap: 5px;
  }
  
  .title {
    font-size: 20px;
  }
}

@media (max-width: 768px) {
  .header-bar {
    padding: 12px 25px;
  }
  
  .title {
    font-size: 18px;
  }
  
  .mobile-nav {
    width: 65%;
    top: 70px;
    height: calc(100vh - 70px);
  }
  
  /* Adjust underline for smaller screens */
  .mobile-nav .nav-link::after {
    left: 10px;
    right: 10px;
    width: calc(100% - 20px);
  }
}

@media (max-width: 480px) {
  .header-bar {
    padding: 10px 20px;
  }
  
  .title {
    font-size: 16px;
  }
  
  .mobile-nav {
    width: 80%;
    top: 65px;
    height: calc(100vh - 65px);
    padding: 15px;
  }
  
  .mobile-nav .nav-link {
    padding: 12px 10px;
  }
  
  /* Adjust underline for mobile */
  .mobile-nav .nav-link::after {
    bottom: -1px;
    left: 10px;
    right: 10px;
    width: calc(100% - 20px);
  }
}

/* Animation Enhancements */
.fade-in {
  opacity: 0;
  animation: fadeIn 0.5s ease-in-out forwards;
}

.fade-out {
  opacity: 1;
  animation: fadeOut 0.5s ease-in-out forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fadeOut {
  from { opacity: 1; }
  to { opacity: 0; }
}

.header-bar.header-delay,
.mobile-nav.header-delay {
  transition: none !important;
}

/* Fix for active link in desktop navigation */
.nav-link.active {
  color: var(--color-hover-A);
}

.nav-link.active::after {
  width: 100%;
}
```

---

## File: `Crooks-Cart-Collectives/styles/index.css`

**Status:** `FOUND`

```css
/* ===== RESET & BASE STYLES ===== */
.content {
    margin-top: 100px;
}

/* ===== SHOWCASE SECTION ===== */
.showcase-section {
    position: relative;
    height: 70vh;
    overflow: hidden;
    margin-top: 70px;
    margin-bottom: 40px;
}

.showcase-slider {
    position: relative;
    width: 100%;
    height: 100%;
}

.showcase-slide {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: top center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.showcase-slide.active {
    opacity: 1;
}

.showcase-content {
    position: absolute;
    bottom: 20%;
    left: 10%;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    max-width: 600px;
}

.showcase-content h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
}

.showcase-content p {
    font-size: 1.5rem;
    margin-bottom: 30px;
}

.showcase-button {
    display: inline-block;
    padding: 15px 40px;
    background-color: #ff8246;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    transition: background-color 0.3s ease-in-out;
}

.showcase-button:hover {
    background-color: #e8693d;
}

.slider-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.slider-controls button {
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    transition: background-color 0.3s ease-in-out;
}

.slider-controls button:hover {
    background: #ff8246;
}

/* ===== FEATURES SECTION ===== */
.features-section {
    padding: 40px 0;
    background-color: #f2f4f6;
    margin-bottom: 20px;
}

.features-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.features-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.2rem;
    color: #1e2e2f;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.feature-card {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease-in-out;
}

.feature-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon img {
    width: 48px;
    height: 48px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: filter 0.3s ease;
}



.feature-card h3 {
    margin-bottom: 10px;
    color: #1e2e2f;
    font-size: 1.2rem;
}

.feature-card p {
    font-size: 0.95rem;
    line-height: 1.5;
}

/* ===== FEATURED PRODUCTS SECTION ===== */
.featured-products-section {
    padding: 30px 0;
}

.products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.featured-products-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.2rem;
    color: #1e2e2f;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
    padding: 0 10px;
}

.product-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-image-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
    background-color: #f5f5f5;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    margin: 0 0 8px 0;
    font-size: 1.1rem;
    color: #1e2e2f;
    line-height: 1.4;
    min-height: 2.8em;
    overflow: hidden;
    display: -webkit-box;
    --webkit-line-clamp: 2;
    --webkit-box-orient: vertical;
}

.product-price {
    color: #ff8246;
    font-weight: 400;
    font-size: 1.3rem;
    margin: 8px 0;
}

.product-seller {
    font-size: 0.85rem;
    color: #666;
    margin: 5px 0 12px 0;
}

.view-product-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff8246;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    text-align: center;
    transition: background-color 0.3s ease-in-out;
    margin-top: auto;
    font-size: 0.9rem;
}

.view-product-btn:hover {
    background-color: #e8693d;
}

.no-products-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.no-products-message p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 10px;
}

.become-seller-link {
    color: #ff8246;
    text-decoration: none;
    font-weight: 400;
}

.become-seller-link:hover {
    text-decoration: underline;
}

.view-all-products-btn {
    display: block;
    width: fit-content;
    margin: 20px auto 0;
    padding: 12px 35px;
    background-color: #ff8246;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 400;
    transition: background-color 0.3s ease-in-out;
}

.view-all-products-btn:hover {
    background-color: #e8693d;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .content {
        margin-top: 70px;
    }
    
    .showcase-section {
        height: 60vh;
        margin-top: -70px;
        margin-bottom: 30px;
    }
    
    .showcase-content {
        left: 5%;
        max-width: 90%;
    }
    
    .showcase-content h1 {
        font-size: 2.5rem;
    }
    
    .showcase-content p {
        font-size: 1.2rem;
    }
    
    .features-section {
        padding: 30px 0;
        margin-bottom: 15px;
    }
    
    .features-section h2 {
        margin-bottom: 20px;
        font-size: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .featured-products-section {
        padding: 20px 0;
    }
    
    .featured-products-section h2 {
        margin-bottom: 20px;
        font-size: 2rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
        padding: 0;
    }
    
    .product-image-container {
        height: 180px;
    }
    
    .view-all-products-btn {
        margin: 15px auto 0;
        padding: 10px 30px;
    }
}

@media (max-width: 480px) {
    .content {
        margin-top: 60px;
    }
    
    .showcase-section {
        height: 50vh;
        margin-top: -60px;
        margin-bottom: 20px;
    }
    
    .showcase-content h1 {
        font-size: 2rem;
    }
    
    .showcase-content p {
        font-size: 1rem;
    }
    
    .showcase-button {
        padding: 10px 25px;
        font-size: 0.9rem;
    }
    
    .features-section h2,
    .featured-products-section h2 {
        font-size: 1.8rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .view-all-products-btn {
        padding: 10px 25px;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .showcase-slide {
        background-position: center center;
    }
}

.features-section {
    position: relative;
}

.features-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 10%;
    right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, #ff8246, transparent);
}
```

---

## File: `Crooks-Cart-Collectives/styles/orders.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/orders.css */
/* Unified styling with page-title-header, consistent cards, and proper empty state */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified across all pages ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== FILTER TABS - Consistent styling ===== */
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

/* ===== ORDERS LIST ===== */
.orders-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
    width: 100%;
}

/* ===== ORDER CARD - Consistent styling with product cards ===== */
.order-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    overflow: hidden;
    width: 100%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.order-header {
    padding: 15px 20px;
    background: #f8f8f8;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.order-header-left {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.order-id {
    font-weight: 700;
    font-size: 1.1rem;
    color: #000000;
    background: #f0f0f0;
    padding: 4px 12px;
    border-radius: 20px;
}

.order-date {
    color: #666666;
    font-size: 0.85rem;
    background: #e0e0e0;
    padding: 3px 10px;
    border-radius: 30px;
}

.order-header-right {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.order-status-badge {
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    min-width: 100px;
    text-align: center;
    border: 1px solid transparent;
}

.order-status-badge.pending {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

.order-status-badge.delivered {
    background: #000000;
    color: #ffffff;
    border-color: #000000;
}

.order-status-badge.cancelled {
    background: #000000;
    color: #ffffff;
    opacity: 0.8;
    border-color: #000000;
}

/* ===== ORDER BODY - Four column layout ===== */
.order-body {
    display: grid;
    grid-template-columns: 1.2fr 1.2fr 1.2fr 1fr;
    gap: 0;
    background: #ffffff;
    width: 100%;
}

.column-title {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 15px;
    padding-bottom: 8px;
    border-bottom: 2px solid #FF8246;
    display: block;
    width: 100%;
}

/* Column 1: Product Details */
.order-product-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.product-details {
    display: flex;
    gap: 15px;
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    width: 100%;
}

.product-thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    background: white;
    flex-shrink: 0;
    border: 1px solid #f0f0f0;
}

.product-thumbnail[src*="package.svg"] {
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.product-info {
    flex: 1;
}

.product-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 8px;
}

.product-info p {
    font-size: 0.9rem;
    color: #666666;
    margin: 4px 0;
}

.info-label {
    font-weight: 500;
    color: #000000;
    margin-right: 5px;
}

/* Column 2: Event Activity */
.order-event-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.event-activity-content {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.event-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid transparent;
}

.event-item.customer-event {
    background: #fff0e8;
    border-color: #FF8246;
}

.event-item.cancelled-event,
.event-item.delivered-event {
    background: #f0f0f0;
    border-color: #000000;
}

.event-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
    width: 20px;
    text-align: center;
}

.event-text {
    flex: 1;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #000000;
    word-break: break-word;
}

/* Column 3: Shipping Information */
.order-shipping-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.shipping-details {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
}

.shipping-address-text {
    margin: 0 0 15px 0;
    font-size: 0.95rem;
    color: #000000;
    word-break: break-word;
    line-height: 1.6;
}

.shipping-edit-controls {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.shipping-edit-textarea {
    width: 100%;
    padding: 10px;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    font-family: inherit;
    resize: none;
    background: #ffffff;
    transition: border-color 0.2s ease;
    min-height: 60px;
    max-height: 200px;
}

.shipping-edit-textarea:focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 130, 70, 0.1);
}

.shipping-buttons {
    display: flex;
    gap: 8px;
    width: 100%;
}

/* Column 4: Price Summary */
.order-price-summary {
    background: #f9f9f9;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.price-summary-details {
    background: #ffffff;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    margin-bottom: 15px;
}

.price-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 0.95rem;
    color: #000000;
    padding: 4px 0;
    border-bottom: 1px solid #f0f0f0;
}

.price-row:last-child {
    border-bottom: none;
}

.price-row.price-total {
    font-weight: 700;
    font-size: 1.1rem;
    margin-top: 5px;
    padding-top: 8px;
}

.price-value {
    font-weight: 600;
    color: #000000;
}

.free-shipping {
    color: #000000;
    font-weight: 600;
}

.price-total .price-value {
    color: #FF8246;
    font-size: 1.2rem;
}

.price-divider {
    height: 1px;
    background: #e0e0e0;
    margin: 10px 0;
}

/* Order Actions */
.order-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: auto;
}

/* ===== BUTTONS - Consistent styling ===== */
.btn {
    display: inline-block;
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    min-width: 180px;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
    border: 1px solid #FF8246;
}

.btn-primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.btn-secondary:hover {
    background-color: #333333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    width: 100%;
}

.action-btn .btn-icon {
    width: 16px;
    height: 16px;
    filter: brightness(0) saturate(100%) invert(100%);
    flex-shrink: 0;
}

.action-btn.review,
.action-btn.cancel,
.action-btn.edit-shipping,
.action-btn.reset-shipping {
    background: #000000;
    color: #ffffff;
}

.action-btn.view,
.action-btn.save-shipping {
    background: #FF8246;
    color: #ffffff;
}

.action-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* ===== EMPTY STATE - Full width container with proper spacing ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.8rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.empty-state .btn {
    display: inline-block;
    width: auto;
    min-width: 200px;
    padding: 12px 30px;
}

/* ===== LOADING STATE ===== */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1rem;
    width: 100%;
}

.loading::after {
    content: '...';
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ===== MODAL STYLES ===== */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    max-width: 450px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-title {
    color: #000000;
    font-size: 1.4rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.modal-message {
    color: #666666;
    font-size: 1rem;
    margin-bottom: 25px;
    line-height: 1.5;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 25px;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
    max-width: 130px;
    transition: all 0.3s ease;
}

.modal-btn-cancel {
    background: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.modal-btn-cancel:hover {
    background: #333333;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
    border: 1px solid #FF8246;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

/* Form styles for review modal */
.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #000000;
    font-size: 0.95rem;
}

.form-textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    resize: none;
    font-family: inherit;
    background: #fafafa;
    height: 120px;
    overflow-y: auto;
}

.form-textarea:focus {
    outline: none;
    border-color: #FF8246;
    background: #ffffff;
}

/* Star rating */
.star-rating {
    display: flex;
    gap: 5px;
    justify-content: center;
    margin: 15px 0;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.star {
    cursor: pointer;
    position: relative;
    width: 32px;
    height: 32px;
    display: inline-block;
}

.star img {
    width: 32px;
    height: 32px;
    transition: transform 0.2s ease;
    position: absolute;
    top: 0;
    left: 0;
}

.rating-error {
    color: #FF8246;
    font-size: 0.85rem;
    margin-top: 5px;
    text-align: center;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1200px) {
    .order-body {
        grid-template-columns: 1.1fr 1.1fr 1.1fr 0.9fr;
    }
}

@media (max-width: 1000px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
    
    .order-body {
        grid-template-columns: 1fr;
    }
    
    .order-product-column,
    .order-event-column,
    .order-shipping-column {
        border-right: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .product-details {
        flex-direction: row;
        text-align: left;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .filter-tabs {
        margin-bottom: 25px;
        padding: 8px 0;
    }
    
    .filter-tab {
        padding: 6px 16px;
        font-size: 0.9rem;
    }
    
    .order-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .order-header-right {
        width: 100%;
        justify-content: space-between;
    }
    
    .product-details {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .product-thumbnail {
        width: 100px;
        height: 100px;
        margin-bottom: 10px;
    }
    
    .order-actions {
        flex-direction: column;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.6rem;
    }
    
    .modal-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .modal-btn {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .filter-tabs {
        gap: 8px;
    }
    
    .filter-tab {
        padding: 5px 12px;
        font-size: 0.85rem;
    }
    
    .order-status-badge {
        min-width: 80px;
        font-size: 0.7rem;
    }
    
    .product-info h4 {
        font-size: 0.95rem;
    }
    
    .product-info p {
        font-size: 0.85rem;
    }
    
    .shipping-buttons {
        flex-direction: row;
        gap: 5px;
    }
    
    .action-btn {
        padding: 8px;
        font-size: 0.85rem;
    }
    
    .action-btn .btn-icon {
        width: 14px;
        height: 14px;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.4rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
    
    .empty-state .btn {
        min-width: 160px;
        padding: 10px 20px;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .event-text {
        font-size: 0.85rem;
    }
    
    .shipping-buttons {
        flex-direction: column;
    }
    
    .action-btn {
        width: 100%;
    }
}

/* Screen reader only */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}
```

---

## File: `Crooks-Cart-Collectives/styles/privacy-policy.css`

**Status:** `FOUND`

```css
/* ============================================
   PRIVACY POLICY PAGE STYLES
   Class naming convention: BEM (Block Element Modifier)
   Block: privacy-policy-page, policy-hero, policy-intro, policy-section
============================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.privacy-policy-page {
    max-width: 1000px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.policy-hero {
    margin-top: 100px;
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    background: white;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-hero__container {
    max-width: 800px;
    margin: 0 auto;
}

.policy-hero__title {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.policy-hero__highlight {
    color: #ff8246;
}

.policy-hero__subtitle {
    font-size: clamp(1rem, 3vw, 1.3rem);
    color: #666;
}

/* ===== INTRO SECTION ===== */
.policy-intro {
    margin-bottom: 40px;
}

.policy-intro__card {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-intro__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 15px;
}

.policy-intro__last-updated {
    font-size: 0.95rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 0;
}

/* ===== POLICY SECTIONS ===== */
.policy-sections {
    width: 100%;
}

.policy-section {
    background: white;
    border-radius: 10px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.policy-section__header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.policy-section__accent {
    width: 4px;
    height: 30px;
    background-color: #ff8246;
    margin-right: 15px;
    border-radius: 2px;
}

.policy-section__title {
    font-size: 1.5rem;
    color: #333;
    margin: 0;
    font-weight: 600;
}

.policy-section__body {
    padding-left: 19px; /* Aligns with accent line */
}

.policy-section__body p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.policy-section__list {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}

.policy-section__list-item {
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

.policy-section__list-item::before {
    content: "•";
    color: #ff8246;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.policy-section__note {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    font-style: italic;
    color: #666;
}

.policy-section__important {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    margin-bottom: 15px;
}

/* Contact Details */
.policy-contact {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 15px 0;
    font-style: normal;
}

.policy-contact__item {
    margin-bottom: 8px;
}

.policy-contact__item:last-child {
    margin-bottom: 0;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .privacy-policy-page {
        margin-top: 80px;
    }
    
    .policy-hero {
        padding: 40px 20px;
    }
    
    .policy-section__title {
        font-size: 1.3rem;
    }
    
    .policy-section {
        padding: 25px 20px;
    }
    
    .policy-section__body {
        padding-left: 14px;
    }
}

@media (max-width: 480px) {
    .policy-hero {
        padding: 30px 15px;
    }
    
    .policy-hero__title {
        font-size: 2rem;
    }
    
    .policy-intro__card {
        padding: 20px;
    }
    
    .policy-intro__text {
        font-size: 1rem;
    }
    
    .policy-section__title {
        font-size: 1.2rem;
    }
    
    .policy-section__accent {
        height: 25px;
    }
    
    .policy-section {
        padding: 20px 15px;
    }
    
    .policy-section__body {
        padding-left: 9px;
    }
    
    .policy-section__body p,
    .policy-section__list-item {
        font-size: 0.95rem;
    }
    
    .policy-contact {
        padding: 15px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/product-detail.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/product-details.css */
/* Revised with seller-new-product style layout and proper placeholder handling */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    line-height: 1.5;
}

.content {
    max-width: 1200px;
    margin: 80px auto 20px;
    padding: 20px;
    min-height: calc(100vh - 200px);
    width: 100%;
}

.product-details-wrapper {
    background: #f2f4f6;
    border: 1px solid #363940;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* ===== PRODUCT DETAILS GRID - REVERSED COLUMNS ===== */
.product-details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 30px;
}

/* IMAGE COLUMN - Right side now */
.product-image-column.right-column {
    order: 2;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* INFO COLUMN - Left side now */
.product-info-column.left-column {
    order: 1;
    display: flex;
    flex-direction: column;
}

/* ===== PREVIEW BOX (from seller-new-product) ===== */
.preview-box {
    width: 100%;
    max-width: 400px;
    height: 350px;
    border: 2px solid #363940;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}

.preview-box:hover {
    border-color: #ff8246;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.2);
}

.preview-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    width: 100%;
    height: 100%;
}

.preview-placeholder img {
    width: 80px;
    height: 80px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.preview-placeholder span {
    font-size: 1rem;
    color: #000000;
    font-weight: 500;
}

.preview-image {
    width: 100%;
    height: 100%;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 8px;
    display: none;
}

/* ===== THUMBNAIL NAVIGATION (from seller-new-product) ===== */
.thumbnail-navigation {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 5px;
    width: 100%;
}

.thumbnail-image-btn {
    width: 50px;
    height: 50px;
    border: 2px solid #363940;
    border-radius: 6px;
    background-color: #ffffff;
    padding: 0;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.thumbnail-image-btn:hover {
    border-color: #ff8246;
    transform: scale(1.05);
    box-shadow: 0 2px 8px rgba(255, 130, 70, 0.3);
}

.thumbnail-image-btn.active {
    border-color: #ff8246;
    border-width: 3px;
    box-shadow: 0 0 0 2px rgba(255, 130, 70, 0.3);
}

.thumbnail-image-btn.hover {
    border-color: #ff8246;
    border-width: 3px;
    box-shadow: 0 0 0 2px rgba(255, 130, 70, 0.3);
}

/* Placeholder styling for when no image exists */
.thumbnail-image-btn.placeholder {
    background-color: #f2f4f6;
    border: 2px dashed #363940;
}

.thumbnail-image-btn.placeholder .thumbnail-image {
    width: 24px;
    height: 24px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    opacity: 0.7;
}

/* Empty slot styling */
.thumbnail-image-btn.empty-slot {
    background-color: #f2f4f6;
    border: 2px dashed #363940;
}

.thumbnail-image-btn.empty-slot:hover {
    border-color: #ff8246;
    border-style: solid;
}

.thumbnail-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Empty slot icon styling */
.thumbnail-image-btn.empty-slot .thumbnail-image {
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    opacity: 0.7;
}

.thumbnail-image-btn.empty-slot:hover .thumbnail-image {
    opacity: 1;
}

/* ===== INFO SECTION ===== */
.info-section {
    background: #ffffff;
    border: 1px solid #363940;
    border-radius: 12px;
    padding: 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.product-title {
    font-size: 2rem;
    font-weight: 700;
    color: #000000;
    margin: 0;
    line-height: 1.3;
    word-break: break-word;
}

.product-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
}

.product-category {
    background: #000000;
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.product-seller {
    font-size: 0.9rem;
    color: #666666;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
}

.product-seller strong {
    color: #000000;
    font-weight: 700;
}

.verified-badge {
    background: #ff8246;
    color: #ffffff;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.product-price-container {
    margin: 5px 0;
}

.price-label {
    display: block;
    font-size: 0.8rem;
    color: #666666;
    margin-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.product-price {
    font-size: 2.5rem;
    font-weight: 700;
    color: #ff8246;
    line-height: 1;
}

/* Stock status */
.stock-status {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 5px 0;
}

.status-indicator {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.in-stock .status-indicator {
    background: #ff8246;
}

.out-of-stock .status-indicator {
    background: #000000;
}

.status-text {
    font-size: 0.9rem;
    font-weight: 500;
    color: #000000;
}

/* ===== PRODUCT DESCRIPTION ===== */
.product-description {
    margin: 10px 0;
}

.product-description h2 {
    font-size: 1rem;
    color: #000000;
    margin-bottom: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.description-content {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #333333;
    white-space: pre-line;
    word-break: break-word;
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    max-height: 200px;
    overflow-y: auto;
}

.description-content::-webkit-scrollbar {
    width: 5px;
}

.description-content::-webkit-scrollbar-track {
    background: #f0f0f0;
}

.description-content::-webkit-scrollbar-thumb {
    background: #000000;
    border-radius: 3px;
}

.description-content::-webkit-scrollbar-thumb:hover {
    background: #ff8246;
}

/* ===== ACTION BUTTONS ===== */
.product-actions {
    display: flex;
    gap: 12px;
    margin-top: 15px;
}

.btn {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 20px;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    min-width: 140px;
    white-space: nowrap;
}

.btn-primary {
    background: #ff8246;
    color: #ffffff;
}



.btn-secondary {
    background: #000000;
    color: #ffffff;
}

.btn-secondary:hover:not(:disabled) {
    background: #333333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.login-to-purchase-btn {
    background: #000000;
    color: #ffffff;
}

.login-to-purchase-btn:hover {
    background: #333333;
}

/* ===== REVIEWS SECTION ===== */
.reviews-section {
    margin-top: 30px;
    padding-top: 25px;
    border-top: 2px solid #ff8246;
}

.reviews-title {
    font-size: 1.3rem;
    color: #000000;
    margin-bottom: 20px;
    font-weight: 600;
}

.reviews-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-height: 400px;
    overflow-y: auto;
    padding-right: 10px;
}

.reviews-list::-webkit-scrollbar {
    width: 5px;
}

.reviews-list::-webkit-scrollbar-track {
    background: #f0f0f0;
}

.reviews-list::-webkit-scrollbar-thumb {
    background: #000000;
    border-radius: 3px;
}

.reviews-list::-webkit-scrollbar-thumb:hover {
    background: #ff8246;
}

.review-card {
    background: #ffffff;
    border-radius: 10px;
    padding: 20px;
    border: 1px solid #e0e0e0;
}

.review-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
}

.reviewer-profile {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
    background: #f0f0f0;
    flex-shrink: 0;
}

.reviewer-profile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.reviewer-info {
    flex: 1;
}

.reviewer-name {
    font-weight: 600;
    color: #000000;
    font-size: 1rem;
    margin-bottom: 2px;
}

.reviewer-username {
    font-size: 0.8rem;
    color: #666666;
}

.review-rating {
    display: flex;
    gap: 2px;
    margin-bottom: 8px;
}

.review-rating .star {
    width: 18px;
    height: 18px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.review-comment {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #333333;
    margin-bottom: 8px;
}

.review-date {
    font-size: 0.75rem;
    color: #999999;
}

.no-reviews-message {
    text-align: center;
    padding: 30px;
    background: #ffffff;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    color: #666666;
    font-size: 0.95rem;
}

/* ===== NOTIFICATION STYLES ===== */
.product-notification {
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
    border-left: 4px solid #ff8246;
}

.product-notification .notification-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
}

.product-notification .notification-icon img {
    width: 20px;
    height: 20px;
    filter: brightness(0) invert(1);
}

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

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 992px) {
    .content {
        margin-top: 90px;
    }
    
    .product-details-grid {
        gap: 25px;
    }
    
    .preview-box {
        max-width: 350px;
        height: 320px;
    }
    
    .product-title {
        font-size: 1.8rem;
    }
    
    .product-price {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 15px;
    }
    
    .product-details-wrapper {
        padding: 20px;
    }
    
    .product-details-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .product-image-column.right-column {
        order: 1;
    }
    
    .product-info-column.left-column {
        order: 2;
    }
    
    .preview-box {
        max-width: 100%;
        height: 300px;
    }
    
    .product-title {
        font-size: 1.6rem;
    }
    
    .product-price {
        font-size: 2rem;
    }
    
    .description-content {
        max-height: 180px;
    }
    
    .reviews-list {
        max-height: 350px;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 12px;
    }
    
    .product-details-wrapper {
        padding: 15px;
    }
    
    .preview-box {
        height: 250px;
    }
    
    .thumbnail-navigation {
        gap: 6px;
    }
    
    .thumbnail-image-btn {
        width: 45px;
        height: 45px;
    }
    
    .product-title {
        font-size: 1.4rem;
    }
    
    .product-price {
        font-size: 1.8rem;
    }
    
    .product-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .btn {
        width: 100%;
        min-width: 0;
        padding: 12px;
    }
    
    .review-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .reviewer-profile {
        width: 40px;
        height: 40px;
    }
    
    .reviews-list {
        max-height: 300px;
        padding-right: 5px;
    }
    
    .review-card {
        padding: 15px;
    }
    
    .product-notification {
        top: 80px;
        right: 15px;
        left: 15px;
        max-width: calc(100% - 30px);
        padding: 10px 15px;
        font-size: 0.9rem;
    }
}

@media (max-width: 375px) {
    .content {
        margin-top: 65px;
        padding: 10px;
    }
    
    .product-details-wrapper {
        padding: 12px;
    }
    
    .preview-box {
        height: 220px;
    }
    
    .thumbnail-image-btn {
        width: 40px;
        height: 40px;
    }
    
    .product-title {
        font-size: 1.3rem;
    }
    
    .product-price {
        font-size: 1.6rem;
    }
    
    .product-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .description-content {
        padding: 12px;
        font-size: 0.9rem;
        max-height: 150px;
    }
    
    .review-rating .star {
        width: 16px;
        height: 16px;
    }
    
    .review-comment {
        font-size: 0.9rem;
    }
    
    .product-notification {
        top: 70px;
        padding: 8px 12px;
        font-size: 0.85rem;
    }
}

/* ===== PRINT STYLES ===== */
@media print {
    .product-actions,
    .thumbnail-navigation,
    .btn {
        display: none;
    }
    
    .product-details-wrapper {
        box-shadow: none;
        border: 1px solid #000000;
    }
    
    .preview-box {
        border: 1px solid #000000;
        page-break-inside: avoid;
    }
    
    .review-card {
        break-inside: avoid;
        border: 1px solid #000000;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/product.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/product.css */
/* Unified styling with page-title-header, consistent cards (matching seller-manage-product), and proper empty state */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified across all pages ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== FILTER TABS - Consistent styling ===== */
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

/* ===== PRODUCTS GRID - Matching seller-manage-product ===== */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 0 0 20px 0;
    width: 100%;
}

/* ===== PRODUCT CARD - Matching seller-manage-product exactly ===== */
.product-card {
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    display: flex;
    flex-direction: column;
    border: 1px solid #e0e0e0;
    height: 100%;
}

.product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-image-container {
    width: 100%;
    height: 180px;
    overflow: hidden;
    background-color: #f5f5f5;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.product-info {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    margin: 0 0 8px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e2e2f;
    line-height: 1.4;
    min-height: 2.8rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-price {
    color: #FF8246;
    font-weight: 600;
    font-size: 1.3rem;
    margin: 5px 0;
}

.product-seller,
.product-stock {
    font-size: 0.9rem;
    color: #666666;
    margin: 3px 0;
}

.product-actions {
    margin-top: 12px;
    width: 100%;
}

/* ===== BUTTONS - Matching seller-manage-product ===== */
.btn {
    display: inline-block;
    padding: 10px 0;
    border: none;
    border-radius: 4px;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    width: 100%;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 8px rgba(255, 130, 70, 0.3);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
}

.btn-secondary:hover {
    background-color: #333333;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* ===== EMPTY STATE - Full width container with proper spacing ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.8rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.empty-state .btn {
    display: inline-block;
    width: auto;
    min-width: 200px;
    padding: 12px 30px;
}

/* ===== LOADING STATE ===== */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1rem;
    width: 100%;
}

.loading::after {
    content: '...';
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ===== RESPONSIVE DESIGN - Matching seller-manage-product ===== */
@media (max-width: 992px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .filter-tabs {
        margin-bottom: 25px;
        padding: 8px 0;
    }
    
    .filter-tab {
        padding: 6px 16px;
        font-size: 0.9rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
    }
    
    .product-image-container {
        height: 160px;
    }
    
    .product-title {
        font-size: 1rem;
        min-height: 2.4rem;
    }
    
    .product-price {
        font-size: 1.2rem;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.6rem;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .filter-tabs {
        gap: 8px;
    }
    
    .filter-tab {
        padding: 5px 12px;
        font-size: 0.85rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 15px;
        max-width: 350px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .product-image-container {
        height: 180px;
    }
    
    .product-info {
        padding: 12px;
    }
    
    .product-title {
        font-size: 1rem;
        min-height: auto;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.4rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
    
    .empty-state .btn {
        min-width: 160px;
        padding: 10px 20px;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .filter-tab {
        padding: 4px 10px;
        font-size: 0.8rem;
    }
    
    .product-info {
        padding: 10px;
    }
    
    .product-title {
        font-size: 0.95rem;
    }
    
    .product-price {
        font-size: 1.1rem;
    }
}

/* Screen reader only */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}
```

---

## File: `Crooks-Cart-Collectives/styles/profile.css`

**Status:** `FOUND`

```css
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #f2f4f6;
    color: #000000;
    line-height: 1.5;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 30px 0 20px;
}

/* Form Container */
.profile-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

/* Form Sections - stacked vertically */
.form-section {
    background: #ffffff;
    border: 1px solid #000000;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
}

.form-section:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.form-section h3 {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #FF8246;
}

/* Account info section needs to position buttons at bottom */
.account-info-section {
    display: flex;
    flex-direction: column;
    min-height: 300px;
}

/* PROFILE STACKED CONTAINER - Stack vertically and center */
.profile-stacked-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-bottom: 30px;
}

/* Profile Picture Wrapper */
.profile-picture-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 15px;
}

.profile-picture-wrapper img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #FF8246;
    background: #f0f0f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Profile Name Single Line - first name + last name on one line */
.profile-name-single-line {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 10px;
    width: 100%;
}

.display-full-name {
    font-size: 2rem;
    font-weight: 600;
    color: #000000;
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 90%;
}

/* Choose button container - centered */
.choose-button-container {
    margin-top: 8px;
    width: 100%;
    display: flex;
    justify-content: center;
}

/* Choose photo button - centered */
.btn-choose-photo {
    background-color: #000000;
    color: #ffffff;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.3px;
    padding: 10px 24px;
    width: auto;
    min-width: 0;
    max-width: 100%;
    text-align: center;
    border: 1px solid #000000;
    white-space: nowrap;
}

.btn-choose-photo:hover {
    background-color: #333333;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

/* Profile picture upload (hidden file input) */
.profile-picture-upload {
    margin-top: 10px;
    width: 100%;
}

.file-upload-label {
    display: none;
}

.profile-picture-upload input[type="file"] {
    display: none;
}

.file-name {
    margin-top: 6px;
    font-size: 0.8rem;
    color: #000000;
    word-break: break-all;
    text-align: left;
    opacity: 0.7;
}

.help-text {
    font-size: 0.75rem;
    color: #666666;
    margin-top: 4px;
    text-align: left;
}

/* Fields row - for multiple fields in one line */
.fields-row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
}

/* Add labels above inputs */
.with-labels {
    margin-top: 10px;
}

.field-label {
    display: block;
    color: #000000;
    margin-bottom: 4px;
    opacity: 0.8;
}

/* Balanced row - for birthdate and gender to share space equally */
.balanced-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

/* Half field - exactly 50% minus half the gap */
.half-field {
    flex: 1 1 calc(50% - 7.5px);
    min-width: 0;
}

/* ===== FIXED: Info row - for account info items ===== */
.info-row {
    display: flex;
    flex-wrap: nowrap;
    gap: 15px;
    margin-bottom: 20px;
    width: 100%;
}

/* ===== FIXED: Info Group - for account info with equal height ===== */
.info-group {
    flex: 1 1 0;
    min-width: 0;
    display: flex;
    flex-direction: column;
    background: #f9f9f9;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    padding: 10px 8px;
    height: 100%;
}

.info-group label {
    display: block;
    color: #000000;
    margin-bottom: 2px;
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    opacity: 0.7;
    white-space: nowrap;
}

/* ===== FIXED: Info value with proper text handling ===== */
.info-value {
    font-size: 0.8rem;
    color: #000000;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.3;
    background: transparent;
    padding: 2px 0;
    border: none;
    width: 100%;
}

/* Special handling for email - slightly smaller to fit */
.info-group:first-child .info-value {
    font-size: 0.7rem;
    letter-spacing: -0.02em;
}

/* Flex field - grows/shrinks based on content */
.flex-field {
    flex: 1 1 auto;
    min-width: 120px;
}

/* Full width field */
.full-width {
    width: 100%;
}

/* Form Groups */
.form-group {
    margin-bottom: 0;
}

/* Input styles - ORIGINAL STYLING for enabled/disabled states */
.form-group input[type="text"],
.form-group input[type="date"],
.form-group select,
.form-group textarea {
    width: 100%;
    height: 42px;
    padding: 0 12px;
    border: 1px solid #000000;
    border-radius: 6px;
    font-size: 0.95rem;
    background-color: #ffffff;
    color: #000000;
    transition: all 0.3s ease;
}

/* Make date input consistent */
.form-group input[type="date"] {
    font-family: inherit;
}

.form-group textarea {
    height: 80px;
    padding: 8px 12px;
    resize: vertical;
    font-family: inherit;
}

/* FOCUS STATE - for when inputs are enabled and being edited */
.form-group input:not(:disabled):focus,
.form-group select:not(:disabled):focus,
.form-group textarea:not(:disabled):focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

/* DISABLED STATE - matches the info-value style from account info */
.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    background-color: #f9f9f9;
    border-color: #e0e0e0;
    color: #000000;
    cursor: not-allowed;
    opacity: 1;
}

/* Make placeholder text in disabled fields lighter */
.form-group input:disabled::placeholder,
.form-group select:disabled::placeholder,
.form-group textarea:disabled::placeholder {
    color: #999999;
    opacity: 1;
}

.error-message {
    color: #FF8246;
    font-size: 0.8rem;
    margin-top: 4px;
    min-height: 18px;
    display: none;
}

.error-message.show {
    display: block;
}

/* Info note - centered */
.info-note {
    margin-top: 10px;
    margin-bottom: 25px;
    color: #666666;
    font-style: italic;
    text-align: center;
    font-size: 0.9rem;
}

/* Profile actions - equal width buttons at bottom of account info */
.profile-actions {
    display: flex;
    gap: 15px;
    width: 100%;
    margin-top: auto;
    padding-top: 20px;
}

.profile-actions .btn {
    flex: 1 1 0;
    min-width: 0;
    padding: 12px 0;
    text-align: center;
}

.btn {
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.5px;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
}

.btn-primary:hover:not(:disabled) {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.btn:disabled {
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}

/* Messages */
.message {
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: none;
    border-left: 4px solid;
}

.message.success {
    background-color: #e8f5e9;
    color: #2e7d32;
    border-left-color: #2e7d32;
}

.message.error {
    background-color: #ffebee;
    color: #c62828;
    border-left-color: #c62828;
}

/* Feedback Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-message {
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #000000;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* ========== DESKTOP VIEW ========== */
@media (min-width: 769px) {
    .profile-picture-wrapper img {
        width: 150px;
        height: 150px;
    }
    
    .display-full-name {
        font-size: 2rem;
    }
    
    .btn-choose-photo {
        padding: 12px 32px;
        font-size: 1.1rem;
        border-radius: 40px;
    }
}

/* ========== TABLET VIEW ========== */
@media (min-width: 577px) and (max-width: 768px) {
    .profile-picture-wrapper img {
        width: 160px;
        height: 160px;
    }
    
    .display-full-name {
        font-size: 2rem;
    }
    
    .btn-choose-photo {
        padding: 10px 28px;
        font-size: 1rem;
        border-radius: 30px;
    }
    
    .info-value {
        font-size: 0.75rem;
    }
    
    .info-group:first-child .info-value {
        font-size: 0.65rem;
    }
}

/* ========== MOBILE VIEW ========== */
@media (max-width: 768px) {
    .info-row {
        flex-wrap: wrap;
    }
    
    .info-group {
        min-width: 200px;
    }
    
    .info-value {
        font-size: 0.85rem;
        white-space: normal;
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
    
    .info-group:first-child .info-value {
        font-size: 0.8rem;
        white-space: normal;
    }
}

@media (max-width: 576px) {
    .profile-picture-wrapper img {
        width: 140px;
        height: 140px;
    }
    
    .display-full-name {
        font-size: 1.8rem;
        white-space: normal;
        word-break: break-word;
    }
    
    .btn-choose-photo {
        padding: 10px 24px;
        font-size: 1rem;
        border-radius: 30px;
    }
    
    /* Form fields stack vertically */
    .fields-row {
        flex-direction: column;
        gap: 12px;
    }
    
    .flex-field {
        width: 100%;
    }
    
    .balanced-row {
        flex-direction: column;
    }
    
    .half-field {
        width: 100%;
    }
    
    .info-row {
        flex-direction: column;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .info-group {
        width: 100%;
        min-width: 100%;
    }
    
    .profile-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .profile-actions .btn {
        width: 100%;
    }
    
    .info-value {
        font-size: 0.95rem;
        white-space: normal;
        -webkit-line-clamp: 3;
    }
}

/* ========== SMALL MOBILE VIEW ========== */
@media (max-width: 375px) {
    .profile-picture-wrapper img {
        width: 120px;
        height: 120px;
    }
    
    .display-full-name {
        font-size: 1.5rem;
    }
    
    .btn-choose-photo {
        padding: 8px 20px;
        font-size: 0.9rem;
    }
    
    .info-value {
        font-size: 0.9rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/report-seller.css`

**Status:** `FOUND`

```css
/* Complaint Page Styles */
.page-title {
    text-align: center;
    margin: 30px 0;
    color: #333;
    font-size: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.complaints-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.complaint-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 25px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.complaint-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.complaint-header {
    background: linear-gradient(135deg, #a49bf8 0%, #43c9fb 100%);
    padding: 20px;
    color: white;
    position: relative;
}

.complaint-about {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

.complaint-author {
    margin-top: 10px;
    font-size: 1.1rem;
    font-weight: 500;
    opacity: 0.9;
}

.complaint-date {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.2);
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.9rem;
}

.complaint-body {
    padding: 25px;
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
    border-left: 5px solid #43c9fb;
}

.no-complaints, .error-message {
    text-align: center;
    padding: 40px;
    font-size: 1.3rem;
    color: #666;
    background: #f9f9f9;
    border-radius: 10px;
    margin: 30px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .complaint-header {
        padding: 15px;
    }
    
    .complaint-about {
        font-size: 1.3rem;
    }
    
    .complaint-date {
        position: static;
        margin-top: 10px;
        display: inline-block;
    }
}

/* Floating Button */
.floating-complaint-button {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background-color: var(--color-accent-A);
    color: var(--color-text-B);
    padding: 12px 20px;
    border-radius: 8px;
    border: none;
    box-shadow: var(--effect-box-shadow-default);
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    z-index: 1001;
    transition: background-color 0.3s;
}

.floating-complaint-button:hover {
    background-color: var(--color-hover-A);
}

.floating-complaint-button img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

/* Modal Styles */
.complaint-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    backdrop-filter: blur(4px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.complaint-modal {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    width: 100%;
    max-width: 500px;
    box-shadow: var(--effect-box-shadow-default);
    position: relative;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 15px;
    background: none;
    border: none;
    font-size: 1.8rem;
    cursor: pointer;
    color: #777;
    transition: color 0.3s;
}

.close-button:hover {
    color: #333;
}

/* Form Styles */
.complaint-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.complaint-form label {
    font-weight: 600;
    color: #444;
}

.complaint-form input,
.complaint-form textarea {
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.complaint-form input:focus,
.complaint-form textarea:focus {
    outline: none;
    border-color: #43c9fb;
    box-shadow: 0 0 0 2px rgba(67, 201, 251, 0.2);
}

.complaint-form textarea {
    resize: none; /* Disable resizing */
    min-height: 150px;
}

.form-buttons {
    display: flex;
    gap: 12px;
    margin-top: 10px;
}

.submit-button, .cancel-button {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.submit-button {
    background-color: var(--color-accent-A);
    color: white;
}

.submit-button:hover {
    background-color: var(--color-hover-A);
    box-shadow: var(--effect-glow-B);
}

.cancel-button {
    background-color: #f0f0f0;
    color: #666;
    border: 1px solid #ddd;
}

.cancel-button:hover {
    background-color: #e0e0e0;
    color: #333;
}

/* Blur effect for background */
.blurred-background > *:not(.complaint-overlay):not(script) {
    filter: blur(4px);
    pointer-events: none;
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-process-order.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/seller-process-order.css */
/* Unified styling with consistent page-title-header, cards, and empty state */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified across all pages ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== FILTER TABS - Consistent styling ===== */
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

/* ===== ORDERS LIST ===== */
.orders-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
    width: 100%;
}

/* ===== ORDER CARD - Consistent styling with product cards ===== */
.order-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    overflow: hidden;
    width: 100%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.order-header {
    padding: 15px 20px;
    background: #f8f8f8;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.order-header-left {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.order-id {
    font-weight: 700;
    font-size: 1.1rem;
    color: #000000;
    background: #f0f0f0;
    padding: 4px 12px;
    border-radius: 20px;
}

.order-date {
    color: #666666;
    font-size: 0.85rem;
    background: #e0e0e0;
    padding: 3px 10px;
    border-radius: 30px;
}

.order-header-right {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.customer-info {
    font-weight: 500;
    color: #000000;
    background: #f0f0f0;
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 0.9rem;
}

.order-status-badge {
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    min-width: 100px;
    text-align: center;
    border: 1px solid transparent;
}

.order-status-badge.pending {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

.order-status-badge.delivered {
    background: #000000;
    color: #ffffff;
    border-color: #000000;
}

.order-status-badge.cancelled {
    background: #000000;
    color: #ffffff;
    opacity: 0.8;
    border-color: #000000;
}

/* ===== ORDER BODY - Four column layout ===== */
.order-body {
    display: grid;
    grid-template-columns: 1.2fr 1.2fr 1.4fr 1fr;
    gap: 0;
    background: #ffffff;
    width: 100%;
}

.column-title {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 15px;
    padding-bottom: 8px;
    border-bottom: 2px solid #FF8246;
    display: block;
    width: 100%;
}

/* Column 1: Product Details */
.order-product-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.product-details {
    display: flex;
    gap: 15px;
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    width: 100%;
}

.product-thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    background: white;
    flex-shrink: 0;
    border: 1px solid #f0f0f0;
}

.product-thumbnail[src*="package.svg"] {
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.product-info {
    flex: 1;
}

.product-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 8px;
}

.product-info p {
    font-size: 0.9rem;
    color: #666666;
    margin: 4px 0;
}

.info-label {
    font-weight: 500;
    color: #000000;
    margin-right: 5px;
}

/* Column 2: Event Activity */
.order-event-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.event-activity-content {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.event-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid transparent;
}

.event-item.customer-event {
    background: #fff0e8;
    border-color: #FF8246;
}

.event-item.cancelled-event,
.event-item.delivered-event {
    background: #f0f0f0;
    border-color: #000000;
}

.event-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
    width: 20px;
    text-align: center;
}

.event-text {
    flex: 1;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #000000;
    word-break: break-word;
}

/* Column 3: Customer Details */
.order-shipping-column {
    background: #ffffff;
    padding: 20px;
    border-right: 1px solid #f0f0f0;
}

.shipping-details {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
}

.shipping-details p {
    margin: 8px 0;
    font-size: 0.95rem;
    color: #000000;
    word-break: break-word;
    padding: 4px 0;
    border-bottom: 1px solid #f0f0f0;
}

.shipping-details p:last-child {
    border-bottom: none;
}

.shipping-details strong {
    color: #000000;
    min-width: 70px;
    display: inline-block;
}

.shipping-address-text {
    font-weight: 500;
}

/* Column 4: Price Summary */
.order-price-summary {
    background: #f9f9f9;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.price-summary-details {
    background: #ffffff;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    margin-bottom: 15px;
}

.price-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 0.95rem;
    color: #000000;
    padding: 4px 0;
    border-bottom: 1px solid #f0f0f0;
}

.price-row:last-child {
    border-bottom: none;
}

.price-row.price-total {
    font-weight: 700;
    font-size: 1.1rem;
    margin-top: 5px;
    padding-top: 10px;
}

.price-value {
    font-weight: 600;
    color: #000000;
}

.free-shipping {
    color: #000000;
    font-weight: 600;
}

.price-total .price-value {
    color: #FF8246;
    font-size: 1.2rem;
}

.price-divider {
    height: 1px;
    background: #e0e0e0;
    margin: 12px 0;
}

/* Order Actions */
.order-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: auto;
}

/* ===== BUTTONS - Consistent styling ===== */
.action-btn {
    display: block;
    width: 100%;
    padding: 12px;
    border: 1px solid transparent;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
}

.action-btn.complete {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

.action-btn.complete:hover {
    background: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.action-btn.cancel {
    background: #000000;
    color: #ffffff;
    border-color: #000000;
}

.action-btn.cancel:hover {
    background: #333333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.action-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: #f0f0f0;
    color: #666666;
    border-color: #cccccc;
}

/* ===== EMPTY STATE - Full width container with proper spacing ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.8rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 30px;
    line-height: 1.6;
}

/* ===== LOADING STATE ===== */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1rem;
    width: 100%;
}

.loading::after {
    content: '...';
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ===== MODAL STYLES ===== */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-title {
    color: #000000;
    font-size: 1.4rem;
    margin-bottom: 10px;
    font-weight: 600;
}

.modal-message {
    color: #666666;
    font-size: 1rem;
    margin-bottom: 25px;
    line-height: 1.5;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
    max-width: 130px;
    transition: all 0.3s ease;
}

.modal-btn-cancel {
    background: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.modal-btn-cancel:hover {
    background: #333333;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
    border: 1px solid #FF8246;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1200px) {
    .order-body {
        grid-template-columns: 1.1fr 1.1fr 1.3fr 0.9fr;
    }
}

@media (max-width: 1000px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
    
    .order-body {
        grid-template-columns: 1fr;
    }
    
    .order-product-column,
    .order-event-column,
    .order-shipping-column {
        border-right: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .product-details {
        flex-direction: row;
        text-align: left;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .filter-tabs {
        margin-bottom: 25px;
        padding: 8px 0;
    }
    
    .filter-tab {
        padding: 6px 16px;
        font-size: 0.9rem;
    }
    
    .order-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .order-header-right {
        width: 100%;
        justify-content: space-between;
    }
    
    .product-details {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .product-thumbnail {
        width: 100px;
        height: 100px;
        margin-bottom: 10px;
    }
    
    .order-actions {
        flex-direction: column;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.6rem;
    }
    
    .modal-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .modal-btn {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .filter-tabs {
        gap: 8px;
    }
    
    .filter-tab {
        padding: 5px 12px;
        font-size: 0.85rem;
    }
    
    .order-status-badge {
        min-width: 80px;
        font-size: 0.7rem;
    }
    
    .customer-info {
        font-size: 0.85rem;
        padding: 3px 10px;
    }
    
    .product-info h4 {
        font-size: 0.95rem;
    }
    
    .product-info p {
        font-size: 0.85rem;
    }
    
    .event-text {
        font-size: 0.85rem;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.4rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .event-text {
        font-size: 0.8rem;
    }
    
    .shipping-details p {
        font-size: 0.85rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-registration.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/seller-registration.css */
/* Three‑column layout based on sign-up.css, with buttons in third column */

:root {
    /* Form Layout */
    --form-section-gap: 30px;
    --input-height: 50px;
    --border-radius: 12px;

    /* Effects */
    --effect-box-shadow-default: 0 4px 12px rgba(0, 0, 0, 0.1);
    --effect-box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
    --effect-transition-default: all 0.3s ease;
    --effect-glow-B: 0 0 10px rgba(255, 130, 70, 0.4);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

::-webkit-scrollbar {
    display: none;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
}

.pageTitleHeader {
    font-size: 2rem;
    padding: 15px 40px;
    margin: 20px auto 50px;
    text-align: center;
    width: 100%;
    color: #1e2e2f;
    font-weight: 400;
}

/* Form Container - Using Grid for precise column control */
.seller-fill-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Exactly 3 equal columns */
    gap: var(--form-section-gap);
    width: 100%;
    align-items: stretch;
}

/* Form Sections */
.form-section {
    background: #f2f4f6;
    border: 1px solid #363940;
    border-radius: var(--border-radius);
    padding: 25px;
    box-shadow: var(--effect-box-shadow-default);
    transition: var(--effect-transition-default);
    display: flex;
    flex-direction: column;
    min-height: 600px;
}

.form-section:hover {
    box-shadow: var(--effect-box-shadow-hover);
}

.form-section h3 {
    font-size: 1.5rem;
    color: #1e2e2f;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #ff8246;
    flex-shrink: 0;
}

/* Combined section (third column) needs to push buttons to bottom */
.combined-section {
    display: flex;
    flex-direction: column;
}

.combined-section .column-actions {
    margin-top: auto;
    display: flex;
    gap: 15px;
    justify-content: center;
    padding-top: 20px;
    flex-shrink: 0;
}

/* Credential section specific */
.credential-section .upload-row {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.upload-box {
    flex: 1 1 200px;
    text-align: center;
    padding: 15px;
    border: 2px dashed #363940;
    border-radius: 8px;
    transition: var(--effect-transition-default);
    background: #ffffff;
}

.upload-box:hover {
    border-color: #ff8246;
}

.upload-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.upload-icon img {
    width: 48px;
    height: 48px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.upload-preview {
    width: 100%;
    height: 120px;
    background-size: cover;   /* fills box */
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 10px;
    border-radius: 6px;
    border: 1px solid #000000;
}

.upload-label {
    cursor: pointer;
    display: block;
    background: #ff8246;
    color: #ffffff;
    padding: 8px 15px;
    border-radius: 30px;
    font-size: 0.9rem;
    transition: var(--effect-transition-default);
}

.upload-label:hover {
    background: #e8693d;
    box-shadow: var(--effect-glow-B);
}

.upload-label input[type="file"] {
    display: none;
}

.file-name {
    margin-top: 8px;
    font-size: 0.8rem;
    color: #000000;
    opacity: 0.7;
    word-break: break-all;
}

.help-text {
    font-size: 0.7rem;
    color: #000000;
    opacity: 0.6;
    margin-top: 4px;
}

/* Form groups */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px;
    width: 100%;
}

.form-group label {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1e2e2f;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    height: var(--input-height);
    padding: 0 12px;
    border: 1px solid #363940;
    border-radius: 6px;
    font-size: 0.95rem;
    background-color: #ffffff;
    color: #000000;
    transition: var(--effect-transition-default);
}

.form-group textarea {
    height: auto;
    min-height: 80px;
    padding: 8px 12px;
    resize: none;
    overflow-y: auto;
    font-family: inherit;
}

.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    background-color: #ffffff;
    border-color: #000000;
    opacity: 0.5;
    color: #000000;
    cursor: not-allowed;
}

.form-group input:not(:disabled):focus,
.form-group select:not(:disabled):focus,
.form-group textarea:not(:disabled):focus {
    border-color: #ff8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.error-message {
    color: #ff8246;
    font-size: 0.8rem;
    min-height: 18px;
}

.full-width {
    width: 100%;
}

/* Info groups for account info (non-editable) */
.info-group {
    background: #ffffff;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #000000;
    opacity: 0.8;
    margin-bottom: 12px;
}

.info-group label {
    display: block;
    color: #000000;
    font-size: 0.9rem;
    margin-bottom: 4px;
    opacity: 0.8;
}

.info-value {
    font-size: 1rem;
    color: #000000;
    word-break: break-word;
    padding: 8px 12px;
    background: #ffffff;
    border-radius: 4px;
    border: 1px solid #000000;
    opacity: 0.7;
    margin: 0;
}

/* Buttons inside combined section */
.column-actions .btn {
    flex: 1;
    min-width: 0;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--effect-transition-default);
    text-align: center;
}

.column-actions .btn-primary {
    background-color: #ff8246;
    color: #ffffff;
}

.column-actions .btn-primary:hover:not(:disabled) {
    background-color: #e8693d;
    box-shadow: var(--effect-glow-B);
}

.column-actions .btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.column-actions .btn-secondary:hover:not(:disabled) {
    background-color: #333333;
}

.column-actions .btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Feedback Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-message {
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #000000;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-btn-primary {
    background: #ff8246;
    color: #ffffff;
}

.modal-btn-primary:hover {
    background: #e66a2e;
}

@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Responsive adjustments */
@media (max-width: 1000px) {
    .seller-fill-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on medium screens */
    }
    
    .form-section {
        min-height: 500px;
    }
}

@media (max-width: 768px) {
    .seller-fill-container {
        grid-template-columns: 1fr; /* Single column - stacks all 3 vertically */
        gap: 20px;
    }
    
    .form-section {
        width: 100%;
        max-width: 100%;
        margin: 0;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-dashboard.css`

**Status:** `FOUND`

```css
/* ===== DASHBOARD LAYOUT ===== */
.content {
    max-width: 1200px;
    margin: 80px auto 20px;
    padding: 20px;
    min-height: calc(100vh - 200px);
    width: 100%;
    box-sizing: border-box;
}

/* ===== WELCOME SECTION ===== */
.welcome-section {
    background: linear-gradient(135deg, #f2f4f6 0%, #ffffff 100%);
    padding: 50px 40px;
    border-radius: 12px;
    margin-bottom: 40px;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    border: 1px solid #363940;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff8246, #e8693d);
}

.welcome-section h1 {
    font-size: 2.2rem;
    color: #1e2e2f;
    margin-bottom: 15px;
    font-weight: 400;
    position: relative;
}

.welcome-section h1 span {
    color: #ff8246;
}
    
.welcome-section p {
    font-size: 1.1rem;
    color: #000000;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #eef2f6;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}
.stat-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}
.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FF8246, #FFA500);
}
.stat-icon {
    width: 48px;
    height: 48px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.stat-icon img {
    width: 40px;
    height: 40px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: transform 0.3s ease;
}
.stat-card:hover .stat-icon img {
    transform: scale(1.1);
}
.stat-number {
    font-size: 2.2rem;
    font-weight: 700;
    color: #FF8246;
    line-height: 1.2;
    margin-bottom: 5px;
}
.stat-label {
    font-size: 1rem;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}
.stat-subtext {
    font-size: 0.9rem;
    color: #adb5bd;
    margin-top: 10px;
}
/* Quick Actions */
.quick-actions {
    margin-bottom: 40px;
}
.quick-actions h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 600;
}
.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}
.action-card {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #eef2f6;
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
    display: block;
}
.action-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    border-color: #FF8246;
}
.action-icon {
    width: 48px;
    height: 48px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.action-icon img {
    width: 40px;
    height: 40px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    transition: transform 0.3s ease;
}
.action-card:hover .action-icon img {
    transform: scale(1.1);
}
.action-card h3 {
    font-size: 1.3rem;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}
.action-card p {
    font-size: 0.95rem;
    color: #6c757d;
    margin-bottom: 0;
    line-height: 1.5;
}
/* Recent Activity */
.recent-activity {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #eef2f6;
}
.recent-activity h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.recent-activity h2 a {
    font-size: 0.95rem;
    color: #FF8246;
    text-decoration: none;
    font-weight: 500;
}
.recent-activity h2 a:hover {
    text-decoration: underline;
}
.activity-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.activity-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eef2f6;
}
.activity-item:last-child {
    border-bottom: none;
}
.activity-status {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 15px;
}
.activity-status.ordered {
    background:#FF8246;
}
.activity-status.delivered {
    background: #FF8246;
}
.activity-status.cancelled {
    background: #000000;
}
.activity-details {
    flex: 1;
}
.activity-details p {
    margin: 0;
    font-size: 0.95rem;
    color: #495057;
}
.activity-details small {
    font-size: 0.8rem;
    color: #adb5bd;
}
.activity-link {
    color: #FF8246;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
}
/* Responsive */
@media (max-width: 768px) {
    .content {
        margin-top: 80px;
    }
    .welcome-section {
        padding: 30px 20px;
    }
    .welcome-section h1 {
        font-size: 1.8rem;
    }
    .stat-number {
        font-size: 1.8rem;
    }
    .actions-grid {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 480px) {
    .welcome-section {
        padding: 25px 15px;
    }
    .welcome-section h1 {
        font-size: 1.5rem;
    }
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    .action-card {
        padding: 25px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-manage-product.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/seller-manage-product.css */
/* Unified styling with page-title-header, consistent cards, and proper empty state */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    width: 100%;
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
}

/* ===== PAGE TITLE HEADER - Unified across all pages ===== */
.page-title-header {
    width: 100%;
    margin: 20px 0 30px 0;
    padding-bottom: 15px;
    border-bottom: 2px solid #FF8246;
}

.page-title-header h1 {
    font-size: 2rem;
    color: #000000;
    font-weight: 600;
    margin: 0;
}

/* ===== PRODUCTS GRID ===== */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 0 0 20px 0;
    width: 100%;
}

/* ===== PRODUCT CARD ===== */
.product-card {
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    display: flex;
    flex-direction: column;
    border: 1px solid #e0e0e0;
    height: 100%;
}

.product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-image-container {
    width: 100%;
    height: 180px;
    overflow: hidden;
    background-color: #f5f5f5;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.product-info {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    margin: 0 0 8px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e2e2f;
    line-height: 1.4;
    min-height: 2.8rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}

.product-price {
    color: #FF8246;
    font-weight: 600;
    font-size: 1.3rem;
    margin: 5px 0;
}

.product-stock {
    font-size: 0.9rem;
    color: #666666;
    margin: 3px 0;
}

.product-status {
    font-size: 0.9rem;
    margin: 3px 0;
    font-weight: 500;
}

.product-status.status-active {
    color: #28a745;
}

.product-status.status-inactive {
    color: #dc3545;
}

.product-actions {
    display: flex;
    gap: 8px;
    margin-top: 12px;
    width: 100%;
}

/* ===== BUTTONS - Consistent styling ===== */
.btn {
    display: inline-block;
    padding: 10px 0;
    border: none;
    border-radius: 4px;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    flex: 1;
}

.btn-primary {
    background-color: #FF8246;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 8px rgba(255, 130, 70, 0.3);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
}

.btn-secondary:hover {
    background-color: #333333;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* ===== EMPTY STATE - Full width container with proper spacing ===== */
.empty-state {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 400px;
    background: #ffffff;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    margin: 20px 0;
}

.empty-state-content {
    text-align: center;
    padding: 40px;
    max-width: 500px;
    width: 100%;
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.empty-state h2 {
    font-size: 1.8rem;
    color: #000000;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-state p {
    font-size: 1rem;
    color: #666666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.empty-state .btn {
    display: inline-block;
    width: auto;
    min-width: 200px;
    padding: 12px 30px;
}

/* ===== MODAL STYLES ===== */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

.modal-icon {
    margin-bottom: 20px;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-title {
    font-size: 1.5rem;
    color: #000000;
    margin-bottom: 10px;
    font-weight: 600;
}

.modal-message {
    color: #666666;
    margin-bottom: 25px;
    line-height: 1.5;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 25px;
    border: none;
    border-radius: 4px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
    max-width: 130px;
    transition: all 0.3s ease;
}

.modal-btn-cancel {
    background: #000000;
    color: #ffffff;
}

.modal-btn-cancel:hover {
    background: #333333;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
}

.modal-btn-confirm:hover {
    background: #e66a2e;
}

/* ===== LOADING STATE ===== */
.loading {
    text-align: center;
    padding: 60px 20px;
    color: #666666;
    font-size: 1rem;
    width: 100%;
}

.loading::after {
    content: '...';
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 992px) {
    .content {
        margin-top: 90px;
    }
    
    .page-title-header h1 {
        font-size: 1.8rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title-header {
        margin: 15px 0 25px 0;
        padding-bottom: 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.6rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
    }
    
    .product-image-container {
        height: 160px;
    }
    
    .product-title {
        font-size: 1rem;
        min-height: 2.4rem;
    }
    
    .product-price {
        font-size: 1.2rem;
    }
    
    .empty-state {
        min-height: 350px;
    }
    
    .empty-state h2 {
        font-size: 1.6rem;
    }
    
    .modal-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .modal-btn {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .content {
        margin-top: 70px;
        padding: 0 12px;
    }
    
    .page-title-header h1 {
        font-size: 1.4rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 15px;
        max-width: 350px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .product-image-container {
        height: 180px;
    }
    
    .product-info {
        padding: 12px;
    }
    
    .product-title {
        font-size: 1rem;
        min-height: auto;
    }
    
    .empty-state-content {
        padding: 30px 20px;
    }
    
    .empty-state-icon {
        width: 60px;
        height: 60px;
    }
    
    .empty-state h2 {
        font-size: 1.4rem;
    }
    
    .empty-state p {
        font-size: 0.95rem;
    }
    
    .empty-state .btn {
        min-width: 160px;
        padding: 10px 20px;
    }
}

@media (max-width: 375px) {
    .page-title-header h1 {
        font-size: 1.3rem;
    }
    
    .product-info {
        padding: 10px;
    }
    
    .product-title {
        font-size: 0.95rem;
    }
    
    .product-price {
        font-size: 1.1rem;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-new-product.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/seller-new-product.css */
/* Revised with asset icons for slot overlays, hover preview, and improved thumbnail navigation */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e4eaf2;
    color: #000000;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.pageTitleHeader {
    font-size: 2rem;
    padding: 15px 40px;
    margin: 20px auto 40px;
    text-align: center;
    color: #1e2e2f;
    font-weight: 400;
}

/* Form container - two columns */
.seller-add-product-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

/* Form sections - both columns same height */
.form-left, .form-right {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.form-section {
    background: #f2f4f6;
    border: 1px solid #363940;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 500px;
}

.form-section:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.form-section h3 {
    font-size: 1.5rem;
    color: #1e2e2f;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #ff8246;
    flex-shrink: 0;
}

/* Left section - product details */
.form-left .form-section {
    display: flex;
    flex-direction: column;
}

.form-left .form-group:last-of-type {
    margin-bottom: 0;
}

/* Right section - images and actions */
.form-right .form-section {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* Form groups */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 20px;
    width: 100%;
    flex-shrink: 0;
}

.form-group label {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1e2e2f;
}

.form-group label::after {
    content: '';
    display: none;
}

.form-group label[for="name"]::after,
.form-group label[for="category"]::after,
.form-group label[for="price"]::after,
.form-group label[for="stock_quantity"]::after,
.form-group label[for="description"]::after {
    content: ' *';
    color: #ff8246;
    font-weight: bold;
    display: inline;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group textarea,
.form-group select {
    width: 100%;
    height: 50px;
    padding: 0 12px;
    border: 1px solid #363940;
    border-radius: 6px;
    font-size: 0.95rem;
    background-color: #ffffff;
    color: #000000;
    transition: all 0.3s ease;
}

.form-group textarea {
    height: auto;
    min-height: 120px;
    padding: 12px;
    resize: none;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: #ff8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.row-fields {
    display: flex;
    gap: 15px;
}

.half {
    flex: 1;
}

.help-text {
    font-size: 0.8rem;
    color: #666666;
    margin-bottom: 15px;
    flex-shrink: 0;
}

/* Image preview container - single box with navigation */
.image-preview-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    flex-shrink: 0;
}

/* Single preview box */
.preview-box {
    width: 100%;
    max-width: 280px;
    height: 240px;
    border: 2px solid #363940;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}

.preview-box:hover {
    border-color: #ff8246;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.2);
}

.preview-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    width: 100%;
    height: 100%;
}

.preview-placeholder img {
    width: 60px;
    height: 60px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.preview-placeholder span {
    font-size: 1rem;
    color: #000000;
    font-weight: 500;
}

.preview-image {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    border-radius: 8px;
    display: none;
    border: 1px solid #000000;
}

/* Thumbnail navigation buttons - using asset icons for empty slots */
.thumbnail-navigation {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 5px;
    width: 100%;
}

.thumbnail-image-btn {
    width: 40px;
    height: 40px;
    border: 2px solid #363940;
    border-radius: 6px;
    background-color: #ffffff;
    padding: 0;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.thumbnail-image-btn:hover {
    border-color: #ff8246;
    transform: scale(1.05);
    box-shadow: 0 2px 8px rgba(255, 130, 70, 0.3);
}

.thumbnail-image-btn.active {
    border-color: #ff8246;
    border-width: 3px;
    box-shadow: 0 0 0 2px rgba(255, 130, 70, 0.3);
}

.thumbnail-image-btn.hover {
    border-color: #ff8246;
    border-width: 3px;
    box-shadow: 0 0 0 2px rgba(255, 130, 70, 0.3);
}

/* Empty slot styling - uses package.svg icon */
.thumbnail-image-btn.empty-slot {
    background-color: #f2f4f6;
    border: 2px dashed #363940;
}

.thumbnail-image-btn.empty-slot:hover {
    border-color: #ff8246;
    border-style: solid;
}

.thumbnail-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Empty slot icon styling - orange color */
.thumbnail-image-btn.empty-slot .thumbnail-image {
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    opacity: 0.7;
}

.thumbnail-image-btn.empty-slot:hover .thumbnail-image {
    opacity: 1;
}

/* File info text */
.file-info {
    text-align: center;
    font-size: 0.9rem;
    color: #000000;
    padding: 10px;
    background: #ffffff;
    border-radius: 6px;
    border: 1px solid #363940;
    margin: 15px 0 20px 0;
    flex-shrink: 0;
}

/* Form Actions - Inside the form section at bottom */
.form-actions {
    display: flex;
    gap: 15px;
    justify-content: stretch;
    width: 100%;
    flex-shrink: 0;
    margin-top: auto;
    padding-top: 20px;
}

.btn {
    flex: 1;
    padding: 12px 0;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.5px;
    text-align: center;
}

.btn-primary {
    background-color: #ff8246;
    color: #ffffff;
}

.btn-primary:hover:not(:disabled) {
    background-color: #e8693d;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.btn-secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #000000;
}

.btn-secondary:hover {
    background-color: #333333;
}

.btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.modal-content {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeScale 0.3s ease;
}

.modal-icon img {
    width: 60px;
    height: 60px;
    margin-bottom: 20px;
    filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
}

.modal-message {
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #000000;
    white-space: pre-line;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-btn-primary {
    background: #ff8246;
    color: #ffffff;
}

.modal-btn-primary:hover {
    background: #e66a2e;
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

/* Responsive */
@media (max-width: 768px) {
    .seller-add-product-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .form-section {
        min-height: auto;
    }
    
    .preview-box {
        max-width: 250px;
        height: 220px;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .btn {
        width: 100%;
    }
    
    .thumbnail-image-btn {
        width: 36px;
        height: 36px;
    }
}

@media (max-width: 480px) {
    .row-fields {
        flex-direction: column;
        gap: 10px;
    }
    
    .half {
        width: 100%;
    }
    
    .preview-box {
        max-width: 100%;
        height: 200px;
    }
    
    .thumbnail-image-btn {
        width: 32px;
        height: 32px;
    }
    
    .form-actions {
        padding-top: 15px;
    }
    
    .thumbnail-navigation {
        gap: 5px;
    }
}

/* Disabled state styling */
.btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
```

---

## File: `Crooks-Cart-Collectives/styles/sign-in.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/sign-in.css */
/* Based on sign-up.css – simplified for sign‑in page with strict white/orange/black palette */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content {
    max-width: 1200px;
    margin: 100px auto 40px;
    padding: 0 20px;
    min-height: calc(100vh - 200px);
}

/* ===== PAGE TITLE ===== */
.pageTitleHeader {
    text-align: center;
    font-size: 2.5rem;
    color: #1e2e2f;
    margin: 110px auto 20px;
    padding-bottom: 15px;
}

/* ===== FORM CONTAINER ===== */
.signin-container {
    max-width: 450px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #000000;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* ===== FORM GROUPS ===== */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #000000;
    font-size: 0.95rem;
}

.form-group input {
    width: 100%;
    height: 50px;
    padding: 0 15px;
    border: 1px solid #363940;
    border-radius: 6px;
    font-size: 1rem;
    background-color: #ffffff;
    color: #000000;
    transition: all 0.3s ease;
}

.form-group input:focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

.form-group input.error {
    border-color: #FF8246;
}

.error-message {
    color: #FF8246;
    font-size: 0.85rem;
    margin-top: 5px;
    min-height: 20px;
}

/* ===== PASSWORD TOGGLE ===== */
.password-wrapper {
    position: relative;
    width: 100%;
}

.password-wrapper input {
    width: 100%;
    padding-right: 45px;
}

.password-toggle {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.password-toggle img {
    width: 20px;
    height: 20px;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.password-toggle:hover img {
    opacity: 1;
}

/* ===== BUTTONS ===== */
.btn {
    display: inline-block;
    padding: 14px 28px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    width: 100%;
    background: #000000;
    color: #ffffff;
}

.btn-primary {
    background: #FF8246;
    color: #ffffff;
}

.btn-secondary {
    background: #000000;
    color: #ffffff;
    border: 1px solid #363940;
}

/* ===== LINKS ===== */
.signup-link,
.forgot-password-link {
    text-align: center;
    margin-top: 20px;
    font-size: 0.95rem;
    color: #000000;
}

.signup-link a,
.forgot-password-link a {
    color: #FF8246;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.signup-link a:hover,
.forgot-password-link a:hover { 
    text-decoration: underline;
}

/* ===== NOTIFIER MODAL ===== */
.notifier {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.notifier.hidden {
    display: none;
}

.notifier-content {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px 40px;
    max-width: 400px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: slideIn 0.3s ease-out;
}

.notifier-content p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #000000;
    line-height: 1.5;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .content {
        margin-top: 80px;
    }
    
    .pageTitleHeader {
        font-size: 2rem;
    }
    
    .signin-container {
        padding: 30px 25px;
    }
}

@media (max-width: 480px) {
    .pageTitleHeader {
        font-size: 1.8rem;
    }
    
    .signin-container {
        padding: 25px 20px;
    }
    
    .btn {
        padding: 12px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/sign-out.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/logout-modal.css */

:root {
    /* Use the same variables as sign-up.css for consistency */
    --effect-box-shadow-default: 0 4px 12px rgba(0, 0, 0, 0.1);
    --effect-box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
    --effect-transition-default: all 0.3s ease;
    --effect-glow-B: 0 0 10px rgba(255, 130, 70, 0.4);
}

/* Logout Confirmation Modal - MATCHING SIGN-UP STYLE */
.logout-modal {
    position: fixed;
    inset: 0; /* top: 0; right: 0; bottom: 0; left: 0; */
    background: rgba(0, 0, 0, 0.3); /* Semi-transparent dark overlay */
    backdrop-filter: blur(5px); /* Blur effect like sign-up modal */
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.logout-modal.active {
    display: flex;
}

.logout-modal-content {
    background-color: white;
    padding: 30px 25px;
    border-radius: 12px; /* Matching sign-up border-radius */
    box-shadow: var(--effect-box-shadow-default);
    max-width: 400px;
    width: 90%;
    text-align: center;
    animation: fadeScale 0.3s ease-in-out; /* Match sign-up animation */
}

/* Animation - EXACTLY matching sign-up modal */
@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.85);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.logout-modal-icon {
    margin-bottom: 20px;
}

.logout-modal-icon svg {
    width: 70px;
    height: 70px;
    stroke: #FF8246; /* Your accent color */
    stroke-width: 1.8;
}

.logout-modal h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
    font-weight: 600;
}

.logout-modal p {
    color: #666;
    font-size: 16px;
    margin-bottom: 25px;
    line-height: 1.5;
}

.logout-modal-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.logout-modal-btn {
    padding: 12px 30px;
    border: none;
    border-radius: 8px; /* Matching sign-up input border-radius */
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--effect-transition-default);
    flex: 1;
    max-width: 150px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-cancel {
    background-color: #e0e0e0;
    color: #333;
}

.btn-cancel:hover {
    background-color: #d0d0d0;
    box-shadow: var(--effect-box-shadow-default);
}

.btn-confirm {
    background-color: #FF8246;
    color: white;
}

.btn-confirm:hover {
    background-color: #e66a2e;
    box-shadow: var(--effect-glow-B);
}

/* Responsive */
@media (max-width: 768px) {
    .logout-modal-content {
        padding: 25px 20px;
        width: 85%;
    }
    
    .logout-modal-icon svg {
        width: 60px;
        height: 60px;
    }
    
    .logout-modal h2 {
        font-size: 22px;
    }
    
    .logout-modal p {
        font-size: 15px;
        margin-bottom: 20px;
    }
    
    .logout-modal-btn {
        padding: 10px 20px;
        font-size: 15px;
    }
}

@media (max-width: 480px) {
    .logout-modal-content {
        padding: 20px 15px;
        width: 90%;
    }
    
    .logout-modal-icon svg {
        width: 50px;
        height: 50px;
    }
    
    .logout-modal h2 {
        font-size: 20px;
    }
    
    .logout-modal p {
        font-size: 14px;
        margin-bottom: 18px;
    }
    
    .logout-modal-buttons {
        flex-direction: column;
        gap: 10px;
    }
    
    .logout-modal-btn {
        max-width: 100%;
        padding: 12px;
        font-size: 14px;
    }
}
```

---

## File: `Crooks-Cart-Collectives/styles/sign-up.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/sign-up.css */

:root {
    /* Form Layout */
    --form-section-gap: 30px;
    --form-group-gap: 20px;
    --input-height: 50px;
    --border-radius: 12px;
    
    /* Effects */
    --effect-box-shadow-default: 0 4px 12px rgba(0, 0, 0, 0.1);
    --effect-box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
    --effect-transition-default: all 0.3s ease;
    --effect-glow-B: 0 0 10px rgba(255, 130, 70, 0.4);
    --effect-glow-A: 0 0 8px rgba(255, 130, 70, 0.3);
    --effect-glow-error: 0 0 10px rgba(231, 76, 60, 0.4);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    -ms-overflow-style: none;
    scrollbar-width: none;
    outline: none;
}

body {
    font-family: var(--font-family-base);
    background-color: var(--color-background-A);
    color: var(--color-text-A);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

::-webkit-scrollbar {
    display: none;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.pageTitleHeader {
    font-size: calc(15px + var(--font-size-title));
    padding: var(--size-header-padding);
    margin: 20px auto 50px;
    text-align: center;
    width: 100%;
    color: var(--color-text-C);
    font-weight: var(--font-weight-bold);
}

/* Form Container */
.signup-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--form-section-gap);
    padding: 0 20px;
    width: 100%;
    max-width: 100%;
}

/* Form Sections - Barangay Style */
.form-section {
    flex: 1;
    min-width: 300px;
    max-width: 500px;
    padding: 25px 30px;
    border-radius: var(--border-radius);
    border: 1px solid;
    margin-bottom: var(--form-section-gap);
    transition: var(--effect-transition-default);
    display: flex;
    flex-direction: column;
}

.form-section:hover {
    box-shadow: var(--effect-box-shadow-default);
}

.form-section h3 {
    font-size: 1.5rem;
    color: var(--color-text-C);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--color-accent-A);
}

/* Form Groups - Barangay Style */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px; /* Reduced from 20px */
    width: 100%;
}

.form-group label {
    font-size: var(--font-size-base);
    font-weight: 600;
    color: var(--color-text-C);
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    height: var(--input-height);
    font-size: var(--font-size-base);
    padding: 0 15px;
    border: 1px solid;
    border-radius: 8px;
    background-color: #ffffff;
    color: var(--color-text-A);
    transition: var(--effect-transition-default);
}

/* Address textarea - fixed initial size, auto-expands */
.form-group textarea#address {
    height: 100px;
    min-height: 100px;
    max-height: 300px;
    padding: 15px;
    resize: none;
    overflow-y: hidden;
    line-height: 1.5;
    transition: height 0.2s ease;
}

.form-group textarea#address.expanding {
    height: auto;
    min-height: 100px;
    overflow-y: auto;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-accent-A);
    outline: none;
}

.form-group.error input,
.form-group.error select,
.form-group.error textarea {
    border-color: #e74c3c;
}

.form-group.error label {
    color: #e74c3c;
}

/* Error Messages */
.error-message {
    color: #e74c3c;
    font-size: 0.9rem;
    margin-top: 5px;
    min-height: 20px;
}

/* Button Container - Always Stacked */
.btn-container {
    display: flex;
    flex-direction: column; /* always vertical */
    justify-content: center;
    align-items: stretch;
    gap: 12px;
    margin-top: 20px;
    margin-bottom: 5px;
    width: 100%;
}

.btn {
    padding: var(--size-button-padding);
    border: none;
    cursor: pointer;
    font-size: var(--font-size-base);
    border-radius: var(--size-button-radius);
    font-weight: var(--font-weight-bold);
    transition: var(--effect-transition-default);
    width: 100%; /* Full width when stacked */
    min-width: unset; /* Remove min-width constraint */
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-align: center;
}

.btn-primary {
    background-color: var(--color-accent-A);
    color: var(--color-text-B);
}


.btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-secondary {
    background-color: var(--color-background-C);
    border: 1px solid;
    border-color: var(--color-border-A);
    color: var(--color-text-B);
}

/* Remove extra spacing from button wrapper */
.form-section .form-group:last-of-type {
    margin-bottom: 10px;
}

/* Links Group - Better Spacing */
.links-group {
    text-align: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid var(--color-border-A);
    width: 100%;
}

.login-link,
.seller-link {
    margin: 6px 0;
    font-size: 0.95rem;
    line-height: 1.4;
    color: var(--color-text-C);
}

.login-link a,
.seller-link a {
    text-decoration: none;
    color: var(--color-accent-A);
    font-weight: var(--font-weight-bold);
    transition: var(--effect-transition-default);
    padding: 2px 8px;
    border-radius: 4px;
}

.login-link a:hover,
.seller-link a:hover {
    color: var(--color-hover-A);
    background-color: rgba(255, 130, 70, 0.1);
}

/* Notifier Modal - Barangay Style */
.notifier {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.notifier.hidden {
    display: none;
}

.notifier-content {
    background-color: var(--color-background-B);
    color: var(--color-text-A);
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: var(--effect-box-shadow-default);
    text-align: center;
    max-width: 400px;
    width: 90%;
    animation: fadeScale 0.3s ease-in-out;
}

.notifier-content p {
    font-size: 18px;
    margin-bottom: 20px;
    word-wrap: break-word;
}

@keyframes fadeScale {
    0% {
        opacity: 0;
        transform: scale(0.85);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Last Form Section (Contact & Registration) Layout Fix */
.form-section:last-child {
    padding-bottom: 25px;
}

/* Form submitted state - Barangay Style */
.signup-container.submitted .form-group:has(input:invalid),
.signup-container.submitted .form-group:has(select:invalid),
.signup-container.submitted .form-group:has(textarea:invalid) {
    animation: pulseWarning 0.5s ease-in-out;
}

@keyframes pulseWarning {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Barangay-style color themes for form sections */
.form-section {
    background-color: var(--color-background-B);
    border-color: var(--color-border-A);
}

.form-group input,
.form-group select,
.form-group textarea {
    border-color: var(--color-border-A);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-accent-A);
}

/* Responsive Design - Barangay Style Adjustments */
@media (max-width: 1024px) {
    .signup-container {
        flex-direction: column;
        align-items: center;
    }
    
    .form-section {
        width: 100%;
        max-width: 600px;
    }
}

@media (max-width: 768px) {
    .content {
        padding: 20px 15px;
    }
    
    .pageTitleHeader {
        font-size: 1.5rem;
        padding: 15px 10px;
        margin: 10px auto 30px;
    }
    
    .form-section {
        padding: 20px;
        min-width: 100%;
        margin: 0 0 10px;
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .form-section:last-child {
        padding-bottom: 20px;
    }
    
    .form-section h3 {
        font-size: 1.3rem;
    }
    
    .btn-container {
        margin-top: 15px;
        gap: 10px;
    }
    
    .btn {
        padding: 14px;
        font-size: 1rem;
    }
    
    .form-group input,
    .form-group select {
        height: 45px;
        font-size: 0.95rem;
    }
    
    .form-group textarea#address {
        height: 90px;
        min-height: 90px;
    }
    
    .links-group {
        margin-top: 12px;
        padding-top: 12px;
    }
    
    .login-link,
    .seller-link {
        font-size: 0.9rem;
        margin: 5px 0;
    }
    
    .signup-container {
        padding: 0 15px;
    }
}

@media (max-width: 480px) {
    .form-section {
        padding: 18px 15px;
    }
    
    .form-section:last-child {
        padding-bottom: 18px;
    }
    
    .btn {
        padding: 12px;
        font-size: 0.95rem;
    }
    
    .btn-container {
        gap: 8px;
        margin-top: 12px;
    }
    
    .links-group {
        margin-top: 10px;
        padding-top: 10px;
    }
    
    .login-link,
    .seller-link {
        font-size: 0.85rem;
        margin: 4px 0;
    }
}

/* Password toggle styles */
.password-wrapper {
    position: relative;
    width: 100%;
}

.password-wrapper input {
    width: 100%;
    padding-right: 45px;
}

.password-toggle {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: none;
    border: none;
    padding: 0;
    z-index: 2;
}

.password-toggle img {
    width: 20px;
    height: 20px;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.password-toggle:hover img {
    opacity: 1;
}

/* Ensure password fields have proper padding */
.form-group input[type="password"] {
    padding-right: 45px;
}
```

---

## File: `Crooks-Cart-Collectives/styles/terms-and-conditions.css`

**Status:** `FOUND`

```css
/* ============================================
   TERMS AND CONDITIONS PAGE STYLES
   Class naming convention: BEM (Block Element Modifier)
   Block: terms-page, terms-hero, terms-intro, terms-section, terms-agreement
============================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.terms-page {
    max-width: 1000px;
    margin: 100px auto 40px;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.terms-hero {
    margin-top: 100px;
    width: 100%;
    padding: 60px 20px;
    text-align: center;
    background: white;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-hero__container {
    max-width: 800px;
    margin: 0 auto;
}

.terms-hero__title {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.terms-hero__highlight {
    color: #ff8246;
}

.terms-hero__subtitle {
    font-size: clamp(1rem, 3vw, 1.3rem);
    color: #666;
}

/* ===== INTRO SECTION ===== */
.terms-intro {
    margin-bottom: 40px;
}

.terms-intro__card {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-intro__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 15px;
}

.terms-intro__effective-date {
    font-size: 0.95rem;
    color: #ff8246;
    font-weight: 500;
    margin-bottom: 0;
}

/* ===== TERMS SECTIONS ===== */
.terms-sections {
    width: 100%;
}

.terms-section {
    background: white;
    border-radius: 10px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.terms-section__header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.terms-section__accent {
    width: 4px;
    height: 30px;
    background-color: #ff8246;
    margin-right: 15px;
    border-radius: 2px;
}

.terms-section__title {
    font-size: 1.5rem;
    color: #333;
    margin: 0;
    font-weight: 600;
}

.terms-section__body {
    padding-left: 19px;
}

.terms-section__body p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.terms-section__list {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}

.terms-section__list-item {
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

.terms-section__list-item::before {
    content: "•";
    color: #ff8246;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.terms-section__important {
    background-color: #fff3e0;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #ff8246;
    margin-bottom: 15px;
}

/* Contact Details */
.terms-contact {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 15px 0;
    font-style: normal;
}

.terms-contact__item {
    margin-bottom: 8px;
}

.terms-contact__item:last-child {
    margin-bottom: 0;
}

/* ===== AGREEMENT SECTION ===== */
.terms-agreement {
    margin-top: 40px;
}

.terms-agreement__box {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    text-align: center;
}

.terms-agreement__text {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.terms-agreement__actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.terms-agreement__btn {
    display: inline-block;
    padding: 12px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.terms-agreement__btn--primary {
    background-color: #ff8246;
    color: white;
}

.terms-agreement__btn--primary:hover {
    background-color: #e66a2e;
    box-shadow: 0 4px 12px rgba(255, 130, 70, 0.3);
}

.terms-agreement__btn--secondary {
    background-color: #000000;
    color: #ffffff;
    border: 1px solid #ddd;
}

.terms-agreement__btn--secondary:hover {
    background-color: #000000;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .terms-page {
        margin-top: 80px;
    }
    
    .terms-hero {
        padding: 40px 20px;
    }
    
    .terms-section__title {
        font-size: 1.3rem;
    }
    
    .terms-section {
        padding: 25px 20px;
    }
    
    .terms-section__body {
        padding-left: 14px;
    }
    
    .terms-agreement__box {
        padding: 30px 20px;
    }
    
    .terms-agreement__actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .terms-agreement__btn {
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
    .terms-hero {
        padding: 30px 15px;
    }
    
    .terms-hero__title {
        font-size: 2rem;
    }
    
    .terms-intro__card {
        padding: 20px;
    }
    
    .terms-intro__text {
        font-size: 1rem;
    }
    
    .terms-section__title {
        font-size: 1.2rem;
    }
    
    .terms-section__accent {
        height: 25px;
    }
    
    .terms-section {
        padding: 20px 15px;
    }
    
    .terms-section__body {
        padding-left: 9px;
    }
    
    .terms-section__body p,
    .terms-section__list-item {
        font-size: 0.95rem;
    }
    
    .terms-agreement__box {
        padding: 25px 15px;
    }
    
    .terms-agreement__text {
        font-size: 1rem;
    }
}
```

---

