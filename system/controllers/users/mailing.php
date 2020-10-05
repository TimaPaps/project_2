<?php

//var_dump($_POST);

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

$email = $_POST['email'];

//подключаемся к БД и записываем
$connect = new \Project\Core\Connect();
//проверка на наличие в БД таких логинов или паролей
$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM mailings WHERE email='$email' ");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

//var_dump($_POST);
if (!empty($_POST['email'])) {
    if ($amount > 0) {
        //echo "Такой email уже получает рассылки нашего магазина";
        //редирект
        header('location: http://project_2/index.php' . '?inDatabase');
    } else {
        //создаем новую строчку в таблице
        mysqli_query($connect->getConnection(), "INSERT INTO mailings(email) VALUES('$email') ");
        //echo "Вы успешно зарегистрировались!";
        header('location: http://project_2/index.php' . '?success=1');
    }
} else {
    //echo "Заполните поле - Email";
    //редирект
    header('location: http://project_2/index.php' . '?wrong=1');
}

?>