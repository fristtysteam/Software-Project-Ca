<?php
require_once '../model/getProducts.php';
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

//include "../view/nav.php";
include "../view/nav2.php";
include '../view/header.php';

$currentLanguage = getLanguage();

if(isset($_GET['action']) && $_GET['action'] === 'deleteProduct' && isset($_GET['deleteProduct'])) {
    require_once '../model/deleteProduct.php';
    $productId = $_GET['deleteProduct'];
    deleteProduct($productId);

    header("Location: index.php?action=adminViewProducts");
    exit();
}

$products = getProducts();

?>

<div class="container">
    <h1 class="text-center mt-5">Admin View - Products</h1>
    <div class="row mt-5">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="image-wrapper" style="height: 200px; overflow: hidden;">
                        <img src="<?php echo $product['url']; ?>" class="card-img-top" alt="Artwork" style="height: 100%; width: auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <p class="card-text">The price of this artwork is: <?php echo $product['price']; ?>$</p>
                        <p class="card-text">Quantity: <?php echo $product['quantity']; ?></p>
                        <a href="../model/deleteProduct.php?deleteProduct=<?php echo $product['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include 'footer.php';
?>
