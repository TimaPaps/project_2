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
    
    //переопределение метода getElement из Unit
    public function getElements() {
        $connect = new \Project\Core\Connect();

        //фильтрация по категориям
        $filter = ''; //убираем Notice: Undefined variable: filter in ...
        if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) { //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
            $filter .= " AND category_id=$category_id";
        }
        //echo "SELECT * FROM ". $this->setTable() . " $filter ";
        //echo $_GET['category_id'];
        //var_dump($_GET);

        //фильтрация по типу товара
        if (isset($_GET['type_id']) && $type_id = $_GET['type_id']) {
            $filter .= " AND type_id=$type_id";
        }

        //пагинация, расчет товаров на страницу
        $page = 1;  //если страница не задана то будем подставлять 1
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $limit = 4;
        $from = ($page - 1) * $limit;  //если страница 1 - старт с 0, если страница 2 - старт с 2, если страница 3 - старт с 4

        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ". $this->setTable() . " WHERE id>0 $filter LIMIT $from, $limit"); //LIMIT 2, 3 - предел, выводит 3 товара из БД после второго
        return $result;
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