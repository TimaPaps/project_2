<?php
class Article extends Unit {
    //переопределение метода
    function setTable() {
        return 'core_articles';
    }

    //точечный метод для получения данных из полей используя getField
    function photo() {
        return $this->getField('photo');
    }
}
?>