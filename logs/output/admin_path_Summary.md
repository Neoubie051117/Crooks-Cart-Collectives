# Web Project: Crooks-Cart-Collectives

**Preset:** admin_path

**Generated:** 2026-03-03 04:21:59

---

## File: `Crooks-Cart-Collectives/logs/requirement/Instructions.md`

**Status:** `FOUND`

```markdown
# ⚠️ CRITICAL: AI INSTRUCTION ENFORCEMENT ⚠️

## 🔴 ABSOLUTE MANDATORY RULES - DO NOT IGNORE 🔴

**YOU MUST FOLLOW THESE RULES EXACTLY. NO EXCEPTIONS. NO DEVIATIONS.**

---

### RULE 001: REVIEW BEFORE CHANGING
- You MUST review ALL provided files completely before making ANY changes
- Read through the entire context first
- Understand the full project structure before modifying anything
- **FAILURE TO REVIEW FIRST = IGNORING INSTRUCTIONS**

---

### RULE 002: NO EMOJIS - STRICTLY FORBIDDEN
- **YOU ARE ABSOLUTELY FORBIDDEN FROM USING ANY EMOJIS IN CODE, COMMENTS, OR OUTPUT**
- This includes: 😊 🎉 ✅ ❌ ⚠️ 🔴 🟢 🔵 💰 📦 👤 📅 📋 ✗ ✓ • or ANY other emoji
- Use only plain text characters: letters, numbers, and standard punctuation
- Use simple bullet points like "-" or "*" if needed
- **VIOLATION: Adding ANY emoji = FAILURE TO FOLLOW INSTRUCTIONS**

---

### RULE 003: STRICT COLOR PALETTE - ONLY THREE COLORS ALLOWED
- **COLORS PERMITTED:** White (#FFFFFF), Orange (#FF8246), and Black (#000000)
- **NO OTHER COLORS WHATSOEVER** - This means:
  - NO blues, greens, reds, yellows, purples, grays (except black/white)
  - NO #28a745 (green), NO #dc3545 (red), NO #007bff (blue)
  - NO rgba() with colors outside white/orange/black
  - NO gradients using other colors
- Backgrounds must be white, black, or orange only
- Text must be black on light backgrounds, white on dark backgrounds
- Borders must be black or orange only
- **VIOLATION: Using ANY color outside white/orange/black = FAILURE**

---

### RULE 004: MODIFY ONLY REQUESTED FILES
- Change ONLY the files explicitly mentioned in the request
- If told "revise seller orders js and css" - ONLY change those two files
- Do NOT touch other JavaScript files, CSS files, PHP files, or HTML
- Do NOT add new files
- Do NOT modify file structure
- **VIOLATION: Changing unrequested files = FAILURE**

---

### RULE 005: REWRITE ENTIRE FILES - NO SNIPPETS
- When modifying a file, you MUST output the COMPLETE file content
- Do NOT send partial code snippets or diffs
- The entire file must be shown from start to end
- Include ALL original code plus your changes
- **VIOLATION: Sending snippets instead of full files = FAILURE**

---

### RULE 006: FILE PATH FORMAT - STRICT REQUIREMENT
- When outputting any file, you MUST start with:

- Example: /Crooks-Cart-Collectives/scripts/seller-orders.js
- Then immediately follow with the file content in a code block
- **VIOLATION: Missing or incorrect file path format = FAILURE**

---

### RULE 007: USE EXISTING SVG ICONS ONLY
- NEVER create or hardcode vector icons
- ONLY use SVG files from `/assets/image/icons/`
- Do NOT edit SVG files directly
- Apply orange color to SVGs using CSS filters or root variables
- For hover effects: ONLY simple icon scaling on divs or cards
- NO animations that move cards up/down
- **VIOLATION: Creating new icons or using non-existent icons = FAILURE**

---

### RULE 008: PLAIN TEXT PASSWORDS FOR DEMO
- Passwords MUST be stored as plain text
- NO password hashing implementation
- NO suggesting hashing in comments
- This is intentional for demo purposes
- **VIOLATION: Implementing or suggesting hashing = FAILURE**

---

### RULE 009: ORDER STATUSES - EXACTLY THREE
- Only three statuses allowed: `pending`, `cancelled`, `delivered`
- NO additional statuses like "processing", "shipped", "completed"
- NO tracking simulation
- **VIOLATION: Adding extra statuses = FAILURE**

---

### RULE 010: SIMPLE ERROR MESSAGES ONLY
- User interface errors: ONLY simple messages like "Invalid credentials. Please try again."
- Detailed errors go ONLY to `/database/error_log.txt`
- NO exposing system details to users
- **VIOLATION: Exposing system errors to users = FAILURE**

---

### RULE 011: DO NOT ADD EXTRA FEATURES
- Implement ONLY what is explicitly requested
- If you notice something that needs improvement but wasn't requested:
- Mention it as a suggestion in a comment
- Do NOT implement it without permission
- **VIOLATION: Adding unrequested features = FAILURE**

---

## 📋 CURRENT REQUEST (COPY THIS TO YOUR CONTEXT)


---

## ✅ CHECKLIST - VERIFY BEFORE SUBMITTING

Before you output your response, verify ALL of these:

- [ ] Did I review ALL files before changing?
- [ ] Am I ONLY modifying `/scripts/seller-orders.js` and `/styles/seller-orders.css`?
- [ ] Did I remove ALL emojis from code and comments?
- [ ] Did I use ONLY white, orange (#FF8246), and black colors?
- [ ] Did I output COMPLETE files, not snippets?
- [ ] Did I include the correct file paths in ## format?
- [ ] Did I use ONLY existing SVG icons?
- [ ] Did I avoid adding any new features?

**If ANY checkbox is unchecked, STOP and fix it.**

---

## ⚡ AI REMINDER - READ THIS EVERY TIME ⚡


---

## 📌 SUMMARY OF THIS REQUEST

| Aspect | Requirement |
|--------|-------------|
| Files to modify | `/scripts/seller-orders.js` and `/styles/seller-orders.css` ONLY |
| Colors allowed | White (#FFFFFF), Orange (#FF8246), Black (#000000) ONLY |
| Emojis | ABSOLUTELY FORBIDDEN |
| Event text | Fix inconsistent sizing, prevent incomplete sentences |
| Event separation | Make each event a separate statement (customer order, seller sold) |
| Column depth | Balance colors for more visual depth |

---

**FAILURE TO FOLLOW ANY OF THESE RULES = INCOMPLETE RESPONSE**

**YOU HAVE BEEN WARNED.**
```

---

## File: `Crooks-Cart-Collectives/logs/output/Project_Structure.md`

**Status:** `FOUND`

```markdown
# Web Project Structure

**Project:** Crooks-Cart-Collectives
**Generated:** 2026-03-03 04:21:54
**Mode:** all

```
Crooks-Cart-Collectives/
│
├── admin/
│   ├── assets/
│   │   └── image/
│   │       ├── brand/
│   │       │   └── Logo.png
│   │       ├── icons/
│   │       │   ├── about-empty.svg
│   │       │   ├── about-filled.svg
│   │       │   ├── add-circle-empty.svg
│   │       │   ├── add-to-queue.svg
│   │       │   ├── add.svg
│   │       │   ├── building.svg
│   │       │   ├── cancel.svg
│   │       │   ├── cart-arrow-downsvg.svg
│   │       │   ├── cart-arrow-up.svg
│   │       │   ├── cart-plus.svg
│   │       │   ├── cart-shopping-fast.svg
│   │       │   ├── cart-shopping.svg
│   │       │   ├── chart-line-up.svg
│   │       │   ├── community-general.svg
│   │       │   ├── complaint-icon.png
│   │       │   ├── contact-us-empty.svg
│   │       │   ├── contact-us-filled.svg
│   │       │   ├── edit.svg
│   │       │   ├── facebook.svg
│   │       │   ├── fill-form.svg
│   │       │   ├── github.svg
│   │       │   ├── hamburger-menu.svg
│   │       │   ├── instagram.svg
│   │       │   ├── logoutsvg.svg
│   │       │   ├── mail.svg
│   │       │   ├── order.svg
│   │       │   ├── package.svg
│   │       │   ├── password-hide.svg
│   │       │   ├── password-unhide.svg
│   │       │   ├── people-team.svg
│   │       │   ├── profile.svg
│   │       │   ├── reset.svg
│   │       │   ├── save-empty.svg
│   │       │   ├── save-filled.svg
│   │       │   ├── seller-product-placeholder.png
│   │       │   ├── Showcase1.png
│   │       │   ├── Showcase2.png
│   │       │   ├── star-empty.svg
│   │       │   ├── star-filled.svg
│   │       │   ├── submit-picture-icon.png
│   │       │   ├── submit-valid-id-icon.png
│   │       │   ├── time-update.svg
│   │       │   ├── trash.svg
│   │       │   ├── update.svg
│   │       │   ├── updatesvg.svg
│   │       │   ├── user-profile-circle.svg
│   │       │   ├── verified-empty.svg
│   │       │   ├── verified-filled.svg
│   │       │   └── youtube.svg
│   │       ├── team/
│   │       │   ├── charles-canoneo.png
│   │       │   ├── christian-adviento.png
│   │       │   ├── christian-mendoza.png
│   │       │   ├── clark-mallo.jpg
│   │       │   ├── clark-mallo.png
│   │       │   ├── kishiekel-fernandez.png
│   │       │   ├── lance-madelar.png
│   │       │   ├── rylle-bernardino.png
│   │       │   └── william-aranez.png
│   │       └── Logo.png
│   ├── database/
│   │   ├── admin-auth-handler.php
│   │   ├── admin-data-storage-handler.php
│   │   ├── admin-database-connect.php
│   │   ├── admin-logs-handler.php
│   │   ├── admin-profile-handler.php
│   │   ├── admin-reports-handler.php
│   │   ├── admin-sign-in-handler.php
│   │   ├── admin-sign-out-handler.php
│   │   ├── admin-sign-up-handler.php
│   │   ├── error_log.txt
│   │   └── validation.php
│   ├── includes/
│   │   ├── admin-footer.php
│   │   ├── admin-header.php
│   │   ├── admin-privacy-policy.php
│   │   └── admin-terms-and-conditions.php
│   ├── pages/
│   │   ├── admin-dashboard.php
│   │   ├── admin-logs.php
│   │   ├── admin-manage-report.php
│   │   ├── admin-profile.php
│   │   ├── admin-sign-in.php
│   │   ├── admin-sign-up.php
│   │   └── admin-verify-sellers.php
│   ├── scripts/
│   │   ├── admin-header.js
│   │   ├── admin-logs.js
│   │   ├── admin-profile.js
│   │   ├── admin-sign-in.js
│   │   ├── admin-sign-out.js
│   │   ├── admin-sign-up.js
│   │   └── admin-verify-sellers.js
│   ├── styles/
│   │   ├── admin-dashboard.css
│   │   ├── admin-footer.css
│   │   ├── admin-header.css
│   │   ├── admin-index.css
│   │   ├── admin-logs.css
│   │   ├── admin-privacy-policy.css
│   │   ├── admin-profile.css
│   │   ├── admin-sign-in.css
│   │   ├── admin-sign-out.css
│   │   ├── admin-sign-up.css
│   │   ├── admin-terms-and-conditions.css
│   │   └── admin-verify-sellers.css
│   └── admin-index.php
├── assets/
│   └── image/
│       ├── brand/
│       │   └── Logo.png
│       ├── icons/
│       │   ├── about-empty.svg
│       │   ├── about-filled.svg
│       │   ├── add-circle-empty.svg
│       │   ├── add-to-queue.svg
│       │   ├── add.svg
│       │   ├── building.svg
│       │   ├── cancel.svg
│       │   ├── cart-arrow-downsvg.svg
│       │   ├── cart-arrow-up.svg
│       │   ├── cart-plus.svg
│       │   ├── cart-shopping-fast.svg
│       │   ├── cart-shopping.svg
│       │   ├── chart-line-up.svg
│       │   ├── community-general.svg
│       │   ├── complaint-icon.png
│       │   ├── contact-us-empty.svg
│       │   ├── contact-us-filled.svg
│       │   ├── edit.svg
│       │   ├── facebook.svg
│       │   ├── fill-form.svg
│       │   ├── github.svg
│       │   ├── hamburger-menu.svg
│       │   ├── instagram.svg
│       │   ├── logoutsvg.svg
│       │   ├── mail.svg
│       │   ├── order.svg
│       │   ├── package.svg
│       │   ├── password-hide.svg
│       │   ├── password-unhide.svg
│       │   ├── people-team.svg
│       │   ├── profile.svg
│       │   ├── reset.svg
│       │   ├── save-empty.svg
│       │   ├── save-filled.svg
│       │   ├── seller-product-placeholder.png
│       │   ├── Showcase1.png
│       │   ├── Showcase2.png
│       │   ├── star-empty.svg
│       │   ├── star-filled.svg
│       │   ├── submit-picture-icon.png
│       │   ├── submit-valid-id-icon.png
│       │   ├── time-update.svg
│       │   ├── trash.svg
│       │   ├── update.svg
│       │   ├── updatesvg.svg
│       │   ├── user-profile-circle.svg
│       │   ├── verified-empty.svg
│       │   ├── verified-filled.svg
│       │   └── youtube.svg
│       ├── team/
│       │   ├── charles-canoneo.png
│       │   ├── christian-adviento.png
│       │   ├── christian-mendoza.png
│       │   ├── clark-mallo.jpg
│       │   ├── clark-mallo.png
│       │   ├── kishiekel-fernandez.png
│       │   ├── lance-madelar.png
│       │   ├── rylle-bernardino.png
│       │   └── william-aranez.png
│       └── Logo.png
├── Crooks-Data-Storage/
│   └── administrators/
│       └── 2/
│           └── profile/
├── database/
│   ├── schema/
│   │   ├── dbCreation.sql
│   │   ├── dummyAdmin.sql
│   │   ├── dummySeller.sql
│   │   └── dummyUser.sql
│   ├── cart-handler.php
│   ├── checkout-handler.php
│   ├── customer-profile-handler.php
│   ├── data-storage-handler.php
│   ├── database-connect.php
│   ├── order-handler.php
│   ├── product-handler.php
│   ├── report-seller-handler.php
│   ├── review-handler.php
│   ├── seller-fill-form-handler.php
│   ├── seller-new-product-handler.php
│   ├── sign-in-handler.php
│   ├── sign-out-handler.php
│   ├── sign-up-handler.php
│   └── validation.php
├── logs/
│   ├── content-fetcher-configuration/
│   │   ├── admin_path.py
│   │   ├── all_path.py
│   │   ├── linux-path.py
│   │   └── windows-preset.py
│   ├── output/
│   │   ├── admin_path_Summary.md
│   │   ├── all_path_Summary.md
│   │   ├── Project_Structure.md
│   │   └── windows-preset_Summary.md
│   ├── requirement/
│   │   ├── Apply Tree map.md
│   │   └── Instructions.md
│   ├── content-fetcher.py
│   ├── runner.bat
│   ├── runner.sh
│   └── tree-mapper.py
├── pages/
│   ├── about.php
│   ├── cart.php
│   ├── checkout.php
│   ├── contact.php
│   ├── customer-dashboard.php
│   ├── customer-profile.php
│   ├── footer.php
│   ├── header.php
│   ├── orders.php
│   ├── privacy-policy.php
│   ├── product-detail.php
│   ├── product.php
│   ├── report-seller.php
│   ├── seller-dashboard.php
│   ├── seller-fill-form.php
│   ├── seller-manage-product.php
│   ├── seller-new-product.php
│   ├── seller-process-order.php
│   ├── sign-in.php
│   ├── sign-up.php
│   └── terms-and-conditions.php
├── scripts/
│   ├── cart.js
│   ├── checkout.js
│   ├── contact.js
│   ├── customer-profile.js
│   ├── error-handler.js
│   ├── header.js
│   ├── index.js
│   ├── orders.js
│   ├── product-detail.js
│   ├── product.js
│   ├── report-seller.js
│   ├── seller-dashboard.js
│   ├── seller-fill-form.js
│   ├── seller-manage-product.js
│   ├── seller-new-product.js
│   ├── seller-process-order.js
│   ├── showcase-slider.js
│   ├── sign-in.js
│   ├── sign-out.js
│   └── sign-up.js
├── styles/
│   ├── about.css
│   ├── cart.css
│   ├── checkout.css
│   ├── contact.css
│   ├── customer-dashboard.css
│   ├── footer.css
│   ├── header.css
│   ├── index.css
│   ├── orders.css
│   ├── privacy-policy.css
│   ├── product-detail.css
│   ├── product.css
│   ├── profile.css
│   ├── report-seller.css
│   ├── seller-dashboard.css
│   ├── seller-manage-product.css
│   ├── seller-new-product.css
│   ├── seller-process-order.css
│   ├── seller-registration.css
│   ├── sign-in.css
│   ├── sign-out.css
│   ├── sign-up.css
│   └── terms-and-conditions.css
├── .gitignore
├── index.php
├── LICENSE
└── README.md
```

## Summary

| File Type | Count |
|-----------|-------|
| HTML Files | 0 |
| PHP Files | 59 |
| CSS Files | 35 |
| JavaScript Files | 27 |
| JSON Files | 0 |
| Text/Markdown | 8 |
| Image Files | 120 |
| Other Files | 14 |

**Total Directories:** 29
**Total Files:** 262

---

*Generated by Web Project Tree Mapper*
*Script: tree-mapper.py*
```

