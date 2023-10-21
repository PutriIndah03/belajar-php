<?php
include 'koneksi.php';
if (isset($_POST['product_code']) && isset($_POST['product_name']) && 
isset($_POST['kategori']) && isset($_POST['price']) && isset($_POST['stock']) 
&& isset($_POST['deskripsi'])) {
    $kode_produk = $_POST['product_code'];
    $nama = $_POST['product_name'];
    $kategori = $_POST['kategori'];
    $price = $_POST['price'];
    $stok = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];


    $query = "INSERT INTO products (product_code, product_name, id_kategori, price, stock, description) 
    VALUES ('$kode_produk', '$nama', '$kategori', '$price', '$stok', '$deskripsi')";

   if ($conn->query($query) === TRUE) {
        header('location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>
