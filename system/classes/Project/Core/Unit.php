<?php
namespace Project\Core;

abstract class Unit implements \Project\Interfaces\UnitActions {

    //создание переменных
    private $id;
    private $data; //переменная для кэширования

    /*вызывается автоматически при создании экземпляра класса, сразу сообщается id (не надо вызывать в index.php)
        $id = null вместо $id - для того чтобы не было Fatal error если index.php не пробросил id при создании экземпляра класса*/
    public function __construct($id = null) {
        $this->id = $id;
    }

    //универсальный метод для выбора нужной таблицы из DB
    function getTable($table) {
        $this->table = $table;
    }

    //метод установки названия таблицы
    function setTable() {
        return $this->table;
    }

    public function getElements() {
        $connect = new \Project\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ". $this->setTable());
        return $result;
    }

    //метод для получения данных из БД
    public function getData() {

        //подключение к DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        
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

    //точечный метод для получения данных из полей используя getField
    function title() {
        return $this->getField('title');
    }
}

?>