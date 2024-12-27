<?php

$db_user="root";
$db_server="localhost";
$db_pass="";
$db_name="neobank";


try {
    $pdo = new PDO("mysql:host=localhost;dbname=neobank", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}





