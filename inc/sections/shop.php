<div class="col-lg-9 col-md-9">
    <div class="row">
        <?php
            $result = mysqli_query($con, "SELECT * FROM `products` WHERE `category` = '".$_GET['category']."'");
            while ($row = mysqli_fetch_assoc($result)){
                $startDate = $row['created_at']; $presentDate = date('Y-m-d');
                $endDate = strtotime($startDate. ' + 3 days');
                if (($presentDate >= $startDate) && ($presentDate <= $endDate)){$row['created_at']=true;}else{$row['created_at']=false;};
                if(!empty($row['imageId'])) {
                    $imageId = $row['imageId'];
                    $imgQuery=mysqli_query($con, /** @lang text */ "SELECT * FROM `images` WHERE `id`='$imageId'");
                    $imgResult=mysqli_fetch_array($imgQuery);
                    $images = unserialize($imgResult['name']);
                    $dir= "admin/assets/img/products/$imageId/";
                }
        ?>
        <div class="col-lg-4 col-md-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="<?= $dir.$images[0] ?>">
                    <?php if ($row['availability'] <= 0){ ?> <div class="label bg-danger">Out Of Stock</div>
                    <?php } elseif ($row['created_at'] = true){ ?><div class="label new">New</div><?php } ?>
                    <ul class="product__hover">
                        <li><a href="<?= $dir.$images[0] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="details.php?pid=<?= $row['id'] ?>"><?= $row['productName'] ?></a></h6>
                    <!--<div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>-->
                    <div class="product__price">₦ <?= $row['price'] ?><span>₦ <?= $row['priceBeforeDiscount'] ?></span></div>
                </div>
            </div>
        </div>
        <?php }  ?>
<!--        <div class="col-lg-12 text-center">-->
<!--            <div class="pagination__option">-->
<!--                <a href="#">1</a>-->
<!--                <a href="#">2</a>-->
<!--                <a href="#">3</a>-->
<!--                <a href="#"><i class="fa fa-angle-right"></i></a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
