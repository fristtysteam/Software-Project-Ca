<?php
session_start();

require_once 'databaseConnection.php';
require_once 'userDb.php'; // Assuming userDb.php contains the necessary functions for user authentication

$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'do_login':
        // Logic for logging in user
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
            if (check_isRegistered_user($email, $password)) {
                $_SESSION['email'] = $email;
                header("Location: index.php?action=galleries");
                exit();
            } else {
                header("Location: index.php?action=showRegister");
                exit();
            }
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header("Location: login.php"); // Assuming your login page is login.php
            exit();
        }
        break;


    default:
        header("Location: index.php");
        exit();
}
?>
