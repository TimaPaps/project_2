<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');

//получение данных
$login = $_GET['login'];
$password = $_GET['password']; 

//подключаемся к БД и записываем
    //подключение файла
$connect = new \Project\Core\Connect();
//
$result = mysqli_query($connect->getConnection(), "SELECT * FROM core_users WHERE login='$login' OR email='$login' ");
$user = mysqli_fetch_assoc($result);

if ($user['id']) {
    //начинаем делать проверку так как user  с таким логином уже есть
    if (hash_equals($user['password'], crypt($password, $user['password']))) {
        if ($user['user_group'] == 2) {
            //создание куки со сроком жизни 8 часов
            setcookie('user_id', $user['id'], time() + 28800, '/');
            //редирект
            header('location: http://project_2/admin/index.php?page=orders');
        } else {
            //echo "Вы успешно авторизовались " . $user['login'];
            //создание куки со сроком жизни 1 час
            setcookie('user_id', $user['id'], time() + 3600, '/');
            //редирект
            header('location: http://project_2/catalog.php'); 
        }       
    } else {
        //echo "Неверный логин или пароль!";
        //редирект
        header('location: ' . $_SERVER['HTTP_REFERER'] . '?wrong=1');
    }
} else {
    //echo "Неверный логин или пароль!";
    //редирект
    header('location: ' . $_SERVER['HTTP_REFERER'] . '?wrong=1');
}
    
?>