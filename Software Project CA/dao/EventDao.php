<?php

require_once '../model/databaseConnection.php';

class EventDao {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addEvent($title, $venue, $start, $end, $month) {
        $sql = "INSERT INTO event (title, venue, start_date, end_date, month) VALUES (:title, :venue, :start_date, :end_date, :month)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':venue', $venue);
            $stmt->bindParam(':start_date', $start);
            $stmt->bindParam(':end_date', $end);
            $stmt->bindParam(':month', $month);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteEvent($eventId) {
        $sql = "DELETE FROM event WHERE id = :eventId";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':eventId', $eventId);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getEvents() {
        $events = [];
        $sql = "SELECT * FROM event";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $events;
    }

    public function updateEvent($eventId, $title, $venue, $startDate, $endDate, $month) {
        $sql = "UPDATE event SET title = :title, venue = :venue, start_date = :start_date, end_date = :end_date, month = :month WHERE id = :eventId";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':eventId', $eventId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':venue', $venue);
            $stmt->bindParam(':start_date', $startDate);
            $stmt->bindParam(':end_date', $endDate);
            $stmt->bindParam(':month', $month);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getEventById($eventId) {
        $sql = "SELECT * FROM event WHERE id = :eventId";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':eventId', $eventId);
            $stmt->execute();
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            return $event;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>
