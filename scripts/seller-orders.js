/* Crooks-Cart-Collectives/scripts/seller-orders.js */
/* UPDATED: Uses database statuses: ordered, delivered, cancelled */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('sellerOrdersList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    // Modal Elements
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
    let currentOrderId = null;
    let currentNewStatus = null;
    let allOrders = []; // Store all orders for filtering

    // ============= MODAL FUNCTIONS =============
    function showConfirmModal(title, message, onConfirm) {
        if (!confirmModal || !confirmTitle || !confirmMessage) return;
        
        confirmTitle.textContent = title;
        confirmMessage.textContent = message;
        confirmModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        currentAction = onConfirm;
    }

    function hideConfirmModal() {
        if (confirmModal) confirmModal.style.display = 'none';
        document.body.style.overflow = '';
        currentAction = null;
        currentOrderId = null;
        currentNewStatus = null;
    }

    function showNotification(message, isError = false) {
        if (!notificationModal || !notificationMessage) return;
        
        notificationMessage.textContent = message;
        const icon = notificationModal.querySelector('.modal-icon svg');
        if (icon) {
            icon.style.stroke = isError ? '#dc3545' : '#FF8246';
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        if (!isError) {
            setTimeout(() => {
                hideNotificationModal();
            }, 3000);
        }
    }

    function hideNotificationModal() {
        if (notificationModal) notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    // Close modals when clicking outside
    if (confirmModal) {
        confirmModal.addEventListener('click', (e) => {
            if (e.target === confirmModal) hideConfirmModal();
        });
    }

    if (notificationModal) {
        notificationModal.addEventListener('click', (e) => {
            if (e.target === notificationModal) hideNotificationModal();
        });
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotificationModal);
    }

    if (cancelAction) {
        cancelAction.addEventListener('click', hideConfirmModal);
    }

    if (confirmAction) {
        confirmAction.addEventListener('click', () => {
            if (currentAction) {
                currentAction();
            }
            hideConfirmModal();
        });
    }

    // Escape key handler
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hideConfirmModal();
            hideNotificationModal();
        }
    });

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;

        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';

        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();

            if (result.status === 'success') {
                allOrders = result.data || [];
                const activeFilter = document.querySelector('.filter-tab.active')?.dataset.filter || 'all';
                renderOrders(allOrders, activeFilter);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading seller orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
        }
    }

    // ============= RENDER ORDERS (FLAT LIST) =============
    function renderOrders(orders, filter) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-orders">
                    <p>No orders yet.</p>
                    <a href="seller-products.php" class="btn-primary">Manage Products</a>
                </div>
            `;
            return;
        }

        // Filter orders based on selected tab
        let filteredOrders = orders;
        if (filter !== 'all') {
            filteredOrders = orders.filter(order => order.status === filter);
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
            const status = order.status || 'ordered';
            const statusClass = status.toLowerCase();
            const imagePath = getImagePath(order.image_path);

            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="customer-info">${customerName}</span>
                            <span class="order-status-badge ${statusClass}">${status}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <!-- Customer Details -->
                        <div class="customer-details">
                            <p><strong>Customer:</strong> ${customerName}</p>
                            <p><strong>Email:</strong> ${escapeHtml(order.email || 'N/A')}</p>
                            <p><strong>Phone:</strong> ${escapeHtml(order.contact_number || 'N/A')}</p>
                            <p><strong>Ship to:</strong> ${escapeHtml(order.shipping_address || 'N/A')}</p>
                        </div>

                        <!-- Product Details -->
                        <div class="product-details">
                            <img src="${imagePath}" alt="${escapeHtml(order.product_name)}" 
                                 class="product-thumbnail"
                                 onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                            
                            <div class="product-info">
                                <h4>${escapeHtml(order.product_name)}</h4>
                                <p>Quantity: ${order.quantity}</p>
                                <p>Price: ₱${Number(order.price_at_time).toFixed(2)}</p>
                                <p class="subtotal">Subtotal: ₱${Number(order.subtotal).toFixed(2)}</p>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="order-actions">
            `;

            // Only show actions for 'ordered' status
            if (status === 'ordered') {
                html += `
                    <button class="action-btn complete" data-order-id="${order.order_id}" data-status="delivered">
                        <span class="btn-text">Mark Delivered</span>
                    </button>
                    <button class="action-btn cancel" data-order-id="${order.order_id}" data-status="cancelled">
                        <span class="btn-text">Cancel Order</span>
                    </button>
                `;
            } else {
                html += `
                    <span class="status-badge ${statusClass}">
                        ${status}
                    </span>
                `;
            }

            html += `
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

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        document.querySelectorAll('.action-btn.complete, .action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                
                const orderId = btn.dataset.orderId;
                const newStatus = btn.dataset.status;

                if (!orderId || !newStatus) return;

                currentOrderId = orderId;
                currentNewStatus = newStatus;

                let title = 'Update Order Status';
                let message = `Are you sure you want to mark this order as ${newStatus}?`;

                if (newStatus === 'cancelled') {
                    title = 'Cancel Order';
                    message = 'Are you sure you want to cancel this order? This action cannot be undone and will restore product stock.';
                } else if (newStatus === 'delivered') {
                    title = 'Mark as Delivered';
                    message = 'Confirm that this order has been delivered to the customer. This will allow the customer to leave a review.';
                }

                showConfirmModal(title, message, () => handleStatusUpdate(orderId, newStatus));
            });
        });
    }

    // ============= HANDLE STATUS UPDATE =============
    async function handleStatusUpdate(orderId, newStatus) {
        const btn = document.querySelector(`[data-order-id="${orderId}"]`);
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<span class="btn-icon">⏳</span><span class="btn-text">Updating...</span>';
        }

        try {
            const formData = new URLSearchParams();
            formData.append('action', 'update_item_status');
            formData.append('order_id', orderId);
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
                showNotification(`Order marked as ${newStatus} successfully!`);
                
                // Reload orders after short delay
                setTimeout(() => {
                    const activeFilter = document.querySelector('.filter-tab.active')?.dataset.filter || 'all';
                    loadOrders();
                }, 1500);
            } else {
                showNotification('Error: ' + (result.message || 'Failed to update status'), true);
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = newStatus === 'delivered' 
                        ? '<span class="btn-text">Mark Delivered</span>'
                        : '<span class="btn-text">Cancel Order</span>';
                }
            }
        } catch (error) {
            console.error('Status update error:', error);
            showNotification('Network error. Please try again.', true);
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = newStatus === 'delivered' 
                    ? '<span class="btn-text">Mark Delivered</span>'
                    : '<span class="btn-text">Cancel Order</span>';
            }
        }
    }

    // ============= FILTER TAB EVENT LISTENERS =============
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            const filter = tab.dataset.filter;
            renderOrders(allOrders, filter);
        });
    });

    // ============= CHECK FOR URL HASH =============
    function checkUrlHash() {
        const hash = window.location.hash;
        if (hash && hash.startsWith('#order-')) {
            setTimeout(() => {
                const element = document.getElementById(hash.substring(1));
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth' });
                    element.style.backgroundColor = '#fff3e0';
                    setTimeout(() => {
                        element.style.backgroundColor = '';
                    }, 2000);
                }
            }, 500);
        }
    }

    // ============= INITIAL LOAD =============
    loadOrders();
    checkUrlHash();
});

// Add some CSS for the refresh button and improved UI
const style = document.createElement('style');
style.textContent = `
    .refresh-btn {
        background: #FF8246;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 15px;
        transition: background 0.3s;
    }
    
    .refresh-btn:hover {
        background: #e66a2c;
    }
    
    .order-item-actions .btn-icon {
        margin-right: 5px;
        font-size: 14px;
    }
    
    .order-item-actions .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 14px;
    }
    
    .order-item-actions .status-badge.delivered {
        background: #d4edda;
        color: #155724;
    }
    
    .order-item-actions .status-badge.cancelled {
        background: #f8d7da;
        color: #721c24;
    }
    
    .status-icon {
        margin-right: 5px;
        font-size: 14px;
    }
`;
document.head.appendChild(style);