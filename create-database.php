<?php
$rootpassword = 'mysql';
$dbname = 'testdb';
$dbuser = 'testuser';
$dbpassword = '123';

// connect to MySQL as MySQL-Root
$pdo = new PDO(
    "mysql:host=localhost",
    'root',
    $rootpassword
);
// show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create database
echo 'Try to create database ...<br>';
$sql = "CREATE DATABASE $dbname";
$pdo->exec($sql);

// create user
echo 'Try to create user ...<br>';
$sql = "CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpassword'";
$pdo->exec($sql);

// create permissions for user
echo 'Try to create permissions ...<br>';
$sql = "GRANT ALL PRIVILEGES ON $dbname.* TO '$dbuser'@'localhost'";
$pdo->exec($sql);