-- Database schema for Crooks-Cart-Collectives E-commerce Platform (Simplified)

CREATE DATABASE IF NOT EXISTS crooks_cart_collectives;
USE crooks_cart_collectives;

-- Users table: Stores information about platform users (customers and sellers)
CREATE TABLE users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    middleName VARCHAR(50),
    lastName VARCHAR(50) NOT NULL,
    birthdate DATE,
    gender ENUM('Male','Female'),
    contact VARCHAR(15),
    email VARCHAR(100) UNIQUE,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Administrators table: Stores system administrator accounts
CREATE TABLE administrators (
    adminID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contactNum VARCHAR(15),
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Customers table: Represents users who purchase products
CREATE TABLE customers (
    customerID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL UNIQUE,
    dateJoined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

-- Sellers table: Represents users who sell products on the platform
CREATE TABLE sellers (
    sellerID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL UNIQUE,
    validIDPath VARCHAR(255),
    isVerified BOOLEAN DEFAULT FALSE,
    dateApplied TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

-- Products table: Stores product information listed by sellers
CREATE TABLE products (
    productID INT AUTO_INCREMENT PRIMARY KEY,
    sellerID INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(50),
    stockQuantity INT DEFAULT 0,
    imagePath VARCHAR(255),
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sellerID) REFERENCES sellers(sellerID) ON DELETE CASCADE
);

-- Customer Orders table: Tracks customer purchases
CREATE TABLE customer_orders (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    customerID INT NOT NULL,
    orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    totalAmount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    shippingAddress VARCHAR(255),
    paymentMethod VARCHAR(50),
    FOREIGN KEY (customerID) REFERENCES customers(customerID) ON DELETE CASCADE
);

-- Purchase Items table: Links products to orders with quantity and price details
CREATE TABLE purchase_items (
    orderItemID INT AUTO_INCREMENT PRIMARY KEY,
    orderID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    priceAtTime DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (orderID) REFERENCES customer_orders(orderID) ON DELETE CASCADE,
    FOREIGN KEY (productID) REFERENCES products(productID)
);

-- Product Reviews table: Stores reviews left by users for specific products
CREATE TABLE product_reviews (
    reviewID INT AUTO_INCREMENT PRIMARY KEY,
    productID INT NOT NULL,
    userID INT NOT NULL, -- can be customer or seller
    orderID INT NOT NULL, -- ensures reviews are from actual purchases
    rating TINYINT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    title VARCHAR(100),
    comment TEXT,
    datePosted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    isEdited BOOLEAN DEFAULT FALSE,
    lastEdited TIMESTAMP NULL,
    FOREIGN KEY (productID) REFERENCES products(productID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE,
    FOREIGN KEY (orderID) REFERENCES customer_orders(orderID) ON DELETE CASCADE,
    UNIQUE KEY unique_order_review (orderID, productID) -- One review per product per order
);

-- Indexes for better query performance
CREATE INDEX idx_product_reviews_product ON product_reviews(productID, rating, datePosted);
CREATE INDEX idx_product_reviews_user ON product_reviews(userID);
CREATE INDEX idx_customer_orders_customer_date ON customer_orders(customerID, orderDate);
