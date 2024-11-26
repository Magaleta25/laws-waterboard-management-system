<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="waterConnection.css">
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

    <div class="sidebaerAndForm">
        <!--side bar-->
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
        <!--application form -->
        <div class="container">
        
            <form class="form" action="submit_form.php" method="POST" onsubmit="return validateForm()">
                <h1>Application Form</h1>
                <label for="Name">Name</label>
                <input type="text" id="Name" name="Name" required />
                <div id="name-error" class="error-message">Please enter a valid name (letters and spaces only).</div>

                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email" required />

                <label for="Location">Location</label>
                <input type="text" id="Location" name="Location" required />
                <div id="location-error" class="error-message">Please enter a valid location.</div>

                <label for="Phone">Phone Number</label>
                <input type="tel" id="Phone" name="Phone" required />
                <div id="phone-error" class="error-message">Please enter a valid phone number (10 to 15 digits).</div>

                <input class="submit" type="submit" value="submit">
                <!-- <button type="submit">Submit</button>-->
            </form>
        </div>

    </div>
    <!--footer-->

    
    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>
        
      
</body>
</html>