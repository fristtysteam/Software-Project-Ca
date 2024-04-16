<?php
require_once '../model/getArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

//include "../view/nav.php";
include "../view/nav2.php";
include '../view/header.php';


if(isset($_GET['action']) && $_GET['action'] === 'artProduct' && isset($_GET['deleteArt'])) {
    $artId = $_GET['deleteArt'];
    deleteArt($artId);

    header("Location: index.php?action=adminViewArt");
    exit();
}

$artworks = getArtworks();

?>

<div class="container">
    <h1 class="text-center mt-5">Admin View - Products</h1>
    <div class="row mt-5">
        <?php foreach ($artworks as $art): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="image-wrapper" style="height: 200px; overflow: hidden;">
                        <img src="<?php echo $art['url']; ?>" class="card-img-top" alt="Artwork" style="height: 100%; width: auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $art['title']; ?></h5>
                        <p class="card-text"><?php echo $art['artist']; ?></p>
                        <p class="card-text">The art description is: <?php echo $art['desc']; ?>$</p>
                        <p class="card-text">Country Of Origin: <?php echo $art['countryOfOrigin']; ?></p>
                        <a href="../model/getArt.php?deleteArt=<?php echo $art['product_id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include 'footer.php';
?>
