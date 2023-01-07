<?php
require_once('config.php');

function init(){
    initDB();

    query('create table if not exists events (
        id_ev int primary key auto_increment,
        ev_title varchar(50),
        ev_avatar varchar(100),
        ev_start datetime,
        ev_end datetime,
        ev_description longtext
    )');

    query('create table if not exists tbl_cart (
        id_cart int primary key auto_increment,
        id_users_cart int,
        code_cart varchar(10),
        cart_status int
    )');

    query('create table if not exists tbl_cart_details (
        id_cart_details int primary key auto_increment,
        id_animal int,
        id_product int,
        code_cart varchar(10),
        quantity_buy int
    )');

    query('create table if not exists animal (
        id_animal int primary key auto_increment,
        service varchar(100),
        name_animal varchar(50),
        avatar varchar(100),
        quantity_animal int,
        price_animal varchar(50),
        description longtext,
        status int,
        id_mn_animal int
    )');

    query('create table if not exists product (
        id_product int primary key auto_increment,
        avatar varchar(100),
        name_product varchar(50),
        quantity_product int,
        description longtext,
        price_product varchar(50),
        status int,
        id_mn_product int 
    )');


    query('create table if not exists users (
        id_users int primary key auto_increment,
        name varchar(50),
        email varchar(50),
        phone varchar(20),
        address varchar(50),
        password varchar(50),
        id_users_cart int
    )');

    query('create table if not exists admin (
        id_admin int primary key auto_increment,
        name varchar(50),
        password varchar(50),
        admin_status int
    )');

    query('create table if not exists contact (
        id_contact int primary key auto_increment,
        time_create varchar(50),
        name varchar(50),
        email varchar(50),
        address varchar(50),
        comment longtext
    )');

    query('create table if not exists mn_animal (
        id_mn_animal int primary key auto_increment,
        name_mn varchar(100),
        thutu int unique
    )');

    query('create table if not exists mn_product (
        id_mn_product int primary key auto_increment,
        name_mn varchar(100),
        thutu int unique
    )');

    query('ALTER TABLE animal 
        ADD CONSTRAINT FK_Animal_Mn 
        FOREIGN KEY (id_mn_animal) REFERENCES mn_animal(id_mn_animal)
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

    query('ALTER TABLE product 
        ADD CONSTRAINT FK_Product_Mn 
        FOREIGN KEY (id_mn_product) REFERENCES mn_product(id_mn_product)
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

 
}

function initDB(){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, 'create database if not exists '.DB);

    mysqli_close($conn);
}

function query($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);

}

function queryResult($sql, $isSingle = false){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    $resultset = mysqli_query($conn, $sql);
    $data = [];

    while (($row = mysqli_fetch_array($resultset,1)) != null){
            $data[] = $row;
    }

    mysqli_close($conn);

    if($isSingle){
            if (count($data) == 0) return null;

            return $data[0];
    }
    return $data;
}
?>