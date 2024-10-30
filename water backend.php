<?php
// Database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "water"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Safely access POST variables
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

// Insert data into the database
$sql = "INSERT INTO applications (name, email, address, location, phone) VALUES ('$name', '$email', '$address', '$location', '$phone')";
if ($conn->query($sql) === TRUE) {
    // Send email notification
    require 'PHPMailer/PHPMaile/src/PHPMailer.php'; // Ensure the path is correct
    require 'PHPMailer/PHPMaile/src/SMTP.php';
    require 'PHPMailer/PHPMaile/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'busbooking28@gmail.com'; // Your email
    $mail->Password = 'zghyrcfafjqsnuzh'; // Your email password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('mwahimbaalinuswe@gmail.com', 'Water Application');
    $mail->addAddress('mwahimbaalinuswe@gmail.com'); // Admin email

    $mail->isHTML(true);
    $mail->Subject = 'New Water Application';
    $mail->Body = "Name: $name<br>Email: $email<br>Address: $address<br>Location: $location<br>Phone: $phone";

    // Send the email
    if ($mail->send()) {
        echo "Application submitted successfully!";
    } else {
        echo "Application submitted, but email notification failed: " . $mail->ErrorInfo;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
