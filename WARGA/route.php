<?php  
$p=$_GET['p'];
switch($p){
    case 'dashboard':
        require_once "home.php";
        break;
    case 'ajukan_surat':
        require_once "pengajuan.php";
        break;
    case 'ajuan_saya':
        require_once "ajuan.php";
        break;
    case 'form':
        require_once "form.php";
        break;
    case 'hapus':
        require_once "hapus.php";
        break;
    case 'edit':
        require_once "edit.php";
        break;
    case 'detail':
        require_once "detail.php";
        break;
    case 'logout':
        require_once "../logout.php";
        break;
    
default:
    require_once "home.php";
    break;
}
?>