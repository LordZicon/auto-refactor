<?php
 
require_once('config-admin.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($login->attempt($_POST['gebruikersnaam'], $_POST['wachtwoord'])) {
        $login->redirect('../admin/index.php');
    }
    else {
        $login->redirect('../admin/login.php?error=' . urlencode('Gebruikersnaam en/of wachtwoord zijn onjuist'));
    }
}
