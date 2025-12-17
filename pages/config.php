<?php
session_start();
$host = "localhost";
$user = "root";
$db = "bbcwebsite";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// require_once __DIR__ . "/sqlcommands.php";

// // create object (available globally after config.php is included)
// $sql = new sqlcommands()

?>