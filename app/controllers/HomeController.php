<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class HomeController extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        if ($user->getName() !== $name) {
            $user->setWork('no work');
        }

        $this->view('home/index', $user);
    }
}