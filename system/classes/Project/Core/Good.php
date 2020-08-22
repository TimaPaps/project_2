<?php
namespace Project\Core;

//без метода getInfo
class Good extends \Project\Core\Unit {
    //переопределение метода
    function setTable() {
        return 'core_goods';
    }

     //точечный метод для получения данных из полей используя getField
    function price() {
        return $this->getField('price');
    }
     //точечный метод для получения данных из полей используя getField
    function photo() {
        return $this->getField('photo');
    }
}








/*
//с методом getInfo, который работает точечно с полями (например title, price, photo)
class Good {
    //создание переменных
    public $id;
    public $title;
    public $price;
    public $photo;
    
    public $data; //переменная для кэширования

    //записываем в память объекта id 
    public function getId($id) {
        $this->id = $id;
    }

    //метод для получения данных из БД для конкретного товара по его id
    public function getInfo() {
        //с кэшированием
        if(!$this->data) {
            //подключение к DB
            $link = mysqli_connect('localhost', 'root', '', 'eshop');
            mysqli_set_charset($link, 'utf8');
            //запрос на получение данных из таблицы core_goods по id товара
            $result = mysqli_query($link, "SELECT * FROM `core_goods` WHERE id=" . $this->id);
            //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
            $row = mysqli_fetch_assoc($result);

            //момент кэширования
            $this->data = $row;

            mysqli_close($link);
        }
        //наполняем свойства данными из переменной row (перезаписываем свойства объекта) (кэш полей)
        $this->title = ($this->data)['title'];
        $this->price = ($this->data)['price'];
        $this->photo = ($this->data)['photo'];        

/*
        //без кэширования
        //подключение к DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        //запрос на получение данных из таблицы core_goods по id товара
        $result = mysqli_query($link, "SELECT * FROM `core_goods` WHERE id=" . $this->id);
        //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
        $row = mysqli_fetch_assoc($result);

        //наполняем свойства данными из переменной row (перезаписываем свойства объекта) (кэш полей)
        $this->title = $row['title'];
        $this->price = $row['price'];
        $this->photo = $row['photo'];

        mysqli_close($link);
*/        
   /*}*/

/*
    //универсальный метод для получения данных полей (но в таком виде он небезопасен, т.к. другие могут увидеть поля которые нельзя показывать, надо делать защиту)
    public function getField($field) {
        //с кэшированием
        if(!$this->data) {
            //подключение к DB
            $link = mysqli_connect('localhost', 'root', '', 'eshop');
            mysqli_set_charset($link, 'utf8');
            //запрос на получение данных из таблицы core_goods по id товара
            $result = mysqli_query($link, "SELECT * FROM `core_goods` WHERE id=" . $this->id);
            //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
            $row = mysqli_fetch_assoc($result);

            //момент кэширования
            $this->data = $row;

            mysqli_close($link);
        }
        //выводим из кэша
        return ($this->data)[$field];
   
/*
        //без кэширования
        //подключение к DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        //запрос на получение данных из таблицы core_goods по id товара
        $result = mysqli_query($link, "SELECT * FROM `core_goods` WHERE id=" . $this->id);
        //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
        $row = mysqli_fetch_assoc($result);

        mysqli_close($link);

        //возвращение из row данных поля без перезаписи свойств объекта
        return $row[$field];
*/
    /*}*/

/*
    //точечный метод для получения данных из полей
    function title() {
        return $this->title;
    }
     //точечный метод для получения данных из полей
    function price() {
        return $this->price;
    }
     //точечный метод для получения данных из полей
    function photo() {
        return $this->photo;
    }
}
*/
?>