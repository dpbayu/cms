<!-- PHP Start -->
<?php
session_start();
include_once "../includes/db.php";
if (isset($_SESSION['user_role']))
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Start -->
                    <div class="row">
                        <!-- Categories Card Start -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Categories
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $sql = "SELECT * FROM category";
                                                    $query = mysqli_query($db, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo "$count";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories Card End -->
                        <!-- News Card Start -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                News
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $sql = "SELECT * FROM news";
                                                    $query = mysqli_query($db, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo "$count";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sharp fa-solid fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- News Card End -->
                        <!-- Pages Card Start -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pages
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                    $sql = "SELECT * FROM pages";
                                                    $query = mysqli_query($db, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo "$count";
                                                ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pages Card End -->
                        <!-- User Card Start -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $sql = "SELECT * FROM user";
                                                    $query = mysqli_query($db, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo "$count";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- User Card End -->
                    </div>
                    <!-- Content End -->
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