<!------------------------------
    CREATED: January 2024
    AUTHOR:  Julie Olamijuwon
-------------------------------->


<?php include'../view/header.php' ?>
<?php include'../view/nav.php' ?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin Operations</li>
            <li class="breadcrumb-item">users</li>
        </ol>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($_SESSION["success"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["success"]; ?>
                    <button  type="button" class="btn-close" data-bs-dismiss="alert"  area-label="close" ></button>
                </div>
                <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4>List of Users</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Email</th>
                                <th scope="col">UserType</th>
                                <th scope="col">Edit</th>
                                <th scope="col" >Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $users =getAllUsers() ;
                        foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user["id"] ?></td>
                                <td><?php echo $user["username"] ?></td>
                                <td><?php echo $user["name"] ?></td>
                                <td><?php echo $user["email"] ?></td>
                                <td><?php echo $user["userType"] ?></td>

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