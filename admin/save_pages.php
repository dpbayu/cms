<?php
session_start();
include_once "../includes/db.php";
if (isset($_POST['submit'])) {
    $pages_name = $_POST['pages_name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO pages VALUES ('', '$pages_name', '$description')";
    if (mysqli_query($db, $sql)) {
        header("Location: pages.php?message=Data succes");
        exit();
    } else {
        header("Location: pages.php?message=Data failed");
        exit();
    }
}
?>