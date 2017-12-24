<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class HomeController extends Controller
{
    public function index($name = '', $surname = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        $user->surname = $surname;
        $user->update(1);
        $user->insert();
        echo '<pre>';
//        print_r($user->selectAll());
        print_r($user->selectById(1));
        $this->view('home/index', $user);
    }
}