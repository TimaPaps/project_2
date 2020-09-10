<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

?>
<form action="../system/controllers/users/auth.php" method="GET">
    <div>
        <input required type="text" name="login" id="" placeholder="Логин или E-mail">
    </div>
    <div>
        <input required type="password" name="password" id="" placeholder="Пароль">
    </div>
    <?php if (isset($_GET['wrong'])): ?>
        <div style="color: red;">
            Неверный логин или пароль
        </div>
    <?php endif; ?>
    <div>
        <button>Войти</button>
    </div>
    <div>
        или <a href="reg/index.php">зарегистрироваться</a>
    </div>
</form>


<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>