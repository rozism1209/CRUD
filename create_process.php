<?php
$title = trim($_POST['title']);
$content = trim($_POST['content']);

if (!$title || !$content) {
    header('Location: create.php?invalid=1');
    die;
}

include_once 'db.php';

$stmt = $mysqli->prepare("INSERT INTO post (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);
$stmt->execute();

header("Location: .");
$stmt->close();
$mysqli->close();