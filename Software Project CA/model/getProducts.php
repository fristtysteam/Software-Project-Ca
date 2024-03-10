<?php
require_once 'databaseConnection.php';

function getProducts() {
    $products = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM product";

            $stmt = $db->prepare($query);

            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return array();
    }

    return $products;
}
function getProductById($productId)
{
    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM product WHERE id = :id";

            $stmt = $db->prepare($query);

            $stmt->bindParam(':id', $productId);

            $stmt->execute();

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return null;
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return null;
    }
}
