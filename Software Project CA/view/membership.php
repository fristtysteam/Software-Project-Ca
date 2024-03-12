<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require_once '../model/membershipRoles.php';

include "../view/nav.php";
include'../view/header.php';
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
} else {
    echo "Must be logged in to access this page";
    exit();
}
$currentLanguage = getLanguage();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Membership</title>
        <link rel="stylesheet" href="../css/membership.css">
    </head>
    <body>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Basic Membership</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Get emails and news feeds!</li>
                        </ul>
                        <p class="card-text">Experience art with our normal membership!</p>
                        <a href="../controller/index.php?action=changeRole&user_id=<?php echo $userId; ?>&user_type=basic" class="btn btn-primary">Join Basic</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Artist Membership</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Ability to Post Art to Users Gallery</li>
                        </ul>
                        <p class="card-text">Join now and showcase your creativity!</p>
                        <a href="../controller/index.php?action=changeRole&user_id=<?php echo $userId; ?>&user_type=artist" class="btn btn-primary">Join Artist Membership</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Premium Membership</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Ability to go to Special Events</li>
                        </ul>
                        <p class="card-text">Experience art like never before with our premium membership!</p>
                        <a href="../controller/index.php?action=changeRole&user_id=<?php echo $userId; ?>&user_type=premium" class="btn btn-primary">Upgrade to Premium</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include'../view/footer.php' ?>