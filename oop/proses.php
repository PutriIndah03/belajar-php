<?php
session_start(); // Mulai sesi

require_once("database.php");
require_once("user.php");

$host = "localhost";
$username = "root";
$password = "";
$database = "pos_shop";

$database = new Database($host, $username, $password, $database);
$user = new user($database);
$users = $user->login($email, $password);

$email = $_POST['email'];
$password = $_POST['pass'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $loginResult = $user->login($email, $password);
    if ($loginResult) {
        // Login berhasil, alihkan ke halaman beranda atau halaman lain
        header('Location: dashboard.php');
        exit();
    } else {
        // Login gagal
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}
?>

