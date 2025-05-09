<?php
// manage_users.php

// Start session and include necessary files
session_start();
include_once '../config.php'; // Assuming there's a config file for database connection

// Check if the user is an admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../home.php');
    exit();
}

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Display users
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Assuming there's a stylesheet -->
</head>
<body>
    <h1>Manage Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="admin_dashboard.php">Back to Admin Dashboard</a>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
