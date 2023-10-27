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

    $imagePaths = [];


    if (!empty($_FILES['image']['name'][0])) {
        $targetDirectory = "../files/";
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
    
        foreach ($_FILES['image']['name'] as $key => $name) {
            $targetFile = $targetDirectory . basename($name);
            if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFile)) {
                $imagePaths[] = $targetFile;
            }
        }
    }

// Simpan path gambar dalam bentuk JSON
$imagePathsJSON = json_encode($imagePaths);

$query = "INSERT INTO products (product_code, product_name, image, id_kategori, price, stock, description) 
VALUES ('$kode_produk', '$nama', '$imagePathsJSON', '$kategori', '$price', '$stok', '$deskripsi')";

   if ($conn->query($query) === TRUE) {
        header('location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>


