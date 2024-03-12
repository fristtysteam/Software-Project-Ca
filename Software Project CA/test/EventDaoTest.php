<?php

require_once '../dao/EventDao.php';

class EventDaoTest extends \PHPUnit\Framework\TestCase
{
    private $pdo;
    private $eventDao;

    // Set up the testing environment
    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the event table
        $this->pdo->exec("
            CREATE TABLE event (
                id INTEGER PRIMARY KEY,
                title TEXT,
                venue TEXT,
                start_date TEXT,
                end_date TEXT,
                month TEXT
            )
        ");

        // Initialize EventDao with the testing database connection
        $this->eventDao = new EventDao($this->pdo);
    }

    // Tear down the testing environment
    protected function tearDown(): void
    {
        // Drop the event table after each test
        $this->pdo->exec("DROP TABLE event");
    }

    // Test the addEvent method
    public function testAddEvent()
    {
        $title = "Test Event";
        $venue = "Test Venue";
        $start = "2024-03-15";
        $end = "2024-03-16";
        $month = "March";

        $result = $this->eventDao->addEvent($title, $venue, $start, $end, $month);
        $this->assertTrue($result);

        // Verify that the event was added to the database
        $events = $this->eventDao->getEvents();
        $this->assertCount(1, $events);
        $this->assertEquals($title, $events[0]['title']);
    }

    // Test the deleteEvent method
    public function testDeleteEvent()
    {
        $title = "Test Event";
        $venue = "Test Venue";
        $start = "2024-03-15";
        $end = "2024-03-16";
        $month = "March";

        // Add an event to the database
        $this->eventDao->addEvent($title, $venue, $start, $end, $month);

        // Get the ID of the added event
        $events = $this->eventDao->getEvents();
        $eventId = $events[0]['id'];

        // Delete the event and verify
        $result = $this->eventDao->deleteEvent($eventId);
        $this->assertTrue($result);

        // Verify that the event was deleted from the database
        $eventsAfterDelete = $this->eventDao->getEvents();
        $this->assertEmpty($eventsAfterDelete);
    }

    // Test the updateEvent method
    public function testUpdateEvent()
    {
        $title = "Test Event";
        $venue = "Test Venue";
        $start = "2024-03-15";
        $end = "2024-03-16";
        $month = "March";

        // Add an event to the database
        $this->eventDao->addEvent($title, $venue, $start, $end, $month);

        // Get the ID of the added event
        $events = $this->eventDao->getEvents();
        $eventId = $events[0]['id'];

        // Update the event and verify
        $newTitle = "Updated Event";
        $result = $this->eventDao->updateEvent($eventId, $newTitle, $venue, $start, $end, $month);
        $this->assertTrue($result);

        // Verify that the event was updated in the database
        $updatedEvent = $this->eventDao->getEventById($eventId);
        $this->assertEquals($newTitle, $updatedEvent['title']);
    }

    // Test the getEvents method
    public function testGetEvents()
    {
        // Add multiple events to the database
        $this->eventDao->addEvent("Event 1", "Venue 1", "2024-03-15", "2024-03-16", "March");
        $this->eventDao->addEvent("Event 2", "Venue 2", "2024-03-20", "2024-03-21", "March");

        // Get all events and verify
        $events = $this->eventDao->getEvents();
        $this->assertCount(2, $events);
    }

    // Test the getEventDetails method
    public function testGetEventDetails()
    {
        $title = "Test Event";
        $venue = "Test Venue";
        $start = "2024-03-15";
        $end = "2024-03-16";
        $month = "March";

        // Add an event to the database
        $this->eventDao->addEvent($title, $venue, $start, $end, $month);

        // Get the ID of the added event
        $events = $this->eventDao->getEvents();
        $eventId = $events[0]['id'];

        // Get event details and verify
        $eventDetails = $this->eventDao->getEventDetails($eventId);
        $this->assertEquals($title, $eventDetails['title']);
    }

    // Test the getEventById method
    public function testGetEventById()
    {
        $title = "Test Event";
        $venue = "Test Venue";
        $start = "2024-03-15";
        $end = "2024-03-16";
        $month = "March";

        // Add an event to the database
        $this->eventDao->addEvent($title, $venue, $start, $end, $month);

        // Get the ID of the added event
        $events = $this->eventDao->getEvents();
        $eventId = $events[0]['id'];

        // Get event by ID and verify
        $eventById = $this->eventDao->getEventById($eventId);
        $this->assertEquals($title, $eventById['title']);
    }
}

?>


