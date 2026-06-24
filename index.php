<?php
include 'koneksi.php';

$users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$tempat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tempat"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Halal Food</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    font-family:'Segoe UI',sans-serif;
}

.navbar{
    background:rgba(0,0,0,.3);
    backdrop-filter:blur(10px);
}

.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;

    background:
    linear-gradient(
    rgba(0,0,0,.6),
    rgba(0,0,0,.6)
    ),
    url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');

    background-size:cover;
    background-position:center;
}

.logo{
    width:220px;
    margin-bottom:20px;
}

.feature-card{
    transition:0.3s;
    border:none;
    border-radius:20px;
}

.feature-card:hover{
    transform:translateY(-10px);
}

.stats{
    background:#198754;
    color:white;
}

.stat-box{
    padding:30px;
}

footer{
    background:#212529;
    color:white;
}

</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

<div class="container">

<a class="navbar-brand d-flex align-items-center" href="#">

<img src="image/logo.png"
width="45"
class="me-2">

<strong>Halal Food</strong>

</a>

<a href="login.php"
class="btn btn-success">
Login
</a>

</div>

</nav>

<section class="hero">

<div class="container">

<h1 class="display-3 fw-bold">
Halal Food
</h1>

<p class="lead mt-3">
Temukan makanan halal terdekat dan simpan tempat favoritmu dengan mudah.
</p>

<a href="login.php"
class="btn btn-success btn-lg mt-3">
Mulai Sekarang
</a>

</div>

</section>

<section class="stats">

<div class="container">

<div class="row text-center">

<div class="col-md-4 stat-box">
<h1><?php echo $tempat; ?></h1>
<p>Tempat Makan</p>
</div>

<div class="col-md-4 stat-box">
<h1><?php echo $users; ?></h1>
<p>Pengguna</p>
</div>

<div class="col-md-4 stat-box">
<h1>24/7</h1>
<p>Akses Informasi</p>
</div>

</div>

</div>

</section>

<section class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
Fitur Utama
</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="card feature-card shadow h-100">

<div class="card-body text-center">

<h1>📍</h1>

<h4>Place</h4>

<p>
Melihat daftar tempat makan halal yang tersedia.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow h-100">

<div class="card-body text-center">

<h1>📷</h1>

<h4>Scan Barcode</h4>

<p>
Simulasi pengecekan produk makanan melalui barcode.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow h-100">

<div class="card-body text-center">

<h1>❤️</h1>

<h4>Save Favorite</h4>

<p>
Simpan tempat atau makanan favorit untuk dikunjungi kembali.
</p>

</div>

</div>

</div>

</div>

</div>

</section>

<section class="bg-light py-5">

<div class="container text-center">

<h2 class="fw-bold">
Tentang Aplikasi
</h2>

<p class="lead mt-4">
Halal Food adalah aplikasi berbasis web yang membantu pengguna menemukan tempat makan halal, melakukan simulasi scan barcode produk, dan menyimpan daftar favorit untuk memudahkan pencarian di kemudian hari.
</p>

</div>

</section>

<section class="py-5 text-center">

<div class="container">

<h2 class="fw-bold">
Siap Menemukan Makanan Halal?
</h2>

<p>
Masuk sekarang dan mulai menjelajahi aplikasi Halal Food.
</p>

<a href="login.php"
class="btn btn-success btn-lg">
Login Sekarang
</a>

</div>

</section>

<footer class="text-center p-4">

<h5>Halal Food</h5>

<p class="mb-0">
© 2026 | Project PHP & MySQL
</p>

</footer>

</body>
</html>