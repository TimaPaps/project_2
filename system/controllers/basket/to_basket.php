<?php

session_start();

//считывание содержимого корзины в буфер(переменную)
if (isset($_SESSION['basket'])) { //если корзина не пустая - то добавляем в нее товар
    $basket = $_SESSION['basket'];
} else {  //иначе создаем пустой массив
    $basket = [];
}

//если id существует
if ($id = $_GET['id']) {
    //если в корзине нет товара то добавляем этот товар в корзину
    if (!in_array($id, $basket)) {
        $basket[] = $id;
    }

    //запись в сессию
    $_SESSION['basket'] = $basket;
    //var_dump($_SESSION['basket']);

    //выводим количество товаров на экран
    echo count($_SESSION['basket']);
}

//очищение корзины
//$_SESSION['basket'] = null;

?>