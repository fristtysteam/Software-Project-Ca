<?php
require_once 'databaseConnection.php';

function getOrders() {
    $orders = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM `order`";

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
function getOrdersByUserId($user_id)
{
    global $db;


    if ($db) {

        try {

            $query = "SELECT * FROM `order` WHERE user_id = :user_id";

            $stmt = $db->prepare($query);

            $stmt->bindParam(':user_id', $user_id);

            $stmt->execute();

            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $orders;
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
function getOrdersByOrderId($order_id)
{
    global $db;


    if ($db) {

        try {

            $query = "SELECT * FROM `orderitemlog` WHERE orderId = :order_id";

            $stmt = $db->prepare($query);

            $stmt->bindParam(':order_id', $order_id);

            $stmt->execute();

            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $orders;
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


function addOrder($cart_id, $product_id, $price, $user_id, $quantity, $order_date)
{
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
            return $db->lastInsertId();
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }

}



function addOrder2($user_id)
{
    global $db;

    $sql = "INSERT INTO `order2` (userId) VALUES (:user_id)";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id); // Corrected parameter name
        $stmt->execute();

        return $db->lastInsertId();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getCartItems($user_id) {
    global $db;
    $sql = "SELECT cart.*, product.name, product.price FROM cart 
            INNER JOIN product ON cart.product_id = product.id
            WHERE cart.user_id = :user_id";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();

        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $cartItems;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function addOrderItem($orderId, $product_id, $quantity, $order_date)
{
    global $db;

    $sql = "INSERT INTO `orderitemlog` (orderId, product_Id, quantity, orderDate) 
            VALUES (:orderId, :product_id, :quantity, :order_date)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':product_id', $product_id);
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
