<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('APP_PATH', realpath(__DIR__.'/../'));

include 'autoloader.php';

Config::setDirectory(__DIR__.'/../config');
View::setDirectory(__DIR__.'/../templates');

session_start();

$route = null;
if (isset($_SERVER['REQUEST_URI'])) {
    $route = $_SERVER['REQUEST_URI'];
}

$router = new Router();
$router->start($route);