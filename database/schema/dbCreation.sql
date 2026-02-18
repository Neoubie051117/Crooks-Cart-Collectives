-- =====================================================
-- DATABASE: crooks_cart_collectives
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
-- SHOPPING CARTS TABLE
-- =====================================================
CREATE TABLE shopping_carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON DELETE CASCADE
);

-- =====================================================
-- CART ITEMS TABLE
-- =====================================================
CREATE TABLE cart_items (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id)
        REFERENCES shopping_carts(cart_id)
        ON DELETE CASCADE,
    FOREIGN KEY (product_id)
        REFERENCES products(product_id),
    UNIQUE KEY unique_cart_product (cart_id, product_id)
);

-- =====================================================
-- CUSTOMER ORDERS TABLE (Master Order - No Status)
-- =====================================================
CREATE TABLE customer_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    shipping_address VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    -- Note: No status here - status is tracked at item level
    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON DELETE CASCADE
);

-- =====================================================
-- SELLER ORDERS TABLE (Groups items by seller)
-- =====================================================
CREATE TABLE seller_orders (
    seller_order_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    seller_id INT NOT NULL,
    seller_total DECIMAL(10, 2) NOT NULL,
    -- Simplified seller_status to match your current workflow
    seller_status ENUM(
        'pending',      -- At least one item pending
        'processing',   -- Some items being processed
        'completed',    -- All items delivered/refunded
        'cancelled'     -- All items cancelled
    ) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id)
        REFERENCES customer_orders(order_id)
        ON DELETE CASCADE,
    FOREIGN KEY (seller_id)
        REFERENCES sellers(seller_id)
        ON DELETE CASCADE,
    UNIQUE KEY unique_seller_per_order (order_id, seller_id)
);

-- =====================================================
-- PURCHASE ITEMS TABLE - STATUS LIVES HERE! ✅
-- Maximum upgradability for future features
-- =====================================================
-- =====================================================
-- PURCHASE ITEMS TABLE - STATUS LIVES HERE! ✅
-- Maximum upgradability for future features
-- =====================================================
CREATE TABLE purchase_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_at_time DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2)
        GENERATED ALWAYS AS (quantity * price_at_time) STORED,
    
    -- ✅ ITEM-LEVEL STATUS - Maximum flexibility!
    status ENUM(
        'pending',      -- Order placed, awaiting seller action
        'confirmed',    -- Seller confirmed (ready to prepare)
        'processing',   -- Being prepared/packed
        'shipped',      -- Dispatched to customer
        'delivered',    -- Customer received - can review
        'cancelled',    -- Cancelled before shipping
        'refunded'      -- Returned and refunded
    ) DEFAULT 'pending',
    
    -- Timestamps for each stage
    confirmed_at TIMESTAMP NULL,
    shipped_at TIMESTAMP NULL,
    delivered_at TIMESTAMP NULL,
    cancelled_at TIMESTAMP NULL,
    
    FOREIGN KEY (seller_order_id)
        REFERENCES seller_orders(seller_order_id)
        ON DELETE CASCADE,
    FOREIGN KEY (product_id)
        REFERENCES products(product_id)
);

-- =====================================================
-- PRODUCT REVIEWS TABLE (Fixed: uses order_item_id)
-- =====================================================
CREATE TABLE product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    order_item_id INT NOT NULL UNIQUE,  -- One review per purchased item
    rating TINYINT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    title VARCHAR(100),
    comment TEXT,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_edited BOOLEAN DEFAULT FALSE,
    last_edited TIMESTAMP NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (order_item_id) REFERENCES purchase_items(order_item_id) ON DELETE CASCADE
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
    FOREIGN KEY (reporter_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,
    FOREIGN KEY (seller_id)
        REFERENCES sellers(seller_id)
        ON DELETE CASCADE
);

-- =====================================================
-- INDEXES for Performance
-- =====================================================

