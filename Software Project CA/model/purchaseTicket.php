<?php
require_once 'databaseConnection.php';

function purchaseTicket($userId, $eventTitle, $eventVenue) {
    global $db;

    try {
        $query = "INSERT INTO tickets (user_id, event_title, event_venue) VALUES (:user_id, :event_title, :event_venue)";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $userId);
        $statement->bindValue(':event_title', $eventTitle);
        $statement->bindValue(':event_venue', $eventVenue);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function getTicketsByUserId($userId) {
    global $db;
    $tickets = [];

    try {
        $query = "SELECT * FROM tickets WHERE user_id = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $userId);
        $statement->execute();
        $tickets = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $tickets;
}
?>

