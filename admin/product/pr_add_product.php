<?php
   $name = $price = $description = $avatar = $fileToUpload =  $quantity = $status = $cartegory= "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $cartegory = $_POST['cartegory'];
        
        if ($quantity <= 0 || $price < 0) {
            echo '<script language="javascript">';
            echo "if(confirm('Enter quantity or price greater than 0'))";
            echo "{document.location.href='add_product.php'};";
            echo '</script>';
        } else {
            include 'uploadfile.php'; 

            $sql = "INSERT INTO product(id_product, name_product, price_product, avatar, description, quantity_product, status, id_mn_product) 
            values('', '$name', '$price', '$avatar', '$description', '$quantity', '$status', '$cartegory')";
            query($sql);
            header('Location: list_product.php');
        } 
    }

?>