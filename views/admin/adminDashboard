<?php
// admin_dashboard.php

session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../dashboard.php');
    exit();
}

// Include database connection
include '../db_connection.php';

// Fetch statistics or data for the admin dashboard
// Example: Total articles, total users, total comments
$total_articles = 0; // Fetch from database
$total_users = 0; // Fetch from database
$total_comments = 0; // Fetch from database

// HTML structure for the admin dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="create_article.php">Create Article</a></li>
                <li><a href="manage_articles.php">Manage Articles</a></li>
                <li><a href="manage_comments.php">Manage Comments</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_topics.php">Manage Topics</a></li>
                <li><a href="../dashboard.php">User Dashboard</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Statistics</h2>
        <ul>
            <li>Total Articles: <?php echo $total_articles; ?></li>
            <li>Total Users: <?php echo $total_users; ?></li>
            <li>Total Comments: <?php echo $total_comments; ?></li>
        </ul>
    </main>
</body>
</html>
