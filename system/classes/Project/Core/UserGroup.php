<?php

namespace Project\Core;

class UserGroup extends \Project\Core\Unit {
    
    //переопределение метода
    function setTable() {
        return 'core_user_groups';
    }
}

?>