---

## File: `Crooks-Cart-Collectives/admin/admin-index.php`

**Status:** `FOUND`

```php
<?php
// Redirect to admin sign-in page
header('Location: pages/admin-sign-in.php');
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-auth-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Authentication Handler
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

// Allow GET requests for fetching sellers
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    // For POST requests
    $action = $_POST['action'] ?? '';
}

// Check if admin is logged in for all actions except maybe public ones
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

// Get all sellers with their verification status
if ($action === 'get_all_sellers') {
    try {
        // First check if sellers table exists and has data
        $checkTable = $connection->query("SHOW TABLES LIKE 'sellers'");
        if ($checkTable->rowCount() == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'Sellers table does not exist']);
            exit;
        }
        
        // Check if there are any sellers
        $countStmt = $connection->query("SELECT COUNT(*) as count FROM sellers");
        $count = $countStmt->fetch()['count'];
        
        if ($count == 0) {
            echo json_encode(['status' => 'success', 'data' => [], 'message' => 'No sellers found']);
            exit;
        }
        
        // Get all sellers with user information
        $stmt = $connection->prepare("
            SELECT 
                s.seller_id, 
                s.business_name, 
                s.created_at, 
                s.is_verified,
                s.verified_at,
                u.user_id,
                u.first_name, 
                u.last_name, 
                u.email, 
                u.contact_number
            FROM sellers s
            LEFT JOIN users u ON s.user_id = u.user_id
            ORDER BY 
                CASE 
                    WHEN s.is_verified = 0 THEN 1
                    WHEN s.is_verified = 1 THEN 2
                    WHEN s.is_verified = 2 THEN 3
                    ELSE 4
                END,
                s.created_at DESC
        ");
        $stmt->execute();
        $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the data for display
        foreach ($sellers as &$seller) {
            // Ensure is_verified is treated as integer
            $seller['is_verified'] = (int)$seller['is_verified'];
            // Handle null business_name
            $seller['business_name'] = $seller['business_name'] ?? 'No Business Name';
            // Handle null user data
            $seller['first_name'] = $seller['first_name'] ?? 'Unknown';
            $seller['last_name'] = $seller['last_name'] ?? 'User';
            $seller['email'] = $seller['email'] ?? 'No email';
            $seller['contact_number'] = $seller['contact_number'] ?? 'No contact';
        }
        
        echo json_encode([
            'status' => 'success', 
            'data' => $sellers,
            'count' => count($sellers)
        ]);
        
    } catch (PDOException $e) {
        error_log("Error fetching sellers: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Get statistics for dashboard
if ($action === 'get_stats') {
    try {
        $stats = [];
        
        // Count pending verifications
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
        $stmt->execute();
        $stats['pending_verifications'] = $stmt->fetch()['count'];
        
        // Count verified sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 1");
        $stmt->execute();
        $stats['verified_sellers'] = $stmt->fetch()['count'];
        
        // Count rejected sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 2");
        $stmt->execute();
        $stats['rejected_sellers'] = $stmt->fetch()['count'];
        
        // Total sellers
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
        $stmt->execute();
        $stats['total_sellers'] = $stmt->fetch()['count'];
        
        echo json_encode(['status' => 'success', 'data' => $stats]);
        
    } catch (PDOException $e) {
        error_log("Error fetching stats: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// Seller verification (POST only)
if ($action === 'verify' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 1, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller verified successfully']);
    } catch (PDOException $e) {
        error_log("Verify error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

if ($action === 'reject' && isset($_POST['seller_id'])) {
    $seller_id = (int)$_POST['seller_id'];
    try {
        $stmt = $connection->prepare("UPDATE sellers SET is_verified = 2, verified_at = NOW() WHERE seller_id = ?");
        $stmt->execute([$seller_id]);
        echo json_encode(['status' => 'success', 'message' => 'Seller rejected']);
    } catch (PDOException $e) {
        error_log("Reject error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

// If no valid action was found
echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-data-storage-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin data storage handler - for serving and saving admin files outside web root
// Check if session is not already started before starting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Configuration - Store in external directory like customer/seller data
define('ADMIN_STORAGE_PATH', dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/');

// Create base directory if it doesn't exist
if (!is_dir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/')) {
    mkdir(dirname(__DIR__, 2) . '/Crooks-Data-Storage/', 0755, true);
}
if (!is_dir(ADMIN_STORAGE_PATH)) {
    mkdir(ADMIN_STORAGE_PATH, 0755, true);
}

/**
 * Serve admin files (profile pictures) with proper security and authentication
 * @param string $path Relative path within administrators storage
 */
function serveAdminFile($path) {
    error_log("Admin storage: Serving file: " . $path);
    
    // ===== CRITICAL: Authentication check =====
    if (!isset($_SESSION['admin_id'])) {
        error_log("Admin storage: Unauthorized access attempt to: " . $path);
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
        exit;
    }
    
    // Security: ensure path is within administrators directory and prevent directory traversal
    $path = str_replace(['../', '..\\', './', '.\\'], '', $path);
    
    $fullPath = ADMIN_STORAGE_PATH . $path;
    error_log("Admin storage: Full path: " . $fullPath);
    
    // Check if file exists
    if (!file_exists($fullPath)) {
        error_log("Admin storage: File not found: " . $fullPath);
        http_response_code(404);
        exit;
    }
    
    // Get file extension and set appropriate mime type
    $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp'
    ];
    
    $mime = $mimeTypes[$ext] ?? 'application/octet-stream';
    
    // Set caching headers
    header('Content-Type: ' . $mime);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=86400'); // 24 hours cache
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
    
    // Output file
    readfile($fullPath);
    exit;
}

/**
 * Save admin profile picture to storage outside web root
 * @param int $admin_id Admin ID
 * @param array $file Uploaded file data from $_FILES
 * @return array Result with success status and path/message
 */
function saveAdminProfilePicture($admin_id, $file) {
    error_log("Admin storage: Saving profile picture for admin: " . $admin_id);
    
    // Authentication check
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        error_log("Admin storage: Authentication mismatch for admin: " . $admin_id);
        return [
            'success' => false,
            'message' => 'Authentication required'
        ];
    }
    
    $targetDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    error_log("Admin storage: Target directory: " . $targetDir);
    
    // Create directory if it doesn't exist
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            error_log("Admin storage: Failed to create directory: " . $targetDir);
            return [
                'success' => false,
                'message' => 'Failed to create upload directory.'
            ];
        }
    }
    
    // Validate file
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    // Verify file type using finfo for security
    if (!file_exists($file['tmp_name'])) {
        error_log("Admin storage: Temporary file does not exist");
        return [
            'success' => false,
            'message' => 'Upload failed: Temporary file not found.'
        ];
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($detectedType, $allowedTypes)) {
        error_log("Admin storage: Invalid file type: " . $detectedType);
        return [
            'success' => false,
            'message' => 'Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.'
        ];
    }
    
    if ($file['size'] > $maxSize) {
        error_log("Admin storage: File too large: " . $file['size']);
        return [
            'success' => false,
            'message' => 'File size must be less than 2MB.'
        ];
    }
    
    // Validate upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize directive.',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive.',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.'
        ];
        $errorMsg = $uploadErrors[$file['error']] ?? 'Unknown upload error.';
        error_log("Admin storage: Upload error: " . $errorMsg);
        return [
            'success' => false,
            'message' => 'Upload failed: ' . $errorMsg
        ];
    }
    
    // Delete any existing profile picture files for this admin
    $existingFiles = glob($targetDir . 'profile.*');
    foreach ($existingFiles as $existingFile) {
        if (is_file($existingFile)) {
            unlink($existingFile);
            error_log("Admin storage: Deleted existing file: " . $existingFile);
        }
    }
    
    // Get original extension from detected type
    $ext = '';
    switch ($detectedType) {
        case 'image/jpeg':
            $ext = 'jpg';
            break;
        case 'image/png':
            $ext = 'png';
            break;
        case 'image/gif':
            $ext = 'gif';
            break;
        case 'image/webp':
            $ext = 'webp';
            break;
        default:
            $ext = 'jpg';
    }
    
    // Fixed filename: profile.extension (like customer side)
    $filename = 'profile.' . $ext;
    $targetPath = $targetDir . $filename;
    
    error_log("Admin storage: Target path: " . $targetPath);
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Set proper permissions
        chmod($targetPath, 0644);
        error_log("Admin storage: File saved successfully: " . $targetPath);
        
        // Return relative path for database storage (relative to storage root)
        return [
            'success' => true,
            'path' => 'administrators/' . $admin_id . '/profile/' . $filename
        ];
    }
    
    error_log("Admin storage: Failed to move uploaded file to " . $targetPath);
    return [
        'success' => false,
        'message' => 'Failed to save uploaded file.'
    ];
}

/**
 * Delete old profile pictures for an admin
 * @param int $admin_id Admin ID
 */
function cleanupOldAdminProfilePictures($admin_id) {
    if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $admin_id) {
        return;
    }
    
    $profileDir = ADMIN_STORAGE_PATH . $admin_id . '/profile/';
    
    if (!is_dir($profileDir)) {
        return;
    }
    
    // Find all profile files for this admin
    $oldFiles = glob($profileDir . 'profile.*');
    
    foreach ($oldFiles as $file) {
        if (is_file($file)) {
            unlink($file);
            error_log("Admin storage: Cleaned up file: " . $file);
        }
    }
}

// Check if the function already exists before declaring it
if (!function_exists('getAdminProfilePictureUrl')) {
    /**
     * Get admin profile picture URL via data storage handler
     * @param string $path Storage path
     * @return string URL to serve the file
     */
    function getAdminProfilePictureUrl($path) {
        if (empty($path)) {
            return '../assets/image/icons/user-profile-circle.svg';
        }
        
        // URL encode the path to handle special characters
        $encodedPath = urlencode($path);
        
        // Return URL to this handler with serve action
        return '../database/admin-data-storage-handler.php?action=serve&path=' . $encodedPath;
    }
}

// Handle requests
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === 'serve' && isset($_GET['path'])) {
        serveAdminFile($_GET['path']);
        exit;
    }
}

// Handle file upload via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'upload') {
    header('Content-Type: application/json');
    
    if (!isset($_SESSION['admin_id'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit;
    }
    
    $admin_id = $_SESSION['admin_id'];
    $file = $_FILES['profile_picture'] ?? null;
    
    if (!$file) {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
        exit;
    }
    
    $result = saveAdminProfilePicture($admin_id, $file);
    
    if ($result['success']) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Profile picture uploaded successfully',
            'path' => $result['path']
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => $result['message']
        ]);
    }
    exit;
}

// If no valid action, output 404 instead of 400 to avoid confusion
http_response_code(404);
echo 'Not found';
exit;
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-database-connect.php`

