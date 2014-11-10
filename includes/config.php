<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connect.php";

function auto_loader($file){
    require 'classes/' . $file . '.php';    
}
    
spl_autoload_register('auto_loader');

$page     = new Basis($pdo);
$occasion = new Occasion($pdo);
$search   = new Search($pdo);


// Zoek Selects

$merken       = $search->get_merken();
$modellen     = $search->get_modellen();
$brandstoffen = $search->get_brandstoffen();
$transmissies = $search->get_transmissies();
$prijzen      = $search->get_prijzen();
$kleuren      = $search->get_kleuren();

$currentYear = date("Y");
$startyear   = date("Y") - 30;
$years       = range ($currentYear, $startyear);

$searchValues = compact('merken', 'modellen', 'brandstoffen', 'transmissies', 'prijzen', 'kleuren', 'years');