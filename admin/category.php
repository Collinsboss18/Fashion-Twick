<?php $page = "category" ?>
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
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Available Product Categories</h4>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
                                <table class="datatable-1 table text-capitalize">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Description</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $result= mysqli_query($con, /** @lang text */ "SELECT * FROM category WHERE `isActive`=1");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <th scope="row"><?= htmlentities($cnt) ?></th>
                                            <td><?= htmlentities($row['catName']) ?></td>
                                            <td><?= htmlentities($row['catDescription']) ?></td>
                                            <td><a href="?updateCat=<?= $row['id'] ?>" class="text-cyan"><i title="Edit" class="mdi mdi-table-edit"></i></a></td>
                                            <td><a href="?delCat=<?= $row['id'] ?>" class="text-danger"><i title="Delete" class="fa fa-trash" onClick="return confirm('Are you sure you want to delete?')"></i></a></td>
                                        </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            <?php if (isset($_GET['updateCat'])) {?>
                <?php require ('inc/templates/category/updatecat.php');?>
            <?php } else { ?>
                <?php require ('inc/templates/category/createcat.php');?>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Content Section  -->
<!-- footer -->
<?php require_once ('./inc/sections/footer.php') ?>
<!-- End footer -->
    <!-- Main wrapper -->
