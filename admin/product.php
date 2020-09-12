<?php $page = "manage product" ?>
<!-- Header Section -->
<?php require_once ('./inc/sections/header.php') ?>
<!-- Header Section End -->
<!-- Main wrapper -->
<!-- TopBar Section -->
<?php require_once ('./inc/templates/topbar.php') ?>
<!-- TopBar Section End -->
<!-- SideBar Section -->
<?php require_once ('./inc/templates/sidebar.php') ?>
<!-- SideBar Section End -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <?php require_once ('./inc/sections/breadcrumb.php') ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- Content Section  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php if (isset($_GET['action']) && $_GET['action'] == 'create' && isset($_GET['i']) && !empty($_GET['i'])){ ?>
                        <?php require ('inc/templates/product/createproductimg.php'); ?>
                    <?php } elseif(isset($_GET['action']) && $_GET['action'] == 'create') { ?>
                        <?php require ('inc/templates/product/createproduct.php'); ?>
                    <?php } elseif(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['i']) && !empty($_GET['i'])) { ?>
                        <?php require ('inc/templates/product/updateproduct.php'); ?>
                    <?php } else { ?>
                        <?php require ('inc/templates/product/manageproduct.php'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Section  -->
    <!-- footer -->
    <?php require_once ('./inc/sections/footer.php') ?>
    <!-- End footer -->
    <!-- Main wrapper -->
