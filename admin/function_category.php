<?php
session_start();
// Connect to database
require "../includes/db.php";

// Function Add Category Start
if (isset($_POST['add-category'])) {
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
// Function Add Category End

// Function Delete Category Start
if (!isset($_GET['id'])){
    header("Location: index.php");
    exit();
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM category WHERE category_id = '$id'";
    if (mysqli_query($db, $sql)) {
        header("Location: category.php?message=Data successfully delete");
        exit();
    } else {
        header("Location: category.php?message=Data failed delete");
        exit();    
    }
}
// Function Delete Category End
?>