<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//получение данных
$login = $_GET['login'];
$email = $_GET['email'];
$password = crypt($_GET['password']); //crypt() - шифрует символы пароля

//подключаемся к БД и записываем
    //подключение файла
$connect = new \Project\Core\Connect();
//проверка на наличие в БД таких логинов или паролей
$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_users WHERE login='$login' OR email='$email' ");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if ($amount > 0) {
    echo "Такой логин или пароль уже существуют";
} else {
    //создаем новую строчку в таблице
    mysqli_query($connect->getConnection(), "INSERT INTO core_users(login, email, password) VALUES('$login', '$email', '$password') ");
    echo "Вы успешно зарегистрировались!";
}

?>