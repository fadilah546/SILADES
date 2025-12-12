<?php
require_once '../config.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?p=ajuan_saya");
    exit();
}

$id_ajuan = (int) $_GET['id'];

$data_ajuan = null;
$error_message = '';
$success_message = '';
$daftar_surat = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    // Prepared Statement untuk keamanan
    $stmt = $koneksi->prepare("SELECT * FROM ajuan WHERE id_ajuan = ?");
    $stmt->bind_param("i", $id_ajuan);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ajuan ditemukan
    if ($result->num_rows == 0) {
        $error_message = "Data pengajuan tidak ditemukan.";
    } else {
        $data_ajuan = $result->fetch_assoc();
    }
    $stmt->close();

    // Ambil daftar jenis surat
    $qsurat = $koneksi->query("SELECT * FROM surat ORDER BY nama_surat ASC");
    while ($row = $qsurat->fetch_assoc()) {
        $daftar_surat[] = $row;
    }
}


// =============================
// 3. PROSES UPDATE DATA (REQUEST POST)
// =============================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['submit_edit']) && isset($_POST['id_ajuan_hidden'])) {

        $id_update = (int) $_POST['id_ajuan_hidden'];
        $keterangan_baru = trim($_POST['keterangan']);
        $id_surat_baru = (int) $_POST['jenis_surat'];

        // Validasi form kosong
        if ($keterangan_baru == '' || $id_surat_baru == 0) {
            $error_message = "Semua field wajib diisi.";
        } else {

            // Prepared statement UPDATE
            $stmt = $koneksi->prepare("
                UPDATE ajuan 
                SET keterangan = ?, id_surat = ?, updated_at = NOW()
                WHERE id_ajuan = ?
            ");
            $stmt->bind_param("sii", $keterangan_baru, $id_surat_baru, $id_update);

            if ($stmt->execute()) {
                header("Location: index.php?p=ajuan_saya&status=success");
                exit();
            } else {
                $error_message = "Gagal memperbarui data: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">

            <h3 class="mb-3">Edit Ajuan ID: <?php echo $id_ajuan; ?></h3>
            <hr>

            <?php if ($error_message): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <?php if ($data_ajuan): ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_ajuan_hidden" value="<?php echo $data_ajuan['id_ajuan']; ?>">

                    <div class="mb-3">
                        <label for="jenis_surat" class="form-label">Jenis Surat</label>
                        <select class="form-select" id="jenis_surat" name="jenis_surat" required>
                            <?php foreach ($daftar_surat as $s): ?>
                                <option 
                                    value="<?php echo $s['id_surat']; ?>" 
                                    <?php echo ($s['id_surat'] == $data_ajuan['id_surat']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($s['nama_surat']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Ajuan</label>
                        <textarea 
                            class="form-control" 
                            id="keterangan" 
                            name="keterangan" 
                            rows="3" 
                            required><?php echo htmlspecialchars($data_ajuan['keterangan']); ?></textarea>
                    </div>

                    <button type="submit" name="submit_edit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php?p=ajuan_saya" class="btn btn-secondary">Batal</a>
                </form>
            <?php endif; ?>

        </div>
    </div>
</main>
