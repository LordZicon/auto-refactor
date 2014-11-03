<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "connect.php";

function auto_loader($file){
    require 'classes/' . $file . '.php';    
}
    
spl_autoload_register('auto_loader');

$reset    = new Reset($pdo);
$user     = new User($pdo);
$selects  = new Selects($pdo);
$page     = new Basis($pdo);
$occasion = new Occasion($pdo);

$session = new Session;

$content_menu = $page->get_content_menu();