/* Crooks-Cart-Collectives/scripts/seller-dashboard.js */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dashboard charts if needed
    initDashboardStats();
    
    // Handle product quick actions
    initQuickActions();
});

function initDashboardStats() {
    // Stats card animations
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

function initQuickActions() {
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Prevent default if it's not a link
            if (!this.hasAttribute('href')) {
                e.preventDefault();
            }
        });
    });
}