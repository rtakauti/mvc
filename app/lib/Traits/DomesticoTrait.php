<?php

namespace StudioVisual\Lib\Traits;

trait DomesticoTrait
{

    /**
     * @param $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->attributes->nome = $nome;
        return $this;
    }

    /**
     * @param $nome
     * @return $this
     */
    public function setNomeMae($nome)
    {
        $this->attributes->nomeMae = $nome;
        return $this;
    }

    /**
     * @param $nome
     * @return $this
     */
    public function setNomePai($nome)
    {
        $this->attributes->nomePai = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->attributes->nome;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'nome: ' . $this->attributes->nome . ' gênero: ' . $this->attributes->genero;
    }
}