<?php
// dashboard.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

// Fetch user data and statistics
$user_id = $_SESSION['user_id'];
// Assume a function getUserData($user_id) exists to fetch user data
$user_data = getUserData($user_id);

// Display dashboard content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($user_data['username']); ?>!</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="topics.php">Topics</a></li>
                <li><a href="article.php">Articles</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Your Activities</h2>
        <p>Here you can find an overview of your recent activities and statistics.</p>
        <!-- Additional dashboard content can be added here -->
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your Application Name. All rights reserved.</p>
    </footer>
</body>
</html>