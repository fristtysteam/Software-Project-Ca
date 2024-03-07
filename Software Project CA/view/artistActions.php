<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>
<?php /*if( isset($_SESSION["username"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["username"].'</div>';
        */
echo '<div class=" lead text-center text-danger py-1 fs-3">'.$_SESSION["username"].'<h1 class="text-center mb-4">Weclome to Artist Action Page <br/>Select Admin Operations to Perform</h1>'.'</div>'
//echo '<div class=" lead text-center text-danger py-1">'.$user.'</div>'

?>

<div class="col-sm-6 mb-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">UpLoad Image</h5>
            <p class="card-text">ACTION: Upload image of new own art work...</p>
            <a href="../controller/index.php?action=show_create_roast_form" class="btn btn-dark">Click</a>
        </div>
        <form method="get" action="<?php //echo $page_url; ?>">
            <button type="submit">Upload Image</button>
        </form>
    </div>
</div>



<?php include'../view/header.php' ?>
