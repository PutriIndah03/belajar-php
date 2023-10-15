<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kode_produk = $_POST['product_code'];
    $nama = $_POST['product_name'];
    $price = $_POST['price'];
    $stok = $_POST['stock'];

    $query = "UPDATE products SET product_code = '$kode_produk', product_name = '$nama', 
    price = '$price', stock = '$stok' WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header('location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
