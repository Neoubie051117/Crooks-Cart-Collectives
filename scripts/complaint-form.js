
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

    if (typeof residentID === "undefined" || !residentID) {
        alert("User not identified.");
        return;
    }

    // Use relative path - determine based on current location
    const currentPath = window.location.pathname;
    let fetchPath = "database/complaint-handler.php";
    
    if (currentPath.includes('/pages/')) {
        fetchPath = "../database/complaint-handler.php";
    }

    fetch(fetchPath, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ about, message, residentID })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            alert("Complaint submitted.");
            form.reset();
            closeForm();
        } else {
            alert("Failed: " + (data.message || "Try again."));
        }
    })
    .catch(err => {
        console.error(err);
        alert("Error occurred.");
    });
});
