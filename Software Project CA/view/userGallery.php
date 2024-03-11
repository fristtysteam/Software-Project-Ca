<?php
require_once '../model/userArt.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

include "../view/nav.php";
include '../view/header.php';

$isArtist = isset($_SESSION['userType']) && $_SESSION['userType'] === 'artist';
$isAdmin = isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin';

if ($isArtist) {
   echo" <a class='nav-link' href='../controller/index.php?action=addUserArt'>Add Art as an Artist</a>";
    }
    ?>


    <?php


$userArtworks = getUserArtworks();
if (!empty($userArtworks)) {
    foreach ($userArtworks as $userArtwork): ?>
        <div class="card">
            <img src="<?php echo $userArtwork['url']; ?>" class="card-img-top image" >
            <div class="card-body">
                <h5 class="card-title"><?php echo $userArtwork['title']; ?></h5>
                <p class="card-text"><?php echo $userArtwork['desc']; ?></p>
                <p class="card-text"><?php echo $userArtwork['artist']; ?></p>
                <p class="card-text"><?php echo $userArtwork['countryOfOrigin']; ?></p>
                <p class="card-text"><?php echo $userArtwork['username']; ?></p>
                <?php if ($isAdmin): ?>
                    <a href="../model/deleteUserArt.php?deleteUserArt=<?php echo $userArtwork['art_id']; ?>" class="btn btn-danger">Delete</a>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endforeach;
} else {
    echo "No artworks found.";
}
?>

<?php include '../view/footer.php'; ?>
