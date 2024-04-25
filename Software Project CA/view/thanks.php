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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="../css/thanks.css">
</head>
<body>
<div class="thank-you-container">
    <div class="message-box">
        <h1>Thank You for Your Purchase!</h1>
        <p>We appreciate your business. Your order has been successfully processed.</p>
    </div>
</div>
</body>
</html>
