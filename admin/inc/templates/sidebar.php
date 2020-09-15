<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="assets/img/users/<?= $_SESSION['infoA']['image'] ?>" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium"><?= $_SESSION['infoA']['name'] ?> <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"><?= $_SESSION['infoA']['email'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="index.php"><i class="ti-user m-r-5 m-l-5"></i> Dashboard</a>
                                <a class="dropdown-item" href="index.php"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <a class="dropdown-item" href="profile.php"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="p-15 m-t-10">
                    <a href="product.php?action=create" class="btn btn-block create-btn text-white no-block d-flex align-items-center">
                        <i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">New Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./category.php" aria-expanded="false">
                        <i class="mdi mdi-table-edit"></i><span class="hide-menu">Create Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sub-category.php" aria-expanded="false">
                        <i class="mdi mdi-view-module"></i><span class="hide-menu">Sub Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="product.php" aria-expanded="false">
                        <i class="mdi mdi-shopping"></i><span class="hide-menu">Manage Products</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php" aria-expanded="false">
                        <i class="mdi mdi-account-edit"></i><span class="hide-menu">Manage Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                        <i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="trash.php" aria-expanded="false">
                        <i class="fa fa-trash"></i><span class="hide-menu">Trash</span>
                    </a>
                </li>
                <li class="text-center p-40 upgrade-btn">
                    <a href="/" class="btn btn-block btn-danger text-white" target="_blank">Back Home</a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>