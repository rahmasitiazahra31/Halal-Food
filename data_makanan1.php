<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

include 'koneksi.php';

$admin = ($_SESSION['level'] == "admin");


// ========================
// TAMBAH DATA
// ========================
if (isset($_POST['tambah']) && $admin) {

    $nama = $_POST['nama_makanan'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $alamat = $_POST['alamat'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $size = $_FILES['gambar']['size'];

    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    $nama_file = uniqid() . "." . $ext;


    if ($ext != "jpg" && $ext != "jpeg") {

        echo "<script>
        alert('File wajib JPG!');
        </script>";

        exit;
    }


    if ($size > 2000000) {

        echo "<script>
        alert('Ukuran maksimal 2MB!');
        </script>";

        exit;
    }


    move_uploaded_file(
        $tmp,
        "upload/" . $nama_file
    );


    mysqli_query($conn,

    "INSERT INTO data_makanan
    (
        nama_makanan,
        kategori,
        deskripsi,
        alamat,
        gambar
    )

    VALUES
    (
        '$nama',
        '$kategori',
        '$deskripsi',
        '$alamat',
        '$nama_file'
    )");


    header("location:data_makanan1.php");
    exit;
}



// ========================
// HAPUS
// ========================
if (isset($_GET['hapus']) && $admin) {

    $id = $_GET['hapus'];

    mysqli_query($conn,

    "DELETE FROM data_makanan
    WHERE id_makanan='$id'");


    header("location:data_makanan1.php");
    exit;
}




// ========================
// EDIT
// ========================
$edit = null;

if (isset($_GET['edit']) && $admin) {

    $id = $_GET['edit'];


    $q = mysqli_query($conn,

    "SELECT * FROM data_makanan
    WHERE id_makanan='$id'");


    $edit = mysqli_fetch_assoc($q);
}



// ========================
// UPDATE
// ========================
if (isset($_POST['update']) && $admin) {

    $id = $_POST['id_makanan'];

    $nama = $_POST['nama_makanan'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $alamat = $_POST['alamat'];


    mysqli_query($conn,

    "UPDATE data_makanan SET

    nama_makanan='$nama',
    kategori='$kategori',
    deskripsi='$deskripsi',
    alamat='$alamat'

    WHERE id_makanan='$id'");


    header("location:data_makanan1.php");
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>

<title>Data Makanan</title>

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



<?php if($admin){ ?>


<div class="card">

<div class="card-header bg-success text-white">

Data Makanan

</div>


<div class="card-body">


<form method="POST"
enctype="multipart/form-data">


<input type="hidden"
name="id_makanan"
value="<?= $edit['id_makanan'] ?? '' ?>">



<input type="text"
name="nama_makanan"
class="form-control mb-2"
placeholder="Nama makanan"
required>



<input type="text"
name="kategori"
class="form-control mb-2"
placeholder="Kategori"
required>



<textarea name="deskripsi"
class="form-control mb-2"
placeholder="Deskripsi"></textarea>



<textarea name="alamat"
class="form-control mb-2"
placeholder="Alamat"></textarea>



<input type="file"
name="gambar"
class="form-control mb-3"
accept=".jpg,.jpeg">



<?php if($edit){ ?>

<button name="update"
class="btn btn-warning">

Update

</button>


<?php } else { ?>


<button name="tambah"
class="btn btn-success">

Tambah

</button>


<?php } ?>


</form>


</div>

</div>


<?php } ?>



<div class="card">


<div class="card-header bg-primary text-white">

Daftar Makanan

</div>


<div class="card-body">


<table class="table table-bordered">


<tr>

<th>No</th>
<th>Gambar</th>
<th>Nama</th>
<th>Kategori</th>
<th>Deskripsi</th>
<th>Aksi</th>

</tr>



<?php

$data = mysqli_query($conn,
"SELECT * FROM data_makanan");


$no = 1;


while($d = mysqli_fetch_assoc($data)){


?>


<tr>


<td><?= $no++; ?></td>


<td>

<?php if($d['gambar']){ ?>

<a href="upload/<?= $d['gambar']; ?>"
target="_blank">


<img src="upload/<?= $d['gambar']; ?>"
width="80">


</a>


<?php } ?>

</td>


<td><?= $d['nama_makanan']; ?></td>

<td><?= $d['kategori']; ?></td>

<td><?= $d['deskripsi']; ?></td>


<td>


<?php if($admin){ ?>


<a href="data_makanan1.php?edit=<?= $d['id_makanan']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>


<a href="data_makanan1.php?hapus=<?= $d['id_makanan']; ?>"
onclick="return confirm('Hapus data?')"
class="btn btn-danger btn-sm">

Hapus

</a>


<?php } else { ?>


<span class="badge badge-secondary">
View Only
</span>


<?php } ?>


</td>


</tr>


<?php } ?>


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