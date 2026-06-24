<?php include 'sidebar.php'; ?>

<div class="content-wrapper p-3">

<h3>Tambah Tempat</h3>

<form action="tambah_tempat.php" method="POST">

<div class="form-group">
<label>Nama Tempat</label>

<input type="text"
name="nama_tempat"
class="form-control">
</div>

<div class="form-group">
<label>Alamat</label>

<textarea
name="alamat"
class="form-control"></textarea>
</div>

<button type="submit"
class="btn btn-success">

Simpan

</button>

</form>

</div>