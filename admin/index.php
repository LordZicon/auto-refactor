<?php

include_once "../includes/config-admin.php";

if (!$login->is_gebruiker()) {
    $login->redirect('login.php');
}

$view = new View('../templates/admin/layout.php', array(
    'title'   => 'Admin Panel Home',
    'content' => new View('../templates/admin/index.php', [])
));

echo $view->render();