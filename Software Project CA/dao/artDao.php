<?php
class artDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    /**
     * Create a new art entry in the database.
     *
     * @param string $title Art title
     * @param float $price Art price
     * @param string $artist Artist name
     * @param string $desc Art description
     * @param string $countryOfOrigin Country of origin
     * @throws Exception If there is an error creating the art entry
     * @return void
     */
    public function createArt($title, $price, $artist, $desc, $countryOfOrigin) {
        try {
            $sql = "INSERT INTO art (title, price, artist, `desc`, countryOfOrigin) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$title, $price, $artist, $desc, $countryOfOrigin]);
        } catch (PDOException $e) {
            throw new Exception("Error creating art: " . $e->getMessage());
        }
    }

    /**
     * Retrieve art information from the database by its ID.
     *
     * @param int $id Art ID
     * @return array|null Art information as an associative array, or null if not found
     * @throws Exception If there is an error retrieving the art information
     */
    public function getArtById($id) {
        try {
            $sql = "SELECT * FROM art WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error retrieving art: " . $e->getMessage());
        }
    }
    /**
     * Update existing art information in the database.
     *
     * @param int $id Art ID
     * @param string $title Art title
     * @param float $price Art price
     * @param string $artist Artist name
     * @param string $desc Art description
     * @param string $countryOfOrigin Country of origin
     * @throws Exception If there is an error updating the art information
     * @return void
     */
    public function updateArt($id, $title, $price, $artist, $desc, $countryOfOrigin) {
        try {
            $sql = "UPDATE art SET title = ?, price = ?, artist = ?, `desc` = ?, countryOfOrigin = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$title, $price, $artist, $desc, $countryOfOrigin, $id]);
        } catch (PDOException $e) {
            throw new Exception("Error updating art: " . $e->getMessage());
        }
    }

    /**
     * Delete an art entry from the database by its ID.
     *
     * @param int $id Art ID
     * @throws Exception If there is an error deleting the art entry
     * @return void
     */

    public function deleteArt($id) {
        try {
            $sql = "DELETE FROM art WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Error deleting art: " . $e->getMessage());
        }
    }
}
