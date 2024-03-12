<?php

require_once '../model/databaseConnection.php';

class ProductDao {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addProduct($name, $price, $quantity, $url, $description) {
        $sql = "INSERT INTO product (name, price, quantity, url, description) VALUES (:name, :price, :quantity, :url, :description)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':description', $description);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateProduct($productId, $name, $price, $quantity, $url, $description) {
        $sql = "UPDATE product SET name = :name, price = :price, quantity = :quantity, url = :url, description = :description WHERE id = :id";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $productId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':description', $description);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getProducts() {
        $products = array();

        $query = "SELECT * FROM product";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }

        return $products;
    }

    public function getProductById($productId) {
        $query = "SELECT * FROM product WHERE id = :id";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $productId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return null;
        }
    }

    public function deleteProduct($productId) {
        $query = "DELETE FROM product WHERE id = ?";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$productId]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>
