/* Crooks-Cart-Collectives/scripts/seller-orders.js */
/* Revised with 1 second delay on status update for smooth UX */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('sellerOrdersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    // Confirmation Modal Elements (seller version)
    const confirmModal = document.getElementById('confirmModal');
    const confirmTitle = document.getElementById('confirmTitle');
    const confirmMessage = document.getElementById('confirmMessage');
    const cancelAction = document.getElementById('cancelAction');
    const confirmAction = document.getElementById('confirmAction');
    
    // Notification Modal Elements
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    // State
    let currentAction = null;          // 'delivered' or 'cancelled'
    let currentOrderId = null;
    let currentFilter = 'all';
    let allOrders = [];

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
        hideModal(confirmModal);
        hideModal(notificationModal);
        currentAction = null;
        currentOrderId = null;
    }
    
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        showModal(notificationModal);
        
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= FILTER FUNCTIONS =============
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterOrders(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderOrders(allOrders);
        } else {
            const filtered = allOrders.filter(order => order.status === filter);
            renderOrders(filtered);
        }
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                allOrders = result.data;
                filterOrders(currentFilter);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
        }
    }

    // ============= FORMAT DATE =============
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

    // ============= GET IMAGE PATH =============
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        if (path.startsWith('../')) return path;
        return '../' + path;
    }

    // ============= ESCAPE HTML =============
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============= RENDER ORDERS =============
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-orders">
                    <p>No orders found.</p>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            const imagePath = getImagePath(order.image_path);
            
            const customerName = `${escapeHtml(order.first_name || '')} ${escapeHtml(order.last_name || '')}`.trim() || 'Customer';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);

            // Build event activity – includes placed, delivered, cancelled timestamps
            let eventHtml = '';
            eventHtml += `<div class="event-item customer-event"><span class="event-icon"><img src="../assets/image/icons/order.svg" alt="Order placed" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%); vertical-align: middle;"></span><span class="event-text">Order placed: ${orderDate}</span></div>`;

            if (order.status === 'delivered' && order.delivered_at) {
                const deliveredDate = formatDate(order.delivered_at);
                eventHtml += `<div class="event-item delivered-event"><span class="event-icon"><img src="../assets/image/icons/package.svg" alt="Item sold" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">Item sold: ${deliveredDate}</span></div>`;
            }

            if (order.status === 'cancelled' && order.cancelled_at) {
                const cancelledDate = formatDate(order.cancelled_at);
                const cancelledBy = order.cancelled_by === 'customer' ? 'Customer' : 'Seller';
                eventHtml += `<div class="event-item cancelled-event"><span class="event-icon"><img src="../assets/image/icons/cancel.svg" alt="Cancelled" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">${cancelledBy} cancelled: ${cancelledDate}</span></div>`;
            }
           // Shipping column
            const shippingHtml = `
                <div class="order-shipping-column">
                    <div class="column-title">Customer Details</div>
                    <div class="shipping-details">
                        <p class="customer-name">
                            <strong>Name:</strong> ${escapeHtml(order.first_name || '')} ${escapeHtml(order.last_name || '')}
                        </p>
                        <p class="shipping-address-text">
                            <strong>Address:</strong> ${escapeHtml(order.shipping_address || 'No address provided')}
                        </p>
                        <p class="customer-contact">
                            <strong>Contact:</strong> ${escapeHtml(order.contact_number || 'N/A')}
                        </p>
                        <p class="customer-email">
                            <strong>Email:</strong> ${escapeHtml(order.email || 'N/A')}
                        </p>
                        <!-- Edit controls hidden (not needed for seller) -->
                        <div class="shipping-edit-controls" style="display: none;">
                            <textarea class="shipping-edit-textarea" style="display: none;">${escapeHtml(order.shipping_address || '')}</textarea>
                            <div class="shipping-buttons">
                                <button class="action-btn edit-shipping" style="display: none;">Edit</button>
                                <button class="action-btn save-shipping" style="display: none;">Save</button>
                                <button class="action-btn reset-shipping" style="display: none;">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Start order card
            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="order-status-badge ${statusClass}">${displayStatus}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <div class="order-product-column">
                            <div class="column-title">Product Details</div>
                            <div class="product-details">
                                <img src="${imagePath}" alt="${escapeHtml(order.product_name)}" 
                                     class="product-thumbnail"
                                     onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                <div class="product-info">
                                    <h4>${escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Customer:</span> ${customerName}</p>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="order-event-column">
                            <div class="column-title">Event Activity</div>
                            <div class="event-activity-content">
                                ${eventHtml}
                            </div>
                        </div>

                        ${shippingHtml}

                        <div class="order-price-summary">
                            <div class="column-title">Order Summary</div>
                            <div class="price-summary-details">
                                <div class="price-row">
                                    <span>Subtotal</span>
                                    <span class="price-value">₱${subtotal}</span>
                                </div>
                                <div class="price-row">
                                    <span>Shipping</span>
                                    <span class="price-value free-shipping">Free</span>
                                </div>
                                <div class="price-divider"></div>
                                <div class="price-row price-total">
                                    <span>Total</span>
                                    <span class="price-value">₱${total}</span>
                                </div>
                            </div>
            `;

            // Action buttons – only shown for pending orders
            if (order.status === 'pending') {
                html += `
                    <div class="order-actions">
                        <button class="action-btn complete" data-order-id="${order.order_id}">
                            Mark as Delivered
                        </button>
                        <button class="action-btn cancel" data-order-id="${order.order_id}">
                            Cancel Order
                        </button>
                    </div>
                `;
            }
            // For non-pending orders, no actions are displayed at all
            
            html += `
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        // Deliver button (class "complete" now)
        document.querySelectorAll('.action-btn.complete').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                
                currentAction = 'delivered';
                currentOrderId = orderId;
                
                if (confirmTitle) confirmTitle.textContent = 'Confirm Delivery';
                if (confirmMessage) confirmMessage.textContent = 'Mark this order as delivered? This action cannot be undone.';
                
                showModal(confirmModal);
            });
        });
        
        // Cancel button
        document.querySelectorAll('.action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                
                currentAction = 'cancelled';
                currentOrderId = orderId;
                
                if (confirmTitle) confirmTitle.textContent = 'Cancel Order';
                if (confirmMessage) confirmMessage.textContent = 'Are you sure you want to cancel this order? This will restore stock quantity.';
                
                showModal(confirmModal);
            });
        });
    }

    // ============= UPDATE ORDER STATUS =============
    async function updateOrderStatus() {
        if (!currentOrderId || !currentAction) return;
        
        if (confirmAction) {
            confirmAction.disabled = true;
            confirmAction.textContent = 'Processing...';
        }
        
        try {
            const formData = new URLSearchParams();
            formData.append('action', 'update_item_status');
            formData.append('order_id', currentOrderId);
            formData.append('status', currentAction);
            
            const response = await fetch('../database/order-handler.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: formData
            });
            
            const result = await response.json();
            
            if (result.status === 'success') {
                showNotification(`Order marked as ${currentAction} successfully`);
                hideModal(confirmModal);
                
                // 1 second delay before reloading orders
                setTimeout(() => {
                    loadOrders(); // refresh list
                }, 1000);
            } else {
                showNotification(result.message || 'Failed to update order', true);
            }
        } catch (error) {
            console.error('Update status error:', error);
            showNotification('Network error. Please try again.', true);
        } finally {
            if (confirmAction) {
                confirmAction.disabled = false;
                confirmAction.textContent = 'Confirm';
            }
            currentAction = null;
            currentOrderId = null;
        }
    }

    // ============= FILTER TAB CLICK HANDLERS =============
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterOrders(filter);
        });
    });

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelAction) {
        cancelAction.addEventListener('click', () => {
            hideModal(confirmModal);
            currentAction = null;
            currentOrderId = null;
        });
    }

    if (confirmAction) {
        confirmAction.addEventListener('click', updateOrderStatus);
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', () => {
            hideModal(notificationModal);
        });
    }

    [confirmModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // ============= INITIAL LOAD =============
    loadOrders();
});