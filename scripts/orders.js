/* Crooks-Cart-Collectives/scripts/orders.js */
/* Complete orders page functionality with star rating using icons */

document.addEventListener('DOMContentLoaded', () => {
    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('ordersList');
    
    // Review Modal Elements
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const reviewOrderItemId = document.getElementById('reviewOrderItemId');
    const reviewProductId = document.getElementById('reviewProductId');
    const ratingValue = document.getElementById('ratingValue');
    const ratingError = document.getElementById('ratingError');
    const cancelReview = document.getElementById('cancelReview');
    const submitReview = document.getElementById('submitReview');
    const starContainer = document.getElementById('starRatingContainer');
    
    // Cancel Modal Elements
    const cancelModal = document.getElementById('cancelModal');
    const cancelCancel = document.getElementById('cancelCancel');
    const confirmCancel = document.getElementById('confirmCancel');
    
    // Notification Modal Elements
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    // State
    let currentRating = 0;
    let currentCancelItemId = null;
    let stars = [];

    // ============= INITIALIZE STAR RATING =============
    // In orders.js, update the initStarRating function (around line 60-90)
function initStarRating() {
    if (!starContainer) return;
    
    starContainer.innerHTML = '';
    stars = [];
    
    for (let i = 1; i <= 5; i++) {
        const star = document.createElement('span');
        star.className = 'star';
        star.dataset.value = i;
        star.style.cssText = 'cursor: pointer; display: inline-block; width: 32px; height: 32px;';
        
        const img = document.createElement('img');
        img.src = '../assets/image/icons/star-empty.svg';
        img.alt = 'Star';
        img.style.width = '32px';
        img.style.height = '32px';
        img.dataset.filled = 'false';
        
        star.appendChild(img);
        starContainer.appendChild(star);
        stars.push(star);
        
        // Add hover/click handlers
        star.addEventListener('mouseover', function() {
            const value = parseInt(this.dataset.value);
            for (let j = 0; j < stars.length; j++) {
                const starImg = stars[j].querySelector('img');
                if (j < value) {
                    starImg.src = '../assets/image/icons/star-filled.svg';
                } else {
                    starImg.src = '../assets/image/icons/star-empty.svg';
                }
            }
        });
        
        star.addEventListener('mouseout', function() {
            for (let j = 0; j < stars.length; j++) {
                const starImg = stars[j].querySelector('img');
                if (j < currentRating) {
                    starImg.src = '../assets/image/icons/star-filled.svg';
                } else {
                    starImg.src = '../assets/image/icons/star-empty.svg';
                }
            }
        });
        
        star.addEventListener('click', function() {
            const value = parseInt(this.dataset.value);
            currentRating = value;
            ratingValue.value = value;
            
            for (let j = 0; j < stars.length; j++) {
                const starImg = stars[j].querySelector('img');
                starImg.src = j < value ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
            }
        });
    }
}
    
    // Highlight stars up to a certain value
    function highlightStars(value, className = 'active') {
        stars.forEach((star, index) => {
            const empty = star.querySelector('.star-empty');
            const filled = star.querySelector('.star-filled');
            
            if (index < value) {
                star.classList.add(className);
                if (empty) empty.style.display = 'none';
                if (filled) {
                    filled.style.display = 'block';
                    filled.style.filter = 'brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%)';
                }
            } else {
                star.classList.remove(className);
                if (empty) empty.style.display = 'block';
                if (filled) filled.style.display = 'none';
            }
        });
    }
    
    // Reset stars to current rating
    function resetStars() {
        if (currentRating > 0) {
            highlightStars(currentRating, 'active');
        } else {
            stars.forEach(star => {
                const empty = star.querySelector('.star-empty');
                const filled = star.querySelector('.star-filled');
                star.classList.remove('active', 'hover');
                if (empty) empty.style.display = 'block';
                if (filled) filled.style.display = 'none';
            });
        }
    }
    
    // Set rating value
    function setRating(value) {
        currentRating = value;
        if (ratingValue) ratingValue.value = value;
        if (ratingError) ratingError.textContent = '';
        highlightStars(value, 'active');
    }
    
    // Reset rating form
    function resetRatingForm() {
        currentRating = 0;
        if (ratingValue) ratingValue.value = '';
        if (ratingError) ratingError.textContent = '';
        if (reviewForm) reviewForm.reset();
        resetStars();
    }

    // ============= MODAL FUNCTIONS =============
    function showModal(modal) {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }
    
    function hideModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }
    
    function hideAllModals() {
        hideModal(reviewModal);
        hideModal(cancelModal);
        hideModal(notificationModal);
        resetRatingForm();
        currentCancelItemId = null;
    }
    
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
            const icon = notificationModal.querySelector('.modal-icon svg');
            if (icon) {
                icon.style.stroke = isError ? '#dc3545' : '#FF8246';
            }
        }
        showModal(notificationModal);
        
        // Auto-hide after 3 seconds for success messages
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_customer_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                renderOrders(result.data);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
        }
    }

    // ============= RENDER ORDERS =============
    // In orders.js, update the renderOrders function's action buttons section (around line 250-280)

