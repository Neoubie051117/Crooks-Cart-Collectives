/* Crooks-Cart-Collectives/scripts/cart.js */
/* Shopping Cart JavaScript */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= UTILITY FUNCTIONS =============
    function showMessage(message, type = 'error') {
        const msgDiv = document.createElement('div');
        msgDiv.className = `cart-message ${type}`;
        msgDiv.textContent = message;
        document.body.appendChild(msgDiv);

        setTimeout(() => {
            msgDiv.remove();
        }, 3000);
    }

    function showConfirmation(title, message) {
        return new Promise((resolve) => {
            const modal = document.createElement('div');
            modal.className = 'cart-notifier-modal active';
            modal.id = 'confirmModal';
            modal.innerHTML = `
                <div class="cart-notifier-content">
                    <div class="cart-notifier-icon">
                        <img src="../assets/image/icons/trash.svg" 
                             alt="Delete" 
                             style="width: 60px; height: 60px;"
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
                modal.remove();
            }

            document.getElementById('cancelAction').addEventListener('click', () => {
                cleanup();
                resolve(false);
            });

            document.getElementById('confirmAction').addEventListener('click', () => {
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

    // ============= QUANTITY INPUT HANDLERS =============
    document.querySelectorAll('.quantity-input').forEach(input => {
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
            cartItem.classList.add('loading');

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
                    subtotalSpan.textContent = '₱' + newSubtotal.toFixed(2);

                    let newTotal = 0;
                    document.querySelectorAll('.subtotal-amount').forEach(span => {
                        newTotal += parseFloat(span.textContent.replace(/[^0-9.-]+/g, ''));
                    });
                    document.getElementById('cartTotal').textContent = '₱' + newTotal.toFixed(2);

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
                cartItem.classList.remove('loading');
            }
        });

        input.addEventListener('keypress', (e) => {
            if (!/^\d+$/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && 
                e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
                e.preventDefault();
            }
        });
    });

    // ============= REMOVE BUTTON HANDLERS =============
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
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
            cartItem.classList.add('loading');

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
                    cartItem.style.transition = 'opacity 0.3s ease';
                    cartItem.style.opacity = '0';

                    setTimeout(() => {
                        cartItem.remove();

                        let newTotal = 0;
                        document.querySelectorAll('.subtotal-amount').forEach(span => {
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
                        }
                    }, 300);
                } else {
                    showMessage(result.message || 'Error removing item', 'error');
                    this.disabled = false;
                    this.textContent = originalText;
                    cartItem.classList.remove('loading');
                }
            } catch (error) {
                console.error('Remove error:', error);
                showMessage('Network error. Please try again.', 'error');
                this.disabled = false;
                this.textContent = originalText;
                cartItem.classList.remove('loading');
            }
        });
    });

    // Update cart count on page load
    updateHeaderCartCount();
});