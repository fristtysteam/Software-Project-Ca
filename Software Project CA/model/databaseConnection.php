<?php
$host =  'localhost';
$user = 'root';
$password = '';
$dbname = 'artgallery';

// Set DSN

$dsn = 'mysql:host='. $host .';dbname='. $dbname;
try {
    // Create a PDO instance

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}