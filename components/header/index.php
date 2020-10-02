<?php

session_start();

?>

<header class="wrapper flex-box space-between padding-30 align-items-center">
    <div class="flex-box align-items-center">
        <a href="/index.php" class="header-logo"></a>
        <div class="header-nav margin-left-30">
            <a class="<? if(isset($_GET['category_id']) && $_GET['category_id'] == 1) { ?> is-bold <? } ?>" href="/catalog.php?category_id=1">Женщинам</a>
            <a class="<? if(isset($_GET['category_id']) && $_GET['category_id'] == 2) { ?> is-bold <? } ?>" href="/catalog.php?category_id=2">Мужчинам</a>
            <a class="<? if(isset($_GET['category_id']) && $_GET['category_id'] == 3) { ?> is-bold <? } ?>" href="/catalog.php?category_id=3">Детям</a>
            <a class="<? if(isset($_GET['is_new']) && $_GET['is_new'] == 1) { ?> is-bold <? } ?>" href="/catalog.php?is_new=1">Новинки</a>
            <a href="/google_map.php">О нас</a>
        </div>
    </div>
    <div class="flex-box header-user">
        <div class="flex-box align-items-center margin-left-30">
            <div class="header-account header-icon"></div>
            <?php if (isset($_COOKIE['user_id'])) { ?>
                <?php 
                //    $user = new \Project\Core\User($_COOKIE['user_id']); 
                ?>
                Привет, <?php //$user->login() ?> <?= (new \Project\Core\User($_COOKIE['user_id']))->login() ?> (<a class="header-user-out" href="system/controllers/users/logout.php">Выйти</a>)
            <?php } else { ?>
                <a href="/auth/index.php">Войти</a>
            <?php } ?>
        </div>
        <div class="flex-box align-items-center margin-left-30">
            <div class="header-basket header-icon "></div>
            <a href="/basket.php">Корзина (<span id="basket-count"><?= count($_SESSION['basket']) ?></span>)</a> 
        </div>
    </div>
</header>