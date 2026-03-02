/* Crooks-Cart-Collectives/scripts/seller-dashboard.js */
document.addEventListener('DOMContentLoaded', function() {
    initDashboardStats();
    initQuickActions();
});

function initDashboardStats() {
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
            if (!this.hasAttribute('href')) {
                e.preventDefault();
            }
        });
    });
}