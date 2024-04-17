<?php
include "../view/nav2.php";
include '../view/header.php';

function getCartItems() {
    global $cartModel;
    return isset($_SESSION['userId']) ? $cartModel->getCartItems($_SESSION['userId']) : [];
}

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="home.php" class="text-white">
               Home /
            </a>
            <a href="checkout_2.php" class="text-white">
                Checkout
            </a>

        </h6>

    </div>

</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Basic Details:</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" placeholder="Enter full name" class="form-control"/>

                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="text" name="email" placeholder="Enter your email" class="form-control"/>

                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" placeholder="Enter your phone number" class="form-control"/>

                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" placeholder="Enter your pin code" class="form-control"/>

                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea type="text" name="name" placeholder="Enter full name" class="form-control" rows="5"></textarea>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <h5>Your Order Details:</h5>
                        <hr class=" ">

                        <div class="row align-items-center ">
                            <div class="col-md-4  fw-bolder mb-3">
                                <h6>Product</h6>

                            </div>
                            <div class="col-md-3 text-center  fw-bold mb-3">
                                <h6>Quantity</h6>

                            </div>
                            <div class="col-md-3 text-center fw-bolder mb-3">
                                <h6>Price</h6>

                            </div>

                        </div>
                            <?php $cartItems = getCartItems();
                            $totalPrice = 0;
                            foreach ($cartItems as $item) {

                            }
                             ?>
                            <div class="card product_data shadow-sm mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h5><?=$item['name'] ?></h5>

                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h5><?=$item['quantity'] ?></h5>

                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h5>€<?=$item['price'] ?></h5>

                                    </div>

                                </div>

                            </div>
                        <?php
                        $totalPrice += $item['price'] * $item['quantity'];
                        ?>
                        <hr>
                        <h5>Total Price: <span class="float-end fw-bold"><?php echo"€". $totalPrice ?></span></h5>
                        <div class="">
                            <button class="btn btn-primary mt-3 w-100">Confirm and Place Order</button>
<!-- Video Link:    https://www.youtube.com/watch?v=J57UB6nT4UU -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>






<?php include '../view/footer.php';