<?php
require_once '../model/getArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

include "../view/nav.php";
include '../view/header.php';
$currentLanguage = getLanguage();
?>
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
<?php include '../view/footer.php'; ?>
