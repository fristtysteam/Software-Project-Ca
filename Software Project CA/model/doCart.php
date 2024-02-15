<?php
require_once 'databaseConnection.php';

function getCartItems() {
    // Initialize an empty array to store cart items
    $cartItems = array();

    $connection = connectToDatabase();

    if ($connection) {
        // SQL query to select cart items from the database
        $query = "SELECT * FROM cart";

        // Execute the query
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch each row from the result set and add it to the cartItems array
            while ($row = mysqli_fetch_assoc($result)) {
                $cartItems[] = $row;
            }
        } else {
            // If the query fails, display an error message
            echo "Error: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    } else {
        // If the connection fails, display an error message
        echo "Error: Unable to connect to the database.";
    }

    // Return the array of cart items
    return $cartItems;
}

// Example usage:
$cartItems = getCartItems();
print_r($cartItems); // You can use this to check if the function works as expected
?>
