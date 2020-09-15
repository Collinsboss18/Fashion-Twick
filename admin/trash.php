<?php $page = 'Trash' ?>
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
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Trash</h4>
                                <h5 class="card-subtitle">You can recover deleted Products, Categories and Messages</h5>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Messages!!</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable-1 table text-capitalize">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query=mysqli_query($con, /** @lang text */ "SELECT message.id AS msgid,message.name AS msgname,message.message AS message, trash.id AS id  FROM trash JOIN message ON message.id=trash.messageId ");
                                $cnt=1;
                                while($row=mysqli_fetch_assoc($query)) { ?>

                                    <tr>
                                        <th scope="row"><?= htmlentities($cnt) ?></th>
                                        <th scope="row"><?= $row['msgname'] ?></th>
                                        <th scope="row"><?= $row['message'] ?></th>
                                        <td><a href="?msgRestore=<?= $row['msgid'] ?>" class="text-success">Restore</a></td>
                                        <td><a href="?delMsgCom=<?= $row['msgid'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?')"> Delete</a></td>
                                    </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Categories!!</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable-1 table text-capitalize">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query=mysqli_query($con, /** @lang text */ "SELECT category.catName AS catname,category.id AS catid,category.catDescription AS catdescription, trash.id AS id  FROM trash JOIN category ON category.id=trash.categoryId ");
                                $cnt=1;
                                while($row=mysqli_fetch_assoc($query)) { ?>

                                    <tr>
                                        <th scope="row"><?= htmlentities($cnt) ?></th>
                                        <th scope="row"><?= $row['catname'] ?></th>
                                        <th scope="row"><?= $row['catdescription'] ?></th>
                                        <td><a href="?catRestore=<?= $row['catid'] ?>" class="text-success">Restore</a></td>
                                        <td><a href="?delCatCom=<?= $row['catid'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?')"> Delete</a></td>
                                    </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Products!!</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable-1 table text-capitalize">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query=mysqli_query($con, /** @lang text */ "SELECT products.productName AS productname,products.id AS productid,products.company AS company, trash.id AS id  FROM trash JOIN products ON products.id=trash.productId ");
                                $cnt=1;
                                while($row=mysqli_fetch_assoc($query)) { ?>

                                    <tr>
                                        <th scope="row"><?= htmlentities($cnt) ?></th>
                                        <th scope="row"><?= $row['productname'] ?></th>
                                        <th scope="row"><?= $row['company'] ?></th>
                                        <td><a href="?proRestore=<?= $row['productid'] ?>" class="text-success">Restore</a></td>
                                        <td><a href="?delProCom=<?= $row['productid'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?')"> Delete</a></td>
                                    </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Section  -->
<!-- footer -->
<?php require_once ('./inc/sections/footer.php') ?>
<!-- End footer -->
<!-- Main wrapper -->
