<?php
require_once '../model/databaseConnection.php';
require_once '../model/addProduct.php';
require_once '../model/getProducts.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $url = $_POST['url'];
    $description = $_POST['description'];

    if (addProduct($name, $price, $quantity, $url, $description)) {
        header("Location: index.php?action=adminViewProducts");
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
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
