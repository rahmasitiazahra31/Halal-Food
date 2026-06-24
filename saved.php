<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

include 'koneksi.php';


// ==========================
// HAPUS FAVORITE
// ==========================

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query($conn,
    "DELETE FROM save_favorite
    WHERE id_save='$id'");

    header("location:saved.php");
    exit;
}



// ==========================
// AMBIL DATA FAVORITE
// ==========================

$data = mysqli_query($conn,

"SELECT 
save_favorite.id_save,
makanan.gambar,
makanan.nama_makanan,
makanan.status_halal

FROM save_favorite

JOIN makanan

ON save_favorite.id_makanan = makanan.id_makanan"

);

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Saved | Halal Food</title>


<link rel="stylesheet"
href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet"
href="dist/css/adminlte.min.css">


</head>


<body class="hold-transition sidebar-mini">


<div class="wrapper">


<?php include 'sidebar.php'; ?>



<div class="content-wrapper">


<section class="content pt-3">


<div class="container-fluid">


<div class="card">


<div class="card-header bg-warning">


<h3 class="card-title">

📌 Daftar Produk Tersimpan

</h3>


</div>




<div class="card-body">



<?php if(mysqli_num_rows($data)==0){ ?>


<div class="alert alert-warning">

Belum ada produk disimpan 😢

</div>



<?php } else { ?>



<table class="table table-bordered table-hover">


<thead class="thead-dark">


<tr>

<th>No</th>

<th>Gambar</th>

<th>Nama Produk</th>

<th>Status</th>

<th>Aksi</th>

</tr>


</thead>



<tbody>



<?php

$no = 1;


while($item = mysqli_fetch_assoc($data)){

?>


<tr>


<td>

<?= $no++; ?>

</td>



<td>


<img

src="<?= $item['gambar']; ?>"

width="80"

height="80"

style="object-fit:cover;border-radius:10px;">


</td>



<td>

<?= $item['nama_makanan']; ?>

</td>



<td>


<?php if($item['status_halal']=="HALAL"){ ?>


<span class="badge badge-success">

HALAL

</span>


<?php }else{ ?>


<span class="badge badge-danger">

TIDAK HALAL

</span>


<?php } ?>


</td>




<td>


<a href="saved.php?hapus=<?= $item['id_save']; ?>"

onclick="return confirm('Yakin mau hapus favorite?')"

class="btn btn-danger btn-sm">


<i class="fas fa-trash"></i>

Hapus


</a>


</td>


</tr>


<?php } ?>



</tbody>


</table>



<?php } ?>



</div>


</div>


</div>


</section>


</div>






<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>



</div>


</body>

</html>