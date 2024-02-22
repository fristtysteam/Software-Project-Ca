<?php
session_start();
require_once 'databaseConnection.php';

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Add the product to the cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = array(
            'quantity' => 1
        );
    }

    header('Location: ../view/cart.php');
    exit;
} else {
    header('Location: error.php');
    exit;
}
?>
