/* Crooks-Cart-Collectives/scripts/seller-orders.js */
/* Reusing patterns from orders.js - Complete seller orders functionality */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('sellerOrdersList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    // Modal Elements - Matching orders.js pattern
    const confirmModal = document.getElementById('confirmModal');
    const confirmTitle = document.getElementById('confirmTitle');
    const confirmMessage = document.getElementById('confirmMessage');
    const cancelAction = document.getElementById('cancelAction');
    const confirmAction = document.getElementById('confirmAction');

    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    // State
    let currentAction = null;
    let currentItemId = null;
    let currentNewStatus = null;
    let allOrders = []; // Store all orders for filtering

    // ============= MODAL FUNCTIONS - Matching orders.js pattern =============
    function showConfirmModal(title, message, onConfirm) {
        confirmTitle.textContent = title;
        confirmMessage.textContent = message;
        confirmModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        currentAction = onConfirm;
    }

    function hideConfirmModal() {
        confirmModal.style.display = 'none';
        document.body.style.overflow = '';
        currentAction = null;
        currentItemId = null;
        currentNewStatus = null;
    }

    function showNotification(message, isError = false) {
        notificationMessage.textContent = message;
        const icon = notificationModal.querySelector('.modal-icon svg');
        if (icon) {
            icon.style.stroke = isError ? '#dc3545' : '#FF8246';
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Auto-hide after 3 seconds for success messages (matching orders.js)
        if (!isError) {
            setTimeout(() => {
                hideNotificationModal();
            }, 3000);
        }
    }

    function hideNotificationModal() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    // Close modals when clicking outside - Matching orders.js pattern
    confirmModal.addEventListener('click', (e) => {
        if (e.target === confirmModal) hideConfirmModal();
    });

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotificationModal();
    });

    notificationClose.addEventListener('click', hideNotificationModal);
    cancelAction.addEventListener('click', hideConfirmModal);

    confirmAction.addEventListener('click', () => {
        if (currentAction) {
            currentAction();
        }
        hideConfirmModal();
    });

    // Escape key handler - Matching orders.js pattern
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hideConfirmModal();
            hideNotificationModal();
        }
    });

    // ============= LOAD ORDERS - Using same endpoint as orders.js but for seller =============
    async function loadOrders() {
        if (!ordersList) return;

        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();

            if (result.status === 'success') {
                allOrders = result.data || [];
                renderOrders(allOrders, 'all');
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading seller orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
        }
    }

    // ============= RENDER ORDERS - Matching the structure of orders.js =============
    function renderOrders(orders, filter) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-orders">
                    <p>No orders yet.</p>
                </div>
            `;
            return;
        }

        // Filter orders based on selected tab
        let filteredOrders = orders;
        if (filter !== 'all') {
            filteredOrders = orders.filter(order => 
                order.seller_status === filter || 
                (order.items && order.items.some(item => item.status === filter))
            );
        }

        if (filteredOrders.length === 0) {
            ordersList.innerHTML = `<div class="empty-orders"><p>No ${filter} orders found.</p></div>`;
            return;
        }

        let html = '';

        filteredOrders.forEach(order => {
            const orderDate = order.order_date ? formatDate(order.order_date) : 'Date unavailable';
            const customerName = order.first_name && order.last_name 
                ? `${escapeHtml(order.first_name)} ${escapeHtml(order.last_name)}`
                : 'Customer';
            const sellerStatus = order.seller_status || 'pending';

            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="customer-info">${customerName}</span>
                            <span class="order-status-badge ${sellerStatus}">${sellerStatus}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <!-- Customer Details - Matching orders.php structure -->
                        <div class="customer-details">
                            <p><strong>Customer:</strong> ${customerName}</p>
                            <p><strong>Email:</strong> ${escapeHtml(order.email || 'N/A')}</p>
                            <p><strong>Phone:</strong> ${escapeHtml(order.contact_number || 'N/A')}</p>
                            <p><strong>Ship to:</strong> ${escapeHtml(order.shipping_address || 'N/A')}</p>
                        </div>

                        <!-- Order Items -->
                        <div class="order-items">
            `;

            let orderSubtotal = 0;
            order.items.forEach(item => {
                const imagePath = getImagePath(item.image_path);
                const productName = escapeHtml(item.product_name || 'Product');
                const itemStatus = item.status || 'pending';
                const quantity = item.quantity || 1;
                const price = parseFloat(item.price_at_time) || 0;
                const subtotal = parseFloat(item.subtotal) || (price * quantity);
                orderSubtotal += subtotal;

                html += `
                    <div class="order-item" data-item-id="${item.order_item_id}">
                        <img src="${imagePath}" alt="${productName}" class="order-item-image"
                             onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                        
                        <div class="order-item-details">
                            <h4>${productName}</h4>
                            <p>Quantity: ${quantity} × ₱${price.toFixed(2)}</p>
                            <p class="item-subtotal">Subtotal: ₱${subtotal.toFixed(2)}</p>
                            <span class="badge ${itemStatus}">${itemStatus}</span>
                        </div>
                        
                        <div class="order-item-actions">
                `;

                // Status update buttons based on current status - Following the workflow
                if (itemStatus === 'pending') {
                    html += `
                        <button class="action-btn complete" data-item="${item.order_item_id}" data-status="confirmed">
                            Confirm
                        </button>
                        <button class="action-btn cancel" data-item="${item.order_item_id}" data-status="cancelled">
                            Cancel
                        </button>
                    `;
                } else if (itemStatus === 'confirmed') {
                    html += `
                        <button class="action-btn complete" data-item="${item.order_item_id}" data-status="processing">
                            Process
                        </button>
                        <button class="action-btn cancel" data-item="${item.order_item_id}" data-status="cancelled">
                            Cancel
                        </button>
                    `;
                } else if (itemStatus === 'processing') {
                    html += `
                        <button class="action-btn complete" data-item="${item.order_item_id}" data-status="shipped">
                            Ship
                        </button>
                    `;
                } else if (itemStatus === 'shipped') {
                    html += `
                        <button class="action-btn complete" data-item="${item.order_item_id}" data-status="delivered">
                            Deliver
                        </button>
                    `;
                }

                html += `
                        </div>
                    </div>
                `;
            });

            html += `
                        </div>
                        
                        <div class="order-total">
                            <strong>Order Total:</strong> ₱${orderSubtotal.toFixed(2)}
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= HELPER FUNCTIONS - Same as orders.js =============
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

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                
                const itemId = btn.dataset.item;
                const newStatus = btn.dataset.status;

                if (!itemId || !newStatus) return;

                currentItemId = itemId;
                currentNewStatus = newStatus;

                let title = 'Update Order Status';
                let message = `Are you sure you want to mark this item as ${newStatus}?`;

                if (newStatus === 'cancelled') {
                    title = 'Cancel Order Item';
                    message = 'Are you sure you want to cancel this item? This action cannot be undone.';
                } else if (newStatus === 'delivered') {
                    title = 'Mark as Delivered';
                    message = 'Confirm that this item has been delivered to the customer.';
                }

                showConfirmModal(title, message, () => handleStatusUpdate(itemId, newStatus));
            });
        });
    }

    // ============= HANDLE STATUS UPDATE - Same pattern as orders.js =============
    async function handleStatusUpdate(itemId, newStatus) {
        const btn = document.querySelector(`[data-item="${itemId}"]`);
        if (btn) {
            btn.disabled = true;
            btn.textContent = 'Updating...';
        }

        try {
            const formData = new URLSearchParams();
            formData.append('action', 'update_item_status');
            formData.append('item_id', itemId);
            formData.append('status', newStatus);

            const response = await fetch('../database/order-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification('Order status updated successfully!');
                
                // Reload orders after short delay
                setTimeout(() => {
                    const activeFilter = document.querySelector('.filter-tab.active')?.dataset.filter || 'all';
                    loadOrders();
                }, 1500);
            } else {
                showNotification('Error: ' + (result.message || 'Failed to update status'), true);
                if (btn) {
                    btn.disabled = false;
                    btn.textContent = getButtonText(newStatus);
                }
            }
        } catch (error) {
            console.error('Status update error:', error);
            showNotification('Network error. Please try again.', true);
            if (btn) {
                btn.disabled = false;
                btn.textContent = getButtonText(newStatus);
            }
        }
    }

    function getButtonText(status) {
        const texts = {
            'confirmed': 'Confirm',
            'processing': 'Process',
            'shipped': 'Ship',
            'delivered': 'Deliver',
            'cancelled': 'Cancel'
        };
        return texts[status] || 'Update';
    }

    // ============= FILTER TAB EVENT LISTENERS - Same pattern as orders.js =============
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            const filter = tab.dataset.filter;
            renderOrders(allOrders, filter);
        });
    });

    // ============= INITIAL LOAD =============
    loadOrders();
});