<?php
    require('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>User Profile</title>
</head>
<body>
    <div class="header">
        <div class="logo">LIVINGSTONIA WATER BOARD</div>
        <div class="profile">
            <i class="fas fa-user-circle"></i>
            <span class="profile-text">Profile</span>
        </div>
    </div>
    <div class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="adminDashboard.php">Dashboard</a></li>
                <li><a href="Finance.php">Finance</a></li>
                <li><a href="Technician.php">Technician Management</a></li>
                <li><a href="customer_service.php">Customer Service</a></li>
                <li><a href="coordinator.php">Coordinator</a></li>
                <li><a href="customer_application.php">Customer Application</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>User Profile</h1>
            <div class="profile-info">
                <div class="profile-picture">
                    <i class="fas fa-user-circle fa-5x"></i>
                </div>
                <div class="details">

                    <h2>Nuswe</h2>
                    <p>Email:</p>
                    <p>Role:</p>
                </div>
            </div>
            <div class="actions">
            <a href="adminEdit.php">
            <button>Add User</button></a>

                <a href="change password.php"><button>Change Password</button></a>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Livingstonia Water Board. All rights reserved.</p>
    </footer>
</body>
</html>
