<?php


use PHPUnit\Framework\TestCase;

class UserDAOTest extends TestCase
{
    private $pdo;
    private $userDao;

    protected function setUp(): void {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the user table for testing
        $this->pdo->exec("
            CREATE TABLE user (
                id INTEGER PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                password VARCHAR(15) NOT NULL,
                `D.O.B` DATE NOT NULL,
                userType ENUM('admin','basic','artist','premium','guest') NOT NULL
            )
        ");

        $this->userDao = new UserDAO($this->pdo);
    }

    protected function tearDown(): void {
        // Clean up after each test
        $this->pdo->exec("DROP TABLE user");
    }

    public function testCreateUser(): void {
        $this->userDao->createUser('test_user', 'Test User', 'test@example.com', 'password123', '1990-01-01', 'basic');

        $user = $this->userDao->getUserById(1);
        $this->assertEquals('test_user', $user['username']);
        $this->assertEquals('Test User', $user['name']);
        $this->assertEquals('test@example.com', $user['email']);
        $this->assertEquals('password123', $user['password']);
        $this->assertEquals('1990-01-01', $user['D.O.B']);
        $this->assertEquals('basic', $user['userType']);
    }

    public function testUpdateUser(): void {
        // First, create a user
        $this->userDao->createUser('test_user', 'Test User', 'test@example.com', 'password123', '1990-01-01', 'basic');

        // Update the user's information
        $this->userDao->updateUser(1, 'updated_user', 'Updated User', 'updated@example.com', 'newpassword', '1995-05-05', 'premium');

        $user = $this->userDao->getUserById(1);
        $this->assertEquals('updated_user', $user['username']);
        $this->assertEquals('Updated User', $user['name']);
        $this->assertEquals('updated@example.com', $user['email']);
        $this->assertEquals('newpassword', $user['password']);
        $this->assertEquals('1995-05-05', $user['D.O.B']);
        $this->assertEquals('premium', $user['userType']);
    }

    public function testDeleteUser(): void {
        // First, create a user
        $this->userDao->createUser('test_user', 'Test User', 'test@example.com', 'password123', '1990-01-01', 'basic');

        // Delete the user
        $this->userDao->deleteUser(1);

        // Verify that the user is deleted
        $user = $this->userDao->getUserById(1);
        $this->assertNull($user);
    }
}
