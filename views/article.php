<?php
// article.php

// Include database connection
include 'db_connection.php';

// Get the article ID from the URL
$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the article from the database
$query = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the article exists
if ($result->num_rows > 0) {
    $article = $result->fetch_assoc();
} else {
    echo "Article not found.";
    exit;
}

// Display the article
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
    <p><em>Published on: <?php echo htmlspecialchars($article['published_date']); ?></em></p>
    <a href="topics.php">Back to Topics</a>
</body>
</html>