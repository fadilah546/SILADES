<?php 
$p = $_GET ['p'];
switch($p){
    case 'login';
    require_once 'autentikasi/login.php';
    break;
    case 'daftar';
    require_once 'autentikasi/registrasi.php';
    break;
}

?>