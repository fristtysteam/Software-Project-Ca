<?php

/*
 * Created on 7/12/2021
 * Author: Julie Olamijuwon
 */

function add_user( $username,$name, $email, $password)
{
    // Check if name is empty, and set a default value if it is
    if (empty($name)) {
        $name = 'Unknown';
    }

    global $db;

    $query = "INSERT INTO users( username, name, email, password) VALUES ( :username, :name, :email, :password)";
    $statement = $db->prepare($query);

    $statement->bindValue(":username", $username);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);

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
    /**
     *
     * Function to check the user email and password & start session        *
     * Parameter email, password                                            *
     *
     * Return True if ok, False otherwise                                   ***/

    global $db;

    $query = "SELECT * FROM users WHERE email = :email AND  password = :password";
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
    return true;
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

