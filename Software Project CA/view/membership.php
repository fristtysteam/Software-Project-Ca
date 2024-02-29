<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include'../view/header.php';

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
                        <h2 class="card-title">Standard Membership</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Unlimited access to our art galleries</li>
                            <li class="list-group-item">Ability to save and organize your favorite artworks</li>
                            <li class="list-group-item">Receive regular updates and newsletters</li>
                        </ul>
                        <p class="card-text">Join now for free!</p>
                        <a href="#" class="btn btn-primary">Join Standard</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">Premium Membership</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Early access to new art collections</li>
                            <li class="list-group-item">Access to premium content and artist interviews</li>
                            <li class="list-group-item">Discounts on art purchases and events</li>
                            <li class="list-group-item">Personalized recommendations based on your preferences</li>
                            <li class="list-group-item">Priority customer support</li>
                        </ul>
                        <p class="card-text">Experience art like never before with our premium membership!</p>
                        <a href="#" class="btn btn-primary">Upgrade to Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>

<?php include'../view/footer.php' ?>