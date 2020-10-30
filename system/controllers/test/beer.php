<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
echo \Project\Test\Beer::NAME;

echo '<br>';

echo \Project\Test\Ale::NAME;

echo '<br>---------------<br>';

echo \Project\Test\Beer::getName();

echo '<br>';

echo \Project\Test\Ale::getName();

echo '<br>---------------<br>';

echo \Project\Test\Beer::getStaticName();

echo '<br>';

echo \Project\Test\Ale::getStaticName();

//статические свойства и методы принадлежат КЛАССАМ, но не ОБЬЕКТА
//статические свойства и методы вызываются в контексте от имени КЛАССА с помощью ::
//константы являются статическими переменными
//создаем статические с помощью static
//обратиться внутки класса к статике можно с помощью static и self
//static указывает на тот класс от к-го вызывается
//self указывает на тот класс внутри к-го создан метод

?>