/* Crooks-Cart-Collectives/scripts/cart.js */
/* Shopping Cart JavaScript - Updated to handle inactive products */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    console.log('Cart.js loaded');

    // ===== UTILITY FUNCTIONS =====
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

    function showConfirmation(title, message) {
        return new Promise((resolve) => {
            const existingModal = document.querySelector('.cart-notifier-modal');
            if (existingModal) existingModal.remove();

            const modal = document.createElement('div');
            modal.className = 'cart-notifier-modal active';
            modal.id = 'confirmModal';
            modal.innerHTML = `
                <div class="cart-notifier-content">
                    <div class="cart-notifier-icon">
                        <img src="../assets/image/icons/trash.svg" 
                             alt="Delete" 
                             style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                             onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>${title}</h3>
                    <p>${message}</p>
                    <div class="cart-notifier-actions">
                        <button id="cancelAction" class="cart-notifier-btn continue-btn">Cancel</button>
                        <button id="confirmAction" class="cart-notifier-btn view-cart-btn">Confirm</button>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);

            function cleanup() {
                if (modal.parentNode) modal.remove();
            }

            document.getElementById('cancelAction').addEventListener('click', (e) => {
                e.preventDefault();
                cleanup();
                resolve(false);
            });

            document.getElementById('confirmAction').addEventListener('click', (e) => {
                e.preventDefault();
                cleanup();
                resolve(true);
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    cleanup();
                    resolve(false);
                }
            });
        });
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

    // ===== QUANTITY INPUT HANDLERS - Only for active items =====
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
                } else {
                    this.value = originalValue;
                    showMessage(result.message || 'Error updating quantity', 'error');
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

    // ===== REMOVE BUTTON HANDLERS - Works for all items =====
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const confirmed = await showConfirmation(
                'Confirm Removal',
                'Are you sure you want to remove this item from your cart?'
            );

            if (!confirmed) return;

            const itemId = this.dataset.id;
            const cartItem = this.closest('.cart-item');

            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Removing...';
            if (cartItem) cartItem.classList.add('loading');

            try {
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'remove',
                        cart_item_id: itemId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    if (cartItem) {
                        cartItem.style.transition = 'opacity 0.3s ease';
                        cartItem.style.opacity = '0';

                        setTimeout(() => {
                            if (cartItem.parentNode) cartItem.remove();

                            let newTotal = 0;
                            document.querySelectorAll('.cart-item[data-active="1"] .subtotal-amount').forEach(span => {
                                newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                            });

                            const totalElement = document.getElementById('cartTotal');
                            if (totalElement) {
                                totalElement.textContent = '₱' + newTotal.toFixed(2);
                            }

                            showMessage('Item removed from cart', 'success');
                            updateHeaderCartCount();

                            if (document.querySelectorAll('.cart-item').length === 0) {
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                // Check if all remaining items are inactive
                                const activeItems = document.querySelectorAll('.cart-item[data-active="1"]');
                                const checkoutBtn = document.querySelector('.cart-actions .btn-primary');
                                if (checkoutBtn && activeItems.length === 0) {
                                    checkoutBtn.textContent = 'No Active Items';
                                    checkoutBtn.disabled = true;
                                    checkoutBtn.style.opacity = '0.5';
                                    checkoutBtn.style.cursor = 'not-allowed';
                                }
                            }
                        }, 300);
                    }
                } else {
                    showMessage(result.message || 'Error removing item', 'error');
                    this.disabled = false;
                    this.textContent = originalText;
                    if (cartItem) cartItem.classList.remove('loading');
                }
            } catch (error) {
                console.error('Remove error:', error);
                showMessage('Network error. Please try again.', 'error');
                this.disabled = false;
                this.textContent = originalText;
                if (cartItem) cartItem.classList.remove('loading');
            }
        });
    });

    // Update cart count on page load
    updateHeaderCartCount();
    console.log('Cart.js initialization complete');
});