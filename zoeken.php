<?php

$pagina_id = 2; 
require_once "includes/config.php";

$merk              = filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_NUMBER_INT);
$model             = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_NUMBER_INT);
$prijs             = filter_input(INPUT_GET, 'prijs', FILTER_SANITIZE_NUMBER_INT);
$bouwjaar          = filter_input(INPUT_GET, 'bouwjaar', FILTER_SANITIZE_NUMBER_INT);
$transmissie       = filter_input(INPUT_GET, 'transmissie', FILTER_SANITIZE_NUMBER_INT); 
$brandstof         = filter_input(INPUT_GET, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
$kilometers        = filter_input(INPUT_GET, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
$kleur             = filter_input(INPUT_GET, 'kleur', FILTER_SANITIZE_NUMBER_INT); 

$zoek_resultaten = $occasion->zoeken($merk,$model,$prijs,$bouwjaar,$transmissie,$brandstof,
    $kilometers,$kleur); 

$data = array(
  'body_class'     => 'zoeken',
  'meta'           => $page->get_pagina_content($pagina_id),
  'header_menu'    => $page->get_header_menu(),
  'footer_menu'    => $page->get_footer_menu(),
);

$featured_autos = $occasion->get_featured();

$data['content'] = new View('templates/zoeken.php', compact('zoek_resultaten') + $searchValues);

$view = new View('templates/layout.php', $data);
echo $view;