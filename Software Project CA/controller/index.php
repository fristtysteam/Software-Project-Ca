<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';

$currentLanguage = getLanguage();

$action = filter_input(INPUT_GET, 'action');

if ($action == Null) {
    $action = "show_home";
}

switch ($action) {
    case 'register':
        $pageTitle = "Registration Page";
        include "../view/register.php";
        break;
    case 'register':

        $name = filter_input(INPUT_POST, 'name');
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if (add_user($name,$username,$email, $password) == true){
            header("Location:?action=login.php");
        }



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
        // Logic for logging in user
        break;
    case 'check_login':
        // Logic for checking login details
        break;
    case 'forgotpassword':
        // Logic for handling forgotten password
        break;
    case 'logout':
        // Logic for logging out user
        break;
    case 'membership':
        // Logic for membership page
        break;
    case 'shop':
        // Logic for shop page
        break;
    case 'galleries':
        // Logic for galleries page
        break;
    case 'set_language_english':
        // Logic for setting language to English
        break;
    case 'set_language_irish':
        // Logic for setting language to Irish
        break;
    default:
        echo "Invalid Action";
        break;
}
?>
