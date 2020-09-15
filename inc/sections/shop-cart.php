<section class="shop-cart spad">
    <div class="container">
        <form name="cart" method="post">
            <?php if(!empty($_SESSION['cart'])) {?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Shipping Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $pdtid=array();
                            $sql = "SELECT * FROM products WHERE id IN(";
                            foreach($_SESSION['cart'] as $id => $value){
                                $sql .=$id. ",";
                            }
                            $sql=substr($sql,0,-1) . ") ORDER BY id DESC";
                            $query = mysqli_query($con,$sql);
                            $totalprice=0;
                            $totalqunty=0;
                            if(!empty($query)){
                            while($row = mysqli_fetch_array($query)){
                            if(!empty($row['imageId'])) {
                                $imageId = $row['imageId'];
                                $imgQuery=mysqli_query($con, /** @lang text */ "SELECT * FROM `images` WHERE `id`='$imageId'");
                                $imgResult=mysqli_fetch_array($imgQuery);
                                $images = unserialize($imgResult['name']);
                                $dir= "admin/assets/img/products/$imageId/";
                            }
                            $quantity=$_SESSION['cart'][$row['id']]['quantity'];
                            $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['price']+$row['shippingCharge'];
                            $totalprice += $subtotal;
                            $_SESSION['qnty']=$totalqunty+=$quantity;
                            array_push($pdtid,$row['id']);
                            //print_r($_SESSION['pid'])=$pdtid;exit;
                            ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img style="width: 20%;" src="<?= $dir.$images[0] ?>" alt="">
                                        <div class="cart__product__item__title">
                                            <a href="product-details.php?pid=<?= htmlentities($pd=$row['id']);?>" ><h6><?= $row['productName']; ?></h6></a>
                                            <p><?= $row['company']; ?></p>
                                        </div>
                                    </td>
                                    <td class="cart__price">₦ <?= $row['price']; ?></td>
                                    <td class="cart__price">₦ <?= $row['shippingCharge']; ?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?= $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?= $row['id']; ?>]">
                                        </div>
                                    </td>
                                    <td class="cart__total">₦ <?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['price']+$row['shippingCharge']); ?>.00</td>
                                    <td class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="index.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <input type="submit" name="submit" value="Update shopping cart" style="font-size: 14px;color: #111111;font-weight: 600;text-transform: uppercase;padding: 14px 30px 12px;border-radius: 0;border: none;">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-8">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>₦ <?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span></span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
</section>