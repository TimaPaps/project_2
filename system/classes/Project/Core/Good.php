<?php

namespace Project\Core;

class Good extends \Project\Core\Unit {

    //переопределение метода
    function setTable() {
        return 'core_goods';
    }

     //точечные методы для получения данных из полей используя getField
    function price() {
        return $this->getField('price');
    }
    function photo() {
        return $this->getField('photo');
    }
    function article() {
        return $this->getField('article');
    }
    
    //переопределение метода getElement из Unit
    public function getElements() {
        $connect = new \Project\Core\Connect();

        //фильтрация по категориям
        $filter = ''; //убираем Notice: Undefined variable: filter in ...
        if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) { //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
            $filter .= " AND category_id=$category_id";
        }

        //фильтрация по типу товара
        if (isset($_GET['type_id']) && $type_id = $_GET['type_id']) {
            $filter .= " AND type_id=$type_id";
        }

        //фильтрация по типу товара - новинки
        if (isset($_GET['is_new']) && $is_new = $_GET['is_new']) {
            $filter .= " AND is_new=$is_new";
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

?>