USE crooks_cart_collectives;

-- =========================
-- INSERT 5 SELLER USERS
-- =========================

INSERT INTO users (
first_name, last_name, email, username, password, address
) VALUES
('Mark', 'Santos', 'mark@Sellerdummy.com', 'mark', '123', 'Manila'),
('Jessa', 'Reyes', 'jessa@Sellerdummy.com', 'jessa', '123', 'Cebu'),
('Kyle', 'Lopez', 'kyle@Sellerdummy.com', 'kyle', '123', 'Davao'),
('Anna', 'Cruz', 'anna@Sellerdummy.com', 'anna', '123', 'Baguio'),
('Leo', 'Garcia', 'leo@Sellerdummy.com', 'leo', '123', 'Iloilo');

-- =========================
-- MAKE THEM SELLERS
-- =========================

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Mark Tech Store', TRUE FROM users WHERE username = 'mark';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Jessa Gaming Hub', TRUE FROM users WHERE username = 'jessa';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Kyle Gadget Zone', TRUE FROM users WHERE username = 'kyle';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Anna Digital Shop', TRUE FROM users WHERE username = 'anna';

INSERT INTO sellers (user_id, business_name, is_verified)
SELECT user_id, 'Leo Tech Corner', TRUE FROM users WHERE username = 'leo';

-- =========================
-- INSERT 2 PRODUCTS PER SELLER
-- =========================

-- MARK
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Wireless Mouse', '2.4G Wireless Mouse', 599.00, 'Accessories', 25,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'mark';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Mechanical Keyboard', 'RGB Mechanical Keyboard', 2499.00, 'Accessories', 15,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'mark';

-- JESSA
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Gaming Chair Pro', 'Ergonomic Gaming Chair', 8999.00, 'Furniture', 10,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'jessa';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Gaming Desk', 'Spacious Gaming Desk', 6999.00, 'Furniture', 8,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'jessa';

-- KYLE
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'USB Hub', '4 Port USB Hub', 499.00, 'Electronics', 30,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'kyle';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'External SSD 1TB', 'High Speed External SSD', 5499.00, 'Electronics', 12,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'kyle';

-- ANNA
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Smart Watch', 'Fitness Smart Watch', 2999.00, 'Wearables', 18,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'anna';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Bluetooth Earbuds', 'Wireless Bluetooth Earbuds', 1999.00, 'Wearables', 22,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'anna';

-- LEO
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'VR Headset', 'Virtual Reality Headset', 15999.00, 'Electronics', 6,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'leo';

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, image_path)
SELECT s.seller_id, 'Gaming Monitor 144Hz', '27 inch 144Hz Monitor', 12999.00, 'Electronics', 9,
'assets/image/icons/seller-product-placeholder.png'
FROM sellers s JOIN users u ON s.user_id = u.user_id
WHERE u.username = 'leo';