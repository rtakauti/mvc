<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;
use StudioVisual\Lib\Animais\CachorroDomestico;

class AnimalController extends Controller
{
    public function name(string $param = '')
    {
        $param = explode('/', substr($param, 1));
        $pingo = new CachorroDomestico();
        $pingo->setNome($param[0]);
        $pingo->setGenero(1);

        $this->view('animal/cachorro', $pingo);
    }
}