// Hero Slider Functionality
class HeroSlider {
    constructor() {
        this.slides = document.querySelectorAll('.showcase-slide');
        this.prevBtn = document.querySelector('.prev-slide');
        this.nextBtn = document.querySelector('.next-slide');
        this.currentSlide = 0;
        this.slideInterval = null;
        this.slideDuration = 5000;
        
        this.init();
    }
    
    init() {
        if (this.slides.length === 0) return;
        
        this.showSlide(this.currentSlide);
        
        // Auto slide
        this.startAutoSlide();
        
        // Event listeners
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => {
                this.prevSlide();
                this.resetAutoSlide();
            });
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => {
                this.nextSlide();
                this.resetAutoSlide();
            });
        }
        
        // Pause on hover
        const slider = document.querySelector('.showcase-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => this.stopAutoSlide());
            slider.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        // Touch/swipe support for mobile
        this.initTouchEvents();
        
        // Adjust slider height based on header
        this.adjustSliderHeight();
        window.addEventListener('resize', () => this.adjustSliderHeight());
    }
    
    showSlide(index) {
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.slides[index].classList.add('active');
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.showSlide(this.currentSlide);
    }
    
    startAutoSlide() {
        this.stopAutoSlide();
        this.slideInterval = setInterval(() => this.nextSlide(), this.slideDuration);
    }
    
    stopAutoSlide() {
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
            this.slideInterval = null;
        }
    }
    
    resetAutoSlide() {
        this.stopAutoSlide();
        this.startAutoSlide();
    }
    
    initTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;
        
        const slider = document.querySelector('.showcase-slider');
        if (!slider) return;
        
        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
            this.stopAutoSlide();
        });
        
        slider.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
            this.startAutoSlide();
        });
    }
    
    handleSwipe(startX, endX) {
        const minSwipeDistance = 50;
        
        if (startX - endX > minSwipeDistance) {
            this.nextSlide();
        } else if (endX - startX > minSwipeDistance) {
            this.prevSlide();
        }
    }
    
    adjustSliderHeight() {
        const header = document.querySelector('.header-bar');
        const showcaseSection = document.querySelector('.showcase-section');
        if (header && showcaseSection) {
            const headerHeight = header.offsetHeight;
            const viewportHeight = window.innerHeight;
            showcaseSection.style.height = `calc(${viewportHeight * 0.6}px - ${headerHeight}px)`;
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
});

// ===== FALLBACK FOR ANY IMAGES THAT STILL FAIL TO LOAD =====
document.addEventListener('DOMContentLoaded', () => {
    // Add global image error handler for all product images
    document.querySelectorAll('.product-image').forEach(img => {
        // If image already failed to load, ensure it uses fallback
        if (img.complete && img.naturalHeight === 0) {
            img.src = 'assets/image/icons/package.svg';
        }
        
        // Add error handler for future errors
        img.addEventListener('error', function() {
            this.src = 'assets/image/icons/package.svg';
        });
    });
});

// ===== FIX FOR HEADER PATH ISSUES =====
// This ensures header links work correctly when on root vs pages
document.addEventListener('DOMContentLoaded', () => {
    // Check if we're in root or pages folder
    const isRoot = window.location.pathname === '/' || 
                   window.location.pathname.endsWith('index.php') ||
                   window.location.pathname.split('/').pop() === '';
    
    // Fix any navigation links that might have incorrect paths
    document.querySelectorAll('.nav-link, .social-button, .footer a').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.startsWith('pages/') && !isRoot) {
            // Already in pages folder, need to adjust
            if (window.location.pathname.includes('/pages/')) {
                link.setAttribute('href', href.replace('pages/', ''));
            }
        }
    });
});