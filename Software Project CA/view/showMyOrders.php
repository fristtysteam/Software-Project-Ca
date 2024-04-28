<?php
require_once '../model/databaseConnection.php';
require_once '../model/orderModel.php';
require_once '../model/purchaseTicket.php';
require_once '../model/getProducts.php';

include "../view/nav2.php";
include '../view/header.php';

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];

    $orderitemlog_orders = getOrderItemLogsByUserId($userId);

    if (!empty($orderitemlog_orders)) {
        echo "<div class='container mt-5'>";
        echo "<h1 class='text-center'>View Your Orders</h1>";

        $grouped_orders = [];
        foreach ($orderitemlog_orders as $order) {
            $orderId = $order['orderId'];
            if (!isset($grouped_orders[$orderId])) {
                $grouped_orders[$orderId] = [];
            }
            $grouped_orders[$orderId][] = $order;
        }

        foreach ($grouped_orders as $orderId => $order_items) {
            echo "<div class='row'>";
            echo "<div class='col-md-12 mb-4'>";
            echo "<div class='card h-100'>";
            echo "<div class='card-body'>";

            echo "<h5 class='card-title'>Order ID: {$orderId}</h5>";

            echo "<div class='d-flex flex-wrap'>";
            foreach ($order_items as $order) {
                echo "<div class='mr-3 mb-3'>";
                echo "<img src='{$order['url']}' class='img-fluid' style='max-height: 150px;' alt='{$order['title']}'>";
                echo "<p class='card-text'>Product ID: {$order['product_Id']}</p>";
                echo "<p class='card-text'>Quantity: {$order['quantity']}</p>";
                echo "</div>";
            }
            echo "</div>";

            echo "<p class='card-text'>Order Date: {$order_items[0]['orderDate']}</p>";

            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='orderId' value='{$orderId}'>";
            echo "<button type='submit' name='cancelOrder' class='btn btn-danger'>Cancel Order</button>";
            echo "</form>";

            echo "</div></div></div>";
            echo "</div>";
        }

        echo "</div>"; // Close container
    }

    $tickets = getTicketsByUserId($userId);

    if (!empty($tickets)) {
        echo "<div class='container mt-5'>";
        echo "<h1 class='text-center mt-5'>View Your Tickets</h1>";
        echo "<div class='row mt-3'>";
        foreach ($tickets as $ticket) {
            echo "<div class='col-md-4 mb-4'>";
            echo "<div class='card h-100'>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>Title: {$ticket['event_title']}</p>";
            echo "<p class='card-text'>Venue: {$ticket['event_venue']}</p>";
            echo "<p class='card-text'>Purchase Date: {$ticket['purchase_date']}</p>";
            echo "</div></div></div>";
        }
        echo "</div></div>";
    }
} else {
    echo "<h2 class='text-center mt-5'>You must be logged in to view orders</h2>";
}

if (isset($_POST['cancelOrder'])) {
    $orderId = $_POST['orderId'];
    if (cancelOrder($orderId)) {
        echo "<div class='container mt-3'>";
        echo "<div class='alert alert-success' role='alert'>Order canceled successfully!</div>";
        echo "</div>";
    } else {
        echo "<div class='container mt-3'>";
        echo "<div class='alert alert-danger' role='alert'>Failed to cancel order. Please try again later.</div>";
        echo "</div>";
    }
}

// Include footer
include '../view/footer.php';
?>
