<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class HomeController extends Controller
{
    public function index($name = '', $surname = '')
    {
        $user = $this->model('User');
        $user->setName($name);
        $user->setSurname($surname);
        $user->insert();
        $this->view('home/index', $user);
    }
}