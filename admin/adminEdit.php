<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "water"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function generateTemporaryPassword($length = 8) {
    return bin2hex(random_bytes($length / 2));
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            // Add user logic
            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $status = $_POST['status']; // New status field
            $temporaryPassword = generateTemporaryPassword();
            $hashedPassword = password_hash($temporaryPassword, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, location, phone, role, status, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $email, $location, $phone, $role, $status, $hashedPassword);
            $stmt->execute();
            $stmt->close();
            echo "User added successfully! Temporary password: $temporaryPassword";
        } elseif ($_POST['action'] == 'edit') {
            // Edit user logic
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $status = $_POST['status']; // New status field

            $stmt = $conn->prepare("UPDATE users SET name=?, email=?, location=?, phone=?, role=?, status=? WHERE id=?");
            $stmt->bind_param("ssssssi", $name, $email, $location, $phone, $role, $status, $id);
            $stmt->execute();
            $stmt->close();
            echo "User updated successfully!";
        } elseif ($_POST['action'] == 'archive') {
            // Archive user logic
            $id = $_POST['id'];

            $stmt = $conn->prepare("UPDATE users SET status='archived' WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            echo "User archived successfully!";
        } elseif ($_POST['action'] == 'remove') {
            // Remove user logic
            $id = $_POST['id'];

            $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            
            alert("User removed successfully!");
        }
    }
}

// Fetch user data for editing
$user = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE ID=?");
    $stmt->bind_param("i", $editId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="adminn.css">
</head>
<body>
    <h1>User Management</h1>

    <h2>User Form</h2>
    <form method="POST">
        <input type="hidden" name="action" value="<?php echo isset($_GET['edit']) ? 'edit' : 'add'; ?>">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="name" placeholder="Name" required value="<?php echo isset($user) ? $user['name'] : ''; ?>">
        <input type="email" name="email" placeholder="Email" required value="<?php echo isset($user) ? $user['email'] : ''; ?>">
        <input type="text" name="location" placeholder="Location" value="<?php echo isset($user) ? $user['location'] : ''; ?>">
        <input type="text" name="phone" placeholder="Phone" value="<?php echo isset($user) ? $user['phone'] : ''; ?>">
        <input type="text" name="role" placeholder="Role" required value="<?php echo isset($user) ? $user['role'] : ''; ?>">
        <select name="status" required>
            <option value="active" <?php echo (isset($user) && $user['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo (isset($user) && $user['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            <option value="archived" <?php echo (isset($user) && $user['status'] == 'archived') ? 'selected' : ''; ?>>Archived</option>
            <!--<option value="pending" <?php //echo (isset($user) && $user['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="suspended" <?php //echo (isset($user) && $user['status'] == 'suspended') ? 'selected' : ''; ?>>Suspended</option> -->
        </select>
        <button type="submit"><?php echo isset($_GET['edit']) ? 'Update User' : 'Add User'; ?></button>
        
    </form>

    <h2>Existing Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="archive">
                            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit">Archive</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                        <form method="GET" style="display:inline;">
                            <input type="hidden" name="edit" value="<?php echo $row['user_id']; ?>">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();

?>




