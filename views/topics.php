<?php
// topics.php

// Sample array of topics
$topics = [
    ['id' => 1, 'title' => 'Technology'],
    ['id' => 2, 'title' => 'Health'],
    ['id' => 3, 'title' => 'Travel'],
    ['id' => 4, 'title' => 'Education'],
];

// Display the list of topics
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics</title>
</head>
<body>
    <h1>Available Topics</h1>
    <ul>
        <?php foreach ($topics as $topic): ?>
            <li>
                <a href="article.php?topic_id=<?php echo $topic['id']; ?>">
                    <?php echo htmlspecialchars($topic['title']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>