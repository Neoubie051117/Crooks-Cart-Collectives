document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const form = document.getElementById('signupForm');
    const clearButton = document.getElementById('clearForm');
    const submitButton = form.querySelector('.btn-primary');
    
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    // Form fields - Personal Information
    const firstNameField = document.getElementById('first_name');
    const middleNameField = document.getElementById('middle_name');
    const lastNameField = document.getElementById('last_name');
    const birthdateField = document.getElementById('birthdate');
    const genderField = document.getElementById('gender');
    
    // Form fields - Account Information
    const contactField = document.getElementById('contact_number');
    const emailField = document.getElementById('email');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    
    // Form fields - Address Information
    const blockField = document.getElementById('block');
    const barangayField = document.getElementById('barangay');
    const cityField = document.getElementById('city');
    const provinceField = document.getElementById('province');
    const regionField = document.getElementById('region');
    const postalCodeField = document.getElementById('postal_code');
    const countryField = document.getElementById('country');
    
    // Terms checkbox
    const termsCheckbox = document.getElementById('terms');
    
    // Error message elements
    const firstNameError = document.getElementById('firstNameError');
    const middleNameError = document.getElementById('middleNameError');
    const lastNameError = document.getElementById('lastNameError');
    const birthdateError = document.getElementById('birthdateError');
    const genderError = document.getElementById('genderError');
    const contactError = document.getElementById('contactError');
    const emailError = document.getElementById('emailError');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const confirmError = document.getElementById('confirmError');
    const blockError = document.getElementById('blockError');
    const barangayError = document.getElementById('barangayError');
    const cityError = document.getElementById('cityError');
    const provinceError = document.getElementById('provinceError');
    const regionError = document.getElementById('regionError');
    const postalCodeError = document.getElementById('postalCodeError');
    const countryError = document.getElementById('countryError');
    const termsError = document.getElementById('termsError');
    
    // Password toggle elements
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    // State
    let isModalOpen = false;
    let isSubmitting = false;
    let isFormatting = false;
    let hasInteracted = {}; // Track which fields have been interacted with

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
        form.querySelectorAll('input, select, textarea').forEach(field => highlightField(field, false));
        
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
        if (!/^[A-Za-z0-9_]+$/.test(username)) {
            return { valid: false, message: 'Username can only contain letters, numbers, and underscores.' };
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

    function validateAge(birthdate) {
        if (!birthdate) return { valid: false, reason: 'empty' };

        const today = new Date();
        const birthDate = new Date(birthdate);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    
        if (age < 13) return { valid: false, reason: 'too-young' };
        if (age > 120) return { valid: false, reason: 'too-old' };

        return { valid: true };
    }

    // ============= COUNTRY-SPECIFIC VALIDATION =============
    function updateAddressValidation() {
        const isPhilippines = countryField.value === 'Philippines';
        
        // Get label elements
        const barangayLabel = document.querySelector('label[for="barangay"]');
        const provinceLabel = document.querySelector('label[for="province"]');
        const regionLabel = document.querySelector('label[for="region"]');
        
        if (isPhilippines) {
            // Set required attributes
            barangayField.required = true;
            provinceField.required = true;
            regionField.required = true;
            
            // Update placeholders
            barangayField.placeholder = 'San Miguel';
            provinceField.placeholder = 'Metro Manila';
            regionField.placeholder = 'NCR';
            
            // Update labels with visual indicators
            if (barangayLabel) {
                barangayLabel.innerHTML = 'Barangay <span class="required-star"></span>';
            }
            if (provinceLabel) {
                provinceLabel.innerHTML = 'Province <span class="required-star"></span>';
            }
            if (regionLabel) {
                regionLabel.innerHTML = 'Region <span class="required-star"></span>';
            }
            
            // Validate on change if user has interacted
            if (hasInteracted[barangayField.id] && barangayField.value.trim() === '') {
                barangayError.textContent = 'Barangay is required for Philippines';
                highlightField(barangayField, true);
            } else if (!hasInteracted[barangayField.id]) {
                barangayError.textContent = '';
                highlightField(barangayField, false);
            }
            
            if (hasInteracted[provinceField.id] && provinceField.value.trim() === '') {
                provinceError.textContent = 'Province is required for Philippines';
                highlightField(provinceField, true);
            } else if (!hasInteracted[provinceField.id]) {
                provinceError.textContent = '';
                highlightField(provinceField, false);
            }
            
            if (hasInteracted[regionField.id] && regionField.value.trim() === '') {
                regionError.textContent = 'Region is required for Philippines';
                highlightField(regionField, true);
            } else if (!hasInteracted[regionField.id]) {
                regionError.textContent = '';
                highlightField(regionField, false);
            }
        } else {
            // Remove required attributes
            barangayField.required = false;
            provinceField.required = false;
            regionField.required = false;
            
            // Update placeholders
            barangayField.placeholder = '(Optional)';
            provinceField.placeholder = '(Optional)';
            regionField.placeholder = '(Optional)';
            
            // Update labels
            if (barangayLabel) {
                barangayLabel.innerHTML = 'Barangay <span class="optional">(Optional)</span>';
            }
            if (provinceLabel) {
                provinceLabel.innerHTML = 'Province <span class="optional">(Optional)</span>';
            }
            if (regionLabel) {
                regionLabel.innerHTML = 'Region <span class="optional">(Optional)</span>';
            }
            
            // Clear any existing error messages for these fields
            barangayError.textContent = '';
            provinceError.textContent = '';
            regionError.textContent = '';
            highlightField(barangayField, false);
            highlightField(provinceField, false);
            highlightField(regionField, false);
        }
    }

    // ============= PHONE NUMBER FORMATTING =============
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

    // ============= VALIDATION ON SUBMIT ONLY =============
    // The validateAllFieldsOnLoad function has been removed to prevent automatic validation on page load
    
    // ============= REAL-TIME VALIDATION - ONLY AFTER INTERACTION =============
    // Track field interaction
    function markInteracted(field) {
        if (field && field.id) {
            hasInteracted[field.id] = true;
        }
    }

    // Personal Information
    firstNameField.addEventListener('focus', () => markInteracted(firstNameField));
    firstNameField.addEventListener('blur', function() {
        if (hasInteracted[this.id] && !this.value.trim()) {
            firstNameError.textContent = 'First name is required';
            highlightField(this, true);
        } else {
            firstNameError.textContent = '';
            highlightField(this, false);
        }
    });

    lastNameField.addEventListener('focus', () => markInteracted(lastNameField));
    lastNameField.addEventListener('blur', function() {
        if (hasInteracted[this.id] && !this.value.trim()) {
            lastNameError.textContent = 'Last name is required';
            highlightField(this, true);
        } else {
            lastNameError.textContent = '';
            highlightField(this, false);
        }
    });

    birthdateField.addEventListener('focus', () => markInteracted(birthdateField));
    birthdateField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        if (!this.value) {
            birthdateError.textContent = 'Birthdate is required';
            highlightField(this, true);
        } else {
            const validation = validateAge(this.value);
            if (!validation.valid) {
                if (validation.reason === 'too-young') {
                    birthdateError.textContent = 'You must be at least 13 years old';
                } else if (validation.reason === 'too-old') {
                    birthdateError.textContent = 'Invalid birthdate';
                } else {
                    birthdateError.textContent = 'Invalid birthdate';
                }
                highlightField(this, true);
            } else {
                birthdateError.textContent = '';
                highlightField(this, false);
            }
        }
    });

    genderField.addEventListener('focus', () => markInteracted(genderField));
    genderField.addEventListener('blur', function() {
        if (hasInteracted[this.id] && !this.value) {
            genderError.textContent = 'Gender is required';
            highlightField(this, true);
        } else {
            genderError.textContent = '';
            highlightField(this, false);
        }
    });

    // Account Information
    emailField.addEventListener('focus', () => markInteracted(emailField));
    emailField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        if (!this.value.trim()) {
            emailError.textContent = 'Email is required';
            highlightField(this, true);
        } else if (!isEmailValid(this.value)) {
            emailError.textContent = 'Please enter a valid email address';
            highlightField(this, true);
        } else {
            emailError.textContent = '';
            highlightField(this, false);
        }
    });

    usernameField.addEventListener('focus', () => markInteracted(usernameField));
    usernameField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
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

    passwordField.addEventListener('focus', () => markInteracted(passwordField));
    passwordField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
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

    confirmPasswordField.addEventListener('focus', () => markInteracted(confirmPasswordField));
    confirmPasswordField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
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

    // Address Information with conditional validation
    blockField.addEventListener('focus', () => markInteracted(blockField));
    blockField.addEventListener('blur', function() {
        if (hasInteracted[this.id] && !this.value.trim()) {
            blockError.textContent = 'Block/Street/House number is required';
            highlightField(this, true);
        } else {
            blockError.textContent = '';
            highlightField(this, false);
        }
    });

    cityField.addEventListener('focus', () => markInteracted(cityField));
    cityField.addEventListener('blur', function() {
        if (hasInteracted[this.id] && !this.value.trim()) {
            cityError.textContent = 'City/Municipality is required';
            highlightField(this, true);
        } else {
            cityError.textContent = '';
            highlightField(this, false);
        }
    });

    postalCodeField.addEventListener('focus', () => markInteracted(postalCodeField));
    postalCodeField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        if (!this.value.trim()) {
            postalCodeError.textContent = 'Postal code is required';
            highlightField(this, true);
        } else if (!/^[0-9]{4,10}$/.test(this.value)) {
            postalCodeError.textContent = 'Postal code must contain only numbers';
            highlightField(this, true);
        } else {
            postalCodeError.textContent = '';
            highlightField(this, false);
        }
    });

    countryField.addEventListener('focus', () => markInteracted(countryField));
    countryField.addEventListener('change', function() {
        markInteracted(this);
        if (!this.value) {
            countryError.textContent = 'Country is required';
            highlightField(this, true);
        } else {
            countryError.textContent = '';
            highlightField(this, false);
        }
        updateAddressValidation();
    });

    // Conditional validation for barangay and province based on country
    barangayField.addEventListener('focus', () => markInteracted(barangayField));
    barangayField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        const isPhilippines = countryField.value === 'Philippines';
        if (isPhilippines && !this.value.trim()) {
            barangayError.textContent = 'Barangay is required for Philippines';
            highlightField(this, true);
        } else {
            barangayError.textContent = '';
            highlightField(this, false);
        }
    });

    provinceField.addEventListener('focus', () => markInteracted(provinceField));
    provinceField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        const isPhilippines = countryField.value === 'Philippines';
        if (isPhilippines && !this.value.trim()) {
            provinceError.textContent = 'Province is required for Philippines';
            highlightField(this, true);
        } else {
            provinceError.textContent = '';
            highlightField(this, false);
        }
    });

    regionField.addEventListener('focus', () => markInteracted(regionField));
    regionField.addEventListener('blur', function() {
        if (!hasInteracted[this.id]) return;
        
        const isPhilippines = countryField.value === 'Philippines';
        if (isPhilippines && !this.value.trim()) {
            regionError.textContent = 'Region is required for Philippines';
            highlightField(this, true);
        } else {
            regionError.textContent = '';
            highlightField(this, false);
        }
    });

    // ============= INPUT EVENT LISTENERS =============
    if (contactField) {
        contactField.addEventListener('focus', () => markInteracted(contactField));
        contactField.addEventListener('input', function(e) {
            formatPhilippineNumber(this);
            
            if (contactError) {
                contactError.textContent = '';
            }
            highlightField(this, false);
        });

        contactField.addEventListener('blur', function() {
            if (!hasInteracted[this.id]) return;
            
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
    
    middleNameField.addEventListener('input', () => {
        highlightField(middleNameField, false);
        middleNameError.textContent = '';
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

    blockField.addEventListener('input', () => {
        highlightField(blockField, false);
        blockError.textContent = '';
    });
    
    barangayField.addEventListener('input', () => {
        highlightField(barangayField, false);
        barangayError.textContent = '';
    });
    
    cityField.addEventListener('input', () => {
        highlightField(cityField, false);
        cityError.textContent = '';
    });
    
    provinceField.addEventListener('input', () => {
        highlightField(provinceField, false);
        provinceError.textContent = '';
    });
    
    regionField.addEventListener('input', () => {
        highlightField(regionField, false);
        regionError.textContent = '';
    });
    
    postalCodeField.addEventListener('input', () => {
        highlightField(postalCodeField, false);
        postalCodeError.textContent = '';
    });

    // Initialize address validation on page load
    updateAddressValidation();

    // ============= NO AUTOMATIC VALIDATION ON PAGE LOAD =============
    // The setTimeout calling validateAllFieldsOnLoad has been removed

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        // Check required fields with conditional validation
        let hasErrors = false;
        const isPhilippines = countryField.value === 'Philippines';
        
        // Personal Information
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
        
        if (!birthdateField.value) {
            birthdateError.textContent = 'Birthdate is required';
            highlightField(birthdateField, true);
            hasErrors = true;
        } else {
            const ageValidation = validateAge(birthdateField.value);
            if (!ageValidation.valid) {
                if (ageValidation.reason === 'too-young') {
                    birthdateError.textContent = 'You must be at least 13 years old';
                } else if (ageValidation.reason === 'too-old') {
                    birthdateError.textContent = 'Invalid Birthday';
                } else {
                    birthdateError.textContent = 'Invalid Birthdate';
                }
                highlightField(birthdateField, true);
                hasErrors = true;
            } else {
                birthdateError.textContent = '';
                highlightField(birthdateField, false);
            }
        }
        
        if (!genderField.value) {
            genderError.textContent = 'Gender is required';
            highlightField(genderField, true);
            hasErrors = true;
        }
        
        // Account Information
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
        
        // Address Information with conditional validation
        if (!blockField.value.trim()) {
            blockError.textContent = 'Block/Street/House number is required';
            highlightField(blockField, true);
            hasErrors = true;
        }
        
        if (isPhilippines && !barangayField.value.trim()) {
            barangayError.textContent = 'Barangay is required for Philippines';
            highlightField(barangayField, true);
            hasErrors = true;
        }
        
        if (!cityField.value.trim()) {
            cityError.textContent = 'City/Municipality is required';
            highlightField(cityField, true);
            hasErrors = true;
        }
        
        if (isPhilippines && !provinceField.value.trim()) {
            provinceError.textContent = 'Province is required for Philippines';
            highlightField(provinceField, true);
            hasErrors = true;
        }
        
        if (isPhilippines && !regionField.value.trim()) {
            regionError.textContent = 'Region is required for Philippines';
            highlightField(regionField, true);
            hasErrors = true;
        }
        
        if (!postalCodeField.value.trim()) {
            postalCodeError.textContent = 'Postal code is required';
            highlightField(postalCodeField, true);
            hasErrors = true;
        } else if (!/^[0-9]{4,10}$/.test(postalCodeField.value)) {
            postalCodeError.textContent = 'Postal code must contain only numbers';
            highlightField(postalCodeField, true);
            hasErrors = true;
        }
        
        if (!countryField.value) {
            countryError.textContent = 'Country is required';
            highlightField(countryField, true);
            hasErrors = true;
        }
        
        if (!termsCheckbox.checked) {
            termsError.textContent = 'You must agree to the Terms and Conditions';
            hasErrors = true;
        }
        
        if (hasErrors) {
            // Show error modal only if there are validation errors
            showNotifier('Check and update Invalid Inputs.');
            return;
        }
        
        // Prepare form data
        const formData = new FormData(form);
        
        // Normalize phone number for storage
        const normalizedPhone = normalizePhoneForStorage(contactField.value);
        formData.set('contact_number', normalizedPhone);
        
        // For non-Philippines addresses, set empty strings for optional fields
        if (!isPhilippines) {
            if (!barangayField.value.trim()) formData.set('barangay', '');
            if (!provinceField.value.trim()) formData.set('province', '');
            if (!regionField.value.trim()) formData.set('region', '');
        }
        
        // Submit form
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        try {
            const response = await fetch('../database/sign-up-handler.php', {
                method: 'POST',
                body: formData
            });
            
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
                showNotifier(result.message || 'Account created successfully! Redirecting to sign in...');
                setTimeout(() => {
                    window.location.href = result.redirect || 'sign-in.php';
                }, 3000);
            } else {
                console.error('Signup error details:', result);
                
                // Handle specific error messages and highlight the appropriate fields
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
                } else if (result.message === 'username-invalid') {
                    usernameError.textContent = 'Username contains invalid characters';
                    highlightField(usernameField, true);
                    showNotifier('Username can only contain letters, numbers, and underscores.');
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
                } else if (result.message === 'age-restriction') {
                    birthdateError.textContent = 'Must be at least 13 years old';
                    highlightField(birthdateField, true);
                    showNotifier('You must be at least 13 years old to register.');
                } else if (result.message === 'missing-field') {
                    // Check which fields might be missing and highlight them
                    // This is handled by the validation above
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
            updateAddressValidation(); // Re-apply conditional validation
            // Reset interaction tracking
            hasInteracted = {};
            // No validation after clearing
        });
    }

    // ============= INITIAL FOCUS =============
    setTimeout(() => {
        firstNameField.focus();
    }, 100);
});