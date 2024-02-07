<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require "../view/nav.php";

$currentLanguage = getLanguage();
//$pageTitle =
$action =  filter_input(INPUT_POST, 'action');;
if($action == Null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {

        $action = "show_home";
        //$action = "login";
        //$action = "register";
    }

}

switch ($action) {
    // Show Registration page
    case 'register':
        $pageTitle ="Registration Page";
        include "../view/register.php";
        break;
    // Register New user
    case 'do_register':

        break;
    // Check Registration Details before saving New user to Database
    case 'check_register':

        break;

    case 'show_home':
        $pageTitle="Home Page";
        include "../view/home.php";
        break;

    // Show Login Page
    case 'login':
        $pageTitle ="Login Page";
        include "../view/login.php";
        break;
    // Log user in
    case 'do_login':

        break;
    // Check log details  before member login
    case 'check_login':


        break;
    //  Member Forgot login Password
    case 'forgotpassword':


        break;

    // Log user out
    case 'logout':
        /* session_destroy();
         header('Location:?action=login');
         exit();*/
        break;
    default:
        echo "Invalid Action";
        break;
}


?>

