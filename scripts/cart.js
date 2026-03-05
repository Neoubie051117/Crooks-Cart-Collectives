/* Crooks-Cart-Collectives/scripts/cart.js */
/* REVISED: Refreshes page when last item is removed */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    console.log('Cart.js loaded - Final version');

    // ===== MODAL ELEMENTS =====
    const confirmModal = document.getElementById('confirmModal');
    const cancelAction = document.getElementById('cancelAction');
    const confirmAction = document.getElementById('confirmAction');

    // ===== STATE =====
    let currentRemoveId = null;
    let isProcessing = false;

    // ===== MODAL FUNCTIONS =====
    function showConfirmModal(itemId) {
        currentRemoveId = itemId;
        if (confirmModal) {
            confirmModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function hideConfirmModal() {
        if (confirmModal) {
            confirmModal.classList.remove('active');
            document.body.style.overflow = '';
        }
        currentRemoveId = null;
    }

    function showMessage(message, type = 'error') {
        const existingMsg = document.querySelector('.cart-message');
        if (existingMsg) existingMsg.remove();

        const msgDiv = document.createElement('div');
        msgDiv.className = `cart-message ${type}`;
        msgDiv.textContent = message;
        document.body.appendChild(msgDiv);

        setTimeout(() => {
            if (msgDiv.parentNode) msgDiv.remove();
        }, 3000);
    }

    async function updateHeaderCartCount() {
        try {
            const response = await fetch('../database/cart-handler.php?action=get_count');
            const data = await response.json();

            if (data.status === 'success' && window.HeaderFunctions) {
                window.HeaderFunctions.updateCartCount();
            }
        } catch (e) {
            console.error('Failed to update cart count', e);
        }
    }

    // ===== QUANTITY INPUT HANDLERS =====
    document.querySelectorAll('.cart-item[data-active="1"] .quantity-input').forEach(input => {
        let timeoutId;

        input.addEventListener('input', function() {
            clearTimeout(timeoutId);

            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
                value = 1;
            }
            if (value > parseInt(this.max)) {
                this.value = this.max;
                value = parseInt(this.max);
            }
        });

        input.addEventListener('change', async function() {
            const itemId = this.dataset.id;
            const quantity = parseInt(this.value);
            const originalValue = this.defaultValue;
            const maxStock = parseInt(this.max);

            if (quantity < 1 || quantity > maxStock) {
                this.value = originalValue;
                showMessage(`Quantity must be between 1 and ${maxStock}`, 'error');
                return;
            }

            if (quantity === parseInt(originalValue)) {
                return;
            }

            this.disabled = true;
            const cartItem = this.closest('.cart-item');
            if (cartItem) cartItem.classList.add('loading');

            try {
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'update',
                        cart_item_id: itemId,
                        quantity: quantity
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    const priceText = cartItem.querySelector('.cart-item-price').textContent;
                    const price = parseFloat(priceText.replace(/[^0-9.-]+/g, ''));
                    const newSubtotal = price * quantity;

                    const subtotalSpan = cartItem.querySelector('.subtotal-amount');
                    if (subtotalSpan) {
                        subtotalSpan.textContent = '₱' + newSubtotal.toFixed(2);
                    }

                    let newTotal = 0;
                    document.querySelectorAll('.cart-item[data-active="1"] .subtotal-amount').forEach(span => {
                        newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                    });
                    
                    const totalElement = document.getElementById('cartTotal');
                    if (totalElement) {
                        totalElement.textContent = '₱' + newTotal.toFixed(2);
                    }

                    this.defaultValue = quantity;
                    showMessage('Cart updated successfully', 'success');
                    
                } else if (result.inactive) {
                    showMessage(result.message, 'error');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    this.value = originalValue;
                    showMessage(result.message || 'Error updating quantity', 'error');
                    
                    if (result.max_stock) {
                        this.max = result.max_stock;
                        if (parseInt(this.value) > result.max_stock) {
                            this.value = result.max_stock;
                        }
                    }
                }
            } catch (error) {
                console.error('Update error:', error);
                this.value = originalValue;
                showMessage('Network error. Please try again.', 'error');
            } finally {
                this.disabled = false;
                if (cartItem) cartItem.classList.remove('loading');
            }
        });

        input.addEventListener('keypress', (e) => {
            if (!/^\d+$/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && 
                e.key !== 'ArrowLeft' && e.key !== 'ArrowRight' && e.key !== 'Tab') {
                e.preventDefault();
            }
        });
    });

    // ===== REMOVE BUTTON HANDLERS =====
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const itemId = this.dataset.id;
            showConfirmModal(itemId);
        });
    });

    // ===== MODAL BUTTON HANDLERS =====
    if (cancelAction) {
        cancelAction.addEventListener('click', function(e) {
            e.preventDefault();
            hideConfirmModal();
        });
    }

    if (confirmAction) {
        confirmAction.addEventListener('click', async function(e) {
            e.preventDefault();
            
            if (!currentRemoveId || isProcessing) return;

            isProcessing = true;
            const originalText = this.textContent;
            this.textContent = 'Removing...';
            this.disabled = true;

            const cartItem = document.querySelector(`.cart-item[data-id="${currentRemoveId}"]`);

            try {
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'remove',
                        cart_item_id: currentRemoveId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    if (cartItem) {
                        cartItem.style.transition = 'opacity 0.3s ease';
                        cartItem.style.opacity = '0';

                        setTimeout(() => {
                            if (cartItem.parentNode) cartItem.remove();

                            // Check if cart is now empty
                            if (document.querySelectorAll('.cart-item').length === 0) {
                                // Reload the page to show empty state
                                window.location.reload();
                                return;
                            }

                            // Recalculate total from remaining active items
                            let newTotal = 0;
                            document.querySelectorAll('.cart-item[data-active="1"] .subtotal-amount').forEach(span => {
                                newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                            });

                            const totalElement = document.getElementById('cartTotal');
                            if (totalElement) {
                                totalElement.textContent = '₱' + newTotal.toFixed(2);
                            }

                            // Check if all remaining items are unavailable
                            const activeItems = document.querySelectorAll('.cart-item[data-active="1"]');
                            const unavailableItems = document.querySelectorAll('.cart-item[data-active="0"]');
                            
                            // Update summary section if needed
                            const cartSummary = document.querySelector('.cart-summary');
                            if (cartSummary) {
                                if (activeItems.length === 0 && unavailableItems.length > 0) {
                                    // Only unavailable items left - disable checkout
                                    const checkoutBtn = cartSummary.querySelector('.btn-primary');
                                    if (checkoutBtn) {
                                        checkoutBtn.textContent = 'Cannot Checkout';
                                        checkoutBtn.disabled = true;
                                        checkoutBtn.removeAttribute('href');
                                        checkoutBtn.style.pointerEvents = 'none';
                                    }
                                    
                                    // Update total to 0
                                    if (totalElement) {
                                        totalElement.textContent = '₱0.00';
                                    }
                                }
                            }

                            showMessage('Item removed from cart', 'success');
                            updateHeaderCartCount();
                        }, 300);
                    }
                } else {
                    showMessage(result.message || 'Error removing item', 'error');
                }
            } catch (error) {
                console.error('Remove error:', error);
                showMessage('Network error. Please try again.', 'error');
            } finally {
                isProcessing = false;
                this.textContent = originalText;
                this.disabled = false;
                hideConfirmModal();
            }
        });
    }

    // Close modal when clicking outside
    if (confirmModal) {
        confirmModal.addEventListener('click', function(e) {
            if (e.target === confirmModal) {
                hideConfirmModal();
            }
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && confirmModal && confirmModal.classList.contains('active')) {
            hideConfirmModal();
        }
    });

    // ===== INITIALIZATION =====
    updateHeaderCartCount();
    
    console.log('Cart.js initialization complete');
});