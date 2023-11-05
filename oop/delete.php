<?php
require_once 'database.php'; // Include kelas Database.php
require_once 'produk.php'; // Include kelas Product.php
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pos_shop";
    
    $database = new Database($host, $username, $password, $database);
    
    $product = new Product($database);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product->delete($id);
        header("Location: index.php"); // Redirect kembali ke halaman produk setelah penghapusan
    }
?>
