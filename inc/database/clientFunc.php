<?php
if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['pid']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM products WHERE id={$id}";
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['price']);
        header('Location: shop-cart.php');
        }else{
            $message="Product ID is invalid";
        }
    }
}