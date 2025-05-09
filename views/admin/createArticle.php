<?php
// This file allows administrators to create new articles, providing a form for input.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $title = $_POST['title'];
    $content = $_POST['content'];
    $topic = $_POST['topic'];

    // Here you would typically add code to save the article to a database
    // For example:
    // $query = "INSERT INTO articles (title, content, topic) VALUES ('$title', '$content', '$topic')";
    // Execute the query...

    echo "Article created successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>
<body>
    <h1>Create New Article</h1>
    <form action="" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br><br>
        
        <label for="topic">Topic:</label><br>
        <input type="text" id="topic" name="topic" required><br><br>
        
        <input type="submit" value="Create Article">
    </form>
</body>
</html>
