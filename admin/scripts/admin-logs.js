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
        const date = new Date(timestamp);
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
            case 'user_login': return 'profile.svg';
            case 'seller_application': return 'verified-empty.svg';
            case 'product_added': return 'package.svg';
            case 'order_placed': return 'order.svg';
            default: return 'time-update.svg';
        }
    }

    function getLogDescription(log) {
        switch(log.log_type) {
            case 'user_login':
                return `${log.user_name} (${log.email}) logged in`;
            case 'seller_application':
                return `${log.user_name} applied as seller - ${log.business_name || 'No business name'}`;
            case 'product_added':
                return `${log.user_name} added product: ${log.product_name}`;
            case 'order_placed':
                return `${log.user_name} ordered ${log.quantity}x ${log.product_name}`;
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
                    </div>
                </div>
            `;
            return;
        }

        let html = '<div class="logs-container">';

        logs.forEach(log => {
            const iconFile = getLogIcon(log.log_type);
            const description = getLogDescription(log);
            const formattedTime = formatTimestamp(log.timestamp);

            html += `
                <div class="log-entry">
                    <div class="log-icon">
                        <img src="../assets/image/icons/${iconFile}" alt="${log.log_type}">
                    </div>
                    <div class="log-content">
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
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function loadLogs(filter = 'all') {
        logsList.innerHTML = '<div class="loading">Loading logs...</div>';

        try {
            const response = await fetch(`../database/admin-logs-handler.php?action=get_logs&type=${filter}`);
            const result = await response.json();

            if (result.status === 'success') {
                allLogs = result.data;
                filterLogs(currentFilter);
            } else {
                logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load logs.</p></div></div>';
            }
        } catch (error) {
            console.error('Error loading logs:', error);
            logsList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p></div></div>';
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