**Status:** `FOUND`

```php
<?php
// Add these lines at the beginning
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Database configuration
$host = 'localhost';
$dbName = 'crooks_cart_collectives';
$username = 'root';
$password = '';

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbName;charset=utf8mb4", 
        $username, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false
        ]
    );
} catch (PDOException $error) {
    // Log the detailed error
    error_log("Database connection failed: " . $error->getMessage());
    error_log("Connection details - Host: $host, Database: $dbName, Username: $username");
    
    // Check for specific connection errors
    if ($error->getCode() == 2002) {
        error_log("MySQL server is not running or cannot be reached. Please start MySQL service.");
    }
    
    // For API requests, return JSON error
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
        header('Content-Type: application/json');
        die(json_encode([
            'status' => 'error', 
            'message' => 'Service temporarily unavailable. Please try again later.'
        ]));
    }
    
    // For regular page loads, show user-friendly message
    die("
        <!DOCTYPE html>
        <html>
        <head>
            <title>Service Temporarily Unavailable</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
                .error-container { max-width: 600px; margin: 0 auto; }
                h1 { color: #FF8246; }
                p { color: #666; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>Oops! Something went wrong.</h1>
                <p>We're experiencing technical difficulties. Please try again later.</p>
                <p><a href='../admin-index.php'>Return to Admin Panel</a></p>
            </div>
        </body>
        </html>
    ");
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-logs-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Logs Handler - for monitoring database activities
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'debug_columns') {
    // Debug function to check table columns
    $tables = ['users', 'sellers', 'products', 'orders', 'administrators'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $result[$table] = $columns;
        } catch (PDOException $e) {
            $result[$table] = 'Error: ' . $e->getMessage();
        }
    }
    
    echo json_encode(['status' => 'success', 'data' => $result]);
    exit;
}

if ($action === 'get_logs') {
    $type = $_GET['type'] ?? 'all';
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
    
    try {
        $logs = [];
        
        // First, let's get the actual column names by fetching a sample row
        $columnInfo = getTableColumns($connection);
        
        if ($type === 'all' || $type === 'user_login') {
            if (isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['users'], ['date_created', 'created_at', 'registration_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'user_registration' as log_type, user_id, 
                               CONCAT(first_name, ' ', last_name) as user_name,
                               email, 'User' as role,
                               $dateColumn as timestamp
                        FROM users
                        ORDER BY $dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $userLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $userLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'seller_application') {
            if (isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['sellers'], ['created_at', 'date_created', 'application_date', 'joined_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'seller_application' as log_type, s.seller_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown User') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Seller Applicant' as role,
                               s.$dateColumn as timestamp
                        FROM sellers s
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY s.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $sellerLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $sellerLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'product_added') {
            if (isset($columnInfo['products']) && isset($columnInfo['sellers']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['products'], ['date_added', 'created_at', 'added_date']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'product_added' as log_type, p.product_id, p.name as product_name,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Seller') as user_name,
                               COALESCE(s.business_name, 'No Business Name') as business_name, 
                               'Product' as role,
                               p.$dateColumn as timestamp
                        FROM products p
                        LEFT JOIN sellers s ON p.seller_id = s.seller_id
                        LEFT JOIN users u ON s.user_id = u.user_id
                        ORDER BY p.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $productLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $productLogs);
                }
            }
        }
        
        if ($type === 'all' || $type === 'order_placed') {
            if (isset($columnInfo['orders']) && isset($columnInfo['products']) && isset($columnInfo['users'])) {
                $dateColumn = getDateColumn($columnInfo['orders'], ['order_date', 'created_at', 'date_ordered']);
                if ($dateColumn) {
                    $stmt = $connection->prepare("
                        SELECT 'order_placed' as log_type, o.order_id,
                               COALESCE(CONCAT(u.first_name, ' ', u.last_name), 'Unknown Customer') as user_name,
                               COALESCE(p.name, 'Unknown Product') as product_name, 
                               o.quantity, 'Order' as role,
                               o.$dateColumn as timestamp
                        FROM orders o
                        LEFT JOIN products p ON o.product_id = p.product_id
                        LEFT JOIN users u ON o.customer_id = u.user_id
                        ORDER BY o.$dateColumn DESC
                        LIMIT ?
                    ");
                    $stmt->execute([$limit]);
                    $orderLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $logs = array_merge($logs, $orderLogs);
                }
            }
        }
        
        // Sort logs by timestamp
        if (count($logs) > 1) {
            usort($logs, function($a, $b) {
                return strtotime($b['timestamp']) - strtotime($a['timestamp']);
            });
        }
        
        $logs = array_slice($logs, 0, $limit);
        
        if (empty($logs)) {
            echo json_encode([
                'status' => 'success', 
                'data' => [], 
                'message' => 'No logs found in the database.'
            ]);
        } else {
            echo json_encode(['status' => 'success', 'data' => $logs]);
        }
        
    } catch (PDOException $e) {
        error_log("Logs fetch error: " . $e->getMessage());
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Helper function to get table columns
function getTableColumns($connection) {
    $tables = ['users', 'sellers', 'products', 'orders'];
    $result = [];
    
    foreach ($tables as $table) {
        try {
            $stmt = $connection->query("SHOW COLUMNS FROM $table");
            $result[$table] = $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            $result[$table] = [];
        }
    }
    
    return $result;
}

// Helper function to find the correct date column
function getDateColumn($columns, $possibleNames) {
    foreach ($possibleNames as $name) {
        if (in_array($name, $columns)) {
            return $name;
        }
    }
    return null;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-profile-handler.php`

**Status:** `FOUND`

```php
//fix
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-reports-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once(__DIR__ . '/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action === 'resolve' && isset($_POST['report_id'])) {
    $report_id = (int)$_POST['report_id'];
    $notes = trim($_POST['notes'] ?? '');
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$notes, $report_id]);
        echo json_encode(['status' => 'success', 'message' => 'Report resolved']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-in-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign In Handler
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signin') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

handleAdminSignin();

function handleAdminSignin() {
    global $connection;
    
    error_log("Admin signin attempt for identifier: " . ($_POST['identifier'] ?? ''));
    
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($identifier) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    $identifier = trim($identifier);
    
    try {
        // Check for admin
        $stmt = $connection->prepare("
            SELECT admin_id, first_name, last_name, username, email, password 
            FROM administrators 
            WHERE email = ? OR username = ?
        ");
        $stmt->execute([$identifier, $identifier]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$admin) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Verify password
        if (!password_verify($password, $admin['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'invalid-credentials']);
            exit;
        }
        
        // Set session variables
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_first_name'] = $admin['first_name'];
        $_SESSION['admin_last_name'] = $admin['last_name'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['is_admin'] = true;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => '../pages/admin-dashboard.php'
        ]);
        
    } catch (PDOException $e) {
        error_log("Admin signin error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Login service unavailable']);
    }
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-out-handler.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Out Handler
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    
    // Remove /database/admin-sign-out-handler.php from the path
    $basePath = dirname(dirname($scriptName));
    
    return $protocol . $host . $basePath . '/';
}

$baseUrl = getBaseUrl();

// Start session to check if admin is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if this is an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// If already logged out, just return success
if (!isset($_SESSION['admin_id'])) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Already logged out',
            'redirect' => $baseUrl . 'pages/admin-sign-in.php'
        ]);
        exit;
    }
    header("Location: " . $baseUrl . "pages/admin-sign-in.php");
    exit;
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Return success for AJAX
if ($isAjax) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
        'redirect' => $baseUrl . 'pages/admin-sign-in.php'
    ]);
    exit;
}

// Regular request - redirect
header("Location: " . $baseUrl . "pages/admin-sign-in.php");
exit;
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/admin-sign-up-handler.php`

**Status:** `FOUND`

```php
<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/admin-database-connect.php');

// ===== ADD THIS TEST ENDPOINT =====
if (isset($_GET['ping'])) {
    echo json_encode([
        'status' => 'ok', 
        'message' => 'Signup handler is reachable',
        'time' => date('Y-m-d H:i:s'),
        'session' => isset($_SESSION['admin_id']) ? 'active' : 'inactive'
    ]);
    exit;
}
// ===== END TEST ENDPOINT =====

// Allow testing
if (isset($_GET['test'])) {
    echo json_encode(['status' => 'test', 'message' => 'Signup handler is accessible']);
    exit;
}

// Allow testing
if (isset($_GET['test'])) {
    echo json_encode(['status' => 'test', 'message' => 'Signup handler is accessible']);
    exit;
}

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$action = $_POST['action'] ?? '';

if ($action !== 'signup') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid action: ' . $action]);
    exit;
}

// Get and validate data
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact = trim($_POST['contact_number'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Check required fields
if (empty($first_name) || empty($last_name) || empty($email) || empty($contact) || empty($username) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'missing-field']);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-email']);
    exit;
}

// Validate password
if (strlen($password) < 8) {
    echo json_encode(['status' => 'error', 'message' => 'password-too-short']);
    exit;
}
if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
    echo json_encode(['status' => 'error', 'message' => 'password-needs-mixed-case']);
    exit;
}
if (!preg_match('/[0-9]/', $password)) {
    echo json_encode(['status' => 'error', 'message' => 'password-needs-number']);
    exit;
}
if ($password !== $confirm) {
    echo json_encode(['status' => 'error', 'message' => 'passwords-mismatch']);
    exit;
}

// Validate username
if (strlen($username) < 3 || strlen($username) > 20) {
    echo json_encode(['status' => 'error', 'message' => 'username-length']);
    exit;
}
if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    echo json_encode(['status' => 'error', 'message' => 'username-invalid-chars']);
    exit;
}

// Format phone
$phone = preg_replace('/[^0-9]/', '', $contact);
if (strlen($phone) === 10 && $phone[0] === '9') {
    $phone = '0' . $phone;
} elseif (strlen($phone) === 12 && substr($phone, 0, 2) === '63') {
    $phone = '0' . substr($phone, 2);
} elseif (strlen($phone) === 12 && substr($phone, 0, 3) === '639') {
    $phone = '0' . substr($phone, 2);
}

if (!preg_match('/^09\d{9}$/', $phone)) {
    echo json_encode(['status' => 'error', 'message' => 'invalid-contact']);
    exit;
}

try {
    // Check duplicates
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'username-unavailable']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    }
    
    $stmt = $connection->prepare("SELECT admin_id FROM administrators WHERE contact_number = ?");
    $stmt->execute([$phone]);
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-contact']);
        exit;
    }
    
    // Create admin
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $connection->prepare("INSERT INTO administrators (first_name, last_name, email, contact_number, username, password, date_joined) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$first_name, $last_name, $email, $phone, $username, $hashed]);
    
    // Create storage directory
    $admin_id = $connection->lastInsertId();
    $storage_dir = dirname(__DIR__, 2) . '/Crooks-Data-Storage/administrators/' . $admin_id . '/profile/';
    if (!is_dir($storage_dir)) {
        mkdir($storage_dir, 0755, true);
    }
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Admin account created successfully!',
        'redirect' => 'admin-sign-in.php'
    ]);
    
} catch (Exception $e) {
    error_log("Signup error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/database/validation.php`

