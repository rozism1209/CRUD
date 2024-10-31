<?php
include_once 'db.php';

$stmt = $mysqli->prepare('SELECT * FROM post');
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="create.php">Create</a>

    <?php
    if ($result->num_rows === 0) {
        echo 'No posts.';
    } else {
        while ($post = $result->fetch_object()) {
            echo "<h3>{$post->title}</h3>";
            echo "<a href=\"edit.php?id={$post->id}\">Edit</a>";
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $post->id . '">';
            echo '<input type="submit" value="Delete">';
            echo '</form>';
            echo "<p align=\"justify\">{$post->content}</p>";
        }
    }
    ?>
</body>
</html>