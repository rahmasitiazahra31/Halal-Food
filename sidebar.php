<style>
.main-sidebar{
background-color:#117a8b;
}
.hulu{
color:white;
}
.nav-sidebar .nav-link p,
.nav-sidebar .nav-link i{
color:white;
}
</style>

<?php
$current_page=basename($_SERVER['PHP_SELF']);
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#">
<i class="fas fa-bars"></i>
</a>
</li>
</ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="#" class="brand-link text-center">
<span class="hulu"><h3>Halal Food</h3></span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="dist/img/user2-160x160.jpg"
class="img-circle elevation-2">
</div>

<div class="info">
<a href="profile.php" class="d-block text-white">
<?= $_SESSION['username']; ?>
</a>
</div>
</div>


<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column">

<li class="nav-item">
<a href="beranda.php"
class="nav-link <?=($current_page=='beranda.php')?'active':''?>">
<i class="nav-icon fas fa-home"></i>
<p>Beranda</p>
</a>
</li>


<li class="nav-item">
<a href="place.php"
class="nav-link <?=($current_page=='place.php')?'active':''?>">
<i class="nav-icon fas fa-map-marker-alt"></i>
<p>Place</p>
</a>
</li>


<li class="nav-item">
<a href="scan.php"
class="nav-link <?=($current_page=='scan.php')?'active':''?>">
<i class="nav-icon fas fa-qrcode"></i>
<p>Scan</p>
</a>
</li>


<li class="nav-item">
<a href="saved.php"
class="nav-link <?=($current_page=='saved.php')?'active':''?>">
<i class="nav-icon fas fa-bookmark"></i>
<p>Saved</p>
</a>
</li>


<li class="nav-item">
<a href="profile.php"
class="nav-link <?=($current_page=='profile.php')?'active':''?>">
<i class="nav-icon fas fa-user"></i>
<p>Profile</p>
</a>
</li>

<li class="nav-item">
<a href="data_makanan1.php"
class="nav-link <?=($current_page=='data_makanan1.php')?'active':''?>">
<i class="nav-icon fas fa-user"></i>
<p>Data Makanan</p>
</a>
</li>


<li class="nav-item mt-3">
<a href="logout.php" class="nav-link text-danger">
<i class="nav-icon fas fa-sign-out-alt" style="color:#9f0000;"></i>
<p style="color:#9f0000;">Logout</p>
</a>
</li>

</ul>
</nav>

</div>
</aside>