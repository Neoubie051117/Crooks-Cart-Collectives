-- =====================================================
-- DATABASE: crooks_cart_collectives
-- STRICTLY FOLLOWING DATA DICTIONARY SPECIFICATIONS
-- REVISED: Added wallets and refunds tables
-- FIXED: All primary keys use your correct syntax (AUTO_INCREMENT PRIMARY KEY)
-- =====================================================
CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;

USE crooks_cart_collectives;

-- =====================================================
-- ADMINISTRATORS TABLE (no dependencies)
-- =====================================================
CREATE TABLE
    IF NOT EXISTS administrators (
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
    ) COMMENT = 'Admin accounts for system management';

-- =====================================================
-- ADDRESS_LIST TABLE (created BEFORE users)
-- =====================================================
CREATE TABLE
    IF NOT EXISTS address_list (
        address_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        block VARCHAR(120) NOT NULL,
        barangay VARCHAR(100),
        city VARCHAR(100) NOT NULL,
        province VARCHAR(100),
        region VARCHAR(100),
        postal_code VARCHAR(10) NOT NULL,
        country VARCHAR(100) DEFAULT 'Philippines',
        is_default BOOLEAN DEFAULT FALSE,
        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_user_addresses (user_id),
        INDEX idx_address_city (city),
        INDEX idx_address_province (province),
        INDEX idx_default (is_default)
    ) COMMENT = 'Structured addresses for users, allows multiple addresses per user';

-- =====================================================
-- USERS TABLE (now can reference address_list)
-- =====================================================
CREATE TABLE
    IF NOT EXISTS users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        middle_name VARCHAR(30),
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        username VARCHAR(30) UNIQUE NOT NULL,
        password VARCHAR(60) NOT NULL,
        birthdate DATE,
        gender ENUM ('Male', 'Female', 'Other'),
        contact_number VARCHAR(13),
        address_id INT,
        profile_picture VARCHAR(120),
        date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (address_id) REFERENCES address_list (address_id) ON DELETE SET NULL,
        INDEX idx_email (email),
        INDEX idx_username (username),
        INDEX idx_contact (contact_number),
        INDEX idx_address (address_id)
    ) COMMENT = 'Stores all user account information';

-- =====================================================
-- Now add the foreign key to address_list that references users
-- This creates the bidirectional relationship
-- =====================================================
ALTER TABLE address_list ADD FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE;

-- =====================================================
-- CUSTOMERS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS customers (
        customer_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL UNIQUE,
        date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
        INDEX idx_customer_user (user_id)
    ) COMMENT = 'Customer-specific information';

-- =====================================================
-- SELLERS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS sellers (
        seller_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL UNIQUE,
        business_name VARCHAR(50),
        address_id INT,
        identity_path VARCHAR(120),
        id_document_path VARCHAR(120),
        is_verified ENUM ('pending', 'verified', 'rejected') DEFAULT 'pending',
        date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        verification_date TIMESTAMP NULL DEFAULT NULL,
        FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
        FOREIGN KEY (address_id) REFERENCES address_list (address_id) ON DELETE SET NULL,
        INDEX idx_seller_user (user_id),
        INDEX idx_verification_status (is_verified),
        INDEX idx_seller_address (address_id)
    ) COMMENT = 'Seller accounts with verification status';

-- =====================================================
-- PRODUCTS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS products (
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
        FOREIGN KEY (seller_id) REFERENCES sellers (seller_id) ON DELETE CASCADE,
        INDEX idx_seller_products (seller_id, is_active),
        INDEX idx_category (category),
        INDEX idx_price (price),
        FULLTEXT idx_product_search (name, description)
    ) COMMENT = 'Product listings from sellers';

-- =====================================================
-- CARTS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS carts (
        cart_id INT AUTO_INCREMENT PRIMARY KEY,
        customer_id INT NOT NULL,
        seller_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL CHECK (quantity > 0),
        price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
        added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (customer_id) REFERENCES customers (customer_id) ON DELETE CASCADE,
        FOREIGN KEY (seller_id) REFERENCES sellers (seller_id) ON DELETE CASCADE,
        FOREIGN KEY (product_id) REFERENCES products (product_id),
        UNIQUE KEY unique_cart_item (customer_id, product_id),
        INDEX idx_customer_cart (customer_id, added_at),
        INDEX idx_seller_cart (seller_id)
    ) COMMENT = 'Shopping cart items';

