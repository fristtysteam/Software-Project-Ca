<?php
require_once 'databaseConnection.php';


$error = 0;
$error_message = "";
function pre_registration_check( $fName, $sName, $email, $password,$password2, $dob)
{
    /***********************************************************
     * Function to Validate user input at time of registration *
     * before saving user detail to DB                         *
     * @param: The user ID.                                    *
     * @Return: There user record.                             *
     ***********************************************************/

    if (empty($fName) || empty($sName) || empty($email) || empty($password) ||empty($password2) || empty($dob))
    {

        $error = 1;
        echo "Please ensure enter all detail ";
        return $error;
    }
    else if ($password !== $password2){
        echo "Password Must be the same";
        $error = 1;
        return $error;
    }

}
function add_user($fName, $sName, $email, $password, $dob)
{
    global $db;

    // Concatenate first name and last name to form the username
    $username = $fName . ' ' . $sName;

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (username, name, email, password, DateOfBirth) VALUES (:username, :name, :email, :password, :birthday)";
    $statement = $db->prepare($query);

    $statement->bindValue(":username", $username);
    $statement->bindValue(":name", $sName); // Assuming name should be the last name
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $hashedPassword);
    $statement->bindValue(":birthday", $dob);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // Redirect to an error page passing the error message
        header("Location: ../View/error.php?msg=" . $ex->getMessage());
        exit();
    }

    $statement->closeCursor();
    return true;
}

function check_user($email, $password)
{
    /***************************************************************
     * Function to check the user email and password & start session
     * Parameter email, password
     * Return True if ok, False otherwise
     */

    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND " . " password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // redirect to an error page passing the error message
        header("Location:../View/error.php?msg=" . $ex->getMessage());
        exit();
    }
    // To check/count numbers of rows returned
    $count = $statement->rowCount();
    if ($count != 1) {
        // problem either no user or more than one
        return FALSE;
    }
    // IF USER DETAIL IS VALID
    // START THE SESSION !!
    session_start();

    $user = $statement->fetch();
    $statement->closeCursor();

    //Save session variables
    $_SESSION['userid'] = $user['id'];
    $_SESSION['userType'] = $user['userType'];

    return TRUE;

}
function check_newUser($email, $password)
{
    /**

    Function to check the user email and password & start session        *
    Parameter email, password                                            *

    Return True if ok, False otherwise                                   ***/
//$fName,$sName,
    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND "." password = :password";
    $statement = $db->prepare($query);
//$statement->bindValue(":firstname", $fName);
//$statement->bindValue(":surname", $sName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

    try{$statement->execute();}
    catch (Exception $ex) {// redirect to an error page passing the error message
        header("Location:../View/error.php?msg=" .$ex->getMessage());
        exit();
    }$statement->execute();
//    exit();
    // To check/count numbers of rows returned
    $count = $statement->rowCount();
    if(($count == 1)||($count > 1)){
        // problem new user data already exist in db
        $statement->closeCursor();
        //return TRUE;
        echo "Enter a different Email and Password";
        return true;
    }
}
function check_isRegistered_user($email, $password) {
    global $db;

    // Select user by email
    $query = "SELECT * FROM users WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    //print_r($user);
    // If no user found with the given email
    if (!$user) {
        echo "Email not found";
        return null; // User with given email not found
    }
    /*TESTING
    echo $user['password'];
    echo "<br> ";
    echo $password;*/
    // Verify the provided password against the hashed password retrieved from the database.
    if (password_verify($password, $user['password'])) {
        echo "Password matched"; // For debugging purposes
        return $user; // Return the user data if password matches
    } else {
        echo "Password does not match"; // For debugging purposes
        return null; // Incorrect password
    }
}

function pre_login_check($email, $password)
{
    /************************************************************************
     * Function to check the user email and password before login & start session        *
     * Parameter email, password                                            *
     * Return True if ok, False otherwise                                   *
     ************************************************************************/

    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND " . " password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // redirect to an error page passing the error message
        header("Location:../View/error.php?msg=" . $ex->getMessage());
        exit();
    }
// To check/count numbers of rows returned
    $count = $statement->rowCount();
    if ($count != 1) {
        // problem either no user or more than one
        return FALSE;
    }
// IF USER DETAIL IS VALID
// START THE SESSION !!
    session_start();

    $user = $statement->fetch();
    $statement->closeCursor();

//Save session variables
    $_SESSION['userId'] = $user['id'];
    $_SESSION['userType'] = $user['userType'];

    return $user['userType'];
}
function getAllUsers() {

    /***********************************************************
     * Function to get all users record from DB                *
     * Parameters: None                                        *
     * Returns: An array of users records                      *
     ***********************************************************/

    global $db;
    $query = "SELECT * FROM users ORDER BY id";

    $statement =$db->prepare($query);

    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    // Retrieve user record from db
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $users;

}
function getSingleUserById($userId) {

    /***********************************************************
     * Function to get a specific user record from DB          *
     * Parameters: the user ID                                 *
     * Returns: the record                                     *
     ***********************************************************/

    global $db;
    $query = "SELECT * FROM users WHERE id = :id";
    //$query = "SELECT * FROM users WHERE id = $userId";
    $statement =$db->prepare($query);
    $statement->bindValue(":id", $userId);
    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    // Retrieve user record from db
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    //$user = $statement->fetch();
    $statement->closeCursor();
    return $user;

}
function update_userDetail($id,$fName,$sName,$email, $usertype)
{
    /****************************************************
     *Function to edit/update a user's record
     * Parameters username, name, email, password, usertype
     * Returns true or false
     ****************************************************/

    global $db;

    //$query =  "UPDATE users SET username = '$fName', name = '$sName',email = '$email', userType = '$usertype',  WHERE id = '$id' ";
    $query = "UPDATE users SET username = :username, name = :name, email = :email, usertype = :usertype WHERE id = :id";

    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':username', $fName);
        $statement->bindParam(':name', $sName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':usertype', $usertype);

        $statement->execute();

    } catch (Exception $ex) {

        // redirect to an error page passing the error message
        //$categories = get_categories();
        header("Location:../View/error.php?msg=" .$ex->getMessage());
        //include "../View/editUser.php"; echo "Problem updating record !";
        exit();
    }
    $statement->closeCursor();
    return true;
}



function deleteUser($userId){
    /*******************************************************************
     * Function to delete a client record from DB                      *
     * Parameters: the user's id                                       *
     * Returns: none                                                   *
     *******************************************************************/

    global $db;
    $query = "DELETE FROM users WHERE id= :id";

    $statement= $db->prepare($query);
    $statement->bindValue(":id", $userId);
    try{
        $statement->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }


    $statement->closeCursor();

}



