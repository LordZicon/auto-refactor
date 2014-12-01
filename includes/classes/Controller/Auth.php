<?php

class Controller_Auth extends Controller
{
    public function loginAction()
    {
        $user = new Model_User(Db::getInstance());

        $error = null;

        if ($user->is_gebruiker()) {
            $user->redirect('index.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($user->attempt_login($_POST['gebruikersnaam'], $_POST['wachtwoord'])) {
                $user->redirect('/admin/');
            }

            $error = 'Gebruikersnaam en/of wachtwoord zijn onjuist';
        }

        $view = new View('admin/login.php', compact('error'));
        echo $view;
    }

    public function logoutAction()
    {
        $session = new Session;

        $user = new Model_User(Db::getInstance());

        if (session_destroy()) {
            $user->update_last_login( $session->get('admin') );
            $user->redirect('/admin/login');
        }
    }

}