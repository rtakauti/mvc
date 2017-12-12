<?php

namespace StudioVisual\Lib\Traits;


trait CarnivoroTrait
{
    private $comida;

    public function setComida()
    {
        $this->comida[] = 'carne';
    }

    public function getComida()
    {
        return implode(', ', $this->comida);
    }
}