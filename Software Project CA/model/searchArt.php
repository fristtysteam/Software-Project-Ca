<?php
//require_once 'databaseConnection.php';
function getArtworksByTitle($title) {
    $artworks = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM art WHERE title LIKE :title";

            $stmt = $db->prepare($query);

            // Bind parameter
            $stmt->bindValue(':title', '%' . $title . '%', PDO::PARAM_STR);
            $artworks = $stmt->fetchAll();
            $stmt->execute();

            //$artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$artworks = $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }
    } else {
        //echo "Error: Unable to connect to the database.";
        //return array();
        return $artworks;
    }

    //return $artworks;
}