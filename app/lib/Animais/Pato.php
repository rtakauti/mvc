<?php

namespace StudioVisual\Lib\Animais;


use StudioVisual\Lib\Traits\HerbivoroTrait;
use StudioVisual\Lib\Traits\OviparoTrait;

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