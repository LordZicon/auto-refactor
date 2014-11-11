<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'autoloader.php';

Config::setDirectory(__DIR__.'/../config');

$pdo = Db::getInstance();

$page     = new Model_Basis($pdo);
$occasion = new Model_Occasion($pdo);
$search   = new Model_Search($pdo);