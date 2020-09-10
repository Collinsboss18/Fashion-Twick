<?php
// --- Category Functions --- //
if (isset($_POST['createCat'])) {
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */
        "INSERT INTO `category` (`catName`, `catDescription`) VALUES ('$name', '$description')";
    insert_query($query);
}
if (isset($_GET['delcat'])) {
    $id = $_GET['delcat'];
    $query = /** @lang text */
        "DELETE FROM `category` WHERE id = '$id'";
    insert_query($query);
}
if (isset($_POST['updatecat'])) {
    echo $id = $_GET['editcat'];
    $name = $_POST['catName'];
    $description = $_POST['catDescription'];
    $query = /** @lang text */
        "UPDATE category SET `catName`='$name',catDescription='$description',updated_at=now() where id='$id'";
    insert_query($query);
    header('Location: /admin/category.php');
}