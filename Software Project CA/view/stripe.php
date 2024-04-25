<?php
include "../view/nav2.php";
include '../view/header.php';

$currentLanguage = getLanguage();
$isLoggedIn = isset($_SESSION['username']);
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
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<section class="newform">
    <div id="payment-stripe" class="container">
        <h2>Payment details</h2>
        <div class="flex">
            <div class="list full">
                <section class="form-group">
                    <label for="cc-number" class="control-label">Credit Card Number </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="• • • •  • • • •  • • • •  • • • •" data-payment='cc-number' required>
                    </div>
                    <section>
            </div>
            <div class="list">
                <section class="form-group">
                    <label>Expiration Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="MM / YYYY" data-payment='cc-exp' required>
                    </div>
                </section>
            </div>
            <div class="list">
                <section class="form-group">
                    <label>Security Code</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="CVC" data-payment='cc-cvc' required>
                    </div>
                </section>
            </div>
            <div class="dynamic-content">
                Please ensure details you provide are correct.</br>
                Your Credit/Debit card will be charged with
                extra for purchases outside of Europe.
            </div>
        </div>
        <a href="thanks.php" class="nbtn rbtn" id="validate">Complete Purchase</a>

    </div>
</section>

</body>
</html>
