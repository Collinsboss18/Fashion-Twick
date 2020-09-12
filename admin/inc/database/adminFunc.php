<?php
// --- Category CRUD Functions --- //
if (isset($_POST['createCat'])) {
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */"INSERT INTO `category` (`catName`, `catDescription`) VALUES ('$name', '$description')";
    $createCat = insert_query($query);
    if(!$createCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_GET['delCat'])) {
    $delcat = $_GET['delCat'];
    $query = /** @lang text */"DELETE FROM `category` WHERE id = '$delcat'";
    $deleteCat = insert_query($query);
    if(!$deleteCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_POST['updateCat'])) {
    $id = $_GET['updateCat'];
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */"UPDATE `category` SET `catName`='$name',catDescription='$description',updated_at=now() where id='$id'";
    $updateCat = insert_query($query);
    if(!$updateCat){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        header('Location: category.php');
    }
}

// --- Sub-Category CRUD Functions --- //
if (isset($_POST['createSub'])) {
    $catid = $_POST['categoryId'];
    $subname = $_POST['subName'];
    $query = /** @lang text */"INSERT INTO `subcategory` (`categoryid`, `subcategory`) VALUES ('$catid', '$subname')";
    $createSub = insert_query($query);
    if(!$createSub){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }
}
if (isset($_POST['updateSub'])) {
    $id = $_GET['updateSub'];
    $catid = $_POST['categoryId'];
    $subname = $_POST['subName'];
    $query = /** @lang text */"UPDATE `subcategory` SET `categoryid`='$catid',`subcategory`='$subname',updated_at=now() where id='$id'";
    $updateSub = insert_query($query);
    if(!$updateSub){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        header('Location: sub-category.php');
    }
}
if (isset($_GET['delSub'])) {
    $id = $_GET['delSub'];
    $query = /** @lang text */"DELETE FROM `subcategory` WHERE id = '$id'";
    $delSub = insert_query($query);
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
    $query = /** @lang text */"INSERT INTO `products`(`category`, `subCategory`, `productName`, `company`, `price`, `priceBeforeDiscount`, `description`, `shippingCharge`, `availability`, `updated_at`) VALUES ('$categoryId','$subcategory','$productName','$company','$price','$beforeDiscount','$description','$shippingCharge','$availability', now())";
    $createProduct = insert_query($query);
    if(!$createProduct){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    }else{
        $getProduct = /** @lang text */"SELECT * FROM `products` WHERE `id`=(SELECT max(id) FROM `products`)";
        $result = select_query($getProduct);
        while ($row = mysqli_fetch_assoc($result)) {
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

    $query = /** @lang text */"INSERT INTO `images`(`name`) VALUE ('$images')";
    $insertImage = insert_query($query);
    if(!$insertImage){
        die('QUERY FAILED' . mysqli_error(db_connect()));
    } else {
        $productId = $_GET['i'];
        $getProduct = /** @lang text */"UPDATE `products` SET `imageId`='$imgId' WHERE `id`='$productId'";
        insert_query($getProduct);
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
    $query = /** @lang text */"UPDATE `products` SET `category`='$categoryId',`subCategory`='$subcategory',`productName`='$productName', `company`='$company',`price`='$price', `priceBeforeDiscount`='$beforeDiscount',`description`='$description',`shippingCharge`='$shippingCharge',`availability`='$availability',`updated_at`=now() WHERE `id`='$uid'";
    insert_query($query);
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
    $delProQuery = /** @lang text */"DELETE FROM `products` WHERE id = '$id'";
    insert_query($delProQuery);
    header('Location: product.php');
}