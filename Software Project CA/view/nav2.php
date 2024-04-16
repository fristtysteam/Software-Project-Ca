<?php
require_once '../model/databaseConnection.php';

include "header.php";
include "../model/language.php";

$isAdmin = isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin';

?>


<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom bg-img">
    <div class="container-fluid">
        <a class="navbar-brand text-primary fw-bolder" href="#">
            <img src="../3.jpg" alt="Logo">
            Dkit Art Gallery
        </a>
        <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item navbar-small-links">
                    <a class="nav-link active" href="../controller/index.php?action=show_home">Home</a>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item navbar-small-links">
                        <a class="nav-link" href="../controller/index.php?action=membership"><strong>Membership</strong></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link text-primary" href="../controller/index.php?action=shop"><strong>Shop</strong></a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=gallery"><strong>Gallery</strong></a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=usergallery"><strong>UserGallery</strong></a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link" href="../controller/index.php?action=events"><strong>Events</strong></a>
                </li>
                <?php if (!$_SESSION): ?>
                    <li class="nav-item navbar-small-links">
                        <a class="nav-link" href="../controller/index.php?action=showRegister"><strong>Register</strong></a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION): ?>
                    <div class="col-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../controller/index.php?action=logout">Logout</a>
                            </li>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php
$currentURL = $_SERVER['REQUEST_URI'];

$homePageIdentifier = 'action=show_home';

$isHomePage = (strpos($currentURL, $homePageIdentifier) !== false);

if ($isHomePage && isset($_SESSION['username'])):
    $username = $_SESSION['username'];
    $usertype = $_SESSION['userType'];
    ?>
    <div class="container">
        <div class="row justify-content-end align-items-center">
            <div class="col-auto">
                <a href="../controller/index.php?action=cart" class="nav-link">
                    <img src="../2.jpg" alt="Cart" style="width: 40px; height: 40px;" class="rounded-circle">
                </a>
            </div>
            <div class="col-auto">
                <a href="../controller/index.php?action=orders" class="nav-link">My Orders</a>
            </div>

            <?php if($usertype === "admin"): ?>
                <div class="col-auto">
                    <a href="../controller/index.php?action=show_admin" class="nav-link">Admin</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="container mt-3">
        <div class="alert custom-alert" role="alert">
            <h5>Welcome, <?php echo $username; ?></h5>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    </div>

<?php endif; ?>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".btn-close").click(function(){
            $(this).closest('.alert').hide();
        });
    });
</script>