<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

echo "можно было оботись без трейта, но для практики сделал трейт, но один со всеми четырьмя методами(не стал плодить трейты)";
echo '<br><br>';

$dog = new \Project\Test\Dog();
echo "я собака: ";
$dog->run();
$dog->sleep();
$dog->eat();
$dog->jump();

echo '<br>';

$cat = new \Project\Test\Cat();
echo "я кошка: ";
$cat->run();
$cat->sleep();
$cat->eat();
$cat->jump();

echo '<br>';

$pig = new \Project\Test\Pig();
echo "я порося: ";
$pig->run();
$pig->sleep();
$pig->eat();
$pig->jump();

?>