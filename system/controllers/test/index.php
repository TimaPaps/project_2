<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

$test = new \Project\Test\Test();
$test->drive();

$good_from_library = new \Library\Good();
$good_from_library->showInfo();

$good_from_core = new \Project\Core\Good(2);
echo $good_from_core->price();
?>