<?php
session_start();
/*$_SESSION['user_id'];*/
 ?>
<html>
<head>
<title>customer</title>
<link rel="stylesheet" href="../customer/concerns.css">
</head>
<body>
<header class="header">
        <div>
        <h1>livingstonia water board</h1>
        </div> 
        <div>

        </div>
        <div>
            <button onclick="profile();">profile</button>    
            <script>
                let button = document.querySelector(".button");

            </script>
        </div>
    </header>
    <div class="sideBar">
        <div>
            <img class="icon" src="../images/waterfault .PNG" alt="">
        </div>
        <div>
            <a href="../customer/concerns.php">CONCERNS</a>
        </div>
        <div>
            <img class="icon" src="../images/update.PNG" alt="">
        </div>
        <div>
            <a href="../customer/updates.php">UPDATES</a>
        </div>
        <div>
            <img class="icon" src="../images/watertechnician.PNG" alt="">
        </div>
        <div>
            <a href="../customer/technician.php">REQUEST <br> TECHNICIAN</a>
        </div>
        <div>
            <img class="icon" src="../images/wwaterApplication.PNG" alt="">
        </div>
        <div>
            <a href="../customer/customerWaterApplication">APPLY FOR <br> WATER SUPPLY</a>
        </div>
    </div>
    
    
        <form class="form" action="">
            <div class="name">
                <div><label for="customer name">customer name</label></div>
                <div><input type="text" placeholder="Enter your name" name="name"></div>
            
            </div>
            <div class="name">
                <div><label for="Account nunmber">Account nunmber</label></div>
                <div><input type="text" placeholder="Account nunmber"></div>
            </div>

            <div class="name">
                <div><label for="customer contact">customer contact</label></div>
                <div><input type="text" placeholder="Enter your number" name="number"></div>
            
            </div>
            <div class="name">
                <div><label for="location">location</label></div>
                <div><input type="text" placeholder="location"></div>
            </div>
            
            <div class="name">
                <div><label for="fault type">fault type</label></div>
                <div><input type="text" placeholder="Enter fault type" name="faulttype"></div>
            
            </div>
            <div class="name">
                <div><label for="location">location</label></div>
                <div><input type="text" placeholder="location"></div>
            </div>

            <div >                
            <input class="submit" type="submit" value="submit">
            </div>

            
        </form>


    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>
</body>
</html>