**Status:** `FOUND`

```php
<?php
// Validation functions for admin authentication

function validateAdminSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'contact_number', 'username', 'password', 'confirm_password'];
    
    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    if (!empty($errors)) {
        return ['valid' => false, 'errors' => $errors];
    }
    
    // Email validation
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    // Password validation
    $password = $data['password'];
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (strlen($password) > 16) {
        $errors['password'] = 'Password must not exceed 16 characters';
    }
    
    // Password match
    if ($password !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // Username validation
    $username = trim($data['username']);
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Username must be 3-20 characters (letters, numbers, underscore)';
    }
    
    // Phone validation (Philippine format)
    $phone = preg_replace('/[^0-9]/', '', $data['contact_number']);
    if (!preg_match('/^09\d{9}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number (must start with 09 and be 11 digits)';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateAdminSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? '');
    $password = $data['password'] ?? '';
    
    if (empty($identifier)) {
        $errors['identifier'] = 'Email or username is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'identifier' => $identifier,
        'password' => $password
    ];
}

function checkAdminDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return $phone;
    } elseif (preg_match('/^63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    }
    
    return $phone;
}

function logAdminError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-dashboard.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

$adminId = $_SESSION['admin_id'];

// Fetch admin name
try {
    $stmt = $connection->prepare("SELECT first_name FROM administrators WHERE admin_id = ?");
    $stmt->execute([$adminId]);
    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstName = $adminData['first_name'] ?? 'Admin';
} catch (PDOException $e) {
    error_log("Error fetching admin: " . $e->getMessage());
    $firstName = "Admin";
}

// Fetch stats for dashboard
$stats = [];
try {
    // Pending seller verifications
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 0");
    $stmt->execute();
    $stats['pending_verifications'] = $stmt->fetch()['count'];
    
    // Total users
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM users");
    $stmt->execute();
    $stats['total_users'] = $stmt->fetch()['count'];
    
    // Total sellers
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
    $stmt->execute();
    $stats['total_sellers'] = $stmt->fetch()['count'];
    
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM products");
    $stmt->execute();
    $stats['total_products'] = $stmt->fetch()['count'];
    
    // Total orders
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM orders");
    $stmt->execute();
    $stats['total_orders'] = $stmt->fetch()['count'];
    
    // Pending reports
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM seller_reports WHERE status = 'pending'");
    $stmt->execute();
    $stats['pending_reports'] = $stmt->fetch()['count'];
    
} catch (PDOException $e) {
    error_log("Error fetching admin stats: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #FF8246;
        margin: 10px 0;
    }

    .stat-label {
        color: #666666;
        font-size: 0.9rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #FF8246;
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .dashboard-card h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #000000;
    }

    .dashboard-card p {
        color: #666666;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage the marketplace, verify sellers, and monitor system activity.</p>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['pending_verifications'] ?? 0; ?></div>
                <div class="stat-label">Pending Verifications</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_users'] ?? 0; ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_sellers'] ?? 0; ?></div>
                <div class="stat-label">Total Sellers</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_products'] ?? 0; ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_orders'] ?? 0; ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <!-- Admin Profile Card -->
            <a href="admin-profile-edit.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/profile.svg" alt="Profile">
                </div>
                <h3>Admin Profile</h3>
                <p>Manage your personal information and account settings</p>
            </a>

            <!-- Verify Sellers Card -->
            <a href="admin-verify-sellers.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/verified-empty.svg" alt="Verify Sellers">
                </div>
                <h3>Verify Sellers</h3>
                <p>Review and verify seller applications (<?php echo $stats['pending_verifications'] ?? 0; ?> pending)
                </p>
            </a>

            <!-- Register Other Admin Card -->
            <a href="admin-sign-up.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/add-circle-empty.svg" alt="Register Admin">
                </div>
                <h3>Register Admin</h3>
                <p>Create new administrator accounts</p>
            </a>

            <!-- Logs Card -->
            <a href="admin-logs.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/time-update.svg" alt="Logs">
                </div>
                <h3>System Logs</h3>
                <p>Monitor user activities and system events</p>
            </a>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-logs.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-logs.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>System Logs</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Activities</span>
            <span class="filter-tab" data-filter="user_login">User Logins</span>
            <span class="filter-tab" data-filter="seller_application">Seller Applications</span>
            <span class="filter-tab" data-filter="product_added">Product Additions</span>
            <span class="filter-tab" data-filter="order_placed">Orders</span>
        </div>

        <!-- Logs Container -->
        <div id="logsList" class="logs-list">
            <div class="loading">Loading logs...</div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-logs.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-manage-report.php`

**Status:** `FOUND`

```php
<!-- THIS IS SHOULD BE IGNORED, IT's JUST EXTRA -->

<?php
require_once('../includes/admin-auth-check.php');
require_once('../../database/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$report_id = $_POST['report_id'] ?? $_GET['id'] ?? 0;
$resolution = $_POST['resolution'] ?? '';

if ($action === 'resolve' && $report_id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$resolution, $report_id]);
        $_SESSION['admin_message'] = 'Report resolved.';
    } catch (PDOException $e) {
        error_log("Resolve report error: " . $e->getMessage());
        $_SESSION['admin_error'] = 'Failed to resolve report.';
    }
    header('Location: manage-reports.php');
    exit;
}

// Fetch all reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, u.username as reporter, s.business_name, s.user_id as seller_user_id
        FROM seller_reports r
        JOIN users u ON r.reporter_id = u.user_id
        JOIN sellers s ON r.seller_id = s.seller_id
        ORDER BY r.created_at DESC
    ");
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Fetch reports error: " . $e->getMessage());
}

$message = $_SESSION['admin_message'] ?? '';
$error = $_SESSION['admin_error'] ?? '';
unset($_SESSION['admin_message'], $_SESSION['admin_error']);
?>
<?php include_once('../includes/admin-header.php'); ?>

<div class="reports-container">
    <h1 class="page-title">Manage Reports</h1>

    <?php if ($message): ?>
    <div class="alert success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (empty($reports)): ?>
    <div class="empty-state">
        <img src="../../assets/image/icons/admin-reports.svg" alt="No reports">
        <p>No reports have been submitted.</p>
    </div>
    <?php else: ?>
    <div class="reports-list">
        <?php foreach ($reports as $report): ?>
        <div class="report-card <?php echo $report['status']; ?>">
            <div class="report-header">
                <span class="report-id">#<?php echo $report['report_id']; ?></span>
                <span
                    class="report-status status-<?php echo $report['status']; ?>"><?php echo ucfirst($report['status']); ?></span>
            </div>
            <div class="report-body">
                <p><strong>Reporter:</strong> <?php echo htmlspecialchars($report['reporter']); ?></p>
                <p><strong>Seller:</strong> <?php echo htmlspecialchars($report['business_name'] ?: 'Unknown'); ?></p>
                <p><strong>Reason:</strong> <?php echo htmlspecialchars($report['reason']); ?></p>
                <p><strong>Details:</strong> <?php echo nl2br(htmlspecialchars($report['details'])); ?></p>
                <p><strong>Submitted:</strong> <?php echo date('M j, Y g:i A', strtotime($report['created_at'])); ?></p>
                <?php if ($report['admin_notes']): ?>
                <p><strong>Admin notes:</strong> <?php echo nl2br(htmlspecialchars($report['admin_notes'])); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($report['status'] === 'pending'): ?>
            <div class="report-actions">
                <form method="POST">
                    <input type="hidden" name="report_id" value="<?php echo $report['report_id']; ?>">
                    <input type="hidden" name="action" value="resolve">
                    <textarea name="resolution" placeholder="Resolution notes (optional)" rows="2"></textarea>
                    <button type="submit" class="btn-resolve">Mark as Resolved</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php include_once('../includes/admin-footer.php'); ?>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-profile.php`

**Status:** `FOUND`

```php
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-profile.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <script defer src="../scripts/admin-profile.js"></script>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <?php if (isset($error)): ?>
        <div class="message error"
            style="display: block; margin-bottom: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="admin-dashboard.php" style="color: #721c24; text-decoration: underline; margin-left: 10px;">Return
                to Dashboard</a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="profile-header-card" id="profileHeaderCard">
                <div class="profile-header-left">
                    <div class="profile-avatar-wrapper">
                        <img id="profilePicturePreview" src="<?php echo $profilePicUrl; ?>" alt="Profile Picture"
                            onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                        <div class="profile-avatar-edit" id="profilePictureUpload">
                            <label for="profile_picture" class="file-upload-label" title="Upload profile picture">
                                <img src="../assets/image/icons/camera.svg" alt="Upload">
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                        </div>
                    </div>
                    <div class="profile-name-role">
                        <h1 class="profile-full-name">
                            <?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            <?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <span class="profile-role-badge">Administrator</span>
                        <div id="fileNameDisplay" class="file-name"></div>
                    </div>
                </div>

                <div class="profile-header-right">
                    <button type="button" id="editProfileBtn" class="btn btn-edit">
                        <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                        Edit Profile
                    </button>

                    <div id="profileActions" class="profile-actions-header" style="display: none;">
                        <button type="button" id="uploadPhotoBtn" class="btn btn-upload" title="Upload Profile Photo">
                            <img src="../assets/image/icons/camera.svg" alt="Upload" class="btn-icon">
                            <span class="btn-text">Upload Photo</span>
                        </button>
                        <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>
                            <img src="../assets/image/icons/check.svg" alt="Save" class="btn-icon">
                            <span class="btn-text">Save</span>
                        </button>
                        <button type="button" id="cancelEditBtn" class="btn btn-secondary">
                            <img src="../assets/image/icons/cancel.svg" alt="Cancel" class="btn-icon">
                            <span class="btn-text">Cancel</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="profile-grid">
                <div class="profile-card personal-info-card">
                    <div class="card-header">
                        <h3>Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                First Name
                            </label>
                            <input type="text" id="first_name" name="first_name" required
                                value="<?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="First name" maxlength="50" disabled>
                            <div class="error-message" id="firstNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                Last Name
                            </label>
                            <input type="text" id="last_name" name="last_name" required
                                value="<?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Last name" maxlength="50" disabled>
                            <div class="error-message" id="lastNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="contact_number" class="field-label">
                                <img src="../assets/image/icons/phone.svg" alt="" class="field-icon">
                                Contact Number
                            </label>
                            <input type="tel" id="contact_number" name="contact_number" required
                                value="<?php echo htmlspecialchars($admin['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="09XX XXX XXXX" maxlength="13" disabled>
                            <div class="error-message" id="contactError"></div>
                        </div>
                    </div>
                </div>

                <div class="profile-card account-info-card">
                    <div class="card-header">
                        <h3>Account Information</h3>
                        <span class="badge">Cannot be changed</span>
                    </div>
                    <div class="card-body">
                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/mail.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Email Address</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/user.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Username</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/calendar.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Member Since</span>
                                <span class="info-value"><?php echo htmlspecialchars($dateJoined ?: 'N/A'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="file" id="profile_picture_trigger" name="profile_picture"
                accept="image/jpeg,image/png,image/gif,image/webp" style="display: none;">
        </form>
        <?php endif; ?>
    </div>

    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon success-icon">
                <img src="../assets/image/icons/check-circle.svg" alt="Success">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-in.php`

**Status:** `FOUND`

```php
<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: admin-dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-in.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Sign In</div>

        <form id="signinForm" class="signin-container" method="POST">
            <input type="hidden" name="action" value="signin">

            <div class="form-group">
                <label for="identifier">Email or Username</label>
                <input type="text" id="identifier" name="identifier" required autocomplete="username">
                <div class="error-message" id="identifierError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                    </button>
                </div>
                <div class="error-message" id="passwordError"></div>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <p class="signup-link">
                Don't have an admin account? <a href="admin-sign-up.php">Register</a>
            </p>
        </form>
    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-in.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-sign-up.php`

