<?php
require_once '../model/databaseConnection.php';
require_once '../model/updateProduct.php';
require_once '../model/getProducts.php';

$pageTitle = "Admin Edit Product";
$product = getProducts();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys are set before accessing them
    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
    $url = isset($_POST['url']) ? $_POST['url'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;

    // Update product
    if ($productId && $name && $price && $quantity && $url && $description) {
        if (updateProduct($productId, $name, $price, $quantity, $url, $description)) {
            header("Location: index.php?action=adminViewProducts");
            exit();
        } else {
            $error = "Failed to update product. Please try again.";
        }
    } else {
        $error = "All fields are required.";
    }
}
// Fetch all products
$products = getProducts();

// Selecting a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = isset($_POST['id']) ? $_POST['id'] : null;
    if (!$productId) {
        $error = "Please select a valid product.";
    } else {
        $product = getProductById($productId);
        if (!$product) {
            $error = "Product not found.";
        }
    }
}

//include "../view/nav.php";
include "../view/nav2.php";
include '../view/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Edit Product</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="productId" class="form-label">Select Product</label>
                    <select class="form-control" id="productId" name="id">
                        <?php foreach ($products as $prod) : ?>
                            <option value="<?php echo $prod['id']; ?>" <?php if (isset($productId) && $prod['id'] == $productId) echo 'selected'; ?>><?php echo $prod['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select Product</button>
            </form>
            <br>
            <?php if (!empty($product)) : ?>
                <form method="post">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?php echo $product['url'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description'] ?? ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body text-center">
        <a href="index.php?action=show_admin" class="btn btn-lg btn-primary">Back To Admin</a>
    </div>
</div>

<?php include '../view/footer.php'; ?>
