<?php

//var_dump($_POST);

//var_dump($_FILES);

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//автоматическое получение данных из полей формы 
//подготовка массивов полей и значений
$arr_fields = [];
$arr_values = [];

//разбор всех пришедших данных
foreach ($_POST as $key => $value) {
    $arr_fields[] = $key;
    $arr_values[] = "'" . $value . "'";
}

//создание уникального имени файла (чтобы не перезаписывать при совпадении имен)
//разделение строки (имени файла) на части, точка - делитель
$file_name_info = explode('.', $_FILES['photo']['name']);
//запись левой части от точки в переменную (имя файла) - исходное название файла
$file_pure_name = $file_name_info[0];
//запись правой части от точки в переменную (расширение файла)
$file_ext = $file_name_info[1];
//уникальная сгенерированная строка
$hash = md5($file_pure_name . time());
//сборка нового уникального имени файла
$file_new_name = $file_pure_name . '_' . $hash . '.' . $file_ext;

//создание пути для записи файла
$file_full_path = 'img/catalog/' . $file_new_name;

//загрузка файла на сервер (сейчас локальный)
move_uploaded_file($_FILES['photo']['tmp_name'], '../../../' . $file_full_path);  //'../../../' . $file_full_path --- относительный путь

$arr_fields[] = 'photo';
$arr_values[] = "'" . $file_full_path . "'"; 

//преобразование массивов к строкам для подстановки в запрос
$str_fields = implode(',', $arr_fields); //сборка строки через запятую из массива
$str_values = implode(',', $arr_values);

//подключаемся к БД и записываем
//подключение файла
$connect = new \Project\Core\Connect();

//echo "INSERT INTO core_goods($str_fields) VALUES($str_values) ";

$result = mysqli_query($connect->getConnection(), "INSERT INTO core_goods($str_fields) VALUES($str_values) "); //при автоматическом получении данных полей формы

if ($result) {
    //echo 'Товар создан';
    header('Location: http://project_2/admin/index.php?page=items');
} else {
    echo 'что то пошло не так, поля: Название товара, Артикул, Цена - обязательны для заполнения';
    //var_dump ($result);
}
?>