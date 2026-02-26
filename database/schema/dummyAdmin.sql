USE crooks_cart_collectives;

-- =========================
-- INSERT ADMIN USERS
-- =========================

INSERT INTO administrators (
    first_name, 
    last_name, 
    email, 
    contact_number, 
    username, 
    password,
    date_created
) VALUES
(
    'Admin', 
    'One', 
    'admin1@crookscart.com', 
    '+639123456789', 
    'admin1', 
    '$2y$10$YourHashedPasswordHere1234567890', -- Replace with actual hashed password
    NOW()
),
(
    'Admin', 
    'Two', 
    'admin2@crookscart.com', 
    '+639987654321', 
    'admin2', 
    '$2y$10$YourHashedPasswordHere0987654321', -- Replace with actual hashed password
    NOW()
);

-- Note: For demo purposes with plain text passwords (as per project requirements),
-- you can use these simpler inserts:
/*
INSERT INTO administrators (first_name, last_name, email, contact_number, username, password) VALUES
('Super', 'Admin', 'admin@crookscart.com', '+639123456789', 'admin', 'admin123'),
('System', 'Administrator', 'sysadmin@crookscart.com', '+639987654321', 'sysadmin', 'admin456');
*/

-- =========================
-- VERIFY ADMIN INSERTION
-- =========================
-- SELECT * FROM administrators;