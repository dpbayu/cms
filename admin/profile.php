<!-- PHP Start -->
<?php
session_start();
include_once "../includes/db.php";
?>
<!-- PHP End -->

<!DOCTYPE html>
<html lang="en">
<!-- Header Start -->
<?php include_once("head.php") ?>
<!-- Header End -->

<body id="page-top">
    <!-- Page Wrapper Start -->
    <div id="wrapper">
        <!-- Sidebar Start -->
        <?php include_once("menu.php") ?>
        <!-- Sidebar End -->
        <!-- Content Wrapper Start -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content End -->
            <div id="content">
                <!-- Topbar Start -->
                <?php include_once("topbar.php") ?>
                <!-- Topbar End -->
                <!-- Container Fluid Start -->
                <div class="container-fluid">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control" id="username" name="user_name"
                                value="<?php echo $_SESSION['user_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="text" class="form-control" id="email" name="user_email"
                                value="<?php echo $_SESSION['user_email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="text" class="form-control" id="password" name="user_password">
                        </div>
                        <div class="form-group">
                            <label for="description">User Description</label>
                            <textarea type="text" class="form-control" id="description"
                                name="user_description"><?php echo $_SESSION['user_description'] ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['update'])) {
                            $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
                            $user_email = mysqli_real_escape_string($db, $_POST['user_email']);
                            $user_password = mysqli_real_escape_string($db, $_POST['user_password']);
                            $user_description = mysqli_real_escape_string($db, $_POST['user_description']);
                            if (empty($user_name) OR empty($user_email) OR empty($user_description)) {
                                echo "Field still empty";
                            } else {
                                if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                                    echo "Email not valid";
                                } else {
                                    if (empty($user_password)) {
                                        $user_id = $_SESSION['user_id'];
                                        $sql = "UPDATE user SET user_name = '$user_name', user_email = '$user_email', user_description = '$user_description' WHERE user_id = '$user_id'";
                                        if (mysqli_query($db, $sql)) {
                                            $_SESSION['user_name'] = $user_name;
                                            $_SESSION['user_email'] = $user_email;
                                            $_SESSION['user_description'] = $user_description;
                                            echo "<script type='text/javascript'>document.location.href = 'profile.php';</script>";
                                        } else {
                                            echo "Error";
                                        }
                                    } else {
                                        $hash = password_hash($user_password, PASSWORD_DEFAULT);
                                        $user_id = $_SESSION['user_id'];
                                        $sql2 = "UPDATE user SET user_name = '$user_name', user_email = '$user_email', user_description = '$user_description', user_password = '$hash' WHERE user_id = '$user_id'";
                                        if (mysqli_query($db, $sql2)) {
                                            session_unset();
                                            session_destroy();
                                            echo "<script>alert('Password success changed, please login again');
                                            document.location.href = 'login.php';
                                            </script>";
                                        } else {
                                            echo "error";
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                </div>
                <!-- Container Fluid End -->
            </div>
            <!-- Main Content End -->
            <!-- Footer Start -->
            <?php include_once("footer.php") ?>
            <!-- Footer End -->
        </div>
        <!-- Content Wrapper End -->
    </div>
    <!-- Page Wrapper End -->

    <!-- Scroll to Top Button Start-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scroll to Top Button End-->

    <!-- Logout Modal Start-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal End-->
</body>

</html>