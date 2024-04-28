<?php
require_once '../model/databaseConnection.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';
require_once '../model/orderModel.php';
require_once '../model/getProducts.php';

include "nav2.php";
include 'header.php';

$pageTitle = "checkout";
$userId = $_SESSION['userId'];
$items = getCartItems($userId);
//$id = addOrder2($_SESSION['userId']);

$currentDate = date('Y-m-d');
/*
foreach ($items as $item) {
    //addOrderItem($id, $item['product_id'], $item['quantity'], $currentDate);
}*/
//$products = getOrdersByOrderId($id);



//$_SESSION["products"] = $products;
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
            <?php
           $totalPrice = 0;
           /*foreach ($products as $product):
              $details=  getProductById($product['product_Id']);
                        $singleP= $product['quantity'] * $details['price'];
              $totalPrice =  $totalPrice + $singleP;*/

            foreach ($items as $item):
                $details=  getProductById($item['product_id']);
                $singleP= $item['quantity'] * $details['price'];
                $totalPrice =  $totalPrice + $singleP;


                ?>
                <tr>
                    <td><?php echo  $details['name']; ?></td>
                    <td>€<?php echo $details['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>€<?php echo $singleP; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <p>Total: €<?php
//            $totalPrice = 0;
//            foreach ($products as $product) {
//                $totalPrice += $product['price'] * $product['quantity'];
//            }
            echo $totalPrice;
            ?></p>
        <!-- Form to simulate payment -->
         <a href="../controller/index.php?action=stripe"   name="pay" class="btn btn-primary">Pay</a>
        <!--<a href="../view/stripe.php"   name="pay" class="btn btn-primary">Pay</a> -->


    </div>
</div>
</body>
</html>
