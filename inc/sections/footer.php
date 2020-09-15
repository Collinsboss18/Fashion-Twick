<!-- Footer Section End -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.php"><img src="./assets/img/logo.png" alt=""></a>
                    </div>
                    <div class="footer__payment">
                        <a href="#"><img src="./assets/img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="./assets/img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="./assets/img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="./assets/img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="./assets/img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Shop With Us</h6>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <?php
                        $result= mysqli_query($con, /** @lang text */ "SELECT * FROM category WHERE `isActive`=1");
                        while ($row = mysqli_fetch_assoc($result)){ ?>
                            <li><a href="./shop.php?category=<?= $row['id'] ?>"><?= $row['catName'] ?></a></li>
                        <?php } ?>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <b>Fashion Twick</b> | All rights reserved by <a href="#" target="_blank">Collins Charles</a></p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="./assets/js/jquery-3.3.1.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.magnific-popup.min.js"></script>
<script src="./assets/js/jquery-ui.min.js"></script>
<script src="./assets/js/mixitup.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/jquery.slicknav.js"></script>
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/jquery.nicescroll.min.js"></script>
<script src="./assets/js/main.js"></script>
</body>

</html>