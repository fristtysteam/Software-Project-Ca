<?php
require_once '../model/databaseConnection.php';

include "header.php";
include "../model/language.php";

$isAdmin = isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin';

?>




<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand text-primary fw-bolder" href="#">
            <img src="../3.jpg" alt="Logo">
            Dkit Art Gallery
        </a>
        <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item navbar-small-links">
                    <a class="nav-link active " href="../controller/index.php?action=show_home">Home</a>
                </li>
                <li class="nav-item navbar-small-links">
                    <a class="nav-link " href="../controller/index.php?action=membership"><strong>Membership</strong></a>
                </li>
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
                <span><li class="nav-item navbar-small-links">
                   <a class="nav-link" href="../controller/index.php?action=showRegister"><strong>Register<strong></a>
                </li></span>
               <!-- <li class="nav-item">
                    <a class="nav-link" href="../controller/index.php?action=orders">My Orders</a>
                </li>
                <?php //if ($isAdmin && isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/index.php?action=show_admin">Admin</a>
                    </li>-->
                <?php //endif; ?>
            </ul>

           <!-- <ul class="navbar-nav ms-auto">-->

                <?php
                //if(isset($_SESSION['username'])) :
                   // $username = $_SESSION['username'];
                    echo '<!--<li class="nav-item navbar-small-links">-->
                                <!--<a class="nav-link" href="#">Welcome,</a>-->
                          <!--</li>-->';
                    echo '<!--<li class="nav-item navbar-small-links">-->
                              <!--<a class="nav-link" href="../controller/index.php?action=logout">Logout</a>-->
                          <!--</li>-->';
                ?>
                <?php// endif; ?>
           <!-- </ul>-->
        </div>
</nav>

<?php if (isset($_SESSION['username'])):
    $username = $_SESSION['username'];
    $usertype = $_SESSION['userType'];
    echo '<!--<div class="row  d-flex justify-content-between>-->';
    echo '<div class="row  d-flex justify-content-between"><button class="col-auto bg-light">
                            <a class="nav-link" href="../controller/index.php?action=cart">
                                <img src="../2.jpg" alt="Cart" style="width: 40px; height: 40px;">
                            </a>
                        </button>';
    echo '<!--<li class="col-auto">-->
                            <a class="nav-link" href="../controller/index.php?action=orders">My Orders</a>
                        <!--</li>-->';

    echo '<!--<button class="col-auto">
                            <a class="nav-link" href="../controller/index.php?action=show_admin">Admin</a>
                        </button>-->';
    echo '<ol class="col-auto">
                            <a class="nav-link" href="../controller/index.php?action=logout">Logout</a>
                        </ol>
                       </div>
                       <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <h3 class="alert-dismissible text-danger">Welcome, ' . $username . '</h3>
                        <button  type="button" class="btn-close" data-bs-dismiss="alert"  area-label="close" ></button>
                        </div>
                        '



     ?>
    <?php if($usertype === "admin")
    echo '<button class="col-auto">
                            <a class="nav-link" href="../controller/index.php?action=show_admin">Admin</a>
                        </button>';
        ?>
<?php endif; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>

