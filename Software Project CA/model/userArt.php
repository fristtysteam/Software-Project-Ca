<?php
require_once 'databaseConnection.php';

function getUserArtworks() {
    $userArtworks = array();

    global $db;

    if ($db) {
        try {
            $query = "SELECT * FROM userart";

            $stmt = $db->prepare($query);

            $stmt->execute();

            $userArtworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }
    } else {
        echo "Error: Unable to connect to the database.";
        return array();
    }

    return $userArtworks;
}
function addUserArt($title, $artist, $description, $url, $countryOfOrigin, $username, $userId) {
    global $db;

    $sql = "INSERT INTO userart (title, artist, `desc`, countryOfOrigin, url, userId, username) VALUES (?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $artist);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $countryOfOrigin);
        $stmt->bindParam(5, $url);
        $stmt->bindParam(6, $userId);
        $stmt->bindParam(7, $username);

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
