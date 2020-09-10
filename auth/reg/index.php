<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

?>
<form action="../../system/controllers/users/reg.php" method="GET">
    <div>
        <input type="text" name="login" id="" placeholder="Логин">
    </div>
    <div>
        <input type="text" name="email" id="" placeholder="E-mail">
    </div>
    <div>
        <input type="password" name="password" id="" placeholder="Пароль">
    </div>
    <div>
        <button>Зарегистрироваться</button>
    </div>
    <div>
        или <a href="../index.php">Войти</a>
    </div>
</form>


<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>