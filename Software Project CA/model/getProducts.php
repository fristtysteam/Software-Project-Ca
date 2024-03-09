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
