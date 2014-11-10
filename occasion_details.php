<?php

$pagina_id = 8;
require_once "includes/config.php"; 

$occasion_id = filter_input(INPUT_GET, 'occasion_id', FILTER_SANITIZE_NUMBER_INT);

$layoutData = array(
  'body_class'  => 'zoeken',
  'meta'        => $page->get_pagina_content($pagina_id),
  'header_menu' => $page->get_header_menu(),
  'footer_menu' => $page->get_footer_menu(),
);

$pageData = array(
  'occasion_details' => $occasion->get_details($occasion_id),
  'occasion_photos'  => $occasion->get_photos($occasion_id),
  'update_status'    => $occasion->update_gezien_status($occasion_id),
);

$layoutData['content'] = new View('templates/occasion_details.php', $pageData);

$view = new View('templates/layout.php', $layoutData);
echo $view;