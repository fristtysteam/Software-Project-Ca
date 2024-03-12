<?php
require_once 'databaseConnection.php';

function changeUserRole($user_id, $user_type) {
    global $db;

    if ($db) {
        try {
            $query = "UPDATE users SET userType = :user_type WHERE id = :user_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':user_type', $user_type);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return false;
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return false;
    }
}
?>