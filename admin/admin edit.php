<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "water"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a temporary password
function generateTemporaryPassword($length = 8) {
    return bin2hex(random_bytes($length / 2));
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        // Adding a user
        if ($_POST['action'] == 'add') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $location = $_POST['location'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $temporaryPassword = generateTemporaryPassword();
            $hashedPassword = password_hash($temporaryPassword, PASSWORD_DEFAULT); // Hash the password

            $stmt = $conn->prepare("INSERT INTO users (name, email, address, location, phone, role, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $email, $address, $location, $phone, $role, $hashedPassword);
            $stmt->execute();
            $stmt->close();
            echo "User added successfully! Temporary password: $temporaryPassword"; // Display temporary password
        }

        // Editing a user
        elseif ($_POST['action'] == 'edit') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $location = $_POST['location'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];

            $stmt = $conn->prepare("UPDATE users SET name=?, email=?, address=?, location=?, phone=?, role=? WHERE id=?");
            $stmt->bind_param("ssssssi", $name, $email, $address, $location, $phone, $role, $id);
            $stmt->execute();
            $stmt->close();
            echo "User updated successfully!";
        }

        // Archiving a user
        elseif ($_POST['action'] == 'archive') {
            $id = $_POST['id'];

            $stmt = $conn->prepare("UPDATE users SET status='archived' WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            echo "User archived successfully!";
        }

        // Removing a user
        elseif ($_POST['action'] == 'remove') {
            $id = $_POST['id'];

            $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            echo "User removed successfully!";
        }
    }
}

// Fetch users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="adminn.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>User Management</h1>

    <h2>Add User</h2>
    <form method="POST">
        <input type="hidden" name="action" value="add">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="location" placeholder="Location">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="role" placeholder="Role" required> <!-- Added role input -->
        <button type="submit">Add User</button>
    </form>

    <h2>Existing Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Role</th> <!-- Added Role to the table header -->
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['role']; ?></td> <!-- Added Role to the table -->
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="archive">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Archive</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Edit User</h2>
    <form method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="number" name="id" placeholder="User ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="location" placeholder="Location">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="role" placeholder="Role" required> <!-- Added role input -->
        <button type="submit">Update User</button>
    </form>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
