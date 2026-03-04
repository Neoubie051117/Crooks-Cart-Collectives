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
    profile_picture,
    date_joined
) VALUES
(
    'Admin', 
    'One', 
    'admin1@crookscart.com', 
    '+639123456789', 
    'admin1', 
    'admin123',
    NULL,
    NOW()
),
(
    'Admin', 
    'Two', 
    'admin2@crookscart.com', 
    '+639987654321', 
    'admin2', 
    'admin456',
    NULL,
    NOW()
);