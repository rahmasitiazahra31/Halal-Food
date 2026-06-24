<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

include 'koneksi.php';

// ==========================
// TAMBAH DATA
// ==========================
if (isset($_POST['tambah'])) {

    $nama   = $_POST['nama_makanan'];
    $status = $_POST['status_halal'];
    $gambar = $_POST['gambar'];

    mysqli_query($conn,
    "INSERT INTO makanan
    (nama_makanan, status_halal, gambar)

    VALUES

    ('$nama', '$status', '$gambar')");
}

// ==========================
// HAPUS DATA
// ==========================
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query($conn,
    "DELETE FROM makanan
    WHERE id_makanan='$id'");

    header("location:makanan.php");
    exit;
}

// ==========================
// UPDATE DATA
// ==========================
if (isset($_POST['update'])) {

    $id      = $_POST['id_makanan'];
    $nama    = $_POST['nama_makanan'];
    $status  = $_POST['status_halal'];
    $gambar  = $_POST['gambar'];

    mysqli_query($conn,
    "UPDATE makanan SET
    nama_makanan='$nama',
    status_halal='$status',
    gambar='$gambar'

    WHERE id_makanan='$id'");

    header("location:makanan.php");
    exit;
}

// ==========================
// AMBIL DATA EDIT
// ==========================
$edit = null;

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $queryEdit = mysqli_query($conn,
    "SELECT * FROM makanan
    WHERE id_makanan='$id'");

    $edit = mysqli_fetch_assoc($queryEdit);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Makanan | Halal Food</title>

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

<!-- FORM -->
<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title text-white">

<?php if ($edit) { ?>
Edit Makanan
<?php } else { ?>
Tambah Makanan
<?php } ?>

</h3>

</div>

<div class="card-body">

<form method="POST">

<input type="hidden"
name="id_makanan"
value="<?= $edit['id_makanan'] ?? '' ?>">

<div class="form-group">

<label>Nama Makanan</label>

<input type="text"
name="nama_makanan"
class="form-control"

value="<?= $edit['nama_makanan'] ?? '' ?>"

required>

</div>

<div class="form-group">

<label>Status</label>

<select
name="status_halal"
class="form-control">

<option value="HALAL">
HALAL
</option>

<option value="TIDAK HALAL">
TIDAK HALAL
</option>

</select>

</div>

<div class="form-group">

<label>Link Gambar</label>

<input type="text"
name="gambar"
class="form-control"

value="<?= $edit['gambar'] ?? '' ?>">

</div>

<?php if ($edit) { ?>

<button type="submit"
name="update"
class="btn btn-warning">

Update

</button>

<a href="makanan.php"
class="btn btn-secondary">

Batal

</a>

<?php } else { ?>

<button type="submit"
name="tambah"
class="btn btn-primary">

Simpan

</button>

<?php } ?>

</form>

</div>

</div>

<!-- TABEL -->
<div class="card">

<div class="card-header">

<h3 class="card-title">
Data Makanan
</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>
<th>Gambar</th>
<th>Nama</th>
<th>Status</th>
<th width="200">Aksi</th>

</tr>

</thead>

<tbody>

<?php

$data = mysqli_query($conn,
"SELECT * FROM makanan");

$no = 1;

while($d = mysqli_fetch_assoc($data)) {

?>

<tr>

<td><?= $no++; ?></td>

<td>

<img
src="<?= $d['gambar']; ?>"
width="80"
height="80"
style="object-fit:cover;">

</td>

<td>
<?= $d['nama_makanan']; ?>
</td>

<td>

<?php if ($d['status_halal'] == "HALAL") { ?>

<span class="badge badge-success">
HALAL
</span>

<?php } else { ?>

<span class="badge badge-danger">
TIDAK HALAL
</span>

<?php } ?>

</td>

<td>

<a href="
makanan.php?edit=<?= $d['id_makanan']; ?>
"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>
Edit

</a>

<a href="
makanan.php?hapus=<?= $d['id_makanan']; ?>
"

class="btn btn-danger btn-sm"

onclick="
return confirm('Yakin ingin menghapus data ini?')
">

<i class="fas fa-trash"></i>
Hapus

</a>

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