<?php

namespace StudioVisual\Animais;


use StudioVisual\Traits\HerbivoroTrait;
use StudioVisual\Traits\OviparoTrait;

class Pato extends AnimalAbstract
{
    protected static $quantidade = 0;

    public function __construct()
    {
        parent::__construct();
    }

    use OviparoTrait, HerbivoroTrait;
    
    public function locomover()
    {
        return 'nadar, voar, andar';
    }
    
    public function comunicar()
    {
        return 'Quaquauqa';
    }
}