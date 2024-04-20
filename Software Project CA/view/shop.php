<?php

require_once '../model/getProducts.php';
require_once '../model/language.php';
require_once '../model/cartModel.php';
require_once '../model/doCart.php';

include "../view/nav2.php";
include '../view/header.php';

$currentLanguage = getLanguage();
$isLoggedIn = isset($_SESSION['username']);

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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="lead text-center text-black-50 py-1 fs-3">
        <h1 class="text-center mb-4">Shop Page</h1>
    </div>
    <div class="row mb-5 g-2">
        <div class="col-md-8 g-lg-3">
            <?php
            $products = getProducts();
            $inStockProducts = [];
            $outOfStockProducts = [];
            if (!empty($products)) {
                foreach ($products as $product):
                    if ($product['quantity'] > 0) {
                        $inStockProducts[] = $product;
                        ?>
                        <?php
                    } else {
                        $outOfStockProducts[] = $product;
                    }
                endforeach;
            } else {
                echo "No Products available at this moment.";
            }
            ?>
        </div>
    </div>
    <div class="container mt-5" style="max-width: 600px; max-height: 600px;">
        <?php if (!empty($inStockProducts)): ?>
            <div class="container mt-5">
                <h2 class="text-center mb-4">In Stock Products</h2>
                <div class="row justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($inStockProducts as $index => $product): ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($inStockProducts as $index => $product): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>" style="height: 750px;">
                                    <img src="<?= $product['url']; ?>" class="d-block w-100 rounded" alt="<?= $product['name']; ?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h2><?= $product['name']; ?></h2>
                                        <p><?= $product['description']; ?></p>
                                        <p class="font-weight-bold">Price: <?= $product['price']; ?>$</p>
                                        <form action="../model/doCart.php?product_id=<?= $product['id']; ?>" method="post">
                                            <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity']; ?>">
                                            <?php if ($isLoggedIn): ?>
                                                <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
                                            <?php else: ?>
                                                <p>Please <a href="?action=login">login</a> to add items to cart.</p>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
            <br>
            <br>
            <br>
        <br>
        <br>
        <br>

            <style>
                .grayscale {
                    filter: grayscale(100%);
                    transition: filter 0.8s ease;
                }

                .grayscale:hover {
                    filter: grayscale(0%);
                }

                .carousel-control-prev, .carousel-control-next {
                    color: blue !important;
                }
            </style>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container mt-5" style="max-width: 600px; max-height: 600px;">
                <!-- Carousel for out-of-stock products -->
                <?php if (!empty($outOfStockProducts)): ?>
                    <div>
                        <h2 class="text-center mb-4">Out of Stock Products</h2>
                        <br>
                        <div id="carouselExampleIndicatorsOutOfStock" class="carousel slide" data-ride="carousel" style="max-width: 700px; margin: auto;">
                            <ol class="carousel-indicators">
                                <?php foreach ($outOfStockProducts as $index => $product): ?>
                                    <li data-target="#carouselExampleIndicatorsOutOfStock" data-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>"></li>
                                <?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php foreach ($outOfStockProducts as $index => $product): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo $product['url']; ?>" class="d-block w-100 rounded grayscale" alt="<?php echo $product['name']; ?>" style="max-height: 700px; object-fit: cover; opacity: 0.8;">
                                        <div class="carousel-caption d-none d-md-block" style="color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                            <h2 style="font-size: 32px; font-weight: bold;"><?php echo $product['name']; ?></h2>
                                            <p style="font-size: 24px;"><?php echo $product['description']; ?></p>
                                            <p style="font-size: 24px; font-weight: bold;">Price: <?php echo $product['price']; ?>$</p>
                                            <p style="font-size: 24px; font-weight: bold; color: #d9534f;">Out of Stock</p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>


                            <a class="carousel-control-prev" href="#carouselExampleIndicatorsOutOfStock" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: blue;"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicatorsOutOfStock" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="color: blue;"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <br>
        <br>
        <br>
            <br>
            <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


            <?php include'../view/footer.php' ?>

        </div>

        <script>
            $(document).ready(function(){

                $('#carouselExampleIndicators, #carouselExampleIndicatorsOutOfStock').carousel({
                    interval: 5000,
                    pause: 'hover'
                });


                $('#carouselExampleIndicators .carousel-item, #carouselExampleIndicatorsOutOfStock .carousel-item').addClass('animate__animated animate__fadeIn');


                $('#carouselExampleIndicators, #carouselExampleIndicatorsOutOfStock').on('slide.bs.carousel', function () {
                    $(this).find('.carousel-item.active').addClass('animate__animated animate__fadeOut');
                });

                $('#carouselExampleIndicators, #carouselExampleIndicatorsOutOfStock').on('slid.bs.carousel', function () {
                    $(this).find('.carousel-item.active').removeClass('animate__fadeOut').addClass('animate__fadeIn');
                });
            });
        </script>

