<?php
class UserDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Create a new user entry in the database.
     *
     * @param string $username Username
     * @param string $name User's name
     * @param string $email User's email address
     * @param string $password User's password
     * @param string $dob User's date of birth
     * @param string $userType User's type (admin, basic, artist, premium, guest)
     * @throws Exception If there is an error creating the user entry
     * @return void
     */
    public function createUser($username, $name, $email, $password, $dob, $userType) {
        try {
            $sql = "INSERT INTO user (username, name, email, password, `D.O.B`, userType) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$username, $name, $email, $password, $dob, $userType]);
        } catch (PDOException $e) {
            throw new Exception("Error creating user: " . $e->getMessage());
        }
    }

/**
* Retrieve user information from the database by its ID.
*
* @param int $id User ID
* @return array|null User information as an associative array, or null if not found
* @throws Exception If there is an error retrieving the user information
*/
    public function getUserById($id) {
        try {
            $sql = "SELECT * FROM user WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error retrieving user: " . $e->getMessage());
        }
    }

    /**
     * Update existing user information in the database.
     *
     * @param int $id User ID
     * @param string $username Username
     * @param string $name User's name
     * @param string $email User's email address
     * @param string $password User's password
     * @param string $dob User's date of birth
     * @param string $userType User's type (admin, basic, artist, premium, guest)
     * @throws Exception If there is an error updating the user information
     * @return void
     */
    public function updateUser($id, $username, $name, $email, $password, $dob, $userType) {
        try {
            $sql = "UPDATE user SET username = ?, name = ?, email = ?, password = ?, `D.O.B` = ?, userType = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$username, $name, $email, $password, $dob, $userType, $id]);
        } catch (PDOException $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    /**
     * Delete a user entry from the database by its ID.
     *
     * @param int $id User ID
     * @throws Exception If there is an error deleting the user entry
     * @return void
     */
    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM user WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }
}