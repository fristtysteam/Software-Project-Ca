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
?>