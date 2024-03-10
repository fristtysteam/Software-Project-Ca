<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "nav.php";
include 'header.php';

// Function to retrieve cart items
function getCartItems() {
    global $cartModel;
    return isset($_SESSION['userId']) ? $cartModel->getCartItems($_SESSION['userId']) : [];
}

// Get cart items
$cartItems = getCartItems();

// Check if remove button is clicked
if (isset($_POST['remove_from_cart'])) {
    $cart_id = $_POST['cart_id']; // Get cart_id from form submission
    $removed = $cartModel->removeFromCart($cart_id); // Call removeFromCart function

    // Provide feedback to the user
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
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th> <!-- New column for the Remove button -->
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
                            <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>"> <!-- Assuming the cart item has an ID -->
                            <button type="submit" name="remove_from_cart" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item?');">Remove</button> <!-- Submit button to remove item -->
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="#" class="btn btn-primary checkout-btn">Proceed to Checkout</a>
</div>
</body>
</html>
