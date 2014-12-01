<?php

class Controller
{
    protected $pageId;
    protected $layout = 'layout';
    protected $page;

    public function __construct()
    {
        $this->page = new Model_Basis(Db::getInstance());
    }

    protected function render($template, $data = array())
    {
        $layoutData = array(
            'body_class'  => 'zoeken',
            'meta'        => $this->page->get_pagina_content($this->pageId),
            'header_menu' => $this->page->get_header_menu(),
            'footer_menu' => $this->page->get_footer_menu(),
            'content'     => new View($template.'.php', $data)
        );

        $view = new View($this->layout.'.php', array_merge($layoutData, $data));
        echo $view->render();
    }
}