<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

include 'koneksi.php';


$admin = ($_SESSION['level'] == "admin");


// ==========================
// TAMBAH DATA (ADMIN)
// ==========================
if (isset($_POST['tambah']) && $admin) {

    $nama   = $_POST['nama_tempat'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn,
    "INSERT INTO tempat
    (nama_tempat, alamat)
    VALUES
    ('$nama','$alamat')");

    header("location:place.php");
    exit;
}



// ==========================
// HAPUS DATA (ADMIN)
// ==========================
if (isset($_GET['hapus']) && $admin) {

    $id = $_GET['hapus'];

    mysqli_query($conn,
    "DELETE FROM tempat
    WHERE id_tempat='$id'");

    header("location:place.php");
    exit;
}



// ==========================
// UPDATE DATA (ADMIN)
// ==========================
if (isset($_POST['update']) && $admin) {

    $id     = $_POST['id_tempat'];
    $nama   = $_POST['nama_tempat'];
    $alamat = $_POST['alamat'];


    mysqli_query($conn,
    "UPDATE tempat SET

    nama_tempat='$nama',
    alamat='$alamat'

    WHERE id_tempat='$id'");


    header("location:place.php");
    exit;
}



// ==========================
// EDIT
// ==========================
$edit = null;


if(isset($_GET['edit']) && $admin){

    $id=$_GET['edit'];


    $q=mysqli_query($conn,

    "SELECT * FROM tempat
    WHERE id_tempat='$id'");


    $edit=mysqli_fetch_assoc($q);

}



// ==========================
// SAVE FAVORITE
// ==========================

if(isset($_GET['save'])){


$id_makanan=$_GET['save'];


$username=$_SESSION['username'];


$user=mysqli_query($conn,

"SELECT * FROM users
WHERE username='$username'");


$u=mysqli_fetch_assoc($user);


$id_user=$u['id_user'];



$cek=mysqli_query($conn,

"SELECT * FROM save_favorite
WHERE id_user='$id_user'
AND id_makanan='$id_makanan'");



if(mysqli_num_rows($cek)==0){


mysqli_query($conn,

"INSERT INTO save_favorite
(id_user,id_makanan)

VALUES

('$id_user','$id_makanan')");


}


header("location:place.php");
exit;

}





// ==========================
// UNSAVE
// ==========================

if(isset($_GET['unsave'])){


$id_makanan=$_GET['unsave'];


$username=$_SESSION['username'];


$user=mysqli_query($conn,

"SELECT * FROM users
WHERE username='$username'");


$u=mysqli_fetch_assoc($user);


$id_user=$u['id_user'];



mysqli_query($conn,

"DELETE FROM save_favorite

WHERE id_user='$id_user'

AND id_makanan='$id_makanan'");


header("location:place.php");
exit;

}




function isSaved($conn,$id_makanan){


$username=$_SESSION['username'];


$user=mysqli_query($conn,

"SELECT * FROM users
WHERE username='$username'");


$u=mysqli_fetch_assoc($user);


$id_user=$u['id_user'];



$cek=mysqli_query($conn,

"SELECT * FROM save_favorite

WHERE id_user='$id_user'

AND id_makanan='$id_makanan'");



return mysqli_num_rows($cek)>0;


}


?>



<!DOCTYPE html>
<html lang="id">


<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">


<title>Place | Halal Food</title>


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





<!-- MAKANAN -->

<div class="card">


<div class="card-header bg-primary">


<h3 class="card-title">
🍽️ Rekomendasi
</h3>


</div>



<div class="card-body">


<div class="row">


<?php

$makanan=mysqli_query($conn,

"SELECT * FROM makanan LIMIT 6");


while($food=mysqli_fetch_assoc($makanan)){


$gambar="image/default.jpg";


if(!empty($food['gambar'])){

$gambar=$food['gambar'];

}

?>



<div class="col-md-4 mb-3">


<div class="card shadow-sm">



<img src="<?= $gambar ?>"

class="card-img-top"

style="height:250px;object-fit:cover;">



<div class="card-body">



<h5>

<?= $food['nama_makanan']; ?>

</h5>



<?php if($food['status_halal']=="HALAL"){ ?>

<span class="badge badge-success">
HALAL
</span>

<?php }else{ ?>

<span class="badge badge-danger">
TIDAK HALAL
</span>

<?php } ?>

<br><br>



<?php if(isSaved($conn,$food['id_makanan'])){ ?>


<a href="place.php?unsave=<?= $food['id_makanan'] ?>"

class="btn btn-danger btn-sm">

❤️ Unsave

</a>


<?php }else{ ?>


<a href="place.php?save=<?= $food['id_makanan'] ?>"

class="btn btn-success btn-sm">

💾 Save

</a>


<?php } ?>



</div>


</div>


</div>


<?php } ?>


</div>


</div>

</div>





<!-- FORM ADMIN SAJA -->

<?php if($admin){ ?>


<div class="card">


<div class="card-header bg-success text-white">


Tambah Tempat


</div>



<div class="card-body">


<form method="POST">


<input type="hidden"
name="id_tempat"
value="<?= $edit['id_tempat'] ?? '' ?>">



<input type="text"

name="nama_tempat"

class="form-control mb-2"

placeholder="Nama Tempat"

value="<?= $edit['nama_tempat'] ?? '' ?>">



<textarea

name="alamat"

class="form-control mb-2"

placeholder="Alamat"><?= $edit['alamat'] ?? '' ?></textarea>



<?php if($edit){ ?>


<button name="update"

class="btn btn-warning">

Update

</button>


<?php }else{ ?>


<button name="tambah"

class="btn btn-success">

Simpan

</button>


<?php } ?>



</form>


</div>


</div>


<?php } ?>






<!-- DATA TEMPAT -->

<div class="card">


<div class="card-header">

📍 Data Tempat Halal

</div>



<div class="card-body">


<table class="table table-bordered">


<thead>


<tr>

<th>No</th>

<th>Nama</th>

<th>Alamat</th>

<th>Aksi</th>


</tr>


</thead>



<tbody>


<?php

$data=mysqli_query($conn,

"SELECT * FROM tempat");


$no=1;


while($d=mysqli_fetch_assoc($data)){


?>



<tr>


<td><?= $no++; ?></td>


<td><?= $d['nama_tempat']; ?></td>


<td><?= $d['alamat']; ?></td>



<td>


<?php if($admin){ ?>


<a href="place.php?edit=<?= $d['id_tempat']; ?>"

class="btn btn-warning btn-sm">

Edit

</a>



<a href="place.php?hapus=<?= $d['id_tempat']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Hapus data?')">

Hapus

</a>


<?php }else{ ?>


<span class="badge badge-secondary">

View Only

</span>


<?php } ?>



</td>


</tr>



<?php } ?>



</tbody>


</table>


</div>


</div>





</div>

</section>


</div>



</div>



<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>


</body>

</html>