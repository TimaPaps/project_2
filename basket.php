<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');


$result = (new \Project\Core\Good())->getElements();

?>

<div class="wrapper text-align-center">
    <h1 class="text-up">Ваша корзина</h1>
    <p class="text-i">Товары резервируются на ограниченное время</p>
</div>

<!--создание карточки товара-->
<div class="wrapper nav">
    <? if (isset($_SESSION['basket']) && count($_SESSION['basket'])) { ?>
        <div class="basket-row padding-30 text-up text-12px text-gray">
            <div class="flex-box width-40">
                <div class="padding-10 width-40">Фото</div>
                <div class="padding-10">Наименование</div>
            </div>
            <div class="flex-box width-60 justify-content-flex-end text-align-center">
                <span class="width-20 padding-10">Размер</span>
                <span class="width-20 padding-10">Количество</span>
                <span class="width-20 padding-10">Стоимость</span>
                <span class="width-20 padding-10">Удалить</span>
            </div>
        </div>
        <?php foreach($_SESSION['basket'] as $id): ?>
            <?php
                $good = new \Project\Core\Good($id);
            ?>
            <div class="basket-row padding-30">
                <div class="flex-box width-40 align-items-center">
                    <div class="basket-photo width-40 padding-10">
                        <a href="card.php?id=<?= $good->getField('id') ?>">
                            <img src="<?= $good->photo() ?>">
                        </a>
                    </div>
                    <div class="padding-10">
                        <b class="text-up">
                            <a href="card.php?id=<?= $good->getField('id') ?>">
                                <?= $good->title() ?>
                            </a>
                        </b>   
                        <div class="text-gray">
                            арт. <?= $good->article() ?>
                        </div>         
                    </div>
                </div>
                <div class="flex-box width-60 justify-content-flex-end text-align-center">
                    <div class="width-20 padding-10">
                        M
                    </div>
                    <div class="width-20 padding-10">
                        3
                    </div>
                    <div class="width-20 padding-10">
                        <?= $good->price() ?> руб.
                    </div>
                    <div class="width-20 padding-10" data-id="<?= $id ?>" onclick="fromBasket()" class="good-delete">
                        X
                    </div>
                </div>
            </div>   
        <?php endforeach; ?>
        <div class="text-align-center text-orange-important">
            <a href="system/controllers/basket/clear_basket.php">очистить корзину</a>
        </div>
    <? } else { ?>
        <div class="text-align-center">
            <p class="padding-30">Ваша корзина пуста</p> 
        </div>
    <? } ?>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>