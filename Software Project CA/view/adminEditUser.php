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

        <?php
        /*if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user  = getSingleUserById($id);
            if($user != null)
            {*/
            //$user
            ?>

        <form id="update_user-Form" method="POST" action="../controller/index.php">
            <!-- IN CASE OF ERROR FORM DATA ENTRY AND PROCCESSING -->
            <!--<?php //if( isset($_SESSION["error"])){
             //echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["error"].'</div>'; ?>-->

            <input type="hidden" value="update_user" name="action">
            <!--<input type="hidden"  value="<?php// echo $user['id'] ; ?>-->
             <input type="hidden"  value="<?php echo $user['id']; ?>
            <!--<div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="userId" name="id" value="<?php// echo $user['id'] ?? ''; ?>"  type="hidden" placeholder="ID" required>
            </div>-->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="username" name="username" value="<?php echo $user['username'] ?? ''; ?>" type="text" placeholder="Username" required >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="lastname" name="name"  value="<?php echo $user['name'] ?? ''; ?>" type="text" placeholder="Name" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input class="form-control" id="email" name="email"value="<?php echo $user['email'] ?? ''; ?>"  type="text" placeholder="Email Address" required>

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input class="form-control" id="username" name="userType" value="<?php echo $user['userType'] ?? ''; ?>" type="text" placeholder="UserType" required >
            </div>
            <div class="input-group mt-5 ">
                <button  class="form-control bg-dark fs-4 text-white"
                         id=""
                         type="submit"
                         name="update_user"

                    >
                        Submit
                </button>
            </div>

        </form>
        <?php
       /* }
        }
        else
        {?>
        <h4>Record Not Found</h4>

        <?php

        }*/
        ?>

    </div>


</div>



<!-- https://www.youtube.com/watch?v=J62jv3O9PBw -->



<?php include'../view/footer.php' ?>







