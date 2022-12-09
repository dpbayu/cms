<?php
session_start();
// Connect to database
require "../includes/db.php";

// Function login Start
if (isset($_POST['login'])) {
    $user_email = mysqli_escape_string($db, $_POST['user_email']);
    $user_password = mysqli_escape_string($db, $_POST['user_password']);
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?message=Masukan email yang benar");
        exit();
    } else {
        // pengecekan email
        $sql = "SELECT * FROM user WHERE user_email = '$user_email'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) <=0 ) {
            header("Location: login.php?message=Login Gagal");
            exit();
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                if (!password_verify($user_password, $row['user_password'])) {
                    header("Location: login.php?message=Password Salah");
                    exit();
                } else if (password_verify($user_password, $row['user_password'])) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_password'] = $row['user_password'];
                    $_SESSION['user_description'] = $row['user_description'];
                    $_SESSION['user_role'] = $row['user_role'];
                    header("Location: index.php");
                    exit();
                }
            }
        }
    }
}
// Function Login End

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

// Function Add Pages Start
if (isset($_POST['add-pages'])) {
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
// Function Add Pages End
?>