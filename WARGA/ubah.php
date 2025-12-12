<?php
require_once "../config.php";
function uploadFile($fieldname)
{
    if ($_FILES[$fieldname]['name'] == "" || $_FILES[$fieldname]['error'] == 4) {
        return $oldFile;}
    $filename = $_FILES[$fieldname]['name'];
    $tmp = $_FILES[$fieldname]['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $newname = 'img_' . time() . '.' . $ext;
    $destination = "../uploads/" . $newname;
    move_uploaded_file($tmp, $destination);
    return $newname;
}

if (isset($_POST['submit'])) {
    $id_ajuan = $_POST['id_ajuan'];
    $id= $_POST['id'];
    $id_user = 1;
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $jenis_kelamin = $_POST['gender'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $pengambilan = $_POST['pengambilan'];
    $ktp = uploadFile('ktp');
    if ($id == 1) {
        $kk = uploadFile('kk');
        $pengantar = uploadFile('pengantar');
        $query = "UPDATE ajuan set id= $id,id_user= $id_user, Nama = '$nama', Tempat_lahir = '$tempat_lahir', 
        Tanggal_lahir = '$tanggal_lahir', Jenis_kelamin = '$jenis_kelamin', Agama = '$agama', Alamat = '$alamat',
        KTP = '$ktp', KK = '$kk', Surat_pengantar = '$pengantar', Pengambilan = '$pengambilan' WHERE id_ajuan = $id_ajuan";
        $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil diupdate.')) {
        window.location='./?p=detail&id_ajuan=$id_ajuan';
    } else {
        window.location='./?p=form&id=$id';
    }
</script>";
            exit();
        }
    } elseif ($id == 2) {
        $kk = uploadFile('kk');
        $akte = uploadFile('akte');
        $pas_foto = uploadFile('pas_foto');
        $query = "UPDATE ajuan set id_surat = $id,id_user=$id_user, Nama = '$nama', Tempat_lahir = '$tempat_lahir', 
        Tanggal_lahir = '$tanggal_lahir', Jenis_kelamin = '$jenis_kelamin', Agama = '$agama', Alamat = '$alamat',
        KTP = '$ktp', KK = '$kk',Akte='$akte',Pas_foto = '$pas_foto',Pengambilan = '$pengambilan' WHERE id_ajuan = $id_ajuan";
        $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil diupdate.')) {
        window.location='./?p=detail&id_ajuan=$id_ajuan';
    } else {
        window.location='./?p=form&id=$id';
    }
</script>";
            exit();
        }
    } elseif ($id == 3) {
        $pekerjaan = $_POST['pekerjaan'];
        $nik = $_POST['nik'];
        $nama_usaha = $_POST['nama_usaha'];
        $lama_usaha = $_POST['lama_usaha'];
        $alamat_usaha = $_POST['alamat_usaha'];
        $npwp = $_POST['npwp'];
        $kk = uploadFile('kk');
        $pengantar = uploadFile('pengantar');
        $lokasi_usaha   = uploadFile('lokasi_usaha');
        $query = "UPDATE ajuan SET
    id_surat = '$id',
    id_user = '$id_user',
    Nama = '$nama',
    Tempat_lahir = '$tempat_lahir',
    Tanggal_lahir = '$tanggal_lahir',
    Jenis_kelamin = '$jenis_kelamin',
    Agama = '$agama',
    Alamat = '$alamat',
    Pekerjaan = '$pekerjaan',
    NIK = '$nik',
    Nama_Usaha = '$nama_usaha',
    Lama_usaha = '$lama_usaha',
    Alamat_usaha = '$alamat_usaha',
    NPwp = '$npwp',
    KTP = '$ktp',
    KK = '$kk',
    Surat_Pengantar = '$pengantar',
    Foto_persyaratan = '$lokasi_usaha',
    Pengambilan = '$pengambilan'
WHERE id_ajuan = '$id_ajuan';
";

    $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil diupdate.')) {
        window.location='./?p=detail&id_ajuan=$id_ajuan';
    }
</script>";
            exit();
        }
    }
}
