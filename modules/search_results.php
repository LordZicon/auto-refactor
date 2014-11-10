<?php

$pagina_id = 2;
require_once "../includes/config.php";

$merk              = filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_NUMBER_INT);
$model             = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_NUMBER_INT);
$prijs             = filter_input(INPUT_GET, 'prijs', FILTER_SANITIZE_NUMBER_INT);
$bouwjaar          = filter_input(INPUT_GET, 'bouwjaar', FILTER_SANITIZE_NUMBER_INT);
$transmissie       = filter_input(INPUT_GET, 'transmissie', FILTER_SANITIZE_NUMBER_INT); 
$brandstof         = filter_input(INPUT_GET, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
$kilometers        = filter_input(INPUT_GET, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
$kleur             = filter_input(INPUT_GET, 'kleur', FILTER_SANITIZE_NUMBER_INT); 

$zoek_resultaten = $basis->get_zoek_resultaten($merk,$model,$prijs,$bouwjaar,$transmissie,$brandstof,
    $kilometers,$kleur);

$view = new View('zoek_resultaten.php', compact('zoek_resultaten'));
echo $view->render();
