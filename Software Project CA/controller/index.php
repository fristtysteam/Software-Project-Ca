<?php
require('../model/databaseConnection.php');
require ('../model/userDB.php');
require_once '../model/language.php';
require_once '../model/membershipRoles.php';


// Variables
$error = "";
$userId = "";
$usersEmail = "";
$userType = "";
$userName = "";
$loggedInAt = "";
$loggedOutAt = "";
global $users;
// Start session
session_start();

if (isset($_SESSION['userId'])) {
    // Session is active
    $userId = $_SESSION['userId'];
    $usersEmail = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $userType = isset($_SESSION['userType']) ? $_SESSION['userType'] : "";
    $userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
    $loggedInAt = date("Y-m-d h:i:s");
} else {
    // Session is not active
    $userId = "";
    $usersEmail = "";
    $userName = "";
    $userType = "";
}

$currentLanguage = getLanguage();

$action = filter_input(INPUT_POST, 'action');

if ($action == Null) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {

            $action = "login";
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
        //$new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
        //Validate Registration data

       $error = pre_registration_check( $fName, $sName, $email, $password,$password2,$dob);
        //$error = pre_registration_check( $fName, $sName, $email, $password,$password2);
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
    case 'changeRole':
        $user_id = $_SESSION['userId'];
        $new_role = $_GET['user_type'];




        if (changeUserRole($user_id, $new_role)) {
            $_SESSION['userType'] = $new_role;


            header("Location: index.php?action=membership&success=true");
            exit();
        } else {
            header("Location: index.php?action=membership&error=role_change_failed");
            exit();
        }
        break;
    case 'do_login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $userDetails = check_isRegistered_user($email, $password);

        if($userDetails !== null) {
            $_SESSION['userId'] = $userDetails['id'];
            $_SESSION['username'] = $userDetails['username'];
            $_SESSION['userType'] = $userDetails['userType'];

            if($userDetails['userType'] === "admin") {
                header("Location:index.php?action=show_admin");
                exit();
            } elseif ($userDetails['userType'] === "artist") {
                header("Location:index.php?action=artistArtWork");
                exit();
            } else if(in_array($userDetails['userType'], ["basic", "premium", "guest"])) {
                header("Location:index.php?action=shop");
                exit();
            } else {
                header("Location:index.php?action=login");
                exit();
            }
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
    case 'show_admin':
        $pageTitle = "Admin Actions Page";
        include "../view/admin.php";
        break;
    case 'artistArtWork':
        $pageTitle = "Artist Actions Page";
        include "../view/userGallery.php";
        break;
    case 'addUserArt':
        $pageTitle = "Artist Add Art";
        include "../view/userAddArt.php";
        break;
    case 'purchaseTicket':
        $pageTitle = "Purchase Event Ticket";
        include "../view/purchaseEventTicket.php";
        if (isset($_GET['eventId'])) {
            $eventId = $_GET['eventId'];

            $eventDetails = getEventDetails($eventId);

            if ($eventDetails) {
                $eventTitle = $eventDetails['title'];
                $eventVenue = $eventDetails['venue'];

                purchaseTicket($userId, $eventTitle, $eventVenue);

                echo "Your ticket has been bought, Check your orders to see it";
            } else {
                header("Location: ../view/error.php");
                exit();
            }
        }
        break;



    case 'membership':
        $pageTitle = "Membership Page";
        include "../view/membership.php";
        break;
    case 'shop':
        $pageTitle = "Shop Page";
        include "../view/shop.php";
        break;
    case 'adminViewProducts':
        $pageTitle = "Admin View Products";
        include "../view/viewProducts.php";
        break;
    case 'adminViewArt':
        $pageTitle = "Admin View Art";
        include "../view/adminViewArt.php";
        break;
    case 'adminViewEvents':
        $pageTitle = "Admin View Events";
        include "../view/adminViewEvents.php";
        break;
    case 'adminAddProducts':
        $pageTitle = "Admin Add Products";
        include "../view/adminAddProduct.php";
        break;
    case 'adminAddArt':
        $pageTitle = "Admin Add Art";
        include "../view/adminAddArt.php";
        break;
    case 'adminAddEvents':
        $pageTitle = "Admin Add Events";
        include "../view/adminAddEvent.php";
        break;
    case 'checkout':
        $pageTitle = "checkout";
        include "../view/checkout.php";
        break;
    case 'adminEditProducts':
        $pageTitle = "Admin Edit Products";
        include "../view/adminEditProduct.php";
        break;
    case 'adminEditEvent':
        $pageTitle = "Admin Edit Events";
        include "../view/adminEditEvent.php";
        break;
    case 'admin_Edit_Users_Records';

        $pageTitle = "Admin Edit Users Details";
        //$users = getAllUsers();

        include "../view/adminListUsers.php";
        break;
    case 'show adminEditUser';
        $pageTitle = "Edit Users Details";
        //$users = getSingleUser();
        include "../view/adminEditUser.php";
        break;
    case 'edit_user';
        if(isset($_GET['id']))
        {
        $id = $_GET['id'];
        $user  = getSingleUserById($id);
            if($user === null)
            {
                echo 'Record Not Found';
            }
        }
       // $id = filter_input(INPUT_POST, 'id');
        //$user = getSingleUserById($id);
        include "../view/adminEditUser.php";
        break;
    case 'update_user_detail';
        $id = filter_input(INPUT_POST, 'id');
        //if($id !=null){echo' Confirm Delete'."".$id}
        $username = filter_input(INPUT_POST, 'username');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $usertype = filter_input(INPUT_POST, 'userType');

       // update_userDetail($id,$username,$name,$email, $usertype)
        break;
    case 'delete_user';
        $id = filter_input(INPUT_POST, 'id');
        //if($id !=null){echo' Confirm Delete'."".$id}
        deleteClient($id);
        break;

    case 'gallery':
        $pageTitle = "Gallery Page";
        include "../view/gallery.php";
        break;
    case 'usergallery':
        $pageTitle = "User Gallery Page";
        include "../view/userGallery.php";
        break;
    case 'events':
        $pageTitle = "Event Page";
        include "../view/event.php";
        break;
    case 'orders':
        $pageTitle = "Orders Page";
        include "../view/showMyOrders.php";
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

    case 'deleteProduct':
        if(isset($_GET['id'])) {
            $productId = $_GET['id'];
            deleteProduct($productId);
        }
        header("Location: index.php?action=adminViewProducts");
        exit();
    default:
        $error = "Unknown action value:" . $action;
        include '../view/error.php';
        break;
}
?>
