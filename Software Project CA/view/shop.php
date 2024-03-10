<?php
require_once '../model/getProducts.php';
require_once '../model/language.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';

include "../view/nav.php";
include '../view/header.php';
$currentLanguage = getLanguage();

function getCartItems() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

$cartItems = getCartItems();
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

    <div class="lead text-center text-black-50 py-1 fs-3">
        <?php if(isset($_SESSION["username"])): ?>
            <?php echo $_SESSION["username"]; ?>
        <?php endif; ?>
        <h1 class="text-center mb-4">Welcome to Our Shop</h1>
    </div>
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
            $products = getProducts();
            if (!empty($products)) {
                foreach ($products as $product): ?>
                    <div class="card">
                        <img src="<?php echo $product['url']; ?>" class="card-img-top image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <p class="card-text">Price: <?php echo $product['price']; ?>$</p>
                            <p class="card-text">Quantity available: <?php echo $product['quantity']; ?></p>
                            <?php if ($product['quantity'] > 0): ?>
                                <form action="../model/doCart.php?product_id=<?php echo $product['id']; ?>" method="post">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['quantity']; ?>">
                                    <button type="submit" class="btn">Add to Cart</button>
                                </form>
                            <?php else: ?>
                                <button type="button" class="btn btn-secondary" disabled>Out of Stock</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach;
            } else {
                echo "No Products available at this moment.";
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

<?php include '../view/footer.php'; ?>
