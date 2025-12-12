<?php 
error_reporting(0);
session_start();
require_once "../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SILADES | Dashboard Admin </title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="wrapper">
    <aside class="sidebar">

      <h4 class="mb-4">Dashboard</h4>

      <div class="profile-box mb-4">
        <div class="fw-bold">Ahmad Sudirman</div>
        <small>Online</small>
      </div>

      <a class="menu-item text-white text-decoration-none" href="?p=dashboard">
        <i class="bi bi-grid-fill"></i> Dashboard
      </a>

      <a class="menu-item text-white text-decoration-none" href="?p=ajuan_saya">
        <i class="bi bi-clock-history"></i> Ajuan
      </a>

      <a class="menu-item text-white text-decoration-none mt-auto" href="?p=logout">
        <i class="bi bi-box-arrow-left"></i> Keluar
      </a>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="content">
      <?php require_once "route.php" ?>
    </main>

  </div>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>

</html>