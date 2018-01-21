<?php

namespace StudioVisual\Lib\Traits;


trait HerbivoroTrait
{
    private $comida;

    public function setComida()
    {
        $this->comida[] = 'vegetal';
    }

    public function getComida()
    {
        return implode(', ', $this->comida);
    }
}