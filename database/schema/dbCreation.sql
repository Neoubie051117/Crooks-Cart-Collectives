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
-- SELLERS TABLE (REVISED)
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
    description TEXT,                  -- changed to TEXT
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock_quantity INT DEFAULT 0,
    media_path VARCHAR(255),            -- renamed from image_path
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