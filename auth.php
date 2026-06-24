<?php
/**
 * auth.php — Guard Autentikasi Terpusat
 * ----------------------------------------
 * Sertakan file ini di BARIS PERTAMA setiap halaman
 * yang hanya boleh diakses oleh user yang sudah login.
 *
 * Cara pakai:
 *   <?php require_once 'auth.php'; ?>
 */

// Jalankan session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Auto-login dari cookie "Ingat Saya"
if (!isset($_SESSION['login']) && isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['password'] = $_COOKIE['password'];
    $_SESSION['nama']     = $_COOKIE['username'];
    $_SESSION['login']    = true;
}

// Cek apakah user sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Simpan pesan notifikasi ke session
    $_SESSION['error'] = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
    // Redirect ke halaman login
    header('Location: login.php');
    exit;
}
?>
