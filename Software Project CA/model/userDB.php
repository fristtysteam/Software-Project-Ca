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
function add_user($fName, $sName, $email, $password, $dob)
{
    global $db;

    // Concatenate first name and last name to form the username
    $username = $fName . ' ' . $sName;

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, name, email, password, DateOfBirth) VALUES (:username, :name, :email, :password, :birthday)";
    $statement = $db->prepare($query);

    $statement->bindValue(":username", $username);
    $statement->bindValue(":name", $sName); // Assuming `name` should be the last name
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
function check_isRegistered_user($email, $password)
{
    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND  password = :password";
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

// IF USER DETAIL IS VALID
// START THE SESSION !!
   /* session_start();

    $user = $statement->fetch();
    $statement->closeCursor();

//Save session variables
    $_SESSION['userId'] = $user['id'];
    $_SESSION['userType'] = $user['userType'];

    return $user['userType'];*/
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


