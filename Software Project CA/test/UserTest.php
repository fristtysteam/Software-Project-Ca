<?php
require_once '../dao/User.php';
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void {
        $this->user = new User();
    }

    public function testCreateUser() {
        $this->user->username = "testuser";
        $this->user->name = "Test User";
        $this->user->email = "test@example.com";
        $this->user->password = "password";
        $this->user->DateOfBirth = "1990-01-01";
        $this->user->userType = "basic";

        $result = $this->user->create();
        $this->assertTrue($result);

        // Clean up
        $this->assertTrue($this->user->delete());
    }

    public function testReadUser() {
        // Assuming we have already inserted a user in the database for testing read functionality
        $this->user->id = 1;
        $stmt = $this->user->readOne();
        $this->assertInstanceOf(PDOStatement::class, $stmt);
    }

    public function testUpdateUser() {
        // Insert a user to update
        $this->user->username = "testuser";
        $this->user->name = "Test User";
        $this->user->email = "test@example.com";
        $this->user->password = "password";
        $this->user->DateOfBirth = "1990-01-01";
        $this->user->userType = "basic";
        $this->user->create();

        // Update user data
        $this->user->id = 1;
        $this->user->username = "updateduser";
        $this->user->name = "Updated User";
        $this->user->email = "updated@example.com";
        $this->user->password = "updatedpassword";
        $this->user->DateOfBirth = "1991-01-01";
        $this->user->userType = "admin";

        $result = $this->user->update();
        $this->assertTrue($result);

        // Clean up
        $this->assertTrue($this->user->delete());
    }

    public function testDeleteUser() {
        // Insert a user to delete
        $this->user->username = "testuser";
        $this->user->name = "Test User";
        $this->user->email = "test@example.com";
        $this->user->password = "password";
        $this->user->DateOfBirth = "1990-01-01";
        $this->user->userType = "basic";
        $this->user->create();

        // Delete the user
        $this->user->id = 1;
        $result = $this->user->delete();
        $this->assertTrue($result);
    }
}
