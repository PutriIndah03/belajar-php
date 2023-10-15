<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_produk = $_POST['product_code'];
    $nama = $_POST['product_name'];
    $price = $_POST['price'];
    $stok = $_POST['stock'];


    $query = "INSERT INTO products (product_code, product_name, price, stock) 
    VALUES ('$kode_produk', '$nama', '$price', '$stok')";

   if ($conn->query($query) === TRUE) {
        header('location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>
