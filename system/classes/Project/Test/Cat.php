<?php

namespace Project\Test;

class Cat extends \Project\Test\Animal implements \Project\Interfaces\Run, 
                                                    \Project\Interfaces\Sleep, 
                                                    \Project\Interfaces\Eat, 
                                                    \Project\Interfaces\Jump {
    
}

?>