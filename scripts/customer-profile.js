// customer-profile.js - Fixed with birthdate validation

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Get ALL editable fields in Personal Info section
    const editableInputs = document.querySelectorAll(
        '.personal-info-section input:not([type="hidden"]):not([type="file"]), ' +
        '.personal-info-section select, ' +
        '.personal-info-section textarea'
    );
    
    const profilePicUpload = document.getElementById('profilePictureUpload');
    const chooseButtonContainer = document.getElementById('chooseButtonContainer');
    const triggerFileUpload = document.getElementById('triggerFileUpload');
    const profilePicInput = document.getElementById('profile_picture');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const addressInput = document.getElementById('address');
    const birthdateInput = document.getElementById('birthdate');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== BIRTHDATE VALIDATION FUNCTIONS =====
    function calculateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function isValidAge(birthdate) {
        if (!birthdate) return false;
        
        const age = calculateAge(birthdate);
        return age >= 13 && age <= 120;
    }

    function validateBirthdate(birthdate) {
        if (!birthdate) {
            return { valid: false, message: 'Birthdate is required.' };
        }
        
        const age = calculateAge(birthdate);
        
        if (age < 13) {
            return { valid: false, message: 'You must be at least 13 years old.' };
        }
        
        if (age > 120) {
            return { valid: false, message: 'Please enter a valid birthdate.' };
        }
        
        return { valid: true, message: '' };
    }

    function highlightField(field, isValid) {
        if (!field) return;
        
        if (!isValid) {
            field.style.borderColor = '#FF8246';
            field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
        }
    }

    // Modal functions
    function showModal(message) {
        modalMessage.textContent = message;
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

    // Store original values
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

    // Enable edit mode
    function enableEditMode() {
        isEditMode = true;
        editBtn.textContent = 'Cancel';
        saveBtn.disabled = false;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'block';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'flex';
        }
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        pictureChanged = false;
        
        // Clear any existing validation highlights
        if (birthdateInput) {
            highlightField(birthdateInput, true);
        }
    }

    // Disable edit mode
    function disableEditMode(restore = true) {
        isEditMode = false;
        editBtn.textContent = 'Edit';
        saveBtn.disabled = true;
        if (profilePicUpload) {
            profilePicUpload.style.display = 'none';
        }
        if (chooseButtonContainer) {
            chooseButtonContainer.style.display = 'none';
        }
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.textContent = '';
        }
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
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
        
        // Clear validation highlights
        if (birthdateInput) {
            highlightField(birthdateInput, true);
        }
        
        pictureChanged = false;
    }

    // Trigger file upload from the Choose button
    if (triggerFileUpload && profilePicInput) {
        triggerFileUpload.addEventListener('click', function() {
            profilePicInput.click();
        });
    }

    // File input change
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = file.name;
                }
                pictureChanged = true;
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (profilePicPreview) {
                        profilePicPreview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = '';
                }
                pictureChanged = false;
            }
        });
    }

    // Real-time birthdate validation when in edit mode
    if (birthdateInput) {
        birthdateInput.addEventListener('input', function() {
            if (!isEditMode) return;
            
            const validation = validateBirthdate(this.value);
            highlightField(this, validation.valid);
        });
        
        birthdateInput.addEventListener('blur', function() {
            if (!isEditMode) return;
            
            if (this.value) {
                const validation = validateBirthdate(this.value);
                highlightField(this, validation.valid);
            }
        });
    }

    // Edit/Cancel button
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            if (!isEditMode) {
                storeOriginalValues();
                enableEditMode();
            } else {
                disableEditMode(true);
            }
        });
    }

    // Save button
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const address = addressInput ? addressInput.value.trim() : '';
            const birthdate = birthdateInput ? birthdateInput.value : '';

            if (!firstName || !lastName || !address) {
                showModal('First name, last name, and address are required.');
                return;
            }

            // Validate birthdate
            if (birthdate) {
                const validation = validateBirthdate(birthdate);
                if (!validation.valid) {
                    highlightField(birthdateInput, false);
                    showModal(validation.message);
                    return;
                }
            } else {
                highlightField(birthdateInput, false);
                showModal('Birthdate is required.');
                return;
            }

            // Disable button and store original text
            saveBtn.disabled = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/customer-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    // 1 second delay before handling UI updates
                    setTimeout(() => {
                        if (!pictureChanged) {
                            // Update the displayed full name (profile stack container)
                            const nameSpan = document.querySelector('.display-full-name');
                            if (nameSpan && result.data) {
                                nameSpan.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                            }
                            // Store new values as original for future cancels
                            storeOriginalValues();
                            // Exit edit mode without restoring old values
                            disableEditMode(false);
                        } else {
                            // Picture changed – force a full page reload after 1 second
                            window.location.reload(true);
                        }
                        // Reset save button text (already disabled by disableEditMode)
                        saveBtn.textContent = originalText;
                    }, 1000);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.');
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.');
                saveBtn.disabled = false;
                saveBtn.textContent = originalText;
            }
        });
    }

    // Prevent invalid date entry (optional - adds additional keyboard validation)
    if (birthdateInput) {
        birthdateInput.addEventListener('keydown', function(e) {
            // Allow navigation keys, backspace, delete, tab
            const allowedKeys = ['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Backspace', 'Delete', 'Tab', 'Home', 'End'];
            
            if (allowedKeys.includes(e.key)) {
                return;
            }
            
            // Prevent entering letters in date field (browser usually handles this, but just in case)
            if (e.key.length === 1 && !/[0-9-]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    // Initial store
    storeOriginalValues();
});