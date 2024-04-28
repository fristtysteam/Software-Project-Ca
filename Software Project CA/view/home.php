<br>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <br>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DKIT Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
require_once '../model/databaseConnection.php';
include "../view/nav2.php";
include '../view/header.php';

// Check if the user is logged in
$loggedIn = isset($_SESSION['username']);
?>

<section class="container py-5">
    <h1>Welcome to the DKIT Art Gallery</h1>
    <p>Immerse yourself in the world of creativity and expression.</p>
    <?php if (!$loggedIn): ?>
        <div class="btn-container">
            <a href="?action=login" class="btn btn-large">Login</a>
            <a href="?action=showRegister" class="btn btn-large">Register</a>
        </div>
    <?php endif; ?>
</section>
<br>


<section class="gallery">
    <div class="container">
        <h2>Current Exhibitions</h2>
        <p>Explore our diverse collection of contemporary artworks.</p>
        <ul class="list-group">
            <li class="list-group-item">Our famous artworks!</li>
        </ul>
        <div>
            <a href="?action=gallery&type=abstract" class="btn btn-outline-dark">Go to Gallery</a>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2>Pages you should visit</h2>
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
</section>

<?php include '../view/footer.php' ?>

</body>
</html>
