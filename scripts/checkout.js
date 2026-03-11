/* Crooks-Cart-Collectives/scripts/checkout.js */
/* Handles checkout functionality: address editing, payment method selection, order placement */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const placeOrderBtn = document.getElementById('placeOrderBtn');
    const notifier = document.getElementById('checkoutNotifier');
    const messageEl = document.getElementById('checkoutMessage');
    const closeBtn = document.getElementById('checkoutCloseBtn');
    
    // Address elements
    const editAddressBtn = document.getElementById('editAddressBtn');
    const cancelEditAddress = document.getElementById('cancelEditAddress');
    const saveAddressBtn = document.getElementById('saveAddressBtn');
    const addressDisplay = document.getElementById('addressDisplay');
    const addressEditForm = document.getElementById('addressEditForm');
    const shippingAddressText = document.getElementById('shippingAddressText');
    const newAddress = document.getElementById('newAddress');
    
    // Payment elements
    const paymentOptions = document.querySelectorAll('.payment-option');
    const onlineMethods = document.getElementById('onlineMethods');
    
    // Hidden inputs
    const singleProductMode = document.getElementById('singleProductMode')?.value === '1';
    const singleProductId = document.getElementById('singleProductId')?.value;
    const singleQuantity = document.getElementById('singleQuantity')?.value;

    // ============= FIX: Create hidden input for shipping address if it doesn't exist =============
    let hiddenAddressInput = document.getElementById('submittedShippingAddress');
    if (!hiddenAddressInput) {
        hiddenAddressInput = document.createElement('input');
        hiddenAddressInput.type = 'hidden';
        hiddenAddressInput.id = 'submittedShippingAddress';
        hiddenAddressInput.name = 'shipping_address';
        
        // Set initial value from displayed address
        if (shippingAddressText) {
            hiddenAddressInput.value = shippingAddressText.textContent;
        }
        
        // Append to form (assuming there's a form, or to body as fallback)
        const form = document.querySelector('form');
        if (form) {
            form.appendChild(hiddenAddressInput);
        } else {
            document.body.appendChild(hiddenAddressInput);
        }
        console.log('Created hidden address input with value:', hiddenAddressInput.value);
    }

    // ============= STATE =============
    let selectedPaymentMethod = 'COD';
    let isProcessing = false;
    let addressChanged = false; // Track if address was changed

    // ============= NOTIFIER FUNCTIONS =============
    function showNotifier(msg, redirect = null) {
        if (!messageEl || !notifier) return;
        
        messageEl.textContent = msg;
        notifier.classList.remove('hidden');
        
        if (redirect) {
            setTimeout(() => {
                window.location.href = redirect;
            }, 2000);
        }
    }

    function hideNotifier() {
        if (notifier) {
            notifier.classList.add('hidden');
        }
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', hideNotifier);
    }

    if (notifier) {
        notifier.addEventListener('click', function(e) {
            if (e.target === notifier) {
                hideNotifier();
            }
        });
    }

    // ============= ADDRESS EDITING FUNCTIONS =============
    console.log('Address elements:', {
        editAddressBtn: !!editAddressBtn,
        cancelEditAddress: !!cancelEditAddress,
        saveAddressBtn: !!saveAddressBtn,
        addressDisplay: !!addressDisplay,
        addressEditForm: !!addressEditForm,
        shippingAddressText: !!shippingAddressText,
        newAddress: !!newAddress,
        hiddenAddressInput: !!hiddenAddressInput
    });

    // Show edit form when Edit button is clicked
    if (editAddressBtn && addressDisplay && addressEditForm && shippingAddressText && newAddress) {
        editAddressBtn.addEventListener('click', function() {
            console.log('Edit button clicked');
            // Hide display, show form
            addressDisplay.style.display = 'none';
            addressEditForm.style.display = 'block';
            editAddressBtn.style.display = 'none';
            
            // Set textarea to current address (from hidden input, not display text)
            newAddress.value = hiddenAddressInput ? hiddenAddressInput.value : shippingAddressText.textContent;
            
            // Focus on textarea
            newAddress.focus();
        });
    } else {
        console.error('Address edit elements not found');
    }

    // Cancel editing - NO MODAL, just revert
    if (cancelEditAddress && addressDisplay && addressEditForm && editAddressBtn && shippingAddressText && newAddress) {
        cancelEditAddress.addEventListener('click', function() {
            console.log('Cancel edit clicked');
            
            // Reset textarea to current address from hidden input (not original)
            newAddress.value = hiddenAddressInput ? hiddenAddressInput.value : shippingAddressText.textContent;
            
            // Hide form, show display
            addressDisplay.style.display = 'block';
            addressEditForm.style.display = 'none';
            editAddressBtn.style.display = 'inline-block';
        });
    }

    // Save new address - UPDATED to update hidden input
    if (saveAddressBtn && addressDisplay && addressEditForm && editAddressBtn && shippingAddressText && newAddress && hiddenAddressInput) {
        saveAddressBtn.addEventListener('click', function() {
            console.log('Save address clicked');
            const newAddressValue = newAddress.value.trim();
            
            if (!newAddressValue) {
                // Just show a temporary visual feedback without modal
                newAddress.style.borderColor = '#FF8246';
                newAddress.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
                setTimeout(() => {
                    newAddress.style.borderColor = '';
                    newAddress.style.boxShadow = '';
                }, 2000);
                return;
            }

            // Update the displayed address
            shippingAddressText.textContent = newAddressValue;
            
            // CRITICAL FIX: Update the hidden input that will be submitted
            hiddenAddressInput.value = newAddressValue;
            
            // Mark that address was changed
            addressChanged = true;
            
            // Hide form, show display
            addressDisplay.style.display = 'block';
            addressEditForm.style.display = 'none';
            editAddressBtn.style.display = 'inline-block';
            
            console.log('Address updated to:', newAddressValue);
            console.log('Hidden input now has value:', hiddenAddressInput.value);
        });
    }

    // ============= PAYMENT METHOD SELECTION =============
    if (paymentOptions.length > 0) {
        paymentOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                paymentOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                    selectedPaymentMethod = radio.value;
                    
                    // Dispatch change event for any listeners
                    const event = new Event('change', { bubbles: true });
                    radio.dispatchEvent(event);
                }
                
                // Show/hide online methods description
                if (onlineMethods) {
                    onlineMethods.style.display = selectedPaymentMethod === 'Online' ? 'block' : 'none';
                }
            });
        });

        // Also handle direct radio button clicks
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                selectedPaymentMethod = this.value;
                
                // Update visual selection
                paymentOptions.forEach(opt => {
                    const optRadio = opt.querySelector('input[type="radio"]');
                    if (optRadio && optRadio.value === selectedPaymentMethod) {
                        opt.classList.add('selected');
                    } else {
                        opt.classList.remove('selected');
                    }
                });
                
                // Show/hide online methods description
                if (onlineMethods) {
                    onlineMethods.style.display = selectedPaymentMethod === 'Online' ? 'block' : 'none';
                }
            });
        });
    }

    // ============= PLACE ORDER FUNCTION =============
