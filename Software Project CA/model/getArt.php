<?php
require_once 'databaseConnection.php';

function getArtworks() {
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
function addArt($title, $artist, $desc, $url, $countryOfOrigin)
{
    global $db;

    $sql = "INSERT INTO art (title, artist, `desc`, url, countryOfOrigin) VALUES (:title, :artist, :desc, :url, :countryOfOrigin)";

    try {
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':countryOfOrigin', $countryOfOrigin);


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
function deleteArt($artId, $db) {
    $query = "DELETE FROM art WHERE product_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$artId]);

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

if(isset($_GET['deleteArt'])) {
    $artId = $_GET['deleteArt'];

    if(deleteArt($artId, $db)) {
        header("Location:../controller/index.php?action=adminViewArt");
        exit();
    } else {
        echo "Failed to delete art.";
    }
}
