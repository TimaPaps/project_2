<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
/*
    require_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Connect.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/UnitActions.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Unit.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Good.php');
*/
/*
//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB)
    $connect = new Connect();
    $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_articles`");
*/

//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB используя метод getElements из Unit.php)
    $result = (new \Project\Core\Good())->getElements();

    include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
?>

<!--создание карточки товара-->
<div class="flex-box flex-wrap nav">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <?php
            $good = new \Project\Core\Good($row['id']);
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
            <!--<div>
                <?= \Project\Core\Good::getQuality() ?>
            </div>
            <div>
               <? if (\Project\Core\Good::$has_good) {?>
                    Товар в наличии
                <? } ?>
            </div>
            <div>
               <? if (\Project\Core\Good::$has_good) {?>
                    Товар в наличии <?= \Project\Core\Good::$has_good ?>
                <? } ?>
            </div>
            <div>
               <? if (\Project\Core\Good::HAS_GOOD) {?>
                    Товар не в наличии
                <? } ?>
            </div>-->
        </div>   
    <?php endwhile; ?>
</div>

<!--создание карточки товара-->
<!--<div class="flex-box flex-wrap">
    ?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="item padding-30">
            <div class="item-photo">
                <img src="?= $row['photo'] ?>">
            </div>
            <div class="padding-10">
                <b>
                    ?= $row['title'] ?>
                </b>            
            </div>
            <div class="padding-10">
                ?= $row['price'] ?> руб.
            </div>
        </div>   
    ?php endwhile; ?>
</div>-->


<?/* while($row = mysqli_fetch_assoc($result)){ ?> 
    короткая запись если в php.ini сервера short_open_tag=On
<? } */?>