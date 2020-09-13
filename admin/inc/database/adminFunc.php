<?php
// --- Category CRUD Functions --- //
if (isset($_POST['createCat'])) {
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $createCat =  mysqli_query($con,/** @lang text */"INSERT INTO `category` (`catName`, `catDescription`) VALUES ('$name', '$description')");
    if(!$createCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_GET['delCat'])) {
    $delcat = $_GET['delCat'];
    $deleteCat = mysqli_query($con,/** @lang text */"DELETE FROM `category` WHERE id = '$delcat'");
    if(!$deleteCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_POST['updateCat'])) {
    $id = $_GET['updateCat'];
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $updateCat = mysqli_query($con,/** @lang text */"UPDATE `category` SET `catName`='$name',catDescription='$description',updated_at=now() where id='$id'");
    if(!$updateCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        header('Location: category.php');
    }
}

// --- Sub-Category CRUD Functions --- //
if (isset($_POST['createSub'])) {
    $catId = $_POST['categoryId'];
    $subName = $_POST['subName'];
    $createSub = mysqli_query($con,/** @lang text */"INSERT INTO `subcategory` (`categoryid`, `subcategory`) VALUES ('$catId', '$subName')");
    if(!$createSub){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_POST['updateSub'])) {
    $id = $_GET['updateSub'];
    $catId = $_POST['categoryId'];
    $subName = $_POST['subName'];
    $updateSub = mysqli_query($con,/** @lang text */"UPDATE `subcategory` SET `categoryid`='$catId',`subcategory`='$subName',updated_at=now() where id='$id'");
    if(!$updateSub){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        header('Location: sub-category.php');
    }
}
if (isset($_GET['delSub'])) {
    $id = $_GET['delSub'];
    $delSub = mysqli_query($con,/** @lang text */"DELETE FROM `subcategory` WHERE id = '$id'");
    if(!$delSub){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}

// --- Product CRUD Functions --- //
if (isset($_POST['createProduct'])) {
    $categoryId = $_POST['categoryId'];
    $subcategory = $_POST['subcategoryId'];
    $productName = $_POST['productName'];
    $company = $_POST['company'];
    $availability = $_POST['available'];
    $price = $_POST['price'];
    $beforeDiscount = $_POST['beforeDiscount'];
    $shippingCharge = $_POST['shippingCharge'];
    $description = $_POST['description'];
    $createProduct = mysqli_query($con,/** @lang text */"INSERT INTO `products`(`category`, `subCategory`, `productName`, `company`, `price`, `priceBeforeDiscount`, `description`, `shippingCharge`, `availability`, `updated_at`) VALUES ('$categoryId','$subcategory','$productName','$company','$price','$beforeDiscount','$description','$shippingCharge','$availability', now())");
    if(!$createProduct){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        $getProduct = mysqli_query($con,/** @lang text */"SELECT * FROM `products` WHERE `id`=(SELECT max(id) FROM `products`)");
        while ($row = mysqli_fetch_assoc($getProduct)) {
            header('Location: product.php?action=create&i='.$row['id']);
        }
    }
}
if (isset($_POST['insertImage'])) {
    $image1 = date('m-s').time().basename($_FILES['image1']['name']);
    $image2 = date('m-s').time().basename($_FILES['image2']['name']);
    $image3 = date('m-s').time().basename($_FILES['image3']['name']);
    $image4 = date('m-s').time().basename($_FILES['image4']['name']);
    $query=mysqli_query($con, /** @lang text */ "select max(id) as pid from images");
    $result=mysqli_fetch_array($query);
    $imgId=$result['pid']+1;
    $dir="assets/img/products/$imgId/";
    if(!is_dir($dir))mkdir("assets/img/products/$imgId");
    move_uploaded_file($_FILES["image1"]["tmp_name"], $dir.$image1);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $dir.$image2);
    move_uploaded_file($_FILES["image3"]["tmp_name"], $dir.$image3);
    move_uploaded_file($_FILES["image4"]["tmp_name"], $dir.$image4);

    $img = []; array_push($img, $image1, $image2, $image3, $image4);
    $images =  serialize($img);

    $insertImage = mysqli_query($con,/** @lang text */"INSERT INTO `images`(`name`) VALUE ('$images')");
    if(!$insertImage){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    } else {
        $productId = $_GET['i'];
        $getProduct = mysqli_query($con,/** @lang text */"UPDATE `products` SET `imageId`='$imgId' WHERE `id`='$productId'");
        header('Location: product.php');
    }
}
if (isset($_POST['updateProduct'])) {
    $uid = $_GET['i'];
    $categoryId = $_POST['categoryId'];
    $subcategory = $_POST['subcategoryId'];
    $productName = $_POST['productName'];
    $company = $_POST['company'];
    $availability = $_POST['available'];
    $price = $_POST['price'];
    $beforeDiscount = $_POST['beforeDiscount'];
    $shippingCharge = $_POST['shippingCharge'];
    $description = $_POST['description'];
    mysqli_query($con,/** @lang text */"UPDATE `products` SET `category`='$categoryId',`subCategory`='$subcategory',`productName`='$productName', `company`='$company',`price`='$price', `priceBeforeDiscount`='$beforeDiscount',`description`='$description',`shippingCharge`='$shippingCharge',`availability`='$availability',`updated_at`=now() WHERE `id`='$uid'");
    header('Location: product.php');
}
if (isset($_GET['delPro'])) {
    $id = $_GET['delPro'];
    $query=mysqli_query($con, /** @lang text */ "SELECT * FROM `products` WHERE `id`='$id'");
    $result=mysqli_fetch_array($query);
    if(!empty($result['imageId'])) {
        $imageId = $result['imageId'];
        $imgQuery=mysqli_query($con, /** @lang text */ "SELECT * FROM `images` WHERE `id`='$imageId'");
        $imgResult=mysqli_fetch_array($imgQuery);
        $images = unserialize($imgResult['name']);
        $dir= "assets/img/products/$imageId";
        array_map('unlink', glob("$dir/*.*"));
        if(is_dir($dir))rmdir($dir);
//        mysqli_query($con, /** @lang text */ "DELETE FROM `images` WHERE `id`='$imageId'");
    }
    $delProQuery = mysqli_query($con,/** @lang text */"DELETE FROM `products` WHERE id = '$id'");
    header('Location: product.php');
}

