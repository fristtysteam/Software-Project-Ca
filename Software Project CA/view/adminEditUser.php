<!------------------------------
    CREATED: January 2024
    AUTHOR:  Julie Olamijuwon
-------------------------------->


<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>
<?php //require_once '../scripts/validateRegistrationData.js' ?>
<!--<script src="../scripts/validateSignup.js"></script>-->

<!--<div class="container">-->
<div class="row mt-2 bg-secondary">
    <div class="col-lg-4 m-auto">
        <div class=" row row-col-md-auto align-items-center text-center mt-5 mb-5 bg-light rounded">
            <h2 class="text-danger"> <?php //echo $pageTitle; ?></h2>
            <p class=" text-muted mt-3">Edit User details below</p>
        </div>

        <!-- <form id="registerForm"
               name="sign_up_form"
               method="POST"
               action="../controller/index.php"
               onsubmit="return validateSignUp()">-->
        <form id="registerForm" method="POST" action="../controller/index.php">
            <!-- IN CASE OF ERROR FORM DATA ENTRY AND PROCCESSING -->
            <?php /*if( isset($_SESSION["error"])){
             echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["error"].'</div>';

           }*/?>

            <input type="hidden" value="update_user" name="action">


            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="firstname" name="fname" value="<?php echo $user['id'] ?? ''; ?>"  type="text" placeholder="FirstName" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="lastname" name="sname"  value="<?php echo $user['name'] ?? ''; ?>" type="text" placeholder="LastName" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="username" name="username" value="<?php echo $user['username'] ?? ''; ?>" type="text" placeholder="Username" required >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input class="form-control" id="email" name="email"value="<?php echo $user['email'] ?? ''; ?>"  type="text" placeholder="Email Address" required>

            </div>
            <!--<div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password">

            </div>-->

            <div class="input-group mb-3">

                <label for="birthdate"><i class="fa fa-birthday">Date of Birth:</i></label>
                <input class="form-control" type="date" id="birthdate" name="birthdate" required>

                <div class="input-group mt-5 ">
                    <button  class="form-control bg-dark fs-4 text-white"
                             id=""
                             type="submit"
                             name="action"
                             value="update_user"
                    >
                        Submit
                    </button>
                </div>

        </form>

    </div>


</div>

</div>

<!-- https://www.youtube.com/watch?v=J62jv3O9PBw -->



<?php include'../view/footer.php' ?>







