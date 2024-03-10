<?php
require_once '../model/databaseConnection.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';

include "nav.php";
include 'header.php';

function getCartItems() {
    global $cartModel;

    return isset($_SESSION['userId']) ? $cartModel->getCartItems($_SESSION['userId']) : [];
}

// Get cart items
$cartItems = getCartItems();

if (isset($_POST['pay'])) {
    global $cartModel;

    foreach ($cartItems as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];

        if (!$cartModel->updateProductQuantity($product_id, $quantity)) {
            echo "<div class='container'>";
            echo "<h1 class='mb-4'>Error!</h1>";
            echo "<p>Failed to process your order. Please try again later.</p>";
            echo "</div>";
            exit();
        }
    }

    if (!$cartModel->clearCart($_SESSION['userId'])) {
        echo "<div class='container'>";
        echo "<h1 class='mb-4'>Error!</h1>";
        echo "<p>Failed to clear the cart. Please try again later.</p>";
        echo "</div>";
        exit();
    }

    echo "<div class='container'>";
    echo "<h1 class='mb-4'>Thank You!</h1>";
    echo "<p>Your order has been successfully processed.</p>";
    echo "</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Custom styles -->
    <style>
        .checkout-table th, .checkout-table td {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mb-4">Checkout</h1>
    <div class="table-responsive">
        <table class="table table-bordered checkout-table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <form method="post">
            <button type="submit" name="pay" class="btn btn-primary">Pay</button>
        </form>
    </div>
</div>
</body>
</html>
