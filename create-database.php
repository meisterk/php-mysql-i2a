<?php



$rootpassword = 'mysql';
$pdo = new PDO(
    "mysql:host=localhost",
    'root',
    $rootpassword
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo 'Try to create database ...';
$sql = "CREATE DATABASE testdb";
$pdo->exec($sql);