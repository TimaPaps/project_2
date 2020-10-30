<?php

function classLoader($class) {

    $class = str_replace('\\','/',$class);
        
    require_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/' . $class . '.php');
}

spl_autoload_register('classLoader');

?>