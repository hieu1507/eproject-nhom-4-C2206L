<?php
session_start();
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
            
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
            mysqli_set_charset($conn, 'utf8');
            
            mysqli_query($conn, $sql);

            $_SESSION['users'] = $name;

            $_SESSION['id_users'] = mysqli_insert_id($conn);

            header('Location: giohang.php');
        }
    }
?>
