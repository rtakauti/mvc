<?php

namespace StudioVisual\Lib\Animais;


use StudioVisual\Lib\Contracts\MamiferoInterface;
use StudioVisual\Lib\Traits\HerbivoroTrait;
use StudioVisual\Lib\Traits\MamiferoTrait;
use StudioVisual\Lib\Traits\OviparoTrait;

class Ornitorrinco extends AnimalAbstract implements MamiferoInterface
{
    protected static $quantidade = 0;

    use MamiferoTrait, OviparoTrait, HerbivoroTrait;

    /**
     * @return mixed
     */
    public function locomover()
    {
        return 'nadar, andar';
    }
    
    
    public function comunicar()
    {
        return 'Trutrutru';
    }
}