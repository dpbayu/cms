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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">News</h1>
                    <button type="button" data-toggle="modal" data-target="#form-modal" class="btn btn-primary mb-3">Add
                        Data Category</button>
                    <!-- Table Start -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['message'])) {
                                $msg = $_GET['message'];
                                echo '
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>'.$msg.'</strong>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name News</th>
                                            <th>Image News</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = "SELECT * FROM news ORDER BY news_id DESC";
                                        $result = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['news_title']; ?></td>
                                            <td><?php echo $row['news_images']; ?></td>
                                            <td>
                                                <a href="edit_news.php?id=<?php echo $row['news_id']; ?>"
                                                    class="btn btn-warning btn-sm mr-1">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure delete this data ?')"
                                                    href="delete_news.php?id=<?php echo $row['news_id']; ?>"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name News</th>
                                            <th>Image News</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table End -->
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

    <!-- JS Start -->
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <!-- JS End -->
</body>

</html>