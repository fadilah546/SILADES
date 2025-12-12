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
                            <h3 class="mb-0">Edit Ajuan</h3>
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
                    <form action="ubah.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id_surat; ?>">
                        <input type="hidden" name="id_ajuan" value="<?php echo $id_ajuan; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>" name="nama">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>"name='tempat_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>" name='tanggal_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>"name='gender'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>"name='agama'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name='alamat'>><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="ktp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="kk" value="<?= $d['KK'] ?>">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Surat Pengantar</label><br>
                            <img src="../uploads/<?= $d['Surat_pengantar'] ?>" alt="Surat Pengantar" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="pengantar" value="<?= $d['Surat_pengantar'] ?>">
                        </div>
                        <select class="form-select mb-3" name="Pengambilan">
                            <option value="" disabled>Pilih jenis file</option>
                        <option value="1" <?= ($d['Pengambilan'] == 'Soft file') ? 'selected' : '' ?>>Soft File</option>
                        <option value="2" <?= ($d['Pengambilan'] == 'Hard file') ? 'selected' : '' ?>>Hard File</option>
                        <option value="3" <?= ($d['Pengambilan'] == 'Keduanya') ? 'selected' : '' ?>>Keduanya</option>
                        </select>
                        <button type="submit" class="btn btn-primary mb-3 justify-content-end" name="submit">Kirim</button>
                        </form>
                    <?php
                    } elseif ($id_surat == 2) {
                    ?>
                    <form action="ubah.php" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?php echo $id_surat; ?>">
                        <input type="hidden" name="id_ajuan" value="<?php echo $id_ajuan; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>" name='nama'>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>" name='tempat_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>" name='tanggal_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>" name='gender'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>" name='agama'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control"name='alamat'><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="ktp" value="<?= $d['KTP'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="kk" value="<?= $d['KK'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Akte</label><br>
                            <img src="../uploads/<?= $d['Akte'] ?>" alt="Akte" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="akte" value="<?= $d['Akte'] ?>">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Pas Foto</label><br>
                            <img src="../uploads/<?= $d['Pas_foto'] ?>" alt="Pas Foto" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="pas_foto" value="<?= $d['Pas_foto'] ?>">
                        </div>
                        <select class="form-select mb-3" name="Pengambilan">
                            <option value="" disabled>Pilih jenis file</option>

                        <option value="1" <?= ($d['Pengambilan'] == 1) ? 'selected' : '' ?>>Soft File</option>
                        <option value="2" <?= ($d['Pengambilan'] == 2) ? 'selected' : '' ?>>Hard File</option>
                        <option value="3" <?= ($d['Pengambilan'] == 3) ? 'selected' : '' ?>>Keduanya</option>
                        </select>

                        <button type="submit" class="btn btn-primary mb-3 justify-content-end" name="submit">Kirim</button>
                        </form>
                    <?php
                    } elseif ($id_surat == 3) {
                    ?>
                    <form action="ubah.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id_surat; ?>">
                        <input type="hidden" name="id_ajuan" value="<?php echo $id_ajuan; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $d['Nama'] ?>"name='nama'>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $d['Tempat_lahir'] ?>"name='tempat_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?>"name='tanggal_lahir'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= $d['Jenis_kelamin'] ?>"name='gender'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="<?= $d['Agama'] ?>"name='agama'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="<?= $d['NIK'] ?>"name='nik'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" value="<?= $d['Pekerjaan'] ?>"name='pekerjaan'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control"name='alamat'><?= $d['Alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control" value="<?= $d['NPWP'] ?>"name='npwp'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Usaha</label>
                            <input type="text" class="form-control" value="<?= $d['Nama_usaha'] ?>"name='nama_usaha'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mulai Usaha Sejak</label>
                            <input type="text" class="form-control" value="<?= $d['Lama_usaha'] ?>"name='lama_usaha'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Usaha</label>
                            <textarea class="form-control"name='alamat_usaha'><?= $d['Alamat_usaha'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP</label><br>
                            <img src="../uploads/<?= $d['KTP'] ?>" alt="KTP" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="ktp" value="<?= $d['KTP'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label><br>
                            <img src="../uploads/<?= $d['KK'] ?>" alt="KK" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="kk" value="<?= $d['KK'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surat Pengantar</label><br>
                            <img src="../uploads/<?= $d['Surat_pengantar'] ?>" alt="Surat Pengantar" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="pengantar" value="<?= $d['Surat_pengantar'] ?>">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Foto Lokasi Usaha</label><br>
                            <img src="../uploads/<?= $d['Foto_persyaratan'] ?>" alt="Foto Persyaratan" class="img-fluid" style="max-width: 300px; border-radius: 8px;">
                            <input class="form-control" type="file" id="formFile" name="lokasi_usaha" value="<?= $d['Foto_persyaratan'] ?>">
                        </div>
                        <select class="form-select mb-3" name="Pengambilan">
                            <option value="" disabled>Pilih jenis file</option>

                        <option value="1" <?= ($d['Pengambilan'] == 1) ? 'selected' : '' ?>>Soft File</option>
                        <option value="2" <?= ($d['Pengambilan'] == 2) ? 'selected' : '' ?>>Hard File</option>
                        <option value="3" <?= ($d['Pengambilan'] == 3) ? 'selected' : '' ?>>Keduanya</option>
                        </select>
                        <button type="submit" class="btn btn-primary mb-3 justify-content-end" name="submit">Kirim</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <!--end::App Content-->
</main>