async function placeOrder() {
    if (isProcessing) return;
    
    // FIX: Check if address edit form is open and use textarea value directly
    let currentAddress;
    
    if (addressEditForm && addressEditForm.style.display === 'block') {
        // User is in edit mode - use the textarea value directly
        currentAddress = newAddress ? newAddress.value.trim() : '';
        console.log('Edit mode active - using textarea value:', currentAddress);
        
        // Optional: Auto-save the address if they place order while in edit mode
        if (currentAddress && hiddenAddressInput) {
            // Update hidden input so future operations have the correct value
            hiddenAddressInput.value = currentAddress;
            if (shippingAddressText) {
                shippingAddressText.textContent = currentAddress;
            }
            addressChanged = true;
            console.log('Auto-saved address from textarea');
        }
    } else {
        // Not in edit mode - use hidden input value
        currentAddress = hiddenAddressInput ? hiddenAddressInput.value : (shippingAddressText ? shippingAddressText.textContent : '');
    }
    
    if (!currentAddress) {
        showNotifier('Please provide a shipping address');
        
        // Highlight the address section
        if (editAddressBtn) {
            editAddressBtn.style.borderColor = '#FF8246';
            editAddressBtn.style.boxShadow = '0 0 0 3px rgba(255, 130, 70, 0.1)';
            setTimeout(() => {
                editAddressBtn.style.borderColor = '';
                editAddressBtn.style.boxShadow = '';
            }, 2000);
        }
        return;
    }
    
    isProcessing = true;
    
    // Disable button and show loading state
    if (placeOrderBtn) {
        placeOrderBtn.disabled = true;
        placeOrderBtn.textContent = 'Processing...';
    }

    try {
        // Create form data
        const formData = new URLSearchParams();
        
        // Add action
        formData.append('action', 'place_order');
        
        // Add payment method
        formData.append('payment_method', selectedPaymentMethod);
        
        // Send the current address (whether from textarea or hidden input)
        formData.append('shipping_address', currentAddress);
        
        // If single product mode, add product details
        if (singleProductMode && singleProductId && singleQuantity) {
            formData.append('product_id', singleProductId);
            formData.append('quantity', singleQuantity);
        }

        console.log('Placing order with:', {
            payment_method: selectedPaymentMethod,
            shipping_address: currentAddress,
            singleProductMode,
            product_id: singleProductId,
            quantity: singleQuantity,
            addressChanged,
            editModeActive: addressEditForm ? addressEditForm.style.display === 'block' : false
        });

        // Send request
        const response = await fetch('../database/checkout-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: formData
        });

        // Handle response
        let result;
        const responseText = await response.text();
        
        try {
            result = JSON.parse(responseText);
        } catch (e) {
            console.error('JSON parse error:', e);
            console.error('Response text:', responseText);
            throw new Error('Invalid server response');
        }

        if (result.status === 'success') {
            showNotifier(result.message, result.redirect || 'orders.php');
        } else {
            showNotifier('Error: ' + (result.message || 'Failed to place order'));
            if (placeOrderBtn) {
                placeOrderBtn.disabled = false;
                placeOrderBtn.textContent = 'Place Order';
            }
        }
    } catch (error) {
        console.error('Checkout error:', error);
        showNotifier('Network error. Please try again.');
        if (placeOrderBtn) {
            placeOrderBtn.disabled = false;
            placeOrderBtn.textContent = 'Place Order';
        }
    } finally {
        isProcessing = false;
    }
}

    // ============= PLACE ORDER BUTTON CLICK =============
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            placeOrder();
        });
    }

    // ============= KEYBOARD SHORTCUTS =============
    document.addEventListener('keydown', function(e) {
        // Escape key closes notifier
        if (e.key === 'Escape' && notifier && !notifier.classList.contains('hidden')) {
            hideNotifier();
        }
        
        // Ctrl+Enter in textarea saves if form is open
        if (e.key === 'Enter' && e.ctrlKey && addressEditForm && addressEditForm.style.display === 'block') {
            e.preventDefault();
            if (saveAddressBtn) {
                saveAddressBtn.click();
            }
        }
        
        // Enter in textarea without Ctrl does nothing (prevents form submission)
        if (e.key === 'Enter' && !e.ctrlKey && addressEditForm && addressEditForm.style.display === 'block') {
            e.preventDefault();
        }
    });

    // Prevent form submission on Enter in textarea
    if (newAddress) {
        newAddress.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.ctrlKey) {
                e.preventDefault();
            }
        });
    }

    // ============= INITIAL SETUP =============
    // Set initial payment method
    const checkedRadio = document.querySelector('input[name="payment_method"]:checked');
    if (checkedRadio) {
        selectedPaymentMethod = checkedRadio.value;
        
        // Update visual selection
        paymentOptions.forEach(opt => {
            const optRadio = opt.querySelector('input[type="radio"]');
            if (optRadio && optRadio.checked) {
                opt.classList.add('selected');
            }
        });
        
        // Show/hide online methods
        if (onlineMethods) {
            onlineMethods.style.display = selectedPaymentMethod === 'Online' ? 'block' : 'none';
        }
    }

    console.log('Checkout.js initialized with hidden input:', hiddenAddressInput ? hiddenAddressInput.value : 'none');
});