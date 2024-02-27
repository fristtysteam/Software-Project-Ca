<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require_once '../model/userDB.php';
// Variables
$userId = "";
$usersEmail = "";
$userType = "";
$userName = "";
$loggedinAt = "";
$loggedOutAt = "";

// need to check if a session is active
session_start();

if( isset($_SESSION['userId']) != Null) {
    // ok there is a session active.
    $userId = $_SESSION['userId'];
    $usersEmail = $_SESSION['email'];
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['userName'];
    $now = new DateTime();
    $loggedinAt = date("Y-m-d h:i:s");

    // Session cookies to db
    saveSessionData($userId,$userName,$userType,$loggedinAt);

}


$currentLanguage = getLanguage();

$action = filter_input(INPUT_POST, 'action');

if ($action == Null) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {

            $action = "login";
            //$action = "show_home";
             //$action = "showRegister";
        }
    }
}

switch ($action) {
    case 'showRegister':
        $pageTitle = "Registration Page";
        include "../view/showRegister.php";
        break;

    case 'register':
        $username = filter_input(INPUT_POST, 'username');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if (add_user($name,$username,$email, $password) == true){
            //header("Location:?action=login.php");
            header("Location:index.php?action=login");
            exit();
        }
        //header("Location:?action=showRegister.php");
        header("Location:index.php?action=showRegister");
        exit();


        break;
    case 'check_register':
        // Logic for checking registration details
        break;
    case 'show_home':
        $pageTitle = "Home Page";
        include "../view/home.php";
        break;
    case 'login':
        $pageTitle = "Login Page";
        include "../view/login.php";
        break;
    case 'do_login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $userDetails = check_isRegistered_user($email, $password);
        if($userDetails !== FALSE) {
            $_SESSION['username'] = $userDetails->username;
            header("Location:index.php?action=shop");
            exit();
        }
        break;
    case 'check_login':

        break;
    case 'forgotpassword':
        break;
    case 'logout':
        $now = new DateTime();
        echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
        echo $now->getTimestamp();
        Session_unset();
        Session_destroy();
        header("Location:index.php?action=login");
        break;
    case 'membership':
        $pageTitle = "Membership Page";
        include "../view/membership.php";
        break;
    case 'shop':
        $pageTitle = "Shop Page";
        include "../view/shop.php";
        break;
    case 'galleries':
        // Logic for galleries page
        $pageTitle = "Galleries Page";
        //include "../view/galleries.php";
        //header("Location:index.php?action=galleries");
        include "../view/galleries.php";
        break;
    case 'cart':
        $pageTitle = "Cart Page";
        include "../view/cart.php";
        break;
    case 'set_language_english':
        // Logic for setting language to English
        break;
    case 'set_language_irish':
        // Logic for setting language to Irish
        break;
    default:
       // echo "Invalid Action";
        $error = "Unknown action value:" . $action;
        include '../view/error.php';

        break;
}
?>
