<?php
session_start();
include_once "../includes/db.php";
if (!isset($_GET['id'])){
    header("Location: index.php");
    exit();
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM pages WHERE pages_id = '$id'";
    if (mysqli_query($db, $sql)) {
        header("Location: pages.php?message=Data successfully delete");
        exit();
    } else {
        header("Location: pages.php?message=Data failed delete");
        exit();    
    }
}
?>