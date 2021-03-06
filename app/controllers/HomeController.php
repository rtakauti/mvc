<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;
use StudioVisual\Models\User;

class HomeController extends Controller
{
    public function index(string $params = '')
    {
        $param = explode('/', substr($params, 1));
        $user = $this->model('User');
        $user->name = array_key_exists(0, $param) && $param[0] ? $param[0] : 'Rubens';
        $user->surname = array_key_exists(1, $param) ? $param[1] : 'Takauti';
        $user->age = array_key_exists(2, $param) ? $param[2] : 100;
//        $user->update(1);
//        $user->delete(2);
        $user->insert();
        $chico = $this->model('User');
        $chico->name = 'chico';
        $chico->surname = 'silva';
        $chico->age = 1;
//        $chico->insert();
        $users = [
            $chico,
            [
                'name' => 'vitao',
                'surname' => 'silva',
                'age' => 2,
            ],
        ];
        $cidade = 'São Paulo';
        $estado = 'SP';
        $number = ['cidade', 'estado'];
        $this->view('home/index', compact('user', 'users', $number));
    }
}