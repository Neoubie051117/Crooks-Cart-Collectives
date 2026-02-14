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
    
    initializeHeader();
    
    setTimeout(() => {
        const header = document.querySelector('.header-bar');
        const mobileNav = document.getElementById('mobileNav');
        
        if (header) header.classList.remove('no-transition');
        if (mobileNav) mobileNav.classList.remove('no-transition');
    }, 300);
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
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            
            if (!isOpen) {
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
            } else {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
        }
        
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
        }
        
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
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
        currentPage = 'index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            if (href.endsWith(currentPage) || 
                (currentPage === 'index.php' && href.includes('index.php'))) {
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