/* Crooks-Cart-Collectives/scripts/product-detail.js */
/* Revised with seller-new-product style hover preview and thumbnail navigation */
/* Added seller product unavailable button handler */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ===== DOM ELEMENTS =====
    const mainPreviewBox = document.getElementById('mainPreviewBox');
    const previewPlaceholder = document.getElementById('previewPlaceholder');
    const previewImage = document.getElementById('previewImage');
    const thumbnailButtons = document.querySelectorAll('.thumbnail-image-btn');
    
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const buyNowBtn = document.querySelector('.buy-now-btn');
    const unavailableBtn = document.getElementById('productUnavailableBtn');
    
    // ===== STATE =====
    let currentIndex = 0;
    let hoveredIndex = -1;
    const thumbnailUrls = [];
    const isPlaceholder = [];
    
    // Collect thumbnail info from buttons
    thumbnailButtons.forEach(btn => {
        const bgImage = btn.style.backgroundImage;
        if (bgImage && bgImage !== 'none' && bgImage !== '') {
            const url = bgImage.slice(5, -2); // Remove url(" and ")
            thumbnailUrls.push(url);
            isPlaceholder.push(false);
        } else {
            thumbnailUrls.push(null);
            isPlaceholder.push(btn.classList.contains('placeholder') || btn.classList.contains('empty-slot'));
        }
    });
    
    // ===== THUMBNAIL NAVIGATION =====
    function setPreviewFromIndex(index) {
        if (!previewImage || !previewPlaceholder) return;
        
        if (thumbnailUrls[index] && !isPlaceholder[index]) {
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
            btn.classList.remove('hover');
        });
    }
    
    // Mouse enter for hover preview
    thumbnailButtons.forEach((btn, index) => {
        btn.addEventListener('mouseenter', function() {
            if (thumbnailUrls[index] && !isPlaceholder[index]) {
                hoveredIndex = index;
                setPreviewFromIndex(index);
                
                // Add hover class
                this.classList.add('hover');
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            this.classList.remove('hover');
            
            if (hoveredIndex !== -1) {
                hoveredIndex = -1;
                // Return to current index
                setPreviewFromIndex(currentIndex);
                updateActiveThumbnail(currentIndex);
            }
        });
        
        btn.addEventListener('click', function() {
            if (thumbnailUrls[index] && !isPlaceholder[index]) {
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
            if (url && !isPlaceholder[index]) {
                tempImg.src = url;
                tempImg.onerror = function() {
                    thumbnailUrls[index] = null;
                    isPlaceholder[index] = true;
                    if (index === currentIndex) {
                        setPreviewFromIndex(currentIndex);
                    }
                    // Update button to show placeholder
                    const btn = thumbnailButtons[index];
                    if (btn) {
                        btn.classList.add('placeholder');
                        btn.style.backgroundImage = '';
                        if (!btn.querySelector('.thumbnail-image')) {
                            const img = document.createElement('img');
                            img.src = '../assets/image/icons/package.svg';
                            img.alt = 'No image';
                            img.className = 'thumbnail-image';
                            btn.appendChild(img);
                        }
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
        
        document.body.appendChild(notification);
        
        // Remove notification after 2 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 2000);
    }
    
    // ===== HANDLE UNAVAILABLE BUTTON (FOR SELLERS) =====
    if (unavailableBtn) {
        unavailableBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Show notification
            showNotification('You sell this product', 'info');
        });
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
    }
    
    // ===== BUY NOW BUTTON =====
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const productId = this.dataset.productId;
            
            // Show loading state
            this.disabled = true;
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="btn-text">Redirecting...</span>';
            
            // Redirect to checkout
            window.location.href = 'checkout.php?product_id=' + productId + '&quantity=1';
        });
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
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }
};