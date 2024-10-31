<?php
$id = $_POST['id'];

if (!$id) {
    header('Location: .');
    die;
}

include_once 'db.php';
$sql = "DELETE FROM post WHERE id = $id";
$mysqli->query($sql);