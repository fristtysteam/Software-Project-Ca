<?php
require_once 'databaseConnection.php';

function updateEvent($eventId, $title, $venue, $startDate, $endDate, $month) {
    global $db;

    $sql = "UPDATE event SET title = :title, venue = :venue, start_date = :start_date, end_date = :end_date, month = :month WHERE id = :eventId";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':eventId', $eventId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':venue', $venue);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->bindParam(':month', $month);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getEventById($eventId)
{
    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM event WHERE id = :id";

            $stmt = $db->prepare($query);

            $stmt->bindParam(':id', $eventId);

            $stmt->execute();

            $event = $stmt->fetch(PDO::FETCH_ASSOC);

            return $event;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return null;
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return null;
    }
}
?>
