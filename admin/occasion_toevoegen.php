<?php

include_once "../includes/config-admin.php";

if (!$login->is_gebruiker()) {
    $login->redirect('login.php');
}

$huidigjaar = date("Y");
$startJaar  = date("Y") - 40;

$data = [
    'naam'         => $session->get('naam'),
    'merken'       => $selects->get_merken(),
    'modellen'     => $selects->get_modellen(),
    'transmissies' => $selects->get_transmissies(),
    'brandstoffen' => $selects->get_brandstoffen(),
    'kleuren'      => $selects->get_kleuren(),
    'maanden'      => $selects->get_maanden(),
    'huidigjaar'   => $huidigjaar,
    'startJaar'    => $startJaar,
    'jaren'        => range ($huidigjaar, $startJaar),
    'errors'       => $session->getOnce('errors'),
];

$view = new View('../templates/admin/layout.php', array(
    'title'   => 'Admin Panel Home',
    'content' => new View('../templates/admin/occasion_toevoegen.php', $data)
));

echo $view->render();