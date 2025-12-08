<?php
require_once '../config.php';
$conn = new mysqli($host, $user, $pass, $db);

$sql = "SELECT * FROM konfirmasi_pengajuan ORDER BY id DESC";
$result = $conn->query($sql);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h3 class="text-primary mb-3">Konfirmasi Pengajuan Surat</h3>

    <?php 
    if ($result->num_rows > 0):
    ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Pemohon</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="250px">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while ($row = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['jenis_surat']) ?></td>
                    <td><?= htmlspecialchars($row['nama_pemohon']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_pengajuan']) ?></td>
                    <td><span class="badge bg-info"><?= $row['status'] ?></span></td>

                    <td>
                        <!-- PROSES -->
                        <a href="verifikasi_pengajuan.php?id=<?= $row['id'] ?>&aksi=proses" 
                           class="btn btn-warning btn-sm">
                           Proses
                        </a>

                        <!-- SELESAI -->
                        <a href="verifikasi_pengajuan.php?id=<?= $row['id'] ?>&aksi=selesai" 
                           class="btn btn-success btn-sm">
                           Selesai
                        </a>

                        <!-- TOLAK (Modal) -->
                        <button class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalTolak<?= $row['id'] ?>">
                            Tolak
                        </button>
                    </td>
                </tr>

                <!-- MODAL TOLAK -->
                <div class="modal fade" id="modalTolak<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="verifikasi_pengajuan.php" method="POST">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">Tolak Pengajuan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="aksi" value="tolak">

                                    <label class="form-label">Alasan Penolakan</label>
                                    <textarea name="alasan" class="form-control" required></textarea>

                                    <small class="text-danger">
                                        * Penolakan hanya bisa dilakukan maksimal 1 hari setelah pengajuan
                                    </small>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-danger" type="submit">Tolak Sekarang</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <?php else: ?>
        <div class="alert alert-info">Belum ada pengajuan masuk.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
