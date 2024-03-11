<?php
require_once '../model/databaseConnection.php';
require_once '../model/addEvent.php';
require_once '../model/getEvents.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $venue = $_POST['venue'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $month = $_POST['month'];

    if (addEvent($title, $venue, $start, $end, $month)) {
        header("Location: index.php?action=adminViewEvents");
        exit();
    } else {
        $error = "Failed to add Event. Please try again.";
    }
}

$pageTitle = "Admin Add Event";
include "../view/nav.php";
include '../view/header.php';

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Add New Event</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Event Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="venue" class="form-label">Venue</label>
                    <input type="text" class="form-control" id="venue" name="venue" required>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="mb-3">
                    <label for="month" class="form-label">Month</label>
                    <input type="month" class="form-control" id="month" name="month" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Event</button>
            </form>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
