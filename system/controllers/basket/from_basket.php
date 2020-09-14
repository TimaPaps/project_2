<?php

session_start();

//считывание содержимое корзины в буфер(переменную)
if (isset($_SESSION['basket'])) { //если корзина не пустая - то добавляем в нее товар
    $basket = $_SESSION['basket'];
} else {  //иначе создаем пустой массив
    $basket = [];
}

//если id существует
if ($id = $_GET['id']) {
    //нужно найти элемент с таким id и его удалить из массива
    if (in_array($id, $basket)) {
        for ($i = 0; $i <= count($basket); $i++) {
            //если нашли то удаляем
            if ($basket[$i] == $id) {
                unset($basket[$i]);
            break;
            }
        }
        //сортировка массива после удаления элемента
        sort($basket);
    }

    //запись в сессию
    $_SESSION['basket'] = $basket;
    //var_dump($_SESSION['basket']);

    //выводим количество товаров на экран
    echo count($_SESSION['basket']);
}

?>