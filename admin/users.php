<?php $page = "manage users" ?>
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
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Manage Products</h4>
                            </div>
                            <div class="ml-auto">
                                <div class="dl">
                                    <a title="Print Data" href="#" onclick="window.print()" style="font-size: 2em;" class="mdi mdi-printer text-secondary"></i></a>
                                    <a title="Create Product" href="?action=create"><i style="font-size: 2em;" class="mdi mdi-plus-box text-cyan"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['msg'])){ ?>
                            <div class="alert alert-success" role="alert"> <?= $_SESSION['msg'] ?> </div>
                        <?php } ?>
                        <script>setTimeout(function () {<?php unset($_SESSION['msg']); ?>}, 3000)</script>
                        <div class="table-responsive">
                            <table class="datatable-1 table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone no</th>
                                    <th scope="col">Reg. Date</th>
                                    <th scope="col">Make Admin</th>
                                    <th scope="col">Block</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $result = mysqli_query($con, /** @lang text */ "SELECT * FROM `users` WHERE `id` != '".$_SESSION['infoA']['id']."'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <th scope="row"><?= htmlentities($cnt) ?></th>
                                        <td><?= htmlentities($row['name']) ?></td>
                                        <td><?= htmlentities($row['email']) ?></td>
                                        <td><?= htmlentities($row['contactno']) ?></td>
                                        <td><?= htmlentities(date("D-M-y", strtotime($row['regDate']))) ?></td>
                                        <td><a href="?action=<?php if (empty($row['role']) || $row['role'] != 'admin'){echo 'admin';}else{echo 'removea';} ?>&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><?php if (empty($row['role']) || $row['role'] != 'admin'){echo 'Make Admin';}else{echo 'Remove Admin';} ?></a></td>
                                        <td><a onClick="return confirm('Are you sure you want to delete?')" href="?action=<?php if ($row['isActive'] > 0){echo 'block';}else{echo 'unblock';} ?>&id=<?= $row['id'] ?>" class="btn btn-sm text-white <?php if ($row['isActive'] > 0){echo 'btn-danger';}else{echo 'btn-cyan';} ?>"> <?php if ($row['isActive'] > 0){echo 'Block';}else{echo 'Unblock';} ?></a></td>
                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>
                                </tbody>
                            </table>
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
