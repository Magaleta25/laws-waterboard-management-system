<?php
require('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // **No password hashing for testing purposes**
        // In production, use password_verify() to compare hashed passwords

        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_role'] = $user['role'];

        switch ($user['role']) {
            case 'customer':
                header("Location: customer/homePage.php");
                break;
            case 'admin':
                header("Location: customer/updates.php");
                break;
            case 'technician':
                header("Location: customer/updates.php");
                break;
            case 'accountant':
                header("Location: customer/updates.php");
                break;
            default:
                // Handle invalid roles
                header("Location: index.php");
        }
    } else {
        echo "Incorrect email or password";

    }
}
?>


<?php/*
// Start session
session_start();

// Include database connection file
require('connection.php');

// Initialize error arrays
$errors = array('EMAIL' => '', 'PASSWORD' => '');

// Check if login form is submitted
if (isset($_POST['login'])) {
    // Check if email and password are not empty
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
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
            if (password_verify($password, $user['password_hash'])) {
                // Store user details in session
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_role'] = $user['role'];

                // Redirect based on user role
                switch ($user['role']) {
                    case 'customer':
                        header("Location: customer/homePage.php");
                        break;
                    case 'admin':
                        header("Location: admin/HomePage.php");
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
                exit;
            } else {
                $errors['PASSWORD'] = "Incorrect password";
            }
        } else {
            $errors['EMAIL'] = "Email not found";
        }
    } else {
        $errors['EMAIL'] = "Email is required";
        $errors['PASSWORD'] = "Password is required";
    }
}

// Display errors
if (!empty($errors['EMAIL'])) {
    echo $errors['EMAIL'] . "<br>";
}
if (!empty($errors['PASSWORD'])) {
    echo $errors['PASSWORD'] . "<br>";
    header("Location: index.php");

}*/
?>











<?php/*
require('connection.php');

$errors = array('EMAIL'=>'');
$ERRORS = array('PASSWORD'=>'');

    if(isset($_POST['login']))
    {
        
        if(empty($_POST['email']) && empty($_POST['password']) )
        {
            header("Location:index.php");
        }
        else
        {
            session_start();
         $Email = $_POST['email'];
           // $Email="cen-01-22-22@unilia.ac.mw";
            $Password = $_POST['password'];
            $newEmail = htmlspecialchars($Email);
            //$Password = htmlspecialchars($Password); 
           // $Password = md5($Password);

        $query = mysqli_query($conn, "SELECT * FROM users WHERE email ='".$Email."' AND password = '".$Password."'" );
        
        
        $res=mysqli_fetch_row($query);
         
        if($res){
           
            echo "correct email or password";
            
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_role'] = $user['role'];
    
            switch ($user['role']) {
                case 'customer':
                    header("Location: customer/homePage.php");
                    break;
                case 'admin':
                    header("Location: customer/updates.php");
                    break;
                case 'technician':
                    header("Location: customer/updates.php");
                    break;
                case 'accountant':
                    header("Location: customer/updates.php");
                    break;
                default:
                    // Handle invalid roles
                    header("Location: index.php");
            }
        } else {
            echo "Incorrect email or password";
        }
    
       
     
      /* $userRole = $res['role'];
            if ($userRole === 'customer') 
                {
                     echo "Welcome Customer!";
                } else if ($userRole === 'admin') 
                {
                     echo "Welcome Admin!";
                }
            
        }else{
            echo "incorrect email or password";
            header("Location:index.php");
        }
        }*/ 
?> 
