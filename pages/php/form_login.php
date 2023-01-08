<?php
session_start();
    if(!empty($_POST)){
        require_once ('../../admin/dbhelper.php');

        $email = $_POST['email'];
        $pwd = md5($_POST['pwd']);

        $sql = "SELECT * from users WHERE email = '$email' and password = '$pwd' LIMIT 1";
        $users = queryResult($sql, true);

        if($users != null){
            $_SESSION['users'] = $users['name'];
            $_SESSION['id_users'] = $users['id_users'];

            header('Location: giohang.php');
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Enter Email or Password Wrong")';
            echo '</script>';
        }
    }
?>