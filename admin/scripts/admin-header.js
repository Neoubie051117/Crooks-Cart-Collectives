document.addEventListener("DOMContentLoaded", () => {
    console.log('Admin header JS loaded');
    
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 100);
    }
    
    // Initialize header after a short delay to ensure DOM is ready
    if (!window.headerInitialized) {
        setTimeout(() => {
            initializeHeader();
        }, 50);
        
        setTimeout(() => {
            const header = document.querySelector('.header-bar');
            const mobileNav = document.getElementById('mobileNav');
            
            if (header) header.classList.remove('no-transition');
            if (mobileNav) mobileNav.classList.remove('no-transition');
        }, 300);
        
        window.headerInitialized = true;
    }
    
    // ===== NOTIFICATION DOT FUNCTIONALITY =====
    setTimeout(() => {
        initializeNotificationDots();
    }, 100);
});

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    
    // Mobile menu functionality
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu');
        
        // Remove any existing inline styles that might interfere
        mobileNav.style.transform = '';
        mobileNav.style.display = '';
        
        // Remove any existing backdrop to avoid duplicates
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Ensure mobile nav is hidden by default
        mobileNav.classList.remove('open');
        
        // Function to toggle menu
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
            
            // Force remove any inline transform that might linger
            mobileNav.style.transform = '';
        }
        
        // Function to close menu
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
            }
        }
        
        // Event listeners
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking a link inside mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle window resize - close mobile menu on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1005 && mobileNav.classList.contains('open')) {
                closeMenu();
            }
        });
        
        console.log('Mobile menu initialized');
    } else {
        console.error('Menu elements not found');
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
}

// ===== NOTIFICATION DOT FUNCTIONS =====
function initializeNotificationDots() {
    console.log('Initializing notification dots');
    
    // Check if user is logged in (dots only exist when logged in)
    const queueLinkDesktop = document.querySelector('.nav-link.queue-link');
    const logsLinkDesktop = document.querySelector('.nav-link.logs-link');
    const queueLinkMobile = document.querySelector('.mobile-nav .queue-link');
    const logsLinkMobile = document.querySelector('.mobile-nav .logs-link');
    
    const queueDotDesktop = document.getElementById('queueDotDesktop');
    const logsDotDesktop = document.getElementById('logsDotDesktop');
    const queueDotMobile = document.getElementById('queueDotMobile');
    const logsDotMobile = document.getElementById('logsDotMobile');
    
    console.log('Desktop queue dot:', queueDotDesktop);
    console.log('Desktop logs dot:', logsDotDesktop);
    
    // If no dots exist, user is not logged in
    if (!queueDotDesktop && !logsDotDesktop) {
        console.log('No dots found - user not logged in');
        return;
    }
    
    // ===== CLICK HANDLERS FOR NAV LINKS =====
    // Desktop queue link
    if (queueLinkDesktop) {
        queueLinkDesktop.addEventListener('click', function(e) {
            console.log('Queue link clicked - updating last_queue_view');
            
            // Update the session timestamp for queue view
            fetch('../database/admin-notification-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'update_queue_view'
                })
            }).then(response => response.json())
              .then(data => {
                console.log('Queue view updated response:', data);
                // After successful update, hide the queue dot
                if (queueDotDesktop) queueDotDesktop.style.display = 'none';
                if (queueDotMobile) queueDotMobile.style.display = 'none';
                
                // Store the new timestamp in session storage to persist across page loads
                sessionStorage.setItem('lastQueueView', data.timestamp);
                console.log('Queue dot hidden after click, timestamp saved:', data.timestamp);
            }).catch(e => console.error('Failed to update queue view:', e));
        });
    }
    
    // Desktop logs link
    if (logsLinkDesktop) {
        logsLinkDesktop.addEventListener('click', function(e) {
            console.log('Logs link clicked - updating last_log');
            
            // Update last_log timestamp in database
            fetch('../database/admin-notification-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'update_last_log'
                })
            }).then(response => response.json())
              .then(data => {
                console.log('Last log updated response:', data);
                // After successful update, hide the logs dot
                if (logsDotDesktop) logsDotDesktop.style.display = 'none';
                if (logsDotMobile) logsDotMobile.style.display = 'none';
                
                // Store the new timestamp in session storage
                sessionStorage.setItem('lastLogUpdated', data.timestamp);
                console.log('Logs dot hidden after click, timestamp saved:', data.timestamp);
            }).catch(e => console.error('Failed to update last_log:', e));
        });
    }
    
    // Mobile queue link
    if (queueLinkMobile) {
        queueLinkMobile.addEventListener('click', function(e) {
            console.log('Mobile queue link clicked - updating last_queue_view');
            
            fetch('../database/admin-notification-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'update_queue_view'
                })
            }).then(response => response.json())
              .then(data => {
                if (queueDotDesktop) queueDotDesktop.style.display = 'none';
                if (queueDotMobile) queueDotMobile.style.display = 'none';
                sessionStorage.setItem('lastQueueView', data.timestamp);
                console.log('Queue dot hidden after mobile click, timestamp saved:', data.timestamp);
            }).catch(e => console.error('Failed to update queue view:', e));
        });
    }
    
    // Mobile logs link
    if (logsLinkMobile) {
        logsLinkMobile.addEventListener('click', function(e) {
            console.log('Mobile logs link clicked - updating last_log');
            
            fetch('../database/admin-notification-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'update_last_log'
                })
            }).then(response => response.json())
              .then(data => {
                if (logsDotDesktop) logsDotDesktop.style.display = 'none';
                if (logsDotMobile) logsDotMobile.style.display = 'none';
                sessionStorage.setItem('lastLogUpdated', data.timestamp);
                console.log('Logs dot hidden after mobile click, timestamp saved:', data.timestamp);
            }).catch(e => console.error('Failed to update last_log:', e));
        });
    }
    
    // Start polling for real-time updates
    startNotificationPolling();
}

