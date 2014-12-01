<?php

function auto_loader($file)
{
    $file = APP_PATH . '/includes/classes/' . str_replace('_', '/', $file) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } 
}
    
spl_autoload_register('auto_loader');