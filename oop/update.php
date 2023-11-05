<?php
require_once 'database.php'; // Include kelas Database.php
require_once 'produk.php'; 

$host = "localhost";
$username = "root";
$password = "";
$database = "pos_shop";

$database = new Database($host, $username, $password, $database);

$product = new Product($database);

    $id = $_POST['id'];
    $kode_produk = $_POST['product_code'];
    $nama = $_POST['product_name'];
    $kategori = $_POST['kategori'];
    $price = $_POST['price'];
    $stok = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];

    if ($product->update($id, $kode_produk, $nama, $kategori, $price, $stok, $deskripsi)) {
        header("Location: index.php");
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
?>
