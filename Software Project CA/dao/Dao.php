

<?php

class Dao {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'gallery';
    private $dsn;
    public $db;

    public function __construct() {
        // Set DSN
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            // Create a PDO instance
            $this->db = new PDO($this->dsn, $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}

// Usage
// $dao = new DAO();
// $db = $dao->db;
?>

