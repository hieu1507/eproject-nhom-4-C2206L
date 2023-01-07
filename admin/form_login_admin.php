<?php

    if(!empty($_POST)){
        require_once ('dbhelper.php');

        $name = $_POST['name'];
        $password = md5($_POST['password']);

        $sql = "SELECT * from admin WHERE name = '$name' and password = '$password'";
        $admin = queryResult($sql, true);

        if($admin != null){
            $_SESSION['admin'] = $admin;
            header('Location: index.php');
            die();
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Enter username or password wrong")';
            echo '</script>';
        }
    }
?>