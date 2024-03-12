<?php

require_once '../model/databaseConnection.php';

class UserDBDao {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function preRegistrationCheck($fName, $sName, $email, $password, $password2, $dob) {
        if (empty($fName) || empty($sName) || empty($email) || empty($password) || empty($password2) || empty($dob)) {
            return "Please ensure enter all details";
        } else if ($password !== $password2) {
            return "Passwords must match";
        }
        return true;
    }

    public function addUser($fName, $sName, $email, $password, $dob) {
        $username = $fName . ' ' . $sName;
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (username, name, email, password, DateOfBirth) VALUES (:username, :name, :email, :password, :birthday)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":name", $sName);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $hashedPassword);
        $statement->bindValue(":birthday", $dob);
        $statement->execute();
        return true;
    }

    public function checkUser($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }
        session_start();
        $_SESSION['userid'] = $user['id'];
        $_SESSION['userType'] = $user['userType'];
        return true;
    }

    public function checkNewUser($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public function preLoginCheck($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $statement = $this->db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count != 1) {
            return false;
        }
        session_start();
        $user = $statement->fetch();
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userType'] = $user['userType'];
        return $user['userType'];
    }
}

?>
