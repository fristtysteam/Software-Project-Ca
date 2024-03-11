<?php
require_once 'databaseConnection.php';
require_once 'getProducts.php';


function addProduct($name, $price, $quantity, $url, $description) {
    global $db;

    $sql = "INSERT INTO product (name, price, quantity, url, description) VALUES (:name, :price, :quantity, :url, :description)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':description', $description);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
