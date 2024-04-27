<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "../view/nav2.php";
include '../view/header.php';

$isLoggedIn = isset($_SESSION['userId']);

$totalPrice = isset($_GET['totalPrice']) ? $_GET['totalPrice'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Details</title>
    <link rel="stylesheet" href="../css/paymentDetailsStripe.css">
    <script src="../js/paymentDetailsStripe.js"></script>
</head>
<body>
<br>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<section class="newform">
    <div id="payment-stripe" class="container">
        <h2>Payment details</h2>
        <p>Total to pay: €<?php echo number_format($totalPrice, 2); ?></p>
        <form action="../controller/index.php?action=pay" method="post" id="payment-form">
            <div class="flex">
                <div class="list full">
                    <section class="form-group">
                        <label for="cc-number" class="control-label">Credit Card Number </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                            <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="4319 0000 1111 1234" data-payment='cc-number' required pattern="\d{4} \d{4} \d{4} \d{4}">
                        </div>
                    </section>
                </div>
                <div class="list">
                    <section class="form-group">
                        <label>Expiration Date</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="MM / YYYY" data-payment='cc-exp' required pattern="\d{2}\/\d{4}">
                        </div>
                    </section>
                </div>
                <div class="list">
                    <section class="form-group">
                        <label>Security Code</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="CVC" data-payment='cc-cvc' required pattern="\d{3}">
                        </div>
                    </section>
                </div>
                <div class="dynamic-content">
                    Please ensure details you provide are correct.</br>
                    Your Credit/Debit card will be charged with
                    extra for purchases outside of Europe.
                </div>
            </div>
            <button type="submit" name="pay" class="btn btn-primary">Pay</button>
        </form>
    </div>
</section>
<br/>
</body>
</html>
<?php include 'footer.php'; ?>
