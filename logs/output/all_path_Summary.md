# Web Project: Crooks-Cart-Collectives

**Preset:** all_path

**Generated:** 2026-03-03 04:22:25

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
**Generated:** 2026-03-03 04:22:10
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
├── Crooks-Data-Storage/
│   └── administrators/
│       └── 2/
│           └── profile/
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
│   │   ├── all_path.py
│   │   ├── linux-path.py
│   │   └── windows-preset.py
│   ├── output/
│   │   ├── admin_path_Summary.md
│   │   ├── all_path_Summary.md
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
| PHP Files | 59 |
| CSS Files | 35 |
| JavaScript Files | 27 |
| JSON Files | 0 |
| Text/Markdown | 8 |
| Image Files | 120 |
| Other Files | 14 |

**Total Directories:** 29
**Total Files:** 262

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

## File: `Crooks-Cart-Collectives/database/schema/dbCreation.sql`

**Status:** `FOUND`

```sql
-- =====================================================
-- DATABASE: crooks_cart_collectives
-- REVISED SCHEMA - Following the requested changes
-- =====================================================
CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;
USE crooks_cart_collectives;

-- =====================================================
-- USERS TABLE
-- =====================================================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    birthdate DATE,
    gender ENUM('Male', 'Female', 'Other'),
    contact_number VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    profile_picture VARCHAR(255),
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- ADMINISTRATORS TABLE (REVISED with profile_picture)
-- =====================================================
CREATE TABLE administrators (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contact_number VARCHAR(15),
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),  -- Added profile_picture field
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- CUSTOMERS TABLE
-- =====================================================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

-- =====================================================
-- SELLERS TABLE
-- =====================================================
CREATE TABLE sellers (
    seller_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    business_name VARCHAR(100),
    identity_path VARCHAR(255),       -- path to formal picture
    id_document_path VARCHAR(255),    -- path to valid ID document
    is_verified BOOLEAN DEFAULT FALSE,
    verification_date TIMESTAMP NULL,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rating DECIMAL(3, 2) DEFAULT 0.00,
    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

-- =====================================================
-- PRODUCTS TABLE
-- =====================================================
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock_quantity INT DEFAULT 0,
    media_path VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (seller_id)
        REFERENCES sellers(seller_id)
        ON DELETE CASCADE
);

-- =====================================================
-- CARTS TABLE
-- =====================================================
CREATE TABLE carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    seller_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    price DECIMAL(10, 2) NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    
    UNIQUE KEY unique_cart_item (customer_id, product_id),
    INDEX idx_customer_cart (customer_id, added_at)
);

-- =====================================================
-- ORDERS TABLE
-- =====================================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    seller_id INT NOT NULL,
    product_id INT NOT NULL,
    
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) GENERATED ALWAYS AS (quantity * price) STORED,
    
    shipping_address VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL DEFAULT 'Cash on Delivery',
    
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'delivered', 'cancelled') DEFAULT 'pending',
    
    cancelled_by ENUM('customer', 'seller') NULL,
    delivered_at TIMESTAMP NULL,
    cancelled_at TIMESTAMP NULL,
    
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    
    INDEX idx_customer_orders (customer_id, status, order_date),
    INDEX idx_seller_orders (seller_id, status, order_date)
);

-- =====================================================
-- PRODUCT REVIEWS TABLE
-- =====================================================
CREATE TABLE product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    order_id INT NOT NULL UNIQUE,
    rating TINYINT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    INDEX idx_product_reviews (product_id, rating),
    INDEX idx_user_reviews (user_id)
);

-- =====================================================
-- SELLER REPORTS TABLE
-- =====================================================
CREATE TABLE seller_reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    reporter_id INT NOT NULL,
    seller_id INT NOT NULL,
    reason VARCHAR(100) NOT NULL,
    details TEXT NOT NULL,
    status ENUM('pending', 'investigating', 'resolved', 'dismissed') DEFAULT 'pending',
    admin_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (reporter_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    
    INDEX idx_reports_seller_status (seller_id, status),
    INDEX idx_reports_reporter (reporter_id)
);

-- =====================================================
-- INDEXES for Performance
-- =====================================================
CREATE INDEX idx_carts_customer ON carts(customer_id);
CREATE INDEX idx_orders_customer_status ON orders(customer_id, status, order_date);
CREATE INDEX idx_orders_seller_status ON orders(seller_id, status, order_date);

-- =====================================================
-- VIEWS for Easy Data Access
-- =====================================================

-- Customer cart view
CREATE VIEW customer_cart AS
SELECT 
    c.*,
    p.name AS product_name,
    p.media_path AS product_media,
    p.stock_quantity AS available_stock,
    s.business_name AS seller_name
FROM carts c
JOIN products p ON c.product_id = p.product_id
JOIN sellers s ON c.seller_id = s.seller_id
ORDER BY c.added_at DESC;

-- Customer orders view
CREATE VIEW customer_orders AS
SELECT 
    o.*,
    p.name AS product_name,
    p.media_path AS product_media,
    s.business_name AS seller_name,
    u.first_name,
    u.last_name,
    u.email,
    u.contact_number,
    (SELECT COUNT(*) FROM product_reviews pr WHERE pr.order_id = o.order_id) as has_review
FROM orders o
JOIN products p ON o.product_id = p.product_id
JOIN sellers s ON o.seller_id = s.seller_id
JOIN customers cu ON o.customer_id = cu.customer_id
JOIN users u ON cu.user_id = u.user_id
ORDER BY o.order_date DESC;

-- Seller orders view
CREATE VIEW seller_orders_view AS
SELECT 
    o.*,
    p.name AS product_name,
    p.media_path AS product_media,
    u.first_name,
    u.last_name,
    u.email,
    u.contact_number
FROM orders o
JOIN products p ON o.product_id = p.product_id
JOIN customers cu ON o.customer_id = cu.customer_id
JOIN users u ON cu.user_id = u.user_id
ORDER BY o.order_date DESC;
```

---

## File: `Crooks-Cart-Collectives/database/schema/dummyAdmin.sql`

**Status:** `FOUND`

```sql
USE crooks_cart_collectives;

-- =========================
-- INSERT ADMIN USERS
-- =========================

INSERT INTO administrators (
    first_name, 
    last_name, 
    email, 
    contact_number, 
    username, 
    password,
    profile_picture,
    date_joined
) VALUES
(
    'Admin', 
    'One', 
    'admin1@crookscart.com', 
    '+639123456789', 
    'admin1', 
    'admin123',
    NULL,
    NOW()
),
(
    'Admin', 
    'Two', 
    'admin2@crookscart.com', 
    '+639987654321', 
    'admin2', 
    'admin456',
    NULL,
    NOW()
);
```

---

## File: `Crooks-Cart-Collectives/database/schema/dummySeller.sql`

**Status:** `FOUND`

```sql
USE crooks_cart_collectives;

-- =========================
-- INSERT 5 SELLER USERS WITH CONTACT NUMBERS
-- =========================

INSERT INTO users (
first_name, last_name, email, username, password, address, contact_number
) VALUES
('Aling', 'Bebang', 'aling.bebang@Sellerdummy.com', 'alingbebang', '123', '123 Market Ave., Purok 5, Tambakan 2, Brgy. San Miguel, Pasig City', '09090909090'),
('Totoy', 'Bibo', 'totoy.bibo@Sellerdummy.com', 'totoybibo', '123', '45 Mabini St., Purok 3, Brgy. Guadalupe, Cebu City', '09000000001'),
('El', 'Bimbo', 'el.bimbo@Sellerdummy.com', 'thelastelbimby', '123', '78 Rizal Ave., Purok 7, Brgy. Buhangin, Davao City', '09111111111'),
('Pure', 'Foods', 'pure.foods@Sellerdummy.com', 'hotdog', '123', '22 Session Rd., Purok 12, Brgy. Aurora Hill, Baguio City', '09222222222'),
('Lebron', 'James', 'lebron.james@Sellerdummy.com', 'ninja', '123', '15 Delgado St., Purok 2, Brgy. Jaro, Iloilo City', '09333333333');

-- =========================
-- MAKE THEM SELLERS (UPDATED with identity_path and id_document_path)
-- =========================

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified)
SELECT user_id, 'Aling Bebang''s Tiangge', NULL, NULL, TRUE FROM users WHERE username = 'alingbebang';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified)
SELECT user_id, 'Totoy Bibo Bargains', NULL, NULL, TRUE FROM users WHERE username = 'totoybibo';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified)
SELECT user_id, 'El Bimbo''s Ukay-Ukay', NULL, NULL, TRUE FROM users WHERE username = 'thelastelbimby';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified)
SELECT user_id, 'Pure Foods Paninda', NULL, NULL, TRUE FROM users WHERE username = 'hotdog';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified)
SELECT user_id, 'Ninja''s Hidden Treasures', NULL, NULL, TRUE FROM users WHERE username = 'ninja';

-- =========================
-- INSERT 2 PRODUCTS PER SELLER WITH BUDGET PRICES
-- =========================

-- ALING BEBANG - Budget items
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Second Hand Cellphone', 'Lumang cellphone pero gumagana pa - good for kids', 350.00, 'budget', 8,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'alingbebang';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Used School Bag', 'Medyo luma pero matibay pa', 120.00, 'cheap', 15,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'alingbebang';

-- TOTOY BIBO - Cheap items
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Lumang T-shirt Bundle', '3 pcs used shirts - iba-ibang sizes', 150.00, 'cheap', 20,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'totoybibo';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Second Hand Sapatos', 'Gently used rubber shoes', 250.00, 'second hand', 12,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'totoybibo';

-- EL BIMBO - Second hand items
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Ukay Jacket', 'Winter jacket from Korea', 180.00, 'second hand', 10,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'thelastelbimby';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Vintage Maong Pants', 'Maong pants - straight cut', 120.00, 'cheap', 18,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'thelastelbimby';

-- PURE FOODS (HOTDOG) - Budget food items
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Tuyo (Dried Fish)', 'Isang kilo - perfect for breakfast', 80.00, 'budget', 25,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'hotdog';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Itlog na Maalat', 'Maalat na itlog with kamatis', 15.00, 'cheap', 50,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'hotdog';

-- LEBRON JAMES (NINJA) - Second hand gadgets
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Used Nokia Phone', 'Lumang Nokia - 3310 style', 200.00, 'second hand', 6,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'ninja';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Second Hand Charger', 'Universal charger - gumagana pa', 50.00, 'budget', 30,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'ninja';
```

---

## File: `Crooks-Cart-Collectives/database/schema/dummyUser.sql`

**Status:** `FOUND`

```sql
USE crooks_cart_collectives;

-- =========================
-- INSERT 5 REGULAR USERS
-- =========================

INSERT INTO users (
    first_name, last_name, email, username, password, address
) VALUES
('Juan', 'Dela Cruz', 'juan.delacruz@email.com', 'juandelacruz', 'password123', '123 Rizal St., Barangay Poblacion, Makati City'),
('Maria', 'Santos', 'maria.santos@email.com', 'mariasantos', 'password123', '456 Mabini St., Barangay San Jose, Quezon City'),
('Jose', 'Reyes', 'jose.reyes@email.com', 'josereyes', 'password123', '789 Bonifacio Ave., Barangay San Juan, Manila'),
('Ana', 'Gonzales', 'ana.gonzales@email.com', 'anagonzales', 'password123', '321 Luna St., Barangay San Pedro, Pasig City'),
('Pedro', 'Villanueva', 'pedro.villanueva@email.com', 'pedrovillanueva', 'password123', '654 Aguinaldo St., Barangay San Roque, Caloocan City');

-- =========================
-- MAKE THEM CUSTOMERS
-- =========================

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'juandelacruz';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'mariasantos';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'josereyes';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'anagonzales';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'pedrovillanueva';
```

---

## File: `Crooks-Cart-Collectives/admin/admin-index.php`

**Status:** `FOUND`

```php
<?php
// Redirect to admin sign-in page
header('Location: pages/admin-sign-in.php');
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-auth-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Authentication Handler
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

// Allow GET requests for fetching sellers
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    // For POST requests
    $action = $_POST['action'] ?? '';
}

// Check if admin is logged in for all actions except maybe public ones
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

// Get all sellers with their verification status
if ($action === 'get_all_sellers') {
    try {
        // First check if sellers table exists and has data
        $checkTable = $connection->query("SHOW TABLES LIKE 'sellers'");
        if ($checkTable->rowCount() == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'Sellers table does not exist']);
            exit;
        }
        
        // Check if there are any sellers
        $countStmt = $connection->query("SELECT COUNT(*) as count FROM sellers");
        $count = $countStmt->fetch()['count'];
        
        if ($count == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'No sellers found']);
            exit;
        }
        
        // Get all sellers with user information
        $stmt = $connection->prepare("
            SELECT 
                s.seller_id, 
                s.business_name, 
                s.created_at, 
                s.is_verified,
                s.verified_at,
                u.user_id,
                u.first_name, 
                u.last_name, 
                u.email, 
                u.contact_number
            FROM sellers s
            LEFT JOIN users u ON s.user_id = u.user_id
            ORDER BY 
                CASE 
                    WHEN s.is_verified = 0 THEN 1
                    WHEN s.is_verified = 1 THEN 2
                    WHEN s.is_verified = 2 THEN 3
                    ELSE 4
                END,
                s.created_at DESC
        ");
        $stmt->execute();
        $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the data for display
        foreach ($sellers as &$seller) {
            // Ensure is_verified is treated as integer
            $seller['is_verified'] = (int)$seller['is_verified'];
            // Handle null business_name
            $seller['business_name'] = $seller['business_name'] ?? 'No Business Name';
            // Handle null user data
            $seller['first_name'] = $seller['first_name'] ?? 'Unknown';
            $seller['last_name'] = $seller['last_name'] ?? 'User';
            $seller['email'] = $seller['email'] ?? 'No email';
            $seller['contact_number'] = $seller['contact_number'] ?? 'No contact';
        }
        
        echo json_encode([
            'status' => 'success', 
            'data' => $sellers,
            'count' => count($sellers)
        ]);
        
    } catch (PDOException $e) {
        error_log("Error fetching sellers: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Get statistics for dashboard
if ($action === 'get_stats') {
    try {
        $stats = [];
        
        // Count pending verifications
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
        $stmt->execute();
        $stats['pending_verifications'] = $stmt->fetch()['count'];
        
        // Count verified sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 1");
        $stmt->execute();
        $stats['verified_sellers'] = $stmt->fetch()['count'];
        
        // Count rejected sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 2");
        $stmt->execute();
        $stats['rejected_sellers'] = $stmt->fetch()['count'];
        
        // Total sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
        $stmt->execute();
        $stats['total_sellers'] = $stmt->fetch()['count'];
        
        echo json_encode(['status' => 'success', 'data' => $stats]);
        
    } catch (PDOException $e) {
        error_log("Error fetching stats: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// Seller verification (POST only)
if ($action === 'verify' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 1, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller verified successfully']);
    } catch (PDOException $e) {
        error_log("Verify error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

if ($action === 'reject' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 2, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller rejected']);
    } catch (PDOException $e) {
        error_log("Reject error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// If no valid action was found
echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-data-storage-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin data storage handler - for serving and saving admin files outside web root
// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Configuration - Store in external directory like customer/seller data
define('ADMIN_STORAGE_PATH', dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/');

// Create base directory if it doesn't exist
if (!is_dir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/')) {
    mkdir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/', 0755, true);
}
if (!is_dir(ADMIN_STORAGE_PATH)) {
    mkdir(ADMIN_STORAGE_PATH, 0755, true);
}

/**
 * Serve admin files (profile pictures) with proper security and authentication
 * @param string $path Relative path within administrators storage
 */
function serveAdminFile($path) {
    error_log("Admin storage: Serving file: " . $path);
    
    // ===== CRITICAL: Authentication check =====
    if (!isset($_SESSION['admin_id'])) {
        error_log("Admin storage: Unauthorized access attempt to: " . $path);
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
        exit;
    }
    
    // Security: ensure path is within administrators directory and prevent directory traversal
    $path = str_replace(['../', '..\\', './', '.\\'], '', $path);
    
    $fullPath = ADMIN_STORAGE_PATH . $path;
    error_log("Admin storage: Full path: " . $fullPath);
    
    // Check if file exists
    if (!file_exists($fullPath)) {
        error_log("Admin storage: File not found: " . $fullPath);
        http_response_code(404);
        exit;
    }
    
    // Get file extension and set appropriate mime type
    $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp'
    ];
    
    $mime = $mimeTypes[$ext] ?? 'application/octet-stream';
    
    // Set caching headers
    header('Content-Type: ' . $mime);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // 24 hours cache
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
    
    // Output file
    readfile($fullPath);
    exit;
}

/**
 * Save admin profile picture to storage outside web root
 * @param int $admin_id Admin ID
 * @param array $file Uploaded file data from $_FILES
 * @return array Result with success status and path/message
 */
function saveAdminProfilePicture($admin_id, $file) {
    error_log("Admin storage: Saving profile picture for admin: " . $admin_id);
    
    // Authentication check
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        error_log("Admin storage: Authentication mismatch for admin: " . $admin_id);
        return [
            'success' => false,
            'message' => 'Authentication required'
        ];
    }
    
    $targetDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    error_log("Admin storage: Target directory: " . $targetDir);
    
    // Create directory if it doesn't exist
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Admin storage: Failed to create directory: " . $targetDir);
            return [
                'success' => false,
                'message' => 'Failed to create upload directory.'
            ];
        }
    }
    
    // Validate file
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    // Verify file type using finfo for security
    if (!file_exists($file['tmp_name'])) {
        error_log("Admin storage: Temporary file does not exist");
        return [
            'success' => false,
            'message' => 'Upload failed: Temporary file not found.'
        ];
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($detectedType, $allowedTypes)) {
        error_log("Admin storage: Invalid file type: " . $detectedType);
        return [
            'success' => false,
            'message' => 'Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.'
        ];
    }
    
    if ($file['size'] > $maxSize) {
        error_log("Admin storage: File too large: " . $file['size']);
        return [
            'success' => false,
            'message' => 'File size must be less than 2MB.'
        ];
    }
    
    // Validate upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize directive.',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive.',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.'
        ];
        $errorMsg = $uploadErrors[$file['error']] ?? 'Unknown upload error.';
        error_log("Admin storage: Upload error: " . $errorMsg);
        return [
            'success' => false,
            'message' => 'Upload failed: ' . $errorMsg
        ];
    }
    
    // Delete any existing profile picture files for this admin
    $existingFiles = glob($targetDir . 'profile.*');
    foreach ($existingFiles as $existingFile) {
        if (is_file($existingFile)) {
            unlink($existingFile);
            error_log("Admin storage: Deleted existing file: " . $existingFile);
        }
    }
    
    // Get original extension from detected type
    $ext = '';
    switch ($detectedType) {
        case 'image/jpeg':
            $ext = 'jpg';
            break;
        case 'image/png':
            $ext = 'png';
            break;
        case 'image/gif':
            $ext = 'gif';
            break;
        case 'image/webp':
            $ext = 'webp';
            break;
        default:
            $ext = 'jpg';
    }
    
    // Fixed filename: profile.extension (like customer side)
    $filename = 'profile.' . $ext;
    $targetPath = $targetDir . $filename;
    
    error_log("Admin storage: Target path: " . $targetPath);
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Set proper permissions
        chmod($targetPath, 0644);
        error_log("Admin storage: File saved successfully: " . $targetPath);
        
        // Return relative path for database storage (relative to storage root)
        return [
            'success' => true,
            'path' => 'administrators/' . $admin_id . '/profile/' . $filename
        ];
    }
    
    error_log("Admin storage: Failed to move uploaded file to " . $targetPath);
    return [
        'success' => false,
        'message' => 'Failed to save uploaded file.'
    ];
}

/**
 * Delete old profile pictures for an admin
 * @param int $admin_id Admin ID
 */
function cleanupOldAdminProfilePictures($admin_id) {
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        return;
    }
    
    $profileDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    
    if (!is_dir($profileDir)) {
        return;
    }
    
    // Find all profile files for this admin
    $oldFiles = glob($profileDir . 'profile.*');
    
    foreach ($oldFiles as $file) {
        if (is_file($file)) {
            unlink($file);
            error_log("Admin storage: Cleaned up file: " . $file);
        }
    }
}

// Check if the function already exists before declaring it
if (!function_exists('getAdminProfilePictureUrl')) {
    /**
     * Get admin profile picture URL via data storage handler
     * @param string $path Storage path
     * @return string URL to serve the file
     */
    function getAdminProfilePictureUrl($path) {
        if (empty($path)) {
            return '../assets/image/icons/user-profile-circle.svg';
        }
        
        // URL encode the path to handle special characters
        $encodedPath = urlencode($path);
        
        // Return URL to this handler with serve action
        return '../database/admin-data-storage-handler.php?action=serve&path=' . $encodedPath;
    }
}

// Handle requests
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === 'serve' && isset($_GET['path'])) {
        serveAdminFile($_GET['path']);
        exit;
    }
}

// Handle file upload via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'upload') {
    header('Content-Type: application/json');
    
    if (!isset($_SESSION['admin_id'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit;
    }
    
    $admin_id = $_SESSION['admin_id'];
    $file = $_FILES['profile_picture'] ?? null;
    
    if (!$file) {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
        exit;
    }
    
    $result = saveAdminProfilePicture($admin_id, $file);
    
    if ($result['success']) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile picture uploaded successfully',
            'path' => $result['path']
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => $result['message']
        ]);
    }
    exit;
}

// If no valid action, output 404 instead of 400 to avoid confusion
http_response_code(404);
echo 'Not found';
exit;
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-database-connect.php`

