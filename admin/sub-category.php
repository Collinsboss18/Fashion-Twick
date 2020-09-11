<?php $page = "sub-category" ?>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Sub-Categories</h4>
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
                                        <th scope="col">Sub-Category</th>
                                        <th scope="col">Created</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $query = /** @lang text */"SELECT subcategory.id,category.catName,subcategory.subcategory,subcategory.created_at FROM subcategory JOIN category ON category.id=subcategory.categoryid";
                                    $result= select_query($query);
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?= htmlentities($cnt) ?></th>
                                            <td><?= htmlentities($row['catName']) ?></td>
                                            <td><?= htmlentities($row['subcategory']) ?></td>
                                            <td><?= htmlentities(date("d-m-y", strtotime($row['created_at']))) ?></td>
                                            <td><a href="?updateSub=<?= $row['id'] ?>" class="text-cyan"><i class="mdi mdi-table-edit"></i></a></td>
                                            <td><a href="?delSub=<?= $row['id'] ?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
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
            <div class="col-md-4">
                <?php if (isset($_GET['updateSub'])) {?>
                    <?php require ('inc/templates/updatesubcat.php');?>
                <?php } else { ?>
                    <?php require ('inc/templates/createsubcat.php');?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Content Section  -->
    <!-- footer -->
    <?php require_once ('./inc/sections/footer.php') ?>
    <!-- End footer -->
    <!-- Main wrapper -->
