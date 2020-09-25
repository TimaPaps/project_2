<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');


$result = (new \Project\Core\Good())->getElements();

?>

<main class="wrapper">
    <div class="text-align-center margin-top-60 margin-bottom-60">
        <h1 class="text-up">Ваша корзина</h1>
        <p class="text-i">Товары резервируются на ограниченное время</p>
    </div>

    <!--создание карточки товара-->
    <div class="nav">
        <? if (isset($_SESSION['basket']) && count($_SESSION['basket'])) { ?>
            <div class="basket-row padding-5-30 text-up text-12px text-gray">
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
                <div class="basket-row padding-5-30">
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
                        <div class="width-20 padding-10 cursor-pointer" data-id="<?= $id ?>" onclick="fromBasket()" class="good-delete">
                            X
                        </div>
                    </div>
                </div>   
            <?php endforeach; ?>
            <div class="flex-box justify-content-center padding-30">
                <p class="margin-0 padding-5 width-45 text-align-end">Итого:</p>
                <p class="margin-0 padding-5 width-45 text-orangered">12500 руб.</p>
            </div>
            <div class="text-align-center margin-top-30 padding-10 text-orange-important">
                <a href="system/controllers/basket/clear_basket.php">очистить корзину</a>
            </div>
        <? } else { ?>
            <div class="text-align-center">
                <p class="padding-30">Ваша корзина пуста</p> 
            </div>
        <? } ?>
    </div>
        
    <div class="flex-box justify-content-center margin-40">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="arrow-down"></div>
        <?php endfor; ?>
    </div>
    <div class="text-align-center margin-bottom-40">
        <h2 class="text-up h2-32px">Адрес доставки</h2>
        <p class="text-i">Все поля обязательны для заполнения</p>
    </div>
    
    <form class="wrapper-700" action="/system/controllers/orders/create.php" method="GET">
        <div class="padding-10 margin-bottom-60 nav">  
            <p class="margin-0 padding-10-0 text-up text-gray">Выберите вариант доставки</p>        
            <div class="select-pay">Курьерская служба - 500 руб.</div>
            <div class="z-index-1">
                <ul>
                    <li><a href="#">Почта России</a></li>
                    <li><a href="#">Транспортная компания</a></li>
                </ul>
            </div>
        </div>
        <div class="flex-box space-between">
            <div class="width-45">
                <p class="margin-0 padding-10">Имя</p>
                <input class="width-100" required type="text" name="first_name">
            </div>
            <div class="width-45">
                <p class="margin-0 padding-10">Фамилия</p>
                <!--<input class="width-100" type="text" name="surname">-->
            </div>
        </div>
        <div>
            <p class="margin-0 padding-10">Адрес</p>
            <!--<input class="width-100" type="text" name="adress">-->
        </div>
        <div class="flex-box space-between">
            <div class="width-45">
                <p class="margin-0 padding-10">Город</p>
                <!--<input class="width-100" type="text" name="city">-->
            </div>
            <div class="width-45">
                <p class="margin-0 padding-10">Индекс</p>
                <!--<input class="width-100" type="text" name="city_index">-->
            </div>
        </div>
        <div class="flex-box space-between">
            <div class="width-45">
                <p class="margin-0 padding-10">Телефон</p>
                <input class="width-100" required type="tel" name="phone">
            </div>
            <div class="width-45">
                <p class="margin-0 padding-10">E-mail</p>
                <input class="width-100" required type="email" name="email">
            </div>
        </div>
        <div class="flex-box justify-content-center margin-40">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="arrow-down"></div>
            <?php endfor; ?>
        </div>
        <div class="text-align-center margin-bottom-40">
            <h2 class="text-up h2-32px">Варианты оплаты</h2>
            <p class="text-i">Все поля обязательны для заполнения</p>
        </div>
        <div class="flex-box justify-content-center">
            <div class="width-100">
                <div class="flex-box justify-content-center">
                    <p class="margin-0 padding-5 width-45 text-align-end">Стоимость:</p>
                    <p class="margin-0 padding-5 width-45">12500 руб.</p>
                </div>
                <div class="flex-box justify-content-center">
                    <p class="margin-0 padding-5 width-45 text-align-end">Доставка:</p>
                    <p class="margin-0 padding-5 width-45">500 руб.</p>
                </div>
                <div class="flex-box justify-content-center text-orangered margin-bottom-40">
                    <p class="margin-0 padding-5 width-45 text-align-end">Итого:</p>
                    <p class="margin-0 padding-5 width-45">1700000 руб.</p>
                </div>
                <div class="padding-10 margin-bottom-60 nav">  
                    <p class="margin-0 padding-10-0 text-up text-gray">Выберите способ оплаты</p>        
                    <div class="select-pay">Банковская карта</div>
                    <div class="z-index-1">
                        <ul>
                            <li><a href="#">Наложенный платеж</a></li>
                            <li><a href="#">Наличными при получении</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-box justify-content-center">
            <button class="btn-10-30-orange margin-top-40 margin-bottom-40">Заказать</button>
        </div>
    </form>
</main>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>