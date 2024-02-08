<?php


use PHPUnit\Framework\TestCase;

class artDAOTest extends TestCase
{
    private $pdo;
    private $artDao;

    protected function setUp(): void {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the art table for testing
        $this->pdo->exec("
            CREATE TABLE art (
                id INTEGER PRIMARY KEY,
                title VARCHAR(50) NOT NULL,
                price DOUBLE NOT NULL,
                artist VARCHAR(20) NOT NULL,
                `desc` VARCHAR(500) NOT NULL,
                countryOfOrigin VARCHAR(15) NOT NULL
            )
        ");

        $this->artDao = new artDAO($this->pdo);
    }

    protected function tearDown(): void {
        // Clean up after each test
        $this->pdo->exec("DROP TABLE art");
    }

    public function testCreateArt(): void {
        $this->artDao->createArt('Mona Lisa', 1000.00, 'Leonardo da Vinci', 'Famous portrait', 'Italy');

        $art = $this->artDao->getArtById(1);
        $this->assertEquals('Mona Lisa', $art['title']);
        $this->assertEquals(1000.00, $art['price']);
        $this->assertEquals('Leonardo da Vinci', $art['artist']);
        $this->assertEquals('Famous portrait', $art['desc']);
        $this->assertEquals('Italy', $art['countryOfOrigin']);
    }

    public function testUpdateArt(): void {
        // First, create an art entry
        $this->artDao->createArt('Mona Lisa', 1000.00, 'Leonardo da Vinci', 'Famous portrait', 'Italy');

        // Update the art entry
        $this->artDao->updateArt(1, 'Updated Title', 1500.00, 'New Artist', 'Updated description', 'France');

        $art = $this->artDao->getArtById(1);
        $this->assertEquals('Updated Title', $art['title']);
        $this->assertEquals(1500.00, $art['price']);
        $this->assertEquals('New Artist', $art['artist']);
        $this->assertEquals('Updated description', $art['desc']);
        $this->assertEquals('France', $art['countryOfOrigin']);
    }

    public function testDeleteArt(): void {
        // First, create an art entry
        $this->artDao->createArt('Mona Lisa', 1000.00, 'Leonardo da Vinci', 'Famous portrait', 'Italy');

        // Delete the art entry
        $this->artDao->deleteArt(1);

        // Verify that the art entry is deleted
        $art = $this->artDao->getArtById(1);
        $this->assertNull($art);
    }
}
