/* Crooks-Cart-Collectives/scripts/error-handler.js */
/* Global error handling and logging functions */

(function() {
    'use strict';

    // Store original console methods
    const originalConsole = {
        log: console.log,
        error: console.error,
        warn: console.warn,
        info: console.info
    };

    // Error logging configuration
    const ERROR_CONFIG = {
        logToConsole: true,
        logToServer: false, // Set to true to enable server-side logging
        maxLogEntries: 100,
        showNotifications: true
    };

    // In-memory log storage
    const errorLog = [];
    const MAX_LOG_ENTRIES = 100;

    /**
     * Format error for logging
     * @param {Error|string} error - The error object or message
     * @param {string} source - Source of the error
     * @returns {Object} Formatted error object
     */
    function formatError(error, source = 'unknown') {
        const timestamp = new Date().toISOString();
        const userAgent = navigator.userAgent;
        const url = window.location.href;

        if (error instanceof Error) {
            return {
                timestamp,
                source,
                message: error.message,
                stack: error.stack,
                name: error.name,
                url,
                userAgent
            };
        }

        return {
            timestamp,
            source,
            message: String(error),
            stack: new Error().stack,
            url,
            userAgent
        };
    }

    /**
     * Add error to log
     * @param {Object} formattedError - Formatted error object
     */
    function addToLog(formattedError) {
        errorLog.unshift(formattedError);
        
        // Keep log size manageable
        if (errorLog.length > MAX_LOG_ENTRIES) {
            errorLog.pop();
        }

        // Store in sessionStorage for debugging
        try {
            sessionStorage.setItem('errorLog', JSON.stringify(errorLog.slice(0, 10)));
        } catch (e) {
            // Ignore storage errors
        }
    }

    /**
     * Send error to server
     * @param {Object} formattedError - Formatted error object
     */
    function sendToServer(formattedError) {
        if (!ERROR_CONFIG.logToServer) return;

        // Determine correct path for API
        const currentPath = window.location.pathname;
        let apiPath = '../database/error-log-handler.php';
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/error-log-handler.php';
        } else if (currentPath.includes('/database/')) {
            apiPath = 'error-log-handler.php';
        } else {
            apiPath = 'database/error-log-handler.php';
        }

        // Send error to server (fire and forget)
        fetch(apiPath, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formattedError),
            keepalive: true // Ensure request completes even if page unloads
        }).catch(e => {
            // Fail silently - don't create infinite loops
            originalConsole.error.call(console, 'Failed to send error to server:', e);
        });
    }

    /**
     * Show user-friendly error notification
     * @param {string} message - Error message to display
     */
    function showErrorNotification(message) {
        if (!ERROR_CONFIG.showNotifications) return;

        // Check if notification already exists
        if (document.querySelector('.global-error-notification')) {
            return;
        }

        const notification = document.createElement('div');
        notification.className = 'global-error-notification';
        notification.setAttribute('role', 'alert');
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-icon">⚠️</span>
                <span class="notification-message">${message}</span>
                <button class="notification-close" aria-label="Close">&times;</button>
            </div>
        `;

        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px 20px;
            border-radius: 8px;
            border-left: 4px solid #dc3545;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 400px;
            animation: slideInRight 0.3s ease;
        `;

        // Add close button functionality
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.style.cssText = `
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0 5px;
            margin-left: 10px;
            color: #721c24;
        `;

        closeBtn.addEventListener('click', () => {
            notification.remove();
        });

        // Auto-remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);

        document.body.appendChild(notification);

        // Add animations if not already present
        if (!document.querySelector('#error-notification-styles')) {
            const style = document.createElement('style');
            style.id = 'error-notification-styles';
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
            `;
            document.head.appendChild(style);
        }
    }

    /**
     * Global error handler
     */
    window.addEventListener('error', function(event) {
        const formattedError = formatError(event.error || event.message, 'window.onerror');
        
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.call(console, 'Global error caught:', formattedError);
        }
        
        addToLog(formattedError);
        sendToServer(formattedError);
        
        // Show notification for critical errors
        if (event.error && event.error.message) {
            showErrorNotification('An error occurred. Please try again.');
        }
    });

    /**
     * Unhandled promise rejection handler
     */
    window.addEventListener('unhandledrejection', function(event) {
        const formattedError = formatError(event.reason, 'unhandledrejection');
        
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.call(console, 'Unhandled promise rejection:', formattedError);
        }
        
        addToLog(formattedError);
        sendToServer(formattedError);
        
        showErrorNotification('An unexpected error occurred.');
    });

    /**
     * Override console methods to capture errors
     */
    console.error = function() {
        if (ERROR_CONFIG.logToConsole) {
            originalConsole.error.apply(console, arguments);
        }
        
        // Convert arguments to string
        const args = Array.from(arguments);
        const message = args.map(arg => {
            if (arg instanceof Error) {
                return arg.message;
            }
            if (typeof arg === 'object') {
                try {
                    return JSON.stringify(arg);
                } catch (e) {
                    return String(arg);
                }
            }
            return String(arg);
        }).join(' ');

        const formattedError = formatError(message, 'console.error');
        addToLog(formattedError);
    };

    /**
     * Public API for error handling
     */
    window.ErrorHandler = {
        /**
         * Log an error manually
         * @param {Error|string} error - The error to log
         * @param {string} source - Error source
         */
        logError: function(error, source = 'manual') {
            const formattedError = formatError(error, source);
            
            if (ERROR_CONFIG.logToConsole) {
                originalConsole.error.call(console, 'Manual error log:', formattedError);
            }
            
            addToLog(formattedError);
            sendToServer(formattedError);
        },

        /**
         * Show user-friendly error message
         * @param {string} message - Message to display
         */
        showError: function(message) {
            showErrorNotification(message);
        },

        /**
         * Get recent error logs
         * @param {number} limit - Number of logs to return
         * @returns {Array} Recent error logs
         */
        getRecentLogs: function(limit = 10) {
            return errorLog.slice(0, limit);
        },

        /**
         * Clear error logs
         */
        clearLogs: function() {
            errorLog.length = 0;
            sessionStorage.removeItem('errorLog');
        },

        /**
         * Configure error handler
         * @param {Object} config - Configuration options
         */
        configure: function(config) {
            Object.assign(ERROR_CONFIG, config);
        }
    };

    // Log initialization
    originalConsole.log.call(console, 'Error handler initialized');
})();