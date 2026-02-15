/* JavaScript File Content */
// Crooks-Cart-Collectives/scripts/product-details.js

document.addEventListener('DOMContentLoaded', function() {
    // ===== IMAGE GALLERY FUNCTIONALITY =====
    const mainImage = document.querySelector('.main-product-image');
    const thumbnails = document.querySelectorAll('.thumbnail');
    
    if (thumbnails.length > 0 && mainImage) {
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnails.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked thumbnail
                this.classList.add('active');
                
                // Get the image source from the clicked thumbnail
                const thumbImg = this.querySelector('img');
                if (thumbImg && thumbImg.src) {
                    mainImage.src = thumbImg.src;
                    
                    // Add a subtle fade effect
                    mainImage.style.opacity = '0.5';
                    setTimeout(() => {
                        mainImage.style.opacity = '1';
                    }, 100);
                }
            });
        });
    }
    
    // ===== IMAGE ZOOM/VIEW FUNCTIONALITY =====
    if (mainImage) {
        // Optional: Add click to view full size
        mainImage.addEventListener('click', function() {
            // You could implement a lightbox here
            // For now, just a simple console log
            console.log('Image clicked - lightbox could be implemented');
        });
        
        // Handle image load errors
        mainImage.addEventListener('error', function() {
            this.src = '../assets/image/icons/PlaceholderAssetProduct.png';
            this.alt = 'Product image unavailable';
        });
    }
    
    // ===== ADD TO CART FUNCTIONALITY =====
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    // Shared function to show notifications
    function showNotification(message, type = 'success') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.product-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.setAttribute('role', 'alert');
        notification.innerHTML = `
            <span class="notification-icon">${type === 'success' ? '✓' : '✗'}</span>
            <span class="notification-message">${message}</span>
        `;
        
        // Add styles for the notification content
        notification.style.cssText = `
            display: flex;
            align-items: center;
            gap: 10px;
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#28a745' : '#dc3545'};
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            font-weight: 500;
            max-width: 350px;
            word-break: break-word;
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // Function to handle cart operations
    async function handleCartAction(productId, action = 'add') {
        try {
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
                showNotification('Product added to cart successfully!', 'success');
                
                // Update cart count in header if the function exists
                if (window.HeaderFunctions && typeof window.HeaderFunctions.updateCartCount === 'function') {
                    window.HeaderFunctions.updateCartCount();
                }
                
                return true;
            } else {
                showNotification(result.message || 'Failed to add to cart', 'error');
                return false;
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
            showNotification('Network error. Please try again.', 'error');
            return false;
        }
    }
    
    // Add to cart button handler
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-icon">⏳</span><span class="btn-text">Adding...</span>';
            
            const success = await handleCartAction(productId, 'add');
            
            // Restore button state if not redirecting
            if (!success) {
                this.disabled = false;
                this.innerHTML = originalText;
            } else {
                // Keep disabled briefly to prevent double-click
                setTimeout(() => {
                    this.disabled = false;
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    }
    
    // Buy now button handler
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-icon">⏳</span><span class="btn-text">Processing...</span>';
            
            const success = await handleCartAction(productId, 'add');
            
            if (success) {
                // Redirect to checkout after a brief delay
                setTimeout(() => {
                    window.location.href = 'checkout.php';
                }, 1000);
            } else {
                // Restore button on failure
                this.disabled = false;
                this.innerHTML = originalText;
            }
        });
    }
    
    // ===== QUANTITY SELECTOR (if needed) =====
    // You can add quantity selector functionality here if you implement it
    
    // ===== ADD ANIMATION STYLES =====
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        .product-notification .notification-icon {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .product-notification .notification-message {
            flex: 1;
        }
    `;
    document.head.appendChild(style);
    
    // ===== PAGE LOAD ANIMATIONS =====
    // Fade in the product details
    const productGrid = document.querySelector('.product-details-grid');
    if (productGrid) {
        productGrid.style.opacity = '0';
        productGrid.style.transition = 'opacity 0.5s ease';
        
        setTimeout(() => {
            productGrid.style.opacity = '1';
        }, 100);
    }
    
    // ===== HANDLE RESPONSIVE BEHAVIOR =====
    function handleResponsiveLayout() {
        const windowWidth = window.innerWidth;
        const actionButtons = document.querySelector('.product-actions');
        
        if (actionButtons) {
            if (windowWidth <= 576) {
                // Mobile layout adjustments
                actionButtons.style.flexDirection = 'column';
            } else {
                // Desktop layout
                actionButtons.style.flexDirection = 'row';
            }
        }
    }
    
    // Initial call
    handleResponsiveLayout();
    
    // Listen for resize events
    window.addEventListener('resize', debounce(handleResponsiveLayout, 250));
    
    // Debounce function to limit resize events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // ===== LAZY LOAD IMAGES =====
    if ('loading' in HTMLImageElement.prototype) {
        // Browser supports native lazy loading
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.loading = 'lazy';
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        // You could implement a library like lozad.js here
    }
});

// Export functions for use in other scripts if needed
window.ProductDetails = {
    showNotification: function(message, type) {
        // Reuse the notification function
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
};