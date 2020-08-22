<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
/*
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Sprinting.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Jumping.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Throwing.php');

    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Sprinter.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Jumper.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Thrower.php');

    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Decathlete.php');
*/

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

    //var_dump($_SERVER);
?>