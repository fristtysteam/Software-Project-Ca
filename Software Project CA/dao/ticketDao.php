<?php
class TicketDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Create a new ticket entry in the database.
     *
     * @param int $eventId Event ID
     * @param string $event Event name
     * @param string $startDate Start date of the event
     * @param string $endDate End date of the event
     * @param float $price Ticket price
     * @param string $name Ticket name
     * @throws Exception If there is an error creating the ticket entry
     * @return void
     */
    public function createTicket($eventId, $event, $startDate, $endDate, $price, $name) {
        try {
            $sql = "INSERT INTO ticket (event_id, event, start_date, end_date, price, name) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$eventId, $event, $startDate, $endDate, $price, $name]);
        } catch (PDOException $e) {
            throw new Exception("Error creating ticket: " . $e->getMessage());
        }
    }

    /**
     * Retrieve ticket information from the database by its ID.
     *
     * @param int $id Ticket ID
     * @return array|null Ticket information as an associative array, or null if not found
     * @throws Exception If there is an error retrieving the ticket information
     */
    public function getTicketById($id) {
        try {
            $sql = "SELECT * FROM ticket WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error retrieving ticket: " . $e->getMessage());
        }
    }
    /**
     * Update existing ticket information in the database.
     *
     * @param int $id Ticket ID
     * @param int $eventId Event ID
     * @param string $event Event name
     * @param string $startDate Start date of the event
     * @param string $endDate End date of the event
     * @param float $price Ticket price
     * @param string $name Ticket name
     * @throws Exception If there is an error updating the ticket information
     * @return void
     */
    public function updateTicket($id, $eventId, $event, $startDate, $endDate, $price, $name) {
        try {
            $sql = "UPDATE ticket SET event_id = ?, event = ?, start_date = ?, end_date = ?, price = ?, name = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$eventId, $event, $startDate, $endDate, $price, $name, $id]);
        } catch (PDOException $e) {
            throw new Exception("Error updating ticket: " . $e->getMessage());
        }
    }

    /**
     * Delete a ticket entry from the database by its ID.
     *
     * @param int $id Ticket ID
     * @throws Exception If there is an error deleting the ticket entry
     * @return void
     */
    public function deleteTicket($id) {
        try {
            $sql = "DELETE FROM ticket WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Error deleting ticket: " . $e->getMessage());
        }
    }
}