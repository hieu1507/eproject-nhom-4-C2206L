<?php
    $name_mn = $thutu = "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $name_mn = $_POST['name_mn'];
        $thutu = $_POST['thutu'];

        $sql = "INSERT INTO mn_animal(id_mn_animal, name_mn, thutu) values('','$name_mn', '$thutu')";
        query($sql);
    }
    header('Location: list_mn_animal.php');
?>