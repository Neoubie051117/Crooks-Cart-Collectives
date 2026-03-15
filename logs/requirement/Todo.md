# Updated System Improvements and Feature Implementation

This document outlines the required improvements and new features for the **Crooks Cart Collectives** e-commerce system. The system already has an existing database structure and working modules, so new features should integrate with the current schema without breaking existing functionality.

---

# 1. Sign Up Page Improvement [DONE]

Add a **Terms and Conditions agreement checkbox** to the registration form.

**Requirements:**

- Checkbox text: _"I agree to the Terms and Conditions and Privacy Policy."_
- The **Terms and Conditions** and **Privacy Policy** pages already exist in the site footer.
- Users **must check the box before they can register**.
- Form submission will be prevented if checkbox is unchecked.
- Error message: "You must agree to the Terms and Conditions to register."

**Files Affected:**

- `pages/sign-up.php` - Add checkbox field
- `scripts/sign-up.js` - Add validation for checkbox
- `styles/sign-up.css` - Style checkbox and error message

---

# 2. Current Database Address Structure [DONE]

Previously, the `users` table stored the address as a **single text field**.

**Old Structure (for reference):**

```sql
users
------
user_id
first_name
last_name
email
username
password
address VARCHAR(150)  -- Single concatenated address (NOW REMOVED)
```

**Limitations of old approach:**

