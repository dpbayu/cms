<?php
session_start();
include_once "../includes/db.php";
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
?>