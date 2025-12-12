<?php
require_once "../config.php";
function uploadFile($fieldname)
{
    $filename = $_FILES[$fieldname]['name'];
    $tmp = $_FILES[$fieldname]['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $newname = 'img_' . time() . '.' . $ext;
    $destination = "../uploads/" . $newname;
    move_uploaded_file($tmp, $destination);
    return $newname;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_user = 1;
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['gender'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $pengambilan = $_POST['pengambilan'];
    $ktp = uploadFile('ktp');
    if ($id == 1) {
        $kk = uploadFile('kk');
        $pengantar = uploadFile('pengantar');
        $query = "INSERT into ajuan set id_surat = $id,id_user= $id_user, Nama = '$nama', Tempat_lahir = '$tempat_lahir', 
        Tanggal_lahir = '$tanggal_lahir', Jenis_kelamin = '$jenis_kelamin', Agama = '$agama', Alamat = '$alamat',
        KTP = '$ktp', KK = '$kk', Surat_pengantar = '$pengantar', Pengambilan = '$pengambilan' WHERE id_ajuan = $id_ajuan";
        $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil ditambahkan. Lihat Ajuan Saya?')) {
        window.location='./?p=ajuan_saya';
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
        $query = "INSERT into ajuan set id_surat = $id,id_user=$id_user, Nama = '$nama', Tempat_lahir = '$tempat_lahir', 
        Tanggal_lahir = '$tanggal_lahir', Jenis_kelamin = '$jenis_kelamin', Agama = '$agama', Alamat = '$alamat',
        KTP = '$ktp', KK = '$kk',Akte='$akte',Pas_foto = '$pas_foto',Pengambilan = '$pengambilan'";
        $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil ditambahkan. Lihat Ajuan Saya?')) {
        window.location='./?p=ajuan_saya';
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
        $lokasi_usaha    = uploadFile('lokasi_usaha');
        $query = "INSERT INTO ajuan (
    id_surat,
    id_user,
    Nama,
    Tempat_lahir,
    Tanggal_lahir,
    Jenis_kelamin,
    Agama,
    Alamat,
    Pekerjaan,
    NIK,
    Nama_Usaha,
    Lama_usaha,
    Alamat_usaha,
    NPwp,
    KTP,
    KK,
    Surat_Pengantar,
    Foto_persyaratan,
    Pengambilan
) VALUES (
    $id,
    $id_user,
    '$nama',
    '$tempat_lahir',
    '$tanggal_lahir',
    '$jenis_kelamin',
    '$agama',
    '$alamat',
    '$pekerjaan',
    '$nik',
    '$nama_usaha',
    '$lama_usaha',
    '$alamat_usaha',
    '$npwp',
    '$ktp',
    '$kk',
    '$pengantar',
    '$lokasi_usaha'
    '$pengambilan'
)";

        $insert = $koneksi->query($query);
        if ($insert) {
            echo "<script>
    if (confirm('Data berhasil ditambahkan. Lihat Ajuan Saya?')) {
        window.location='./?p=ajuan_saya';
    }
</script>";
            exit();
        }
    }
}
