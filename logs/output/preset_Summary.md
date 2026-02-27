# Web Project: Crooks-Cart-Collectives

**Preset:** preset

**Generated:** 2026-02-27 19:35:54

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
**Generated:** 2026-02-27 19:35:52
**Mode:** all

```
Crooks-Cart-Collectives/
│
├── assets/
│   └── image/
│       ├── brand/
│       │   └── Logo.png
│       ├── icons/
│       │   ├── cancel.svg
│       │   ├── cart-arrow-downsvg.svg
│       │   ├── cart-arrow-up.svg
│       │   ├── cart-plus.svg
│       │   ├── cart-shopping-fast.svg
│       │   ├── cart-shopping.svg
│       │   ├── chart-line-up.svg
│       │   ├── complaint-icon.png
│       │   ├── facebook.svg
│       │   ├── github.svg
│       │   ├── hamburger-menu.svg
│       │   ├── instagram.svg
│       │   ├── logoutsvg.svg
│       │   ├── mail.svg
│       │   ├── order.svg
│       │   ├── package.svg
│       │   ├── password-hide.svg
│       │   ├── password-unhide.svg
│       │   ├── seller-product-placeholder.png
│       │   ├── Showcase1.png
│       │   ├── Showcase2.png
│       │   ├── star-empty.svg
│       │   ├── star-filled.svg
│       │   ├── submit-picture-icon.png
│       │   ├── submit-valid-id-icon.png
│       │   ├── trash.svg
│       │   ├── updatesvg.svg
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
│   ├── content-fetcher-configuration/
│   │   └── preset.py
│   ├── output/
│   │   ├── 0.0.17.md
│   │   ├── preset_Summary.md
│   │   └── Project_Structure.md
│   ├── requirement/
│   │   ├── Apply Tree map.md
│   │   └── Instructions.md
│   ├── content-fetcher.py
│   ├── runner.bat
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
├── index.php
├── LICENSE
└── README.md
```

## Summary

| File Type | Count |
|-----------|-------|
| HTML Files | 0 |
| PHP Files | 34 |
| CSS Files | 21 |
| JavaScript Files | 16 |
| JSON Files | 0 |
| Text/Markdown | 7 |
| Image Files | 37 |
| Other Files | 10 |

**Total Directories:** 14
**Total Files:** 124

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
                            <img src="assets/image/icons/cart-shopping.svg" alt="Shopping cart icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Local Community</h3>
                        <p>Buy and sell within your trusted community members</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/package.svg" alt="Verified package icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Verified Sellers</h3>
                        <p>All sellers are verified with valid government IDs</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/cart-arrow-up.svg" alt="Delivery truck icon"
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
-- SIMPLIFIED - No triggers, let PHP handle everything
-- =====================================================
CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;
USE crooks_cart_collectives;

-- =====================================================
-- USERS TABLE (Base table for all users)
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
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- CUSTOMERS TABLE
-- =====================================================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_orders INT DEFAULT 0,
    total_spent DECIMAL(10, 2) DEFAULT 0.00,
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
    total_products INT DEFAULT 0,
    total_sales DECIMAL(10, 2) DEFAULT 0.00,
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
    is_active BOOLEAN DEFAULT TRUE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
    price_at_time DECIMAL(10, 2) NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    
    UNIQUE KEY unique_cart_item (customer_id, product_id),
    INDEX idx_customer_cart (customer_id, added_at)
);

-- =====================================================
-- ORDERS TABLE (Simplified - PHP handles all logic)
-- =====================================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    seller_id INT NOT NULL,
    product_id INT NOT NULL,
    
    -- Order details
    quantity INT NOT NULL,
    price_at_time DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) GENERATED ALWAYS AS (quantity * price_at_time) STORED,
    
    -- Shipping & payment
    shipping_address VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL DEFAULT 'Cash on Delivery',
    
    -- Order tracking
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM(
        'pending',      -- Initial state: Order placed, awaiting seller confirmation
        'delivered',    -- Completed: Seller confirmed the order
        'cancelled'     -- Cancelled: Either customer cancelled or seller cancelled
    ) DEFAULT 'pending',
    
    -- Cancellation tracking
    cancelled_by ENUM('customer', 'seller') NULL,
    
    -- Timestamps
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
    is_edited BOOLEAN DEFAULT FALSE,
    last_edited TIMESTAMP NULL,
    
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
    date_created
) VALUES
(
    'Admin', 
    'One', 
    'admin1@crookscart.com', 
    '+639123456789', 
    'admin1', 
    '$2y$10$YourHashedPasswordHere1234567890', -- Replace with actual hashed password
    NOW()
),
(
    'Admin', 
    'Two', 
    'admin2@crookscart.com', 
    '+639987654321', 
    'admin2', 
    '$2y$10$YourHashedPasswordHere0987654321', -- Replace with actual hashed password
    NOW()
);

-- Note: For demo purposes with plain text passwords (as per project requirements),
-- you can use these simpler inserts:
/*
INSERT INTO administrators (first_name, last_name, email, contact_number, username, password) VALUES
('Super', 'Admin', 'admin@crookscart.com', '+639123456789', 'admin', 'admin123'),
('System', 'Administrator', 'sysadmin@crookscart.com', '+639987654321', 'sysadmin', 'admin456');
*/

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
-- INSERT 5 SELLER USERS
-- =========================

INSERT INTO users (
first_name, last_name, email, username, password, address
) VALUES
('Aling', 'Bebang', 'aling.bebang@Sellerdummy.com', 'alingbebang', '123', '123 Market Ave., Purok 5, Tambakan 2, Brgy. San Miguel, Pasig City'),
('Totoy', 'Bibo', 'totoy.bibo@Sellerdummy.com', 'totoybibo', '123', '45 Mabini St., Purok 3, Brgy. Guadalupe, Cebu City'),
('El', 'Bimbo', 'el.bimbo@Sellerdummy.com', 'thelastelbimby', '123', '78 Rizal Ave., Purok 7, Brgy. Buhangin, Davao City'),
('Pure', 'Foods', 'pure.foods@Sellerdummy.com', 'hotdog', '123', '22 Session Rd., Purok 12, Brgy. Aurora Hill, Baguio City'),
('Lebron', 'James', 'lebron.james@Sellerdummy.com', 'ninja', '123', '15 Delgado St., Purok 2, Brgy. Jaro, Iloilo City');

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
        
        // Update last login timestamp
        $stmt = $connection->prepare("UPDATE users SET last_updated = NOW() WHERE user_id = ?");
        $stmt->execute([$user['user_id']]);
        
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
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $contact_number = trim($_POST['contact_number']);
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized_contact]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    $cleaned_contact = preg_replace('/[^0-9+]/', '', $contact_number);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $cleaned_contact) && 
        !preg_match('/^0\d{10}$/', $cleaned_contact)) {
        echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
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
        ':contact_number' => $normalized_contact,
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
        
        // Check if customer record already exists (shouldn't, but just in case)
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$userID]);
        if (!$stmt->fetch()) {
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$userID]);
        }
        
        $connection->commit();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Account created successfully! Please sign in.',
            'redirect' => '../pages/sign-in.php',
            'delay' => 5000
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
header('Content-Type: application/json');
require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$userID = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'update_profile':
        updateProfile($userID);
        break;
    case 'become_seller':
        becomeSeller($userID);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^639(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^0(\d{10})$/', $phone, $matches)) {
        return '+63' . substr($matches[1], 1);
    }
    return $phone;
}

function validatePhoneNumber($phone) {
    $cleaned = preg_replace('/[^0-9+]/', '', $phone);
    return preg_match('/^(09|\+639|639)\d{9}$/', $cleaned) || 
           preg_match('/^0\d{10}$/', $cleaned);
}

function updateProfile($userID) {
    global $connection;
    
    $required = ['first_name', 'last_name', 'contact_number', 'address'];
    foreach ($required as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }
    
    $contact_number = trim($_POST['contact_number']);
    if (!validatePhoneNumber($contact_number)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format']);
        exit;
    }
    
    $normalized_contact = normalizePhoneNumber($contact_number);
    
    // Check if phone number is already used by another user
    $checkStmt = $connection->prepare("
        SELECT user_id FROM users 
        WHERE contact_number = ? AND user_id != ?
    ");
    $checkStmt->execute([$normalized_contact, $userID]);
    if ($checkStmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Phone number already registered']);
        exit;
    }
    
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $middle_name = !empty($_POST['middle_name']) ? trim($_POST['middle_name']) : null;
    
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', $first_name)) {
        echo json_encode(['status' => 'error', 'message' => 'First name contains invalid characters']);
        exit;
    }
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', $last_name)) {
        echo json_encode(['status' => 'error', 'message' => 'Last name contains invalid characters']);
        exit;
    }
    if ($middle_name && !preg_match('/^[a-zA-Z\s\-\']+$/', $middle_name)) {
        echo json_encode(['status' => 'error', 'message' => 'Middle name contains invalid characters']);
        exit;
    }
    
    $address = trim($_POST['address']);
    if (strlen($address) < 10) {
        echo json_encode(['status' => 'error', 'message' => 'Address must be at least 10 characters']);
        exit;
    }
    
    $birthdate = !empty($_POST['birthdate']) ? $_POST['birthdate'] : null;
    if ($birthdate) {
        $birthDateObj = new DateTime($birthdate);
        $today = new DateTime();
        $age = $birthDateObj->diff($today)->y;
        if ($age < 13) {
            echo json_encode(['status' => 'error', 'message' => 'You must be at least 13 years old']);
            exit;
        }
        if ($age > 120) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid birthdate']);
            exit;
        }
    }
    
    $fields = [
        'first_name' => htmlspecialchars($first_name, ENT_QUOTES, 'UTF-8'),
        'middle_name' => $middle_name ? htmlspecialchars($middle_name, ENT_QUOTES, 'UTF-8') : null,
        'last_name' => htmlspecialchars($last_name, ENT_QUOTES, 'UTF-8'),
        'birthdate' => $birthdate,
        'gender' => $_POST['gender'] ?? null,
        'contact_number' => $normalized_contact,
        'address' => htmlspecialchars($address, ENT_QUOTES, 'UTF-8')
    ];
    
    $setClause = [];
    $params = [];
    foreach ($fields as $key => $value) {
        $setClause[] = "$key = ?";
        $params[] = $value;
    }
    $params[] = $userID;
    
    try {
        $connection->beginTransaction();
        
        $query = "UPDATE users SET " . implode(', ', $setClause) . ", last_updated = NOW() WHERE user_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Profile update error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Update failed: ' . $e->getMessage()]);
    }
}

