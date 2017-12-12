<?php

namespace StudioVisual\Lib\Contracts;


interface DomesticoInterface
{
    /**
     * @param $nome
     *
     * @return $this
     */
    public function setNome($nome);

    /**
     * @param $nome
     *
     * @return $this
     */
    public function setNomeMae($nome);

    /**
     * @param $nome
     *
     * @return $this
     */
    public function setNomePai($nome);

    /**
     * @return mixed
     */
    public function getNome();

    /**
     * @return string
     */
    public function __toString();
}