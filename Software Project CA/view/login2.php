<?php include'../view/header.php' ?>
<?php include'../view/nav2.php' ?>
<!--<div class="container">-->
    <div class= "row  d-flex justify-content-center mt-5 mb-5">
        <div class="col-md-6 ">
            <div class="card ">
                <div class="card-header">
                    <h4>Enter Login Detail:</h4>
                </div>
                <!--</div>-->

                <div class="card-body">
                    <form id="login_form" method="POST" action="../controller/index.php">
                        <input type="hidden" value="do_login" name="action">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" id="email" name="email" type="text" placeholder="Email Address" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="input-group mt-5 ">
                            <button  class="form-control bg-dark fs-4 text-white"
                                     id=""
                                     type="submit"
                                     name="action"
                                     value="do_login"
                            >
                                Submit
                            </button>
                        </div>
                        <div class="input-group mt-3 mb-5">
                            <button class="form-control bg-dark fs-4 text-white" type="submit" name="action" value="forgotpassword">
                                Forgot Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<!--</div>-->



<?php include'../view/footer.php' ?>


