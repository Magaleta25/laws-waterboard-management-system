
<?php 
// Start session
session_start();

// Include database connection file
require('connection.php');


// Check if login form is submitted
if (isset($_POST['login'])) {
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    if(!empty($email)&&!empty($password)){
        // Prepare and execute SQL query to check for user by email
        $sql = "SELECT * FROM users WHERE email = '$email' AND password_hash = '$password'";
        $result = $conn->query($sql);
        // print_r($result);
        // Check if user exists
        if ($result->num_rows>0) {
            $user = $result->fetch_assoc();
    
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
                        header("Location: index.php");
                }
            } else {
                header("Location:index.php?error=Email or password incorrect");
            }
            
        }else{
        header("Location:index.php?error=All inputs are required!");

    }
    }
?>
