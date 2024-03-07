<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include'../view/header.php';
$currentLanguage = getLanguage();
require_once '../model/displayEvent.php';

// Get events
$events = getEvents();
?>
<body>

<div class="container">
    <h1 class="text-center mt-5 mb-4">Event Calendar</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered calendar">
                <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                $numDays = date('t', mktime(0, 0, 0, $month, 1, $year));
                $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

                echo "<tr>";
                for ($i = 1; $i < $firstDay; $i++) {
                    echo '<td></td>';
                }

                for ($day = 1; $day <= $numDays; $day++) {
                    $event_found = false;
                    foreach ($events as $event) {
                        $event_date = date('d', strtotime($event['start_date']));
                        if ($event_date == $day) {
                            echo "<td>";
                            echo "<strong>Title:</strong> {$event['title']}<br>";
                            echo "<strong>Venue:</strong> {$event['venue']}<br>";
                            echo "<strong>Start Date:</strong> {$event['start_date']}<br>";
                            echo "<strong>End Date:</strong> {$event['end_date']}<br>";
                            echo "</td>";
                            $event_found = true;
                            break;
                        }
                    }
                    if (!$event_found) {
                        echo "<td>$day</td>";
                    }

                    if (date('N', mktime(0, 0, 0, $month, $day, $year)) == 7) {
                        echo '</tr><tr>';
                    }
                }

                $remainingDays = 7 - (date('N', mktime(0, 0, 0, $month, $numDays, $year)) % 7);
                for ($i = 0; $i < $remainingDays; $i++) {
                    echo '<td></td>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
