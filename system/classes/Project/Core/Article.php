<?php
namespace Project\Core;

class Article extends \Project\Core\Unit implements \Project\Interfaces\ShowArticleInfo {
    //переопределение метода
    function setTable() {
        return 'core_articles';
    }

    //точечный метод для получения данных из полей используя getField
    function photo() {
        return $this->getField('photo');
    }
    function title() {
        return $this->getField('photo');
    }
    function description() {
        return $this->getField('photo');
    }
}
?>