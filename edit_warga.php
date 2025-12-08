<?php
require_once '../config.php';

$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM warga WHERE id='$id'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat_lahir'];
    $tgl = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $status = $_POST['status_perkawinan'];

    $sql = "UPDATE warga SET 
                NIK='$nik', 
                nama='$nama', 
                tempat_lahir='$tempat', 
                tanggal_lahir='$tgl', 
                gender='$gender', 
                agama='$agama', 
                status_perkawinan='$status'
            WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: data_warga.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-4 text-warning">Edit Data Warga</h3>

    <form method="POST" class="card p-4 shadow">

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="NIK" value="<?= $data['NIK'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="L" <?= ($data['gender']=='L')?'selected':''; ?>>Laki-laki</option>
                <option value="P" <?= ($data['gender']=='P')?'selected':''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" value="<?= $data['agama'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status Perkawinan</label>
            <select name="status_perkawinan" class="form-control">
                <option value="belum kawin" <?= ($data['status_perkawinan']=='belum kawin')?'selected':''; ?>>Belum Kawin</option>
                <option value="kawin" <?= ($data['status_perkawinan']=='kawin')?'selected':''; ?>>Kawin</option>
            </select>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="data_warga.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

</body>
</html>
