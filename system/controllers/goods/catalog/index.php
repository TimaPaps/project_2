<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Unit.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Good.php');
//подключение файла единожды для подключения к DB
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');

//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB)
    $result = mysqli_query($link, "SELECT * FROM `core_goods`");

//проверка подключения
    //var_dump($result);

//закрытие соединения 
    mysqli_close($link);
    
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/head_doctype.php');
?>

<!--создание карточки товара-->
<div class="flex-box flex-wrap">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <?php
            $good = new Good();
            $good->getId($row['id']);
            //убираем строку используя переопределение метода setTable из Unit в Article   $good->getTable('core_goods'); //вызов метода с пробросом названия нужной таблицы в класс Unit с универсальным методом для выбора нужной таблицы из DB
        ?>
        <div class="item padding-30">
            <div class="item-photo">
                <img src="<?= $good->photo() ?>">
            </div>
            <div class="padding-10">
                <b>
                    <?= $good->title() ?>
                </b>            
            </div>
            <div class="padding-10">
                <?= $good->price() ?> руб.
            </div>
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