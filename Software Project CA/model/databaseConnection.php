<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'artgallery';
//$dbname = 'gallery';
// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

try {
    // Create a PDO instance
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