// --- Profile CRUD Functions --- //
// Handling Login
if (isset($_POST['aLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $getAdmin = mysqli_query($con, /** @lang text */ "SELECT * FROM `users` WHERE `email`='$email' AND `isActive`=true AND `role`='admin'");
    $result = mysqli_fetch_assoc($getAdmin);
    if (password_verify($password, $result['password'])){
        $_SESSION['infoA'] = $result;
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("Location: http://$host$uri/index.php");
    }
    $e_msg = "Invalid username or password";
}
// Manage Profile
if (isset($_POST['changePassword'])){
    $id = $_SESSION['infoA']['id'];
    $password = $_POST['password'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    if (password_verify($password, $_SESSION['infoA']['password'])) {
        if (!empty($_FILES['image']['name'])) {
            $image = date('m-s') . time() . basename($_FILES['image']['name']); $dir="assets/img/users/";
            if (!is_dir($dir)) mkdir("assets/img/users/");
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir.$image);
            mysqli_query($con, /** @lang text */ "UPDATE `users` SET `password`='$newPassword',`image`='$image' WHERE id='".$_SESSION['infoA']['id']."'");
            $_SESSION['infoA']['password'] = $newPassword;
        } else {
            mysqli_query($con, /** @lang text */ "UPDATE `users` SET `password`='$newPassword' WHERE id='$id'");
            $_SESSION['infoA']['password'] = $newPassword;
        }
        $msg = "Success profile updated";
    } else {
        $e_msg = "Error ";
    }
}
