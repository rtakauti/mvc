<?php

namespace StudioVisual\Lib\Animais;

use StudioVisual\Lib\Contracts\MamiferoInterface;
use StudioVisual\Lib\Contracts\RacaInterface;
use StudioVisual\Lib\Traits\CachorroRacaTrait;
use StudioVisual\Lib\Traits\MamiferoTrait;
use StudioVisual\Lib\Traits\OnivoroTrait;
use StudioVisual\Lib\Traits\ViviparoTrait;

abstract class CaninoAbstract extends AnimalAbstract implements MamiferoInterface
{
    public function __construct()
    {
        parent::__construct();
        ++self::$quantidade;
    }

    protected static $quantidade = 0;
    
    use  MamiferoTrait, ViviparoTrait, CachorroRacaTrait, OnivoroTrait;
    

    public function locomover()
    {
        return 'Andando';
    }
    
    public function setRaca(RacaInterface $raca)
    {
        $raca->setRaca($this);
    }
    
    
    public function comunicar()
    {
        return 'Auauau';
    }
}