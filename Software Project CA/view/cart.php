<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include "../styles/homeStyles.php";
include'../view/header.php';
$currentLanguage = getLanguage();
?>
<?php

function getCartItems() {

    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

$cartItems = getCartItems();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
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
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price'] * $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="#" class="btn btn-primary checkout-btn">Proceed to Checkout</a>
</div>
</body>
</html>


