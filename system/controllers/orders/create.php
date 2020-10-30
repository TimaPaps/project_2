<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//автоматическое получение данных из полей формы 
$arr_fields = [];
$arr_values = [];

foreach ($_GET as $key => $value) {
    $arr_fields[] = $key;
    if ($key == 'city_index' && $value == '') {
        $value = 0;
        $arr_values[] = "'" . $value . "'";
    } else {
        $arr_values[] = "'" . $value . "'";
    }    
}

$arr_fields[] = 'goods';
$arr_values[] = "'" . json_encode($_SESSION['basket']) . "'";

$arr_fields[] = 'publ_time';
$arr_values[] = time();

$str_fields = implode(',', $arr_fields); //сборка строки через запятую из массива
$str_values = implode(',', $arr_values);

//подключаемся к БД и записываем
//подключение файла
$connect = new \Project\Core\Connect();

//создаем новую строчку в таблице
$result = mysqli_query($connect->getConnection(), "INSERT INTO core_orders($str_fields) VALUES($str_values) "); //при автоматическом получении данных полей формы

if ($result) {
    echo 'Ваш заказ успешно оформлен';
} else {
    echo 'что то пошло не так';
}


//Telegram Bot (http://api.telegram.org/bot<token>/method)

$token = 'bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0';

$telegram = new \Project\Core\Telegram($token);

$id = 876440436;
$text = "Поступил новый заказ";
$photo = 'https://cdn.suwalls.com/wallpapers/cartoons/bender-futurama-26246-1920x1200.jpg';
$latitude = 55.045671;
$longitude = 60.107677;

$telegram->sendMessage($id, $text);
$telegram->sendPhoto($id, $photo);
$telegram->sendLocation($id, $latitude, $longitude);

?>