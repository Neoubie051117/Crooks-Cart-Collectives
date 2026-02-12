-- Database schema for Crooks-Cart-Collectives E-commerce Platform (Revised)

CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;
USE crooks_cart_collectives;

-- Users table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,

    birthdate DATE,
    gender ENUM('Male','Female','Other'),

    contact_number VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,

    password_hash VARCHAR(255) NOT NULL,

    address VARCHAR(255),
    profile_picture VARCHAR(255),

    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Administrators table
CREATE TABLE administrators (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,

    email VARCHAR(100) UNIQUE NOT NULL,
    contact_number VARCHAR(15),

    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,

    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Customers table
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL UNIQUE,

    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_orders INT DEFAULT 0,
    total_spent DECIMAL(10,2) DEFAULT 0.00,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

-- Sellers table
CREATE TABLE sellers (
    seller_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL UNIQUE,

    business_name VARCHAR(100),
    valid_id_path VARCHAR(255),

    is_verified BOOLEAN DEFAULT FALSE,
    verification_date TIMESTAMP NULL,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    total_products INT DEFAULT 0,
    total_sales DECIMAL(10,2) DEFAULT 0.00,
    rating DECIMAL(3,2) DEFAULT 0.00,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

-- Products table
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,

    seller_id INT NOT NULL,

    name VARCHAR(100) NOT NULL,
    description TEXT,

    price DECIMAL(10,2) NOT NULL,
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

-- Shopping Carts table
CREATE TABLE shopping_carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON DELETE CASCADE
);

-- Cart Items table
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
        REFERENCES products(product_id)
);

-- Customer Orders table
CREATE TABLE customer_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL,

    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    total_amount DECIMAL(10,2) NOT NULL,

    status ENUM(
        'pending',
        'processing',
        'shipped',
        'delivered',
        'cancelled'
    ) DEFAULT 'pending',

    shipping_address VARCHAR(255),
    payment_method VARCHAR(50),
    tracking_number VARCHAR(100),

    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON DELETE CASCADE
);

-- Purchase Items table
CREATE TABLE purchase_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,

    order_id INT NOT NULL,
    product_id INT NOT NULL,

    quantity INT NOT NULL,
    price_at_time DECIMAL(10,2) NOT NULL,

    subtotal DECIMAL(10,2)
        GENERATED ALWAYS AS (quantity * price_at_time) STORED,

    FOREIGN KEY (order_id)
        REFERENCES customer_orders(order_id)
        ON DELETE CASCADE,

    FOREIGN KEY (product_id)
        REFERENCES products(product_id)
);

-- Product Reviews table
CREATE TABLE product_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,

    product_id INT NOT NULL,
    user_id INT NOT NULL,
    order_id INT NOT NULL,

    rating TINYINT NOT NULL
        CHECK (rating >= 1 AND rating <= 5),

    title VARCHAR(100),
    comment TEXT,

    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    is_edited BOOLEAN DEFAULT FALSE,
    last_edited TIMESTAMP NULL,

    FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,

    FOREIGN KEY (order_id)
        REFERENCES customer_orders(order_id)
        ON DELETE CASCADE,

    UNIQUE KEY unique_order_review (order_id, product_id)
);

-- Indexes
CREATE INDEX idx_product_reviews_product
ON product_reviews(product_id, rating, date_posted);

CREATE INDEX idx_product_reviews_user
ON product_reviews(user_id);

CREATE INDEX idx_customer_orders_customer_date
ON customer_orders(customer_id, order_date);

CREATE INDEX idx_cart_items_cart_product
ON cart_items(cart_id, product_id);


-- Auto-create customer + cart after signup
DELIMITER $$

CREATE TRIGGER after_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN

    INSERT INTO customers (user_id)
    VALUES (NEW.user_id);

    INSERT INTO shopping_carts (customer_id)
    VALUES (LAST_INSERT_ID());

END$$

DELIMITER ;
