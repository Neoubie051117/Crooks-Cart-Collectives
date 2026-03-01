/* Crooks-Cart-Collectives/scripts/product-details.js */
/* Revised with seller-new-product style hover preview and thumbnail navigation */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ===== DOM ELEMENTS =====
    const mainPreviewBox = document.getElementById('mainPreviewBox');
    const previewPlaceholder = document.getElementById('previewPlaceholder');
    const previewImage = document.getElementById('previewImage');
    const thumbnailButtons = document.querySelectorAll('.thumbnail-image-btn');
    
    // FIXED: Select buttons by their actual classes
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    // Debug: Log if buttons are found
    console.log('Add to cart button found:', addToCartBtn);
    console.log('Buy now button found:', buyNowBtn);
    
    // ===== STATE =====
    let currentIndex = 0;
    let hoveredIndex = -1;
    const thumbnailUrls = [];
    
    // Collect thumbnail URLs from buttons
    thumbnailButtons.forEach(btn => {
        const bgImage = btn.style.backgroundImage;
        if (bgImage && bgImage !== 'none') {
            const url = bgImage.slice(5, -2); // Remove url(" and ")
            thumbnailUrls.push(url);
        } else {
            thumbnailUrls.push(null);
        }
    });
    
    // ===== THUMBNAIL NAVIGATION =====
    function setPreviewFromIndex(index) {
        if (!previewImage || !previewPlaceholder) return;
        
        if (thumbnailUrls[index]) {
            previewImage.style.backgroundImage = `url('${thumbnailUrls[index]}')`;
            previewImage.style.display = 'block';
            previewPlaceholder.style.display = 'none';
        } else {
            previewImage.style.display = 'none';
            previewPlaceholder.style.display = 'flex';
        }
    }
    
    function updateActiveThumbnail(index) {
        thumbnailButtons.forEach((btn, i) => {
            if (i === index) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }
    
    // Mouse enter for hover preview
    thumbnailButtons.forEach((btn, index) => {
        btn.addEventListener('mouseenter', function() {
            if (thumbnailUrls[index]) {
                hoveredIndex = index;
                setPreviewFromIndex(index);
                
                // Add hover class
                btn.classList.add('hover');
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            btn.classList.remove('hover');
            
            if (hoveredIndex !== -1) {
                hoveredIndex = -1;
                // Return to current index
                setPreviewFromIndex(currentIndex);
                updateActiveThumbnail(currentIndex);
            }
        });
        
        btn.addEventListener('click', function() {
            if (thumbnailUrls[index]) {
                currentIndex = index;
                setPreviewFromIndex(index);
                updateActiveThumbnail(index);
                hoveredIndex = -1;
            }
        });
    });
    
    // ===== IMAGE HANDLING =====
    if (mainPreviewBox) {
        // Handle image load errors for background images
        const tempImg = new Image();
        thumbnailUrls.forEach((url, index) => {
            if (url) {
                tempImg.src = url;
                tempImg.onerror = function() {
                    thumbnailUrls[index] = null;
                    if (index === currentIndex) {
                        setPreviewFromIndex(currentIndex);
                    }
                };
            }
        });
    }
    
    // ===== NOTIFICATION SYSTEM =====
    function showNotification(message, type = 'success') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.product-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Determine icon based on type
        const iconFile = type === 'success' ? 'cart-shopping.svg' : 'cancel.svg';
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.setAttribute('role', 'alert');
        
        // Create icon element
        const iconSpan = document.createElement('span');
        iconSpan.className = 'notification-icon';
        const iconImg = document.createElement('img');
        iconImg.src = `../assets/image/icons/${iconFile}`;
        iconImg.alt = type === 'success' ? 'Success' : 'Error';
        iconImg.style.width = '20px';
        iconImg.style.height = '20px';
        iconSpan.appendChild(iconImg);
        
        // Create message element
        const messageSpan = document.createElement('span');
        messageSpan.className = 'notification-message';
        messageSpan.textContent = message;
        
        notification.appendChild(iconSpan);
        notification.appendChild(messageSpan);
        
        // Add styles for the notification content
        notification.style.cssText = `
            display: flex;
            align-items: center;
            gap: 12px;
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 12px 20px;
            background: #000000;
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            font-weight: 500;
            max-width: 300px;
            word-break: break-word;
            border-left: 4px solid ${type === 'success' ? '#FF8246' : '#FF8246'};
        `;
        
        document.body.appendChild(notification);
        
        // Add animation styles if not present
        if (!document.getElementById('notification-animations')) {
            const style = document.createElement('style');
            style.id = 'notification-animations';
            style.textContent = `
                @keyframes slideInRight {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOutRight {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        }
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // ===== CART ACTION =====
    async function handleCartAction(productId) {
        try {
            // Determine correct API path
            const currentPath = window.location.pathname;
            let apiPath = '../database/cart-handler.php';
            
            if (currentPath.includes('/pages/')) {
                apiPath = '../database/cart-handler.php';
            } else {
                apiPath = 'database/cart-handler.php';
            }
            
            console.log('Sending to cart:', productId); // Debug log
            
            const response = await fetch(apiPath, {
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
            console.log('Cart response:', result); // Debug log
            
            if (result.status === 'success') {
                showNotification('Added to cart', 'success');
                
                // Update cart count in header if function exists
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
    
    // ===== ADD TO CART BUTTON =====
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.dataset.productId;
            console.log('Add to cart clicked for product:', productId); // Debug log
            
            // Disable button and show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-text">Adding...</span>';
            
            const success = await handleCartAction(productId);
            
            if (!success) {
                this.disabled = false;
                this.innerHTML = originalText;
            } else {
                // Re-enable after 2 seconds
                setTimeout(() => {
                    this.disabled = false;
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    } else {
        console.error('Add to cart button not found in DOM');
    }
    
    // ===== BUY NOW BUTTON =====
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.dataset.productId;
            console.log('Buy now clicked for product:', productId); // Debug log
            
            // Show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-text">Redirecting...</span>';
            
            // Redirect to checkout
            window.location.href = 'checkout.php?product_id=' + productId + '&quantity=1';
        });
    } else {
        console.error('Buy now button not found in DOM');
    }
    
    // ===== RESPONSIVE HANDLING =====
    function handleResponsiveLayout() {
        const actionButtons = document.querySelector('.product-actions');
        if (!actionButtons) return;
        
        if (window.innerWidth <= 576) {
            actionButtons.style.flexDirection = 'column';
        } else {
            actionButtons.style.flexDirection = 'row';
        }
    }
    
    // Initial call
    handleResponsiveLayout();
    
    // Debounced resize handler
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(handleResponsiveLayout, 100);
    });
});

// Export for external use if needed
window.ProductDetails = {
    showNotification: function(message, type) {
        const notification = document.createElement('div');
        notification.className = `product-notification ${type}`;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 12px 20px;
            background: #000000;
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #FF8246;
        `;
        
        const iconImg = document.createElement('img');
        iconImg.src = `../assets/image/icons/${type === 'success' ? 'mail.svg' : 'cancel.svg'}`;
        iconImg.alt = type === 'success' ? 'Success' : 'Error';
        iconImg.style.width = '20px';
        iconImg.style.height = '20px';
        
        const messageSpan = document.createElement('span');
        messageSpan.textContent = message;
        
        notification.appendChild(iconImg);
        notification.appendChild(messageSpan);
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
};