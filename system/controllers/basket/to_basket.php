<?php

session_start();

//считывание содержимого корзины в буфер(переменную)
if (isset($_SESSION['basket'])) { //если корзина не пустая - то добавляем в нее товар
    $basket = $_SESSION['basket'];
} else {  //иначе создаем пустой массив
    $basket = [];
}

//получаем id товара
if ($id = $_GET['id']) {
    //если в корзине нет товара то добавляем этот товар в корзину
    if (!in_array($id, $basket)) {
        $basket[] = $id;
    }

    //запись в сессию
    $_SESSION['basket'] = $basket;

    //выводим количество товаров на экран
    echo count($_SESSION['basket']);
}

?>