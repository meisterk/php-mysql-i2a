<?php
$dbname = 'testdb';
$dbuser = 'testuser';
$dbpassword = '123';

// connect to MySQL as testuser
$pdo = new PDO(
    "mysql:host=localhost;dbname=$dbname",
    $dbuser,
    $dbpassword
);
// show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);