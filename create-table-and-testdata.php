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
    vorname CHAR(200),
    nachname CHAR(200)
)";
$pdo->exec($sql);

// create testdata 
echo 'Try to create testdata ...<br>';
$sql = "INSERT INTO schueler SET vorname = 'Anna', nachname = 'Arm'";
$pdo->exec($sql);
$sql = "INSERT INTO schueler SET vorname = 'Berta', nachname = 'Bein'";
$pdo->exec($sql);
$sql = "INSERT INTO schueler SET vorname = 'Carla', nachname = 'Copf'";
$pdo->exec($sql);