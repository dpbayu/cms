<?php
session_start();
include_once "../includes/db.php";
if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO category VALUES ('', '$category_name')";
    if (mysqli_query($db, $sql)) {
        header("Location: category.php?message=Data succes");
        exit();
    } else {
        header("Location: category.php?message=Data failed");
        exit();
    }
}
?>