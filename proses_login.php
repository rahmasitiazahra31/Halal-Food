<?php
session_start();

include 'koneksi.php';

$user     = isset($_POST['user']) ? trim($_POST['user']) : '';
$sandi    = isset($_POST['sandi']) ? trim($_POST['sandi']) : '';
$remember = isset($_POST['remember']) ? $_POST['remember'] : '';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location:login.php');
    exit;
}


if (empty($user) || empty($sandi)) {
    $_SESSION['error'] = "Username dan password tidak boleh kosong!";
    header('location:login.php');
    exit;
}


// login
$query = mysqli_query($conn,
"SELECT * FROM users
WHERE username='$user'
AND password='$sandi'");


$data = mysqli_fetch_assoc($query);



if ($data) {


    if ($remember == 'Y') {

        setcookie('username',$user,time()+86400,"/");
        setcookie('password',$sandi,time()+86400,"/");

    }



    // SESSION

    $_SESSION['id_user'] = $data['id_user'];

    $_SESSION['username'] = $data['username'];

    $_SESSION['nama'] = $data['nama'];

    $_SESSION['level'] = $data['level'];

    $_SESSION['login'] = true;



    unset($_SESSION['error']);


    header('location:beranda.php');
    exit;



} else {


    $_SESSION['error'] = "Username atau password salah!";

    header('location:login.php');
    exit;

}

?>