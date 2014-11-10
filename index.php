<?php

$pagina_id = 1; 
require_once "includes/config.php";

$data = array(
  'body_class'     => 'home',
  'meta'           => $page->get_pagina_content($pagina_id),
  'header_menu'    => $page->get_header_menu(),
  'footer_menu'    => $page->get_footer_menu(),
);

$featured_autos = $occasion->get_featured();

$data['content'] = new View('templates/index.php', compact('featured_autos') + $searchValues);

$view = new View('templates/layout.php', $data);
echo $view;