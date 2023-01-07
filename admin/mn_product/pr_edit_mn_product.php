<?php
$id_animal = $name_mn = $thutu = "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_mn_product = $_POST['id_mn_product'];
    $name_mn = $_POST['name_mn'];
    $thutu = $_POST['thutu'];

    $sql = "Update mn_product set  name_mn='$name_mn', thutu='$thutu' where id_mn_product='$id_mn_product'";
    query($sql);
    header('Location: list_mn_product.php');

}

