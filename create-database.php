<?php


// connect to MySQL as MySQL-Root
$rootpassword = 'mysql';
$pdo = new PDO(
    "mysql:host=localhost",
    'root',
    $rootpassword
);
// show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create database
echo 'Try to create database ...';
$sql = "CREATE DATABASE testdb";
$pdo->exec($sql);