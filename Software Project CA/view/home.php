<?php
require_once '../model/databaseConnection.php';
//include "../view/nav.php";
include "../view/nav2.php";
include'../view/header.php';

// Check if the user is logged in
$loggedIn = isset($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DKIT Art Gallery</title>
</head>

<body>
<style>
    body {
        background-repeat: no-repeat;
        background-position: center top;
    }

    .gallery-img {
        max-height: 200px;
        object-fit: cover;
    }
</style>


<section class="flex-md-grow-1 py-5">
    <div class="container text-center">
        <h1>Welcome to the DKIT Art Gallery</h1>
        <p >Immerse yourself in the world of creativity and expression.</p>
        <?php if (!$loggedIn): ?>
            <a href="?action=login" class="btn btn-primary me-2">Login</a>
            <a href="?action=showRegister" class="btn btn-secondary">Register</a>
        <?php endif; ?>
    </div>
</section>

<section class="gallery py-5">
    <div class="container">
        <h2 class="text-center mb-4">Current Exhibitions</h2>
        <p class="text-center">Explore our diverse collection of contemporary artworks.</p>
        <ul class="list-group">
            <li class="list-group-item">Our famous artworks!</li>
        </ul>
        <div class="text-center mt-3">
            <a href="?action=gallery&type=abstract" class="btn btn-outline-dark">Go to Gallery</a>
        </div>
    </div>
</section>

<section class="other-pages py-5">
    <div class="container">
        <h2 class="text-center mb-4">Pages you should visit</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="index.php?action=artistArtWork">User Art Gallery</a></li>
            <?php if (!$loggedIn): ?>
                <li class="list-group-item"><a href="index.php?action=showRegister">Register</a></li>
                <li class="list-group-item"><a href="index.php?action=login">Login</a></li>
            <?php endif; ?>
            <li class="list-group-item"><a href="index.php?action=events">Events</a></li>
            <li class="list-group-item"><a href="index.php?action=shop">Shop</a></li>
            <li class="list-group-item"><a href="index.php?action=gallery">Gallery</a></li>
            <li class="list-group-item"><a href="index.php?action=membership">Membership</a></li>
        </ul>
    </div>
</section>

<?php include'../view/footer.php' ?>

</body>

</html>
