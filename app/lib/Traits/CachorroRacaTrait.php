<?php


namespace StudioVisual\Lib\Traits;


trait CachorroRacaTrait
{
    public function setTamanho($tamanho)
    {
        $this->attributes->tamanho = $tamanho;
    }

    public function getTamanho()
    {
        return !isset($this->attributes->tamanho)
            ? 0
            : $this->attributes->tamanho;
    }

    public function setPeso($peso)
    {
        $this->attributes->peso = $peso;
    }

    public function getPeso()
    {
        return  !isset($this->attributes->peso)
            ? 0
            : $this->attributes->peso;
    }

    public function setLatido($latido)
    {
        $this->attributes->latido = $latido;
    }

    public function getLatido()
    {
        return $this->attributes->latido;
    }

    public function setPhoto($photo)
    {
        $this->attributes->photo = $photo;
    }

    public function getPhoto()
    {
        return $this->attributes->photo;
    }
}