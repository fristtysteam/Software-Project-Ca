<?php
require_once 'databaseConnection.php';
require_once 'cartModel.php';

global $db;
$cartModel = new CartModel($db);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userId'])) {
    if (isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        $userId = $_SESSION['userId'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['quantity'])) {
                $quantity = $_POST['quantity'];

                if ($cartModel->addToCart($userId, $productId, $quantity)) {
                    echo "Item added to cart successfully , redirecting you back to shop";
                    header("refresh:5;url=../controller/index.php?action=shop");
                } else {
                    echo "Error adding product to cart";
                }
            } else {
                echo "Quantity not specified";
            }
        } else {
            echo "Invalid request method";
        }
    } else {
    }
} else {
    echo "You must be logged in to add products to the cart";
}
?>