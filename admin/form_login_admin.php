<?php
session_start();
    if(!empty($_POST)){
        require_once ('dbhelper.php');

        $name = $_POST['name'];
        $password = md5($_POST['password']);

        $sql = "SELECT * from admin WHERE name = '$name' and password = '$password' LIMIT 1";
        $admin = queryResult($sql, true);

        if($admin != null){
            $_SESSION['admin'] = $admin['name'];
            $_SESSION['id_admin'] = $admin['id_admin'];
            header('Location: index.php');
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Enter Username or Password Wrong")';
            echo '</script>';
        }
    }
?>