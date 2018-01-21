<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class ContactController extends Controller
{
    public function index(string $param = '')
    {
        $param = explode('/', substr($param,1));
        $user = $this->model('User');
        $user = $user->selectByName('Rubens')[0];
        if ($user->getName() !== $param[0]) {
            $user->setSurname('Studio');
        }

        $this->view('home/index', $user);
    }
}