<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameOnCard = $_POST['nameOnCard'];

    $success = addOrder($cart_id, $product_id, $totalPrice, $user_id, $quantity, date('Y-m-d H:i:s'));
    if ($success) {
        http_response_code(200);
        echo "Payment processed successfully.";
    } else {
        http_response_code(500);
        echo "Error processing your order. Please try again.";
    }
}
?>
