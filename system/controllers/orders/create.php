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
    $arr_values[] = "'" . $value . "'";
}

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
    var_dump ($result);
}

?>