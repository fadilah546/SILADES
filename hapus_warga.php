<?php
require_once '../config.php';

$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET['id'];

$sql = "DELETE FROM warga WHERE id='$id'";

if ($conn->query($sql)) {
    header("Location: data_warga.php");
    exit;
} else {
    echo "Gagal menghapus data!";
}
?>
