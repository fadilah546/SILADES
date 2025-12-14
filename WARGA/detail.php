<?php
$id_ajuan = $_GET['id_ajuan'];
$data = $koneksi->query("SELECT * FROM ajuan WHERE id_ajuan = $id_ajuan");
$d = $data->fetch_assoc();
$id_surat = $d['id_surat'];
?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="card">
            <div class="card-body">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">

                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <h3 class="mb-0">Detail Ajuan</h3>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>

            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">

                    <?php
                    if ($id_surat == 1) {
                    ?>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="<?= $d['NIK'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" readonly><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Surat Pengantar</label><br>
                            <img src="../uploads/<?= $d['Surat_pengantar'] ?>" alt="Surat Pengantar" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pengambilan File</label>
                            <input type="text" class="form-control" value="<?= $d['Pengambilan'] ?>" readonly>
                        </div>
                        <?php if (!empty($d['Tanggal'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengambilan Surat</label>
                                <input type="text" class="form-control" value="Surat dapat diambil pada tanggal <?= date('d-m-Y', strtotime($d['Tanggal'])) ?>" readonly>
                            </div>
                        <?php } ?>
                        <?php if (!empty($d['file'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">File Surat Keterangan</label>
                                <input type="text" class="form-control" value="<?= $d['file'] ?>" readonly>
                                <a href="../uploads/file/<?= $d['file'] ?>" download class="btn btn-primary mt-2">
                                    Download File
                                </a>

                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <?php if ($d['status'] == 'Diproses' or $d['status'] == 'Selesai') {
                            }
                            if ($d['status'] == 'Diajukan' or $d['status'] == 'Ditolak') {
                            ?>
                                <a class="btn btn-warning" href="?p=edit&id_ajuan=<?= $id_ajuan ?>" role="button">Edit</a>
                                <a class="btn btn-danger" href="?p=hapus&id_ajuan=<?= $id_ajuan ?>" role="button" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            <?php } ?>
                        </div>

                    <?php
                    } elseif ($id_surat == 2) {
                    ?>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="<?= $d['NIK'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" readonly><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Akte</label><br>
                            <img src="../uploads/<?= $d['Akte'] ?>" alt="Akte" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Pas Foto</label><br>
                            <img src="../uploads/<?= $d['Pas_foto'] ?>" alt="Pas Foto" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pengambilan File</label>
                            <input type="text" class="form-control" value="<?= $d['Pengambilan'] ?>" readonly>
                        </div>
                        <?php if (!empty($d['Tanggal'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengambilan Surat</label>
                                <input type="text" class="form-control" value="Surat dapat diambil pada tanggal <?= date('d-m-Y', strtotime($d['Tanggal'])) ?>" readonly>
                            </div>
                        <?php } ?>
                        <?php if (!empty($d['file'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">File Surat Keterangan</label>
                                <input type="text" class="form-control" value="<?= $d['file'] ?>" readonly>
                                <a href="../uploads/file/<?= $d['file'] ?>" download class="btn btn-primary mt-2">
                                    Download File
                                </a>

                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <?php if ($d['status'] == 'Diproses' or $d['status'] == 'Selesai') {
                            }
                            if ($d['status'] == 'Diajukan' or $d['status'] == 'Ditolak') {
                            ?>
                                <a class="btn btn-warning" href="?p=edit&id_ajuan=<?= $id_ajuan ?>" role="button">Edit</a>
                                <a class="btn btn-danger" href="?p=hapus&id_ajuan=<?= $id_ajuan ?>" role="button" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            <?php } ?>
                        </div>
                    <?php
                    } elseif ($id_surat == 3) {
                    ?>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="<?= $d['NIK'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" value="<?= $d['Pekerjaan'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" readonly><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control" value="<?= $d['NPWP'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Usaha</label>
                            <input type="text" class="form-control" value="<?= $d['Nama_usaha'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mulai Usaha Sejak</label>
                            <input type="text" class="form-control" value="<?= $d['Lama_usaha'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Usaha</label>
                            <textarea class="form-control" readonly><?= $d['Alamat_usaha'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surat Pengantar</label><br>
                            <img src="../uploads/<?= $d['Surat_pengantar'] ?>" alt="Surat Pengantar" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Foto Lokasi Usaha</label><br>
                            <img src="../uploads/<?= $d['Foto_persyaratan'] ?>" alt="Foto Persyaratan" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pengambilan File</label>
                            <input type="text" class="form-control" value="<?= $d['Pengambilan'] ?>" readonly>
                        </div>
                        <?php if (!empty($d['Tanggal'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengambilan Surat</label>
                                <input type="text" class="form-control" value="Surat dapat diambil pada tanggal <?= date('d-m-Y', strtotime($d['Tanggal'])) ?>" readonly>
                            </div>
                        <?php } ?>
                        <?php if (!empty($d['file'])) { ?>
                            <div class="mb-3">
                                <label class="form-label">File Surat Keterangan</label>
                                <input type="text" class="form-control" value="<?= $d['file'] ?>" readonly>
                                <a href="../uploads/file/<?= $d['file'] ?>" download class="btn btn-primary mt-2">
                                    Download File
                                </a>

                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <?php if ($d['status'] == 'Diproses' or $d['status'] == 'Selesai') {
                            }
                            if ($d['status'] == 'Diajukan' or $d['status'] == 'Ditolak') {
                            ?>
                                <a class="btn btn-warning" href="?p=edit&id_ajuan=<?= $id_ajuan ?>" role="button">Edit</a>
                                <a class="btn btn-danger" href="?p=hapus&id_ajuan=<?= $id_ajuan ?>" role="button" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            <?php } ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <!--end::App Content-->
</main>
