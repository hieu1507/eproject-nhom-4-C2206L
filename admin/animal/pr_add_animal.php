<?php
   $service = $name = $price = $description = $avatar = $fileToUpload =  $quantity = $status = $cartegory= "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $service = $_POST['service'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $fileToUpload = $_POST['fileToUpload'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $cartegory = $_POST['cartegory'];
       
        if ($quantity <= 0 || $price <0) {
            echo '<script language="javascript">';
            echo "if(confirm('Enter quantity or price greater than 0'))";
            echo "{document.location.href='add_animal.php'};";
            echo '</script>';
        } else {
            include 'uploadfile.php'; 

            $sql = "INSERT INTO animal(id_animal, service, name_animal, price_animal, avatar, description, quantity_animal, status, id_mn_animal) 
            values('','$service', '$name', '$price', '$avatar', '$description', '$quantity', '$status', '$cartegory')";
            query($sql);
            header('Location: list_animal.php');
        } 
    }
?>