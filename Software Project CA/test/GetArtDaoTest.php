<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/getArtDao.php';

class GetArtDaoTest extends TestCase {
    private $dao;
    private $pdo;

    protected function setUp(): void {
        // Establish a PDO connection to an in-memory SQLite database for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the necessary table for testing
        $this->pdo->exec("
            CREATE TABLE art (
                id INTEGER PRIMARY KEY,
                title VARCHAR(255),
                artist VARCHAR(255),
                description TEXT
            )
        ");

        // Initialize the DAO with the PDO instance
        $this->dao = new GetArtDao($this->pdo);
    }

    public function testGetArtworks() {
        // Insert test data into the table
        $this->pdo->exec("INSERT INTO art (title, artist, description) 
                          VALUES ('Artwork 1', 'Artist 1', 'Description 1')");
        $this->pdo->exec("INSERT INTO art (title, artist, description) 
                          VALUES ('Artwork 2', 'Artist 2', 'Description 2')");

        // Call the method being tested
        $artworks = $this->dao->getArtworks();

        // Assertions
        $this->assertCount(2, $artworks);
        $this->assertEquals('Artwork 1', $artworks[0]['title']);
        $this->assertEquals('Artist 1', $artworks[0]['artist']);
        $this->assertEquals('Description 1', $artworks[0]['description']);
        $this->assertEquals('Artwork 2', $artworks[1]['title']);
        $this->assertEquals('Artist 2', $artworks[1]['artist']);
        $this->assertEquals('Description 2', $artworks[1]['description']);
    }
}

?>

