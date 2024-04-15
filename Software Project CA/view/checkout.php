<?php
require_once '../model/databaseConnection.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';
require_once '../model/orderModel.php';

include "nav.php";
include 'header.php';

function getCartItems() {
    global $cartModel;
    return isset($_SESSION['userId']) ? $cartModel->getCartItems($_SESSION['userId']) : [];
}

$cartItems = getCartItems();

$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

if (isset($_POST['pay'])) {
    global $cartModel;

    $success = true;

    foreach ($cartItems as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $cart_id = $item['id'];
        $price = $item['price'];
        $user_id = $_SESSION['userId'];
        $order_date = date('Y-m-d');

        if (!addOrder($cart_id, $product_id, $price, $user_id, $quantity, $order_date)) {
            $success = false;
            break;
        }

        if (!$cartModel->updateProductQuantity($product_id, $quantity)) {
            $success = false;
            break;
        }
    }

    if ($success) {
        if ($cartModel->clearCart($_SESSION['userId'])) {
            echo "Orders placed successfully. Cart cleared successfully.";
        } else {
            echo "Failed to clear cart.";
        }
    } else {
        echo "Failed to place orders.";
    }

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        table th, .checkout-table td {
            text-align: center;
            color: #000;
            font-size: 20px;
        }
    </style>
</head>
<body class="checkout-body">
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
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>$<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-end">
    <p>Total: $<?php echo htmlspecialchars($totalPrice); ?></p>
    <a href="index.php?action=pay&totalPrice=<?php echo $totalPrice; ?>" class="btn btn-primary">Pay</a>
</div>
</div>

</body>
</html>
