<?php
require_once "config.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SILADES | Sistem Layanan Surat Desa</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style2.css">

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="#">SILADES</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="d-flex gap-2">
        <a href="route.php?p=login" class="btn btn-outline-primary px-4 ">Masuk</a>
        <a href="route.php?p=daftar" class="btn btn-primary px-4">Daftar</a>
      </div>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <section class="hero container mt-5">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="fw-bold display-4">Selamat Datang di Sistem Layanan Surat Desa</h1>
        <p class="mt-3 text-secondary">
          Nikmati kemudahan mengurus berbagai surat keterangan secara online, cepat, dan tanpa antre.
          Website ini hadir untuk membantu warga mendapatkan pelayanan administrasi desa dengan lebih praktis,
          transparan, dan mudah diakses kapan saja.
        </p>
        <div class="mt-4 d-flex align-items-center gap-3">
          <a href="route.php?p=login" class="btn btn-primary btn-lg px-4">Buat Sekarang</a>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <img src="assets/img/10624.jpg" alt="Hero Image">
      </div>
    </div>
  </section>

  <!-- Fitur Layanan -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold services-title">Fitur Layanan</h2>
      <div class="row g-4">
        <div class="col-lg-4 col-ms-6 col-sm-12">
          <div class="service-card text-center">
            <i class="bi bi-file-earmark-text"></i>
            <h5 class="fw-bold mb-2">Pengajuan online</h5>
            <p>Ajukan surat keterangan kapan saja dan dimana saja tanpa perlu datang ke kantor.</p>
          </div>
        </div>
        <div class="col-lg-4 col-ms-6 col-sm-12">
          <div class="service-card text-center">
            <i class="bi bi-clock"></i>
            <h5 class="fw-bold mb-2">Proses cepat</h5>
            <p>Lacak status pengajuan surat Anda secara real-time dengan mudah.</p>
          </div>
        </div>
        <div class="col-lg-4 col-ms-6 col-sm-12">
          <div class="service-card text-center">
            <i class="bi bi-check-circle"></i>
            <h5 class="fw-bold mb-2">Mudah & aman</h5>
            <p>Interface yang user-friendly dengan keamanan data yang terjamin.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Card Surat -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <h2 class="text-center mb-5 fw-bold services-title">Jenis surat yang tersedia</h2>
        <?php
        $data = $koneksi->query("SELECT * FROM surat");
        $delay = 1.8;
        foreach ($data as $d) {
        ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card-option" style="animation-delay: <?= $delay ?>s;">
              <div class="icon-box"><i class="bi bi-file-earmark-text"></i></div>
              <h6 class="fw-bold mt-2"><?= $d['nama_surat'] ?></h6>
              <p class="text-muted small"><?= $d['deskripsi'] ?></p>
              <?php
              $list_syarat = "";
              $syarat = preg_split("/\r\n|\n|\r/", $d['persyaratan']);
              foreach ($syarat as $s) {
                $s = ltrim(trim($s), ".");
                if ($s != "") {
                  $list_syarat .= "<li>$s</li>";
                }
              }
              ?>
              <ul class="text-start small"><?= $list_syarat ?></ul>
            </div>
          </div>
        <?php $delay += 0.2;
        } ?>
      </div>
    </div>
  </section>

  <!-- FOOTER -->

<footer class="bg-primary text-white text-center py-4">
  <p class="mb-0">&copy; <?= date('Y') ?> SILADES - Layanan Administrasi Digital.</p>
</footer>



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>