document.addEventListener("DOMContentLoaded", () => {
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
    adjustContentMargin: adjustContentMargin
};