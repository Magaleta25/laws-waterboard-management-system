<?php
    $conn = new mysqli( "localhost","root","","water");
    if($conn->connect_errno)
    {
        echo "connection failed". $conn->connect_error;
    }
 
?>




<?php
/*
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
            //$user_role = $res->mysqli_fetch_row();
            //$user_role = mysqli_fetch_row($query);

            /*switch($res['role']) {
                case 'customer':
                    header("Location:customer/homePage.php");
                    break;
                case 'admin':
                    header("Location:admin/dashboard.php"); // Update path for admin
                    break;
                default:
                    echo "Invalid role";
            }*//*

            $userRole = $res['role'];
            if ($userRole === customer) 
                {
                     echo "Welcome Customer!";
                } else if ($userRole === admin) 
                {
                     echo "Welcome Admin!";
                }
            
        }else{
            echo "incorrect email or password";
        }
            /*$sql = "SELECT ID, email, password, role FROM users ";//WHERE email= '$Email' AND password = '$Password'";
            $result = $conn->query($sql);

            if($result->num_rows> 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "id:".$row["ID"]."Email:".$row["email"]."role  ".$row["role"];
                }
                
            }
              else{
                echo "nothing fund";
              }
            

              $conn->close();*//*
        }
             //print_r($result);
            /*if($result)
            {
                print_r($result);
                $row = mysqli_fetch_assoc($result); //turns into associative array
                $_SESSION['user_id'] = $row['id'] ;
                header("Location:customer/homePage.php");
            }else
                {
                    echo "incorrect email or password";
                    header("Location:index.php");
                
                }
        
        }   */  /*
    }
    
    
?> */