**Status:** `FOUND`

```php
<?php
// Add these lines at the beginning
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Database configuration
$host = 'localhost';
$dbName = 'crooks_cart_collectives';
$username = 'root';
$password = '';

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbName;charset=utf8mb4", 
        $username, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false
        ]
    );
} catch (PDOException $error) {
    // Log the detailed error
    error_log("Database connection failed: " . $error->getMessage());
    error_log("Connection details - Host: $host, Database: $dbName, Username: $username");
    
    // Check for specific connection errors
    if ($error->getCode() == 2002) {
        error_log("MySQL server is not running or cannot be reached. Please start MySQL service.");
    }
    
    // For API requests, return JSON error
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
        header('Content-Type: application/json');
        die(json_encode([
            'status' => 'error', 
            'message' => 'Service temporarily unavailable. Please try again later.'
        ]));
    }
    
    // For regular page loads, show user-friendly message
    die("
        <!DOCTYPE html>
        <html>
        <head>
            <title>Service Temporarily Unavailable</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
                .error-container { max-width: 600px; margin: 0 auto; }
                h1 { color: #FF8246; }
                p { color: #666; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>Oops! Something went wrong.</h1>
                <p>We're experiencing technical difficulties. Please try again later.</p>
                <p><a href='../admin-index.php'>Return to Admin Panel</a></p>
            </div>
        </body>
        </html>
    ");
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-logs-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Logs Handler - for monitoring database activities
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'debug_columns') {
    // Debug function to check table columns
    $tables = ['users', 'sellers', 'products', 'orders', 'administrators'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $result[$table] = $columns;
        } catch (PDOException $e) {
            $result[$table] = 'Error: ' . $e->getMessage();
        }
    }
    
    echo json_encode(['status' => 'success', 'data' => $result]);
    exit;
}

if ($action === 'get_logs') {
    $type = $_GET['type'] ?? 'all';
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
    
    try {
        $logs = [];
        
        // First, let's get the actual column names by fetching a sample row
        $columnInfo = getTableColumns($connection);
        
        if ($type === 'all' || $type === 'user_login') {
            if (isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['users'], ['date_created', 'created_at', 'registration_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'user_registration' as log_type, user_id, 
                               CONCAT(first_name, ' ', last_name) as user_name,
                               email, 'User' as role,
                               $dateColumn as timestamp
                        FROM users
                        ORDER BY $dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $userLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $userLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'seller_application') {
            if (isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['sellers'], ['created_at', 'date_created', 'application_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'seller_application' as log_type, s.seller_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown User') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Seller Applicant' as role,
                               s.$dateColumn as timestamp
                        FROM sellers s
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY s.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $sellerLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $sellerLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'product_added') {
            if (isset($columnInfo['products']) && isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['products'], ['date_added', 'created_at', 'added_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'product_added' as log_type, p.product_id, p.name as product_name,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Seller') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Product' as role,
                               p.$dateColumn as timestamp
                        FROM products p
                        LEFT JOIN sellers s ON p.seller_id = s.seller_id
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY p.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $productLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $productLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'order_placed') {
            if (isset($columnInfo['orders']) && isset($columnInfo['products']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['orders'], ['order_date', 'created_at', 'date_ordered']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'order_placed' as log_type, o.order_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Customer') as user_name,
                               COALESCE(p.name, 'Unknown Product') as product_name, 
                               o.quantity, 'Order' as role,
                               o.$dateColumn as timestamp
                        FROM orders o
                        LEFT JOIN products p ON o.product_id = p.product_id
                        LEFT JOIN users u ON o.customer_id = u.user_id
                        ORDER BY o.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $orderLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $orderLogs);
                }
            }
        }
        
        // Sort logs by timestamp
        if (count($logs) > 1) {
            usort($logs, function($a, $b) {
                return strtotime($b['timestamp']) - strtotime($a['timestamp']);
            });
        }
        
        $logs = array_slice($logs, 0, $limit);
        
        if (empty($logs)) {
            echo json_encode([
                'status' => 'success', 
                'data' => [], 
                'message' => 'No logs found in the database.'
            ]);
        } else {
            echo json_encode(['status' => 'success', 'data' => $logs]);
        }
        
    } catch (PDOException $e) {
        error_log("Logs fetch error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Helper function to get table columns
function getTableColumns($connection) {
    $tables = ['users', 'sellers', 'products', 'orders'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $result[$table] = $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            $result[$table] = [];
        }
    }
    
    return $result;
}

// Helper function to find the correct date column
function getDateColumn($columns, $possibleNames) {
    foreach ($possibleNames as $name) {
        if (in_array($name, $columns)) {
            return $name;
        }
    }
    return null;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-profile-handler.php`

**Status:** `FOUND`

```php
//fix
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-reports-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action === 'resolve' && isset($_POST['report_id'])) {
    $report_id = (int)$_POST['report_id'];
    $notes = trim($_POST['notes'] ?? '');
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$notes, $report_id]);
        echo json_encode(['status' => 'success', 'message' => 'Report resolved']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-in-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign In Handler
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signin') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleAdminSignin();

function handleAdminSignin() {
    global $connection;
    
    error_log("Admin signin attempt for identifier: " . ($_POST['identifier'] ?? ''));
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    try {
        // Check for admin
        $stmt = $connection->prepare("
            SELECT admin_id, first_name, last_name, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$admin) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Verify password
        if (!password_verify($password, $admin['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Set session variables
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_first_name'] = $admin['first_name'];
        $_SESSION['admin_last_name'] = $admin['last_name'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['is_admin'] = true;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => '../pages/admin-dashboard.php'
        ]);
        
    } catch (PDOException $e) {
        error_log("Admin signin error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-out-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Out Handler
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    
    // Remove /database/admin-sign-out-handler.php from the path
    $basePath = dirname(dirname($scriptName));
    
    return $protocol . $host . $basePath . '/';
}

$baseUrl = getBaseUrl();

// Start session to check if admin is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if this is an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// If already logged out, just return success
if (!isset($_SESSION['admin_id'])) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Already logged out',
            'redirect' => $baseUrl . 'pages/admin-sign-in.php'
        ]);
        exit;
    }
    header("Location: " . $baseUrl . "pages/admin-sign-in.php");
    exit;
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Return success for AJAX
if ($isAjax) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
        'redirect' => $baseUrl . 'pages/admin-sign-in.php'
    ]);
    exit;
}

// Regular request - redirect
header("Location: " . $baseUrl . "pages/admin-sign-in.php");
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-up-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

// ===== ADD THIS TEST ENDPOINT =====
if (isset($_GET['ping'])) {
    echo json_encode([
        'status' => 'ok', 
        'message' => 'Signup handler is reachable',
        'time' => date('Y-m-d H:i:s'),
        'session' => isset($_SESSION['admin_id']) ? 'active' : 'inactive'
    ]);
    exit;
}
// ===== END TEST ENDPOINT =====

// Allow testing
if (isset($_GET['test'])) {
    echo json_encode(['status' => 'test', 'message' => 'Signup handler is accessible']);
    exit;
}

// Allow testing
if (isset($_GET['test'])) {
    echo json_encode(['status' => 'test', 'message' => 'Signup handler is accessible']);
    exit;
}

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);
    exit;
}

// Get and validate data
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact = trim($_POST['contact_number'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Check required fields
if (empty($first_name) || empty($last_name) || empty($email) || empty($contact) || empty($username) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'missing-field']);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
    exit;
}

// Validate password
if (strlen($password) < 8) {
    echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
    exit;
}
if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
    echo json_encode(['status' => 'error', 'message' => 'password-needs-mixed-case']);
    exit;
}
if (!preg_match('/[0-9]/', $password)) {
    echo json_encode(['status' => 'error', 'message' => 'password-needs-number']);
    exit;
}
if ($password !== $confirm) {
    echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
    exit;
}

// Validate username
if (strlen($username) < 3 || strlen($username) > 20) {
    echo json_encode(['status' => 'error', 'message' => 'username-length']);
    exit;
}
if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    echo json_encode(['status' => 'error', 'message' => 'username-invalid-chars']);
    exit;
}

// Format phone
$phone = preg_replace('/[^0-9]/', '', $contact);
if (strlen($phone) === 10 && $phone[0] === '9') {
    $phone = '0' . $phone;
} elseif (strlen($phone) === 12 && substr($phone, 0, 2) === '63') {
    $phone = '0' . substr($phone, 2);
} elseif (strlen($phone) === 12 && substr($phone, 0, 3) === '639') {
    $phone = '0' . substr($phone, 2);
}

if (!preg_match('/^09\d{9}$/', $phone)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
    exit;
}

try {
    // Check duplicates
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE contact_number = ?");
    $stmt->execute([$phone]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // Create admin
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $connection->prepare("INSERT INTO administrators (first_name, last_name, email, contact_number, username, password, date_joined) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$first_name, $last_name, $email, $phone, $username, $hashed]);
    
    // Create storage directory
    $admin_id = $connection->lastInsertId();
    $storage_dir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/' . $admin_id . '/profile/';
    if (!is_dir($storage_dir)) {
        mkdir($storage_dir, 0755, true);
    }
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Admin account created successfully!',
        'redirect' => 'admin-sign-in.php'
    ]);
    
} catch (Exception $e) {
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/validation.php`

**Status:** `FOUND`

```php
<?php
// Validation functions for admin authentication

function validateAdminSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'contact_number', 'username', 'password', 'confirm_password'];
    
    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    if (!empty($errors)) {
        return ['valid' => false, 'errors' => $errors];
    }
    
    // Email validation
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    // Password validation
    $password = $data['password'];
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (strlen($password) > 16) {
        $errors['password'] = 'Password must not exceed 16 characters';
    }
    
    // Password match
    if ($password !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // Username validation
    $username = trim($data['username']);
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Username must be 3-20 characters (letters, numbers, underscore)';
    }
    
    // Phone validation (Philippine format)
    $phone = preg_replace('/[^0-9]/', '', $data['contact_number']);
    if (!preg_match('/^09\d{9}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number (must start with 09 and be 11 digits)';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateAdminSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? '');
    $password = $data['password'] ?? '';
    
    if (empty($identifier)) {
        $errors['identifier'] = 'Email or username is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'identifier' => $identifier,
        'password' => $password
    ];
}

function checkAdminDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return $phone;
    } elseif (preg_match('/^63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    }
    
    return $phone;
}

function logAdminError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-dashboard.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

$adminId = $_SESSION['admin_id'];

// Fetch admin name
try {
    $stmt = $connection->prepare("SELECT first_name FROM administrators WHERE admin_id = ?");
    $stmt->execute([$adminId]);
    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstName = $adminData['first_name'] ?? 'Admin';
} catch (PDOException $e) {
    error_log("Error fetching admin: " . $e->getMessage());
    $firstName = "Admin";
}

// Fetch stats for dashboard
$stats = [];
try {
    // Pending seller verifications
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
    $stmt->execute();
    $stats['pending_verifications'] = $stmt->fetch()['count'];
    
    // Total users
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM users");
    $stmt->execute();
    $stats['total_users'] = $stmt->fetch()['count'];
    
    // Total sellers
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
    $stmt->execute();
    $stats['total_sellers'] = $stmt->fetch()['count'];
    
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM products");
    $stmt->execute();
    $stats['total_products'] = $stmt->fetch()['count'];
    
    // Total orders
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM orders");
    $stmt->execute();
    $stats['total_orders'] = $stmt->fetch()['count'];
    
    // Pending reports
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM seller_reports WHERE status = 'pending'");
    $stmt->execute();
    $stats['pending_reports'] = $stmt->fetch()['count'];
    
} catch (PDOException $e) {
    error_log("Error fetching admin stats: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #FF8246;
        margin: 10px 0;
    }

    .stat-label {
        color: #666666;
        font-size: 0.9rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #FF8246;
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .dashboard-card h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #000000;
    }

    .dashboard-card p {
        color: #666666;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage the marketplace, verify sellers, and monitor system activity.</p>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['pending_verifications'] ?? 0; ?></div>
                <div class="stat-label">Pending Verifications</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_users'] ?? 0; ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_sellers'] ?? 0; ?></div>
                <div class="stat-label">Total Sellers</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_products'] ?? 0; ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_orders'] ?? 0; ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <!-- Admin Profile Card -->
            <a href="admin-profile-edit.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/profile.svg" alt="Profile">
                </div>
                <h3>Admin Profile</h3>
                <p>Manage your personal information and account settings</p>
            </a>

            <!-- Verify Sellers Card -->
            <a href="admin-verify-sellers.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/verified-empty.svg" alt="Verify Sellers">
                </div>
                <h3>Verify Sellers</h3>
                <p>Review and verify seller applications (<?php echo $stats['pending_verifications'] ?? 0; ?> pending)
                </p>
            </a>

            <!-- Register Other Admin Card -->
            <a href="admin-sign-up.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/add-circle-empty.svg" alt="Register Admin">
                </div>
                <h3>Register Admin</h3>
                <p>Create new administrator accounts</p>
            </a>

            <!-- Logs Card -->
            <a href="admin-logs.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/time-update.svg" alt="Logs">
                </div>
                <h3>System Logs</h3>
                <p>Monitor user activities and system events</p>
            </a>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-logs.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-logs.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>System Logs</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Activities</span>
            <span class="filter-tab" data-filter="user_login">User Logins</span>
            <span class="filter-tab" data-filter="seller_application">Seller Applications</span>
            <span class="filter-tab" data-filter="product_added">Product Additions</span>
            <span class="filter-tab" data-filter="order_placed">Orders</span>
        </div>

        <!-- Logs Container -->
        <div id="logsList" class="logs-list">
            <div class="loading">Loading logs...</div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-logs.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-manage-report.php`

