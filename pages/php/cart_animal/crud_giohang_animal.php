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
    $id_animal = $_GET['plus'];
    foreach ($_SESSION['cart_animal'] as $cart_animal_item){
        if($cart_animal_item['id_animal'] != $id_animal){

            $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                'quantity_animal'=>$cart_animal_item['quantity_animal'], 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
            );

            $_SESSION['cart_animal'] = $animal;
        }else {
            $plus_number = $cart_animal_item['quantity_animal'] + 1;
            if($cart_animal_item['quantity_animal'] <= 9 ){
                $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$plus_number, 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                );
            }else {
                $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$cart_animal_item['quantity_animal'], 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                );
            }
            $_SESSION['cart_animal'] = $animal;
        }
    }
    header('Location: ../giohang.php');
}

//minus number
if(isset($_GET['minus'])){
    $id_animal = $_GET['minus'];
    foreach ($_SESSION['cart_animal'] as $cart_animal_item){
        if($cart_animal_item['id_animal'] != $id_animal){

            $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                'quantity_animal'=>$cart_animal_item['quantity_animal'], 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
            );

            $_SESSION['cart_animal'] = $animal;
        }else {
            $minus_number = $cart_animal_item['quantity_animal'] - 1;
            if($cart_animal_item['quantity_animal'] > 1 ){
                $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$minus_number, 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                );
            }else {
                $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$cart_animal_item['quantity_animal'], 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                );
            }
            $_SESSION['cart_animal'] = $animal;
        }
    }
    header('Location: ../giohang.php');
}

//delete all animal
if(isset($_GET['delete_all'])&&$_GET['delete_all']==1){
    unset($_SESSION['cart_animal']);
    header('Location: ../giohang.php');
}

//delete one animal

if(isset($_SESSION['cart_animal'])&&isset($_GET['delete'])){
    $id_animal = $_GET['delete'];
    foreach ($_SESSION['cart_animal'] as $cart_animal_item){
        if($cart_animal_item['id_animal'] != $id_animal){
            $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                'quantity_animal'=>$quantity_animal+1, 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
            );
        }
    }
    $_SESSION['cart_animal'] = $animal;
    header('Location: ../giohang.php');
}

//add animal to cart_animal
if(isset($_POST['themgiohang'])){
    $id_animal = $_GET['id_animal'];
    $quantity_animal = 1;
    $sql_animal = "SELECT * FROM animal, mn_animal 
    where animal.id_mn_animal = mn_animal.id_mn_animal and id_animal = '$id_animal'";
    $query = mysqli_query($mysqli, $sql_animal);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_animal = array(array('name_animal'=>$row['name_animal'],'id_animal'=>$id_animal,
        'quantity_animal'=>$quantity_animal, 'price_animal'=>$row['price_animal'],'avatar'=>$row['avatar'],
        'id_mn_animal'=>$row['id_mn_animal'], 'type_animal'=>$row['name_mn']
        ));
        //check session cart_animal isset
        if(isset($_SESSION['cart_animal'])){
            $found = false;
            foreach ($_SESSION['cart_animal'] as $cart_animal_item) {
                //neu du lieu trung
                if($cart_animal_item['id_animal'] == $id_animal){
                    $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$quantity_animal+1, 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                    );
                    $found = true;
                //neu du lieu khong trung
                }else {
                    $animal[] = array('name_animal'=>$cart_animal_item['name_animal'],'id_animal'=>$cart_animal_item['id_animal'],
                    'quantity_animal'=>$quantity_animal, 'price_animal'=>$cart_animal_item['price_animal'],'avatar'=>$cart_animal_item['avatar'],
                    'id_mn_animal'=>$cart_animal_item['id_mn_animal'],'type_animal'=>$row['name_mn']
                    );
                }
            }
            if($found == false){
                //connect data animal va new_animal
                $_SESSION['cart_animal'] = array_merge($animal, $new_animal);
            }else{
                $_SESSION['cart_animal'] = $animal;
            }
        }else {
            $_SESSION['cart_animal'] = $new_animal;
        }
    }
}
header('Location: ../giohang.php');
?>