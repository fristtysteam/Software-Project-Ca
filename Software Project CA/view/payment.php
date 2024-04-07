<?php
require_once '../model/databaseConnection.php';
include "nav.php";
include 'header.php';
?>
<!--<div class="row  d-flex justify-content-center mt-5 mb-5">
    <div class="col-md-6 ">
        <div class="card ">
            <div class="card-header">
                <h4>Enter Payment Detail:</h4>
            </div>
            </div>

            <div class="card-body">-->
                <?php
                $totalPrice = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] : 0;

                $paymentIntegrationSnippet = '
    <div class="payment-integration">
        <script src=""></script>

        <div class="form-group">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="4111 1111 1111 1111" required>
        </div>

        <div class="form-group">
            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
        </div>

        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" required>
        </div>

        <div id="paymentProcessorButton">
            <button class="bg-info" type="button">Pay with [Payment Processor]</button>
        </div>
    </div>
      <!--</div>
        </div>
    </div>
</div>-->
'; ?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>-->
<div class="container">
    <div class="row  d-flex justify-content-center mt-5 mb-5">
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header">
                    <h4>Enter Payment Detail:</h4>
                </div>
            </div>

            <div class="card-body"
    <<h4>Checkout</h4>
    <p>Total to pay: $<?php echo number_format($totalPrice, 2); ?></p>

    <form id="paymentForm" action="processPayment.php" method="post" >
        <div class="form-group">
            <label for="nameOnCard">Name on Card</label>
            <input type="text" id="nameOnCard" name="nameOnCard" required>
        </div>
        <!-- The placeholders for payment fields will be displayed here -->
        <?php echo $paymentIntegrationSnippet; ?>

        <button  type="submit"  name=" processPayment" class="btn mt-3">Pay $<?php echo number_format($totalPrice, 2); ?></button>
    </form>
</div>
    </div>
</div>
<!--</div>
</div>-->
<!--</body>
</html>-->
