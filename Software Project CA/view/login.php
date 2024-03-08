<?php include '../view/header.php'; ?>
<?php include '../view/nav.php'; ?>

<!--<div class="container">-->
    <div class="row mt-2 bg-secondary">
        <div class="col-lg-4 m-auto">
            <div class="row row-col-md-auto align-items-center text-center mt-5 mb-5 bg-light rounded">
                <h2 class="text-danger">Login</h2>
                <p class="text-muted mt-3">Enter login details below</p>
            </div>
            <?php //echo '<div class=" lead text-center text-danger py-1">'.$php_errormsg.'</div>' ?>
            <!-- Form for login -->
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
                <div class="input-group mt-5">
                    <button class="form-control bg-dark fs-4 text-white" type="submit">Login</button>
                </div>
                <div class="input-group mt-3 mb-5">
                    <button class="form-control bg-dark fs-4 text-white" type="submit" name="action" value="forgotpassword">
                        Forgot Password
                    </button>
                </div>
            </form>
        </div>
    </div>
<!--</div>-->

<?php include '../view/footer.php'; ?>

<!--</body>
</html>-->
