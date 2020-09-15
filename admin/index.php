<?php $page = 'dashboard' ?>
<!-- Header Section -->
<?php require_once ('./inc/sections/header.php') ?>
<?php require_once ('./inc/actions/getfeeds.php') ?>
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
                                    <h4 class="card-title">Today's Order</h4>
                                    <h5 class="card-subtitle">Overview of today's orders</h5>
                                </div>
                                <div class="ml-auto d-flex no-block align-items-center">
                                    <ul class="list-inline font-12 dl m-r-15 m-b-0">
                                        <li class="list-inline-item text-info"><i class="fa fa-clock"></i> 24 Hours</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <!-- column -->
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="max-height: 1000px;">
                                        <table class="table text-capitalize">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Product</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $f1="00:00:00"; $from=date('Y-m-d')." ".$f1; $t1="23:59:59"; $to=date('Y-m-d')." ".$t1;
                                            $query=mysqli_query($con, /** @lang text */ "SELECT users.name AS username,users.email AS useremail,users.contactno AS usercontact,users.shippingAddress AS shippingaddress,users.shippingCity AS shippingcity,users.shippingState AS shippingstate,users.shippingPincode AS shippingpincode,products.productName AS productname,products.shippingCharge AS shippingcharge,orders.quantity AS quantity,orders.orderDate AS orderdate,products.price AS price,orders.orderStatus AS status,orders.id AS id  FROM orders JOIN users ON  orders.userId=users.id JOIN products ON products.id=orders.productId WHERE orders.orderDate BETWEEN '$from' AND '$to' ORDER BY orders.id DESC");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <th scope="row"><?= htmlentities($cnt) ?></th>
                                                    <td><?= htmlentities($row['username']) ?></td>
                                                    <td><?= htmlentities($row['useremail']) ?></td>
                                                    <td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></td>
                                                    <td><?= htmlentities($row['productname']) ?></td>
                                                </tr>
                                                <?php $cnt = $cnt+1; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="feed-widget">
                                <ul class="list-style-none feed-body m-0 p-b-20">
                                    <li class="feed-item">
                                        <div class="feed-icon bg-info"><i class="far fa-bell"></i></div> Notification <span class="badge badge-info ml-auto text-white"><?= $notCount ?> New</span></li>
                                    <li class="feed-item">
                                        <div class="feed-icon bg-warning"><i class="mdi mdi-table-large"></i></div> Category<span class="badge badge-warning ml-auto text-white"><?= $categoryCount ?> Categories</span></li>
                                    <li class="feed-item">
                                        <div class="feed-icon bg-success"><i class="mdi mdi-account"></i></div> Sub Category<span class="badge badge-success ml-auto text-white"><?= $subCatCount ?> Subcategories</span></li>
                                    <li class="feed-item">
                                        <div class="feed-icon bg-danger"><i class="ti-shopping-cart-full"></i></div> Product<span class="badge badge-danger ml-auto text-white"><?= $productCount ?> Products</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Orders</h4>
                                    <h5 class="card-subtitle">All order's based on most recent</h5>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['msg'])){ ?>
                                <div class="alert alert-success" role="alert"> <?= $_SESSION['msg'] ?> </div>
                            <?php } ?>
                            <script>setTimeout(function () {<?php unset($_SESSION['msg']); ?>}, 3000)</script>
                            <div class="table-responsive">
                                <table class="datatable-1 table text-capitalize">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Actions</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query=mysqli_query($con, /** @lang text */ "SELECT users.name AS username,users.email AS useremail,users.contactno AS usercontact,users.shippingAddress AS shippingaddress,users.shippingCity AS shippingcity,users.shippingState AS shippingstate,users.shippingPincode AS shippingpincode,products.productName AS productname,products.shippingCharge AS shippingcharge,orders.quantity AS quantity,orders.isActive AS isActive,orders.orderDate AS orderdate,products.price AS price,orders.orderStatus AS status,orders.id AS id  FROM orders JOIN users ON  orders.userId=users.id JOIN products ON products.id=orders.productId ORDER BY orders.id DESC");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query)) {
                                        if ($row['isActive'] == 1) {?>

                                        <tr>
                                            <th scope="row"><?= htmlentities($cnt) ?></th>
                                            <td><?= htmlentities($row['username']) ?></td>
                                            <td><?= htmlentities($row['useremail']) ?></td>
                                            <td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></td>
                                            <td><?= htmlentities($row['productname']) ?></td>
                                            <td><?= htmlentities($row['quantity']) ?></td>
                                            <td><?= htmlentities($row['quantity']*$row['price']+$row['shippingcharge']) ?></td>
                                            <td><?php if ($row['status'] > 1) {
                                                    echo "<a href='?status={$row['status']}&id={$row['id']}' class='btn btn-sm btn-primary text-white'>In Process</a>";
                                                } elseif ($row['status'] > 0 && $row['status'] < 2) {
                                                    echo "<a href='?status={$row['status']}&id={$row['id']}' class='btn btn-sm btn-success text-white'>Delivered</a>";
                                                } else {
                                                    echo "<a class='btn btn-sm btn-secondary text-white' disabled='true'>Delivered</a>";
                                                }?>
                                            </td>
                                            <td><a href='?ordel=<?=$row['id']?>' class='btn btn-sm btn-danger text-white' onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                                        </tr>
                                        <?php $cnt = $cnt+1; } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Messages</h4>
                            <h5 class="card-subtitle">Messages form clients contact form</h5>
                            <?php if (isset($_SESSION['c_msg'])){ ?>
                                <div class="alert alert-success" role="alert"> <?= $_SESSION['c_msg'] ?> </div>
                            <?php } ?>
                            <script>setTimeout(function () {<?php unset($_SESSION['c_msg']); ?>}, 3000)</script>
                        </div>

                        <div class="comment-widgets scrollable">
                            <!-- Comment Row -->
                            <?php
                            $query=mysqli_query($con, /** @lang text */ "SELECT * FROM `message` WHERE `isActive`=1");
                            $cnt=1;
                            while($row=mysqli_fetch_array($query)) { ?>
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $row['name'] ?></h6>
                                    <span class="m-b-15 d-block"><?= $row['message'] ?> </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right"><?= htmlentities(date("F-d-Y", strtotime($row['date']))) ?></span>
                                        <span class="action-icons">
                                            <a class="text-danger" href="?message=<?= $row['id'] ?>"><i class="ti-trash"></i>DELETE</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
