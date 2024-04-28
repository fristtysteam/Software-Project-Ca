<?php

require_once '../model/getProducts.php';
require_once '../model/language.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';

include "../view/nav2.php";
include '../view/header.php';

$currentLanguage = getLanguage();
$isLoggedIn = isset($_SESSION['username']);

//function getCartItems() {
//   return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
//}

//$cartItems = getCartItems();
?>
<link href="../css/harvard.css" rel="stylesheet" type="text/css" />

<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Harvard Art Museums API</title>

</head>
<body>
<div class="container">
    <h1>Harvard Art Museums</h1>
    <?php
    if (isset($api_response)) {
        $response_array = json_decode($api_response, true);

        if ($response_array !== null && isset($response_array['records'])) {
            foreach ($response_array['records'] as $record) {
                echo "<div class='artwork'>";
                echo "<h2>Title: " . $record['title'] . "</h2>";
                echo "<p><strong>Artist:</strong> " . $record['people'][0]['displayname'] . "</p>";
                echo "<p><strong>Date:</strong> " . $record['dated'] . "</p>";
                echo "<p><strong>Medium:</strong> " . $record['technique'] . "</p>";
                echo "<p><strong>Dimensions:</strong> " . $record['dimensions'] . "</p>";
                echo "<p><strong>Department:</strong> " . $record['department'] . "</p>";
                echo "<p><a href='" . $record['url'] . "' target='_blank'>View Artwork</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p>Error: Unable to parse response or no records found.</p>";
        }
    } else {
        echo "No response from the API.";
    }
    ?>
</div>
</body>
</html>