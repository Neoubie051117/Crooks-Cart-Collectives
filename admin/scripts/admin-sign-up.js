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

    // ===== FIXED: Simple username validation - only length check =====
    function validateUsername(username) {
        if (username.length < 3) {
            return { valid: false, message: 'Username must be at least 3 characters long.' };
        }
        if (username.length > 20) {
            return { valid: false, message: 'Username cannot exceed 20 characters.' };
        }
        // NO character restrictions - any username is allowed
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

    // ===== FIXED: Username validation - only length check =====
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
    
    // ===== FIXED: Username input handler - preserve exactly what user types =====
    usernameField.addEventListener('input', () => {
        // Store cursor position
        const start = usernameField.selectionStart;
        const end = usernameField.selectionEnd;
        
        // Do NOT modify the username - keep exactly as typed
        highlightField(usernameField, false);
        usernameError.textContent = '';
        
        // Restore cursor position
        usernameField.setSelectionRange(start, end);
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

    // ============= FORM SUBMISSION =============
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
        
        // ===== FIXED: Simple username validation - only length =====
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
        
        // IMPORTANT: Do NOT modify username - send exactly as entered
        // Username is already in formData from the form
        
        // Submit form
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        try {
            const response = await fetch('../database/admin-sign-up-handler.php', {
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