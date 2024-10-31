<?php
include_once 'db.php';

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$title = mysqli_real_escape_string($mysqli, trim($_POST['title']));
$content = mysqli_real_escape_string($mysqli, trim($_POST['content']));

if (empty($title) || empty($content)) {
    header("Location: edit.php?id=$id&invalid=1");
    die;
}

$stmt = $mysqli->prepare("UPDATE post SET title = ?, content = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $content, $id);
$stmt->execute();

if ($stmt->error) {
    error_log("Error updating post: " . $stmt->error);
    header("Location: edit.php?id=$id&error=1");
    die;
}

header('Location: .');