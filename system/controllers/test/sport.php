<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Sprinting.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Jumping.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Throwing.php');

    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Sprinter.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Jumper.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Thrower.php');

    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/trait/Decathlete.php');

    $sprinter = new Sprinter();
    $sprinter->sprinting();

    echo '<br>';

    $jumper = new Jumper();
    $jumper->jump();

    echo '<br>';

    $thrower = new Thrower();
    $thrower->throw();

    echo '<br>';

    $decathlete = new Decathlete();
    $decathlete->sprinting();
    echo '<br>';
    $decathlete->jump();
    echo '<br>';
    $decathlete->throw();
?>