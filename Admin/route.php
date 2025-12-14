<?php  
$p=$_GET['p'];
switch($p){
    case 'dashboard':
        require_once "home.php";
        break;
    case 'detail':
        require_once "detail.php";
        break;
    case 'logout':
        require_once "../logout.php";
        break;
    case 'verifikasi':
        require_once "verifikasi.php";
        break;
    case 'ajuan':
        require_once "ajuan.php";
        break;
    case 'surat':
        require_once "surat.php";
        break;
    case 'data_warga':
        require_once "data_warga.php";
        break;
    
default:
    require_once "home.php";
    break;
}
?>
