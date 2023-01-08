<?php
session_start();
require_once ('../../admin/dbhelper.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($conn, 'utf8');

$id_users = $_SESSION['id_users'];
$code_order = rand(0, 9999);
$insert_cart = "INSERT INTO tbl_cart(id_users,code_cart,cart_status)VALUES('$id_users','$code_order','1');";
$cart_query = mysqli_query($conn, $insert_cart);

if($cart_query){
if(isset($_SESSION['cart_product'])){
    foreach ($_SESSION['cart_product'] as $key => $value) {
        $id_product = $value['id_product'];
        $quantity_product = $value['quantity_product'];
        $insert_cart_product_details = "INSERT INTO tbl_cart_details(id_product,code_cart,quantity_product) VALUES('$id_product','$code_order','$quantity_product');";
        mysqli_query($conn, $insert_cart_product_details);
    }
}

if(isset($_SESSION['cart_animal'])){
    foreach ($_SESSION['cart_animal'] as $key => $value) {
        $id_animal = $value['id_animal'];
        $quantity_animal = $value['quantity_animal'];
        $insert_cart_animal_details = "INSERT INTO tbl_cart_details(id_animal,code_cart,quantity_animal) VALUES('$id_animal','$code_order','$quantity_animal');";
        mysqli_query($conn, $insert_cart_animal_details);
    }
}
}
mysqli_close($conn);
unset($_SESSION['cart_product']);
unset($_SESSION['cart_animal']);
header('Location: thanks.php')

?>