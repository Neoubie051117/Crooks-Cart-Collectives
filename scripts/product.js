/* Crooks-Cart-Collectives/scripts/product.js */
/* Filter tab functionality only - no modals or cart functionality */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const filterTabs = document.querySelectorAll('.filter-tab');
    const productCards = document.querySelectorAll('.product-card');
    
    // ============= FILTER FUNCTIONALITY =============
    function filterProducts(filterValue) {
        if (!productCards.length) return;
        
        productCards.forEach(card => {
            if (filterValue === 'all') {
                card.style.display = 'flex';
            } else {
                const category = card.dataset.category;
                if (category === filterValue) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }
    
    // ============= FILTER TAB CLICK HANDLERS =============
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs
            filterTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Get filter value
            const filterValue = tab.dataset.filter;
            
            // Filter products
            filterProducts(filterValue);
        });
    });
    
    // ============= IMAGE ERROR HANDLING =============
    document.querySelectorAll('.product-image').forEach(img => {
        img.addEventListener('error', function() {
            this.src = '../assets/image/icons/PlaceholderAssetProduct.png';
        });
    });
    
    // ============= LAZY LOAD IMAGES =============
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.loading = 'lazy';
        });
    }
});