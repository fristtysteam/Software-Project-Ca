<?php
session_start();
require_once 'databaseConnection.php';

if (isset($_GET['product_id'])) {
    $productId = intval($_GET['product_id']);

    $stmt =  $db->prepare("SELECT name, price FROM product WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_GET['action']) && $_GET['action'] === 'update') {
            $newQuantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;
            if ($newQuantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === 'remove') {
            unset($_SESSION['cart'][$productId]);
        } else {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                $_SESSION['cart'][$productId] = array(
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => 1
                );
            }
        }

        header('Location: ../view/cart.php');
        exit;
    } else {
        header('Location: error.php');
        exit;
    }
} else {
    header('Location: error.php');
    exit;
}


?>