**Status:** `FOUND`

```php
<!-- THIS IS SHOULD BE IGNORED, IT's JUST EXTRA -->

<?php
require_once('../includes/admin-auth-check.php');
require_once('../../database/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$report_id = $_POST['report_id'] ?? $_GET['id'] ?? 0;
$resolution = $_POST['resolution'] ?? '';

if ($action === 'resolve' && $report_id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$resolution, $report_id]);
        $_SESSION['admin_message'] = 'Report resolved.';
    } catch (PDOException $e) {
        error_log("Resolve report error: " . $e->getMessage());
        $_SESSION['admin_error'] = 'Failed to resolve report.';
    }
    header('Location: manage-reports.php');
    exit;
}

// Fetch all reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, u.username as reporter, s.business_name, s.user_id as seller_user_id
        FROM seller_reports r
        JOIN users u ON r.reporter_id = u.user_id
        JOIN sellers s ON r.seller_id = s.seller_id
        ORDER BY r.created_at DESC
    ");
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Fetch reports error: " . $e->getMessage());
}

$message = $_SESSION['admin_message'] ?? '';
$error = $_SESSION['admin_error'] ?? '';
unset($_SESSION['admin_message'], $_SESSION['admin_error']);
?>
<?php include_once('../includes/admin-header.php'); ?>

<div class="reports-container">
    <h1 class="page-title">Manage Reports</h1>

    <?php if ($message): ?>
    <div class="alert success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (empty($reports)): ?>
    <div class="empty-state">
        <img src="../../assets/image/icons/admin-reports.svg" alt="No reports">
        <p>No reports have been submitted.</p>
    </div>
    <?php else: ?>
    <div class="reports-list">
        <?php foreach ($reports as $report): ?>
        <div class="report-card <?php echo $report['status']; ?>">
            <div class="report-header">
                <span class="report-id">#<?php echo $report['report_id']; ?></span>
                <span
                    class="report-status status-<?php echo $report['status']; ?>"><?php echo ucfirst($report['status']); ?></span>
            </div>
            <div class="report-body">
                <p><strong>Reporter:</strong> <?php echo htmlspecialchars($report['reporter']); ?></p>
                <p><strong>Seller:</strong> <?php echo htmlspecialchars($report['business_name'] ?: 'Unknown'); ?></p>
                <p><strong>Reason:</strong> <?php echo htmlspecialchars($report['reason']); ?></p>
                <p><strong>Details:</strong> <?php echo nl2br(htmlspecialchars($report['details'])); ?></p>
                <p><strong>Submitted:</strong> <?php echo date('M j, Y g:i A', strtotime($report['created_at'])); ?></p>
                <?php if ($report['admin_notes']): ?>
                <p><strong>Admin notes:</strong> <?php echo nl2br(htmlspecialchars($report['admin_notes'])); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($report['status'] === 'pending'): ?>
            <div class="report-actions">
                <form method="POST">
                    <input type="hidden" name="report_id" value="<?php echo $report['report_id']; ?>">
                    <input type="hidden" name="action" value="resolve">
                    <textarea name="resolution" placeholder="Resolution notes (optional)" rows="2"></textarea>
                    <button type="submit" class="btn-resolve">Mark as Resolved</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php include_once('../includes/admin-footer.php'); ?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-profile.php`

**Status:** `FOUND`

```php
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-profile.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <script defer src="../scripts/admin-profile.js"></script>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <?php if (isset($error)): ?>
        <div class="message error"
            style="display: block; margin-bottom: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="admin-dashboard.php" style="color: #721c24; text-decoration: underline; margin-left: 10px;">Return
                to Dashboard</a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="profile-header-card" id="profileHeaderCard">
                <div class="profile-header-left">
                    <div class="profile-avatar-wrapper">
                        <img id="profilePicturePreview" src="<?php echo $profilePicUrl; ?>" alt="Profile Picture"
                            onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                        <div class="profile-avatar-edit" id="profilePictureUpload">
                            <label for="profile_picture" class="file-upload-label" title="Upload profile picture">
                                <img src="../assets/image/icons/camera.svg" alt="Upload">
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                        </div>
                    </div>
                    <div class="profile-name-role">
                        <h1 class="profile-full-name">
                            <?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            <?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <span class="profile-role-badge">Administrator</span>
                        <div id="fileNameDisplay" class="file-name"></div>
                    </div>
                </div>

                <div class="profile-header-right">
                    <button type="button" id="editProfileBtn" class="btn btn-edit">
                        <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                        Edit Profile
                    </button>

                    <div id="profileActions" class="profile-actions-header" style="display: none;">
                        <button type="button" id="uploadPhotoBtn" class="btn btn-upload" title="Upload Profile Photo">
                            <img src="../assets/image/icons/camera.svg" alt="Upload" class="btn-icon">
                            <span class="btn-text">Upload Photo</span>
                        </button>
                        <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>
                            <img src="../assets/image/icons/check.svg" alt="Save" class="btn-icon">
                            <span class="btn-text">Save</span>
                        </button>
                        <button type="button" id="cancelEditBtn" class="btn btn-secondary">
                            <img src="../assets/image/icons/cancel.svg" alt="Cancel" class="btn-icon">
                            <span class="btn-text">Cancel</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="profile-grid">
                <div class="profile-card personal-info-card">
                    <div class="card-header">
                        <h3>Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                First Name
                            </label>
                            <input type="text" id="first_name" name="first_name" required
                                value="<?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="First name" maxlength="50" disabled>
                            <div class="error-message" id="firstNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                Last Name
                            </label>
                            <input type="text" id="last_name" name="last_name" required
                                value="<?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Last name" maxlength="50" disabled>
                            <div class="error-message" id="lastNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="contact_number" class="field-label">
                                <img src="../assets/image/icons/phone.svg" alt="" class="field-icon">
                                Contact Number
                            </label>
                            <input type="tel" id="contact_number" name="contact_number" required
                                value="<?php echo htmlspecialchars($admin['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="09XX XXX XXXX" maxlength="13" disabled>
                            <div class="error-message" id="contactError"></div>
                        </div>
                    </div>
                </div>

                <div class="profile-card account-info-card">
                    <div class="card-header">
                        <h3>Account Information</h3>
                        <span class="badge">Cannot be changed</span>
                    </div>
                    <div class="card-body">
                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/mail.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Email Address</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/user.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Username</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/calendar.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Member Since</span>
                                <span class="info-value"><?php echo htmlspecialchars($dateJoined ?: 'N/A'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="file" id="profile_picture_trigger" name="profile_picture"
                accept="image/jpeg,image/png,image/gif,image/webp" style="display: none;">
        </form>
        <?php endif; ?>
    </div>

    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon success-icon">
                <img src="../assets/image/icons/check-circle.svg" alt="Success">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-in.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: admin-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-in.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Sign In</div>

        <form id="signinForm" class="signin-container" method="POST">
            <input type="hidden" name="action" value="signin">

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
                Don't have an admin account? <a href="admin-sign-up.php">Register</a>
            </p>
        </form>
    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-in.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-up.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Up Page - Modified to allow access even when logged in
session_start();

// REMOVED the redirect that sent logged-in admins back to dashboard.
// Now both logged-in and non-logged-in users can access this page.

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-up.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Registration</div>

        <form id="signupForm" class="signup-container" method="POST" action="../database/admin-sign-up-handler.php"
            autocomplete="on">
            <input type="hidden" name="action" value="signup">

            <!-- Two-column layout -->
            <div class="form-section personal-info-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                        autocomplete="given-name">
                    <div class="error-message" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name"
                        autocomplete="family-name">
                    <div class="error-message" id="lastNameError"></div>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number *</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel">
                    <div class="help-text">Philippine mobile number (e.g., 0912 345 6789)</div>
                    <div class="error-message" id="contactError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder="admin@example.com"
                        autocomplete="email">
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" id="username" name="username" required placeholder="Choose a username"
                        autocomplete="username">
                    <div class="help-text">3-20 characters (letters, numbers, underscore)</div>
                    <div class="error-message" id="usernameError"></div>
                </div>
            </div>

            <div class="form-section account-info-section">
                <h3>Account Security</h3>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                    <div class="help-text">8-16 characters, with uppercase, lowercase, and number</div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" tabindex="-1"
                            aria-label="Toggle confirm password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password"
                                id="confirmPasswordIcon">
                        </button>
                    </div>
                    <div class="error-message" id="confirmError"></div>
                </div>

                <!-- Buttons inside Account Information column at the bottom -->
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Register Admin</button>
                    <button type="button" class="btn btn-secondary" id="clearForm">Clear Form</button>
                </div>

                <div class="links-group">
                    <p class="login-link">
                        Already have an admin account? <a href="admin-sign-in.php">Sign In</a>
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

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-up.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-verify-sellers.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Sellers - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-verify-sellers.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>Verify Sellers</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="pending">Pending Verification</span>
            <span class="filter-tab" data-filter="verified">Verified</span>
            <span class="filter-tab" data-filter="rejected">Rejected</span>
        </div>

        <!-- Sellers List Container -->
        <div id="sellersList" class="sellers-list">
            <div class="loading">Loading sellers...</div>
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

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-verify-sellers.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-header.php`

**Status:** `FOUND`

```php
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
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-footer.php`

**Status:** `FOUND`

```php
<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'admin-index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>Admin <span>Control Panel</span></h2>
            <h2>Manage & <span>Monitor</span></h2>
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
            <span>admin@crooks-cart.edu.ph</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>includes/admin-privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>includes/admin-terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-privacy-policy.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-privacy-policy.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Admin <span class="policy-hero__highlight">Privacy Policy</span></h1>
                <p class="policy-hero__subtitle">Administrator Data Handling - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to the administrator panel of Crooks Cart Collectives, a student project
                    developed for academic requirements at the School of Computer Studies, Arellano University -
                    Bonifacio Campus. This section outlines how administrator data is handled.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="admin-information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Administrator Information Collected</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For administrator accounts, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Personal Information:</strong> First name, last name
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Email address, contact number
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Account Credentials:</strong> Username, password (hashed for security)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Profile Picture:</strong> Optional profile image
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> Administrator accounts are created for project management and
                            monitoring purposes only.
                        </p>
                    </div>
                </article>

                <article id="admin-data-access" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. Data Access & Monitoring</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Administrators have access to:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">User registration data (for verification purposes)
                            </li>
                            <li class="policy-section__list-item">Seller applications and verification status</li>
                            <li class="policy-section__list-item">Product listings across the platform</li>
                            <li class="policy-section__list-item">Order information and transaction logs</li>
                            <li class="policy-section__list-item">System activity logs (user logins, product additions,
                                orders)</li>
                        </ul>
                        <p>All administrator actions are logged for accountability.</p>
                    </div>
                </article>

                <article id="admin-security" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Administrator Security</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Passwords are securely hashed using industry standards
                            </li>
                            <li class="policy-section__list-item">Session management with timeout protection</li>
                            <li class="policy-section__list-item">Access restricted to authenticated administrators only
                            </li>
                            <li class="policy-section__list-item">All administrative actions are logged for security
                                auditing</li>
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
                            <strong>IMPORTANT:</strong> This administrator panel is part of a student project created
                            for educational purposes. All data, including administrator information, is stored locally
                            in the project database and used solely for demonstrating system administration
                            functionality.
                        </p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about administrator data handling:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Email:</strong> scs.bonifacio@arellano.edu.ph</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-terms-and-conditions.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-terms-and-conditions';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terms and Conditions - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-terms-and-conditions.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="terms-page">
        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="terms-hero__container">
                <h1 class="terms-hero__title">Admin <span class="terms-hero__highlight">Terms & Conditions</span></h1>
                <p class="terms-hero__subtitle">Administrator Agreement - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="terms-intro">
            <div class="terms-intro__card">
                <p class="terms-intro__text">
                    This administrator agreement applies to users granted access to the Crooks Cart Collectives admin
                    panel. By accessing the admin panel, you agree to these terms and conditions governing administrator
                    responsibilities and conduct.
                </p>
                <p class="terms-intro__effective-date">Effective Date: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="terms-content">
            <div class="terms-sections">

                <article id="admin-responsibilities" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">1. Administrator Responsibilities</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As an administrator of this academic project, you agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Maintain the confidentiality of your login credentials
                            </li>
                            <li class="terms-section__list-item">Use admin privileges only for legitimate project
                                purposes</li>
                            <li class="terms-section__list-item">Verify seller applications accurately and fairly</li>
                            <li class="terms-section__list-item">Monitor user reports and take appropriate action</li>
                            <li class="terms-section__list-item">Not abuse admin privileges for personal gain</li>
                        </ul>
                    </div>
                </article>

                <article id="admin-privileges" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">2. Administrator Privileges</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators are granted the following privileges:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Access to view user and seller information</li>
                            <li class="terms-section__list-item">Ability to verify or reject seller applications</li>
                            <li class="terms-section__list-item">View system logs and user activities</li>
                            <li class="terms-section__list-item">Create additional administrator accounts</li>
                            <li class="terms-section__list-item">Monitor marketplace transactions and reports</li>
                        </ul>
                    </div>
                </article>

                <article id="accountability" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">3. Accountability and Logging</h2>
                    </header>
                    <div class="terms-section__body">
                        <p class="terms-section__important">
                            <strong>IMPORTANT:</strong> All administrator actions are logged and monitored.
                        </p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Every admin login is timestamped and recorded</li>
                            <li class="terms-section__list-item">Seller verification actions are logged with admin ID
                            </li>
                            <li class="terms-section__list-item">Any changes to user data are tracked</li>
                            <li class="terms-section__list-item">Misuse of admin privileges may result in removal of
                                access</li>
                        </ul>
                    </div>
                </article>

                <article id="data-handling" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">4. Data Handling and Privacy</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Respect user privacy and confidentiality</li>
                            <li class="terms-section__list-item">Not share or export user data outside the project</li>
                            <li class="terms-section__list-item">Use data only for legitimate administrative purposes
                            </li>
                            <li class="terms-section__list-item">Report any security concerns to project leads</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-purposes" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">5. Academic Project Context</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>This administrator panel is part of an academic project. By using it, you acknowledge:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This is a demonstration project for educational
                                purposes</li>
                            <li class="terms-section__list-item">No real financial transactions occur on the platform
                            </li>
                            <li class="terms-section__list-item">The system may be modified or taken down after project
                                completion</li>
                            <li class="terms-section__list-item">Your role as an administrator is part of the academic
                                exercise</li>
                        </ul>
                    </div>
                </article>

                <article id="contact" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">6. Contact Information</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>For questions regarding administrator access:</p>
                        <address class="terms-contact">
                            <p class="terms-contact__item"><strong>Institution:</strong> School of Computer Studies</p>
                            <p class="terms-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="terms-contact__item"><strong>Course:</strong> Web Development</p>
                            <p class="terms-contact__item"><strong>Project Lead:</strong> Lance N. Madelar</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>

        <!-- Agreement Section -->
        <section class="terms-agreement">
            <div class="terms-agreement__box">
                <p class="terms-agreement__text">
                    By accessing the administrator panel, you acknowledge that this is an academic project and agree to
                    use admin privileges responsibly and ethically.
                </p>
                <div class="terms-agreement__actions">
                    <a href="admin-sign-in.php" class="terms-agreement__btn terms-agreement__btn--primary">Return to
                        Sign In</a>
                    <a href="admin-index.php" class="terms-agreement__btn terms-agreement__btn--secondary">Back to
                        Admin</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-header.js`

**Status:** `FOUND`

