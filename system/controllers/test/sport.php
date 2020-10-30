<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

$sprinter = new \Project\Test\Sprinter();
$sprinter->sprinting();

echo '<br>';

$jumper = new \Project\Test\Jumper();
$jumper->jump();

echo '<br>';

$thrower = new \Project\Test\Thrower();
$thrower->throw();

echo '<br>';

$decathlete = new \Project\Test\Decathlete();
$decathlete->sprinting();
echo '<br>';
$decathlete->jump();
echo '<br>';
$decathlete->throw();

?>