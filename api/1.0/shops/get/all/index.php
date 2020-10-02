<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

$connect = new \Project\Core\Connect(); 

//запрос к DB
$result = mysqli_query($connect->getConnection(), "SELECT * FROM core_shops " );
//var_dump($result);
$arr = [];
//создание ассоциативного массива с данными из DB
while ($info = mysqli_fetch_assoc($result)) {
    //наполнение ассоциативного массива в ручную
    $arr_item = [];
    $arr_item['title'] = $info['title'];
    $arr_item['description'] = $info['description'];
    $arr_item['photo'] = $info['photo'];
    $arr_item['adress'] = $info['adress'];
    $arr_item['latitude'] = $info['latitude'];
    $arr_item['longitude'] = $info['longitude'];
    //запись в массив ассоциативного массива
    $arr[] = $arr_item;
}

//вывод на экран данных в формате json (json для дальнейшей обработки на JS) //называется REST API или JSON API
echo json_encode($arr);

?>