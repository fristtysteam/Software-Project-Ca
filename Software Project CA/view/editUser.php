<!------------------------------
    CREATED: January 2024
    AUTHOR:  Julie Olamijuwon
-------------------------------->
<! CRUD Video Link:- https://www.youtube.com/watch?v=ExW0bYNMTlo -->
<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>

<div class= "row justify-content-center">
    <div class="col-md-6 ">
        <div class="card ">
            <div class="card-header">
                <h4>Edit User Details:</h4>
            </div>
        </div>

        <div class="card-body">
            <?php
            if(isset($_GET['id'])):
            $id = $_GET['id'];
            //if(isset($_GET['id']) && isset($_SESSION['id'])):
                //if(isset($HTTP_SESSION_VARS['id']))
               /* if(isset($_GET['id'])):
                $id = $_GET['id'];
                //$id = $HTTP_SESSION_VARS['id'];
                $user  = getSingleUserById($id);
                // print_r($user);
            if (isset($user)) {
                //$name = [$user['username']];
                    echo $user['username'];
            }
                 //echo $name;
            ?>

               <?php if($user === null):?>
                    //if(isEmpty($user));?>
                     <h4>Record Not Found</h4>

                */?>
               <?php //else: ?>



                    <form id="update_user-Form" method="POST" action="../controller/index.php">
                        <!-- IN CASE OF ERROR FORM DATA ENTRY AND PROCCESSING -->
                        <?php if( isset($_SESSION["error"]))
                        echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["error"].'</div>'; ?>

                            <input type="hidden" value="update_user_detail" name="action">
                            <!--<input type="hidden"  value="<?php //echo $user['id'] ; ?>-->
                            <input type="hidden"  value="<?php echo $id ; ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>ID:
                            <!--<input class="form-control" id="userId" name="id" value="<?php echo $user['id'] ?? ''; ?>"  type="hidden"  required>-->
                            <input class="form-control" id="userId" name="id" value="<?php echo $user['id'] ?? ''; ?>"  type=""  required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span> Username:
                            <input class="form-control" id="username" name="username" value="<?php echo $user['username'] ?? ''; ?>" type="text"  required >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span> Name:
                            <input class="form-control" id="lastname" name="name"  value="<?php echo $user['name'] ?? ''; ?>" type="text"  required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span> Email:
                            <input class="form-control" id="email" name="email"value="<?php echo $user['email'] ?? ''; ?>"  type="text"  required>

                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span> Usertype:
                            <input class="form-control" id="username" name="userType" value="<?php echo $user['userType'] ?? ''; ?>" type="text"  required >
                        </div>
                        <div class="input-group mt-5 ">
                            <button  class="form-control bg-dark fs-4 text-white"
                                     id=""
                                     type="submit"
                                     name ="update_user_detail"

                            >
                                Submit
                            </button>
                        </div>
                        <?php endif;?>
                    </form>

           <?php //endif; ?>

       </div>
    </div>
</div>

<?php
/* }
 }
 else
 {?>
 <h4>Record Not Found</h4>

 <?php

 }*/
?>

<?php include'../view/footer.php' ?>