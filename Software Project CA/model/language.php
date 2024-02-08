<?php
//session_start();

if (!function_exists('setLanguage')) {
    function setLanguage($lang)
    {
        $_SESSION['language'] = $lang;
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

if (!function_exists('getLanguage')) {
    function getLanguage()
    {
        return isset($_SESSION['language']) ? $_SESSION['language'] : 'english'; // Default language if not set
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'set_language') {
    if (isset($_POST['language'])) {
        setLanguage($_POST['language']);
    }
}
?>
