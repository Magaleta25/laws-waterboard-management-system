<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>LIVINGSTONIA WATER BOARD MANAGEMENT SYSTEM</title>
</head>
<body>
    <div class="header">
        <div class="logo">LIVINGSTONIA WATER BOARD</div>
        <div class="profile">
            <a href="profile.php">
            <i class="fas fa-user-circle"></i>
            <span class="profile.php"></span></a>
            
        </div>
        <!--<div class="profile">
         <a href="Notification.php">
            <i class="fas fa-user-circle"></i>
            <span class="Notication.php">Notification</span></a>
        </div>-->
    </div>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="admin dashboard .php">Dashboard Overview</a></li>
                <li><a href="Finance.php">Finance</a></li>
                <li><a href="Technician.php">Technician Management</a></li>
                <li><a href="customer_service.php">Customer Service</a></li>
                <li><a href="coordinator.php">Coordinator</a></li>
                <li><a href="customer application.php">Customer Application</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <div class="overview-cards">
                <div class="card finance">Finance Summary</div>
                <div class="card technician">Technician Availability</div>
                <div class="card customer-service">Customer Service Tickets</div>
                <div class="card coordinator">Coordinator Tasks</div>
            </div>
            <div class="charts">
                <div class="chart">Financial Trends Chart</div>
                <div class="chart">Technician Performance Chart</div>
                <div class="chart">Customer Satisfaction Chart</div>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Livingstonia Water Board. All rights reserved.</p>
    </footer>
    <script src="script.js">
        document.addEventListener("DOMContentLoaded", () => {
            console.log("Dashboard Loaded");

            // Add event listener for profile icon
            const profileIcon = document.querySelector(".profile");
            
            profileIcon.addEventListener("click", () => {
                // Redirect to profile page
                window.location.href = "profile.php"; 
            });
        });   
    </script>
</body>
</html>
