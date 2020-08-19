<?php
//создание класса Test
class Test {
    //создание свойств - видимость public - видно везде (модификатор доступа)
    public $speed = 60;
    public $weight = 2000;
    //создание метода скорость (function - по умолчанию public)
    function drive() {
        echo 'я еду со скоростью ' . $this->speed . ' км/ч';
    }

    //создание метода ускорение
    function accelerate($speed) { //вызов переменной
        $this->speed = $speed; //перезапись -этой- переменной
    }
}
?>