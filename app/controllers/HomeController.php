<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class HomeController extends Controller
{
    public function index(string $param = '')
    {
        $param = explode('/', substr($param,1));
        $user = $this->model('User');
        $user->name = $param[0];
        $user->surname = $param[1];
        $user->age = $param[2];
        $user->update(1);
        $user->delete(2);
        $user->insert();
        $this->view('home/index', $user);
    }
}