-- Purchase items indexes
CREATE INDEX idx_purchase_items_status ON purchase_items(status);
CREATE INDEX idx_purchase_items_seller_order ON purchase_items(seller_order_id);
CREATE INDEX idx_purchase_items_product ON purchase_items(product_id);
CREATE INDEX idx_purchase_items_dates ON purchase_items(confirmed_at, shipped_at, delivered_at);

-- Seller orders indexes
CREATE INDEX idx_seller_orders_order ON seller_orders(order_id);
CREATE INDEX idx_seller_orders_seller ON seller_orders(seller_id);
CREATE INDEX idx_seller_orders_status ON seller_orders(seller_status);

-- Customer orders indexes
CREATE INDEX idx_customer_orders_customer_date ON customer_orders(customer_id, order_date);

-- Product reviews indexes
CREATE INDEX idx_product_reviews_product ON product_reviews(product_id, rating, date_posted);
CREATE INDEX idx_product_reviews_user ON product_reviews(user_id);

-- Cart indexes
CREATE INDEX idx_cart_items_cart_product ON cart_items(cart_id, product_id);

-- Seller reports indexes
CREATE INDEX idx_seller_reports_seller_status ON seller_reports(seller_id, status);
CREATE INDEX idx_seller_reports_reporter ON seller_reports(reporter_id);

-- =====================================================
-- TRIGGERS
-- =====================================================
DELIMITER $$

-- Auto-create customer and cart after user signup
CREATE TRIGGER after_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    DECLARE new_customer_id INT;
    
    INSERT INTO customers (user_id)
    VALUES (NEW.user_id);
    
    SET new_customer_id = LAST_INSERT_ID();
    
    INSERT INTO shopping_carts (customer_id)
    VALUES (new_customer_id);
END$$

-- Update seller's total_sales when purchase items are delivered
CREATE TRIGGER after_purchase_item_delivered
AFTER UPDATE ON purchase_items
FOR EACH ROW
BEGIN
    IF NEW.status = 'delivered' AND (OLD.status != 'delivered' OR OLD.status IS NULL) THEN
        UPDATE sellers s
        SET s.total_sales = s.total_sales + NEW.subtotal
        WHERE s.seller_id = (
            SELECT so.seller_id 
            FROM seller_orders so 
            WHERE so.seller_order_id = NEW.seller_order_id
        );
    END IF;
END$$

-- Update customer's total_spent when purchase items are delivered
CREATE TRIGGER after_purchase_item_delivered_customer
AFTER UPDATE ON purchase_items
FOR EACH ROW
BEGIN
    IF NEW.status = 'delivered' AND (OLD.status != 'delivered' OR OLD.status IS NULL) THEN
        UPDATE customers c
        SET c.total_spent = c.total_spent + NEW.subtotal,
            c.total_orders = c.total_orders + 1
        WHERE c.customer_id = (
            SELECT co.customer_id
            FROM seller_orders so
            JOIN customer_orders co ON so.order_id = co.order_id
            WHERE so.seller_order_id = NEW.seller_order_id
        );
    END IF;
END$$

