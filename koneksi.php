<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "halal_food"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>