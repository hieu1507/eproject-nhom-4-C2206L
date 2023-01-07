<?php
session_start();
include('../../../admin/dbhelper.php');
if(isset($_POST['themgiohang'])){
    $id_animal = $_GET['id_animal'];
    $quantity_animal = 1;
    $sql_animal = "SELECT * FROM animal where id_animal = '$id_animal'";
    $row = queryResult($sql_animal);
    if($row){
        $new_animal = array(array('name_animal'=>$row['name_animal'],'id_animal'=>$id_animal,
        'quantity_animal'=>$quantity_animal, 'price_animal'=>$row['price_animal'],'avatar'=>$row['avatar'],
        'id_mn_animal'=>$row['id_mn_animal']
        ));
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu du lieu trung
                if($cart_item['id_animal'] == $id_animal){
                    $animal = array(array('name_animal'=>$cart_item['name_animal'],'id_animal'=>$cart_item['id_animal'],
                    'quantity_animal'=>$quantity_animal+1, 'price_animal'=>$cart_item['price_animal'],'avatar'=>$cart_item['avatar'],
                    'id_mn_animal'=>$cart_item['id_mn_animal']
                    ));
                    $found = true;
                //neu du lieu khong trung
                }else {
                    $animal = array(array('name_animal'=>$cart_item['name_animal'],'id_animal'=>$cart_item['id_animal'],
                    'quantity_animal'=>$quantity_animal, 'price_animal'=>$cart_item['price_animal'],'avatar'=>$cart_item['avatar'],
                    'id_mn_animal'=>$cart_item['id_mn_animal']
                    ));
                }
            }
            if($found=false){
                //connect data animal va new_animal
                $_SESSION['cart'] = array_merge($animal, $new_animal);
            }else{
                $_SESSION['cart'] = $animal;
            }
        }else {
            $_SESSION['cart'] = $new_animal;
        }
    }
    header('Location: ../giohang.php');
}
?>