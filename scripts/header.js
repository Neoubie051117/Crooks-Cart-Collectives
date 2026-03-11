document.addEventListener("DOMContentLoaded", () => {
    // Fix favicon dynamically based on current location
    fixFavicon();
    
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
});

// DYNAMIC FAVICON FIX - detects correct path based on current URL
function fixFavicon() {
    // Get current path
    const currentPath = window.location.pathname;
    console.log('Current path:', currentPath);
    
    // Determine if we're in admin area
    const isAdmin = currentPath.includes('/admin/');
    
    // Calculate the correct relative path to the favicon
    let faviconPath;
    
    if (isAdmin) {
        // We're in admin area
        if (currentPath.includes('/admin/pages/') || currentPath.includes('/admin/includes/')) {
            // In admin subfolder - need to go up twice
            faviconPath = '../../admin/assets/image/brand/Logo.ico';
        } else {
            // In admin root
            faviconPath = 'assets/image/brand/Logo.ico';
        }
    } else {
        // We're in main site
        if (currentPath.includes('/pages/')) {
            // In pages folder - go up one level
            faviconPath = '../assets/image/brand/Logo.ico';
        } else {
            // In root
            faviconPath = 'assets/image/brand/Logo.ico';
        }
    }
    
    console.log('Setting favicon to:', faviconPath);
    
    // Remove any existing favicon links
    const existingLinks = document.querySelectorAll('link[rel="icon"], link[rel="shortcut icon"]');
    existingLinks.forEach(link => link.remove());
    
    // Create and add the new favicon link
    const link = document.createElement('link');
    link.rel = 'icon';
    link.type = 'image/x-icon';
    link.href = faviconPath;
    document.head.appendChild(link);
    
    // Also add shortcut icon for older browsers
    const shortcutLink = document.createElement('link');
    shortcutLink.rel = 'shortcut icon';
    shortcutLink.href = faviconPath;
    document.head.appendChild(shortcutLink);
    
    // Verify the favicon loaded
    const img = new Image();
    img.onload = function() {
        console.log('Favicon loaded successfully:', faviconPath);
    };
    img.onerror = function() {
        console.log('Favicon failed to load:', faviconPath);
        // Try alternative path if first attempt fails
        setTimeout(() => {
            tryAlternativeFavicon(isAdmin);
        }, 100);
    };
    img.src = faviconPath;
}

// Try alternative paths if first attempt fails
function tryAlternativeFavicon(isAdmin) {
    console.log('Trying alternative favicon path...');
    
    let altPath;
    if (isAdmin) {
        altPath = '/Crooks-Cart-Collectives/admin/assets/image/brand/Logo.ico';
    } else {
        altPath = '/Crooks-Cart-Collectives/assets/image/brand/Logo.ico';
    }
    
    const link = document.querySelector('link[rel="icon"]');
    if (link) {
        link.href = altPath;
    }
    
    const shortcutLink = document.querySelector('link[rel="shortcut icon"]');
    if (shortcutLink) {
        shortcutLink.href = altPath;
    }
    
    console.log('Tried alternative path:', altPath);
}

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        logo.onerror = function() {
            this.src = "assets/image/brand/Logo.png";
        };
    }
    
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
            
            // Force a reflow to ensure CSS transition picks up the change
            void mobileNav.offsetHeight;
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
        
        // Try again after a short delay
        if (!window.menuRetryAttempted) {
            window.menuRetryAttempted = true;
            setTimeout(() => {
                console.log('Retrying menu initialization...');
                initializeHeader();
            }, 500);
        }
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
    
    // Update cart count if user is logged in
    updateCartCount();
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage || 
                (currentPage === 'index.php' && filename === 'index.php')) {
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

// Function to update cart count
async function updateCartCount() {
    const logoutModal = document.getElementById('logoutModal');
    if (!logoutModal) return;
    
    const cartCountEl = document.getElementById('cartCount');
    if (!cartCountEl) return;
    
    try {
        const currentPath = window.location.pathname;
        let apiPath = '../database/cart-handler.php?action=get_count';
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/cart-handler.php?action=get_count';
        } else {
            apiPath = 'database/cart-handler.php?action=get_count';
        }
        
        const response = await fetch(apiPath);
        const data = await response.json();
        
        if (data.status === 'success' && data.count > 0) {
            cartCountEl.textContent = data.count;
            cartCountEl.style.display = 'inline';
        } else {
            cartCountEl.style.display = 'none';
        }
    } catch (e) {
        console.error('Failed to fetch cart count', e);
    }
}

window.HeaderFunctions = {
    updateCartCount: updateCartCount,
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};