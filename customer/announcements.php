<?php
session_start();

// Database connection
require('../connection.php');
// Fetch announcements
$query = "SELECT title, content, date FROM announcements ORDER BY date DESC";
$result = $conn->query($query);
?>

<html>
<head>
<title>customer</title>
<link rel="stylesheet" href="../customer/announcements.css">
</head>
<body>
<header class="header">
        <div>
        <img class="img1" src="../images/synodLogo.jpg" alt="">
        </div> 
        <div>
        <h1>livingstonia water board</h1>
        </div>
        <div>
            <button class="logout"><a href="../logout.php">logout</a></button>
            <button class="profileButton"><a href="../customer/profile.php">profile</a></button>      
        
        </div>        
               
        </div>    
    </header>
    <div class="sideBar">
        <div class="insideSideBar">
            <a href="../customer/homePage.php">HOME</a>
        </div>
    
    
        <div class="insideSideBar">
            <a href="../customer/concerns.php">REPORT FAULT</a>
        </div>
        
        <div class="insideSideBar">
            <a href="../customer/announcements.php">ANNOUNCEMENT</a>
        </div>
        
        <div class="insideSideBar">
            <a href="../customer/payments.php">PAYMENTS</a>
        </div>
        <div class="insideSideBar">
            <a href="../customer/waterConnection.php"> WATER CONNECTION</a>
        </div>
    </div>


    <section class="announcements">
            <h2>Announcements</h2>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="announcement">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo htmlspecialchars($row['content']); ?></p>
                        <span><?php echo date('F j, Y, g:i a', strtotime($row['date'])); ?></span>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No announcements available.</p>
            <?php endif; ?>
        </section>
    
    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>
</body>
</html>