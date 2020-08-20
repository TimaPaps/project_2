<?php
abstract class Unit implements UnitActions{
    //создание переменных
    private $id;
    private $data; //переменная для кэширования

    /*вызывается автоматически при создании экземпляра класса, сразу сообщается id (не надо вызывать в index.php)
        $id = null вместо $id - для того чтобы не было Fatal error если index.php не пробросил id при создании экземпляра класса*/
    public function __construct($id = null) {
        $this->id = $id;
    }

/*  метод не нужен, т.к. создали метод - public function __construct($id)
    //записываем в память объекта id 
    public function getId($id) {
        $this->id = $id;
    }
*/

/*//геттер и сеттер позволяют получить и перезаписать private свойства
    /* данный пример работает с:
                    $article->id
                    $article->id = 5;
                    после создания экземпляра класса в index.php*/
/*
    //геттер получает значение private 
    public function __get($name) {
        echo "получение доступа к private свойствам<br>";
        return $this->$name;
    }
    //сеттер
    public function __set($name, $value) {
        echo "попытка изменить private свойства";
        $this->$name = $value;
    }
*/


    //универсальный метод для выбора нужной таблицы из DB
    function getTable($table) {
        $this->table = $table;
    }

    //метод установки названия таблицы   (полиморфизм)
    function setTable() {
        return $this->table;
    }

    public function getElements() {
        $connect = new Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ". $this->setTable());
        return $result;
    }

    //метод для получения данных из БД
    public function getData() {
        //подключение к DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        //запрос на получение данных из таблицы core_goods по id товара
        
        //без метода getTable для выбора нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM `core_articles` WHERE id=" . $this->id);
        //без метода setTable для автоматической подстановки названия нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM ". $this->table ." WHERE id=" . $this->id);
        $result = mysqli_query($link, "SELECT * FROM ". $this->setTable() ." WHERE id=" . $this->id);
        //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
        $row = mysqli_fetch_assoc($result);

        //момент кэширования
        $this->data = $row;

        mysqli_close($link);
    }

    //метод для получения данных полей
    public function getField($field) {
        //с кэшированием
        if(!$this->data) {
            $this->getData();
        }
        //выводим из кэша
        return ($this->data)[$field];
    }

/*
    //универсальный метод для получения данных полей (но в таком виде он небезопасен, т.к. другие могут увидеть поля которые нельзя показывать, надо делать защиту)
    public function getField($field) {
        //с кэшированием
        if(!$this->data) {
            //подключение к DB
            $link = mysqli_connect('localhost', 'root', '', 'eshop');
            mysqli_set_charset($link, 'utf8');
            //запрос на получение данных из таблицы core_goods по id товара
            
            //без метода getTable для выбора нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM `core_articles` WHERE id=" . $this->id);
            //без метода setTable для автоматической подстановки названия нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM ". $this->table ." WHERE id=" . $this->id);
            $result = mysqli_query($link, "SELECT * FROM ". $this->setTable() ." WHERE id=" . $this->id);
            //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
            $row = mysqli_fetch_assoc($result);

            //момент кэширования
            $this->data = $row;

            mysqli_close($link);
        }
        //выводим из кэша
        return ($this->data)[$field];
    }
*/

    //точечный метод для получения данных из полей используя getField
    function title() {
        return $this->getField('title');
    }


        /*тестовый метод для поиска в БД по например title
        чтобы работало еще должно быть:
            public function __construct($id = null) {
                $this->id = $id;
            }
            и в index.php после создания экземпляра класса:
            $article->getElementByTitle('джинсовые куртки'); //или кожанные ботинки или ...*/
/*
        public function getElementByTitle($title) {
        //подключение к DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        //запрос на получение данных из таблицы core_goods по id товара

        //без метода getTable для выбора нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM `core_articles` WHERE id=" . $this->id);
        //без метода setTable для автоматической подстановки названия нужной таблицы из DB    $result = mysqli_query($link, "SELECT * FROM ". $this->table ." WHERE id=" . $this->id);
        $result = mysqli_query($link, "SELECT id FROM ". $this->setTable() ." WHERE title='$title'");
        echo "SELECT id FROM core_articles WHERE title= . $title";
        //запись в переменную данных из столбцов по полученному id в виде ассоциативного массива
        $row = mysqli_fetch_assoc($result);

        //момент кэширования
        $this->id = $row['id'];

        mysqli_close($link);
    }
*/
}
?>