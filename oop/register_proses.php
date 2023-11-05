<?php

require_once("database.php"); // Include kelas Database.php
require_once("user.php"); // Include kelas User.php

$host = "localhost";
$username = "root";
$password = "";
$database = "pos_shop";

$database = new Database($host, $username, $password, $database);
$user = new user($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $no_hp = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password untuk keamanan
    
    // Buat username dari nomor telepon
    $username = $no_hp;
    if ($user->register($username, $nama, $email, $no_hp, $password)) {
        header('location: login.php');
    } else {
        echo "Registrasi gagal. Coba lagi.";
    }
}
?>
