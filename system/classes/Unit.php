<?php
class Unit {
            //создание переменных
            private $id;
            private $data; //переменная для кэширования
        
            //записываем в память объекта id 
            public function getId($id) {
                $this->id = $id;
            }

            //универсальный метод для выбора нужной таблицы из DB
            function getTable($table) {
                $this->table = $table;
            }

            //метод установки названия таблицы   (полиморфизм)
            function setTable() {
                return $this->table;
            }
        
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
        
            //точечный метод для получения данных из полей используя getField
            function title() {
                return $this->getField('title');
            }
}
?>