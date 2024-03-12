<?php

require_once '../dao/PurchaseTicketsDao.php';

use PHPUnit\Framework\TestCase;

class PurchaseTicketsDaoTest extends TestCase
{
    protected $pdo;
    protected $purchaseTicketsDao;

    protected function setUp(): void
    {
        // Mock the database connection
        $this->pdo = $this->createMock(PDO::class);

        // Initialize PurchaseTicketsDao with mocked PDO
        $this->purchaseTicketsDao = new PurchaseTicketsDao($this->pdo);
    }

    public function testPurchaseTicket()
    {
        // Prepare the expected SQL query
        $expectedQuery = "INSERT INTO tickets (user_id, event_title, event_venue) VALUES (?, ?, ?)";

        // Mock the PDOStatement and its execute method
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
            ->method('execute')
            ->willReturn(true); // Simulate successful execution

        // Mock the PDO prepare method to return the mocked PDOStatement
        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo($expectedQuery))
            ->willReturn($stmtMock);

        // Call the purchaseTicket method
        $result = $this->purchaseTicketsDao->purchaseTicket(123, 'Event Title', 'Event Venue');

        // Assert that the method returns true (successful purchase)
        $this->assertTrue($result);
    }

    public function testGetTicketsByUserId()
    {
        // Prepare the expected SQL query
        $expectedQuery = "SELECT * FROM tickets WHERE user_id = ?";

        // Mock the PDOStatement and its execute method
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
            ->method('fetchAll')
            ->willReturn([]); // Simulate empty result set

        // Mock the PDO prepare method to return the mocked PDOStatement
        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo($expectedQuery))
            ->willReturn($stmtMock);

        // Call the getTicketsByUserId method
        $result = $this->purchaseTicketsDao->getTicketsByUserId(123);

        // Assert that the method returns an empty array
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}

?>

