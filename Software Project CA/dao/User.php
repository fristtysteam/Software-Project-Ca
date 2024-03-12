<?php



require_once '../dao/Dao.php';

class User
{
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $name;
    public $email;
    public $password;
    public $DateOfBirth;
    public $userType;

    public function __construct()
    {
        $database = new Dao();
        $this->conn = $database->getConnection();
    }

    // Create user
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (username, name, email, password, DateOfBirth, userType) VALUES (:username, :name, :email, :password, :DateOfBirth, :userType)";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->name = htmlspecialchars(strip_tags($this->name));
         $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->DateOfBirth = htmlspecialchars(strip_tags($this->DateOfBirth));
        $this->userType = htmlspecialchars(strip_tags($this->userType));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":DateOfBirth", $this->DateOfBirth);
        $stmt->bindParam(":userType", $this->userType);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all users
    function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read single user by id
    function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }

    // Update user
    function update()
    {
        $query = "UPDATE " . $this->table_name . " SET username = :username, name = :name, email = :email, password = :password, DateOfBirth = :DateOfBirth, userType = :userType WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->DateOfBirth = htmlspecialchars(strip_tags($this->DateOfBirth));
        $this->userType = htmlspecialchars(strip_tags($this->userType));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":DateOfBirth", $this->DateOfBirth);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete user
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

