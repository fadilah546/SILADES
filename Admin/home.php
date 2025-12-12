<main class="app-main">
   <!--begin::App Content Header-->
   <div class="app-content-header">
     <div class="container-fluid">
       <div class="row">
         <h2 class="fw-bold mb-2">Halo,Admin</h2>
         <p class="text-muted mb-4">Selamat Datang di Sistem Layanan Surat Desa</p>
       </div>
     </div>
   </div>
   <!--end::App Content Header-->

   <!--begin::App Content-->
   <?php 
   $id = 1; 
   $totals = [
       'total_pengajuan' => 0,
       'Diajukan' => 0,
       'Diproses' => 0,
       'Selesai' => 0,
       'Ditolak' => 0
   ];

   $query_total = "
       SELECT status, COUNT(*) as jumlah 
       FROM ajuan 
       WHERE id_user = $id 
       GROUP BY status
   ";
   $result_total = $koneksi->query($query_total);
   while($row = $result_total->fetch_assoc()){
       $totals['total_pengajuan'] += $row['jumlah'];
       $totals[$row['status']] = $row['jumlah'];
   }

   $query_latest = "
       SELECT ajuan.*, surat.nama_surat 
       FROM ajuan 
       JOIN surat ON ajuan.id_surat = surat.id_surat 
       ORDER BY ajuan.created_at DESC 
       LIMIT 5
   ";
   $data_latest = $koneksi->query($query_latest);
   ?>

   <div class="app-content">
     <div class="container mt-4">

       <!-- Header Counter -->
       <div class="row g-3 mb-4">
         <?php 
         $counters = [
           ['label'=>'Total Pengajuan','icon'=>'bi-file-earmark-text','value'=>$totals['total_pengajuan']],
           ['label'=>'Menunggu Verifikasi','icon'=>'bi-clock-history','value'=>$totals['Diajukan']],
           ['label'=>'Diverifikasi','icon'=>'bi-gear','value'=>$totals['Diproses']],
           ['label'=>'Selesai','icon'=>'bi-check-circle','value'=>$totals['Selesai']],
         ];

         foreach($counters as $c){
         ?>
         <div class="col-6 col-md-3 col-lg-3">
           <div class="card counter-card shadow-sm p-3 text-center text-white">
             <i class="bi <?= $c['icon'] ?> counter-icon"></i>
             <h6><?= $c['label'] ?></h6>
             <h3><?= $c['value'] ?></h3>
           </div>
         </div>
         <?php } ?>
       </div>

       <!-- Section Title -->
       <div class="row justify-content-between align-items-center mb-3">
         <h5 class="fw-bold section-title">Pengajuan Surat</h5>
         <small class="text-muted">5 Ajuan terbaru</small>
       </div>

       <?php
       if($data_latest->num_rows == 0){
           echo "<p>Tidak ada ajuan</p>";
       } else {
           while($d = $data_latest->fetch_assoc()){
               $warna = match($d['status']){
                   'Diajukan' => 'warning',
                   'Diproses' => 'primary',
                   'Selesai' => 'success',
                   default => 'danger'
               };
       ?>
       <a class="text-decoration-none text-dark" href="?p=detail&id_ajuan=<?= $d['id_ajuan'] ?>">
         <div class="card pengajuan-card shadow-sm mb-3">
             <div class="card-body">
               <div class="d-flex justify-content-between align-items-center">
                 <div>
                   <h6 class="fw-bold mb-0"><i class="bi bi-file-earmark-text"></i> <?= $d['nama_surat'] ?></h6>
                   <small class="text-muted">Diajukan pada <?= date('d-M-Y', strtotime($d['created_at'])) ?></small>
                 </div>
                 <span class="badge bg-<?= $warna ?> text-white rounded-pill px-3 py-2">
                   <?= $d['status'] ?>
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
       <?php
           }
       }
       ?>

     </div>
   </div>
</main>
