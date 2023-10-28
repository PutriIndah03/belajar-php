<?php

// // Simpan email dan password yang valid dalam variabel
// $valid_email = "putriindah@gmail.com";
// $valid_password = "12345678";

// // Ambil data dari formulir
// $email = $_POST['email'];
// $password = $_POST['pass'];

// // Lakukan validasi login
// if ($email == $valid_email && $password == $valid_password) {
//     // Login berhasil
//     header('Location: ../phpDasar2/dashboard.php');
// } else {
//     // Login gagal
//     header ('location: login.php');
// }

session_start(); // Mulai sesi

include('../DML/koneksi.php');
// Ambil data dari form
$email = $_POST['email'];
$password = $_POST['pass'];

// Query untuk mencocokkan email dan password dengan data di database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Login berhasil, simpan informasi pengguna dalam sesi
        $_SESSION['username'] = $row['username'];
        header('Location: ../phpDasar2/dashboard.php'); // Redirect ke halaman dashboard
        exit();
    }
}

$_SESSION['login_error'] = 'Email atau password salah'; // Pesan kesalahan
header('Location: login.php'); // Redirect kembali ke halaman login jika login gagal
exit();

$conn->close();
?>