**Status:** `FOUND`

```php
<?php
// Admin Sign Up Page - Modified to allow access even when logged in
session_start();

// REMOVED the redirect that sent logged-in admins back to dashboard.
// Now both logged-in and non-logged-in users can access this page.

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-up.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Registration</div>

        <form id="signupForm" class="signup-container" method="POST" action="../database/admin-sign-up-handler.php"
            autocomplete="on">
            <input type="hidden" name="action" value="signup">

            <!-- Two-column layout -->
            <div class="form-section personal-info-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                        autocomplete="given-name">
                    <div class="error-message" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name"
                        autocomplete="family-name">
                    <div class="error-message" id="lastNameError"></div>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number *</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel">
                    <div class="help-text">Philippine mobile number (e.g., 0912 345 6789)</div>
                    <div class="error-message" id="contactError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder="admin@example.com"
                        autocomplete="email">
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" id="username" name="username" required placeholder="Choose a username"
                        autocomplete="username">
                    <div class="help-text">3-20 characters (letters, numbers, underscore)</div>
                    <div class="error-message" id="usernameError"></div>
                </div>
            </div>

            <div class="form-section account-info-section">
                <h3>Account Security</h3>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                    <div class="help-text">8-16 characters, with uppercase, lowercase, and number</div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" tabindex="-1"
                            aria-label="Toggle confirm password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password"
                                id="confirmPasswordIcon">
                        </button>
                    </div>
                    <div class="error-message" id="confirmError"></div>
                </div>

                <!-- Buttons inside Account Information column at the bottom -->
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Register Admin</button>
                    <button type="button" class="btn btn-secondary" id="clearForm">Clear Form</button>
                </div>

                <div class="links-group">
                    <p class="login-link">
                        Already have an admin account? <a href="admin-sign-in.php">Sign In</a>
                    </p>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifier Modal -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-up.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/pages/admin-verify-sellers.php`

**Status:** `FOUND`

```php
<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Sellers - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-verify-sellers.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>Verify Sellers</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="pending">Pending Verification</span>
            <span class="filter-tab" data-filter="verified">Verified</span>
            <span class="filter-tab" data-filter="rejected">Rejected</span>
        </div>

        <!-- Sellers List Container -->
        <div id="sellersList" class="sellers-list">
            <div class="loading">Loading sellers...</div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="notificationClose">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-verify-sellers.js"></script>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-header.php`

**Status:** `FOUND`

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
$isAdminLoggedIn = isset($_SESSION['admin_id']);

// Path detection
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

// Check if we're in a subdirectory
$is_includes = strpos($current_dir, '/includes') !== false;
$is_pages = strpos($current_dir, '/pages') !== false;

if ($is_includes) {
    $pathPrefix = '../';
} elseif ($is_pages) {
    $pathPrefix = '../';
} else {
    $pathPrefix = '';
}

// Get admin info for profile display
$adminName = '';
$adminProfilePic = $pathPrefix . 'assets/image/icons/user-profile-circle.svg';

if ($isAdminLoggedIn && isset($_SESSION['admin_first_name'])) {
    $adminName = $_SESSION['admin_first_name'] . ' ' . ($_SESSION['admin_last_name'] ?? '');
    
    // Get profile picture from session or database
    if (isset($_SESSION['admin_profile_picture']) && !empty($_SESSION['admin_profile_picture'])) {
        // Include the data storage handler to use the function
        require_once(dirname(__FILE__) . '/../database/admin-data-storage-handler.php');
        
        // Check if the function exists before calling it
        if (function_exists('getAdminProfilePictureUrl')) {
            $adminProfilePic = getAdminProfilePictureUrl($_SESSION['admin_profile_picture']);
        } else {
            // Fallback if function doesn't exist
            $adminProfilePic = '../database/admin-data-storage-handler.php?action=serve&path=' . urlencode($_SESSION['admin_profile_picture']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/admin-sign-out.css">

    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/admin-sign-out.js"></script>
</head>

<body>
    <header class="header-bar no-transition">
        <div class="header-logo">
            <?php if ($isAdminLoggedIn): ?>
            <!-- Show profile picture and admin name -->
            <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <div class="admin-profile-mini">
                    <img src="<?php echo $adminProfilePic; ?>" alt="Admin" class="admin-avatar"
                        onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/user-profile-circle.svg';">
                </div>
                <div class="title">
                    <span>Admin</span> Panel
                    <?php if (!empty($adminName)): ?>
                    <span class="admin-name">(<?php echo htmlspecialchars($adminName); ?>)</span>
                    <?php endif; ?>
                </div>
            </a>
            <?php else: ?>
            <!-- Show logo for non-logged in visitors -->
            <a href="<?php echo $pathPrefix; ?>admin-index.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <img id="logo" src="<?php echo $pathPrefix; ?>assets/image/brand/Logo.png" alt="Logo"
                    style="height: 40px; width: auto;">
                <div class="title"><span>Admin</span> Panel</div>
            </a>
            <?php endif; ?>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <?php if ($isAdminLoggedIn): ?>
                <!-- Logged in admin navigation - DESKTOP -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
                <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
                <?php else: ?>
                <!-- Not logged in - show sign in link -->
                <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="nav-link">SIGN IN</a>
                <?php endif; ?>
            </nav>

            <?php if ($isAdminLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if ($isAdminLoggedIn): ?>
        <!-- Mobile navigation for logged in admin -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">MANAGE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-profile.php" class="nav-link">PROFILE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-verify-sellers.php" class="nav-link">QUEUE</a>
        <a href="<?php echo $pathPrefix; ?>pages/admin-logs.php" class="nav-link">LOGS</a>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <!-- Mobile navigation for not logged in -->
        <a href="<?php echo $pathPrefix; ?>pages/admin-sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isAdminLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/logoutsvg.svg" alt="Logout"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </div>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="logout-modal-buttons">
                <button id="cancelLogout" class="logout-modal-btn btn-cancel">Cancel</button>
                <button id="confirmLogout" class="logout-modal-btn btn-confirm">Logout</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-footer.php`

**Status:** `FOUND`

```php
<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'admin-index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>Admin <span>Control Panel</span></h2>
            <h2>Manage & <span>Monitor</span></h2>
        </div>
        <div class="socials">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg" alt="Facebook"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg';">
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/instagram.svg" alt="Instagram"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
            <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/youtube.svg" alt="YouTube"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
        </div>
    </div>
    <div class="footer-lower">
        <div class="mail-button">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/mail.svg" alt="Mail"
                onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            <span>admin@crooks-cart.edu.ph</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>includes/admin-privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>includes/admin-terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-privacy-policy.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-privacy-policy.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Admin <span class="policy-hero__highlight">Privacy Policy</span></h1>
                <p class="policy-hero__subtitle">Administrator Data Handling - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to the administrator panel of Crooks Cart Collectives, a student project
                    developed for academic requirements at the School of Computer Studies, Arellano University -
                    Bonifacio Campus. This section outlines how administrator data is handled.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="admin-information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Administrator Information Collected</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For administrator accounts, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Personal Information:</strong> First name, last name
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Email address, contact number
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Account Credentials:</strong> Username, password (hashed for security)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Profile Picture:</strong> Optional profile image
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> Administrator accounts are created for project management and
                            monitoring purposes only.
                        </p>
                    </div>
                </article>

                <article id="admin-data-access" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. Data Access & Monitoring</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Administrators have access to:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">User registration data (for verification purposes)
                            </li>
                            <li class="policy-section__list-item">Seller applications and verification status</li>
                            <li class="policy-section__list-item">Product listings across the platform</li>
                            <li class="policy-section__list-item">Order information and transaction logs</li>
                            <li class="policy-section__list-item">System activity logs (user logins, product additions,
                                orders)</li>
                        </ul>
                        <p>All administrator actions are logged for accountability.</p>
                    </div>
                </article>

                <article id="admin-security" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Administrator Security</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Passwords are securely hashed using industry standards
                            </li>
                            <li class="policy-section__list-item">Session management with timeout protection</li>
                            <li class="policy-section__list-item">Access restricted to authenticated administrators only
                            </li>
                            <li class="policy-section__list-item">All administrative actions are logged for security
                                auditing</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-disclaimer" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">4. Academic Disclaimer</h2>
                    </header>
                    <div class="policy-section__body">
                        <p class="policy-section__important">
                            <strong>IMPORTANT:</strong> This administrator panel is part of a student project created
                            for educational purposes. All data, including administrator information, is stored locally
                            in the project database and used solely for demonstrating system administration
                            functionality.
                        </p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about administrator data handling:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Email:</strong> scs.bonifacio@arellano.edu.ph</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/includes/admin-terms-and-conditions.php`

**Status:** `FOUND`

```php
<?php
session_start();
$current_page = 'admin-terms-and-conditions';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terms and Conditions - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-terms-and-conditions.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="terms-page">
        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="terms-hero__container">
                <h1 class="terms-hero__title">Admin <span class="terms-hero__highlight">Terms & Conditions</span></h1>
                <p class="terms-hero__subtitle">Administrator Agreement - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="terms-intro">
            <div class="terms-intro__card">
                <p class="terms-intro__text">
                    This administrator agreement applies to users granted access to the Crooks Cart Collectives admin
                    panel. By accessing the admin panel, you agree to these terms and conditions governing administrator
                    responsibilities and conduct.
                </p>
                <p class="terms-intro__effective-date">Effective Date: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="terms-content">
            <div class="terms-sections">

                <article id="admin-responsibilities" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">1. Administrator Responsibilities</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As an administrator of this academic project, you agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Maintain the confidentiality of your login credentials
                            </li>
                            <li class="terms-section__list-item">Use admin privileges only for legitimate project
                                purposes</li>
                            <li class="terms-section__list-item">Verify seller applications accurately and fairly</li>
                            <li class="terms-section__list-item">Monitor user reports and take appropriate action</li>
                            <li class="terms-section__list-item">Not abuse admin privileges for personal gain</li>
                        </ul>
                    </div>
                </article>

                <article id="admin-privileges" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">2. Administrator Privileges</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators are granted the following privileges:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Access to view user and seller information</li>
                            <li class="terms-section__list-item">Ability to verify or reject seller applications</li>
                            <li class="terms-section__list-item">View system logs and user activities</li>
                            <li class="terms-section__list-item">Create additional administrator accounts</li>
                            <li class="terms-section__list-item">Monitor marketplace transactions and reports</li>
                        </ul>
                    </div>
                </article>

                <article id="accountability" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">3. Accountability and Logging</h2>
                    </header>
                    <div class="terms-section__body">
                        <p class="terms-section__important">
                            <strong>IMPORTANT:</strong> All administrator actions are logged and monitored.
                        </p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Every admin login is timestamped and recorded</li>
                            <li class="terms-section__list-item">Seller verification actions are logged with admin ID
                            </li>
                            <li class="terms-section__list-item">Any changes to user data are tracked</li>
                            <li class="terms-section__list-item">Misuse of admin privileges may result in removal of
                                access</li>
                        </ul>
                    </div>
                </article>

                <article id="data-handling" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">4. Data Handling and Privacy</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Administrators agree to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Respect user privacy and confidentiality</li>
                            <li class="terms-section__list-item">Not share or export user data outside the project</li>
                            <li class="terms-section__list-item">Use data only for legitimate administrative purposes
                            </li>
                            <li class="terms-section__list-item">Report any security concerns to project leads</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-purposes" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">5. Academic Project Context</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>This administrator panel is part of an academic project. By using it, you acknowledge:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This is a demonstration project for educational
                                purposes</li>
                            <li class="terms-section__list-item">No real financial transactions occur on the platform
                            </li>
                            <li class="terms-section__list-item">The system may be modified or taken down after project
                                completion</li>
                            <li class="terms-section__list-item">Your role as an administrator is part of the academic
                                exercise</li>
                        </ul>
                    </div>
                </article>

                <article id="contact" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">6. Contact Information</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>For questions regarding administrator access:</p>
                        <address class="terms-contact">
                            <p class="terms-contact__item"><strong>Institution:</strong> School of Computer Studies</p>
                            <p class="terms-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="terms-contact__item"><strong>Course:</strong> Web Development</p>
                            <p class="terms-contact__item"><strong>Project Lead:</strong> Lance N. Madelar</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>

        <!-- Agreement Section -->
        <section class="terms-agreement">
            <div class="terms-agreement__box">
                <p class="terms-agreement__text">
                    By accessing the administrator panel, you acknowledge that this is an academic project and agree to
                    use admin privileges responsibly and ethically.
                </p>
                <div class="terms-agreement__actions">
                    <a href="admin-sign-in.php" class="terms-agreement__btn terms-agreement__btn--primary">Return to
                        Sign In</a>
                    <a href="admin-index.php" class="terms-agreement__btn terms-agreement__btn--secondary">Back to
                        Admin</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-header.js`

**Status:** `FOUND`

```javascript
document.addEventListener("DOMContentLoaded", () => {
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 100);
    }
    
    // Initialize header after a short delay to ensure DOM is ready
    if (!window.headerInitialized) {
        setTimeout(() => {
            initializeHeader();
        }, 50);
        
        setTimeout(() => {
            const header = document.querySelector('.header-bar');
            const mobileNav = document.getElementById('mobileNav');
            
            if (header) header.classList.remove('no-transition');
            if (mobileNav) mobileNav.classList.remove('no-transition');
        }, 300);
        
        window.headerInitialized = true;
    }
});

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        logo.onerror = function() {
            this.src = "assets/image/brand/Logo.png";
        };
    }
    
    // Mobile menu functionality
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu');
        
        // Remove any existing inline styles that might interfere
        mobileNav.style.transform = '';
        mobileNav.style.display = '';
        
        // Remove any existing backdrop to avoid duplicates
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Ensure mobile nav is hidden by default
        mobileNav.classList.remove('open');
        
        // Function to toggle menu
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
            
            // Force remove any inline transform that might linger
            mobileNav.style.transform = '';
        }
        
        // Function to close menu
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
            }
        }
        
        // Event listeners
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking a link inside mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle window resize - close mobile menu on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1005 && mobileNav.classList.contains('open')) {
                closeMenu();
            }
        });
        
        console.log('Mobile menu initialized');
    } else {
        console.error('Menu elements not found');
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'admin-index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage) {
                link.classList.add('active');
            }
        }
    });
}

