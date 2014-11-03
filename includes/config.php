<?php
require_once "connect.php";

function auto_loader($file){
    require 'classes/' . $file . '.php';    
}
    
spl_autoload_register('auto_loader');

$basis   = new Basis($pdo);
$search  = new Search($pdo);

// Menu's en Content

$header_menu = $basis->get_header_menu();
$footer_menu = $basis->get_footer_menu();
$content     = $basis->get_pagina_content($pagina_id);

// Zoek Selects

$merken       = $search->get_merken();
$modellen     = $search->get_modellen();
$brandstoffen = $search->get_brandstoffen();
$transmissies = $search->get_transmissies();
$prijzen      = $search->get_prijzen();
$kleuren      = $search->get_kleuren();

$currentYear = date("Y");
$startyear   = date("Y") - 30;
$years = range ($currentYear, $startyear);
      
?>