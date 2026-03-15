// customer-profile.js - Updated with proper address list support

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Get ALL editable fields in Personal Info and Address sections
    const editableInputs = document.querySelectorAll(
        '.personal-info-section input:not([type="hidden"]):not([type="file"]), ' +
        '.personal-info-section select, ' +
        '.address-info-section input:not([type="hidden"]), ' +
        '.address-info-section select'
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
    const birthdateInput = document.getElementById('birthdate');
    
    // Address fields
    const blockInput = document.getElementById('block');
    const barangayInput = document.getElementById('barangay');
    const cityInput = document.getElementById('city');
    const provinceInput = document.getElementById('province');
    const regionInput = document.getElementById('region');
    const postalCodeInput = document.getElementById('postal_code');
    const countrySelect = document.getElementById('country');
    const addressIdInput = document.querySelector('input[name="address_id"]');

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

    // ===== COUNTRY-SPECIFIC VALIDATION =====
    function updateAddressValidation() {
        if (!countrySelect) return;
        
        const isPhilippines = countrySelect.value === 'Philippines';
        
        // Update required status based on country
        if (barangayInput) {
            barangayInput.required = isPhilippines;
            // Update placeholder for visual feedback
            barangayInput.placeholder = isPhilippines ? 'San Miguel' : '(Optional)';
        }
        if (provinceInput) {
            provinceInput.required = isPhilippines;
            provinceInput.placeholder = isPhilippines ? 'Metro Manila' : '(Optional)';
        }
        if (regionInput) {
            regionInput.required = isPhilippines;
            regionInput.placeholder = isPhilippines ? 'NCR' : '(Optional)';
        }
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

    function clearFieldHighlights() {
        [firstNameInput, lastNameInput, birthdateInput, blockInput, 
         barangayInput, cityInput, provinceInput, regionInput, postalCodeInput, countrySelect].forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });
    }

    // Modal functions
    function showModal(message) {
        if (!modal || !modalMessage) return;
        modalMessage.textContent = message;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function hideModal() {
        if (!modal) return;
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            hideModal();
        }
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
        
        // Update address validation based on current country
        updateAddressValidation();
        
        // Clear any existing validation highlights
        clearFieldHighlights();
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
        
        clearFieldHighlights();
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
                
                // Enable save button
                saveBtn.disabled = false;
            } else {
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = '';
                }
                pictureChanged = false;
            }
        });
    }

    // Country change handler
    if (countrySelect) {
        countrySelect.addEventListener('change', function() {
            if (isEditMode) {
                updateAddressValidation();
                // Mark form as changed
                saveBtn.disabled = false;
            }
        });
    }

    // Real-time birthdate validation when in edit mode
    if (birthdateInput) {
        birthdateInput.addEventListener('input', function() {
            if (!isEditMode) return;
            const validation = validateBirthdate(this.value);
            highlightField(this, validation.valid);
            if (validation.valid) {
                saveBtn.disabled = false;
            }
        });
        
        birthdateInput.addEventListener('blur', function() {
            if (!isEditMode) return;
            if (this.value) {
                const validation = validateBirthdate(this.value);
                highlightField(this, validation.valid);
            }
        });
    }

    // Track changes on all inputs
    editableInputs.forEach(input => {
        input.addEventListener('input', function() {
            if (isEditMode) {
                saveBtn.disabled = false;
            }
        });
        input.addEventListener('change', function() {
            if (isEditMode) {
                saveBtn.disabled = false;
            }
        });
    });

    // Postal code validation
    if (postalCodeInput) {
        postalCodeInput.addEventListener('input', function() {
            if (!isEditMode) return;
            this.value = this.value.replace(/[^0-9]/g, '');
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
            const birthdate = birthdateInput ? birthdateInput.value : '';
            const block = blockInput ? blockInput.value.trim() : '';
            const city = cityInput ? cityInput.value.trim() : '';
            const postalCode = postalCodeInput ? postalCodeInput.value.trim() : '';

            if (!firstName || !lastName) {
                showModal('First name and last name are required.');
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

            // Validate address fields
            if (!block) {
                highlightField(blockInput, false);
                showModal('Block/Street/House number is required.');
                return;
            }
            
            if (!city) {
                highlightField(cityInput, false);
                showModal('City is required.');
                return;
            }
            
            if (!postalCode) {
                highlightField(postalCodeInput, false);
                showModal('Postal code is required.');
                return;
            }
            
            // Country-specific validation
            const isPhilippines = countrySelect.value === 'Philippines';
            if (isPhilippines) {
                if (!barangayInput.value.trim()) {
                    highlightField(barangayInput, false);
                    showModal('Barangay is required for Philippines.');
                    return;
                }
                if (!provinceInput.value.trim()) {
                    highlightField(provinceInput, false);
                    showModal('Province is required for Philippines.');
                    return;
                }
                if (!regionInput.value.trim()) {
                    highlightField(regionInput, false);
                    showModal('Region is required for Philippines.');
                    return;
                }
            }

            // Disable button and store original text
            saveBtn.disabled = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData(profileForm);

            try {
                // Determine correct API path
                const currentPath = window.location.pathname;
                let apiPath = '../database/customer-profile-handler.php';
                
                if (!currentPath.includes('/pages/')) {
                    apiPath = 'database/customer-profile-handler.php';
                }

                const response = await fetch(apiPath, {
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
                        if (!pictureChanged) {
                            // Update the displayed full name
                            const nameSpan = document.querySelector('.display-full-name');
                            if (nameSpan && result.data) {
                                const fullName = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                                nameSpan.textContent = fullName.trim() || 'User';
                            }
                            
                            // Update address fields with any changes from server
                            if (result.data) {
                                if (blockInput) blockInput.value = result.data.block || '';
                                if (barangayInput) barangayInput.value = result.data.barangay || '';
                                if (cityInput) cityInput.value = result.data.city || '';
                                if (provinceInput) provinceInput.value = result.data.province || '';
                                if (regionInput) regionInput.value = result.data.region || '';
                                if (postalCodeInput) postalCodeInput.value = result.data.postal_code || '';
                                if (countrySelect) countrySelect.value = result.data.country || 'Philippines';
                            }
                            
                            storeOriginalValues();
                            disableEditMode(false);
                        } else {
                            window.location.reload();
                        }
                        saveBtn.textContent = originalText;
                    }, 1500);
                    
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

    // Initial store and validation setup
    storeOriginalValues();
    updateAddressValidation();
    
    console.log('Customer profile JS initialized');
});