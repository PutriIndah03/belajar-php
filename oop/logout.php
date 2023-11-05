<?php
session_start();

require_once 'user.php'; // Include kelas User.php

$user = new User(null); // Koneksi database tidak diperlukan untuk proses logout

if ($user->isLoggedIn()) {
    $user->logout();
}

header("Location: login.php"); // Redirect kembali ke halaman login setelah logout
?>
