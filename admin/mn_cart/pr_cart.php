<?php
    if(isset($_GET['cart_status'])&&isset($_GET['code_cart'])){
    $cart_status = $_GET['cart_status'];
    $code_cart = $_GET['code_cart'];

    require_once('../dbhelper.php');
    $sql = "Update tbl_cart set cart_status='$cart_status' where code_cart='$code_cart'";
    query($sql);
    header('Location: list_cart.php');
    }
?>