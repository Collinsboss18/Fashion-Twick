<?php if(isset($page)){ ?>
    <li class="<?php if($page == "home")echo 'active'?>"><a href="./index.php">Home</a></li>
    <li><a href="./shop.php">Women’s</a></li>
    <li><a href="./shop.php">Men’s</a></li>
    <li><a href="./shop.php">Kids</a></li>
    <li><a href="./shop.php">Accessories</a></li>
    <li class="<?php if($page == "contact")echo 'active'?>"><a href="./contact.php">Contact</a></li>
<?php } ?>