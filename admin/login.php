<!-- PHP Start -->
<?php
require_once "../includes/db.php";
?>
<!-- PHP End -->
<!DOCTYPE html>
<html lang="en">

<!-- Header Start -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LOGIN</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<!-- Header End -->

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row Start -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Card Body Start -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <!-- Form Start -->
                                    <form method="POST" action="" class="user">
                                        <div class="form-group">
                                            <input type="email" name="user_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="user_password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <?php
                                        if (isset($_POST['submit'])) {
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
                                    ?>
                                    <!-- Form End -->
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Outer Row End -->
    </div>

    <!-- JS Start -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- JS End -->

</body>

</html>