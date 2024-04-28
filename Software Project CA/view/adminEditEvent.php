<?php
require_once '../model/databaseConnection.php';
require_once '../model/updateEvent.php';
require_once '../model/getEvents.php';

$pageTitle = "Admin Edit Event";
$events = getEvents();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : null;
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $venue = isset($_POST['venue']) ? $_POST['venue'] : null;
    $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : null;
    $endDate = isset($_POST['end_date']) ? $_POST['end_date'] : null;
    $month = isset($_POST['month']) ? $_POST['month'] : null;

    if ($eventId && $title && $venue && $startDate && $endDate && $month) {
        if (updateEvent($eventId, $title, $venue, $startDate, $endDate, $month)) {
            header("Location: index.php?action=adminViewEvents");
            exit();
        } else {
            $error = "Failed to update event. Please try again.";
        }
    } else {
        $error = "All fields are required.";
    }
}

//include "../view/nav.php";
include '../view/header.php';
include "../view/nav2.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Edit Event</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="eventId" class="form-label">Select Event</label>
                    <select class="form-control" id="eventId" name="eventId">
                        <?php foreach ($events as $event) : ?>
                            <option value="<?php echo $event['id']; ?>"><?php echo $event['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select Event</button>
            </form>
            <br>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eventId'])) : ?>
                <?php $event = getEventById($_POST['eventId']); ?>
                <?php if (!empty($event)) : ?>
                    <form method="post">
                        <input type="hidden" name="eventId" value="<?php echo $event['id']; ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $event['title'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="venue" class="form-label">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $event['venue'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $event['start_date'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $event['end_date'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="month" class="form-label">Month</label>
                            <input type="number" class="form-control" id="month" name="month" value="<?php echo $event['month'] ?? ''; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
