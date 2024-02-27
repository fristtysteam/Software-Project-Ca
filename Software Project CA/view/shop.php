<?php
require_once '../model/getArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require_once '../model/getArt.php';

include "../view/nav.php";
include "../styles/homeStyles.php";
include '../view/header.php';
$currentLanguage = getLanguage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
 </head>

<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Welcome to Our Shop</h1>

    <div class="row mb-5">
        <div class="col-md-4">
            <h2>Categories</h2>
            <ul class="list-group">
                <li class="list-group-item">Paintings</li>
                <li class="list-group-item">Sculptures</li>
                <li class="list-group-item">Photography</li>
                <li class="list-group-item">Prints</li>
                <li class="list-group-item">Pottery</li>
            </ul>
        </div>

        <div class="col-md-8">

                <?php
                $artworks = getArtworks();
                if (!empty($artworks)) {
                    foreach ($artworks as $artwork): ?>
                        <div class="card">
                            <img src="../1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $artwork['title']; ?></h5>
                                <p class="card-text"><?php echo $artwork['desc']; ?></p>
                                <p class="card-text"><?php echo $artwork['artist']; ?></p>
                                <p class="card-text"><?php echo $artwork['countryOfOrigin']; ?></p>
                                <a href="../model/doCart.php?product_id=<?php echo $artwork['product_id']; ?>" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    <?php
                    endforeach;
                } else {
                    echo "No artworks found.";
                }
                ?>
            </div>
        </div>


    <div class="row mb-5">
        <div class="col-md-4">
            <h2>Not what you are looking for?</h2>
            <ul class="list-group">
                <li class="list-group-item">Paintings</li>
                <li class="list-group-item">Sculptures</li>
                <li class="list-group-item">Photography</li>
                <li class="list-group-item">Prints</li>
                <li class="list-group-item">Pottery</li>
            </ul>
        </div>
        </div>
</div>







</body>

</html>

<?php include'../view/footer.php' ?>
