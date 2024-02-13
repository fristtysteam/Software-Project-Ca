<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include "../styles/homeStyles.php";
include'../view/header.php';

$currentLanguage = getLanguage();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Galleries</title>

</head>

<body>




<div class="container mt-5">
    <h1 class="text-center mb-4">Art Galleries</h1>

    <!-- Gallery Section 1 -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2>Gallery 1</h2>
            <p>Explore a collection of breathtaking artworks in our first gallery. From classic paintings to modern sculptures, Gallery 1 offers a diverse range of artistic expressions.</p>
        </div>
        <div class="col-md-6">
            <img src="pg" class="img-fluid" alt="Gallery 1">
        </div>
    </div>

    <!-- Gallery Section 2 -->
    <div class="row mb-5">
        <div class="col-md-6 order-md-2">
            <h2>Gallery 2</h2>
            <p>Dive into the mesmerizing world of contemporary art with our second gallery. Immerse yourself in thought-provoking installations and avant-garde masterpieces.</p>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="plpg" class="img-fluid" alt="Gallery 2">
        </div>
    </div>

    <!-- Gallery Section 3 -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2>Gallery 3</h2>
            <p>Experience the beauty of nature and landscapes in our third gallery. From serene landscapes to vibrant floral compositions, Gallery 3 celebrates the wonders of the natural world.</p>
        </div>
        <div class="col-md-6">
            <img src="pg" class="img-fluid" alt="Gallery 3">
        </div>
    </div>

    <!-- Gallery Section 4 -->
    <div class="row mb-5">
        <div class="col-md-6 order-md-2">
            <h2>Gallery 4</h2>
            <p>Discover the power of abstract art in our fourth gallery. Explore dynamic forms, bold colors, and innovative techniques that challenge traditional perceptions of art.</p>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="pg" class="img-fluid" alt="Gallery 4">
        </div>
    </div>
    <!-- Gallery Section 5 -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2>Gallery 5</h2>
            <p>Experience the essence of cultural diversity in our fifth gallery. From traditional folk art to contemporary cultural expressions, Gallery 5 showcases a rich tapestry of human creativity.</p>
        </div>
        <div class="col-md-6">
            <img src="pg" class="img-fluid" alt="Gallery 5">
        </div>
    </div>

    <!-- Gallery Section 6 -->
    <div class="row mb-5">
        <div class="col-md-6 order-md-2">
            <h2>Gallery 6</h2>
            <p>Embark on a journey through time and history in our sixth gallery. Explore ancient artifacts, historical masterpieces, and cultural relics that narrate the story of humanity.</p>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="pg" class="img-fluid" alt="Gallery 6">
        </div>
    </div>
</div>

</body>

</html>


<?php include'../view/footer.php' ?>

