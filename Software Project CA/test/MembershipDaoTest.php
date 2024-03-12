<?php
require_once '../dao/MembershipDao.php';

use PHPUnit\Framework\TestCase;

class MembershipDaoTest extends TestCase {
    protected $pdo;
    protected $membershipDao;

    protected function setUp(): void {
        // Establish a database connection for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the users table for testing
        $this->pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, userType VARCHAR(50))');

        // Instantiate the MembershipDao class with the database connection
        $this->membershipDao = new MembershipDao($this->pdo);
    }

    protected function tearDown(): void {
        // Clean up the database after each test
        $this->pdo->exec('DROP TABLE users');
    }

    public function testChangeUserRole(): void {
        // Insert a test user into the database
        $this->pdo->exec("INSERT INTO users (id, userType) VALUES (1, 'regular')");

        // Call the changeUserRole method with the test user ID and a new user type
        $result = $this->membershipDao->changeUserRole(1, 'admin');

        // Check if the method returns true (indicating success)
        $this->assertTrue($result);

        // Check if the user type was updated correctly in the database
        $stmt = $this->pdo->query("SELECT userType FROM users WHERE id = 1");
        $userType = $stmt->fetchColumn();
        $this->assertEquals('admin', $userType);
    }
}
?>


