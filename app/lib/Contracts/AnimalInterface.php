<?php

namespace StudioVisual\Lib\Contracts;

interface AnimalInterface
{
    public function comer();
    
    public function respirar();
    
    public function morrer();
    
    public function acasalar(self $animal);
    
    public function reproduzir();
    
    public function comunicar();
    
    public function locomover();
}