// ============= RENDER ORDERS =============
function renderOrders(orders) {
    if (!orders || orders.length === 0) {
        ordersList.innerHTML = `
            <div class="empty-orders">
                <p>You haven't placed any orders yet.</p>
                <a href="products.php" class="btn-primary">Start Shopping</a>
            </div>
        `;
        return;
    }

    let html = '';

    orders.forEach(order => {
        const orderDate = order.order_date ? formatDate(order.order_date) : 'Date unavailable';
        const orderStatus = order.order_status || 'pending';
        const total = Number(order.total_amount).toFixed(2);
        const shippingAddress = escapeHtml(order.shipping_address || 'Address not available');

        html += `
            <div class="order-card">
                <div class="order-header">
                    <div class="order-header-left">
                        <span class="order-id">Order #${order.order_id}</span>
                        <span class="order-date">${orderDate}</span>
                    </div>
                    <div class="order-header-right">
                        <span class="order-status-badge ${orderStatus}">${orderStatus}</span>
                    </div>
                </div>

                <div class="order-body">
                    <!-- Column 1: Order Items -->
                    <div class="order-items-column">
                        <div class="order-items">
        `;

        // Group items by seller
        const itemsBySeller = {};
        order.items.forEach(item => {
            const sellerName = item.business_name || 'Unknown Seller';
            if (!itemsBySeller[sellerName]) {
                itemsBySeller[sellerName] = {
                    sellerName: sellerName,
                    items: []
                };
            }
            itemsBySeller[sellerName].items.push(item);
        });

        // Render items
        for (const [sellerName, sellerData] of Object.entries(itemsBySeller)) {
            sellerData.items.forEach(item => {
                const imagePath = getImagePath(item.image_path);
                const productName = escapeHtml(item.product_name || 'Product');
                const itemStatus = item.status || 'pending';
                const statusClass = itemStatus.toLowerCase();

                html += `
                    <div class="order-item" data-item-id="${item.order_item_id}">
                        <img src="${imagePath}" alt="${productName}" class="order-item-image"
                             onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                        
                        <div class="order-item-details">
                            <div class="order-item-seller">${escapeHtml(sellerName)}</div>
                            <div class="order-item-title">${productName}</div>
                            <div class="order-item-meta">
                                <span class="item-quantity">Qty: ${item.quantity}</span>
                                <span class="item-price">₱${Number(item.price_at_time).toFixed(2)}</span>
                            </div>
                            <div class="order-item-status">
                                <span class="status-badge ${statusClass}">${itemStatus}</span>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        html += `
                        </div>
                    </div>

                    <!-- Column 2: Price Summary -->
                    <div class="order-price-summary">
                        <div class="price-summary-title">Order Summary</div>
        `;

        // Calculate totals
        let subtotal = 0;
        let totalQuantity = 0;
        order.items.forEach(item => {
            subtotal += Number(item.subtotal || (item.price_at_time * item.quantity));
            totalQuantity += item.quantity;
        });

        html += `
                        <div class="price-row">
                            <span>Total Items</span>
                            <span class="price-value">${totalQuantity}</span>
                        </div>
                        
                        <div class="price-divider"></div>
                        
                        <div class="price-row">
                            <span>Subtotal</span>
                            <span class="price-value">₱${subtotal.toFixed(2)}</span>
                        </div>
                        
                        <div class="price-row">
                            <span>Shipping Fee</span>
                            <span class="price-value">Free</span>
                        </div>
                        
                        <div class="price-divider"></div>
                        
                        <div class="price-row price-total">
                            <span>Total</span>
                            <span class="price-value">₱${total}</span>
                        </div>
                    </div>

                    <!-- Column 3: Shipping + Actions -->
                    <div class="order-shipping-column">
                        <div class="order-shipping-location">
                            <div class="shipping-address-title">Shipping Address</div>
                            <div class="shipping-address-text">${shippingAddress}</div>
                        </div>

                        <div class="order-item-actions">
        `;

        // Add action buttons for each item - SIMPLIFIED STATUSES
        order.items.forEach(item => {
            const itemStatus = item.status || 'pending';
            const canCancel = itemStatus === 'pending';
            const reviewed = item.reviewed || false;

            if (itemStatus === 'delivered' && !reviewed) {
                html += `
                    <button class="action-btn action-btn-review" 
                            data-item="${item.order_item_id}" 
                            data-product="${item.product_id}">
                        Write Review
                    </button>
                `;
            } else if (reviewed) {
                html += `
                    <span class="reviewed-badge">
                        Reviewed
                    </span>
                `;
            }
            
            if (canCancel) {
                html += `
                    <button class="action-btn action-btn-cancel" 
                            data-item="${item.order_item_id}">
                        Cancel Item
                    </button>
                `;
            }
            
            html += `
                <a href="product-details.php?id=${item.product_id}" 
                   class="action-btn action-btn-view">
                    View Product
                </a>
            `;
        });

        html += `
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    ordersList.innerHTML = html;
    attachEventListeners();
}

    // ============= HELPER FUNCTIONS =============
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return date.toLocaleDateString(undefined, options);
    }
    
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        if (path.startsWith('../')) return path;
        return '../' + path;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ===== ATTACH EVENT LISTENERS =====
    function attachEventListeners() {
        // Review buttons
        document.querySelectorAll('.action-btn-review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (reviewOrderItemId) reviewOrderItemId.value = btn.dataset.item;
                if (reviewProductId) reviewProductId.value = btn.dataset.product;
                resetRatingForm();
                showModal(reviewModal);
            });
        });
        
        // Cancel buttons
        document.querySelectorAll('.action-btn-cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentCancelItemId = btn.dataset.item;
                showModal(cancelModal);
            });
        });
    }

    // ============= REVIEW SUBMISSION =============
    if (reviewForm) {
        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Validate rating
            if (currentRating === 0) {
                if (ratingError) ratingError.textContent = 'Please select a rating';
                return;
            }
            
            // Disable submit button
            if (submitReview) {
                submitReview.disabled = true;
                submitReview.textContent = 'Submitting...';
            }
            
            try {
                const formData = new FormData();
                formData.append('action', 'add_review');
                formData.append('order_item_id', reviewOrderItemId?.value || '');
                formData.append('product_id', reviewProductId?.value || '');
                formData.append('rating', currentRating);
                formData.append('comment', document.getElementById('comment')?.value || '');
                
                const response = await fetch('../database/review-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Review submitted successfully!');
                    hideModal(reviewModal);
                    resetRatingForm();
                    loadOrders(); // Reload orders to update review status
                } else {
                    showNotification(result.message || 'Failed to submit review', true);
                }
            } catch (error) {
                console.error('Review error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                // Re-enable submit button
                if (submitReview) {
                    submitReview.disabled = false;
                    submitReview.textContent = 'Submit Review';
                }
            }
        });
    }

    // ============= CANCEL ITEM =============
    if (confirmCancel) {
        confirmCancel.addEventListener('click', async () => {
            if (!currentCancelItemId) return;
            
            confirmCancel.disabled = true;
            confirmCancel.textContent = 'Processing...';
            
            try {
                const formData = new URLSearchParams();
                formData.append('action', 'cancel_item');
                formData.append('item_id', currentCancelItemId);
                
                const response = await fetch('../database/order-handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Item cancelled successfully');
                    hideModal(cancelModal);
                    loadOrders(); // Reload orders
                } else {
                    showNotification(result.message || 'Failed to cancel item', true);
                }
            } catch (error) {
                console.error('Cancel error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                confirmCancel.disabled = false;
                confirmCancel.textContent = 'Yes, Cancel Item';
                currentCancelItemId = null;
            }
        });
    }

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelCancel) {
        cancelCancel.addEventListener('click', () => {
            hideModal(cancelModal);
            currentCancelItemId = null;
        });
    }

    if (cancelReview) {
        cancelReview.addEventListener('click', () => {
            hideModal(reviewModal);
            resetRatingForm();
        });
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', () => {
            hideModal(notificationModal);
        });
    }

    // Close modals when clicking outside
    [cancelModal, reviewModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    // Escape key 
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // Initialize star rating
    initStarRating();

    // Load orders on page start
    loadOrders();
});