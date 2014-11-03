<?php

include_once "../includes/config-admin.php";

if (session_destroy()) {
    $user->update_last_login( $session->get('admin') );
    $user->redirect('login.php');
    exit;
}