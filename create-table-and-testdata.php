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

// create table
echo 'Try to create table ...<br>';
$sql = "DROP TABLE IF EXISTS schueler";
$pdo->exec($sql);

$sql = "CREATE TABLE schueler (
    id INT PRIMARY KEY AUTO_INCREMENT,
    vorname CHAR(20),
    nachname CHAR(20)
)";
$pdo->exec($sql);