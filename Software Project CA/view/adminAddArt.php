<?php
require_once '../model/databaseConnection.php';
require_once '../model/getArt.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    $countryOfOrigin = $_POST['countryOfOrigin'];

    if (addArt($title, $artist, $desc,$url,$countryOfOrigin)) {
        header("Location: index.php?action=adminAddArt");
        exit();
    } else {
        $error = "Failed to add product. Please try again.";
    }
}

$pageTitle = "Admin Add Product";
include "../view/nav.php";
include '../view/header.php';

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Add New Product</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Art Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Artist Name</label>
                    <input type="text" class="form-control" id="artist" name="artist" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Art Description</label>
                    <textarea type="text" class="form-control" id="desc" name="desc" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Artist Home Country</label>
                    <textarea class="form-control" id="countryOfOrigin" name="countryOfOrigin" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Art</button>
            </form>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
