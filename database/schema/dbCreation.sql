-- =====================================================
-- DATABASE: crooks_cart_collectives
-- REVISED: Separate carts and orders tables with proper order status handling
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
-- CARTS TABLE (Separate from orders)
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
-- ORDERS TABLE (Fixed with proper status handling)
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
    cancellation_reason VARCHAR(255) NULL,
    
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
-- TRIGGERS
-- =====================================================
DELIMITER $$

-- Auto-create customer after user signup
CREATE TRIGGER after_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    INSERT INTO customers (user_id)
    VALUES (NEW.user_id);
END$$

-- Update seller's total_sales when items are delivered
CREATE TRIGGER after_order_delivered
AFTER UPDATE ON orders
FOR EACH ROW
BEGIN
    IF NEW.status = 'delivered' AND OLD.status != 'delivered' THEN
        UPDATE sellers s
        SET s.total_sales = s.total_sales + NEW.subtotal
        WHERE s.seller_id = NEW.seller_id;
        
        UPDATE customers c
        SET c.total_spent = c.total_spent + NEW.subtotal,
            c.total_orders = c.total_orders + 1
        WHERE c.customer_id = NEW.customer_id;
    END IF;
END$$

-- Update product stock and timestamps when order status changes
CREATE TRIGGER after_order_status_change
AFTER UPDATE ON orders
FOR EACH ROW
BEGIN
    -- If changed to delivered (seller confirmed)
    IF NEW.status = 'delivered' AND OLD.status = 'pending' THEN
        UPDATE orders 
        SET delivered_at = NOW() 
        WHERE order_id = NEW.order_id;
    END IF;
    
    -- If changed to cancelled (by either customer or seller)
    IF NEW.status = 'cancelled' AND OLD.status = 'pending' THEN
        -- Restore stock since order was cancelled before delivery
        UPDATE products 
        SET stock_quantity = stock_quantity + NEW.quantity 
        WHERE product_id = NEW.product_id;
        
        UPDATE orders 
        SET cancelled_at = NOW() 
        WHERE order_id = NEW.order_id;
    END IF;
END$$

-- When order is placed, update stock
CREATE TRIGGER before_order_insert
BEFORE INSERT ON orders
FOR EACH ROW
BEGIN
    DECLARE current_stock INT;
    
    -- Get current stock
    SELECT stock_quantity INTO current_stock 
    FROM products 
    WHERE product_id = NEW.product_id;
    
    -- Check if sufficient stock
    IF current_stock < NEW.quantity THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Insufficient stock for this product';
    END IF;
    
    -- Reduce stock
    UPDATE products 
    SET stock_quantity = stock_quantity - NEW.quantity 
    WHERE product_id = NEW.product_id;
END$$

DELIMITER ;

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