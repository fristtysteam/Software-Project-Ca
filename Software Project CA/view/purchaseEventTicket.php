<?php
require_once '../model/getEvents.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

include "../view/nav.php";
include '../view/header.php';

if(isset($_GET['action']) && $_GET['action'] === 'purchaseTicket' && isset($_GET['eventId'])) {

}

$events = getEvents();
?>

<div class="container">
    <h1 class="text-center mt-5">Purchase Event Tickets</h1>
    <div class="row mt-5">
        <?php foreach ($events as $event): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $event['title']; ?></h5>
                        <p class="card-text">Venue: <?php echo $event['venue']; ?></p>
                        <p class="card-text">Start Date: <?php echo $event['start_date']; ?></p>
                        <p class="card-text">End Date: <?php echo $event['end_date']; ?></p>
                        <p class="card-text">Month: <?php echo $event['month']; ?></p>
                        <a href="purchaseEventTicket.php?action=purchaseTicket&eventId=<?php echo $event['id']; ?>" class="btn btn-primary">Purchase Ticket</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body text-center">
        <a href="index.php?action=events" class="btn btn-lg btn-primary">Back To Event Page</a>
    </div>
</div>

<?php
include '../view/footer.php';
?>
