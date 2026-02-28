# Web Project: Crooks-Cart-Collectives

**Preset:** specific-filesToShow

**Generated:** 2026-03-01 01:56:09

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
**Generated:** 2026-03-01 01:56:07
**Mode:** all

```
Crooks-Cart-Collectives/
│
├── assets/
│   └── image/
│       ├── brand/
│       │   └── Logo.png
│       ├── icons/
│       │   ├── Showcase1.png
│       │   ├── Showcase2.png
│       │   ├── about-empty.svg
│       │   ├── about-filled.svg
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
│       └── team/
│           ├── charles-canoneo.png
│           ├── christian-adviento.png
│           ├── christian-mendoza.png
│           ├── clark-mallo.png
│           ├── kishiekel-fernandez.png
│           ├── lance-madelar.png
│           ├── rylle-bernardino.png
│           └── william-aranez.png
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
│   ├── sign-in-handler.php
│   ├── sign-out-handler.php
│   ├── sign-up-handler.php
│   └── validation.php
├── logs/
│   ├── backend/
│   ├── content-fetcher-configuration/
│   │   ├── linux-path.py
│   │   ├── specific-filesToShow.py
│   │   └── windows-preset.py
│   ├── output/
│   │   ├── 0.0.17.md
│   │   ├── Project_Structure.md
│   │   ├── linux-path_Summary.md
│   │   ├── preset_Summary.md
│   │   └── specific-filesToShow_Summary.md
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
│   ├── product-details.php
│   ├── products.php
│   ├── report-seller.php
│   ├── seller-add-product.php
│   ├── seller-dashboard.php
│   ├── seller-fill-form.php
│   ├── seller-orders.php
│   ├── seller-products.php
│   ├── sign-in.php
│   ├── sign-up.php
│   └── terms-and-conditions.php
├── scripts/
│   ├── cart.js
│   ├── central-link-navigation.js
│   ├── checkout.js
│   ├── contact.js
│   ├── customer-profile.js
│   ├── error-handler.js
│   ├── header.js
│   ├── index.js
│   ├── orders.js
│   ├── product-details.js
│   ├── report-seller.js
│   ├── seller-dashboard.js
│   ├── seller-orders.js
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
│   ├── product-details.css
│   ├── products.css
│   ├── profile.css
│   ├── report-seller.css
│   ├── seller-dashboard.css
│   ├── seller-orders.css
│   ├── seller-registration.css
│   ├── sign-in.css
│   ├── sign-out.css
│   ├── sign-up.css
│   └── terms-and-conditions.css
├── .gitignore
├── LICENSE
├── README.md
└── index.php
```

## Summary

| File Type | Count |
|-----------|-------|
| HTML Files | 0 |
| PHP Files | 35 |
| CSS Files | 21 |
| JavaScript Files | 17 |
| JSON Files | 0 |
| Text/Markdown | 9 |
| Image Files | 55 |
| Other Files | 13 |

**Total Directories:** 15
**Total Files:** 149

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
// FIXED VERSION - Replaced emoji icons with SVG icons
?>
<?php
session_start();
require_once('database/database-connect.php');

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
                        <a href="pages/products.php" class="showcase-button">Shop Now</a>
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
                    // FIX: Properly handle the image path from database
                    $imagePath = '';
                    if (!empty($product['image_path'])) {
                        // Check if it's already a full URL
                        if (filter_var($product['image_path'], FILTER_VALIDATE_URL)) {
                            $imagePath = $product['image_path'];
                        } 
                        // Check if it's a relative path starting with assets/
                        elseif (strpos($product['image_path'], 'assets/') === 0) {
                            $imagePath = $product['image_path']; // Direct path from root
                        }
                        // Check if it's just a filename
                        elseif (strpos($product['image_path'], '/') === false) {
                            $imagePath = 'assets/image/icons/' . $product['image_path'];
                        }
                        // Any other relative path
                        else {
                            $imagePath = $product['image_path'];
                        }
                    }
                    
                    // If still empty, use placeholder
                    if (empty($imagePath)) {
                        $imagePath = 'assets/image/icons/PlaceholderAssetProduct.png';
                    }
                    ?>
                            <img src="<?php echo htmlspecialchars($imagePath); ?>"
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
                <a href="pages/products.php" class="view-all-products-btn">View All Products</a>
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
    -- removed last_updated
);

