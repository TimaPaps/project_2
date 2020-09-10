<?php

namespace Project\Core;

class User extends \Project\Core\Unit {

    //переопределение метода
    function setTable() {
        return 'core_users';
    }

    function login() {
        return $this->getField('login');
    }
}

?>