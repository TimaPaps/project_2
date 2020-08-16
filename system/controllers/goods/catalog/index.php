<?php
//подключение файла единожды для подключения к DB
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');

//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB)
    $result = mysqli_query($link, "SELECT * FROM `core_goods`");

//проверка подключения
    //var_dump($result);

//закрытие соединения 
    mysqli_close($link);
?>

<!--создание карточки товара-->
<div class="flex-box flex-wrap">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="item padding-30">
            <div class="item-photo">
                <img src="<?= $row['photo'] ?>">
            </div>
            <div class="padding-10">
                <b>
                    <?= $row['title'] ?>
                </b>            
            </div>
            <div class="padding-10">
                <?= $row['price'] ?> руб.
            </div>
        </div>   
    <?php endwhile; ?>
</div>


<?/* while($row = mysqli_fetch_assoc($result)){ ?> 
    короткая запись если в php.ini сервера short_open_tag=On
<? } */?>