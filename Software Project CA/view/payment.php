<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "nav.php";
include 'header.php';

$totalPrice = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] : 0;

?>

<div class="container">
    <div class="row d-flex justify-content-center mt-5 mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Enter Payment Detail:</h4>
                </div>
                <div class="card-body">
                    <h4>Checkout</h4>
                    <p>Total to pay: $<?php echo number_format($totalPrice, 2); ?></p>
                    <form id="paymentForm" action="" method="post">
                        <div class="form-group">
                            <label for="nameOnCard">Name on Card</label>
                            <input type="text" id="nameOnCard" name="nameOnCard" required>
                        </div>
                        <div class="payment-integration">
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
                        <button type="submit" id="payButton" class="btn mt-3">Pay $<?php echo number_format($totalPrice, 2); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var cardNumber = document.getElementById('cardNumber').value;
        var expiryDate = document.getElementById('expiryDate').value;
        var cvv = document.getElementById('cvv').value;
        var nameOnCard = document.getElementById('nameOnCard').value;


        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'processPayment.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    window.location.href = '../view/showMyOrders.php';
                } else {
                    console.error('Error processing payment: ' + xhr.responseText);
                }
            }
        };
        xhr.send('nameOnCard=' + encodeURIComponent(nameOnCard));
    });
</script>
