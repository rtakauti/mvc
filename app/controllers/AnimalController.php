<?php

namespace StudioVisual\Controllers;

use StudioVisual\Lib\Animais\CachorroDomestico;
use StudioVisual\Core\Controller;
use StudioVisual\Lib\Enum\AnimalGenero;

class AnimalController extends Controller
{
    public function name($name = '', $gender = 1)
    {
        $pingo = new CachorroDomestico();
        $pingo->setNome($name);
        $pingo->setGenero($gender);

        $this->view('animal/cachorro', $pingo);
    }
}