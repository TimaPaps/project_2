<?php

session_start();

//var_dump($_GET);
//var_dump($_SESSION['basket']);

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

//var_dump($arr_fields);
//var_dump($arr_values);

$arr_fields[] = 'goods';
$arr_values[] = "'" . json_encode($_SESSION['basket']) . "'";

$arr_fields[] = 'publ_time';
$arr_values[] = time();

$str_fields = implode(',', $arr_fields); //сборка строки через запятую из массива
$str_values = implode(',', $arr_values);

/*
//ручное получение данных из полей формы 
$email = $_GET['email'];  //данные из формы
$phone = $_GET['phone'];  //данные из формы
$first_name = $_GET['first_name'];  //данные из формы
$goods = json_encode($_SESSION['basket']);  //данные из сессии
$publ_time = time();  //данные из php-фвункции - времени
*/

//подключаемся к БД и записываем
//подключение файла
$connect = new \Project\Core\Connect();

//echo "INSERT INTO core_orders($str_fields) VALUES($str_values) " ;
//var_dump ($connect);
//создаем новую строчку в таблице
$result = mysqli_query($connect->getConnection(), "INSERT INTO core_orders($str_fields) VALUES($str_values) "); //при автоматическом получении данных полей формы

//$result = mysqli_query($connect->getConnection(), "INSERT INTO core_orders(email, phone, first_name, goods, publ_time) VALUES('$email', '$phone', '$first_name', '$goods', '$publ_time') "); //при ручном получении данных полей формы
if ($result) {
    echo 'Ваш заказ успешно оформлен';
} else {
    echo 'что то пошло не так';
    //var_dump ($result);
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


/*
//отправка координат
$latitude = 55.045671;
$longitude = 60.107677;
$url1 = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendLocation?chat_id=$chat_id&latitude=$latitude&longitude=$longitude";
file_get_contents($url1);
*/

//http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/getUpdates

//$chat_id = 876440436;

/*
$text = '<pre>
            Вам пришел заказ <b>test</b>
                <a href="http://project_2/admin/index.php?page=orders">Посмотреть в Личном кабинете</a>    
        </pre>';
*/

/*//несколько сообщений
$text = 'Вам пришел заказ';
$url = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";
file_get_contents($url);

$text = 'Всем привет';
$url = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";
file_get_contents($url);

$text = 'Как дела?';
$url = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";
file_get_contents($url);
*/

/*
$text = 'Вам пришел заказ';
sendMessage($chat_id, $text);

$text = 'Всем привет';
sendMessage($chat_id, $text);

$text = 'Как дела?';
sendMessage($chat_id, $text);

//функция для объединения сообщений
function sendMessage($chat_id, $text) {
    file_get_contents("http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html");
}
*/

/*
function sendMessage($chat_id, $text) {
    $url = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";
    file_get_contents($url);
}
*/

/*
//функция для фото
function sendPhoto($chat_id, $photo) {
    file_get_contents("http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendPhoto?chat_id=$chat_id&photo=$photo");
}

$photo = 'https://cdn.suwalls.com/wallpapers/cartoons/bender-futurama-26246-1920x1200.jpg';
sendPhoto($chat_id, $photo);
*/

/*
$photo = 'https://cdn.suwalls.com/wallpapers/cartoons/bender-futurama-26246-1920x1200.jpg';
$url_photo = "http://api.telegram.org/bot1386249536:AAF65YlrrmUIjfGQNrF29RORd_Ol6qf2tt0/sendPhoto?chat_id=$chat_id&photo=$photo";
file_get_contents($url_photo);
*/

?>