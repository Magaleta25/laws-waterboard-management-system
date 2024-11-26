<?php
session_start();
/*$_SESSION['user_id'];*/
 ?>
<html>
<head>
<title>customer</title>
<link rel="stylesheet" href="../customer/payments.css">
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

    
    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>
</body>
</html>