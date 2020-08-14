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
<div class="flex-box">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="item">
            <div class="item-photo">
                <img src="<?= $row['photo'] ?>">
            </div>
            <div>
                <b>
                    <?= $row['title'] ?>
                </b>            
            </div>
            <div>
                <?= $row['price'] ?> руб.
            </div>
        </div>   
    <?php endwhile; ?>
</div>


<?/* while($row = mysqli_fetch_assoc($result)){ ?> 
    короткая запись если в php.ini сервера short_open_tag=On
<? } */?>