<?php

include 'header.php';
include "nav2.php";
?>

    <div class="container-fluid px-4">
        <h4 class="mt-4">Orders</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">List Of Orders</li>
            <li class="breadcrumb-item">orders</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <?php //if (isset($_SESSION["success"])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php //echo $_SESSION["success"]; ?>
                        <button  type="button" class="btn-close" data-bs-dismiss="alert"  area-label="close" ></button>
                    </div>
                    <?php //unset($_SESSION["success"]); ?>
                <?php //endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>List of Orders</h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Aircode</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $orders =getAllOrders() ;
                            foreach ($orders as $user): ?>
                                <tr>
                                    <td><?php echo $orders["order_id"] ?></td>
                                    <td><?php echo $orders["username"] ?></td>
                                    <td><?php echo $orders["email"] ?></td>
                                    <td><?php echo $orders["phone"] ?></td>
                                    <td><?php echo $orders["address"] ?></td>
                                    <td><?php echo $orders["aircode"] ?></td>
                                    <td>
                                        <!--<button class="btn-success" type="submit" name="update_user" value="$user['id']"><a class='text-light' href="?action=show_adminEditUser&id=<?php //echo $user['id']; ?>">Update </a></button>-->
                                        <button class="btn-success" type="submit" name="" value=" "><a class='text-light' href="?action=show_adminEditUser&id=<?php echo $user['id']; ?>">Update </a></button>

                                    </td>
                                    <td>
                                        <button class="btn-danger" type="submit" name="delete_user"><a class='text-light' href="?action=delete_user&id=<?php echo $user['id']; ?>">delete </a></button>
                                    </td>
                                </tr>




                            <?php endforeach ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>












<?php include'../view/footer.php' ?>
<div>
    <?php echo 'This is View Order List Page'?>
</div>


<?php include 'header.php';
