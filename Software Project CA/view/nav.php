<?php

 include "header.php";
 include "../model/language.php";
?>




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
                    <a class="nav-link active" href="../controller/index.php?action=show_home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/index.php?action=membership">Membership</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/index.php?action=shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/index.php?action=galleries">Galleries</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=set_language_english">English</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=set_language_irish">Irish</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=login">Login</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
