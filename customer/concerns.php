<?php
   include('../connection.php');
    session_start(); 
    echo $_SESSION['user_role'].$_SESSION['email'].$_SESSION['Fname'].$_SESSION['Lname'].
    $_SESSION['location'].$_SESSION['phone'];
    

 ?>
<html>
<head>
<title>customer</title>
<link rel="stylesheet" href="../customer/concerns.css">
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

    
        <form class="form" action="concernProcess.php" method="POST">
            

        <div class="error-message">
        <?php
            if(isset($_GET['error'])){
                echo $_GET['error'];
            }
        ?>
        </div>
            <div class="name">
                <div><label for="Fname">first name</label></div>
                <div><input type="text" name="Fname" id="Fname" value="<?php echo $_SESSION['Fname']?>" ></div>                
            </div>
            <div class="name">
                <div><label for="Lname">Last name</label></div>
                <div><input type="text"  name="Lname" id="Lname" value="<?php echo $_SESSION['Lname']?>"></div>
            </div>
            <div class="name">
                <div><label for="phone">phone number</label></div>
                <div><input type="number" value="<?php echo $_SESSION['phone']?>" name="phone" id="phone"></div>
            </div>
            <div class="name">
                <div><label for="email">Email</label></div>
                <div><input type="email"name="email" value="<?php echo $_SESSION['email']?>" ></div>   
            </div>
            <div class="name">
                <div><label for="fault">fault location<label></div>
                <div><input type="text" name="location" id="location" value="<?php echo $_SESSION['location']?>"></div>            
            </div>
            
            <div class="name">
                <div><label for="fault type">Fault type</label></div>
                <div>
                    <select name="fault-type">
                        <option></option>
                        <option value="payment">payment</option>
                        <option value="waterConnection">water connection</option>
                        <option value="customerCare">customer care</option>
                    </select>
                </div>
            
            </div>
            <div class="name">
                <div><label for="complaint">fault description  </label></div>
                <div><input class="complaint" type="text" name="faultDescription" ></div>
            </div>
            <div class="name">
                <div><label for="complaint">date </label></div>
                <div><input class="complaint" type="date" name="date" ></div>
            </div>
            

            <div >                
            <input class="submit" type="submit" value="submit" name="submit">
            </div>

            
        </form>

        <div class="bg">
            
        </div>


    <footer class="footer">
        <P>@ 2024 livingstonia water Board, All Rights Reserved</P>
    </footer>


    <script>
        
    let firstName = document.querySelector("#Fname");
    let lastName = document.querySelector("Lname");
    let phoneNumber = document.querySelector("phone");
    let email = document.querySelector("email")
    let location = document.querySelector("location");
    let faultType = document.querySelector("fault-type");
    let faultDescription = document.querySelector("faultDescription");
    let form = document.querySelector(".form");
    let submit = document.querySelector(".submit");

    
submit.addEventListener("click",(event)=>{
  
    if(form.Fname.value ==="")
    {
    alert("fill in the password field");
    }
  
});

    </script>
</body>
</html>