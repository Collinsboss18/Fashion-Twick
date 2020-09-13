<?php require ('inc/database/config.php'); ?>
<?php if (!isset($_SESSION['infoA']['id'])){
    header("Location: /");
} ?>
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
<!-- Preloader - style you can find in spinners.css -->
<!--<div class="preloader">-->
<!--    <div class="lds-ripple">-->
<!--        <div class="lds-pos"></div>-->
<!--        <div class="lds-pos"></div>-->
<!--    </div>-->
<!--</div>-->

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
