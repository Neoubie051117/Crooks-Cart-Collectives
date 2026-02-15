// Contact Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    let isSubmitting = false;

    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                if (value.startsWith('63') && value.length === 12) {
                    e.target.value = '+63' + value.substring(2, 5) + ' ' +
                        value.substring(5, 8) + ' ' +
                        value.substring(8, 12);
                } else if (value.startsWith('09') && value.length === 11) {
                    e.target.value = value.substring(0, 4) + ' ' +
                        value.substring(4, 7) + ' ' +
                        value.substring(7, 11);
                }
            }
        });
    }

    // Validation functions
    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validatePhone(phone) {
        if (!phone) return true; // Phone is optional
        const cleaned = phone.replace(/\D/g, '');
        return cleaned.length === 11 && cleaned.startsWith('09') ||
               cleaned.length === 12 && cleaned.startsWith('63') ||
               cleaned.length === 13 && cleaned.startsWith('+63');
    }

    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorEl = document.getElementById(fieldId + 'Error');
        
        if (field && errorEl) {
            field.classList.add('error');
            errorEl.textContent = message;
            errorEl.classList.add('show');
        }
    }

    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorEl = document.getElementById(fieldId + 'Error');
        
        if (field && errorEl) {
            field.classList.remove('error');
            errorEl.textContent = '';
            errorEl.classList.remove('show');
        }
    }

    function clearAllErrors() {
        ['name', 'email', 'phone', 'subject', 'message', 'privacy'].forEach(field => {
            clearFieldError(field);
        });
    }

    function showNotifier(message) {
        modalMessage.textContent = message;
        modal.classList.remove('hidden');
    }

    function closeNotifier() {
        modal.classList.add('hidden');
    }

    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // Real-time validation on blur
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const subjectSelect = document.getElementById('subject');
    const messageInput = document.getElementById('message');
    const privacyCheck = document.querySelector('input[name="privacy"]');

    if (nameInput) {
        nameInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('name', 'Name is required');
            } else {
                clearFieldError('name');
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('email', 'Email is required');
            } else if (!validateEmail(this.value)) {
                showFieldError('email', 'Please enter a valid email address');
            } else {
                clearFieldError('email');
            }
        });
    }

    if (phoneInput) {
        phoneInput.addEventListener('blur', function() {
            if (this.value.trim() && !validatePhone(this.value)) {
                showFieldError('phone', 'Please enter a valid Philippine number');
            } else {
                clearFieldError('phone');
            }
        });
    }

    if (subjectSelect) {
        subjectSelect.addEventListener('blur', function() {
            if (!this.value) {
                showFieldError('subject', 'Please select a subject');
            } else {
                clearFieldError('subject');
            }
        });
    }

    if (messageInput) {
        messageInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('message', 'Message is required');
            } else if (this.value.trim().length < 10) {
                showFieldError('message', 'Message must be at least 10 characters');
            } else {
                clearFieldError('message');
            }
        });
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            clearAllErrors();
            
            // Validate all fields
            let isValid = true;
            
            // Name validation
            if (!nameInput.value.trim()) {
                showFieldError('name', 'Name is required');
                isValid = false;
            }
            
            // Email validation
            if (!emailInput.value.trim()) {
                showFieldError('email', 'Email is required');
                isValid = false;
            } else if (!validateEmail(emailInput.value)) {
                showFieldError('email', 'Please enter a valid email address');
                isValid = false;
            }
            
            // Phone validation (optional)
            if (phoneInput.value.trim() && !validatePhone(phoneInput.value)) {
                showFieldError('phone', 'Please enter a valid Philippine number');
                isValid = false;
            }
            
            // Subject validation
            if (!subjectSelect.value) {
                showFieldError('subject', 'Please select a subject');
                isValid = false;
            }
            
            // Message validation
            if (!messageInput.value.trim()) {
                showFieldError('message', 'Message is required');
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                showFieldError('message', 'Message must be at least 10 characters');
                isValid = false;
            }
            
            // Privacy checkbox validation
            if (!privacyCheck.checked) {
                showFieldError('privacy', 'You must agree to the Privacy Policy');
                isValid = false;
            }
            
            if (!isValid) {
                showNotifier('Please fix the errors in the form');
                return;
            }
            
            // Show loading state
            isSubmitting = true;
            const submitBtn = form.querySelector('.btn-primary');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            try {
                // Simulate form submission (replace with actual API endpoint)
                // In a real implementation, you would send this to a contact-handler.php
                
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Show success message
                document.getElementById('successMessage').style.display = 'block';
                form.reset();
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'none';
                }, 5000);
                
            } catch (error) {
                console.error('Contact form error:', error);
                showNotifier('Network error. Please try again later.');
            } finally {
                // Reset button
                isSubmitting = false;
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }

    // Auto-expand textarea
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});