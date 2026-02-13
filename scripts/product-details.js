// Crooks-Cart-Collectives/scripts/product-details.js

document.addEventListener('DOMContentLoaded', function() {
    // Add to cart button functionality
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Adding...';
            
            try {
                // Add your cart API endpoint here
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'add_to_cart',
                        product_id: productId,
                        quantity: 1
                    })
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    // Show success message
                    showNotification('Product added to cart!', 'success');
                    
                    // Update cart count in header if exists
                    updateCartCount();
                } else {
                    showNotification(result.message || 'Failed to add to cart', 'error');
                }
            } catch (error) {
                console.error('Error adding to cart:', error);
                showNotification('Network error. Please try again.', 'error');
            } finally {
                // Restore button state
                this.disabled = false;
                this.textContent = originalText;
            }
        });
    }
    
    // Buy now button functionality
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.textContent;
            this.textContent = 'Processing...';
            
            try {
                // Add to cart and redirect to checkout
                const response = await fetch('../database/cart-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'add_to_cart',
                        product_id: productId,
                        quantity: 1
                    })
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    // Redirect to checkout
                    window.location.href = 'checkout.php';
                } else {
                    showNotification(result.message || 'Failed to process', 'error');
                }
            } catch (error) {
                console.error('Error processing buy now:', error);
                showNotification('Network error. Please try again.', 'error');
            } finally {
                // Restore button state
                this.disabled = false;
                this.textContent = originalText;
            }
        });
    }
    
    // Notification function
    function showNotification(message, type = 'info') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.product-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#28a745' : '#dc3545'};
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // Update cart count in header
    function updateCartCount() {
        // Implement based on your cart implementation
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            // Fetch cart count from server
            fetch('../database/cart-handler.php?action=get_count')
                .then(response => response.json())
                .then(data => {
                    if (data.count !== undefined) {
                        cartCountElement.textContent = data.count;
                    }
                })
                .catch(error => console.error('Error fetching cart count:', error));
        }
    }
    
    // Add animation styles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});