<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "12345678";
ini_set("display_errors", "On");
try {
    $connect = new PDO("mysql:host=$servername;dbname=softengine", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>