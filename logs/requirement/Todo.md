We're done adding features 1-5

### System Improvements and Feature Implementation

This document outlines the required improvements and new features for the **Crooks Cart Collectives** e-commerce system. The system already has an existing database structure and working modules, so new features should integrate with the current schema without breaking existing functionality.

---

# 1. Sign Up Page Improvement

Add a **Terms and Conditions agreement checkbox** to the registration form.

Requirements:

- Checkbox text:

  _“I agree to the Terms and Conditions and Privacy Policy.”_

- The **Terms and Conditions** and **Privacy Policy** pages already exist in the site footer.

- Users **must check the box before they can register**.

---

# 2. Current Database Address Structure

Currently, the `users` table stores the address as a **single text field**.

Example structure:

```sql
users
------
user_id
first_name
last_name
email
username
password
address VARCHAR(150)
```

Example stored value:

```
Purok 5 Tambakan 2, Barangay San Miguel, Pasig City
```

### Problem

This design has limitations:

- Users can only store **one address**.
- The address is **not structured**.
- Orders cannot reference specific saved addresses.
- It is difficult to scale or reuse addresses.

---

# 3. Goal: Add Address List System

The goal is to allow **multiple addresses per user**, similar to real e-commerce systems.

### Requirements

- Each user can save **up to 5 addresses**.
- Users can **select a saved address during checkout**.
- Orders will use the **selected address** for shipping.

Instead of storing addresses inside the `users` table, a new table should be created.

---

# 4. New Address Table

Create a new table called `address_list`.

Example structure:

```sql
CREATE TABLE address_list (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,

    block VARCHAR(120),
    barangay VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    region VARCHAR(100),
    postal_code VARCHAR(10),
    country VARCHAR(100) DEFAULT 'Philippines',

    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
```

### Relationship

```
users
   │
   └── address_list
```

Meaning:

- One **user** can have multiple addresses.
- Each address belongs to **one user**.

---

# 5. Registration Address Handling

When a user registers:

1. The address fields entered during registration should be stored as the **first record in `address_list`**.
2. The `users.address` column may remain temporarily for compatibility, but the system should **start using `address_list` as the main source of addresses**.

---

# 6. Checkout System Changes

Fix the following files:

- `checkout.php`
- checkout handlers
- checkout JavaScript

Changes required:

- Instead of manually typing the address, users should **select an address from their saved address list**.
- Display all addresses linked to the logged-in user.

Example query:

```sql
SELECT * FROM address_list
WHERE user_id = ?
```

---

# 7. Online Payment Simulation (GCash QR)

Because real payment APIs cannot be used, simulate **GCash payment processing**.

Implementation:

- Add **Online Payment** as a payment option.
- When the user selects **Online Payment**:
  - Display a **modal containing a GCash QR code**.
  - This simulates the user scanning the QR.

Behavior:

- Modal appears after selecting the payment method.
- User clicks **OK** to confirm payment.
- Modal closes and checkout continues.

---

# 8. E-Wallet System (Refund Simulation)

Add an **E-Wallet feature** to simulate refunds.

Possible new files:

```
wallet.php
wallet_handler.php
```

Suggested tables:

### wallet

Stores the user’s wallet balance.

### wallet_transactions

Stores wallet activity such as:

- refunds
- payments
- balance updates

Refund logic:

- If an order paid via **Online Payment** is cancelled,
- The refund amount should be **added to the user’s wallet balance**.

---

# 9. Order Status Workflow Update

Current status values:

```
pending
delivered
cancelled
```

Update the `orders.status` ENUM to:

```
pending
for delivery
delivered
cancelled
refunded
```

New seller workflow:

1. Order placed → `pending`
2. Seller processes order → `for delivery`
3. Seller confirms delivery → `delivered`

---

# 10. Wallet Validation During Checkout

When **Online Payment** is selected:

- The system must check the **user’s wallet balance**.
- If the wallet balance is **insufficient**, the checkout should not proceed.

Example message:

```
Insufficient wallet balance.
```
