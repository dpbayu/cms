<!-- PHP Start -->
<?php
session_start();
include_once "../includes/db.php";
$news_title = "";
$category_id = "";
$news_content = "";
$button = "Add";
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
                    <form action="save_news.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title News</label>
                            <input type="text" class="form-control" id="title" name="news_title"
                                placeholder="Insert your title news">
                        </div>
                        <div class="form-group">
                            <label for="category">Category News</label>
                            <select class="form-control" id="category" name="category_id">
                                <?php
                                $sql = "SELECT * FROM category";
                                $cek_sql = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($cek_sql)) { ?>
                                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description News</label>
                            <textarea id="description" class="form-control" name="news_content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image News</label>
                            <input type="file" id="image" name="file">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="button" class="btn btn-primary"
                                value="<?php echo $button; ?>"></input>
                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal End-->
</body>

</html>