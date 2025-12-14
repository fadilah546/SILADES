<div class="d-flex justify-content-between align-items-center">
  <div class="row">
    <h2 class="fw-bold mb-2">Data Warga</h2>
    <p class="text-muted mb-4">Data warga desa</p>
  </div>
</div>

<table class="table">
  <thead class="table-light">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Jenis kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
    </tr>
  </thead>
  
<?php 
$query = "SELECT * FROM warga";
$data = $koneksi->query($query);
if($data->num_rows == 0){ 
  echo "Tidak ada warga";
}
$no= 0;
foreach($data as $d){
    $no += 1;
?>
  <tbody>
    <tr>
        <td><?= $no ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['nik'] ?></td>
        <td><?= $d['jenis_kelamin'] ?></td>
        <td><?= $d['agama'] ?></td>
        <td><?= $d['alamat'] ?></td>
    </tr>
  </tbody>
  <?php } ?>
</table>

<!--end::App Content-->

</main>
