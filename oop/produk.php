<?php
require_once 'database.php';
class Product {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function insertProduct($kode_produk, $nama, $imagePathsJSON, $kategori, $price, $stok, $deskripsi) {
        $query = "INSERT INTO products (product_code, product_name, image, id_kategori, price, stock, description) 
                  VALUES ('$kode_produk', '$nama', '$imagePathsJSON', '$kategori', '$price', '$stok', '$deskripsi')";
        
        $stmt = $this->db->connection->prepare($query);

        return $stmt->execute();
        
    }

   

    public function read($page, $per_page){
      
        $start = ($page - 1) * $per_page;
        
        $query = "SELECT products.id, products.product_code, products.product_name, products.image,
        product_categories.category_name, products.price, products.stock,
        products.description FROM products
        INNER JOIN product_categories ON products.id_kategori = product_categories.id
        LIMIT $start, $per_page";
        $result = $this->db->connection->query($query);

        if ($result->num_rows > 0) {
            $products = array();
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        } else {
            return array(); // Return array kosong jika tidak ada produk
        }
    }
    
    public function getTotalProducts() {
        $query = "SELECT COUNT(*) as total FROM products";
        $result = $this->db->connection->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = $id";
        $result = $this->db->connection->query($query);

        return $result->fetch_assoc();
    }

    public function getAllCategories() {
        $query = "SELECT id, category_name FROM product_categories";
        $result = $this->db->connection->query($query);

        $categories = array();
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        return $categories;
    }

    public function update($id, $kode_produk, $nama, $kategori, $price, $stok, $deskripsi) {
        $query = "UPDATE products SET product_code = '$kode_produk', product_name = '$nama', 
    id_kategori = '$kategori', price = '$price', stock = '$stok', description = '$deskripsi' WHERE id = $id";
        
        if ($this->db->connection->query($query) === true) {
            return true; // Operasi UPDATE berhasil
        } else {
            return false; // Terjadi kesalahan
        }
    }

    public function delete($id) {
        $query = "DELETE FROM products WHERE id = $id";
        $stmt = $this->db->connection->prepare($query);

        return $stmt->execute();
    }
}
?>
