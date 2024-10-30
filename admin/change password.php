<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "water"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['sub'])) {
    $user = $_POST['username'];
    $mail = $_POST['email'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $moreuser = $user_data['email'];

        if ($mail === $moreuser) {
            $_SESSION['user'] = $user_data;
            header('Location:reset_password.php');
            exit();
        } else {
            echo "<script>alert('Please enter the correct email address for your account!');</script>";
        }
    } else {
        echo "<script>alert('User not found! Please return to register.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('water33.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
    color: #fff;
}

        .wrapper {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"], input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color:white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color:gray;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Change Password</h1>
        <form method="post" action="forgot.php">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</body>
</html>
