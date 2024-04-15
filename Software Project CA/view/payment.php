<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "nav.php";
include 'header.php';

$totalPrice = isset($_GET['totalPrice']) ? $_GET['totalPrice'] : 0;

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
                    <form id="paymentForm" action="processPayment.php" method="post">
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
                        </div>
                        <button type="submit" id="payButton" class="btn mt-3">Pay $<?php echo number_format($totalPrice, 2); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
