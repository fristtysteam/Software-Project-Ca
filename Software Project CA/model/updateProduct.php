<?php
require_once 'databaseConnection.php';

function updateProduct($productId, $name, $price, $quantity, $url, $description) {
    global $db;

    $sql = "UPDATE product SET name = :name, price = :price, quantity = :quantity, url = :url, description = :description WHERE id = :id";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':id', $productId); // Corrected to ':productId'
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


?>
