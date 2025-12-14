<?php
session_start();
require_once "../config.php";
function uploadFile($fieldname, $id_ajuan)
{
    $filename = $_FILES[$fieldname]['name'];
    $tmp = $_FILES[$fieldname]['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext == 'pdf') {
        $newname = 'file_' . time() . '.' . $ext;
        $destination = "../uploads/file/" . $newname;
        move_uploaded_file($tmp, $destination);
        return $newname;
    }else{
        $_SESSION['alert'] = "File harus pdf!";
        header("Location:index.php?p=detail&id_ajuan=$id_ajuan");
        exit;
    }
}

if (isset($_POST['kirim'])) {

    $id_ajuan = $_POST['id_ajuan'];
    $status   = $_POST['verifikasi'];

    $verifikasi = $koneksi->query("UPDATE ajuan SET status = '$status' WHERE id_ajuan = $id_ajuan");

    if ($verifikasi) {
        header("Location: index.php?p=detail&id_ajuan=$id_ajuan");
        exit();
    } else {
        echo "Error SQL: " . $koneksi->error;
    }
}
if (isset($_POST['upload'])) {

    $id_ajuan = $_POST['id_ajuan'];
    $file = uploadFile('surat', $id_ajuan);

    $upload = $koneksi->query("UPDATE ajuan SET `file` = '$file', `status` = 'Selesai' WHERE id_ajuan = $id_ajuan");

    if ($upload) {
        header("Location: index.php?p=detail&id_ajuan=$id_ajuan");
        exit();
    } else {
        echo "Error SQL: " . $koneksi->error;
    }
}
if (isset($_POST['submit'])) {

    $id_ajuan = $_POST['id_ajuan'];
    $tanggal = $_POST['tanggal'];

    $upload = $koneksi->query("UPDATE ajuan SET `Tanggal` = '$tanggal', `status` = 'Selesai' WHERE id_ajuan = $id_ajuan");
    if ($upload) {
        header("Location: index.php?p=detail&id_ajuan=$id_ajuan");
        exit();
    } else {
        echo "Error SQL: " . $koneksi->error;
    }
}
if (isset($_POST['keduanya'])) {

    $id_ajuan = $_POST['id_ajuan'];
    $tanggal = $_POST['tanggal'];
    $file = uploadFile('surat', $id_ajuan);

    $upload = $koneksi->query("UPDATE ajuan SET `Tanggal` = '$tanggal',`file` = '$file', `status` = 'Selesai' WHERE id_ajuan = $id_ajuan");
    if ($upload) {
        header("Location: index.php?p=detail&id_ajuan=$id_ajuan");
        exit();
    } else {
        echo "Error SQL: " . $koneksi->error;
    }
}
