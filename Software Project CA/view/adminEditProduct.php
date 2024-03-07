
<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>
<?php /*if( isset($_SESSION["username"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["username"].'</div>';
        */
echo '<div class=" lead text-center text-danger py-1 fs-3">'.$_SESSION["username"].'<h1 class="text-center mb-4"> Select Admin Operations to Perform</h1>'.'</div>'
//echo '<div class=" lead text-center text-danger py-1">'.$user.'</div>'

?>
<form method="get" action="<?php //echo $page_url; ?>">
    <button type="submit">Go to Target Page</button>
</form>




<?php include'../view/header.php' ?>
