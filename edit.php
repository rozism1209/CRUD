<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

include_once 'db.php';

$stmt = $mysqli->prepare("SELECT * FROM post WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header('Location: index.php');
    exit;
}

$post = $result->fetch_object();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <?php if (isset($_GET['invalid'])): ?>
        <h3>Please complete the form</h3>
    <?php endif; ?>

    <form action="edit_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post->id); ?>">
        <label>
            Title:
            <input type="text" name="title" value="<?php echo htmlspecialchars($post->title); ?>" autofocus>
        </label>
        <br>
        <label>
            Content:
            <textarea name="content" cols="30" rows="10"><?php echo htmlspecialchars($post->content); ?></textarea>
        </label>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>