-- Update seller_orders seller_status based on purchase_items
CREATE TRIGGER after_purchase_item_status_update
AFTER UPDATE ON purchase_items
FOR EACH ROW
BEGIN
    DECLARE pending_count INT DEFAULT 0;
    DECLARE processing_count INT DEFAULT 0;
    DECLARE completed_count INT DEFAULT 0;
    DECLARE cancelled_count INT DEFAULT 0;
    DECLARE total_count INT DEFAULT 0;
    
    -- Get total count
    SELECT COUNT(*) INTO total_count
    FROM purchase_items
    WHERE seller_order_id = NEW.seller_order_id;
    
    -- Get pending count
    SELECT COUNT(*) INTO pending_count
    FROM purchase_items
    WHERE seller_order_id = NEW.seller_order_id AND status = 'pending';
    
    -- Get processing count (confirmed, processing, shipped, on_hold)
    SELECT COUNT(*) INTO processing_count
    FROM purchase_items
    WHERE seller_order_id = NEW.seller_order_id 
      AND status IN ('confirmed', 'processing', 'shipped', 'on_hold');
    
    -- Get completed count (delivered, refunded)
    SELECT COUNT(*) INTO completed_count
    FROM purchase_items
    WHERE seller_order_id = NEW.seller_order_id 
      AND status IN ('delivered', 'refunded');
    
    -- Get cancelled count
    SELECT COUNT(*) INTO cancelled_count
    FROM purchase_items
    WHERE seller_order_id = NEW.seller_order_id AND status = 'cancelled';
    
    -- Update seller_status
    UPDATE seller_orders
    SET seller_status = 
        CASE 
            WHEN cancelled_count = total_count THEN 'cancelled'
            WHEN completed_count = total_count THEN 'completed'
            WHEN processing_count > 0 THEN 'processing'
            ELSE 'pending'
        END,
        updated_at = NOW()
    WHERE seller_order_id = NEW.seller_order_id;
END$$

DELIMITER ;

-- =====================================================
-- VIEWS for Easy Data Access
-- =====================================================

-- Customer order summary view
-- =====================================================
-- VIEWS for Easy Data Access
-- =====================================================

-- Customer order summary view
CREATE VIEW customer_order_summary AS
SELECT 
    co.order_id,
    co.customer_id,
    co.order_date,
    co.total_amount,
    co.shipping_address,
    co.payment_method,
    COUNT(DISTINCT so.seller_id) as seller_count,
    COUNT(pi.order_item_id) as item_count,
    SUM(CASE WHEN pi.status = 'pending' THEN 1 ELSE 0 END) as pending_items,
    SUM(CASE WHEN pi.status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_items,
    SUM(CASE WHEN pi.status = 'processing' THEN 1 ELSE 0 END) as processing_items,
    SUM(CASE WHEN pi.status = 'shipped' THEN 1 ELSE 0 END) as shipped_items,
    SUM(CASE WHEN pi.status = 'delivered' THEN 1 ELSE 0 END) as delivered_items,
    SUM(CASE WHEN pi.status = 'cancelled' THEN 1 ELSE 0 END) as cancelled_items,
    SUM(CASE WHEN pi.status = 'refunded' THEN 1 ELSE 0 END) as refunded_items,
    SUM(CASE WHEN pi.status = 'on_hold' THEN 1 ELSE 0 END) as on_hold_items
FROM customer_orders co
LEFT JOIN seller_orders so ON co.order_id = so.order_id
LEFT JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
GROUP BY co.order_id;

-- Seller order summary view
CREATE VIEW seller_order_summary AS
SELECT 
    so.seller_order_id,
    so.seller_id,
    so.order_id,
    so.seller_total,
    so.seller_status,
    so.created_at,
    COUNT(pi.order_item_id) as item_count,
    SUM(CASE WHEN pi.status = 'pending' THEN 1 ELSE 0 END) as pending_items,
    SUM(CASE WHEN pi.status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_items,
    SUM(CASE WHEN pi.status = 'processing' THEN 1 ELSE 0 END) as processing_items,
    SUM(CASE WHEN pi.status = 'shipped' THEN 1 ELSE 0 END) as shipped_items,
    SUM(CASE WHEN pi.status = 'delivered' THEN 1 ELSE 0 END) as delivered_items,
    SUM(CASE WHEN pi.status = 'cancelled' THEN 1 ELSE 0 END) as cancelled_items,
    SUM(CASE WHEN pi.status = 'refunded' THEN 1 ELSE 0 END) as refunded_items,
    SUM(CASE WHEN pi.status = 'on_hold' THEN 1 ELSE 0 END) as on_hold_items
FROM seller_orders so
LEFT JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
GROUP BY so.seller_order_id;