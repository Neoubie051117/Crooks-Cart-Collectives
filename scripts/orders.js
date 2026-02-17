/* Crooks-Cart-Collectives/scripts/orders.js - REVISED */
/* Seller name moved into item details, product link removed */

document.addEventListener('DOMContentLoaded', () => {
    const ordersList = document.getElementById('ordersList');
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const cancelReview = document.getElementById('cancelReview');
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('ratingValue');
    
    const cancelModal = document.getElementById('cancelModal');
    const cancelCancel = document.getElementById('cancelCancel');
    const confirmCancel = document.getElementById('confirmCancel');
    
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    let currentRating = 0;
    let currentCancelItemId = null;

    // ===== MODAL FUNCTIONS =====
    function showModal(modal) { 
        if (modal) modal.style.display = 'flex'; 
    }
    
    function hideModal(modal) { 
        if (modal) modal.style.display = 'none'; 
    }

    function hideAllModals() {
        hideModal(reviewModal);
        hideModal(cancelModal);
        hideModal(notificationModal);
        resetReviewForm();
        currentCancelItemId = null;
    }

    function showNotification(message) {
        if (notificationMessage) notificationMessage.textContent = message;
        showModal(notificationModal);
    }

    // ===== STAR RATING =====
    if (stars.length > 0) {
        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                const val = parseInt(star.dataset.value);
                stars.forEach((s, i) => {
                    if (i < val) s.classList.add('hover');
                    else s.classList.remove('hover');
                });
            });
            
            star.addEventListener('mouseout', () => {
                stars.forEach(s => s.classList.remove('hover'));
            });
            
            star.addEventListener('click', () => {
                currentRating = parseInt(star.dataset.value);
                if (ratingInput) ratingInput.value = currentRating;
                
                stars.forEach((s, i) => {
                    if (i < currentRating) {
                        s.classList.add('active');
                        s.textContent = '★';
                    } else {
                        s.classList.remove('active');
                        s.textContent = '☆';
                    }
                });
            });
        });
    }

    // ===== LOAD ORDERS =====
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

    // ===== RENDER ORDERS - SELLER NAME IN ITEM DETAILS =====
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-orders">
                    <p>You haven't placed any orders yet.</p>
                    <a href="products.php" class="btn">Start Shopping</a>
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
                        items: [],
                        totalQuantity: 0
                    };
                }
                itemsBySeller[sellerName].items.push(item);
                itemsBySeller[sellerName].totalQuantity += item.quantity;
            });

            // Render items - seller name inside item details
            for (const [sellerName, sellerData] of Object.entries(itemsBySeller)) {
                sellerData.items.forEach(item => {
                    const imagePath = getImagePath(item.image_path);
                    const productName = escapeHtml(item.name || 'Product');

                    html += `
                        <div class="order-item">
                            <img src="${imagePath}" alt="${productName}" class="order-item-image"
                                 onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                            
                            <div class="order-item-details">
                                <div class="order-item-seller">${escapeHtml(sellerName)}</div>
                                <div class="order-item-gap"></div>
                                <div class="order-item-title">${productName}</div>
                                <div class="order-item-meta">

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

            // Calculate subtotal from items
            let subtotal = 0;
            order.items.forEach(item => {
                subtotal += Number(item.subtotal || (item.price_at_time * item.quantity));
            });

            // Calculate total quantity
            const totalQuantity = order.items.reduce((sum, item) => sum + item.quantity, 0);

            html += `
                            <div class="price-row">
                                <span>Quantity</span>
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

            // Add action buttons for each item (only View Product and action buttons)
            order.items.forEach(item => {
                const itemStatus = item.status || 'pending';
                const canCancel = ['pending', 'confirmed'].includes(itemStatus);
                const reviewed = item.reviewed > 0;

                if (itemStatus === 'delivered' && !reviewed) {
                    html += `
                        <button class="action-btn action-btn-review" 
                                data-item="${item.order_item_id}" 
                                data-product="${item.product_id}">
                            Write Review
                        </button>
                    `;
                } else if (reviewed) {
                    html += `<span class="reviewed-badge">✓ Reviewed</span>`;
                }
                
                if (canCancel) {
                    html += `
                        <button class="action-btn action-btn-cancel" 
                                data-item="${item.order_item_id}">
                            Cancel Order
                        </button>
                    `;
                }
                
                // Always show View Product button
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

    // ===== HELPER FUNCTIONS =====
    function formatDate(dateString) {
        const date = new Date(dateString);
        
        // Format date part: February 16, 2026 (full month name)
        const dateOptions = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric'
        };
        const formattedDate = date.toLocaleDateString(undefined, dateOptions);
        
        // Format time part: 06:11 PM
        const timeOptions = {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        };
        const formattedTime = date.toLocaleTimeString(undefined, timeOptions);
        
        return `${formattedDate} - ${formattedTime}`;
    }
    
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
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
                const orderItemId = document.getElementById('reviewOrderItemId');
                const productId = document.getElementById('reviewProductId');
                
                if (orderItemId) orderItemId.value = btn.dataset.item;
                if (productId) productId.value = btn.dataset.product;
                
                resetReviewForm();
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

    // ===== REVIEW FORM RESET =====
    function resetReviewForm() {
        if (reviewForm) reviewForm.reset();
        
        stars.forEach(s => {
            s.classList.remove('active', 'hover');
            s.textContent = '☆';
        });
        
        currentRating = 0;
        if (ratingInput) ratingInput.value = '';
    }

    // ===== REVIEW SUBMISSION =====
    if (reviewForm) {
        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            if (!ratingInput || !ratingInput.value) {
                showNotification('Please select a rating');
                return;
            }
            
            const formData = new FormData();
            formData.append('action', 'add_review');
            formData.append('order_item_id', document.getElementById('reviewOrderItemId')?.value || '');
            formData.append('product_id', document.getElementById('reviewProductId')?.value || '');
            formData.append('rating', ratingInput.value);
            formData.append('comment', document.getElementById('comment')?.value || '');
            
            try {
                const response = await fetch('../database/review-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Review submitted successfully!');
                    hideModal(reviewModal);
                    resetReviewForm();
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to submit review');
                }
            } catch (error) {
                console.error('Review error:', error);
                showNotification('Network error. Please try again.');
            }
        });
    }

    // ===== CANCEL ITEM =====
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
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to cancel item');
                }
            } catch (error) {
                console.error('Cancel error:', error);
                showNotification('Network error. Please try again.');
            } finally {
                confirmCancel.disabled = false;
                confirmCancel.textContent = 'Confirm';
                currentCancelItemId = null;
            }
        });
    }

    // ===== MODAL CLOSE HANDLERS =====
    if (cancelCancel) {
        cancelCancel.addEventListener('click', () => {
            hideModal(cancelModal);
            currentCancelItemId = null;
        });
    }

    if (cancelReview) {
        cancelReview.addEventListener('click', () => {
            hideModal(reviewModal);
            resetReviewForm();
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

    // Load orders on page start
    loadOrders();
});