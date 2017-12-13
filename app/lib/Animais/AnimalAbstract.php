<?php

namespace StudioVisual\Lib\Animais;

use StudioVisual\Lib\Contracts\AlimentacaoInterface;
use StudioVisual\Lib\Contracts\AnimalInterface;
use StudioVisual\Lib\Enum\AnimalGenero;
use StudioVisual\Lib\Exceptions\AcasalarException;
use StudioVisual\Lib\Exceptions\MorrerException;
use stdClass;

/**
 * Class AnimalAbstract
 * @package StudioVisual\Animais
 */
abstract class AnimalAbstract implements AnimalInterface, AlimentacaoInterface
{
    protected $genero =  [1=>'Macho', 2=>'Fêmea'];
    protected static $quantidade = 0;
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new stdClass;
        $this->attributes->genero = random_int(AnimalGenero::MACHO, AnimalGenero::FEMEA);
        $this->attributes->isVivo = true;
        ++static::$quantidade;
        ++self::$quantidade;
        $this->setComida();
    }

    public function respirar()
    {
        return 'respirando';
    }

    public function comer()
    {
        return 'Comendo';
    }

    public function beber()
    {
        return 'Bebendo';
    }


    /**
     * @return int
     */
    public static function mostrarQuantidade()
    {
        return static::$quantidade;
    }


    /**
     * @param $genero
     *
     * @return $this
     */
    public function setGenero($genero)
    {
        $this->attributes->genero = $genero;

        return $this;
    }

    public function getGenero()
    {
        return $this->genero[$this->attributes->genero];
    }


    /**
     * @param AnimalInterface $animal
     *
     * @return string
     */
    public function acasalar(AnimalInterface $animal)
    {
        if ($this->attributes->genero === $animal->attributes->genero) {
            throw new AcasalarException();
        }
        $this->setParceiro($animal);
        $this->attributes->parceiro->setParceiro($this);

        return 'acasalou';
    }


    /**
     * @return array
     * @throws \Exception
     */
    public function reproduzir()
    {
        $isFeminino = AnimalGenero::FEMEA === $this->attributes->genero;
        $hasParceiro = isset($this->attributes->parceiro);
        if ($isFeminino && $hasParceiro) {
            $filhotes = [];
            foreach (range(0, random_int(1, 5)) as $num) {
                $filhotes[$num] = new static;
            }

            $this->attributes->parceiro->setParceiro(null);
            $this->attributes->parceiro = null;

            return $filhotes;
        }
        throw new \LogicException('Somente animais do gênero feminino podem reproduzir!!!');
    }

    /**
     *
     */
    public function morrer()
    {
        if (!$this->attributes->isVivo) {
            throw new MorrerException();
        }
        $this->attributes->isVivo = false;

        return 'Morreu';
    }

    /**
     * @return mixed
     */
    public function mostrarParceiro()
    {
        return $this->attributes->parceiro;
    }

    /**
     * @param $parceiro
     */
    public function setParceiro($parceiro)
    {
        $this->attributes->parceiro = $parceiro;
    }


    /**
     * @return mixed
     */
    abstract public function locomover();


}