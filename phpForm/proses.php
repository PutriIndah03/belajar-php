<?php

// Simpan email dan password yang valid dalam variabel
$valid_email = "putriindah@gmail.com";
$valid_password = "12345678";

// Ambil data dari formulir
$email = $_POST['email'];
$password = $_POST['pass'];

// Lakukan validasi login
if ($email == $valid_email && $password == $valid_password) {
    // Login berhasil
    header('Location: ../phpDasar2/dashboard.php');
} else {
    // Login gagal
    header ('location: login.php');
}
?> 