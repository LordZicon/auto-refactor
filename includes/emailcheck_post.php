<?php
 
require_once('config.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($reset->attempt($_POST['email'])) {
                       include_once "reset_wachtwoord.php";
        $reset->redirect('../reset_wachtwoord.php?message=' . urlencode('Er is een bericht verzonden om je wachtwoord opnieuw in te stellen.'));
                                
    }
    else {
        $reset->redirect('../reset_wachtwoord.php?message=' . urlencode('Email adres is onjuist'));
    }
}
