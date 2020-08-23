<?php
namespace Project\Core;

class Category extends \Project\Core\Unit {
    //переопределение метода
    function setTable() {
        return 'categories';
    }
}
?>