-- =====================================================
-- ORDERS TABLE (modified to add address_id and address_snapshot, update status ENUM)
-- =====================================================
CREATE TABLE
    IF NOT EXISTS orders (
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        customer_id INT NOT NULL,
        seller_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL CHECK (quantity > 0),
        price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
        subtotal DECIMAL(10, 2) GENERATED ALWAYS AS (quantity * price) STORED,
        address_id INT NOT NULL,
        address_snapshot VARCHAR(250) NOT NULL,
        payment_method ENUM ('COD', 'Online') NOT NULL DEFAULT 'COD',
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status ENUM (
            'pending',
            'for delivery',
            'delivered',
            'cancelled',
            'refunded'
        ) DEFAULT 'pending',
        cancelled_by ENUM ('customer', 'seller') NULL,
        delivered_at TIMESTAMP NULL DEFAULT NULL,
        cancelled_at TIMESTAMP NULL DEFAULT NULL,
        FOREIGN KEY (customer_id) REFERENCES customers (customer_id) ON DELETE CASCADE,
        FOREIGN KEY (seller_id) REFERENCES sellers (seller_id) ON DELETE CASCADE,
        FOREIGN KEY (product_id) REFERENCES products (product_id),
        FOREIGN KEY (address_id) REFERENCES address_list (address_id),
        INDEX idx_customer_orders (customer_id, status, order_date),
        INDEX idx_seller_orders (seller_id, status, order_date),
        INDEX idx_order_status (status, order_date),
        INDEX idx_order_date (order_date),
        INDEX idx_order_address (address_id)
    ) COMMENT = 'Order transactions between customers and sellers';

-- =====================================================
-- PRODUCT REVIEWS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS product_reviews (
        review_id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT NOT NULL,
        user_id INT NOT NULL,
        order_id INT NOT NULL UNIQUE,
        rating TINYINT NOT NULL CHECK (
            rating >= 1
            AND rating <= 5
        ),
        comment TEXT,
        date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products (product_id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
        FOREIGN KEY (order_id) REFERENCES orders (order_id) ON DELETE CASCADE,
        INDEX idx_product_reviews (product_id, rating),
        INDEX idx_user_reviews (user_id),
        INDEX idx_recent_reviews (date_posted)
    ) COMMENT = 'Product ratings and reviews from customers';

-- =====================================================
-- REFUNDS TABLE
-- =====================================================
CREATE TABLE
    IF NOT EXISTS refunds (
        refund_id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL UNIQUE,
        wallet_id INT NULL,
        refund_amount DECIMAL(10, 2) NOT NULL,
        refund_type ENUM ('cancellation', 'return') NOT NULL,
        refund_status ENUM (
            'pending',
            'approved',
            'rejected',
            'processed',
            'failed'
        ) DEFAULT 'pending',
        requested_by ENUM ('customer', 'seller', 'system') NOT NULL,
        requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        request_reason VARCHAR(120) NULL,
        reviewed_by ENUM ('seller') NULL,
        reviewed_at TIMESTAMP NULL,
        review_notes VARCHAR(120) NULL,
        refunded_by ENUM ('system', 'seller') NULL,
        refunded_at TIMESTAMP NULL,
        refund_notes VARCHAR(120) NULL,
        original_payment_method ENUM ('COD', 'Online') NOT NULL,
        original_order_total DECIMAL(10, 2) NOT NULL,
        original_order_status VARCHAR(20) NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders (order_id) ON DELETE CASCADE,
        INDEX idx_refund_status (refund_status, requested_at),
        INDEX idx_requested_by (requested_by)
    ) COMMENT = 'Tracks refund requests and their lifecycle';

-- =====================================================
-- WALLETS TABLE (single-table design with transaction history)
-- =====================================================
CREATE TABLE
    IF NOT EXISTS wallets (
        wallet_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00 CHECK (balance >= 0),
        previous_balance DECIMAL(10, 2) NOT NULL,
        transaction_amount DECIMAL(10, 2) NOT NULL,
        transaction_type ENUM ('refund', 'payment', 'deposit', 'initial') NOT NULL,
        refund_id INT NULL,
        order_id INT NULL,
        description VARCHAR(120) NOT NULL,
        transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
        FOREIGN KEY (refund_id) REFERENCES refunds (refund_id) ON DELETE SET NULL,
        FOREIGN KEY (order_id) REFERENCES orders (order_id) ON DELETE SET NULL,
        INDEX idx_user_wallet (user_id, transaction_date DESC),
        UNIQUE INDEX idx_refund_link (refund_id),
        UNIQUE INDEX idx_order_payment (order_id)
    ) COMMENT = 'Single-table wallet with transaction history';

-- =====================================================
-- ADDITIONAL INDEXES for Performance
-- =====================================================
CREATE INDEX idx_carts_customer ON carts (customer_id);

CREATE INDEX idx_orders_customer_status ON orders (customer_id, status, order_date);

CREATE INDEX idx_orders_seller_status ON orders (seller_id, status, order_date);