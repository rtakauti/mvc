<?php

namespace StudioVisual\Lib\Traits;


trait OnivoroTrait
{
    use CarnivoroTrait, HerbivoroTrait {
        CarnivoroTrait::setComida as setCarne;
        HerbivoroTrait::setComida as setVegetal;
        CarnivoroTrait::getComida insteadof HerbivoroTrait;
    }

//    private $comida;

    public function setComida()
    {
        $this->setCarne();
        $this->setVegetal();
    }
}