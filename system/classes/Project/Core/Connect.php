<?php

namespace Project\Core;

class Connect {

    //вызывается автоматически при создании экземпляра класса
    public function __construct() {

        //соединение с БД и запись в переменную (ключ)
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

        //проверка на подключение к DB
            if(!$link) {
                echo 'Нет подключения к базе данных';
                die(); //остановка работы скрипта
            }

        //кодировка для общения с DB
            mysqli_set_charset($link, 'utf8'); 
            $this->link = $link;
    }

    public function getConnection() {
        return $this->link;
    }
}

?>