<?php
// This file is intended for managing user comments on articles, providing options to approve or delete comments.

// Include database connection
include_once '../config/database.php';

// Fetch comments from the database
$query = "SELECT * FROM comments";
$stmt = $conn->prepare($query);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Approve or delete comments based on user action
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['approve'])) {
        $comment_id = $_POST['comment_id'];
        $update_query = "UPDATE comments SET status = 'approved' WHERE id = :id";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bindParam(':id', $comment_id);
        $update_stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $comment_id = $_POST['comment_id'];
        $delete_query = "DELETE FROM comments WHERE id = :id";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bindParam(':id', $comment_id);
        $delete_stmt->execute();
    }
    header("Location: manage_comments.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Comments</title>
</head>
<body>
    <h1>Manage Comments</h1>
    <table>
        <thead>
            <tr>
                <th>Comment ID</th>
                <th>Article ID</th>
                <th>User</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['id']); ?></td>
                    <td><?php echo htmlspecialchars($comment['article_id']); ?></td>
                    <td><?php echo htmlspecialchars($comment['user']); ?></td>
                    <td><?php echo htmlspecialchars($comment['comment']); ?></td>
                    <td><?php echo htmlspecialchars($comment['status']); ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="comment_id" value="<?php echo htmlspecialchars($comment['id']); ?>">
                            <?php if ($comment['status'] == 'pending'): ?>
                                <button type="submit" name="approve">Approve</button>
                            <?php endif; ?>
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>