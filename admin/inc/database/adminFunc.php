<?php
// --- Category CRUD Functions --- //
if (isset($_POST['createCat'])) {
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $createCat =  mysqli_query($con,/** @lang text */"INSERT INTO `category` (`catName`, `catDescription`, `isActive`) VALUES ('$name', '$description', 1)");
    if($createCat){
        $_SESSION['c_msg'] = "Successful Category created";
    }
}
if (isset($_POST['updateCat'])) {
    $id = $_GET['updateCat'];
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $updateCat = mysqli_query($con,/** @lang text */"UPDATE `category` SET `catName`='$name',catDescription='$description',updated_at=now() WHERE id='$id'");
    if($updateCat){
//        $_SESSION['u_msg'] = "Successful Category updated";
        header('Location: category.php');
    }
}
if (isset($_GET['delCat'])) {
    $delCat = $_GET['delCat'];
    $deleteCat = mysqli_query($con,/** @lang text */"UPDATE `category` SET `isActive`='0' WHERE id='$delCat'");
    if($deleteCat){
        mysqli_query($con, /** @lang text */ "INSERT INTO `trash`(`categoryId`) VALUES ('$delCat')");
        header('Location: category.php');
    }
}
if (isset($_GET['delCatCom'])) {
    $catId = $_GET['delCatCom'];
    $deleteCat = mysqli_query($con,/** @lang text */"DELETE FROM `category` WHERE `id` = '$catId'");
    if($deleteCat){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `categoryId` = '$catId'");
        header('Location: trash.php');
    }
}
if (isset($_GET['catRestore'])) {
    $catId = $_GET['catRestore'];
    $deleteCat = mysqli_query($con,/** @lang text */"UPDATE `category` SET `isActive`=1 WHERE id='$catId'");
    if($deleteCat){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `categoryId` = '$catId'");
        header('Location: trash.php');
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
    $createProduct = mysqli_query($con,/** @lang text */"INSERT INTO `products`(`category`, `subCategory`, `productName`, `company`, `price`, `isActive`, `priceBeforeDiscount`, `description`, `shippingCharge`, `availability`, `updated_at`) VALUES ('$categoryId','$subcategory','$productName','$company','$price', 1,'$beforeDiscount','$description','$shippingCharge','$availability', now())");
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
    $query=mysqli_query($con, /** @lang text */ "UPDATE `products` SET `isActive`=0 WHERE `id`='$id'");
    if($query){
        mysqli_query($con, /** @lang text */ "INSERT INTO `trash`(`productId`) VALUES ('$id')");
    }
    header('Location: product.php');
}
if (isset($_GET['proRestore'])) {
    $id = $_GET['proRestore'];
    $query=mysqli_query($con, /** @lang text */ "UPDATE `products` SET `isActive`=1 WHERE `id`='$id'");
    if($query){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `productId`='$id'");
    }
    header('Location: product.php');
}

if (isset($_GET['delProCom'])) {
    $id = $_GET['delProCom'];
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
    if ($delProQuery){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `productId`='$id'");
        header('Location: trash.php');
    }
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








// --- Users Acton Functions --- //
if (isset($_GET['action']) && $_GET['action'] == 'admin'){
    $userId = $_GET['id'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `users` SET `role`='admin' WHERE `id`='$userId'");
    if ($result)$_SESSION['msg'] = "Successful user is now an admin";
    header("Location: users.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'removea'){
    $userId = $_GET['id'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `users` SET `role`=null WHERE `id`='$userId'");
    if ($result)$_SESSION['msg'] = "Successful user has been remove as an admin";
    header("Location: users.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'block'){
    $userId = $_GET['id'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `users` SET `isActive`=null WHERE `id`='$userId'");
    if ($result)$_SESSION['msg'] = "Successful user has been blocked";
    header("Location: users.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'unblock'){
    $userId = $_GET['id'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `users` SET `isActive`=1 WHERE `id`='$userId'");
    if ($result)$_SESSION['msg'] = "Successful user has been Unblocked";
    header("Location: users.php");
}









// --- Orders Acton Functions --- //
if (isset($_GET['status']) && isset($_GET['id'])){
    $orderId = $_GET['id'];
    $status  = $_GET['status'];
    if ($status > 1) {
        $result = mysqli_query($con, /** @lang text */ "UPDATE `orders` SET `orderStatus`=1 WHERE `id`='$orderId'");
        if ($result)$_SESSION['msg'] = "Successful Product has been set to In Process";
    } elseif ($status > 0 && $status < 2) {
        $result = mysqli_query($con, /** @lang text */ "UPDATE `orders` SET `orderStatus`=null WHERE `id`='$orderId'");
        if ($result)$_SESSION['msg'] = "Successful Product has been set to Delivered";
    }
    header("Location: index.php");
}
if (isset($_GET['ordel']) && isset($_GET['ordel'])){
    $orderId = $_GET['ordel'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `orders` SET `isActive`=0 WHERE `id`='$orderId'");
    if ($result) {
//        mysqli_query($con, /** @lang text */ "INSERT INTO `trash`(`orderId`) VALUES ('$orderId')");
        $_SESSION['msg'] = "Successful Product Deleted";
        header("Location: index.php");
    }
}








// --- Messages Acton Functions --- //
if (isset($_GET['message']) && !empty($_GET['message'])){
    $messageId = $_GET['message'];
    $result = mysqli_query($con, /** @lang text */ "UPDATE `message` SET `isActive`=0 WHERE `id`='$messageId'");
    if ($result){
        mysqli_query($con, /** @lang text */ "INSERT INTO `trash`(`messageId`) VALUES ('$messageId')");
        $_SESSION['c_msg'] = "Successful Message deleted";
        header("Location: index.php");
    }
}
if (isset($_GET['delMsgCom']) && !empty($_GET['delMsgCom'])){
    $messageId = $_GET['delMsgCom'];
    $result = mysqli_query($con, /** @lang text */ "DELETE FROM `message` WHERE `id`='$messageId'");
    if ($result){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `messageId`='$messageId'");
        header("Location: trash.php");
    }
}
if (isset($_GET['msgRestore']) && !empty($_GET['msgRestore'])){
    $messageId = $_GET['msgRestore'];
    $result = mysqli_query($con,/** @lang text */"UPDATE `message` SET `isActive`=1 WHERE id='$messageId'");
    if ($result){
        mysqli_query($con, /** @lang text */ "DELETE FROM `trash` WHERE `messageId`='$messageId'");
        header("Location: trash.php");
    }
}