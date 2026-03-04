USE crooks_cart_collectives;

-- =========================
-- INSERT 5 REGULAR USERS
-- =========================

INSERT INTO users (
    first_name, last_name, email, username, password, address
) VALUES
('Juan', 'Dela Cruz', 'juan.delacruz@email.com', 'juandelacruz', 'password123', '123 Rizal St., Barangay Poblacion, Makati City'),
('Maria', 'Santos', 'maria.santos@email.com', 'mariasantos', 'password123', '456 Mabini St., Barangay San Jose, Quezon City'),
('Jose', 'Reyes', 'jose.reyes@email.com', 'josereyes', 'password123', '789 Bonifacio Ave., Barangay San Juan, Manila'),
('Ana', 'Gonzales', 'ana.gonzales@email.com', 'anagonzales', 'password123', '321 Luna St., Barangay San Pedro, Pasig City'),
('Pedro', 'Villanueva', 'pedro.villanueva@email.com', 'pedrovillanueva', 'password123', '654 Aguinaldo St., Barangay San Roque, Caloocan City');

-- =========================
-- MAKE THEM CUSTOMERS
-- =========================

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'juandelacruz';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'mariasantos';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'josereyes';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'anagonzales';

INSERT INTO customers (user_id)
SELECT user_id FROM users WHERE username = 'pedrovillanueva';