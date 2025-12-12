<?php
$id = 1;
$kategori = 'semua';
$query = "SELECT * FROM ajuan WHERE id_user = $id";
if (isset($_POST['submit'])) {
  $kategori = $_POST['kategori'];
  if ($kategori == 'diajukan') {
    $query = "SELECT * FROM ajuan WHERE status = 'Diajukan' AND id_user = $id";
  } elseif ($kategori == 'diproses') {
    $query = "SELECT * FROM ajuan WHERE status = 'Diproses' AND id_user = $id";
  } elseif ($kategori == 'selesai') {
    $query = "SELECT * FROM ajuan WHERE status = 'Selesai' AND id_user = $id";
  } elseif ($kategori == 'ditolak') {
    $query = "SELECT * FROM ajuan WHERE status = 'Ditolak' AND id_user = $id";
  }elseif ($kategori == 'terbaru') {
    $query = "SELECT * FROM ajuan WHERE id_user = $id ORDER BY created_at DESC";
  } else {
    $query = "SELECT * FROM ajuan WHERE id_user = $id";
  }
}
?>
<div class="d-flex justify-content-between align-items-center">
  <div class="row">
    <h2 class="fw-bold mb-2">Ajuan Saya</h2>
    <p class="text-muted mb-4">Kelola ajuan anda</p>
  </div>
  <form action="" method="POST">
    <div class="d-flex align-items-start gap-1">
      <div class="mb-2" style="width: 150px;">
        <select id="disabledSelect" class="form-select" name="kategori">
          <option value="semua" <?php if ($kategori == 'semua') echo "selected" ?>>Semua</option>
          <option value="diajukan" <?php if ($kategori == 'diajukan') echo "selected" ?>>Diajukan</option>
          <option value="diproses" <?php if ($kategori == 'diproses') echo "selected" ?>>Diproses</option>
          <option value="selesai" <?php if ($kategori == 'selesai') echo "selected" ?>>Selesai</option>
          <option value="ditolak" <?php if ($kategori == 'ditolak') echo "selected" ?>>Ditolak</option>
          <option value="terbaru" <?php if ($kategori == 'terbaru') echo "selected" ?>>Terbaru</option>
        </select>
      </div>
      <div class="mb-3" style="width: 150px;">
        <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
      </div>
    </div>
  </form>
</div>



<?php 
$data = $koneksi->query($query);
if($data->num_rows == 0){ 
  echo "Tidak ada ajuan";
}
foreach($data as $d){
  $id_surat = $d['id_surat'];
  $surat = $koneksi->query("SELECT * FROM surat WHERE id_surat = $id_surat");
  $s = $surat->fetch_assoc();
?>
<a class="text-decoration-none text-dark" href="?p=detail&id_ajuan=<?= $d['id_ajuan'] ?>">
<div class ="card pengajuan-card shadow-sm mb-3">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-0"><i class="bi bi-file-earmark-text"></i>  <?= $s['nama_surat'] ?></h6>
          <small class="text-muted">Diajukan pada <?php echo date('d-M-Y', strtotime($d['created_at']))?></small>
        </div>
        <?php 
        if($d['status']=='Diajukan'){
          $warna = 'warning';
        }elseif($d['status']=='Diproses'){
          $warna = 'primary';
        }elseif($d['status']=='Selesai'){
          $warna = 'success';
        }else{
          $warna = 'danger';
        }
        ?>
        <span class="badge bg-<?= $warna ?> text-white rounded-pill px-3 py-2">
            <?php echo $d['status'] ?>
        </span>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <small><strong>Nama:</strong> <?= $d['Nama'] ?></small><br>
          <small><strong>Alamat:</strong> <?= $d['Alamat'] ?></small>
        </div>
      </div>
    </div>
  </div>
</a>
  <?php } ?>

<!--end::App Content-->
</main>