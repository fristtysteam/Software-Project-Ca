<?php

require_once '../model/databaseConnection.php';

class GetArtDao {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getArtworks() {
        $artworks = array();

        $query = "SELECT * FROM art";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return array();
        }

        return $artworks;
    }
}

?>
