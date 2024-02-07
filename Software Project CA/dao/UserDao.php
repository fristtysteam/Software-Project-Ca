<?php
class UserDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username, $name, $email, $password, $dob, $userType) {
        $sql = "INSERT INTO user (username, name, email, password, `D.O.B`, userType) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $name, $email, $password, $dob, $userType]);
        // Handle errors if needed
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $username, $name, $email, $password, $dob, $userType) {
        $sql = "UPDATE user SET username = ?, name = ?, email = ?, password = ?, `D.O.B` = ?, userType = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $name, $email, $password, $dob, $userType, $id]);
        // Handle errors if needed
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        // Handle errors if needed
    }
}