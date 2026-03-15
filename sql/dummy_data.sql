-- =========================
-- MAKE THEM SELLERS - ALL VERIFIED NOW
-- =========================

-- First, ensure we're using the correct database
USE crooks_cart_collectives;

-- =========================
-- INSERT 5 SELLER USERS WITH CONTACT NUMBERS
-- =========================
INSERT INTO users (
    first_name, last_name, email, username, password, address, contact_number
) VALUES
    ('Aling', 'Bebang', 'aling.bebang@Sellerdummy.com', 'alingbebang', '123', '123 Market Ave., Purok 5, Tambakan 2, Brgy. San Miguel, Pasig City', '09090909090'),
    ('Totoy', 'Bibo', 'totoy.bibo@Sellerdummy.com', 'totoybibo', '123', '45 Mabini St., Purok 3, Brgy. Guadalupe, Cebu City', '09000000001'),
    ('El', 'Bimbo', 'el.bimbo@Sellerdummy.com', 'thelastelbimby', '123', '78 Rizal Ave., Purok 7, Brgy. Buhangin, Davao City', '09111111111'),
    ('Pure', 'Foods', 'pure.foods@Sellerdummy.com', 'hotdog', '123', '22 Session Rd., Purok 12, Brgy. Aurora Hill, Baguio City', '09222222222'),
    ('Lebron', 'James', 'lebron.james@Sellerdummy.com', 'ninja', '123', '15 Delgado St., Purok 2, Brgy. Jaro, Iloilo City', '09333333333');

-- =========================
-- MAKE THEM SELLERS - ALL VERIFIED NOW
-- =========================
INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified, verification_date)
SELECT user_id, 'Aling Bebang''s Tiangge', 'Crooks-Data-Storage/users/dummy/verification/identity.png', 'Crooks-Data-Storage/users/dummy/verification/id_document.png', 'verified', NOW() 
FROM users WHERE username = 'alingbebang';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified, verification_date)
SELECT user_id, 'Totoy Bibo Bargains', 'Crooks-Data-Storage/users/dummy/verification/identity.png', 'Crooks-Data-Storage/users/dummy/verification/id_document.png', 'verified', NOW() 
FROM users WHERE username = 'totoybibo';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified, verification_date)
SELECT user_id, 'El Bimbo''s Ukay-Ukay', 'Crooks-Data-Storage/users/dummy/verification/identity.png', 'Crooks-Data-Storage/users/dummy/verification/id_document.png', 'verified', NOW() 
FROM users WHERE username = 'thelastelbimby';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified, verification_date)
SELECT user_id, 'Pure Foods Paninda', 'Crooks-Data-Storage/users/dummy/verification/identity.png', 'Crooks-Data-Storage/users/dummy/verification/id_document.png', 'verified', NOW() 
FROM users WHERE username = 'hotdog';

INSERT INTO sellers (user_id, business_name, identity_path, id_document_path, is_verified, verification_date)
SELECT user_id, 'Ninja''s Hidden Treasures', 'Crooks-Data-Storage/users/dummy/verification/identity.png', 'Crooks-Data-Storage/users/dummy/verification/id_document.png', 'verified', NOW() 
FROM users WHERE username = 'ninja';

-- =========================
-- INSERT UNIQUE PRODUCTS PER SELLER - NO DUPLICATES
-- =========================

-- ===== ALING BEBANG (2 products) =====
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Lumang Bag', 'Second hand na bag - medyo luma pero maganda pa', 120.00, 'Accessories', 15,
'Crooks-Data-Storage/products/bag-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'alingbebang');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Second Hand Ballpen', 'Mga lumang ballpen na may tinta pa', 5.00, 'School Supplies', 50,
'Crooks-Data-Storage/products/ballpen-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'alingbebang');

-- ===== TOTOY BIBO (3 products) =====
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Lumang Double Deck', 'Second hand na double deck bed - wooden frame, matibay pa', 1500.00, 'Furniture', 2,
'Crooks-Data-Storage/products/bed-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'totoybibo');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Gamit na Creatine', 'Bukas na pero half pa ang laman - pang-gym', 250.00, 'Sports Supplement', 5,
'Crooks-Data-Storage/products/creatine-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'totoybibo');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Second Hand GPU', 'Lumang graphics card - GTX 1050 Ti, working condition', 2500.00, 'Electronics', 2,
'Crooks-Data-Storage/products/gpu-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'totoybibo');

-- ===== EL BIMBO (3 products) =====
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Tender Juicy Hotdogs', 'Bultong hotdogs - 1 kilo pack, malapit na mag-expire', 80.00, 'Food', 25,
'Crooks-Data-Storage/products/hotdogs-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'thelastelbimby');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Lumang Mio Motor', 'Yamaha Mio - 2010 model, need ng konting ayos', 15000.00, 'Vehicles', 1,
'Crooks-Data-Storage/products/mio-motor-cycle-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'thelastelbimby');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Yelo (Cracked Ice)', 'Isang sako na yelo - pang-inuman', 50.00, 'Food', 15,
'Crooks-Data-Storage/products/ice-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'thelastelbimby');

-- ===== PURE FOODS (2 products) =====
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Tall Ice - Matataas na Yelo', 'Pang-kape at softdrinks - mahaba at matigas', 25.00, 'Food', 30,
'Crooks-Data-Storage/products/tall-ice-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'hotdog');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Pang-Travel na Bag', 'Malaking bag pang-outing - may konting dumi', 180.00, 'Accessories', 7,
'Crooks-Data-Storage/products/travel-bag-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'hotdog');

-- ===== LEBRON JAMES (2 products) =====
INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Lumang Duffle Bag', 'Malaking duffle bag pang-gym - may konting gasgas', 220.00, 'Accessories', 4,
'Crooks-Data-Storage/products/bag-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'ninja');

INSERT INTO products (seller_id, name, description, price, category, stock_quantity, media_path)
SELECT s.seller_id, 'Sign Pen Set', 'Set ng 5 sign pens - iba-ibang kulay', 35.00, 'School Supplies', 30,
'Crooks-Data-Storage/products/ballpen-for-sale/'
FROM sellers s WHERE s.user_id = (SELECT user_id FROM users WHERE username = 'ninja');

-- =========================
-- ADD SELLER PROFILES USING THE PROFILE IMAGES
-- =========================
UPDATE users 
SET profile_picture = 'Crooks-Data-Storage/users/dummy/profile/profile.png'
WHERE username IN ('alingbebang', 'totoybibo', 'thelastelbimby', 'hotdog', 'ninja');

-- =========================
-- CREATE A STANDALONE ADMINISTRATOR
-- =========================
INSERT INTO administrators (
    first_name, 
    last_name, 
    email, 
    contact_number, 
    username, 
    password, 
    profile_picture,
    last_log
) VALUES (
    'Admin', 
    'User', 
    'admin@crookscart.com', 
    '09123456789', 
    'admin', 
    'admin', 
    'Crooks-Data-Storage/administrators/dummy/profile/profile.png',
    NOW()
);