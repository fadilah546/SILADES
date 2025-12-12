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
                        <div class="mb-3">
                            <?php
                            if ($d['status'] == 'Diajukan') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi" role="button">Verifikasi</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Soft file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload" role="button">Upload file</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Hard file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggal" role="button">Pilih tanggal</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Keduanya') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_keduanya" role="button" style="margin-right:10px">Upload</button>';
                            }

                            ?>
                        </div>

                    <?php
                    } elseif ($id_surat == 2) {
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
                        <div class="mb-3">
                            <?php
                            if ($d['status'] == 'Diajukan') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi" role="button">Verifikasi</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Soft file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload" role="button">Upload file</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Hard file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggal" role="button">Pilih tanggal</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Keduanya') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_keduanya" role="button" style="margin-right:10px">Upload</button>';
                            }

                            ?>
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
                        <div class="mb-3">
                            <?php
                            if ($d['status'] == 'Diajukan') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi" role="button">Verifikasi</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Soft file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload" role="button">Upload file</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Hard file') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggal" role="button">Pilih tanggal</button>';
                            }

                            if ($d['status'] == 'Diproses' and $d['Pengambilan'] == 'Keduanya') {
                                echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_keduanya" role="button" style="margin-right:10px">Upload</button>';
                            }

                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <!--end::App Content-->
</main>
<!-- verfikasi -->
<div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="verifikasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi Ajuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="verifikasi">
                            <option selected>Verifikasi ajuan</option>
                            <option value="1">Diproses</option>
                            <option value="2">Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- upload -->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="verifikasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Surat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">File Surat</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="formFile" name="surat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- pilih tanggal -->
<div class="modal fade" id="tanggal" tabindex="-1" aria-labelledby="verifikasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan tanggal pengambilan Surat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pengambilan Surat</label>
                        <input name="tanggal" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan tanggal pengambilan surat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- upload keuanya -->
<div class="modal fade" id="upload_keduanya" tabindex="-1" aria-labelledby="verifikasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan File dan Tanggal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">File Surat</label>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="surat">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pengambilan Surat</label>
                        <input name="tanggal" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan tanggal pengambilan surat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>