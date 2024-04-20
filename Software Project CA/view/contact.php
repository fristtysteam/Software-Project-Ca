<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>
<div class="container">
<div class= "row  d-flex justify-content-between mt-5 mb-5">
    <div class="col-md-6 ">
        <div class="card ">
            <div class="card-header">
                <h4>Email User:</h4>
            </div>
        <!--</div>-->

        <div class="card-body">
            <form id="Email_user-Form" method="POST" action="../controller/index.php">
                <!-- IN CASE OF ERROR FORM DATA ENTRY AND PROCCESSING -->
               <!-- <?php// if( isset($_SESSION["error"]))
                    //echo '<div class=" lead text-center text-danger py-1">'.$_SESSION["error"].'</div>'; ?>-->

                <input type="hidden" value="email_user" name="action">
                <!--<input type="hidden"  value="<?php //echo $user['id'] ; ?>-->
                <input type="hidden"  value="">
                <!--<div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>ID:
                    <!--<input class="form-control" id="userId" name="id" value=""  type="hidden"  required>-->
                    <!--<input class="form-control" id="userId" name="id" value=""  type=""  required>-->
                <!--</div>-->
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span> Username:
                    <input class="form-control" id="name" name="name" value="" type="text"  required >
                </div>
                <!--<div class="input-group mb-3">-->
                <!--   <span class="input-group-text"><i class="fa fa-user"></i></span> Name:-->
               <!-- <input class="form-control" id="lastname" name="name"  value="" type="text"  required>-->
                <!--</div>-->

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span> Email:
                    <input class="form-control" id="email" name="email"value=""  type="email"  required>

                </div>
                <div class="form-floating">
                    <textarea
                            class="form-control"
                            id="message"
                            row="5";
                            placeholder="Type message here">
                    </textarea>
                    <label for="floatingTextarea">Meassage:</label>
                </div>
                <div class="input-group mt-3 mb-4 ">
                    <button  class="form-control bg-dark fs-4 text-white"
                             id=""
                             type="submit"
                             name ="email_user"
                             onclick="sendEmail()"

                    >
                        Send
                    </button>
                </div>
                <?php //endif;?>
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-6 ">
        <div class="card ">
            <div class="card-header">
                <h4>View Message:</h4>
            </div>
        </div>

        <div class="card-body">
        </div>
    </div>
</div>
</div>

<!-- Youtube Email video link:    https://www.youtube.com/watch?v=dgcYOm8n8ME   -->


<!-- LOCAL EMAIL.js  SCRIPT LINK -->
<script src="../js/email.js"></script>
<!--EMAILjs LINK  & SCRIPT -->
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script >
<script type="text/javascript">
    (function(){
        emailjs.init({
            publicKey: "KLwUe0hzzj5QH_WEB",
        });
    })();
</script>

<?php include'../view/footer.php' ?>

