<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DKIT Art Gallery</title>
    <style>
        body {
            background-color: #f2f2f2; /* Set a light gray background */
            font-family: Arial, sans-serif; /* Use a common sans-serif font */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            color: #00549f; /* Set headings to DKIT blue color */
            margin-bottom: 20px; /* Add space below headings */
            text-align: center;
        }

        p {
            color: #333; /* Set paragraph text color */
            text-align: center;
            margin-bottom: 20px; /* Add space below paragraphs */
        }

        .btn-container {
            text-align: center; /* Center the buttons horizontally */
        }

        .btn {
            display: inline-block;
            padding: 20px 40px; /* Increase padding for bigger buttons */
            background-color: #00549f; /* DKIT blue color */
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 10px; /* Increase border radius for rounded corners */
            transition: background-color 0.3s ease;
            font-size: 24px; /* Increase font size for bigger buttons */
            margin: 10px; /* Add space around buttons */
        }

        .btn:hover {
            background-color: #003366; /* Darker blue on hover */
        }

        .gallery {
            background-color: #fff; /* White background color */
            padding: 40px 20px;
            text-align: center;
            margin-bottom: 40px; /* Add space below the gallery section */
        }

        .list-group {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .list-group-item {
            padding: 10px 0;
        }

        .list-group-item a {
            color: #00549f; /* DKIT blue color for links */
            text-decoration: none;
        }

        .list-group-item a:hover {
            text-decoration: underline;
        }
    </style>
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
