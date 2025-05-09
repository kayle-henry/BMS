<?php
// manage_articles.php

// Include database connection
include_once '../config/database.php';

// Fetch articles from the database
$query = "SELECT * FROM articles";
$stmt = $conn->prepare($query);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if delete action is requested
if (isset($_GET['delete_id'])) {
    $delete_query = "DELETE FROM articles WHERE id = :id";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bindParam(':id', $_GET['delete_id']);
    $delete_stmt->execute();
    header("Location: manage_articles.php");
}

// HTML structure for managing articles
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
</head>
<body>
    <h1>Manage Articles</h1>
    <a href="create_article.php">Create New Article</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?php echo htmlspecialchars($article['id']); ?></td>
                    <td><?php echo htmlspecialchars($article['title']); ?></td>
                    <td>
                        <a href="edit_article.php?id=<?php echo $article['id']; ?>">Edit</a>
                        <a href="?delete_id=<?php echo $article['id']; ?>" onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
