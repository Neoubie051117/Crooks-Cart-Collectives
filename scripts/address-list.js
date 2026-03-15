/* Crooks-Cart-Collectives/scripts/address-list.js */
/* Updated: First address undeletable with warning modal */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ===== DOM ELEMENTS =====
    const addressesContainer = document.getElementById('addressesContainer');
    const addressCount = document.getElementById('addressCount');
    const addAddressBtn = document.getElementById('addAddressBtn');
    
    // Modal elements
    const addressModal = document.getElementById('addressModal');
    const modalTitle = document.getElementById('modalTitle');
    const addressForm = document.getElementById('addressForm');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const saveAddressBtn = document.getElementById('saveAddressBtn');
    
    // Form fields
    const addressId = document.getElementById('addressId');
    const block = document.getElementById('block');
    const barangay = document.getElementById('barangay');
    const city = document.getElementById('city');
    const province = document.getElementById('province');
    const region = document.getElementById('region');
    const postalCode = document.getElementById('postal_code');
    const country = document.getElementById('country');
    
    // Delete modal
    const deleteModal = document.getElementById('deleteModal');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    
    // New: Main address warning modal
    const mainAddressModal = document.getElementById('mainAddressModal');
    const mainAddressOkBtn = document.getElementById('mainAddressOkBtn');
    
    // Notification modal
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationCloseBtn = document.getElementById('notificationCloseBtn');

    // ===== STATE =====
    let addresses = [];
    let currentAddressId = null;
    let isEditing = false;
    let isSubmitting = false;
    let isDeleting = false;

    // ===== HELPER FUNCTIONS =====
    function formatAddress(address) {
        const parts = [];
        parts.push(address.block);
        if (address.barangay) parts.push(address.barangay);
        parts.push(address.city);
        if (address.province) parts.push(address.province);
        if (address.region) parts.push(address.region);
        parts.push(address.postal_code);
        parts.push(address.country);
        return parts.join(', ');
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function showNotification(message, isError = false) {
        if (!notificationMessage) return;
        notificationMessage.textContent = message;
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

    function showModal(modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function hideModal(modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function hideAllModals() {
        hideModal(addressModal);
        hideModal(deleteModal);
        hideModal(mainAddressModal);
        hideModal(notificationModal);
    }

    // ===== COUNTRY-SPECIFIC VALIDATION =====
    function updateAddressValidation() {
        const isPhilippines = country.value === 'Philippines';
        
        // Update placeholders
        barangay.placeholder = isPhilippines ? 'San Miguel' : '(Optional)';
        province.placeholder = isPhilippines ? 'Metro Manila' : '(Optional)';
        region.placeholder = isPhilippines ? 'NCR' : '(Optional)';
        
        // Update required status visually
        const barangayLabel = document.querySelector('label[for="barangay"]');
        const provinceLabel = document.querySelector('label[for="province"]');
        const regionLabel = document.querySelector('label[for="region"]');
        
        if (barangayLabel) {
            barangayLabel.innerHTML = isPhilippines ? 
                'Barangay *' : 
                'Barangay <span class="optional">(Optional)</span>';
        }
        if (provinceLabel) {
            provinceLabel.innerHTML = isPhilippines ? 
                'Province *' : 
                'Province <span class="optional">(Optional)</span>';
        }
        if (regionLabel) {
            regionLabel.innerHTML = isPhilippines ? 
                'Region *' : 
                'Region <span class="optional">(Optional)</span>';
        }
    }

    // ===== RESET FORM =====
    function resetForm() {
        addressForm.reset();
        addressId.value = '';
        isEditing = false;
        modalTitle.textContent = 'Add New Address';
        
        // Clear all error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
        document.querySelectorAll('input, select').forEach(el => {
            el.style.borderColor = '';
            el.style.boxShadow = '';
        });
    }

    // ===== LOAD ADDRESSES =====
    async function loadAddresses() {
        if (!addressesContainer) return;
        
        addressesContainer.innerHTML = '<div class="loading">Loading addresses...</div>';
        
        try {
            const response = await fetch('../database/address-list-handler.php?action=get_addresses&t=' + Date.now());
            const result = await response.json();
            
            if (result.status === 'success') {
                addresses = result.data;
                renderAddresses();
            } else {
                addressesContainer.innerHTML = '<div class="empty-state"><p>Failed to load addresses.</p></div>';
            }
        } catch (error) {
            console.error('Error loading addresses:', error);
            addressesContainer.innerHTML = '<div class="empty-state"><p>Network error. Please try again.</p></div>';
        }
    }

    // ===== RENDER ADDRESSES =====
    function renderAddresses() {
        if (!addressesContainer) return;
        
        // Update count
        if (addressCount) {
            addressCount.textContent = `${addresses.length}/5`;
        }
        
        if (addresses.length === 0) {
            addressesContainer.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/building.svg" alt="No addresses" class="empty-state-icon">
                        <h3>No Addresses Yet</h3>
                        <p>Add your first address to start shopping!</p>
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="addresses-grid">';
        
        addresses.forEach((addr, index) => {
            const formattedAddress = formatAddress(addr);
            const isDefaultClass = addr.is_default ? 'default-card' : '';
            const defaultBadge = addr.is_default ? '<span class="default-badge">DEFAULT</span>' : '';
            const addressNumber = index + 1; // 1-based for display
            
            // First address (index 0) is undeletable
            const isFirstAddress = (index === 0);
            const deleteButtonClass = isFirstAddress ? 'action-btn delete-address disabled' : 'action-btn delete-address';
            const deleteDisabled = isFirstAddress ? 'disabled' : '';
            
            html += `
                <div class="address-card ${isDefaultClass}" data-id="${addr.address_id}">
                    <div class="address-content">
                        <div class="address-card-header">
                            <span class="address-id-badge">#${addressNumber}</span>
                            ${defaultBadge}
                            ${isFirstAddress ? '<span class="main-badge">MAIN</span>' : ''}
                        </div>
                        <div class="address-card-body">
                            <p class="address-line">${escapeHtml(formattedAddress)}</p>
                        </div>
                    </div>
                    <div class="address-actions">
                        <button class="action-btn edit-address" data-id="${addr.address_id}">
                            <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                            Edit
                        </button>
                        <button class="${deleteButtonClass}" data-id="${addr.address_id}" ${deleteDisabled}>
                            <img src="../assets/image/icons/trash.svg" alt="Delete" class="btn-icon">
                            Delete
                        </button>
                    </div>
                </div>
            `;
        });
        
        html += '</div>';
        addressesContainer.innerHTML = html;
        
        // Attach event listeners
        attachAddressCardListeners();
    }

    function attachAddressCardListeners() {
        // Edit buttons
        document.querySelectorAll('.edit-address').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                editAddress(id);
            });
        });
        
        // Delete buttons - only attach to enabled ones
        document.querySelectorAll('.delete-address:not(.disabled):not(:disabled)').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                showDeleteConfirmation(id);
            });
        });
        
        // For disabled delete buttons, show main address warning
        document.querySelectorAll('.delete-address.disabled, .delete-address:disabled').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                showMainAddressWarning();
            });
        });
    }

    // ===== SHOW MAIN ADDRESS WARNING =====
    function showMainAddressWarning() {
        showModal(mainAddressModal);
    }

    // ===== EDIT ADDRESS =====
    function editAddress(id) {
        const addr = addresses.find(a => a.address_id == id);
        if (!addr) return;
        
        // Populate form
        addressId.value = addr.address_id;
        block.value = addr.block || '';
        barangay.value = addr.barangay || '';
        city.value = addr.city || '';
        province.value = addr.province || '';
        region.value = addr.region || '';
        postalCode.value = addr.postal_code || '';
        country.value = addr.country || 'Philippines';
        
        isEditing = true;
        modalTitle.textContent = 'Edit Address';
        updateAddressValidation();
        showModal(addressModal);
    }

    // ===== SHOW DELETE CONFIRMATION =====
    function showDeleteConfirmation(id) {
        currentAddressId = id;
        showModal(deleteModal);
    }

    // ===== DELETE ADDRESS =====
    async function deleteAddress() {
        if (!currentAddressId || isDeleting) return;
        
        isDeleting = true;
        confirmDeleteBtn.disabled = true;
        confirmDeleteBtn.innerHTML = '<span class="btn-icon">⏳</span> Deleting...';
        
        try {
            const formData = new URLSearchParams();
            formData.append('action', 'delete_address');
            formData.append('address_id', currentAddressId);
            
            const response = await fetch('../database/address-list-handler.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: formData
            });
            
            const result = await response.json();
            
            if (result.status === 'success') {
                hideModal(deleteModal);
                showNotification('Address deleted successfully');
                loadAddresses(); // Reload the list
            } else {
                showNotification(result.message || 'Failed to delete', true);
                hideModal(deleteModal);
            }
        } catch (error) {
            console.error('Delete error:', error);
            showNotification('Network error', true);
            hideModal(deleteModal);
        } finally {
            isDeleting = false;
            confirmDeleteBtn.disabled = false;
            confirmDeleteBtn.innerHTML = 'Delete';
            currentAddressId = null;
        }
    }

    // ===== VALIDATE FORM =====
    function validateForm() {
        let isValid = true;
        
        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
        document.querySelectorAll('input, select').forEach(el => {
            el.style.borderColor = '';
            el.style.boxShadow = '';
        });
        
        // Required fields
        if (!block.value.trim()) {
            document.getElementById('blockError').textContent = 'Block/Street/House number is required';
            block.style.borderColor = '#FF8246';
            isValid = false;
        }
        
        if (!city.value.trim()) {
            document.getElementById('cityError').textContent = 'City is required';
            city.style.borderColor = '#FF8246';
            isValid = false;
        }
        
        if (!postalCode.value.trim()) {
            document.getElementById('postalCodeError').textContent = 'Postal code is required';
            postalCode.style.borderColor = '#FF8246';
            isValid = false;
        } else if (!/^[0-9]{4,10}$/.test(postalCode.value)) {
            document.getElementById('postalCodeError').textContent = 'Postal code must contain only numbers';
            postalCode.style.borderColor = '#FF8246';
            isValid = false;
        }
        
        if (!country.value) {
            document.getElementById('countryError').textContent = 'Country is required';
            country.style.borderColor = '#FF8246';
            isValid = false;
        }
        
        // Philippines-specific validation
        const isPhilippines = country.value === 'Philippines';
        if (isPhilippines) {
            if (!barangay.value.trim()) {
                document.getElementById('barangayError').textContent = 'Barangay is required for Philippines';
                barangay.style.borderColor = '#FF8246';
                isValid = false;
            }
            if (!province.value.trim()) {
                document.getElementById('provinceError').textContent = 'Province is required for Philippines';
                province.style.borderColor = '#FF8246';
                isValid = false;
            }
            if (!region.value.trim()) {
                document.getElementById('regionError').textContent = 'Region is required for Philippines';
                region.style.borderColor = '#FF8246';
                isValid = false;
            }
        }
        
        return isValid;
    }

    // ===== SAVE ADDRESS =====
    async function saveAddress() {
        if (isSubmitting) return;
        
        if (!validateForm()) {
            return;
        }
        
        isSubmitting = true;
        saveAddressBtn.disabled = true;
        saveAddressBtn.innerHTML = '<span class="btn-icon">⏳</span> Saving...';
        
        try {
            const action = isEditing ? 'update_address' : 'add_address';
            const formData = new FormData(addressForm);
            formData.append('action', action);
            
            const response = await fetch('../database/address-list-handler.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.status === 'success') {
                hideModal(addressModal);
                showNotification(result.message);
                resetForm();
                loadAddresses(); // Reload the list
            } else {
                showNotification(result.message || 'Failed to save', true);
                saveAddressBtn.disabled = false;
                saveAddressBtn.innerHTML = 'Save Address';
            }
        } catch (error) {
            console.error('Save address error:', error);
            showNotification('Network error', true);
            saveAddressBtn.disabled = false;
            saveAddressBtn.innerHTML = 'Save Address';
        } finally {
            isSubmitting = false;
        }
    }

    // ===== EVENT LISTENERS =====
    
    // Add Address button
    if (addAddressBtn) {
        addAddressBtn.addEventListener('click', function() {
            resetForm();
            updateAddressValidation();
            showModal(addressModal);
        });
    }
    
    // Cancel modal button
    if (cancelModalBtn) {
        cancelModalBtn.addEventListener('click', function() {
            hideModal(addressModal);
            resetForm();
        });
    }
    
    // Address form submit
    if (addressForm) {
        addressForm.addEventListener('submit', function(e) {
            e.preventDefault();
            saveAddress();
        });
    }
    
    // Country change
    if (country) {
        country.addEventListener('change', updateAddressValidation);
    }
    
    // Delete confirmation
    if (cancelDeleteBtn) {
        cancelDeleteBtn.addEventListener('click', function() {
            hideModal(deleteModal);
            currentAddressId = null;
        });
    }
    
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', deleteAddress);
    }
    
    // Main address warning OK button
    if (mainAddressOkBtn) {
        mainAddressOkBtn.addEventListener('click', function() {
            hideModal(mainAddressModal);
        });
    }
    
    // Notification close
    if (notificationCloseBtn) {
        notificationCloseBtn.addEventListener('click', hideNotification);
    }
    
    // Close modals when clicking outside
    [addressModal, deleteModal, mainAddressModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    if (modal === addressModal) resetForm();
                    hideModal(modal);
                }
            });
        }
    });
    
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (addressModal.style.display === 'flex') {
                hideModal(addressModal);
                resetForm();
            }
            if (deleteModal.style.display === 'flex') {
                hideModal(deleteModal);
                currentAddressId = null;
            }
            if (mainAddressModal.style.display === 'flex') {
                hideModal(mainAddressModal);
            }
            if (notificationModal.style.display === 'flex') {
                hideModal(notificationModal);
            }
        }
    });

    // ===== INITIAL LOAD =====
    loadAddresses();
    
    console.log('Address list JS initialized');
});