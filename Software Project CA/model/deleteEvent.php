<?php
require_once 'databaseConnection.php';
global $db;

function deleteEvent($eventId, $db) {
    $query = "DELETE FROM event WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$eventId]);

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

if(isset($_GET['deleteEvent'])) {
    $eventId = $_GET['deleteEvent'];

    if(deleteEvent($eventId, $db)) {
        header("Location:../controller/index.php?action=adminViewEvents");
        exit();
    } else {
        echo "Failed to delete product.";
    }
}
?>