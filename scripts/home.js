document.addEventListener("DOMContentLoaded", () => {
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => content.style.opacity = 1, 50);
    }

    function initializeHeader() {
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');
        const navLinks = document.querySelectorAll(".nav-link, .sign-up");
        const logo = document.getElementById('logo');

        if (logo) {
            logo.style.cursor = "pointer";
            logo.addEventListener("click", () => {
                window.location.href = window.location.origin + "/Barangay-System/index.php";
            });
        }

        if (menuButton && mobileNav) {
            const backdrop = document.createElement('div');
            backdrop.className = 'menu-backdrop fade-transition';
            document.body.appendChild(backdrop);

            const toggleMenu = () => {
                const isOpen = mobileNav.classList.toggle('open');
                backdrop.classList.toggle('active', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : 'auto';
                menuButton.classList.toggle('open', isOpen);
            };

            const closeMenu = () => {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = 'auto';
                menuButton.classList.remove('open');
            };

            menuButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMenu();
            });

            backdrop.addEventListener('click', closeMenu);
            document.addEventListener('click', (e) => {
                if (!mobileNav.contains(e.target) && !menuButton.contains(e.target)) {
                    closeMenu();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeMenu();
            });

            mobileNav.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') closeMenu();
            });
        }

        highlightActiveLink(navLinks);
        addPageTransition(navLinks);
        adjustContentMargin();
        window.addEventListener('resize', adjustContentMargin);
    }

    function highlightActiveLink(navLinks) {
        let currentPage = window.location.pathname.split('/').pop();
        if (currentPage === '' || currentPage === '/') {
            currentPage = 'index.php';
        }

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').endsWith(currentPage)) {
                link.classList.add('active');
            }
        });
    }

    function addPageTransition(navLinks) {
        navLinks.forEach(link => {
            link.addEventListener("click", (e) => {
                const href = link.getAttribute("href");
                if (href && !href.startsWith("#") && !href.includes("mailto:")) {
                    e.preventDefault();
                    fadeOutAndNavigate(href);
                }
            });
        });
    }

    function fadeOutAndNavigate(url) {
        const content = document.querySelector('.content');
        if (content) {
            content.style.opacity = 0;
            setTimeout(() => {
                window.location.href = url;
            }, 500);
        } else {
            window.location.href = url;
        }
    }

    function adjustContentMargin() {
        const header = document.querySelector('.header-bar');
        const content = document.querySelector('.content');
        if (header && content) {
            const currentPage = window.location.pathname.split('/').pop();
            const marginRules = {
                "container-activities.html": "0px",
                "sign-up.php": "0px"
            };
            content.style.marginTop = marginRules[currentPage] || "0";
        }
    }

    function addFavicon() {
        if (!document.querySelector("link[rel='icon']")) {
            const favicon = document.createElement("link");
            favicon.rel = "icon";
            favicon.type = "image/png";
            favicon.href = "./assets/Logo.png";
            document.head.appendChild(favicon);
        }
    }

    initializeHeader();
    addFavicon();

    // Redirect to complaint.php on button click
    const complaintButton = document.getElementById('complaintButton');
    if (complaintButton) {
        complaintButton.addEventListener('click', () => {
            window.location.href = "/Barangay-System/pages/complaint.php";
        });
    }
});
