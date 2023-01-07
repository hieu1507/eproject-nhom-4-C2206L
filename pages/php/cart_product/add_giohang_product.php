<?php
session_start();
include('../../../admin/dbhelper.php');
if(isset($_POST['themgiohang'])){
    $id_product = $_GET['id_product'];
    $quantity_product = 1;
    $sql_product = "SELECT * FROM product where id_product = '$id_product'";
    $row = queryResult($sql_product);
    if($row){
        $new_product = array(array('name_product'=>$row['name_product'],'id_product'=>$id_product,
        'quantity_product'=>$quantity_product, 'price_product'=>$row['price_product'],'avatar'=>$row['avatar'],
        'id_mn_product'=>$row['id_mn_product']
        ));
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu du lieu trung
                if($cart_item['id_product'] == $id_product){
                    $product = array(array('name_product'=>$cart_item['name_product'],'id_product'=>$cart_item['id_product'],
                    'quantity_product'=>$quantity_product+1, 'price_product'=>$cart_item['price_product'],'avatar'=>$cart_item['avatar'],
                    'id_mn_product'=>$cart_item['id_mn_product']
                    ));
                    $found = true;
                //neu du lieu khong trung
                }else {
                    $product = array(array('name_product'=>$cart_item['name_product'],'id_product'=>$cart_item['id_product'],
                    'quantity_product'=>$quantity_product, 'price_product'=>$cart_item['price_product'],'avatar'=>$cart_item['avatar'],
                    'id_mn_product'=>$cart_item['id_mn_product']
                    ));
                }
            }
            if($found=false){
                //connect data product va new_product
                $_SESSION['cart'] = array_merge($product, $new_product);
            }else{
                $_SESSION['cart'] = $product;
            }
        }else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location: ../giohang.php');
}
?>