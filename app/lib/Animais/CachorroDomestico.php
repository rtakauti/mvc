<?php


namespace StudioVisual\Lib\Animais;


use StudioVisual\Lib\Contracts\DomesticoInterface;
use StudioVisual\Lib\Traits\DomesticoTrait;

class CachorroDomestico extends CaninoAbstract implements DomesticoInterface
{
    protected static $quantidade = 0;
    
    use DomesticoTrait;

    public function __get($name)
    {
        return $this->{'get'.$name}();
    }

    public function reproduzir()
    {
        try {
            $filhotes = parent::reproduzir();
        } catch (\LogicException $exception) {
            throw $exception;
        }
        if ( ! empty($filhotes)) {
            $nomes   = ['Bingo', 'Billy', 'Rex', 'Lessie', 'Potty', 'Pingo', 'Spot', 'Lady', 'Laika', 'Bob', 'Bolt'];
            $generos = [1, 1, 1, 2, 1, 1, 1, 2, 2, 1, 1];
            foreach ($filhotes as $num => $filhote) {
                $filhote->setNome($nomes[$num])
                        ->setGenero($generos[$num])
                        ->setNomeMae($this->getNome());
            }
            
            return $filhotes;
        }
    }
}