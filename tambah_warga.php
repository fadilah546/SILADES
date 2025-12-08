<?php
require_once '../config.php';

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat_lahir'];
    $tgl = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $status = $_POST['status_perkawinan'];

    $sql = "INSERT INTO warga (NIK, nama, tempat_lahir, tanggal_lahir, gender, agama, status_perkawinan)
            VALUES ('$nik', '$nama', '$tempat', '$tgl', '$gender', '$agama', '$status')";

    if ($conn->query($sql)) {
        header("Location: data_warga.php");
        exit;
    } else {
        echo "Error: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-4 text-primary">Tambah Data Warga</h3>

    <form method="POST" class="card p-4 shadow">

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="NIK" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="gender" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Perkawinan</label>
            <select name="status_perkawinan" class="form-control">
                <option value="belum kawin">Belum Kawin</option>
                <option value="kawin">Kawin</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="data_warga.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

</body>
</html>
