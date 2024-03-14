<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require_once '../model/userDB.php';


$action = filter_input(INPUT_GET, 'action');

include '../view/header.php';
include '../view/nav.php';

if (isset($_SESSION["username"])) {
    echo '<div class="lead text-center text-danger py-1 fs-3">' . $_SESSION["username"] . '</div>';
    echo '<h1 class="text-center mb-4">Welcome To Admin Page</h1>';
} else {
    header("Location: index.php?action=login");
    exit();
}
?>

<!--<div class="container-fluid">-->
<div class="col-lg-12 mb-5">
    <div class="row mt-5">
        <!--<div class="col-lg-4 ">-->
        <div class="col-md-4 ">
            <div class="card mb-4 text-center ">
                <h3> Actions on Product:</h3>
                <div class="card-body text-center d-inline-block " >
                    <a href="index.php?action=adminViewProducts" class="btn btn-lg text-primary btn-outline-secondary fs-5 mb-4">View Products</a>
                    <a href="index.php?action=adminAddProducts" class="btn btn-lg text-primary btn-outline-dark mb-4">Add Products</a>
                    <a href="index.php?action=adminEditProducts" class="btn btn-lg text-primary btn-outline-dark mb-4">Edit Products</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 text-center">
                <h3> Actions on Event:</h3>
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminAddEvents" class="btn btn-lg text-primary btn-outline-dark mb-4">Add Events</a>
                    </form>
                    <form>
                        <a href="index.php?action=adminEditEvent" class="btn btn-lg text-primary btn-outline-dark mb-4">Edit Event</a>
                    </form>
                    <form>
                        <a href="index.php?action=adminViewEvents" class="btn btn-lg text-primary btn-outline-dark mb-4">View Events</a>
                    </form>
                </div>
            </div>
        </div>

       <!-- <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminViewEvents" class="btn btn-lg btn-primary">View Events</a>
                    </form>
                </div>



            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminAddEvents" class="btn btn-lg btn-primary">Add Events</a>
                    </form>
                </div>
            </div>
        </div>-->
        <div class="col-md-4">
            <div class="card mb-4  text-center">
                <h3 class=""> Actions on Gallery:</h3>
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminAddArt" class="btn btn-lg text-primary btn-outline-dark mb-4">Add Gallery Art</a>
                    </form>
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminViewArt" class="btn btn-lg text-primary btn-outline-secondary mb-4">View Gallery Art</a>
                    </form>
                </div>
            </div>
        </div>
   <!-- </div>
    <div class="row mt-5">-->
        <div class="col-lg-12 mb-5">
            <div class="row mt-5">
                <!--<div class="col-lg-4 ">-->
                <div class="col-md-4 ">
                    <div class="card  text-center ">
                        <h3> Actions on Product:</h3>
                        <div class="card-body text-center d-inline-block " >
                            <a href="index.php?action=adminEditUser" class="btn btn-lg text-primary btn-outline-secondary fs-5 mb-4">Edit User Info:</a>

                        </div>
                    </div>
                </div>
        <!--<div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminViewArt" class="btn btn-lg btn-primary">View Gallery Art</a>
                    </form>
                </div>
            </div>
        </div>-->
    </div>
</div>



<!--<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-grid gap-2">
            </div>
        </div>
    </div>-->
<!--</div>
</div>-->

<?php include '../view/footer.php' ?>
