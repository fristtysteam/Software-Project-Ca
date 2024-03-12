<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/UserDBDao.php';

class UserDBDaoTest extends TestCase {
    private $dao;
    private $pdo;

    protected function setUp(): void {
        // Establish a PDO connection to an in-memory SQLite database for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the users table
        $this->pdo->exec("
            CREATE TABLE users (
                id INTEGER PRIMARY KEY,
                username VARCHAR(255),
                name VARCHAR(255),
                email VARCHAR(255),
                password VARCHAR(255),
                DateOfBirth DATE
            )
        ");

        // Initialize the DAO with the PDO instance
        $this->dao = new UserDBDao($this->pdo);
    }

    public function testPreRegistrationCheck() {
        $this->assertEquals("Please ensure enter all details", $this->dao->preRegistrationCheck('', '', '', '', '', ''));
        $this->assertEquals("Passwords must match", $this->dao->preRegistrationCheck('John', 'Doe', 'john@example.com', 'password', 'password2', '1990-01-01'));
        $this->assertTrue($this->dao->preRegistrationCheck('John', 'Doe', 'john@example.com', 'password', 'password', '1990-01-01'));
    }

    public function testAddUser() {
        $this->dao->addUser('John', 'Doe', 'john@example.com', 'password', '1990-01-01');

        $stmt = $this->pdo->query("SELECT COUNT(*) FROM users");
        $this->assertEquals(1, $stmt->fetchColumn());
    }

    public function testCheckUser() {
        $this->assertFalse($this->dao->checkUser('nonexistent@example.com', 'password'));

        // Add a user and check if it's found
        $this->dao->addUser('John', 'Doe', 'john@example.com', 'password', '1990-01-01');
        $this->assertTrue($this->dao->checkUser('john@example.com', 'password'));
    }

    public function testCheckNewUser() {
        $this->assertFalse($this->dao->checkNewUser('john@example.com', 'password'));

        // Add a user and check if it's found
        $this->dao->addUser('John', 'Doe', 'john@example.com', 'password', '1990-01-01');
        $this->assertTrue($this->dao->checkNewUser('john@example.com', 'password'));
    }

    public function testPreLoginCheck() {
        $this->assertFalse($this->dao->preLoginCheck('nonexistent@example.com', 'password'));

        // Add a user and check if it's found
        $this->dao->addUser('John', 'Doe', 'john@example.com', 'password', '1990-01-01');
        $this->assertEquals('userTypeValue', $this->dao->preLoginCheck('john@example.com', 'password'));
    }

}

?>

