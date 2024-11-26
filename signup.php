<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "water";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $email = $_POST['email'];//$conn->real_escape_string($_POST['email']);
    $tel = $_POST['tel'];//$conn->real_escape_string($_POST['tel']);
    $location = $_POST['address'];// $conn->real_escape_string($_POST['address']);
    $usertype = "customer";//$conn->real_escape_string($_POST['usertype']);
    $password = $_POST['password'];// $conn->real_escape_string($_POST['password']);
    $confirm_password =  $_POST['confirm-password'];//$conn->real_escape_string($_POST['confirm-password']);
    
    // Validate password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $password = md5($password);

    // Insert data into the database
    $sql = "INSERT INTO users (Fname, Lname, email, phone, location, password_hash, role) VALUES ('$Fname', '$Lname', '$email', '$tel', '$location', '$password', '$usertype')";

    
    $result = $conn->query($sql);

    if($result){
        echo "New record created successfully";
        header("Location: index.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
