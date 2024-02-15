<?php

require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include "../styles/homeStyles.php";
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
    <h1 class="text-center mb-4">Welcome to Our Shop</h1>

    <div class="row mb-5">
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

        <div class="col-md-8">
            <h2>Featured Products</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Product Title</h5>
                            <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Product Title</h5>
                            <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Product Title</h5>
                            <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h2>Whats the Topic?</h2>
            <p>sssssssssssssssssssssssssssssssssssssssssssssssametsssssssssssssssssssssssssssssssssssssssssssssss nusssssssssssssssssssssssssssssssssssssssssssssss .</p>
            <p>sssssssssssssssssssssssssssssssssssssssssssssss</p>
            <p>sssssssssssssssssssssssssssssssssssssssssssssss</p>
        </div>
    </div>





    <div class="col-md-18">
        <h2>Popular</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="../1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Title</h5>
                        <p class="card-text">sssssssssssssssssssssssssssssssssssssssssssssss</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-md-4">
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







</body>

</html>

<?php include'../view/footer.php' ?>
