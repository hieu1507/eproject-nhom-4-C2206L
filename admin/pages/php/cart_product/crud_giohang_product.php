<?php
session_start();
include('../../../admin/config.php');
$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DB);

if($mysqli -> connect_errno){
    echo "Failed to connect to MySQL" . $mysqli -> connect_errno;
    exit();
}

//plus number
if(isset($_GET['plus'])){
    $id_product = $_GET['plus'];
    foreach ($_SESSION['cart_product'] as $cart_product_item){
        if($cart_product_item['id_product'] != $id_product){

            $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                'quantity_product'=>$cart_product_item['quantity_product'], 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
            );

            $_SESSION['cart_product'] = $product;
        }else {
            $plus_number = $cart_product_item['quantity_product'] + 1;
            if($cart_product_item['quantity_product'] <= 9 ){
                $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$plus_number, 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                );
            }else {
                $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$cart_product_item['quantity_product'], 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                );
            }
            $_SESSION['cart_product'] = $product;
        }
    }
    header('Location: ../giohang.php');
}

//plus number
if(isset($_GET['minus'])){
    $id_product = $_GET['minus'];
    foreach ($_SESSION['cart_product'] as $cart_product_item){
        if($cart_product_item['id_product'] != $id_product){

            $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                'quantity_product'=>$cart_product_item['quantity_product'], 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
            );

            $_SESSION['cart_product'] = $product;
        }else {
            $minus_number = $cart_product_item['quantity_product'] - 1;
            if($cart_product_item['quantity_product'] > 1 ){
                $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$minus_number, 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                );
            }else {
                $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$cart_product_item['quantity_product'], 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                );
            }
            $_SESSION['cart_product'] = $product;
        }
    }
    header('Location: ../giohang.php');
}

//delete all product
if(isset($_GET['delete_all'])&&$_GET['delete_all']==1){
    unset($_SESSION['cart_product']);
    header('Location: ../giohang.php');
}

//delete one product

if(isset($_SESSION['cart_product'])&&isset($_GET['delete'])){
    $id_product = $_GET['delete'];
    foreach ($_SESSION['cart_product'] as $cart_product_item){
        if($cart_product_item['id_product'] != $id_product){
            $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                'quantity_product'=>$quantity_product+1, 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
            );
        }
    }
    $_SESSION['cart_product'] = $product;
    header('Location: ../giohang.php');
}

//add product to cart_product
if(isset($_POST['themgiohang'])){
    $id_product = $_GET['id_product'];
    $quantity_product = 1;
    $sql_product = "SELECT * FROM product, mn_product 
    where product.id_mn_product = mn_product.id_mn_product and id_product = '$id_product'";
    $query = mysqli_query($mysqli, $sql_product);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product = array(array('name_product'=>$row['name_product'],'id_product'=>$id_product,
        'quantity_product'=>$quantity_product, 'price_product'=>$row['price_product'],'avatar'=>$row['avatar'],
        'id_mn_product'=>$row['id_mn_product'], 'type_product'=>$row['name_mn']
        ));
        //check session cart_product isset
        if(isset($_SESSION['cart_product'])){
            $found = false;
            foreach ($_SESSION['cart_product'] as $cart_product_item) {
                //neu du lieu trung
                if($cart_product_item['id_product'] == $id_product){
                    $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$quantity_product+1, 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                    );
                    $found = true;
                //neu du lieu khong trung
                }else {
                    $product[] = array('name_product'=>$cart_product_item['name_product'],'id_product'=>$cart_product_item['id_product'],
                    'quantity_product'=>$cart_product_item['quantity_product'], 'price_product'=>$cart_product_item['price_product'],'avatar'=>$cart_product_item['avatar'],
                    'id_mn_product'=>$cart_product_item['id_mn_product'],'type_product'=>$row['name_mn']
                    );
                }
            }
            if($found == false){
                //connect data product va new_product
                $_SESSION['cart_product'] = array_merge($product, $new_product);
            }else{
                $_SESSION['cart_product'] = $product;
            }
        }else {
            $_SESSION['cart_product'] = $new_product;
        }
    }
}
header('Location: ../giohang.php');
?>