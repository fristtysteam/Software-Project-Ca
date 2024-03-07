<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>
<?php /*if( isset($_SESSION["username"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["username"].'</div>';
        */
echo '<div class=" lead text-center text-danger py-1 fs-3">'.$_SESSION["username"].'<h1 class="text-center mb-4">Welcome To Admin Page</h1>'.'</div>'
//echo '<div class=" lead text-center text-danger py-1">'.$user.'</div>'
?>

<div class="row g-2">
    <div class="col-6">
        <div class="p-3 border bg-light justify-content-center">
            <form method="get" action="<?php// echo $page_url; ?>">
                <button class=" btn btn-lg bg-primary align-text-center" type="submit">View Products</button>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="p-3 border bg-light">
            <form method="get" action="<?php// echo $page_url; ?>">
                <button type="submit">Edit Products</button>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="p-3 border bg-light">
            <form method="get" action="<?php// echo $page_url; ?>">
                <button type="submit">View Products orders</button>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="p-3 border bg-light">
            <form method="get" action="<?php// echo $page_url; ?>">
                <button type="submit">View User List</button>
            </form>
        </div>
    </div>

</div>
<div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-primary" type="button">Button</button>
    <button class="btn btn-primary" type="button">Button</button>
</div>




<?php include'../view/header.php' ?>
