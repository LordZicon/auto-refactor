<?php

class DbModel
{  
    protected $pdo;
            
    function __construct($pdo) {
           $this->pdo = $pdo;
    }
}