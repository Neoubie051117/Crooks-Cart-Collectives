/* JavaScript File Content */
document.addEventListener("DOMContentLoaded", () => {
    const openButton = document.getElementById("openReportButton");
    const overlay = document.getElementById("reportOverlay");
    const form = document.getElementById("reportForm");
    const cancelButton = document.getElementById("cancelReport");
    const closeButton = document.getElementById("closeReport");
    const sellerSelect = document.getElementById("seller_id");

    // REMOVED: loadSellers() function - dropdown is already populated by PHP

    const closeForm = () => {
        overlay.style.display = "none";
        document.body.classList.remove("blurred-background");
    };

    openButton?.addEventListener("click", () => {
        document.body.classList.add("blurred-background");
        overlay.style.display = "flex";
        // REMOVED: loadSellers() call
    });

    overlay?.addEventListener("click", (e) => {
        if (e.target === overlay) closeForm();
    });

    if (closeButton) {
        closeButton.addEventListener("click", closeForm);
    }

    if (cancelButton) {
        cancelButton.addEventListener("click", closeForm);
    }

    form?.addEventListener("submit", function (event) {
        event.preventDefault();

        const seller_id = document.getElementById("seller_id").value;
        const reason = document.getElementById("report-reason").value.trim();
        const details = document.getElementById("report-details").value.trim();

        if (!seller_id || !reason || !details) {
            alert("All fields are required.");
            return;
        }

        // Get fetch path
        let fetchPath = "../database/report-seller-handler.php";
        const currentPath = window.location.pathname;
        
        if (!currentPath.includes('/pages/')) {
            fetchPath = "database/report-seller-handler.php";
        }

        fetch(fetchPath, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ 
                seller_id, 
                reason, 
                details
            })
        })
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            if (data.status === "success") {
                alert("Report submitted successfully! An administrator will review it.");
                form.reset();
                closeForm();
                
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                alert("Failed: " + (data.message || "Please try again."));
            }
        })
        .catch(err => {
            console.error("Report submission error:", err);
            alert("Error occurred while submitting report. Please check your connection and try again.");
        });
    });

    // Input validation feedback
    const reasonInput = document.getElementById("report-reason");
    const detailsInput = document.getElementById("report-details");
    
    if (reasonInput) {
        reasonInput.addEventListener("input", function() {
            this.style.borderColor = this.value.trim().length > 0 ? "#4CAF50" : "";
        });
    }
    
    if (detailsInput) {
        detailsInput.addEventListener("input", function() {
            this.style.borderColor = this.value.trim().length > 0 ? "#4CAF50" : "";
        });
    }
});