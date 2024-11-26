
<?php 
// Include database connection file
require('../connection.php');
    if(isset($_POST['submit']))
    {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $fault_type = $_POST['fault-type'];
        $faultDescription = $_POST['faultDescription'];
        $date = $_POST['date'];
        

        //echo $Fname."<br>". $Lname."<br>".$date."<br>". $phone."<br>". $email."<br>". $location."<br>".$faultType."<br>". $faultDescription;
           
       if(!empty($fault_type) || !empty($faultDescription) || !empty($data))
       {
               
            //echo $Fname."<br>". $Lname."<br>".$date."<br>". $phone."<br>". $email."<br>". $location."<br>".$faultType."<br>". $faultDescription;
            $sql = "INSERT INTO fault( faults_type, date, faultDescription ) VALUES ('$fault_type', '$date', '$faultDescription')";
            $result = $conn->query($sql);
            print_r($result);
            if ($result)
             {
               header("Location:../customer/concerns.php?error=submitted");
            }
            else {
                    header("Location:../customer/concerns.php?error=fill in all the fields");
                }

        }
    }
      
        
            
       
?>
