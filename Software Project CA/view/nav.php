<?php
include "../model/language.php"; // Include language file
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    body {
        padding-top: 56px;
    }

    .navbar {
        background-color: #ffffff;
        border: 1px solid #000000;
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #000000;
    }

    .navbar-brand img {
        max-height: 40px;
        margin-right: 10px;
    }

    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
        color: #555555;
    }

    .navbar-custom {
        max-width: 50%;
        margin: 0 auto;
    }

    .navbar-small-links {
        font-size: 0.8rem;
        margin-right: 10px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="path/to/your/logo.png" alt="Logo">
            Dkit Art Gallery
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#membership">Membership</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#galleries">Galleries</a>
                </li>
            </ul>
            <ul class="navbar-nav">




                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="#" onclick="setLanguage('english')">English</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="#" onclick="setLanguage('irish')">Irish</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