-- =====================================================
-- ADMINISTRATORS TABLE
-- =====================================================
CREATE TABLE administrators (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contact_number VARCHAR(15),
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- renamed from date_created
);

-- =====================================================
-- CUSTOMERS TABLE
-- =====================================================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Removed denormalized fields: total_orders, total_spent
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
    valid_id_path VARCHAR(255),
    is_verified BOOLEAN DEFAULT FALSE,
    verification_date TIMESTAMP NULL,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Consider removing these denormalized fields:
    -- total_products INT DEFAULT 0,
    -- total_sales DECIMAL(10, 2) DEFAULT 0.00,
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
    image_path VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,  -- KEEP: used in queries
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- KEEP: used for sorting
    -- removed last_updated
    
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
    price DECIMAL(10, 2) NOT NULL,  -- renamed from price_at_time
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- keep this
    -- removed updated_at
    
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
    
    -- Order details
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,  -- renamed from price_at_time
    subtotal DECIMAL(10, 2) GENERATED ALWAYS AS (quantity * price) STORED,
    
    -- Shipping & payment
    shipping_address VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL DEFAULT 'Cash on Delivery',
    
    -- Order tracking
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'delivered', 'cancelled') DEFAULT 'pending',
    
    -- Cancellation tracking - keep separate, they track different aspects
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
    -- is_edited and last_edited removed
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
    p.image_path AS product_image,
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
    p.image_path AS product_image,
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
    p.image_path AS product_image,
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
    date_joined  -- renamed from date_created
) VALUES
(
    'Admin', 
    'One', 
    'admin1@crookscart.com', 
    '+639123456789', 
    'admin1', 
    'admin123',
    NOW()
),
(
    'Admin', 
    'Two', 
    'admin2@crookscart.com', 
    '+639987654321', 
    'admin2', 
    'admin456',
    NOW()
);

