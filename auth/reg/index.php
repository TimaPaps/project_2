<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

?>
<div class="wrapper flex-box text-align-center">
    <form class="form" action="../../system/controllers/users/reg.php" method="GET">
        <div>
            <input type="text" name="login" id="" placeholder="Логин">
        </div>
        <div>
            <input type="email" name="email" id="" placeholder="E-mail">
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="Пароль">
        </div>
        <div class="padding-10">
            <button  class="btn-10-30-orange">Зарегистрироваться</button>
        </div>
        <p class="margin-0 text-14px">или</p>
        <div class="padding-5 nav text-orange-important">
            <a href="../index.php">Войти</a>
        </div>
    </form>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>