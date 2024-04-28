<?php
include'../view/header.php' ;
include "../view/nav2.php";
?>

    <script>
        function validateSignUp() {
            var fname = document.getElementById("firstname").value.trim();
            var sname = document.getElementById("lastname").value.trim();
            var username = document.getElementById("username").value.trim();
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value.trim();
            var confirm_password = document.getElementById("confirm_password").value.trim();
            var birthdate = document.getElementById("birthdate").value.trim();

            // Validation for empty fields
            if (fname === "" || sname === "" || username === "" || email === "" || password === "" || confirm_password === "" || birthdate === "") {
                alert("All fields are required");
                return false;
            }

            // Validation for password match
            if (password !== confirm_password) {
                alert("Passwords do not match");
                return false;
            }

            // Validation for email format
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            // Validation for password format
            var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must contain at least one digit, one lowercase and one uppercase letter, and at least 8 characters");
                return false;
            }

            // Validation for birthdate
            var currentDate = new Date();
            var selectedDate = new Date(birthdate);
            if (selectedDate >= currentDate) {
                alert("Birthdate must be in the past");
                return false;
            }

            return true;
        }
    </script>


    <div class="row mt-2 bg-secondary">
        <div class="col-lg-4 m-auto">
            <div class=" row row-col-md-auto align-items-center text-center mt-5 mb-5 bg-light rounded">
                <h2 class="text-danger">Enter Register details below</h2>
                <p class="text-muted mt-3">Enter Register details below</p>
            </div>

            <form id="registerForm" method="POST" action="../controller/index.php" onsubmit="return validateSignUp()">
                <?php if( isset($_SESSION["error"])){
                    echo '<div class="lead text-center text-danger py-1">'.$_SESSION["error"].'</div>';
                }?>

                <input type="hidden" value="register" name="action">
                <input type="hidden" value="check_registrationData" id="checkdata" name="action">

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input class="form-control" id="firstname" name="fname" type="text" placeholder="FirstName">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input class="form-control" id="lastname" name="sname" type="text" placeholder="LastName">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" id="email" name="email" type="text" placeholder="Email Address">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password">
                </div>

                <div class="input-group mb-3">
                    <label for="birthdate"><i class="fa fa-birthday">Date of Birth:</i></label>
                    <input class="form-control" type="date" id="birthdate" name="birthdate" required>
                </div>

                <div class="input-group mt-5">
                    <button class="form-control bg-dark fs-4 text-white" type="submit" name="action" value="register">Submit</button>
                </div>
                <div class="input-group mt-3 mb-5">
                    <button class="form-control bg-dark fs-4 text-white" type="submit" name="action" value="forgotpassword">Forgot Password</button>
                </div>
            </form>
        </div>
    </div>

<?php include'../view/footer.php' ?>