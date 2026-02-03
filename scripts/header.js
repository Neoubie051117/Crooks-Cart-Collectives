document.addEventListener("DOMContentLoaded", () => {

    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 500);
    }
    

    function initializeHeader() {
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');
        const navLinks = document.querySelectorAll(".nav-link, .sign-up");
       const logo = document.getElementById('logo');

if (logo) {
    logo.style.transition = "opacity 0.5s ease-in-out, visibility 0s linear 0.5s"; // delay visibility off toggle
    logo.style.cursor = "pointer";

    logo.addEventListener("click", () => {
        window.location.href = window.location.origin + "/Barangay-System/index.php";
    });

    const fadeInLogo = () => {
        setTimeout(() => {
            logo.style.visibility = "visible";
            logo.style.opacity = 1;
        }, 1000); // 1s delay, match with content or header
    };

    if (logo.complete && logo.naturalHeight !== 0) {
        fadeInLogo(); // Image already loaded
    } else {
        logo.addEventListener("load", fadeInLogo); // Wait until it loads
    }
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

    // Optional: remove no-transition class if you’re using it for delay logic
  const header = document.querySelector('.header-bar');
const mobileNav = document.getElementById('mobileNav');

if (header) {
  header.classList.add('header-delay');
}

if (mobileNav) {
  mobileNav.classList.add('header-delay');
}

setTimeout(() => {
  if (header) header.classList.remove('header-delay');
  if (mobileNav) mobileNav.classList.remove('header-delay');
}, 500); // 2 seconds delay

});
