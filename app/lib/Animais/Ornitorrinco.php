<?php

namespace StudioVisual\Animais;


use StudioVisual\Contracts\MamiferoInterface;
use StudioVisual\Traits\HerbivoroTrait;
use StudioVisual\Traits\MamiferoTrait;
use StudioVisual\Traits\OviparoTrait;

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