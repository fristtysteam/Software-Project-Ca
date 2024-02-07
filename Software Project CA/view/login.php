<!------------------------------
    CREATED: January 2024
    AUTHOR:  Julie Olamijuwon
-------------------------------->

<!------------------------------
    CREATED: March 2023
    AUTHOR:  Julie Olamijuwon
-------------------------------->
<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>


<!--<div class="container">-->
<div class="row mt-2 bg-secondary">
    <div class="col-lg-4 m-auto">
        <div class=" row row-col-md-auto align-items-center text-center mt-5 mb-5 bg-light rounded">
            <h2 class="text-danger"> <?php //echo $pageTitle; ?></h2>
            <p class=" text-muted mt-3">Enter login details below</p>
        </div>

        <form id="login_form" method="POST" action="../controller/index.php">

            <!-- IN CASE OF ERROR FORM DATA ENTRY AND PROCCESSING -->
            <?php /*if( isset($_SESSION["error"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["error"].'</div>';

           }*/?>

            <input type="hidden" value="login" name="action">

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input class="form-control" id="" name="email" type="text" placeholder="Email Address">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input class="form-control" id="password1" name="password" type="password" placeholder="Password">
            </div>

            <div class="input-group mt-5 ">
                <button  class="form-control bg-dark fs-4 text-white"
                         id=""
                         type="submit"
                         name="submit"
                         value="Login"
                >
                    Login
                </button>
            </div>
            <div class="input-group mt-3 mb-5 ">
                <button  class="form-control bg-dark fs-4 text-white"
                         id=""
                         type="submit"
                         name="action"
                         value="forgotpassword"
                >
                    Forgot Password
                </button>
            </div>
        </form>
    </div>

</div>

<!-- https://www.youtube.com/watch?v=J62jv3O9PBw -->



<?php include'../view/footer.php' ?>
