<?php
require_once 'databaseConnection.php';
require_once 'getProducts.php';


function addUserArt($title, $description, $countryOfOrigin, $url, $userId, $username) {
    global $db;

    $sql = "INSERT INTO userArt (title, artist, `desc`, countryOfOrigin, url, userId, username) VALUES (:title, :artist, :description, :countryOfOrigin, :url, :userId, :username)";

    try {
        $stmt = $db->prepare($sql);

        $artist = $username;

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':countryOfOrigin', $countryOfOrigin);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':username', $username);

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
