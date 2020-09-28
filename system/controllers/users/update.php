<?php

session_start();
//var_dump($_POST);

//var_dump($_FILES);

$id = (int)$_POST['id'];
/*
var_dump($id);
$pass = $_POST['password'];
var_dump($pass);
*/

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//автоматическое получение данных из полей формы 
//подготовка массивов полей и значений
$arr_fields = [];
$arr_values = [];

//разбор всех пришедших данных
foreach ($_POST as $key => $value) {
/*  //вариант Тимофей
    if ($key != 'id') {
        $arr_fields[] = $key;       
   
        if ($key == 'password') {
            $arr_values[] = "'" . crypt($value) . "'";
            var_dump($arr_values);
        } else {
            $arr_values[] = "'" . $value . "'";
            var_dump($arr_values);
        }
    } 
    */
    //мой вариант
    if ($key != 'id') {
        $arr_fields[] = $key;
        $arr_values[] = "'" . $value . "'";  
        //var_dump($arr_values);
    } 
    if ($key == 'password') {
        $arr_values[count($arr_values)-1] = "'" . crypt($value) . "'";
        //var_dump($arr_values);
    }    
}

//var_dump($arr_fields);
//var_dump($arr_values);

//сборка строки для подстановки в запрос
$str_update = '';

for ($i = 0; $i < count($arr_fields); $i++) {
    $str_update = $str_update . $arr_fields[$i] . '=' . $arr_values[$i] . ',';
}

$str_update = trim($str_update, ',');

//подключаемся к БД и изменяем запрос для 
//подключение файла
$connect = new \Project\Core\Connect();

echo "UPDATE core_users SET $str_update WHERE id=$id  ";

$result = mysqli_query($connect->getConnection(), "UPDATE core_users SET $str_update WHERE id=$id "); //при автоматическом получении данных полей формы
var_dump($result);

if ($result) {
    //echo 'Клиент изменен';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo 'что то пошло не так';
    //var_dump ($result);
}

?>