<?php

/*
 * Created on 7/12/2021
 * Author: Julie Olamijuwon
 */
$error = 0;
$error_message = "";
//function pre_registration_check( $fName, $sName, $email, $password,$password2, $dob)
function pre_registration_check( $fName, $sName, $email, $password,$password2)
{
    //if (empty($fName) || empty($sName) || empty($email) || empty($password) ||empty($password2) || empty($dob))
    if (empty($fName) || empty($sName) || empty($email) || empty($password) ||empty($password2) )
    {

        $error = 1;
        echo "Please ensure enter all detail ";
        return $error;
    }
    if ($password !== $password2){
        echo "Password Must be the same";
        $error = 1;
        return $error;
    }

}
function add_user( $fName, $sName, $email, $password, $dob)
//function add_user( $username, $email, $password)
{
    // Check if name is empty, and set a default value if it is
    if (empty($name)) {
        $err = 'Unknown';
    }
    //$username = ($fName . " " . $sName) ;
    global $db;
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users( username, name, email, password) VALUES ( :username, :name, :email, :password)";
  // $query = "INSERT INTO users( username, name, email, password, 'DateOfBirth') VALUES ( :username, :name, :email, :password, :birthday)";
    //$query = "INSERT INTO users( username, email, password) VALUES ( :username, :email, :password)";

    $statement = $db->prepare($query);

    $statement->bindValue(":username", $fName);
    $statement->bindValue(":name", $sName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    //$statement->bindValue(":birthday",$dob);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // Redirect to an error page passing the error message
        header("Location:../View/error.php?msg=" . $ex->getMessage());
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
function check_isRegistered_user($email, $password)
{
    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND password = :password";
    $statement = $db->prepare($query);

    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location:../View/error.php?msg=" . $ex->getMessage());
        exit();
    }

    $user = $statement->fetch();
    $statement->closeCursor();

    $count = $statement->rowCount();
    if ($count != 1) {
        return FALSE;
    }

    return $user;
}

//function check_isRegistered_user($email, $password)
//{
 //   global $db;

   // $query = "SELECT * FROM users WHERE email = :email";
   // $statement = $db->prepare($query);
   // $statement->execute(array(':email' => $email));
   // $user = $statement->fetch(PDO::FETCH_ASSOC);

   // if ($user && password_verify($password, $user['password'])) {
   //     return $user;
   // } else {
      //  return false;


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
    //session_start();

    $user = $statement->fetch();
    $statement->closeCursor();

//Save session variables
    /*$_SESSION['userId'] = $user['id'];
    $_SESSION['userType'] = $user['userType'];

    return $user['userType'];*/
    return $user;
}
function getAllUsers() {

    /*********************************************************************
     * Function to get all users from DB                                 *
     * Parameters: None                                                  *
     * Returns: Query Results array of records of all users              *
     *                                                                   *
     *********************************************************************/

    global $db;

    $query = "SELECT * FROM users ORDER BY id";
    $statement = $db->prepare($query);

    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}
function getUserByType($usertype) {

    /******************************************************************************
     * Function to get all users of same Type from DB                             *
     * Parameters: userType                                                       *
     * Returns: Query Results array of records of all user of the indicated type  *
     *                                                                            *
     ******************************************************************************/

    global $db;

    $query = "SELECT * FROM users WHERE userType = :userType";
    $statement =$db->prepare($query);
    $statement->bindValue(":userType", $usertype);
    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}
function getUserById($id) {

    /******************************************************************************
     * Function to get a user from DB                                             *
     * Parameters: user Id                                                        *
     * Returns: Query Results a record of a single user                           *
     *                                                                            *
     ******************************************************************************/

    global $db;

    $query = "SELECT * FROM users WHERE id = :id";
    $statement =$db->prepare($query);
    $statement->bindValue(":id", $id);
    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
function update_userDetail($fName,$sName,$email,$password, $usertype)
{
    /****************************************************
     *Function to update a user's detail (The default is general user)
     * Parameters email, password
     * Returns true or false
     ****************************************************/

    global $db;

    $query =  "UPDATE users SET useranme = '$fName', name = '$sName', email = '$email', password = '$password',  userType = '$usertype',WHERE email = '$email'";
    print($query);
//$query = "INSERT INTO employees(firstname,surname,email, password) VALUES (:firstname,:surname,:email, :password)";
    // $query = "INSERT INTO employees(firstName, surName, email, password, jobTitle, deptName, userType,status) VALUES (:firstname,:surname,:email, :password, :jobtitle,:dept,:usertype,:status )";
    $statement = $db->prepare($query);
    /*$statement->bindValue(":firstname", $fName);
    $statement->bindValue(":surname", $sName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->bindValue(":jobtitle", $jobTitle);
    $statement->bindValue(":dept", $dept);
    $statement->bindValue(":usertype", $usertype);    $info = $result->fetch_array();
    $statement->bindValue(":status", $status);*/
    try{
        $statement->execute();
    } catch (Exception $ex) {

        // redirect to an error page passing the error message
        //$categories = get_categories();
        header("Location:../View/error.php?msg=" .$ex->getMessage());
        exit();
    }
    $statement->closeCursor();
    return true;
}
function deleteEmployee($userId)
{
    /*******************************************************************
     * Function to delete an user from DB                    *
     * Parameters: the user id                                 *
     * Returns: none                                                   *
     *******************************************************************/

    global $db;
    $query = "DELETE FROM users WHERE id= :id";

    $statement = $db->prepare($query);
    $statement->bindValue(":id", $userId);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }


    $statement->closeCursor();

}

