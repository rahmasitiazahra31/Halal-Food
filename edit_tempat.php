<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM tempat
WHERE id_tempat='$id'");

$d = mysqli_fetch_assoc($data);
?>

<form action="update_tempat.php"
method="POST">

<input type="hidden"
name="id"
value="<?= $d['id_tempat']; ?>">

<input type="text"
name="nama_tempat"
value="<?= $d['nama_tempat']; ?>">

<textarea
name="alamat"><?= $d['alamat']; ?></textarea>

<button type="submit">
Update
</button>

</form>