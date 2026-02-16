USE crooks_cart_collectives;

/* ===============================
   SELLER 1
================================ */

INSERT INTO users 
(first_name, last_name, email, username, password)
VALUES 
('Alex', 'Reyes', 'alex@test.com', 'alex', 'alex');

INSERT INTO sellers 
(user_id, business_name, is_verified, verification_date)
VALUES 
(LAST_INSERT_ID(), 'Alex Gadget Store', TRUE, NOW());

SET @seller1 = LAST_INSERT_ID();

INSERT INTO products
(seller_id, name, description, price, category, stock_quantity, image_path, is_active)
VALUES
(@seller1,'Wireless Mouse','Bluetooth mouse',899.00,'Electronics',30,'assets/image/icons/seller-product-placeholder.png',TRUE),
(@seller1,'Keyboard RGB','Mechanical keyboard',2799.00,'Electronics',15,'assets/image/icons/seller-product-placeholder.png',TRUE);


/* ===============================
   SELLER 2
================================ */

INSERT INTO users 
(first_name, last_name, email, username, password)
VALUES 
('Brian', 'Lopez', 'brian@test.com', 'brian', 'brian');

INSERT INTO sellers 
(user_id, business_name, is_verified, verification_date)
VALUES 
(LAST_INSERT_ID(), 'Brian PC Parts', TRUE, NOW());

SET @seller2 = LAST_INSERT_ID();

INSERT INTO products
(seller_id, name, description, price, category, stock_quantity, image_path, is_active)
VALUES
(@seller2,'GTX Graphics Card','Gaming GPU',12999.00,'Components',5,'assets/image/icons/seller-product-placeholder.png',TRUE),
(@seller2,'RAM 16GB','DDR4 RAM kit',3499.00,'Components',15,'assets/image/icons/seller-product-placeholder.png',TRUE);


/* ===============================
   SELLER 3
================================ */

INSERT INTO users 
(first_name, last_name, email, username, password)
VALUES 
('Carlo', 'Mendez', 'carlo@test.com', 'carlo', 'carlo');

INSERT INTO sellers 
(user_id, business_name, is_verified, verification_date)
VALUES 
(LAST_INSERT_ID(), 'Carlo Mobile Hub', TRUE, NOW());

SET @seller3 = LAST_INSERT_ID();

INSERT INTO products
(seller_id, name, description, price, category, stock_quantity, image_path, is_active)
VALUES
(@seller3,'Android Phone','6GB RAM phone',8999.00,'Mobile',20,'assets/image/icons/seller-product-placeholder.png',TRUE),
(@seller3,'Bluetooth Earbuds','TWS earbuds',1999.00,'Audio',18,'assets/image/icons/seller-product-placeholder.png',TRUE);


/* ===============================
   SELLER 4
================================ */

INSERT INTO users 
(first_name, last_name, email, username, password)
VALUES 
('Derek', 'Cruz', 'derek@test.com', 'derek', 'derek');

INSERT INTO sellers 
(user_id, business_name, is_verified, verification_date)
VALUES 
(LAST_INSERT_ID(), 'Derek Home Tech', TRUE, NOW());

SET @seller4 = LAST_INSERT_ID();

INSERT INTO products
(seller_id, name, description, price, category, stock_quantity, image_path, is_active)
VALUES
(@seller4,'Smart TV 43 inch','Android TV',17999.00,'Home',6,'assets/image/icons/seller-product-placeholder.png',TRUE),
(@seller4,'Robot Vacuum','Auto cleaner',15999.00,'Home',4,'assets/image/icons/seller-product-placeholder.png',TRUE);


/* ===============================
   SELLER 5
================================ */

INSERT INTO users 
(first_name, last_name, email, username, password)
VALUES 
('Evan', 'Torres', 'evan@test.com', 'evan', 'evan');

INSERT INTO sellers 
(user_id, business_name, is_verified, verification_date)
VALUES 
(LAST_INSERT_ID(), 'Evan Gaming Shop', TRUE, NOW());

SET @seller5 = LAST_INSERT_ID();

INSERT INTO products
(seller_id, name, description, price, category, stock_quantity, image_path, is_active)
VALUES
(@seller5,'Gaming Chair','Ergonomic chair',8999.00,'Gaming',6,'assets/image/icons/seller-product-placeholder.png',TRUE),
(@seller5,'VR Headset','Virtual reality',15999.00,'Gaming',3,'assets/image/icons/seller-product-placeholder.png',TRUE);