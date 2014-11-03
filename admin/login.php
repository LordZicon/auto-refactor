<?php

include_once "../includes/config-admin.php";

if ($user->is_gebruiker()) {
    $user->redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($user->attempt_login($_POST['gebruikersnaam'], $_POST['wachtwoord'])) {
        $user->redirect('index.php');
    }
    else {
        $user->redirect('login.php?error=' . urlencode('Gebruikersnaam en/of wachtwoord zijn onjuist'));
    }
}

$view = new View('../templates/admin/login.php', $_GET);

echo $view->render();