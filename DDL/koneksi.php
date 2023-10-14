<?php
// Informasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$database = "online_shop";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil
echo "Koneksi sukses!";
?>
