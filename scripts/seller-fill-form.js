/* Crooks-Cart-Collectives/scripts/seller-fill-form.js */
/* Fixed: Birthdate validation only triggers on save, not on input/change; custom unsaved changes modal */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const form = document.getElementById('sellerFillForm');
    const saveBtn = document.getElementById('saveSellerBtn');
    const backCancelBtn = document.getElementById('backCancelBtn');
    
    // Get all required fields (excluding middle_name which is optional)
    const requiredFields = [
        document.getElementById('first_name'),
        document.getElementById('last_name'),
        document.getElementById('birthdate'),
        document.getElementById('gender'),
        document.getElementById('address'),
        document.getElementById('business_name')
    ];
    
    // Optional field (middle name)
    const middleNameField = document.getElementById('middle_name');
    
    // File inputs
    const identityPhoto = document.getElementById('identity_photo');
    const idDocument = document.getElementById('id_document');
    
    // Preview elements
    const identityPreview = document.getElementById('identityPreview');
    const idDocumentPreview = document.getElementById('idDocumentPreview');
    const identityFileName = document.getElementById('identityFileName');
    const idDocumentFileName = document.getElementById('idDocumentFileName');
    
    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalOkBtn = document.getElementById('modalOkBtn');
    
    // Unsaved Changes Modal - create it dynamically
    const unsavedModal = document.createElement('div');
    unsavedModal.id = 'unsavedChangesModal';
    unsavedModal.className = 'modal';
    unsavedModal.style.display = 'none';
    unsavedModal.innerHTML = `
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/edit.svg" alt="Unsaved changes">
            </div>
            <h3 class="modal-title">Unsaved Changes</h3>
            <p class="modal-message">You have unsaved changes. Do you want to continue editing or leave?</p>
            <div class="modal-actions">
                <button id="continueEditingBtn" class="modal-btn modal-btn-secondary">Continue Editing</button>
                <button id="confirmLeaveBtn" class="modal-btn modal-btn-primary">Leave</button>
            </div>
        </div>
    `;
    document.body.appendChild(unsavedModal);
    
    const continueEditingBtn = document.getElementById('continueEditingBtn');
    const confirmLeaveBtn = document.getElementById('confirmLeaveBtn');
    
    // Hidden field to check if user is already a seller
    const isSeller = document.querySelector('input[name="is_seller"]')?.value === '1';
    
    // ============= STATE =============
    let isSubmitting = false;
    let formChanged = false;
    let initialFormState = {}; // Store initial form values
    let pendingNavigationUrl = null; // URL to navigate to after unsaved changes decision
    let birthdateValid = true; // Track birthdate validity separately

    // ============= MODAL FUNCTIONS =============
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
    
    function showUnsavedModal(url) {
        pendingNavigationUrl = url;
        unsavedModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function hideUnsavedModal() {
        unsavedModal.style.display = 'none';
        document.body.style.overflow = '';
        pendingNavigationUrl = null;
    }
    
    if (modalOkBtn) {
        modalOkBtn.addEventListener('click', hideModal);
    }
    
    if (continueEditingBtn) {
        continueEditingBtn.addEventListener('click', function() {
            hideUnsavedModal();
        });
    }
    
    if (confirmLeaveBtn) {
        confirmLeaveBtn.addEventListener('click', function() {
            if (pendingNavigationUrl) {
                window.location.href = pendingNavigationUrl;
            }
        });
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
        if (e.target === unsavedModal) hideUnsavedModal();
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            hideModal();
        }
        if (e.key === 'Escape' && unsavedModal && unsavedModal.style.display === 'flex') {
            hideUnsavedModal();
        }
    });
    
    // ============= CAPTURE INITIAL FORM STATE =============
    function captureInitialState() {
        requiredFields.forEach(field => {
            if (field) {
                if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                    initialFormState[field.id] = field.value || '';
                } else if (field.tagName === 'SELECT') {
                    initialFormState[field.id] = field.value || '';
                }
            }
        });
        
        if (middleNameField) {
            initialFormState[middleNameField.id] = middleNameField.value || '';
        }
    }
    
    // ============= CHECK IF FORM ACTUALLY CHANGED =============
    function hasFormChanged() {
        // Check required fields
        for (let field of requiredFields) {
            if (!field) continue;
            
            const currentValue = field.tagName === 'SELECT' ? field.value : field.value || '';
            const initialValue = initialFormState[field.id] || '';
            
            if (currentValue !== initialValue) {
                return true;
            }
        }
        
        // Check middle name
        if (middleNameField) {
            if ((middleNameField.value || '') !== (initialFormState[middleNameField.id] || '')) {
                return true;
            }
        }
        
        // Check file inputs (if they have files selected)
        if (identityPhoto && identityPhoto.files.length > 0) {
            return true;
        }
        if (idDocument && idDocument.files.length > 0) {
            return true;
        }
        
        return false;
    }
    
    // ============= FORM VALIDATION =============
    function validateForm() {
        // Check all required fields (excluding file inputs)
        for (let field of requiredFields) {
            if (!field) continue;
            
            // For text inputs, check value
            if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                if (!field.value || !field.value.trim()) {
                    return false;
                }
            }
            
            // For select elements
            if (field.tagName === 'SELECT') {
                if (!field.value) {
                    return false;
                }
            }
        }
        
        // Validate birthdate separately if needed
        if (!birthdateValid) {
            return false;
        }
        
        return true;
    }
    
    function highlightMissingFields() {
        // Remove any existing highlights
        requiredFields.forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });
        
        // Highlight missing required fields
        requiredFields.forEach(field => {
            if (!field) return;
            
            // Check if field is empty
            let isEmpty = false;
            if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                isEmpty = !field.value || !field.value.trim();
            } else if (field.tagName === 'SELECT') {
                isEmpty = !field.value;
            }
            
            if (isEmpty) {
                field.style.borderColor = '#FF8246';
                field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
            }
        });
        
        // Highlight birthdate if invalid
        const birthdateField = document.getElementById('birthdate');
        if (birthdateField && !birthdateValid) {
            birthdateField.style.borderColor = '#FF8246';
            birthdateField.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
        }
    }
    
    function clearHighlights() {
        requiredFields.forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });
    }
    
    // ============= UPDATE SAVE BUTTON STATE =============
    function updateSaveButtonState() {
        if (!saveBtn) return;
        
        if (validateForm()) {
            saveBtn.disabled = false;
            saveBtn.classList.remove('disabled');
        } else {
            saveBtn.disabled = true;
            saveBtn.classList.add('disabled');
        }
    }
    
    // ============= TRACK FORM CHANGES FOR REQUIRED FIELDS ONLY =============
    function handleRequiredFieldChange() {
        formChanged = hasFormChanged();
        updateSaveButtonState();
    }
    
    // Add change listeners to required fields
    requiredFields.forEach(field => {
        if (field) {
            field.addEventListener('input', handleRequiredFieldChange);
            field.addEventListener('change', handleRequiredFieldChange);
        }
    });
    
    // Add listener for middle name (optional, but still tracks form changes)
    if (middleNameField) {
        middleNameField.addEventListener('input', function() {
            formChanged = hasFormChanged();
            // Middle name changes do NOT affect save button state
        });
    }
    
    // ============= FILE UPLOAD HANDLING - TRACK CHANGES =============
    function handleFileUpload(input, previewElement, fileNameElement) {
        if (!input || !previewElement || !fileNameElement) return;
        
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                fileNameElement.textContent = file.name;
                
                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.style.backgroundImage = `url('${e.target.result}')`;
                    previewElement.style.backgroundSize = 'cover';
                    previewElement.style.backgroundPosition = 'center';
                };
                reader.readAsDataURL(file);
                
                // Add visual feedback
                previewElement.style.border = '2px solid #FF8246';
            } else {
                fileNameElement.textContent = '';
                previewElement.style.backgroundImage = '';
                previewElement.style.border = '';
            }
            
            // Check if form actually changed
            formChanged = hasFormChanged();
        });
    }
    
    handleFileUpload(identityPhoto, identityPreview, identityFileName);
    handleFileUpload(idDocument, idDocumentPreview, idDocumentFileName);
    
    // ============= CAPTURE INITIAL STATE AFTER PAGE LOAD =============
    captureInitialState();
    
    // ============= INITIAL CHECK =============
    updateSaveButtonState();
    
    // ============= FORM SUBMISSION =============
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            clearHighlights();
            
            // Validate birthdate on save
            const birthdateField = document.getElementById('birthdate');
            if (birthdateField && birthdateField.value) {
                const selectedDate = new Date(birthdateField.value);
                const today = new Date();
                let age = today.getFullYear() - selectedDate.getFullYear();
                const monthDiff = today.getMonth() - selectedDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < selectedDate.getDate())) {
                    age--;
                }
                
                if (age < 13) {
                    birthdateValid = false;
                    highlightMissingFields();
                    showModal('You must be at least 13 years old to become a seller.');
                    return;
                } else if (age > 120) {
                    birthdateValid = false;
                    highlightMissingFields();
                    showModal('Please enter a valid birthdate.');
                    return;
                } else {
                    birthdateValid = true;
                }
            }
            
            // Check if form is valid (required fields only)
            if (!validateForm()) {
                highlightMissingFields();
                showModal('Please fill in all required fields including Store Name.');
                return;
            }
            
            isSubmitting = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';
            saveBtn.disabled = true;
            
            try {
                const formData = new FormData(form);
                
                const response = await fetch('../database/seller-fill-form-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showModal(result.message);
                    
                    // If there were missing fields highlighted, clear them
                    clearHighlights();
                    
                    // After successful save, reset the form changed flag
                    formChanged = false;
                    
                    // After 1.5 seconds, redirect based on seller status
                    setTimeout(() => {
                        if (isSeller) {
                            // Existing seller - go back to dashboard
                            window.location.href = 'seller-dashboard.php';
                        } else {
                            // New seller - go to dashboard after application
                            window.location.href = 'seller-dashboard.php';
                        }
                    }, 1500);
                    
                } else {
                    showModal(result.message || 'Failed to save. Please try again.');
                    
                    // Highlight missing fields if returned from server
                    if (result.missing_fields && Array.isArray(result.missing_fields)) {
                        result.missing_fields.forEach(fieldName => {
                            const field = document.getElementById(fieldName);
                            if (field) {
                                field.style.borderColor = '#FF8246';
                                field.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
                            }
                        });
                    }
                    
                    saveBtn.textContent = originalText;
                    saveBtn.disabled = false;
                }
            } catch (error) {
                console.error('Error saving seller info:', error);
                showModal('Network error. Please check your connection and try again.');
                saveBtn.textContent = originalText;
                saveBtn.disabled = false;
            } finally {
                isSubmitting = false;
            }
        });
    }
    
    // ============= BACK/CANCEL BUTTON =============
    if (backCancelBtn) {
        backCancelBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetUrl = isSeller ? 'seller-dashboard.php' : 'customer-dashboard.php';
            
            if (hasFormChanged()) {
                showUnsavedModal(targetUrl);
            } else {
                window.location.href = targetUrl;
            }
        });
    }
    
    // ============= AUTO-RESIZE TEXTAREA =============
    const addressField = document.getElementById('address');
    if (addressField) {
        function autoResize() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        }
        
        addressField.addEventListener('input', function() {
            autoResize.call(this);
            handleRequiredFieldChange(); // This is a required field
        });
        setTimeout(() => autoResize.call(addressField), 100);
    }
    
    // ============= BIRTHDATE HANDLING - FIXED =============
    const birthdateField = document.getElementById('birthdate');
    if (birthdateField) {
        // Remove any previous validation listeners that might trigger modal
        // Just track changes without validation modal
        birthdateField.addEventListener('input', function() {
            // Only track that form has changed, don't validate
            formChanged = hasFormChanged();
            // Reset validity flag - will be checked on save
            birthdateValid = true;
            // Clear any highlight when user types
            this.style.borderColor = '';
            this.style.boxShadow = '';
        });
        
        birthdateField.addEventListener('change', function() {
            // Only track that form has changed, don't validate
            formChanged = hasFormChanged();
            // Reset validity flag - will be checked on save
            birthdateValid = true;
        });
    }
    
    // ============= ADD UNSAVED CHANGES STYLES =============
    const style = document.createElement('style');
    style.textContent = `
        .modal-btn-secondary {
            background: #000000;
            color: #ffffff;
            border: 1px solid #000000;
        }
        .modal-btn-secondary:hover {
            background: #333333;
        }
        .modal-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #000000;
        }
    `;
    document.head.appendChild(style);
});