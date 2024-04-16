<?php
require_once '../model/databaseConnection.php';
require_once '../model/userArt.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['name'];
    $description = $_POST['description'];
    $countryOfOrigin = $_POST['country_of_origin'];
    $url = $_POST['url'];
    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];

    if (addUserArt($title, $username, $description, $url, $countryOfOrigin, $username, $userId)) {
        header("Location: index.php?action=artistArtWork");
        exit();
    } else {
        $error = "Failed to add artwork. Please try again.";
    }
}

$pageTitle = "User Add Artwork";
//include "../view/nav.php";
include "../view/nav2.php";
include '../view/header.php';

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Add New Artwork</h2>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Artwork Title</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="country_of_origin" class="form-label">Country of Origin</label>
                    <input type="text" class="form-control" id="country_of_origin" name="country_of_origin" required>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Artwork</button>
            </form>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
