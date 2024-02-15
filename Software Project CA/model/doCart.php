<?php
require_once 'databaseConnection.php';

function getCartItems() {
    // Initialize an empty array to store cart items
    $cartItems = array();


        $query = "SELECT * FROM cart";

        $result = mysqli_query( query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cartItems[] = $row;
            }
        }


   ;


    return $cartItems;
}

// Example usage:
$cartItems = getCartItems();
print_r($cartItems); // You can use this to check if the function works as expected
?>
