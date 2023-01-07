<?php
   $name = $price = $description = $avatar = $fileToUpload =  $quantity = $status = $cartegory= "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $cartegory = $_POST['cartegory'];
        
        include 'uploadfile.php'; 

        $sql = "INSERT INTO product(id_product, name, price, avatar, description, quantity, status, id_mn_product) 
        values('', '$name', '$price', '$avatar', '$description', '$quantity', '$status', '$cartegory')";
        query($sql);
    }

    header('Location: list_product.php');
?>