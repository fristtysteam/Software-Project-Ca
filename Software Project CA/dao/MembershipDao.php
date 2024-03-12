<?php
require_once '../model/databaseConnection.php';

class MembershipDao {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function changeUserRole($user_id, $user_type) {
        if ($this->db) {
            try {
                $query = "UPDATE users SET userType = :user_type WHERE id = :user_id";
                $stmt = $this->db->prepare($query);
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
}
?>