function adjustContentMargin() {
    const header = document.querySelector('.header-bar');
    const content = document.querySelector('.content');
    if (header && content) {
        const headerHeight = header.offsetHeight;
        content.style.marginTop = headerHeight + 'px';
    }
}

window.HeaderFunctions = {
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-logs.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logsList = document.getElementById('logsList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    let currentFilter = 'all';
    let allLogs = [];

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterLogs(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderLogs(allLogs);
        } else {
            const filtered = allLogs.filter(log => log.log_type === filter);
            renderLogs(filtered);
        }
    }

    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    }

    function getLogIcon(logType) {
        switch(logType) {
            case 'user_login': return 'profile.svg';
            case 'seller_application': return 'verified-empty.svg';
            case 'product_added': return 'package.svg';
            case 'order_placed': return 'order.svg';
            default: return 'time-update.svg';
        }
    }

    function getLogDescription(log) {
        switch(log.log_type) {
            case 'user_login':
                return `${log.user_name} (${log.email}) logged in`;
            case 'seller_application':
                return `${log.user_name} applied as seller - ${log.business_name || 'No business name'}`;
            case 'product_added':
                return `${log.user_name} added product: ${log.product_name}`;
            case 'order_placed':
                return `${log.user_name} ordered ${log.quantity}x ${log.product_name}`;
            default:
                return 'Unknown activity';
        }
    }

    function renderLogs(logs) {
        if (!logs || logs.length === 0) {
            logsList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/time-update.svg" alt="No logs" class="empty-state-icon">
                        <h2>No logs found</h2>
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="logs-container">';

        logs.forEach(log => {
            const iconFile = getLogIcon(log.log_type);
            const description = getLogDescription(log);
            const formattedTime = formatTimestamp(log.timestamp);

            html += `
                <div class="log-entry">
                    <div class="log-icon">
                        <img src="../assets/image/icons/${iconFile}" alt="${log.log_type}">
                    </div>
                    <div class="log-content">
                        <div class="log-description">${escapeHtml(description)}</div>
                        <div class="log-time">${formattedTime}</div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        logsList.innerHTML = html;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function loadLogs(filter = 'all') {
        logsList.innerHTML = '<div class="loading">Loading logs...</div>';

        try {
            const response = await fetch(`../database/admin-logs-handler.php?action=get_logs&type=${filter}`);
            const result = await response.json();

            if (result.status === 'success') {
                allLogs = result.data;
                filterLogs(currentFilter);
            } else {
                logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load logs.</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading logs:', error);
            logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            currentFilter = filter;
            setActiveFilter(filter);
            loadLogs(filter);
        });
    });

    // Initial load
    loadLogs('all');
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-profile.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editProfileBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Action containers
    const editButtonDiv = document.getElementById('editProfileBtn');
    const profileActionsDiv = document.getElementById('profileActions');
    
    // Get editable inputs in Personal Info card
    const editableInputs = document.querySelectorAll('.personal-info-card input:not([type="hidden"])');
    
    // Profile picture elements
    const profilePicInput = document.getElementById('profile_picture');
    const profilePicTrigger = document.getElementById('profile_picture_trigger');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    
    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const contactInput = document.getElementById('contact_number');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== PHONE NUMBER FORMATTING =====
    function formatPhilippineNumber(input) {
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('09') && value.length <= 11) {
            if (value.length > 4) {
                let formatted = value.substring(0, 4) + ' ' + value.substring(4, 7);
                if (value.length > 7) {
                    formatted += ' ' + value.substring(7, 11);
                }
                input.value = formatted;
            } else {
                input.value = value;
            }
        } else {
            input.value = value;
        }
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/\D/g, '');
        return (cleaned.length === 11 && cleaned.startsWith('09'));
    }

    // ===== MODAL FUNCTIONS =====
    function showModal(message, isError = false) {
        modalMessage.textContent = message;
        const modalIcon = document.querySelector('.modal-icon');
        if (modalIcon) {
            modalIcon.className = 'modal-icon ' + (isError ? 'error-icon' : 'success-icon');
            modalIcon.innerHTML = isError 
                ? '<img src="../assets/image/icons/cancel.svg" alt="Error">'
                : '<img src="../assets/image/icons/check-circle.svg" alt="Success">';
        }
        modal.style.display = 'flex';
    }

    function hideModal() {
        modal.style.display = 'none';
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    // ===== STORE ORIGINAL VALUES =====
    function storeOriginalValues() {
        originalValues = {};
        editableInputs.forEach(input => {
            if (input.id) {
                originalValues[input.id] = input.value;
            }
        });
        if (profilePicPreview) {
            originalValues.profile_picture = profilePicPreview.src;
        }
    }

    // ===== ENABLE EDIT MODE =====
    function enableEditMode() {
        isEditMode = true;
        
        // Hide edit button, show action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'none';
        if (profileActionsDiv) profileActionsDiv.style.display = 'flex';
        
        // Enable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        
        // Show avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'flex';
        
        pictureChanged = false;
    }

    // ===== DISABLE EDIT MODE =====
    function disableEditMode(restore = true) {
        isEditMode = false;
        
        // Show edit button, hide action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'flex';
        if (profileActionsDiv) profileActionsDiv.style.display = 'none';
        
        // Disable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        // Hide avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'none';
        
        // Clear file input and filename
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (profilePicTrigger) {
            profilePicTrigger.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.style.display = 'none';
            fileNameDisplay.textContent = '';
        }
        
        // Restore original values if needed
        if (restore) {
            for (let id in originalValues) {
                const field = document.getElementById(id);
                if (field) {
                    field.value = originalValues[id];
                }
            }
            if (originalValues.profile_picture && profilePicPreview) {
                profilePicPreview.src = originalValues.profile_picture;
            }
        }
        
        // Reset save button state
        if (saveBtn) saveBtn.disabled = true;
        pictureChanged = false;
    }

    // ===== PROFILE PICTURE HANDLING =====
    function handleProfilePictureSelect(file) {
        if (file) {
            // Validate file size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                showModal('File size must be less than 2MB', true);
                return false;
            }
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                showModal('Please upload a valid image (JPG, PNG, GIF, WEBP)', true);
                return false;
            }
            
            fileNameDisplay.style.display = 'block';
            fileNameDisplay.textContent = 'New photo selected: ' + file.name;
            pictureChanged = true;
            
            // Enable save button if in edit mode
            if (saveBtn) saveBtn.disabled = false;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                if (profilePicPreview) {
                    profilePicPreview.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
            return true;
        }
        return false;
    }

    // Connect both file inputs to the same handler
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            if (this.files[0]) {
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    if (profilePicTrigger) {
        profilePicTrigger.addEventListener('change', function() {
            if (this.files[0]) {
                // Sync the visible input with the trigger
                if (profilePicInput) {
                    // Create a DataTransfer to copy the file
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(this.files[0]);
                    profilePicInput.files = dataTransfer.files;
                }
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    // Upload photo button click handler
    if (uploadPhotoBtn) {
        uploadPhotoBtn.addEventListener('click', function() {
            if (profilePicTrigger) {
                profilePicTrigger.click();
            } else if (profilePicInput) {
                profilePicInput.click();
            }
        });
    }

    // Hide avatar edit overlay by default
    const avatarEdit = document.getElementById('profilePictureUpload');
    if (avatarEdit) avatarEdit.style.display = 'none';

    // ===== PHONE NUMBER INPUT HANDLING =====
    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode) {
                formatPhilippineNumber(this);
                // Enable save button when changes are made
                if (saveBtn) saveBtn.disabled = false;
            }
        });
        
        contactInput.addEventListener('blur', function() {
            if (isEditMode && this.value && !isPhoneValid(this.value)) {
                this.style.borderColor = '#FF8246';
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (09XXXXXXXXX)';
                document.getElementById('contactError').style.display = 'block';
            } else {
                this.style.borderColor = '';
                document.getElementById('contactError').textContent = '';
                document.getElementById('contactError').style.display = 'none';
            }
        });
    }

    // ===== EDIT BUTTON CLICK =====
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            storeOriginalValues();
            enableEditMode();
        });
    }

    // ===== CANCEL EDIT BUTTON =====
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', function() {
            disableEditMode(true);
        });
    }

    // ===== INPUT CHANGE HANDLERS - Enable save button =====
    if (firstNameInput) {
        firstNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('firstNameError').style.display = 'none';
        });
    }

    if (lastNameInput) {
        lastNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('lastNameError').style.display = 'none';
        });
    }

    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
        });
    }

    // ===== SAVE BUTTON CLICK =====
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.style.display = 'none';
            });
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const contact = contactInput ? contactInput.value.trim() : '';

            let isValid = true;

            if (!firstName) {
                document.getElementById('firstNameError').textContent = 'First name is required';
                document.getElementById('firstNameError').style.display = 'block';
                firstNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!lastName) {
                document.getElementById('lastNameError').textContent = 'Last name is required';
                document.getElementById('lastNameError').style.display = 'block';
                lastNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!contact) {
                document.getElementById('contactError').textContent = 'Contact number is required';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            } else if (!isPhoneValid(contact)) {
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (e.g., 09123456789)';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!isValid) {
                showModal('Please fix the errors before saving', true);
                return;
            }

            // Disable button and show loading state
            saveBtn.disabled = true;
            const originalText = saveBtn.innerHTML;
            saveBtn.innerHTML = '<span class="btn-text">Saving...</span>';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/admin-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    setTimeout(() => {
                        // Update the displayed full name
                        const nameElement = document.querySelector('.profile-full-name');
                        if (nameElement && result.data) {
                            nameElement.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                        }
                        
                        storeOriginalValues();
                        disableEditMode(false);
                        saveBtn.innerHTML = originalText;
                        
                        // If picture changed, reload to update header
                        if (pictureChanged) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }, 1500);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.', true);
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.', true);
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
        });
    }

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function(e) {
        // Escape key cancels edit mode
        if (e.key === 'Escape' && isEditMode) {
            disableEditMode(true);
        }
        
        // Ctrl+S or Cmd+S saves
        if ((e.ctrlKey || e.metaKey) && e.key === 's' && isEditMode) {
            e.preventDefault();
            if (saveBtn && !saveBtn.disabled) {
                saveBtn.click();
            }
        }
    });

    // ===== INITIAL STORE =====
    storeOriginalValues();
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-in.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signinForm');
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    const identifierInput = document.getElementById('identifier');
    const passwordInput = document.getElementById('password');
    const identifierError = document.getElementById('identifierError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');

    let isModalOpen = false;
    let isSubmitting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordInput && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    function clearErrors() {
        identifierError.textContent = '';
        passwordError.textContent = '';
        identifierInput.classList.remove('error');
        passwordInput.classList.remove('error');
    }

    function showFieldError(field, message) {
        const errorElement = field === 'identifier' ? identifierError : passwordError;
        const inputElement = field === 'identifier' ? identifierInput : passwordInput;

        errorElement.textContent = message;
        inputElement.classList.add('error');
    }

    // ============= MODAL EVENT LISTENERS =============
    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= BLUR VALIDATION =============
    identifierInput.addEventListener('blur', () => {
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
        } else {
            identifierError.textContent = '';
            identifierInput.classList.remove('error');
        }
    });

    passwordInput.addEventListener('blur', () => {
        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
        } else {
            passwordError.textContent = '';
            passwordInput.classList.remove('error');
        }
    });

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (isSubmitting) return;

        clearErrors();

        // Client-side validation
        let isValid = true;
        if (!identifierInput.value.trim()) {
            showFieldError('identifier', 'Email or username is required');
            isValid = false;
        }

        if (!passwordInput.value) {
            showFieldError('password', 'Password is required');
            isValid = false;
        }

        if (!isValid) {
            showNotifier('Please fix the errors above');
            return;
        }

        // Show loading state
        isSubmitting = true;
        const submitBtn = form.querySelector('.btn-primary');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Signing In...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(form);

            const response = await fetch('../database/admin-sign-in-handler.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotifier('Login successful! Redirecting...');
                
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 1500);
            } else {
                if (result.message === 'invalid-credentials') {
                    showNotifier('Invalid credentials. Please try again.');
                    identifierInput.classList.add('error');
                    passwordInput.classList.add('error');
                } else {
                    showNotifier('Login failed. Please try again.');
                }
            }
        } catch (error) {
            console.error('Login error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            // Reset button state
            isSubmitting = false;
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Focus on identifier field
    setTimeout(() => {
        identifierInput.focus();
    }, 100);
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-out.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    
    let isProcessing = false;

    if (!logoutTriggers.length || !logoutModal) return;

    // Show modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.style.display = 'flex';
        });
    });

    // Hide modal on cancel
    if (cancelLogout) {
        cancelLogout.addEventListener('click', () => {
            logoutModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            logoutModal.style.display = 'none';
        }
    });

    // Handle confirm logout
    if (confirmLogout) {
        confirmLogout.addEventListener('click', async () => {
            if (isProcessing) return;
            
            isProcessing = true;
            const originalText = confirmLogout.textContent;
            confirmLogout.textContent = 'Logging out...';
            confirmLogout.disabled = true;

            try {
                const response = await fetch('../database/admin-sign-out-handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (result.status === 'success') {
                    window.location.replace(result.redirect + '?t=' + Date.now());
                } else {
                    console.error('Logout error:', result.message);
                    window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
                }
            } catch (error) {
                console.error('Logout error:', error);
                window.location.replace('../pages/admin-sign-in.php?t=' + Date.now());
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && logoutModal.style.display === 'flex') {
            logoutModal.style.display = 'none';
        }
    });
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-sign-up.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const form = document.getElementById('signupForm');
    const clearButton = document.getElementById('clearForm');
    const submitButton = form.querySelector('.btn-primary');
    
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    // Form fields
    const firstNameField = document.getElementById('first_name');
    const lastNameField = document.getElementById('last_name');
    const contactField = document.getElementById('contact_number');
    const emailField = document.getElementById('email');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    
    // Error message elements
    const firstNameError = document.getElementById('firstNameError');
    const lastNameError = document.getElementById('lastNameError');
    const contactError = document.getElementById('contactError');
    const emailError = document.getElementById('emailError');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const confirmError = document.getElementById('confirmError');
    
    // Password toggle elements
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    // State
    let isModalOpen = false;
    let isSubmitting = false;
    let isFormatting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordField && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }
    
    if (toggleConfirmPassword && confirmPasswordField && confirmPasswordIcon) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            
            if (type === 'text') {
                confirmPasswordIcon.src = '../assets/image/icons/password-unhide.svg';
                confirmPasswordIcon.alt = 'Show password';
            } else {
                confirmPasswordIcon.src = '../assets/image/icons/password-hide.svg';
                confirmPasswordIcon.alt = 'Hide password';
            }
        });
    }

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(message) {
        if (isModalOpen) return;
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
        isModalOpen = true;
        
        // Auto-hide after 5 seconds for success messages
        if (message.includes('success')) {
            setTimeout(() => {
                closeNotifier();
            }, 5000);
        }
    }

    function closeNotifier() {
        modal.classList.add('hidden');
        isModalOpen = false;
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeNotifier);
    }
    
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= FIELD HIGHLIGHTING =============
    function highlightField(field, highlight = true) {
        if (!field) return;
        if (highlight) {
            field.style.borderColor = '#FF8246';
            field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
            field.classList.add('error-field');
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
            field.classList.remove('error-field');
        }
    }

    function resetHighlights() {
        form.querySelectorAll('input').forEach(field => highlightField(field, false));
        
        // Clear all error messages
        document.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });
    }

    // ============= VALIDATION FUNCTIONS =============
    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validateUsername(username) {
        if (username.length < 3) {
            return { valid: false, message: 'Username must be at least 3 characters long.' };
        }
        if (username.length > 20) {
            return { valid: false, message: 'Username cannot exceed 20 characters.' };
        }
        if (!/^[a-zA-Z0-9_]+$/.test(username)) {
            return { valid: false, message: 'Username can only contain letters, numbers, and underscore.' };
        }
        return { valid: true, message: '' };
    }

    function validatePassword(password) {
        if (password.length < 8) {
            return { valid: false, message: 'Password must be at least 8 characters long.' };
        }
        if (password.length > 16) {
            return { valid: false, message: 'Password cannot exceed 16 characters.' };
        }
        if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
            return { valid: false, message: 'Password must contain both uppercase and lowercase letters.' };
        }
        if (!/[0-9]/.test(password)) {
            return { valid: false, message: 'Password must contain at least one number.' };
        }
        return { valid: true, message: '' };
    }

    // ============= IMPROVED PHONE NUMBER FORMATTING =============
    function cleanPhoneNumber(value) {
        return value.replace(/\D/g, '');
    }

    function formatPhoneDisplay(cleaned) {
        if (!cleaned) return '';
        
        let displayNumber = cleaned;
        
        if (cleaned.startsWith('63') && cleaned.length >= 3) {
            displayNumber = '0' + cleaned.substring(2);
        }
        else if (cleaned.startsWith('639') && cleaned.length >= 4) {
            displayNumber = '0' + cleaned.substring(2);
        }
        else if (cleaned.startsWith('063') && cleaned.length >= 4) {
            displayNumber = '0' + cleaned.substring(3);
        }
        else if (cleaned.startsWith('9') && cleaned.length === 10) {
            displayNumber = '0' + cleaned;
        }
        
        displayNumber = displayNumber.substring(0, 11);
        
        if (displayNumber.length > 4) {
            let formatted = displayNumber.substring(0, 4);
            if (displayNumber.length > 7) {
                formatted += ' ' + displayNumber.substring(4, 7) + ' ' + displayNumber.substring(7, 11);
            } else if (displayNumber.length > 4) {
                formatted += ' ' + displayNumber.substring(4);
            }
            return formatted;
        }
        
        return displayNumber;
    }

    function formatPhilippineNumber(input) {
        if (isFormatting) return;
        isFormatting = true;
        
        const start = input.selectionStart;
        const end = input.selectionEnd;
        const oldLength = input.value.length;
        
        const cleaned = cleanPhoneNumber(input.value);
        const formatted = formatPhoneDisplay(cleaned);
        
        input.value = formatted;
        
        const newLength = input.value.length;
        const cursorAdjust = newLength - oldLength;
        
        setTimeout(() => {
            input.setSelectionRange(start + cursorAdjust, end + cursorAdjust);
            isFormatting = false;
        }, 0);
    }

    function isPhoneValid(phone) {
        const cleaned = cleanPhoneNumber(phone);
        
        if (cleaned.length === 11 && cleaned.startsWith('09')) {
            return true;
        }
        
        if (cleaned.length === 10 && cleaned.startsWith('9')) {
            return true;
        }
        
        if ((cleaned.length === 12 && cleaned.startsWith('63')) || 
            (cleaned.length === 13 && cleaned.startsWith('063')) ||
            (cleaned.length === 12 && cleaned.startsWith('639'))) {
            return true;
        }
        
        return false;
    }

    function normalizePhoneForStorage(phone) {
        let cleaned = cleanPhoneNumber(phone);
        
        if (cleaned.startsWith('63') && cleaned.length >= 3) {
            return '0' + cleaned.substring(2);
        }
        if (cleaned.startsWith('639') && cleaned.length >= 4) {
            return '0' + cleaned.substring(2);
        }
        if (cleaned.startsWith('063') && cleaned.length >= 4) {
            return '0' + cleaned.substring(3);
        }
        if (cleaned.startsWith('9') && cleaned.length === 10) {
            return '0' + cleaned;
        }
        
        return cleaned;
    }

    // ============= REAL-TIME VALIDATION =============
    function validateField(field, errorElement, validationFn, errorMessage) {
        if (!field.value.trim()) {
            errorElement.textContent = 'This field is required';
            highlightField(field, true);
            return false;
        }
        
        if (validationFn && !validationFn(field.value)) {
            errorElement.textContent = errorMessage || 'Invalid format';
            highlightField(field, true);
            return false;
        }
        
        errorElement.textContent = '';
        highlightField(field, false);
        return true;
    }

    // Email validation
    emailField.addEventListener('blur', function() {
        validateField(this, emailError, isEmailValid, 'Please enter a valid email address');
    });

    // Username validation
    usernameField.addEventListener('blur', function() {
        const validation = validateUsername(this.value);
        if (this.value.trim() && !validation.valid) {
            usernameError.textContent = validation.message;
            highlightField(this, true);
        } else if (!this.value.trim()) {
            usernameError.textContent = 'Username is required';
            highlightField(this, true);
        } else {
            usernameError.textContent = '';
            highlightField(this, false);
        }
    });

    // Password validation
    passwordField.addEventListener('blur', function() {
        const validation = validatePassword(this.value);
        if (this.value.trim() && !validation.valid) {
            passwordError.textContent = validation.message;
            highlightField(this, true);
        } else if (!this.value.trim()) {
            passwordError.textContent = 'Password is required';
            highlightField(this, true);
        } else {
            passwordError.textContent = '';
            highlightField(this, false);
        }
        
        if (confirmPasswordField.value) {
            if (this.value !== confirmPasswordField.value) {
                confirmError.textContent = 'Passwords do not match';
                highlightField(confirmPasswordField, true);
            } else {
                confirmError.textContent = '';
                highlightField(confirmPasswordField, false);
            }
        }
    });

    confirmPasswordField.addEventListener('blur', function() {
        if (this.value && this.value !== passwordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(this, true);
        } else if (!this.value.trim()) {
            confirmError.textContent = 'Please confirm your password';
            highlightField(this, true);
        } else {
            confirmError.textContent = '';
            highlightField(this, false);
        }
    });

    // ============= INPUT EVENT LISTENERS =============
    if (contactField) {
        contactField.addEventListener('input', function(e) {
            formatPhilippineNumber(this);
            
            if (contactError) {
                contactError.textContent = '';
            }
            highlightField(this, false);
        });

        contactField.addEventListener('blur', function() {
            if (this.value) {
                if (!isPhoneValid(this.value)) {
                    contactError.textContent = 'Please enter a valid Philippine mobile number (e.g., 0912 345 6789)';
                    highlightField(this, true);
                } else {
                    const cleaned = cleanPhoneNumber(this.value);
                    const normalized = normalizePhoneForStorage(cleaned);
                    this.value = formatPhoneDisplay(normalized);
                    contactError.textContent = '';
                    highlightField(this, false);
                }
            } else {
                contactError.textContent = 'Contact number is required';
                highlightField(this, true);
            }
        });
    }

    // Clear highlights on input for all fields
    firstNameField.addEventListener('input', () => {
        highlightField(firstNameField, false);
        firstNameError.textContent = '';
    });
    
    lastNameField.addEventListener('input', () => {
        highlightField(lastNameField, false);
        lastNameError.textContent = '';
    });
    
    emailField.addEventListener('input', () => {
        highlightField(emailField, false);
        emailError.textContent = '';
    });
    
    usernameField.addEventListener('input', () => {
        highlightField(usernameField, false);
        usernameError.textContent = '';
    });
    
    passwordField.addEventListener('input', () => {
        highlightField(passwordField, false);
        passwordError.textContent = '';
        
        if (confirmPasswordField.value) {
            if (passwordField.value !== confirmPasswordField.value) {
                confirmError.textContent = 'Passwords do not match';
                highlightField(confirmPasswordField, true);
            } else {
                confirmError.textContent = '';
                highlightField(confirmPasswordField, false);
            }
        }
    });
    
    confirmPasswordField.addEventListener('input', () => {
        if (confirmPasswordField.value && confirmPasswordField.value !== passwordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(confirmPasswordField, true);
        } else {
            confirmError.textContent = '';
            highlightField(confirmPasswordField, false);
        }
    });

    // ============= FORM SUBMISSION WITH FALLBACKS =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        // Check required fields with specific error messages
        let hasErrors = false;
        
        if (!firstNameField.value.trim()) {
            firstNameError.textContent = 'First name is required';
            highlightField(firstNameField, true);
            hasErrors = true;
        }
        
        if (!lastNameField.value.trim()) {
            lastNameError.textContent = 'Last name is required';
            highlightField(lastNameField, true);
            hasErrors = true;
        }
        
        if (!contactField.value.trim()) {
            contactError.textContent = 'Contact number is required';
            highlightField(contactField, true);
            hasErrors = true;
        } else if (!isPhoneValid(contactField.value)) {
            contactError.textContent = 'Please enter a valid Philippine mobile number';
            highlightField(contactField, true);
            hasErrors = true;
        }
        
        if (!emailField.value.trim()) {
            emailError.textContent = 'Email is required';
            highlightField(emailField, true);
            hasErrors = true;
        } else if (!isEmailValid(emailField.value)) {
            emailError.textContent = 'Please enter a valid email address';
            highlightField(emailField, true);
            hasErrors = true;
        }
        
        if (!usernameField.value.trim()) {
            usernameError.textContent = 'Username is required';
            highlightField(usernameField, true);
            hasErrors = true;
        } else {
            const usernameValidation = validateUsername(usernameField.value);
            if (!usernameValidation.valid) {
                usernameError.textContent = usernameValidation.message;
                highlightField(usernameField, true);
                hasErrors = true;
            }
        }
        
        if (!passwordField.value) {
            passwordError.textContent = 'Password is required';
            highlightField(passwordField, true);
            hasErrors = true;
        } else {
            const passwordValidation = validatePassword(passwordField.value);
            if (!passwordValidation.valid) {
                passwordError.textContent = passwordValidation.message;
                highlightField(passwordField, true);
                hasErrors = true;
            }
        }
        
        if (!confirmPasswordField.value) {
            confirmError.textContent = 'Please confirm your password';
            highlightField(confirmPasswordField, true);
            hasErrors = true;
        } else if (passwordField.value !== confirmPasswordField.value) {
            confirmError.textContent = 'Passwords do not match';
            highlightField(confirmPasswordField, true);
            hasErrors = true;
        }
        
        if (hasErrors) {
            showNotifier('Please fix the errors before submitting.');
            return;
        }
        
        // Prepare form data - normalize phone number before submission
        const formData = new FormData(form);
        
        // Replace phone with normalized version for storage
        const normalizedPhone = normalizePhoneForStorage(contactField.value);
        formData.set('contact_number', normalizedPhone);
        
        // Submit form
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        // Array of URLs to try in order
        const urlsToTry = [
            '../database/admin-sign-up-handler.php',  // Relative path (primary)
            '/admin/database/admin-sign-up-handler.php', // Absolute path (fallback 1)
            './database/admin-sign-up-handler.php'    // Current directory path (fallback 2)
        ];

        let response = null;
        let lastError = null;
        let usedUrl = '';

        // Try each URL until one works
        for (const url of urlsToTry) {
            try {
                console.log(`Trying URL: ${url}`);
                response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });
                
                if (response.ok) {
                    usedUrl = url;
                    console.log(`✅ Success with URL: ${url}`);
                    
                    // Log successful fallback to server if not primary
                    if (url !== urlsToTry[0]) {
                        try {
                            await fetch('../database/auto-test.php?log=' + encodeURIComponent(`SIGNUP FALLBACK: Used ${url} successfully`));
                        } catch (e) {
                            // Ignore logging errors
                        }
                    }
                    break; // Exit loop on success
                }
            } catch (error) {
                console.log(`❌ Failed with URL: ${url}`, error.message);
                lastError = error;
                response = null;
            }
        }

        // If all URLs failed
        if (!response) {
            console.error('All fetch attempts failed:', lastError);
            showNotifier('Network error. Please check your connection and try again.');
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
            return;
        }

        try {
            const responseText = await response.text();
            console.log('Raw response:', responseText);
            
            let result;
            try {
                result = JSON.parse(responseText);
            } catch (e) {
                console.error('Failed to parse JSON:', responseText);
                showNotifier('Server returned invalid response. Please try again.');
                isSubmitting = false;
                submitButton.textContent = originalText;
                submitButton.disabled = false;
                return;
            }

            if (result.status === 'success') {
                const delayTime = result.delay || 5000;
                showNotifier(result.message || 'Admin account created successfully! Please sign in.');
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, delayTime);
            } else {
                console.error('Signup error details:', result);
                
                // Handle specific error messages
                if (result.message === 'duplicate-email') {
                    emailError.textContent = 'Email already exists';
                    highlightField(emailField, true);
                    showNotifier('Email already exists. Please use a different email.');
                } else if (result.message === 'username-unavailable') {
                    usernameError.textContent = 'Username already taken';
                    highlightField(usernameField, true);
                    showNotifier('Username already taken. Please choose a different username.');
                } else if (result.message === 'duplicate-contact') {
                    contactError.textContent = 'Phone number already registered';
                    highlightField(contactField, true);
                    showNotifier('Phone number already registered. Please use a different number.');
                } else if (result.message === 'username-too-short') {
                    usernameError.textContent = 'Username too short';
                    highlightField(usernameField, true);
                    showNotifier('Username must be at least 3 characters long.');
                } else if (result.message === 'username-too-long') {
                    usernameError.textContent = 'Username too long';
                    highlightField(usernameField, true);
                    showNotifier('Username cannot exceed 20 characters.');
                } else if (result.message === 'username-invalid-chars') {
                    usernameError.textContent = 'Invalid characters';
                    highlightField(usernameField, true);
                    showNotifier('Username can only contain letters, numbers, and underscore.');
                } else if (result.message === 'password-too-short') {
                    passwordError.textContent = 'Password too short';
                    highlightField(passwordField, true);
                    showNotifier('Password must be at least 8 characters long.');
                } else if (result.message === 'password-too-long') {
                    passwordError.textContent = 'Password too long';
                    highlightField(passwordField, true);
                    showNotifier('Password cannot exceed 16 characters.');
                } else if (result.message === 'password-needs-mixed-case') {
                    passwordError.textContent = 'Needs uppercase & lowercase';
                    highlightField(passwordField, true);
                    showNotifier('Password must contain both uppercase and lowercase letters.');
                } else if (result.message === 'password-needs-number') {
                    passwordError.textContent = 'Needs at least one number';
                    highlightField(passwordField, true);
                    showNotifier('Password must contain at least one number.');
                } else if (result.message === 'passwords-mismatch') {
                    confirmError.textContent = 'Passwords do not match';
                    highlightField(confirmPasswordField, true);
                    showNotifier('Passwords do not match.');
                } else if (result.message === 'invalid-email') {
                    emailError.textContent = 'Invalid email format';
                    highlightField(emailField, true);
                    showNotifier('Please enter a valid email address.');
                } else if (result.message === 'invalid-contact') {
                    contactError.textContent = 'Invalid phone number';
                    highlightField(contactField, true);
                    showNotifier('Please enter a valid Philippine mobile number.');
                } else if (result.message === 'missing-field') {
                    const field = result.field || '';
                    if (field) {
                        const fieldElement = document.getElementById(field);
                        if (fieldElement) {
                            const errorElement = document.getElementById(field + 'Error');
                            if (errorElement) {
                                errorElement.textContent = 'This field is required';
                            }
                            highlightField(fieldElement, true);
                        }
                    }
                    showNotifier('Please fill in all required fields.');
                } else {
                    showNotifier('Oops! There was a problem creating your account. Please try again.');
                }
            }
        } catch (error) {
            console.error('Signup error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    });

    // ============= CLEAR FORM =============
    if (clearButton) {
        clearButton.addEventListener('click', () => {
            form.reset();
            resetHighlights();
        });
    }

    // ============= INITIAL FOCUS =============
    setTimeout(() => {
        firstNameField.focus();
    }, 100);
});
```

---

## File: `Crooks-Cart-Collectives/admin/scripts/admin-verify-sellers.js`

**Status:** `FOUND`

```javascript
document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const sellersList = document.getElementById('sellersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    let currentFilter = 'pending';
    let allSellers = [];

    // Show/hide modal functions
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                notificationModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 3000);
        }
    }

    function hideNotification() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotification);
    }

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotification();
    });

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterSellers(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (!allSellers || allSellers.length === 0) {
            renderEmptyState('No sellers found in the database.');
            return;
        }

        let filteredSellers = [];
        if (filter === 'pending') {
            filteredSellers = allSellers.filter(s => s.is_verified === 0);
        } else if (filter === 'verified') {
            filteredSellers = allSellers.filter(s => s.is_verified === 1);
        } else if (filter === 'rejected') {
            filteredSellers = allSellers.filter(s => s.is_verified === 2);
        }

        if (filteredSellers.length === 0) {
            let message = '';
            if (filter === 'pending') {
                message = 'No pending seller applications.';
            } else if (filter === 'verified') {
                message = 'No verified sellers yet.';
            } else if (filter === 'rejected') {
                message = 'No rejected applications.';
            }
            renderEmptyState(message);
        } else {
            renderSellers(filteredSellers);
        }
    }

    function renderEmptyState(message) {
        sellersList.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/verified-empty.svg" alt="No sellers" class="empty-state-icon">
                    <h2>${message}</h2>
                    <p class="empty-state-hint">When users apply to become sellers, they will appear here for verification.</p>
                </div>
            </div>
        `;
    }

    function renderSellers(sellers) {
        let html = '<div class="sellers-grid">';

        sellers.forEach(seller => {
            const createdDate = seller.created_at ? new Date(seller.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : 'N/A';

            const statusBadge = seller.is_verified === 0 ? 'pending' : 
                               seller.is_verified === 1 ? 'verified' : 'rejected';
            const statusText = seller.is_verified === 0 ? 'Pending' : 
                              seller.is_verified === 1 ? 'Verified' : 'Rejected';

            const fullName = (seller.first_name && seller.first_name !== 'Unknown' ? seller.first_name : '') + 
                            (seller.last_name && seller.last_name !== 'User' ? ' ' + seller.last_name : '');
            
            const displayName = fullName.trim() || 'Unknown User';

            html += `
                <div class="seller-card" data-id="${seller.seller_id}">
                    <div class="seller-header">
                        <h3>${escapeHtml(seller.business_name)}</h3>
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </div>
                    <div class="seller-body">
                        <p><strong>Name:</strong> ${escapeHtml(displayName)}</p>
                        <p><strong>Email:</strong> ${escapeHtml(seller.email)}</p>
                        <p><strong>Contact:</strong> ${escapeHtml(seller.contact_number)}</p>
                        <p><strong>Applied:</strong> ${createdDate}</p>
                    </div>
            `;

            if (seller.is_verified === 0) {
                html += `
                    <div class="seller-actions">
                        <button class="btn-verify" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/verified-filled.svg" alt="Verify" class="btn-icon">
                            Verify
                        </button>
                        <button class="btn-reject" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                            Reject
                        </button>
                    </div>
                `;
            } else {
                html += `
                    <div class="seller-actions">
                        <span class="status-message">Already ${statusText.toLowerCase()}</span>
                    </div>
                `;
            }

            html += '</div>';
        });

        html += '</div>';
        sellersList.innerHTML = html;
        attachEventListeners();
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-verify').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'verify');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'reject');
            });
        });
    }

    async function handleVerification(sellerId, action) {
        // Disable button to prevent double submission
        const buttons = document.querySelectorAll(`.btn-${action}[data-id="${sellerId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Processing...';
            btn.dataset.originalText = originalText;
        });

        try {
            const formData = new URLSearchParams();
            formData.append('action', action);
            formData.append('seller_id', sellerId);

            const response = await fetch('../database/admin-auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification(result.message);
                await loadSellers(); // Reload the list
            } else {
                showNotification(result.message || 'Action failed', true);
                // Re-enable buttons
                buttons.forEach(btn => {
                    btn.disabled = false;
                    btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
                });
            }
        } catch (error) {
            console.error('Verification error:', error);
            showNotification('Network error. Please try again.', true);
            // Re-enable buttons
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
            });
        }
    }

    async function loadSellers() {
        sellersList.innerHTML = '<div class="loading">Loading sellers...</div>';

        try {
            const response = await fetch('../database/admin-auth-handler.php?action=get_all_sellers');
            const result = await response.json();

            if (result.status === 'success') {
                allSellers = result.data || [];
                if (allSellers.length === 0) {
                    renderEmptyState('No sellers found in the database.');
                } else {
                    filterSellers(currentFilter);
                }
            } else {
                sellersList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-content">
                            <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                            <h2>Error Loading Sellers</h2>
                            <p>${result.message || 'Failed to load sellers.'}</p>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading sellers:', error);
            sellersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                        <h2>Network Error</h2>
                        <p>Please check your connection and try again.</p>
                    </div>
                </div>
            `;
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterSellers(filter);
        });
    });

    // Initial load
    loadSellers();
});
```

---

