<?php require ('inc/database/config.php'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <title>Fashion Twick || Admin</title>
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--  Costume  -->
    <script src="assets/js/script.js"></script>
    <script src="./assets/libs/ckeditor/ckeditor.js" type="text/javascript"></script>
</head>

<body>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Content Section  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Admin Login</h2>
                        <form class="form-horizontal form-material" name="adminLogin" action="" method="post">
                            <?php if (isset($e_msg)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $e_msg ?>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="col-md-12">Email Address</label>
                                <div class="col-md-12">
                                    <input name="email" type="email" placeholder="example@gmail.com" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input name="password" type="password" placeholder="********" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button name="aLogin" class="btn btn-success"><i class="mdi mdi-login"></i> Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <footer class="footer text-center">
        All Rights Reserved by Fashion Twick. Designed and Developed by <a href="#">Collins Charles</a>.
    </footer>
</div>

    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="./assets/js/waves.js"></script>
    <!--Custom JavaScript -->
    <script src="./assets/js/custom.js"></script>
</body>
</html>