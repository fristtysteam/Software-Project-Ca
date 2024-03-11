<?php
require_once 'databaseConnection.php';
global $db;
function deleteUserArt($userArtId, $db) {
    $query = "DELETE FROM userart WHERE art_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$userArtId]);

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

if(isset($_GET['deleteUserArt'])) {
    $userArtId = $_GET['deleteUserArt'];

    if(deleteUserArt($userArtId, $db)) {
        header("Location:../controller/index.php?action=artistArtWork");
        exit();
    } else {
        echo "Failed to delete artwork.";
    }
}
?>