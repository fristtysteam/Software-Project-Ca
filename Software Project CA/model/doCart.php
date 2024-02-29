<?php
session_start();
require_once 'databaseConnection.php';

if (isset($_GET['product_id'])) {
    $productId = intval($_GET['product_id']);

    // Get product information from the database based on product_id
    $stmt =  $db->prepare("SELECT name, price FROM product WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Add the product to the cart along with its name and price
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_GET['action']) && $_GET['action'] === 'update') {
            // Update the quantity of the product in the cart
            $newQuantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;
            if ($newQuantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
            } else {
                // Remove the product if the quantity is zero or negative
                unset($_SESSION['cart'][$productId]);
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === 'remove') {
            // Remove the product from the cart
            unset($_SESSION['cart'][$productId]);
        } else {
            // Default action is to add the product to the cart
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
        // Product not found, handle error
        header('Location: error.php');
        exit;
    }
} else {
    // No product_id provided, handle error
    header('Location: error.php');
    exit;
}


?>
