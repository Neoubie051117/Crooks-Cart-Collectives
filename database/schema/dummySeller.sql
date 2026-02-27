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