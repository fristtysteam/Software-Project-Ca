<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "nav.php";
include 'header.php';
global $cartModel;

function getCartItems() {
    global $cartModel;

    return isset($_SESSION['userId']) ? $cartModel->getCartItems($_SESSION['userId']) : [];
}

$cartItems = getCartItems();

if (isset($_POST['remove_from_cart'])) {
    $cart_id = $_POST['cart_id'];
    $removed = $cartModel->removeFromCart($cart_id);

    if ($removed) {
        echo "<script>alert('Item removed from cart successfully.');</script>";
        echo "<script>location.reload();</script>";
        exit();
    } else {
        echo "<script>alert('Failed to remove item from cart.');</script>";
    }
}
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
    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['price'] * $item['quantity']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" name="remove_from_cart" class="btn" onclick="return confirm('Are you sure you want to remove this item?');">Remove</button> <!-- Submit button to remove item -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?action=checkout" class="btn">Proceed to Checkout</a>
    <?php endif; ?>
</div>
</body>
</html>
