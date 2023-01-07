<?php
$id_animal = $name_mn = $thutu = "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_mn_animal = $_POST['id_mn_animal'];
    $name_mn = $_POST['name_mn'];
    $thutu = $_POST['thutu'];

    $sql = "Update mn_animal set  name_mn='$name_mn', thutu='$thutu' where id_mn_animal='$id_mn_animal'";
    query($sql);
    header('Location: list_mn_animal.php');

}

