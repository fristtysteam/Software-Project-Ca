<?php
require_once 'databaseConnection.php';
require_once 'cartModel.php'; // Include the CartModel class

global $db;
$cartModel = new CartModel($db);

// Start session (do not start session here if it's already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userId'])) {
    if (isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        $userId = $_SESSION['userId'];

        // If the user submits the form to add an item to the cart
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if quantity is set
            if (isset($_POST['quantity'])) {
                $quantity = $_POST['quantity'];

                if ($cartModel->addToCart($userId, $productId, $quantity)) {
                    echo "Item added to cart successfully";
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
       // echo "Product ID not specified";
    }
} else {
    echo "You must be logged in to add products to the cart";
}
?>