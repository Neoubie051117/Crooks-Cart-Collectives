-- =====================================================
-- DATABASE: crooks_cart_collectives
-- STRICTLY FOLLOWING DATA DICTIONARY SPECIFICATIONS
-- =====================================================
CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;
USE crooks_cart_collectives;

-- =====================================================
-- ADMINISTRATORS TABLE
-- =====================================================
CREATE TABLE administrators (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(60) NOT NULL,
    contact_number VARCHAR(13),
    profile_picture VARCHAR(120),
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_log TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_admin_email (email),
    INDEX idx_admin_username (username)
) COMMENT='Admin accounts for system management';

-- =====================================================
-- USERS TABLE
-- =====================================================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    middle_name VARCHAR(30),
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(60) NOT NULL,
    birthdate DATE,
    gender ENUM('Male', 'Female', 'Other'),
    contact_number VARCHAR(13),
    address VARCHAR(150),
    profile_picture VARCHAR(120),
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_username (username),
    INDEX idx_contact (contact_number)
) COMMENT='Stores all user account information';

-- Add age constraint (must be at least 13 years old)
ALTER TABLE users ADD CONSTRAINT chk_user_age CHECK (
    birthdate IS NULL OR 
    birthdate <= DATE_SUB(CURRENT_DATE, INTERVAL 13 YEAR)
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
        ON DELETE CASCADE,
    INDEX idx_customer_user (user_id)
) COMMENT='Customer-specific information';

-- =====================================================
-- SELLERS TABLE
-- =====================================================
CREATE TABLE sellers (
    seller_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    business_name VARCHAR(50),
    identity_path VARCHAR(120),
    id_document_path VARCHAR(120),
    is_verified ENUM('pending', 'verified', 'rejected') DEFAULT 'pending',
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    verification_date TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,
    INDEX idx_seller_user (user_id),
    INDEX idx_verification_status (is_verified)
) COMMENT='Seller accounts with verification status';

-- =====================================================
-- PRODUCTS TABLE
-- =====================================================
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    name VARCHAR(60) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    category VARCHAR(40),
    stock_quantity INT DEFAULT 0 CHECK (stock_quantity >= 0),
    media_path VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (seller_id)
        REFERENCES sellers(seller_id)
        ON DELETE CASCADE,
    
    INDEX idx_seller_products (seller_id, is_active),
    INDEX idx_category (category),
    INDEX idx_price (price),
    FULLTEXT idx_product_search (name, description)
) COMMENT='Product listings from sellers';

-- =====================================================
-- CARTS TABLE
-- =====================================================
CREATE TABLE carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    seller_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    
    UNIQUE KEY unique_cart_item (customer_id, product_id),
    INDEX idx_customer_cart (customer_id, added_at),
    INDEX idx_seller_cart (seller_id)
) COMMENT='Shopping cart items';

-- =====================================================
-- ORDERS TABLE
-- =====================================================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    seller_id INT NOT NULL,
    product_id INT NOT NULL,
    
    quantity INT NOT NULL CHECK (quantity > 0),
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    subtotal DECIMAL(10, 2) GENERATED ALWAYS AS (quantity * price) STORED,
    
    shipping_address VARCHAR(150) NOT NULL,
    payment_method ENUM('COD', 'Online') NOT NULL DEFAULT 'COD',
    
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'delivered', 'cancelled') DEFAULT 'pending',
    
    cancelled_by ENUM('customer', 'seller') NULL,
    delivered_at TIMESTAMP NULL DEFAULT NULL,
    cancelled_at TIMESTAMP NULL DEFAULT NULL,
    
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    
    INDEX idx_customer_orders (customer_id, status, order_date),
    INDEX idx_seller_orders (seller_id, status, order_date),
    INDEX idx_order_status (status, order_date),
    INDEX idx_order_date (order_date)
) COMMENT='Order transactions between customers and sellers';

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
    INDEX idx_user_reviews (user_id),
    INDEX idx_recent_reviews (date_posted)
) COMMENT='Product ratings and reviews from customers';

-- =====================================================
-- ADDITIONAL INDEXES for Performance
-- =====================================================
CREATE INDEX idx_carts_customer ON carts(customer_id);
CREATE INDEX idx_orders_customer_status ON orders(customer_id, status, order_date);
CREATE INDEX idx_orders_seller_status ON orders(seller_id, status, order_date);

-- =====================================================
-- VIEWS for Easy Data Access
-- =====================================================

-- Customer cart view
CREATE OR REPLACE VIEW customer_cart AS
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
CREATE OR REPLACE VIEW customer_orders AS
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
CREATE OR REPLACE VIEW seller_orders AS
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

-- =====================================================
-- DATA VALIDATION SUMMARY
-- =====================================================
/*
FIELD LENGTH VERIFICATION:
- All first/last names: VARCHAR(30)
- Email: VARCHAR(100)
- Username: VARCHAR(30)
- Password: VARCHAR(60) (for bcrypt hash)
- Contact numbers: VARCHAR(13) (PH format: +63 XXX XXX XXXX)
- Address: VARCHAR(150)
- Profile/ID paths: VARCHAR(120)
- Product media path: VARCHAR(100)
- Product name: VARCHAR(60)
- Category: VARCHAR(40)
- Business name: VARCHAR(50)

CONSTRAINTS:
- Users must be at least 13 years old (if birthdate provided)
- Contact numbers should follow PH format (to be validated in application)
- Product quantities cannot be negative
- Cart quantities must be positive
- Ratings must be between 1 and 5
- Order subtotal is automatically calculated
*/