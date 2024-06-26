<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

//include "../view/nav.php";
include'../view/header.php';
include "../view/nav2.php";

$currentLanguage = getLanguage();
require_once '../model/getEvents.php';

$month = isset($month) ? $month : date('m');
$year = isset($year) ? $year : date('Y');

$events = getEvents();
?>
<style>
    .calendar td {
        cursor: pointer;
    }
    .event-details {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
    }

    .table {
        background-image: url('https://images.unsplash.com/photo-1596367407372-96cb88503db6?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }


</style>
<title>Event Calendar</title>

<style>
    .calendar td {
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5 mb-4">Event Calendar</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table id="calendarTable" class="table table-bordered calendar">
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
                $numDays = date('t', mktime(0, 0, 0, $month, 1, $year));
                $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

                echo "<tr>";
                for ($i = 1; $i < $firstDay; $i++) {
                    echo '<td></td>';
                }

                for ($day = 1; $day <= $numDays; $day++) {
                    $event_found = false;
                    $event_info = "";
                    foreach ($events as $event) {
                        $event_date = date('d', strtotime($event['start_date']));
                        if ($event_date == $day) {
                            $event_info .= "<div class='event-details'>";
                            $event_info .= "<strong>Title:</strong> {$event['title']}<br>";
                            $event_info .= "<strong>Venue:</strong> {$event['venue']}<br>";
                            $event_info .= "<strong>Start Date:</strong> {$event['start_date']}<br>";
                            $event_info .= "<strong>End Date:</strong> {$event['end_date']}<br>";
                            $event_info .= "</div>";
                            $event_found = true;
                            break;
                        }
                    }
                    if (!$event_found) {
                        $event_info = "";
                    }

                    echo "<td class='calendar-day' data-toggle='tooltip' title='" . $event_info . "'>$day</td>";

                    if (date('N', mktime(0, 0, 0, $month, $day, $year)) == 7) {
                        echo '</tr><tr>';
                    }
                }

                $remainingDays = 7 - (date('N', mktime(0, 0, 0, $month, $numDays, $year)) % 7);
                for ($i = 0; $i < $remainingDays; $i++) {
                    echo '<td></td>';
                }
                ?>
                <tr>
                    <td colspan="7" class="text-center">
                        <?php
                        if (isset($_SESSION['userType']) && $_SESSION['userType'] === 'premium') {
                            echo '<a href="../controller/index.php?action=purchaseTicket" class="btn btn-primary">Purchase Ticket</a>';
                        } else {
                            echo '<p>You must have a premium membership to purchase a ticket.</p>';
                        }
                        ?>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
<?php include '../view/footer.php' ?>

</html>