


<?php

require '../model/databaseConnection.php';
require "../view/nav.php";
$pageTitle ="";
$action =  filter_input(INPUT_POST, 'action');;
if($action == Null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = "login";
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