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

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="index.php?action=adminViewProducts" class="btn btn-lg btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                        <a href="index.php?action=adminAddProducts" class="btn btn-lg btn-primary">Add Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="index.php?action=adminEditProducts" class="btn btn-lg btn-primary">Edit Existing Products</a>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <form method="get" action="<?php // echo $page_url; ?>">
                        <a href="index.php?action=adminEditEvent" class="btn btn-lg btn-primary">Edit Event</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-grid gap-2">
            </div>
        </div>
    </div>
</div>

<?php include '../view/footer.php' ?>
