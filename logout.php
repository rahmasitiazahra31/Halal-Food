<?php
/**
 * logout.php — Proses Keluar dari Aplikasi
 * ------------------------------------------
 * Menghapus session DAN cookie "Tetap Login"
 * agar autentikasi benar-benar bersih.
 */

session_start();

// Hapus semua data session
$_SESSION = [];

// Hapus session cookie di browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan session di server
session_destroy();

// Hapus cookie "Tetap Login" (username & password)
setcookie('username', '', time() - 86400, "/");
setcookie('password', '', time() - 86400, "/");

// Redirect ke halaman login dengan notifikasi berhasil logout
header('Location: login.php?logout=1');
exit;
?>
