<?php
require_once 'databaseConnection.php';
session_start();

global $db;
if (isset($_SESSION['userType']) && $_SESSION['userType'] === 'premium') {
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO tickets (user_id) VALUES (:user_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userId);
    $statement->execute();

    header("Location:../controller/index.php?action=purchaseTicket");
    exit();
} else {

   header("Location:../controller/index.php?action=error");

}
?>
