<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links text-capitalize">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>
                        <?php if(isset($page) && $page != 'details'){
                            echo $page;
                        } elseif ($page == 'details') {
                            $result = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '".$_GET['pid']."'");
                            $row = mysqli_fetch_assoc($result);?>
                            <a href="shop.php?category=<?= $row['category'] ?>"> Shop </a>
                            <span><?= $row['productName'] ?></span>
                       <?php }?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>