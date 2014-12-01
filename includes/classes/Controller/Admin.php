<?php

class Controller_Admin
{
    protected $pageId;
    protected $layout = 'admin/layout';

    protected $page;
    protected $user;
    protected $reset;
    protected $occasion;
    protected $session;

    public function __construct()
    {
        $pdo = Db::getInstance();

        $this->reset    = new Reset($pdo);
        $this->user     = new Model_User($pdo);
        $this->selects  = new Selects($pdo);
        $this->page     = new Basis($pdo);
        $this->occasion = new Model_Occasion($pdo);
        $this->session  = new Session;

        if ( ! $this->user->is_gebruiker() ) {
            $this->user->redirect('/admin/login');
        }
    }

    protected function render($template, $data = array())
    {
        $layoutData = array(
            'body_class'   => 'admin',
            'content_menu' => $this->page->get_content_menu(),
            'content'      => new View($template.'.php', $data)
        );

        $view = new View($this->layout.'.php', array_merge($layoutData, $data));
        echo $view->render();
    }
}