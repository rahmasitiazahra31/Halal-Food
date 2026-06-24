<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_tempat'];
$alamat = $_POST['alamat'];

mysqli_query($conn,
"UPDATE tempat SET
nama_tempat='$nama',
alamat='$alamat'
WHERE id_tempat='$id'");

header("location:place.php");
?>