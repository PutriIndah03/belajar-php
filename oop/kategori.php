<?php
require_once 'database.php';
class ProductCategory {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getCategoryList() {
        $query = "SELECT id, category_name FROM product_categories";
        $result = $this->db->connection->query($query);

        if ($result->num_rows > 0) {
            $categories = array();
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
            return $categories;
        } else {
            return array();
        }
    }
}
?>
