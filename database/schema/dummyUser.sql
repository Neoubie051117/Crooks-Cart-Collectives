USE crooks_cart_collectives;

/* ===============================
   USER 1: Lance Madelar (Existing)
================================ */

-- Note: User already exists from previous operations
-- This is just for reference

/* ===============================
   USER 2: Complete profile with middle name
================================ */
INSERT INTO users 
(
    first_name, middle_name, last_name, birthdate, gender, 
    contact_number, email, username, password, address
)
VALUES 
(
    'Juan', 'Dela', 'Cruz', '1990-01-15', 'Male',
    '+639123456789', 'juan.delacruz@email.com', 'juandelacruz', '123',
    '123 Rizal St., Barangay Poblacion, Makati City'
);

SET @user2 = LAST_INSERT_ID();

-- Customer record is auto-created by trigger
-- Add some sample cart items for this user
INSERT INTO carts (customer_id, seller_id, product_id, quantity, price_at_time)
VALUES 
((SELECT customer_id FROM customers WHERE user_id = @user2), 1, 1, 2, 899.00),
((SELECT customer_id FROM customers WHERE user_id = @user2), 2, 3, 1, 12999.00);

/* ===============================
   USER 3: Female user
================================ */
INSERT INTO users 
(
    first_name, middle_name, last_name, birthdate, gender, 
    contact_number, email, username, password, address
)
VALUES 
(
    'Maria', 'Santos', 'Garcia', '1995-06-20', 'Female',
    '+639987654321', 'maria.garcia@email.com', 'mariag', '123',
    '456 Mabini St., Barangay San Jose, Quezon City'
);

SET @user3 = LAST_INSERT_ID();

-- Add sample orders for this user (completed orders)
INSERT INTO orders (customer_id, seller_id, product_id, quantity, price_at_time, shipping_address, status, order_date)
VALUES 
((SELECT customer_id FROM customers WHERE user_id = @user3), 1, 2, 1, 2799.00, '456 Mabini St., Barangay San Jose, Quezon City', 'delivered', DATE_SUB(NOW(), INTERVAL 5 DAY)),
((SELECT customer_id FROM customers WHERE user_id = @user3), 3, 5, 2, 8999.00, '456 Mabini St., Barangay San Jose, Quezon City', 'ordered', DATE_SUB(NOW(), INTERVAL 2 DAY));

/* ===============================
   USER 4: User with minimal info
================================ */
INSERT INTO users 
(
    first_name, last_name, birthdate, gender, 
    contact_number, email, username, password, address
)
VALUES 
(
    'John', 'Smith', '1988-03-10', 'Male',
    '+639551234567', 'john.smith@email.com', 'johnsmith', 'john123',
    '789 Bonifacio Ave., Barangay Sto. Niño, Manila'
);

SET @user4 = LAST_INSERT_ID();

-- Empty cart for this user (no items)

/* ===============================
   USER 5: Another user with mixed activity
================================ */
INSERT INTO users 
(
    first_name, last_name, birthdate, gender, 
    contact_number, email, username, password, address
)
VALUES 
(
    'Anna', 'Dimagiba', '1992-11-25', 'Female',
    '+639223344556', 'anna.d@email.com', 'annad', 'anna1234',
    '101 Rizal Extension, Barangay San Antonio, Pasig City'
);

SET @user5 = LAST_INSERT_ID();

-- Add cart items
INSERT INTO carts (customer_id, seller_id, product_id, quantity, price_at_time)
VALUES 
((SELECT customer_id FROM customers WHERE user_id = @user5), 4, 7, 1, 17999.00),
((SELECT customer_id FROM customers WHERE user_id = @user5), 5, 9, 1, 8999.00),
((SELECT customer_id FROM customers WHERE user_id = @user5), 5, 10, 2, 15999.00);

-- Add some orders
INSERT INTO orders (customer_id, seller_id, product_id, quantity, price_at_time, shipping_address, status, order_date)
VALUES 
((SELECT customer_id FROM customers WHERE user_id = @user5), 1, 1, 3, 899.00, '101 Rizal Extension, Barangay San Antonio, Pasig City', 'delivered', DATE_SUB(NOW(), INTERVAL 10 DAY)),
((SELECT customer_id FROM customers WHERE user_id = @user5), 2, 4, 1, 3499.00, '101 Rizal Extension, Barangay San Antonio, Pasig City', 'delivered', DATE_SUB(NOW(), INTERVAL 8 DAY)),
((SELECT customer_id FROM customers WHERE user_id = @user5), 3, 6, 1, 1999.00, '101 Rizal Extension, Barangay San Antonio, Pasig City', 'cancelled', DATE_SUB(NOW(), INTERVAL 3 DAY));

/* ===============================
   VERIFICATION QUERIES
================================ */

-- Show all users with their basic info
SELECT '--- ALL USERS ---' as '';
SELECT 
    user_id,
    first_name,
    middle_name,
    last_name,
    email,
    username,
    address,
    date_created
FROM users
ORDER BY user_id;

-- Show users with their corresponding customer records
SELECT '--- USERS WITH CUSTOMER RECORDS ---' as '';
SELECT 
    u.user_id,
    u.first_name,
    u.last_name,
    u.email,
    u.username,
    c.customer_id,
    c.date_joined AS customer_since,
    c.total_orders,
    c.total_spent
FROM users u
LEFT JOIN customers c ON u.user_id = c.user_id
ORDER BY u.user_id;

-- Show cart contents for all users
SELECT '--- SHOPPING CARTS ---' as '';
SELECT 
    c.cart_id,
    u.username AS customer,
    p.name AS product,
    c.quantity,
    c.price_at_time,
    (c.quantity * c.price_at_time) AS subtotal
FROM carts c
JOIN customers cu ON c.customer_id = cu.customer_id
JOIN users u ON cu.user_id = u.user_id
JOIN products p ON c.product_id = p.product_id
ORDER BY cu.customer_id, c.added_at;

-- Show order history for all users
SELECT '--- ORDER HISTORY ---' as '';
SELECT 
    o.order_id,
    u.username AS customer,
    p.name AS product,
    o.quantity,
    o.price_at_time,
    o.subtotal,
    o.status,
    o.order_date,
    o.delivered_at
FROM orders o
JOIN customers cu ON o.customer_id = cu.customer_id
JOIN users u ON cu.user_id = u.user_id
JOIN products p ON o.product_id = p.product_id
ORDER BY o.order_date DESC;

-- Summary counts
SELECT '--- SUMMARY COUNTS ---' as '';
SELECT 
    'Total Users' AS type, COUNT(*) AS count FROM users
UNION ALL
SELECT 'Total Customers', COUNT(*) FROM customers
UNION ALL
SELECT 'Total Sellers', COUNT(*) FROM sellers
UNION ALL
SELECT 'Total Products', COUNT(*) FROM products
UNION ALL
SELECT 'Total Cart Items', COUNT(*) FROM carts
UNION ALL
SELECT 'Total Orders', COUNT(*) FROM orders;