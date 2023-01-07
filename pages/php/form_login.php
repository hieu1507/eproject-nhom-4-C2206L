<?php
    if(!empty($_POST)){
        require_once ('../../admin/dbhelper.php');

        $email = $_POST['email'];
        $pwd = md5($_POST['pwd']);

        $sql = "SELECT * from users WHERE email = '$email' and password = '$pwd'";
        $users = queryResult($sql, true);

        if($users != null){
            $_SESSION['users'] = $users;
             header('Location: .php');
             die();
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Enter Email or Password Wrong")';
            echo '</script>';
        }
    }
?>