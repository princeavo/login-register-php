<?php 
$DB_DSN = "mysql:host=localhost;dbname=test";
$DB_USER = "root";
$DB_PASS = "";
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($DB_DSN,$DB_USER,$DB_PASS,$options);
?>