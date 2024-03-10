<?php
require_once 'databaseConnection.php';
require_once 'getEvents.php';


function addProduct($title, $venue, $start, $end, $month) {
    global $db;

    $sql = "INSERT INTO event (title, venue, start_date, end_date, month) VALUES (:title, :venue, :start_date, :end_date, :month)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':venue', $venue);
        $stmt->bindParam(':start_date', $start);
        $stmt->bindParam(':end_date', $end);
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
?>
