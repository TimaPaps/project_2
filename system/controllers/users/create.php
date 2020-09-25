<?php 

var_dump($_POST);

var_dump($_FILES);

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//получение данных
$login = $_POST['login'];
$email = $_POST['email'];
$password = crypt($_POST['password']); //crypt() - шифрует символы пароля
$user_group = $_POST['user_group'];

//подключаемся к БД и записываем
    //подключение файла
$connect = new \Project\Core\Connect();
//проверка на наличие в БД таких логинов или паролей
$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_users WHERE login='$login' OR email='$email' ");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if ($amount > 0) {
    echo "Такие логин или пароль уже существуют";
} else {
    //создаем новую строчку в таблице
    mysqli_query($connect->getConnection(), "INSERT INTO core_users(login, email, password, user_group) VALUES('$login', '$email', '$password', '$user_group') ");
    //echo "Вы успешно зарегистрировались!";
    header('location: http://project_2/admin/index.php?page=users');
}

?>