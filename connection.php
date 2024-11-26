<?php
    $conn = new mysqli( "localhost","root","","water");
    if($conn->connect_errno)
    {
        echo "connection failed". $conn->connect_error;
    }
 
?>



