<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

$usernameSession = $_SESSION['username'];

// ambil data user login
$query = mysqli_query($conn,
"SELECT * FROM users
WHERE username='$usernameSession'");

$data = mysqli_fetch_assoc($query);

// UPDATE PROFILE
if (isset($_POST['update'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn,
    "UPDATE users SET
    username='$username',
    password='$password'

    WHERE username='$usernameSession'");

    // update session
    $_SESSION['username'] = $username;

    echo "
    <script>
    alert('Profile berhasil diupdate!');
    window.location='profile.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit Profile</title>

<link rel="stylesheet"
href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet"
href="dist/css/adminlte.min.css">

<style>

.content-wrapper{
  background-color:#f4f6f9;
  min-height:100vh;
}

.card{
  border-radius:20px;
}

</style>

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

<?php include 'sidebar.php'; ?>

<div class="content-wrapper">

<section class="content pt-4">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-success">

<h3 class="card-title">
Edit Profile
</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="form-group">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"

value="<?= $data['username']; ?>"

required>

</div>

<div class="form-group">

<label>Password</label>

<input
type="text"
name="password"
class="form-control"

value="<?= $data['password']; ?>"

required>

</div>

<button
type="submit"
name="update"
class="btn btn-success">

Update Profile

</button>

<a href="profile.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

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