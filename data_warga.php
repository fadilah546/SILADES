<?php
require_once '../config.php';

// Koneksi Database
$conn = new mysqli($host, $user, $pass, $db);

// Jika gagal
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query Data
$sql = "SELECT id, NIK, nama, tempat_lahir, tanggal_lahir, gender, agama, status_perkawinan FROM warga";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Warga - SILADES</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-primary mb-4">Data Warga Desa SILADES</h3>

    <div class="card shadow">
        <div class="card-body">

            <a href="tambah_warga.php" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Tambah Data Warga
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>Gender</th>
                            <th>Agama</th>
                            <th>Status Kawin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".htmlspecialchars($row['NIK'])."</td>";
                                echo "<td>".htmlspecialchars($row['nama'])."</td>";
                                echo "<td>".htmlspecialchars($row['tempat_lahir'])."</td>";
                                echo "<td>".htmlspecialchars($row['tanggal_lahir'])."</td>";
                                echo "<td>".htmlspecialchars($row['gender'])."</td>";
                                echo "<td>".htmlspecialchars($row['agama'])."</td>";
                                echo "<td>".htmlspecialchars($row['status_perkawinan'])."</td>";
                                
                                echo "<td>
                                    <a href='edit_warga.php?id=".$row['id']."' class='btn btn-warning btn-sm me-1'>Edit</a>
                                    <a href='hapus_warga.php?id=".$row['id']."' 
                                       class='btn btn-danger btn-sm'
                                       onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                                       Hapus
                                    </a>
                                  </td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center text-muted'>Belum ada data warga.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>
