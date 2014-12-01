<?php

class Controller_Admin_Page extends Controller_Admin
{
    public function indexAction()
    {
        $this->render('admin/index', array(
            'title'   => 'Admin Panel Home'
        ));
    }
}