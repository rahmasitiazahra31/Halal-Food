<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM tempat
WHERE id_tempat='$id'");

header("location:place.php");
?>