<?php
// Start session
session_start();

// Include database connection file
require('connection.php');

// Initialize error arrays
$errors = array('EMAIL' => '', 'PASSWORD' => '');

// Check if login form is submitted
if (isset($_POST['login']))
{
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare and execute SQL query
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password using password_verify()
            //if (password_verify($password, $user['password_hash'])) {
                // Store user details in session
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_role'] = $user['role'];

                // Redirect based on user role
                switch ($user['role']) {
                    case 'customer':
                        header("Location: customer/homePage.php");
                        break;
                    case 'admin':
                        header("Location: admin/adminDashboard.php");
                        break;
                    case 'technician':
                        header("Location: technician/homePage.php");
                        break;
                    case 'accountant':
                        header("Location: accountant/homePage.php");
                        break;
                    default:
                        header("Location: login.php");
                }
                exit;
            } else {
                ?>
                    <sript>
                        alert("email or password incorrect");
                    </sript>
                <?php
            }
} 


?>


<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="../login.css">
<body>
    <header class="header">
        <div>
        <h1>livingstonia water board</h1>
        </div> 
    </header>
<div>
<form class="form" action="login.php" method="POST">
        <div><label for="email">Email</label></div>
        <div>
        <input class="input"  type="email" placeholder="email" id="email" name="email">
        </div>
       <!-- <div><?php echo  htmlspecialchars($_POST[$errors['EMAIL']]);  ?></div>-->
        <div><label for="password">Password</label></div>
        <div>
        <input class="input" type="password" id="password" name="password" id="password">
        </div>
        <div>
            <input class="login" type="submit" value="Login" name="login">
        </div>
        <div>
            <a href="">forget password</a>
        </div>
         <a href="signup.html">create account </a> 
    </form>
</div>

<script>
        let emailElement = document.querySelector("#email");
        let passwordElement = document.querySelector("#password");
        let loginElemenent = document.querySelector(".login");
        let FORMElemenent = document.querySelector(".form");        

        FORMElemenent.addEventListener("submit",(Event)=>{
            let email = EMAIL(emailElement.value);
            let password = PASSWORD(passwordElement.value);

});

function EMAIL(input)
{
    if(input === "")
        {
            alert("please enter your email");
            event.preventDefault();
        }
}

function PASSWORD(input)
{
    if(input === "")
        {
            alert("please enter your password");
            event.preventDefault();
        }
}
       
</script>
    
</body>
</html>