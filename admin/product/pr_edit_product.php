<?php
$id_product =  $name = $price = $description = $avatar = $image = $fileToUpload =  $quantity = $status = $cartegory= "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_product = $_POST['id_product'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES["fileToUpload"]["name"];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $cartegory = $_POST['cartegory'];

    if($image != ""){
        include 'uploadfile.php';

        $sql = "Update product set  status='$status', quantity_product='$quantity', id_mn_product='$cartegory', name_product='$name', price_product='$price', description='$description', avatar='$avatar' where id_product='$id_product'";
        query($sql);
        header('Location: list_product.php');
    }
    else{
        $sql = "Update product set  status='$status', quantity_product='$quantity', id_mn_product='$cartegory', name_product='$name', price_product='$price', description='$description' where id_product='$id_product'";
        query($sql);
        header('Location: list_product.php');
    }

}