function becomeSeller($userID) {
    global $connection;
    
    $stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
    $stmt->execute([$userID]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Already a seller']);
        exit;
    }
    
    $validIDPath = null;
    if (isset($_FILES['valid_id']) && $_FILES['valid_id']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/valid_ids/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $extension = strtolower(pathinfo($_FILES['valid_id']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        if (!in_array($extension, $allowed)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Allowed: JPG, PNG, GIF, PDF']);
            exit;
        }
        
        $fileName = time() . '_' . $userID . '.' . $extension;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['valid_id']['tmp_name'], $targetPath)) {
            $validIDPath = 'database/uploads/valid_ids/' . $fileName;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload file']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Valid ID is required']);
        exit;
    }
    
    try {
        $stmt = $connection->prepare("
            INSERT INTO sellers (user_id, business_name, valid_id_path, date_applied, is_verified) 
            VALUES (?, ?, ?, NOW(), 0)
        ");
        $business_name = !empty($_POST['business_name']) ? trim($_POST['business_name']) : null;
        
        if ($stmt->execute([$userID, $business_name, $validIDPath])) {
            $_SESSION['is_seller'] = true;
            $_SESSION['seller_id'] = $connection->lastInsertId();
            $_SESSION['seller_verified'] = false;
            
            echo json_encode([
                'status' => 'success', 
                'message' => 'Seller application submitted successfully! Waiting for verification.'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Application failed']);
        }
    } catch (PDOException $e) {
        error_log("Become seller error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
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

            // Optionally delete old image file (not implemented)
        }
    }

    $query = "UPDATE products SET name=?, category=?, price=?, stock_quantity=?, description=?, last_updated=NOW()";
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

    // Verify ownership and delete (cascade will handle reviews/cart items)
    $stmt = $connection->prepare("DELETE FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_POST['product_id'], $sellerId]);

    if ($stmt->rowCount() > 0) {
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
        updateCartItem();
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
                SET quantity = ?, updated_at = NOW() 
                WHERE cart_id = ?
            ");
            $stmt->execute([$newQuantity, $existing['cart_id']]);
        } else {
            // Insert new cart item
            $stmt = $connection->prepare("
                INSERT INTO carts (customer_id, seller_id, product_id, quantity, price_at_time)
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

function updateCartItem() {
    global $connection;
    
    $cartId = $_POST['cart_item_id'] ?? 0;
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$cartId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    try {
        // Get product stock
        $stmt = $connection->prepare("
            SELECT p.stock_quantity
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.cart_id = ?
        ");
        $stmt->execute([$cartId]);
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
            SET quantity = ?, updated_at = NOW() 
            WHERE cart_id = ?
        ");
        $stmt->execute([$quantity, $cartId]);

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

    // Insert orders - FIXED: Explicitly set status to 'pending' (though default should be pending)
    foreach ($cartItems as $item) {
        // Final stock check
        if ($item['quantity'] > $item['stock_quantity']) {
            throw new Exception("Insufficient stock for {$item['name']}");
        }
        
        $orderStmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, 
                seller_id, 
                product_id, 
                quantity, 
                price_at_time, 
                shipping_address, 
                payment_method,
                status,
                order_date
            )
            VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery', 'pending', NOW())
        ");
        $orderStmt->execute([
            $customer_id,
            $item['seller_id'],
            $item['product_id'],
            $item['quantity'],
            $item['price_at_time'],
            $shipping_address
        ]);
    }

    // Clear the cart
    $clearStmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
    $clearStmt->execute([$customer_id]);

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
                o.price_at_time,
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
                o.price_at_time,
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
            
            $updateSales = $connection->prepare("
                UPDATE sellers 
                SET total_sales = total_sales + (
                    SELECT subtotal FROM orders WHERE order_id = ?
                )
                WHERE seller_id = ?
            ");
            $updateSales->execute([$order_id, $seller_id]);
            
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

    // Insert review
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

**Status:** `FOUND`

```text
[26-Feb-2026 21:36:00 Europe/Berlin] Signin attempt for identifier: kyle
[26-Feb-2026 21:36:09 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[26-Feb-2026 21:36:21 Europe/Berlin] Signin attempt for identifier: anna
[26-Feb-2026 22:28:10 Europe/Berlin] Signin attempt for identifier: kyle
[26-Feb-2026 22:28:20 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[26-Feb-2026 22:28:26 Europe/Berlin] Signin attempt for identifier: anna
[26-Feb-2026 22:32:07 Europe/Berlin] Database connection failed: SQLSTATE[HY000] [1049] Unknown database 'crooks_cart_collectives'
[26-Feb-2026 22:32:07 Europe/Berlin] Connection details - Host: localhost, Database: crooks_cart_collectives, Username: root
[26-Feb-2026 22:32:13 Europe/Berlin] Database connection failed: SQLSTATE[HY000] [1049] Unknown database 'crooks_cart_collectives'
[26-Feb-2026 22:32:13 Europe/Berlin] Connection details - Host: localhost, Database: crooks_cart_collectives, Username: root
[26-Feb-2026 22:43:36 Europe/Berlin] Signin attempt for identifier: ninja
[26-Feb-2026 22:44:02 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[26-Feb-2026 22:44:16 Europe/Berlin] Signin attempt for identifier: hotdog
[26-Feb-2026 22:44:48 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 05:13:21 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 05:13:38 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 05:19:49 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 05:20:38 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 05:21:11 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 05:21:29 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 05:21:50 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 05:22:10 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 05:29:31 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 05:54:45 Europe/Berlin] Signup attempt: {"action":"signup","first_name":"Lance","middle_name":"","last_name":"Madelar","birthdate":"2005-11-17","gender":"Male","email":"LNM136743110147172005@gmail.com","username":"lance","password":"test051117T","confirm_password":"test051117T","contact_number":"+639942822928","address":"Purok 5 Tambakan 2\r\nBarangay San Miguel"}
[27-Feb-2026 05:55:33 Europe/Berlin] Signup attempt: {"action":"signup","first_name":"Lance","middle_name":"","last_name":"Madelar","birthdate":"2005-11-17","gender":"Male","email":"LNM136743110147172005@gmail.com","username":"lance","password":"Lancewasd01","confirm_password":"Lancewasd01","contact_number":"+639942822928","address":"testa"}
[27-Feb-2026 05:55:38 Europe/Berlin] Signup attempt: {"action":"signup","first_name":"Lance","middle_name":"","last_name":"Madelar","birthdate":"2005-11-17","gender":"Male","email":"LNM136743110147172005@gmail.com","username":"lance","password":"Lancewasd01","confirm_password":"Lancewasd01","contact_number":"+639942822928","address":"testa"}
[27-Feb-2026 05:57:23 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 07:04:52 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 07:05:05 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 07:08:41 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 07:16:13 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 07:21:09 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 08:06:40 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 08:09:35 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 08:09:36 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 08:10:33 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 08:13:52 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 08:14:24 Europe/Berlin] Signin attempt for identifier: alingbebang
[27-Feb-2026 09:36:01 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 09:40:51 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 09:40:57 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 09:46:55 Europe/Berlin] Signin attempt for identifier: totoybibo
[27-Feb-2026 09:54:20 Europe/Berlin] Signin attempt for identifier: ninja
[27-Feb-2026 09:55:12 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
[27-Feb-2026 09:55:27 Europe/Berlin] PHP Deprecated:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in D:\Repository\Crooks-Cart-Collectives\pages\checkout.php on line 100
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
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

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
                    <p class="instructor">Instructor: Mr. Louise Vasques</p>
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
                    <p class="team-bio">Front-end development, UI design implementation, and documentation
                        collaboration.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/william-aranez.png" alt="William G. Arañez">
                    </div>
                    <h3>William G. Arañez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Database management, SQL implementation, and backend integration.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/rylle-bernardino.png" alt="Rylle Javerick S. Bernardino">
                    </div>
                    <h3>Rylle Javerick S. Bernardino</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Authentication system, session handling, and security implementation.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/charles-canoneo.png" alt="Charles Symon Kieffer C. Cañoneo">
                    </div>
                    <h3>Charles Symon Kieffer C. Cañoneo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Product listing, cart functionality, and user interaction features.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/kishiekel-fernandez.png" alt="Kishiekel C. Fernandez">
                    </div>
                    <h3>Kishiekel C. Fernandez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">CSS styling, responsive design, and front-end framework integration.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/clark-mallo.png" alt="Clark Luis F. Mallo">
                    </div>
                    <h3>Clark Luis F. Mallo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Form validation, JavaScript functionality, and client-side scripting.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/christian-mendoza.png" alt="Christian Ruel G. Mendoza">
                    </div>
                    <h3>Christian Ruel G. Mendoza</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Testing, debugging, technical documentation, and presentation materials.</p>
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
    /* Contact card icon styling */
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
                        <img src="../assets/image/icons/order.svg" alt="Location icon"
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
                        <img src="../assets/image/icons/cancel.svg" alt="Phone icon"
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
                        <img src="../assets/image/icons/chart-line-up.svg" alt="Hours icon"
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
                            <label for="fullName" class="contact-form__label">Your Name *</label>
                            <input type="text" id="fullName" name="fullName" class="contact-form__input" required
                                placeholder="Enter your full name" aria-required="true">
                            <div class="contact-form__error" id="fullNameError" role="alert"></div>
                        </div>

                        <div class="contact-form__group">
                            <label for="emailAddress" class="contact-form__label">Email Address *</label>
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
                            <label for="inquirySubject" class="contact-form__label">Subject *</label>
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
                        <label for="inquiryMessage" class="contact-form__label">Your Message *</label>
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

            <div class="map-container">
                <header class="map-container__header">
                    <h2 class="map-container__title">Find us on <span class="map-container__highlight">Map</span></h2>
                </header>
                <div class="map-container__embed">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.775403455372!2d121.05254331529254!3d14.562667289822337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c979a7e7c1b7%3A0x1e3e1a3b4b4c4d4e!2sArellano%20University%20Andres%20Bonifacio%20Campus!5e0!3m2!1sen!2sph!4v1620000000000!5m2!1sen!2sph"
                        title="Map showing Arellano University Andres Bonifacio Campus" allowfullscreen=""
                        loading="lazy">
                    </iframe>
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
                <label for="identifier">Email or Username*</label>
                <input type="text" id="identifier" name="identifier" required autocomplete="username">
                <div class="error-message" id="identifierError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password*</label>
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

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customerId = $_SESSION['customer_id'];

$cartItems = [];
$total = 0;
try {
    $stmt = $connection->prepare("
        SELECT 
            c.cart_id,
            c.quantity,
            c.price_at_time,
            p.product_id,
            p.name,
            p.price,
            p.image_path,
            p.stock_quantity,
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

    foreach ($cartItems as $item) {
        $total += $item['price_at_time'] * $item['quantity'];
    }
} catch (PDOException $e) {
    error_log("Error fetching cart: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="cart-container">
            <h1 class="cart-title">Shopping Cart</h1>

            <?php if (empty($cartItems)): ?>
            <div class="empty-cart">
                <p class="empty-cart-message">Your cart is empty.</p>
                <a href="products.php" class="btn btn-primary">Continue Shopping</a>
            </div>
            <?php else: ?>

            <div class="cart-items" id="cartItems">
                <?php foreach ($cartItems as $item): 
                        $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                        if (!empty($item['image_path'])) {
                            if (strpos($item['image_path'], 'assets/') === 0) {
                                $imagePath = '../' . $item['image_path'];
                            } else {
                                $imagePath = '../' . $item['image_path'];
                            }
                        }
                        $subtotal = $item['price_at_time'] * $item['quantity'];
                    ?>
                <div class="cart-item" data-id="<?= $item['cart_id'] ?>">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price_at_time'], 2) ?></p>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <label for="quantity-<?= $item['cart_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_id'] ?>">
                                <button class="remove-btn btn btn-secondary" data-id="<?= $item['cart_id'] ?>">
                                    Remove
                                </button>
                            </div>
                            <p class="item-subtotal">
                                Subtotal: <span class="subtotal-amount">₱<?= number_format($subtotal, 2) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total:</span>
                    <span class="total-amount" id="cartTotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="cart-actions">
                    <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-primary checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
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

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

$cartItems = [];
$total = 0;
try {
    $stmt = $connection->prepare("
        SELECT c.*, p.name, p.price, p.image_path, s.business_name
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        JOIN sellers s ON p.seller_id = s.seller_id
        WHERE c.customer_id = ?
    ");
    $stmt->execute([$customer_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cartItems as $item) {
        $total += $item['price_at_time'] * $item['quantity'];
    }
} catch (PDOException $e) {
    error_log("Checkout cart fetch error: " . $e->getMessage());
}

$user = [];
try {
    $stmt = $connection->prepare("SELECT address, first_name, last_name, email, contact_number FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Checkout user fetch error: " . $e->getMessage());
}

if (empty($cartItems)) {
    header('Location: cart.php');
    exit;
}
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
                        $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                        if (!empty($item['image_path'])) {
                            $imagePath = (strpos($item['image_path'], 'assets/') === 0) ? '../' . $item['image_path'] : '../' . $item['image_path'];
                        }
                    ?>
                    <div class="checkout-item">
                        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            class="checkout-item-image"
                            onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        <div class="checkout-item-details">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <p>Seller: <?= htmlspecialchars($item['business_name']) ?></p>
                            <p>Qty: <?= $item['quantity'] ?></p>
                            <p class="checkout-item-price">₱<?= number_format($item['price'] * $item['quantity'], 2) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="checkout-total">
                    <span>Total:</span>
                    <span class="total-amount">₱<?= number_format($total, 2) ?></span>
                </div>
            </div>

            <div class="checkout-info">
                <h2>Shipping Address</h2>
                <div class="shipping-details">
                    <p><strong><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></strong></p>
                    <p><?= htmlspecialchars($user['address']) ?></p>
                    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                    <p>Phone: <?= htmlspecialchars($user['contact_number']) ?></p>
                </div>

                <h2>Payment Method</h2>
                <div class="payment-method">
                    <p>Cash on Delivery (COD)</p>
                </div>

                <div class="checkout-actions">
                    <a href="cart.php" class="btn btn-secondary">Back to Cart</a>
                    <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <div id="checkoutNotifier" class="notifier hidden">
        <div class="notifier-content">
            <img src="../assets/image/icons/mail.svg" alt="Notification"
                style="width: 40px; height: 40px; margin-bottom: 15px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            <p id="checkoutMessage"></p>
            <button id="checkoutCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <script src="../scripts/checkout.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/products.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

$items_per_page = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

$total_stmt = $connection->prepare("SELECT COUNT(*) as total FROM products WHERE is_active = 1");
$total_stmt->execute();
$total_products = $total_stmt->fetch()['total'];
$total_pages = ceil($total_products / $items_per_page);

if ($page < 1) $page = 1;
if ($page > $total_pages && $total_pages > 0) $page = $total_pages;

$products = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY p.date_added DESC 
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($products as &$product) {
        if (!empty($product['image_path'])) {
            if (strpos($product['image_path'], 'assets/') === 0) {
                $product['display_image'] = '../' . $product['image_path'];
            } elseif (filter_var($product['image_path'], FILTER_VALIDATE_URL)) {
                $product['display_image'] = $product['image_path'];
            } elseif (strpos($product['image_path'], '/') === false) {
                $product['display_image'] = '../assets/image/icons/' . $product['image_path'];
            } else {
                $product['display_image'] = '../' . $product['image_path'];
            }
        } else {
            $product['display_image'] = '../assets/image/icons/PlaceholderAssetProduct.png';
        }
    }
    
} catch (PDOException $e) {
    error_log("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/products.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">All Products</div>

        <?php if (empty($products)): ?>
        <div class="no-products">
            <p>No products available at the moment.</p>
            <p>Check back soon or <a href="seller-fill-form.php">become a seller</a> to add products!</p>
        </div>
        <?php else: ?>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['display_image']); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image" loading="lazy"
                    onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">

                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-seller">
                        Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                    </p>
                    <a href="product-details.php?id=<?php echo $product['product_id']; ?>" class="view-product-btn">
                        View Details
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination-container">
            <div class="pagination">
                <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="pagination-item prev">&laquo; Previous</a>
                <?php else: ?>
                <span class="pagination-item disabled">&laquo; Previous</span>
                <?php endif; ?>

                <?php
                $start_page = max(1, $page - 2);
                $end_page = min($total_pages, $page + 2);
                
                if ($start_page > 1) {
                    echo '<a href="?page=1" class="pagination-item">1</a>';
                    if ($start_page > 2) echo '<span class="pagination-ellipsis">...</span>';
                }
                
                for ($i = $start_page; $i <= $end_page; $i++): 
                    if ($i == $page): ?>
                <span class="pagination-item active"><?php echo $i; ?></span>
                <?php else: ?>
                <a href="?page=<?php echo $i; ?>" class="pagination-item"><?php echo $i; ?></a>
                <?php endif; 
                endfor;

                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) echo '<span class="pagination-ellipsis">...</span>';
                    echo '<a href="?page=' . $total_pages . '" class="pagination-item">' . $total_pages . '</a>';
                }
                ?>

                <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="pagination-item next">Next &raquo;</a>
                <?php else: ?>
                <span class="pagination-item disabled">Next &raquo;</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/product-details.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

$product_id = $_GET['id'] ?? 0;

$product = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name, s.is_verified 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.product_id = ? AND p.is_active = 1
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching product: " . $e->getMessage());
}

if (!$product) {
    header('Location: products.php');
    exit;
}

function getProductImagePath($image_path) {
    if (empty($image_path)) {
        return '../assets/image/icons/PlaceholderAssetProduct.png';
    }
    
    if (filter_var($image_path, FILTER_VALIDATE_URL)) {
        return $image_path;
    }
    
    if (strpos($image_path, 'assets/') === 0) {
        return '../' . $image_path;
    }
    
    if (strpos($image_path, '/') === false) {
        return '../assets/image/icons/' . $image_path;
    }
    
    return '../' . $image_path;
}

$imagePath = getProductImagePath($product['image_path'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product-details.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="product-details-wrapper">
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo htmlspecialchars($product['name']); ?></li>
                </ol>
            </nav>

            <div class="product-details-grid">
                <div class="product-image-column">
                    <div class="product-image-container">
                        <div class="main-image-wrapper">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="main-product-image"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        </div>
                    </div>

                    <div class="product-thumbnails">
                        <button class="thumbnail active" aria-label="Main image">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Thumbnail"
                                onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        </button>
                    </div>
                </div>

                <div class="product-info-column">
                    <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                    <div class="product-meta">
                        <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                        <span class="product-seller">
                            Sold by: <strong><?php echo htmlspecialchars($product['business_name']); ?></strong>
                            <?php if ($product['is_verified']): ?>
                            <span class="verified-badge">Verified Seller</span>
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="product-price-wrapper">
                        <span class="price-label">Price:</span>
                        <span class="product-price">Php <?php echo number_format($product['price'], 2); ?></span>
                    </div>

                    <div class="product-availability">
                        <div
                            class="stock-status <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <span class="status-indicator"></span>
                            <span class="status-text">
                                <?php if ($product['stock_quantity'] > 0): ?>
                                In Stock (<?php echo $product['stock_quantity']; ?> available)
                                <?php else: ?>
                                Out of Stock
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <div class="product-description">
                        <h2>Product Description</h2>
                        <div class="description-content">
                            <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                        </div>
                    </div>

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
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product-details.js"></script>
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
                    <label for="seller_id">Select Seller *</label>
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
                    <label for="reason">Reason *</label>
                    <input type="text" id="reason" name="reason" required
                        placeholder="e.g., Fake product, Scam, Harassment">
                </div>

                <div class="form-group">
                    <label for="details">Details *</label>
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
    <link rel="stylesheet" href="../styles/orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="customer-header">
            <h1 class="page-title">My Orders</h1>
        </div>
        <div id="ordersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Review Modal -->
    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/star-filled.svg" alt="Review"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <h2 class="modal-title">Write a Review</h2>
            <form id="reviewForm">
                <input type="hidden" name="order_id" id="reviewOrderId">
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="form-group">
                    <label class="form-label">Rating *</label>
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
                    <button type="submit" class="modal-btn modal-btn-confirm" id="submitReview">Submit Review</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Cancel"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
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
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
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
<?php // PHP File Content ?>
<?php // PHP File Content ?>
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];
$isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;

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
            <!-- Start Shopping Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-shopping.svg" alt="Shopping cart"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Start Shopping</h3>
                <p>Browse our curated collection of products from verified sellers</p>
                <a href="products.php" class="btn-primary">Shop Now</a>
            </div>

            <!-- Your Profile Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/order.svg" alt="Profile"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Your Profile</h3>
                <p>Keep your personal information and contact details up to date</p>
                <a href="customer-profile.php" class="btn-primary">View Profile</a>
            </div>

            <?php if ($isSeller): ?>
            <!-- SELLER: Show Selling dashboard link -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/package.svg" alt="Seller dashboard"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Selling Dashboard</h3>
                <p>Manage your products, view orders, and track your sales</p>
                <a href="seller-dashboard.php" class="btn-primary">Manage</a>
            </div>
            <?php else: ?>
            <!-- CUSTOMER ONLY: Show Become a Seller -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-plus.svg" alt="Become a seller"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Become a Seller</h3>
                <p>Start your entrepreneurial journey with our community</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
            </div>
            <?php endif; ?>

            <!-- Shopping Cart Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-arrow-downsvg.svg" alt="Shopping cart"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Shopping Cart</h3>
                <p>Review and manage items ready for purchase</p>
                <a href="cart.php" class="btn-primary">Go to Cart</a>
            </div>

            <!-- My Orders Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/order.svg" alt="Orders"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>My Orders</h3>
                <p>Track your order history and delivery status</p>
                <a href="orders.php" class="btn-primary">View Orders</a>
            </div>

            <!-- About Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/mail.svg" alt="About us"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>About Us</h3>
                <p>Learn about our project, mission, and the development team</p>
                <a href="about.php" class="btn-primary">About Page</a>
            </div>

            <!-- Contact Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/mail.svg" alt="Contact us"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
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

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user data with proper error handling
$user = [];
try {
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // If user not found, redirect to sign-in
    if (!$user) {
        session_destroy();
        header('Location: sign-in.php');
        exit;
    }
} catch (PDOException $e) {
    error_log("Error fetching user profile: " . $e->getMessage());
    $error = "Unable to load profile data. Please try again later.";
}

// Calculate profile completeness percentage
$completeness = 0;
$filledFields = 0;

// Define field groups
$requiredFields = ['first_name', 'last_name', 'email', 'username', 'contact_number'];
$optionalFields = ['birthdate', 'gender', 'address'];
$allFields = array_merge($requiredFields, $optionalFields);
$totalFields = count($allFields);

// Count filled fields
foreach ($allFields as $field) {
    if (!empty($user[$field])) {
        $filledFields++;
    }
}

$completeness = $totalFields > 0 ? round(($filledFields / $totalFields) * 100) : 0;

// Determine path prefix for assets
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'index.php');
$pathPrefix = $is_root ? '' : '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/profile.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Complete Your Profile</div>

        <?php if (isset($error)): ?>
        <div class="message error" style="display: block; margin-bottom: 20px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="customer-dashboard.php" style="color: white; text-decoration: underline; margin-left: 10px;">
                Return to Dashboard
            </a>
        </div>
        <?php else: ?>

        <!-- Profile Completeness Indicator -->
        <!-- <div class="profile-completeness">
            <div class="completeness-text">
                <span>Profile Completeness</span>
                <span class="percentage"><?php echo $completeness; ?>%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo $completeness; ?>%"></div>
            </div>
            <div class="completeness-details">
                <small><?php echo $filledFields; ?>/<?php echo $totalFields; ?> fields completed</small>
            </div>
        </div> -->

        <form id="profileForm" class="profile-container" method="POST" autocomplete="on">
            <!-- Success/Error Messages -->
            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="form-section">
                <h3>Personal Information</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required
                            value="<?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your first name" autocomplete="given-name" maxlength="50">
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name"
                            value="<?php echo htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your middle name (optional)" autocomplete="additional-name"
                            maxlength="50">
                        <div class="error-message" id="middleNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required
                            value="<?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your last name" autocomplete="family-name" maxlength="50">
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                            value="<?php echo htmlspecialchars($user['birthdate'] ?? ''); ?>"
                            max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>"
                            min="<?php echo date('Y-m-d', strtotime('-120 years')); ?>" autocomplete="bday">
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" autocomplete="sex">
                            <option value="">Select Gender (Optional)</option>
                            <option value="Male" <?php echo ($user['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male
                            </option>
                            <option value="Female" <?php echo ($user['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>
                                Female</option>
                            <option value="Other" <?php echo ($user['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>
                                Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Contact Information</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required readonly disabled
                            value="<?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="your@email.com" autocomplete="email" class="readonly-field">
                        <small class="field-hint">Email cannot be changed</small>
                        <div class="error-message" id="emailError"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="username" required readonly disabled
                            value="<?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Username" autocomplete="username" class="readonly-field">
                        <small class="field-hint">Username cannot be changed</small>
                        <div class="error-message" id="usernameError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_number">Phone Number *</label>
                        <input type="tel" id="contact_number" name="contact_number" required
                            value="<?php echo htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="0912 345 6789" autocomplete="tel" maxlength="16">
                        <div class="phone-hint">Phone number cannot be changed</div>
                        <div class="error-message" id="contactNumberError"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Shipping Address *</label>
                    <textarea id="address" name="address" required rows="3"
                        placeholder="Enter your complete shipping address (House/Unit No., Street, Barangay, City, Province)"
                        autocomplete="street-address"
                        maxlength="255"><?php echo htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary" id="saveBtn">Save Profile</button>
                <a href="customer-dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>

            <input type="hidden" name="action" value="update_profile">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        </form>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('profileForm');
        if (!form) return;

        const saveBtn = document.getElementById('saveBtn');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');
        const contactInput = document.getElementById('contact_number');

        // ============= PHONE NUMBER FORMATTING =============
        if (contactInput) {
            // Store original value for comparison
            const originalPhone = contactInput.value;

            // Format on input
            contactInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-digits

                if (value.length === 0) {
                    e.target.value = '';
                    return;
                }

                // Auto-format as user types
                if (value.startsWith('63') && value.length <= 12) {
                    // International format
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
                        e.target.value = formatted;
                    }
                } else if (value.startsWith('0') && value.length <= 11) {
                    // Local format
                    if (value.length > 4) {
                        e.target.value = value.substring(0, 4) + ' ' + value.substring(4);
                    } else {
                        e.target.value = value;
                    }
                }
            });

            // Validate on blur
            contactInput.addEventListener('blur', function(e) {
                const value = e.target.value.trim();
                if (!value) return;

                const cleaned = value.replace(/\D/g, '');
                let isValid = false;

                if (cleaned.length === 11 && cleaned.startsWith('09')) {
                    isValid = true;
                    // Format nicely
                    e.target.value = cleaned.substring(0, 4) + ' ' +
                        cleaned.substring(4, 7) + ' ' +
                        cleaned.substring(7, 11);
                } else if (cleaned.length === 12 && cleaned.startsWith('63')) {
                    isValid = true;
                    // Format as international
                    e.target.value = '+63 ' + cleaned.substring(2, 5) + ' ' +
                        cleaned.substring(5, 8) + ' ' +
                        cleaned.substring(8, 12);
                } else if (cleaned.length === 10 && cleaned.startsWith('9')) {
                    isValid = true;
                    // Convert to local format
                    e.target.value = '09' + cleaned.substring(0, 3) + ' ' +
                        cleaned.substring(3, 6) + ' ' +
                        cleaned.substring(6, 10);
                }

                if (!isValid && value !== originalPhone) {
                    showFieldError('contact_number', 'Please enter a valid Philippine mobile number');
                } else {
                    clearFieldError('contact_number');
                }
            });
        }

        // ============= VALIDATION FUNCTIONS =============
        function validatePhoneNumber(phone) {
            if (!phone) return false;
            const cleaned = phone.replace(/\D/g, '');
            return (cleaned.length === 11 && cleaned.startsWith('09')) ||
                (cleaned.length === 12 && cleaned.startsWith('63')) ||
                (cleaned.length === 10 && cleaned.startsWith('9'));
        }

        function validateName(name) {
            if (!name) return false;
            return name.length >= 2 && name.length <= 50 && /^[a-zA-Z\s\-']+$/.test(name);
        }

        function validateAddress(address) {
            if (!address) return false;
            return address.length >= 10 && address.length <= 255;
        }

        function calculateAge(birthdate) {
            if (!birthdate) return null;
            const birthDate = new Date(birthdate);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        // ============= UI MESSAGE FUNCTIONS =============
        function showError(message) {
            if (errorMessage) {
                errorMessage.textContent = message;
                errorMessage.style.display = 'block';
                successMessage.style.display = 'none';

                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        }

        function showSuccess(message) {
            if (successMessage) {
                successMessage.textContent = message;
                successMessage.style.display = 'block';
                errorMessage.style.display = 'none';

                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        }

        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.classList.remove('show');
            });
            document.querySelectorAll('input, select, textarea').forEach(el => {
                el.classList.remove('error');
            });
        }

        function clearFieldError(fieldId) {
            const field = document.getElementById(fieldId);
            const errorEl = document.getElementById(fieldId + 'Error');

            if (field && errorEl) {
                field.classList.remove('error');
                errorEl.textContent = '';
                errorEl.classList.remove('show');
            }
        }

        function showFieldError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorEl = document.getElementById(fieldId + 'Error');

            if (field && errorEl) {
                field.classList.add('error');
                errorEl.textContent = message;
                errorEl.classList.add('show');

                // Scroll to error
                field.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        // ============= FORM VALIDATION =============
        function validateForm() {
            clearErrors();
            let isValid = true;

            // First name validation
            const firstName = document.getElementById('first_name')?.value.trim();
            if (!firstName) {
                showFieldError('first_name', 'First name is required');
                isValid = false;
            } else if (!validateName(firstName)) {
                showFieldError('first_name',
                    'First name can only contain letters, spaces, hyphens and apostrophes');
                isValid = false;
            }

            // Last name validation
            const lastName = document.getElementById('last_name')?.value.trim();
            if (!lastName) {
                showFieldError('last_name', 'Last name is required');
                isValid = false;
            } else if (!validateName(lastName)) {
                showFieldError('last_name',
                    'Last name can only contain letters, spaces, hyphens and apostrophes');
                isValid = false;
            }

            // Phone number validation
            const contactNumber = document.getElementById('contact_number')?.value.trim();
            if (!contactNumber) {
                showFieldError('contact_number', 'Phone number is required');
                isValid = false;
            } else if (!validatePhoneNumber(contactNumber)) {
                showFieldError('contact_number',
                    'Please enter a valid Philippine mobile number (e.g., 09123456789 or +63 912 345 6789)');
                isValid = false;
            }

            // Address validation
            const address = document.getElementById('address')?.value.trim();
            if (!address) {
                showFieldError('address', 'Shipping address is required');
                isValid = false;
            } else if (!validateAddress(address)) {
                showFieldError('address', 'Please enter a complete address (minimum 10 characters)');
                isValid = false;
            }

            // Birthdate validation (optional)
            const birthdate = document.getElementById('birthdate')?.value;
            if (birthdate) {
                const age = calculateAge(birthdate);
                if (age < 13) {
                    showFieldError('birthdate', 'You must be at least 13 years old');
                    isValid = false;
                } else if (age > 120) {
                    showFieldError('birthdate', 'Please enter a valid birthdate');
                    isValid = false;
                }
            }

            return isValid;
        }

        // ============= FORM SUBMISSION =============
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm()) {
                showError('Please fix the errors in the form');
                return;
            }

            // Disable button and show loading
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';
            saveBtn.disabled = true;
            saveBtn.classList.add('loading');

            try {
                const formData = new FormData(form);

                const response = await fetch('../database/customer-profile-handler.php', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const responseText = await response.text();
                let result;

                try {
                    result = JSON.parse(responseText);
                } catch (parseError) {
                    console.error('Parse error:', responseText);
                    throw new Error('Server returned invalid response');
                }

                if (result.status === 'success') {
                    showSuccess('Profile updated successfully!');

                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    if (result.message.includes('phone number already registered')) {
                        showFieldError('contact_number', 'This phone number is already registered');
                    } else {
                        showError(result.message || 'Failed to update profile. Please try again.');
                    }
                }
            } catch (error) {
                console.error('Update error:', error);
                showError('Network error. Please check your connection and try again.');
            } finally {
                // Re-enable button
                saveBtn.textContent = originalText;
                saveBtn.disabled = false;
                saveBtn.classList.remove('loading');
            }
        });

        // Real-time validation on blur
        form.querySelectorAll('input, select, textarea').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.id && !this.readOnly) {
                    const fieldId = this.id;
                    const value = this.value.trim();

                    // Clear previous error
                    clearFieldError(fieldId);

                    // Simple per-field validation
                    if (this.required && !value) {
                        showFieldError(fieldId, this.getAttribute('placeholder') +
                            ' is required');
                    }
                }
            });
        });
    });
    </script>
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
                <a href="seller-add-product.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/cart-plus.svg" alt="Add product icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Add New Product</h3>
                    <p>List a new item for sale on the marketplace</p>
                </a>

                <a href="seller-products.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/updatesvg.svg" alt="Manage products icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Manage Products</h3>
                    <p>Edit, update, or remove your existing listings</p>
                </a>

                <a href="seller-orders.php" class="action-card">
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
                <a href="seller-orders.php">View All →</a>
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
                <a href="seller-orders.php#order-<?= $order['order_id'] ?>" class="activity-link">View Details →</a>
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

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

// Check if already a seller
$stmt = $connection->prepare("SELECT seller_id FROM sellers WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
if ($stmt->fetch()) {
    header('Location: seller-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Seller</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-registration.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <?php include_once('header.php'); ?>
</head>

<body>
    <div class="content">
        <div class="pageTitleHeader">Seller Application Form</div>

        <form id="sellerForm" class="seller-container" enctype="multipart/form-data">
            <div class="form-section">
                <h3>Business Information</h3>

                <div class="form-group">
                    <label for="business_name">Business Name (Optional)</label>
                    <input type="text" id="business_name" name="business_name"
                        placeholder="If different from your name">
                </div>

                <div class="form-group">
                    <label for="valid_id">Valid Government ID*</label>
                    <input type="file" id="valid_id" name="valid_id" accept="image/*,.pdf" required>
                    <p class="help-text">Upload a clear photo of your government-issued ID</p>
                </div>
            </div>

            <div class="form-section">
                <h3>Agreement</h3>

                <div class="agreement-box">
                    <p>By registering as a seller, you agree to:</p>
                    <ul>
                        <li>Provide accurate product information</li>
                        <li>Maintain fair pricing</li>
                        <li>Process orders within 2 business days</li>
                        <li>Provide customer support</li>
                        <li>Follow platform policies</li>
                    </ul>

                    <label class="checkbox">
                        <input type="checkbox" id="agree_terms" required>
                        <span>I agree to the Terms and Conditions</span>
                    </label>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Submit Application</button>
                <a href="customer-dashboard.php" class="btn btn-secondary">Cancel</a>
            </div>

            <input type="hidden" name="action" value="become_seller">
        </form>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.getElementById('sellerForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!document.getElementById('agree_terms').checked) {
            alert('Please agree to the Terms and Conditions');
            return;
        }

        const formData = new FormData(e.target);

        try {
            const response = await fetch('../database/customer-profile-handler.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert(result.message);
                window.location.href = 'seller-dashboard.php';
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        }
    });
    </script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-add-product.php`

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
$editMode = false;
$product = null;

// If editing, fetch product
if (isset($_GET['id'])) {
    $editMode = true;
    $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_GET['id'], $sellerId]);
    $product = $stmt->fetch();
    if (!$product) {
        header('Location: seller-products.php');
        exit;
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
    <link rel="stylesheet" href="../styles/seller-registration.css"> <!-- reuse form styles -->
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $editMode ? 'Edit Product' : 'Add New Product' ?></div>

        <form id="productForm" class="seller-container" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?= $editMode ? 'update' : 'add' ?>">
            <?php if ($editMode): ?>
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <?php endif; ?>

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

                <div class="form-group">
                    <label for="price">Price (₱) *</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required
                        value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="stock_quantity">Stock Quantity *</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" min="0" required
                        value="<?= htmlspecialchars($product['stock_quantity'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="5"
                        required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*" <?= $editMode ? '' : 'required' ?>>
                    <?php if ($editMode && !empty($product['image_path'])): ?>
                    <p class="help-text">Current image: <?= basename($product['image_path']) ?> (upload new to replace)
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit"
                    class="btn btn-primary"><?= $editMode ? 'Update Product' : 'Add Product' ?></button>
                <a href="seller-products.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.getElementById('productForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        try {
            const response = await fetch('../database/product-handler.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert(result.message);
                window.location.href = 'seller-products.php';
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        }
    });
    </script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-products.php`

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

// Fetch seller's products
$products = [];
try {
    $stmt = $connection->prepare("SELECT * FROM products WHERE seller_id = ? ORDER BY date_added DESC");
    $stmt->execute([$sellerId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching seller products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/products.css"> <!-- reuse product grid -->
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .product-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .edit-btn,
    .delete-btn {
        padding: 5px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }

    .edit-btn {
        background: #FF8246;
        color: white;
    }

    .delete-btn {
        background: #dc3545;
        color: white;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">My Products</div>

        <?php if (empty($products)): ?>
        <div class="no-products">
            <p>You haven't added any products yet.</p>
            <p><a href="seller-add-product.php" class="btn-primary">Add Your First Product</a></p>
        </div>
        <?php else: ?>

        <div class="products-grid">
            <?php foreach ($products as $product): 
                $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                if (!empty($product['image_path'])) {
                    if (strpos($product['image_path'], 'assets/') === 0) {
                        $imagePath = '../' . $product['image_path'];
                    } elseif (filter_var($product['image_path'], FILTER_VALIDATE_URL)) {
                        $imagePath = $product['image_path'];
                    } else {
                        $imagePath = '../' . $product['image_path'];
                    }
                }
            ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                    class="product-image" onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png'">
                <div class="product-info">
                    <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="product-price">₱<?= number_format($product['price'], 2) ?></p>
                    <p class="product-stock">Stock: <?= $product['stock_quantity'] ?></p>
                    <p class="product-status"><?= $product['is_active'] ? 'Active' : 'Inactive' ?></p>
                    <div class="product-actions">
                        <a href="seller-add-product.php?id=<?= $product['product_id'] ?>" class="edit-btn">Edit</a>
                        <button class="delete-btn" data-id="<?= $product['product_id'] ?>">Delete</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            if (!confirm('Are you sure you want to delete this product?')) return;
            const productId = btn.dataset.id;
            try {
                const response = await fetch('../database/product-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'delete',
                        product_id: productId
                    })
                });
                const result = await response.json();
                if (result.status === 'success') {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Delete error:', error);
                alert('An error occurred.');
            }
        });
    });
    </script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/pages/seller-orders.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/database-connect.php');

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
    <title>Manage Orders - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="seller-header">
            <h1 class="page-title">Seller Order Management</h1>
        </div>

        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <div id="sellerOrdersList" class="seller-orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Confirm"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
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
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/seller-orders.js"></script>
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
    
    // Password toggle elements
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    let isModalOpen = false;
    let isSubmitting = false;

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
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= VALIDATION FUNCTIONS =============
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

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/[^0-9+]/g, '');
        return /^(09|\+639|639)\d{9}$/.test(cleaned) || /^0\d{10}$/.test(cleaned);
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

    // ============= REAL-TIME VALIDATION (for visual feedback only) =============
    passwordField.addEventListener('input', () => {
        highlightField(passwordField, false);
    });

    confirmPasswordField.addEventListener('input', () => {
        highlightField(confirmPasswordField, false);
    });

    usernameField.addEventListener('input', () => {
        highlightField(usernameField, false);
    });

    // ============= PHONE NUMBER FORMATTING =============
    contactField.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        
        if (value.startsWith('63') && value.length === 12) {
            e.target.value = '+63' + value.substring(2);
        } else if (value.startsWith('09') && value.length === 11) {
            e.target.value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1 $2 $3');
        } else if (value.startsWith('9') && value.length === 10) {
            e.target.value = '09' + value.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');
        }
    });

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        // Validate required fields
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
        
        // Validate email
        if (!isEmailValid(emailField.value)) {
            highlightField(emailField);
            showNotifier('Please enter a valid email address.');
            return;
        }
        
        // Validate phone
        if (!isPhoneValid(contactField.value)) {
            highlightField(contactField);
            showNotifier('Please enter a valid Philippine phone number (e.g., 09123456789).');
            return;
        }
        
        // Validate username
        const usernameValidation = validateUsername(usernameField.value);
        if (!usernameValidation.valid) {
            highlightField(usernameField);
            showNotifier(usernameValidation.message);
            return;
        }
        
        // Validate password
        const passwordValidation = validatePassword(passwordField.value);
        if (!passwordValidation.valid) {
            highlightField(passwordField);
            showNotifier(passwordValidation.message);
            return;
        }
        
        // Check if passwords match
        if (passwordField.value !== confirmPasswordField.value) {
            highlightField(passwordField);
            highlightField(confirmPasswordField);
            showNotifier('Passwords do not match.');
            return;
        }
        
        // Validate age
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
        
        // Validate address
        if (addressField.value.length < 5) {
            highlightField(addressField);
            showNotifier('Please enter a valid address.');
            return;
        }
        
        // Show loading state
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
                // Log the actual error for debugging
                console.error('Signup error details:', result);
                
                // Handle specific error messages
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
                    showNotifier('Please enter a valid Philippine phone number.');
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
            // Reset button state
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
});
```

---

## File: `Crooks-Cart-Collectives/scripts/central-link-navigation.js`

**Status:** `FOUND`

```javascript
const PathManager = {
    init() {
        console.log('PathManager initializing for Crooks-Cart-Collectives...');
        this.fixDashboardLinks();
        return this;
    },

    getBasePath() {
        const currentPath = window.location.pathname;
        if (currentPath.includes('/pages/')) {
            return '../';
        }
        return '';
    },

    fixDashboardLinks() {
        console.log('Fixing navigation links...');
        
        const basePath = this.getBasePath();
        const currentPage = window.location.pathname.split('/').pop();
        
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            
            if (href.startsWith('http') || href.startsWith('#') || 
                href.startsWith('mailto:') || href.startsWith('//') ||
                href.startsWith('tel:') || href.startsWith('javascript:')) {
                return;
            }
            
            // Fix paths for renamed files
            if (href.includes('customer-sign-up.php')) {
                link.href = link.href.replace('customer-sign-up.php', 'sign-up.php');
            }
            
            if (href.includes('seller-registration.php')) {
                link.href = link.href.replace('seller-registration.php', 'seller-fill-form.php');
            }
            
            if (href.includes('complaint.php')) {
                link.href = link.href.replace('complaint.php', 'report-seller.php');
            }
            
            // Fix asset paths
            if (href.includes('assets/') && !href.includes('assets/image/')) {
                const assetFile = href.split('/').pop();
                if (assetFile === 'Logo.png') {
                    link.href = link.href.replace('assets/Logo.png', 'assets/image/brand/Logo.png');
                } else if (assetFile.match(/(Showcase|Formal|Placeholder|Valid|complaint|facebook|github|hamburger|icons8|mail)/i)) {
                    link.href = link.href.replace('assets/' + assetFile, 'assets/image/icons/' + assetFile);
                }
            }
        });
        
        console.log('Link fixing complete');
    },
    
    getDatabasePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'database/' + fileName;
    },
    
    getAssetPath(fileName, type = 'icons') {
        const basePath = this.getBasePath();
        if (type === 'brand') {
            return basePath + 'assets/image/brand/' + fileName;
        }
        return basePath + 'assets/image/icons/' + fileName;
    },
    
    getPagePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'pages/' + fileName;
    }
};

window.PathManager = PathManager;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => PathManager.init());
} else {
    setTimeout(() => PathManager.init(), 10);
}
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

## File: `Crooks-Cart-Collectives/scripts/product-details.js`

**Status:** `FOUND`

```javascript
/* JavaScript File Content */
// Crooks-Cart-Collectives/scripts/product-details.js

document.addEventListener('DOMContentLoaded', function() {
    // ===== IMAGE GALLERY FUNCTIONALITY =====
    const mainImage = document.querySelector('.main-product-image');
    const thumbnails = document.querySelectorAll('.thumbnail');
    
    if (thumbnails.length > 0 && mainImage) {
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnails.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked thumbnail
                this.classList.add('active');
                
                // Get the image source from the clicked thumbnail
                const thumbImg = this.querySelector('img');
                if (thumbImg && thumbImg.src) {
                    mainImage.src = thumbImg.src;
                    
                    // Add a subtle fade effect
                    mainImage.style.opacity = '0.5';
                    setTimeout(() => {
                        mainImage.style.opacity = '1';
                    }, 100);
                }
            });
        });
    }
    
    // ===== IMAGE ZOOM/VIEW FUNCTIONALITY =====
    if (mainImage) {
        // Optional: Add click to view full size
        mainImage.addEventListener('click', function() {
            // You could implement a lightbox here
            // For now, just a simple console log
            console.log('Image clicked - lightbox could be implemented');
        });
        
        // Handle image load errors
        mainImage.addEventListener('error', function() {
            this.src = '../assets/image/icons/PlaceholderAssetProduct.png';
            this.alt = 'Product image unavailable';
        });
    }
    
    // ===== ADD TO CART FUNCTIONALITY =====
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    // Shared function to show notifications
    function showNotification(message, type = 'success') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.product-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.setAttribute('role', 'alert');
        notification.innerHTML = `
            <span class="notification-icon">${type === 'success' ? '✓' : '✗'}</span>
            <span class="notification-message">${message}</span>
        `;
        
        // Add styles for the notification content
        notification.style.cssText = `
            display: flex;
            align-items: center;
            gap: 10px;
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#000000' : '#dc3545'};
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            font-weight: 500;
            max-width: 350px;
            word-break: break-word;
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }
    
    // Function to handle cart operations
    async function handleCartAction(productId, action = 'add') {
        try {
            const response = await fetch('../database/cart-handler.php', {
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
                showNotification('Product added to cart successfully!', 'success');
                
                // Update cart count in header if the function exists
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
    
    // Add to cart button handler
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-icon"></span><span class="btn-text">Adding...</span>';
            
            const success = await handleCartAction(productId, 'add');
            
            // Restore button state if not redirecting
            if (!success) {
                this.disabled = false;
                this.innerHTML = originalText;
            } else {
                // Keep disabled briefly to prevent double-click
                setTimeout(() => {
                    this.disabled = false;
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    }
    
    // Buy now button handler
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-icon"></span><span class="btn-text">Processing...</span>';
            
            const success = await handleCartAction(productId, 'add');
            
            if (success) {
                // Redirect to checkout after a brief delay
                setTimeout(() => {
                    window.location.href = 'checkout.php';
                }, 1000);
            } else {
                // Restore button on failure
                this.disabled = false;
                this.innerHTML = originalText;
            }
        });
    }
    
    // ===== QUANTITY SELECTOR (if needed) =====
    // You can add quantity selector functionality here if you implement it
    
    // ===== ADD ANIMATION STYLES =====
    const style = document.createElement('style');
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
        
        .product-notification .notification-icon {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .product-notification .notification-message {
            flex: 1;
        }
    `;
    document.head.appendChild(style);
    
    // ===== PAGE LOAD ANIMATIONS =====
    // Fade in the product details
    const productGrid = document.querySelector('.product-details-grid');
    if (productGrid) {
        productGrid.style.opacity = '0';
        productGrid.style.transition = 'opacity 0.5s ease';
        
        setTimeout(() => {
            productGrid.style.opacity = '1';
        }, 100);
    }
    
    // ===== HANDLE RESPONSIVE BEHAVIOR =====
    function handleResponsiveLayout() {
        const windowWidth = window.innerWidth;
        const actionButtons = document.querySelector('.product-actions');
        
        if (actionButtons) {
            if (windowWidth <= 576) {
                // Mobile layout adjustments
                actionButtons.style.flexDirection = 'column';
            } else {
                // Desktop layout
                actionButtons.style.flexDirection = 'row';
            }
        }
    }
    
    // Initial call
    handleResponsiveLayout();
    
    // Listen for resize events
    window.addEventListener('resize', debounce(handleResponsiveLayout, 250));
    
    // Debounce function to limit resize events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // ===== LAZY LOAD IMAGES =====
    if ('loading' in HTMLImageElement.prototype) {
        // Browser supports native lazy loading
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.loading = 'lazy';
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        // You could implement a library like lozad.js here
    }
});

// Export functions for use in other scripts if needed
window.ProductDetails = {
    showNotification: function(message, type) {
        // Reuse the notification function
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#28a745' : '#dc3545'};
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
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
            const response = await fetch('../database/checkout-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ action: 'place_order' })
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
/* Fixed version with complete event activity showing all status changes */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('ordersList');
    
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

    // ============= AUTO-RESIZE TEXTAREA =============
    function autoResizeTextarea(textarea) {
        if (!textarea) return;
        
        textarea.style.height = 'auto';
        const lineHeight = parseInt(window.getComputedStyle(textarea).lineHeight) || 20;
        const minHeight = Math.max(60, lineHeight * 3);
        const maxHeight = 200;
        
        let newHeight = textarea.scrollHeight;
        newHeight = Math.min(Math.max(newHeight, minHeight), maxHeight);
        
        textarea.style.height = newHeight + 'px';
        
        if (textarea.scrollHeight > maxHeight) {
            textarea.style.overflowY = 'auto';
        } else {
            textarea.style.overflowY = 'hidden';
        }
    }

    // ============= SETUP AUTO-RESIZE FOR ALL EDIT TEXTAREAS =============
    function setupAutoResize() {
        document.querySelectorAll('.shipping-edit-textarea').forEach(textarea => {
            textarea.removeEventListener('input', handleTextareaInput);
            textarea.addEventListener('input', handleTextareaInput);
            autoResizeTextarea(textarea);
        });
    }

    function handleTextareaInput(e) {
        autoResizeTextarea(e.target);
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_customer_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                renderOrders(result.data);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
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
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        if (path.startsWith('../')) return path;
        return '../' + path;
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
                <div class="empty-orders">
                    <p>You haven't placed any orders yet.</p>
                    <a href="products.php" class="btn-primary">Start Shopping</a>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            const imagePath = getImagePath(order.image_path);
            
            const isEditable = order.status === 'pending';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);

            // Build event activity with required messages
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
                                    <h4>${escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Seller:</span> ${escapeHtml(order.seller_name || 'Unknown Seller')}</p>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price_at_time).toFixed(2)}</p>
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
                                    <textarea class="shipping-edit-textarea" rows="3" style="display: none; width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; resize: none; overflow: hidden;">${escapeHtml(order.shipping_address || '')}</textarea>
                                    <div class="shipping-buttons">
                                        <button class="action-btn edit-shipping" data-order-id="${order.order_id}" ${!isEditable ? 'style="display: none;"' : ''}>
                                            <img src="../assets/image/icons/updatesvg.svg" alt="Edit" class="btn-icon">
                                            <span class="btn-text">Edit</span>
                                        </button>
                                        <button class="action-btn save-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/updatesvg.svg" alt="Save" class="btn-icon">
                                            <span class="btn-text">Save</span>
                                        </button>
                                        <button class="action-btn reset-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/order.svg" alt="Reset" class="btn-icon">
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
            const canReview = order.status === 'delivered' && !order.has_review;

            if (canReview) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn review" data-order-id="${order.order_id}" data-product-id="${order.product_id}">
                            Write Review
                        </button>
                        <a href="product-details.php?id=${order.product_id}" class="action-btn view">
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
                        <a href="product-details.php?id=${order.product_id}" class="action-btn view">
                            View Product
                        </a>
                    </div>
                `;
            } else {
                html += `
                    <div class="order-actions">
                        <a href="product-details.php?id=${order.product_id}" class="action-btn view">
                            View Product
                        </a>
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
        setupAutoResize();
    }

    // ============= FETCH DEFAULT ADDRESS =============
    async function fetchDefaultAddress() {
        try {
            const response = await fetch('../database/order-handler.php?action=get_default_address');
            const result = await response.json();
            
            if (result.status === 'success') {
                return result.address;
            } else {
                return null;
            }
        } catch (error) {
            console.error('Error fetching default address:', error);
            return null;
        }
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
                    autoResizeTextarea(textarea);
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
                autoResizeTextarea(textarea);
                
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
                    submitReview.textContent = 'Submit Review';
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

    window.addEventListener('resize', () => {
        setupAutoResize();
    });

    initStarRating();
    loadOrders();
});
```

---

## File: `Crooks-Cart-Collectives/scripts/seller-orders.js`

**Status:** `FOUND`

```javascript
/* Crooks-Cart-Collectives/scripts/seller-orders.js */
/* Based on orders.js structure – maintains CSS compatibility, fetches seller orders, adds deliver/cancel actions */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('sellerOrdersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    // Confirmation Modal Elements (seller version)
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
    let currentAction = null;          // 'delivered' or 'cancelled'
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

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                allOrders = result.data;
                filterOrders(currentFilter);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
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
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        if (path.startsWith('../')) return path;
        return '../' + path;
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
                <div class="empty-orders">
                    <p>No orders found.</p>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            const imagePath = getImagePath(order.image_path);
            
            const customerName = `${escapeHtml(order.first_name || '')} ${escapeHtml(order.last_name || '')}`.trim() || 'Customer';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);

            // Build event activity – includes placed, delivered, cancelled timestamps
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
           // Shipping column
            const shippingHtml = `
                <div class="order-shipping-column">
                    <div class="column-title">Customer Details</div>
                    <div class="shipping-details">
                        <p class="customer-name">
                            <strong>Name:</strong> ${escapeHtml(order.first_name || '')} ${escapeHtml(order.last_name || '')}
                        </p>
                        <p class="shipping-address-text">
                            <strong>Address:</strong> ${escapeHtml(order.shipping_address || 'No address provided')}
                        </p>
                        <p class="customer-contact">
                            <strong>Contact:</strong> ${escapeHtml(order.contact_number || 'N/A')}
                        </p>
                        <p class="customer-email">
                            <strong>Email:</strong> ${escapeHtml(order.email || 'N/A')}
                        </p>
                        <!-- Edit controls hidden (not needed for seller) -->
                        <div class="shipping-edit-controls" style="display: none;">
                            <textarea class="shipping-edit-textarea" style="display: none;">${escapeHtml(order.shipping_address || '')}</textarea>
                            <div class="shipping-buttons">
                                <button class="action-btn edit-shipping" style="display: none;">Edit</button>
                                <button class="action-btn save-shipping" style="display: none;">Save</button>
                                <button class="action-btn reset-shipping" style="display: none;">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Start order card
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
                                    <h4>${escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Customer:</span> ${customerName}</p>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price_at_time).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="order-event-column">
                            <div class="column-title">Event Activity</div>
                            <div class="event-activity-content">
                                ${eventHtml}
                            </div>
                        </div>

                        ${shippingHtml}

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

            // Action buttons – only shown for pending orders
            if (order.status === 'pending') {
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
            }
            // For non-pending orders, no actions are displayed at all
            
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
        // Deliver button (class "complete" now)
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
        
        // Cancel button
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
                loadOrders(); // refresh list
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
    // Initialize dashboard charts if needed
    initDashboardStats();
    
    // Handle product quick actions
    initQuickActions();
});

function initDashboardStats() {
    // Stats card animations
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
            // Prevent default if it's not a link
            if (!this.hasAttribute('href')) {
                e.preventDefault();
            }
        });
    });
}
```

---

## File: `Crooks-Cart-Collectives/styles/seller-orders.css`

**Status:** `FOUND`

```css
/* Crooks-Cart-Collectives/styles/seller-orders.css */
/* Revised with full-width layout, no animations, consistent column titles */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content {
    width: 100%;
    max-width: 100%;
    margin: 100px auto 40px;
    padding: 0 20px;
}

.seller-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
    max-width: 1800px;
    margin-left: auto;
    margin-right: auto;
}

.page-title {
    font-size: 2rem;
    color: #000000;
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.filter-tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    flex-wrap: wrap;
    max-width: 1800px;
    margin-left: auto;
    margin-right: auto;
}

.filter-tab {
    padding: 8px 20px;
    background: #ffffff;
    border-radius: 25px;
    cursor: pointer;
    font-size: 0.95rem;
    font-weight: 500;
    border: 1px solid #e0e0e0;
    color: #000000;
}

.filter-tab.active {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

.filter-tab:hover:not(.active) {
    background: #000000;
    color: #ffffff;
    border-color: #000000;
}

.seller-orders-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
    max-width: 1800px;
    margin-left: auto;
    margin-right: auto;
}

/* ===== ORDER CARD ===== */
.order-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    overflow: hidden;
    width: 100%;
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
    color: #000000;
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

/* Status badge colors */
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

/* ===== ORDER BODY - FULL WIDTH GRID ===== */
.order-body {
    display: grid;
    grid-template-columns: 1.2fr 1.2fr 1.4fr 1fr;
    gap: 0;
    background: #ffffff;
    width: 100%;
}

/* Column Titles - consistent max-width underline for all */
.order-product-column .column-title,
.order-event-column .column-title,
.order-shipping-column .column-title,
.order-price-summary .column-title {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 15px;
    padding-bottom: 8px;
    border-bottom: 2px solid #FF8246;
    display: block;
    max-width: 100%;
}

/* Column 1: Product Details */
.order-product-column {
    background: #ffffff;
    padding: 20px;
    min-height: 100%;
    width: 100%;
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
    width: 100%;
}

.product-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 8px;
}

.product-info p {
    font-size: 0.9rem;
    color: #000000;
    margin: 4px 0;
    opacity: 0.8;
}

.info-label {
    font-weight: 500;
    color: #000000;
    margin-right: 5px;
    opacity: 0.9;
}

/* Column 2: Event Activity */
.order-event-column {
    background: #ffffff;
    padding: 20px;
    min-height: 100%;
    width: 100%;
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
    width: 100%;
}

.event-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid transparent;
    width: 100%;
}

.event-item.customer-event {
    background: #fff0e8;
    border-color: #FF8246;
}

.event-item.cancelled-event {
    background: #f0f0f0;
    border-color: #000000;
}

.event-item.delivered-event {
    background: #f0f0f0;
    border-color: #000000;
}
.event-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
    width: 20px;
    text-align: center;
    color: #000000;
}

.event-text {
    flex: 1;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #000000;
    word-break: break-word;
}

/* Column 3: Shipping */
.order-shipping-column {
    background: #ffffff;
    padding: 20px;
    min-height: 100%;
    width: 100%;
    border-right: 1px solid #f0f0f0;
}

/* Shipping details container - styled to match other content boxes */
.shipping-details {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    width: 100%;
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

.customer-contact,
.customer-email {
    opacity: 0.9;
}

/* Column 4: Price Summary */
.order-price-summary {
    background: #f9f9f9;
    padding: 20px;
    min-height: 100%;
    display: flex;
    flex-direction: column;
    width: 100%;
}

.price-summary-details {
    background: #ffffff;
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #f0f0f0;
    margin-bottom: 15px;
    width: 100%;
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
    color: #000000;
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

/* Order actions - only shown for pending orders */
.order-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: auto;
}

.action-btn {
    display: block;
    width: 100%;
    padding: 12px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    letter-spacing: 0.3px;
}

.action-btn.complete {
    color: #ffffff;
    background: #FF8246;
    border-color: #FF8246;
}

.action-btn.cancel {
    background: #000000;
    color: #ffffff;
}

.action-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: #f0f0f0;
    color: #666666;
    border-color: #cccccc;
}

.action-disabled {
    display: block;
    width: 100%;
    padding: 12px;
    background: #f0f0f0;
    color: #666666;
    border: 1px solid #cccccc;
    border-radius: 8px;
    text-align: center;
    font-size: 0.9rem;
}

/* Empty state */
.empty-orders {
    text-align: center;
    padding: 60px 20px;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    max-width: 1800px;
    margin-left: auto;
    margin-right: auto;
}

.empty-orders p {
    font-size: 1.1rem;
    color: #000000;
    margin-bottom: 20px;
    opacity: 0.8;
}

.empty-orders .btn-primary {
    display: block;
    padding: 12px 35px;
    background: #FF8246;
    color: #000000;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    border: 1px solid #FF8246;
}

.empty-orders .btn-primary:hover {
    background: #000000;
    color: #ffffff;
    border-color: #000000;
}

.loading {
    text-align: center;
    padding: 40px;
    color: #000000;
    font-size: 1rem;
    opacity: 0.7;
}

/* ===== MODAL STYLES ===== */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
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
    color: #000000;
    font-size: 1rem;
    margin-bottom: 25px;
    line-height: 1.5;
    opacity: 0.8;
}

.modal-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.modal-btn {
    padding: 12px 25px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    flex: 1;
    max-width: 130px;
}

.modal-btn-cancel {
    background: #000000;
    color: #ffffff;
}

.modal-btn-cancel:hover {
    background: #000000;
    color: #ffffff;
}

.modal-btn-confirm {
    background: #FF8246;
    color: #ffffff;
    border-color: #FF8246;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1400px) {
    .order-body {
        grid-template-columns: 1.2fr 1.1fr 1.3fr 1fr;
    }
}

@media (max-width: 1300px) {
    .order-body {
        grid-template-columns: 1.1fr 1fr 1.2fr 0.9fr;
    }
}

@media (max-width: 1200px) {
    .order-body {
        grid-template-columns: 1fr 0.9fr 1.1fr 0.8fr;
    }
    
    .event-text {
        font-size: 0.9rem;
    }
}

@media (max-width: 1100px) {
    .order-body {
        grid-template-columns: 1fr 0.9fr 1fr 0.8fr;
    }
    
    .product-details {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .product-thumbnail {
        margin-bottom: 10px;
    }
    
    .event-text {
        font-size: 0.85rem;
    }
}

@media (max-width: 1000px) {
    .order-body {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .order-product-column {
        border-right: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .order-event-column {
        border-right: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .order-shipping-column {
        border-right: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .product-details {
        flex-direction: row;
        text-align: left;
        max-width: 100%;
        margin: 0;
    }
    
    .product-thumbnail {
        margin-bottom: 0;
    }
    
    .event-activity-content {
        max-width: 100%;
        margin: 0;
    }
    
    .shipping-details {
        max-width: 100%;
        margin: 0;
    }
    
    .price-summary-details {
        max-width: 100%;
        margin: 0;
    }
}

@media (max-width: 768px) {
    .content {
        margin-top: 80px;
        padding: 0 15px;
    }
    
    .page-title {
        font-size: 1.6rem;
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
    
    .event-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .event-icon {
        margin-bottom: 5px;
    }
    
    .event-text {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .modal-actions {
        flex-direction: column;
    }
    
    .modal-btn {
        max-width: 100%;
    }
    
    .order-status-badge {
        min-width: 80px;
        font-size: 0.7rem;
    }
    
    .event-text {
        font-size: 0.85rem;
        line-height: 1.4;
    }
    
    .shipping-details p {
        font-size: 0.85rem;
    }
}

/* Extra small devices */
@media (max-width: 375px) {
    .event-text {
        font-size: 0.8rem;
    }
    
    .product-info h4 {
        font-size: 0.9rem;
    }
    
    .product-info p {
        font-size: 0.8rem;
    }
    
    .price-row {
        font-size: 0.85rem;
    }
}
```

---

