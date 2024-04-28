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

//function getOrderItemLogsByUserId($user_id)
//{
//    global $db;
//
//    if ($db) {
//        try {
//            $query = "SELECT * FROM `orderitemlog` WHERE orderId = :user_id"; // Change 'user_id' to 'orderId'
//
//            $stmt = $db->prepare($query);
//            $stmt->bindParam(':user_id', $user_id);
//            $stmt->execute();
//
//            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            return $orders;
//        } catch (PDOException $e) {
//            echo "Error: " . $e->getMessage();
//            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
//            return null;
//        }
//    } else {
//        echo "Error: Unable to connect to the database.";
//        return null;
//    }
//}
function getOrderItemLogsByUserId($userId)
{
    global $db;

    try {
        if (!$db) {
            throw new Exception("Error: Unable to connect to the database.");
        }

        $query = "SELECT ol.*, o.ordeDate, p.url, p.name AS title
          FROM orderitemlog ol
          JOIN order2 o ON ol.orderId = o.orderId
          JOIN product p ON ol.product_Id = p.id
          WHERE o.userId = :userId";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    } catch (PDOException $e) {
        file_put_contents('error.log', "Database Error: " . $e->getMessage() . "\n", FILE_APPEND);
        return null;
    } catch (Exception $ex) {
        file_put_contents('error.log', $ex->getMessage() . "\n", FILE_APPEND);
        return null;
    }
}
function cancelOrder($orderId) {
    global $db;

    $db->beginTransaction();

    try {
        // Delete entries from orderitemlog table for the given order ID
        $query1 = "DELETE FROM orderitemlog WHERE orderId = :orderId";
        $stmt1 = $db->prepare($query1);
        $stmt1->bindParam(':orderId', $orderId);
        $stmt1->execute();

        // Delete entry from order2 table for the given order ID
        $query2 = "DELETE FROM order2 WHERE orderId = :orderId";
        $stmt2 = $db->prepare($query2);
        $stmt2->bindParam(':orderId', $orderId);
        $stmt2->execute();

        // If both deletions are successful, commit the transaction
        $db->commit();
        return true;
    } catch (PDOException $e) {
        // If an error occurs, rollback the transaction
        $db->rollBack();
        echo "Error: " . $e->getMessage();
        file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
        return false;
    }
}


function getOrderItemLogsByOrderId($orderId)
{
    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM `orderitemlog` WHERE orderId = :orderId"; // Check that 'orderId' matches the column name in your table

            $stmt = $db->prepare($query);
            $stmt->bindParam(':orderId', $orderId);
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

function getOrderItemLogsByUserId2($user_id)
{
    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM `orderitemlog` WHERE orderId = :user_id"; // Check that 'orderId' matches the column name in your table

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


function  removeFromCartByCartId($id) {
    global $db;
    $sql = "DELETE FROM cart WHERE id = :id";

    try {
        $stmt = $db->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':id', $id); // Change ':user_id' to ':id'

        // Execute the statement
        $stmt->execute();

        // Check if the deletion was successful
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
