<?php

require_once 'databaseConnection.php';

function getEvents() {
    global $db;
    $events = [];
    try {
        $query = "SELECT * FROM event";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return $events;
}
function getEventDetails($eventId) {
    global $db;
    try {
        $query = "SELECT * FROM event WHERE id = :eventId";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':eventId', $eventId);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>