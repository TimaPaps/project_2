<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');


$result = (new \Project\Core\Good())->getElements();

?>


<!--создание карточки товара-->
<div class="wrapper flex-box flex-wrap nav">
    <? if (isset($_SESSION['basket']) && count($_SESSION['basket'])) { ?>
        <?php foreach($_SESSION['basket'] as $id): ?>
            <?php
                $good = new \Project\Core\Good($id);
                //добавляем $row['id'] в аргумент при создании экземпляра класса Article используя в index.php метод public function __construct($id) и убираем строку $good->getId($row['id']);
                //убираем строку используя переопределение метода setTable из Unit в Article   $good->getTable('core_goods'); //вызов метода с пробросом названия нужной таблицы в класс Unit с универсальным методом для выбора нужной таблицы из DB
            ?>
            <div class="item padding-30">
                <div class="item-photo">
                    <a href="card.php?id=<?= $good->getField('id') ?>">
                        <img src="<?= $good->photo() ?>">
                    </a>
                </div>
                <div class="padding-10">
                    <b>
                        <a href="card.php?id=<?= $good->getField('id') ?>">
                            <?= $good->title() ?>
                        </a>
                    </b>            
                </div>
                <div class="padding-10">
                    <?= $good->price() ?> руб.
                </div>
                <div data-id="<?= $id ?>" onclick="fromBasket()" class="good-delete">
                    X
                </div>
            </div>   
        <?php endforeach; ?>
        <div>
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