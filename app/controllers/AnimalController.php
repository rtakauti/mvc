<?php

namespace StudioVisual\Controllers;

use StudioVisual\Lib\Animais\CachorroDomestico;
use StudioVisual\Core\Controller;
use StudioVisual\Lib\Enum\AnimalGenero;

class AnimalController extends Controller
{
    public function index($name = '')
    {
        $pingo = new CachorroDomestico();
        $pingo->setNome($name);
        $pingo->setGenero(AnimalGenero::MASCULINO);

        $this->view('animal/index', $pingo);
    }
}