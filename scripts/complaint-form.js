document.addEventListener("DOMContentLoaded", () => {
    const openButton = document.getElementById("openComplaintButton");
    const overlay = document.getElementById("complaintOverlay");
    const form = document.getElementById("complaintForm");
    const cancelButton = document.getElementById("cancelComplaint");
    const closeButton = document.getElementById("closeComplaint");

    const closeForm = () => {
        overlay.style.display = "none";
        document.body.classList.remove("blurred-background");
    };

    openButton?.addEventListener("click", () => {
        document.body.classList.add("blurred-background");
        overlay.style.display = "flex";
    });

    overlay?.addEventListener("click", (e) => {
        if (e.target === overlay) closeForm();
    });

    if (closeButton) {
        closeButton.addEventListener("click", closeForm);
    } else {
        console.warn("Close button not found.");
    }

    if (cancelButton) {
        cancelButton.addEventListener("click", closeForm);
    } else {
        console.warn("Cancel button not found.");
    }

    form?.addEventListener("submit", function (event) {
        event.preventDefault();

        const about = document.getElementById("complaint-about").value.trim();
        const message = document.getElementById("complaint-text").value.trim();

        if (!about || !message) {
            alert("Both fields are required.");
            return;
        }

        // Get user ID from session (using the new userID instead of residentID)
        const userID = typeof userID !== 'undefined' ? userID : 
                      (typeof residentID !== 'undefined' ? residentID : null);
        
        if (!userID) {
            alert("User not identified. Please log in.");
            return;
        }

        // Use PathManager to get correct path
        let fetchPath = "database/complaint-handler.php";
        
        // Fallback logic for PathManager
        if (typeof PathManager !== 'undefined' && typeof PathManager.getDatabasePath === 'function') {
            fetchPath = PathManager.getDatabasePath('complaint-handler.php');
        } else {
            // Manual fallback if PathManager is not available
            const currentPath = window.location.pathname;
            if (currentPath.includes('/pages/')) {
                fetchPath = "../database/complaint-handler.php";
            } else if (currentPath.includes('/database/')) {
                fetchPath = "complaint-handler.php";
            }
        }

        fetch(fetchPath, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ 
                about, 
                message, 
                userID: userID // Using userID for the new system
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
                alert("Complaint submitted successfully!");
                form.reset();
                closeForm();
                
                // Optionally refresh the page or update the complaints list
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                alert("Failed: " + (data.message || "Please try again."));
            }
        })
        .catch(err => {
            console.error("Complaint submission error:", err);
            alert("Error occurred while submitting complaint. Please check your connection and try again.");
        });
    });

    // Add input validation feedback
    const aboutInput = document.getElementById("complaint-about");
    const messageInput = document.getElementById("complaint-text");
    
    if (aboutInput) {
        aboutInput.addEventListener("input", function() {
            if (this.value.trim().length > 0) {
                this.style.borderColor = "#4CAF50";
            } else {
                this.style.borderColor = "";
            }
        });
    }
    
    if (messageInput) {
        messageInput.addEventListener("input", function() {
            if (this.value.trim().length > 0) {
                this.style.borderColor = "#4CAF50";
            } else {
                this.style.borderColor = "";
            }
        });
    }
});