<?php
require_once 'databaseConnection.php';

function getOrders() {
    $orders = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM order";

            $stmt = $db->prepare($query);

            $stmt->execute();

            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return array();
    }

    return $orders;
}
function addOrder($cart_id, $product_id, $price, $user_id, $quantity, $order_date) {
    global $db;

    $sql = "INSERT INTO `order` (cart_id, product_id, price, user_id, quantity, order_date) VALUES (:cart_id, :product_id, :price, :user_id, :quantity, :order_date)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':cart_id', $cart_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':order_date', $order_date);

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
