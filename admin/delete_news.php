<?php
session_start();
include_once "../includes/db.php";
$id = $_GET['id'];
$sql = "DELETE FROM news WHERE news_id = '$id'";
    if (mysqli_query($db, $sql)) {
        header("Location: news.php?message=Data success delete");
        exit();
    } else {
        header("Location: news.php?message=Data failed delete");
        exit();
    }
?>