function showQueueDots() {
    const queueDotDesktop = document.getElementById('queueDotDesktop');
    const queueDotMobile = document.getElementById('queueDotMobile');
    
    // Don't show if we're on the queue page
    if (window.isQueuePage) {
        console.log('On queue page - not showing queue dots');
        return;
    }
    
    // Show the dots by setting display to inline-block (overrides CSS default of none)
    if (queueDotDesktop) {
        queueDotDesktop.style.display = 'inline-block';
        console.log('Queue dot desktop shown');
    }
    if (queueDotMobile) {
        queueDotMobile.style.display = 'inline-block';
        console.log('Queue dot mobile shown');
    }
}

function hideQueueDots() {
    const queueDotDesktop = document.getElementById('queueDotDesktop');
    const queueDotMobile = document.getElementById('queueDotMobile');
    
    // Hide the dots by setting display to none
    if (queueDotDesktop) {
        queueDotDesktop.style.display = 'none';
        console.log('Queue dot desktop hidden');
    }
    if (queueDotMobile) {
        queueDotMobile.style.display = 'none';
        console.log('Queue dot mobile hidden');
    }
}

function showLogsDots() {
    const logsDotDesktop = document.getElementById('logsDotDesktop');
    const logsDotMobile = document.getElementById('logsDotMobile');
    
    // Don't show if we're on the logs page
    if (window.isLogsPage) {
        console.log('On logs page - not showing logs dots');
        return;
    }
    
    // Show the dots by setting display to inline-block (overrides CSS default of none)
    if (logsDotDesktop) {
        logsDotDesktop.style.display = 'inline-block';
        console.log('Logs dot desktop shown');
    }
    if (logsDotMobile) {
        logsDotMobile.style.display = 'inline-block';
        console.log('Logs dot mobile shown');
    }
}

function hideLogsDots() {
    const logsDotDesktop = document.getElementById('logsDotDesktop');
    const logsDotMobile = document.getElementById('logsDotMobile');
    
    // Hide the dots by setting display to none
    if (logsDotDesktop) {
        logsDotDesktop.style.display = 'none';
        console.log('Logs dot desktop hidden');
    }
    if (logsDotMobile) {
        logsDotMobile.style.display = 'none';
        console.log('Logs dot mobile hidden');
    }
}

async function checkForPendingItems() {
    console.log('Checking for pending items...');
    
    try {
        // Determine correct API path
        const currentPath = window.location.pathname;
        let apiPath = '../database/admin-notification-handler.php?action=get_pending_counts&t=' + Date.now();
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/admin-notification-handler.php?action=get_pending_counts&t=' + Date.now();
        } else if (currentPath.includes('/includes/')) {
            apiPath = '../database/admin-notification-handler.php?action=get_pending_counts&t=' + Date.now();
        } else {
            apiPath = 'database/admin-notification-handler.php?action=get_pending_counts&t=' + Date.now();
        }
        
        console.log('Fetching from:', apiPath);
        
        const response = await fetch(apiPath);
        const result = await response.json();
        
        console.log('Pending counts response:', result);
        
        if (result.status === 'success') {
            // Handle queue dots based on server response
            if (result.has_new_queue) {
                showQueueDots();
            } else {
                hideQueueDots();
            }
            
            // Handle logs dots based on server response
            if (result.has_new_logs) {
                showLogsDots();
            } else {
                hideLogsDots();
            }
            
            console.log('=== NOTIFICATION DEBUG ===');
            console.log('Latest log timestamp:', result.latest_log_timestamp_formatted || result.latest_log_timestamp);
            console.log('Last log timestamp:', result.last_log_timestamp_formatted || result.last_log_timestamp);
            console.log('Has new logs (server):', result.has_new_logs);
            console.log('Latest queue timestamp:', result.latest_queue_timestamp ? new Date(result.latest_queue_timestamp * 1000).toLocaleString() : 'none');
            console.log('Last queue view:', result.last_queue_view ? new Date(result.last_queue_view * 1000).toLocaleString() : 'none');
            console.log('Has new queue (server):', result.has_new_queue);
            console.log('Server time:', result.server_time_formatted);
            console.log('==========================');
        } else {
            console.error('Failed to get pending counts:', result.message);
        }
    } catch (error) {
        console.error('Error checking pending items:', error);
    }
}

function startNotificationPolling() {
    console.log('Starting notification polling');
    
    // Check immediately
    setTimeout(() => {
        checkForPendingItems();
    }, 500);
    
    // Then check every 3 seconds
    setInterval(checkForPendingItems, 3000);
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'admin-index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage) {
                link.classList.add('active');
            }
        }
    });
}

function adjustContentMargin() {
    const header = document.querySelector('.header-bar');
    const content = document.querySelector('.content');
    if (header && content) {
        const headerHeight = header.offsetHeight;
        content.style.marginTop = headerHeight + 'px';
    }
}

window.HeaderFunctions = {
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin,
    showQueueDots: showQueueDots,
    hideQueueDots: hideQueueDots,
    showLogsDots: showLogsDots,
    hideLogsDots: hideLogsDots
};