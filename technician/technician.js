document.addEventListener("DOMContentLoaded", () => {
    const sidebarItems = document.querySelectorAll(".sidebar li");
    const content = document.getElementById("content");

    sidebarItems.forEach(item => {
        item.addEventListener("click", () => {
            const section = item.id;
            updateContent(section);
        });
    });

    document.getElementById("profile-btn").addEventListener("click", () => {
        updateContent("profile");
    });

    document.getElementById("logout-btn").addEventListener("click", () => {
        alert("Logging out...");
        window.location.href = "login.html";
    });

    function updateContent(section) {
        switch (section) {
            case "home":
                content.innerHTML = "<h2>Welcome, Technician!</h2><p>Select an option from the sidebar to get started.</p>";
                break;
            case "issue-reports":
                content.innerHTML = "<h2>Issue Reports</h2><p>No issues reported yet.</p>";
                break;
            case "maintenance-schedule":
                content.innerHTML = "<h2>Maintenance Schedule</h2><p>Upcoming maintenance tasks will be listed here.</p>";
                break;
            case "activity-log":
                content.innerHTML = "<h2>Activity Log</h2><p>All your activities will be recorded here.</p>";
                break;
            case "notifications":
                content.innerHTML = "<h2>Notifications</h2><p>You have no new notifications.</p>";
                break;
            case "profile":
                content.innerHTML = "<h2>Profile</h2><p>Manage your profile information here.</p>";
                break;
            default:
                content.innerHTML = "<h2>Welcome, Technician!</h2><p>Select an option from the sidebar to get started.</p>";
        }
    }
});
