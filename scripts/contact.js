/* ============================================
   CONTACT PAGE JAVASCRIPT
   Handles form validation, submission, and UI interactions
============================================ */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const contactForm = document.getElementById('contactForm');
    const modal = document.getElementById('notificationModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalCloseBtn = document.getElementById('modalCloseBtn');
    const successMessage = document.getElementById('formSuccessMessage');
    
    // Form Fields
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('emailAddress');
    const studentIdInput = document.getElementById('studentId');
    const subjectSelect = document.getElementById('inquirySubject');
    const messageInput = document.getElementById('inquiryMessage');

    // State
    let isSubmitting = false;

    // ===== HELPER FUNCTIONS =====

    /**
     * Shows a notification modal with the given message
     * @param {string} message - The message to display
     */
    function showNotification(message) {
        if (!modal || !modalMessage) return;
        
        modalMessage.textContent = message;
        modal.classList.remove('modal--hidden');
    }

    /**
     * Closes the notification modal
     */
    function closeNotification() {
        if (modal) {
            modal.classList.add('modal--hidden');
        }
    }

    /**
     * Validates email format
     * @param {string} email - The email to validate
     * @returns {boolean} - True if email is valid
     */
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    /**
     * Validates phone number (optional field)
     * @param {string} phone - The phone number to validate
     * @returns {boolean} - True if phone is valid or empty
     */
    function isValidPhone(phone) {
        if (!phone) return true;
        const cleaned = phone.replace(/\D/g, '');
        return cleaned.length === 11 && cleaned.startsWith('09') ||
               cleaned.length === 12 && cleaned.startsWith('63') ||
               cleaned.length === 13 && cleaned.startsWith('+63');
    }

    /**
     * Shows error message for a specific field
     * @param {string} fieldId - The ID of the field
     * @param {string} message - The error message
     */
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + 'Error');
        
        if (field && errorElement) {
            field.classList.add('error');
            errorElement.textContent = message;
            errorElement.setAttribute('aria-live', 'polite');
        }
    }

    /**
     * Clears error for a specific field
     * @param {string} fieldId - The ID of the field
     */
    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + 'Error');
        
        if (field && errorElement) {
            field.classList.remove('error');
            errorElement.textContent = '';
        }
    }

    /**
     * Clears all field errors
     */
    function clearAllErrors() {
        ['fullName', 'emailAddress', 'inquirySubject', 'inquiryMessage'].forEach(fieldId => {
            clearFieldError(fieldId);
        });
    }

    // ===== EVENT LISTENERS =====

    // Modal close button
    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeNotification);
    }

    // Close modal when clicking outside
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeNotification();
        });
    }

    // Real-time validation on blur
    if (fullNameInput) {
        fullNameInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('fullName', 'Name is required');
            } else {
                clearFieldError('fullName');
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('emailAddress', 'Email is required');
            } else if (!isValidEmail(this.value)) {
                showFieldError('emailAddress', 'Please enter a valid email address');
            } else {
                clearFieldError('emailAddress');
            }
        });
    }

    if (subjectSelect) {
        subjectSelect.addEventListener('blur', function() {
            if (!this.value) {
                showFieldError('inquirySubject', 'Please select a subject');
            } else {
                clearFieldError('inquirySubject');
            }
        });
    }

    if (messageInput) {
        messageInput.addEventListener('blur', function() {
            if (!this.value.trim()) {
                showFieldError('inquiryMessage', 'Message is required');
            } else if (this.value.trim().length < 10) {
                showFieldError('inquiryMessage', 'Message must be at least 10 characters');
            } else {
                clearFieldError('inquiryMessage');
            }
        });
    }

    // Auto-expand textarea
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
            
            // Clear error on input
            if (this.value.trim().length >= 10) {
                clearFieldError('inquiryMessage');
            }
        });
    }

    // ===== FORM SUBMISSION =====
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            clearAllErrors();
            
            // Validate all fields
            let isValid = true;
            
            // Name validation
            if (!fullNameInput.value.trim()) {
                showFieldError('fullName', 'Name is required');
                isValid = false;
            }
            
            // Email validation
            if (!emailInput.value.trim()) {
                showFieldError('emailAddress', 'Email is required');
                isValid = false;
            } else if (!isValidEmail(emailInput.value)) {
                showFieldError('emailAddress', 'Please enter a valid email address');
                isValid = false;
            }
            
            // Subject validation
            if (!subjectSelect.value) {
                showFieldError('inquirySubject', 'Please select a subject');
                isValid = false;
            }
            
            // Message validation
            if (!messageInput.value.trim()) {
                showFieldError('inquiryMessage', 'Message is required');
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                showFieldError('inquiryMessage', 'Message must be at least 10 characters');
                isValid = false;
            }
            
            if (!isValid) {
                showNotification('Please fix the errors in the form');
                return;
            }
            
            // Show loading state
            isSubmitting = true;
            const submitBtn = contactForm.querySelector('.contact-form__submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            try {
                // Simulate form submission (replace with actual API endpoint)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Show success message
                if (successMessage) {
                    successMessage.style.display = 'block';
                }
                
                // Reset form
                contactForm.reset();
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    if (successMessage) {
                        successMessage.style.display = 'none';
                    }
                }, 5000);
                
            } catch (error) {
                console.error('Contact form error:', error);
                showNotification('Network error. Please try again later.');
            } finally {
                // Reset button
                isSubmitting = false;
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }
});