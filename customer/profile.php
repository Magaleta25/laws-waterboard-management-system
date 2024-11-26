<?php
    include('../connection.php');
    session_start();
    //echo $_SESSION['user_role'];    
    //$name = $_SESSION['name'];
        
?>


<html>
<head>
    <title>profile</title>
    <link rel="stylesheet" href="../customer/profile.css">
</head>
<!--header-->
<header class="header">
        <div class="logal">
            <div><img class="img1" src="../images/synodLogo.jpg" alt=""></div>
            <div><h1>livingstonia water board</h1></div>
        
        </div>
        <div>
            <button class="logout"><a href="../logout.php">logout</a></button>
            <button class="profileButton"><a href="../customer/profile.php">profile</a></button>      
        
        </div>        
        </div>    
    </header>
        <!--side bar-->
    <div class="sideBar">
        
        <div class="sideBarContent">
            <a href="../customer/concerns.php">REPORT FAULT</a>
        </div>
       
        <div class="sideBarContent">
            <a href="../customer/updates.php">UPDATES</a>
        </div>
     
        <div class="sideBarContent">
            <a href="../customer/technician.php">REQUEST <br> TECHNICIAN</a>
        </div>
        
        <div class="sideBarContent">
            <a href="../customer/customerWaterApplication">APPLY FOR <br> WATER SUPPLY</a>
        </div>
    </div>
    
<!--body-->
    <div class="bodyContainer" >
        <div class="profileInfor"> 
            <img class="profilePicture" src="../images/profile.PNG" alt="">
            <p>names:<br><?php   echo $_SESSION['Fname']."  ".$_SESSION['Lname'];// echo $name;   ?></p>
            <p>email:<br><?php  echo $_SESSION['email'];// echo $email;   ?></p>
        </div>
        <div>
            <form class="form" action="">
                    <div>
                        <label for="full name">Full name</label>
                        
                    </div>
                    <div>
                        <input type="text" placeholder="Enter your full name">
                    </div>
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <div>
                        <input type="email" placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="phone">phone number</label>
                    </div>
                    <div>
                        <input type="numeric" placeholder="Enter your phone number">
                    </div>
                    <div>
                        <label for="location">location</label>
                    </div>
                    <div>
                        <input type="text" placeholder="Enter your location">
                    </div>  
                    
                    <input type="submit" name="submit" class="submit">

                 
            </form>
        </div>
    </div>
    

<!--footer-->
    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>
    
    

</html>