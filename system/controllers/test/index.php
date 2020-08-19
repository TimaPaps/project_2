<?php
    //плдключение класса Test
    include($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Test.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Good.php');
/*   //создание экземпляра класса
    $car = new Test();
    //вызов метода скорость
    $car->drive();

    //вызов свойства
    //echo $car->weight;

    echo'<br>'; //перенос строки
    //вызов метода ускорение и передача в метод значения 100
    $car->accelerate(100);
    //вызов метода скорость
    $car->drive();
    echo'<br>'; //перенос строки
    echo $car->speed;
    */

    //создание нового экземпляра класса
    $good = new Good();
    //сообщение id экземпляру класса()объекту (пробросили id)
    $good->getId(4);
    //получение данных
    //$good->getInfo(); //с методом getInfo

    echo $good->getField('title');
    echo '<br>';
    echo $good->getField('price');
    echo '<br>';
    echo $good->photo();
    echo '<br>';
    
    $good = new Good();
    $good->getId(3);
    echo $good->getField('title');
    echo '<br>';
    echo $good->getField('price');
    echo '<br>';
    echo $good->photo();
?>