<?php
try 
{
    $pdo = new PDO('mysql:host=localhost;dbname=autopasson_db;charset=utf8', 'root', 'root');
} 
catch (PDOException $e)
{
    echo 'Er is een database fout opgetreden.';
    exit();
}