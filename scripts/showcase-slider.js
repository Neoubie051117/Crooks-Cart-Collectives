class ShowcaseSlider {
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
        this.startAutoSlide();
        
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
        
        const slider = document.querySelector('.showcase-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => this.stopAutoSlide());
            slider.addEventListener('mouseleave', () => this.startAutoSlide());
        }
        
        this.initTouchEvents();
        this.initKeyboardEvents();
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
            this.resetAutoSlide();
        });
    }
    
    initKeyboardEvents() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.prevSlide();
                this.resetAutoSlide();
            } else if (e.key === 'ArrowRight') {
                this.nextSlide();
                this.resetAutoSlide();
            }
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
}

document.addEventListener('DOMContentLoaded', () => {
    new ShowcaseSlider();
    
    function adjustContentMargin() {
        const header = document.querySelector('.header-bar');
        const content = document.querySelector('.content');
        if (header && content) {
            const headerHeight = header.offsetHeight;
            content.style.marginTop = headerHeight + 'px';
            
            const showcaseSection = document.querySelector('.showcase-section');
            if (showcaseSection) {
                const viewportHeight = window.innerHeight;
                showcaseSection.style.height = `calc(${viewportHeight * 0.6}px - ${headerHeight}px)`;
            }
        }
    }
    
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
    window.addEventListener('orientationchange', adjustContentMargin);
});