
<?php
require('../waterBackend.php');
$servername = "localhost";
$dbusername = "root";
$dbpassword = ""; // Add your database password here if it's not empty
$dbname = "water"; // Replace 'your_database' with your actual database name

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$submitted = false; // Track if the form has been submitted
$errors = []; // Store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (isset($_POST['Name'], $_POST['Address'], $_POST['Email'], $_POST['Location'], $_POST['Phone'])) {
        $name = trim($_POST['Name']);
        $address = trim($_POST['Address']);
        $email = trim($_POST['Email']);
        $location = trim($_POST['Location']);
        $phone = trim($_POST['Phone']);

        // Validate input (add your validation logic here)
        if (empty($name) || empty($address) || empty($email) || empty($location) || empty($phone)) {
            $errors[] = "All fields are required.";
        }

        // Check for existing user
        $checkQuery = $conn->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
        $checkQuery->bind_param("ss", $email, $phone);
        $checkQuery->execute();
        $result = $checkQuery->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "A user with this email or phone number already exists.";
        } else {
            // Prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO applications (name, address, email, location, phone) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $address, $email, $location, $phone);

            // Execute the statement
            if ($stmt->execute()) {
                $submitted = true; // Set to true if submission is successful
            } else {
                $errors[] = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Close the check query
        $checkQuery->close();
    } else {
        $errors[] = "Required fields are missing.";
    }
} 

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../customer/waterApp.css">
    <title>Application Form</title>
</head>
<body>
<header class="header">
        <div>
        <h1>livingstonia water board</h1>
        </div> 
        <div>

        </div>
        <div>
            profile
        </div>
    </header>

    <div class="container">
        <h1>Application Form</h1>
        <form action="submit_form.php" method="POST" onsubmit="return validateForm()">
            <label for="Name">Name</label>
            <input type="text" id="Name" name="Name" required />
            <div id="name-error" class="error-message">Please enter a valid name (letters and spaces only).</div>

            <label for="Email">Email</label>
            <input type="email" id="Email" name="Email" required />

            <label for="Location">Location</label>
            <input type="text" id="Location" name="Location" required />
            <div id="location-error" class="error-message">Please enter a valid location.</div>

            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" required />
            <div id="address-error" class="error-message">Please enter a valid address.</div>

            <label for="Phone">Phone Number</label>
            <input type="tel" id="Phone" name="Phone" required />
            <div id="phone-error" class="error-message">Please enter a valid phone number (10 to 15 digits).</div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById('Name');
            const location = document.getElementById('Location');
            const address = document.getElementById('Address');
            const phone = document.getElementById('Phone');

            const namePattern = /^[A-Za-z\s]+$/; // Only letters and spaces
            const locationPattern = /^[A-Za-z0-9\s,.-]+$/; // Valid location characters
            const addressPattern = /^[A-Za-z0-9\s,.-]+$/; // Valid address characters
            const phonePattern = /^\+?[0-9]{10,15}$/; // Phone number format (10 to 15 digits)

            let isValid = true;

            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

            if (!namePattern.test(name.value)) {
                document.getElementById('name-error').style.display = 'block';
                isValid = false;
            }

            if (!locationPattern.test(location.value)) {
                document.getElementById('location-error').style.display = 'block';
                isValid = false;
            }

            if (!addressPattern.test(address.value)) {
                document.getElementById('address-error').style.display = 'block';
                isValid = false;
            }

            if (!phonePattern.test(phone.value)) {
                document.getElementById('phone-error').style.display = 'block';
                isValid = false;
            }

            return isValid; // Valid form
        }
    </script>

<!-- Display validation errors if any -->
<?php if (!empty($errors)): ?>
    <ul class="error-messages">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
