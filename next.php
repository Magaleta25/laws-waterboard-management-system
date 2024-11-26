
<?php 
    include('session.php');
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
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['Fname'] = $user['Fname'];
                $_SESSION['Lname'] = $user['Lname'];
                $_SESSION['location'] = $user['location'];
                $_SESSION['phone'] = $user['phone'];
                
    
                // Redirect based on user role
                switch ($user['role']) {
                    case 'customer':
                        header("Location: customer/profile.php");
                        break;
                    case 'admin':
                        header("Location: admin/adminDashboard.php");
                        break;
                    case 'technician':
                        header("Location: technician/technician.html");
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
