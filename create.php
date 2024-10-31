<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <?php if (isset($_GET['invalid'])): ?>
        <h3>Please complete the form</h3>
    <?php endif; ?>
    <form action="create_process.php" method="post">
        <label>
            Title:
            <input type="text" name="title" required autofocus>
        </label>
        <br>
        <label>
            Content:
            <textarea name="content" cols="30" rows="10" required></textarea>
        </label>
        <br>
        <input type="submit" value="Post">
    </form>
</body>
</html>