-- =========================
-- VERIFY ADMIN INSERTION
-- =========================
-- SELECT * FROM administrators;
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
-- MAKE THEM SELLERS
-- =========================

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Aling Bebang''s Tiangge', TRUE FROM users WHERE username = 'alingbebang';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Totoy Bibo Bargains', TRUE FROM users WHERE username = 'totoybibo';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'El Bimbo''s Ukay-Ukay', TRUE FROM users WHERE username = 'thelastelbimby';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Pure Foods Paninda', TRUE FROM users WHERE username = 'hotdog';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Ninja''s Hidden Treasures', TRUE FROM users WHERE username = 'ninja';

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
        // Update text fields
        $updates = [];
        $params = [];
        
        $allowedFields = [
            'first_name', 'middle_name', 'last_name', 
            'birthdate', 'gender', 'address'
        ];
        
        foreach ($allowedFields as $field) {
            if (isset($_POST[$field]) && trim($_POST[$field]) !== '') {
                $updates[] = "$field = ?";
                $params[] = trim($_POST[$field]);
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
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$sellerId = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'add':
        addProduct($sellerId);
        break;
    case 'update':
        updateProduct($sellerId);
        break;
    case 'delete':
        deleteProduct($sellerId);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function addProduct($sellerId) {
    global $connection;

    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Handle image upload
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/products/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . $sellerId . '.' . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = 'database/uploads/products/' . $fileName;
        }
    }

    $stmt = $connection->prepare("
        INSERT INTO products (seller_id, name, category, price, stock_quantity, description, image_path, date_added)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([
        $sellerId,
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['stock_quantity'],
        $_POST['description'],
        $imagePath
    ]);

    // Removed total_products update – column no longer exists

    echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
}

function updateProduct($sellerId) {
    global $connection;

    if (empty($_POST['product_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership
    $stmt = $connection->prepare("SELECT product_id FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_POST['product_id'], $sellerId]);
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
        exit;
    }

    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Handle image upload (optional)
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/products/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . $sellerId . '.' . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = 'database/uploads/products/' . $fileName;
        }
    }

    $query = "UPDATE products SET name=?, category=?, price=?, stock_quantity=?, description=?";
    $params = [$_POST['name'], $_POST['category'], $_POST['price'], $_POST['stock_quantity'], $_POST['description']];

    if ($imagePath) {
        $query .= ", image_path=?";
        $params[] = $imagePath;
    }

    $query .= " WHERE product_id=? AND seller_id=?";
    $params[] = $_POST['product_id'];
    $params[] = $sellerId;

    $stmt = $connection->prepare($query);
    $stmt->execute($params);

    echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
}

function deleteProduct($sellerId) {
    global $connection;

    if (empty($_POST['product_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership and delete
    $stmt = $connection->prepare("DELETE FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_POST['product_id'], $sellerId]);

    if ($stmt->rowCount() > 0) {
        // Removed total_products update – column no longer exists
        
        echo json_encode(['status' => 'success', 'message' => 'Product deleted']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
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
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add_to_cart':
        addToCart($customer_id);
        break;
    case 'update':
        updateCartItem($customer_id);
        break;
    case 'remove':
        removeCartItem();
        break;
    case 'get_count':
        getCartCount($customer_id);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function addToCart($customerId) {
    global $connection;
    
    $productId = $_POST['product_id'] ?? 0;
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$productId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid product or quantity']);
        exit;
    }

    try {
        // Get product and seller info
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id, s.business_name 
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
            exit;
        }

        // Check stock
        if ($quantity > $product['stock_quantity']) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }

        // Check if item already in cart
        $stmt = $connection->prepare("
            SELECT cart_id, quantity 
            FROM carts 
            WHERE customer_id = ? AND product_id = ?
        ");
        $stmt->execute([$customerId, $productId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            // Update quantity in cart
            $newQuantity = $existing['quantity'] + $quantity;
            
            // Check stock again for new quantity
            if ($newQuantity > $product['stock_quantity']) {
                echo json_encode(['status' => 'error', 'message' => 'Cannot add more than available stock']);
                exit;
            }
            
            $stmt = $connection->prepare("
                UPDATE carts 
                SET quantity = ?
                WHERE cart_id = ?
            ");
            $stmt->execute([$newQuantity, $existing['cart_id']]);
        } else {
            // Insert new cart item - using 'price' instead of 'price_at_time'
            $stmt = $connection->prepare("
                INSERT INTO carts (customer_id, seller_id, product_id, quantity, price)
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $customerId,
                $product['seller_id'],
                $productId,
                $quantity,
                $product['price']
            ]);
        }

        echo json_encode(['status' => 'success', 'message' => 'Added to cart']);
        
    } catch (PDOException $e) {
        error_log("Add to cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function updateCartItem($customerId) {
    global $connection;
    
    $cartId = $_POST['cart_item_id'] ?? 0;
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$cartId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    try {
        // Verify cart item belongs to customer and get product stock
        $stmt = $connection->prepare("
            SELECT p.stock_quantity
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.cart_id = ? AND c.customer_id = ?
        ");
        $stmt->execute([$cartId, $customerId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
            exit;
        }
        
        if ($quantity > $result['stock_quantity']) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }

        $stmt = $connection->prepare("
            UPDATE carts 
            SET quantity = ?
            WHERE cart_id = ? AND customer_id = ?
        ");
        $stmt->execute([$quantity, $cartId, $customerId]);

        echo json_encode(['status' => 'success']);
        
    } catch (PDOException $e) {
        error_log("Update cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Update failed']);
    }
}

function removeCartItem() {
    global $connection;
    
    $cartId = $_POST['cart_item_id'] ?? 0;

    if (!$cartId) {
        echo json_encode(['status' => 'error', 'message' => 'Item ID missing']);
        exit;
    }

    try {
        $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ?");
        $stmt->execute([$cartId]);

        echo json_encode(['status' => 'success']);
        
    } catch (PDOException $e) {
        error_log("Remove cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Remove failed']);
    }
}

function getCartCount($customerId) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT SUM(quantity) as count 
            FROM carts 
            WHERE customer_id = ?
        ");
        $stmt->execute([$customerId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'] ?? 0;
        
        echo json_encode(['status' => 'success', 'count' => (int)$count]);
    } catch (PDOException $e) {
        error_log("Get cart count error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'count' => 0]);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/checkout-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

// Fetch shipping address from user profile
$stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
if (!$user || empty($user['address'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please complete your profile with a shipping address first.']);
    exit;
}
$shipping_address = $user['address'];

try {
    $connection->beginTransaction();

    // Check if this is a single product checkout (Buy Now)
    $singleProductId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $singleQuantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    if ($singleProductId > 0 && $singleQuantity > 0) {
        // Single product checkout
        // Fetch product details
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$singleProductId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            throw new Exception('Product not found');
        }

        if ($singleQuantity > $product['stock_quantity']) {
            throw new Exception("Insufficient stock for {$product['name']}");
        }

        // Insert order
        $orderStmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, seller_id, product_id, quantity, price,
                shipping_address, payment_method, status, order_date
            )
            VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery', 'pending', NOW())
        ");
        $orderStmt->execute([
            $customer_id,
            $product['seller_id'],
            $product['product_id'],
            $singleQuantity,
            $product['price'],
            $shipping_address
        ]);

        // Reduce stock
        $updateStock = $connection->prepare("UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ?");
        $updateStock->execute([$singleQuantity, $product['product_id']]);
    } else {
        // Normal cart checkout
        // Get cart items
        $stmt = $connection->prepare("
            SELECT c.*, p.name, p.stock_quantity, p.seller_id
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($cartItems)) {
            echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
            exit;
        }

        // Insert orders and update stock
        foreach ($cartItems as $item) {
            // Final stock check
            if ($item['quantity'] > $item['stock_quantity']) {
                throw new Exception("Insufficient stock for {$item['name']}");
            }

            $orderStmt = $connection->prepare("
                INSERT INTO orders (
                    customer_id, seller_id, product_id, quantity, price,
                    shipping_address, payment_method, status, order_date
                )
                VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery', 'pending', NOW())
            ");
            $orderStmt->execute([
                $customer_id,
                $item['seller_id'],
                $item['product_id'],
                $item['quantity'],
                $item['price'],
                $shipping_address
            ]);

            // Reduce stock
            $updateStock = $connection->prepare("UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ?");
            $updateStock->execute([$item['quantity'], $item['product_id']]);
        }

        // Clear the cart
        $clearStmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
        $clearStmt->execute([$customer_id]);
    }

    $connection->commit();

    echo json_encode([
        'status' => 'success',
        'message' => 'Order placed successfully',
        'redirect' => 'orders.php'
    ]);

} catch (Exception $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order: ' . $e->getMessage()]);
}
?>
```

---

## File: `Crooks-Cart-Collectives/database/order-handler.php`

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

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_customer_orders':
        getCustomerOrders();
        break;
    case 'cancel_item':
        cancelOrderItem();
        break;
    case 'get_seller_orders':
        getSellerOrders();
        break;
    case 'update_item_status':
        updateItemStatus();
        break;
    case 'update_shipping':
        updateShippingAddress();
        break;
    case 'get_default_address':
        getDefaultAddress();
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function getCustomerOrders() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                o.order_id,
                o.product_id,
                o.quantity,
                o.price,
                o.subtotal,
                o.status,
                o.shipping_address,
                o.order_date,
                o.delivered_at,
                o.cancelled_at,
                o.cancelled_by,
                p.name AS product_name,
                p.image_path,
                s.business_name AS seller_name,
                (SELECT COUNT(*) FROM product_reviews pr WHERE pr.order_id = o.order_id) AS has_review
            FROM orders o
            JOIN products p ON o.product_id = p.product_id
            JOIN sellers s ON o.seller_id = s.seller_id
            WHERE o.customer_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$customer_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['status' => 'success', 'data' => $rows]);
        
    } catch (Exception $e) {
        error_log("getCustomerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function cancelOrderItem() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    $order_id = $_POST['order_id'] ?? 0;
    
    if (!$order_id) {
        echo json_encode(['status' => 'error', 'message' => 'Order ID required']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status, quantity, product_id
            FROM orders
            WHERE order_id = ? AND customer_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $customer_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order can only be cancelled when status is pending']);
            exit;
        }
        
        $update = $connection->prepare("
            UPDATE orders
            SET status = 'cancelled', 
                cancelled_by = 'customer',
                cancelled_at = NOW()
            WHERE order_id = ? AND customer_id = ?
        ");
        $update->execute([$order_id, $customer_id]);
        
        $restore = $connection->prepare("
            UPDATE products 
            SET stock_quantity = stock_quantity + ? 
            WHERE product_id = ?
        ");
        $restore->execute([$order['quantity'], $order['product_id']]);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Order cancelled successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("cancelOrderItem error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to cancel order']);
    }
}

function getSellerOrders() {
    global $connection;
    
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                o.order_id,
                o.customer_id,
                o.product_id,
                o.quantity,
                o.price,
                o.subtotal,
                o.status,
                o.shipping_address,
                o.payment_method,
                o.order_date,
                o.delivered_at,
                o.cancelled_at,
                o.cancelled_by,
                p.name AS product_name,
                p.image_path,
                u.first_name,
                u.last_name,
                u.email,
                u.contact_number,
                s.business_name
            FROM orders o
            JOIN products p ON o.product_id = p.product_id
            JOIN customers c ON o.customer_id = c.customer_id
            JOIN users u ON c.user_id = u.user_id
            JOIN sellers s ON o.seller_id = s.seller_id
            WHERE o.seller_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$seller_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['status' => 'success', 'data' => $rows]);
        
    } catch (Exception $e) {
        error_log("getSellerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function updateItemStatus() {
    global $connection;
    
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    $order_id = $_POST['order_id'] ?? 0;
    $status = $_POST['status'] ?? '';
    
    $allowed_statuses = ['delivered', 'cancelled'];
    if (!$order_id || !in_array($status, $allowed_statuses)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid parameters']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status, quantity, product_id
            FROM orders
            WHERE order_id = ? AND seller_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $seller_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order cannot be updated from current status']);
            exit;
        }
        
        if ($status === 'delivered') {
            $update = $connection->prepare("
                UPDATE orders
                SET status = 'delivered',
                    delivered_at = NOW()
                WHERE order_id = ? AND seller_id = ?
            ");
            $update->execute([$order_id, $seller_id]);
            
            // Removed total_sales update – column no longer exists
            
        } else if ($status === 'cancelled') {
            $update = $connection->prepare("
                UPDATE orders
                SET status = 'cancelled',
                    cancelled_by = 'seller',
                    cancelled_at = NOW()
                WHERE order_id = ? AND seller_id = ?
            ");
            $update->execute([$order_id, $seller_id]);
            
            $restore = $connection->prepare("
                UPDATE products 
                SET stock_quantity = stock_quantity + ? 
                WHERE product_id = ?
            ");
            $restore->execute([$order['quantity'], $order['product_id']]);
        }
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Order status updated to ' . $status]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("updateItemStatus error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
    }
}

function updateShippingAddress() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    $order_id = $_POST['order_id'] ?? 0;
    $shipping_address = trim($_POST['shipping_address'] ?? '');
    
    if (!$order_id || empty($shipping_address)) {
        echo json_encode(['status' => 'error', 'message' => 'Order ID and shipping address required']);
        exit;
    }
    
    if (strlen($shipping_address) < 5) {
        echo json_encode(['status' => 'error', 'message' => 'Shipping address must be at least 5 characters']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status
            FROM orders
            WHERE order_id = ? AND customer_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $customer_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Shipping address can only be updated for pending orders']);
            exit;
        }
        
        $update = $connection->prepare("
            UPDATE orders
            SET shipping_address = ?
            WHERE order_id = ? AND customer_id = ?
        ");
        $update->execute([$shipping_address, $order_id, $customer_id]);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Shipping address updated successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("updateShippingAddress error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update shipping address']);
    }
}

function getDefaultAddress() {
    global $connection;
    
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT address 
            FROM users 
            WHERE user_id = ?
        ");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && !empty($user['address'])) {
            echo json_encode(['status' => 'success', 'address' => $user['address']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No default address found']);
        }
        
    } catch (Exception $e) {
        error_log("getDefaultAddress error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch default address']);
    }
}
?>
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

## File: `Crooks-Cart-Collectives/database/data-storage-handler.php`

**Status:** `FOUND`

```php
<?php
// data-storage-handler.php - Handles all file operations including serving files

/**
 * Process file upload and return result array
 * 
 * @param string $type 'profile' or 'valid_id'
 * @param int $userId User ID
 * @param array $file $_FILES['file'] array
 * @return array ['status' => 'success'|'error', 'message' => string, 'path' => string (if success)]
 */
function processFileUpload($type, $userId, $file) {
    
    if (empty($type) || empty($userId) || !is_numeric($userId)) {
        return ['status' => 'error', 'message' => 'Missing required parameters'];
    }

    if (!in_array($type, ['profile', 'valid_id'])) {
        return ['status' => 'error', 'message' => 'Invalid file type'];
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

    $baseDir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/users/' . $userId . '/';
    if ($type === 'profile') {
        $targetDir = $baseDir . 'profile/';
        $filename = 'profile.jpg';
    } else {
        $targetDir = $baseDir . 'valid_id/';
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . uniqid() . '.' . $extension;
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Data storage: Failed to create directory $targetDir");
            return ['status' => 'error', 'message' => 'Server error: cannot create storage directory'];
        }
    }

    if ($type === 'profile') {
        $pattern = $targetDir . 'profile.*';
        array_map('unlink', glob($pattern));
    }

    $targetPath = $targetDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        error_log("Data storage: Failed to move uploaded file to $targetPath");
        return ['status' => 'error', 'message' => 'Failed to save file'];
    }

    chmod($targetPath, 0644);

    if ($type === 'profile') {
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
 * @param string $relativePath Path relative to project root (e.g., 'Crooks-Data-Storage/users/1/profile/profile.jpg')
 * @return string URL to access the file
 */
function getFileUrl($relativePath) {
    if (empty($relativePath)) {
        return '';
    }
    
    // For files in assets folder (already web accessible)
    if (strpos($relativePath, 'assets/') === 0) {
        return '../' . $relativePath;
    }
    
    // For files in Crooks-Data-Storage, use this same file as a server
    if (strpos($relativePath, 'Crooks-Data-Storage/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($relativePath);
    }
    
    // For any other path
    return '../' . $relativePath;
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
        'pdf' => 'application/pdf'
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
        // Serve file - require login for security
        session_start();
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            die('Access denied');
        }
        
        $path = $_GET['path'] ?? '';
        serveFile($path);
        exit;
    }
    
    // Default file upload handling
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
    $userId = $_POST['user_id'] ?? '';
    $file = $_FILES['file'] ?? null;

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
                <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
                <?php else: ?>
                <!-- LOGGED IN: No Home, About, Contact -->
                <?php if ($isSeller): ?>
                <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
                <?php else: ?>
                <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
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
        <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
        <?php else: ?>
        <!-- LOGGED IN: No Home, About, Contact -->
        <?php if ($isSeller): ?>
        <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
        <?php else: ?>
        <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>
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

            <!-- Personal Info Section with Profile Preview on Left -->
            <div class="form-section personal-info-section">
                <h3>Profile Information</h3>
                
                <!-- PROFILE CONTAINER with LEFT and RIGHT divs - 35/65 split -->
                <div class="profile-row">
                    <!-- LEFT DIV - 35% - Fixed containing picture -->
                    <div class="profile-left-col">
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

                    <!-- RIGHT DIV - 65% - Contains [First name last name] and [choose photo button] -->
                    <div class="profile-right-col">
                        <!-- First name and last name display on ONE LINE -->
                        <div class="profile-name-row">
                            <span class="first-name"><?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="last-name"><?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                        
                        <!-- Choose button container - fixed size button -->
                        <div class="choose-button-container" id="chooseButtonContainer" style="display: none;">
                            <button type="button" class="btn-choose-photo" id="triggerFileUpload">Choose Photo to Upload</button>
                        </div>
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

## File: `Crooks-Cart-Collectives/scripts/customer-profile.js`

**Status:** `FOUND`

```javascript
// customer-profile.js - Fixed for edit functionality with left preview

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

    console.log('Editable inputs found:', editableInputs.length);

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

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
        console.log('Enabling edit mode');
        isEditMode = true;
        editBtn.textContent = 'Cancel';
        saveBtn.disabled = false;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'block';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'block';
        }
        editableInputs.forEach(field => {
            field.disabled = false;
            console.log('Enabling field:', field.id || 'unnamed field');
        });
        pictureChanged = false;
    }

    // Disable edit mode
    function disableEditMode(restore = true) {
        console.log('Disabling edit mode, restore:', restore);
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

    // Edit/Cancel button
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            console.log('Edit/Cancel clicked, isEditMode:', isEditMode);
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
            console.log('Save clicked');
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const address = addressInput ? addressInput.value.trim() : '';

            if (!firstName || !lastName || !address) {
                showModal('First name, last name, and address are required.');
                return;
            }

            // Disable button
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
                    
                    // Add 1 second delay before handling
                    setTimeout(() => {
                        // If picture was changed, force a full page reload
                        if (pictureChanged) {
                            window.location.reload(true);
                        } else {
                            // For text-only updates, just exit edit mode
                            disableEditMode(false);
                            saveBtn.disabled = false;
                            saveBtn.textContent = originalText;
                        }
                    }, 1000);
                    
                    // If no picture change, we'll handle it in the setTimeout above
                    if (!pictureChanged) {
                        return;
                    }
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

    // Initial store
    storeOriginalValues();
});
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

## File: `Crooks-Cart-Collectives/styles/profile.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/profile.css */
/* 35/65 split layout with fixed button size */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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

/* PROFILE ROW - 35/65 split */
.profile-row {
    display: flex;
    width: 100%;
    margin-bottom: 30px;
    align-items: center; /* This centers items vertically */
}

/* LEFT COLUMN - 35% - Fixed containing picture */
.profile-left-col {
    flex: 0 0 35%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Center content vertically */
    padding-right: 20px;
}

.profile-left-col img {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #FF8246;
    background: #f0f0f0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* RIGHT COLUMN - 65% - Contains name and button */
.profile-right-col {
    flex: 0 0 65%;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
    gap: 16px;
    padding-left: 15px;
    min-height: 180px; /* Match approximate height of profile picture */
}

/* Name container - STACKED VERTICALLY */
.profile-name-container {
    display: flex;
    flex-direction: column; /* Stack vertically */
    gap: 4px;
    margin-bottom: 0;
}

.first-name {
    font-size: 2.2rem;
    font-weight: 600;
    color: #000000;
    line-height: 1.2;
}

.last-name {
    font-size: 2.2rem;
    font-weight: 600;
    color: #000000;
    line-height: 1.2;
}

/* Choose button container */
.choose-button-container {
    margin-top: 4px;
}

/* REVISED BUTTON - width based on text content */
.btn-choose-photo {
    background-color: #000000;
    color: #ffffff;
    border: none;
    border-radius: 30px; /* More rounded, pill shape */
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.3px;
    padding: 10px 24px;
    width: auto; /* Width based on content */
    min-width: 0; /* Remove min-width constraint */
    max-width: 100%; /* But don't exceed container */
    text-align: center;
    border: 1px solid #000000;
    white-space: nowrap; /* Keep text on one line */
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
    display: none; /* Hide the label, we use the button instead */
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
    font-weight: 600;
    color: #000000;
    font-size: 0.85rem;
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

/* Info row - for account info items */
.info-row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 20px;
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

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #FF8246;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 130, 70, 0.1);
}

/* Adjust input font size based on content width */
.form-group input[type="text"] {
    font-size: clamp(0.85rem, 2vw, 1rem);
    text-overflow: ellipsis;
}

/* DISABLED STATE - Darker background and text for better visibility */
.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    background-color: #e0e0e0;
    color: #333333;
    border-color: #666666;
    cursor: not-allowed;
    opacity: 0.9;
}

/* Make placeholder text in disabled fields also darker */
.form-group input:disabled::placeholder,
.form-group select:disabled::placeholder,
.form-group textarea:disabled::placeholder {
    color: #555555;
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

/* Info Group - for account info */
.info-group {
    flex: 1 1 0;
    min-width: 150px;
}

.info-group label {
    display: block;
    font-weight: 600;
    color: #000000;
    font-size: 0.85rem;
    margin-bottom: 4px;
    opacity: 0.8;
    text-align: left;
}

.info-value {
    font-size: 1rem;
    color: #000000;
    word-break: break-word;
    background: #f9f9f9;
    padding: 8px 12px;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
}

/* Info note - centered */
.info-note {
    margin-top: 10px;
    margin-bottom: 25px;
    font-size: 0.85rem;
    color: #666666;
    font-style: italic;
    text-align: center;
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

.btn-secondary:hover:not(:disabled) {
    background-color: #333333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.btn:disabled {
    opacity: 0.5;
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

/* ========== DESKTOP VIEW (35/65 split) ========== */
@media (min-width: 769px) {
    .profile-left-col img {
        width: 180px;
        height: 180px;
    }
    
    .profile-right-col {
        min-height: 180px; /* Match the image height */
    }
    
    .first-name {
        font-size: 2.4rem;
    }
    
    .last-name {
        font-size: 2.4rem;
    }
    
    .btn-choose-photo {
        padding: 12px 32px;
        font-size: 1.1rem;
        border-radius: 40px;
    }
}

/* ========== TABLET VIEW ========== */
@media (min-width: 577px) and (max-width: 768px) {
    .profile-left-col {
        flex: 0 0 40%;
        padding-right: 15px;
    }
    
    .profile-right-col {
        flex: 0 0 60%;
        padding-left: 10px;
        min-height: 160px; /* Match the image height */
    }
    
    .profile-left-col img {
        width: 140px;
        height: 140px;
    }
    
    .first-name {
        font-size: 1.8rem;
    }
    
    .last-name {
        font-size: 1.8rem;
    }
    
    .btn-choose-photo {
        padding: 10px 28px;
        font-size: 1rem;
        border-radius: 30px;
    }
}

/* ========== MOBILE VIEW (Stacked and centered) ========== */
@media (max-width: 576px) {
    .profile-row {
        flex-direction: column;
        align-items: center;
    }
    
    .profile-left-col {
        flex: 0 0 auto;
        width: 100%;
        padding-right: 0;
        margin-bottom: 15px;
    }
    
    .profile-left-col img {
        width: 140px;
        height: 140px;
    }
    
    .profile-right-col {
        flex: 0 0 auto;
        width: 100%;
        padding-left: 0;
        align-items: center;
        text-align: center;
        gap: 10px;
        min-height: auto; /* Remove min-height on mobile */
    }
    
    .profile-name-container {
        align-items: center;
    }
    
    .first-name {
        font-size: 1.8rem;
    }
    
    .last-name {
        font-size: 1.8rem;
    }
    
    .choose-button-container {
        display: flex;
        justify-content: center;
        width: 100%;
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
    }
    
    .info-group {
        width: 100%;
    }
    
    .profile-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .profile-actions .btn {
        width: 100%;
    }
}

/* ========== SMALL MOBILE VIEW ========== */
@media (max-width: 375px) {
    .profile-left-col img {
        width: 120px;
        height: 120px;
    }
    
    .first-name {
        font-size: 1.5rem;
    }
    
    .last-name {
        font-size: 1.5rem;
    }
    
    .btn-choose-photo {
        padding: 8px 20px;
        font-size: 0.9rem;
    }
} 
```

---

