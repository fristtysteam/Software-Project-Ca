<?php
require_once '../model/getArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include '../view/header.php';
$currentLanguage = getLanguage();

$artworks = getArtworks();

?>

    <div class="container">
        <h1 class="text-center mt-5">Admin View - Products</h1>
        <div class="row mt-5">
            <?php foreach ($artworks as $artwork): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="image-wrapper" style="height: 200px; overflow: hidden;">
                            <img src="<?php echo $artwork['url']; ?>" class="card-img-top" alt="Artwork" style="height: 100%; width: auto;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $artwork['title']; ?></h5>
                            <p class="card-text"><?php echo $artwork['desc']; ?></p>
                            <p class="card-text"><?php echo $artwork['artist']; ?></p>
                            <p class="card-text"><?php echo $artwork['countryOfOrigin']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
include 'footer.php';
?>