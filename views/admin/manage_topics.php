<?php
// manage_topics.php

// Include database connection
include_once '../config/database.php';

// Initialize variables
$topics = [];

// Fetch topics from the database
function fetchTopics($conn) {
    $query = "SELECT * FROM topics";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new topic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_topic'])) {
    $topic_name = $_POST['topic_name'];
    $query = "INSERT INTO topics (name) VALUES (:topic_name)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':topic_name', $topic_name);
    $stmt->execute();
    header("Location: manage_topics.php");
}

// Delete a topic
if (isset($_GET['delete'])) {
    $topic_id = $_GET['delete'];
    $query = "DELETE FROM topics WHERE id = :topic_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':topic_id', $topic_id);
    $stmt->execute();
    header("Location: manage_topics.php");
}

// Fetch topics for display
$topics = fetchTopics($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Topics</title>
</head>
<body>
    <h1>Manage Topics</h1>
    
    <form method="POST" action="">
        <input type="text" name="topic_name" placeholder="Enter topic name" required>
        <button type="submit" name="add_topic">Add Topic</button>
    </form>

    <h2>Existing Topics</h2>
    <ul>
        <?php foreach ($topics as $topic): ?>
            <li>
                <?php echo htmlspecialchars($topic['name']); ?>
                <a href="?delete=<?php echo $topic['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>