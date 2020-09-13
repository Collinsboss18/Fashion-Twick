<?php $page = "profile" ?>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <?php $userId = $_SESSION['infoA']['id'];
                    $user = mysqli_query($con, /** @lang text */ "SELECT * FROM `users` WHERE `id`='$userId' LIMIT 1");
                    $result = mysqli_fetch_assoc($user);?>
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-t-30" style="text-align: center;"> 
                                    <img src="assets/img/users/<?= $_SESSION['infoA']['image'] ?>" class="rounded-circle align-content-center" width="150"  alt="Profile Image"/>
                                    <h4 class="card-title m-t-10"><?= $result['name'] ?> </h4>
                                </div>
                            </div>
                            <div>
                            <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?= $result['email'] ?></h6> <small class="text-muted p-t-30 db">Password</small>
                                <h6>*********</h6>
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" name="updatePassword" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?= $result['name'] ?>" class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email Address</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="<?= $result['email'] ?>" class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Profile Image</label>
                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirm Password</label>
                                        <div class="col-md-12">
                                            <input name="password" type="password" placeholder="********" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input name="newPassword" type="password" placeholder="********" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="changePassword" class="btn btn-success"><i class="mdi mdi-account-settings-variant"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
    <!-- End Content Section  -->
<!-- footer -->
<?php require_once ('./inc/sections/footer.php') ?>
<!-- End footer -->
    <!-- Main wrapper -->