- Users could only store **one address**.
- Address was **not structured** (can't query by city/barangay).
- Orders couldn't reference specific saved addresses.
- No way to have separate billing vs shipping addresses.

---

# 3. New Address System Implementation [DONE]

We have implemented a **normalized address system** with multiple addresses per user, stored in structured fields.

**New Structure:**

```sql
address_list
------------
address_id INT PRIMARY KEY AUTO_INCREMENT
user_id INT NOT NULL
block VARCHAR(120) NOT NULL              -- House number, street, building
barangay VARCHAR(100) NULL                -- NULL for non-PH addresses
city VARCHAR(100) NOT NULL
province VARCHAR(100) NULL                 -- NULL for non-PH addresses
region VARCHAR(100) NULL                    -- NULL for non-PH addresses
postal_code VARCHAR(10) NOT NULL
country VARCHAR(100) DEFAULT 'Philippines'
is_default BOOLEAN DEFAULT FALSE           -- First/oldest address is default
date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP

FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
```

**Users Table Changes:**

- The `address` column in `users` table has been **removed** (no more concatenated address).
- Users now reference their default address via `address_id` in `users` table.
- All address data is stored exclusively in `address_list`.

**Key Benefits:**

- Each user can save **up to 5 addresses**.
- Addresses are stored in structured format (block, barangay, city, province, etc.).
- Users can select a saved address during checkout.
- Orders store the selected address as **text snapshot** (for historical accuracy) while also referencing `address_id`.
- Support for international addresses (barangay/province/region optional for non-Philippines).

---

# 4. Registration Address Handling [DONE]

When a user registers, the address fields are stored in `address_list` as their first address.

**Registration Flow:**

1. User fills out registration form with structured address fields.
2. System validates all required fields (conditional based on country).
3. Upon successful registration:
   - User record created in `users` table with `address_id = NULL` initially.
   - Address record created in `address_list` with the new `user_id`.
   - Users table updated with the new `address_id`.
   - Customer record created.

**Files Affected:**

- `database/sign-up-handler.php` - Insert into both tables with proper transaction order
- `pages/sign-up.php` - Form with all address fields
- `scripts/sign-up.js` - Conditional validation for PH vs international

**Validation Logic:**

- If country is "Philippines": Barangay, Province, and Region are **required**.
- If country is "Other": Barangay, Province, and Region are **optional**.

---

# 5. Address List Management [DONE]

Users can now manage up to 5 addresses through a dedicated address list page.

**Address List Features:**

| Feature     | Description                                       |
| ----------- | ------------------------------------------------- |
| **View**    | All addresses displayed as full-width cards       |
| **Add**     | Add new address (up to 5 total)                   |
| **Edit**    | Modify any existing address                       |
| **Delete**  | Remove address (except the main/default address)  |
| **Default** | First/oldest address is automatically the default |

**Address Card Layout:**

- **Desktop**: Address content on left, Edit and Delete buttons horizontally on right
- **Tablet**: Same as desktop with slightly smaller buttons
- **Mobile**: Address content on top, buttons as horizontal row at bottom
- **Small Mobile**: Address content on top, buttons stacked vertically at bottom

**Address Numbering:**

- Addresses are numbered #1 through #5 based on their order (oldest to newest)
- #1 is always the default/main address and cannot be deleted

**Button Colors:**

- Edit button: Black with white text and edit icon
- Delete button: Black with white text and trash icon (grayed out when disabled)

**Main Address Protection:**

- The first address (index 0) is identified with a "MAIN" badge
- Delete button is disabled (grayed out)
- Clicking disabled delete button shows warning modal:
  > "This is your main address and cannot be deleted. You can edit it if needed, but it must remain as your primary address."

**Files Created/Modified:**

| File                                | Type | Purpose                 |
| ----------------------------------- | ---- | ----------------------- |
| `pages/address-list.php`            | New  | Address management page |
| `scripts/address-list.js`           | New  | Address CRUD operations |
| `styles/address-list.css`           | New  | Address list styling    |
| `database/address-list-handler.php` | New  | Address API endpoints   |

---

# 6. Checkout Address Selection [DONE]

Checkout now uses address selection instead of manual entry.

**New Checkout Flow:**

1. User proceeds to checkout.
2. System fetches all addresses from `address_list` for the logged-in user.
3. User selects an address from a list of radio buttons/cards.
4. Selected address is stored with the order (both as text snapshot and address_id reference).
5. User can edit shipping address during checkout (temporary edit for that order only).

**Address Editing During Checkout:**

- "Edit Address" button allows user to modify shipping address for the current order only
- Changes are not saved to their address list
- Useful for one-time deliveries to different locations

**Files Modified:**

| File                            | Changes                                            |
| ------------------------------- | -------------------------------------------------- |
| `pages/checkout.php`            | Replace manual address input with address selector |
| `database/checkout-handler.php` | Accept `address_id`, store both ID and snapshot    |
| `scripts/checkout.js`           | Handle address selection and temporary edits       |
| `styles/checkout.css`           | Style address selection cards/radio buttons        |

**Database Impact on Orders:**

```sql
-- Added to orders table
ALTER TABLE orders
ADD COLUMN address_id INT NOT NULL,
ADD COLUMN address_snapshot VARCHAR(250) NOT NULL,
ADD FOREIGN KEY (address_id) REFERENCES address_list(address_id);
```

---

# 7. Customer Profile Address Integration [DONE]

Customer profile page now integrates with the address list system.

**Profile Page Changes:**

- Removed manual address input field
- Added link to dedicated address list page
- Displays current default address for reference
- Shows count of saved addresses

**Files Modified:**

| File                          | Changes                                     |
| ----------------------------- | ------------------------------------------- |
| `pages/customer-profile.php`  | Remove address field, add address list link |
| `scripts/customer-profile.js` | Remove address validation                   |
| `styles/profile.css`          | Update layout for removed fields            |

---

# 8. Order and Seller Pages Address Display [DONE]

Both customer orders and seller process order pages now display address information properly.

**Customer Orders Page (`orders.php`):**

- Displays shipping address from `address_snapshot`
- Shows payment method at top of shipping details
- Allows editing shipping address for pending orders (temporary edit)

**Seller Process Orders Page (`seller-process-order.php`):**

- Displays customer details including shipping address
- Shows payment method at top of customer details
- Read-only view (sellers cannot modify addresses)

**Files Modified:**

| File                              | Changes                                        |
| --------------------------------- | ---------------------------------------------- |
| `pages/orders.php`                | Update address display, add edit functionality |
| `scripts/orders.js`               | Handle address editing                         |
| `styles/orders.css`               | Style address and payment sections             |
| `pages/seller-process-order.php`  | Update customer details display                |
| `scripts/seller-process-order.js` | Show payment method at top                     |
| `styles/seller-process-order.css` | Style payment badge at top                     |

---

# 9. Database Schema Updates [DONE]

## 9.1 New Tables Created

| Table          | Purpose                              |
| -------------- | ------------------------------------ |
| `address_list` | Store structured addresses for users |

## 9.2 Tables Modified

| Table    | Changes                                                  |
| -------- | -------------------------------------------------------- |
| `users`  | Removed `address` column, added `address_id` foreign key |
| `orders` | Added `address_id` and `address_snapshot` columns        |

## 9.3 Table Relationship Diagram

```
users (1) ──┬── address_list (0-5)
            └── orders (references selected address_id via address_snapshot)
```

---

# 10. Address Validation Rules

| Field        | Philippines | Other Countries |
| ------------ | ----------- | --------------- |
| Block/Street | Required    | Required        |
| Barangay     | Required    | Optional        |
| City         | Required    | Required        |
| Province     | Required    | Optional        |
| Region       | Required    | Optional        |
| Postal Code  | Required    | Required        |
| Country      | Required    | Required        |

---

# 11. Summary of Completed Address System Files

| File                                | Status  | Purpose                                                 |
| ----------------------------------- | ------- | ------------------------------------------------------- |
| `sql/init.sql`                      | Updated | New `address_list` table, modified `users` and `orders` |
| `sql/dummy_data.sql`                | Updated | Sample addresses for testing                            |
| `database/sign-up-handler.php`      | Updated | Transaction with address insertion                      |
| `pages/sign-up.php`                 | Updated | Structured address fields                               |
| `scripts/sign-up.js`                | Updated | Conditional validation                                  |
| `pages/address-list.php`            | New     | Address management UI                                   |
| `scripts/address-list.js`           | New     | Address CRUD operations                                 |
| `styles/address-list.css`           | New     | Address list styling                                    |
| `database/address-list-handler.php` | New     | Address API endpoints                                   |
| `pages/checkout.php`                | Updated | Address selection                                       |
| `database/checkout-handler.php`     | Updated | Store address_id and snapshot                           |
| `scripts/checkout.js`               | Updated | Address handling                                        |
| `pages/orders.php`                  | Updated | Display shipping address                                |
| `scripts/orders.js`                 | Updated | Address editing                                         |
| `pages/seller-process-order.php`    | Updated | Display customer address                                |
| `pages/customer-profile.php`        | Updated | Link to address list                                    |
| `scripts/customer-profile.js`       | Updated | Remove address handling                                 |

---

# 12. Next Steps (Wallet and Payment System)

The following features are planned for future implementation:

- [ ] E-Wallet system (single-table design with transaction history)
- [ ] Online payment simulation (GCash QR)
- [ ] Refund system (one-attempt policy)
- [ ] Order status workflow update
- [ ] Wallet validation during checkout

These will be documented in a separate feature specification.
