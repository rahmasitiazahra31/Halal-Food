<?php

include 'koneksi.php';

$nama = $_POST['nama_tempat'];
$alamat = $_POST['alamat'];

mysqli_query($conn,
"INSERT INTO tempat
(nama_tempat, alamat)

VALUES

('$nama', '$alamat')");

header("location:place.php");
?>