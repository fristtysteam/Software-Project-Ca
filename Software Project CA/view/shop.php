<?php
require_once '../model/getArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
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
   <!-- <h1 class="text-center mb-4">Welcome to Our Shop</h1>-->
    <?php /*if( isset($_SESSION["username"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["username"].'</div>';
        */
        echo '<div class=" lead text-center text-danger py-1 fs-3">'.$_SESSION["username"].'<h1 class="text-center mb-4">Welcome to Our Shop</h1>'.'</div>'
    //echo '<div class=" lead text-center text-danger py-1">'.$user.'</div>'
           ?>
    <div class="row mb-5 g-2">
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

        <div class="col-md-8 g-lg-3">

                <?php
                $artworks = getArtworks();
                if (!empty($artworks)) {
                    foreach ($artworks as $artwork): ?>
                        <div class="card">
                            <img src="<?php echo $artwork['url']; ?>" class="card-img-top image" >
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


    <div class="row mb-5 ">
        <div class="col-md-4 g-2">
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
