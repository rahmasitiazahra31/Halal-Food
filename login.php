<?php
session_start();

// Pesan error dari gagal login
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Notifikasi berhasil logout
$logout = isset($_GET['logout']) && $_GET['logout'] == '1';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Find Halal Food</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    body.login-page {
      position: relative !important;
      min-height: 100vh;
      margin: 0;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #0c2721;
    }

    .login-logo-image {
      display:block;
      margin:0 auto 20px auto;
      width: 80px;
      height: auto;
      border-radius: 50%;
      justify-content: center;
    }
    

    body.login-page::before {
      content:"";
      position: fixed;
      bottom:0;
      left: 0;
      right: 0;
      height:10px;
      background:linear-gradient(to top, #adcaa4, transparent) !important;
      z-index: 1;
      pointer-events: none;
    }

    .card-body {
      box-shadow:0 -3px 3px #077346;
    }


    .food_decor {
      width: 150px;
      height: auto;
      position: absolute !important;
      z-index: 1 !important;
      pointer-events: none;
    }

    .decor-1 {
      top: 50px !important;
      left: 50px !important;
      transform: rotate(-15deg);      
    }

    .decor-2 {
      bottom: 80px !important;
      left: 40px !important;
      transform: rotate(10deg);      
    }

    .decor-3 {
      top: 110px !important;
      right: 70px !important;
      transform: rotate(79deg);
      width: 150px;
    }

    .decor-4 {
      bottom: 90px !important;
      right: 50px !important;
      transform: rotate(-10deg);
    }

    .decor-5 {
      top: 33% !important;
      left:13% !important;
      transform: rotate(10deg);
    }

    .decor-6 {
      top: 30% !important;
      right: 20% !important;
      width: 144px;
      transform: rotate(-10deg);
    }

    .decor-7 {
      top: 20% !important;
      left: 23% !important;
      width: 115px;
      transform: rotate(0);
    }

    .decor-8 {
      bottom: 10% !important;
      left:20% !important;
      width: 130px;
      transform: rotate(0);
    }

    .decor-9 {
      top: 65% !important;
      right: 17% !important;
      width: 110px;
      transform: rotate(-10deg);
    }

    .login-logo, .login-box {
      position: relative !important;
      z-index: 10 !important;
    }

    .btn-custom {
      background-color: #06785f;
      color: #ffff;
    }
  </style>
  
</head>
<body class="hold-transition login-page">
  <img src="image/7.jpg" class="login-logo-image" alt="halal_certification">

  <img src="image/18.png" class="food_decor decor-1">
  <img src="image/21.png" class="food_decor decor-2">
  <img src="image/20.png" class="food_decor decor-3">
  <img src="image/19.png" class="food_decor decor-4">
  <img src="image/22.png" class="food_decor decor-5">
  <img src="image/25.png" class="food_decor decor-6">
  <img src="image/27.png" class="food_decor decor-7">
  <img src="image/26.png" class="food_decor decor-8">
  <img src="image/24.png" class="food_decor decor-9">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline">
    <div class="card-header text-center">
      <h1><b>Halal</b>Food</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if (!empty($error)) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:0.88rem; padding: 8px 14px;">
        <i class="fas fa-exclamation-circle mr-1"></i>
        <?= htmlspecialchars($error) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 6px 10px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php endif; ?>

      <?php if ($logout) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="logoutAlert" style="font-size:0.88rem; padding: 8px 14px;">
        <i class="fas fa-check-circle mr-1"></i>
        Anda berhasil logout. Sampai jumpa!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 6px 10px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <script>
        // Auto-hilang setelah 3 detik
        setTimeout(function() {
          var el = document.getElementById('logoutAlert');
          if (el) { el.classList.remove('show'); el.classList.add('hide'); }
        }, 3000);
      </script>
      <?php endif; ?>

      <form action="proses_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="sandi" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" value="Y" id="remember" name="remember">
              <label for="remember">
                Remember me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-custom btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
