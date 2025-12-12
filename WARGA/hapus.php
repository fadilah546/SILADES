<?php
require_once '../config.php';
if (isset($_POST['id_ajuan'])) {
    $id = intval($_POST['id_ajuan']);

    $stmt = $koneksi->prepare("DELETE FROM ajuan WHERE id_ajuan = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ajuan.php?msg=deleted");
        exit();
    } else {
        header("Location: ajuan.php?msg=error");
        exit();
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $koneksi->prepare("DELETE FROM ajuan WHERE id_ajuan = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ajuan.php?msg=deleted");
        exit();
    } else {
        header("Location: ajuan.php?msg=error");
        exit();
    }
}

header("Location: ajuan.php?msg=invalid");
exit();
?>