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
        print_r($user->selectById(3));
        print_r($user->selectByAge(23));
//        print_r($user->selectAll());
        $this->view('home/index', $user);
    }
}