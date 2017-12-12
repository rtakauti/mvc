<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class ContactController extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        if ($user->getName() !== $name) {
            $user->setWork('Contact');
        }

        $this->view('home/index', $user);
    }
}