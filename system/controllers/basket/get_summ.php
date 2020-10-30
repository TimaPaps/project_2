<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

$summ = 0;

if (isset($_SESSION['basket'])) {
    foreach($_SESSION['basket'] as $id) {        
        $good = new \Project\Core\Good($id);
        $summ += $good->price();
   }
   
    echo $summ;
}

?>