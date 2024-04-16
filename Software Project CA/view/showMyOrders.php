<?php
require_once '../model/databaseConnection.php';
require_once '../model/orderModel.php';
require_once '../model/purchaseTicket.php';


//include "../view/nav.php";
include "../view/nav2.php";
include '../view/header.php';

if (isset($_SESSION['userId'])) {
    $user_id = $_SESSION['userId'];
    $orders = getOrdersByUserId($user_id);
    $tickets = getTicketsByUserId($user_id);
} else {
    echo "<h2 class='text-center mt-5'>You must be logged in to make orders</h2>";
    $orders = [];
    $tickets = [];
}

?>

    <div class="container">
        <?php if (isset($_SESSION['userId'])) {

        echo"<h1 class='text-center mt-5'>View Your Orders</h1>";
        }?>
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
        <?php if (isset($_SESSION['userId'])) {

            echo"<h1 class='text-center mt-5'>View Your Tickets</h1>";
        }?>
        <div class="row mt-5">
            <?php foreach ($tickets as $ticket): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">Title: <?php echo $ticket['event_title']; ?></p>
                            <p class="card-text">Venue: <?php echo $ticket['event_venue']; ?></p>
                            <p class="card-text">Purchase Date: <?php echo $ticket['purchase_date']; ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



<?php
include '../view/footer.php';
?>