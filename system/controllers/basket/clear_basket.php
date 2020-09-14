<?php

session_start();

$_SESSION['basket'] = [];

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>