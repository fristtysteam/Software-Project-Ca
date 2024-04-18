<?php
function addToOrders($name, $email, $phone, $address, $aircode){

    global $db;

    $query = "INSERT INTO order2 (username, email, phone, address, aircode) VALUES (:username, :email, :phone, :address, :aircode)";
    $statement = $db->prepare($query);

    $statement->bindValue(":username", $name);
    $statement->bindValue(":email", $email); // Assuming name should be the last name
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":address", $address);
    $statement->bindValue(":aircode", $aircode);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // Redirect to an error page passing the error message
        header("Location: ../View/error.php?msg=" . $ex->getMessage());
        exit();
    }

    $statement->closeCursor();
    return true;

}
function getAllOrders() {

    /***********************************************************
     * Function to get all orders record from DB                *
     * Parameters: None                                         *
     * Returns: An array of orders records                      *
     ***********************************************************/

    global $db;
    //$query = "SELECT * FROM order2 ORDER BY order_id";
    $query = "SELECT * FROM order2 ";
    $statement =$db->prepare($query);

    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    // Retrieve user record from db
    $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;

}
