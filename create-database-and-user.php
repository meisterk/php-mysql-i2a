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
$sql = "DROP DATABASE IF EXISTS $dbname";
$pdo->exec($sql);
$sql = "CREATE DATABASE $dbname";
$pdo->exec($sql);

// create user
echo 'Try to create user ...<br>';
$sql = "DROP USER IF EXISTS '$dbuser'@'localhost'";
$pdo->exec($sql);
// In GBS: 'with mysql_native_password'
$sql = "CREATE USER '$dbuser'@'localhost' IDENTIFIED with mysql_native_password BY '$dbpassword'";
$pdo->exec($sql);

// create permissions for user
echo 'Try to create permissions ...<br>';
$sql = "GRANT ALL PRIVILEGES ON $dbname.* TO '$dbuser'@'localhost'";
$pdo->exec($sql);