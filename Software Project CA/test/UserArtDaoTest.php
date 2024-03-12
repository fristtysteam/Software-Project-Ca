<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/userArtDao.php';

class UserArtDaoTest extends TestCase {
    private $dao;
    private $pdo;

    protected function setUp(): void {
        // Establish a PDO connection to an in-memory SQLite database for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the necessary table for testing
        $this->pdo->exec("
            CREATE TABLE userart (
                art_id INTEGER PRIMARY KEY,
                title VARCHAR(255),
                artist VARCHAR(255),
                `desc` TEXT,
                countryOfOrigin VARCHAR(255),
                url VARCHAR(255),
                userId INTEGER,
                username VARCHAR(255)
            )
        ");

        // Initialize the DAO with the PDO instance
        $this->dao = new UserArtDao($this->pdo);
    }

    public function testGetUserArtworks() {
        // Insert test data into the table
        $this->pdo->exec("INSERT INTO userart (title, artist, `desc`, countryOfOrigin, url, userId, username) 
                          VALUES ('Artwork 1', 'Artist 1', 'Description 1', 'Country 1', 'url1', 1, 'user1')");
        $this->pdo->exec("INSERT INTO userart (title, artist, `desc`, countryOfOrigin, url, userId, username) 
                          VALUES ('Artwork 2', 'Artist 2', 'Description 2', 'Country 2', 'url2', 2, 'user2')");

        // Call the method being tested
        $userArtworks = $this->dao->getUserArtworks();

        // Assertions
        $this->assertCount(2, $userArtworks);
        $this->assertEquals('Artwork 1', $userArtworks[0]['title']);
        $this->assertEquals('Artist 1', $userArtworks[0]['artist']);
        $this->assertEquals('Description 1', $userArtworks[0]['desc']);
        $this->assertEquals('Country 1', $userArtworks[0]['countryOfOrigin']);
        $this->assertEquals('url1', $userArtworks[0]['url']);
        $this->assertEquals(1, $userArtworks[0]['userId']);
        $this->assertEquals('user1', $userArtworks[0]['username']);
    }

    public function testAddUserArt() {
        // Call the method being tested
        $result = $this->dao->addUserArt('New Artwork', 'New Artist', 'New Description', 'New Country', 'new-url', 3, 'newuser');

        // Assertion
        $this->assertTrue($result);

        // Check if the data was inserted correctly
        $stmt = $this->pdo->query("SELECT * FROM userart WHERE title = 'New Artwork'");
        $this->assertEquals(1, $stmt->rowCount());
    }

    public function testDeleteUserArt() {
        // Insert a record for deletion
        $this->pdo->exec("INSERT INTO userart (title, artist, `desc`, countryOfOrigin, url, userId, username) 
                          VALUES ('Artwork 3', 'Artist 3', 'Description 3', 'Country 3', 'url3', 3, 'user3')");

        // Get the ID of the inserted record
        $stmt = $this->pdo->query("SELECT art_id FROM userart WHERE title = 'Artwork 3'");
        $artId = $stmt->fetchColumn();

        // Call the method being tested
        $result = $this->dao->deleteUserArt($artId);

        // Assertion
        $this->assertTrue($result);

        // Check if the record was deleted
        $stmt = $this->pdo->query("SELECT * FROM userart WHERE title = 'Artwork 3'");
        $this->assertEquals(0, $stmt->rowCount());
    }
}

?>

