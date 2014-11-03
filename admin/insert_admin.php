<?php

include_once "../includes/config-admin.php";

if (!$user->is_gebruiker()) {
    $user->redirect('login.php');
}

if(isset($_POST['submit'])) {

    $naam           = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
    $email          = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);    
    $gebruikersnaam = filter_input(INPUT_POST, 'gebruikersnaam', FILTER_SANITIZE_STRING);
    $wachtwoord     = filter_input(INPUT_POST, 'gebruikersnaam', FILTER_SANITIZE_STRING);
    $hash           = crypt ("$wachtwoord");
    $role           = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT);

    $sql    = "INSERT INTO admins (naam, email, gebruikersnaam, wachtwoord, role) VALUES (?, ?, ?, ?, ?)";
    $result = $pdo->prepare($sql);
    $count  = $result->execute(array($naam, $email, $gebruikersnaam, $hash, $role));
       
    echo $count."<br>";
    echo crypt($hash);
}

$roles = $user->get_roles();

$view = new View('../templates/admin/layout.php', array(
    'title'   => 'Add Admin User',
    'content_menu' => $content_menu,
    'content' => new View('../templates/admin/add_admin.php', compact('roles'))
));

echo $view->render();