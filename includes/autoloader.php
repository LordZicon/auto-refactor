<?php

function auto_loader($file)
{
    $file = str_replace('_', '/', $file);
    require 'classes/' . $file . '.php';    
}
    
spl_autoload_register('auto_loader');