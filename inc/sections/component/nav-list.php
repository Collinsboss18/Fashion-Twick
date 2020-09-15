<?php if(isset($page)){ ?>
    <li class="<?php if($page == "home")echo 'active'?>"><a href="./index.php">Home</a></li>
    <?php
    $result= mysqli_query($con, /** @lang text */ "SELECT * FROM category WHERE `isActive`=1");
    while ($row = mysqli_fetch_assoc($result)){ ?>
    <li class="<?php if(isset($_GET['category'])&& $_GET['category'] == $row['id'])echo 'active'?>"><a href="./shop.php?category=<?= $row['id'] ?>"><?= $row['catName'] ?></a></li>
        <?php } ?>
    <li class="<?php if($page == "contact")echo 'active'?>"><a href="./contact.php">Contact</a></li>
<?php } ?>