```javascript
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
    
    // Mobile menu functionality
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu');
        
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
        }
        
        // Function to close menu
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
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
        
        console.log('Mobile menu initialized');
    } else {
        console.error('Menu elements not found');
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'admin-index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage) {
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

window.HeaderFunctions = {
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-logs.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logsList = document.getElementById('logsList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    let currentFilter = 'all';
    let allLogs = [];

    // Filter functions
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

    function filterLogs(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderLogs(allLogs);
        } else {
            const filtered = allLogs.filter(log => log.log_type === filter);
            renderLogs(filtered);
        }
    }

    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    }

    function getLogIcon(logType) {
        switch(logType) {
            case 'user_login': return 'profile.svg';
            case 'seller_application': return 'verified-empty.svg';
            case 'product_added': return 'package.svg';
            case 'order_placed': return 'order.svg';
            default: return 'time-update.svg';
        }
    }

    function getLogDescription(log) {
        switch(log.log_type) {
            case 'user_login':
                return `${log.user_name} (${log.email}) logged in`;
            case 'seller_application':
                return `${log.user_name} applied as seller - ${log.business_name || 'No business name'}`;
            case 'product_added':
                return `${log.user_name} added product: ${log.product_name}`;
            case 'order_placed':
                return `${log.user_name} ordered ${log.quantity}x ${log.product_name}`;
            default:
                return 'Unknown activity';
        }
    }

    function renderLogs(logs) {
        if (!logs || logs.length === 0) {
            logsList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/time-update.svg" alt="No logs" class="empty-state-icon">
                        <h2>No logs found</h2>
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="logs-container">';

        logs.forEach(log => {
            const iconFile = getLogIcon(log.log_type);
            const description = getLogDescription(log);
            const formattedTime = formatTimestamp(log.timestamp);

            html += `
                <div class="log-entry">
                    <div class="log-icon">
                        <img src="../assets/image/icons/${iconFile}" alt="${log.log_type}">
                    </div>
                    <div class="log-content">
                        <div class="log-description">${escapeHtml(description)}</div>
                        <div class="log-time">${formattedTime}</div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        logsList.innerHTML = html;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function loadLogs(filter = 'all') {
        logsList.innerHTML = '<div class="loading">Loading logs...</div>';

        try {
            const response = await fetch(`../database/admin-logs-handler.php?action=get_logs&type=${filter}`);
            const result = await response.json();

            if (result.status === 'success') {
                allLogs = result.data;
                filterLogs(currentFilter);
            } else {
                logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load logs.</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading logs:', error);
            logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            currentFilter = filter;
            setActiveFilter(filter);
            loadLogs(filter);
        });
    });

    // Initial load
    loadLogs('all');
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-profile.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editProfileBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Action containers
    const editButtonDiv = document.getElementById('editProfileBtn');
    const profileActionsDiv = document.getElementById('profileActions');
    
    // Get editable inputs in Personal Info card
    const editableInputs = document.querySelectorAll('.personal-info-card input:not([type="hidden"])');
    
    // Profile picture elements
    const profilePicInput = document.getElementById('profile_picture');
    const profilePicTrigger = document.getElementById('profile_picture_trigger');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    
    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const contactInput = document.getElementById('contact_number');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== PHONE NUMBER FORMATTING =====
    function formatPhilippineNumber(input) {
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('09') && value.length <= 11) {
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
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/\D/g, '');
        return (cleaned.length === 11 && cleaned.startsWith('09'));
    }

    // ===== MODAL FUNCTIONS =====
    function showModal(message, isError = false) {
        modalMessage.textContent = message;
        const modalIcon = document.querySelector('.modal-icon');
        if (modalIcon) {
            modalIcon.className = 'modal-icon ' + (isError ? 'error-icon' : 'success-icon');
            modalIcon.innerHTML = isError 
                ? '<img src="../assets/image/icons/cancel.svg" alt="Error">'
                : '<img src="../assets/image/icons/check-circle.svg" alt="Success">';
        }
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

    // ===== STORE ORIGINAL VALUES =====
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

    // ===== ENABLE EDIT MODE =====
    function enableEditMode() {
        isEditMode = true;
        
        // Hide edit button, show action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'none';
        if (profileActionsDiv) profileActionsDiv.style.display = 'flex';
        
        // Enable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        
        // Show avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'flex';
        
        pictureChanged = false;
    }

    // ===== DISABLE EDIT MODE =====
    function disableEditMode(restore = true) {
        isEditMode = false;
        
        // Show edit button, hide action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'flex';
        if (profileActionsDiv) profileActionsDiv.style.display = 'none';
        
        // Disable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        // Hide avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'none';
        
        // Clear file input and filename
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (profilePicTrigger) {
            profilePicTrigger.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.style.display = 'none';
            fileNameDisplay.textContent = '';
        }
        
        // Restore original values if needed
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
        
        // Reset save button state
        if (saveBtn) saveBtn.disabled = true;
        pictureChanged = false;
    }

    // ===== PROFILE PICTURE HANDLING =====
    function handleProfilePictureSelect(file) {
        if (file) {
            // Validate file size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                showModal('File size must be less than 2MB', true);
                return false;
            }
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                showModal('Please upload a valid image (JPG, PNG, GIF, WEBP)', true);
                return false;
            }
            
            fileNameDisplay.style.display = 'block';
            fileNameDisplay.textContent = 'New photo selected: ' + file.name;
            pictureChanged = true;
            
            // Enable save button if in edit mode
            if (saveBtn) saveBtn.disabled = false;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                if (profilePicPreview) {
                    profilePicPreview.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
            return true;
        }
        return false;
    }

    // Connect both file inputs to the same handler
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            if (this.files[0]) {
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    if (profilePicTrigger) {
        profilePicTrigger.addEventListener('change', function() {
            if (this.files[0]) {
                // Sync the visible input with the trigger
                if (profilePicInput) {
                    // Create a DataTransfer to copy the file
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(this.files[0]);
                    profilePicInput.files = dataTransfer.files;
                }
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    // Upload photo button click handler
    if (uploadPhotoBtn) {
        uploadPhotoBtn.addEventListener('click', function() {
            if (profilePicTrigger) {
                profilePicTrigger.click();
            } else if (profilePicInput) {
                profilePicInput.click();
            }
        });
    }

    // Hide avatar edit overlay by default
    const avatarEdit = document.getElementById('profilePictureUpload');
    if (avatarEdit) avatarEdit.style.display = 'none';

    // ===== PHONE NUMBER INPUT HANDLING =====
    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode) {
                formatPhilippineNumber(this);
                // Enable save button when changes are made
                if (saveBtn) saveBtn.disabled = false;
            }
        });
        
        contactInput.addEventListener('blur', function() {
            if (isEditMode && this.value && !isPhoneValid(this.value)) {
                this.style.borderColor = '#FF8246';
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (09XXXXXXXXX)';
                document.getElementById('contactError').style.display = 'block';
            } else {
                this.style.borderColor = '';
                document.getElementById('contactError').textContent = '';
                document.getElementById('contactError').style.display = 'none';
            }
        });
    }

    // ===== EDIT BUTTON CLICK =====
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            storeOriginalValues();
            enableEditMode();
        });
    }

    // ===== CANCEL EDIT BUTTON =====
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', function() {
            disableEditMode(true);
        });
    }

    // ===== INPUT CHANGE HANDLERS - Enable save button =====
    if (firstNameInput) {
        firstNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('firstNameError').style.display = 'none';
        });
    }

    if (lastNameInput) {
        lastNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('lastNameError').style.display = 'none';
        });
    }

    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
        });
    }

    // ===== SAVE BUTTON CLICK =====
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.style.display = 'none';
            });
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const contact = contactInput ? contactInput.value.trim() : '';

            let isValid = true;

            if (!firstName) {
                document.getElementById('firstNameError').textContent = 'First name is required';
                document.getElementById('firstNameError').style.display = 'block';
                firstNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!lastName) {
                document.getElementById('lastNameError').textContent = 'Last name is required';
                document.getElementById('lastNameError').style.display = 'block';
                lastNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!contact) {
                document.getElementById('contactError').textContent = 'Contact number is required';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            } else if (!isPhoneValid(contact)) {
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (e.g., 09123456789)';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!isValid) {
                showModal('Please fix the errors before saving', true);
                return;
            }

            // Disable button and show loading state
            saveBtn.disabled = true;
            const originalText = saveBtn.innerHTML;
            saveBtn.innerHTML = '<span class="btn-text">Saving...</span>';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/admin-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    setTimeout(() => {
                        // Update the displayed full name
                        const nameElement = document.querySelector('.profile-full-name');
                        if (nameElement && result.data) {
                            nameElement.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                        }
                        
                        storeOriginalValues();
                        disableEditMode(false);
                        saveBtn.innerHTML = originalText;
                        
                        // If picture changed, reload to update header
                        if (pictureChanged) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }, 1500);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.', true);
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.', true);
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
        });
    }

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function(e) {
        // Escape key cancels edit mode
        if (e.key === 'Escape' && isEditMode) {
            disableEditMode(true);
        }
        
        // Ctrl+S or Cmd+S saves
        if ((e.ctrlKey || e.metaKey) && e.key === 's' && isEditMode) {
            e.preventDefault();
            if (saveBtn && !saveBtn.disabled) {
                saveBtn.click();
            }
        }
    });

    // ===== INITIAL STORE =====
    storeOriginalValues();
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-in.js`

**Status:** `FOUND`

```javascript
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

            const response = await fetch('../database/admin-sign-in-handler.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotifier('Login successful! Redirecting...');
                
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 1500);
            } else {
                if (result.message === 'invalid-credentials') {
                    showNotifier('Invalid credentials. Please try again.');
                    identifierInput.classList.add('error');
                    passwordInput.classList.add('error');
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

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-out.js`

**Status:** `FOUND`

```javascript
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
                const response = await fetch('../database/admin-sign-out-handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (result.status === 'success') {
                    window.location.replace(result.redirect + '?t=' + Date.now());
                } else {
                    console.error('Logout error:', result.message);
                    window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
                }
            } catch (error) {
                console.error('Logout error:', error);
                window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
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

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-up.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const form = document.getElementById('signupForm');
    const clearButton = document.getElementById('clearForm');
    const submitButton = form.querySelector('.btn-primary');
    
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    // Form fields
    const firstNameField = document.getElementById('first_name');
    const lastNameField = document.getElementById('last_name');
    const contactField = document.getElementById('contact_number');
    const emailField = document.getElementById('email');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    
    // Error message elements
    const firstNameError = document.getElementById('firstNameError');
    const lastNameError = document.getElementById('lastNameError');
    const contactError = document.getElementById('contactError');
    const emailError = document.getElementById('emailError');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const confirmError = document.getElementById('confirmError');
    
    // Password toggle elements
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    // State
    let isModalOpen = false;
    let isSubmitting = false;
    let isFormatting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
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

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
        
        // Auto-hide after 5 seconds for success messages
        if (message.includes('success')) {
            setTimeout(() => {
                closeNotifier();
            }, 5000);
        }
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeNotifier);
    }
    
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= FIELD HIGHLIGHTING =============
    function highlightField(field, highlight = true) {
        if (!field) return;
        if (highlight) {
            field.style.borderColor = '#FF8246';
            field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
            field.classList.add('error-field');
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
            field.classList.remove('error-field');
        }
    }

    function resetHighlights() {
        form.querySelectorAll('input').forEach(field => highlightField(field, false));
        
        // Clear all error messages
        document.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });
    }

    // ============= VALIDATION FUNCTIONS =============
    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validateUsername(username) {
        if (username.length < 3) {
            return { valid: false, message: 'Username must be at least 3 characters long.' };
        }
        if (username.length > 20) {
            return { valid: false, message: 'Username cannot exceed 20 characters.' };
        }
        if (!/^[a-zA-Z0-9_]+$/.test(username)) {
            return { valid: false, message: 'Username can only contain letters, numbers, and underscore.' };
        }
        return { valid: true, message: '' };
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
            return { valid: false, message: 'Password must contain at least one number.' };
        }
        return { valid: true, message: '' };
    }

    // ============= IMPROVED PHONE NUMBER FORMATTING =============
    function cleanPhoneNumber(value) {
        return value.replace(/\D/g, '');
    }

    function formatPhoneDisplay(cleaned) {
        if (!cleaned) return '';
        
        let displayNumber = cleaned;
        
        if (cleaned.startsWith('63') && cleaned.length >= 3) {
            displayNumber = '0' + cleaned.substring(2);
        }
        else if (cleaned.startsWith('639') && cleaned.length >= 4) {
            displayNumber = '0' + cleaned.substring(2);
        }
        else if (cleaned.startsWith('063') && cleaned.length >= 4) {
            displayNumber = '0' + cleaned.substring(3);
        }
        else if (cleaned.startsWith('9') && cleaned.length === 10) {
            displayNumber = '0' + cleaned;
        }
        
        displayNumber = displayNumber.substring(0, 11);
        
        if (displayNumber.length > 4) {
            let formatted = displayNumber.substring(0, 4);
            if (displayNumber.length > 7) {
                formatted += ' ' + displayNumber.substring(4, 7) + ' ' + displayNumber.substring(7, 11);
            } else if (displayNumber.length > 4) {
                formatted += ' ' + displayNumber.substring(4);
            }
            return formatted;
        }
        
        return displayNumber;
    }

    function formatPhilippineNumber(input) {
        if (isFormatting) return;
        isFormatting = true;
        
        const start = input.selectionStart;
        const end = input.selectionEnd;
        const oldLength = input.value.length;
        
        const cleaned = cleanPhoneNumber(input.value);
        const formatted = formatPhoneDisplay(cleaned);
        
        input.value = formatted;
        
        const newLength = input.value.length;
        const cursorAdjust = newLength - oldLength;
        
        setTimeout(() => {
            input.setSelectionRange(start + cursorAdjust, end + cursorAdjust);
            isFormatting = false;
        }, 0);
    }

    function isPhoneValid(phone) {
        const cleaned = cleanPhoneNumber(phone);
        
        if (cleaned.length === 11 && cleaned.startsWith('09')) {
            return true;
        }
        
        if (cleaned.length === 10 && cleaned.startsWith('9')) {
            return true;
        }
        
        if ((cleaned.length === 12 && cleaned.startsWith('63')) || 
            (cleaned.length === 13 && cleaned.startsWith('063')) ||
            (cleaned.length === 12 && cleaned.startsWith('639'))) {
            return true;
        }
        
        return false;
    }

    function normalizePhoneForStorage(phone) {
        let cleaned = cleanPhoneNumber(phone);
        
        if (cleaned.startsWith('63') && cleaned.length >= 3) {
            return '0' + cleaned.substring(2);
        }
        if (cleaned.startsWith('639') && cleaned.length >= 4) {
            return '0' + cleaned.substring(2);
        }
        if (cleaned.startsWith('063') && cleaned.length >= 4) {
            return '0' + cleaned.substring(3);
        }
        if (cleaned.startsWith('9') && cleaned.length === 10) {
            return '0' + cleaned;
        }
        
        return cleaned;
    }

    // ============= REAL-TIME VALIDATION =============
    function validateField(field, errorElement, validationFn, errorMessage) {
        if (!field.value.trim()) {
            errorElement.textContent = 'This field is required';
            highlightField(field, true);
            return false;
        }
        
        if (validationFn && !validationFn(field.value)) {
            errorElement.textContent = errorMessage || 'Invalid format';
            highlightField(field, true);
            return false;
        }
        
        errorElement.textContent = '';
        highlightField(field, false);
        return true;
    }

    // Email validation
    emailField.addEventListener('blur', function() {
        validateField(this, emailError, isEmailValid, 'Please enter a valid email address');
    });

    // Username validation
    usernameField.addEventListener('blur', function() {
        const validation = validateUsername(this.value);
        if (this.value.trim() && !validation.valid) {
            usernameError.textContent = validation.message;
            highlightField(this, true);
        } else if (!this.value.trim()) {
            usernameError.textContent = 'Username is required';
            highlightField(this, true);
        } else {
            usernameError.textContent = '';
            highlightField(this, false);
        }
    });

    // Password validation
    passwordField.addEventListener('blur', function() {
        const validation = validatePassword(this.value);
        if (this.value.trim() && !validation.valid) {
            passwordError.textContent = validation.message;
            highlightField(this, true);
        } else if (!this.value.trim()) {
            passwordError.textContent = 'Password is required';
            highlightField(this, true);
        } else {
            passwordError.textContent = '';
            highlightField(this, false);
        }
        
        if (confirmPasswordField.value) {
            if (this.value !== confirmPasswordField.value) {
                confirmError.textContent = 'Passwords do not match';
                highlightField(confirmPasswordField, true);
            } else {
                confirmError.textContent = '';
                highlightField(confirmPasswordField, false);
            }
        }
    });

    confirmPasswordField.addEventListener('blur', function() {
        if (this.value && this.value !== passwordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(this, true);
        } else if (!this.value.trim()) {
            confirmError.textContent = 'Please confirm your password';
            highlightField(this, true);
        } else {
            confirmError.textContent = '';
            highlightField(this, false);
        }
    });

    // ============= INPUT EVENT LISTENERS =============
    if (contactField) {
        contactField.addEventListener('input', function(e) {
            formatPhilippineNumber(this);
            
            if (contactError) {
                contactError.textContent = '';
            }
            highlightField(this, false);
        });

        contactField.addEventListener('blur', function() {
            if (this.value) {
                if (!isPhoneValid(this.value)) {
                    contactError.textContent = 'Please enter a valid Philippine mobile number (e.g., 0912 345 6789)';
                    highlightField(this, true);
                } else {
                    const cleaned = cleanPhoneNumber(this.value);
                    const normalized = normalizePhoneForStorage(cleaned);
                    this.value = formatPhoneDisplay(normalized);
                    contactError.textContent = '';
                    highlightField(this, false);
                }
            } else {
                contactError.textContent = 'Contact number is required';
                highlightField(this, true);
            }
        });
    }

    // Clear highlights on input for all fields
    firstNameField.addEventListener('input', () => {
        highlightField(firstNameField, false);
        firstNameError.textContent = '';
    });
    
    lastNameField.addEventListener('input', () => {
        highlightField(lastNameField, false);
        lastNameError.textContent = '';
    });
    
    emailField.addEventListener('input', () => {
        highlightField(emailField, false);
        emailError.textContent = '';
    });
    
    usernameField.addEventListener('input', () => {
        highlightField(usernameField, false);
        usernameError.textContent = '';
    });
    
    passwordField.addEventListener('input', () => {
        highlightField(passwordField, false);
        passwordError.textContent = '';
        
        if (confirmPasswordField.value) {
            if (passwordField.value !== confirmPasswordField.value) {
                confirmError.textContent = 'Passwords do not match';
                highlightField(confirmPasswordField, true);
            } else {
                confirmError.textContent = '';
                highlightField(confirmPasswordField, false);
            }
        }
    });
    
    confirmPasswordField.addEventListener('input', () => {
        if (confirmPasswordField.value && confirmPasswordField.value !== passwordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(confirmPasswordField, true);
        } else {
            confirmError.textContent = '';
            highlightField(confirmPasswordField, false);
        }
    });

    // ============= FORM SUBMISSION WITH FALLBACKS =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        // Check required fields with specific error messages
        let hasErrors = false;
        
        if (!firstNameField.value.trim()) {
            firstNameError.textContent = 'First name is required';
            highlightField(firstNameField, true);
            hasErrors = true;
        }
        
        if (!lastNameField.value.trim()) {
            lastNameError.textContent = 'Last name is required';
            highlightField(lastNameField, true);
            hasErrors = true;
        }
        
        if (!contactField.value.trim()) {
            contactError.textContent = 'Contact number is required';
            highlightField(contactField, true);
            hasErrors = true;
        } else if (!isPhoneValid(contactField.value)) {
            contactError.textContent = 'Please enter a valid Philippine mobile number';
            highlightField(contactField, true);
            hasErrors = true;
        }
        
        if (!emailField.value.trim()) {
            emailError.textContent = 'Email is required';
            highlightField(emailField, true);
            hasErrors = true;
        } else if (!isEmailValid(emailField.value)) {
            emailError.textContent = 'Please enter a valid email address';
            highlightField(emailField, true);
            hasErrors = true;
        }
        
        if (!usernameField.value.trim()) {
            usernameError.textContent = 'Username is required';
            highlightField(usernameField, true);
            hasErrors = true;
        } else {
            const usernameValidation = validateUsername(usernameField.value);
            if (!usernameValidation.valid) {
                usernameError.textContent = usernameValidation.message;
                highlightField(usernameField, true);
                hasErrors = true;
            }
        }
        
        if (!passwordField.value) {
            passwordError.textContent = 'Password is required';
            highlightField(passwordField, true);
            hasErrors = true;
        } else {
            const passwordValidation = validatePassword(passwordField.value);
            if (!passwordValidation.valid) {
                passwordError.textContent = passwordValidation.message;
                highlightField(passwordField, true);
                hasErrors = true;
            }
        }
        
        if (!confirmPasswordField.value) {
            confirmError.textContent = 'Please confirm your password';
            highlightField(confirmPasswordField, true);
            hasErrors = true;
        } else if (passwordField.value !== confirmPasswordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(confirmPasswordField, true);
            hasErrors = true;
        }
        
        if (hasErrors) {
            showNotifier('Please fix the errors before submitting.');
            return;
        }
        
        // Prepare form data - normalize phone number before submission
        const formData = new FormData(form);
        
        // Replace phone with normalized version for storage
        const normalizedPhone = normalizePhoneForStorage(contactField.value);
        formData.set('contact_number', normalizedPhone);
        
        // Submit form
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        // Array of URLs to try in order
        const urlsToTry = [
            '../database/admin-sign-up-handler.php',  // Relative path (primary)
            '/admin/database/admin-sign-up-handler.php', // Absolute path (fallback 1)
            './database/admin-sign-up-handler.php'    // Current directory path (fallback 2)
        ];

        let response = null;
        let lastError = null;
        let usedUrl = '';

        // Try each URL until one works
        for (const url of urlsToTry) {
            try {
                console.log(`Trying URL: ${url}`);
                response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });
                
                if (response.ok) {
                    usedUrl = url;
                    console.log(`✅ Success with URL: ${url}`);
                    
                    // Log successful fallback to server if not primary
                    if (url !== urlsToTry[0]) {
                        try {
                            await fetch('../database/auto-test.php?log=' + encodeURIComponent(`SIGNUP FALLBACK: Used ${url} successfully`));
                        } catch (e) {
                            // Ignore logging errors
                        }
                    }
                    break; // Exit loop on success
                }
            } catch (error) {
                console.log(`❌ Failed with URL: ${url}`, error.message);
                lastError = error;
                response = null;
            }
        }

        // If all URLs failed
        if (!response) {
            console.error('All fetch attempts failed:', lastError);
            showNotifier('Network error. Please check your connection and try again.');
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
            return;
        }

        try {
            const responseText = await response.text();
            console.log('Raw response:', responseText);
            
            let result;
            try {
                result = JSON.parse(responseText);
            } catch (e) {
                console.error('Failed to parse JSON:', responseText);
                showNotifier('Server returned invalid response. Please try again.');
                isSubmitting = false;
                submitButton.textContent = originalText;
                submitButton.disabled = false;
                return;
            }

            if (result.status === 'success') {
                const delayTime = result.delay || 5000;
                showNotifier(result.message || 'Admin account created successfully! Please sign in.');
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, delayTime);
            } else {
                console.error('Signup error details:', result);
                
                // Handle specific error messages
                if (result.message === 'duplicate-email') {
                    emailError.textContent = 'Email already exists';
                    highlightField(emailField, true);
                    showNotifier('Email already exists. Please use a different email.');
                } else if (result.message === 'username-unavailable') {
                    usernameError.textContent = 'Username already taken';
                    highlightField(usernameField, true);
                    showNotifier('Username already taken. Please choose a different username.');
                } else if (result.message === 'duplicate-contact') {
                    contactError.textContent = 'Phone number already registered';
                    highlightField(contactField, true);
                    showNotifier('Phone number already registered. Please use a different number.');
                } else if (result.message === 'username-too-short') {
                    usernameError.textContent = 'Username too short';
                    highlightField(usernameField, true);
                    showNotifier('Username must be at least 3 characters long.');
                } else if (result.message === 'username-too-long') {
                    usernameError.textContent = 'Username too long';
                    highlightField(usernameField, true);
                    showNotifier('Username cannot exceed 20 characters.');
                } else if (result.message === 'username-invalid-chars') {
                    usernameError.textContent = 'Invalid characters';
                    highlightField(usernameField, true);
                    showNotifier('Username can only contain letters, numbers, and underscore.');
                } else if (result.message === 'password-too-short') {
                    passwordError.textContent = 'Password too short';
                    highlightField(passwordField, true);
                    showNotifier('Password must be at least 8 characters long.');
                } else if (result.message === 'password-too-long') {
                    passwordError.textContent = 'Password too long';
                    highlightField(passwordField, true);
                    showNotifier('Password cannot exceed 16 characters.');
                } else if (result.message === 'password-needs-mixed-case') {
                    passwordError.textContent = 'Needs uppercase & lowercase';
                    highlightField(passwordField, true);
                    showNotifier('Password must contain both uppercase and lowercase letters.');
                } else if (result.message === 'password-needs-number') {
                    passwordError.textContent = 'Needs at least one number';
                    highlightField(passwordField, true);
                    showNotifier('Password must contain at least one number.');
                } else if (result.message === 'passwords-mismatch') {
                    confirmError.textContent = 'Passwords do not match';
                    highlightField(confirmPasswordField, true);
                    showNotifier('Passwords do not match.');
                } else if (result.message === 'invalid-email') {
                    emailError.textContent = 'Invalid email format';
                    highlightField(emailField, true);
                    showNotifier('Please enter a valid email address.');
                } else if (result.message === 'invalid-contact') {
                    contactError.textContent = 'Invalid phone number';
                    highlightField(contactField, true);
                    showNotifier('Please enter a valid Philippine mobile number.');
                } else if (result.message === 'missing-field') {
                    const field = result.field || '';
                    if (field) {
                        const fieldElement = document.getElementById(field);
                        if (fieldElement) {
                            const errorElement = document.getElementById(field + 'Error');
                            if (errorElement) {
                                errorElement.textContent = 'This field is required';
                            }
                            highlightField(fieldElement, true);
                        }
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

    // ============= CLEAR FORM =============
    if (clearButton) {
        clearButton.addEventListener('click', () => {
            form.reset();
            resetHighlights();
        });
    }

    // ============= INITIAL FOCUS =============
    setTimeout(() => {
        firstNameField.focus();
    }, 100);
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-verify-sellers.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const sellersList = document.getElementById('sellersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    let currentFilter = 'pending';
    let allSellers = [];

    // Show/hide modal functions
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                notificationModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 3000);
        }
    }

    function hideNotification() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotification);
    }

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotification();
    });

    // Filter functions
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

    function filterSellers(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (!allSellers || allSellers.length === 0) {
            renderEmptyState('No sellers found in the database.');
            return;
        }

        let filteredSellers = [];
        if (filter === 'pending') {
            filteredSellers = allSellers.filter(s => s.is_verified === 0);
        } else if (filter === 'verified') {
            filteredSellers = allSellers.filter(s => s.is_verified === 1);
        } else if (filter === 'rejected') {
            filteredSellers = allSellers.filter(s => s.is_verified === 2);
        }

        if (filteredSellers.length === 0) {
            let message = '';
            if (filter === 'pending') {
                message = 'No pending seller applications.';
            } else if (filter === 'verified') {
                message = 'No verified sellers yet.';
            } else if (filter === 'rejected') {
                message = 'No rejected applications.';
            }
            renderEmptyState(message);
        } else {
            renderSellers(filteredSellers);
        }
    }

    function renderEmptyState(message) {
        sellersList.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/verified-empty.svg" alt="No sellers" class="empty-state-icon">
                    <h2>${message}</h2>
                    <p class="empty-state-hint">When users apply to become sellers, they will appear here for verification.</p>
                </div>
            </div>
        `;
    }

    function renderSellers(sellers) {
        let html = '<div class="sellers-grid">';

        sellers.forEach(seller => {
            const createdDate = seller.created_at ? new Date(seller.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : 'N/A';

            const statusBadge = seller.is_verified === 0 ? 'pending' : 
                               seller.is_verified === 1 ? 'verified' : 'rejected';
            const statusText = seller.is_verified === 0 ? 'Pending' : 
                              seller.is_verified === 1 ? 'Verified' : 'Rejected';

            const fullName = (seller.first_name && seller.first_name !== 'Unknown' ? seller.first_name : '') + 
                            (seller.last_name && seller.last_name !== 'User' ? ' ' + seller.last_name : '');
            
            const displayName = fullName.trim() || 'Unknown User';

            html += `
                <div class="seller-card" data-id="${seller.seller_id}">
                    <div class="seller-header">
                        <h3>${escapeHtml(seller.business_name)}</h3>
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </div>
                    <div class="seller-body">
                        <p><strong>Name:</strong> ${escapeHtml(displayName)}</p>
                        <p><strong>Email:</strong> ${escapeHtml(seller.email)}</p>
                        <p><strong>Contact:</strong> ${escapeHtml(seller.contact_number)}</p>
                        <p><strong>Applied:</strong> ${createdDate}</p>
                    </div>
            `;

            if (seller.is_verified === 0) {
                html += `
                    <div class="seller-actions">
                        <button class="btn-verify" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/verified-filled.svg" alt="Verify" class="btn-icon">
                            Verify
                        </button>
                        <button class="btn-reject" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                            Reject
                        </button>
                    </div>
                `;
            } else {
                html += `
                    <div class="seller-actions">
                        <span class="status-message">Already ${statusText.toLowerCase()}</span>
                    </div>
                `;
            }

            html += '</div>';
        });

        html += '</div>';
        sellersList.innerHTML = html;
        attachEventListeners();
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-verify').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'verify');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'reject');
            });
        });
    }

    async function handleVerification(sellerId, action) {
        // Disable button to prevent double submission
        const buttons = document.querySelectorAll(`.btn-${action}[data-id="${sellerId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Processing...';
            btn.dataset.originalText = originalText;
        });

        try {
            const formData = new URLSearchParams();
            formData.append('action', action);
            formData.append('seller_id', sellerId);

            const response = await fetch('../database/admin-auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification(result.message);
                await loadSellers(); // Reload the list
            } else {
                showNotification(result.message || 'Action failed', true);
                // Re-enable buttons
                buttons.forEach(btn => {
                    btn.disabled = false;
                    btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
                });
            }
        } catch (error) {
            console.error('Verification error:', error);
            showNotification('Network error. Please try again.', true);
            // Re-enable buttons
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
            });
        }
    }

    async function loadSellers() {
        sellersList.innerHTML = '<div class="loading">Loading sellers...</div>';

        try {
            const response = await fetch('../database/admin-auth-handler.php?action=get_all_sellers');
            const result = await response.json();

            if (result.status === 'success') {
                allSellers = result.data || [];
                if (allSellers.length === 0) {
                    renderEmptyState('No sellers found in the database.');
                } else {
                    filterSellers(currentFilter);
                }
            } else {
                sellersList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-content">
                            <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                            <h2>Error Loading Sellers</h2>
                            <p>${result.message || 'Failed to load sellers.'}</p>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading sellers:', error);
            sellersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                        <h2>Network Error</h2>
                        <p>Please check your connection and try again.</p>
                    </div>
                </div>
            `;
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterSellers(filter);
        });
    });

    // Initial load
    loadSellers();
});
```

---

## File: `Crooks-Cart-Collectives/database/database-connect.php`

**Status:** `FOUND`

```php
<?php
// Add these lines at the beginning
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Database configuration
$host = 'localhost';
$dbName = 'crooks_cart_collectives';
$username = 'root';
$password = '';

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbName;charset=utf8mb4", 
        $username, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false
        ]
    );
} catch (PDOException $error) {
    // Log the detailed error
    error_log("Database connection failed: " . $error->getMessage());
    error_log("Connection details - Host: $host, Database: $dbName, Username: $username");
    
    // Check for specific connection errors
    if ($error->getCode() == 2002) {
        error_log("MySQL server is not running or cannot be reached. Please start MySQL service.");
    }
    
    // For API requests, return JSON error
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
        header('Content-Type: application/json');
        die(json_encode([
            'status' => 'error', 
            'message' => 'Service temporarily unavailable. Please try again later.'
        ]));
    }
    
    // For regular page loads, show user-friendly message
    die("
        <!DOCTYPE html>
        <html>
        <head>
            <title>Service Temporarily Unavailable</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
                .error-container { max-width: 600px; margin: 0 auto; }
                h1 { color: #FF8246; }
                p { color: #666; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>Oops! Something went wrong.</h1>
                <p>We're experiencing technical difficulties. Please try again later.</p>
                <p><a href='../index.php'>Return to Homepage</a></p>
            </div>
        </body>
        </html>
    ");
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/sign-in-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signin') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleSignin();

function handleSignin() {
    global $connection;
    
    error_log("Signin attempt for identifier: " . ($_POST['identifier'] ?? ''));
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirectParam = $_POST['redirect'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    // Check for admin
    try {
        $stmt = $connection->prepare("
            SELECT admin_id, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin) {
            if (!password_verify($password, $admin['password'])) {
                echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
                exit;
            }
            
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['is_admin'] = true;
            $_SESSION['is_customer'] = false;
            $_SESSION['is_seller'] = false;
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => '../pages/admin-dashboard.php'
            ]);
            exit;
        }
    } catch (PDOException $e) {
        error_log("Admin check error: " . $e->getMessage());
    }
    
    // Check regular user
    try {
        $stmt = $connection->prepare("
            SELECT user_id, username, email, password 
            FROM users 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Plain text comparison (keep as per project)
        if ($password !== $user['password']) {
            error_log("Password mismatch for user: " . $identifier);
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Get customer info
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$customer) {
            // Create customer record if missing
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$user['user_id']]);
            $customer_id = $connection->lastInsertId();
        } else {
            $customer_id = $customer['customer_id'];
        }
        
        // Check if seller
        $stmt = $connection->prepare("SELECT seller_id, is_verified FROM sellers WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        $seller = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Set session variables
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['customer_id'] = $customer_id;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_customer'] = true;
        $_SESSION['is_admin'] = false;
        
        if ($seller) {
            $_SESSION['seller_id'] = $seller['seller_id'];
            $_SESSION['is_seller'] = true;
            $_SESSION['seller_verified'] = (bool)$seller['is_verified'];
        } else {
            $_SESSION['is_seller'] = false;
            $_SESSION['seller_verified'] = false;
        }
        
        // Determine redirect
        $redirect = '';
        if (!empty($redirectParam)) {
            $cleanRedirect = ltrim($redirectParam, './');
            if (strpos($cleanRedirect, '/') === false && strpos($cleanRedirect, 'pages/') !== 0) {
                $redirect = '../pages/' . $cleanRedirect;
            } elseif (strpos($cleanRedirect, 'pages/') === 0) {
                $redirect = '../' . $cleanRedirect;
            } elseif (strpos($cleanRedirect, '../') === 0) {
                $redirect = $cleanRedirect;
            } else {
                $redirect = '../pages/' . $cleanRedirect;
            }
        } elseif ($_SESSION['is_seller'] && $_SESSION['seller_verified']) {
            $redirect = '../pages/seller-dashboard.php';
        } else {
            $redirect = '../pages/customer-dashboard.php';
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => $redirect
        ]);
        
    } catch (PDOException $e) {
        error_log("Signin database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/sign-out-handler.php`

**Status:** `FOUND`

```php
<?php
// Crooks-Cart-Collectives/database/sign-out-handler.php
// Function to get the base URL
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    
    // Remove /database/sign-out-handler.php from the path
    $basePath = dirname(dirname($scriptName));
    
    return $protocol . $host . $basePath . '/';
}

$baseUrl = getBaseUrl();

// Start session to check if user is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if this is an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// If already logged out, just return success
if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Already logged out',
            'redirect' => $baseUrl . 'pages/sign-in.php'  // CHANGED: index.php → pages/sign-in.php
        ]);
        exit;
    }
    header("Location: " . $baseUrl . "pages/sign-in.php");  // CHANGED: index.php → pages/sign-in.php
    exit;
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Return success for AJAX
if ($isAjax) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
        'redirect' => $baseUrl . 'pages/sign-in.php'  // CHANGED: index.php → pages/sign-in.php
    ]);
    exit;
}

// Regular request - redirect
header("Location: " . $baseUrl . "pages/sign-in.php");  // CHANGED: index.php → pages/sign-in.php
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/database/sign-up-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleSignup();

function formatPhoneForDisplay($phone) {
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($cleaned) === 11 && substr($cleaned, 0, 2) === '09') {
        return substr($cleaned, 0, 4) . ' ' . substr($cleaned, 4, 3) . ' ' . substr($cleaned, 7, 4);
    } elseif (strlen($cleaned) === 12 && substr($cleaned, 0, 2) === '63') {
        return '0' . substr($cleaned, 2, 3) . ' ' . substr($cleaned, 5, 3) . ' ' . substr($cleaned, 8, 4);
    }
    return $phone;
}

function formatPhoneForStorage($phone) {
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    
    if (strlen($cleaned) === 11 && substr($cleaned, 0, 2) === '09') {
        return $cleaned;
    }
    
    if (strlen($cleaned) === 12 && substr($cleaned, 0, 2) === '63') {
        return '0' . substr($cleaned, 2);
    }
    
    if (strlen($cleaned) === 13 && substr($cleaned, 0, 3) === '063') {
        return '0' . substr($cleaned, 3);
    }
    
    if (strlen($cleaned) === 13 && substr($cleaned, 0, 3) === '639') {
        return '0' . substr($cleaned, 2);
    }
    
    return $phone;
}

function handleSignup() {
    global $connection;
    
    error_log("Signup attempt: " . json_encode($_POST));
    
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => 'missing-field', 'field' => $field]);
            exit;
        }
    }
    
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
        exit;
    }
    
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (strlen($password) < 8) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
        exit;
    }
    if (strlen($password) > 16) {
        echo json_encode(['status' => 'error', 'message' => 'password-too-long']);
        exit;
    }
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        echo json_encode(['status' => 'error', 'message' => 'password-needs-mixed-case']);
        exit;
    }
    if (!preg_match('/[0-9]/', $password)) {
        echo json_encode(['status' => 'error', 'message' => 'password-needs-number']);
        exit;
    }
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
        exit;
    }
    
    $username = trim($_POST['username']);
    if (strlen($username) < 2) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-short']);
        exit;
    }
    if (strlen($username) > 15) {
        echo json_encode(['status' => 'error', 'message' => 'username-too-long']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $contact_number = trim($_POST['contact_number']);
    $storage_contact = formatPhoneForStorage($contact_number);
    
    $cleaned_contact = preg_replace('/[^0-9]/', '', $contact_number);
    if (!preg_match('/^09\d{9}$/', $storage_contact) && !preg_match('/^0\d{10}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$storage_contact]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    try {
        $birthdate = new DateTime($_POST['birthdate']);
        $today = new DateTime();
        $age = $birthdate->diff($today)->y;
        if ($age < 13) {
            echo json_encode(['status' => 'error', 'message' => 'underage']);
            exit;
        }
        if ($age > 120) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-age']);
        exit;
    }
    
    $user_data = [
        ':first_name' => htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8'),
        ':middle_name' => !empty($_POST['middle_name']) ? htmlspecialchars(trim($_POST['middle_name']), ENT_QUOTES, 'UTF-8') : null,
        ':last_name' => htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8'),
        ':email' => $email,
        ':username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
        ':password' => $password,
        ':birthdate' => $_POST['birthdate'],
        ':gender' => $_POST['gender'],
        ':contact_number' => $storage_contact,
        ':address' => htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8')
    ];
    
    try {
        $connection->beginTransaction();
        
        $sql = "INSERT INTO users (
                    first_name, middle_name, last_name, email, username, 
                    password, birthdate, gender, contact_number, address
                ) VALUES (
                    :first_name, :middle_name, :last_name, :email, :username,
                    :password, :birthdate, :gender, :contact_number, :address
                )";
        $stmt = $connection->prepare($sql);
        $stmt->execute($user_data);
        
        $userID = $connection->lastInsertId();
        
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$userID]);
        if (!$stmt->fetch()) {
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$userID]);
        }
        
        $connection->commit();
        
        $display_contact = formatPhoneForDisplay($storage_contact);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Account created successfully! Please sign in.',
            'redirect' => '../pages/sign-in.php',
            'delay' => 5000,
            'formatted_phone' => $display_contact
        ]);
        
    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Signup database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("General error in signup: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Oops! There was a problem creating your account. Please try again.']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/customer-profile-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

$userId = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'update_profile':
        handleProfileUpdate($userId);
        break;
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

function handleProfileUpdate($userId) {
    global $connection;
    
    $connection->beginTransaction();
    
    try {
        // Build update list – include empty values for nullable fields (set to NULL)
        $updates = [];
        $params = [];
        
        // Fields that can be updated (all are nullable except first/last/address, but we treat them separately)
        $allowedFields = ['first_name', 'middle_name', 'last_name', 'birthdate', 'gender', 'address'];
        // Fields that should be set to NULL when empty (others will keep old value if empty)
        $nullableFields = ['middle_name', 'birthdate', 'gender'];
        
        foreach ($allowedFields as $field) {
            if (isset($_POST[$field])) {
                $value = trim($_POST[$field]);
                if ($value === '') {
                    // If field is nullable, set to NULL; otherwise skip update (keep old value)
                    if (in_array($field, $nullableFields)) {
                        $updates[] = "$field = ?";
                        $params[] = null;
                    }
                    // else: required field empty – skip update, keep existing value
                } else {
                    $updates[] = "$field = ?";
                    $params[] = $value;
                }
            }
        }
        
        if (!empty($updates)) {
            $sql = "UPDATE users SET " . implode(', ', $updates) . " WHERE user_id = ?";
            $params[] = $userId;
            
            $stmt = $connection->prepare($sql);
            $stmt->execute($params);
        }
        
        // Handle profile picture upload
        $profilePicturePath = null;
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processFileUpload('profile', $userId, $_FILES['profile_picture']);
            
            if ($uploadResult['status'] === 'success') {
                $profilePicturePath = $uploadResult['path'];
                
                $stmt = $connection->prepare("UPDATE users SET profile_picture = ? WHERE user_id = ?");
                $stmt->execute([$profilePicturePath, $userId]);
            }
        }
        
        $connection->commit();
        
        // Fetch updated user data
        $stmt = $connection->prepare("SELECT first_name, middle_name, last_name, email, username, contact_number, birthdate, gender, address, profile_picture FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Generate URL for profile picture using data-storage-handler
        $profilePictureUrl = null;
        if (!empty($userData['profile_picture'])) {
            $profilePictureUrl = getFileUrl($userData['profile_picture']);
        }
        
        // Return success with data
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $userData,
            'profile_picture' => $userData['profile_picture'] ?? null,
            'profile_picture_url' => $profilePictureUrl
        ]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update profile']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/product-handler.php`

**Status:** `FOUND`

```php
<?php
// Crooks-Cart-Collectives/database/product-handler.php
session_start();
require_once 'database-connect.php';
require_once 'data-storage-handler.php';

header('Content-Type: application/json');

// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Check if user is logged in and is a seller
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
    exit;
}

$seller_id = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

error_log("Product handler action: " . $action . " for seller: " . $seller_id);

switch ($action) {
    case 'delete':
        handleDelete($connection, $seller_id);
        break;
        
    case 'toggle_status':
        handleToggleStatus($connection, $seller_id);
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

/**
 * Handle soft delete (set is_active = 0) and cancel pending orders
 */
function handleDelete($connection, $seller_id) {
    try {
        $product_id = $_POST['product_id'] ?? 0;
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            return;
        }
        
        // Verify product belongs to this seller
        $stmt = $connection->prepare("SELECT product_id, name FROM products WHERE product_id = ? AND seller_id = ?");
        $stmt->execute([$product_id, $seller_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
            return;
        }
        
        // Start transaction
        $connection->beginTransaction();
        
        // Soft delete the product (set is_active = 0)
        $stmt = $connection->prepare("UPDATE products SET is_active = 0 WHERE product_id = ?");
        $stmt->execute([$product_id]);
        
        // ===== CRITICAL: Cancel any pending orders for this product =====
        // Get all pending orders for this product
        $stmt = $connection->prepare("
            SELECT order_id, quantity 
            FROM orders 
            WHERE product_id = ? AND status = 'pending'
        ");
        $stmt->execute([$product_id]);
        $pendingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $cancelledCount = 0;
        
        if (!empty($pendingOrders)) {
            // Update all pending orders to cancelled
            $stmt = $connection->prepare("
                UPDATE orders 
                SET status = 'cancelled', 
                    cancelled_at = NOW(), 
                    cancelled_by = 'seller',
                    notes = CONCAT(IFNULL(notes, ''), ' Product removed by seller. Order automatically cancelled.')
                WHERE product_id = ? AND status = 'pending'
            ");
            $stmt->execute([$product_id]);
            $cancelledCount = $stmt->rowCount();
            
            // Restore stock for cancelled orders
            foreach ($pendingOrders as $order) {
                $stmt = $connection->prepare("
                    UPDATE products 
                    SET stock_quantity = stock_quantity + ? 
                    WHERE product_id = ?
                ");
                $stmt->execute([$order['quantity'], $product_id]);
            }
            
            error_log("Product removal: Cancelled {$cancelledCount} pending orders for product ID {$product_id}");
        }
        
        // Check if there are any carts containing this product and remove them
        $stmt = $connection->prepare("DELETE FROM carts WHERE product_id = ?");
        $stmt->execute([$product_id]);
        $cartsRemoved = $stmt->rowCount();
        
        if ($cartsRemoved > 0) {
            error_log("Product removal: Removed {$cartsRemoved} cart entries for product ID {$product_id}");
        }
        
        $connection->commit();
        
        $message = 'Product removed successfully';
        if ($cancelledCount > 0) {
            $message .= ". {$cancelledCount} pending order(s) have been automatically cancelled.";
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => $message,
            'data' => [
                'cancelled_orders' => $cancelledCount,
                'carts_removed' => $cartsRemoved,
                'product_name' => $product['name']
            ]
        ]);
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Product delete error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}

/**
 * Handle toggle product active status (for future use if needed)
 */
function handleToggleStatus($connection, $seller_id) {
    try {
        $product_id = $_POST['product_id'] ?? 0;
        $status = $_POST['status'] ?? 0; // 1 for active, 0 for inactive
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            return;
        }
        
        // Verify product belongs to this seller
        $stmt = $connection->prepare("SELECT product_id FROM products WHERE product_id = ? AND seller_id = ?");
        $stmt->execute([$product_id, $seller_id]);
        
        if (!$stmt->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
            return;
        }
        
        // Toggle status
        $stmt = $connection->prepare("UPDATE products SET is_active = ? WHERE product_id = ?");
        $stmt->execute([$status, $product_id]);
        
        // If setting to inactive, also handle pending orders
        if ($status == 0) {
            // Get all pending orders for this product
            $stmt = $connection->prepare("
                SELECT order_id, quantity 
                FROM orders 
                WHERE product_id = ? AND status = 'pending'
            ");
            $stmt->execute([$product_id]);
            $pendingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($pendingOrders)) {
                // Update all pending orders to cancelled
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'cancelled', 
                        cancelled_at = NOW(), 
                        cancelled_by = 'seller',
                        notes = CONCAT(IFNULL(notes, ''), ' Product deactivated by seller. Order automatically cancelled.')
                    WHERE product_id = ? AND status = 'pending'
                ");
                $stmt->execute([$product_id]);
                
                // Restore stock for cancelled orders
                foreach ($pendingOrders as $order) {
                    $stmt = $connection->prepare("
                        UPDATE products 
                        SET stock_quantity = stock_quantity + ? 
                        WHERE product_id = ?
                    ");
                    $stmt->execute([$order['quantity'], $product_id]);
                }
            }
            
            // Remove from carts
            $stmt = $connection->prepare("DELETE FROM carts WHERE product_id = ?");
            $stmt->execute([$product_id]);
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Product status updated successfully'
        ]);
        
    } catch (PDOException $e) {
        error_log("Product toggle error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/cart-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add_to_cart':
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            exit;
        }
        
        try {
            // Check if product exists and is active
            $stmt = $connection->prepare("
                SELECT p.*, s.seller_id 
                FROM products p 
                JOIN sellers s ON p.seller_id = s.seller_id 
                WHERE p.product_id = ? AND p.is_active = 1
            ");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();
            
            if (!$product) {
                echo json_encode(['status' => 'error', 'message' => 'Product not available']);
                exit;
            }
            
            if ($product['stock_quantity'] < $quantity) {
                echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
                exit;
            }
            
            // Check if already in cart
            $stmt = $connection->prepare("
                SELECT cart_id, quantity FROM carts 
                WHERE customer_id = ? AND product_id = ?
            ");
            $stmt->execute([$customer_id, $product_id]);
            $existing = $stmt->fetch();
            
            if ($existing) {
                // Update existing
                $newQuantity = $existing['quantity'] + $quantity;
                if ($newQuantity > $product['stock_quantity']) {
                    $newQuantity = $product['stock_quantity'];
                }
                
                $stmt = $connection->prepare("
                    UPDATE carts 
                    SET quantity = ?, price = ? 
                    WHERE cart_id = ?
                ");
                $stmt->execute([$newQuantity, $product['price'], $existing['cart_id']]);
            } else {
                // Insert new
                $stmt = $connection->prepare("
                    INSERT INTO carts (customer_id, product_id, seller_id, quantity, price) 
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([$customer_id, $product_id, $product['seller_id'], $quantity, $product['price']]);
            }
            
            echo json_encode(['status' => 'success', 'message' => 'Added to cart']);
            
        } catch (PDOException $e) {
            error_log("Add to cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        try {
            // Get product stock and check if product is active
            $stmt = $connection->prepare("
                SELECT c.cart_id, p.stock_quantity, p.is_active 
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.cart_id = ? AND c.customer_id = ?
            ");
            $stmt->execute([$cart_item_id, $customer_id]);
            $cartItem = $stmt->fetch();
            
            if (!$cartItem) {
                echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
                exit;
            }
            
            // Check if product is still active
            if (!$cartItem['is_active']) {
                // Remove inactive product from cart
                $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ?");
                $stmt->execute([$cart_item_id]);
                echo json_encode(['status' => 'error', 'message' => 'Product is no longer available and has been removed from cart']);
                exit;
            }
            
            if ($quantity > $cartItem['stock_quantity']) {
                echo json_encode(['status' => 'error', 'message' => 'Quantity exceeds available stock']);
                exit;
            }
            
            $stmt = $connection->prepare("UPDATE carts SET quantity = ? WHERE cart_id = ?");
            $stmt->execute([$quantity, $cart_item_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Update cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'remove':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        
        try {
            $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ? AND customer_id = ?");
            $stmt->execute([$cart_item_id, $customer_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Remove cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_count':
        try {
            // Only count active products in cart
            $stmt = $connection->prepare("
                SELECT COUNT(*) as count 
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.customer_id = ? AND p.is_active = 1
            ");
            $stmt->execute([$customer_id]);
            $count = $stmt->fetch()['count'];
            
            echo json_encode(['status' => 'success', 'count' => $count]);
            
        } catch (PDOException $e) {
            error_log("Get cart count error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'count' => 0]);
        }
        break;
        
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}
```

---

## File: `Crooks-Cart-Collectives/database/checkout-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

if ($action !== 'place_order') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

try {
    $connection->beginTransaction();
    
    // Check if this is a direct order (single product without cart) or cart checkout
    $product_id = $_POST['product_id'] ?? 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    if ($product_id > 0) {
        // Single product checkout (Buy Now)
        // Verify product is active
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id 
            FROM products p 
            JOIN sellers s ON p.seller_id = s.seller_id 
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        
        if (!$product) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Product not available']);
            exit;
        }
        
        if ($product['stock_quantity'] < $quantity) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }
        
        // Get user shipping address
        $stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        
        $shipping_address = $user['address'] ?? '';
        $subtotal = $product['price'] * $quantity;
        
        // Create order
        $stmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, seller_id, product_id, quantity, 
                price, subtotal, shipping_address, status, order_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
        ");
        $stmt->execute([
            $customer_id, 
            $product['seller_id'], 
            $product_id, 
            $quantity, 
            $product['price'], 
            $subtotal, 
            $shipping_address
        ]);
        
        // Update stock
        $new_stock = $product['stock_quantity'] - $quantity;
        $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
        $stmt->execute([$new_stock, $product_id]);
        
    } else {
        // Cart checkout - only include active products
        // Get cart items with product active status check
        $stmt = $connection->prepare("
            SELECT c.*, p.stock_quantity, p.is_active, p.price as current_price, p.name
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll();
        
        if (empty($cartItems)) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
            exit;
        }
        
        // Check for inactive products
        $inactiveProducts = [];
        foreach ($cartItems as $item) {
            if (!$item['is_active']) {
                $inactiveProducts[] = $item['name'];
            }
        }
        
        if (!empty($inactiveProducts)) {
            $connection->rollBack();
            $productList = implode(', ', $inactiveProducts);
            echo json_encode(['status' => 'error', 'message' => 'The following products are no longer available: ' . $productList]);
            exit;
        }
        
        // Check stock for all items
        foreach ($cartItems as $item) {
            if ($item['quantity'] > $item['stock_quantity']) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Insufficient stock for ' . $item['name']]);
                exit;
            }
        }
        
        // Get user shipping address
        $stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        $shipping_address = $user['address'] ?? '';
        
        // Create orders and update stock
        foreach ($cartItems as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            
            $stmt = $connection->prepare("
                INSERT INTO orders (
                    customer_id, seller_id, product_id, quantity, 
                    price, subtotal, shipping_address, status, order_date
                ) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
            ");
            $stmt->execute([
                $customer_id, 
                $item['seller_id'], 
                $item['product_id'], 
                $item['quantity'], 
                $item['price'], 
                $subtotal, 
                $shipping_address
            ]);
            
            // Update stock
            $new_stock = $item['stock_quantity'] - $item['quantity'];
            $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
            $stmt->execute([$new_stock, $item['product_id']]);
        }
        
        // Clear cart
        $stmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
        $stmt->execute([$customer_id]);
    }
    
    $connection->commit();
    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully', 'redirect' => 'orders.php']);
    
} catch (PDOException $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
}
```

---

## File: `Crooks-Cart-Collectives/database/order-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'get_customer_orders':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $customer_id = $_SESSION['customer_id'];
        
        try {
            // Get orders with product info, handling inactive products
            $stmt = $connection->prepare("
                SELECT 
                    o.order_id,
                    o.quantity,
                    o.price,
                    o.subtotal,
                    o.status,
                    o.order_date,
                    o.delivered_at,
                    o.cancelled_at,
                    o.cancelled_by,
                    o.shipping_address,
                    p.product_id,
                    p.name as product_name,
                    p.media_path as image_path,
                    p.is_active,
                    s.business_name as seller_name,
                    (SELECT COUNT(*) FROM product_reviews WHERE order_id = o.order_id) as has_review
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                JOIN sellers s ON o.seller_id = s.seller_id
                WHERE o.customer_id = ?
                ORDER BY o.order_date DESC
            ");
            $stmt->execute([$customer_id]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(['status' => 'success', 'data' => $orders]);
            
        } catch (PDOException $e) {
            error_log("Get customer orders error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_seller_orders':
        if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller'] || !isset($_SESSION['seller_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        
        $seller_id = $_SESSION['seller_id'];
        
        try {
            // Get orders with customer info, including inactive product flag
            $stmt = $connection->prepare("
                SELECT 
                    o.order_id,
                    o.quantity,
                    o.price,
                    o.subtotal,
                    o.status,
                    o.order_date,
                    o.delivered_at,
                    o.cancelled_at,
                    o.cancelled_by,
                    o.shipping_address,
                    p.product_id,
                    p.name as product_name,
                    p.media_path as image_path,
                    p.is_active,
                    u.first_name,
                    u.last_name,
                    u.email,
                    u.contact_number
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                JOIN customers c ON o.customer_id = c.customer_id
                JOIN users u ON c.user_id = u.user_id
                WHERE o.seller_id = ?
                ORDER BY o.order_date DESC
            ");
            $stmt->execute([$seller_id]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(['status' => 'success', 'data' => $orders]);
            
        } catch (PDOException $e) {
            error_log("Get seller orders error: " . $e->message);
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update_item_status':
        if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller'] || !isset($_SESSION['seller_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $new_status = $_POST['status'] ?? '';
        
        if (!in_array($new_status, ['delivered', 'cancelled'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid status']);
            exit;
        }
        
        $seller_id = $_SESSION['seller_id'];
        
        try {
            $connection->beginTransaction();
            
            // Verify order belongs to this seller and is pending
            $stmt = $connection->prepare("
                SELECT o.*, p.product_id, p.stock_quantity 
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                WHERE o.order_id = ? AND o.seller_id = ? AND o.status = 'pending'
            ");
            $stmt->execute([$order_id, $seller_id]);
            $order = $stmt->fetch();
            
            if (!$order) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be updated']);
                exit;
            }
            
            if ($new_status === 'cancelled') {
                // Restore stock when cancelling
                $new_stock = $order['stock_quantity'] + $order['quantity'];
                $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
                $stmt->execute([$new_stock, $order['product_id']]);
                
                $cancelled_by = 'seller';
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = ? 
                    WHERE order_id = ?
                ");
                $stmt->execute([$cancelled_by, $order_id]);
                
            } else if ($new_status === 'delivered') {
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'delivered', delivered_at = NOW() 
                    WHERE order_id = ?
                ");
                $stmt->execute([$order_id]);
            }
            
            $connection->commit();
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            $connection->rollBack();
            error_log("Update order status error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'cancel_item':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $customer_id = $_SESSION['customer_id'];
        
        try {
            $connection->beginTransaction();
            
            // Verify order belongs to this customer and is pending
            $stmt = $connection->prepare("
                SELECT o.*, p.product_id, p.stock_quantity 
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                WHERE o.order_id = ? AND o.customer_id = ? AND o.status = 'pending'
            ");
            $stmt->execute([$order_id, $customer_id]);
            $order = $stmt->fetch();
            
            if (!$order) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be cancelled']);
                exit;
            }
            
            // Restore stock
            $new_stock = $order['stock_quantity'] + $order['quantity'];
            $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
            $stmt->execute([$new_stock, $order['product_id']]);
            
            // Update order status
            $stmt = $connection->prepare("
                UPDATE orders 
                SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = 'customer' 
                WHERE order_id = ?
            ");
            $stmt->execute([$order_id]);
            
            $connection->commit();
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            $connection->rollBack();
            error_log("Cancel order error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update_shipping':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $shipping_address = $_POST['shipping_address'] ?? '';
        $customer_id = $_SESSION['customer_id'];
        
        if (empty($shipping_address)) {
            echo json_encode(['status' => 'error', 'message' => 'Shipping address cannot be empty']);
            exit;
        }
        
        try {
            $stmt = $connection->prepare("
                UPDATE orders 
                SET shipping_address = ? 
                WHERE order_id = ? AND customer_id = ? AND status = 'pending'
            ");
            $stmt->execute([$shipping_address, $order_id, $customer_id]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be updated']);
            }
            
        } catch (PDOException $e) {
            error_log("Update shipping error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}
```

---

## File: `Crooks-Cart-Collectives/database/review-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in as customer']);
    exit;
}

$user_id = $_SESSION['user_id'];
$customer_id = $_SESSION['customer_id'];

$order_id = $_POST['order_id'] ?? 0;
$product_id = $_POST['product_id'] ?? 0;
$rating = (int)($_POST['rating'] ?? 0);
$comment = trim($_POST['comment'] ?? '');

if (!$order_id || !$product_id || !$rating || $rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

try {
    // Verify order belongs to customer, is delivered, and matches product
    $stmt = $connection->prepare("
        SELECT order_id
        FROM orders
        WHERE order_id = ? 
          AND customer_id = ?
          AND product_id = ?
          AND status = 'delivered'
    ");
    $stmt->execute([$order_id, $customer_id, $product_id]);
    
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Item not delivered or not found']);
        exit;
    }

    // Check if already reviewed (unique order_id in product_reviews)
    $stmt = $connection->prepare("
        SELECT review_id FROM product_reviews
        WHERE order_id = ?
    ");
    $stmt->execute([$order_id]);
    
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
        exit;
    }

    // Insert review - is_edited and last_edited columns removed
    $stmt = $connection->prepare("
        INSERT INTO product_reviews (product_id, user_id, order_id, rating, comment, date_posted)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([$product_id, $user_id, $order_id, $rating, $comment]);

    echo json_encode(['status' => 'success', 'message' => 'Review submitted']);

} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
    } else {
        error_log("Review insert error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/report-seller-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

// Use the main error log
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in."]);
    exit;
}

require_once(__DIR__ . '/database-connect.php');

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!$data || !isset($data['seller_id']) || !isset($data['reason']) || !isset($data['details'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
    exit;
}

$seller_id = intval($data['seller_id']);
$reason = trim($data['reason']);
$details = trim($data['details']);
$reporter_id = $_SESSION['user_id'];

try {
    // Check if seller exists and is verified
    $checkSeller = $connection->prepare("SELECT seller_id FROM sellers WHERE seller_id = ? AND is_verified = 1");
    $checkSeller->execute([$seller_id]);
    
    if (!$checkSeller->fetch()) {
        echo json_encode(["status" => "error", "message" => "Seller not found or not verified."]);
        exit;
    }
    
    // Insert report
    $query = "INSERT INTO seller_reports (reporter_id, seller_id, reason, details, status, created_at) 
              VALUES (:reporter_id, :seller_id, :reason, :details, 'pending', NOW())";
    
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':reporter_id' => $reporter_id,
        ':seller_id' => $seller_id,
        ':reason' => $reason,
        ':details' => $details
    ]);
    
    $report_id = $connection->lastInsertId();
    
    echo json_encode([
        "status" => "success",
        "message" => "Report submitted successfully. An administrator will review it.",
        "report_id" => $report_id
    ]);
    
} catch (Exception $e) {
    error_log("Report submission error: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => "Failed to save report."]);
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/validation.php`

**Status:** `FOUND`

```php
<?php
// Validation functions for authentication

function validateSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    if (!empty($errors)) {
        return ['valid' => false, 'errors' => $errors];
    }
    
    // Email validation
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    // Password validation
    $password = $data['password'];
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (strlen($password) > 16) {
        $errors['password'] = 'Password must not exceed 16 characters';
    }
    
    // Password match
    if ($password !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // Username validation
    $username = trim($data['username']);
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Username must be 3-20 characters (letters, numbers, underscore)';
    }
    
    // Phone validation (Philippine format)
    $phone = preg_replace('/[^0-9+]/', '', $data['contact_number']);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $phone) && !preg_match('/^0\d{10}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number';
    }
    
    // Age validation
    $birthdate = new DateTime($data['birthdate']);
    $today = new DateTime();
    $age = $birthdate->diff($today)->y;
    
    if ($age < 13) {
        $errors['birthdate'] = 'You must be at least 13 years old';
    } elseif ($age > 120) {
        $errors['birthdate'] = 'Invalid birthdate';
    }
    
    // Name validation
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', trim($data['first_name']))) {
        $errors['first_name'] = 'First name can only contain letters, spaces, hyphens';
    }
    
    if (!empty($data['last_name']) && !preg_match('/^[a-zA-Z\s\-\']+$/', trim($data['last_name']))) {
        $errors['last_name'] = 'Last name can only contain letters, spaces, hyphens';
    }
    
    // Address validation
    if (strlen(trim($data['address'])) < 10) {
        $errors['address'] = 'Address must be at least 10 characters';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? $data['usernameOrEmail'] ?? '');
    $password = $data['password'] ?? $data['loginPassword'] ?? '';
    
    if (empty($identifier)) {
        $errors['identifier'] = 'Email or username is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'identifier' => $identifier,
        'password' => $password
    ];
}

function checkDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^639(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    }
    
    return $phone;
}

function logError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/error_log.txt`

**Status:** `MISSING`

*[File not found]*

---

## File: `Crooks-Cart-Collectives/database/data-storage-handler.php`

**Status:** `FOUND`

```php
<?php
// data-storage-handler.php - Handles all file operations including serving files

/**
 * Process file upload and return result array
 * 
 * @param string $type 'profile', 'valid_id', or 'verification'
 * @param int $userId User ID
 * @param array $file $_FILES['file'] array
 * @param string|null $subtype For verification: 'identity' or 'id_document'
 * @return array ['status' => 'success'|'error', 'message' => string, 'path' => string (if success)]
 */
function processFileUpload($type, $userId, $file, $subtype = null) {
    
    if (empty($type) || empty($userId) || !is_numeric($userId)) {
        return ['status' => 'error', 'message' => 'Missing required parameters'];
    }

    if (!in_array($type, ['profile', 'valid_id', 'verification'])) {
        return ['status' => 'error', 'message' => 'Invalid file type'];
    }

    if ($type === 'verification' && !in_array($subtype, ['identity', 'id_document'])) {
        return ['status' => 'error', 'message' => 'Invalid verification subtype'];
    }

    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        error_log("Data storage: File upload error");
        return ['status' => 'error', 'message' => 'File upload failed'];
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        return ['status' => 'error', 'message' => 'File size exceeds 2MB'];
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($detectedType, $allowedTypes)) {
        return ['status' => 'error', 'message' => 'Invalid file type. Only JPG, PNG, GIF, WEBP allowed.'];
    }

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $baseDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/users/' . $userId . '/';

    if ($type === 'verification') {
        $targetDir = $baseDir . 'verification/';
        // Fixed filenames: identity.* or id_document.*
        if ($subtype === 'identity') {
            $filename = 'identity.' . $extension;
        } else { // id_document
            $filename = 'id_document.' . $extension;
        }
    } elseif ($type === 'profile') {
        $targetDir = $baseDir . 'profile/';
        $filename = 'profile.jpg'; // Always jpg for profile
    } else { // valid_id (legacy, but we now use verification for both)
        $targetDir = $baseDir . 'valid_id/';
        $filename = time() . '_' . uniqid() . '.' . $extension;
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Data storage: Failed to create directory $targetDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create storage directory'];
        }
    }

    // Delete any existing file with same base name but different extension
    if ($type === 'verification') {
        $pattern = $targetDir . $subtype . '.*';
        array_map('unlink', glob($pattern));
    }

    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        error_log("Data storage: Failed to move uploaded file to $targetPath");
        return ['status' => 'error', 'message' => 'Failed to save file'];
    }

    chmod($targetPath, 0644);

    if ($type === 'verification') {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/verification/' . $filename;
    } elseif ($type === 'profile') {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/profile/profile.jpg';
    } else {
        $relativePath = 'Crooks-Data-Storage/users/' . $userId . '/valid_id/' . $filename;
    }

    error_log("Data storage: File saved successfully: $relativePath");

    return [
        'status' => 'success',
        'message' => 'File uploaded successfully',
        'path' => $relativePath
    ];
}

/**
 * Process product media uploads (multiple images and one optional video)
 * 
 * @param int $productId The product ID
 * @param array $imageFiles Array of image files from $_FILES['images'] (multiple)
 * @param array|null $videoFile Single video file from $_FILES['video'] (optional)
 * @return array ['status' => 'success'|'error', 'message' => string, 'paths' => array (if success)]
 */
function processProductMediaUpload($productId, $imageFiles, $videoFile = null) {
    if (empty($productId) || !is_numeric($productId)) {
        return ['status' => 'error', 'message' => 'Invalid product ID'];
    }

    // Validate images
    if (!isset($imageFiles) || !is_array($imageFiles['name'])) {
        return ['status' => 'error', 'message' => 'No images uploaded'];
    }

    $imageCount = count(array_filter($imageFiles['name']));
    if ($imageCount < 2) {
        return ['status' => 'error', 'message' => 'At least 2 images are required'];
    }
    if ($imageCount > 5) {
        return ['status' => 'error', 'message' => 'Maximum 5 images allowed'];
    }

    // Allowed image types
    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $allowedVideoTypes = ['video/mp4'];

    // Target directory
    $baseDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/products/' . $productId . '/media/';
    if (!is_dir($baseDir)) {
        if (!mkdir($baseDir, 0755, true)) {
            error_log("Data storage: Failed to create product media directory $baseDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create media directory'];
        }
    }

    // Clear existing media files (optional, depending on update)
    array_map('unlink', glob($baseDir . '*'));

    $uploadedPaths = [];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    // Process images
    $imageIndex = 1;
    foreach ($imageFiles['tmp_name'] as $key => $tmpName) {
        if ($imageFiles['error'][$key] !== UPLOAD_ERR_OK) {
            continue;
        }

        $detectedType = finfo_file($finfo, $tmpName);
        if (!in_array($detectedType, $allowedImageTypes)) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Invalid image type. Only JPG, PNG, GIF, WEBP allowed.'];
        }

        if ($imageFiles['size'][$key] > 2 * 1024 * 1024) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Each image must be ≤ 2MB'];
        }

        $extension = strtolower(pathinfo($imageFiles['name'][$key], PATHINFO_EXTENSION));
        $filename = 'thumbnail_' . $imageIndex . '.' . $extension;
        $targetPath = $baseDir . $filename;

        if (!move_uploaded_file($tmpName, $targetPath)) {
            error_log("Data storage: Failed to move image to $targetPath");
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Failed to save image ' . $imageIndex];
        }

        chmod($targetPath, 0644);
        $uploadedPaths['images'][] = 'Crooks-Data-Storage/products/' . $productId . '/media/' . $filename;
        $imageIndex++;
    }

    // Process video (optional)
    if ($videoFile && $videoFile['error'] === UPLOAD_ERR_OK) {
        $detectedType = finfo_file($finfo, $videoFile['tmp_name']);
        if (!in_array($detectedType, $allowedVideoTypes)) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Invalid video type. Only MP4 allowed.'];
        }

        if ($videoFile['size'] > 20 * 1024 * 1024) {
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Video must be ≤ 20MB'];
        }

        $extension = strtolower(pathinfo($videoFile['name'], PATHINFO_EXTENSION));
        $filename = 'video_1.' . $extension;
        $targetPath = $baseDir . $filename;

        if (!move_uploaded_file($videoFile['tmp_name'], $targetPath)) {
            error_log("Data storage: Failed to move video to $targetPath");
            finfo_close($finfo);
            return ['status' => 'error', 'message' => 'Failed to save video'];
        }

        chmod($targetPath, 0644);
        $uploadedPaths['video'] = 'Crooks-Data-Storage/products/' . $productId . '/media/' . $filename;
    }

    finfo_close($finfo);
    
    // Store only the directory path in the database
    $mediaDir = 'Crooks-Data-Storage/products/' . $productId . '/media/';
    
    return [
        'status' => 'success',
        'message' => 'Product media uploaded successfully',
        'paths' => $uploadedPaths,
        'media_path' => $mediaDir
    ];
}

/**
 * Delete all media for a product
 * 
 * @param int $productId
 * @return bool
 */
function deleteProductMedia($productId) {
    if (empty($productId) || !is_numeric($productId)) {
        return false;
    }
    $mediaDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/products/' . $productId . '/media/';
    if (is_dir($mediaDir)) {
        array_map('unlink', glob($mediaDir . '*'));
        rmdir($mediaDir);
        return true;
    }
    return false;
}

/**
 * Get the first thumbnail image for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return string|null The filename of the first thumbnail, or null if none found
 */
function getFirstProductThumbnail($mediaPath) {
    if (empty($mediaPath)) {
        return null;
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return null;
    }
    
    $files = glob($fullPath . 'thumbnail_1.*');
    if (!empty($files)) {
        return basename($files[0]);
    }
    
    return null;
}

/**
 * Get all thumbnail images for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return array Array of thumbnail filenames
 */
function getAllProductThumbnails($mediaPath) {
    if (empty($mediaPath)) {
        return [];
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return [];
    }
    
    $thumbnails = [];
    for ($i = 1; $i <= 5; $i++) {
        $files = glob($fullPath . 'thumbnail_' . $i . '.*');
        if (!empty($files)) {
            $thumbnails[] = basename($files[0]);
        }
    }
    
    return $thumbnails;
}

/**
 * Get the video file for a product
 * 
 * @param string $mediaPath The media directory path from database
 * @return string|null The filename of the video, or null if none found
 */
function getProductVideo($mediaPath) {
    if (empty($mediaPath)) {
        return null;
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (!is_dir($fullPath)) {
        return null;
    }
    
    $files = glob($fullPath . 'video_1.*');
    if (!empty($files)) {
        return basename($files[0]);
    }
    
    return null;
}

/**
 * Convenience function for verification uploads
 */
function processVerificationUpload($userId, $file, $subtype) {
    return processFileUpload('verification', $userId, $file, $subtype);
}

/**
 * Get the full server path for a stored file
 * 
 * @param string $relativePath Path relative to project root
 * @return string Full server path to the file
 */
function getStoragePath($relativePath) {
    if (empty($relativePath)) {
        return null;
    }
    return dirname(__DIR__, 2) . '/' . $relativePath;
}

/**
 * Check if a file exists in storage
 * 
 * @param string $relativePath Path relative to project root
 * @return bool True if file exists
 */
function storageFileExists($relativePath) {
    if (empty($relativePath)) {
        return false;
    }
    
    $fullPath = getStoragePath($relativePath);
    return file_exists($fullPath);
}

/**
 * Get the URL to access a file (using a script to serve files from outside web root)
 * 
 * @param string $path Path to the file (can be full path or directory + filename)
 * @param string|null $filename Optional filename if path is just a directory
 * @return string URL to access the file
 */
function getFileUrl($path, $filename = null) {
    if (empty($path)) {
        return '';
    }
    
    // If filename is provided, combine with path
    if ($filename !== null) {
        $fullPath = rtrim($path, '/') . '/' . $filename;
    } else {
        $fullPath = $path;
    }
    
    // For files in assets folder (already web accessible)
    if (strpos($fullPath, 'assets/') === 0) {
        return '../' . $fullPath;
    }
    
    // For files in Crooks-Data-Storage, use this same file as a server
    if (strpos($fullPath, 'Crooks-Data-Storage/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($fullPath);
    }
    
    // For any other path
    return '../' . $fullPath;
}

/**
 * Serve a file from storage (outputs file directly)
 * 
 * @param string $relativePath Path relative to project root
 */
function serveFile($relativePath) {
    if (empty($relativePath)) {
        http_response_code(400);
        die('File path required');
    }
    
    // Security: Prevent directory traversal
    $relativePath = str_replace(['../', '..\\', './', '.\\'], '', $relativePath);
    
    // Ensure path starts with Crooks-Data-Storage/
    if (strpos($relativePath, 'Crooks-Data-Storage/') !== 0) {
        http_response_code(403);
        die('Invalid file path');
    }
    
    // Parse the path to determine file type
    $pathParts = explode('/', $relativePath);
    
    // Check if this is a user file (requires authentication)
    if (count($pathParts) >= 3 && $pathParts[1] === 'users') {
        // This is a user file - require login
        session_start();
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            die('Authentication required to access user files');
        }
        
        $fileUserId = (int)$pathParts[2];
        if ($fileUserId !== $_SESSION['user_id']) {
            http_response_code(403);
            die('Access denied: You do not own this file.');
        }
    }
    
    // For product media (products/{product_id}/...), allow public access
    // No authentication required for product images
    
    // ===== WILDCARD SEARCH FOR THUMBNAILS =====
    // Check if path contains wildcard (*) for extension search
    if (strpos($relativePath, 'thumbnail_1.*') !== false) {
        // Extract the base directory
        $baseDir = str_replace('thumbnail_1.*', '', $relativePath);
        $fullBaseDir = getStoragePath($baseDir);
        
        // Search for any thumbnail_1 file
        $thumbFiles = glob($fullBaseDir . 'thumbnail_1.*');
        if (!empty($thumbFiles)) {
            $actualFile = basename($thumbFiles[0]);
            $relativePath = $baseDir . $actualFile;
        } else {
            http_response_code(404);
            die('Thumbnail not found');
        }
    }
    
    $fullPath = getStoragePath($relativePath);
    
    if (!$fullPath || !file_exists($fullPath)) {
        http_response_code(404);
        die('File not found');
    }
    
    $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    
    $contentTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml',
        'pdf' => 'application/pdf',
        'mp4' => 'video/mp4'
    ];
    
    $contentType = $contentTypes[$extension] ?? 'application/octet-stream';
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // Cache for 1 day
    
    readfile($fullPath);
    exit;
}

// Handle direct requests to this file
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    // Check for serve action
    $action = $_GET['action'] ?? $_POST['action'] ?? '';
    
    if ($action === 'serve') {
        $path = $_GET['path'] ?? '';
        serveFile($path);
        exit;
    }
    
    // Default file upload handling (requires login)
    session_start();
    if (!isset($_SESSION['user_id'])) {
        http_response_code(403);
        die(json_encode(['status' => 'error', 'message' => 'Authentication required']));
    }
    
    header('Content-Type: application/json');
    
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/error_log.txt');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
        exit;
    }

    $type = $_POST['type'] ?? '';
    $userId = $_POST['user_id'] ?? $_SESSION['user_id'] ?? '';
    $file = $_FILES['file'] ?? null;

    // Verify user ID matches session
    if ($userId != $_SESSION['user_id']) {
        http_response_code(403);
        echo json_encode(['status' => 'error', 'message' => 'User ID mismatch']);
        exit;
    }

    $result = processFileUpload($type, $userId, $file);
    
    if ($result['status'] === 'error') {
        http_response_code(400);
    }
    
    echo json_encode($result);
    exit;
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/seller-fill-form-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'update_seller') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleSellerUpdate();

function handleSellerUpdate() {
    global $connection;
    
    $userId = $_SESSION['user_id'];
    
    // Check if user is already a seller
    $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
    $stmt->execute([$userId]);
    $existingSeller = $stmt->fetch(PDO::FETCH_ASSOC);
    $isSeller = !empty($existingSeller);
    
    // Validate required fields - INCLUDING BUSINESS NAME NOW
    $requiredFields = ['first_name', 'last_name', 'birthdate', 'gender', 'address', 'business_name'];
    $missingFields = [];
    
    foreach ($requiredFields as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            $missingFields[] = $field;
        }
    }
    
    // If there are missing required fields, return error
    if (!empty($missingFields)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all required fields including Store Name.',
            'missing_fields' => $missingFields
        ]);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        // Update users table
        $updateUserSQL = "
            UPDATE users SET
                first_name = :first_name,
                middle_name = :middle_name,
                last_name = :last_name,
                birthdate = :birthdate,
                gender = :gender,
                address = :address
            WHERE user_id = :user_id
        ";
        
        $stmt = $connection->prepare($updateUserSQL);
        $stmt->execute([
            ':first_name' => trim($_POST['first_name']),
            ':middle_name' => !empty($_POST['middle_name']) ? trim($_POST['middle_name']) : null,
            ':last_name' => trim($_POST['last_name']),
            ':birthdate' => $_POST['birthdate'],
            ':gender' => $_POST['gender'],
            ':address' => trim($_POST['address']),
            ':user_id' => $userId
        ]);
        
        // Handle file uploads
        $identityPath = null;
        $idDocumentPath = null;
        
        // Process identity photo if uploaded
        if (isset($_FILES['identity_photo']) && $_FILES['identity_photo']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processVerificationUpload($userId, $_FILES['identity_photo'], 'identity');
            if ($uploadResult['status'] === 'success') {
                $identityPath = $uploadResult['path'];
            } else {
                throw new Exception('Identity photo upload failed: ' . $uploadResult['message']);
            }
        }
        
        // Process ID document if uploaded
        if (isset($_FILES['id_document']) && $_FILES['id_document']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = processVerificationUpload($userId, $_FILES['id_document'], 'id_document');
            if ($uploadResult['status'] === 'success') {
                $idDocumentPath = $uploadResult['path'];
            } else {
                throw new Exception('ID document upload failed: ' . $uploadResult['message']);
            }
        }
        
        // Update or insert seller record
        if ($isSeller) {
            // Update existing seller - business_name is required
            $updateSellerSQL = "
                UPDATE sellers SET
                    business_name = :business_name
            ";
            
            // Only update file paths if new files were uploaded
            if ($identityPath) {
                $updateSellerSQL .= ", identity_path = :identity_path";
            }
            if ($idDocumentPath) {
                $updateSellerSQL .= ", id_document_path = :id_document_path";
            }
            
            $updateSellerSQL .= " WHERE user_id = :user_id";
            
            $stmt = $connection->prepare($updateSellerSQL);
            $params = [
                ':business_name' => trim($_POST['business_name']), // Required now
                ':user_id' => $userId
            ];
            
            if ($identityPath) {
                $params[':identity_path'] = $identityPath;
            }
            if ($idDocumentPath) {
                $params[':id_document_path'] = $idDocumentPath;
            }
            
            $stmt->execute($params);
        } else {
            // Insert new seller - business_name is required
            $insertSellerSQL = "
                INSERT INTO sellers (
                    user_id, 
                    business_name, 
                    identity_path, 
                    id_document_path,
                    is_verified,
                    date_applied
                ) VALUES (
                    :user_id,
                    :business_name,
                    :identity_path,
                    :id_document_path,
                    0,
                    NOW()
                )
            ";
            
            $stmt = $connection->prepare($insertSellerSQL);
            $stmt->execute([
                ':user_id' => $userId,
                ':business_name' => trim($_POST['business_name']), // Required now
                ':identity_path' => $identityPath,
                ':id_document_path' => $idDocumentPath
            ]);
        }
        
        $connection->commit();
        
        // Update session if needed
        if (!$isSeller) {
            $_SESSION['is_seller'] = true;
            // Get the new seller_id
            $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
            $stmt->execute([$userId]);
            $seller = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($seller) {
                $_SESSION['seller_id'] = $seller['seller_id'];
                $_SESSION['seller_verified'] = false;
            }
        }
        
        // Fetch updated user data for response
        $stmt = $connection->prepare("SELECT first_name, last_name FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode([
            'status' => 'success',
            'message' => $isSeller ? 'Seller information updated successfully!' : 'Seller application submitted successfully!',
            'data' => [
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name']
            ]
        ]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Seller update error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to save seller information. Please try again.'
        ]);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/seller-new-product-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$sellerId = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

if ($action !== 'add' && $action !== 'update') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

if ($action === 'add') {
    addProduct($sellerId);
} else {
    updateProduct($sellerId);
}

function addProduct($sellerId) {
    global $connection;

    // Validate required fields
    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Validate images (at least 2, max 5)
    if (!isset($_FILES['images'])) {
        echo json_encode(['status' => 'error', 'message' => 'Please upload product images']);
        exit;
    }

    $imageCount = count(array_filter($_FILES['images']['name']));
    if ($imageCount < 2) {
        echo json_encode(['status' => 'error', 'message' => 'At least 2 images are required']);
        exit;
    }
    if ($imageCount > 5) {
        echo json_encode(['status' => 'error', 'message' => 'Maximum 5 images allowed']);
        exit;
    }

    // Start transaction
    $connection->beginTransaction();

    try {
        // Insert product record with temporary media_path (will update after upload)
        $stmt = $connection->prepare("
            INSERT INTO products (seller_id, name, category, price, stock_quantity, description, date_added)
            VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->execute([
            $sellerId,
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['stock_quantity'],
            $_POST['description']
        ]);
        $productId = $connection->lastInsertId();

        // Upload media using data-storage-handler (images only)
        $uploadResult = processProductMediaUpload($productId, $_FILES['images'], null); // no video

        if ($uploadResult['status'] !== 'success') {
            throw new Exception($uploadResult['message']);
        }

        // Update product with media_path (directory path)
        $mediaPath = 'Crooks-Data-Storage/products/' . $productId . '/media/';
        $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
        $stmt->execute([$mediaPath, $productId]);

        $connection->commit();

        echo json_encode([
            'status' => 'success',
            'message' => 'Product added successfully',
            'product_id' => $productId
        ]);

    } catch (Exception $e) {
        $connection->rollBack();
        // Delete any partially uploaded media
        deleteProductMedia($productId);
        error_log("Add product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

function updateProduct($sellerId) {
    global $connection;

    $productId = $_POST['product_id'] ?? 0;
    if (!$productId) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership
    $stmt = $connection->prepare("SELECT product_id, media_path FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$productId, $sellerId]);
    $existing = $stmt->fetch();
    if (!$existing) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
        exit;
    }

    // Validate required fields
    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // If new images are uploaded, validate them
    $newImagesUploaded = isset($_FILES['images']) && count(array_filter($_FILES['images']['name'])) > 0;
    if ($newImagesUploaded) {
        $imageCount = count(array_filter($_FILES['images']['name']));
        if ($imageCount < 2) {
            echo json_encode(['status' => 'error', 'message' => 'At least 2 images are required']);
            exit;
        }
        if ($imageCount > 5) {
            echo json_encode(['status' => 'error', 'message' => 'Maximum 5 images allowed']);
            exit;
        }
    }

    $connection->beginTransaction();

    try {
        // Update product details
        $stmt = $connection->prepare("
            UPDATE products
            SET name = ?, category = ?, price = ?, stock_quantity = ?, description = ?
            WHERE product_id = ? AND seller_id = ?
        ");
        $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['stock_quantity'],
            $_POST['description'],
            $productId,
            $sellerId
        ]);

        // If new media uploaded, delete old and upload new
        if ($newImagesUploaded) {
            // Delete existing media
            deleteProductMedia($productId);

            // Upload new media (images only)
            $uploadResult = processProductMediaUpload($productId, $_FILES['images'], null);
            if ($uploadResult['status'] !== 'success') {
                throw new Exception($uploadResult['message']);
            }

            // Update media_path (it might be the same, but ensure it's set)
            $mediaPath = 'Crooks-Data-Storage/products/' . $productId . '/media/';
            $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
            $stmt->execute([$mediaPath, $productId]);
        }

        $connection->commit();

        echo json_encode([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'product_id' => $productId
        ]);

    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Update product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
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

