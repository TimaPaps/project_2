<?php

namespace Project\Core;

class Article extends \Project\Core\Unit implements \Project\Interfaces\ShowArticleInfo {

    //переопределение метода
    function setTable() {
        return 'core_articles';
    }

    //точечные методы для получения данных из полей используя getField
    function photo() {
        return $this->getField('photo');
    }
    function title() {
        return $this->getField('title');
    }
    function description() {
        return $this->getField('description');
    }
}

?>