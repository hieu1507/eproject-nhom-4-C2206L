<?php
    if(!empty($_POST)){
        require_once ('../../admin/dbhelper.php');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $pwd = md5($_POST['pwd']);
        $re_pwd = md5($_POST['re_pwd']);

        if($pwd != $re_pwd){
            echo '<script language="javascript">';
            echo 'alert("Enter Repeat Password Wrong!")';
            echo '</script>';
        }
        else{
            $sql = "INSERT INTO users (id_users, name, email, phone, address, password) 
            values('','$name','$email','$phone', '$address','$pwd')";
            query($sql);
            echo '<script language="javascript">';
            echo 'alert("Register Successfully!")';
            echo '</script>';
        }
    }
?>
