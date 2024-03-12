<?php

require_once '../model/databaseConnection.php';

class UserArtDao {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getUserArtworks() {
        $userArtworks = array();

        $query = "SELECT * FROM userart";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $userArtworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }

        return $userArtworks;
    }

    public function addUserArt($title, $artist, $description, $url, $countryOfOrigin, $username, $userId) {
        $sql = "INSERT INTO userart (title, artist, `desc`, countryOfOrigin, url, userId, username) VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$title, $artist, $description, $countryOfOrigin, $url, $userId, $username]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteUserArt($userArtId) {
        $query = "DELETE FROM userart WHERE art_id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$userArtId]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>
