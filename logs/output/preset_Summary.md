# Web Project: Crooks-Cart-Collectives

**Preset:** preset

**Generated:** 2026-02-28 13:56:46

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

## File: `/logs/output/Project_Structure.md`

**Status:** `MISSING`

*[File not found]*

---

## File: `/index.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/schema/dbCreation.sql`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/schema/dummyAdmin.sql`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/schema/dummySeller.sql`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/database-connect.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/sign-in-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/sign-out-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/sign-up-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/customer-profile-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/product-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/cart-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/checkout-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/order-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/review-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/report-seller-handler.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/validation.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/database/error_log.txt`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/header.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/footer.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/about.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/contact.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/privacy-policy.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/terms-and-conditions.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/sign-in.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/sign-up.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/cart.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/checkout.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/products.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/product-details.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/report-seller.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/orders.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/customer-dashboard.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/customer-profile.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/seller-dashboard.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/seller-fill-form.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/seller-add-product.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/seller-products.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/pages/seller-orders.php`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/index.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/header.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/contact.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/sign-in.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/sign-out.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/sign-up.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/central-link-navigation.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/error-handler.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/showcase-slider.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/product-details.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/report-seller.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/checkout.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/orders.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/seller-orders.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/scripts/seller-dashboard.js`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/about.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/cart.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/checkout.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/contact.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/customer-dashboard.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/footer.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/header.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/index.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/orders.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/privacy-policy.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/product-details.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/products.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/profile.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/report-seller.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/seller-orders.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/seller-registration.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/seller-dashboard.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/sign-in.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/sign-out.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/sign-up.css`

**Status:** `MISSING`

*[File not found]*

---

## File: `/styles/terms-and-conditions.css`

**Status:** `MISSING`

*[File not found]*

---

