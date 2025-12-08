<?php
require_once '../config.php';
$conn = new mysqli($host, $user, $pass, $db);

// Jika menggunakan GET (Proses / Selesai)
if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id     = $_GET['id'];
    $aksi   = $_GET['aksi'];

    if ($aksi == "proses") {
        $conn->query("UPDATE pengajuan SET status='Diproses' WHERE id='$id'");
    }
    elseif ($aksi == "selesai") {
        $conn->query("UPDATE pengajuan SET status='Selesai' WHERE id='$id'");
    }

    header("Location: konfirmasi_pengajuan.php");
    exit;
}

// Jika menggunakan POST (Tolak)
if (isset($_POST['id']) && isset($_POST['aksi']) && $_POST['aksi'] == "tolak") {

    $id     = $_POST['id'];
    $alasan = $_POST['alasan'];

    // Ambil tgl pengajuan
    $q = $conn->query("SELECT tanggal_pengajuan FROM pengajuan WHERE id='$id'");
    $data = $q->fetch_assoc();

    // Cek batas waktu 1 hari
    $tgl_pengajuan = strtotime($data['tanggal_pengajuan']);
    $sekarang      = time();

    if (($sekarang - $tgl_pengajuan) > 86400) { // 24 jam = 86400 detik
        die("<script>alert('Penolakan gagal! Melewati batas 1 hari.'); 
             window.location='konfirmasi_pengajuan.php';</script>");
    }

    $conn->query("UPDATE pengajuan 
                  SET status='Ditolak', alasan_tolak='$alasan' 
                  WHERE id='$id'");

    header("Location: konfirmasi_pengajuan.php");
    exit;
}

?>
