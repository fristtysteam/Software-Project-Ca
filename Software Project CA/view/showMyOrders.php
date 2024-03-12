<?php
require_once '../model/databaseConnection.php';
require_once '../model/orderModel.php';

include "../view/nav.php";
include '../view/header.php';

if (isset($_SESSION['userId'])) {
    $user_id = $_SESSION['userId'];
    $orders = getOrdersByUserId($user_id);
} else {
    echo "Error: User ID is not set.";
    exit();
}
?>

    <div class="container">
        <h1 class="text-center mt-5">View Your Orders</h1>
        <div class="row mt-5">
            <?php foreach ($orders as $order): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Order ID: <?php echo $order['cart_id']; ?></h5>
                            <p class="card-text">Product ID: <?php echo $order['product_id']; ?></p>
                            <p class="card-text">Price: <?php echo $order['price']; ?></p>
                            <p class="card-text">Quantity: <?php echo $order['quantity']; ?></p>
                            <p class="card-text">Order Date: <?php echo $order['order_date']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
include '../view/footer.php';
?>