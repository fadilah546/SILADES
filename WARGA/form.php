<?php
    $id = $_GET['id'];
    if ($id == 1) {
        $surat = "Surat Keterangan Tidak Mampu";
    }
    if ($id == 2) {
        $surat = "Surat Pengantar SKCK";
    }
    if ($id == 3) {
        $surat = "Surat Keterangan Usaha";
    }

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
                            <h3 class="mb-0">Form Pengajuan <?php echo $surat ?></h3>
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
                        if ($id == 1) {
                        ?>
                         <form action="add.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                 <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                 <input name="tempat_lahir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                 <input name="tanggal_lahir" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="gender">
                                 <option selected>Pilih jenis kelamin anda</option>
                                 <option value="1">Laki-laki</option>
                                 <option value="2">Perempuan</option>
                             </select>

                             <label for="exampleFormControlInput1" class="form-label">Agama</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="agama">
                                 <option selected>Pilih agama anda</option>
                                 <option value="1">Islam</option>
                                 <option value="2">Kristen</option>
                                 <option value="3">Katolik</option>
                                 <option value="4">Buddha</option>
                                 <option value="5">Hindu</option>
                                 <option value="6">Konghucu</option>
                             </select>
                             <div class="mb-3">
                                 <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                 <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KTP</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="ktp">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KK</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="kk">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Surat Pengantar dari RT/RW</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="pengantar">
                                 </div>
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Pengambilan surat</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="pengambilan">
                                 <option selected>Pilih jenis file</option>
                                 <option value="1">Soft File</option>
                                 <option value="2">Hard file</option>
                                 <option value="3">Keduanya</option>
                             </select>
                             <button type="submit" class="btn btn-primary mb-3 justify-content-end" name="submit">Kirim</button>

                         </form>

                     <?php
                        }elseif($id == 2){
                            ?>
                            <form action="add.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                 <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                 <input name="tempat_lahir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                 <input name="tanggal_lahir" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="gender">
                                 <option selected>Pilih jenis kelamin anda</option>
                                 <option value="1">Laki-laki</option>
                                 <option value="2">Perempuan</option>
                             </select>

                             <label for="exampleFormControlInput1" class="form-label">Agama</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="agama">
                                 <option selected>Pilih agama anda</option>
                                 <option value="1">Islam</option>
                                 <option value="2">Kristen</option>
                                 <option value="3">Katolik</option>
                                 <option value="4">Buddha</option>
                                 <option value="5">Hindu</option>
                                 <option value="6">Konghucu</option>
                             </select>
                             <div class="mb-3">
                                 <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                 <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KTP</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="ktp">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KK</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="kk">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Akte</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="akte">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Pas Foto</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="pas_foto">
                                 </div>
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Pengambilan surat</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="pengambilan">
                                 <option selected>Pilih jenis file</option>
                                 <option value="1">Soft File</option>
                                 <option value="2">Hard file</option>
                                 <option value="3">Keduanya</option>
                             </select>
                             <button type="submit" class="btn btn-primary mb-3 justify-content-end" name="submit">Kirim</button>

                         </form>
                         <?php
                        }elseif($id == 3){
                            ?>
                            <form action="add.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                 <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                 <input name="tempat_lahir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                 <input name="tanggal_lahir" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap anda">
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="gender">
                                 <option selected>Pilih jenis kelamin anda</option>
                                 <option value="1">Laki-laki</option>
                                 <option value="2">Perempuan</option>
                             </select>

                             <label for="exampleFormControlInput1" class="form-label">Agama</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="agama">
                                 <option selected>Pilih agama anda</option>
                                 <option value="1">Islam</option>
                                 <option value="2">Kristen</option>
                                 <option value="3">Katolik</option>
                                 <option value="4">Buddha</option>
                                 <option value="5">Hindu</option>
                                 <option value="6">Konghucu</option>
                             </select>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">NIK</label>
                                 <input name="nik" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan NIK anda">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                                    <input name="pekerjaan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan pekerjaan anda">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                             <!-- usaha -->
                             <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">NPWP</label>
                                  <input name="npwp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan NPWP anda">
                              </div>
                            <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Nama Usaha</label>
                                 <input name="nama_usaha" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama usaha anda">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Mulai Usaha Sejak</label>
                                 <input name="lama_usaha" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukan tahun anda memulai usaha">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Usaha</label>
                                    <textarea name="alamat_usaha" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                             <!-- usaha -->
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KTP</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="ktp">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">KK</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="kk">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Surat pengantar</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="pengantar">
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Foto Lokasi Usaha</label>
                                 <div class="mb-3">
                                     <input class="form-control" type="file" id="formFile" name="lokasi_usaha">
                                 </div>
                             </div>
                             <label for="exampleFormControlInput1" class="form-label">Pengambilan surat</label>
                             <select class="form-select mb-3" aria-label="Default select example" name="pengambilan">
                                 <option selected>Pilih jenis file</option>
                                 <option value="1">Soft File</option>
                                 <option value="2">Hard file</option>
                                 <option value="3">Keduanya</option>
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