<?php
session_start();


$id_sp = $_GET['id_sp'];
$so_luong = $_GET['so_luong'];



if( isset( $_SESSION['gio_hang'] ) ){
    $gio_hang = $_SESSION['gio_hang'];
}else{
    $gio_hang = [];
}

if( isset( $gio_hang[$id_sp] ) ){
    $gio_hang[$id_sp] += $so_luong; 
}else{
    $gio_hang[$id_sp] = $so_luong;
}
$_SESSION['gio_hang'] = $gio_hang;

header("Location: cart.php");