<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB используя метод getElements из Unit.php)
$result = (new \Project\Core\Good())->getElements();

include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');

?>

<!--создание карточки товара-->
<div class="flex-box flex-wrap nav">

    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <?php
            $good = new \Project\Core\Good($row['id']);
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
        </div>   
    <?php endwhile; ?>

</div>