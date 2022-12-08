<?php
session_start();
include_once "../includes/db.php";
$news_title = $_POST['news_title'];
$category_id = $_POST['category_id'];
$news_content = $_POST['news_content'];
$button = $_POST['button'];

$image = "";
if (!empty($_FILES['file']['name'])) {
    $name_file = $_FILES['file']['name'];
    $new_image = date('dmYHis').$name_file;
    move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/".$new_image);
    $update_image = ", news_images='$new_image'";
}
if ($button == "Add") {
        mysqli_query($db, "INSERT INTO news (news_title, category_id, news_content, news_images) 
        VALUES ('$news_title', '$category_id', '$news_content', '$new_image')");
        header("Location: news.php?message=Data success add");
        exit();
} else if ($button == "Update") {
    $news_id = $_GET['id'];
    mysqli_query($db, "UPDATE news SET category_id='$category_id', 
    news_title='$news_title', 
    news_content='$news_content' 
    $update_image WHERE news_id='$news_id'");
    header("Location: news.php?message=Data success update");
    exit();
}
?>