<?php

namespace Project\Test;

class Beer 
{
    const NAME = 'Beer';

    public function getName()
    {
        return self::NAME;
    }
    public function getStaticName()
    {
        return static::NAME;
    }

}
?>