<?php

require_once '../model/databaseConnection.php';

class PurchaseTicketsDao
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function purchaseTicket($userId, $eventTitle, $eventVenue)
    {
        try {
            $query = "INSERT INTO tickets (user_id, event_title, event_venue) VALUES (:user_id, :event_title, :event_venue)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':user_id', $userId);
            $statement->bindValue(':event_title', $eventTitle);
            $statement->bindValue(':event_venue', $eventVenue);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getTicketsByUserId($userId)
    {
        $tickets = [];

        try {
            $query = "SELECT * FROM tickets WHERE user_id = :user_id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':user_id', $userId);
            $statement->execute();
            $tickets = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $tickets;
    }
}

?>
