<?php
// --- Category CRUD Functions --- //
if (isset($_POST['createCat'])) {
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */"INSERT INTO `category` (`catName`, `catDescription`) VALUES ('$name', '$description')";
    insert_query($query);
}
if (isset($_GET['delCat'])) {
    $id = $_GET['delCat'];
    $query = /** @lang text */"DELETE FROM `category` WHERE id = '$id'";
    insert_query($query);
}
if (isset($_POST['updateCat'])) {
    $id = $_GET['updateCat'];
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */"UPDATE `category` SET `catName`='$name',catDescription='$description',updated_at=now() where id='$id'";
    insert_query($query);
    header('Location: category.php');
}

// --- Sub-Category CRUD Functions --- //
if (isset($_POST['createSub'])) {
    $catid = $_POST['categoryId'];
    $subname = $_POST['subName'];
    $query = /** @lang text */"INSERT INTO `subcategory` (`categoryid`, `subcategory`) VALUES ('$catid', '$subname')";
    insert_query($query);
    header('Location: sub-category.php');
}
if (isset($_POST['updateSub'])) {
    $id = $_GET['updateSub'];
    $catid = $_POST['categoryId'];
    $subname = $_POST['subName'];
    $query = /** @lang text */"UPDATE `subcategory` SET `categoryid`='$catid',`subcategory`='$subname',updated_at=now() where id='$id'";
    insert_query($query);
    header('Location: sub-category.php');
}
if (isset($_GET['delSub'])) {
    $id = $_GET['delSub'];
    $query = /** @lang text */"DELETE FROM `subcategory` WHERE id = '$id'";
    insert_query($query);
}