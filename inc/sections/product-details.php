<section class="product-details spad">
    <div class="container">
        <?php
        $result = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '".$_GET['pid']."'");
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
        if(!empty($row['reviews'])) {
            $reviewsA = $row['reviews'];
            $reviews = unserialize($reviewsA);
        } else { $reviews = 0; }?>
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="<?= $dir.$images[0] ?>" alt="">
                        </a>
                        <a class="pt" href="#product-2">
                            <img src="<?= $dir.$images[1] ?>" alt="">
                        </a>
                        <a class="pt" href="#product-3">
                            <img src="<?= $dir.$images[2] ?>" alt="">
                        </a>
                        <a class="pt" href="#product-4">
                            <img src="<?= $dir.$images[3] ?>" alt="">
                        </a>
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="<?= $dir.$images[0] ?>" alt="">
                            <img data-hash="product-2" class="product__big__img" src="<?= $dir.$images[1] ?>" alt="">
                            <img data-hash="product-3" class="product__big__img" src="<?= $dir.$images[2] ?>" alt="">
                            <img data-hash="product-4" class="product__big__img" src="<?= $dir.$images[3] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3><?= $row['productName'] ?> <span>Brand: <?= htmlentities($row['company']) ?></span></h3>
                    <div class="rating">
                        <!--<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>-->
                        <span>( <?php if ($reviews != 0){echo count($reviews); } else {echo $reviews;} ?> reviews )</span>
                    </div>
                    <div class="product__details__price"> <?= htmlentities($row['price']) ?> <span> <?= htmlentities($row['priceBeforeDiscount']) ?> </span></div>
                    <div class="product__details__button">
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        <?php if ($row['availability'] <= 0){ ?> <p>Out Of Stock</p>
                        <?php } else { ?>
                            <a href="?pid=<?= $row['id'] ?>&action=add" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                        <?php } ?>
                        <ul>
                            <li><a href="#" title="Add to Wish-List"><span class="icon_heart_alt"></span></a></li>
<!--                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>-->
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <?php if ($row['availability'] <= 0){ ?> <p>Out Of Stock</p>
                                <?php } else { ?> <p>Available</p> <?php } ?>
                            </li>
                            <li>
                                <span>Shipping:</span>
                                <p>₦ <?= htmlentities($row['shippingCharge']) ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( <?php if ($reviews != 0){echo count($reviews); } else {echo $reviews;} ?> )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <?= $row['description'] ?>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews ( <?= count($reviews) ?> )</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            <?php
            $related = mysqli_query($con, "SELECT * FROM `products` WHERE `category` = '".$row['category']."' ORDER BY RAND()");
            while ($rel = mysqli_fetch_assoc($related)){
            $startDate = $rel['created_at']; $presentDate = date('Y-m-d');
            $endDate = strtotime($startDate. ' + 3 days');
            if (($presentDate >= $startDate) && ($presentDate <= $endDate)){$rel['created_at']=true;}else{$rel['created_at']=false;};
            if(!empty($rel['imageId'])) {
                $imageId = $rel['imageId'];
                $imgQuery=mysqli_query($con, /** @lang text */ "SELECT * FROM `images` WHERE `id`='$imageId'");
                $imgResult=mysqli_fetch_array($imgQuery);
                $images = unserialize($imgResult['name']);
                $dir= "admin/assets/img/products/$imageId/";
            }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?= $dir.$images[0] ?>">
                        <?php if ($rel['availability'] <= 0){ ?> <div class="label bg-danger">Out Of Stock</div>
                        <?php } elseif ($rel['created_at'] = true){ ?><div class="label new">New</div><?php } ?>
                        <ul class="product__hover">
                            <li><a href="<?= $dir.$images[0] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="details.php?pid=<?= $rel['id'] ?>"><?= $rel['productName'] ?></a></h6>
                        <!--<div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>-->
                        <div class="product__price">₦ <?= $rel['price'] ?><span>₦ <?= $rel['priceBeforeDiscount'] ?></span></div>
                    </div>
                </div>
            </div>
            <?php }  } ?>
        </div>
    </div>
</section>