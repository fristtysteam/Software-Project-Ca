<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
require_once '../model/userDB.php';
// Variables
$error = "";
$userId = "";
$usersEmail = "";
$userType = "";
$userName = "";
$loggedInAt = "";
$loggedOutAt = "";

// need to check if a session is active
session_start();

if( isset($_SESSION['userId']) != Null) {
    // ok there is a session active.
    $userId = $_SESSION['userId'];
    $usersEmail = $_SESSION['email'];
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['userName'];
    $loggedInAt = date("Y-m-d h:i:s");
//echo $userName ."" , $loggedInAt ;
    //printf($userName ."" , $loggedInAt );
    // Session cookies to db
    //saveSessionData($userId,$userName,$userType,$loggedInAt);

}else {
    $userId = "";
    $usersEmail = "";
    $userName = "";
    $userType = 0;
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
            //$action ="cart";
        }
    }
}

switch ($action) {
    case 'showRegister':
        $pageTitle = "Registration Page";
        include "../view/showRegister.php";
        break;

        //  CHECK NEW MEMBER ENTER REQUIRED DETAILS BEFORE SUBMIT
    case 'check_signupData';
        $pageTitle = "Signup Page";
        $newUser =
            //include '../view/show_signup.php';
            include '../view/showRegister.php';
        break;

    case 'register':
        //$username = filter_input(INPUT_POST, 'username');
        //$name = filter_input(INPUT_POST, 'name');
        $fName = filter_input(INPUT_POST, 'fname');
        $sName = filter_input(INPUT_POST, 'sname');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $password2 = filter_input(INPUT_POST, 'confirm_password');
        $dob = filter_input(INPUT_POST,'birthdate');
        //Validate Registration data

       // $error = pre_registration_check( $fName, $sName, $email, $password,$password2,$dob);
        $error = pre_registration_check( $fName, $sName, $email, $password,$password2);
        //if($error < 1){
        if($error === null){
            $username = $fName." ".$sName;
          //  if (add_user($fName, $sName, $email, $password) == true){
            if (add_user($fName, $sName, $email, $password,$dob) == true){
            //if (add_user($username,$email, $password, dob$) == true){
                //header("Location:?action=login.php");
                header("Location:index.php?action=login");
                exit();
            }else {
                //header("Location:?action=showRegister.php");
                header("Location:index.php?action=showRegister");
                exit();
                //User name equals FirstName and LastName
                //$username = ($fName . " " . $sName) ;
                //printf($username);
            }
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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');


        $userDetails = check_isRegistered_user($email, $password);

        if($userDetails !== null) {
            // Debugging: Check user details
            var_dump($userDetails);

            $user = $_SESSION['username'] = $userDetails['username'];
            $userType = $_SESSION['userType'] = $userDetails['userType'];
            if($userType === "admin") {
                header("Location:index.php?action=show_admin");
                exit();
            } elseif ($userType === "artist") {
                header("Location:index.php?action=artist_action");
                exit();
            } else if(in_array($userType, ["basic", "premium", "guest"])) {
                header("Location:index.php?action=shop");
                exit();
            } else {
                header("Location:index.php?action=login");
                exit();
            }
        }
        //
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
    case 'show_admin':
        $pageTitle = "Admin Actions Page";
        include "../view/admin.php";
        break;
    case 'artist_action':
        $pageTitle = "Artist Actions Page";
        include "../view/artistActions.php";
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
    case 'events':
        $pageTitle = "Event Page";
        include "../view/event.php";
        break;
    case 'cart':
        $pageTitle = "Cart Page";
        include "../view/cart.php";
        break;
    /*case 'add_item_toCart':
        break;*/
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
