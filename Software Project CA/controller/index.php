<?php

require 'model/databaseConnection.php';

$action =  filter_input(INPUT_POST, 'action');;
if($action == Null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = "show_login";
    }

}

switch ($action) {

    case 'register':
        
        break;
    case 'check_register':

        break;
    case 'login':

        break;
    case 'check_login':

        break;
    default:

        break;
}