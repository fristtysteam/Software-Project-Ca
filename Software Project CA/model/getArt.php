<?php
require_once '../model/databaseConnection.php';

function getArtworks($artworks) {
    $artworks = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM art";

            $stmt = $db->prepare($query);

            $stmt->execute();

            $artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return array();
    }

    return $artworks;
}
