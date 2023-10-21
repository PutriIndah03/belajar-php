<?php
include 'koneksi.php';
    $id = $_POST['id'];
    $kode_produk = $_POST['product_code'];
    $nama = $_POST['product_name'];
    $kategori = $_POST['kategori'];
    $price = $_POST['price'];
    $stok = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE products SET product_code = '$kode_produk', product_name = '$nama', 
    id_kategori = '$kategori', price = '$price', stock = '$stok', description = '$deskripsi' WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit();
    
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
$conn->close();
?>
