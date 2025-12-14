<?php
require_once "../config.php";

$id_ajuan = $_GET['id_ajuan'];
$data = $koneksi->query("SELECT * FROM ajuan WHERE id_ajuan = $id_ajuan")->fetch_assoc();

$id_surat= $data['id_surat'];
$surat   = $koneksi->query("SELECT * FROM surat WHERE id_surat = $id_surat")->fetch_assoc();
$nama_surat = $surat['nama_surat'];

switch ($id_surat) {
    case 1:  $keperluan = "Pengajuan Surat Keterangan Tidak Mampu (SKTM)"; break;
    case 2:  $keperluan = "Pengurusan Surat Keterangan Catatan Kepolisian (SKCK)"; break;
    case 3:  $keperluan = "Keterangan Usaha"; break;
    default: $keperluan = "Keperluan Administrasi";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $nama_surat ?></title>
    <style>
        body {
            width: 700px;
            margin: auto;
            font-family: 'Times New Roman';
            font-size: 14pt;
        }
        .header { text-align: center; margin-bottom: 30px; }
        .content { text-align: justify; line-height: 1.7; }
        .ttd { margin-top: 50px; float: right; text-align: center; }

    </style>
</head>

<body>

<div class="header">
    <h4><?= strtoupper($nama_surat) ?></h4>
    <hr>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini, Kepala Desa menerangkan bahwa:</p>

    <table>
        <tr><td>Nama</td><td>: <?= $data['Nama'] ?></td></tr>
        <tr><td>NIK</td><td>: <?= $data['NIK'] ?></td></tr>
        <tr><td>Tempat/Tgl Lahir</td><td>: <?= $data['Tempat_lahir'] ?> / <?= date("d-m-Y",strtotime($data['Tanggal_lahir'])) ?></td></tr>
        <tr><td>Alamat</td><td>: <?= $data['Alamat'] ?></td></tr>
    </table>

    <br>

    <p>
        Benar bahwa orang tersebut adalah warga Desa dan surat ini dibuat untuk keperluan:
        <b><?= $keperluan ?></b>
    </p>

    <p>Demikian surat ini dibuat agar dapat digunakan sebagaimana mestinya.</p>
</div>

<div class="ttd">
    <p>Desa, <?= date('d F Y') ?></p>
    <br><br><br>
    <p><b>Kepala Desa</b></p>
</div>

<script>
    window.print();
</script>




</body>
</html>
