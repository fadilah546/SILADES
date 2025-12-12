<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$db = "silades_db";

$koneksi = mysqli_connect($hostname,$username,$password,$db);
if ($koneksi){

}else{
    echo "koneksi gagal";
}
?>