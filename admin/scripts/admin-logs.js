document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logsList = document.getElementById('logsList');
    const filterTabs = document.querySelectorAll('.filter-tab');

    let currentFilter = 'all';
    let allLogs = [];

    // Filter functions
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

    function filterLogs(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderLogs(allLogs);
        } else {
            const filtered = allLogs.filter(log => log.log_type === filter);
            renderLogs(filtered);
        }
    }

    function formatTimestamp(timestamp) {
        if (!timestamp) return 'Unknown date';
        const date = new Date(timestamp);
        if (isNaN(date.getTime())) return 'Invalid date';
        
        return date.toLocaleString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    }

    function getLogIcon(logType) {
        switch(logType) {
            case 'user_registration': return 'profile.svg';
            case 'seller_application': return 'verified-empty.svg';
            case 'product_added': return 'package.svg';
            case 'order_placed': return 'order.svg';
            default: return 'time-update.svg';
        }
    }

    function getLogTypeDisplayName(logType) {
        switch(logType) {
            case 'user_registration': return 'User Registration';
            case 'seller_application': return 'Seller Application';
            case 'product_added': return 'Product Added';
            case 'order_placed': return 'Order Placed';
            default: return logType || 'Unknown Activity';
        }
    }

    function generateDescription(log) {
        // If the backend already provided a description, use it
        if (log.description && log.description !== 'Unknown activity') {
            return log.description;
        }
        
        // Otherwise generate based on log type and available data
        switch(log.log_type) {
            case 'user_registration':
                const userName = log.user_name || 
                                (log.first_name && log.last_name ? `${log.first_name} ${log.last_name}` : null) ||
                                log.username ||
                                log.email ||
                                'A new user';
                const email = log.email ? ` (${log.email})` : '';
                return `${userName}${email} registered`;
                
            case 'seller_application':
                const sellerName = log.user_name || 
                                  (log.first_name && log.last_name ? `${log.first_name} ${log.last_name}` : 'A seller');
                const business = log.business_name ? ` with business "${log.business_name}"` : '';
                const status = log.verification_status ? ` [Status: ${log.verification_status}]` : '';
                return `${sellerName} applied as seller${business}${status}`;
                
            case 'product_added':
                const productSeller = log.user_name || log.business_name || 'A seller';
                const product = log.product_name ? `"${log.product_name}"` : 'a new product';
                return `${productSeller} added product ${product}`;
                
            case 'order_placed':
                const customer = log.user_name || 'A customer';
                const orderId = log.order_id ? `#${log.order_id}` : '';
                return `${customer} placed order ${orderId}`;
                
            default:
                return 'Unknown activity';
        }
    }

    function renderLogs(logs) {
        if (!logs || logs.length === 0) {
            logsList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/time-update.svg" alt="No logs" class="empty-state-icon">
                        <h2>No logs found</h2>
                        <p class="empty-state-hint">Try adding some users, sellers, products, or orders first.</p>
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="logs-container">';

        logs.forEach((log, index) => {
            const iconFile = getLogIcon(log.log_type);
            const formattedTime = formatTimestamp(log.timestamp);
            const logTypeDisplay = getLogTypeDisplayName(log.log_type);
            const description = generateDescription(log);
            
            // Debug log to see what data we're getting
            console.log(`Log #${index}:`, log);

            html += `
                <div class="log-entry" data-log-type="${log.log_type}">
                    <div class="log-icon">
                        <img src="../assets/image/icons/${iconFile}" alt="${logTypeDisplay}">
                    </div>
                    <div class="log-content">
                        <div class="log-type-badge">${logTypeDisplay}</div>
                        <div class="log-description">${escapeHtml(description)}</div>
                        <div class="log-time">${formattedTime}</div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        logsList.innerHTML = html;
    }

    function escapeHtml(text) {
        if (!text) return '';
        return String(text)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    async function loadLogs(filter = 'all') {
        logsList.innerHTML = '<div class="loading">Loading logs...</div>';

        try {
            const response = await fetch(`../database/admin-logs-handler.php?action=get_logs&type=${filter}&t=${Date.now()}`);
            const result = await response.json();

            console.log('Logs API response:', result);

            if (result.status === 'success') {
                allLogs = result.data;
                console.log('Total logs loaded:', allLogs.length);
                filterLogs(currentFilter);
            } else {
                logsList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-content">
                            <img src="../assets/image/icons/time-update.svg" alt="Error" class="empty-state-icon">
                            <h2>Error Loading Logs</h2>
                            <p>${escapeHtml(result.message || 'Failed to load logs.')}</p>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading logs:', error);
            logsList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/time-update.svg" alt="Error" class="empty-state-icon">
                        <h2>Network Error</h2>
                        <p>Please check your connection and try again.</p>
                    </div>
                </div>
            `;
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            currentFilter = filter;
            setActiveFilter(filter);
            loadLogs(filter);
        });
    });

    // Initial load
    loadLogs('all');
});