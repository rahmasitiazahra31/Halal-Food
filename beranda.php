<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
?>
<?php require_once 'auth.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda | Halal Food</title>

  <!-- Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include 'sidebar.php'; ?>
  
  <!-- Content -->
  <div class="content-wrapper">
 
    <!-- Header -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Find Halal Food</h1>
        <p>Cari & cek makanan halal dengan mudah</p>
      </div>
    </div>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <!-- Box 1 -->
          <div class="col-lg-4 col-6">
            <a href="place.php" class="small-box bg-success" style="display: block; color: inherit; text-decoration: none;">
              <div class="inner">
                <h3>20</h3>
                <p>Tempat Halal</p>
              </div>
              <div class="icon">
                <i class="fas fa-store"></i>
              </div>
              <div class="small-box-footer">
                Lihat Semua <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>

          <!-- Box 2 -->
          <div class="col-lg-4 col-6">
            <a href="place.php" class="small-box bg-primary" style="display: block; color: inherit; text-decoration: none;">
              <div class="inner">
                <h3>10</h3>
                <p>Produk Dicek</p>
              </div>
              <div class="icon">
                <i class="fas fa-utensils"></i>
              </div>
              <div class="small-box-footer">
                Lihat Semua <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>

          <!-- Box 3 -->
          <div class="col-lg-4 col-6">
            <a href="saved.php" class="small-box bg-warning" style="display: block; color: inherit; text-decoration: none;">
              <div class="inner">
                <h3>0</h3>
                <p>Disimpan</p>
              </div>
              <div class="icon">
                <i class="fas fa-bookmark"></i>
              </div>
              <div class="small-box-footer">
                Lihat Semua <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>

        </div>

        <!-- Info Section -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Rekomendasi Hari Ini</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="text-center p-3 border rounded shadow-sm">
                  <img src="image/ayam geprek.jpg" class="img-circle elevation-2" alt="ayam geprek" style="width: 100px; height:100px; object-fit: cover;">
                  <h5>Ayam Geprek</h5>
                  <span class="badge badge-success">Tersedia</span>
                </div>
              </div>

              <div class="col-md-4 col-sm-6">
                <div class="text-center p-3 border rounded shadow-sm">
                  <img src="image/bakso.jpg" class="img-circle elevation-2" alt="bakso sapi" style="width: 100px; height:100px; object-fit: cover;">
                  <h5>Bakso Sapi</h5>
                  <span class="badge badge-success">Tersedia</span>
                </div>
              </div>

              <div class="col-md-4 col-sm-6">
                <div class="text-center p-3 border rounded shadow-sm">
                  <img src="image/matcha.jpg" class="img-circle elevation-2" alt="Iced Matcha Expresso" style="width: 100px; height:100px; object-fit: cover;">
                  <h5>Iced Matcha Expresso</h5>
                  <span class="badge badge-success">Tersedia</span>
                </div>
              </div>

              <div class="col-md-4 col-sm-6">
                <div class="text-center p-3 border rounded shadow-sm">
                  <img src="image/smoothiess.jpg" class="img-circle elevation-2" alt="smoothies" style="width: 100px; height:100px; object-fit: cover;">
                  <h5>Smoothies</h5>
                  <span class="badge badge-success">Tersedia</span>
                </div>
              </div>

              <div class="col-md-4 col-sm-6">
                <div class="text-center p-3 border rounded shadow-sm">
                  <img src="image/es teler.jpg" class="img-circle elevation-2" alt="es teler" style="width: 100px; height:100px; object-fit: cover;">
                  <h5>Es Teler</h5>
                  <span class="badge badge-success">Tersedia</span>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>

  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>Halal Food</strong> | Project Mahasiswa
  </footer>

</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>